<?php

/* @SonataAdmin/Pager/base_links.html.twig */
class __TwigTemplate_a70c9f269e75d845f28e984b9a3b5dbfead5990f14068a1940250fb5458156a6 extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/Pager/base_links.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/Pager/base_links.html.twig"));

        // line 11
        echo "
<div class=\"text-center\">
    <ul class=\"pagination\">
        ";
        // line 14
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 14, $this->source); })()), "datagrid", array()), "pager", array()), "page", array()) > 2)) {
            // line 15
            echo "            <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 15, $this->source); })()), "generateUrl", array(0 => "list", 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 15, $this->source); })()), "modelmanager", array()), "paginationparameters", array(0 => twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 15, $this->source); })()), "datagrid", array()), 1 => 1), "method")), "method"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("link_first_pager", array(), "SonataAdminBundle"), "html", null, true);
            echo "\">&laquo;</a></li>
        ";
        }
        // line 17
        echo "
        ";
        // line 18
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 18, $this->source); })()), "datagrid", array()), "pager", array()), "page", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 18, $this->source); })()), "datagrid", array()), "pager", array()), "previouspage", array()))) {
            // line 19
            echo "            <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 19, $this->source); })()), "generateUrl", array(0 => "list", 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 19, $this->source); })()), "modelmanager", array()), "paginationparameters", array(0 => twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 19, $this->source); })()), "datagrid", array()), 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 19, $this->source); })()), "datagrid", array()), "pager", array()), "previouspage", array())), "method")), "method"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("link_previous_pager", array(), "SonataAdminBundle"), "html", null, true);
            echo "\">&lsaquo;</a></li>
        ";
        }
        // line 21
        echo "
        ";
        // line 23
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 23, $this->source); })()), "datagrid", array()), "pager", array()), "getLinks", array(0 => twig_get_attribute($this->env, $this->source, (isset($context["admin_pool"]) || array_key_exists("admin_pool", $context) ? $context["admin_pool"] : (function () { throw new Twig_Error_Runtime('Variable "admin_pool" does not exist.', 23, $this->source); })()), "getOption", array(0 => "pager_links"), "method")), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 24
            echo "            ";
            if (($context["page"] == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 24, $this->source); })()), "datagrid", array()), "pager", array()), "page", array()))) {
                // line 25
                echo "                <li class=\"active\"><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 25, $this->source); })()), "generateUrl", array(0 => "list", 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 25, $this->source); })()), "modelmanager", array()), "paginationparameters", array(0 => twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 25, $this->source); })()), "datagrid", array()), 1 => $context["page"]), "method")), "method"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                echo "</a></li>
            ";
            } else {
                // line 27
                echo "                <li><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 27, $this->source); })()), "generateUrl", array(0 => "list", 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 27, $this->source); })()), "modelmanager", array()), "paginationparameters", array(0 => twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 27, $this->source); })()), "datagrid", array()), 1 => $context["page"]), "method")), "method"), "html", null, true);
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
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 31, $this->source); })()), "datagrid", array()), "pager", array()), "page", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 31, $this->source); })()), "datagrid", array()), "pager", array()), "nextpage", array()))) {
            // line 32
            echo "            <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 32, $this->source); })()), "generateUrl", array(0 => "list", 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 32, $this->source); })()), "modelmanager", array()), "paginationparameters", array(0 => twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 32, $this->source); })()), "datagrid", array()), 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 32, $this->source); })()), "datagrid", array()), "pager", array()), "nextpage", array())), "method")), "method"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("link_next_pager", array(), "SonataAdminBundle"), "html", null, true);
            echo "\">&rsaquo;</a></li>
        ";
        }
        // line 34
        echo "
        ";
        // line 35
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 35, $this->source); })()), "datagrid", array()), "pager", array()), "page", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 35, $this->source); })()), "datagrid", array()), "pager", array()), "lastpage", array())) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 35, $this->source); })()), "datagrid", array()), "pager", array()), "lastpage", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 35, $this->source); })()), "datagrid", array()), "pager", array()), "nextpage", array())))) {
            // line 36
            echo "            <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 36, $this->source); })()), "generateUrl", array(0 => "list", 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 36, $this->source); })()), "modelmanager", array()), "paginationparameters", array(0 => twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 36, $this->source); })()), "datagrid", array()), 1 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 36, $this->source); })()), "datagrid", array()), "pager", array()), "lastpage", array())), "method")), "method"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("link_last_pager", array(), "SonataAdminBundle"), "html", null, true);
            echo "\">&raquo;</a></li>
        ";
        }
        // line 38
        echo "    </ul>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SonataAdmin/Pager/base_links.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 38,  108 => 36,  106 => 35,  103 => 34,  95 => 32,  93 => 31,  90 => 30,  84 => 29,  76 => 27,  68 => 25,  65 => 24,  60 => 23,  57 => 21,  49 => 19,  47 => 18,  44 => 17,  36 => 15,  34 => 14,  29 => 11,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}

<div class=\"text-center\">
    <ul class=\"pagination\">
        {% if admin.datagrid.pager.page > 2  %}
            <li><a href=\"{{ admin.generateUrl('list', admin.modelmanager.paginationparameters(admin.datagrid, 1)) }}\" title=\"{{ 'link_first_pager'|trans({}, 'SonataAdminBundle') }}\">&laquo;</a></li>
        {% endif %}

        {% if admin.datagrid.pager.page != admin.datagrid.pager.previouspage %}
            <li><a href=\"{{ admin.generateUrl('list', admin.modelmanager.paginationparameters(admin.datagrid, admin.datagrid.pager.previouspage)) }}\" title=\"{{ 'link_previous_pager'|trans({}, 'SonataAdminBundle') }}\">&lsaquo;</a></li>
        {% endif %}

        {# Set the number of pages to display in the pager #}
        {% for page in admin.datagrid.pager.getLinks(admin_pool.getOption('pager_links')) %}
            {% if page == admin.datagrid.pager.page %}
                <li class=\"active\"><a href=\"{{ admin.generateUrl('list', admin.modelmanager.paginationparameters(admin.datagrid, page)) }}\">{{ page }}</a></li>
            {% else %}
                <li><a href=\"{{ admin.generateUrl('list', admin.modelmanager.paginationparameters(admin.datagrid, page)) }}\">{{ page }}</a></li>
            {% endif %}
        {% endfor %}

        {% if admin.datagrid.pager.page != admin.datagrid.pager.nextpage %}
            <li><a href=\"{{ admin.generateUrl('list', admin.modelmanager.paginationparameters(admin.datagrid, admin.datagrid.pager.nextpage)) }}\" title=\"{{ 'link_next_pager'|trans({}, 'SonataAdminBundle') }}\">&rsaquo;</a></li>
        {% endif %}

        {% if admin.datagrid.pager.page != admin.datagrid.pager.lastpage and admin.datagrid.pager.lastpage != admin.datagrid.pager.nextpage %}
            <li><a href=\"{{ admin.generateUrl('list', admin.modelmanager.paginationparameters(admin.datagrid, admin.datagrid.pager.lastpage)) }}\" title=\"{{ 'link_last_pager'|trans({}, 'SonataAdminBundle') }}\">&raquo;</a></li>
        {% endif %}
    </ul>
</div>
", "@SonataAdmin/Pager/base_links.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/Pager/base_links.html.twig");
    }
}
