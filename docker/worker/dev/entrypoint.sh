#!/bin/bash

php -r "set_time_limit(60);for(;;){if(@fsockopen('rabbitmq',5672)){break;}echo \"Waiting for RabbitMQ\n\";sleep(1);}"

bin/console enqueue:consume default --setup-broker -vv
