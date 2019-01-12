<?php

/* @SonataCore/FlashMessage/render.html.twig */
class __TwigTemplate_0511f858b7a9903d443b54621bcb714a5f5ff4a030e320b860cca9c1783607ab extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataCore/FlashMessage/render.html.twig"));

        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getRuntime('Sonata\Twig\Extension\FlashMessageRuntime')->getFlashMessagesTypes());
        foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
            // line 12
            echo "    ";
            $context["domain"] = (((isset($context["domain"]) || array_key_exists("domain", $context))) ? ((isset($context["domain"]) || array_key_exists("domain", $context) ? $context["domain"] : (function () { throw new Twig_Error_Runtime('Variable "domain" does not exist.', 12, $this->source); })())) : (null));
            // line 13
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->env->getRuntime('Sonata\Twig\Extension\FlashMessageRuntime')->getFlashMessages($context["type"], (isset($context["domain"]) || array_key_exists("domain", $context) ? $context["domain"] : (function () { throw new Twig_Error_Runtime('Variable "domain" does not exist.', 13, $this->source); })())));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 14
                echo "        <div class=\"alert alert-";
                echo twig_escape_filter($this->env, $this->env->getRuntime('Sonata\CoreBundle\Twig\Extension\StatusRuntime')->statusClass($context["type"]), "html", null, true);
                echo " alert-dismissable\">
            <button
                type=\"button\"
                class=\"close\"
                data-dismiss=\"alert\"
                aria-hidden=\"true\"
                aria-label=\"";
                // line 20
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("message_close", array(), "SonataCoreBundle"), "html", null, true);
                echo "\"
            >&times;</button>
            ";
                // line 22
                echo $context["message"];
                echo "
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SonataCore/FlashMessage/render.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 22,  48 => 20,  38 => 14,  33 => 13,  30 => 12,  26 => 11,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}
{% for type in sonata_flashmessages_types() %}
    {% set domain = domain is defined ? domain : null %}
    {% for message in sonata_flashmessages_get(type, domain) %}
        <div class=\"alert alert-{{ type|sonata_status_class }} alert-dismissable\">
            <button
                type=\"button\"
                class=\"close\"
                data-dismiss=\"alert\"
                aria-hidden=\"true\"
                aria-label=\"{{ 'message_close'|trans({}, 'SonataCoreBundle') }}\"
            >&times;</button>
            {{ message|raw }}
        </div>
    {% endfor %}
{% endfor %}
", "@SonataCore/FlashMessage/render.html.twig", "/app/vendor/sonata-project/core-bundle/src/CoreBundle/Resources/views/FlashMessage/render.html.twig");
    }
}
