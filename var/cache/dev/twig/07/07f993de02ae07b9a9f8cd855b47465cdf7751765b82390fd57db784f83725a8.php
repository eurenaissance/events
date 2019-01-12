<?php

/* @SonataAdmin/Form/form_admin_fields.html.twig */
class __TwigTemplate_8ab849abd49dc47a954b181b7f740d938819b44428c1e745ab7f5cb21e6ba919 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 12
        $this->parent = $this->loadTemplate("form_div_layout.html.twig", "@SonataAdmin/Form/form_admin_fields.html.twig", 12);
        $this->blocks = array(
            'form_errors' => array($this, 'block_form_errors'),
            'sonata_help' => array($this, 'block_sonata_help'),
            'form_widget' => array($this, 'block_form_widget'),
            'form_widget_simple' => array($this, 'block_form_widget_simple'),
            'textarea_widget' => array($this, 'block_textarea_widget'),
            'number_widget' => array($this, 'block_number_widget'),
            'choice_widget' => array($this, 'block_choice_widget'),
            'money_widget' => array($this, 'block_money_widget'),
            'percent_widget' => array($this, 'block_percent_widget'),
            'checkbox_widget' => array($this, 'block_checkbox_widget'),
            'radio_widget' => array($this, 'block_radio_widget'),
            'form_label' => array($this, 'block_form_label'),
            'checkbox_label' => array($this, 'block_checkbox_label'),
            'radio_label' => array($this, 'block_radio_label'),
            'checkbox_radio_label' => array($this, 'block_checkbox_radio_label'),
            'choice_widget_expanded' => array($this, 'block_choice_widget_expanded'),
            'choice_widget_collapsed' => array($this, 'block_choice_widget_collapsed'),
            'date_widget' => array($this, 'block_date_widget'),
            'time_widget' => array($this, 'block_time_widget'),
            'datetime_widget' => array($this, 'block_datetime_widget'),
            'form_row' => array($this, 'block_form_row'),
            'checkbox_row' => array($this, 'block_checkbox_row'),
            'radio_row' => array($this, 'block_radio_row'),
            'sonata_type_native_collection_widget_row' => array($this, 'block_sonata_type_native_collection_widget_row'),
            'sonata_type_native_collection_widget' => array($this, 'block_sonata_type_native_collection_widget'),
            'sonata_type_immutable_array_widget' => array($this, 'block_sonata_type_immutable_array_widget'),
            'sonata_type_immutable_array_widget_row' => array($this, 'block_sonata_type_immutable_array_widget_row'),
            'sonata_type_model_autocomplete_widget' => array($this, 'block_sonata_type_model_autocomplete_widget'),
            'sonata_type_choice_field_mask_widget' => array($this, 'block_sonata_type_choice_field_mask_widget'),
            'sonata_type_choice_multiple_sortable' => array($this, 'block_sonata_type_choice_multiple_sortable'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "form_div_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/Form/form_admin_fields.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/Form/form_admin_fields.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 14
    public function block_form_errors($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_errors"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_errors"));

        // line 15
        if ((twig_length_filter($this->env, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new Twig_Error_Runtime('Variable "errors" does not exist.', 15, $this->source); })())) > 0)) {
            // line 16
            echo "        ";
            if ( !twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 16, $this->source); })()), "parent", array())) {
                echo "<div class=\"alert alert-danger\">";
            }
            // line 17
            echo "            <ul class=\"list-unstyled\">
                ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new Twig_Error_Runtime('Variable "errors" does not exist.', 18, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 19
                echo "                    <li><i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["error"], "message", array()), "html", null, true);
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "            </ul>
        ";
            // line 22
            if ( !twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 22, $this->source); })()), "parent", array())) {
                echo "</div>";
            }
            // line 23
            echo "    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 26
    public function block_sonata_help($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_help"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_help"));

        // line 27
        ob_start();
        // line 28
        if (((isset($context["sonata_help"]) || array_key_exists("sonata_help", $context)) && (isset($context["sonata_help"]) || array_key_exists("sonata_help", $context) ? $context["sonata_help"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_help" does not exist.', 28, $this->source); })()))) {
            // line 29
            echo "    <span class=\"help-block sonata-ba-field-widget-help\">";
            echo (isset($context["sonata_help"]) || array_key_exists("sonata_help", $context) ? $context["sonata_help"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_help" does not exist.', 29, $this->source); })());
            echo "</span>
";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 34
    public function block_form_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_widget"));

        // line 35
        $this->displayParentBlock("form_widget", $context, $blocks);
        echo "
    ";
        // line 36
        $this->displayBlock("sonata_help", $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 39
    public function block_form_widget_simple($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_widget_simple"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_widget_simple"));

        // line 40
        echo "    ";
        $context["type"] = (((isset($context["type"]) || array_key_exists("type", $context))) ? (_twig_default_filter((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new Twig_Error_Runtime('Variable "type" does not exist.', 40, $this->source); })()), "text")) : ("text"));
        // line 41
        echo "    ";
        if (((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new Twig_Error_Runtime('Variable "type" does not exist.', 41, $this->source); })()) != "file")) {
            // line 42
            echo "        ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new Twig_Error_Runtime('Variable "attr" does not exist.', 42, $this->source); })()), array("class" => (((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array()), "")) : ("")) . " form-control")));
            // line 43
            echo "    ";
        }
        // line 44
        echo "    ";
        $this->displayParentBlock("form_widget_simple", $context, $blocks);
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 47
    public function block_textarea_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "textarea_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "textarea_widget"));

        // line 48
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new Twig_Error_Runtime('Variable "attr" does not exist.', 48, $this->source); })()), array("class" => (((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array()), "")) : ("")) . " form-control")));
        // line 49
        echo "    ";
        $this->displayParentBlock("textarea_widget", $context, $blocks);
        echo "
    ";
        // line 50
        $this->displayBlock("sonata_help", $context, $blocks);
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 53
    public function block_number_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "number_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "number_widget"));

        // line 54
        $this->displayParentBlock("number_widget", $context, $blocks);
        echo "
    ";
        // line 55
        $this->displayBlock("sonata_help", $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 58
    public function block_choice_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "choice_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "choice_widget"));

        // line 59
        $this->displayParentBlock("choice_widget", $context, $blocks);
        echo "
    ";
        // line 60
        $this->displayBlock("sonata_help", $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 64
    public function block_money_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "money_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "money_widget"));

        // line 65
        if (((isset($context["money_pattern"]) || array_key_exists("money_pattern", $context) ? $context["money_pattern"] : (function () { throw new Twig_Error_Runtime('Variable "money_pattern" does not exist.', 65, $this->source); })()) == "{{ widget }}")) {
            // line 66
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 68
            echo "        ";
            $context["currencySymbol"] = twig_trim_filter(twig_replace_filter((isset($context["money_pattern"]) || array_key_exists("money_pattern", $context) ? $context["money_pattern"] : (function () { throw new Twig_Error_Runtime('Variable "money_pattern" does not exist.', 68, $this->source); })()), array("{{ widget }}" => "")));
            // line 69
            echo "        ";
            if (preg_match("/^{{ widget }}/", (isset($context["money_pattern"]) || array_key_exists("money_pattern", $context) ? $context["money_pattern"] : (function () { throw new Twig_Error_Runtime('Variable "money_pattern" does not exist.', 69, $this->source); })()))) {
                // line 70
                echo "            <div class=\"input-group\">";
                // line 71
                $this->displayBlock("form_widget_simple", $context, $blocks);
                // line 72
                echo "<span class=\"input-group-addon\">";
                echo twig_escape_filter($this->env, (isset($context["currencySymbol"]) || array_key_exists("currencySymbol", $context) ? $context["currencySymbol"] : (function () { throw new Twig_Error_Runtime('Variable "currencySymbol" does not exist.', 72, $this->source); })()), "html", null, true);
                echo "</span>
            </div>
        ";
            } elseif (preg_match("/{{ widget }}\$/",             // line 74
(isset($context["money_pattern"]) || array_key_exists("money_pattern", $context) ? $context["money_pattern"] : (function () { throw new Twig_Error_Runtime('Variable "money_pattern" does not exist.', 74, $this->source); })()))) {
                // line 75
                echo "            <div class=\"input-group\">
                <span class=\"input-group-addon\">";
                // line 76
                echo twig_escape_filter($this->env, (isset($context["currencySymbol"]) || array_key_exists("currencySymbol", $context) ? $context["currencySymbol"] : (function () { throw new Twig_Error_Runtime('Variable "currencySymbol" does not exist.', 76, $this->source); })()), "html", null, true);
                echo "</span>";
                // line 77
                $this->displayBlock("form_widget_simple", $context, $blocks);
                // line 78
                echo "</div>
        ";
            }
            // line 80
            echo "    ";
        }
        // line 81
        echo "    ";
        $this->displayBlock("sonata_help", $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 84
    public function block_percent_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "percent_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "percent_widget"));

        // line 85
        echo "    ";
        ob_start();
        // line 86
        echo "        ";
        $context["type"] = (((isset($context["type"]) || array_key_exists("type", $context))) ? (_twig_default_filter((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new Twig_Error_Runtime('Variable "type" does not exist.', 86, $this->source); })()), "text")) : ("text"));
        // line 87
        echo "        <div class=\"input-group\">
            ";
        // line 88
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
            <span class=\"input-group-addon\">%</span>
        </div>
        ";
        // line 91
        $this->displayBlock("sonata_help", $context, $blocks);
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 95
    public function block_checkbox_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "checkbox_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "checkbox_widget"));

        // line 96
        $context["parent_label_class"] = (((isset($context["parent_label_class"]) || array_key_exists("parent_label_class", $context))) ? (_twig_default_filter((isset($context["parent_label_class"]) || array_key_exists("parent_label_class", $context) ? $context["parent_label_class"] : (function () { throw new Twig_Error_Runtime('Variable "parent_label_class" does not exist.', 96, $this->source); })()), "")) : (""));
        // line 97
        if (twig_in_filter("checkbox-inline", (isset($context["parent_label_class"]) || array_key_exists("parent_label_class", $context) ? $context["parent_label_class"] : (function () { throw new Twig_Error_Runtime('Variable "parent_label_class" does not exist.', 97, $this->source); })()))) {
            // line 98
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 98, $this->source); })()), 'label', array("widget" => $this->renderParentBlock("checkbox_widget", $context, $blocks)));
        } else {
            // line 100
            echo "<div class=\"checkbox\">";
            // line 101
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 101, $this->source); })()), 'label', array("widget" => $this->renderParentBlock("checkbox_widget", $context, $blocks)));
            // line 102
            echo "</div>";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 106
    public function block_radio_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "radio_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "radio_widget"));

        // line 107
        $context["parent_label_class"] = (((isset($context["parent_label_class"]) || array_key_exists("parent_label_class", $context))) ? (_twig_default_filter((isset($context["parent_label_class"]) || array_key_exists("parent_label_class", $context) ? $context["parent_label_class"] : (function () { throw new Twig_Error_Runtime('Variable "parent_label_class" does not exist.', 107, $this->source); })()), "")) : (""));
        // line 108
        if (twig_in_filter("radio-inline", (isset($context["parent_label_class"]) || array_key_exists("parent_label_class", $context) ? $context["parent_label_class"] : (function () { throw new Twig_Error_Runtime('Variable "parent_label_class" does not exist.', 108, $this->source); })()))) {
            // line 109
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 109, $this->source); })()), 'label', array("widget" => $this->renderParentBlock("radio_widget", $context, $blocks)));
        } else {
            // line 111
            echo "<div class=\"radio\">";
            // line 112
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 112, $this->source); })()), 'label', array("widget" => $this->renderParentBlock("radio_widget", $context, $blocks)));
            // line 113
            echo "</div>";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 118
    public function block_form_label($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_label"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_label"));

        // line 119
        ob_start();
        // line 120
        echo "    ";
        if (( !((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 120, $this->source); })()) === false) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 120, $this->source); })()), "options", array()), "form_type", array(), "array") == "horizontal"))) {
            // line 121
            echo "        ";
            $context["label_class"] = "col-sm-3";
            // line 122
            echo "    ";
        }
        // line 123
        echo "
    ";
        // line 124
        $context["label_class"] = ((((isset($context["label_class"]) || array_key_exists("label_class", $context))) ? (_twig_default_filter((isset($context["label_class"]) || array_key_exists("label_class", $context) ? $context["label_class"] : (function () { throw new Twig_Error_Runtime('Variable "label_class" does not exist.', 124, $this->source); })()), "")) : ("")) . " control-label");
        // line 125
        echo "
    ";
        // line 126
        if ( !((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 126, $this->source); })()) === false)) {
            // line 127
            echo "        ";
            $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new Twig_Error_Runtime('Variable "label_attr" does not exist.', 127, $this->source); })()), array("class" => ((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", array()), "")) : ("")) . " ") . (isset($context["label_class"]) || array_key_exists("label_class", $context) ? $context["label_class"] : (function () { throw new Twig_Error_Runtime('Variable "label_class" does not exist.', 127, $this->source); })()))));
            // line 128
            echo "
        ";
            // line 129
            if ( !(isset($context["compound"]) || array_key_exists("compound", $context) ? $context["compound"] : (function () { throw new Twig_Error_Runtime('Variable "compound" does not exist.', 129, $this->source); })())) {
                // line 130
                echo "            ";
                $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new Twig_Error_Runtime('Variable "label_attr" does not exist.', 130, $this->source); })()), array("for" => (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 130, $this->source); })())));
                // line 131
                echo "        ";
            }
            // line 132
            echo "        ";
            if ((isset($context["required"]) || array_key_exists("required", $context) ? $context["required"] : (function () { throw new Twig_Error_Runtime('Variable "required" does not exist.', 132, $this->source); })())) {
                // line 133
                echo "            ";
                $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new Twig_Error_Runtime('Variable "label_attr" does not exist.', 133, $this->source); })()), array("class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", array()), "")) : ("")) . " required"))));
                // line 134
                echo "        ";
            }
            // line 135
            echo "
        ";
            // line 136
            if (twig_test_empty((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 136, $this->source); })()))) {
                // line 137
                if (((isset($context["label_format"]) || array_key_exists("label_format", $context)) &&  !twig_test_empty((isset($context["label_format"]) || array_key_exists("label_format", $context) ? $context["label_format"] : (function () { throw new Twig_Error_Runtime('Variable "label_format" does not exist.', 137, $this->source); })())))) {
                    // line 138
                    $context["label"] = twig_replace_filter((isset($context["label_format"]) || array_key_exists("label_format", $context) ? $context["label_format"] : (function () { throw new Twig_Error_Runtime('Variable "label_format" does not exist.', 138, $this->source); })()), array("%name%" =>                     // line 139
(isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new Twig_Error_Runtime('Variable "name" does not exist.', 139, $this->source); })()), "%id%" =>                     // line 140
(isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 140, $this->source); })())));
                } else {
                    // line 143
                    $context["label"] = $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->humanize((isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new Twig_Error_Runtime('Variable "name" does not exist.', 143, $this->source); })()));
                }
            }
            // line 146
            echo "
        <label";
            // line 147
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new Twig_Error_Runtime('Variable "label_attr" does not exist.', 147, $this->source); })()));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo " ";
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
            ";
            // line 148
            if (((isset($context["translation_domain"]) || array_key_exists("translation_domain", $context) ? $context["translation_domain"] : (function () { throw new Twig_Error_Runtime('Variable "translation_domain" does not exist.', 148, $this->source); })()) === false)) {
                // line 149
                echo twig_escape_filter($this->env, (isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 149, $this->source); })()), "html", null, true);
            } elseif ( !twig_get_attribute($this->env, $this->source,             // line 150
(isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 150, $this->source); })()), "admin", array())) {
                // line 151
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 151, $this->source); })()), array(), (isset($context["translation_domain"]) || array_key_exists("translation_domain", $context) ? $context["translation_domain"] : (function () { throw new Twig_Error_Runtime('Variable "translation_domain" does not exist.', 151, $this->source); })())), "html", null, true);
            } else {
                // line 153
                echo "                ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 153, $this->source); })()), array(), ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 153, $this->source); })()), "field_description", array()), "translationDomain", array())) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 153, $this->source); })()), "field_description", array()), "translationDomain", array())) : (twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 153, $this->source); })()), "translationDomain", array())))), "html", null, true);
                echo "
            ";
            }
            // line 155
            echo "        </label>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 160
    public function block_checkbox_label($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "checkbox_label"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "checkbox_label"));

        // line 161
        $this->displayBlock("checkbox_radio_label", $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 164
    public function block_radio_label($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "radio_label"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "radio_label"));

        // line 165
        $this->displayBlock("checkbox_radio_label", $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 168
    public function block_checkbox_radio_label($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "checkbox_radio_label"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "checkbox_radio_label"));

        // line 169
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 169, $this->source); })()), "admin", array())) {
            // line 170
            echo "        ";
            $context["translation_domain"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 170, $this->source); })()), "field_description", array()), "translationDomain", array());
            // line 171
            echo "    ";
        }
        // line 172
        echo "    ";
        // line 173
        echo "    ";
        if ((isset($context["widget"]) || array_key_exists("widget", $context))) {
            // line 174
            echo "        ";
            if ((isset($context["required"]) || array_key_exists("required", $context) ? $context["required"] : (function () { throw new Twig_Error_Runtime('Variable "required" does not exist.', 174, $this->source); })())) {
                // line 175
                echo "            ";
                $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new Twig_Error_Runtime('Variable "label_attr" does not exist.', 175, $this->source); })()), array("class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", array()), "")) : ("")) . " required"))));
                // line 176
                echo "        ";
            }
            // line 177
            echo "        ";
            if ((isset($context["parent_label_class"]) || array_key_exists("parent_label_class", $context))) {
                // line 178
                echo "            ";
                $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new Twig_Error_Runtime('Variable "label_attr" does not exist.', 178, $this->source); })()), array("class" => twig_trim_filter(((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", array()), "")) : ("")) . " ") . (isset($context["parent_label_class"]) || array_key_exists("parent_label_class", $context) ? $context["parent_label_class"] : (function () { throw new Twig_Error_Runtime('Variable "parent_label_class" does not exist.', 178, $this->source); })())))));
                // line 179
                echo "        ";
            }
            // line 180
            echo "        ";
            if (( !((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 180, $this->source); })()) === false) && twig_test_empty((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 180, $this->source); })())))) {
                // line 181
                echo "            ";
                $context["label"] = $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->humanize((isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new Twig_Error_Runtime('Variable "name" does not exist.', 181, $this->source); })()));
                // line 182
                echo "        ";
            }
            // line 183
            echo "        <label";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new Twig_Error_Runtime('Variable "label_attr" does not exist.', 183, $this->source); })()));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo " ";
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">";
            // line 184
            echo (isset($context["widget"]) || array_key_exists("widget", $context) ? $context["widget"] : (function () { throw new Twig_Error_Runtime('Variable "widget" does not exist.', 184, $this->source); })());
            // line 185
            if ( !((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 185, $this->source); })()) === false)) {
                // line 186
                echo "<span class=\"control-label__text\">
                    ";
                // line 187
                if (((isset($context["translation_domain"]) || array_key_exists("translation_domain", $context) ? $context["translation_domain"] : (function () { throw new Twig_Error_Runtime('Variable "translation_domain" does not exist.', 187, $this->source); })()) === false)) {
                    // line 188
                    echo twig_escape_filter($this->env, (isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 188, $this->source); })()), "html", null, true);
                } else {
                    // line 190
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 190, $this->source); })()), array(), (isset($context["translation_domain"]) || array_key_exists("translation_domain", $context) ? $context["translation_domain"] : (function () { throw new Twig_Error_Runtime('Variable "translation_domain" does not exist.', 190, $this->source); })())), "html", null, true);
                }
                // line 192
                echo "</span>";
            }
            // line 194
            echo "</label>
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 198
    public function block_choice_widget_expanded($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "choice_widget_expanded"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "choice_widget_expanded"));

        // line 199
        ob_start();
        // line 200
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new Twig_Error_Runtime('Variable "attr" does not exist.', 200, $this->source); })()), array("class" => (((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array()), "")) : ("")) . " list-unstyled")));
        // line 201
        echo "    <ul ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
    ";
        // line 202
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 202, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 203
            echo "        <li>
            ";
            // line 204
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget', array("horizontal" => false, "horizontal_input_wrapper_class" => "", "translation_domain" =>             // line 207
(isset($context["choice_translation_domain"]) || array_key_exists("choice_translation_domain", $context) ? $context["choice_translation_domain"] : (function () { throw new Twig_Error_Runtime('Variable "choice_translation_domain" does not exist.', 207, $this->source); })())));
            // line 208
            echo " ";
            // line 209
            echo "        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 211
        echo "    </ul>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 215
    public function block_choice_widget_collapsed($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "choice_widget_collapsed"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "choice_widget_collapsed"));

        // line 216
        ob_start();
        // line 217
        echo "    ";
        if ((((isset($context["required"]) || array_key_exists("required", $context) ? $context["required"] : (function () { throw new Twig_Error_Runtime('Variable "required" does not exist.', 217, $this->source); })()) && (isset($context["placeholder"]) || array_key_exists("placeholder", $context))) && (null === (isset($context["placeholder"]) || array_key_exists("placeholder", $context) ? $context["placeholder"] : (function () { throw new Twig_Error_Runtime('Variable "placeholder" does not exist.', 217, $this->source); })())))) {
            // line 218
            echo "        ";
            $context["required"] = false;
            // line 219
            echo "    ";
        } elseif (((((((isset($context["required"]) || array_key_exists("required", $context) ? $context["required"] : (function () { throw new Twig_Error_Runtime('Variable "required" does not exist.', 219, $this->source); })()) && (isset($context["empty_value"]) || array_key_exists("empty_value", $context))) && (isset($context["empty_value_in_choices"]) || array_key_exists("empty_value_in_choices", $context))) && (null === (isset($context["empty_value"]) || array_key_exists("empty_value", $context) ? $context["empty_value"] : (function () { throw new Twig_Error_Runtime('Variable "empty_value" does not exist.', 219, $this->source); })()))) &&  !(isset($context["empty_value_in_choices"]) || array_key_exists("empty_value_in_choices", $context) ? $context["empty_value_in_choices"] : (function () { throw new Twig_Error_Runtime('Variable "empty_value_in_choices" does not exist.', 219, $this->source); })())) &&  !(isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new Twig_Error_Runtime('Variable "multiple" does not exist.', 219, $this->source); })()))) {
            // line 220
            echo "        ";
            $context["required"] = false;
            // line 221
            echo "    ";
        }
        // line 222
        echo "
    ";
        // line 223
        $context["attr"] = twig_array_merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new Twig_Error_Runtime('Variable "attr" does not exist.', 223, $this->source); })()), array("class" => (((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array()), "")) : ("")) . " form-control")));
        // line 224
        echo "    ";
        if ((((isset($context["sortable"]) || array_key_exists("sortable", $context)) && (isset($context["sortable"]) || array_key_exists("sortable", $context) ? $context["sortable"] : (function () { throw new Twig_Error_Runtime('Variable "sortable" does not exist.', 224, $this->source); })())) && (isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new Twig_Error_Runtime('Variable "multiple" does not exist.', 224, $this->source); })()))) {
            // line 225
            echo "        ";
            $this->displayBlock("sonata_type_choice_multiple_sortable", $context, $blocks);
            echo "
    ";
        } else {
            // line 227
            echo "        <select ";
            $this->displayBlock("widget_attributes", $context, $blocks);
            if ((isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new Twig_Error_Runtime('Variable "multiple" does not exist.', 227, $this->source); })())) {
                echo " multiple=\"multiple\"";
            }
            echo " >
            ";
            // line 228
            if (((isset($context["empty_value"]) || array_key_exists("empty_value", $context)) &&  !(null === (isset($context["empty_value"]) || array_key_exists("empty_value", $context) ? $context["empty_value"] : (function () { throw new Twig_Error_Runtime('Variable "empty_value" does not exist.', 228, $this->source); })())))) {
                // line 229
                echo "                <option value=\"\"";
                if (((isset($context["required"]) || array_key_exists("required", $context) ? $context["required"] : (function () { throw new Twig_Error_Runtime('Variable "required" does not exist.', 229, $this->source); })()) && twig_test_empty((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 229, $this->source); })())))) {
                    echo " selected=\"selected\"";
                }
                echo ">
                    ";
                // line 230
                if (((isset($context["empty_value"]) || array_key_exists("empty_value", $context) ? $context["empty_value"] : (function () { throw new Twig_Error_Runtime('Variable "empty_value" does not exist.', 230, $this->source); })()) != "")) {
                    // line 231
                    echo "                        ";
                    if ( !twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 231, $this->source); })()), "admin", array())) {
                        // line 232
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["empty_value"]) || array_key_exists("empty_value", $context) ? $context["empty_value"] : (function () { throw new Twig_Error_Runtime('Variable "empty_value" does not exist.', 232, $this->source); })()), array(), (isset($context["translation_domain"]) || array_key_exists("translation_domain", $context) ? $context["translation_domain"] : (function () { throw new Twig_Error_Runtime('Variable "translation_domain" does not exist.', 232, $this->source); })())), "html", null, true);
                    } else {
                        // line 234
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["empty_value"]) || array_key_exists("empty_value", $context) ? $context["empty_value"] : (function () { throw new Twig_Error_Runtime('Variable "empty_value" does not exist.', 234, $this->source); })()), array(), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 234, $this->source); })()), "field_description", array()), "translationDomain", array())), "html", null, true);
                    }
                    // line 236
                    echo "                    ";
                }
                // line 237
                echo "                </option>
            ";
            } elseif ((            // line 238
(isset($context["placeholder"]) || array_key_exists("placeholder", $context)) &&  !(null === (isset($context["placeholder"]) || array_key_exists("placeholder", $context) ? $context["placeholder"] : (function () { throw new Twig_Error_Runtime('Variable "placeholder" does not exist.', 238, $this->source); })())))) {
                // line 239
                echo "                <option value=\"\"";
                if (((isset($context["required"]) || array_key_exists("required", $context) ? $context["required"] : (function () { throw new Twig_Error_Runtime('Variable "required" does not exist.', 239, $this->source); })()) && twig_test_empty((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 239, $this->source); })())))) {
                    echo " selected=\"selected\"";
                }
                echo ">
                    ";
                // line 240
                if (((isset($context["placeholder"]) || array_key_exists("placeholder", $context) ? $context["placeholder"] : (function () { throw new Twig_Error_Runtime('Variable "placeholder" does not exist.', 240, $this->source); })()) != "")) {
                    // line 241
                    echo "                        ";
                    if ( !twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 241, $this->source); })()), "admin", array())) {
                        // line 242
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["placeholder"]) || array_key_exists("placeholder", $context) ? $context["placeholder"] : (function () { throw new Twig_Error_Runtime('Variable "placeholder" does not exist.', 242, $this->source); })()), array(), (isset($context["translation_domain"]) || array_key_exists("translation_domain", $context) ? $context["translation_domain"] : (function () { throw new Twig_Error_Runtime('Variable "translation_domain" does not exist.', 242, $this->source); })())), "html", null, true);
                    } else {
                        // line 244
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["placeholder"]) || array_key_exists("placeholder", $context) ? $context["placeholder"] : (function () { throw new Twig_Error_Runtime('Variable "placeholder" does not exist.', 244, $this->source); })()), array(), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 244, $this->source); })()), "field_description", array()), "translationDomain", array())), "html", null, true);
                    }
                    // line 246
                    echo "                    ";
                }
                // line 247
                echo "                </option>
            ";
            }
            // line 249
            echo "            ";
            if ((twig_length_filter($this->env, (isset($context["preferred_choices"]) || array_key_exists("preferred_choices", $context) ? $context["preferred_choices"] : (function () { throw new Twig_Error_Runtime('Variable "preferred_choices" does not exist.', 249, $this->source); })())) > 0)) {
                // line 250
                echo "                ";
                $context["options"] = (isset($context["preferred_choices"]) || array_key_exists("preferred_choices", $context) ? $context["preferred_choices"] : (function () { throw new Twig_Error_Runtime('Variable "preferred_choices" does not exist.', 250, $this->source); })());
                // line 251
                echo "                ";
                $this->displayBlock("choice_widget_options", $context, $blocks);
                echo "
                ";
                // line 252
                if ((twig_length_filter($this->env, (isset($context["choices"]) || array_key_exists("choices", $context) ? $context["choices"] : (function () { throw new Twig_Error_Runtime('Variable "choices" does not exist.', 252, $this->source); })())) > 0)) {
                    // line 253
                    echo "                    <option disabled=\"disabled\">";
                    echo twig_escape_filter($this->env, (isset($context["separator"]) || array_key_exists("separator", $context) ? $context["separator"] : (function () { throw new Twig_Error_Runtime('Variable "separator" does not exist.', 253, $this->source); })()), "html", null, true);
                    echo "</option>
                ";
                }
                // line 255
                echo "            ";
            }
            // line 256
            echo "            ";
            $context["options"] = (isset($context["choices"]) || array_key_exists("choices", $context) ? $context["choices"] : (function () { throw new Twig_Error_Runtime('Variable "choices" does not exist.', 256, $this->source); })());
            // line 257
            echo "            ";
            $this->displayBlock("choice_widget_options", $context, $blocks);
            echo "
        </select>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 263
    public function block_date_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "date_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "date_widget"));

        // line 264
        ob_start();
        // line 265
        echo "    ";
        if (((isset($context["widget"]) || array_key_exists("widget", $context) ? $context["widget"] : (function () { throw new Twig_Error_Runtime('Variable "widget" does not exist.', 265, $this->source); })()) == "single_text")) {
            // line 266
            echo "        ";
            $this->displayBlock("form_widget_simple", $context, $blocks);
            echo "
    ";
        } else {
            // line 268
            echo "        ";
            if (( !(isset($context["row"]) || array_key_exists("row", $context)) || ((isset($context["row"]) || array_key_exists("row", $context) ? $context["row"] : (function () { throw new Twig_Error_Runtime('Variable "row" does not exist.', 268, $this->source); })()) == true))) {
                // line 269
                echo "            ";
                $context["attr"] = twig_array_merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new Twig_Error_Runtime('Variable "attr" does not exist.', 269, $this->source); })()), array("class" => (((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array()), "")) : ("")) . " row")));
                // line 270
                echo "        ";
            }
            // line 271
            echo "        ";
            $context["input_wrapper_class"] = (((isset($context["input_wrapper_class"]) || array_key_exists("input_wrapper_class", $context))) ? (_twig_default_filter((isset($context["input_wrapper_class"]) || array_key_exists("input_wrapper_class", $context) ? $context["input_wrapper_class"] : (function () { throw new Twig_Error_Runtime('Variable "input_wrapper_class" does not exist.', 271, $this->source); })()), "col-sm-4")) : ("col-sm-4"));
            // line 272
            echo "        <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
            ";
            // line 273
            echo twig_replace_filter((isset($context["date_pattern"]) || array_key_exists("date_pattern", $context) ? $context["date_pattern"] : (function () { throw new Twig_Error_Runtime('Variable "date_pattern" does not exist.', 273, $this->source); })()), array("{{ year }}" => (((("<div class=\"" .             // line 274
(isset($context["input_wrapper_class"]) || array_key_exists("input_wrapper_class", $context) ? $context["input_wrapper_class"] : (function () { throw new Twig_Error_Runtime('Variable "input_wrapper_class" does not exist.', 274, $this->source); })())) . "\">") . $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 274, $this->source); })()), "year", array()), 'widget')) . "</div>"), "{{ month }}" => (((("<div class=\"" .             // line 275
(isset($context["input_wrapper_class"]) || array_key_exists("input_wrapper_class", $context) ? $context["input_wrapper_class"] : (function () { throw new Twig_Error_Runtime('Variable "input_wrapper_class" does not exist.', 275, $this->source); })())) . "\">") . $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 275, $this->source); })()), "month", array()), 'widget')) . "</div>"), "{{ day }}" => (((("<div class=\"" .             // line 276
(isset($context["input_wrapper_class"]) || array_key_exists("input_wrapper_class", $context) ? $context["input_wrapper_class"] : (function () { throw new Twig_Error_Runtime('Variable "input_wrapper_class" does not exist.', 276, $this->source); })())) . "\">") . $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 276, $this->source); })()), "day", array()), 'widget')) . "</div>")));
            // line 277
            echo "
        </div>
    ";
        }
        // line 280
        echo "    ";
        if ( !(isset($context["datepicker_use_button"]) || array_key_exists("datepicker_use_button", $context))) {
            // line 281
            echo "        ";
            $this->displayBlock("sonata_help", $context, $blocks);
            echo "
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 286
    public function block_time_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "time_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "time_widget"));

        // line 287
        ob_start();
        // line 288
        echo "    ";
        if (((isset($context["widget"]) || array_key_exists("widget", $context) ? $context["widget"] : (function () { throw new Twig_Error_Runtime('Variable "widget" does not exist.', 288, $this->source); })()) == "single_text")) {
            // line 289
            echo "        ";
            $this->displayBlock("form_widget_simple", $context, $blocks);
            echo "
    ";
        } else {
            // line 291
            echo "        ";
            if (( !(isset($context["row"]) || array_key_exists("row", $context)) || ((isset($context["row"]) || array_key_exists("row", $context) ? $context["row"] : (function () { throw new Twig_Error_Runtime('Variable "row" does not exist.', 291, $this->source); })()) == true))) {
                // line 292
                echo "            ";
                $context["attr"] = twig_array_merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new Twig_Error_Runtime('Variable "attr" does not exist.', 292, $this->source); })()), array("class" => (((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array()), "")) : ("")) . " row")));
                // line 293
                echo "        ";
            }
            // line 294
            echo "        ";
            $context["input_wrapper_class"] = (((isset($context["input_wrapper_class"]) || array_key_exists("input_wrapper_class", $context))) ? (_twig_default_filter((isset($context["input_wrapper_class"]) || array_key_exists("input_wrapper_class", $context) ? $context["input_wrapper_class"] : (function () { throw new Twig_Error_Runtime('Variable "input_wrapper_class" does not exist.', 294, $this->source); })()), "col-sm-6")) : ("col-sm-6"));
            // line 295
            echo "        <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
            <div class=\"";
            // line 296
            echo twig_escape_filter($this->env, (isset($context["input_wrapper_class"]) || array_key_exists("input_wrapper_class", $context) ? $context["input_wrapper_class"] : (function () { throw new Twig_Error_Runtime('Variable "input_wrapper_class" does not exist.', 296, $this->source); })()), "html", null, true);
            echo "\">
                ";
            // line 297
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 297, $this->source); })()), "hour", array()), 'widget');
            echo "
            </div>
            ";
            // line 299
            if ((isset($context["with_minutes"]) || array_key_exists("with_minutes", $context) ? $context["with_minutes"] : (function () { throw new Twig_Error_Runtime('Variable "with_minutes" does not exist.', 299, $this->source); })())) {
                // line 300
                echo "                <div class=\"";
                echo twig_escape_filter($this->env, (isset($context["input_wrapper_class"]) || array_key_exists("input_wrapper_class", $context) ? $context["input_wrapper_class"] : (function () { throw new Twig_Error_Runtime('Variable "input_wrapper_class" does not exist.', 300, $this->source); })()), "html", null, true);
                echo "\">
                    ";
                // line 301
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 301, $this->source); })()), "minute", array()), 'widget');
                echo "
                </div>
            ";
            }
            // line 304
            echo "            ";
            if ((isset($context["with_seconds"]) || array_key_exists("with_seconds", $context) ? $context["with_seconds"] : (function () { throw new Twig_Error_Runtime('Variable "with_seconds" does not exist.', 304, $this->source); })())) {
                // line 305
                echo "                <div class=\"";
                echo twig_escape_filter($this->env, (isset($context["input_wrapper_class"]) || array_key_exists("input_wrapper_class", $context) ? $context["input_wrapper_class"] : (function () { throw new Twig_Error_Runtime('Variable "input_wrapper_class" does not exist.', 305, $this->source); })()), "html", null, true);
                echo "\">
                    ";
                // line 306
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 306, $this->source); })()), "second", array()), 'widget');
                echo "
                </div>
            ";
            }
            // line 309
            echo "        </div>
    ";
        }
        // line 311
        echo "    ";
        $this->displayBlock("sonata_help", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 315
    public function block_datetime_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "datetime_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "datetime_widget"));

        // line 316
        ob_start();
        // line 317
        echo "    ";
        if (((isset($context["widget"]) || array_key_exists("widget", $context) ? $context["widget"] : (function () { throw new Twig_Error_Runtime('Variable "widget" does not exist.', 317, $this->source); })()) == "single_text")) {
            // line 318
            echo "        ";
            $this->displayBlock("form_widget_simple", $context, $blocks);
            echo "
    ";
        } else {
            // line 320
            echo "        ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new Twig_Error_Runtime('Variable "attr" does not exist.', 320, $this->source); })()), array("class" => (((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array()), "")) : ("")) . " row")));
            // line 321
            echo "        <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
            ";
            // line 322
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 322, $this->source); })()), "date", array()), 'errors');
            echo "
            ";
            // line 323
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 323, $this->source); })()), "time", array()), 'errors');
            echo "

            ";
            // line 325
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 325, $this->source); })()), "date", array()), "vars", array()), "widget", array()) == "single_text")) {
                // line 326
                echo "                <div class=\"col-sm-2\">
                    ";
                // line 327
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 327, $this->source); })()), "date", array()), 'widget');
                echo "
                </div>
            ";
            } else {
                // line 330
                echo "                ";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 330, $this->source); })()), "date", array()), 'widget', array("row" => false, "input_wrapper_class" => "col-sm-2"));
                echo "
            ";
            }
            // line 332
            echo "
            ";
            // line 333
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 333, $this->source); })()), "time", array()), "vars", array()), "widget", array()) == "single_text")) {
                // line 334
                echo "                <div class=\"col-sm-2\">
                    ";
                // line 335
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 335, $this->source); })()), "time", array()), 'widget');
                echo "
                </div>
            ";
            } else {
                // line 338
                echo "                ";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 338, $this->source); })()), "time", array()), 'widget', array("row" => false, "input_wrapper_class" => "col-sm-2"));
                echo "
            ";
            }
            // line 340
            echo "        </div>
    ";
        }
        // line 342
        echo "    ";
        if ( !(isset($context["datepicker_use_button"]) || array_key_exists("datepicker_use_button", $context))) {
            // line 343
            echo "        ";
            $this->displayBlock("sonata_help", $context, $blocks);
            echo "
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 348
    public function block_form_row($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_row"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_row"));

        // line 349
        echo "    ";
        $context["show_label"] = (((isset($context["show_label"]) || array_key_exists("show_label", $context))) ? (_twig_default_filter((isset($context["show_label"]) || array_key_exists("show_label", $context) ? $context["show_label"] : (function () { throw new Twig_Error_Runtime('Variable "show_label" does not exist.', 349, $this->source); })()), true)) : (true));
        // line 350
        echo "    <div class=\"form-group";
        if ((twig_length_filter($this->env, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new Twig_Error_Runtime('Variable "errors" does not exist.', 350, $this->source); })())) > 0)) {
            echo " has-error";
        }
        echo "\" id=\"sonata-ba-field-container-";
        echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 350, $this->source); })()), "html", null, true);
        echo "\">
        ";
        // line 351
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["sonata_admin"] ?? null), "field_description", array(), "any", false, true), "options", array(), "any", true, true)) {
            // line 352
            echo "            ";
            $context["label"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["sonata_admin"] ?? null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "name", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["sonata_admin"] ?? null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "name", array()), (isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 352, $this->source); })()))) : ((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 352, $this->source); })())));
            // line 353
            echo "        ";
        }
        // line 354
        echo "
        ";
        // line 355
        $context["div_class"] = "sonata-ba-field";
        // line 356
        echo "
        ";
        // line 357
        if (((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 357, $this->source); })()) === false)) {
            // line 358
            echo "            ";
            $context["div_class"] = ((isset($context["div_class"]) || array_key_exists("div_class", $context) ? $context["div_class"] : (function () { throw new Twig_Error_Runtime('Variable "div_class" does not exist.', 358, $this->source); })()) . " sonata-collection-row-without-label");
            // line 359
            echo "        ";
        }
        // line 360
        echo "
        ";
        // line 361
        if (((isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 361, $this->source); })()), "options", array()), "form_type", array(), "array") == "horizontal"))) {
            // line 362
            echo "            ";
            // line 363
            echo "            ";
            if ((((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 363, $this->source); })()) === false) || twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", array(), "any", false, true), "checked", array(), "any", true, true))) {
                // line 364
                echo "                ";
                if (twig_in_filter("collection", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 364, $this->source); })()), "parent", array()), "vars", array()), "block_prefixes", array()))) {
                    // line 365
                    echo "                    ";
                    $context["div_class"] = ((isset($context["div_class"]) || array_key_exists("div_class", $context) ? $context["div_class"] : (function () { throw new Twig_Error_Runtime('Variable "div_class" does not exist.', 365, $this->source); })()) . " col-sm-12");
                    // line 366
                    echo "                ";
                } else {
                    // line 367
                    echo "                    ";
                    $context["div_class"] = ((isset($context["div_class"]) || array_key_exists("div_class", $context) ? $context["div_class"] : (function () { throw new Twig_Error_Runtime('Variable "div_class" does not exist.', 367, $this->source); })()) . " col-sm-9 col-sm-offset-3");
                    // line 368
                    echo "                ";
                }
                // line 369
                echo "            ";
            } else {
                // line 370
                echo "                ";
                $context["div_class"] = ((isset($context["div_class"]) || array_key_exists("div_class", $context) ? $context["div_class"] : (function () { throw new Twig_Error_Runtime('Variable "div_class" does not exist.', 370, $this->source); })()) . " col-sm-9");
                // line 371
                echo "            ";
            }
            // line 372
            echo "        ";
        }
        // line 373
        echo "
        ";
        // line 374
        if ((isset($context["show_label"]) || array_key_exists("show_label", $context) ? $context["show_label"] : (function () { throw new Twig_Error_Runtime('Variable "show_label" does not exist.', 374, $this->source); })())) {
            // line 375
            echo "            ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 375, $this->source); })()), 'label', (twig_test_empty($_label_ = (((isset($context["label"]) || array_key_exists("label", $context))) ? (_twig_default_filter((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 375, $this->source); })()), null)) : (null))) ? array() : array("label" => $_label_)));
            echo "
        ";
        }
        // line 377
        echo "
        ";
        // line 378
        if (((isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context)) && (isset($context["sonata_admin_enabled"]) || array_key_exists("sonata_admin_enabled", $context) ? $context["sonata_admin_enabled"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin_enabled" does not exist.', 378, $this->source); })()))) {
            // line 379
            echo "            ";
            $context["div_class"] = (((((isset($context["div_class"]) || array_key_exists("div_class", $context) ? $context["div_class"] : (function () { throw new Twig_Error_Runtime('Variable "div_class" does not exist.', 379, $this->source); })()) . " sonata-ba-field-") . twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 379, $this->source); })()), "edit", array())) . "-") . twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 379, $this->source); })()), "inline", array()));
            // line 380
            echo "        ";
        }
        // line 381
        echo "
        ";
        // line 382
        if ((twig_length_filter($this->env, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new Twig_Error_Runtime('Variable "errors" does not exist.', 382, $this->source); })())) > 0)) {
            // line 383
            echo "            ";
            $context["div_class"] = ((isset($context["div_class"]) || array_key_exists("div_class", $context) ? $context["div_class"] : (function () { throw new Twig_Error_Runtime('Variable "div_class" does not exist.', 383, $this->source); })()) . " sonata-ba-field-error");
            // line 384
            echo "        ";
        }
        // line 385
        echo "
        <div class=\"";
        // line 386
        echo twig_escape_filter($this->env, (isset($context["div_class"]) || array_key_exists("div_class", $context) ? $context["div_class"] : (function () { throw new Twig_Error_Runtime('Variable "div_class" does not exist.', 386, $this->source); })()), "html", null, true);
        echo "\">
            ";
        // line 387
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 387, $this->source); })()), 'widget', array("horizontal" => false, "horizontal_input_wrapper_class" => ""));
        echo " ";
        // line 388
        echo "
            ";
        // line 389
        if ((twig_length_filter($this->env, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new Twig_Error_Runtime('Variable "errors" does not exist.', 389, $this->source); })())) > 0)) {
            // line 390
            echo "                <div class=\"help-block sonata-ba-field-error-messages\">
                    ";
            // line 391
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 391, $this->source); })()), 'errors');
            echo "
                </div>
            ";
        }
        // line 394
        echo "
            ";
        // line 395
        if ((((isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context)) && (isset($context["sonata_admin_enabled"]) || array_key_exists("sonata_admin_enabled", $context) ? $context["sonata_admin_enabled"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin_enabled" does not exist.', 395, $this->source); })())) && ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["sonata_admin"] ?? null), "field_description", array(), "any", false, true), "help", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["sonata_admin"] ?? null), "field_description", array(), "any", false, true), "help", array()), false)) : (false)))) {
            // line 396
            echo "                <span class=\"help-block sonata-ba-field-help\">";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 396, $this->source); })()), "field_description", array()), "help", array()), array(), ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 396, $this->source); })()), "field_description", array()), "translationDomain", array())) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 396, $this->source); })()), "field_description", array()), "translationDomain", array())) : (twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 396, $this->source); })()), "translationDomain", array()))));
            echo "</span>
            ";
        }
        // line 398
        echo "        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 402
    public function block_checkbox_row($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "checkbox_row"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "checkbox_row"));

        // line 403
        $context["show_label"] = false;
        // line 404
        echo "    ";
        $this->displayBlock("form_row", $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 407
    public function block_radio_row($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "radio_row"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "radio_row"));

        // line 408
        $context["show_label"] = false;
        // line 409
        echo "    ";
        $this->displayBlock("form_row", $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 412
    public function block_sonata_type_native_collection_widget_row($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_native_collection_widget_row"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_native_collection_widget_row"));

        // line 413
        ob_start();
        // line 414
        echo "    <div class=\"sonata-collection-row\">
        ";
        // line 415
        if ((isset($context["allow_delete"]) || array_key_exists("allow_delete", $context) ? $context["allow_delete"] : (function () { throw new Twig_Error_Runtime('Variable "allow_delete" does not exist.', 415, $this->source); })())) {
            // line 416
            echo "            <div class=\"row\">
                <div class=\"col-xs-1\">
                    <a href=\"#\" class=\"btn btn-link sonata-collection-delete\">
                        <i class=\"fa fa-minus-circle\" aria-hidden=\"true\"></i>
                    </a>
                </div>
                <div class=\"col-xs-11\">
        ";
        }
        // line 424
        echo "            ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["child"]) || array_key_exists("child", $context) ? $context["child"] : (function () { throw new Twig_Error_Runtime('Variable "child" does not exist.', 424, $this->source); })()), 'row', array("label" => false));
        echo "
        ";
        // line 425
        if ((isset($context["allow_delete"]) || array_key_exists("allow_delete", $context) ? $context["allow_delete"] : (function () { throw new Twig_Error_Runtime('Variable "allow_delete" does not exist.', 425, $this->source); })())) {
            // line 426
            echo "                </div>
            </div>
        ";
        }
        // line 429
        echo "    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 433
    public function block_sonata_type_native_collection_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_native_collection_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_native_collection_widget"));

        // line 434
        ob_start();
        // line 435
        echo "    ";
        if ((isset($context["prototype"]) || array_key_exists("prototype", $context))) {
            // line 436
            echo "        ";
            $context["child"] = (isset($context["prototype"]) || array_key_exists("prototype", $context) ? $context["prototype"] : (function () { throw new Twig_Error_Runtime('Variable "prototype" does not exist.', 436, $this->source); })());
            // line 437
            echo "        ";
            $context["allow_delete_backup"] = (isset($context["allow_delete"]) || array_key_exists("allow_delete", $context) ? $context["allow_delete"] : (function () { throw new Twig_Error_Runtime('Variable "allow_delete" does not exist.', 437, $this->source); })());
            // line 438
            echo "        ";
            $context["allow_delete"] = true;
            // line 439
            echo "        ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new Twig_Error_Runtime('Variable "attr" does not exist.', 439, $this->source); })()), array("data-prototype" =>             $this->renderBlock("sonata_type_native_collection_widget_row", $context, $blocks), "data-prototype-name" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["prototype"]) || array_key_exists("prototype", $context) ? $context["prototype"] : (function () { throw new Twig_Error_Runtime('Variable "prototype" does not exist.', 439, $this->source); })()), "vars", array()), "name", array()), "class" => ((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array()), "")) : (""))));
            // line 440
            echo "        ";
            $context["allow_delete"] = (isset($context["allow_delete_backup"]) || array_key_exists("allow_delete_backup", $context) ? $context["allow_delete_backup"] : (function () { throw new Twig_Error_Runtime('Variable "allow_delete_backup" does not exist.', 440, $this->source); })());
            // line 441
            echo "    ";
        }
        // line 442
        echo "    <div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
        ";
        // line 443
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 443, $this->source); })()), 'errors');
        echo "
        ";
        // line 444
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 444, $this->source); })()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 445
            echo "            ";
            $this->displayBlock("sonata_type_native_collection_widget_row", $context, $blocks);
            echo "
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 447
        echo "        ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 447, $this->source); })()), 'rest');
        echo "
        ";
        // line 448
        if ((isset($context["allow_add"]) || array_key_exists("allow_add", $context) ? $context["allow_add"] : (function () { throw new Twig_Error_Runtime('Variable "allow_add" does not exist.', 448, $this->source); })())) {
            // line 449
            echo "            <div><a href=\"#\" class=\"btn btn-link sonata-collection-add\"><i class=\"fa fa-plus-circle\" aria-hidden=\"true\"></i></a></div>
        ";
        }
        // line 451
        echo "    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 455
    public function block_sonata_type_immutable_array_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_immutable_array_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_immutable_array_widget"));

        // line 456
        echo "    ";
        ob_start();
        // line 457
        echo "        <div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
            ";
        // line 458
        $this->displayBlock("sonata_help", $context, $blocks);
        echo "

            ";
        // line 460
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 460, $this->source); })()), 'errors');
        echo "

            ";
        // line 462
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 462, $this->source); })()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["key"] => $context["child"]) {
            // line 463
            echo "                ";
            $this->displayBlock("sonata_type_immutable_array_widget_row", $context, $blocks);
            echo "
            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 465
        echo "
            ";
        // line 466
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 466, $this->source); })()), 'rest');
        echo "
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 471
    public function block_sonata_type_immutable_array_widget_row($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_immutable_array_widget_row"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_immutable_array_widget_row"));

        // line 472
        echo "    ";
        ob_start();
        // line 473
        echo "        <div class=\"form-group";
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["child"]) || array_key_exists("child", $context) ? $context["child"] : (function () { throw new Twig_Error_Runtime('Variable "child" does not exist.', 473, $this->source); })()), "vars", array()), "errors", array())) > 0)) {
            echo " has-error";
        }
        echo "\" id=\"sonata-ba-field-container-";
        echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 473, $this->source); })()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, (isset($context["key"]) || array_key_exists("key", $context) ? $context["key"] : (function () { throw new Twig_Error_Runtime('Variable "key" does not exist.', 473, $this->source); })()), "html", null, true);
        echo "\">

            ";
        // line 475
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["child"]) || array_key_exists("child", $context) ? $context["child"] : (function () { throw new Twig_Error_Runtime('Variable "child" does not exist.', 475, $this->source); })()), 'label');
        echo "

            ";
        // line 477
        $context["div_class"] = "";
        // line 478
        echo "            ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 478, $this->source); })()), "options", array()), "form_type", array(), "array") == "horizontal")) {
            // line 479
            echo "                ";
            $context["div_class"] = "col-sm-9";
            // line 480
            echo "            ";
        }
        // line 481
        echo "
            <div class=\"";
        // line 482
        echo twig_escape_filter($this->env, (isset($context["div_class"]) || array_key_exists("div_class", $context) ? $context["div_class"] : (function () { throw new Twig_Error_Runtime('Variable "div_class" does not exist.', 482, $this->source); })()), "html", null, true);
        echo " sonata-ba-field sonata-ba-field-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 482, $this->source); })()), "edit", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 482, $this->source); })()), "inline", array()), "html", null, true);
        echo " ";
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["child"]) || array_key_exists("child", $context) ? $context["child"] : (function () { throw new Twig_Error_Runtime('Variable "child" does not exist.', 482, $this->source); })()), "vars", array()), "errors", array())) > 0)) {
            echo "sonata-ba-field-error";
        }
        echo "\">
                ";
        // line 483
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["child"]) || array_key_exists("child", $context) ? $context["child"] : (function () { throw new Twig_Error_Runtime('Variable "child" does not exist.', 483, $this->source); })()), 'widget', array("horizontal" => false, "horizontal_input_wrapper_class" => ""));
        echo " ";
        // line 484
        echo "                ";
        $context["sonata_help"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["child"]) || array_key_exists("child", $context) ? $context["child"] : (function () { throw new Twig_Error_Runtime('Variable "child" does not exist.', 484, $this->source); })()), "vars", array()), "sonata_help", array());
        // line 485
        echo "                ";
        $this->displayBlock("sonata_help", $context, $blocks);
        echo "
            </div>

            ";
        // line 488
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["child"]) || array_key_exists("child", $context) ? $context["child"] : (function () { throw new Twig_Error_Runtime('Variable "child" does not exist.', 488, $this->source); })()), "vars", array()), "errors", array())) > 0)) {
            // line 489
            echo "                <div class=\"help-block sonata-ba-field-error-messages\">
                    ";
            // line 490
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["child"]) || array_key_exists("child", $context) ? $context["child"] : (function () { throw new Twig_Error_Runtime('Variable "child" does not exist.', 490, $this->source); })()), 'errors');
            echo "
                </div>
            ";
        }
        // line 493
        echo "        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 497
    public function block_sonata_type_model_autocomplete_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_model_autocomplete_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_model_autocomplete_widget"));

        // line 498
        echo "    ";
        $this->loadTemplate((isset($context["template"]) || array_key_exists("template", $context) ? $context["template"] : (function () { throw new Twig_Error_Runtime('Variable "template" does not exist.', 498, $this->source); })()), "@SonataAdmin/Form/form_admin_fields.html.twig", 498)->display($context);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 501
    public function block_sonata_type_choice_field_mask_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_choice_field_mask_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_choice_field_mask_widget"));

        // line 502
        echo "    ";
        $this->displayBlock("choice_widget", $context, $blocks);
        echo "
    ";
        // line 504
        echo "    ";
        $context["main_form_name"] = twig_slice($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 504, $this->source); })()), 0, ((twig_length_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 504, $this->source); })())) - twig_length_filter($this->env, (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new Twig_Error_Runtime('Variable "name" does not exist.', 504, $this->source); })()))) - 1));
        // line 505
        echo "    ";
        if ((isset($context["expanded"]) || array_key_exists("expanded", $context) ? $context["expanded"] : (function () { throw new Twig_Error_Runtime('Variable "expanded" does not exist.', 505, $this->source); })())) {
            // line 506
            echo "        ";
            $context["js_selector"] = (((("#" . (isset($context["main_form_name"]) || array_key_exists("main_form_name", $context) ? $context["main_form_name"] : (function () { throw new Twig_Error_Runtime('Variable "main_form_name" does not exist.', 506, $this->source); })())) . "_") . (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new Twig_Error_Runtime('Variable "name" does not exist.', 506, $this->source); })())) . " input");
            // line 507
            echo "        ";
            $context["js_event"] = "ifChecked";
            // line 508
            echo "    ";
        } else {
            // line 509
            echo "        ";
            $context["js_selector"] = ((("#" . (isset($context["main_form_name"]) || array_key_exists("main_form_name", $context) ? $context["main_form_name"] : (function () { throw new Twig_Error_Runtime('Variable "main_form_name" does not exist.', 509, $this->source); })())) . "_") . (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new Twig_Error_Runtime('Variable "name" does not exist.', 509, $this->source); })()));
            // line 510
            echo "        ";
            $context["js_event"] = "change";
            // line 511
            echo "    ";
        }
        // line 512
        echo "    <script>
        jQuery(document).ready(function() {
            var allFields = ";
        // line 514
        echo json_encode((isset($context["all_fields"]) || array_key_exists("all_fields", $context) ? $context["all_fields"] : (function () { throw new Twig_Error_Runtime('Variable "all_fields" does not exist.', 514, $this->source); })()));
        echo ",
                map = ";
        // line 515
        echo json_encode((isset($context["map"]) || array_key_exists("map", $context) ? $context["map"] : (function () { throw new Twig_Error_Runtime('Variable "map" does not exist.', 515, $this->source); })()));
        echo ",
                showMaskChoiceEl = jQuery(\"";
        // line 516
        echo twig_escape_filter($this->env, (isset($context["js_selector"]) || array_key_exists("js_selector", $context) ? $context["js_selector"] : (function () { throw new Twig_Error_Runtime('Variable "js_selector" does not exist.', 516, $this->source); })()), "html", null, true);
        echo "\");

            showMaskChoiceEl.on(\"";
        // line 518
        echo twig_escape_filter($this->env, (isset($context["js_event"]) || array_key_exists("js_event", $context) ? $context["js_event"] : (function () { throw new Twig_Error_Runtime('Variable "js_event" does not exist.', 518, $this->source); })()), "html", null, true);
        echo "\", function () {
                choice_field_mask_show(jQuery(this).val());
            });

            function choice_field_mask_show(val) {
                var controlGroupIdFunc = function (field) {
                    // Most of fields are named with an underscore
                    var defaultFieldId = '#sonata-ba-field-container-";
        // line 525
        echo twig_escape_filter($this->env, (isset($context["main_form_name"]) || array_key_exists("main_form_name", $context) ? $context["main_form_name"] : (function () { throw new Twig_Error_Runtime('Variable "main_form_name" does not exist.', 525, $this->source); })()), "html", null, true);
        echo "_' + field;

                    // Some fields may be named with a dash (like keys of immutable array form type)
                    if (jQuery(defaultFieldId).length === 0) {
                        return '#sonata-ba-field-container-";
        // line 529
        echo twig_escape_filter($this->env, (isset($context["main_form_name"]) || array_key_exists("main_form_name", $context) ? $context["main_form_name"] : (function () { throw new Twig_Error_Runtime('Variable "main_form_name" does not exist.', 529, $this->source); })()), "html", null, true);
        echo "-' + field;
                    }

                    return defaultFieldId;
                };

                jQuery.each(allFields, function (i, field) {
                    jQuery(controlGroupIdFunc(field)).hide();
                });

                if (map[val]) {
                    jQuery.each(map[val], function (i, field) {
                        jQuery(controlGroupIdFunc(field)).show();
                    });
                }
            }

            ";
        // line 546
        if (twig_test_empty((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 546, $this->source); })()))) {
            // line 547
            echo "                choice_field_mask_show(showMaskChoiceEl.val());
            ";
        } else {
            // line 549
            echo "                choice_field_mask_show('";
            echo twig_escape_filter($this->env, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 549, $this->source); })()), "html", null, true);
            echo "');
            ";
        }
        // line 551
        echo "        });

    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 556
    public function block_sonata_type_choice_multiple_sortable($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_choice_multiple_sortable"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_choice_multiple_sortable"));

        // line 557
        echo "    <input type=\"hidden\" name=\"";
        echo twig_escape_filter($this->env, (isset($context["full_name"]) || array_key_exists("full_name", $context) ? $context["full_name"] : (function () { throw new Twig_Error_Runtime('Variable "full_name" does not exist.', 557, $this->source); })()), "html", null, true);
        echo "\" id=\"";
        echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 557, $this->source); })()), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, twig_join_filter((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 557, $this->source); })()), ","), "html", null, true);
        echo "\" />

    <script>
        jQuery(document).ready(function() {
            Admin.setup_sortable_select2(jQuery('#";
        // line 561
        echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 561, $this->source); })()), "html", null, true);
        echo "'), ";
        echo json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 561, $this->source); })()), "vars", array()), "choices", array()));
        echo ");
        });
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SonataAdmin/Form/form_admin_fields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1813 => 561,  1801 => 557,  1792 => 556,  1779 => 551,  1773 => 549,  1769 => 547,  1767 => 546,  1747 => 529,  1740 => 525,  1730 => 518,  1725 => 516,  1721 => 515,  1717 => 514,  1713 => 512,  1710 => 511,  1707 => 510,  1704 => 509,  1701 => 508,  1698 => 507,  1695 => 506,  1692 => 505,  1689 => 504,  1684 => 502,  1675 => 501,  1664 => 498,  1655 => 497,  1643 => 493,  1637 => 490,  1634 => 489,  1632 => 488,  1625 => 485,  1622 => 484,  1619 => 483,  1607 => 482,  1604 => 481,  1601 => 480,  1598 => 479,  1595 => 478,  1593 => 477,  1588 => 475,  1576 => 473,  1573 => 472,  1564 => 471,  1550 => 466,  1547 => 465,  1530 => 463,  1513 => 462,  1508 => 460,  1503 => 458,  1498 => 457,  1495 => 456,  1486 => 455,  1474 => 451,  1470 => 449,  1468 => 448,  1463 => 447,  1446 => 445,  1429 => 444,  1425 => 443,  1420 => 442,  1417 => 441,  1414 => 440,  1411 => 439,  1408 => 438,  1405 => 437,  1402 => 436,  1399 => 435,  1397 => 434,  1388 => 433,  1376 => 429,  1371 => 426,  1369 => 425,  1364 => 424,  1354 => 416,  1352 => 415,  1349 => 414,  1347 => 413,  1338 => 412,  1327 => 409,  1325 => 408,  1316 => 407,  1305 => 404,  1303 => 403,  1294 => 402,  1282 => 398,  1276 => 396,  1274 => 395,  1271 => 394,  1265 => 391,  1262 => 390,  1260 => 389,  1257 => 388,  1254 => 387,  1250 => 386,  1247 => 385,  1244 => 384,  1241 => 383,  1239 => 382,  1236 => 381,  1233 => 380,  1230 => 379,  1228 => 378,  1225 => 377,  1219 => 375,  1217 => 374,  1214 => 373,  1211 => 372,  1208 => 371,  1205 => 370,  1202 => 369,  1199 => 368,  1196 => 367,  1193 => 366,  1190 => 365,  1187 => 364,  1184 => 363,  1182 => 362,  1180 => 361,  1177 => 360,  1174 => 359,  1171 => 358,  1169 => 357,  1166 => 356,  1164 => 355,  1161 => 354,  1158 => 353,  1155 => 352,  1153 => 351,  1144 => 350,  1141 => 349,  1132 => 348,  1117 => 343,  1114 => 342,  1110 => 340,  1104 => 338,  1098 => 335,  1095 => 334,  1093 => 333,  1090 => 332,  1084 => 330,  1078 => 327,  1075 => 326,  1073 => 325,  1068 => 323,  1064 => 322,  1059 => 321,  1056 => 320,  1050 => 318,  1047 => 317,  1045 => 316,  1036 => 315,  1022 => 311,  1018 => 309,  1012 => 306,  1007 => 305,  1004 => 304,  998 => 301,  993 => 300,  991 => 299,  986 => 297,  982 => 296,  977 => 295,  974 => 294,  971 => 293,  968 => 292,  965 => 291,  959 => 289,  956 => 288,  954 => 287,  945 => 286,  930 => 281,  927 => 280,  922 => 277,  920 => 276,  919 => 275,  918 => 274,  917 => 273,  912 => 272,  909 => 271,  906 => 270,  903 => 269,  900 => 268,  894 => 266,  891 => 265,  889 => 264,  880 => 263,  864 => 257,  861 => 256,  858 => 255,  852 => 253,  850 => 252,  845 => 251,  842 => 250,  839 => 249,  835 => 247,  832 => 246,  829 => 244,  826 => 242,  823 => 241,  821 => 240,  814 => 239,  812 => 238,  809 => 237,  806 => 236,  803 => 234,  800 => 232,  797 => 231,  795 => 230,  788 => 229,  786 => 228,  778 => 227,  772 => 225,  769 => 224,  767 => 223,  764 => 222,  761 => 221,  758 => 220,  755 => 219,  752 => 218,  749 => 217,  747 => 216,  738 => 215,  726 => 211,  719 => 209,  717 => 208,  715 => 207,  714 => 204,  711 => 203,  707 => 202,  702 => 201,  699 => 200,  697 => 199,  688 => 198,  676 => 194,  673 => 192,  670 => 190,  667 => 188,  665 => 187,  662 => 186,  660 => 185,  658 => 184,  643 => 183,  640 => 182,  637 => 181,  634 => 180,  631 => 179,  628 => 178,  625 => 177,  622 => 176,  619 => 175,  616 => 174,  613 => 173,  611 => 172,  608 => 171,  605 => 170,  602 => 169,  593 => 168,  583 => 165,  574 => 164,  564 => 161,  555 => 160,  542 => 155,  536 => 153,  533 => 151,  531 => 150,  529 => 149,  527 => 148,  512 => 147,  509 => 146,  505 => 143,  502 => 140,  501 => 139,  500 => 138,  498 => 137,  496 => 136,  493 => 135,  490 => 134,  487 => 133,  484 => 132,  481 => 131,  478 => 130,  476 => 129,  473 => 128,  470 => 127,  468 => 126,  465 => 125,  463 => 124,  460 => 123,  457 => 122,  454 => 121,  451 => 120,  449 => 119,  440 => 118,  429 => 113,  427 => 112,  425 => 111,  422 => 109,  420 => 108,  418 => 107,  409 => 106,  398 => 102,  396 => 101,  394 => 100,  391 => 98,  389 => 97,  387 => 96,  378 => 95,  365 => 91,  359 => 88,  356 => 87,  353 => 86,  350 => 85,  341 => 84,  330 => 81,  327 => 80,  323 => 78,  321 => 77,  318 => 76,  315 => 75,  313 => 74,  307 => 72,  305 => 71,  303 => 70,  300 => 69,  297 => 68,  294 => 66,  292 => 65,  283 => 64,  273 => 60,  269 => 59,  260 => 58,  250 => 55,  246 => 54,  237 => 53,  225 => 50,  220 => 49,  217 => 48,  208 => 47,  195 => 44,  192 => 43,  189 => 42,  186 => 41,  183 => 40,  174 => 39,  164 => 36,  160 => 35,  151 => 34,  136 => 29,  134 => 28,  132 => 27,  123 => 26,  112 => 23,  108 => 22,  105 => 21,  96 => 19,  92 => 18,  89 => 17,  84 => 16,  82 => 15,  73 => 14,  15 => 12,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}

{% extends 'form_div_layout.html.twig' %}

{% block form_errors -%}
    {% if errors|length > 0 %}
        {% if not form.parent %}<div class=\"alert alert-danger\">{% endif %}
            <ul class=\"list-unstyled\">
                {% for error in errors %}
                    <li><i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> {{ error.message }}</li>
                {% endfor %}
            </ul>
        {% if not form.parent %}</div>{% endif %}
    {% endif %}
{%- endblock form_errors %}

{% block sonata_help %}
{% spaceless %}
{% if sonata_help is defined and sonata_help %}
    <span class=\"help-block sonata-ba-field-widget-help\">{{ sonata_help|raw }}</span>
{% endif %}
{% endspaceless %}
{% endblock %}

{% block form_widget -%}
    {{ parent() }}
    {{ block('sonata_help') }}
{%- endblock form_widget %}

{% block form_widget_simple %}
    {% set type = type|default('text') %}
    {% if type != 'file' %}
        {% set attr = attr|merge({'class': attr.class|default('') ~ ' form-control'}) %}
    {% endif %}
    {{ parent() }}
{% endblock form_widget_simple %}

{% block textarea_widget %}
    {% set attr = attr|merge({'class': attr.class|default('') ~ ' form-control'}) %}
    {{ parent() }}
    {{ block('sonata_help') }}
{% endblock textarea_widget %}

{% block number_widget -%}
    {{ parent() }}
    {{ block('sonata_help') }}
{%- endblock number_widget %}

{% block choice_widget -%}
    {{ parent() }}
    {{ block('sonata_help') }}
{%- endblock choice_widget %}


{% block money_widget -%}
    {% if money_pattern == '{{ widget }}' %}
        {{- block('form_widget_simple') -}}
    {% else %}
        {% set currencySymbol = money_pattern|replace({'{{ widget }}': ''})|trim %}
        {% if money_pattern matches '/^{{ widget }}/' %}
            <div class=\"input-group\">
                {{- block('form_widget_simple') -}}
                <span class=\"input-group-addon\">{{ currencySymbol }}</span>
            </div>
        {% elseif money_pattern matches '/{{ widget }}\$/' %}
            <div class=\"input-group\">
                <span class=\"input-group-addon\">{{ currencySymbol }}</span>
                {{- block('form_widget_simple') -}}
            </div>
        {% endif %}
    {% endif %}
    {{ block('sonata_help') }}
{%- endblock money_widget %}

{% block percent_widget %}
    {% spaceless %}
        {% set type = type|default('text') %}
        <div class=\"input-group\">
            {{ block('form_widget_simple') }}
            <span class=\"input-group-addon\">%</span>
        </div>
        {{ block('sonata_help') }}
    {% endspaceless %}
{% endblock percent_widget %}

{% block checkbox_widget -%}
    {% set parent_label_class = parent_label_class|default('') -%}
    {% if 'checkbox-inline' in parent_label_class %}
        {{- form_label(form, null, { widget: parent() }) -}}
    {% else -%}
        <div class=\"checkbox\">
            {{- form_label(form, null, { widget: parent() }) -}}
        </div>
    {%- endif %}
{%- endblock checkbox_widget %}

{% block radio_widget -%}
    {%- set parent_label_class = parent_label_class|default('') -%}
    {% if 'radio-inline' in parent_label_class %}
        {{- form_label(form, null, { widget: parent() }) -}}
    {% else -%}
        <div class=\"radio\">
            {{- form_label(form, null, { widget: parent() }) -}}
        </div>
    {%- endif %}
{%- endblock radio_widget %}

{# Labels #}
{% block form_label %}
{% spaceless %}
    {% if label is not same as(false) and sonata_admin.options['form_type'] == 'horizontal' %}
        {% set label_class = 'col-sm-3' %}
    {% endif %}

    {% set label_class = label_class|default('') ~ ' control-label' %}

    {% if label is not same as(false) %}
        {% set label_attr = label_attr|merge({'class': label_attr.class|default('') ~ ' ' ~ label_class }) %}

        {% if not compound %}
            {% set label_attr = label_attr|merge({'for': id}) %}
        {% endif %}
        {% if required %}
            {% set label_attr = label_attr|merge({'class': (label_attr.class|default('') ~ ' required')|trim}) %}
        {% endif %}

        {% if label is empty %}
            {%- if label_format is defined and label_format is not empty -%}
                {% set label = label_format|replace({
                    '%name%': name,
                    '%id%': id,
                }) %}
            {%- else -%}
                {% set label = name|humanize %}
            {%- endif -%}
        {% endif %}

        <label{% for attrname, attrvalue in label_attr %} {{ attrname }}=\"{{ attrvalue }}\"{% endfor %}>
            {% if translation_domain is same as(false) %}
                {{- label -}}
            {% elseif not sonata_admin.admin %}
                {{- label|trans({}, translation_domain) -}}
            {% else %}
                {{ label|trans({}, sonata_admin.field_description.translationDomain ?: admin.translationDomain) }}
            {% endif %}
        </label>
    {% endif %}
{% endspaceless %}
{% endblock form_label %}

{% block checkbox_label -%}
    {{- block('checkbox_radio_label') -}}
{%- endblock checkbox_label %}

{% block radio_label -%}
    {{- block('checkbox_radio_label') -}}
{%- endblock radio_label %}

{% block checkbox_radio_label %}
    {% if sonata_admin.admin %}
        {% set translation_domain = sonata_admin.field_description.translationDomain %}
    {% endif %}
    {# Do not display the label if widget is not defined in order to prevent double label rendering #}
    {% if widget is defined %}
        {% if required %}
            {% set label_attr = label_attr|merge({class: (label_attr.class|default('') ~ ' required')|trim}) %}
        {% endif %}
        {% if parent_label_class is defined %}
            {% set label_attr = label_attr|merge({class: (label_attr.class|default('') ~ ' ' ~ parent_label_class)|trim}) %}
        {% endif %}
        {% if label is not same as(false) and label is empty %}
            {% set label = name|humanize %}
        {% endif %}
        <label{% for attrname, attrvalue in label_attr %} {{ attrname }}=\"{{ attrvalue }}\"{% endfor %}>
            {{- widget|raw -}}
            {%- if label is not same as(false) -%}
                <span class=\"control-label__text\">
                    {% if translation_domain is same as(false) %}
                        {{- label -}}
                    {% else %}
                        {{- label|trans({}, translation_domain) -}}
                    {%- endif -%}
                </span>
            {%- endif -%}
        </label>
    {% endif %}
{% endblock checkbox_radio_label %}

{% block choice_widget_expanded %}
{% spaceless %}
    {% set attr = attr|merge({'class': attr.class|default('') ~ ' list-unstyled'}) %}
    <ul {{ block('widget_container_attributes') }}>
    {% for child in form %}
        <li>
            {{ form_widget(child, {
                'horizontal': false,
                'horizontal_input_wrapper_class': '',
                'translation_domain': choice_translation_domain
            }) }} {# 'horizontal' values are needed to avoid MopaBootstrapBundle messing with the DOM #}
        </li>
    {% endfor %}
    </ul>
{% endspaceless %}
{% endblock choice_widget_expanded %}

{% block choice_widget_collapsed %}
{% spaceless %}
    {% if required and placeholder is defined and placeholder is none %}
        {% set required = false %}
    {% elseif required and empty_value is defined and empty_value_in_choices is defined and empty_value is none and not empty_value_in_choices and not multiple %}
        {% set required = false %}
    {% endif %}

    {% set attr = attr|merge({'class': attr.class|default('') ~ ' form-control'}) %}
    {% if (sortable is defined) and sortable and multiple %}
        {{ block('sonata_type_choice_multiple_sortable') }}
    {% else %}
        <select {{ block('widget_attributes') }}{% if multiple %} multiple=\"multiple\"{% endif %} >
            {% if empty_value is defined and empty_value is not none %}
                <option value=\"\"{% if required and value is empty %} selected=\"selected\"{% endif %}>
                    {% if empty_value != '' %}
                        {% if not sonata_admin.admin %}
                            {{- empty_value|trans({}, translation_domain) -}}
                        {% else %}
                            {{- empty_value|trans({}, sonata_admin.field_description.translationDomain) -}}
                        {% endif %}
                    {% endif %}
                </option>
            {% elseif placeholder is defined and placeholder is not none %}
                <option value=\"\"{% if required and value is empty %} selected=\"selected\"{% endif %}>
                    {% if placeholder != '' %}
                        {% if not sonata_admin.admin %}
                            {{- placeholder|trans({}, translation_domain) -}}
                        {% else %}
                            {{- placeholder|trans({}, sonata_admin.field_description.translationDomain) -}}
                        {% endif %}
                    {% endif %}
                </option>
            {% endif %}
            {% if preferred_choices|length > 0 %}
                {% set options = preferred_choices %}
                {{ block('choice_widget_options') }}
                {% if choices|length > 0 %}
                    <option disabled=\"disabled\">{{ separator }}</option>
                {% endif %}
            {% endif %}
            {% set options = choices %}
            {{ block('choice_widget_options') }}
        </select>
    {% endif %}
{% endspaceless %}
{% endblock choice_widget_collapsed %}

{% block date_widget %}
{% spaceless %}
    {% if widget == 'single_text' %}
        {{ block('form_widget_simple') }}
    {% else %}
        {% if row is not defined or row == true %}
            {% set attr = attr|merge({'class': attr.class|default('') ~ ' row' }) %}
        {% endif %}
        {% set input_wrapper_class = input_wrapper_class|default('col-sm-4') %}
        <div {{ block('widget_container_attributes') }}>
            {{ date_pattern|replace({
                '{{ year }}':  '<div class=\"'~ input_wrapper_class ~ '\">' ~ form_widget(form.year) ~ '</div>',
                '{{ month }}': '<div class=\"'~ input_wrapper_class ~ '\">' ~ form_widget(form.month) ~ '</div>',
                '{{ day }}':   '<div class=\"'~ input_wrapper_class ~ '\">' ~ form_widget(form.day) ~ '</div>',
            })|raw }}
        </div>
    {% endif %}
    {% if datepicker_use_button is not defined %}
        {{ block('sonata_help') }}
    {% endif %}
{% endspaceless %}
{% endblock date_widget %}

{% block time_widget %}
{% spaceless %}
    {% if widget == 'single_text' %}
        {{ block('form_widget_simple') }}
    {% else %}
        {% if row is not defined or row == true %}
            {% set attr = attr|merge({'class': attr.class|default('') ~ ' row' }) %}
        {% endif %}
        {% set input_wrapper_class = input_wrapper_class|default('col-sm-6') %}
        <div {{ block('widget_container_attributes') }}>
            <div class=\"{{ input_wrapper_class }}\">
                {{ form_widget(form.hour) }}
            </div>
            {% if with_minutes %}
                <div class=\"{{ input_wrapper_class }}\">
                    {{ form_widget(form.minute) }}
                </div>
            {% endif %}
            {% if with_seconds %}
                <div class=\"{{ input_wrapper_class }}\">
                    {{ form_widget(form.second) }}
                </div>
            {% endif %}
        </div>
    {% endif %}
    {{ block('sonata_help') }}
{% endspaceless %}
{% endblock time_widget %}

{% block datetime_widget %}
{% spaceless %}
    {% if widget == 'single_text' %}
        {{ block('form_widget_simple') }}
    {% else %}
        {% set attr = attr|merge({'class': attr.class|default('') ~ ' row' }) %}
        <div {{ block('widget_container_attributes') }}>
            {{ form_errors(form.date) }}
            {{ form_errors(form.time) }}

            {% if form.date.vars.widget == 'single_text' %}
                <div class=\"col-sm-2\">
                    {{ form_widget(form.date) }}
                </div>
            {% else %}
                {{ form_widget(form.date, {'row': false, 'input_wrapper_class': 'col-sm-2'}) }}
            {% endif %}

            {% if form.time.vars.widget == 'single_text' %}
                <div class=\"col-sm-2\">
                    {{ form_widget(form.time) }}
                </div>
            {% else %}
                {{ form_widget(form.time, {'row': false, 'input_wrapper_class': 'col-sm-2'}) }}
            {% endif %}
        </div>
    {% endif %}
    {% if datepicker_use_button is not defined %}
        {{ block('sonata_help') }}
    {% endif %}
{% endspaceless %}
{% endblock datetime_widget %}

{% block form_row %}
    {% set show_label = show_label|default(true) %}
    <div class=\"form-group{% if errors|length > 0 %} has-error{% endif %}\" id=\"sonata-ba-field-container-{{ id }}\">
        {% if sonata_admin.field_description.options is defined %}
            {% set label = sonata_admin.field_description.options.name|default(label)  %}
        {% endif %}

        {% set div_class = 'sonata-ba-field' %}

        {% if label is same as(false) %}
            {% set div_class = div_class ~ ' sonata-collection-row-without-label' %}
        {% endif %}

        {% if sonata_admin is defined and sonata_admin.options['form_type'] == 'horizontal' %}
            {# Add an offset if no label or is a checkbox/radio #}
            {% if label is same as(false) or form.vars.checked is defined %}
                {% if 'collection' in form.parent.vars.block_prefixes %}
                    {% set div_class = div_class ~ ' col-sm-12' %}
                {% else %}
                    {% set div_class = div_class ~ ' col-sm-9 col-sm-offset-3' %}
                {% endif %}
            {% else %}
                {% set div_class = div_class ~ ' col-sm-9' %}
            {% endif %}
        {% endif %}

        {% if show_label %}
            {{ form_label(form, label|default(null)) }}
        {% endif %}

        {% if sonata_admin is defined and sonata_admin_enabled %}
            {% set div_class = div_class ~ ' sonata-ba-field-' ~ sonata_admin.edit ~ '-' ~ sonata_admin.inline %}
        {% endif %}

        {% if errors|length > 0 %}
            {% set div_class = div_class ~ ' sonata-ba-field-error' %}
        {% endif %}

        <div class=\"{{ div_class }}\">
            {{ form_widget(form, {'horizontal': false, 'horizontal_input_wrapper_class': ''}) }} {# {'horizontal': false, 'horizontal_input_wrapper_class': ''} needed to avoid MopaBootstrapBundle messing with the DOM #}

            {% if errors|length > 0 %}
                <div class=\"help-block sonata-ba-field-error-messages\">
                    {{ form_errors(form) }}
                </div>
            {% endif %}

            {% if sonata_admin is defined and sonata_admin_enabled and sonata_admin.field_description.help|default(false) %}
                <span class=\"help-block sonata-ba-field-help\">{{ sonata_admin.field_description.help|trans({}, sonata_admin.field_description.translationDomain ?: admin.translationDomain)|raw }}</span>
            {% endif %}
        </div>
    </div>
{% endblock form_row %}

{% block checkbox_row -%}
    {% set show_label = false %}
    {{ block('form_row') }}
{%- endblock checkbox_row %}

{% block radio_row -%}
    {% set show_label = false %}
    {{ block('form_row') }}
{%- endblock radio_row %}

{% block sonata_type_native_collection_widget_row %}
{% spaceless %}
    <div class=\"sonata-collection-row\">
        {% if allow_delete %}
            <div class=\"row\">
                <div class=\"col-xs-1\">
                    <a href=\"#\" class=\"btn btn-link sonata-collection-delete\">
                        <i class=\"fa fa-minus-circle\" aria-hidden=\"true\"></i>
                    </a>
                </div>
                <div class=\"col-xs-11\">
        {% endif %}
            {{ form_row(child, { label: false }) }}
        {% if allow_delete %}
                </div>
            </div>
        {% endif %}
    </div>
{% endspaceless %}
{% endblock sonata_type_native_collection_widget_row %}

{% block sonata_type_native_collection_widget %}
{% spaceless %}
    {% if prototype is defined %}
        {% set child = prototype %}
        {% set allow_delete_backup = allow_delete %}
        {% set allow_delete = true %}
        {% set attr = attr|merge({'data-prototype': block('sonata_type_native_collection_widget_row'), 'data-prototype-name': prototype.vars.name, 'class': attr.class|default('') }) %}
        {% set allow_delete = allow_delete_backup %}
    {% endif %}
    <div {{ block('widget_container_attributes') }}>
        {{ form_errors(form) }}
        {% for child in form %}
            {{ block('sonata_type_native_collection_widget_row') }}
        {% endfor %}
        {{ form_rest(form) }}
        {% if allow_add %}
            <div><a href=\"#\" class=\"btn btn-link sonata-collection-add\"><i class=\"fa fa-plus-circle\" aria-hidden=\"true\"></i></a></div>
        {% endif %}
    </div>
{% endspaceless %}
{% endblock sonata_type_native_collection_widget %}

{% block sonata_type_immutable_array_widget %}
    {% spaceless %}
        <div {{ block('widget_container_attributes') }}>
            {{ block('sonata_help') }}

            {{ form_errors(form) }}

            {% for key, child in form %}
                {{ block('sonata_type_immutable_array_widget_row') }}
            {% endfor %}

            {{ form_rest(form) }}
        </div>
    {% endspaceless %}
{% endblock sonata_type_immutable_array_widget %}

{% block sonata_type_immutable_array_widget_row %}
    {% spaceless %}
        <div class=\"form-group{% if child.vars.errors|length > 0%} has-error{%endif%}\" id=\"sonata-ba-field-container-{{ id }}-{{ key }}\">

            {{ form_label(child) }}

            {% set div_class = \"\" %}
            {% if sonata_admin.options['form_type'] == 'horizontal' %}
                {% set div_class = 'col-sm-9' %}
            {% endif%}

            <div class=\"{{ div_class }} sonata-ba-field sonata-ba-field-{{ sonata_admin.edit }}-{{ sonata_admin.inline }} {% if child.vars.errors|length > 0 %}sonata-ba-field-error{% endif %}\">
                {{ form_widget(child, {'horizontal': false, 'horizontal_input_wrapper_class': ''}) }} {# {'horizontal': false, 'horizontal_input_wrapper_class': ''} needed to avoid MopaBootstrapBundle messing with the DOM #}
                {% set sonata_help = child.vars.sonata_help %}
                {{ block('sonata_help') }}
            </div>

            {% if child.vars.errors|length > 0 %}
                <div class=\"help-block sonata-ba-field-error-messages\">
                    {{ form_errors(child) }}
                </div>
            {% endif %}
        </div>
    {% endspaceless %}
{% endblock %}

{% block sonata_type_model_autocomplete_widget %}
    {% include template %}
{% endblock sonata_type_model_autocomplete_widget %}

{% block sonata_type_choice_field_mask_widget %}
    {{ block('choice_widget') }}
    {# Taking the form name excluding ending field glue character #}
    {% set main_form_name = id|slice(0, (id|length - name|length)-1) %}
    {% if expanded %}
        {% set js_selector = '#' ~ main_form_name ~ '_' ~ name ~ ' input' %}
        {% set js_event = 'ifChecked' %}
    {% else %}
        {% set js_selector = '#' ~ main_form_name ~ '_' ~ name %}
        {% set js_event = 'change' %}
    {% endif %}
    <script>
        jQuery(document).ready(function() {
            var allFields = {{ all_fields|json_encode|raw }},
                map = {{ map|json_encode|raw }},
                showMaskChoiceEl = jQuery(\"{{ js_selector }}\");

            showMaskChoiceEl.on(\"{{ js_event }}\", function () {
                choice_field_mask_show(jQuery(this).val());
            });

            function choice_field_mask_show(val) {
                var controlGroupIdFunc = function (field) {
                    // Most of fields are named with an underscore
                    var defaultFieldId = '#sonata-ba-field-container-{{ main_form_name }}_' + field;

                    // Some fields may be named with a dash (like keys of immutable array form type)
                    if (jQuery(defaultFieldId).length === 0) {
                        return '#sonata-ba-field-container-{{ main_form_name }}-' + field;
                    }

                    return defaultFieldId;
                };

                jQuery.each(allFields, function (i, field) {
                    jQuery(controlGroupIdFunc(field)).hide();
                });

                if (map[val]) {
                    jQuery.each(map[val], function (i, field) {
                        jQuery(controlGroupIdFunc(field)).show();
                    });
                }
            }

            {% if value is empty %}
                choice_field_mask_show(showMaskChoiceEl.val());
            {% else %}
                choice_field_mask_show('{{ value }}');
            {% endif %}
        });

    </script>
{% endblock %}

{%  block sonata_type_choice_multiple_sortable %}
    <input type=\"hidden\" name=\"{{ full_name }}\" id=\"{{ id }}\" value=\"{{ value|join(',') }}\" />

    <script>
        jQuery(document).ready(function() {
            Admin.setup_sortable_select2(jQuery('#{{ id }}'), {{ form.vars.choices|json_encode|raw }});
        });
    </script>
{% endblock %}
", "@SonataAdmin/Form/form_admin_fields.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/Form/form_admin_fields.html.twig");
    }
}
