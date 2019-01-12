<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;
    private $defaultLocale;

    public function __construct(RequestContext $context, LoggerInterface $logger = null, string $defaultLocale = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = array(
        'app_admin_login' => array(array(), array('_controller' => 'App\\Controller\\AdminSecurityController::login'), array(), array(array('text', '/admin/login')), array(), array()),
        '2fa_login' => array(array(), array('_controller' => 'scheb_two_factor.form_controller:form'), array(), array(array('text', '/2fa')), array(), array()),
        '2fa_login_check' => array(array(), array(), array(), array(array('text', '/2fa_check')), array(), array()),
        'sonata_admin_redirect' => array(array(), array('_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction', 'route' => 'sonata_admin_dashboard', 'permanent' => 'true'), array(), array(array('text', '/admin/')), array(), array()),
        'sonata_admin_dashboard' => array(array(), array('_controller' => 'Sonata\\AdminBundle\\Action\\DashboardAction'), array(), array(array('text', '/admin/dashboard')), array(), array()),
        'sonata_admin_retrieve_form_element' => array(array(), array('_controller' => 'sonata.admin.action.retrieve_form_field_element'), array(), array(array('text', '/admin/core/get-form-field-element')), array(), array()),
        'sonata_admin_append_form_element' => array(array(), array('_controller' => 'sonata.admin.action.append_form_field_element'), array(), array(array('text', '/admin/core/append-form-field-element')), array(), array()),
        'sonata_admin_short_object_information' => array(array('_format'), array('_controller' => 'sonata.admin.action.get_short_object_description', '_format' => 'html'), array('_format' => 'html|json'), array(array('variable', '.', 'html|json', '_format', true), array('text', '/admin/core/get-short-object-description')), array(), array()),
        'sonata_admin_set_object_field_value' => array(array(), array('_controller' => 'sonata.admin.action.set_object_field_value'), array(), array(array('text', '/admin/core/set-object-field-value')), array(), array()),
        'sonata_admin_search' => array(array(), array('_controller' => 'Sonata\\AdminBundle\\Action\\SearchAction'), array(), array(array('text', '/admin/search')), array(), array()),
        'sonata_admin_retrieve_autocomplete_items' => array(array(), array('_controller' => 'sonata.admin.action.retrieve_autocomplete_items'), array(), array(array('text', '/admin/core/get-autocomplete-items')), array(), array()),
        '_twig_error_test' => array(array('code', '_format'), array('_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code' => '\\d+'), array(array('variable', '.', '[^/]++', '_format', true), array('variable', '/', '\\d+', 'code', true), array('text', '/_error')), array(), array()),
        '_wdt' => array(array('token'), array('_controller' => 'web_profiler.controller.profiler::toolbarAction'), array(), array(array('variable', '/', '[^/]++', 'token', true), array('text', '/_wdt')), array(), array()),
        '_profiler_home' => array(array(), array('_controller' => 'web_profiler.controller.profiler::homeAction'), array(), array(array('text', '/_profiler/')), array(), array()),
        '_profiler_search' => array(array(), array('_controller' => 'web_profiler.controller.profiler::searchAction'), array(), array(array('text', '/_profiler/search')), array(), array()),
        '_profiler_search_bar' => array(array(), array('_controller' => 'web_profiler.controller.profiler::searchBarAction'), array(), array(array('text', '/_profiler/search_bar')), array(), array()),
        '_profiler_phpinfo' => array(array(), array('_controller' => 'web_profiler.controller.profiler::phpinfoAction'), array(), array(array('text', '/_profiler/phpinfo')), array(), array()),
        '_profiler_search_results' => array(array('token'), array('_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array(), array(array('text', '/search/results'), array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
        '_profiler_open_file' => array(array(), array('_controller' => 'web_profiler.controller.profiler::openAction'), array(), array(array('text', '/_profiler/open')), array(), array()),
        '_profiler' => array(array('token'), array('_controller' => 'web_profiler.controller.profiler::panelAction'), array(), array(array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
        '_profiler_router' => array(array('token'), array('_controller' => 'web_profiler.controller.router::panelAction'), array(), array(array('text', '/router'), array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
        '_profiler_exception' => array(array('token'), array('_controller' => 'web_profiler.controller.exception::showAction'), array(), array(array('text', '/exception'), array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
        '_profiler_exception_css' => array(array('token'), array('_controller' => 'web_profiler.controller.exception::cssAction'), array(), array(array('text', '/exception.css'), array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
        'admin_security_2fa' => array(array(), array('_controller' => 'scheb_two_factor.form_controller:form'), array(), array(array('text', '/admin/2fa')), array(), array()),
        'admin_security_2fa_check' => array(array(), array(), array(), array(array('text', '/admin/2fa_check')), array(), array()),
        'app_admin_logout' => array(array(), array(), array(), array(array('text', '/admin/logout')), array(), array()),
    );
        }
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        $locale = $parameters['_locale']
            ?? $this->context->getParameter('_locale')
            ?: $this->defaultLocale;

        if (null !== $locale && null !== $name) {
            do {
                if ((self::$declaredRoutes[$name.'.'.$locale][1]['_canonical_route'] ?? null) === $name) {
                    unset($parameters['_locale']);
                    $name .= '.'.$locale;
                    break;
                }
            } while (false !== $locale = strstr($locale, '_', true));
        }

        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
