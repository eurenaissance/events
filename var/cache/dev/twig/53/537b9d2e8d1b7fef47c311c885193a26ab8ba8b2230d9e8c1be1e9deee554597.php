<?php

/* @SchebTwoFactor/Authentication/form.html.twig */
class __TwigTemplate_4574023be9ee3aaa4eb287fc746a2374c15f534f9b33e3f97049682409986e78 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SchebTwoFactor/Authentication/form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SchebTwoFactor/Authentication/form.html.twig"));

        // line 5
        echo "
";
        // line 7
        if ((isset($context["authenticationError"]) || array_key_exists("authenticationError", $context) ? $context["authenticationError"] : (function () { throw new Twig_Error_Runtime('Variable "authenticationError" does not exist.', 7, $this->source); })())) {
            // line 8
            echo "<p>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["authenticationError"]) || array_key_exists("authenticationError", $context) ? $context["authenticationError"] : (function () { throw new Twig_Error_Runtime('Variable "authenticationError" does not exist.', 8, $this->source); })()), (isset($context["authenticationErrorData"]) || array_key_exists("authenticationErrorData", $context) ? $context["authenticationErrorData"] : (function () { throw new Twig_Error_Runtime('Variable "authenticationErrorData" does not exist.', 8, $this->source); })())), "html", null, true);
            echo "</p>
";
        }
        // line 10
        echo "
";
        // line 12
        echo "<p>";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("scheb_two_factor.choose_provider"), "html", null, true);
        echo ":
    ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["availableTwoFactorProviders"]) || array_key_exists("availableTwoFactorProviders", $context) ? $context["availableTwoFactorProviders"] : (function () { throw new Twig_Error_Runtime('Variable "availableTwoFactorProviders" does not exist.', 13, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["provider"]) {
            // line 14
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("2fa_login", array("preferProvider" => $context["provider"])), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["provider"], "html", null, true);
            echo "</a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['provider'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "</p>

";
        // line 19
        echo "<p class=\"label\"><label for=\"_auth_code\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("scheb_two_factor.auth_code"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["twoFactorProvider"]) || array_key_exists("twoFactorProvider", $context) ? $context["twoFactorProvider"] : (function () { throw new Twig_Error_Runtime('Variable "twoFactorProvider" does not exist.', 19, $this->source); })()), "html", null, true);
        echo ":</label></p>

<form class=\"form\" action=\"";
        // line 21
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("2fa_login_check");
        echo "\" method=\"post\">
    <p class=\"widget\"><input id=\"_auth_code\" type=\"text\" autocomplete=\"off\" name=\"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["authCodeParameterName"]) || array_key_exists("authCodeParameterName", $context) ? $context["authCodeParameterName"] : (function () { throw new Twig_Error_Runtime('Variable "authCodeParameterName" does not exist.', 22, $this->source); })()), "html", null, true);
        echo "\" /></p>
    ";
        // line 23
        if ((isset($context["displayTrustedOption"]) || array_key_exists("displayTrustedOption", $context) ? $context["displayTrustedOption"] : (function () { throw new Twig_Error_Runtime('Variable "displayTrustedOption" does not exist.', 23, $this->source); })())) {
            // line 24
            echo "        <p class=\"widget\"><label for=\"_trusted\"><input id=\"_trusted\" type=\"checkbox\" name=\"";
            echo twig_escape_filter($this->env, (isset($context["trustedParameterName"]) || array_key_exists("trustedParameterName", $context) ? $context["trustedParameterName"] : (function () { throw new Twig_Error_Runtime('Variable "trustedParameterName" does not exist.', 24, $this->source); })()), "html", null, true);
            echo "\" /> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("scheb_two_factor.trusted"), "html", null, true);
            echo "</label></p>
    ";
        }
        // line 26
        echo "    ";
        if ((isset($context["isCsrfProtectionEnabled"]) || array_key_exists("isCsrfProtectionEnabled", $context) ? $context["isCsrfProtectionEnabled"] : (function () { throw new Twig_Error_Runtime('Variable "isCsrfProtectionEnabled" does not exist.', 26, $this->source); })())) {
            // line 27
            echo "        <input type=\"hidden\" name=\"";
            echo twig_escape_filter($this->env, (isset($context["csrfParameterName"]) || array_key_exists("csrfParameterName", $context) ? $context["csrfParameterName"] : (function () { throw new Twig_Error_Runtime('Variable "csrfParameterName" does not exist.', 27, $this->source); })()), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken((isset($context["csrfTokenId"]) || array_key_exists("csrfTokenId", $context) ? $context["csrfTokenId"] : (function () { throw new Twig_Error_Runtime('Variable "csrfTokenId" does not exist.', 27, $this->source); })())), "html", null, true);
            echo "\">
    ";
        }
        // line 29
        echo "    <p class=\"submit\"><input type=\"submit\" value=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("scheb_two_factor.login"), "html", null, true);
        echo "\" /></p>
</form>

";
        // line 33
        echo "<p class=\"cancel\"><a href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_security_logout");
        echo "\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("scheb_two_factor.cancel"), "html", null, true);
        echo "</a></p>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SchebTwoFactor/Authentication/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 33,  104 => 29,  96 => 27,  93 => 26,  85 => 24,  83 => 23,  79 => 22,  75 => 21,  67 => 19,  63 => 16,  52 => 14,  48 => 13,  43 => 12,  40 => 10,  34 => 8,  32 => 7,  29 => 5,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#
This is a demo template for the authentication form. Please consider overwriting this with your own template,
especially when you're using different route names than the ones used here.
#}

{# Authentication errors #}
{% if authenticationError %}
<p>{{ authenticationError|trans(authenticationErrorData) }}</p>
{% endif %}

{# Let the user select the authentication method #}
<p>{{ \"scheb_two_factor.choose_provider\"|trans }}:
    {% for provider in availableTwoFactorProviders %}
        <a href=\"{{ path(\"2fa_login\", {\"preferProvider\": provider}) }}\">{{ provider }}</a>
    {% endfor %}
</p>

{# Display current two-factor provider #}
<p class=\"label\"><label for=\"_auth_code\">{{ \"scheb_two_factor.auth_code\"|trans }} {{ twoFactorProvider }}:</label></p>

<form class=\"form\" action=\"{{ path(\"2fa_login_check\") }}\" method=\"post\">
    <p class=\"widget\"><input id=\"_auth_code\" type=\"text\" autocomplete=\"off\" name=\"{{ authCodeParameterName }}\" /></p>
    {% if displayTrustedOption %}
        <p class=\"widget\"><label for=\"_trusted\"><input id=\"_trusted\" type=\"checkbox\" name=\"{{ trustedParameterName }}\" /> {{ \"scheb_two_factor.trusted\"|trans }}</label></p>
    {% endif %}
    {% if isCsrfProtectionEnabled %}
        <input type=\"hidden\" name=\"{{ csrfParameterName }}\" value=\"{{ csrf_token(csrfTokenId) }}\">
    {% endif %}
    <p class=\"submit\"><input type=\"submit\" value=\"{{ \"scheb_two_factor.login\"|trans }}\" /></p>
</form>

{# The logout link gives the user a way out if they can't complete two-factor authentication #}
<p class=\"cancel\"><a href=\"{{ path(\"_security_logout\") }}\">{{ \"scheb_two_factor.cancel\"|trans }}</a></p>
", "@SchebTwoFactor/Authentication/form.html.twig", "/app/vendor/scheb/two-factor-bundle/Resources/views/Authentication/form.html.twig");
    }
}
