<?php

/* @Twig/Exception/logs.html.twig */
class __TwigTemplate_bedbde7d01535fdcbdf16a06994dd17a104aa82587341e0558afd2ea49393af1 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/logs.html.twig"));

        // line 1
        $context["channel_is_defined"] = twig_get_attribute($this->env, $this->source, twig_first($this->env, (isset($context["logs"]) || array_key_exists("logs", $context) ? $context["logs"] : (function () { throw new Twig_Error_Runtime('Variable "logs" does not exist.', 1, $this->source); })())), "channel", array(), "any", true, true);
        // line 2
        echo "<table class=\"logs\" data-filter-level=\"Emergency,Alert,Critical,Error,Warning,Notice,Info,Debug\" data-filters>
    <thead>
        <tr>
            <th data-filter=\"level\">Level</th>
            ";
        // line 6
        if ((isset($context["channel_is_defined"]) || array_key_exists("channel_is_defined", $context) ? $context["channel_is_defined"] : (function () { throw new Twig_Error_Runtime('Variable "channel_is_defined" does not exist.', 6, $this->source); })())) {
            echo "<th data-filter=\"channel\">Channel</th>";
        }
        // line 7
        echo "            <th class=\"full-width\">Message</th>
        </tr>
    </thead>

    <tbody>
    ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) || array_key_exists("logs", $context) ? $context["logs"] : (function () { throw new Twig_Error_Runtime('Variable "logs" does not exist.', 12, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 13
            echo "        ";
            if ((twig_get_attribute($this->env, $this->source, $context["log"], "priority", array()) >= 400)) {
                // line 14
                echo "            ";
                $context["status"] = "error";
                // line 15
                echo "        ";
            } elseif ((twig_get_attribute($this->env, $this->source, $context["log"], "priority", array()) >= 300)) {
                // line 16
                echo "            ";
                $context["status"] = "warning";
                // line 17
                echo "        ";
            } else {
                // line 18
                echo "            ";
                $context["severity"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["log"], "context", array(), "any", false, true), "exception", array(), "any", false, true), "severity", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["log"], "context", array(), "any", false, true), "exception", array(), "any", false, true), "severity", array()), false)) : (false));
                // line 19
                echo "            ";
                $context["status"] = (((((isset($context["severity"]) || array_key_exists("severity", $context) ? $context["severity"] : (function () { throw new Twig_Error_Runtime('Variable "severity" does not exist.', 19, $this->source); })()) === constant("E_DEPRECATED")) || ((isset($context["severity"]) || array_key_exists("severity", $context) ? $context["severity"] : (function () { throw new Twig_Error_Runtime('Variable "severity" does not exist.', 19, $this->source); })()) === constant("E_USER_DEPRECATED")))) ? ("warning") : ("normal"));
                // line 20
                echo "        ";
            }
            // line 21
            echo "        <tr class=\"status-";
            echo twig_escape_filter($this->env, (isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new Twig_Error_Runtime('Variable "status" does not exist.', 21, $this->source); })()), "html", null, true);
            echo "\" data-filter-level=\"";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, $context["log"], "priorityName", array())), "html", null, true);
            echo "\"";
            if ((isset($context["channel_is_defined"]) || array_key_exists("channel_is_defined", $context) ? $context["channel_is_defined"] : (function () { throw new Twig_Error_Runtime('Variable "channel_is_defined" does not exist.', 21, $this->source); })())) {
                echo " data-filter-channel=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["log"], "channel", array()), "html", null, true);
                echo "\"";
            }
            echo ">
            <td class=\"text-small\" nowrap>
                <span class=\"colored text-bold\">";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["log"], "priorityName", array()), "html", null, true);
            echo "</span>
                <span class=\"text-muted newline\">";
            // line 24
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["log"], "timestamp", array()), "H:i:s"), "html", null, true);
            echo "</span>
            </td>
            ";
            // line 26
            if ((isset($context["channel_is_defined"]) || array_key_exists("channel_is_defined", $context) ? $context["channel_is_defined"] : (function () { throw new Twig_Error_Runtime('Variable "channel_is_defined" does not exist.', 26, $this->source); })())) {
                // line 27
                echo "                <td class=\"text-small text-bold nowrap\">
                    ";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["log"], "channel", array()), "html", null, true);
                echo "
                </td>
            ";
            }
            // line 31
            echo "            <td>
                ";
            // line 32
            echo $this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->formatLogMessage(twig_get_attribute($this->env, $this->source, $context["log"], "message", array()), twig_get_attribute($this->env, $this->source, $context["log"], "context", array()));
            echo "
                ";
            // line 33
            if ((((twig_get_attribute($this->env, $this->source, $context["log"], "context", array(), "any", true, true) &&  !(null === twig_get_attribute($this->env, $this->source, $context["log"], "context", array())))) ? (twig_get_attribute($this->env, $this->source, $context["log"], "context", array())) : (false))) {
                // line 34
                echo "                    <pre class=\"text-muted prewrap m-t-5\">";
                echo twig_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, $context["log"], "context", array()), ((twig_constant("JSON_PRETTY_PRINT") | twig_constant("JSON_UNESCAPED_UNICODE")) | twig_constant("JSON_UNESCAPED_SLASHES"))), "html", null, true);
                echo "</pre>
                ";
            }
            // line 36
            echo "            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "    </tbody>
</table>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/logs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 39,  122 => 36,  116 => 34,  114 => 33,  110 => 32,  107 => 31,  101 => 28,  98 => 27,  96 => 26,  91 => 24,  87 => 23,  73 => 21,  70 => 20,  67 => 19,  64 => 18,  61 => 17,  58 => 16,  55 => 15,  52 => 14,  49 => 13,  45 => 12,  38 => 7,  34 => 6,  28 => 2,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% set channel_is_defined = (logs|first).channel is defined %}
<table class=\"logs\" data-filter-level=\"Emergency,Alert,Critical,Error,Warning,Notice,Info,Debug\" data-filters>
    <thead>
        <tr>
            <th data-filter=\"level\">Level</th>
            {% if channel_is_defined %}<th data-filter=\"channel\">Channel</th>{% endif %}
            <th class=\"full-width\">Message</th>
        </tr>
    </thead>

    <tbody>
    {% for log in logs %}
        {% if log.priority >= 400 %}
            {% set status = 'error' %}
        {% elseif log.priority >= 300 %}
            {% set status = 'warning' %}
        {% else %}
            {% set severity = log.context.exception.severity|default(false) %}
            {% set status = severity is constant('E_DEPRECATED') or severity is constant('E_USER_DEPRECATED') ? 'warning' : 'normal' %}
        {% endif %}
        <tr class=\"status-{{ status }}\" data-filter-level=\"{{ log.priorityName|lower }}\"{% if channel_is_defined %} data-filter-channel=\"{{ log.channel }}\"{% endif %}>
            <td class=\"text-small\" nowrap>
                <span class=\"colored text-bold\">{{ log.priorityName }}</span>
                <span class=\"text-muted newline\">{{ log.timestamp|date('H:i:s') }}</span>
            </td>
            {% if channel_is_defined %}
                <td class=\"text-small text-bold nowrap\">
                    {{ log.channel }}
                </td>
            {% endif %}
            <td>
                {{ log.message|format_log_message(log.context) }}
                {% if log.context ?? false %}
                    <pre class=\"text-muted prewrap m-t-5\">{{ log.context|json_encode(constant('JSON_PRETTY_PRINT') b-or constant('JSON_UNESCAPED_UNICODE') b-or constant('JSON_UNESCAPED_SLASHES')) }}</pre>
                {% endif %}
            </td>
        </tr>
    {% endfor %}
    </tbody>
</table>
", "@Twig/Exception/logs.html.twig", "/app/vendor/symfony/twig-bundle/Resources/views/Exception/logs.html.twig");
    }
}
