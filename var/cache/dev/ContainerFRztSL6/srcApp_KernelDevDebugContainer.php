<?php

namespace ContainerFRztSL6;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class srcApp_KernelDevDebugContainer extends Container
{
    private $buildParameters;
    private $containerDir;
    private $parameters;
    private $targetDirs = array();
    private $getService;

    public function __construct(array $buildParameters = array(), $containerDir = __DIR__)
    {
        $this->getService = \Closure::fromCallable(array($this, 'getService'));
        $dir = $this->targetDirs[0] = \dirname($containerDir);
        for ($i = 1; $i <= 2; ++$i) {
            $this->targetDirs[$i] = $dir = \dirname($dir);
        }
        $this->buildParameters = $buildParameters;
        $this->containerDir = $containerDir;
        $this->parameters = $this->getDefaultParameters();

        $this->services = $this->privates = array();
        $this->syntheticIds = array(
            'kernel' => true,
        );
        $this->methodMap = array(
            'cache.app' => 'getCache_AppService',
            'cache.system' => 'getCache_SystemService',
            'data_collector.dump' => 'getDataCollector_DumpService',
            'doctrine' => 'getDoctrineService',
            'enqueue.client.default.producer' => 'getEnqueue_Client_Default_ProducerService',
            'event_dispatcher' => 'getEventDispatcherService',
            'http_kernel' => 'getHttpKernelService',
            'knp_menu.matcher' => 'getKnpMenu_MatcherService',
            'profiler' => 'getProfilerService',
            'request_stack' => 'getRequestStackService',
            'router' => 'getRouterService',
            'security.authorization_checker' => 'getSecurity_AuthorizationCheckerService',
            'security.token_storage' => 'getSecurity_TokenStorageService',
            'sonata.admin.global_template_registry' => 'getSonata_Admin_GlobalTemplateRegistryService',
            'sonata.admin.pool' => 'getSonata_Admin_PoolService',
            'sonata.admin.twig.extension' => 'getSonata_Admin_Twig_ExtensionService',
            'sonata.admin.twig.global' => 'getSonata_Admin_Twig_GlobalService',
            'sonata.block.context_manager.default' => 'getSonata_Block_ContextManager_DefaultService',
            'sonata.block.manager' => 'getSonata_Block_ManagerService',
            'sonata.block.renderer.default' => 'getSonata_Block_Renderer_DefaultService',
            'sonata.core.flashmessage.twig.extension' => 'getSonata_Core_Flashmessage_Twig_ExtensionService',
            'translator' => 'getTranslatorService',
            'twig' => 'getTwigService',
            'validator' => 'getValidatorService',
            'var_dumper.cloner' => 'getVarDumper_ClonerService',
        );
        $this->fileMap = array(
            'App\\Controller\\AdminSecurityController' => 'getAdminSecurityControllerService.php',
            'Sonata\\AdminBundle\\Action\\DashboardAction' => 'getDashboardActionService.php',
            'Sonata\\AdminBundle\\Action\\SearchAction' => 'getSearchActionService.php',
            'Sonata\\AdminBundle\\Command\\CreateClassCacheCommand' => 'getCreateClassCacheCommandService.php',
            'Sonata\\AdminBundle\\Command\\ExplainAdminCommand' => 'getExplainAdminCommandService.php',
            'Sonata\\AdminBundle\\Command\\GenerateAdminCommand' => 'getGenerateAdminCommandService.php',
            'Sonata\\AdminBundle\\Command\\GenerateObjectAclCommand' => 'getGenerateObjectAclCommandService.php',
            'Sonata\\AdminBundle\\Command\\ListAdminCommand' => 'getListAdminCommandService.php',
            'Sonata\\AdminBundle\\Command\\SetupAclCommand' => 'getSetupAclCommandService.php',
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController' => 'getRedirectControllerService.php',
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController' => 'getTemplateControllerService.php',
            'cache.app_clearer' => 'getCache_AppClearerService.php',
            'cache.global_clearer' => 'getCache_GlobalClearerService.php',
            'cache.system_clearer' => 'getCache_SystemClearerService.php',
            'cache_clearer' => 'getCacheClearerService.php',
            'cache_warmer' => 'getCacheWarmerService.php',
            'console.command.public_alias.Sonata\\BlockBundle\\Command\\DebugBlocksCommand' => 'getDebugBlocksCommandService.php',
            'console.command.public_alias.Sonata\\CoreBundle\\Command\\SonataDumpDoctrineMetaCommand' => 'getSonataDumpDoctrineMetaCommandService.php',
            'console.command.public_alias.Sonata\\CoreBundle\\Command\\SonataListFormMappingCommand' => 'getSonataListFormMappingCommandService.php',
            'console.command.public_alias.doctrine_cache.contains_command' => 'getConsole_Command_PublicAlias_DoctrineCache_ContainsCommandService.php',
            'console.command.public_alias.doctrine_cache.delete_command' => 'getConsole_Command_PublicAlias_DoctrineCache_DeleteCommandService.php',
            'console.command.public_alias.doctrine_cache.flush_command' => 'getConsole_Command_PublicAlias_DoctrineCache_FlushCommandService.php',
            'console.command.public_alias.doctrine_cache.stats_command' => 'getConsole_Command_PublicAlias_DoctrineCache_StatsCommandService.php',
            'console.command.public_alias.doctrine_migrations.diff_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_DiffCommandService.php',
            'console.command.public_alias.doctrine_migrations.execute_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_ExecuteCommandService.php',
            'console.command.public_alias.doctrine_migrations.generate_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_GenerateCommandService.php',
            'console.command.public_alias.doctrine_migrations.latest_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_LatestCommandService.php',
            'console.command.public_alias.doctrine_migrations.migrate_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_MigrateCommandService.php',
            'console.command.public_alias.doctrine_migrations.status_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_StatusCommandService.php',
            'console.command.public_alias.doctrine_migrations.version_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_VersionCommandService.php',
            'console.command_loader' => 'getConsole_CommandLoaderService.php',
            'doctrine.dbal.default_connection' => 'getDoctrine_Dbal_DefaultConnectionService.php',
            'doctrine.orm.default_entity_manager' => 'getDoctrine_Orm_DefaultEntityManagerService.php',
            'doctrine_cache.providers.doctrine.orm.default_metadata_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService.php',
            'doctrine_cache.providers.doctrine.orm.default_query_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService.php',
            'doctrine_cache.providers.doctrine.orm.default_result_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultResultCacheService.php',
            'filesystem' => 'getFilesystemService.php',
            'form.factory' => 'getForm_FactoryService.php',
            'knp_menu.factory' => 'getKnpMenu_FactoryService.php',
            'routing.loader' => 'getRouting_LoaderService.php',
            'scheb_two_factor.firewall_context' => 'getSchebTwoFactor_FirewallContextService.php',
            'scheb_two_factor.form_controller' => 'getSchebTwoFactor_FormControllerService.php',
            'scheb_two_factor.security.google_authenticator' => 'getSchebTwoFactor_Security_GoogleAuthenticatorService.php',
            'security.authentication_utils' => 'getSecurity_AuthenticationUtilsService.php',
            'security.csrf.token_manager' => 'getSecurity_Csrf_TokenManagerService.php',
            'security.password_encoder' => 'getSecurity_PasswordEncoderService.php',
            'services_resetter' => 'getServicesResetterService.php',
            'session' => 'getSessionService.php',
            'sonata.admin.action.append_form_field_element' => 'getSonata_Admin_Action_AppendFormFieldElementService.php',
            'sonata.admin.action.get_short_object_description' => 'getSonata_Admin_Action_GetShortObjectDescriptionService.php',
            'sonata.admin.action.retrieve_autocomplete_items' => 'getSonata_Admin_Action_RetrieveAutocompleteItemsService.php',
            'sonata.admin.action.retrieve_form_field_element' => 'getSonata_Admin_Action_RetrieveFormFieldElementService.php',
            'sonata.admin.action.set_object_field_value' => 'getSonata_Admin_Action_SetObjectFieldValueService.php',
            'sonata.admin.audit.manager' => 'getSonata_Admin_Audit_ManagerService.php',
            'sonata.admin.block.admin_list' => 'getSonata_Admin_Block_AdminListService.php',
            'sonata.admin.block.search_result' => 'getSonata_Admin_Block_SearchResultService.php',
            'sonata.admin.block.stats' => 'getSonata_Admin_Block_StatsService.php',
            'sonata.admin.breadcrumbs_builder' => 'getSonata_Admin_BreadcrumbsBuilderService.php',
            'sonata.admin.builder.filter.factory' => 'getSonata_Admin_Builder_Filter_FactoryService.php',
            'sonata.admin.controller.admin' => 'getSonata_Admin_Controller_AdminService.php',
            'sonata.admin.doctrine_orm.form.type.choice_field_mask' => 'getSonata_Admin_DoctrineOrm_Form_Type_ChoiceFieldMaskService.php',
            'sonata.admin.event.extension' => 'getSonata_Admin_Event_ExtensionService.php',
            'sonata.admin.exporter' => 'getSonata_Admin_ExporterService.php',
            'sonata.admin.form.extension.choice' => 'getSonata_Admin_Form_Extension_ChoiceService.php',
            'sonata.admin.form.extension.field' => 'getSonata_Admin_Form_Extension_FieldService.php',
            'sonata.admin.form.extension.field.mopa' => 'getSonata_Admin_Form_Extension_Field_MopaService.php',
            'sonata.admin.form.filter.type.choice' => 'getSonata_Admin_Form_Filter_Type_ChoiceService.php',
            'sonata.admin.form.filter.type.date' => 'getSonata_Admin_Form_Filter_Type_DateService.php',
            'sonata.admin.form.filter.type.daterange' => 'getSonata_Admin_Form_Filter_Type_DaterangeService.php',
            'sonata.admin.form.filter.type.datetime' => 'getSonata_Admin_Form_Filter_Type_DatetimeService.php',
            'sonata.admin.form.filter.type.datetime_range' => 'getSonata_Admin_Form_Filter_Type_DatetimeRangeService.php',
            'sonata.admin.form.filter.type.default' => 'getSonata_Admin_Form_Filter_Type_DefaultService.php',
            'sonata.admin.form.filter.type.number' => 'getSonata_Admin_Form_Filter_Type_NumberService.php',
            'sonata.admin.form.type.admin' => 'getSonata_Admin_Form_Type_AdminService.php',
            'sonata.admin.form.type.collection' => 'getSonata_Admin_Form_Type_CollectionService.php',
            'sonata.admin.form.type.model_autocomplete' => 'getSonata_Admin_Form_Type_ModelAutocompleteService.php',
            'sonata.admin.form.type.model_choice' => 'getSonata_Admin_Form_Type_ModelChoiceService.php',
            'sonata.admin.form.type.model_hidden' => 'getSonata_Admin_Form_Type_ModelHiddenService.php',
            'sonata.admin.form.type.model_list' => 'getSonata_Admin_Form_Type_ModelListService.php',
            'sonata.admin.form.type.model_reference' => 'getSonata_Admin_Form_Type_ModelReferenceService.php',
            'sonata.admin.helper' => 'getSonata_Admin_HelperService.php',
            'sonata.admin.label.strategy.bc' => 'getSonata_Admin_Label_Strategy_BcService.php',
            'sonata.admin.label.strategy.form_component' => 'getSonata_Admin_Label_Strategy_FormComponentService.php',
            'sonata.admin.label.strategy.native' => 'getSonata_Admin_Label_Strategy_NativeService.php',
            'sonata.admin.label.strategy.noop' => 'getSonata_Admin_Label_Strategy_NoopService.php',
            'sonata.admin.label.strategy.underscore' => 'getSonata_Admin_Label_Strategy_UnderscoreService.php',
            'sonata.admin.manipulator.acl.admin' => 'getSonata_Admin_Manipulator_Acl_AdminService.php',
            'sonata.admin.menu.matcher.voter.active' => 'getSonata_Admin_Menu_Matcher_Voter_ActiveService.php',
            'sonata.admin.menu.matcher.voter.admin' => 'getSonata_Admin_Menu_Matcher_Voter_AdminService.php',
            'sonata.admin.menu.matcher.voter.children' => 'getSonata_Admin_Menu_Matcher_Voter_ChildrenService.php',
            'sonata.admin.menu_builder' => 'getSonata_Admin_MenuBuilderService.php',
            'sonata.admin.object.manipulator.acl.admin' => 'getSonata_Admin_Object_Manipulator_Acl_AdminService.php',
            'sonata.admin.route.cache' => 'getSonata_Admin_Route_CacheService.php',
            'sonata.admin.route.cache_warmup' => 'getSonata_Admin_Route_CacheWarmupService.php',
            'sonata.admin.route.default_generator' => 'getSonata_Admin_Route_DefaultGeneratorService.php',
            'sonata.admin.route.path_info' => 'getSonata_Admin_Route_PathInfoService.php',
            'sonata.admin.route.query_string' => 'getSonata_Admin_Route_QueryStringService.php',
            'sonata.admin.route_loader' => 'getSonata_Admin_RouteLoaderService.php',
            'sonata.admin.search.handler' => 'getSonata_Admin_Search_HandlerService.php',
            'sonata.admin.sidebar_menu' => 'getSonata_Admin_SidebarMenuService.php',
            'sonata.admin.validator.inline' => 'getSonata_Admin_Validator_InlineService.php',
            'sonata.block.exception.filter.debug_only' => 'getSonata_Block_Exception_Filter_DebugOnlyService.php',
            'sonata.block.exception.filter.ignore_block_exception' => 'getSonata_Block_Exception_Filter_IgnoreBlockExceptionService.php',
            'sonata.block.exception.filter.keep_all' => 'getSonata_Block_Exception_Filter_KeepAllService.php',
            'sonata.block.exception.filter.keep_none' => 'getSonata_Block_Exception_Filter_KeepNoneService.php',
            'sonata.block.exception.renderer.inline' => 'getSonata_Block_Exception_Renderer_InlineService.php',
            'sonata.block.exception.renderer.inline_debug' => 'getSonata_Block_Exception_Renderer_InlineDebugService.php',
            'sonata.block.exception.renderer.throw' => 'getSonata_Block_Exception_Renderer_ThrowService.php',
            'sonata.block.menu.registry' => 'getSonata_Block_Menu_RegistryService.php',
            'sonata.block.service.container' => 'getSonata_Block_Service_ContainerService.php',
            'sonata.block.service.empty' => 'getSonata_Block_Service_EmptyService.php',
            'sonata.block.service.menu' => 'getSonata_Block_Service_MenuService.php',
            'sonata.block.service.rss' => 'getSonata_Block_Service_RssService.php',
            'sonata.block.service.template' => 'getSonata_Block_Service_TemplateService.php',
            'sonata.block.service.text' => 'getSonata_Block_Service_TextService.php',
            'sonata.core.flashmessage.manager' => 'getSonata_Core_Flashmessage_ManagerService.php',
            'sonata.core.form.type.array' => 'getSonata_Core_Form_Type_ArrayService.php',
            'sonata.core.form.type.array_legacy' => 'getSonata_Core_Form_Type_ArrayLegacyService.php',
            'sonata.core.form.type.boolean' => 'getSonata_Core_Form_Type_BooleanService.php',
            'sonata.core.form.type.boolean_legacy' => 'getSonata_Core_Form_Type_BooleanLegacyService.php',
            'sonata.core.form.type.collection' => 'getSonata_Core_Form_Type_CollectionService.php',
            'sonata.core.form.type.collection_legacy' => 'getSonata_Core_Form_Type_CollectionLegacyService.php',
            'sonata.core.form.type.color_legacy' => 'getSonata_Core_Form_Type_ColorLegacyService.php',
            'sonata.core.form.type.color_selector' => 'getSonata_Core_Form_Type_ColorSelectorService.php',
            'sonata.core.form.type.date_picker' => 'getSonata_Core_Form_Type_DatePickerService.php',
            'sonata.core.form.type.date_picker_legacy' => 'getSonata_Core_Form_Type_DatePickerLegacyService.php',
            'sonata.core.form.type.date_range' => 'getSonata_Core_Form_Type_DateRangeService.php',
            'sonata.core.form.type.date_range_legacy' => 'getSonata_Core_Form_Type_DateRangeLegacyService.php',
            'sonata.core.form.type.date_range_picker' => 'getSonata_Core_Form_Type_DateRangePickerService.php',
            'sonata.core.form.type.date_range_picker_legacy' => 'getSonata_Core_Form_Type_DateRangePickerLegacyService.php',
            'sonata.core.form.type.datetime_picker' => 'getSonata_Core_Form_Type_DatetimePickerService.php',
            'sonata.core.form.type.datetime_picker_legacy' => 'getSonata_Core_Form_Type_DatetimePickerLegacyService.php',
            'sonata.core.form.type.datetime_range' => 'getSonata_Core_Form_Type_DatetimeRangeService.php',
            'sonata.core.form.type.datetime_range_legacy' => 'getSonata_Core_Form_Type_DatetimeRangeLegacyService.php',
            'sonata.core.form.type.datetime_range_picker' => 'getSonata_Core_Form_Type_DatetimeRangePickerService.php',
            'sonata.core.form.type.datetime_range_picker_legacy' => 'getSonata_Core_Form_Type_DatetimeRangePickerLegacyService.php',
            'sonata.core.form.type.equal' => 'getSonata_Core_Form_Type_EqualService.php',
            'sonata.core.form.type.equal_legacy' => 'getSonata_Core_Form_Type_EqualLegacyService.php',
            'sonata.core.form.type.translatable_choice' => 'getSonata_Core_Form_Type_TranslatableChoiceService.php',
            'sonata.core.model.adapter.chain' => 'getSonata_Core_Model_Adapter_ChainService.php',
            'sonata.core.slugify.cocur' => 'getSonata_Core_Slugify_CocurService.php',
            'sonata.core.slugify.native' => 'getSonata_Core_Slugify_NativeService.php',
            'twig.controller.exception' => 'getTwig_Controller_ExceptionService.php',
            'twig.controller.preview_error' => 'getTwig_Controller_PreviewErrorService.php',
            'web_profiler.controller.exception' => 'getWebProfiler_Controller_ExceptionService.php',
            'web_profiler.controller.profiler' => 'getWebProfiler_Controller_ProfilerService.php',
            'web_profiler.controller.router' => 'getWebProfiler_Controller_RouterService.php',
        );
        $this->aliases = array(
            'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\Google\\GoogleAuthenticator' => 'scheb_two_factor.security.google_authenticator',
            'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\Google\\GoogleAuthenticatorInterface' => 'scheb_two_factor.security.google_authenticator',
            'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\TwoFactorFirewallContext' => 'scheb_two_factor.firewall_context',
            'database_connection' => 'doctrine.dbal.default_connection',
            'doctrine.orm.default_metadata_cache' => 'doctrine_cache.providers.doctrine.orm.default_metadata_cache',
            'doctrine.orm.default_query_cache' => 'doctrine_cache.providers.doctrine.orm.default_query_cache',
            'doctrine.orm.default_result_cache' => 'doctrine_cache.providers.doctrine.orm.default_result_cache',
            'doctrine.orm.entity_manager' => 'doctrine.orm.default_entity_manager',
        );
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function getRemovedIds()
    {
        return require $this->containerDir.\DIRECTORY_SEPARATOR.'removed-ids.php';
    }

    protected function load($file, $lazyLoad = true)
    {
        return require $this->containerDir.\DIRECTORY_SEPARATOR.$file;
    }

    /**
     * Gets the public 'cache.app' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_AppService()
    {
        $a = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('hoS+7VmVdH', 0, ($this->targetDirs[0].'/pools'), new \Symfony\Component\Cache\Marshaller\DefaultMarshaller(NULL));
        $a->setLogger(($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));

        return $this->services['cache.app'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter($a);
    }

    /**
     * Gets the public 'cache.system' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SystemService()
    {
        return $this->services['cache.system'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('402JomS1uH', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the public 'data_collector.dump' shared service.
     *
     * @return \Symfony\Component\HttpKernel\DataCollector\DumpDataCollector
     */
    protected function getDataCollector_DumpService()
    {
        return $this->services['data_collector.dump'] = new \Symfony\Component\HttpKernel\DataCollector\DumpDataCollector(($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))), ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService()), 'UTF-8', ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->privates['var_dumper.server_connection'] ?? $this->getVarDumper_ServerConnectionService()));
    }

    /**
     * Gets the public 'doctrine' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected function getDoctrineService()
    {
        return $this->services['doctrine'] = new \Doctrine\Bundle\DoctrineBundle\Registry($this, $this->parameters['doctrine.connections'], $this->parameters['doctrine.entity_managers'], 'default', 'default');
    }

    /**
     * Gets the public 'enqueue.client.default.producer' shared service.
     *
     * @return \Enqueue\Client\TraceableProducer
     */
    protected function getEnqueue_Client_Default_ProducerService()
    {
        return $this->services['enqueue.client.default.producer'] = new \Enqueue\Client\TraceableProducer(new \Enqueue\Client\Producer(($this->privates['enqueue.client.default.driver'] ?? $this->getEnqueue_Client_Default_DriverService()), new \Enqueue\Rpc\RpcFactory(($this->privates['enqueue.client.default.context'] ?? $this->getEnqueue_Client_Default_ContextService())), new \Enqueue\Client\ChainExtension(array())));
    }

    /**
     * Gets the public 'event_dispatcher' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher
     */
    protected function getEventDispatcherService()
    {
        $a = new \Symfony\Bridge\Monolog\Logger('event');
        $a->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $a->pushHandler(new \Monolog\Handler\NullHandler());

        $this->services['event_dispatcher'] = $instance = new \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher(new \Symfony\Component\EventDispatcher\EventDispatcher(), ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))), $a);

        $instance->addListener('kernel.exception', array(0 => function () {
            return ($this->privates['http_exception_listener'] ?? $this->load('getHttpExceptionListenerService.php'));
        }, 1 => 'onKernelException'), -2048);
        $instance->addListener('kernel.controller', array(0 => function () {
            return ($this->privates['data_collector.router'] ?? ($this->privates['data_collector.router'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector()));
        }, 1 => 'onKernelController'), 0);
        $instance->addListener('kernel.response', array(0 => function () {
            return ($this->privates['sonata.block.cache.handler.default'] ?? ($this->privates['sonata.block.cache.handler.default'] = new \Sonata\BlockBundle\Cache\HttpCacheHandler()));
        }, 1 => 'onKernelResponse'), 0);
        $instance->addListener('kernel.response', array(0 => function () {
            return ($this->privates['scheb_two_factor.trusted_cookie_response_listener'] ?? $this->getSchebTwoFactor_TrustedCookieResponseListenerService());
        }, 1 => 'onKernelResponse'), 0);
        $instance->addListener('kernel.response', array(0 => function () {
            return ($this->privates['response_listener'] ?? ($this->privates['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8')));
        }, 1 => 'onKernelResponse'), 0);
        $instance->addListener('kernel.response', array(0 => function () {
            return ($this->privates['streamed_response_listener'] ?? ($this->privates['streamed_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener()));
        }, 1 => 'onKernelResponse'), -1024);
        $instance->addListener('kernel.request', array(0 => function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListenerService());
        }, 1 => 'onKernelRequest'), 16);
        $instance->addListener('kernel.finish_request', array(0 => function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListenerService());
        }, 1 => 'onKernelFinishRequest'), 0);
        $instance->addListener('kernel.request', array(0 => function () {
            return ($this->privates['validate_request_listener'] ?? ($this->privates['validate_request_listener'] = new \Symfony\Component\HttpKernel\EventListener\ValidateRequestListener()));
        }, 1 => 'onKernelRequest'), 256);
        $instance->addListener('kernel.request', array(0 => function () {
            return ($this->privates['resolve_controller_name_subscriber'] ?? $this->getResolveControllerNameSubscriberService());
        }, 1 => 'onKernelRequest'), 24);
        $instance->addListener('console.error', array(0 => function () {
            return ($this->privates['console.error_listener'] ?? $this->load('getConsole_ErrorListenerService.php'));
        }, 1 => 'onConsoleError'), -128);
        $instance->addListener('console.terminate', array(0 => function () {
            return ($this->privates['console.error_listener'] ?? $this->load('getConsole_ErrorListenerService.php'));
        }, 1 => 'onConsoleTerminate'), -128);
        $instance->addListener('kernel.request', array(0 => function () {
            return ($this->privates['session_listener'] ?? $this->getSessionListenerService());
        }, 1 => 'onKernelRequest'), 128);
        $instance->addListener('kernel.response', array(0 => function () {
            return ($this->privates['session_listener'] ?? $this->getSessionListenerService());
        }, 1 => 'onKernelResponse'), -1000);
        $instance->addListener('kernel.finish_request', array(0 => function () {
            return ($this->privates['session_listener'] ?? $this->getSessionListenerService());
        }, 1 => 'onFinishRequest'), 0);
        $instance->addListener('kernel.request', array(0 => function () {
            return ($this->privates['translator_listener'] ?? $this->getTranslatorListenerService());
        }, 1 => 'onKernelRequest'), 10);
        $instance->addListener('kernel.finish_request', array(0 => function () {
            return ($this->privates['translator_listener'] ?? $this->getTranslatorListenerService());
        }, 1 => 'onKernelFinishRequest'), 0);
        $instance->addListener('kernel.response', array(0 => function () {
            return ($this->privates['profiler_listener'] ?? $this->getProfilerListenerService());
        }, 1 => 'onKernelResponse'), -100);
        $instance->addListener('kernel.exception', array(0 => function () {
            return ($this->privates['profiler_listener'] ?? $this->getProfilerListenerService());
        }, 1 => 'onKernelException'), 0);
        $instance->addListener('kernel.terminate', array(0 => function () {
            return ($this->privates['profiler_listener'] ?? $this->getProfilerListenerService());
        }, 1 => 'onKernelTerminate'), -1024);
        $instance->addListener('kernel.controller', array(0 => function () {
            return ($this->privates['data_collector.request'] ?? ($this->privates['data_collector.request'] = new \Symfony\Component\HttpKernel\DataCollector\RequestDataCollector()));
        }, 1 => 'onKernelController'), 0);
        $instance->addListener('kernel.response', array(0 => function () {
            return ($this->privates['data_collector.request'] ?? ($this->privates['data_collector.request'] = new \Symfony\Component\HttpKernel\DataCollector\RequestDataCollector()));
        }, 1 => 'onKernelResponse'), 0);
        $instance->addListener('kernel.request', array(0 => function () {
            return ($this->privates['debug.debug_handlers_listener'] ?? $this->getDebug_DebugHandlersListenerService());
        }, 1 => 'configure'), 2048);
        $instance->addListener('kernel.request', array(0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelRequest'), 32);
        $instance->addListener('kernel.finish_request', array(0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelFinishRequest'), 0);
        $instance->addListener('kernel.exception', array(0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelException'), -64);
        $instance->addListener('kernel.terminate', array(0 => function () {
            return ($this->privates['enqueue.client.default.flush_spool_producer_listener'] ?? $this->load('getEnqueue_Client_Default_FlushSpoolProducerListenerService.php'));
        }, 1 => 'flushMessages'), 0);
        $instance->addListener('console.terminate', array(0 => function () {
            return ($this->privates['enqueue.client.default.flush_spool_producer_listener'] ?? $this->load('getEnqueue_Client_Default_FlushSpoolProducerListenerService.php'));
        }, 1 => 'flushMessages'), 0);
        $instance->addListener('kernel.exception', array(0 => function () {
            return ($this->privates['twig.exception_listener'] ?? $this->load('getTwig_ExceptionListenerService.php'));
        }, 1 => 'logKernelException'), 0);
        $instance->addListener('kernel.exception', array(0 => function () {
            return ($this->privates['twig.exception_listener'] ?? $this->load('getTwig_ExceptionListenerService.php'));
        }, 1 => 'onKernelException'), -128);
        $instance->addListener('kernel.response', array(0 => function () {
            return ($this->privates['security.rememberme.response_listener'] ?? ($this->privates['security.rememberme.response_listener'] = new \Symfony\Component\Security\Http\RememberMe\ResponseListener()));
        }, 1 => 'onKernelResponse'), 0);
        $instance->addListener('debug.security.authorization.vote', array(0 => function () {
            return ($this->privates['debug.security.voter.vote_listener'] ?? $this->load('getDebug_Security_Voter_VoteListenerService.php'));
        }, 1 => 'onVoterVote'), 0);
        $instance->addListener('kernel.request', array(0 => function () {
            return ($this->privates['debug.security.firewall'] ?? $this->getDebug_Security_FirewallService());
        }, 1 => 'onKernelRequest'), 8);
        $instance->addListener('kernel.finish_request', array(0 => function () {
            return ($this->privates['debug.security.firewall'] ?? $this->getDebug_Security_FirewallService());
        }, 1 => 'onKernelFinishRequest'), 0);
        $instance->addListener('console.error', array(0 => function () {
            return ($this->privates['maker.console_error_listener'] ?? ($this->privates['maker.console_error_listener'] = new \Symfony\Bundle\MakerBundle\Event\ConsoleErrorSubscriber()));
        }, 1 => 'onConsoleError'), 0);
        $instance->addListener('console.terminate', array(0 => function () {
            return ($this->privates['maker.console_error_listener'] ?? ($this->privates['maker.console_error_listener'] = new \Symfony\Bundle\MakerBundle\Event\ConsoleErrorSubscriber()));
        }, 1 => 'onConsoleTerminate'), 0);
        $instance->addListener('kernel.response', array(0 => function () {
            return ($this->privates['web_profiler.debug_toolbar'] ?? $this->getWebProfiler_DebugToolbarService());
        }, 1 => 'onKernelResponse'), -128);
        $instance->addListener('console.command', array(0 => function () {
            return ($this->privates['monolog.handler.console'] ?? ($this->privates['monolog.handler.console'] = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, true, array())));
        }, 1 => 'onCommand'), 255);
        $instance->addListener('console.terminate', array(0 => function () {
            return ($this->privates['monolog.handler.console'] ?? ($this->privates['monolog.handler.console'] = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, true, array())));
        }, 1 => 'onTerminate'), -255);
        $instance->addListener('console.command', array(0 => function () {
            return ($this->privates['debug.dump_listener'] ?? $this->load('getDebug_DumpListenerService.php'));
        }, 1 => 'configure'), 1024);

        return $instance;
    }

    /**
     * Gets the public 'http_kernel' shared service.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernel
     */
    protected function getHttpKernelService()
    {
        $a = ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)));

        return $this->services['http_kernel'] = new \Symfony\Component\HttpKernel\HttpKernel(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), new \Symfony\Component\HttpKernel\Controller\TraceableControllerResolver(new \Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver($this, ($this->privates['controller_name_converter'] ?? ($this->privates['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(($this->services['kernel'] ?? $this->get('kernel', 1))))), ($this->privates['monolog.logger.request'] ?? $this->getMonolog_Logger_RequestService())), $a), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), new \Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver(new \Symfony\Component\HttpKernel\Controller\ArgumentResolver(new \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory(), new RewindableGenerator(function () {
            yield 0 => ($this->privates['debug.argument_resolver.request_attribute'] ?? $this->load('getDebug_ArgumentResolver_RequestAttributeService.php'));
            yield 1 => ($this->privates['debug.argument_resolver.request'] ?? $this->load('getDebug_ArgumentResolver_RequestService.php'));
            yield 2 => ($this->privates['debug.argument_resolver.session'] ?? $this->load('getDebug_ArgumentResolver_SessionService.php'));
            yield 3 => ($this->privates['debug.security.user_value_resolver'] ?? $this->load('getDebug_Security_UserValueResolverService.php'));
            yield 4 => ($this->privates['debug.argument_resolver.service'] ?? $this->load('getDebug_ArgumentResolver_ServiceService.php'));
            yield 5 => ($this->privates['debug.argument_resolver.default'] ?? $this->load('getDebug_ArgumentResolver_DefaultService.php'));
            yield 6 => ($this->privates['debug.argument_resolver.variadic'] ?? $this->load('getDebug_ArgumentResolver_VariadicService.php'));
        }, 7)), $a));
    }

    /**
     * Gets the public 'knp_menu.matcher' shared service.
     *
     * @return \Knp\Menu\Matcher\Matcher
     */
    protected function getKnpMenu_MatcherService()
    {
        return $this->services['knp_menu.matcher'] = new \Knp\Menu\Matcher\Matcher(new RewindableGenerator(function () {
            yield 0 => ($this->privates['knp_menu.voter.router'] ?? $this->load('getKnpMenu_Voter_RouterService.php'));
            yield 1 => ($this->services['sonata.admin.menu.matcher.voter.admin'] ?? $this->load('getSonata_Admin_Menu_Matcher_Voter_AdminService.php'));
            yield 2 => ($this->services['sonata.admin.menu.matcher.voter.active'] ?? ($this->services['sonata.admin.menu.matcher.voter.active'] = new \Sonata\AdminBundle\Menu\Matcher\Voter\ActiveVoter()));
        }, 3));
    }

    /**
     * Gets the public 'profiler' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Profiler\Profiler
     */
    protected function getProfilerService()
    {
        $a = new \Symfony\Bridge\Monolog\Logger('profiler');
        $a->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $a->pushHandler(($this->privates['monolog.handler.console'] ?? ($this->privates['monolog.handler.console'] = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, true, array()))));
        $a->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        $this->services['profiler'] = $instance = new \Symfony\Component\HttpKernel\Profiler\Profiler(new \Symfony\Component\HttpKernel\Profiler\FileProfilerStorage(('file:'.$this->targetDirs[0].'/profiler')), $a, true);

        $b = ($this->services['kernel'] ?? $this->get('kernel'));
        $c = new \Symfony\Component\Cache\DataCollector\CacheDataCollector();
        $c->addInstance('cache.app', ($this->services['cache.app'] ?? $this->getCache_AppService()));
        $c->addInstance('cache.system', ($this->services['cache.system'] ?? $this->getCache_SystemService()));
        $c->addInstance('cache.validator', ($this->privates['cache.validator'] ?? $this->getCache_ValidatorService()));
        $c->addInstance('cache.serializer', ($this->privates['cache.serializer'] ?? $this->getCache_SerializerService()));
        $c->addInstance('cache.annotations', ($this->privates['cache.annotations'] ?? $this->getCache_AnnotationsService()));
        $c->addInstance('cache.security_expression_language', ($this->privates['cache.security_expression_language'] ?? $this->getCache_SecurityExpressionLanguageService()));
        $d = new \Doctrine\Bundle\DoctrineBundle\DataCollector\DoctrineDataCollector(($this->services['doctrine'] ?? $this->getDoctrineService()));
        $d->addLogger('default', ($this->privates['doctrine.dbal.logger.profiling.default'] ?? ($this->privates['doctrine.dbal.logger.profiling.default'] = new \Doctrine\DBAL\Logging\DebugStack())));
        $e = new \Enqueue\Bundle\Profiler\MessageQueueCollector();
        $e->addProducer('default', ($this->services['enqueue.client.default.producer'] ?? $this->getEnqueue_Client_Default_ProducerService()));
        $f = new \Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector();
        if ($this->has('kernel')) {
            $f->setKernel($b);
        }

        $instance->add(($this->privates['data_collector.request'] ?? ($this->privates['data_collector.request'] = new \Symfony\Component\HttpKernel\DataCollector\RequestDataCollector())));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\TimeDataCollector($b, ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)))));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\MemoryDataCollector());
        $instance->add(new \Symfony\Component\Validator\DataCollector\ValidatorDataCollector(($this->services['validator'] ?? $this->getValidatorService())));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector());
        $instance->add(($this->privates['data_collector.form'] ?? $this->getDataCollector_FormService()));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\ExceptionDataCollector());
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\LoggerDataCollector($a, ($this->targetDirs[0].'/srcApp_KernelDevDebugContainer'), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()))));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\EventDataCollector(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService())));
        $instance->add(($this->privates['data_collector.router'] ?? ($this->privates['data_collector.router'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector())));
        $instance->add($c);
        $instance->add(new \Symfony\Component\Translation\DataCollector\TranslationDataCollector(($this->services['translator'] ?? $this->getTranslatorService())));
        $instance->add(new \Symfony\Bundle\SecurityBundle\DataCollector\SecurityDataCollector(($this->services['security.token_storage'] ?? ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())), ($this->privates['security.role_hierarchy'] ?? $this->getSecurity_RoleHierarchyService()), ($this->privates['security.logout_url_generator'] ?? $this->getSecurity_LogoutUrlGeneratorService()), ($this->privates['debug.security.access.decision_manager'] ?? $this->getDebug_Security_Access_DecisionManagerService()), ($this->privates['security.firewall.map'] ?? $this->getSecurity_Firewall_MapService()), ($this->privates['debug.security.firewall'] ?? $this->getDebug_Security_FirewallService())));
        $instance->add(new \Symfony\Bridge\Twig\DataCollector\TwigDataCollector(($this->privates['twig.profile'] ?? ($this->privates['twig.profile'] = new \Twig\Profiler\Profile())), ($this->services['twig'] ?? $this->getTwigService())));
        $instance->add($d);
        $instance->add(($this->services['data_collector.dump'] ?? $this->getDataCollector_DumpService()));
        $instance->add($e);
        $instance->add(new \Sonata\BlockBundle\Profiler\DataCollector\BlockDataCollector(($this->privates['sonata.block.templating.helper'] ?? $this->getSonata_Block_Templating_HelperService()), $this->parameters['sonata.block.container.types']));
        $instance->add($f);

        return $instance;
    }

    /**
     * Gets the public 'request_stack' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\RequestStack
     */
    protected function getRequestStackService()
    {
        return $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack();
    }

    /**
     * Gets the public 'router' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Routing\Router
     */
    protected function getRouterService()
    {
        $a = new \Symfony\Bridge\Monolog\Logger('router');
        $a->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $a->pushHandler(($this->privates['monolog.handler.console'] ?? ($this->privates['monolog.handler.console'] = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, true, array()))));
        $a->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        $this->services['router'] = $instance = new \Symfony\Bundle\FrameworkBundle\Routing\Router((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, array(
            'routing.loader' => array('services', 'routing.loader', 'getRouting_LoaderService.php', true),
        )))->withContext('router.default', $this), 'kernel::loadRoutes', array('cache_dir' => $this->targetDirs[0], 'debug' => true, 'generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper', 'generator_cache_class' => 'srcApp_KernelDevDebugContainerUrlGenerator', 'matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper', 'matcher_cache_class' => 'srcApp_KernelDevDebugContainerUrlMatcher', 'strict_requirements' => true, 'resource_type' => 'service'), ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()), ($this->privates['parameter_bag'] ?? ($this->privates['parameter_bag'] = new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($this))), $a);

        $instance->setConfigCacheFactory(($this->privates['config_cache_factory'] ?? $this->getConfigCacheFactoryService()));

        return $instance;
    }

    /**
     * Gets the public 'security.authorization_checker' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\AuthorizationChecker
     */
    protected function getSecurity_AuthorizationCheckerService()
    {
        return $this->services['security.authorization_checker'] = new \Symfony\Component\Security\Core\Authorization\AuthorizationChecker(($this->services['security.token_storage'] ?? ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())), ($this->privates['security.authentication.manager'] ?? $this->getSecurity_Authentication_ManagerService()), ($this->privates['debug.security.access.decision_manager'] ?? $this->getDebug_Security_Access_DecisionManagerService()), false);
    }

    /**
     * Gets the public 'security.token_storage' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage
     */
    protected function getSecurity_TokenStorageService()
    {
        return $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage();
    }

    /**
     * Gets the public 'sonata.admin.global_template_registry' shared service.
     *
     * @return \Sonata\AdminBundle\Templating\TemplateRegistry
     */
    protected function getSonata_Admin_GlobalTemplateRegistryService()
    {
        return $this->services['sonata.admin.global_template_registry'] = new \Sonata\AdminBundle\Templating\TemplateRegistry($this->parameters['sonata.admin.configuration.templates']);
    }

    /**
     * Gets the public 'sonata.admin.pool' shared service.
     *
     * @return \Sonata\AdminBundle\Admin\Pool
     */
    protected function getSonata_Admin_PoolService()
    {
        $this->services['sonata.admin.pool'] = $instance = new \Sonata\AdminBundle\Admin\Pool($this, 'Sonata Admin', 'bundles/sonataadmin/logo_title.png', array('html5_validate' => true, 'sort_admins' => false, 'confirm_exit' => true, 'js_debug' => false, 'use_select2' => true, 'use_icheck' => true, 'use_bootlint' => false, 'use_stickyforms' => true, 'pager_links' => NULL, 'form_type' => 'standard', 'default_group' => 'default', 'default_label_catalogue' => 'SonataAdminBundle', 'default_icon' => '<i class="fa fa-folder"></i>', 'dropdown_number_groups_per_colums' => 2, 'title_mode' => 'both', 'lock_protection' => false, 'enable_jms_di_extra_autoregistration' => true, 'javascripts' => array(0 => 'bundles/sonatacore/vendor/jquery/dist/jquery.min.js', 1 => 'bundles/sonataadmin/vendor/jquery.scrollTo/jquery.scrollTo.min.js', 2 => 'bundles/sonataadmin/vendor/jqueryui/ui/minified/jquery-ui.min.js', 3 => 'bundles/sonataadmin/vendor/jqueryui/ui/minified/i18n/jquery-ui-i18n.min.js', 4 => 'bundles/sonatacore/vendor/moment/min/moment.min.js', 5 => 'bundles/sonatacore/vendor/bootstrap/dist/js/bootstrap.min.js', 6 => 'bundles/sonatacore/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', 7 => 'bundles/sonataadmin/vendor/jquery-form/jquery.form.js', 8 => 'bundles/sonataadmin/jquery/jquery.confirmExit.js', 9 => 'bundles/sonataadmin/vendor/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js', 10 => 'bundles/sonatacore/vendor/select2/select2.min.js', 11 => 'bundles/sonataadmin/vendor/admin-lte/dist/js/app.min.js', 12 => 'bundles/sonataadmin/vendor/iCheck/icheck.min.js', 13 => 'bundles/sonataadmin/vendor/slimScroll/jquery.slimscroll.min.js', 14 => 'bundles/sonataadmin/vendor/waypoints/lib/jquery.waypoints.min.js', 15 => 'bundles/sonataadmin/vendor/waypoints/lib/shortcuts/sticky.min.js', 16 => 'bundles/sonataadmin/vendor/readmore-js/readmore.min.js', 17 => 'bundles/sonataadmin/vendor/masonry/dist/masonry.pkgd.min.js', 18 => 'bundles/sonataadmin/Admin.js', 19 => 'bundles/sonataadmin/treeview.js', 20 => 'bundles/sonataadmin/sidebar.js'), 'stylesheets' => array(0 => 'bundles/sonatacore/vendor/bootstrap/dist/css/bootstrap.min.css', 1 => 'bundles/sonatacore/vendor/components-font-awesome/css/font-awesome.min.css', 2 => 'bundles/sonatacore/vendor/ionicons/css/ionicons.min.css', 3 => 'bundles/sonataadmin/vendor/admin-lte/dist/css/AdminLTE.min.css', 4 => 'bundles/sonataadmin/vendor/admin-lte/dist/css/skins/skin-black.min.css', 5 => 'bundles/sonataadmin/vendor/iCheck/skins/square/blue.css', 6 => 'bundles/sonatacore/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css', 7 => 'bundles/sonataadmin/vendor/jqueryui/themes/base/jquery-ui.css', 8 => 'bundles/sonatacore/vendor/select2/select2.css', 9 => 'bundles/sonatacore/vendor/select2-bootstrap-css/select2-bootstrap.min.css', 10 => 'bundles/sonataadmin/vendor/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css', 11 => 'bundles/sonataadmin/css/styles.css', 12 => 'bundles/sonataadmin/css/layout.css', 13 => 'bundles/sonataadmin/css/tree.css'), 'role_admin' => 'ROLE_SONATA_ADMIN', 'role_super_admin' => 'ROLE_SUPER_ADMIN', 'search' => true), ($this->privates['property_accessor'] ?? $this->getPropertyAccessorService()));

        $instance->setTemplateRegistry(($this->services['sonata.admin.global_template_registry'] ?? $this->getSonata_Admin_GlobalTemplateRegistryService()));
        $instance->setAdminServiceIds(array());
        $instance->setAdminGroups(array());
        $instance->setAdminClasses(array());

        return $instance;
    }

    /**
     * Gets the public 'sonata.admin.twig.extension' shared service.
     *
     * @return \Sonata\AdminBundle\Twig\Extension\SonataAdminExtension
     */
    protected function getSonata_Admin_Twig_ExtensionService()
    {
        $this->services['sonata.admin.twig.extension'] = $instance = new \Sonata\AdminBundle\Twig\Extension\SonataAdminExtension(($this->services['sonata.admin.pool'] ?? $this->getSonata_Admin_PoolService()), ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()), ($this->services['translator'] ?? $this->getTranslatorService()), $this, ($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()));

        $instance->setXEditableTypeMapping($this->parameters['sonata.admin.twig.extension.x_editable_type_mapping']);

        return $instance;
    }

    /**
     * Gets the public 'sonata.admin.twig.global' shared service.
     *
     * @return \Sonata\AdminBundle\Twig\GlobalVariables
     */
    protected function getSonata_Admin_Twig_GlobalService()
    {
        return $this->services['sonata.admin.twig.global'] = new \Sonata\AdminBundle\Twig\GlobalVariables(($this->services['sonata.admin.pool'] ?? $this->getSonata_Admin_PoolService()));
    }

    /**
     * Gets the public 'sonata.block.context_manager.default' shared service.
     *
     * @return \Sonata\BlockBundle\Block\BlockContextManager
     */
    protected function getSonata_Block_ContextManager_DefaultService()
    {
        return $this->services['sonata.block.context_manager.default'] = new \Sonata\BlockBundle\Block\BlockContextManager(new \Sonata\BlockBundle\Block\BlockLoaderChain(array(0 => new \Sonata\BlockBundle\Block\Loader\ServiceLoader(array(0 => 'sonata.admin.block.admin_list', 'sonata.block.service.container' => array('context' => array()), 'sonata.block.service.empty' => array('context' => array()), 'sonata.block.service.text' => array('context' => array()), 'sonata.block.service.rss' => array('context' => array()), 'sonata.block.service.menu' => array('context' => array()), 'sonata.block.service.template' => array('context' => array()), 'sonata.admin.block.admin_list' => array('context' => array()), 'sonata.admin.block.search_result' => array('context' => array()), 'sonata.admin.block.stats' => array('context' => array()))))), ($this->services['sonata.block.manager'] ?? $this->getSonata_Block_ManagerService()), $this->parameters['sonata_block.cache_blocks'], ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()));
    }

    /**
     * Gets the public 'sonata.block.manager' shared service.
     *
     * @return \Sonata\BlockBundle\Block\BlockServiceManager
     */
    protected function getSonata_Block_ManagerService()
    {
        $this->services['sonata.block.manager'] = $instance = new \Sonata\BlockBundle\Block\BlockServiceManager($this, true, ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()));

        $instance->add('sonata.block.service.container', 'sonata.block.service.container', array());
        $instance->add('sonata.block.service.empty', 'sonata.block.service.empty', array());
        $instance->add('sonata.block.service.text', 'sonata.block.service.text', array());
        $instance->add('sonata.block.service.rss', 'sonata.block.service.rss', array());
        $instance->add('sonata.block.service.menu', 'sonata.block.service.menu', array());
        $instance->add('sonata.block.service.template', 'sonata.block.service.template', array());
        $instance->add('sonata.admin.block.admin_list', 'sonata.admin.block.admin_list', array(0 => 'admin'));
        $instance->add('sonata.admin.block.search_result', 'sonata.admin.block.search_result', array());
        $instance->add('sonata.admin.block.stats', 'sonata.admin.block.stats', array());

        return $instance;
    }

    /**
     * Gets the public 'sonata.block.renderer.default' shared service.
     *
     * @return \Sonata\BlockBundle\Block\BlockRenderer
     */
    protected function getSonata_Block_Renderer_DefaultService()
    {
        $a = new \Sonata\BlockBundle\Exception\Strategy\StrategyManager($this, array('debug_only' => 'sonata.block.exception.filter.debug_only', 'ignore_block_exception' => 'sonata.block.exception.filter.ignore_block_exception', 'keep_all' => 'sonata.block.exception.filter.keep_all', 'keep_none' => 'sonata.block.exception.filter.keep_none'), array('inline' => 'sonata.block.exception.renderer.inline', 'inline_debug' => 'sonata.block.exception.renderer.inline_debug', 'throw' => 'sonata.block.exception.renderer.throw'), array(), array());
        $a->setDefaultFilter('debug_only');
        $a->setDefaultRenderer('throw');

        return $this->services['sonata.block.renderer.default'] = new \Sonata\BlockBundle\Block\BlockRenderer(($this->services['sonata.block.manager'] ?? $this->getSonata_Block_ManagerService()), $a, ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()), true);
    }

    /**
     * Gets the public 'sonata.core.flashmessage.twig.extension' shared service.
     *
     * @return \Sonata\CoreBundle\Twig\Extension\FlashMessageExtension
     */
    protected function getSonata_Core_Flashmessage_Twig_ExtensionService()
    {
        return $this->services['sonata.core.flashmessage.twig.extension'] = new \Sonata\CoreBundle\Twig\Extension\FlashMessageExtension();
    }

    /**
     * Gets the public 'translator' shared service.
     *
     * @return \Symfony\Component\Translation\DataCollectorTranslator
     */
    protected function getTranslatorService()
    {
        $a = new \Symfony\Bundle\FrameworkBundle\Translation\Translator(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, array(
            'translation.loader.csv' => array('privates', 'translation.loader.csv', 'getTranslation_Loader_CsvService.php', true),
            'translation.loader.dat' => array('privates', 'translation.loader.dat', 'getTranslation_Loader_DatService.php', true),
            'translation.loader.ini' => array('privates', 'translation.loader.ini', 'getTranslation_Loader_IniService.php', true),
            'translation.loader.json' => array('privates', 'translation.loader.json', 'getTranslation_Loader_JsonService.php', true),
            'translation.loader.mo' => array('privates', 'translation.loader.mo', 'getTranslation_Loader_MoService.php', true),
            'translation.loader.php' => array('privates', 'translation.loader.php', 'getTranslation_Loader_PhpService.php', true),
            'translation.loader.po' => array('privates', 'translation.loader.po', 'getTranslation_Loader_PoService.php', true),
            'translation.loader.qt' => array('privates', 'translation.loader.qt', 'getTranslation_Loader_QtService.php', true),
            'translation.loader.res' => array('privates', 'translation.loader.res', 'getTranslation_Loader_ResService.php', true),
            'translation.loader.xliff' => array('privates', 'translation.loader.xliff', 'getTranslation_Loader_XliffService.php', true),
            'translation.loader.yml' => array('privates', 'translation.loader.yml', 'getTranslation_Loader_YmlService.php', true),
        )), new \Symfony\Component\Translation\Formatter\MessageFormatter(new \Symfony\Component\Translation\IdentityTranslator()), 'en', array('translation.loader.php' => array(0 => 'php'), 'translation.loader.yml' => array(0 => 'yaml', 1 => 'yml'), 'translation.loader.xliff' => array(0 => 'xlf', 1 => 'xliff'), 'translation.loader.po' => array(0 => 'po'), 'translation.loader.mo' => array(0 => 'mo'), 'translation.loader.qt' => array(0 => 'ts'), 'translation.loader.csv' => array(0 => 'csv'), 'translation.loader.res' => array(0 => 'res'), 'translation.loader.dat' => array(0 => 'dat'), 'translation.loader.ini' => array(0 => 'ini'), 'translation.loader.json' => array(0 => 'json')), array('cache_dir' => ($this->targetDirs[0].'/translations'), 'debug' => true, 'resource_files' => array('af' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.af.xlf'), 'ar' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.ar.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.ar.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.ar.xlf', 3 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.ar.xliff', 4 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.ar.xliff'), 'az' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.az.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.az.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.az.xlf'), 'bg' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.bg.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.bg.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.bg.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.bg.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.bg.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.bg.xliff'), 'ca' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.ca.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.ca.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.ca.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.ca.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.ca.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.ca.xliff'), 'cs' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.cs.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.cs.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.cs.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.cs.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.cs.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.cs.xliff', 6 => '/app/vendor/scheb/two-factor-bundle/Resources/translations/messages.cs.yml'), 'cy' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.cy.xlf'), 'da' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.da.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.da.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.da.xlf'), 'de' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.de.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.de.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.de.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.de.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.de.xliff', 5 => '/app/vendor/sonata-project/block-bundle/src/Resources/translations/SonataBlockBundle.de.xliff', 6 => '/app/vendor/sonata-project/block-bundle/src/Resources/translations/validators.de.xliff', 7 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.de.xliff', 8 => '/app/vendor/scheb/two-factor-bundle/Resources/translations/messages.de.yml'), 'el' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.el.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.el.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.el.xlf'), 'en' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.en.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.en.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.en.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.en.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.en.xliff', 5 => '/app/vendor/sonata-project/block-bundle/src/Resources/translations/SonataBlockBundle.en.xliff', 6 => '/app/vendor/sonata-project/block-bundle/src/Resources/translations/validators.en.xliff', 7 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.en.xliff', 8 => '/app/vendor/scheb/two-factor-bundle/Resources/translations/messages.en.yml'), 'es' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.es.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.es.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.es.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.es.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.es.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.es.xliff', 6 => '/app/vendor/scheb/two-factor-bundle/Resources/translations/messages.es.yml'), 'et' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.et.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.et.xlf'), 'eu' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.eu.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.eu.xlf', 2 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.eu.xliff', 3 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.eu.xliff', 4 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.eu.xliff'), 'fa' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.fa.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.fa.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.fa.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.fa.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.fa.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.fa.xliff'), 'fi' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.fi.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.fi.xlf', 2 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.fi.xliff'), 'fr' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.fr.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.fr.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.fr.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.fr.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.fr.xliff', 5 => '/app/vendor/sonata-project/block-bundle/src/Resources/translations/SonataBlockBundle.fr.xliff', 6 => '/app/vendor/sonata-project/block-bundle/src/Resources/translations/validators.fr.xliff', 7 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.fr.xliff', 8 => '/app/vendor/scheb/two-factor-bundle/Resources/translations/messages.fr.yml'), 'gl' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.gl.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.gl.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.gl.xlf'), 'he' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.he.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.he.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.he.xlf'), 'hr' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.hr.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.hr.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.hr.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.hr.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.hr.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.hr.xliff', 6 => '/app/vendor/scheb/two-factor-bundle/Resources/translations/messages.hr.yml'), 'hu' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.hu.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.hu.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.hu.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.hu.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.hu.xliff', 5 => '/app/vendor/sonata-project/block-bundle/src/Resources/translations/SonataBlockBundle.hu.xliff', 6 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.hu.xliff', 7 => '/app/vendor/scheb/two-factor-bundle/Resources/translations/messages.hu.yml'), 'hy' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.hy.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.hy.xlf'), 'id' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.id.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.id.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.id.xlf'), 'it' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.it.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.it.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.it.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.it.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.it.xliff', 5 => '/app/vendor/sonata-project/block-bundle/src/Resources/translations/SonataBlockBundle.it.xliff', 6 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.it.xliff'), 'ja' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.ja.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.ja.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.ja.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.ja.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.ja.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.ja.xliff'), 'lb' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.lb.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.lb.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.lb.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.lb.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.lb.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.lb.xliff'), 'lt' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.lt.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.lt.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.lt.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.lt.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.lt.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.lt.xliff'), 'lv' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.lv.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.lv.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.lv.xlf', 3 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.lv.xliff'), 'mn' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.mn.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.mn.xlf'), 'nb' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.nb.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.nb.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.nb.xlf'), 'nl' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.nl.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.nl.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.nl.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.nl.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.nl.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.nl.xliff', 6 => '/app/vendor/scheb/two-factor-bundle/Resources/translations/messages.nl.yml'), 'nn' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.nn.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.nn.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.nn.xlf'), 'no' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.no.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.no.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.no.xlf', 3 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.no.xliff'), 'pl' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.pl.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.pl.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.pl.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.pl.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.pl.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.pl.xliff'), 'pt' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.pt.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.pt.xlf', 2 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.pt.xliff', 3 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.pt.xliff', 4 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.pt.xliff'), 'pt_BR' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.pt_BR.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.pt_BR.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.pt_BR.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.pt_BR.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.pt_BR.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.pt_BR.xliff'), 'ro' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.ro.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.ro.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.ro.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.ro.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.ro.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.ro.xliff', 6 => '/app/vendor/scheb/two-factor-bundle/Resources/translations/messages.ro.yml'), 'ru' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.ru.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.ru.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.ru.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.ru.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.ru.xliff', 5 => '/app/vendor/sonata-project/block-bundle/src/Resources/translations/SonataBlockBundle.ru.xliff', 6 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.ru.xliff', 7 => '/app/vendor/scheb/two-factor-bundle/Resources/translations/messages.ru.yml'), 'sk' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.sk.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.sk.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.sk.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.sk.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.sk.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.sk.xliff', 6 => '/app/vendor/scheb/two-factor-bundle/Resources/translations/messages.sk.yml'), 'sl' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.sl.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.sl.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.sl.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.sl.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.sl.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.sl.xliff'), 'sq' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.sq.xlf'), 'sr_Cyrl' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.sr_Cyrl.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.sr_Cyrl.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.sr_Cyrl.xlf'), 'sr_Latn' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.sr_Latn.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.sr_Latn.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.sr_Latn.xlf'), 'sv' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.sv.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.sv.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.sv.xlf', 3 => '/app/vendor/scheb/two-factor-bundle/Resources/translations/messages.sv.yml'), 'th' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.th.xlf', 1 => '/app/vendor/symfony/security/Core/Resources/translations/security.th.xlf'), 'tl' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.tl.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.tl.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.tl.xlf'), 'tr' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.tr.xlf', 1 => '/app/vendor/symfony/security/Core/Resources/translations/security.tr.xlf', 2 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.tr.xliff'), 'uk' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.uk.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.uk.xlf', 2 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.uk.xliff', 3 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.uk.xliff', 4 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.uk.xliff', 5 => '/app/vendor/scheb/two-factor-bundle/Resources/translations/messages.uk.yml'), 'vi' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.vi.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.vi.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.vi.xlf'), 'zh_CN' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.zh_CN.xlf', 1 => '/app/vendor/symfony/form/Resources/translations/validators.zh_CN.xlf', 2 => '/app/vendor/symfony/security/Core/Resources/translations/security.zh_CN.xlf', 3 => '/app/vendor/sonata-project/datagrid-bundle/src/Resources/translations/SonataDatagridBundle.zh_CN.xliff', 4 => '/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/translations/SonataCoreBundle.zh_CN.xliff', 5 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.zh_CN.xliff'), 'zh_TW' => array(0 => '/app/vendor/symfony/validator/Resources/translations/validators.zh_TW.xlf'), 'pt_PT' => array(0 => '/app/vendor/symfony/security/Core/Resources/translations/security.pt_PT.xlf'), 'ua' => array(0 => '/app/vendor/symfony/security/Core/Resources/translations/security.ua.xlf'), 'sv_SE' => array(0 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.sv_SE.xliff'), 'zh_HK' => array(0 => '/app/vendor/sonata-project/admin-bundle/src/Resources/translations/SonataAdminBundle.zh_HK.xliff'))));
        $a->setConfigCacheFactory(($this->privates['config_cache_factory'] ?? $this->getConfigCacheFactoryService()));
        $a->setFallbackLocales(array(0 => 'en'));

        return $this->services['translator'] = new \Symfony\Component\Translation\DataCollectorTranslator($a);
    }

    /**
     * Gets the public 'twig' shared service.
     *
     * @return \Twig\Environment
     */
    protected function getTwigService()
    {
        $a = new \Symfony\Bundle\TwigBundle\Loader\NativeFilesystemLoader(array(), '/app');
        $a->addPath('/app/vendor/knplabs/knp-menu/src/Knp/Menu/Resources/views');
        $a->addPath('/app/vendor/symfony/framework-bundle/Resources/views', 'Framework');
        $a->addPath('/app/vendor/symfony/framework-bundle/Resources/views', '!Framework');
        $a->addPath('/app/vendor/enqueue/enqueue-bundle/Resources/views', 'Enqueue');
        $a->addPath('/app/vendor/enqueue/enqueue-bundle/Resources/views', '!Enqueue');
        $a->addPath('/app/vendor/doctrine/doctrine-bundle/Resources/views', 'Doctrine');
        $a->addPath('/app/vendor/doctrine/doctrine-bundle/Resources/views', '!Doctrine');
        $a->addPath('/app/vendor/symfony/twig-bundle/Resources/views', 'Twig');
        $a->addPath('/app/vendor/symfony/twig-bundle/Resources/views', '!Twig');
        $a->addPath('/app/vendor/symfony/security-bundle/Resources/views', 'Security');
        $a->addPath('/app/vendor/symfony/security-bundle/Resources/views', '!Security');
        $a->addPath('/app/vendor/sonata-project/datagrid-bundle/src/Resources/views', 'SonataDatagrid');
        $a->addPath('/app/vendor/sonata-project/datagrid-bundle/src/Resources/views', '!SonataDatagrid');
        $a->addPath('/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/views', 'SonataCore');
        $a->addPath('/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/views', '!SonataCore');
        $a->addPath('/app/vendor/sonata-project/block-bundle/src/Resources/views', 'SonataBlock');
        $a->addPath('/app/vendor/sonata-project/block-bundle/src/Resources/views', '!SonataBlock');
        $a->addPath('/app/vendor/knplabs/knp-menu-bundle/src/Resources/views', 'KnpMenu');
        $a->addPath('/app/vendor/knplabs/knp-menu-bundle/src/Resources/views', '!KnpMenu');
        $a->addPath('/app/vendor/sonata-project/admin-bundle/src/Resources/views', 'SonataAdmin');
        $a->addPath('/app/vendor/sonata-project/admin-bundle/src/Resources/views', '!SonataAdmin');
        $a->addPath('/app/vendor/scheb/two-factor-bundle/Resources/views', 'SchebTwoFactor');
        $a->addPath('/app/vendor/scheb/two-factor-bundle/Resources/views', '!SchebTwoFactor');
        $a->addPath('/app/vendor/symfony/web-profiler-bundle/Resources/views', 'WebProfiler');
        $a->addPath('/app/vendor/symfony/web-profiler-bundle/Resources/views', '!WebProfiler');
        $a->addPath('/app/vendor/symfony/debug-bundle/Resources/views', 'Debug');
        $a->addPath('/app/vendor/symfony/debug-bundle/Resources/views', '!Debug');
        $a->addPath('/app/templates');
        $a->addPath('/app/vendor/symfony/twig-bridge/Resources/views/Form');

        $this->services['twig'] = $instance = new \Twig\Environment($a, array('paths' => array('/app/vendor/knplabs/knp-menu/src/Knp/Menu/Resources/views' => NULL), 'default_path' => '/app/templates', 'debug' => true, 'strict_variables' => true, 'exception_controller' => 'twig.controller.exception::showAction', 'form_themes' => $this->parameters['twig.form.resources'], 'autoescape' => 'name', 'cache' => ($this->targetDirs[0].'/twig'), 'charset' => 'UTF-8', 'date' => array('format' => 'F j, Y H:i', 'interval_format' => '%d days', 'timezone' => NULL), 'number_format' => array('decimals' => 0, 'decimal_point' => '.', 'thousands_separator' => ',')));

        $b = ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)));
        $c = ($this->services['translator'] ?? $this->getTranslatorService());
        $d = ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()));
        $e = ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService());
        $f = new \Knp\Menu\Util\MenuManipulator();
        $g = ($this->services['knp_menu.matcher'] ?? $this->getKnpMenu_MatcherService());
        $h = new \Symfony\Component\VarDumper\Dumper\HtmlDumper(NULL, 'UTF-8', 1);
        $h->setDisplayOptions(array('maxStringLength' => 4096, 'fileLinkFormat' => $e));
        $i = new \Symfony\Bridge\Twig\AppVariable();
        $i->setEnvironment('dev');
        $i->setDebug(true);
        if ($this->has('security.token_storage')) {
            $i->setTokenStorage(($this->services['security.token_storage'] ?? ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())));
        }
        if ($this->has('request_stack')) {
            $i->setRequestStack($d);
        }

        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\CsrfExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\ProfilerExtension(($this->privates['twig.profile'] ?? ($this->privates['twig.profile'] = new \Twig\Profiler\Profile())), $b));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension($c));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\AssetExtension(new \Symfony\Component\Asset\Packages(new \Symfony\Component\Asset\PathPackage('', new \Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy(), new \Symfony\Component\Asset\Context\RequestStackContext($d, '', false)), array())));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\CodeExtension($e, '/app', 'UTF-8'));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\RoutingExtension(($this->services['router'] ?? $this->getRouterService())));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\StopwatchExtension($b, true));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\ExpressionExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpKernelExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpFoundationExtension($d, ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService())));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension(array(0 => $this, 1 => 'twig.form.renderer')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\LogoutUrlExtension(($this->privates['security.logout_url_generator'] ?? $this->getSecurity_LogoutUrlGeneratorService())));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\SecurityExtension(($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService())));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\DumpExtension(($this->services['var_dumper.cloner'] ?? $this->getVarDumper_ClonerService()), ($this->privates['var_dumper.html_dumper'] ?? $this->getVarDumper_HtmlDumperService())));
        $instance->addExtension(new \Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension());
        $instance->addExtension(($this->services['sonata.core.flashmessage.twig.extension'] ?? ($this->services['sonata.core.flashmessage.twig.extension'] = new \Sonata\CoreBundle\Twig\Extension\FlashMessageExtension())));
        $instance->addExtension(new \Sonata\CoreBundle\Twig\Extension\FormTypeExtension('standard'));
        $instance->addExtension(new \Sonata\CoreBundle\Twig\Extension\DeprecatedTextExtension());
        $instance->addExtension(new \Sonata\CoreBundle\Twig\Extension\StatusExtension());
        $instance->addExtension(new \Sonata\CoreBundle\Twig\Extension\DeprecatedTemplateExtension());
        $instance->addExtension(new \Sonata\CoreBundle\Twig\Extension\TemplateExtension(true, $c, ($this->services['sonata.core.model.adapter.chain'] ?? $this->load('getSonata_Core_Model_Adapter_ChainService.php'))));
        $instance->addExtension(new \Sonata\BlockBundle\Twig\Extension\BlockExtension(($this->privates['sonata.block.templating.helper'] ?? $this->getSonata_Block_Templating_HelperService())));
        $instance->addExtension(new \Knp\Menu\Twig\MenuExtension(new \Knp\Menu\Twig\Helper(new \Knp\Menu\Renderer\PsrProvider(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, array(
            'list' => array('privates', 'knp_menu.renderer.list', 'getKnpMenu_Renderer_ListService.php', true),
            'twig' => array('privates', 'knp_menu.renderer.twig', 'getKnpMenu_Renderer_TwigService.php', true),
        )), 'twig'), ($this->privates['knp_menu.menu_provider.chain'] ?? $this->getKnpMenu_MenuProvider_ChainService()), $f, $g), $g, $f));
        $instance->addExtension(($this->services['sonata.admin.twig.extension'] ?? $this->getSonata_Admin_Twig_ExtensionService()));
        $instance->addExtension(new \Sonata\AdminBundle\Twig\Extension\TemplateRegistryExtension(($this->services['sonata.admin.global_template_registry'] ?? $this->getSonata_Admin_GlobalTemplateRegistryService()), $this));
        $instance->addExtension(new \Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension($h));
        $instance->addGlobal('app', $i);
        $instance->addRuntimeLoader(new \Twig\RuntimeLoader\ContainerRuntimeLoader(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, array(
            'Sonata\\CoreBundle\\Twig\\Extension\\StatusRuntime' => array('privates', 'sonata.core.twig.status_runtime', 'getSonata_Core_Twig_StatusRuntimeService.php', true),
            'Sonata\\Twig\\Extension\\FlashMessageRuntime' => array('privates', 'sonata.core.flashmessage.twig.runtime', 'getSonata_Core_Flashmessage_Twig_RuntimeService.php', true),
            'Symfony\\Bridge\\Twig\\Extension\\CsrfRuntime' => array('privates', 'twig.runtime.security_csrf', 'getTwig_Runtime_SecurityCsrfService.php', true),
            'Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => array('privates', 'twig.runtime.httpkernel', 'getTwig_Runtime_HttpkernelService.php', true),
            'Symfony\\Component\\Form\\FormRenderer' => array('privates', 'twig.form.renderer', 'getTwig_Form_RendererService.php', true),
        ))));
        $instance->addGlobal('sonata_block', new \Sonata\BlockBundle\Twig\GlobalVariables(array('block_base' => '@SonataBlock/Block/block_base.html.twig', 'block_container' => '@SonataBlock/Block/block_container.html.twig')));
        $instance->addGlobal('sonata_admin', ($this->services['sonata.admin.twig.global'] ?? $this->getSonata_Admin_Twig_GlobalService()));
        (new \Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator('F j, Y H:i', '%d days', NULL, 0, '.', ','))->configure($instance);

        return $instance;
    }

    /**
     * Gets the public 'validator' shared service.
     *
     * @return \Symfony\Component\Validator\Validator\TraceableValidator
     */
    protected function getValidatorService()
    {
        return $this->services['validator'] = new \Symfony\Component\Validator\Validator\TraceableValidator(($this->privates['validator.builder'] ?? $this->getValidator_BuilderService())->getValidator());
    }

    /**
     * Gets the public 'var_dumper.cloner' shared service.
     *
     * @return \Symfony\Component\VarDumper\Cloner\VarCloner
     */
    protected function getVarDumper_ClonerService()
    {
        $this->services['var_dumper.cloner'] = $instance = new \Symfony\Component\VarDumper\Cloner\VarCloner();

        $instance->setMaxItems(2500);
        $instance->setMinDepth(1);
        $instance->setMaxString(-1);

        return $instance;
    }

    /**
     * Gets the private 'annotations.cached_reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\CachedReader
     */
    protected function getAnnotations_CachedReaderService()
    {
        return $this->privates['annotations.cached_reader'] = new \Doctrine\Common\Annotations\CachedReader(($this->privates['annotations.reader'] ?? $this->getAnnotations_ReaderService()), $this->load('getAnnotations_CacheService.php'), true);
    }

    /**
     * Gets the private 'annotations.reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\AnnotationReader
     */
    protected function getAnnotations_ReaderService()
    {
        $this->privates['annotations.reader'] = $instance = new \Doctrine\Common\Annotations\AnnotationReader();

        $a = new \Doctrine\Common\Annotations\AnnotationRegistry();
        $a->registerUniqueLoader('class_exists');

        $instance->addGlobalIgnoredName('required', $a);

        return $instance;
    }

    /**
     * Gets the private 'cache.annotations' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_AnnotationsService()
    {
        return $this->privates['cache.annotations'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('dAwgFL9eCG', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'cache.security_expression_language' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SecurityExpressionLanguageService()
    {
        return $this->privates['cache.security_expression_language'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('n5wujiTlGi', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'cache.serializer' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SerializerService()
    {
        return $this->privates['cache.serializer'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('yy0QyweuqQ', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'cache.validator' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_ValidatorService()
    {
        return $this->privates['cache.validator'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('DvuAWZuC2E', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'config_cache_factory' shared service.
     *
     * @return \Symfony\Component\Config\ResourceCheckerConfigCacheFactory
     */
    protected function getConfigCacheFactoryService()
    {
        return $this->privates['config_cache_factory'] = new \Symfony\Component\Config\ResourceCheckerConfigCacheFactory(new RewindableGenerator(function () {
            yield 0 => ($this->privates['dependency_injection.config.container_parameters_resource_checker'] ?? ($this->privates['dependency_injection.config.container_parameters_resource_checker'] = new \Symfony\Component\DependencyInjection\Config\ContainerParametersResourceChecker($this)));
            yield 1 => ($this->privates['config.resource.self_checking_resource_checker'] ?? ($this->privates['config.resource.self_checking_resource_checker'] = new \Symfony\Component\Config\Resource\SelfCheckingResourceChecker()));
        }, 2));
    }

    /**
     * Gets the private 'data_collector.form' shared service.
     *
     * @return \Symfony\Component\Form\Extension\DataCollector\FormDataCollector
     */
    protected function getDataCollector_FormService()
    {
        return $this->privates['data_collector.form'] = new \Symfony\Component\Form\Extension\DataCollector\FormDataCollector(new \Symfony\Component\Form\Extension\DataCollector\FormDataExtractor());
    }

    /**
     * Gets the private 'debug.debug_handlers_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener
     */
    protected function getDebug_DebugHandlersListenerService()
    {
        $a = new \Symfony\Bridge\Monolog\Logger('php');
        $a->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $a->pushHandler(($this->privates['monolog.handler.console'] ?? ($this->privates['monolog.handler.console'] = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, true, array()))));
        $a->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $this->privates['debug.debug_handlers_listener'] = new \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener(NULL, $a, NULL, -1, true, ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService()), true);
    }

    /**
     * Gets the private 'debug.file_link_formatter' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Debug\FileLinkFormatter
     */
    protected function getDebug_FileLinkFormatterService()
    {
        return $this->privates['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL, ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), '/app', function () {
            return ($this->privates['debug.file_link_formatter.url_format'] ?? $this->load('getDebug_FileLinkFormatter_UrlFormatService.php'));
        });
    }

    /**
     * Gets the private 'debug.log_processor' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Processor\DebugProcessor
     */
    protected function getDebug_LogProcessorService()
    {
        return $this->privates['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }

    /**
     * Gets the private 'debug.security.access.decision_manager' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\TraceableAccessDecisionManager
     */
    protected function getDebug_Security_Access_DecisionManagerService()
    {
        return $this->privates['debug.security.access.decision_manager'] = new \Symfony\Component\Security\Core\Authorization\TraceableAccessDecisionManager(new \Symfony\Component\Security\Core\Authorization\AccessDecisionManager(new RewindableGenerator(function () {
            yield 0 => ($this->privates['debug.security.voter.security.access.authenticated_voter'] ?? $this->load('getDebug_Security_Voter_Security_Access_AuthenticatedVoterService.php'));
            yield 1 => ($this->privates['debug.security.voter.scheb_two_factor.security.access.authenticated_voter'] ?? $this->load('getDebug_Security_Voter_SchebTwoFactor_Security_Access_AuthenticatedVoterService.php'));
            yield 2 => ($this->privates['debug.security.voter.security.access.role_hierarchy_voter'] ?? $this->load('getDebug_Security_Voter_Security_Access_RoleHierarchyVoterService.php'));
            yield 3 => ($this->privates['debug.security.voter.security.access.expression_voter'] ?? $this->load('getDebug_Security_Voter_Security_Access_ExpressionVoterService.php'));
        }, 4), 'unanimous', false, true));
    }

    /**
     * Gets the private 'debug.security.firewall' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Debug\TraceableFirewallListener
     */
    protected function getDebug_Security_FirewallService()
    {
        return $this->privates['debug.security.firewall'] = new \Symfony\Bundle\SecurityBundle\Debug\TraceableFirewallListener(($this->privates['security.firewall.map'] ?? $this->getSecurity_Firewall_MapService()), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->privates['security.logout_url_generator'] ?? $this->getSecurity_LogoutUrlGeneratorService()));
    }

    /**
     * Gets the private 'enqueue.client.default.context' shared service.
     *
     * @return \Interop\Queue\Context
     */
    protected function getEnqueue_Client_Default_ContextService()
    {
        return $this->privates['enqueue.client.default.context'] = ($this->privates['enqueue.client.default.driver'] ?? $this->getEnqueue_Client_Default_DriverService())->getContext();
    }

    /**
     * Gets the private 'enqueue.client.default.driver' shared service.
     *
     * @return \Enqueue\Client\DriverInterface
     */
    protected function getEnqueue_Client_Default_DriverService()
    {
        return $this->privates['enqueue.client.default.driver'] = (new \Enqueue\Client\DriverFactory())->create(($this->privates['enqueue.transport.default.connection_factory'] ?? $this->getEnqueue_Transport_Default_ConnectionFactoryService()), new \Enqueue\Client\Config('enqueue', '.', 'app', 'default', 'default', 'default', 'enqueue.client.default.router_processor', array('dsn' => $this->getEnv('resolve:ENQUEUE_DSN')), array()), \Enqueue\Client\RouteCollection::fromArray(array()));
    }

    /**
     * Gets the private 'enqueue.transport.default.connection_factory' shared service.
     *
     * @return \Interop\Queue\ConnectionFactory
     */
    protected function getEnqueue_Transport_Default_ConnectionFactoryService()
    {
        return $this->privates['enqueue.transport.default.connection_factory'] = (new \Enqueue\ConnectionFactoryFactory())->create(array('dsn' => $this->getEnv('resolve:ENQUEUE_DSN')));
    }

    /**
     * Gets the private 'knp_menu.menu_provider.chain' shared service.
     *
     * @return \Knp\Menu\Provider\ChainProvider
     */
    protected function getKnpMenu_MenuProvider_ChainService()
    {
        return $this->privates['knp_menu.menu_provider.chain'] = new \Knp\Menu\Provider\ChainProvider(new RewindableGenerator(function () {
            yield 0 => ($this->privates['knp_menu.menu_provider.lazy'] ?? $this->load('getKnpMenu_MenuProvider_LazyService.php'));
            yield 1 => ($this->privates['knp_menu.menu_provider.builder_alias'] ?? $this->load('getKnpMenu_MenuProvider_BuilderAliasService.php'));
            yield 2 => ($this->privates['sonata.admin.menu.group_provider'] ?? $this->load('getSonata_Admin_Menu_GroupProviderService.php'));
        }, 3));
    }

    /**
     * Gets the private 'locale_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleListener
     */
    protected function getLocaleListenerService()
    {
        return $this->privates['locale_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleListener(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), 'en', ($this->services['router'] ?? $this->getRouterService()));
    }

    /**
     * Gets the private 'monolog.handler.main' shared service.
     *
     * @return \Monolog\Handler\StreamHandler
     */
    protected function getMonolog_Handler_MainService()
    {
        $this->privates['monolog.handler.main'] = $instance = new \Monolog\Handler\StreamHandler(($this->targetDirs[2].'/log/dev.log'), 100, true, NULL);

        $instance->pushProcessor(new \Monolog\Processor\PsrLogMessageProcessor());

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_LoggerService()
    {
        $this->privates['monolog.logger'] = $instance = new \Symfony\Bridge\Monolog\Logger('app');

        $instance->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $instance->useMicrosecondTimestamps(true);
        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? ($this->privates['monolog.handler.console'] = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, true, array()))));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.cache' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_CacheService()
    {
        $this->privates['monolog.logger.cache'] = $instance = new \Symfony\Bridge\Monolog\Logger('cache');

        $instance->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? ($this->privates['monolog.handler.console'] = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, true, array()))));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.request' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_RequestService()
    {
        $this->privates['monolog.logger.request'] = $instance = new \Symfony\Bridge\Monolog\Logger('request');

        $instance->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? ($this->privates['monolog.handler.console'] = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, true, array()))));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /**
     * Gets the private 'parameter_bag' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag
     */
    protected function getParameterBagService()
    {
        return $this->privates['parameter_bag'] = new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($this);
    }

    /**
     * Gets the private 'profiler_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ProfilerListener
     */
    protected function getProfilerListenerService()
    {
        return $this->privates['profiler_listener'] = new \Symfony\Component\HttpKernel\EventListener\ProfilerListener(($this->services['profiler'] ?? $this->getProfilerService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), NULL, false, false);
    }

    /**
     * Gets the private 'property_accessor' shared service.
     *
     * @return \Symfony\Component\PropertyAccess\PropertyAccessor
     */
    protected function getPropertyAccessorService()
    {
        return $this->privates['property_accessor'] = new \Symfony\Component\PropertyAccess\PropertyAccessor(false, false, new \Symfony\Component\Cache\Adapter\ArrayAdapter(0, false));
    }

    /**
     * Gets the private 'resolve_controller_name_subscriber' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\EventListener\ResolveControllerNameSubscriber
     */
    protected function getResolveControllerNameSubscriberService()
    {
        return $this->privates['resolve_controller_name_subscriber'] = new \Symfony\Bundle\FrameworkBundle\EventListener\ResolveControllerNameSubscriber(($this->privates['controller_name_converter'] ?? ($this->privates['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(($this->services['kernel'] ?? $this->get('kernel', 1))))));
    }

    /**
     * Gets the private 'router.request_context' shared service.
     *
     * @return \Symfony\Component\Routing\RequestContext
     */
    protected function getRouter_RequestContextService()
    {
        return $this->privates['router.request_context'] = new \Symfony\Component\Routing\RequestContext('', 'GET', 'localhost', 'http', 80, 443);
    }

    /**
     * Gets the private 'router_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\RouterListener
     */
    protected function getRouterListenerService()
    {
        return $this->privates['router_listener'] = new \Symfony\Component\HttpKernel\EventListener\RouterListener(($this->services['router'] ?? $this->getRouterService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()), ($this->privates['monolog.logger.request'] ?? $this->getMonolog_Logger_RequestService()), '/app', true);
    }

    /**
     * Gets the private 'scheb_two_factor.trusted_cookie_response_listener' shared service.
     *
     * @return \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedCookieResponseListener
     */
    protected function getSchebTwoFactor_TrustedCookieResponseListenerService($lazyLoad = true)
    {
        return $this->privates['scheb_two_factor.trusted_cookie_response_listener'] = new \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedCookieResponseListener($this->getSchebTwoFactor_TrustedTokenStorageService(), 5184000, 'trusted_device', false, 'lax');
    }

    /**
     * Gets the private 'scheb_two_factor.trusted_token_storage' shared service.
     *
     * @return \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage
     */
    protected function getSchebTwoFactor_TrustedTokenStorageService($lazyLoad = true)
    {
        return new \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), new \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\JwtTokenEncoder($this->getEnv('APP_SECRET')), 'trusted_device', 5184000);
    }

    /**
     * Gets the private 'security.authentication.manager' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager
     */
    protected function getSecurity_Authentication_ManagerService()
    {
        $this->privates['security.authentication.manager'] = $instance = new \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager(new RewindableGenerator(function () {
            yield 0 => ($this->privates['security.authentication.provider.guard.admin.two_factor_decorator'] ?? $this->load('getSecurity_Authentication_Provider_Guard_Admin_TwoFactorDecoratorService.php'));
            yield 1 => ($this->privates['security.authentication.provider.two_factor.admin'] ?? $this->load('getSecurity_Authentication_Provider_TwoFactor_AdminService.php'));
            yield 2 => ($this->privates['security.authentication.provider.anonymous.admin.two_factor_decorator'] ?? $this->load('getSecurity_Authentication_Provider_Anonymous_Admin_TwoFactorDecoratorService.php'));
        }, 3), false);

        $instance->setEventDispatcher(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));

        return $instance;
    }

    /**
     * Gets the private 'security.firewall.map' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallMap
     */
    protected function getSecurity_Firewall_MapService()
    {
        return $this->privates['security.firewall.map'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallMap(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, array(
            'security.firewall.map.context.admin' => array('privates', 'security.firewall.map.context.admin', 'getSecurity_Firewall_Map_Context_AdminService.php', true),
            'security.firewall.map.context.dev' => array('privates', 'security.firewall.map.context.dev', 'getSecurity_Firewall_Map_Context_DevService.php', true),
        )), new RewindableGenerator(function () {
            yield 'security.firewall.map.context.dev' => ($this->privates['.security.request_matcher.Iy.T22O'] ?? ($this->privates['.security.request_matcher.Iy.T22O'] = new \Symfony\Component\HttpFoundation\RequestMatcher('^/(_(profiler|wdt)|css|images|js)/')));
            yield 'security.firewall.map.context.admin' => ($this->privates['.security.request_matcher.B3ldH_a'] ?? ($this->privates['.security.request_matcher.B3ldH_a'] = new \Symfony\Component\HttpFoundation\RequestMatcher('^/admin')));
        }, 2));
    }

    /**
     * Gets the private 'security.logout_url_generator' shared service.
     *
     * @return \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator
     */
    protected function getSecurity_LogoutUrlGeneratorService()
    {
        $this->privates['security.logout_url_generator'] = $instance = new \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->services['router'] ?? $this->getRouterService()), ($this->services['security.token_storage'] ?? ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())));

        $instance->registerListener('admin', 'app_admin_logout', 'logout', '_csrf_token', NULL, 'main_context');

        return $instance;
    }

    /**
     * Gets the private 'security.role_hierarchy' shared service.
     *
     * @return \Symfony\Component\Security\Core\Role\RoleHierarchy
     */
    protected function getSecurity_RoleHierarchyService()
    {
        return $this->privates['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy($this->parameters['security.role_hierarchy.roles']);
    }

    /**
     * Gets the private 'session_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\SessionListener
     */
    protected function getSessionListenerService()
    {
        return $this->privates['session_listener'] = new \Symfony\Component\HttpKernel\EventListener\SessionListener(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, array(
            'initialized_session' => array('services', 'session', NULL, true),
            'request_stack' => array('services', 'request_stack', 'getRequestStackService', false),
            'session' => array('services', 'session', 'getSessionService.php', true),
            'session_storage' => array('privates', 'session.storage.native', 'getSession_Storage_NativeService.php', true),
        )));
    }

    /**
     * Gets the private 'sonata.block.templating.helper' shared service.
     *
     * @return \Sonata\BlockBundle\Templating\Helper\BlockHelper
     */
    protected function getSonata_Block_Templating_HelperService()
    {
        return $this->privates['sonata.block.templating.helper'] = new \Sonata\BlockBundle\Templating\Helper\BlockHelper(($this->services['sonata.block.manager'] ?? $this->getSonata_Block_ManagerService()), $this->parameters['sonata_block.cache_blocks'], ($this->services['sonata.block.renderer.default'] ?? $this->getSonata_Block_Renderer_DefaultService()), ($this->services['sonata.block.context_manager.default'] ?? $this->getSonata_Block_ContextManager_DefaultService()), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), NULL, ($this->privates['sonata.block.cache.handler.default'] ?? ($this->privates['sonata.block.cache.handler.default'] = new \Sonata\BlockBundle\Cache\HttpCacheHandler())), ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))));
    }

    /**
     * Gets the private 'translator_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\TranslatorListener
     */
    protected function getTranslatorListenerService()
    {
        return $this->privates['translator_listener'] = new \Symfony\Component\HttpKernel\EventListener\TranslatorListener(($this->services['translator'] ?? $this->getTranslatorService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }

    /**
     * Gets the private 'validator.builder' shared service.
     *
     * @return \Symfony\Component\Validator\ValidatorBuilderInterface
     */
    protected function getValidator_BuilderService()
    {
        $this->privates['validator.builder'] = $instance = \Symfony\Component\Validator\Validation::createValidatorBuilder();

        $instance->setConstraintValidatorFactory(($this->privates['validator.validator_factory'] ?? $this->getValidator_ValidatorFactoryService()));
        $instance->setTranslator(($this->services['translator'] ?? $this->getTranslatorService()));
        $instance->setTranslationDomain('validators');
        $instance->addXmlMappings(array(0 => '/app/vendor/symfony/form/Resources/config/validation.xml'));
        $instance->enableAnnotationMapping(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()));
        $instance->addMethodMapping('loadValidatorMetadata');
        $instance->addObjectInitializers(array(0 => new \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer(($this->services['doctrine'] ?? $this->getDoctrineService()))));

        return $instance;
    }

    /**
     * Gets the private 'validator.validator_factory' shared service.
     *
     * @return \Symfony\Component\Validator\ContainerConstraintValidatorFactory
     */
    protected function getValidator_ValidatorFactoryService()
    {
        return $this->privates['validator.validator_factory'] = new \Symfony\Component\Validator\ContainerConstraintValidatorFactory(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, array(
            'Sonata\\CoreBundle\\Validator\\InlineValidator' => array('services', 'sonata.admin.validator.inline', 'getSonata_Admin_Validator_InlineService.php', true),
            'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator' => array('privates', 'doctrine.orm.validator.unique', 'getDoctrine_Orm_Validator_UniqueService.php', true),
            'Symfony\\Component\\Security\\Core\\Validator\\Constraints\\UserPasswordValidator' => array('privates', 'security.validator.user_password', 'getSecurity_Validator_UserPasswordService.php', true),
            'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => array('privates', 'validator.email', 'getValidator_EmailService.php', true),
            'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator' => array('privates', 'validator.expression', 'getValidator_ExpressionService.php', true),
            'doctrine.orm.validator.unique' => array('privates', 'doctrine.orm.validator.unique', 'getDoctrine_Orm_Validator_UniqueService.php', true),
            'security.validator.user_password' => array('privates', 'security.validator.user_password', 'getSecurity_Validator_UserPasswordService.php', true),
            'sonata.admin.validator.inline' => array('services', 'sonata.admin.validator.inline', 'getSonata_Admin_Validator_InlineService.php', true),
            'sonata.core.validator.inline' => array('privates', 'sonata.core.validator.inline', 'getSonata_Core_Validator_InlineService.php', true),
            'validator.expression' => array('privates', 'validator.expression', 'getValidator_ExpressionService.php', true),
        )));
    }

    /**
     * Gets the private 'var_dumper.html_dumper' shared service.
     *
     * @return \Symfony\Component\VarDumper\Dumper\HtmlDumper
     */
    protected function getVarDumper_HtmlDumperService()
    {
        $this->privates['var_dumper.html_dumper'] = $instance = new \Symfony\Component\VarDumper\Dumper\HtmlDumper(NULL, 'UTF-8', 0);

        $instance->setDisplayOptions(array('fileLinkFormat' => ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService())));

        return $instance;
    }

    /**
     * Gets the private 'var_dumper.server_connection' shared service.
     *
     * @return \Symfony\Component\VarDumper\Server\Connection
     */
    protected function getVarDumper_ServerConnectionService()
    {
        return $this->privates['var_dumper.server_connection'] = new \Symfony\Component\VarDumper\Server\Connection('tcp://'.$this->getEnv('string:VAR_DUMPER_SERVER'), array('source' => new \Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider('UTF-8', '/app', ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService())), 'request' => new \Symfony\Component\VarDumper\Dumper\ContextProvider\RequestContextProvider(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()))), 'cli' => new \Symfony\Component\VarDumper\Dumper\ContextProvider\CliContextProvider()));
    }

    /**
     * Gets the private 'web_profiler.csp.handler' shared service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\Csp\ContentSecurityPolicyHandler
     */
    protected function getWebProfiler_Csp_HandlerService()
    {
        return $this->privates['web_profiler.csp.handler'] = new \Symfony\Bundle\WebProfilerBundle\Csp\ContentSecurityPolicyHandler(new \Symfony\Bundle\WebProfilerBundle\Csp\NonceGenerator());
    }

    /**
     * Gets the private 'web_profiler.debug_toolbar' shared service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener
     */
    protected function getWebProfiler_DebugToolbarService()
    {
        return $this->privates['web_profiler.debug_toolbar'] = new \Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener(($this->services['twig'] ?? $this->getTwigService()), false, 2, ($this->services['router'] ?? $this->getRouterService()), '^/((index|app(_[\\w]+)?)\\.php/)?_wdt', ($this->privates['web_profiler.csp.handler'] ?? $this->getWebProfiler_Csp_HandlerService()));
    }

    public function getParameter($name)
    {
        $name = (string) $name;
        if (isset($this->buildParameters[$name])) {
            return $this->buildParameters[$name];
        }

        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name)
    {
        $name = (string) $name;
        if (isset($this->buildParameters[$name])) {
            return true;
        }

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            foreach ($this->buildParameters as $name => $value) {
                $parameters[$name] = $value;
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = array(
        'kernel.cache_dir' => false,
        'kernel.logs_dir' => false,
        'kernel.secret' => false,
        'session.save_path' => false,
        'validator.mapping.cache.file' => false,
        'profiler.storage.dsn' => false,
        'debug.container.dump' => false,
        'doctrine.orm.proxy_dir' => false,
    );
    private $dynamicParameters = array();

    /**
     * Computes a dynamic parameter.
     *
     * @param string $name The name of the dynamic parameter to load
     *
     * @return mixed The value of the dynamic parameter
     *
     * @throws InvalidArgumentException When the dynamic parameter does not exist
     */
    private function getDynamicParameter($name)
    {
        switch ($name) {
            case 'kernel.cache_dir': $value = $this->targetDirs[0]; break;
            case 'kernel.logs_dir': $value = ($this->targetDirs[2].'/log'); break;
            case 'kernel.secret': $value = $this->getEnv('APP_SECRET'); break;
            case 'session.save_path': $value = ($this->targetDirs[0].'/sessions'); break;
            case 'validator.mapping.cache.file': $value = ($this->targetDirs[0].'/validation.php'); break;
            case 'profiler.storage.dsn': $value = ('file:'.$this->targetDirs[0].'/profiler'); break;
            case 'debug.container.dump': $value = ($this->targetDirs[0].'/srcApp_KernelDevDebugContainer.xml'); break;
            case 'doctrine.orm.proxy_dir': $value = ($this->targetDirs[0].'/doctrine/orm/Proxies'); break;
            default: throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
        }
        $this->loadedDynamicParameters[$name] = true;

        return $this->dynamicParameters[$name] = $value;
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return array(
            'kernel.root_dir' => '/app/src',
            'kernel.project_dir' => '/app',
            'kernel.environment' => 'dev',
            'kernel.debug' => true,
            'kernel.name' => 'src',
            'kernel.bundles' => array(
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'EnqueueBundle' => 'Enqueue\\Bundle\\EnqueueBundle',
                'DoctrineCacheBundle' => 'Doctrine\\Bundle\\DoctrineCacheBundle\\DoctrineCacheBundle',
                'DoctrineBundle' => 'Doctrine\\Bundle\\DoctrineBundle\\DoctrineBundle',
                'DoctrineMigrationsBundle' => 'Doctrine\\Bundle\\MigrationsBundle\\DoctrineMigrationsBundle',
                'DoctrineFixturesBundle' => 'Doctrine\\Bundle\\FixturesBundle\\DoctrineFixturesBundle',
                'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle',
                'SecurityBundle' => 'Symfony\\Bundle\\SecurityBundle\\SecurityBundle',
                'SonataDatagridBundle' => 'Sonata\\DatagridBundle\\SonataDatagridBundle',
                'SonataCoreBundle' => 'Sonata\\CoreBundle\\SonataCoreBundle',
                'SonataBlockBundle' => 'Sonata\\BlockBundle\\SonataBlockBundle',
                'KnpMenuBundle' => 'Knp\\Bundle\\MenuBundle\\KnpMenuBundle',
                'SonataAdminBundle' => 'Sonata\\AdminBundle\\SonataAdminBundle',
                'SchebTwoFactorBundle' => 'Scheb\\TwoFactorBundle\\SchebTwoFactorBundle',
                'MakerBundle' => 'Symfony\\Bundle\\MakerBundle\\MakerBundle',
                'WebProfilerBundle' => 'Symfony\\Bundle\\WebProfilerBundle\\WebProfilerBundle',
                'MonologBundle' => 'Symfony\\Bundle\\MonologBundle\\MonologBundle',
                'DebugBundle' => 'Symfony\\Bundle\\DebugBundle\\DebugBundle',
            ),
            'kernel.bundles_metadata' => array(
                'FrameworkBundle' => array(
                    'path' => '/app/vendor/symfony/framework-bundle',
                    'namespace' => 'Symfony\\Bundle\\FrameworkBundle',
                ),
                'EnqueueBundle' => array(
                    'path' => '/app/vendor/enqueue/enqueue-bundle',
                    'namespace' => 'Enqueue\\Bundle',
                ),
                'DoctrineCacheBundle' => array(
                    'path' => '/app/vendor/doctrine/doctrine-cache-bundle',
                    'namespace' => 'Doctrine\\Bundle\\DoctrineCacheBundle',
                ),
                'DoctrineBundle' => array(
                    'path' => '/app/vendor/doctrine/doctrine-bundle',
                    'namespace' => 'Doctrine\\Bundle\\DoctrineBundle',
                ),
                'DoctrineMigrationsBundle' => array(
                    'path' => '/app/vendor/doctrine/doctrine-migrations-bundle',
                    'namespace' => 'Doctrine\\Bundle\\MigrationsBundle',
                ),
                'DoctrineFixturesBundle' => array(
                    'path' => '/app/vendor/doctrine/doctrine-fixtures-bundle',
                    'namespace' => 'Doctrine\\Bundle\\FixturesBundle',
                ),
                'TwigBundle' => array(
                    'path' => '/app/vendor/symfony/twig-bundle',
                    'namespace' => 'Symfony\\Bundle\\TwigBundle',
                ),
                'SecurityBundle' => array(
                    'path' => '/app/vendor/symfony/security-bundle',
                    'namespace' => 'Symfony\\Bundle\\SecurityBundle',
                ),
                'SonataDatagridBundle' => array(
                    'path' => '/app/vendor/sonata-project/datagrid-bundle/src',
                    'namespace' => 'Sonata\\DatagridBundle',
                ),
                'SonataCoreBundle' => array(
                    'path' => '/app/vendor/sonata-project/core-bundle/src/CoreBundle',
                    'namespace' => 'Sonata\\CoreBundle',
                ),
                'SonataBlockBundle' => array(
                    'path' => '/app/vendor/sonata-project/block-bundle/src',
                    'namespace' => 'Sonata\\BlockBundle',
                ),
                'KnpMenuBundle' => array(
                    'path' => '/app/vendor/knplabs/knp-menu-bundle/src',
                    'namespace' => 'Knp\\Bundle\\MenuBundle',
                ),
                'SonataAdminBundle' => array(
                    'path' => '/app/vendor/sonata-project/admin-bundle/src',
                    'namespace' => 'Sonata\\AdminBundle',
                ),
                'SchebTwoFactorBundle' => array(
                    'path' => '/app/vendor/scheb/two-factor-bundle',
                    'namespace' => 'Scheb\\TwoFactorBundle',
                ),
                'MakerBundle' => array(
                    'path' => '/app/vendor/symfony/maker-bundle/src',
                    'namespace' => 'Symfony\\Bundle\\MakerBundle',
                ),
                'WebProfilerBundle' => array(
                    'path' => '/app/vendor/symfony/web-profiler-bundle',
                    'namespace' => 'Symfony\\Bundle\\WebProfilerBundle',
                ),
                'MonologBundle' => array(
                    'path' => '/app/vendor/symfony/monolog-bundle',
                    'namespace' => 'Symfony\\Bundle\\MonologBundle',
                ),
                'DebugBundle' => array(
                    'path' => '/app/vendor/symfony/debug-bundle',
                    'namespace' => 'Symfony\\Bundle\\DebugBundle',
                ),
            ),
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'srcApp_KernelDevDebugContainer',
            'container.dumper.inline_class_loader' => true,
            'env(DATABASE_URL)' => '',
            'locale' => 'en',
            'fragment.renderer.hinclude.global_template' => '',
            'fragment.path' => '/_fragment',
            'kernel.http_method_override' => true,
            'kernel.trusted_hosts' => array(

            ),
            'kernel.default_locale' => 'en',
            'templating.helper.code.file_link_format' => NULL,
            'debug.file_link_format' => NULL,
            'session.metadata.storage_key' => '_sf2_meta',
            'session.storage.options' => array(
                'cache_limiter' => '0',
                'cookie_secure' => 'auto',
                'cookie_httponly' => true,
                'cookie_samesite' => 'lax',
                'gc_probability' => 1,
            ),
            'session.metadata.update_threshold' => 0,
            'form.type_extension.csrf.enabled' => true,
            'form.type_extension.csrf.field_name' => '_token',
            'asset.request_context.base_path' => '',
            'asset.request_context.secure' => false,
            'validator.mapping.cache.prefix' => '',
            'validator.translation_domain' => 'validators',
            'translator.logging' => false,
            'translator.default_path' => '/app/translations',
            'profiler_listener.only_exceptions' => false,
            'profiler_listener.only_master_requests' => false,
            'debug.error_handler.throw_at' => -1,
            'router.request_context.host' => 'localhost',
            'router.request_context.scheme' => 'http',
            'router.request_context.base_url' => '',
            'router.resource' => 'kernel::loadRoutes',
            'router.cache_class_prefix' => 'srcApp_KernelDevDebugContainer',
            'request_listener.http_port' => 80,
            'request_listener.https_port' => 443,
            'enqueue.transport.default.receive_timeout' => 10000,
            'enqueue.client.default.router_processor' => 'enqueue.client.default.router_processor',
            'enqueue.client.default.router_queue_name' => 'default',
            'enqueue.client.default.default_queue_name' => 'default',
            'enqueue.transports' => array(
                0 => 'default',
            ),
            'enqueue.clients' => array(
                0 => 'default',
            ),
            'enqueue.default_transport' => 'default',
            'enqueue.default_client' => 'default',
            'doctrine_cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine_cache.apcu.class' => 'Doctrine\\Common\\Cache\\ApcuCache',
            'doctrine_cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine_cache.chain.class' => 'Doctrine\\Common\\Cache\\ChainCache',
            'doctrine_cache.couchbase.class' => 'Doctrine\\Common\\Cache\\CouchbaseCache',
            'doctrine_cache.couchbase.connection.class' => 'Couchbase',
            'doctrine_cache.couchbase.hostnames' => 'localhost:8091',
            'doctrine_cache.file_system.class' => 'Doctrine\\Common\\Cache\\FilesystemCache',
            'doctrine_cache.php_file.class' => 'Doctrine\\Common\\Cache\\PhpFileCache',
            'doctrine_cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine_cache.memcache.connection.class' => 'Memcache',
            'doctrine_cache.memcache.host' => 'localhost',
            'doctrine_cache.memcache.port' => 11211,
            'doctrine_cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine_cache.memcached.connection.class' => 'Memcached',
            'doctrine_cache.memcached.host' => 'localhost',
            'doctrine_cache.memcached.port' => 11211,
            'doctrine_cache.mongodb.class' => 'Doctrine\\Common\\Cache\\MongoDBCache',
            'doctrine_cache.mongodb.collection.class' => 'MongoCollection',
            'doctrine_cache.mongodb.connection.class' => 'MongoClient',
            'doctrine_cache.mongodb.server' => 'localhost:27017',
            'doctrine_cache.predis.client.class' => 'Predis\\Client',
            'doctrine_cache.predis.scheme' => 'tcp',
            'doctrine_cache.predis.host' => 'localhost',
            'doctrine_cache.predis.port' => 6379,
            'doctrine_cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine_cache.redis.connection.class' => 'Redis',
            'doctrine_cache.redis.host' => 'localhost',
            'doctrine_cache.redis.port' => 6379,
            'doctrine_cache.riak.class' => 'Doctrine\\Common\\Cache\\RiakCache',
            'doctrine_cache.riak.bucket.class' => 'Riak\\Bucket',
            'doctrine_cache.riak.connection.class' => 'Riak\\Connection',
            'doctrine_cache.riak.bucket_property_list.class' => 'Riak\\BucketPropertyList',
            'doctrine_cache.riak.host' => 'localhost',
            'doctrine_cache.riak.port' => 8087,
            'doctrine_cache.sqlite3.class' => 'Doctrine\\Common\\Cache\\SQLite3Cache',
            'doctrine_cache.sqlite3.connection.class' => 'SQLite3',
            'doctrine_cache.void.class' => 'Doctrine\\Common\\Cache\\VoidCache',
            'doctrine_cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine_cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine_cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine_cache.security.acl.cache.class' => 'Doctrine\\Bundle\\DoctrineCacheBundle\\Acl\\Model\\AclCache',
            'doctrine.dbal.logger.chain.class' => 'Doctrine\\DBAL\\Logging\\LoggerChain',
            'doctrine.dbal.logger.profiling.class' => 'Doctrine\\DBAL\\Logging\\DebugStack',
            'doctrine.dbal.logger.class' => 'Symfony\\Bridge\\Doctrine\\Logger\\DbalLogger',
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Doctrine\\Bundle\\DoctrineBundle\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Symfony\\Bridge\\Doctrine\\ContainerAwareEventManager',
            'doctrine.dbal.connection_factory.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Registry',
            'doctrine.entity_managers' => array(
                'default' => 'doctrine.orm.default_entity_manager',
            ),
            'doctrine.default_entity_manager' => 'default',
            'doctrine.dbal.connection_factory.types' => array(

            ),
            'doctrine.connections' => array(
                'default' => 'doctrine.dbal.default_connection',
            ),
            'doctrine.default_connection' => 'default',
            'doctrine.orm.configuration.class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager.class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.manager_configurator.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ManagerConfigurator',
            'doctrine.orm.cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance.class' => 'Memcache',
            'doctrine.orm.cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine.orm.cache.memcached_host' => 'localhost',
            'doctrine.orm.cache.memcached_port' => 11211,
            'doctrine.orm.cache.memcached_instance.class' => 'Memcached',
            'doctrine.orm.cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine.orm.cache.redis_host' => 'localhost',
            'doctrine.orm.cache.redis_port' => 6379,
            'doctrine.orm.cache.redis_instance.class' => 'Redis',
            'doctrine.orm.cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine.orm.cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine.orm.metadata.driver_chain.class' => 'Doctrine\\Common\\Persistence\\Mapping\\Driver\\MappingDriverChain',
            'doctrine.orm.metadata.annotation.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.xml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedXmlDriver',
            'doctrine.orm.metadata.yml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedYamlDriver',
            'doctrine.orm.metadata.php.class' => 'Doctrine\\ORM\\Mapping\\Driver\\PHPDriver',
            'doctrine.orm.metadata.staticphp.class' => 'Doctrine\\ORM\\Mapping\\Driver\\StaticPHPDriver',
            'doctrine.orm.proxy_cache_warmer.class' => 'Symfony\\Bridge\\Doctrine\\CacheWarmer\\ProxyCacheWarmer',
            'form.type_guesser.doctrine.class' => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser',
            'doctrine.orm.validator.unique.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator',
            'doctrine.orm.validator_initializer.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\DoctrineInitializer',
            'doctrine.orm.security.user.provider.class' => 'Symfony\\Bridge\\Doctrine\\Security\\User\\EntityUserProvider',
            'doctrine.orm.listeners.resolve_target_entity.class' => 'Doctrine\\ORM\\Tools\\ResolveTargetEntityListener',
            'doctrine.orm.listeners.attach_entity_listeners.class' => 'Doctrine\\ORM\\Tools\\AttachEntityListenersListener',
            'doctrine.orm.naming_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultNamingStrategy',
            'doctrine.orm.naming_strategy.underscore.class' => 'Doctrine\\ORM\\Mapping\\UnderscoreNamingStrategy',
            'doctrine.orm.quote_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultQuoteStrategy',
            'doctrine.orm.quote_strategy.ansi.class' => 'Doctrine\\ORM\\Mapping\\AnsiQuoteStrategy',
            'doctrine.orm.entity_listener_resolver.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Mapping\\ContainerAwareEntityListenerResolver',
            'doctrine.orm.second_level_cache.default_cache_factory.class' => 'Doctrine\\ORM\\Cache\\DefaultCacheFactory',
            'doctrine.orm.second_level_cache.default_region.class' => 'Doctrine\\ORM\\Cache\\Region\\DefaultRegion',
            'doctrine.orm.second_level_cache.filelock_region.class' => 'Doctrine\\ORM\\Cache\\Region\\FileLockRegion',
            'doctrine.orm.second_level_cache.logger_chain.class' => 'Doctrine\\ORM\\Cache\\Logging\\CacheLoggerChain',
            'doctrine.orm.second_level_cache.logger_statistics.class' => 'Doctrine\\ORM\\Cache\\Logging\\StatisticsCacheLogger',
            'doctrine.orm.second_level_cache.cache_configuration.class' => 'Doctrine\\ORM\\Cache\\CacheConfiguration',
            'doctrine.orm.second_level_cache.regions_configuration.class' => 'Doctrine\\ORM\\Cache\\RegionsConfiguration',
            'doctrine.orm.auto_generate_proxy_classes' => true,
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'doctrine_migrations.dir_name' => '/app/src/Migrations',
            'doctrine_migrations.namespace' => 'DoctrineMigrations',
            'doctrine_migrations.table_name' => 'migration_versions',
            'doctrine_migrations.name' => 'Application Migrations',
            'doctrine_migrations.custom_template' => NULL,
            'doctrine_migrations.organize_migrations' => false,
            'twig.exception_listener.controller' => 'twig.controller.exception::showAction',
            'twig.form.resources' => array(
                0 => 'form_div_layout.html.twig',
            ),
            'twig.default_path' => '/app/templates',
            'security.authentication.trust_resolver.anonymous_class' => NULL,
            'security.authentication.trust_resolver.rememberme_class' => NULL,
            'security.role_hierarchy.roles' => array(
                'ROLE_ADMIN_DASHBOARD' => array(

                ),
                'ROLE_SUPER_ADMIN' => array(
                    0 => 'ROLE_ADMIN_DASHBOARD',
                ),
            ),
            'security.access.denied_url' => NULL,
            'security.authentication.manager.erase_credentials' => false,
            'security.authentication.session_strategy.strategy' => 'migrate',
            'security.access.always_authenticate_before_granting' => false,
            'security.authentication.hide_user_not_found' => false,
            'sonata.core.flashmessage.manager.class' => 'Sonata\\CoreBundle\\FlashMessage\\FlashManager',
            'sonata.core.twig.extension.flashmessage.class' => 'Sonata\\CoreBundle\\Twig\\Extension\\FlashMessageExtension',
            'sonata.core.form_type' => 'standard',
            'sonata.block.service.container.class' => 'Sonata\\BlockBundle\\Block\\Service\\ContainerBlockService',
            'sonata.block.service.empty.class' => 'Sonata\\BlockBundle\\Block\\Service\\EmptyBlockService',
            'sonata.block.service.text.class' => 'Sonata\\BlockBundle\\Block\\Service\\TextBlockService',
            'sonata.block.service.rss.class' => 'Sonata\\BlockBundle\\Block\\Service\\RssBlockService',
            'sonata.block.service.menu.class' => 'Sonata\\BlockBundle\\Block\\Service\\MenuBlockService',
            'sonata.block.service.template.class' => 'Sonata\\BlockBundle\\Block\\Service\\TemplateBlockService',
            'sonata.block.exception.strategy.manager.class' => 'Sonata\\BlockBundle\\Exception\\Strategy\\StrategyManager',
            'sonata.block.container.types' => array(
                0 => 'sonata.block.service.container',
                1 => 'sonata.page.block.container',
                2 => 'sonata.dashboard.block.container',
                3 => 'cmf.block.container',
                4 => 'cmf.block.slideshow',
            ),
            'sonata_block.blocks' => array(
                'sonata.admin.block.admin_list' => array(
                    'contexts' => array(
                        0 => 'admin',
                    ),
                    'templates' => array(

                    ),
                    'cache' => 'sonata.cache.noop',
                    'settings' => array(

                    ),
                ),
            ),
            'sonata_block.blocks_by_class' => array(

            ),
            'sonata_blocks.block_types' => array(
                0 => 'sonata.admin.block.admin_list',
            ),
            'sonata_block.cache_blocks' => array(
                'by_type' => array(
                    'sonata.admin.block.admin_list' => 'sonata.cache.noop',
                ),
            ),
            'knp_menu.factory.class' => 'Knp\\Menu\\MenuFactory',
            'knp_menu.factory_extension.routing.class' => 'Knp\\Menu\\Integration\\Symfony\\RoutingExtension',
            'knp_menu.helper.class' => 'Knp\\Menu\\Twig\\Helper',
            'knp_menu.matcher.class' => 'Knp\\Menu\\Matcher\\Matcher',
            'knp_menu.menu_provider.chain.class' => 'Knp\\Menu\\Provider\\ChainProvider',
            'knp_menu.menu_provider.container_aware.class' => 'Knp\\Bundle\\MenuBundle\\Provider\\ContainerAwareProvider',
            'knp_menu.menu_provider.builder_alias.class' => 'Knp\\Bundle\\MenuBundle\\Provider\\BuilderAliasProvider',
            'knp_menu.renderer_provider.class' => 'Knp\\Bundle\\MenuBundle\\Renderer\\ContainerAwareProvider',
            'knp_menu.renderer.list.class' => 'Knp\\Menu\\Renderer\\ListRenderer',
            'knp_menu.renderer.list.options' => array(

            ),
            'knp_menu.listener.voters.class' => 'Knp\\Bundle\\MenuBundle\\EventListener\\VoterInitializerListener',
            'knp_menu.voter.router.class' => 'Knp\\Menu\\Matcher\\Voter\\RouteVoter',
            'knp_menu.twig.extension.class' => 'Knp\\Menu\\Twig\\MenuExtension',
            'knp_menu.renderer.twig.class' => 'Knp\\Menu\\Renderer\\TwigRenderer',
            'knp_menu.renderer.twig.options' => array(

            ),
            'knp_menu.renderer.twig.template' => '@KnpMenu/menu.html.twig',
            'knp_menu.default_renderer' => 'twig',
            'sonata.admin.twig.extension.x_editable_type_mapping' => array(
                'choice' => 'select',
                'boolean' => 'select',
                'text' => 'text',
                'textarea' => 'textarea',
                'html' => 'textarea',
                'email' => 'email',
                'string' => 'text',
                'smallint' => 'text',
                'bigint' => 'text',
                'integer' => 'number',
                'decimal' => 'number',
                'currency' => 'number',
                'percent' => 'number',
                'url' => 'url',
                'date' => 'date',
            ),
            'sonata.admin.configuration.global_search.empty_boxes' => 'show',
            'sonata.admin.configuration.global_search.case_sensitive' => true,
            'sonata.admin.configuration.templates' => array(
                'user_block' => '@SonataAdmin/Core/user_block.html.twig',
                'add_block' => '@SonataAdmin/Core/add_block.html.twig',
                'layout' => '@SonataAdmin/standard_layout.html.twig',
                'ajax' => '@SonataAdmin/ajax_layout.html.twig',
                'dashboard' => '@SonataAdmin/Core/dashboard.html.twig',
                'search' => '@SonataAdmin/Core/search.html.twig',
                'list' => '@SonataAdmin/CRUD/list.html.twig',
                'filter' => '@SonataAdmin/Form/filter_admin_fields.html.twig',
                'show' => '@SonataAdmin/CRUD/show.html.twig',
                'show_compare' => '@SonataAdmin/CRUD/show_compare.html.twig',
                'edit' => '@SonataAdmin/CRUD/edit.html.twig',
                'preview' => '@SonataAdmin/CRUD/preview.html.twig',
                'history' => '@SonataAdmin/CRUD/history.html.twig',
                'acl' => '@SonataAdmin/CRUD/acl.html.twig',
                'history_revision_timestamp' => '@SonataAdmin/CRUD/history_revision_timestamp.html.twig',
                'action' => '@SonataAdmin/CRUD/action.html.twig',
                'select' => '@SonataAdmin/CRUD/list__select.html.twig',
                'list_block' => '@SonataAdmin/Block/block_admin_list.html.twig',
                'search_result_block' => '@SonataAdmin/Block/block_search_result.html.twig',
                'short_object_description' => '@SonataAdmin/Helper/short-object-description.html.twig',
                'delete' => '@SonataAdmin/CRUD/delete.html.twig',
                'batch' => '@SonataAdmin/CRUD/list__batch.html.twig',
                'batch_confirmation' => '@SonataAdmin/CRUD/batch_confirmation.html.twig',
                'inner_list_row' => '@SonataAdmin/CRUD/list_inner_row.html.twig',
                'outer_list_rows_mosaic' => '@SonataAdmin/CRUD/list_outer_rows_mosaic.html.twig',
                'outer_list_rows_list' => '@SonataAdmin/CRUD/list_outer_rows_list.html.twig',
                'outer_list_rows_tree' => '@SonataAdmin/CRUD/list_outer_rows_tree.html.twig',
                'base_list_field' => '@SonataAdmin/CRUD/base_list_field.html.twig',
                'pager_links' => '@SonataAdmin/Pager/links.html.twig',
                'pager_results' => '@SonataAdmin/Pager/results.html.twig',
                'tab_menu_template' => '@SonataAdmin/Core/tab_menu_template.html.twig',
                'knp_menu_template' => '@SonataAdmin/Menu/sonata_menu.html.twig',
                'action_create' => '@SonataAdmin/CRUD/dashboard__action_create.html.twig',
                'button_acl' => '@SonataAdmin/Button/acl_button.html.twig',
                'button_create' => '@SonataAdmin/Button/create_button.html.twig',
                'button_edit' => '@SonataAdmin/Button/edit_button.html.twig',
                'button_history' => '@SonataAdmin/Button/history_button.html.twig',
                'button_list' => '@SonataAdmin/Button/list_button.html.twig',
                'button_show' => '@SonataAdmin/Button/show_button.html.twig',
            ),
            'sonata.admin.configuration.admin_services' => array(

            ),
            'sonata.admin.configuration.dashboard_groups' => array(

            ),
            'sonata.admin.configuration.dashboard_blocks' => array(
                0 => array(
                    'type' => 'sonata.admin.block.admin_list',
                    'position' => 'left',
                    'roles' => array(

                    ),
                    'settings' => array(

                    ),
                    'class' => 'col-md-4',
                ),
            ),
            'sonata.admin.configuration.sort_admins' => false,
            'sonata.admin.configuration.default_group' => 'default',
            'sonata.admin.configuration.default_label_catalogue' => 'SonataAdminBundle',
            'sonata.admin.configuration.default_icon' => '<i class="fa fa-folder"></i>',
            'sonata.admin.configuration.breadcrumbs' => array(
                'child_admin_route' => 'edit',
            ),
            'sonata.admin.security.acl_user_manager' => NULL,
            'sonata.admin.configuration.security.role_admin' => 'ROLE_SONATA_ADMIN',
            'sonata.admin.configuration.security.role_super_admin' => 'ROLE_SUPER_ADMIN',
            'sonata.admin.configuration.security.information' => array(

            ),
            'sonata.admin.configuration.security.admin_permissions' => array(
                0 => 'CREATE',
                1 => 'LIST',
                2 => 'DELETE',
                3 => 'UNDELETE',
                4 => 'EXPORT',
                5 => 'OPERATOR',
                6 => 'MASTER',
            ),
            'sonata.admin.configuration.security.object_permissions' => array(
                0 => 'VIEW',
                1 => 'EDIT',
                2 => 'DELETE',
                3 => 'UNDELETE',
                4 => 'OPERATOR',
                5 => 'MASTER',
                6 => 'OWNER',
            ),
            'sonata.admin.security.handler.noop.class' => 'Sonata\\AdminBundle\\Security\\Handler\\NoopSecurityHandler',
            'sonata.admin.security.handler.role.class' => 'Sonata\\AdminBundle\\Security\\Handler\\RoleSecurityHandler',
            'sonata.admin.security.handler.acl.class' => 'Sonata\\AdminBundle\\Security\\Handler\\AclSecurityHandler',
            'sonata.admin.security.mask.builder.class' => 'Sonata\\AdminBundle\\Security\\Acl\\Permission\\MaskBuilder',
            'sonata.admin.manipulator.acl.admin.class' => 'Sonata\\AdminBundle\\Util\\AdminAclManipulator',
            'sonata.admin.object.manipulator.acl.admin.class' => 'Sonata\\AdminBundle\\Util\\AdminObjectAclManipulator',
            'sonata.admin.extension.map' => array(
                'admins' => array(

                ),
                'excludes' => array(

                ),
                'implements' => array(

                ),
                'extends' => array(

                ),
                'instanceof' => array(

                ),
                'uses' => array(

                ),
            ),
            'sonata.admin.configuration.filters.persist' => false,
            'sonata.admin.configuration.filters.persister' => 'sonata.admin.filter_persister.session',
            'sonata.admin.configuration.show.mosaic.button' => true,
            'sonata.admin.configuration.translate_group_label' => false,
            'scheb_two_factor.model_manager_name' => NULL,
            'scheb_two_factor.email.sender_email' => 'no-reply@example.com',
            'scheb_two_factor.email.sender_name' => NULL,
            'scheb_two_factor.email.template' => '@SchebTwoFactor/Authentication/form.html.twig',
            'scheb_two_factor.email.digits' => 4,
            'scheb_two_factor.google.server_name' => NULL,
            'scheb_two_factor.google.issuer' => NULL,
            'scheb_two_factor.google.template' => 'security/admin_2fa_form.html.twig',
            'scheb_two_factor.google.digits' => 6,
            'scheb_two_factor.trusted_device.enabled' => false,
            'scheb_two_factor.trusted_device.cookie_name' => 'trusted_device',
            'scheb_two_factor.trusted_device.lifetime' => 5184000,
            'scheb_two_factor.trusted_device.extend_lifetime' => false,
            'scheb_two_factor.trusted_device.cookie_secure' => false,
            'scheb_two_factor.trusted_device.cookie_same_site' => 'lax',
            'scheb_two_factor.security_tokens' => array(
                0 => 'Symfony\\Component\\Security\\Guard\\Token\\PostAuthenticationGuardToken',
            ),
            'scheb_two_factor.ip_whitelist' => array(

            ),
            'web_profiler.debug_toolbar.intercept_redirects' => false,
            'web_profiler.debug_toolbar.mode' => 2,
            'monolog.use_microseconds' => true,
            'monolog.swift_mailer.handlers' => array(

            ),
            'monolog.handlers_to_channels' => array(
                'monolog.handler.console' => array(
                    'type' => 'exclusive',
                    'elements' => array(
                        0 => 'event',
                        1 => 'doctrine',
                        2 => 'console',
                    ),
                ),
                'monolog.handler.main' => array(
                    'type' => 'exclusive',
                    'elements' => array(
                        0 => 'event',
                    ),
                ),
            ),
            'env(VAR_DUMPER_SERVER)' => '127.0.0.1:9912',
            'data_collector.templates' => array(
                'data_collector.request' => array(
                    0 => 'request',
                    1 => '@WebProfiler/Collector/request.html.twig',
                ),
                'data_collector.time' => array(
                    0 => 'time',
                    1 => '@WebProfiler/Collector/time.html.twig',
                ),
                'data_collector.memory' => array(
                    0 => 'memory',
                    1 => '@WebProfiler/Collector/memory.html.twig',
                ),
                'data_collector.validator' => array(
                    0 => 'validator',
                    1 => '@WebProfiler/Collector/validator.html.twig',
                ),
                'data_collector.ajax' => array(
                    0 => 'ajax',
                    1 => '@WebProfiler/Collector/ajax.html.twig',
                ),
                'data_collector.form' => array(
                    0 => 'form',
                    1 => '@WebProfiler/Collector/form.html.twig',
                ),
                'data_collector.exception' => array(
                    0 => 'exception',
                    1 => '@WebProfiler/Collector/exception.html.twig',
                ),
                'data_collector.logger' => array(
                    0 => 'logger',
                    1 => '@WebProfiler/Collector/logger.html.twig',
                ),
                'data_collector.events' => array(
                    0 => 'events',
                    1 => '@WebProfiler/Collector/events.html.twig',
                ),
                'data_collector.router' => array(
                    0 => 'router',
                    1 => '@WebProfiler/Collector/router.html.twig',
                ),
                'data_collector.cache' => array(
                    0 => 'cache',
                    1 => '@WebProfiler/Collector/cache.html.twig',
                ),
                'data_collector.translation' => array(
                    0 => 'translation',
                    1 => '@WebProfiler/Collector/translation.html.twig',
                ),
                'data_collector.security' => array(
                    0 => 'security',
                    1 => '@Security/Collector/security.html.twig',
                ),
                'data_collector.twig' => array(
                    0 => 'twig',
                    1 => '@WebProfiler/Collector/twig.html.twig',
                ),
                'data_collector.doctrine' => array(
                    0 => 'db',
                    1 => '@Doctrine/Collector/db.html.twig',
                ),
                'data_collector.dump' => array(
                    0 => 'dump',
                    1 => '@Debug/Profiler/dump.html.twig',
                ),
                'enqueue.profiler.message_queue_collector' => array(
                    0 => 'enqueue.message_queue',
                    1 => '@Enqueue/Profiler/panel.html.twig',
                ),
                'sonata.block.data_collector' => array(
                    0 => 'block',
                    1 => '@SonataBlock/Profiler/block.html.twig',
                ),
                'data_collector.config' => array(
                    0 => 'config',
                    1 => '@WebProfiler/Collector/config.html.twig',
                ),
            ),
            'sonata.core.form.types' => array(
                0 => 'App\\Form\\LoginType',
                1 => 'form.type.form',
                2 => 'form.type.choice',
                3 => 'form.type.entity',
                4 => 'sonata.core.form.type.array_legacy',
                5 => 'sonata.core.form.type.boolean_legacy',
                6 => 'sonata.core.form.type.collection_legacy',
                7 => 'sonata.core.form.type.translatable_choice',
                8 => 'sonata.core.form.type.date_range_legacy',
                9 => 'sonata.core.form.type.datetime_range_legacy',
                10 => 'sonata.core.form.type.date_picker_legacy',
                11 => 'sonata.core.form.type.datetime_picker_legacy',
                12 => 'sonata.core.form.type.date_range_picker_legacy',
                13 => 'sonata.core.form.type.datetime_range_picker_legacy',
                14 => 'sonata.core.form.type.equal_legacy',
                15 => 'sonata.core.form.type.color_selector',
                16 => 'sonata.core.form.type.color_legacy',
                17 => 'sonata.core.form.type.array',
                18 => 'sonata.core.form.type.boolean',
                19 => 'sonata.core.form.type.collection',
                20 => 'sonata.core.form.type.date_range',
                21 => 'sonata.core.form.type.datetime_range',
                22 => 'sonata.core.form.type.date_picker',
                23 => 'sonata.core.form.type.datetime_picker',
                24 => 'sonata.core.form.type.date_range_picker',
                25 => 'sonata.core.form.type.datetime_range_picker',
                26 => 'sonata.core.form.type.equal',
                27 => 'sonata.block.form.type.block',
                28 => 'sonata.block.form.type.container_template',
                29 => 'sonata.admin.form.type.admin',
                30 => 'sonata.admin.form.type.model_choice',
                31 => 'sonata.admin.form.type.model_list',
                32 => 'sonata.admin.form.type.model_reference',
                33 => 'sonata.admin.form.type.model_hidden',
                34 => 'sonata.admin.form.type.model_autocomplete',
                35 => 'sonata.admin.form.type.collection',
                36 => 'sonata.admin.doctrine_orm.form.type.choice_field_mask',
                37 => 'sonata.admin.form.filter.type.number',
                38 => 'sonata.admin.form.filter.type.choice',
                39 => 'sonata.admin.form.filter.type.default',
                40 => 'sonata.admin.form.filter.type.date',
                41 => 'sonata.admin.form.filter.type.daterange',
                42 => 'sonata.admin.form.filter.type.datetime',
                43 => 'sonata.admin.form.filter.type.datetime_range',
            ),
            'sonata.core.form.type_extensions' => array(
                0 => 'form.type_extension.form.transformation_failure_handling',
                1 => 'form.type_extension.form.http_foundation',
                2 => 'form.type_extension.form.validator',
                3 => 'form.type_extension.repeated.validator',
                4 => 'form.type_extension.submit.validator',
                5 => 'form.type_extension.upload.validator',
                6 => 'form.type_extension.csrf',
                7 => 'form.type_extension.form.data_collector',
                8 => 'sonata.admin.form.extension.field',
                9 => 'sonata.admin.form.extension.field.mopa',
                10 => 'sonata.admin.form.extension.choice',
            ),
            'console.command.ids' => array(
                0 => 'console.command.public_alias.doctrine_cache.contains_command',
                1 => 'console.command.public_alias.doctrine_cache.delete_command',
                2 => 'console.command.public_alias.doctrine_cache.flush_command',
                3 => 'console.command.public_alias.doctrine_cache.stats_command',
                4 => 'console.command.public_alias.doctrine_migrations.diff_command',
                5 => 'console.command.public_alias.doctrine_migrations.execute_command',
                6 => 'console.command.public_alias.doctrine_migrations.generate_command',
                7 => 'console.command.public_alias.doctrine_migrations.latest_command',
                8 => 'console.command.public_alias.doctrine_migrations.migrate_command',
                9 => 'console.command.public_alias.doctrine_migrations.status_command',
                10 => 'console.command.public_alias.doctrine_migrations.version_command',
                11 => 'console.command.public_alias.Sonata\\CoreBundle\\Command\\SonataDumpDoctrineMetaCommand',
                12 => 'console.command.public_alias.Sonata\\CoreBundle\\Command\\SonataListFormMappingCommand',
                13 => 'console.command.public_alias.Sonata\\BlockBundle\\Command\\DebugBlocksCommand',
                14 => 'Sonata\\AdminBundle\\Command\\CreateClassCacheCommand',
                15 => 'Sonata\\AdminBundle\\Command\\ExplainAdminCommand',
                16 => 'Sonata\\AdminBundle\\Command\\GenerateAdminCommand',
                17 => 'Sonata\\AdminBundle\\Command\\GenerateObjectAclCommand',
                18 => 'Sonata\\AdminBundle\\Command\\ListAdminCommand',
                19 => 'Sonata\\AdminBundle\\Command\\SetupAclCommand',
            ),
        );
    }
}
