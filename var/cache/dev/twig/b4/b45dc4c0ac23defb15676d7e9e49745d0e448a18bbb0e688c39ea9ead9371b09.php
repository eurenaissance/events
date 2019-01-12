<?php

/* @SonataAdmin/CRUD/Association/edit_many_to_many.html.twig */
class __TwigTemplate_6e0e2e4c9681399c354c077840a028af750f48d8ab8e8a981d61a8b171f11771 extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/Association/edit_many_to_many.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/Association/edit_many_to_many.html.twig"));

        // line 11
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 11, $this->source); })()), "field_description", array()), "hasassociationadmin", array())) {
            // line 12
            echo "    <div id=\"field_container_";
            echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 12, $this->source); })()), "html", null, true);
            echo "\" class=\"field-container\">
        <span id=\"field_widget_";
            // line 13
            echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 13, $this->source); })()), "html", null, true);
            echo "\" >
            ";
            // line 14
            if ((twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 14, $this->source); })()), "edit", array()) == "inline")) {
                // line 15
                echo "                ";
                if ((twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 15, $this->source); })()), "inline", array()) == "table")) {
                    // line 16
                    echo "                    ";
                    if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 16, $this->source); })()), "children", array())) > 0)) {
                        // line 17
                        echo "                        <table class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    ";
                        // line 20
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 20, $this->source); })()), "children", array()), 0, array(), "array"), "children", array()));
                        foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                            // line 21
                            echo "                                        ";
                            if (($context["field_name"] == "_delete")) {
                                // line 22
                                echo "                                            <th>";
                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("action_delete", array(), "SonataAdminBundle"), "html", null, true);
                                echo "</th>
                                        ";
                            } else {
                                // line 24
                                echo "                                            <th
                                                ";
                                // line 25
                                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["nested_field"], "vars", array(), "any", false, true), "required", array(), "array", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["nested_field"], "vars", array(), "any", false, true), "required", array(), "array"), false)) : (false))) {
                                    // line 26
                                    echo "                                                    class=\"required\"
                                                ";
                                }
                                // line 28
                                echo "                                            >
                                                ";
                                // line 29
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["nested_field"], "vars", array()), "sonata_admin", array(), "array"), "admin", array()), "trans", array(0 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["nested_field"], "vars", array()), "label", array())), "method"), "html", null, true);
                                echo "
                                            </th>
                                        ";
                            }
                            // line 32
                            echo "                                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 33
                        echo "                                </tr>
                            </thead>
                            <tbody class=\"sonata-ba-tbody\">
                                ";
                        // line 36
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 36, $this->source); })()), "children", array()));
                        foreach ($context['_seq'] as $context["nested_group_field_name"] => $context["nested_group_field"]) {
                            // line 37
                            echo "                                    <tr>
                                        ";
                            // line 38
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["nested_group_field"], "children", array()));
                            foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                                // line 39
                                echo "                                            <td
                                                class=\"sonata-ba-td-";
                                // line 40
                                echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 40, $this->source); })()), "html", null, true);
                                echo "-";
                                echo twig_escape_filter($this->env, $context["field_name"], "html", null, true);
                                echo " control-group
                                                ";
                                // line 41
                                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["nested_field"], "vars", array(), "any", false, true), "errors", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["nested_field"], "vars", array(), "any", false, true), "errors", array()), false)) : (false))) {
                                    echo " error sonata-ba-field-error";
                                }
                                echo "\"
                                            >
                                                ";
                                // line 43
                                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["sonata_admin"] ?? null), "field_description", array(), "any", false, true), "associationadmin", array(), "any", false, true), "hasformfielddescriptions", array(0 => $context["field_name"]), "method", true, true)) {
                                    // line 44
                                    echo "                                                    ";
                                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["nested_field"], 'widget');
                                    echo "

                                                    ";
                                    // line 46
                                    $context["dummy"] = twig_get_attribute($this->env, $this->source, $context["nested_group_field"], "setrendered", array());
                                    // line 47
                                    echo "                                                ";
                                } else {
                                    // line 48
                                    echo "                                                    ";
                                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["nested_field"], 'widget');
                                    echo "
                                                ";
                                }
                                // line 50
                                echo "                                                ";
                                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["nested_field"], "vars", array(), "any", false, true), "errors", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["nested_field"], "vars", array(), "any", false, true), "errors", array()), false)) : (false))) {
                                    // line 51
                                    echo "                                                    <div class=\"help-inline sonata-ba-field-error-messages\">
                                                        ";
                                    // line 52
                                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["nested_field"], 'errors');
                                    echo "
                                                    </div>
                                                ";
                                }
                                // line 55
                                echo "                                            </td>
                                        ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 57
                            echo "                                    </tr>
                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['nested_group_field_name'], $context['nested_group_field'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 59
                        echo "                            </tbody>
                        </table>
                    ";
                    }
                    // line 62
                    echo "                ";
                } elseif ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 62, $this->source); })()), "children", array())) > 0)) {
                    // line 63
                    echo "                    <div>
                        ";
                    // line 64
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 64, $this->source); })()), "children", array()));
                    foreach ($context['_seq'] as $context["nested_group_field_name"] => $context["nested_group_field"]) {
                        // line 65
                        echo "                            ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["nested_group_field"], "children", array()));
                        foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                            // line 66
                            echo "                                ";
                            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["sonata_admin"] ?? null), "field_description", array(), "any", false, true), "associationadmin", array(), "any", false, true), "hasformfielddescriptions", array(0 => $context["field_name"]), "method", true, true)) {
                                // line 67
                                echo "                                    ";
                                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["nested_field"], 'row', array("inline" => "natural", "edit" => "inline"));
                                // line 70
                                echo "
                                    ";
                                // line 71
                                $context["dummy"] = twig_get_attribute($this->env, $this->source, $context["nested_group_field"], "setrendered", array());
                                // line 72
                                echo "                                ";
                            } else {
                                // line 73
                                echo "                                    ";
                                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["nested_field"], "vars", array()), "name", array()) == "_delete")) {
                                    // line 74
                                    echo "                                        ";
                                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["nested_field"], 'row', array("label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("action_delete", array(), "SonataAdminBundle")));
                                    echo "
                                    ";
                                } else {
                                    // line 76
                                    echo "                                        ";
                                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["nested_field"], 'row');
                                    echo "
                                    ";
                                }
                                // line 78
                                echo "                                ";
                            }
                            // line 79
                            echo "                            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 80
                        echo "                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['nested_group_field_name'], $context['nested_group_field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 81
                    echo "                    </div>
                ";
                }
                // line 83
                echo "            ";
            } else {
                // line 84
                echo "                ";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 84, $this->source); })()), 'widget');
                echo "
            ";
            }
            // line 86
            echo "
        </span>

        ";
            // line 89
            if ((twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 89, $this->source); })()), "edit", array()) == "inline")) {
                // line 90
                echo "
            ";
                // line 91
                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 91, $this->source); })()), "field_description", array()), "associationadmin", array()), "hasRoute", array(0 => "create"), "method") && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 92
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 92, $this->source); })()), "field_description", array()), "associationadmin", array()), "hasAccess", array(0 => "create"), "method")) &&                 // line 93
(isset($context["btn_add"]) || array_key_exists("btn_add", $context) ? $context["btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "btn_add" does not exist.', 93, $this->source); })()))) {
                    // line 94
                    echo "                <span id=\"field_actions_";
                    echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 94, $this->source); })()), "html", null, true);
                    echo "\" >
                    <a
                        href=\"";
                    // line 96
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 96, $this->source); })()), "field_description", array()), "associationadmin", array()), "generateUrl", array(0 => "create", 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 96, $this->source); })()), "field_description", array()), "getOption", array(0 => "link_parameters", 1 => array()), "method")), "method"), "html", null, true);
                    echo "\"
                        onclick=\"return start_field_retrieve_";
                    // line 97
                    echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 97, $this->source); })()), "html", null, true);
                    echo "(this);\"
                        class=\"btn btn-success btn-sm sonata-ba-action\"
                        title=\"";
                    // line 99
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["btn_add"]) || array_key_exists("btn_add", $context) ? $context["btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "btn_add" does not exist.', 99, $this->source); })()), array(), (isset($context["btn_catalogue"]) || array_key_exists("btn_catalogue", $context) ? $context["btn_catalogue"] : (function () { throw new Twig_Error_Runtime('Variable "btn_catalogue" does not exist.', 99, $this->source); })())), "html", null, true);
                    echo "\"
                        >
                        <i class=\"fa fa-plus-circle\"></i>
                        ";
                    // line 102
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["btn_add"]) || array_key_exists("btn_add", $context) ? $context["btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "btn_add" does not exist.', 102, $this->source); })()), array(), (isset($context["btn_catalogue"]) || array_key_exists("btn_catalogue", $context) ? $context["btn_catalogue"] : (function () { throw new Twig_Error_Runtime('Variable "btn_catalogue" does not exist.', 102, $this->source); })())), "html", null, true);
                    echo "
                    </a>
                </span>
            ";
                }
                // line 106
                echo "
            ";
                // line 108
                echo "            ";
                $this->loadTemplate("@SonataAdmin/CRUD/Association/edit_one_script.html.twig", "@SonataAdmin/CRUD/Association/edit_many_to_many.html.twig", 108)->display($context);
                // line 109
                echo "
        ";
            } else {
                // line 111
                echo "            <div id=\"field_container_";
                echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 111, $this->source); })()), "html", null, true);
                echo "\" class=\"field-container\">
                <span id=\"field_widget_";
                // line 112
                echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 112, $this->source); })()), "html", null, true);
                echo "\" >
                    ";
                // line 113
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 113, $this->source); })()), 'widget');
                echo "
                </span>

                <span id=\"field_actions_";
                // line 116
                echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 116, $this->source); })()), "html", null, true);
                echo "\" class=\"field-actions\">
                    ";
                // line 117
                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 117, $this->source); })()), "field_description", array()), "associationadmin", array()), "hasRoute", array(0 => "create"), "method") && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 118
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 118, $this->source); })()), "field_description", array()), "associationadmin", array()), "hasAccess", array(0 => "create"), "method")) &&                 // line 119
(isset($context["btn_add"]) || array_key_exists("btn_add", $context) ? $context["btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "btn_add" does not exist.', 119, $this->source); })()))) {
                    // line 120
                    echo "                        <a
                            href=\"";
                    // line 121
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 121, $this->source); })()), "field_description", array()), "associationadmin", array()), "generateUrl", array(0 => "create", 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 121, $this->source); })()), "field_description", array()), "getOption", array(0 => "link_parameters", 1 => array()), "method")), "method"), "html", null, true);
                    echo "\"
                            onclick=\"return start_field_dialog_form_add_";
                    // line 122
                    echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 122, $this->source); })()), "html", null, true);
                    echo "(this);\"
                            class=\"btn btn-success btn-sm sonata-ba-action\"
                            title=\"";
                    // line 124
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["btn_add"]) || array_key_exists("btn_add", $context) ? $context["btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "btn_add" does not exist.', 124, $this->source); })()), array(), (isset($context["btn_catalogue"]) || array_key_exists("btn_catalogue", $context) ? $context["btn_catalogue"] : (function () { throw new Twig_Error_Runtime('Variable "btn_catalogue" does not exist.', 124, $this->source); })())), "html", null, true);
                    echo "\"
                            >
                            <i class=\"fa fa-plus-circle\"></i>
                            ";
                    // line 127
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["btn_add"]) || array_key_exists("btn_add", $context) ? $context["btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "btn_add" does not exist.', 127, $this->source); })()), array(), (isset($context["btn_catalogue"]) || array_key_exists("btn_catalogue", $context) ? $context["btn_catalogue"] : (function () { throw new Twig_Error_Runtime('Variable "btn_catalogue" does not exist.', 127, $this->source); })())), "html", null, true);
                    echo "
                        </a>
                    ";
                }
                // line 130
                echo "                </span>

                ";
                // line 132
                $this->loadTemplate("@SonataAdmin/CRUD/Association/edit_modal.html.twig", "@SonataAdmin/CRUD/Association/edit_many_to_many.html.twig", 132)->display($context);
                // line 133
                echo "            </div>

            ";
                // line 135
                $this->loadTemplate("@SonataAdmin/CRUD/Association/edit_many_script.html.twig", "@SonataAdmin/CRUD/Association/edit_many_to_many.html.twig", 135)->display($context);
                // line 136
                echo "        ";
            }
            // line 137
            echo "    </div>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SonataAdmin/CRUD/Association/edit_many_to_many.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  358 => 137,  355 => 136,  353 => 135,  349 => 133,  347 => 132,  343 => 130,  337 => 127,  331 => 124,  326 => 122,  322 => 121,  319 => 120,  317 => 119,  316 => 118,  315 => 117,  311 => 116,  305 => 113,  301 => 112,  296 => 111,  292 => 109,  289 => 108,  286 => 106,  279 => 102,  273 => 99,  268 => 97,  264 => 96,  258 => 94,  256 => 93,  255 => 92,  254 => 91,  251 => 90,  249 => 89,  244 => 86,  238 => 84,  235 => 83,  231 => 81,  225 => 80,  219 => 79,  216 => 78,  210 => 76,  204 => 74,  201 => 73,  198 => 72,  196 => 71,  193 => 70,  190 => 67,  187 => 66,  182 => 65,  178 => 64,  175 => 63,  172 => 62,  167 => 59,  160 => 57,  153 => 55,  147 => 52,  144 => 51,  141 => 50,  135 => 48,  132 => 47,  130 => 46,  124 => 44,  122 => 43,  115 => 41,  109 => 40,  106 => 39,  102 => 38,  99 => 37,  95 => 36,  90 => 33,  84 => 32,  78 => 29,  75 => 28,  71 => 26,  69 => 25,  66 => 24,  60 => 22,  57 => 21,  53 => 20,  48 => 17,  45 => 16,  42 => 15,  40 => 14,  36 => 13,  31 => 12,  29 => 11,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}
{% if sonata_admin.field_description.hasassociationadmin %}
    <div id=\"field_container_{{ id }}\" class=\"field-container\">
        <span id=\"field_widget_{{ id }}\" >
            {% if sonata_admin.edit == 'inline' %}
                {% if sonata_admin.inline == 'table' %}
                    {% if form.children|length > 0 %}
                        <table class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    {% for field_name, nested_field in form.children[0].children %}
                                        {% if field_name == '_delete' %}
                                            <th>{{ 'action_delete'|trans({}, 'SonataAdminBundle') }}</th>
                                        {% else %}
                                            <th
                                                {% if nested_field.vars['required']|default(false) %}
                                                    class=\"required\"
                                                {% endif %}
                                            >
                                                {{ nested_field.vars['sonata_admin'].admin.trans(nested_field.vars.label) }}
                                            </th>
                                        {% endif %}
                                    {% endfor %}
                                </tr>
                            </thead>
                            <tbody class=\"sonata-ba-tbody\">
                                {% for nested_group_field_name, nested_group_field in form.children %}
                                    <tr>
                                        {% for field_name, nested_field in nested_group_field.children %}
                                            <td
                                                class=\"sonata-ba-td-{{ id }}-{{ field_name  }} control-group
                                                {% if nested_field.vars.errors|default(false) %} error sonata-ba-field-error{% endif %}\"
                                            >
                                                {% if sonata_admin.field_description.associationadmin.hasformfielddescriptions(field_name) is defined %}
                                                    {{ form_widget(nested_field) }}

                                                    {% set dummy = nested_group_field.setrendered %}
                                                {% else %}
                                                    {{ form_widget(nested_field) }}
                                                {% endif %}
                                                {% if nested_field.vars.errors|default(false) %}
                                                    <div class=\"help-inline sonata-ba-field-error-messages\">
                                                        {{ form_errors(nested_field) }}
                                                    </div>
                                                {% endif %}
                                            </td>
                                        {% endfor %}
                                    </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    {% endif %}
                {% elseif form.children|length > 0 %}
                    <div>
                        {% for nested_group_field_name, nested_group_field in form.children %}
                            {% for field_name, nested_field in nested_group_field.children %}
                                {% if sonata_admin.field_description.associationadmin.hasformfielddescriptions(field_name) is defined %}
                                    {{ form_row(nested_field, {
                                        'inline': 'natural',
                                        'edit'  : 'inline'
                                    }) }}
                                    {% set dummy = nested_group_field.setrendered %}
                                {% else %}
                                    {% if nested_field.vars.name == '_delete' %}
                                        {{ form_row(nested_field, { 'label': ('action_delete'|trans({}, 'SonataAdminBundle')) }) }}
                                    {% else %}
                                        {{ form_row(nested_field) }}
                                    {% endif %}
                                {% endif %}
                            {% endfor %}
                        {% endfor %}
                    </div>
                {% endif %}
            {% else %}
                {{ form_widget(form) }}
            {% endif %}

        </span>

        {% if sonata_admin.edit == 'inline' %}

            {% if sonata_admin.field_description.associationadmin.hasRoute('create')
                and sonata_admin.field_description.associationadmin.hasAccess('create')
                and btn_add %}
                <span id=\"field_actions_{{ id }}\" >
                    <a
                        href=\"{{ sonata_admin.field_description.associationadmin.generateUrl('create', sonata_admin.field_description.getOption('link_parameters', {})) }}\"
                        onclick=\"return start_field_retrieve_{{ id }}(this);\"
                        class=\"btn btn-success btn-sm sonata-ba-action\"
                        title=\"{{ btn_add|trans({}, btn_catalogue) }}\"
                        >
                        <i class=\"fa fa-plus-circle\"></i>
                        {{ btn_add|trans({}, btn_catalogue) }}
                    </a>
                </span>
            {% endif %}

            {# include association code #}
            {% include '@SonataAdmin/CRUD/Association/edit_one_script.html.twig' %}

        {% else %}
            <div id=\"field_container_{{ id }}\" class=\"field-container\">
                <span id=\"field_widget_{{ id }}\" >
                    {{ form_widget(form) }}
                </span>

                <span id=\"field_actions_{{ id }}\" class=\"field-actions\">
                    {% if sonata_admin.field_description.associationadmin.hasRoute('create')
                        and sonata_admin.field_description.associationadmin.hasAccess('create')
                        and btn_add %}
                        <a
                            href=\"{{ sonata_admin.field_description.associationadmin.generateUrl('create', sonata_admin.field_description.getOption('link_parameters', {})) }}\"
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
            </div>

            {% include '@SonataAdmin/CRUD/Association/edit_many_script.html.twig' %}
        {% endif %}
    </div>
{% endif %}
", "@SonataAdmin/CRUD/Association/edit_many_to_many.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/CRUD/Association/edit_many_to_many.html.twig");
    }
}
