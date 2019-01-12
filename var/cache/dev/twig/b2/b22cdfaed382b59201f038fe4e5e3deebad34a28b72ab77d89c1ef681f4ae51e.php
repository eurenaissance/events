<?php

/* @SonataAdmin/CRUD/list_boolean.html.twig */
class __TwigTemplate_3aaca2b231ed8f1cd2135e25b3796990bc0bf9e1453b6be91bcb8e09bd2eaeba extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = array(
            'field_span_attributes' => array($this, 'block_field_span_attributes'),
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 12
        return $this->loadTemplate($this->extensions['Sonata\AdminBundle\Twig\Extension\TemplateRegistryExtension']->getAdminTemplate("base_list_field", twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 12, $this->source); })()), "code", array())), "@SonataAdmin/CRUD/list_boolean.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/list_boolean.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/list_boolean.html.twig"));

        // line 14
        $context["isEditable"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["field_description"] ?? null), "options", array(), "any", false, true), "editable", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["field_description"]) || array_key_exists("field_description", $context) ? $context["field_description"] : (function () { throw new Twig_Error_Runtime('Variable "field_description" does not exist.', 14, $this->source); })()), "options", array()), "editable", array())) && twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 14, $this->source); })()), "hasAccess", array(0 => "edit", 1 => (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new Twig_Error_Runtime('Variable "object" does not exist.', 14, $this->source); })())), "method"));
        // line 15
        $context["xEditableType"] = $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->getXEditableType(twig_get_attribute($this->env, $this->source, (isset($context["field_description"]) || array_key_exists("field_description", $context) ? $context["field_description"] : (function () { throw new Twig_Error_Runtime('Variable "field_description" does not exist.', 15, $this->source); })()), "type", array()));
        // line 17
        if (((isset($context["isEditable"]) || array_key_exists("isEditable", $context) ? $context["isEditable"] : (function () { throw new Twig_Error_Runtime('Variable "isEditable" does not exist.', 17, $this->source); })()) && (isset($context["xEditableType"]) || array_key_exists("xEditableType", $context) ? $context["xEditableType"] : (function () { throw new Twig_Error_Runtime('Variable "xEditableType" does not exist.', 17, $this->source); })()))) {
        }
        // line 12
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 18
    public function block_field_span_attributes($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field_span_attributes"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field_span_attributes"));

        // line 19
        echo "        ";
        ob_start();
        // line 20
        echo "            ";
        $this->displayParentBlock("field_span_attributes", $context, $blocks);
        echo "
            data-source=\"[{value: 0, text: '";
        // line 21
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("label_type_no", array(), "SonataAdminBundle");
        echo "'},{value: 1, text: '";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("label_type_yes", array(), "SonataAdminBundle");
        echo "'}]\"
        ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 23
        echo "    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 26
    public function block_field($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        // line 27
        $this->loadTemplate("@SonataAdmin/CRUD/display_boolean.html.twig", "@SonataAdmin/CRUD/list_boolean.html.twig", 27)->display($context);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SonataAdmin/CRUD/list_boolean.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 27,  86 => 26,  76 => 23,  69 => 21,  64 => 20,  61 => 19,  52 => 18,  42 => 12,  39 => 17,  37 => 15,  35 => 14,  23 => 12,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}

{% extends get_admin_template('base_list_field', admin.code) %}

{% set isEditable = field_description.options.editable is defined and field_description.options.editable and admin.hasAccess('edit', object) %}
{% set xEditableType = field_description.type|sonata_xeditable_type %}

{% if isEditable and xEditableType %}
    {% block field_span_attributes %}
        {% spaceless %}
            {{ parent() }}
            data-source=\"[{value: 0, text: '{%- trans from 'SonataAdminBundle' %}label_type_no{% endtrans -%}'},{value: 1, text: '{%- trans from 'SonataAdminBundle' %}label_type_yes{% endtrans -%}'}]\"
        {% endspaceless %}
    {% endblock %}
{% endif %}

{% block field %}
    {%- include '@SonataAdmin/CRUD/display_boolean.html.twig' -%}
{% endblock %}
", "@SonataAdmin/CRUD/list_boolean.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/CRUD/list_boolean.html.twig");
    }
}
