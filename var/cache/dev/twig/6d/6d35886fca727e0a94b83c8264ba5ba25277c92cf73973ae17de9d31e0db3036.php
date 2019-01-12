<?php

/* @SonataAdmin/CRUD/Association/edit_one_to_many.html.twig */
class __TwigTemplate_002b440015f31efc75db7b78d2abd03a3727b67405c31e9bc04757c7fb858138 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/Association/edit_one_to_many.html.twig"));

        // line 11
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 11, $this->source); })()), "field_description", array()), "hasassociationadmin", array())) {
            // line 12
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 12, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 13
                echo "        ";
                echo twig_escape_filter($this->env, $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->renderRelationElement($context["element"], twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 13, $this->source); })()), "field_description", array())), "html", null, true);
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 16
            echo "
    <div id=\"field_container_";
            // line 17
            echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 17, $this->source); })()), "html", null, true);
            echo "\" class=\"field-container\">
        <span id=\"field_widget_";
            // line 18
            echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 18, $this->source); })()), "html", null, true);
            echo "\" >
            ";
            // line 19
            if ((twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 19, $this->source); })()), "edit", array()) == "inline")) {
                // line 20
                echo "                ";
                if ((twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 20, $this->source); })()), "inline", array()) == "table")) {
                    // line 21
                    echo "                    ";
                    if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 21, $this->source); })()), "children", array())) > 0)) {
                        // line 22
                        echo "                        ";
                        $this->loadTemplate("@SonataAdmin/CRUD/Association/edit_one_to_many_inline_table.html.twig", "@SonataAdmin/CRUD/Association/edit_one_to_many.html.twig", 22)->display($context);
                        // line 23
                        echo "                    ";
                    }
                    // line 24
                    echo "                ";
                } elseif ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 24, $this->source); })()), "children", array())) > 0)) {
                    // line 25
                    echo "                    ";
                    $context["associationAdmin"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 25, $this->source); })()), "field_description", array()), "associationadmin", array());
                    // line 26
                    echo "                    ";
                    $this->loadTemplate("@SonataAdmin/CRUD/Association/edit_one_to_many_inline_tabs.html.twig", "@SonataAdmin/CRUD/Association/edit_one_to_many.html.twig", 26)->display($context);
                    // line 27
                    echo "
                ";
                }
                // line 29
                echo "            ";
            } else {
                // line 30
                echo "                ";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 30, $this->source); })()), 'widget');
                echo "
            ";
            }
            // line 32
            echo "
        </span>

        ";
            // line 35
            $context["display_create_button"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 35, $this->source); })()), "field_description", array()), "associationadmin", array()), "hasRoute", array(0 => "create"), "method") && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 36
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 36, $this->source); })()), "field_description", array()), "associationadmin", array()), "hasAccess", array(0 => "create"), "method")) &&             // line 37
(isset($context["btn_add"]) || array_key_exists("btn_add", $context) ? $context["btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "btn_add" does not exist.', 37, $this->source); })())) && ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 39
($context["sonata_admin"] ?? null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "limit", array(), "any", true, true) || (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source,             // line 40
(isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 40, $this->source); })()), "children", array())) < twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 40, $this->source); })()), "field_description", array()), "options", array()), "limit", array()))));
            // line 42
            echo "
        ";
            // line 43
            if ((twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 43, $this->source); })()), "edit", array()) == "inline")) {
                // line 44
                echo "
            ";
                // line 45
                if ((isset($context["display_create_button"]) || array_key_exists("display_create_button", $context) ? $context["display_create_button"] : (function () { throw new Twig_Error_Runtime('Variable "display_create_button" does not exist.', 45, $this->source); })())) {
                    // line 46
                    echo "                <span id=\"field_actions_";
                    echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 46, $this->source); })()), "html", null, true);
                    echo "\" >
                    <a
                        href=\"";
                    // line 48
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 48, $this->source); })()), "field_description", array()), "associationadmin", array()), "generateUrl", array(0 => "create", 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 50
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 50, $this->source); })()), "field_description", array()), "getOption", array(0 => "link_parameters", 1 => array()), "method")), "method"), "html", null, true);
                    // line 51
                    echo "\"
                        onclick=\"return start_field_retrieve_";
                    // line 52
                    echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 52, $this->source); })()), "html", null, true);
                    echo "(this);\"
                        class=\"btn btn-success btn-sm sonata-ba-action\"
                        title=\"";
                    // line 54
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["btn_add"]) || array_key_exists("btn_add", $context) ? $context["btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "btn_add" does not exist.', 54, $this->source); })()), array(), (isset($context["btn_catalogue"]) || array_key_exists("btn_catalogue", $context) ? $context["btn_catalogue"] : (function () { throw new Twig_Error_Runtime('Variable "btn_catalogue" does not exist.', 54, $this->source); })())), "html", null, true);
                    echo "\"
                    >
                        <i class=\"fa fa-plus-circle\"></i>
                        ";
                    // line 57
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["btn_add"]) || array_key_exists("btn_add", $context) ? $context["btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "btn_add" does not exist.', 57, $this->source); })()), array(), (isset($context["btn_catalogue"]) || array_key_exists("btn_catalogue", $context) ? $context["btn_catalogue"] : (function () { throw new Twig_Error_Runtime('Variable "btn_catalogue" does not exist.', 57, $this->source); })())), "html", null, true);
                    echo "
                    </a>
                </span>
            ";
                }
                // line 61
                echo "
            ";
                // line 63
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["sonata_admin"] ?? null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "sortable", array(), "any", true, true)) {
                    // line 64
                    echo "                ";
                    if ((twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 64, $this->source); })()), "inline", array()) == "table")) {
                        // line 65
                        echo "                    ";
                        $this->loadTemplate("@SonataAdmin/CRUD/Association/edit_one_to_many_sortable_script_table.html.twig", "@SonataAdmin/CRUD/Association/edit_one_to_many.html.twig", 65)->display($context);
                        // line 66
                        echo "                ";
                    } else {
                        // line 67
                        echo "                    ";
                        $this->loadTemplate("@SonataAdmin/CRUD/Association/edit_one_to_many_sortable_script_tabs.html.twig", "@SonataAdmin/CRUD/Association/edit_one_to_many.html.twig", 67)->display($context);
                        // line 68
                        echo "                ";
                    }
                    // line 69
                    echo "            ";
                }
                // line 70
                echo "
            ";
                // line 72
                echo "            ";
                $this->loadTemplate("@SonataAdmin/CRUD/Association/edit_one_script.html.twig", "@SonataAdmin/CRUD/Association/edit_one_to_many.html.twig", 72)->display($context);
                // line 73
                echo "
        ";
            } else {
                // line 75
                echo "            <span id=\"field_actions_";
                echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 75, $this->source); })()), "html", null, true);
                echo "\" >
                ";
                // line 76
                if ((isset($context["display_create_button"]) || array_key_exists("display_create_button", $context) ? $context["display_create_button"] : (function () { throw new Twig_Error_Runtime('Variable "display_create_button" does not exist.', 76, $this->source); })())) {
                    // line 77
                    echo "                    <a
                        href=\"";
                    // line 78
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 78, $this->source); })()), "field_description", array()), "associationadmin", array()), "generateUrl", array(0 => "create", 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 80
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 80, $this->source); })()), "field_description", array()), "getOption", array(0 => "link_parameters", 1 => array()), "method")), "method"), "html", null, true);
                    // line 81
                    echo "\"
                        onclick=\"return start_field_dialog_form_add_";
                    // line 82
                    echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 82, $this->source); })()), "html", null, true);
                    echo "(this);\"
                        class=\"btn btn-success btn-sm sonata-ba-action\"
                        title=\"";
                    // line 84
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["btn_add"]) || array_key_exists("btn_add", $context) ? $context["btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "btn_add" does not exist.', 84, $this->source); })()), array(), (isset($context["btn_catalogue"]) || array_key_exists("btn_catalogue", $context) ? $context["btn_catalogue"] : (function () { throw new Twig_Error_Runtime('Variable "btn_catalogue" does not exist.', 84, $this->source); })())), "html", null, true);
                    echo "\"
                    >
                        <i class=\"fa fa-plus-circle\"></i>
                        ";
                    // line 87
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["btn_add"]) || array_key_exists("btn_add", $context) ? $context["btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "btn_add" does not exist.', 87, $this->source); })()), array(), (isset($context["btn_catalogue"]) || array_key_exists("btn_catalogue", $context) ? $context["btn_catalogue"] : (function () { throw new Twig_Error_Runtime('Variable "btn_catalogue" does not exist.', 87, $this->source); })())), "html", null, true);
                    echo "
                    </a>
                ";
                }
                // line 90
                echo "            </span>

            ";
                // line 92
                $this->loadTemplate("@SonataAdmin/CRUD/Association/edit_modal.html.twig", "@SonataAdmin/CRUD/Association/edit_one_to_many.html.twig", 92)->display($context);
                // line 93
                echo "
            ";
                // line 94
                $this->loadTemplate("@SonataAdmin/CRUD/Association/edit_many_script.html.twig", "@SonataAdmin/CRUD/Association/edit_one_to_many.html.twig", 94)->display($context);
                // line 95
                echo "        ";
            }
            // line 96
            echo "    </div>
";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SonataAdmin/CRUD/Association/edit_one_to_many.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 96,  219 => 95,  217 => 94,  214 => 93,  212 => 92,  208 => 90,  202 => 87,  196 => 84,  191 => 82,  188 => 81,  186 => 80,  185 => 78,  182 => 77,  180 => 76,  175 => 75,  171 => 73,  168 => 72,  165 => 70,  162 => 69,  159 => 68,  156 => 67,  153 => 66,  150 => 65,  147 => 64,  144 => 63,  141 => 61,  134 => 57,  128 => 54,  123 => 52,  120 => 51,  118 => 50,  117 => 48,  111 => 46,  109 => 45,  106 => 44,  104 => 43,  101 => 42,  99 => 40,  98 => 39,  97 => 37,  96 => 36,  95 => 35,  90 => 32,  84 => 30,  81 => 29,  77 => 27,  74 => 26,  71 => 25,  68 => 24,  65 => 23,  62 => 22,  59 => 21,  56 => 20,  54 => 19,  50 => 18,  46 => 17,  43 => 16,  33 => 13,  28 => 12,  26 => 11,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}
{% if not sonata_admin.field_description.hasassociationadmin %}
    {% for element in value %}
        {{ element|render_relation_element(sonata_admin.field_description) }}
    {% endfor %}
{% else %}

    <div id=\"field_container_{{ id }}\" class=\"field-container\">
        <span id=\"field_widget_{{ id }}\" >
            {% if sonata_admin.edit == 'inline' %}
                {% if sonata_admin.inline == 'table' %}
                    {% if form.children|length > 0 %}
                        {% include '@SonataAdmin/CRUD/Association/edit_one_to_many_inline_table.html.twig' %}
                    {% endif %}
                {% elseif form.children|length > 0 %}
                    {% set associationAdmin = sonata_admin.field_description.associationadmin %}
                    {% include '@SonataAdmin/CRUD/Association/edit_one_to_many_inline_tabs.html.twig' %}

                {% endif %}
            {% else %}
                {{ form_widget(form) }}
            {% endif %}

        </span>

        {% set display_create_button = sonata_admin.field_description.associationadmin.hasRoute('create')
            and sonata_admin.field_description.associationadmin.hasAccess('create')
            and btn_add
            and (
                sonata_admin.field_description.options.limit is not defined or
                form.children|length < sonata_admin.field_description.options.limit
            ) %}

        {% if sonata_admin.edit == 'inline' %}

            {% if display_create_button %}
                <span id=\"field_actions_{{ id }}\" >
                    <a
                        href=\"{{ sonata_admin.field_description.associationadmin.generateUrl(
                            'create',
                            sonata_admin.field_description.getOption('link_parameters', {})
                        ) }}\"
                        onclick=\"return start_field_retrieve_{{ id }}(this);\"
                        class=\"btn btn-success btn-sm sonata-ba-action\"
                        title=\"{{ btn_add|trans({}, btn_catalogue) }}\"
                    >
                        <i class=\"fa fa-plus-circle\"></i>
                        {{ btn_add|trans({}, btn_catalogue) }}
                    </a>
                </span>
            {% endif %}

            {# add code for the sortable options #}
            {% if sonata_admin.field_description.options.sortable is defined %}
                {% if sonata_admin.inline == 'table' %}
                    {% include '@SonataAdmin/CRUD/Association/edit_one_to_many_sortable_script_table.html.twig' %}
                {% else %}
                    {% include '@SonataAdmin/CRUD/Association/edit_one_to_many_sortable_script_tabs.html.twig' %}
                {% endif %}
            {% endif %}

            {# include association code #}
            {% include '@SonataAdmin/CRUD/Association/edit_one_script.html.twig' %}

        {% else %}
            <span id=\"field_actions_{{ id }}\" >
                {% if display_create_button %}
                    <a
                        href=\"{{ sonata_admin.field_description.associationadmin.generateUrl(
                            'create',
                            sonata_admin.field_description.getOption('link_parameters', {})
                        ) }}\"
                        onclick=\"return start_field_dialog_form_add_{{ id }}(this);\"
                        class=\"btn btn-success btn-sm sonata-ba-action\"
                        title=\"{{ btn_add|trans({}, btn_catalogue) }}\"
                    >
                        <i class=\"fa fa-plus-circle\"></i>
                        {{ btn_add|trans({}, btn_catalogue) }}
                    </a>
                {% endif %}
            </span>

            {% include '@SonataAdmin/CRUD/Association/edit_modal.html.twig' %}

            {% include '@SonataAdmin/CRUD/Association/edit_many_script.html.twig' %}
        {% endif %}
    </div>
{% endif %}
", "@SonataAdmin/CRUD/Association/edit_one_to_many.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/CRUD/Association/edit_one_to_many.html.twig");
    }
}
