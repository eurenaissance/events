<?php

/* @SonataAdmin/CRUD/base_list_inner_row.html.twig */
class __TwigTemplate_f0028ca58a100b9fadcb20b7ddad3c0b3b9eeccbd3b27494fe784e00f25ae9a5 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/base_list_inner_row.html.twig"));

        // line 11
        echo "
";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 12, $this->source); })()), "list", array()), "elements", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["field_description"]) {
            // line 13
            echo "    ";
            if (((twig_get_attribute($this->env, $this->source, $context["field_description"], "name", array()) == "_action") && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 13, $this->source); })()), "request", array()), "isXmlHttpRequest", array()))) {
                // line 14
                echo "        ";
                // line 15
                echo "    ";
            } elseif (((twig_get_attribute($this->env, $this->source, $context["field_description"], "getOption", array(0 => "ajax_hidden"), "method") == true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 15, $this->source); })()), "request", array()), "isXmlHttpRequest", array()))) {
                // line 16
                echo "        ";
                // line 17
                echo "    ";
            } else {
                // line 18
                echo "        ";
                echo $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->renderListElement($this->env, (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new Twig_Error_Runtime('Variable "object" does not exist.', 18, $this->source); })()), $context["field_description"]);
                echo "
    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_description'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SonataAdmin/CRUD/base_list_inner_row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 18,  43 => 17,  41 => 16,  38 => 15,  36 => 14,  33 => 13,  29 => 12,  26 => 11,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}

{% for field_description in admin.list.elements %}
    {% if field_description.name == '_action' and app.request.isXmlHttpRequest %}
        {# Action buttons disabled in ajax view! #}
    {% elseif field_description.getOption('ajax_hidden') == true and app.request.isXmlHttpRequest %}
        {# Disable fields with 'ajax_hidden' option set to true #}
    {% else %}
        {{ object|render_list_element(field_description) }}
    {% endif %}
{% endfor %}
", "@SonataAdmin/CRUD/base_list_inner_row.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/CRUD/base_list_inner_row.html.twig");
    }
}
