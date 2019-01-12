<?php

/* @SonataAdmin/CRUD/Association/edit_one_to_many_inline_tabs.html.twig */
class __TwigTemplate_863dbeadec1a074041e53f70a09d02d66773fcf4e0f474f4dbd0a72143f48d6c extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/Association/edit_one_to_many_inline_tabs.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/Association/edit_one_to_many_inline_tabs.html.twig"));

        // line 11
        echo "<div class=\"sonata-ba-tabs\">
    ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 12, $this->source); })()), "children", array()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["nested_group_field"]) {
            // line 13
            echo "        <div>
            <div class=\"nav-tabs-custom\">
                <ul class=\"nav nav-tabs\">
                    ";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["associationAdmin"]) || array_key_exists("associationAdmin", $context) ? $context["associationAdmin"] : (function () { throw new Twig_Error_Runtime('Variable "associationAdmin" does not exist.', 16, $this->source); })()), "formgroups", array()));
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
            foreach ($context['_seq'] as $context["name"] => $context["form_group"]) {
                // line 17
                echo "                        <li class=\"";
                if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", array())) {
                    echo "active";
                }
                echo "\">
                            <a
                                href=\"#";
                // line 19
                echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 19, $this->source); })()), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\"
                                data-toggle=\"tab\"
                            >
                                <i class=\"icon-exclamation-sign has-errors hide\"></i>
                                ";
                // line 23
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["associationAdmin"]) || array_key_exists("associationAdmin", $context) ? $context["associationAdmin"] : (function () { throw new Twig_Error_Runtime('Variable "associationAdmin" does not exist.', 23, $this->source); })()), "trans", array(0 => $context["name"], 1 => array(), 2 => twig_get_attribute($this->env, $this->source, $context["form_group"], "translation_domain", array())), "method"), "html", null, true);
                echo "
                            </a>
                        </li>
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
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['form_group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "                </ul>

                <div class=\"tab-content\">
                    ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["associationAdmin"]) || array_key_exists("associationAdmin", $context) ? $context["associationAdmin"] : (function () { throw new Twig_Error_Runtime('Variable "associationAdmin" does not exist.', 30, $this->source); })()), "formgroups", array()));
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
            foreach ($context['_seq'] as $context["name"] => $context["form_group"]) {
                // line 31
                echo "                        <div
                            class=\"tab-pane ";
                // line 32
                if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", array())) {
                    echo "active";
                }
                echo "\"
                            id=\"";
                // line 33
                echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 33, $this->source); })()), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\"
                        >
                            <fieldset>
                                <div class=\"sonata-ba-collapsed-fields\">
                                    ";
                // line 37
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["form_group"], "fields", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["field_name"]) {
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["nested_group_field"], "children", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                        // line 38
                        echo "                                        ";
                        $context["nested_field"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["nested_group_field"], "children", array()), $context["field_name"], array(), "array");
                        // line 39
                        echo "                                        <div class=\"sonata-ba-field-";
                        echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new Twig_Error_Runtime('Variable "id" does not exist.', 39, $this->source); })()), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $context["field_name"], "html", null, true);
                        echo "\">
                                            ";
                        // line 40
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["associationAdmin"] ?? null), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                            // line 41
                            echo "                                                ";
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["nested_field"]) || array_key_exists("nested_field", $context) ? $context["nested_field"] : (function () { throw new Twig_Error_Runtime('Variable "nested_field" does not exist.', 41, $this->source); })()), 'row', array("inline" => "natural", "edit" => "inline"));
                            // line 44
                            echo "
                                                ";
                            // line 45
                            $context["dummy"] = twig_get_attribute($this->env, $this->source, $context["nested_group_field"], "setrendered", array());
                            // line 46
                            echo "                                            ";
                        } else {
                            // line 47
                            echo "                                                ";
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["nested_field"]) || array_key_exists("nested_field", $context) ? $context["nested_field"] : (function () { throw new Twig_Error_Runtime('Variable "nested_field" does not exist.', 47, $this->source); })()), 'row');
                            echo "
                                            ";
                        }
                        // line 49
                        echo "                                        </div>
                                    ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_name'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 51
                echo "                                </div>
                            </fieldset>
                        </div>
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
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['form_group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "                </div>
            </div>

            ";
            // line 58
            if (twig_get_attribute($this->env, $this->source, $context["nested_group_field"], "_delete", array(), "array", true, true)) {
                // line 59
                echo "                ";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["nested_group_field"], "_delete", array(), "array"), 'row', array("label" => "action_delete", "translation_domain" => "SonataAdminBundle"));
                echo "
            ";
            }
            // line 61
            echo "        </div>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nested_group_field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SonataAdmin/CRUD/Association/edit_one_to_many_inline_tabs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  237 => 63,  222 => 61,  216 => 59,  214 => 58,  209 => 55,  192 => 51,  184 => 49,  178 => 47,  175 => 46,  173 => 45,  170 => 44,  167 => 41,  165 => 40,  158 => 39,  155 => 38,  150 => 37,  139 => 33,  133 => 32,  130 => 31,  113 => 30,  108 => 27,  90 => 23,  79 => 19,  71 => 17,  54 => 16,  49 => 13,  32 => 12,  29 => 11,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}
<div class=\"sonata-ba-tabs\">
    {% for nested_group_field in form.children %}
        <div>
            <div class=\"nav-tabs-custom\">
                <ul class=\"nav nav-tabs\">
                    {% for name, form_group in associationAdmin.formgroups %}
                        <li class=\"{% if loop.first %}active{% endif %}\">
                            <a
                                href=\"#{{ id }}_{{ loop.parent.loop.index }}_{{ loop.index }}\"
                                data-toggle=\"tab\"
                            >
                                <i class=\"icon-exclamation-sign has-errors hide\"></i>
                                {{ associationAdmin.trans(name, {}, form_group.translation_domain) }}
                            </a>
                        </li>
                    {% endfor %}
                </ul>

                <div class=\"tab-content\">
                    {% for name, form_group in associationAdmin.formgroups %}
                        <div
                            class=\"tab-pane {% if loop.first %}active{% endif %}\"
                            id=\"{{ id }}_{{ loop.parent.loop.index }}_{{ loop.index }}\"
                        >
                            <fieldset>
                                <div class=\"sonata-ba-collapsed-fields\">
                                    {% for field_name in form_group.fields if nested_group_field.children[field_name] is defined %}
                                        {% set nested_field = nested_group_field.children[field_name] %}
                                        <div class=\"sonata-ba-field-{{ id }}-{{ field_name }}\">
                                            {% if associationAdmin.formfielddescriptions[field_name] is defined %}
                                                {{ form_row(nested_field, {
                                                    'inline': 'natural',
                                                    'edit'  : 'inline'
                                                }) }}
                                                {% set dummy = nested_group_field.setrendered %}
                                            {% else %}
                                                {{ form_row(nested_field) }}
                                            {% endif %}
                                        </div>
                                    {% endfor %}
                                </div>
                            </fieldset>
                        </div>
                    {% endfor %}
                </div>
            </div>

            {% if nested_group_field['_delete'] is defined %}
                {{ form_row(nested_group_field['_delete'], {'label': 'action_delete', 'translation_domain': 'SonataAdminBundle'}) }}
            {% endif %}
        </div>
    {% endfor %}
</div>
", "@SonataAdmin/CRUD/Association/edit_one_to_many_inline_tabs.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/CRUD/Association/edit_one_to_many_inline_tabs.html.twig");
    }
}
