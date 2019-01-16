DOCKER_COMPOSE?=docker-compose
EXEC?=$(DOCKER_COMPOSE) exec -u $$(id -u):$$(id -g) app
CONSOLE=$(EXEC) bin/console
PHPCSFIXER?=$(EXEC) php -d memory_limit=1024m vendor/bin/php-cs-fixer

.DEFAULT_GOAL := help

.PHONY: help
help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

##
## Project setup
##---------------------------------------------------------------------------
.PHONY: dev start up up-without-xdebug stop build cc
dev: build start install db-init var/public.key ## Build, start the application and load fixtures

start: up ## Start the application

up:
	$(DOCKER_COMPOSE) up -d --remove-orphans

up-without-xdebug: start
	$(DOCKER_COMPOSE) exec -T app phpdismod xdebug
	$(DOCKER_COMPOSE) restart app

stop: ## Stop the application
	$(DOCKER_COMPOSE) kill
	$(DOCKER_COMPOSE) rm -v --force

build: ## Build containers
	$(DOCKER_COMPOSE) build

cc: ## Clear the cache in dev env
	$(CONSOLE) cache:clear --no-warmup
	$(CONSOLE) cache:warmup

var/public.key: var/private.key ## Generate the public key
	$(EXEC) openssl rsa -in var/private.key -pubout -out var/public.key
	-$(EXEC) chmod 660 var/public.key var/private.key

var/private.key:  ## Generate the private key
	$(EXEC) mkdir -p var
	$(EXEC) openssl genrsa -out var/private.key 1024


##
## Dependencies
##---------------------------------------------------------------------------
.PHONY: install init-phpunit-bridge
install: composer.lock ## Install project dependencies
	$(EXEC) composer install --no-ansi

composer.lock: composer.json
	echo compose.lock is not up to date.

init-phpunit-bridge: ## Run phpunit check version to bootstrap it
	$(EXEC) bin/phpunit --check-version

##
## Database
##---------------------------------------------------------------------------
.PHONY: wait-for-db db-schema-drop db-schema-create db-migrate db-diff db-fixtures db-init
wait-for-db:
	$(EXEC) php -r "set_time_limit(60);for(;;){if(@fsockopen('db',5432)){break;}echo \"Waiting for MySQL\n\";sleep(1);}"

db-schema-drop: ## Drop the database schema
	$(CONSOLE) doctrine:schema:drop --force -n
	$(CONSOLE) doctrine:migrations:version --all --delete -n

db-schema-create: ## Create the database schema
	$(CONSOLE) doctrine:schema:create -n

db-migrate: ## Execute the doctrine migration
	$(CONSOLE) doctrine:migrations:migrate -n

db-diff: ## Create a doctrine migration diff
	$(CONSOLE) doctrine:migrations:diff

db-fixtures: ## Load fixtures
	$(CONSOLE) doctrine:fixtures:load -n

db-init: wait-for-db db-schema-drop db-migrate db-fixtures ## Init the database with fixtures

##
## Tests
##---------------------------------------------------------------------------

.PHONY: test tu tf tfp phpcs phpcsfix behat init-phpunit-bridge tfp-rabbitmq security-check

test: tu tf phpcs security-check                            ## Run the PHP tests

tu: install                                                 ## Run the PHP Unit tests
	$(EXEC) bin/phpunit --exclude-group functional $(PHPUNIT_ARGS)

tf: tfp init-phpunit-bridge                                 ## Run the PHP Functional tests
	$(EXEC) bin/phpunit --group functional $(PHPUNIT_ARGS)

tfp: install wait-for-db                                    ## Prepare the PHP functional tests
	$(CONSOLE) doctrine:schema:drop --force -n --env=test
	$(CONSOLE) doctrine:migrations:version --all --delete -n --env=test
	$(CONSOLE) doctrine:migrations:migrate -n --env=test
	$(CONSOLE) doctrine:schema:validate --env=test
	$(CONSOLE) doctrine:fixtures:load -n --env=test

phpcs: install                                              ## Lint PHP Code
	$(PHPCSFIXER) fix --diff --dry-run --no-interaction -v

phpcsfix: install                                           ## Lint and fix PHP code to follow the convention
	$(PHPCSFIXER) fix

security-check: install
	$(EXEC) vendor/bin/security-checker security:check
