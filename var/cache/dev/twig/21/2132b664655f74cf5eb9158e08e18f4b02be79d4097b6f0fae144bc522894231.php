<?php

/* @SonataAdmin/Core/add_block.html.twig */
class __TwigTemplate_3559a0621de3d3592c2c27366bcce00a9e6472cc296d388b2b37b18d8296537c extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'user_block' => array($this, 'block_user_block'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/Core/add_block.html.twig"));

        // line 1
        $this->displayBlock('user_block', $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_user_block($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "user_block"));

        // line 2
        echo "    ";
        $context["items_per_column"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 2, $this->source); })()), "adminPool", array()), "getOption", array(0 => "dropdown_number_groups_per_colums"), "method");
        // line 3
        echo "    ";
        $context["groups"] = array();
        // line 4
        echo "
    ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 5, $this->source); })()), "adminPool", array()), "dashboardgroups", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 6
            echo "        ";
            $context["display_group"] = false;
            // line 7
            echo "
        ";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["group"], "items", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["admin"]) {
                if (((isset($context["display_group"]) || array_key_exists("display_group", $context) ? $context["display_group"] : (function () { throw new Twig_Error_Runtime('Variable "display_group" does not exist.', 8, $this->source); })()) == false)) {
                    // line 9
                    echo "            ";
                    if ((twig_get_attribute($this->env, $this->source, $context["admin"], "hasRoute", array(0 => "create"), "method") && twig_get_attribute($this->env, $this->source, $context["admin"], "hasAccess", array(0 => "create"), "method"))) {
                        // line 10
                        echo "                ";
                        $context["display_group"] = true;
                        // line 11
                        echo "                ";
                        $context["groups"] = twig_array_merge(array(0 => $context["group"]), (isset($context["groups"]) || array_key_exists("groups", $context) ? $context["groups"] : (function () { throw new Twig_Error_Runtime('Variable "groups" does not exist.', 11, $this->source); })()));
                        // line 12
                        echo "            ";
                    }
                    // line 13
                    echo "        ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['admin'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "
    ";
        // line 16
        $context["column_count"] = twig_round((twig_length_filter($this->env, (isset($context["groups"]) || array_key_exists("groups", $context) ? $context["groups"] : (function () { throw new Twig_Error_Runtime('Variable "groups" does not exist.', 16, $this->source); })())) / (isset($context["items_per_column"]) || array_key_exists("items_per_column", $context) ? $context["items_per_column"] : (function () { throw new Twig_Error_Runtime('Variable "items_per_column" does not exist.', 16, $this->source); })())), 0, "ceil");
        // line 17
        echo "
    <div class=\"dropdown-menu multi-column dropdown-add\"
        ";
        // line 19
        if (((isset($context["column_count"]) || array_key_exists("column_count", $context) ? $context["column_count"] : (function () { throw new Twig_Error_Runtime('Variable "column_count" does not exist.', 19, $this->source); })()) > 1)) {
            echo "style=\"width: ";
            echo twig_escape_filter($this->env, ((isset($context["column_count"]) || array_key_exists("column_count", $context) ? $context["column_count"] : (function () { throw new Twig_Error_Runtime('Variable "column_count" does not exist.', 19, $this->source); })()) * 140), "html", null, true);
            echo "px;\"";
        }
        // line 20
        echo "            >
        ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, (isset($context["groups"]) || array_key_exists("groups", $context) ? $context["groups"] : (function () { throw new Twig_Error_Runtime('Variable "groups" does not exist.', 21, $this->source); })())));
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
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 22
            echo "            ";
            $context["display"] = (twig_test_empty(twig_get_attribute($this->env, $this->source, $context["group"], "roles", array())) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 22, $this->source); })()), "adminPool", array()), "getOption", array(0 => "role_admin"), "method")));
            // line 23
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["group"], "roles", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                if ( !(isset($context["display"]) || array_key_exists("display", $context) ? $context["display"] : (function () { throw new Twig_Error_Runtime('Variable "display" does not exist.', 23, $this->source); })())) {
                    // line 24
                    echo "                ";
                    $context["display"] = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted($context["role"]);
                    // line 25
                    echo "            ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "
            ";
            // line 27
            if ((isset($context["display"]) || array_key_exists("display", $context) ? $context["display"] : (function () { throw new Twig_Error_Runtime('Variable "display" does not exist.', 27, $this->source); })())) {
                // line 28
                echo "
                ";
                // line 29
                if ((twig_get_attribute($this->env, $this->source, $context["loop"], "first", array()) || ((twig_get_attribute($this->env, $this->source, $context["loop"], "index0", array()) % (isset($context["items_per_column"]) || array_key_exists("items_per_column", $context) ? $context["items_per_column"] : (function () { throw new Twig_Error_Runtime('Variable "items_per_column" does not exist.', 29, $this->source); })())) == 0))) {
                    // line 30
                    echo "                    ";
                    if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", array())) {
                        // line 31
                        echo "                        <div class=\"container-fluid\">
                            <div class=\"row\">
                    ";
                    } else {
                        // line 34
                        echo "                        </ul>
                    ";
                    }
                    // line 36
                    echo "
                    <ul class=\"dropdown-menu";
                    // line 37
                    if (((isset($context["column_count"]) || array_key_exists("column_count", $context) ? $context["column_count"] : (function () { throw new Twig_Error_Runtime('Variable "column_count" does not exist.', 37, $this->source); })()) > 1)) {
                        echo " col-md-";
                        echo twig_escape_filter($this->env, twig_round((12 / (isset($context["column_count"]) || array_key_exists("column_count", $context) ? $context["column_count"] : (function () { throw new Twig_Error_Runtime('Variable "column_count" does not exist.', 37, $this->source); })()))), "html", null, true);
                    }
                    echo "\">
                ";
                }
                // line 39
                echo "
                ";
                // line 40
                if (((twig_get_attribute($this->env, $this->source, $context["loop"], "index0", array()) % (isset($context["items_per_column"]) || array_key_exists("items_per_column", $context) ? $context["items_per_column"] : (function () { throw new Twig_Error_Runtime('Variable "items_per_column" does not exist.', 40, $this->source); })())) != 0)) {
                    // line 41
                    echo "                    <li role=\"presentation\" class=\"divider\"></li>
                ";
                }
                // line 43
                echo "                <li role=\"presentation\" class=\"dropdown-header\">
                    ";
                // line 44
                echo twig_get_attribute($this->env, $this->source, $context["group"], "icon", array());
                echo "
                    ";
                // line 45
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["group"], "label", array()), array(), twig_get_attribute($this->env, $this->source, $context["group"], "label_catalogue", array())), "html", null, true);
                echo "
                </li>

                ";
                // line 48
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["group"], "items", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["admin"]) {
                    // line 49
                    echo "                    ";
                    if ((twig_get_attribute($this->env, $this->source, $context["admin"], "hasRoute", array(0 => "create"), "method") && twig_get_attribute($this->env, $this->source, $context["admin"], "hasAccess", array(0 => "create"), "method"))) {
                        // line 50
                        echo "                        ";
                        if (twig_test_empty(twig_get_attribute($this->env, $this->source, $context["admin"], "subClasses", array()))) {
                            // line 51
                            echo "                            <li role=\"presentation\">
                                <a role=\"menuitem\" tabindex=\"-1\" href=\"";
                            // line 52
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["admin"], "generateUrl", array(0 => "create"), "method"), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["admin"], "label", array()), array(), twig_get_attribute($this->env, $this->source, $context["admin"], "translationdomain", array())), "html", null, true);
                            echo "</a>
                            </li>
                        ";
                        } else {
                            // line 55
                            echo "                            ";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(twig_get_array_keys_filter(twig_get_attribute($this->env, $this->source, $context["admin"], "subclasses", array())));
                            foreach ($context['_seq'] as $context["_key"] => $context["subclass"]) {
                                // line 56
                                echo "                                <li role=\"presentation\">
                                    <a role=\"menuitem\" tabindex=\"-1\" href=\"";
                                // line 57
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["admin"], "generateUrl", array(0 => "create", 1 => array("subclass" => $context["subclass"])), "method"), "html", null, true);
                                echo "\">";
                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans($context["subclass"], array(), twig_get_attribute($this->env, $this->source, $context["admin"], "translationdomain", array())), "html", null, true);
                                echo "</a>
                                </li>
                            ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subclass'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 60
                            echo "                        ";
                        }
                        // line 61
                        echo "                    ";
                    }
                    // line 62
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['admin'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 63
                echo "
                ";
                // line 64
                if (twig_get_attribute($this->env, $this->source, $context["loop"], "last", array())) {
                    // line 65
                    echo "                            </ul>
                        </div>
                    </div>
                ";
                }
                // line 69
                echo "
            ";
            }
            // line 71
            echo "        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SonataAdmin/Core/add_block.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  278 => 72,  264 => 71,  260 => 69,  254 => 65,  252 => 64,  249 => 63,  243 => 62,  240 => 61,  237 => 60,  226 => 57,  223 => 56,  218 => 55,  210 => 52,  207 => 51,  204 => 50,  201 => 49,  197 => 48,  191 => 45,  187 => 44,  184 => 43,  180 => 41,  178 => 40,  175 => 39,  167 => 37,  164 => 36,  160 => 34,  155 => 31,  152 => 30,  150 => 29,  147 => 28,  145 => 27,  142 => 26,  135 => 25,  132 => 24,  126 => 23,  123 => 22,  106 => 21,  103 => 20,  97 => 19,  93 => 17,  91 => 16,  88 => 15,  82 => 14,  75 => 13,  72 => 12,  69 => 11,  66 => 10,  63 => 9,  58 => 8,  55 => 7,  52 => 6,  48 => 5,  45 => 4,  42 => 3,  39 => 2,  27 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% block user_block %}
    {% set items_per_column = sonata_admin.adminPool.getOption('dropdown_number_groups_per_colums') %}
    {% set groups = [] %}

    {% for group in sonata_admin.adminPool.dashboardgroups %}
        {% set display_group = false %}

        {% for admin in group.items if display_group == false %}
            {% if admin.hasRoute('create') and admin.hasAccess('create') %}
                {% set display_group = true %}
                {% set groups = [group]|merge(groups) %}
            {% endif %}
        {% endfor %}
    {% endfor %}

    {% set column_count = (groups|length / items_per_column)|round(0, 'ceil') %}

    <div class=\"dropdown-menu multi-column dropdown-add\"
        {% if column_count > 1 %}style=\"width: {{ column_count*140 }}px;\"{% endif %}
            >
        {% for group in groups|reverse %}
            {% set display = (group.roles is empty or is_granted(sonata_admin.adminPool.getOption('role_admin')) ) %}
            {% for role in group.roles if not display %}
                {% set display = is_granted(role) %}
            {% endfor %}

            {% if display %}

                {% if loop.first or loop.index0 % items_per_column == 0 %}
                    {% if loop.first %}
                        <div class=\"container-fluid\">
                            <div class=\"row\">
                    {% else %}
                        </ul>
                    {% endif %}

                    <ul class=\"dropdown-menu{% if column_count > 1 %} col-md-{{ (12/column_count)|round }}{% endif %}\">
                {% endif %}

                {% if loop.index0 % items_per_column != 0 %}
                    <li role=\"presentation\" class=\"divider\"></li>
                {% endif %}
                <li role=\"presentation\" class=\"dropdown-header\">
                    {{ group.icon|raw }}
                    {{ group.label|trans({}, group.label_catalogue) }}
                </li>

                {% for admin in group.items %}
                    {% if admin.hasRoute('create') and admin.hasAccess('create') %}
                        {% if admin.subClasses is empty %}
                            <li role=\"presentation\">
                                <a role=\"menuitem\" tabindex=\"-1\" href=\"{{ admin.generateUrl('create')}}\">{{ admin.label|trans({}, admin.translationdomain) }}</a>
                            </li>
                        {% else %}
                            {% for subclass in admin.subclasses|keys %}
                                <li role=\"presentation\">
                                    <a role=\"menuitem\" tabindex=\"-1\" href=\"{{ admin.generateUrl('create', {'subclass': subclass}) }}\">{{ subclass|trans({}, admin.translationdomain) }}</a>
                                </li>
                            {% endfor %}
                        {% endif %}
                    {% endif %}
                {% endfor %}

                {% if loop.last %}
                            </ul>
                        </div>
                    </div>
                {% endif %}

            {% endif %}
        {% endfor %}
    </div>
{% endblock %}
", "@SonataAdmin/Core/add_block.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/Core/add_block.html.twig");
    }
}
