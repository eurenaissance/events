<?php

use Symfony\Component\Routing\Matcher\Dumper\PhpMatcherTrait;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    use PhpMatcherTrait;

    public function __construct(RequestContext $context)
    {
        $this->context = $context;
        $this->staticRoutes = array(
            '/admin/login' => array(array(array('_route' => 'app_admin_login', '_controller' => 'App\\Controller\\AdminSecurityController::login'), null, null, null, false, null)),
            '/2fa' => array(array(array('_route' => '2fa_login', '_controller' => 'scheb_two_factor.form_controller:form'), null, null, null, false, null)),
            '/2fa_check' => array(array(array('_route' => '2fa_login_check'), null, null, null, false, null)),
            '/admin' => array(array(array('_route' => 'sonata_admin_redirect', '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction', 'route' => 'sonata_admin_dashboard', 'permanent' => 'true'), null, null, null, true, null)),
            '/admin/dashboard' => array(array(array('_route' => 'sonata_admin_dashboard', '_controller' => 'Sonata\\AdminBundle\\Action\\DashboardAction'), null, null, null, false, null)),
            '/admin/core/get-form-field-element' => array(array(array('_route' => 'sonata_admin_retrieve_form_element', '_controller' => 'sonata.admin.action.retrieve_form_field_element'), null, null, null, false, null)),
            '/admin/core/append-form-field-element' => array(array(array('_route' => 'sonata_admin_append_form_element', '_controller' => 'sonata.admin.action.append_form_field_element'), null, null, null, false, null)),
            '/admin/core/set-object-field-value' => array(array(array('_route' => 'sonata_admin_set_object_field_value', '_controller' => 'sonata.admin.action.set_object_field_value'), null, null, null, false, null)),
            '/admin/search' => array(array(array('_route' => 'sonata_admin_search', '_controller' => 'Sonata\\AdminBundle\\Action\\SearchAction'), null, null, null, false, null)),
            '/admin/core/get-autocomplete-items' => array(array(array('_route' => 'sonata_admin_retrieve_autocomplete_items', '_controller' => 'sonata.admin.action.retrieve_autocomplete_items'), null, null, null, false, null)),
            '/_profiler' => array(array(array('_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'), null, null, null, true, null)),
            '/_profiler/search' => array(array(array('_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'), null, null, null, false, null)),
            '/_profiler/search_bar' => array(array(array('_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'), null, null, null, false, null)),
            '/_profiler/phpinfo' => array(array(array('_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'), null, null, null, false, null)),
            '/_profiler/open' => array(array(array('_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'), null, null, null, false, null)),
            '/admin/2fa' => array(array(array('_route' => 'admin_security_2fa', '_controller' => 'scheb_two_factor.form_controller:form'), null, null, null, false, null)),
            '/admin/2fa_check' => array(array(array('_route' => 'admin_security_2fa_check'), null, null, null, false, null)),
            '/admin/logout' => array(array(array('_route' => 'app_admin_logout'), null, array('GET' => 0), null, false, null)),
        );
        $this->regexpList = array(
            0 => '{^(?'
                    .'|/admin/core/get\\-short\\-object\\-description(?:\\.(html|json))?(*:68)'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:106)'
                        .'|wdt/([^/]++)(*:126)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:172)'
                                .'|router(*:186)'
                                .'|exception(?'
                                    .'|(*:206)'
                                    .'|\\.css(*:219)'
                                .')'
                            .')'
                            .'|(*:229)'
                        .')'
                    .')'
                .')(?:/?)$}sDu',
        );
        $this->dynamicRoutes = array(
            68 => array(array(array('_route' => 'sonata_admin_short_object_information', '_controller' => 'sonata.admin.action.get_short_object_description', '_format' => 'html'), array('_format'), null, null, false, null)),
            106 => array(array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null, false, null)),
            126 => array(array(array('_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'), array('token'), null, null, false, null)),
            172 => array(array(array('_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array('token'), null, null, false, null)),
            186 => array(array(array('_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'), array('token'), null, null, false, null)),
            206 => array(array(array('_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'), array('token'), null, null, false, null)),
            219 => array(array(array('_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'), array('token'), null, null, false, null)),
            229 => array(array(array('_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'), array('token'), null, null, false, null)),
        );
    }
}
