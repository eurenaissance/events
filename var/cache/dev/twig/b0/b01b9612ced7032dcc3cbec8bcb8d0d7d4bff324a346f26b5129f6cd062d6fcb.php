<?php

/* @SonataAdmin/CRUD/list_outer_rows_mosaic.html.twig */
class __TwigTemplate_6ef7b0310b62b1824eb5c504f2b246a7624cdd00cb40725eebd08f67351d968d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'sonata_mosaic_background' => array($this, 'block_sonata_mosaic_background'),
            'sonata_mosaic_default_view' => array($this, 'block_sonata_mosaic_default_view'),
            'sonata_mosaic_hover_view' => array($this, 'block_sonata_mosaic_hover_view'),
            'sonata_mosaic_description' => array($this, 'block_sonata_mosaic_description'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/list_outer_rows_mosaic.html.twig"));

        // line 11
        echo "
<!--
This template can be customized to match your needs. You should only extends the template and used the differents block to customize the view:
    - sonata_mosaic_default_view
    - sonata_mosaic_hover_view
    - sonata_mosaic_description
-->

<tr>
    <td colspan=\"";
        // line 20
        echo twig_escape_filter($this->env, (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 20, $this->source); })()), "list", array()), "elements", array())) - ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 20, $this->source); })()), "request", array()), "isXmlHttpRequest", array())) ? ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 20, $this->source); })()), "list", array()), "has", array(0 => "_action"), "method") + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 20, $this->source); })()), "list", array()), "has", array(0 => "batch"), "method"))) : (0))), "html", null, true);
        echo "\">
        <div class=\"row\">
            ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 22, $this->source); })()), "datagrid", array()), "results", array()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
            // line 23
            echo "                ";
            $context["meta"] = twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 23, $this->source); })()), "getObjectMetadata", array(0 => $context["object"]), "method");
            // line 24
            echo "                ";
            ob_start();
            // line 25
            echo "                    <div class=\"mosaic-box-outter\">
                        <div class=\"mosaic-inner-box\">
                            ";
            // line 30
            echo "
                            <div class=\"mosaic-inner-box-default\">
                                ";
            // line 32
            $this->displayBlock('sonata_mosaic_background', $context, $blocks);
            // line 35
            echo "                                ";
            $this->displayBlock('sonata_mosaic_default_view', $context, $blocks);
            // line 38
            echo "                            </div>

                            ";
            // line 44
            echo "                            <div class=\"mosaic-inner-box-hover\">
                                ";
            // line 45
            $this->displayBlock('sonata_mosaic_hover_view', $context, $blocks);
            // line 49
            echo "                            </div>
                        </div>

                        ";
            // line 53
            echo "                        ";
            $context["export_formats"] = (((isset($context["export_formats"]) || array_key_exists("export_formats", $context))) ? (_twig_default_filter((isset($context["export_formats"]) || array_key_exists("export_formats", $context) ? $context["export_formats"] : (function () { throw new Twig_Error_Runtime('Variable "export_formats" does not exist.', 53, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 53, $this->source); })()), "getExportFormats", array()))) : (twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 53, $this->source); })()), "getExportFormats", array())));
            // line 54
            echo "
                        <div class=\"mosaic-inner-text\">
                            ";
            // line 56
            if (((twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 56, $this->source); })()), "hasRoute", array(0 => "batch"), "method") && (twig_length_filter($this->env, (isset($context["batchactions"]) || array_key_exists("batchactions", $context) ? $context["batchactions"] : (function () { throw new Twig_Error_Runtime('Variable "batchactions" does not exist.', 56, $this->source); })())) > 0)) || ((twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 56, $this->source); })()), "hasRoute", array(0 => "export"), "method") && twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 56, $this->source); })()), "hasAccess", array(0 => "export"), "method")) && twig_length_filter($this->env, (isset($context["export_formats"]) || array_key_exists("export_formats", $context) ? $context["export_formats"] : (function () { throw new Twig_Error_Runtime('Variable "export_formats" does not exist.', 56, $this->source); })()))))) {
                // line 57
                echo "                                <input type=\"checkbox\" name=\"idx[]\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 57, $this->source); })()), "id", array(0 => $context["object"]), "method"), "html", null, true);
                echo "\">
                            ";
            } else {
                // line 59
                echo "                                &nbsp;
                            ";
            }
            // line 61
            echo "
                            ";
            // line 62
            $this->displayBlock('sonata_mosaic_description', $context, $blocks);
            // line 65
            echo "                        </div>
                    </div>
                ";
            $context["mosaic_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 68
            echo "                <div class=\"col-xs-6 col-sm-3 mosaic-box sonata-ba-list-field-batch sonata-ba-list-field\"
                     objectId=\"";
            // line 69
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 69, $this->source); })()), "id", array(0 => $context["object"]), "method"), "html", null, true);
            echo "\">
                    ";
            // line 70
            if ((twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 70, $this->source); })()), "hasAccess", array(0 => "edit", 1 => $context["object"]), "method") && twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 70, $this->source); })()), "hasRoute", array(0 => "edit"), "method"))) {
                // line 71
                echo "                        <a class=\"mosaic-inner-link\"
                           href=\"";
                // line 72
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 72, $this->source); })()), "generateUrl", array(0 => "edit", 1 => array("id" => $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->getUrlsafeIdentifier($context["object"], (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 72, $this->source); })())))), "method"), "html", null, true);
                echo "\">
                            ";
                // line 73
                echo twig_escape_filter($this->env, (isset($context["mosaic_content"]) || array_key_exists("mosaic_content", $context) ? $context["mosaic_content"] : (function () { throw new Twig_Error_Runtime('Variable "mosaic_content" does not exist.', 73, $this->source); })()), "html", null, true);
                echo "
                        </a>
                    ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 75
(isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 75, $this->source); })()), "hasAccess", array(0 => "show", 1 => $context["object"]), "method") && twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 75, $this->source); })()), "hasRoute", array(0 => "show"), "method"))) {
                // line 76
                echo "                        <a class=\"mosaic-inner-link\"
                           href=\"";
                // line 77
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 77, $this->source); })()), "generateUrl", array(0 => "show", 1 => array("id" => $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->getUrlsafeIdentifier($context["object"], (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 77, $this->source); })())))), "method"), "html", null, true);
                echo "\">
                            ";
                // line 78
                echo twig_escape_filter($this->env, (isset($context["mosaic_content"]) || array_key_exists("mosaic_content", $context) ? $context["mosaic_content"] : (function () { throw new Twig_Error_Runtime('Variable "mosaic_content" does not exist.', 78, $this->source); })()), "html", null, true);
                echo "
                        </a>
                    ";
            } else {
                // line 81
                echo "                        ";
                echo twig_escape_filter($this->env, (isset($context["mosaic_content"]) || array_key_exists("mosaic_content", $context) ? $context["mosaic_content"] : (function () { throw new Twig_Error_Runtime('Variable "mosaic_content" does not exist.', 81, $this->source); })()), "html", null, true);
                echo "
                    ";
            }
            // line 83
            echo "                </div>

                ";
            // line 85
            if (((twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) % 4) == 0)) {
                // line 86
                echo "                    <div class=\"clearfix hidden-xs\"></div>
                ";
            }
            // line 88
            echo "                ";
            if (((twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) % 2) == 0)) {
                // line 89
                echo "                    <div class=\"clearfix visible-xs\"></div>
                ";
            }
            // line 91
            echo "            ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "        </div>
    </td>
</tr>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 32
    public function block_sonata_mosaic_background($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_mosaic_background"));

        // line 33
        echo "                                    <img src=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["meta"]) || array_key_exists("meta", $context) ? $context["meta"] : (function () { throw new Twig_Error_Runtime('Variable "meta" does not exist.', 33, $this->source); })()), "image", array()), "html", null, true);
        echo "\" alt=\"\" />
                                ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 35
    public function block_sonata_mosaic_default_view($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_mosaic_default_view"));

        // line 36
        echo "                                    <span class=\"mosaic-box-label label label-primary pull-right\">#";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 36, $this->source); })()), "id", array(0 => (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new Twig_Error_Runtime('Variable "object" does not exist.', 36, $this->source); })())), "method"), "html", null, true);
        echo "</span>
                                ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 45
    public function block_sonata_mosaic_hover_view($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_mosaic_hover_view"));

        // line 46
        echo "                                    <span class=\"mosaic-box-label label label-primary pull-right\">#";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 46, $this->source); })()), "id", array(0 => (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new Twig_Error_Runtime('Variable "object" does not exist.', 46, $this->source); })())), "method"), "html", null, true);
        echo "</span>
                                    ";
        // line 47
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["meta"]) || array_key_exists("meta", $context) ? $context["meta"] : (function () { throw new Twig_Error_Runtime('Variable "meta" does not exist.', 47, $this->source); })()), "description", array()), "html", null, true);
        echo "
                                ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 62
    public function block_sonata_mosaic_description($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sonata_mosaic_description"));

        // line 63
        echo "                                ";
        echo twig_escape_filter($this->env, twig_truncate_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["meta"]) || array_key_exists("meta", $context) ? $context["meta"] : (function () { throw new Twig_Error_Runtime('Variable "meta" does not exist.', 63, $this->source); })()), "title", array()), 40), "html", null, true);
        echo "
                            ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SonataAdmin/CRUD/list_outer_rows_mosaic.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  266 => 63,  260 => 62,  251 => 47,  246 => 46,  240 => 45,  230 => 36,  224 => 35,  214 => 33,  208 => 32,  198 => 92,  184 => 91,  180 => 89,  177 => 88,  173 => 86,  171 => 85,  167 => 83,  161 => 81,  155 => 78,  151 => 77,  148 => 76,  146 => 75,  141 => 73,  137 => 72,  134 => 71,  132 => 70,  128 => 69,  125 => 68,  120 => 65,  118 => 62,  115 => 61,  111 => 59,  105 => 57,  103 => 56,  99 => 54,  96 => 53,  91 => 49,  89 => 45,  86 => 44,  82 => 38,  79 => 35,  77 => 32,  73 => 30,  69 => 25,  66 => 24,  63 => 23,  46 => 22,  41 => 20,  30 => 11,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}

<!--
This template can be customized to match your needs. You should only extends the template and used the differents block to customize the view:
    - sonata_mosaic_default_view
    - sonata_mosaic_hover_view
    - sonata_mosaic_description
-->

<tr>
    <td colspan=\"{{ admin.list.elements|length - (app.request.isXmlHttpRequest ? (admin.list.has('_action') + admin.list.has('batch')) : 0) }}\">
        <div class=\"row\">
            {% for object in admin.datagrid.results %}
                {% set meta = admin.getObjectMetadata(object) %}
                {% set mosaic_content %}
                    <div class=\"mosaic-box-outter\">
                        <div class=\"mosaic-inner-box\">
                            {#
                                This box will be display when the mouse is not on the box
                            #}

                            <div class=\"mosaic-inner-box-default\">
                                {% block sonata_mosaic_background %}
                                    <img src=\"{{ meta.image }}\" alt=\"\" />
                                {% endblock %}
                                {% block sonata_mosaic_default_view %}
                                    <span class=\"mosaic-box-label label label-primary pull-right\">#{{ admin.id(object) }}</span>
                                {% endblock %}
                            </div>

                            {#
                                This box will be display when the mouse is on the box
                                You can add more description
                            #}
                            <div class=\"mosaic-inner-box-hover\">
                                {% block sonata_mosaic_hover_view %}
                                    <span class=\"mosaic-box-label label label-primary pull-right\">#{{ admin.id(object) }}</span>
                                    {{ meta.description }}
                                {% endblock %}
                            </div>
                        </div>

                        {# NEXT_MAJOR : remove this assignment #}
                        {% set export_formats = export_formats|default(admin.getExportFormats) %}

                        <div class=\"mosaic-inner-text\">
                            {% if (admin.hasRoute('batch') and batchactions|length > 0) or (admin.hasRoute('export') and admin.hasAccess('export') and export_formats|length) %}
                                <input type=\"checkbox\" name=\"idx[]\" value=\"{{ admin.id(object) }}\">
                            {% else %}
                                &nbsp;
                            {% endif %}

                            {% block sonata_mosaic_description %}
                                {{ meta.title|truncate(40) }}
                            {% endblock %}
                        </div>
                    </div>
                {% endset %}
                <div class=\"col-xs-6 col-sm-3 mosaic-box sonata-ba-list-field-batch sonata-ba-list-field\"
                     objectId=\"{{ admin.id(object) }}\">
                    {% if admin.hasAccess('edit', object) and admin.hasRoute('edit') %}
                        <a class=\"mosaic-inner-link\"
                           href=\"{{ admin.generateUrl('edit', {'id' : object|sonata_urlsafeid(admin) }) }}\">
                            {{ mosaic_content }}
                        </a>
                    {% elseif admin.hasAccess('show', object) and admin.hasRoute('show') %}
                        <a class=\"mosaic-inner-link\"
                           href=\"{{ admin.generateUrl('show', {'id' : object|sonata_urlsafeid(admin) }) }}\">
                            {{ mosaic_content }}
                        </a>
                    {% else %}
                        {{ mosaic_content }}
                    {% endif %}
                </div>

                {% if loop.index % 4 == 0 %}
                    <div class=\"clearfix hidden-xs\"></div>
                {% endif %}
                {% if loop.index % 2 == 0 %}
                    <div class=\"clearfix visible-xs\"></div>
                {% endif %}
            {% endfor %}
        </div>
    </td>
</tr>
", "@SonataAdmin/CRUD/list_outer_rows_mosaic.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/CRUD/list_outer_rows_mosaic.html.twig");
    }
}
