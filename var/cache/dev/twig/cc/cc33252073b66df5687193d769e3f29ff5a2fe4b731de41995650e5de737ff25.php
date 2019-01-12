<?php

/* @SonataAdmin/Form/filter_admin_fields.html.twig */
class __TwigTemplate_88429d239c2a9938b011ce184318dab66e30bd94d8063bf02d2647261cc2de76 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 12
        $this->parent = $this->loadTemplate("form_div_layout.html.twig", "@SonataAdmin/Form/filter_admin_fields.html.twig", 12);
        $this->blocks = array(
            'choice_widget_collapsed' => array($this, 'block_choice_widget_collapsed'),
            'textarea_widget' => array($this, 'block_textarea_widget'),
            'form_widget_simple' => array($this, 'block_form_widget_simple'),
            'choice_widget_expanded' => array($this, 'block_choice_widget_expanded'),
            'checkbox_widget' => array($this, 'block_checkbox_widget'),
            'sonata_type_model_autocomplete_widget' => array($this, 'block_sonata_type_model_autocomplete_widget'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "form_div_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/Form/filter_admin_fields.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/Form/filter_admin_fields.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 18
    public function block_choice_widget_collapsed($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "choice_widget_collapsed"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "choice_widget_collapsed"));

        // line 19
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new Twig_Error_Runtime('Variable "attr" does not exist.', 19, $this->source); })()), array("class" => (((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array()), "")) : ("")) . " form-control")));
        // line 20
        echo "    ";
        $this->displayParentBlock("choice_widget_collapsed", $context, $blocks);
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 23
    public function block_textarea_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "textarea_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "textarea_widget"));

        // line 24
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new Twig_Error_Runtime('Variable "attr" does not exist.', 24, $this->source); })()), array("class" => (((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array()), "")) : ("")) . " form-control")));
        // line 25
        echo "    ";
        $this->displayParentBlock("textarea_widget", $context, $blocks);
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 28
    public function block_form_widget_simple($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_widget_simple"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_widget_simple"));

        // line 29
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new Twig_Error_Runtime('Variable "attr" does not exist.', 29, $this->source); })()), array("class" => (((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array()), "")) : ("")) . " form-control")));
        // line 30
        echo "    ";
        $this->displayParentBlock("form_widget_simple", $context, $blocks);
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 33
    public function block_choice_widget_expanded($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "choice_widget_expanded"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "choice_widget_expanded"));

        // line 34
        echo "    ";
        ob_start();
        // line 35
        echo "        ";
        $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new Twig_Error_Runtime('Variable "label_attr" does not exist.', 35, $this->source); })()), array("class" => ((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", array()), "")) : (""))));
        // line 36
        echo "        ";
        $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new Twig_Error_Runtime('Variable "label_attr" does not exist.', 36, $this->source); })()), array("class" => ((twig_get_attribute($this->env, $this->source, (isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new Twig_Error_Runtime('Variable "label_attr" does not exist.', 36, $this->source); })()), "class", array()) . " ") . ((((isset($context["widget_type"]) || array_key_exists("widget_type", $context)) && ((isset($context["widget_type"]) || array_key_exists("widget_type", $context) ? $context["widget_type"] : (function () { throw new Twig_Error_Runtime('Variable "widget_type" does not exist.', 36, $this->source); })()) != ""))) ? ((((((isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new Twig_Error_Runtime('Variable "multiple" does not exist.', 36, $this->source); })())) ? ("checkbox") : ("radio")) . "-") . (isset($context["widget_type"]) || array_key_exists("widget_type", $context) ? $context["widget_type"] : (function () { throw new Twig_Error_Runtime('Variable "widget_type" does not exist.', 36, $this->source); })()))) : ("")))));
        // line 37
        echo "        ";
        if ((isset($context["expanded"]) || array_key_exists("expanded", $context) ? $context["expanded"] : (function () { throw new Twig_Error_Runtime('Variable "expanded" does not exist.', 37, $this->source); })())) {
            // line 38
            echo "            ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new Twig_Error_Runtime('Variable "attr" does not exist.', 38, $this->source); })()), array("class" => ((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", array()), "")) : (""))));
            // line 39
            echo "            <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
        ";
        }
        // line 41
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 41, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 42
            echo "            ";
            if (((isset($context["widget_type"]) || array_key_exists("widget_type", $context)) && ((isset($context["widget_type"]) || array_key_exists("widget_type", $context) ? $context["widget_type"] : (function () { throw new Twig_Error_Runtime('Variable "widget_type" does not exist.', 42, $this->source); })()) != "inline"))) {
                // line 43
                echo "                <div class=\"";
                echo (((isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new Twig_Error_Runtime('Variable "multiple" does not exist.', 43, $this->source); })())) ? ("checkbox") : ("radio"));
                echo "\">
            ";
            }
            // line 45
            echo "            <label";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new Twig_Error_Runtime('Variable "label_attr" does not exist.', 45, $this->source); })()));
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
            // line 46
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["child"], 'widget', array("attr" => array("class" => ((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "widget_class", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "widget_class", array()), "")) : ("")))));
            echo "
            ";
            // line 47
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", array()), "label", array()), array(), (isset($context["translation_domain"]) || array_key_exists("translation_domain", $context) ? $context["translation_domain"] : (function () { throw new Twig_Error_Runtime('Variable "translation_domain" does not exist.', 47, $this->source); })())), "html", null, true);
            echo "
            </label>
            ";
            // line 49
            if (((isset($context["widget_type"]) || array_key_exists("widget_type", $context)) && ((isset($context["widget_type"]) || array_key_exists("widget_type", $context) ? $context["widget_type"] : (function () { throw new Twig_Error_Runtime('Variable "widget_type" does not exist.', 49, $this->source); })()) != "inline"))) {
                // line 50
                echo "                </div>
            ";
            }
            // line 52
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "        ";
        if (        $this->hasBlock("form_message", $context, $blocks)) {
            // line 54
            echo "            ";
            $this->displayBlock("form_message", $context, $blocks);
            echo "
        ";
        }
        // line 56
        echo "        ";
        if ((isset($context["expanded"]) || array_key_exists("expanded", $context) ? $context["expanded"] : (function () { throw new Twig_Error_Runtime('Variable "expanded" does not exist.', 56, $this->source); })())) {
            // line 57
            echo "            </div>
        ";
        }
        // line 59
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 62
    public function block_checkbox_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "checkbox_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "checkbox_widget"));

        // line 63
        echo "    ";
        ob_start();
        // line 64
        echo "        ";
        if (( !((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 64, $this->source); })()) === false) && twig_test_empty((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 64, $this->source); })())))) {
            // line 65
            echo "            ";
            $context["label"] = $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->humanize((isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new Twig_Error_Runtime('Variable "name" does not exist.', 65, $this->source); })()));
            // line 66
            echo "        ";
        }
        // line 67
        echo "        ";
        if (((twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 67, $this->source); })()), "parent", array()) != null) && !twig_in_filter("choice", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 67, $this->source); })()), "parent", array()), "vars", array()), "block_prefixes", array())))) {
            // line 68
            echo "            <div class=\"checkbox\">
        ";
        }
        // line 70
        echo "
        ";
        // line 71
        if ((((twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 71, $this->source); })()), "parent", array()) != null) && !twig_in_filter("choice", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 71, $this->source); })()), "parent", array()), "vars", array()), "block_prefixes", array()))) && (isset($context["label_render"]) || array_key_exists("label_render", $context)))) {
            // line 72
            echo "            <label class=\"";
            if (((isset($context["inline"]) || array_key_exists("inline", $context)) && (isset($context["inline"]) || array_key_exists("inline", $context) ? $context["inline"] : (function () { throw new Twig_Error_Runtime('Variable "inline" does not exist.', 72, $this->source); })()))) {
                echo "checkbox-inline";
            }
            echo "\">
        ";
        }
        // line 74
        echo "
        <input type=\"checkbox\" ";
        // line 75
        $this->displayBlock("widget_attributes", $context, $blocks);
        if ((isset($context["value"]) || array_key_exists("value", $context))) {
            echo " value=\"";
            echo twig_escape_filter($this->env, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 75, $this->source); })()), "html", null, true);
            echo "\"";
        }
        if ((isset($context["checked"]) || array_key_exists("checked", $context) ? $context["checked"] : (function () { throw new Twig_Error_Runtime('Variable "checked" does not exist.', 75, $this->source); })())) {
            echo " checked=\"checked\"";
        }
        echo "/>
        ";
        // line 76
        if (((twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 76, $this->source); })()), "parent", array()) != null) && !twig_in_filter("choice", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 76, $this->source); })()), "parent", array()), "vars", array()), "block_prefixes", array())))) {
            // line 77
            echo "            ";
            if (((isset($context["label_render"]) || array_key_exists("label_render", $context)) && twig_in_filter((isset($context["widget_checkbox_label"]) || array_key_exists("widget_checkbox_label", $context) ? $context["widget_checkbox_label"] : (function () { throw new Twig_Error_Runtime('Variable "widget_checkbox_label" does not exist.', 77, $this->source); })()), array(0 => "both", 1 => "widget")))) {
                // line 78
                echo "                ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new Twig_Error_Runtime('Variable "label" does not exist.', 78, $this->source); })()), array(), (isset($context["translation_domain"]) || array_key_exists("translation_domain", $context) ? $context["translation_domain"] : (function () { throw new Twig_Error_Runtime('Variable "translation_domain" does not exist.', 78, $this->source); })())), "html", null, true);
                echo "
                </label>
            ";
            }
            // line 81
            echo "        ";
        }
        // line 82
        echo "        ";
        if (((twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 82, $this->source); })()), "parent", array()) != null) && !twig_in_filter("choice", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 82, $this->source); })()), "parent", array()), "vars", array()), "block_prefixes", array())))) {
            // line 83
            echo "            </div>
            ";
            // line 84
            if (            $this->hasBlock("form_message", $context, $blocks)) {
                // line 85
                echo "                ";
                $this->displayBlock("form_message", $context, $blocks);
                echo "
            ";
            }
            // line 87
            echo "        ";
        }
        // line 88
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 91
    public function block_sonata_type_model_autocomplete_widget($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_model_autocomplete_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_type_model_autocomplete_widget"));

        // line 92
        echo "    ";
        $this->loadTemplate((isset($context["template"]) || array_key_exists("template", $context) ? $context["template"] : (function () { throw new Twig_Error_Runtime('Variable "template" does not exist.', 92, $this->source); })()), "@SonataAdmin/Form/filter_admin_fields.html.twig", 92)->display($context);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SonataAdmin/Form/filter_admin_fields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  340 => 92,  331 => 91,  320 => 88,  317 => 87,  311 => 85,  309 => 84,  306 => 83,  303 => 82,  300 => 81,  293 => 78,  290 => 77,  288 => 76,  276 => 75,  273 => 74,  265 => 72,  263 => 71,  260 => 70,  256 => 68,  253 => 67,  250 => 66,  247 => 65,  244 => 64,  241 => 63,  232 => 62,  221 => 59,  217 => 57,  214 => 56,  208 => 54,  205 => 53,  199 => 52,  195 => 50,  193 => 49,  188 => 47,  184 => 46,  168 => 45,  162 => 43,  159 => 42,  154 => 41,  148 => 39,  145 => 38,  142 => 37,  139 => 36,  136 => 35,  133 => 34,  124 => 33,  111 => 30,  108 => 29,  99 => 28,  86 => 25,  83 => 24,  74 => 23,  61 => 20,  58 => 19,  49 => 18,  15 => 12,);
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

{#
    Inspired from MopaBootstrapBundle: https://github.com/phiamo/MopaBootstrapBundle
#}

{% block choice_widget_collapsed %}
    {% set attr = attr|merge({'class': attr.class|default('') ~ ' form-control'}) %}
    {{ parent() }}
{% endblock choice_widget_collapsed %}

{% block textarea_widget %}
    {% set attr = attr|merge({'class': attr.class|default('') ~ ' form-control'}) %}
    {{ parent() }}
{% endblock textarea_widget %}

{% block form_widget_simple %}
    {% set attr = attr|merge({'class': attr.class|default('') ~ ' form-control'}) %}
    {{ parent() }}
{% endblock form_widget_simple %}

{% block choice_widget_expanded %}
    {% spaceless %}
        {% set label_attr = label_attr|merge({'class': (label_attr.class|default(''))}) %}
        {% set label_attr = label_attr|merge({'class': (label_attr.class ~ ' ' ~ (widget_type is defined and widget_type != '' ? (multiple ? 'checkbox' : 'radio') ~ '-' ~ widget_type : ''))}) %}
        {% if expanded %}
            {% set attr = attr|merge({'class': attr.class|default('')}) %}
            <div {{ block('widget_container_attributes') }}>
        {% endif %}
        {% for child in form %}
            {% if widget_type is defined and widget_type != 'inline' %}
                <div class=\"{{ multiple ? 'checkbox' : 'radio' }}\">
            {% endif %}
            <label{% for attrname, attrvalue in label_attr %} {{ attrname }}=\"{{ attrvalue }}\"{% endfor %}>
            {{ form_widget(child, {'attr': {'class': attr.widget_class|default('')}}) }}
            {{ child.vars.label|trans({}, translation_domain) }}
            </label>
            {% if widget_type is defined and widget_type != 'inline' %}
                </div>
            {% endif %}
        {% endfor %}
        {% if block('form_message') is defined %}
            {{ block('form_message') }}
        {% endif %}
        {% if expanded %}
            </div>
        {% endif %}
    {% endspaceless %}
{% endblock choice_widget_expanded %}

{% block checkbox_widget %}
    {% spaceless %}
        {% if label is not same as(false) and label is empty %}
            {% set label = name|humanize %}
        {% endif %}
        {% if form.parent != null and 'choice' not in form.parent.vars.block_prefixes %}
            <div class=\"checkbox\">
        {% endif %}

        {% if form.parent != null and 'choice' not in form.parent.vars.block_prefixes and label_render is defined %}
            <label class=\"{% if inline is defined and inline %}checkbox-inline{% endif %}\">
        {% endif %}

        <input type=\"checkbox\" {{ block('widget_attributes') }}{% if value is defined %} value=\"{{ value }}\"{% endif %}{% if checked %} checked=\"checked\"{% endif %}/>
        {% if form.parent != null and 'choice' not in form.parent.vars.block_prefixes %}
            {% if label_render is defined and widget_checkbox_label in ['both', 'widget'] %}
                {{ label|trans({}, translation_domain) }}
                </label>
            {% endif %}
        {% endif %}
        {% if form.parent != null and 'choice' not in form.parent.vars.block_prefixes %}
            </div>
            {% if block('form_message') is defined %}
                {{ block('form_message') }}
            {% endif %}
        {% endif %}
    {% endspaceless %}
{% endblock checkbox_widget %}

{% block sonata_type_model_autocomplete_widget %}
    {% include template %}
{% endblock sonata_type_model_autocomplete_widget %}
", "@SonataAdmin/Form/filter_admin_fields.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/Form/filter_admin_fields.html.twig");
    }
}
