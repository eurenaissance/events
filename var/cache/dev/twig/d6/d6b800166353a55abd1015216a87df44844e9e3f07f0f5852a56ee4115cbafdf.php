<?php

/* @SonataBlock/Profiler/block.html.twig */
class __TwigTemplate_de3486ae4e71d31beee718f515c0087630c772cdad39aeaded1e1879f21263bd extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@SonataBlock/Profiler/block.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
            'table' => array($this, 'block_table'),
            'table_v2' => array($this, 'block_table_v2'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataBlock/Profiler/block.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataBlock/Profiler/block.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        // line 4
        echo "    <div class=\"sf-toolbar-block\">
        <a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler", array("token" => (isset($context["token"]) || array_key_exists("token", $context) ? $context["token"] : (function () { throw new Twig_Error_Runtime('Variable "token" does not exist.', 5, $this->source); })()), "panel" => (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new Twig_Error_Runtime('Variable "name" does not exist.', 5, $this->source); })()))), "html", null, true);
        echo "\">
            <div class=\"sf-toolbar-icon\">
                ";
        // line 7
        echo twig_include($this->env, $context, "@SonataBlock/Profiler/icon.svg");
        echo "
                <span class=\"sf-toolbar-value\">";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 8, $this->source); })()), "getTotalBlock", array(), "method"), "html", null, true);
        echo "</span>
            </div>
        </a>

        <div class=\"sf-toolbar-info\">
            <div class=\"sf-toolbar-info-piece\">
                <b>Real Blocks</b>
                <span>";
        // line 15
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 15, $this->source); })()), "realBlocks", array())), "html", null, true);
        echo "</span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Containers</b>
                <span>";
        // line 19
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 19, $this->source); })()), "containers", array())), "html", null, true);
        echo "</span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Events</b>
                <span>";
        // line 23
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 23, $this->source); })()), "events", array())), "html", null, true);
        echo "</span>
            </div>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 29
    public function block_menu($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 30
        echo "    <span class=\"label\">
        <span class=\"icon\">
            ";
        // line 32
        echo twig_include($this->env, $context, "@SonataBlock/Profiler/icon.svg");
        echo "
        </span>
        <strong>Blocks";
        // line 34
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 34, $this->source); })()), "events", array())) > 0)) {
            echo "<strong>*</strong>";
        }
        echo "</strong>
        <span class=\"count\">
            <span>";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 36, $this->source); })()), "getTotalBlock", array(), "method"), "html", null, true);
        echo "</span>
        </span>
    </span>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 41
    public function block_panel($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 42
        echo "    <h2>Events Blocks</h2>
    <table>
        <tr>
            <th>code name</th>
            <th>listener tag</th>
            <th>Block types</th>
            <th>Listeners</th>
        </tr>

        ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 51, $this->source); })()), "events", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 52
            echo "            <tr>
                <td>";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "template_code", array(), "array"), "html", null, true);
            echo "</td>
                <td>";
            // line 54
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "event_name", array(), "array"), "html", null, true);
            echo "</td>
                <td>
                    ";
            // line 56
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["event"], "blocks", array(), "array"));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
                // line 57
                echo "                        ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["type"], 1, array()), "html", null, true);
                echo " (id:";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["type"], 0, array()), "html", null, true);
                echo ")
                    ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 59
                echo "                        no block returned
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "                </td>
                <td>
                    ";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["event"], "listeners", array(), "array"));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["listener"]) {
                // line 64
                echo "                        ";
                echo twig_escape_filter($this->env, $context["listener"], "html", null, true);
                echo "
                    ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 66
                echo "                        no listener registered
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listener'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "    </table>

    <h2>Real Blocks</h2>
    ";
        // line 74
        $context["blocks"] = twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 74, $this->source); })()), "realBlocks", array());
        // line 75
        echo "    <div class=\"tab-content\">
        ";
        // line 76
        $this->displayBlock("table_v2", $context, $blocks);
        echo "
    </div>

    <h2>Containers Blocks</h2>
    ";
        // line 80
        $context["blocks"] = twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 80, $this->source); })()), "containers", array());
        // line 81
        echo "    <div class=\"tab-content\">
        ";
        // line 82
        $this->displayBlock("table_v2", $context, $blocks);
        echo "
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 86
    public function block_table($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "table"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "table"));

        // line 87
        echo "    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Type</th>
            <th>Mem. (diff)</th>
            <th>Mem. (peak)</th>
            <th>Duration</th>
        </tr>
        ";
        // line 96
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["blocks"]) || array_key_exists("blocks", $context) ? $context["blocks"] : (function () { throw new Twig_Error_Runtime('Variable "blocks" does not exist.', 96, $this->source); })()));
        foreach ($context['_seq'] as $context["id"] => $context["block"]) {
            // line 97
            echo "
            ";
            // line 98
            $context["rowspan"] = 1;
            // line 99
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "handler", array())) {
                // line 100
                echo "                ";
                $context["rowspan"] = ((isset($context["rowspan"]) || array_key_exists("rowspan", $context) ? $context["rowspan"] : (function () { throw new Twig_Error_Runtime('Variable "rowspan" does not exist.', 100, $this->source); })()) + 1);
                // line 101
                echo "            ";
            }
            // line 102
            echo "
            ";
            // line 103
            if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "assets", array()), "js", array())) > 0) || (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "assets", array()), "css", array())) > 0))) {
                // line 104
                echo "                ";
                $context["rowspan"] = ((isset($context["rowspan"]) || array_key_exists("rowspan", $context) ? $context["rowspan"] : (function () { throw new Twig_Error_Runtime('Variable "rowspan" does not exist.', 104, $this->source); })()) + 1);
                // line 105
                echo "            ";
            }
            // line 106
            echo "            <tr>
                <th style=\"vertical-align: top\" rowspan=\"";
            // line 107
            echo twig_escape_filter($this->env, (isset($context["rowspan"]) || array_key_exists("rowspan", $context) ? $context["rowspan"] : (function () { throw new Twig_Error_Runtime('Variable "rowspan" does not exist.', 107, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "</th>
                <td>";
            // line 108
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "name", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 109
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "type", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 110
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["block"], "memory_end", array()) - twig_get_attribute($this->env, $this->source, $context["block"], "memory_start", array())) / 1000), 0), "html", null, true);
            echo " Kb</td>
                <td>";
            // line 111
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["block"], "memory_peak", array()) / 1000), 0), "html", null, true);
            echo " Kb</td>
                <td>";
            // line 112
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "duration", array()), 2), "html", null, true);
            echo " ms</td>
            </tr>

            ";
            // line 115
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "handler", array())) {
                // line 116
                echo "                <tr style=\"vertical-align: top\">
                    <td colspan=\"3\">
                        Cache Keys: <pre>";
                // line 118
                echo twig_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "keys", array())), "html", null, true);
                echo "</pre> <br />
                        Contextual Keys: <pre>";
                // line 119
                echo twig_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "contextual_keys", array())), "html", null, true);
                echo "</pre>
                    </td>
                    <td colspan=\"2\">
                        TTL: ";
                // line 122
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "ttl", array()), "html", null, true);
                echo "s. <br />
                        Lifetime: ";
                // line 123
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "lifetime", array()), "html", null, true);
                echo "s. <br />
                        Backend: ";
                // line 124
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "handler", array()), "html", null, true);
                echo " <br />
                        Loading from cache: ";
                // line 125
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "from_cache", array())) {
                    echo "YES";
                } else {
                    echo "NO";
                }
                echo " <br />
                    </td>
                </tr>
            ";
            }
            // line 129
            echo "
            ";
            // line 130
            if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "assets", array()), "js", array())) > 0) || (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "assets", array()), "css", array())) > 0))) {
                // line 131
                echo "                <tr>
                    <td colspan=\"5\">
                        Javascripts: <pre>";
                // line 133
                echo twig_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "assets", array()), "js", array())), "html", null, true);
                echo "</pre><br />
                        Stylesheets: <pre>";
                // line 134
                echo twig_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "assets", array()), "css", array())), "html", null, true);
                echo "</pre>
                    </td>
                </tr>
            ";
            }
            // line 138
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 140
        echo "    </table>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 143
    public function block_table_v2($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "table_v2"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "table_v2"));

        // line 144
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["blocks"]) || array_key_exists("blocks", $context) ? $context["blocks"] : (function () { throw new Twig_Error_Runtime('Variable "blocks" does not exist.', 144, $this->source); })()));
        foreach ($context['_seq'] as $context["id"] => $context["block"]) {
            // line 145
            echo "        <table>
            <thead>
            <tr>
                <th colspan=\"2\">Block ";
            // line 148
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>Name</th>
                <td>";
            // line 154
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "name", array()), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <th>Type</th>
                <td>";
            // line 158
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "type", array()), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <th>Mem. diff / Mem. peak / Duration</th>
                <td>";
            // line 162
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["block"], "memory_end", array()) - twig_get_attribute($this->env, $this->source, $context["block"], "memory_start", array())) / 1000), 0), "html", null, true);
            echo " Kb / ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["block"], "memory_peak", array()) / 1000), 0), "html", null, true);
            echo " Kb / ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "duration", array()), 2), "html", null, true);
            echo " ms</td>
            </tr>

            ";
            // line 165
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "handler", array())) {
                // line 166
                echo "                <tr>
                    <th>Cache backend</th>
                    <td>
                        ";
                // line 169
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "handler", array()), "html", null, true);
                echo " - Loading from cache: ";
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "from_cache", array())) {
                    echo "YES";
                } else {
                    echo "NO";
                }
                // line 170
                echo "                    </td>
                </tr>
                <tr>
                    <th>Cache TTL / Lifetime</th>
                    <td>
                        ";
                // line 175
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "ttl", array()), "html", null, true);
                echo "s. / ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "lifetime", array()), "html", null, true);
                echo "s
                    </td>
                </tr>
                <tr>
                    <th>
                        Cache Informations
                    </th>
                    <td>
                        Cache Keys: <pre>";
                // line 183
                echo twig_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "keys", array())), "html", null, true);
                echo "</pre> <br />
                        Contextual Keys: <pre>";
                // line 184
                echo twig_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "cache", array()), "contextual_keys", array())), "html", null, true);
                echo "</pre> <br />
                    </td>
                </tr>
            ";
            }
            // line 188
            echo "
            ";
            // line 189
            if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "assets", array()), "js", array())) > 0) || (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "assets", array()), "css", array())) > 0))) {
                // line 190
                echo "                <tr>
                    <th>Assets</th>
                    <td>
                        Javascripts: <pre>";
                // line 193
                echo twig_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "assets", array()), "js", array())), "html", null, true);
                echo "</pre><br />
                        Stylesheets: <pre>";
                // line 194
                echo twig_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "assets", array()), "css", array())), "html", null, true);
                echo "</pre>
                    </td>
                </tr>
            ";
            }
            // line 198
            echo "            </tbody>
        </table>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SonataBlock/Profiler/block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  548 => 198,  541 => 194,  537 => 193,  532 => 190,  530 => 189,  527 => 188,  520 => 184,  516 => 183,  503 => 175,  496 => 170,  488 => 169,  483 => 166,  481 => 165,  471 => 162,  464 => 158,  457 => 154,  448 => 148,  443 => 145,  438 => 144,  429 => 143,  418 => 140,  411 => 138,  404 => 134,  400 => 133,  396 => 131,  394 => 130,  391 => 129,  380 => 125,  376 => 124,  372 => 123,  368 => 122,  362 => 119,  358 => 118,  354 => 116,  352 => 115,  346 => 112,  342 => 111,  338 => 110,  334 => 109,  330 => 108,  324 => 107,  321 => 106,  318 => 105,  315 => 104,  313 => 103,  310 => 102,  307 => 101,  304 => 100,  301 => 99,  299 => 98,  296 => 97,  292 => 96,  281 => 87,  272 => 86,  259 => 82,  256 => 81,  254 => 80,  247 => 76,  244 => 75,  242 => 74,  237 => 71,  229 => 68,  222 => 66,  214 => 64,  209 => 63,  205 => 61,  198 => 59,  188 => 57,  183 => 56,  178 => 54,  174 => 53,  171 => 52,  167 => 51,  156 => 42,  147 => 41,  133 => 36,  126 => 34,  121 => 32,  117 => 30,  108 => 29,  93 => 23,  86 => 19,  79 => 15,  69 => 8,  65 => 7,  60 => 5,  57 => 4,  48 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}
    <div class=\"sf-toolbar-block\">
        <a href=\"{{ path('_profiler', { 'token': token, 'panel': name }) }}\">
            <div class=\"sf-toolbar-icon\">
                {{ include('@SonataBlock/Profiler/icon.svg') }}
                <span class=\"sf-toolbar-value\">{{ collector.getTotalBlock() }}</span>
            </div>
        </a>

        <div class=\"sf-toolbar-info\">
            <div class=\"sf-toolbar-info-piece\">
                <b>Real Blocks</b>
                <span>{{ collector.realBlocks|length }}</span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Containers</b>
                <span>{{ collector.containers|length }}</span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Events</b>
                <span>{{ collector.events|length }}</span>
            </div>
        </div>
    </div>
{% endblock %}

{% block menu %}
    <span class=\"label\">
        <span class=\"icon\">
            {{ include('@SonataBlock/Profiler/icon.svg') }}
        </span>
        <strong>Blocks{% if collector.events|length > 0 %}<strong>*</strong>{% endif %}</strong>
        <span class=\"count\">
            <span>{{ collector.getTotalBlock() }}</span>
        </span>
    </span>
{% endblock %}

{% block panel %}
    <h2>Events Blocks</h2>
    <table>
        <tr>
            <th>code name</th>
            <th>listener tag</th>
            <th>Block types</th>
            <th>Listeners</th>
        </tr>

        {% for event in collector.events %}
            <tr>
                <td>{{ event['template_code'] }}</td>
                <td>{{ event['event_name'] }}</td>
                <td>
                    {% for type in event['blocks'] %}
                        {{ type.1 }} (id:{{ type.0 }})
                    {% else %}
                        no block returned
                    {% endfor %}
                </td>
                <td>
                    {% for listener in event['listeners'] %}
                        {{ listener }}
                    {% else %}
                        no listener registered
                    {% endfor %}
                </td>
            </tr>
        {% endfor %}
    </table>

    <h2>Real Blocks</h2>
    {% set blocks = collector.realBlocks %}
    <div class=\"tab-content\">
        {{ block('table_v2') }}
    </div>

    <h2>Containers Blocks</h2>
    {% set blocks = collector.containers %}
    <div class=\"tab-content\">
        {{ block('table_v2') }}
    </div>
{% endblock %}

{% block table %}
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Type</th>
            <th>Mem. (diff)</th>
            <th>Mem. (peak)</th>
            <th>Duration</th>
        </tr>
        {% for id, block in blocks %}

            {% set rowspan = 1 %}
            {% if block.cache.handler %}
                {% set rowspan = rowspan + 1 %}
            {% endif %}

            {% if block.assets.js|length > 0 or block.assets.css|length > 0 %}
                {% set rowspan = rowspan + 1 %}
            {% endif %}
            <tr>
                <th style=\"vertical-align: top\" rowspan=\"{{ rowspan }}\">{{ id }}</th>
                <td>{{ block.name }}</td>
                <td>{{ block.type }}</td>
                <td>{{ ((block.memory_end-block.memory_start)/1000)|number_format(0) }} Kb</td>
                <td>{{ (block.memory_peak/1000)|number_format(0) }} Kb</td>
                <td>{{ block.duration|number_format(2) }} ms</td>
            </tr>

            {% if block.cache.handler %}
                <tr style=\"vertical-align: top\">
                    <td colspan=\"3\">
                        Cache Keys: <pre>{{ block.cache.keys|json_encode() }}</pre> <br />
                        Contextual Keys: <pre>{{ block.cache.contextual_keys|json_encode() }}</pre>
                    </td>
                    <td colspan=\"2\">
                        TTL: {{ block.cache.ttl }}s. <br />
                        Lifetime: {{ block.cache.lifetime }}s. <br />
                        Backend: {{ block.cache.handler }} <br />
                        Loading from cache: {% if block.cache.from_cache %}YES{% else %}NO{% endif %} <br />
                    </td>
                </tr>
            {% endif %}

            {% if block.assets.js|length > 0 or block.assets.css|length > 0  %}
                <tr>
                    <td colspan=\"5\">
                        Javascripts: <pre>{{ block.assets.js|json_encode() }}</pre><br />
                        Stylesheets: <pre>{{ block.assets.css|json_encode() }}</pre>
                    </td>
                </tr>
            {% endif %}

        {% endfor %}
    </table>
{% endblock %}

{% block table_v2 %}
    {% for id, block in blocks %}
        <table>
            <thead>
            <tr>
                <th colspan=\"2\">Block {{ id }}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>Name</th>
                <td>{{ block.name }}</td>
            </tr>
            <tr>
                <th>Type</th>
                <td>{{ block.type }}</td>
            </tr>
            <tr>
                <th>Mem. diff / Mem. peak / Duration</th>
                <td>{{ ((block.memory_end-block.memory_start)/1000)|number_format(0) }} Kb / {{ (block.memory_peak/1000)|number_format(0) }} Kb / {{ block.duration|number_format(2) }} ms</td>
            </tr>

            {% if block.cache.handler %}
                <tr>
                    <th>Cache backend</th>
                    <td>
                        {{ block.cache.handler }} - Loading from cache: {% if block.cache.from_cache %}YES{% else %}NO{% endif %}
                    </td>
                </tr>
                <tr>
                    <th>Cache TTL / Lifetime</th>
                    <td>
                        {{ block.cache.ttl }}s. / {{ block.cache.lifetime }}s
                    </td>
                </tr>
                <tr>
                    <th>
                        Cache Informations
                    </th>
                    <td>
                        Cache Keys: <pre>{{ block.cache.keys|json_encode() }}</pre> <br />
                        Contextual Keys: <pre>{{ block.cache.contextual_keys|json_encode() }}</pre> <br />
                    </td>
                </tr>
            {% endif %}

            {% if block.assets.js|length > 0 or block.assets.css|length > 0  %}
                <tr>
                    <th>Assets</th>
                    <td>
                        Javascripts: <pre>{{ block.assets.js|json_encode() }}</pre><br />
                        Stylesheets: <pre>{{ block.assets.css|json_encode() }}</pre>
                    </td>
                </tr>
            {% endif %}
            </tbody>
        </table>
    {% endfor %}
{% endblock %}
", "@SonataBlock/Profiler/block.html.twig", "/app/vendor/sonata-project/block-bundle/src/Resources/views/Profiler/block.html.twig");
    }
}
