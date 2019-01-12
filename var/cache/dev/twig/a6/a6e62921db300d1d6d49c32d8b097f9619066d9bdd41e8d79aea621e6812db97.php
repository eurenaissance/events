<?php

/* @SonataAdmin/CRUD/base_acl_macro.html.twig */
class __TwigTemplate_af05434706bf58171fa7147a52b2441fb153f1834c8906faceb99fbb0578a553 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/CRUD/base_acl_macro.html.twig"));

        // line 11
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 12
    public function macro_render_form($__form__ = null, $__permissions__ = null, $__td_type__ = null, $__admin__ = null, $__admin_pool__ = null, $__object__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "form" => $__form__,
            "permissions" => $__permissions__,
            "td_type" => $__td_type__,
            "admin" => $__admin__,
            "admin_pool" => $__admin_pool__,
            "object" => $__object__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "render_form"));

            // line 13
            echo "    <form class=\"form-horizontal\"
          action=\"";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 14, $this->source); })()), "generateUrl", array(0 => "acl", 1 => array("id" => twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 14, $this->source); })()), "id", array(0 => (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new Twig_Error_Runtime('Variable "object" does not exist.', 14, $this->source); })())), "method"), "uniqid" => twig_get_attribute($this->env, $this->source, (isset($context["admin"]) || array_key_exists("admin", $context) ? $context["admin"] : (function () { throw new Twig_Error_Runtime('Variable "admin" does not exist.', 14, $this->source); })()), "uniqid", array()), "subclass" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 14, $this->source); })()), "request", array()), "get", array(0 => "subclass"), "method"))), "method"), "html", null, true);
            echo "\"
          ";
            // line 15
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 15, $this->source); })()), "vars", array()), "multipart", array())) {
                echo " enctype=\"multipart/form-data\"";
            }
            // line 16
            echo "          method=\"POST\"
            ";
            // line 17
            if ( !twig_get_attribute($this->env, $this->source, (isset($context["admin_pool"]) || array_key_exists("admin_pool", $context) ? $context["admin_pool"] : (function () { throw new Twig_Error_Runtime('Variable "admin_pool" does not exist.', 17, $this->source); })()), "getOption", array(0 => "html5_validate"), "method")) {
                echo "novalidate=\"novalidate\"";
            }
            // line 18
            echo "            >

        ";
            // line 20
            echo twig_include($this->env, $context, "@SonataAdmin/Helper/render_form_dismissable_errors.html.twig");
            echo "

        <div class=\"box box-success\">
            <div class=\"body table-responsive no-padding\">
                <table class=\"table\">
                    <colgroup>
                        <col style=\"width: 100%;\"/>
                        ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["permissions"]) || array_key_exists("permissions", $context) ? $context["permissions"] : (function () { throw new Twig_Error_Runtime('Variable "permissions" does not exist.', 27, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["permission"]) {
                // line 28
                echo "                            <col/>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['permission'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "                    </colgroup>

                    ";
            // line 32
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 32, $this->source); })()), "children", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["child"], "vars", array()), "name", array()) != "_token")) {
                    // line 33
                    echo "                        ";
                    if (((twig_get_attribute($this->env, $this->source, $context["loop"], "index0", array()) == 0) || ((twig_get_attribute($this->env, $this->source, $context["loop"], "index0", array()) % 10) == 0))) {
                        // line 34
                        echo "                            <tr>
                                <th>";
                        // line 35
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["td_type"]) || array_key_exists("td_type", $context) ? $context["td_type"] : (function () { throw new Twig_Error_Runtime('Variable "td_type" does not exist.', 35, $this->source); })()), array(), "SonataAdminBundle"), "html", null, true);
                        echo "</th>
                                ";
                        // line 36
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["permissions"]) || array_key_exists("permissions", $context) ? $context["permissions"] : (function () { throw new Twig_Error_Runtime('Variable "permissions" does not exist.', 36, $this->source); })()));
                        foreach ($context['_seq'] as $context["_key"] => $context["permission"]) {
                            // line 37
                            echo "                                    <th class=\"text-right\">";
                            echo twig_escape_filter($this->env, $context["permission"], "html", null, true);
                            echo "</th>
                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['permission'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 39
                        echo "                            </tr>
                        ";
                    }
                    // line 41
                    echo "
                        <tr>
                            <td>
                                ";
                    // line 44
                    $context["typeChild"] = ((twig_get_attribute($this->env, $this->source, $context["child"], "role", array(), "array", true, true)) ? (twig_get_attribute($this->env, $this->source, $context["child"], "role", array(), "array")) : (twig_get_attribute($this->env, $this->source, $context["child"], "user", array(), "array")));
                    // line 45
                    echo "                                ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["typeChild"]) || array_key_exists("typeChild", $context) ? $context["typeChild"] : (function () { throw new Twig_Error_Runtime('Variable "typeChild" does not exist.', 45, $this->source); })()), "vars", array()), "value", array()), "html", null, true);
                    echo "
                                ";
                    // line 46
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["typeChild"]) || array_key_exists("typeChild", $context) ? $context["typeChild"] : (function () { throw new Twig_Error_Runtime('Variable "typeChild" does not exist.', 46, $this->source); })()), 'widget');
                    echo "
                            </td>
                            ";
                    // line 48
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["permissions"]) || array_key_exists("permissions", $context) ? $context["permissions"] : (function () { throw new Twig_Error_Runtime('Variable "permissions" does not exist.', 48, $this->source); })()));
                    foreach ($context['_seq'] as $context["_key"] => $context["permission"]) {
                        // line 49
                        echo "                                <td class=\"text-right\">";
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["child"], $context["permission"], array(), "array"), 'widget', array("label" => false));
                        echo "</td>
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['permission'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 51
                    echo "                        </tr>
                    ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "                </table>
            </div>
        </div>

        ";
            // line 57
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 57, $this->source); })()), "_token", array()), 'row');
            echo "

        <div class=\"well well-small form-actions\">
            <input class=\"btn btn-primary\" type=\"submit\" name=\"btn_create_and_edit\" value=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("btn_update_acl", array(), "SonataAdminBundle"), "html", null, true);
            echo "\">
        </div>
    </form>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "@SonataAdmin/CRUD/base_acl_macro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  192 => 60,  186 => 57,  180 => 53,  169 => 51,  160 => 49,  156 => 48,  151 => 46,  146 => 45,  144 => 44,  139 => 41,  135 => 39,  126 => 37,  122 => 36,  118 => 35,  115 => 34,  112 => 33,  101 => 32,  97 => 30,  90 => 28,  86 => 27,  76 => 20,  72 => 18,  68 => 17,  65 => 16,  61 => 15,  57 => 14,  54 => 13,  34 => 12,  26 => 11,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}

{% macro render_form(form, permissions, td_type, admin, admin_pool, object) %}
    <form class=\"form-horizontal\"
          action=\"{{ admin.generateUrl('acl', {'id': admin.id(object), 'uniqid': admin.uniqid, 'subclass': app.request.get('subclass')}) }}\"
          {% if form.vars.multipart %} enctype=\"multipart/form-data\"{% endif %}
          method=\"POST\"
            {% if not admin_pool.getOption('html5_validate') %}novalidate=\"novalidate\"{% endif %}
            >

        {{ include('@SonataAdmin/Helper/render_form_dismissable_errors.html.twig') }}

        <div class=\"box box-success\">
            <div class=\"body table-responsive no-padding\">
                <table class=\"table\">
                    <colgroup>
                        <col style=\"width: 100%;\"/>
                        {% for permission in permissions %}
                            <col/>
                        {% endfor %}
                    </colgroup>

                    {% for child in form.children if child.vars.name != '_token' %}
                        {% if loop.index0 == 0 or loop.index0 % 10 == 0 %}
                            <tr>
                                <th>{{ td_type|trans({}, 'SonataAdminBundle') }}</th>
                                {% for permission in permissions %}
                                    <th class=\"text-right\">{{ permission }}</th>
                                {% endfor %}
                            </tr>
                        {% endif %}

                        <tr>
                            <td>
                                {% set typeChild = child['role'] is defined ? child['role'] : child['user'] %}
                                {{ typeChild.vars.value }}
                                {{ form_widget(typeChild) }}
                            </td>
                            {% for permission in permissions %}
                                <td class=\"text-right\">{{ form_widget(child[permission], { label: false }) }}</td>
                            {% endfor %}
                        </tr>
                    {% endfor %}
                </table>
            </div>
        </div>

        {{ form_row(form._token) }}

        <div class=\"well well-small form-actions\">
            <input class=\"btn btn-primary\" type=\"submit\" name=\"btn_create_and_edit\" value=\"{{ 'btn_update_acl'|trans({}, 'SonataAdminBundle') }}\">
        </div>
    </form>
{% endmacro %}
", "@SonataAdmin/CRUD/base_acl_macro.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/CRUD/base_acl_macro.html.twig");
    }
}
