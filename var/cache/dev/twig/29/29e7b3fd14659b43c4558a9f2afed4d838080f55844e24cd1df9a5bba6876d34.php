<?php

/* @SonataAdmin/CRUD/Association/edit_many_to_one.html.twig */
class __TwigTemplate_f136b0df5afd37493698b56fb6a19a50eff597bb47e48438c17fdb7b109b08da extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/Association/edit_many_to_one.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/Association/edit_many_to_one.html.twig"));

        // line 11
        echo "
";
        // line 12
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 12, $this->source); })()), "field_description", array()), "hasassociationadmin", array())) {
            // line 13
            echo "    ";
            echo twig_escape_filter($this->env, $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->renderRelationElement((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 13, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 13, $this->source); })()), "field_description", array())), "html", null, true);
            echo "
";
        } elseif ((twig_get_attribute($this->env, $this->source,         // line 14
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 14, $this->source); })()), "edit", array()) == "inline")) {
            // line 15
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 15, $this->source); })()), "field_description", array()), "associationadmin", array()), "formfielddescriptions", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["field_description"]) {
                // line 16
                echo "        ";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 16, $this->source); })()), twig_get_attribute($this->env, $this->source, $context["field_description"], "name", array()), array(), "array"), 'row');
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_description'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 19
            echo "    <div id=\"field_container_";
            echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 19, $this->source); })()), "html", null, true);
            echo "\" class=\"field-container\">
        ";
            // line 20
            if ((twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 20, $this->source); })()), "edit", array()) == "list")) {
                // line 21
                echo "            <span id=\"field_widget_";
                echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 21, $this->source); })()), "html", null, true);
                echo "\" class=\"field-short-description\">
                ";
                // line 22
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 22, $this->source); })()), "admin", array()), "id", array(0 => twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 22, $this->source); })()), "value", array())), "method")) {
                    // line 23
                    echo "                    ";
                    echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sonata_admin_short_object_information", array("code" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 24
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 24, $this->source); })()), "field_description", array()), "associationadmin", array()), "code", array()), "objectId" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 25
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 25, $this->source); })()), "field_description", array()), "associationadmin", array()), "id", array(0 => twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 25, $this->source); })()), "value", array())), "method"), "uniqid" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 26
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 26, $this->source); })()), "field_description", array()), "associationadmin", array()), "uniqid", array()), "linkParameters" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 27
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 27, $this->source); })()), "field_description", array()), "options", array()), "link_parameters", array()))));
                    // line 28
                    echo "
                ";
                } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 29
($context["sonata_admin"] ?? null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "placeholder", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 29, $this->source); })()), "field_description", array()), "options", array()), "placeholder", array()))) {
                    // line 30
                    echo "                    <span class=\"inner-field-short-description\">
                        ";
                    // line 31
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 31, $this->source); })()), "field_description", array()), "options", array()), "placeholder", array()), array(), "SonataAdminBundle"), "html", null, true);
                    echo "
                    </span>
                ";
                }
                // line 34
                echo "            </span>
            <span style=\"display: none\" >
                ";
                // line 36
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 36, $this->source); })()), 'widget');
                echo "
            </span>
        ";
            } else {
                // line 39
                echo "            <span id=\"field_widget_";
                echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 39, $this->source); })()), "html", null, true);
                echo "\" >
                ";
                // line 40
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 40, $this->source); })()), 'widget');
                echo "
            </span>
        ";
            }
            // line 43
            echo "
        <div id=\"field_actions_";
            // line 44
            echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 44, $this->source); })()), "html", null, true);
            echo "\" class=\"field-actions\">
            ";
            // line 45
            $context["display_btn_list"] = ((((twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 45, $this->source); })()), "edit", array()) == "list") && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 46
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 46, $this->source); })()), "field_description", array()), "associationadmin", array()), "hasRoute", array(0 => "list"), "method")) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 47
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 47, $this->source); })()), "field_description", array()), "associationadmin", array()), "hasAccess", array(0 => "list"), "method")) &&             // line 48
(isset($context["btn_list"]) || array_key_exists("btn_list", $context) ? $context["btn_list"] : (function () { throw new Twig_Error_Runtime('Variable "btn_list" does not exist.', 48, $this->source); })()));
            // line 49
            echo "            ";
            $context["display_btn_add"] = ((((twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 49, $this->source); })()), "edit", array()) != "admin") && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 50
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 50, $this->source); })()), "field_description", array()), "associationadmin", array()), "hasRoute", array(0 => "create"), "method")) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 51
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 51, $this->source); })()), "field_description", array()), "associationadmin", array()), "hasAccess", array(0 => "create"), "method")) &&             // line 52
(isset($context["btn_add"]) || array_key_exists("btn_add", $context) ? $context["btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "btn_add" does not exist.', 52, $this->source); })()));
            // line 53
            echo "            ";
            if (((isset($context["display_btn_list"]) || array_key_exists("display_btn_list", $context) ? $context["display_btn_list"] : (function () { throw new Twig_Error_Runtime('Variable "display_btn_list" does not exist.', 53, $this->source); })()) || (isset($context["display_btn_add"]) || array_key_exists("display_btn_add", $context) ? $context["display_btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "display_btn_add" does not exist.', 53, $this->source); })()))) {
                // line 54
                echo "            <div class=\"btn-group\">
                ";
                // line 55
                if ((isset($context["display_btn_list"]) || array_key_exists("display_btn_list", $context) ? $context["display_btn_list"] : (function () { throw new Twig_Error_Runtime('Variable "display_btn_list" does not exist.', 55, $this->source); })())) {
                    // line 56
                    echo "                    <a  href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 56, $this->source); })()), "field_description", array()), "associationadmin", array()), "generateUrl", array(0 => "list", 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 56, $this->source); })()), "field_description", array()), "getOption", array(0 => "link_parameters", 1 => array()), "method")), "method"), "html", null, true);
                    echo "\"
                        onclick=\"return start_field_dialog_form_list_";
                    // line 57
                    echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 57, $this->source); })()), "html", null, true);
                    echo "(this);\"
                        class=\"btn btn-info btn-sm sonata-ba-action\"
                        title=\"";
                    // line 59
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["btn_list"]) || array_key_exists("btn_list", $context) ? $context["btn_list"] : (function () { throw new Twig_Error_Runtime('Variable "btn_list" does not exist.', 59, $this->source); })()), array(), (isset($context["btn_catalogue"]) || array_key_exists("btn_catalogue", $context) ? $context["btn_catalogue"] : (function () { throw new Twig_Error_Runtime('Variable "btn_catalogue" does not exist.', 59, $this->source); })())), "html", null, true);
                    echo "\"
                        >
                        <i class=\"fa fa-list\"></i>
                        ";
                    // line 62
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["btn_list"]) || array_key_exists("btn_list", $context) ? $context["btn_list"] : (function () { throw new Twig_Error_Runtime('Variable "btn_list" does not exist.', 62, $this->source); })()), array(), (isset($context["btn_catalogue"]) || array_key_exists("btn_catalogue", $context) ? $context["btn_catalogue"] : (function () { throw new Twig_Error_Runtime('Variable "btn_catalogue" does not exist.', 62, $this->source); })())), "html", null, true);
                    echo "
                    </a>
                ";
                }
                // line 65
                echo "
                ";
                // line 66
                if ((isset($context["display_btn_add"]) || array_key_exists("display_btn_add", $context) ? $context["display_btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "display_btn_add" does not exist.', 66, $this->source); })())) {
                    // line 67
                    echo "                    <a  href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 67, $this->source); })()), "field_description", array()), "associationadmin", array()), "generateUrl", array(0 => "create", 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 67, $this->source); })()), "field_description", array()), "getOption", array(0 => "link_parameters", 1 => array()), "method")), "method"), "html", null, true);
                    echo "\"
                        onclick=\"return start_field_dialog_form_add_";
                    // line 68
                    echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 68, $this->source); })()), "html", null, true);
                    echo "(this);\"
                        class=\"btn btn-success btn-sm sonata-ba-action\"
                        title=\"";
                    // line 70
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["btn_add"]) || array_key_exists("btn_add", $context) ? $context["btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "btn_add" does not exist.', 70, $this->source); })()), array(), (isset($context["btn_catalogue"]) || array_key_exists("btn_catalogue", $context) ? $context["btn_catalogue"] : (function () { throw new Twig_Error_Runtime('Variable "btn_catalogue" does not exist.', 70, $this->source); })())), "html", null, true);
                    echo "\"
                        >
                        <i class=\"fa fa-plus-circle\"></i>
                        ";
                    // line 73
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["btn_add"]) || array_key_exists("btn_add", $context) ? $context["btn_add"] : (function () { throw new Twig_Error_Runtime('Variable "btn_add" does not exist.', 73, $this->source); })()), array(), (isset($context["btn_catalogue"]) || array_key_exists("btn_catalogue", $context) ? $context["btn_catalogue"] : (function () { throw new Twig_Error_Runtime('Variable "btn_catalogue" does not exist.', 73, $this->source); })())), "html", null, true);
                    echo "
                    </a>
                ";
                }
                // line 76
                echo "            </div>
            ";
            }
            // line 78
            echo "
            ";
            // line 79
            if (((((twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 79, $this->source); })()), "edit", array()) == "list") && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 80
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 80, $this->source); })()), "field_description", array()), "associationadmin", array()), "hasRoute", array(0 => "delete"), "method")) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 81
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 81, $this->source); })()), "field_description", array()), "associationadmin", array()), "hasAccess", array(0 => "delete"), "method")) &&             // line 82
(isset($context["btn_delete"]) || array_key_exists("btn_delete", $context) ? $context["btn_delete"] : (function () { throw new Twig_Error_Runtime('Variable "btn_delete" does not exist.', 82, $this->source); })()))) {
                // line 83
                echo "                <a  href=\"\"
                    onclick=\"return remove_selected_element_";
                // line 84
                echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 84, $this->source); })()), "html", null, true);
                echo "(this);\"
                    class=\"btn btn-danger btn-sm sonata-ba-action\"
                    title=\"";
                // line 86
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["btn_delete"]) || array_key_exists("btn_delete", $context) ? $context["btn_delete"] : (function () { throw new Twig_Error_Runtime('Variable "btn_delete" does not exist.', 86, $this->source); })()), array(), (isset($context["btn_catalogue"]) || array_key_exists("btn_catalogue", $context) ? $context["btn_catalogue"] : (function () { throw new Twig_Error_Runtime('Variable "btn_catalogue" does not exist.', 86, $this->source); })())), "html", null, true);
                echo "\"
                    >
                    <i class=\"fa fa-minus-circle\"></i>
                    ";
                // line 89
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["btn_delete"]) || array_key_exists("btn_delete", $context) ? $context["btn_delete"] : (function () { throw new Twig_Error_Runtime('Variable "btn_delete" does not exist.', 89, $this->source); })()), array(), (isset($context["btn_catalogue"]) || array_key_exists("btn_catalogue", $context) ? $context["btn_catalogue"] : (function () { throw new Twig_Error_Runtime('Variable "btn_catalogue" does not exist.', 89, $this->source); })())), "html", null, true);
                echo "
                </a>
            ";
            }
            // line 92
            echo "        </div>

        ";
            // line 94
            $this->loadTemplate("@SonataAdmin/CRUD/Association/edit_modal.html.twig", "@SonataAdmin/CRUD/Association/edit_many_to_one.html.twig", 94)->display($context);
            // line 95
            echo "    </div>

    ";
            // line 97
            $this->loadTemplate("@SonataAdmin/CRUD/Association/edit_many_script.html.twig", "@SonataAdmin/CRUD/Association/edit_many_to_one.html.twig", 97)->display($context);
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SonataAdmin/CRUD/Association/edit_many_to_one.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  229 => 97,  225 => 95,  223 => 94,  219 => 92,  213 => 89,  207 => 86,  202 => 84,  199 => 83,  197 => 82,  196 => 81,  195 => 80,  194 => 79,  191 => 78,  187 => 76,  181 => 73,  175 => 70,  170 => 68,  165 => 67,  163 => 66,  160 => 65,  154 => 62,  148 => 59,  143 => 57,  138 => 56,  136 => 55,  133 => 54,  130 => 53,  128 => 52,  127 => 51,  126 => 50,  124 => 49,  122 => 48,  121 => 47,  120 => 46,  119 => 45,  115 => 44,  112 => 43,  106 => 40,  101 => 39,  95 => 36,  91 => 34,  85 => 31,  82 => 30,  80 => 29,  77 => 28,  75 => 27,  74 => 26,  73 => 25,  72 => 24,  70 => 23,  68 => 22,  63 => 21,  61 => 20,  56 => 19,  46 => 16,  41 => 15,  39 => 14,  34 => 13,  32 => 12,  29 => 11,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}

{% if not sonata_admin.field_description.hasassociationadmin%}
    {{ value|render_relation_element(sonata_admin.field_description) }}
{% elseif sonata_admin.edit == 'inline' %}
    {% for field_description in sonata_admin.field_description.associationadmin.formfielddescriptions %}
        {{ form_row(form[field_description.name])}}
    {% endfor %}
{% else %}
    <div id=\"field_container_{{ id }}\" class=\"field-container\">
        {% if sonata_admin.edit == 'list' %}
            <span id=\"field_widget_{{ id }}\" class=\"field-short-description\">
                {% if sonata_admin.admin.id(sonata_admin.value) %}
                    {{ render(path('sonata_admin_short_object_information', {
                        'code':     sonata_admin.field_description.associationadmin.code,
                        'objectId': sonata_admin.field_description.associationadmin.id(sonata_admin.value),
                        'uniqid':   sonata_admin.field_description.associationadmin.uniqid,
                        'linkParameters': sonata_admin.field_description.options.link_parameters
                    })) }}
                {% elseif sonata_admin.field_description.options.placeholder is defined and sonata_admin.field_description.options.placeholder %}
                    <span class=\"inner-field-short-description\">
                        {{ sonata_admin.field_description.options.placeholder|trans({}, 'SonataAdminBundle') }}
                    </span>
                {% endif %}
            </span>
            <span style=\"display: none\" >
                {{ form_widget(form) }}
            </span>
        {% else %}
            <span id=\"field_widget_{{ id }}\" >
                {{ form_widget(form) }}
            </span>
        {% endif %}

        <div id=\"field_actions_{{ id }}\" class=\"field-actions\">
            {% set display_btn_list = sonata_admin.edit == 'list'
                and sonata_admin.field_description.associationadmin.hasRoute('list')
                and sonata_admin.field_description.associationadmin.hasAccess('list')
                and btn_list %}
            {% set display_btn_add = sonata_admin.edit != 'admin'
                and sonata_admin.field_description.associationadmin.hasRoute('create')
                and sonata_admin.field_description.associationadmin.hasAccess('create')
                and btn_add %}
            {% if display_btn_list or display_btn_add %}
            <div class=\"btn-group\">
                {% if display_btn_list %}
                    <a  href=\"{{ sonata_admin.field_description.associationadmin.generateUrl('list', sonata_admin.field_description.getOption('link_parameters', {})) }}\"
                        onclick=\"return start_field_dialog_form_list_{{ id }}(this);\"
                        class=\"btn btn-info btn-sm sonata-ba-action\"
                        title=\"{{ btn_list|trans({}, btn_catalogue) }}\"
                        >
                        <i class=\"fa fa-list\"></i>
                        {{ btn_list|trans({}, btn_catalogue) }}
                    </a>
                {% endif %}

                {% if display_btn_add %}
                    <a  href=\"{{ sonata_admin.field_description.associationadmin.generateUrl('create', sonata_admin.field_description.getOption('link_parameters', {})) }}\"
                        onclick=\"return start_field_dialog_form_add_{{ id }}(this);\"
                        class=\"btn btn-success btn-sm sonata-ba-action\"
                        title=\"{{ btn_add|trans({}, btn_catalogue) }}\"
                        >
                        <i class=\"fa fa-plus-circle\"></i>
                        {{ btn_add|trans({}, btn_catalogue) }}
                    </a>
                {% endif %}
            </div>
            {% endif %}

            {% if sonata_admin.edit == 'list'
                and sonata_admin.field_description.associationadmin.hasRoute('delete')
                and sonata_admin.field_description.associationadmin.hasAccess('delete')
                and btn_delete %}
                <a  href=\"\"
                    onclick=\"return remove_selected_element_{{ id }}(this);\"
                    class=\"btn btn-danger btn-sm sonata-ba-action\"
                    title=\"{{ btn_delete|trans({}, btn_catalogue) }}\"
                    >
                    <i class=\"fa fa-minus-circle\"></i>
                    {{ btn_delete|trans({}, btn_catalogue) }}
                </a>
            {% endif %}
        </div>

        {% include '@SonataAdmin/CRUD/Association/edit_modal.html.twig' %}
    </div>

    {% include '@SonataAdmin/CRUD/Association/edit_many_script.html.twig' %}
{% endif %}
", "@SonataAdmin/CRUD/Association/edit_many_to_one.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/CRUD/Association/edit_many_to_one.html.twig");
    }
}
