<?php

/* @SonataAdmin/CRUD/preview.html.twig */
class __TwigTemplate_279c0b6dab49991bb08d8305c4e1fe71726b7bff4bb96c23de0c2c91bee2905e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 12
        $this->parent = $this->loadTemplate("@SonataAdmin/CRUD/edit.html.twig", "@SonataAdmin/CRUD/preview.html.twig", 12);
        $this->blocks = array(
            'actions' => array($this, 'block_actions'),
            'side_menu' => array($this, 'block_side_menu'),
            'formactions' => array($this, 'block_formactions'),
            'preview' => array($this, 'block_preview'),
            'form' => array($this, 'block_form'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@SonataAdmin/CRUD/edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/preview.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/preview.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 14
    public function block_actions($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "actions"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "actions"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 17
    public function block_side_menu($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "side_menu"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "side_menu"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 20
    public function block_formactions($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "formactions"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "formactions"));

        // line 21
        echo "    <button class=\"btn btn-success\" type=\"submit\" name=\"btn_preview_approve\">
        <i class=\"fa fa-check\" aria-hidden=\"true\"></i>
        ";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("btn_preview_approve", array(), "SonataAdminBundle"), "html", null, true);
        echo "
    </button>
    <button class=\"btn btn-danger\" type=\"submit\" name=\"btn_preview_decline\">
        <i class=\"fa fa-times\" aria-hidden=\"true\"></i>
        ";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("btn_preview_decline", array(), "SonataAdminBundle"), "html", null, true);
        echo "
    </button>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 31
    public function block_preview($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "preview"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "preview"));

        // line 32
        echo "    <div class=\"sonata-ba-view\">
        ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 33, $this->source); })()), "showgroups", array()));
        foreach ($context['_seq'] as $context["name"] => $context["view_group"]) {
            // line 34
            echo "            <table class=\"table table-bordered\">
                ";
            // line 35
            if ($context["name"]) {
                // line 36
                echo "                    <tr class=\"sonata-ba-view-title\">
                        <td colspan=\"2\">
                            ";
                // line 38
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans($context["name"], array(), twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 38, $this->source); })()), "translationdomain", array())), "html", null, true);
                echo "
                        </td>
                    </tr>
                ";
            }
            // line 42
            echo "
                ";
            // line 43
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["view_group"], "fields", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["field_name"]) {
                // line 44
                echo "                    <tr class=\"sonata-ba-view-container\">
                        ";
                // line 45
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["admin"] ?? null), "show", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                    // line 46
                    echo "                            ";
                    echo $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->renderViewElement($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 46, $this->source); })()), "show", array()), $context["field_name"], array(), "array"), (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new Twig_Error_Runtime('Variable "object" does not exist.', 46, $this->source); })()));
                    echo "
                        ";
                }
                // line 48
                echo "                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_name'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "            </table>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['view_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 55
    public function block_form($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form"));

        // line 56
        echo "    <div class=\"sonata-preview-form-container\">
        ";
        // line 57
        $this->displayParentBlock("form", $context, $blocks);
        echo "
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SonataAdmin/CRUD/preview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  202 => 57,  199 => 56,  190 => 55,  179 => 52,  172 => 50,  165 => 48,  159 => 46,  157 => 45,  154 => 44,  150 => 43,  147 => 42,  140 => 38,  136 => 36,  134 => 35,  131 => 34,  127 => 33,  124 => 32,  115 => 31,  102 => 27,  95 => 23,  91 => 21,  82 => 20,  65 => 17,  48 => 14,  15 => 12,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}

{% extends '@SonataAdmin/CRUD/edit.html.twig' %}

{% block actions %}
{% endblock %}

{% block side_menu %}
{% endblock %}

{% block formactions %}
    <button class=\"btn btn-success\" type=\"submit\" name=\"btn_preview_approve\">
        <i class=\"fa fa-check\" aria-hidden=\"true\"></i>
        {{ 'btn_preview_approve'|trans({}, 'SonataAdminBundle') }}
    </button>
    <button class=\"btn btn-danger\" type=\"submit\" name=\"btn_preview_decline\">
        <i class=\"fa fa-times\" aria-hidden=\"true\"></i>
        {{ 'btn_preview_decline'|trans({}, 'SonataAdminBundle') }}
    </button>
{% endblock %}

{% block preview %}
    <div class=\"sonata-ba-view\">
        {% for name, view_group in admin.showgroups %}
            <table class=\"table table-bordered\">
                {% if name %}
                    <tr class=\"sonata-ba-view-title\">
                        <td colspan=\"2\">
                            {{ name|trans({}, admin.translationdomain) }}
                        </td>
                    </tr>
                {% endif %}

                {% for field_name in view_group.fields %}
                    <tr class=\"sonata-ba-view-container\">
                        {% if admin.show[field_name] is defined %}
                            {{ admin.show[field_name]|render_view_element(object) }}
                        {% endif %}
                    </tr>
                {% endfor %}
            </table>
        {% endfor %}
    </div>
{% endblock %}

{% block form %}
    <div class=\"sonata-preview-form-container\">
        {{ parent() }}
    </div>
{% endblock %}
", "@SonataAdmin/CRUD/preview.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/CRUD/preview.html.twig");
    }
}
