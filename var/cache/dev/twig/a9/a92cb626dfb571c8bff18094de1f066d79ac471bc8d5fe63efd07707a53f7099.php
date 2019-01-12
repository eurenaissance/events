<?php

/* @SonataAdmin/CRUD/show_choice.html.twig */
class __TwigTemplate_81f319c2c3c215efe4f395b6628e98491a36c3f9b882f3ee485250e0513c6e14 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 11
        $this->parent = $this->loadTemplate("@SonataAdmin/CRUD/base_show_field.html.twig", "@SonataAdmin/CRUD/show_choice.html.twig", 11);
        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@SonataAdmin/CRUD/base_show_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/show_choice.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/show_choice.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 13
    public function block_field($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "field"));

        // line 14
        ob_start();
        // line 15
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["field_description"] ?? null), "options", array(), "any", false, true), "choices", array(), "any", true, true)) {
            // line 16
            echo "        ";
            if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["field_description"] ?? null), "options", array(), "any", false, true), "multiple", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["field_description"]) || array_key_exists("field_description", $context) ? $context["field_description"] : (function () { throw new Twig_Error_Runtime('Variable "field_description" does not exist.', 16, $this->source); })()), "options", array()), "multiple", array()) == true)) && twig_test_iterable((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 16, $this->source); })())))) {
                // line 17
                echo "
            ";
                // line 18
                $context["result"] = "";
                // line 19
                echo "            ";
                $context["delimiter"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["field_description"] ?? null), "options", array(), "any", false, true), "delimiter", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["field_description"] ?? null), "options", array(), "any", false, true), "delimiter", array()), ", ")) : (", "));
                // line 20
                echo "
            ";
                // line 21
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 21, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["val"]) {
                    // line 22
                    echo "                ";
                    if ( !twig_test_empty((isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new Twig_Error_Runtime('Variable "result" does not exist.', 22, $this->source); })()))) {
                        // line 23
                        echo "                    ";
                        $context["result"] = ((isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new Twig_Error_Runtime('Variable "result" does not exist.', 23, $this->source); })()) . (isset($context["delimiter"]) || array_key_exists("delimiter", $context) ? $context["delimiter"] : (function () { throw new Twig_Error_Runtime('Variable "delimiter" does not exist.', 23, $this->source); })()));
                        // line 24
                        echo "                ";
                    }
                    // line 25
                    echo "
                ";
                    // line 26
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["field_description"] ?? null), "options", array(), "any", false, true), "choices", array(), "any", false, true), $context["val"], array(), "array", true, true)) {
                        // line 27
                        echo "                    ";
                        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["field_description"] ?? null), "options", array(), "any", false, true), "catalogue", array(), "any", true, true)) {
                            // line 28
                            echo "                        ";
                            $context["result"] = ((isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new Twig_Error_Runtime('Variable "result" does not exist.', 28, $this->source); })()) . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["field_description"]) || array_key_exists("field_description", $context) ? $context["field_description"] : (function () { throw new Twig_Error_Runtime('Variable "field_description" does not exist.', 28, $this->source); })()), "options", array()), "choices", array()), $context["val"], array(), "array"));
                            // line 29
                            echo "                    ";
                        } else {
                            // line 30
                            echo "                        ";
                            $context["result"] = ((isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new Twig_Error_Runtime('Variable "result" does not exist.', 30, $this->source); })()) . $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["field_description"]) || array_key_exists("field_description", $context) ? $context["field_description"] : (function () { throw new Twig_Error_Runtime('Variable "field_description" does not exist.', 30, $this->source); })()), "options", array()), "choices", array()), $context["val"], array(), "array"), array(), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["field_description"]) || array_key_exists("field_description", $context) ? $context["field_description"] : (function () { throw new Twig_Error_Runtime('Variable "field_description" does not exist.', 30, $this->source); })()), "options", array()), "catalogue", array())));
                            // line 31
                            echo "                    ";
                        }
                        // line 32
                        echo "                ";
                    } else {
                        // line 33
                        echo "                    ";
                        $context["result"] = ((isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new Twig_Error_Runtime('Variable "result" does not exist.', 33, $this->source); })()) . $context["val"]);
                        // line 34
                        echo "                ";
                    }
                    // line 35
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['val'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 36
                echo "
            ";
                // line 37
                $context["value"] = (isset($context["result"]) || array_key_exists("result", $context) ? $context["result"] : (function () { throw new Twig_Error_Runtime('Variable "result" does not exist.', 37, $this->source); })());
                // line 38
                echo "
        ";
            } elseif (twig_in_filter(            // line 39
(isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 39, $this->source); })()), twig_get_array_keys_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["field_description"]) || array_key_exists("field_description", $context) ? $context["field_description"] : (function () { throw new Twig_Error_Runtime('Variable "field_description" does not exist.', 39, $this->source); })()), "options", array()), "choices", array())))) {
                // line 40
                echo "            ";
                if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["field_description"] ?? null), "options", array(), "any", false, true), "catalogue", array(), "any", true, true)) {
                    // line 41
                    echo "                ";
                    $context["value"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["field_description"]) || array_key_exists("field_description", $context) ? $context["field_description"] : (function () { throw new Twig_Error_Runtime('Variable "field_description" does not exist.', 41, $this->source); })()), "options", array()), "choices", array()), (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 41, $this->source); })()), array(), "array");
                    // line 42
                    echo "            ";
                } else {
                    // line 43
                    echo "                ";
                    $context["value"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["field_description"]) || array_key_exists("field_description", $context) ? $context["field_description"] : (function () { throw new Twig_Error_Runtime('Variable "field_description" does not exist.', 43, $this->source); })()), "options", array()), "choices", array()), (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 43, $this->source); })()), array(), "array"), array(), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["field_description"]) || array_key_exists("field_description", $context) ? $context["field_description"] : (function () { throw new Twig_Error_Runtime('Variable "field_description" does not exist.', 43, $this->source); })()), "options", array()), "catalogue", array()));
                    // line 44
                    echo "            ";
                }
                // line 45
                echo "        ";
            }
            // line 46
            echo "    ";
        }
        // line 47
        echo "
    ";
        // line 48
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["field_description"]) || array_key_exists("field_description", $context) ? $context["field_description"] : (function () { throw new Twig_Error_Runtime('Variable "field_description" does not exist.', 48, $this->source); })()), "options", array()), "safe", array())) {
            // line 49
            echo "        ";
            echo (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 49, $this->source); })());
            echo "
    ";
        } else {
            // line 51
            echo "        ";
            echo twig_escape_filter($this->env, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new Twig_Error_Runtime('Variable "value" does not exist.', 51, $this->source); })()), "html", null, true);
            echo "
    ";
        }
        // line 53
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SonataAdmin/CRUD/show_choice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 53,  162 => 51,  156 => 49,  154 => 48,  151 => 47,  148 => 46,  145 => 45,  142 => 44,  139 => 43,  136 => 42,  133 => 41,  130 => 40,  128 => 39,  125 => 38,  123 => 37,  120 => 36,  114 => 35,  111 => 34,  108 => 33,  105 => 32,  102 => 31,  99 => 30,  96 => 29,  93 => 28,  90 => 27,  88 => 26,  85 => 25,  82 => 24,  79 => 23,  76 => 22,  72 => 21,  69 => 20,  66 => 19,  64 => 18,  61 => 17,  58 => 16,  55 => 15,  53 => 14,  44 => 13,  15 => 11,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}
{% extends '@SonataAdmin/CRUD/base_show_field.html.twig' %}

{% block field%}
{% spaceless %}
    {% if field_description.options.choices  is defined %}
        {% if field_description.options.multiple is defined and field_description.options.multiple==true and value is iterable %}

            {% set result = '' %}
            {% set delimiter = field_description.options.delimiter|default(', ') %}

            {% for val in value %}
                {% if result is not empty %}
                    {% set result = result ~ delimiter %}
                {% endif %}

                {% if field_description.options.choices[val] is defined %}
                    {% if field_description.options.catalogue is not defined %}
                        {% set result = result ~ field_description.options.choices[val] %}
                    {% else %}
                        {% set result = result ~ field_description.options.choices[val]|trans({}, field_description.options.catalogue) %}
                    {% endif %}
                {% else %}
                    {% set result = result ~ val %}
                {% endif %}
            {% endfor %}

            {% set value = result %}

        {% elseif value in field_description.options.choices|keys %}
            {% if field_description.options.catalogue is not defined %}
                {% set value = field_description.options.choices[value] %}
            {% else %}
                {% set value = field_description.options.choices[value]|trans({}, field_description.options.catalogue) %}
            {% endif %}
        {% endif %}
    {% endif %}

    {% if field_description.options.safe %}
        {{ value|raw }}
    {% else %}
        {{ value }}
    {% endif %}

{% endspaceless %}
{% endblock %}
", "@SonataAdmin/CRUD/show_choice.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/CRUD/show_choice.html.twig");
    }
}
