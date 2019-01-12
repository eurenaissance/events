<?php

/* @Enqueue/Profiler/panel.html.twig */
class __TwigTemplate_c2860cda3ce52062e241a0f65cc11c31ee3492703046d25081202c7e44b8adbf extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@Enqueue/Profiler/panel.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Enqueue/Profiler/panel.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Enqueue/Profiler/panel.html.twig"));

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
        echo "    ";
        if ((twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 4, $this->source); })()), "count", array()) > 0)) {
            // line 5
            echo "        ";
            ob_start();
            // line 6
            echo "            ";
            echo twig_include($this->env, $context, "@Enqueue/Icon/icon.svg");
            echo "
            <span class=\"sf-toolbar-value\">
                ";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 8, $this->source); })()), "count", array()), "html", null, true);
            echo "</span>
        ";
            $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 10
            echo "
        ";
            // line 11
            ob_start();
            // line 12
            echo "            <div class=\"sf-toolbar-info-piece\">
                <b>Sent messages</b>
                <span class=\"sf-toolbar-status\">";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 14, $this->source); })()), "count", array()), "html", null, true);
            echo "</span>
            </div>
        ";
            $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 17
            echo "
        ";
            // line 18
            echo twig_include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", array("link" => true));
            echo "
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 22
    public function block_menu($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 23
        echo "    <span class=\"label ";
        echo (( !twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 23, $this->source); })()), "count", array())) ? ("disabled") : (""));
        echo "\">
        <span class=\"icon\">";
        // line 24
        echo twig_include($this->env, $context, "@Enqueue/Icon/icon.svg");
        echo "</span>
        <strong>Message Queue</strong>
    </span>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 29
    public function block_panel($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 30
        echo "    ";
        if ((twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 30, $this->source); })()), "count", array()) > 0)) {
            // line 31
            echo "    <h2>Sent messages</h2>
        ";
            // line 32
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 32, $this->source); })()), "sentMessages", array()));
            foreach ($context['_seq'] as $context["clientName"] => $context["sentMessages"]) {
                // line 33
                echo "            ";
                if ((twig_length_filter($this->env, $context["sentMessages"]) > 0)) {
                    // line 34
                    echo "                <h3>Client: ";
                    echo twig_escape_filter($this->env, $context["clientName"], "html", null, true);
                    echo "</h3>
                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Topic</th>
                        <th>Command</th>
                        <th>Message</th>
                        <th>Priority</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
                    // line 47
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["sentMessages"]);
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
                    foreach ($context['_seq'] as $context["_key"] => $context["sentMessage"]) {
                        // line 48
                        echo "                        <tr>
                            <td>";
                        // line 49
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 50
                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["sentMessage"], "topic", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["sentMessage"], "topic", array()), null)) : (null)), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 51
                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["sentMessage"], "command", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["sentMessage"], "command", array()), null)) : (null)), "html", null, true);
                        echo "</td>
                            <td style=\"width: 70%\" class=\"metadata\">
                                <span>
                                    ";
                        // line 54
                        $context["body"] = twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 54, $this->source); })()), "ensureString", array(0 => twig_get_attribute($this->env, $this->source, $context["sentMessage"], "body", array())), "method");
                        // line 55
                        echo "                                    ";
                        echo twig_escape_filter($this->env, (((twig_length_filter($this->env, (isset($context["body"]) || array_key_exists("body", $context) ? $context["body"] : (function () { throw new Twig_Error_Runtime('Variable "body" does not exist.', 55, $this->source); })())) > 40)) ? ((twig_slice($this->env, (isset($context["body"]) || array_key_exists("body", $context) ? $context["body"] : (function () { throw new Twig_Error_Runtime('Variable "body" does not exist.', 55, $this->source); })()), 0, 40) . "...")) : ((isset($context["body"]) || array_key_exists("body", $context) ? $context["body"] : (function () { throw new Twig_Error_Runtime('Variable "body" does not exist.', 55, $this->source); })()))), "html", null, true);
                        echo "
                                </span>
                                ";
                        // line 57
                        if ((twig_length_filter($this->env, (isset($context["body"]) || array_key_exists("body", $context) ? $context["body"] : (function () { throw new Twig_Error_Runtime('Variable "body" does not exist.', 57, $this->source); })())) > 40)) {
                            // line 58
                            echo "                                    <a class=\"btn btn-link text-small sf-toggle\"
                                       data-toggle-selector=\"#message-body-";
                            // line 59
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                            echo "\"
                                       data-toggle-alt-content=\"Hide body\"
                                    >Show body</a>
                                    <div id=\"message-body-";
                            // line 62
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                            echo "\"
                                         class=\"context sf-toggle-content sf-toggle-hidden\">
                                        <pre>";
                            // line 64
                            echo twig_escape_filter($this->env, (isset($context["body"]) || array_key_exists("body", $context) ? $context["body"] : (function () { throw new Twig_Error_Runtime('Variable "body" does not exist.', 64, $this->source); })()), "html", null, true);
                            echo "</pre>
                                    </div>
                                ";
                        }
                        // line 67
                        echo "                            <td>
                                <span title=\"";
                        // line 68
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sentMessage"], "priority", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 68, $this->source); })()), "prettyPrintPriority", array(0 => twig_get_attribute($this->env, $this->source, $context["sentMessage"], "priority", array())), "method"), "html", null, true);
                        echo "</span>
                            </td>
                            <td style=\"white-space:nowrap;\">
                                ";
                        // line 71
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sentMessage"], "sentAt", array()), "i:s.v"), "html", null, true);
                        echo "
                            </td>
                        </tr>
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sentMessage'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 75
                    echo "                    </tbody>

                </table>
            ";
                }
                // line 79
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['clientName'], $context['sentMessages'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 80
            echo "    ";
        } else {
            // line 81
            echo "        <div class=\"empty\">
            <p>No messages were sent.</p>
        </div>
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@Enqueue/Profiler/panel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  278 => 81,  275 => 80,  269 => 79,  263 => 75,  245 => 71,  237 => 68,  234 => 67,  228 => 64,  223 => 62,  217 => 59,  214 => 58,  212 => 57,  206 => 55,  204 => 54,  198 => 51,  194 => 50,  190 => 49,  187 => 48,  170 => 47,  153 => 34,  150 => 33,  146 => 32,  143 => 31,  140 => 30,  131 => 29,  117 => 24,  112 => 23,  103 => 22,  90 => 18,  87 => 17,  81 => 14,  77 => 12,  75 => 11,  72 => 10,  67 => 8,  61 => 6,  58 => 5,  55 => 4,  46 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}
    {% if collector.count > 0 %}
        {% set icon %}
            {{ include('@Enqueue/Icon/icon.svg') }}
            <span class=\"sf-toolbar-value\">
                {{ collector.count }}</span>
        {% endset %}

        {% set text %}
            <div class=\"sf-toolbar-info-piece\">
                <b>Sent messages</b>
                <span class=\"sf-toolbar-status\">{{ collector.count }}</span>
            </div>
        {% endset %}

        {{ include('@WebProfiler/Profiler/toolbar_item.html.twig', { 'link': true }) }}
    {% endif %}
{% endblock %}

{% block menu %}
    <span class=\"label {{ not collector.count ? 'disabled' }}\">
        <span class=\"icon\">{{ include('@Enqueue/Icon/icon.svg') }}</span>
        <strong>Message Queue</strong>
    </span>
{% endblock %}

{% block panel %}
    {% if collector.count > 0 %}
    <h2>Sent messages</h2>
        {% for clientName, sentMessages in collector.sentMessages %}
            {% if sentMessages|length > 0 %}
                <h3>Client: {{ clientName }}</h3>
                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Topic</th>
                        <th>Command</th>
                        <th>Message</th>
                        <th>Priority</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    {% for sentMessage in sentMessages %}
                        <tr>
                            <td>{{ loop.index }}</td>
                            <td>{{ sentMessage.topic|default(null) }}</td>
                            <td>{{ sentMessage.command|default(null) }}</td>
                            <td style=\"width: 70%\" class=\"metadata\">
                                <span>
                                    {% set body = collector.ensureString(sentMessage.body) %}
                                    {{ body|length > 40 ? body|slice(0, 40) ~ '...' : body  }}
                                </span>
                                {% if body|length > 40 %}
                                    <a class=\"btn btn-link text-small sf-toggle\"
                                       data-toggle-selector=\"#message-body-{{ loop.index }}\"
                                       data-toggle-alt-content=\"Hide body\"
                                    >Show body</a>
                                    <div id=\"message-body-{{ loop.index }}\"
                                         class=\"context sf-toggle-content sf-toggle-hidden\">
                                        <pre>{{ body }}</pre>
                                    </div>
                                {% endif %}
                            <td>
                                <span title=\"{{ sentMessage.priority }}\">{{ collector.prettyPrintPriority(sentMessage.priority) }}</span>
                            </td>
                            <td style=\"white-space:nowrap;\">
                                {{ sentMessage.sentAt|date('i:s.v') }}
                            </td>
                        </tr>
                    {% endfor %}
                    </tbody>

                </table>
            {% endif %}
        {% endfor %}
    {% else %}
        <div class=\"empty\">
            <p>No messages were sent.</p>
        </div>
    {% endif %}
{% endblock %}
", "@Enqueue/Profiler/panel.html.twig", "/app/vendor/enqueue/enqueue-bundle/Resources/views/Profiler/panel.html.twig");
    }
}
