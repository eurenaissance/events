<?php

/* @SonataDatagrid/Search/pager.html.twig */
class __TwigTemplate_7db1a09c3ff081dd10bb2ca7e58a04fdec830967439e2e1ecb90b011171e7cb8 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'pager_links' => array($this, 'block_pager_links'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataDatagrid/Search/pager.html.twig"));

        // line 11
        echo "
";
        // line 12
        $this->displayBlock('pager_links', $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_pager_links($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pager_links"));

        // line 13
        echo "    <ul class=\"pagination";
        if ((isset($context["pager_class"]) || array_key_exists("pager_class", $context))) {
            echo " ";
            echo twig_escape_filter($this->env, (isset($context["pager_class"]) || array_key_exists("pager_class", $context) ? $context["pager_class"] : (function () { throw new Twig_Error_Runtime('Variable "pager_class" does not exist.', 13, $this->source); })()), "html", null, true);
        }
        echo "\">
        ";
        // line 14
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["datagrid"]) || array_key_exists("datagrid", $context) ? $context["datagrid"] : (function () { throw new Twig_Error_Runtime('Variable "datagrid" does not exist.', 14, $this->source); })()), "pager", array()), "page", array()) > 2)) {
            // line 15
            echo "            <li><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 15, $this->source); })()), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), twig_array_merge(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 15, $this->source); })()), "request", array()), "query", array()), "all", array()), array("page" => 1))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("link_first_pager", array(), "SonataDatagridBundle"), "html", null, true);
            echo "\">&laquo;</a></li>
        ";
        }
        // line 17
        echo "
        ";
        // line 18
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["datagrid"]) || array_key_exists("datagrid", $context) ? $context["datagrid"] : (function () { throw new Twig_Error_Runtime('Variable "datagrid" does not exist.', 18, $this->source); })()), "pager", array()), "page", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["datagrid"]) || array_key_exists("datagrid", $context) ? $context["datagrid"] : (function () { throw new Twig_Error_Runtime('Variable "datagrid" does not exist.', 18, $this->source); })()), "pager", array()), "previouspage", array()))) {
            // line 19
            echo "            <li><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 19, $this->source); })()), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), twig_array_merge(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 19, $this->source); })()), "request", array()), "query", array()), "all", array()), array("page" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["datagrid"]) || array_key_exists("datagrid", $context) ? $context["datagrid"] : (function () { throw new Twig_Error_Runtime('Variable "datagrid" does not exist.', 19, $this->source); })()), "pager", array()), "previouspage", array())))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("link_previous_pager", array(), "SonataDatagridBundle"), "html", null, true);
            echo "\">&lsaquo;</a></li>
        ";
        }
        // line 21
        echo "
        ";
        // line 23
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["datagrid"]) || array_key_exists("datagrid", $context) ? $context["datagrid"] : (function () { throw new Twig_Error_Runtime('Variable "datagrid" does not exist.', 23, $this->source); })()), "pager", array()), "getLinks", array(0 => 5), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 24
            echo "            ";
            if (($context["page"] == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["datagrid"]) || array_key_exists("datagrid", $context) ? $context["datagrid"] : (function () { throw new Twig_Error_Runtime('Variable "datagrid" does not exist.', 24, $this->source); })()), "pager", array()), "page", array()))) {
                // line 25
                echo "                <li class=\"active\"><a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 25, $this->source); })()), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), twig_array_merge(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 25, $this->source); })()), "request", array()), "query", array()), "all", array()), array("page" => $context["page"]))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                echo "</a></li>
            ";
            } else {
                // line 27
                echo "                <li><a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 27, $this->source); })()), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), twig_array_merge(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 27, $this->source); })()), "request", array()), "query", array()), "all", array()), array("page" => $context["page"]))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                echo "</a></li>
            ";
            }
            // line 29
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "
        ";
        // line 31
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["datagrid"]) || array_key_exists("datagrid", $context) ? $context["datagrid"] : (function () { throw new Twig_Error_Runtime('Variable "datagrid" does not exist.', 31, $this->source); })()), "pager", array()), "page", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["datagrid"]) || array_key_exists("datagrid", $context) ? $context["datagrid"] : (function () { throw new Twig_Error_Runtime('Variable "datagrid" does not exist.', 31, $this->source); })()), "pager", array()), "nextpage", array()))) {
            // line 32
            echo "            <li><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 32, $this->source); })()), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), twig_array_merge(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 32, $this->source); })()), "request", array()), "query", array()), "all", array()), array("page" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["datagrid"]) || array_key_exists("datagrid", $context) ? $context["datagrid"] : (function () { throw new Twig_Error_Runtime('Variable "datagrid" does not exist.', 32, $this->source); })()), "pager", array()), "nextpage", array())))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("link_next_pager", array(), "SonataDatagridBundle"), "html", null, true);
            echo "\">&rsaquo;</a></li>
        ";
        }
        // line 34
        echo "
        ";
        // line 35
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["datagrid"]) || array_key_exists("datagrid", $context) ? $context["datagrid"] : (function () { throw new Twig_Error_Runtime('Variable "datagrid" does not exist.', 35, $this->source); })()), "pager", array()), "page", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["datagrid"]) || array_key_exists("datagrid", $context) ? $context["datagrid"] : (function () { throw new Twig_Error_Runtime('Variable "datagrid" does not exist.', 35, $this->source); })()), "pager", array()), "lastpage", array())) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["datagrid"]) || array_key_exists("datagrid", $context) ? $context["datagrid"] : (function () { throw new Twig_Error_Runtime('Variable "datagrid" does not exist.', 35, $this->source); })()), "pager", array()), "lastpage", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["datagrid"]) || array_key_exists("datagrid", $context) ? $context["datagrid"] : (function () { throw new Twig_Error_Runtime('Variable "datagrid" does not exist.', 35, $this->source); })()), "pager", array()), "nextpage", array())))) {
            // line 36
            echo "            <li><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 36, $this->source); })()), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), twig_array_merge(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 36, $this->source); })()), "request", array()), "query", array()), "all", array()), array("page" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["datagrid"]) || array_key_exists("datagrid", $context) ? $context["datagrid"] : (function () { throw new Twig_Error_Runtime('Variable "datagrid" does not exist.', 36, $this->source); })()), "pager", array()), "lastpage", array())))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("link_last_pager", array(), "SonataDatagridBundle"), "html", null, true);
            echo "\">&raquo;</a></li>
        ";
        }
        // line 38
        echo "    </ul>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SonataDatagrid/Search/pager.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  132 => 38,  124 => 36,  122 => 35,  119 => 34,  111 => 32,  109 => 31,  106 => 30,  100 => 29,  92 => 27,  84 => 25,  81 => 24,  76 => 23,  73 => 21,  65 => 19,  63 => 18,  60 => 17,  52 => 15,  50 => 14,  42 => 13,  30 => 12,  27 => 11,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}

{% block pager_links %}
    <ul class=\"pagination{% if pager_class is defined %} {{ pager_class }}{% endif %}\">
        {% if datagrid.pager.page > 2  %}
            <li><a href=\"{{ url(app.request.attributes.get('_route'), app.request.query.all|merge({page: 1})) }}\" title=\"{{ 'link_first_pager'|trans({}, 'SonataDatagridBundle') }}\">&laquo;</a></li>
        {% endif %}

        {% if datagrid.pager.page != datagrid.pager.previouspage %}
            <li><a href=\"{{ url(app.request.attributes.get('_route'), app.request.query.all|merge({page: datagrid.pager.previouspage})) }}\" title=\"{{ 'link_previous_pager'|trans({}, 'SonataDatagridBundle') }}\">&lsaquo;</a></li>
        {% endif %}

        {# Set the number of pages to display in the pager #}
        {% for page in datagrid.pager.getLinks(5) %}
            {% if page == datagrid.pager.page %}
                <li class=\"active\"><a href=\"{{ url(app.request.attributes.get('_route'), app.request.query.all|merge({page: page})) }}\">{{ page }}</a></li>
            {% else %}
                <li><a href=\"{{ url(app.request.attributes.get('_route'), app.request.query.all|merge({page: page})) }}\">{{ page }}</a></li>
            {% endif %}
        {% endfor %}

        {% if datagrid.pager.page != datagrid.pager.nextpage %}
            <li><a href=\"{{ url(app.request.attributes.get('_route'), app.request.query.all|merge({page: datagrid.pager.nextpage})) }}\" title=\"{{ 'link_next_pager'|trans({}, 'SonataDatagridBundle') }}\">&rsaquo;</a></li>
        {% endif %}

        {% if datagrid.pager.page != datagrid.pager.lastpage and datagrid.pager.lastpage != datagrid.pager.nextpage %}
            <li><a href=\"{{ url(app.request.attributes.get('_route'), app.request.query.all|merge({page: datagrid.pager.lastpage})) }}\" title=\"{{ 'link_last_pager'|trans({}, 'SonataDatagridBundle') }}\">&raquo;</a></li>
        {% endif %}
    </ul>
{% endblock %}", "@SonataDatagrid/Search/pager.html.twig", "/app/vendor/sonata-project/datagrid-bundle/src/Resources/views/Search/pager.html.twig");
    }
}
