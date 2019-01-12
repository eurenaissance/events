<?php

/* @SonataDatagrid/Search/results.html.twig */
class __TwigTemplate_7910e838ae82a9336d193d44bc6a22bcc27fd69a0ea73f7f67863c3f069b58b7 extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataDatagrid/Search/results.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataDatagrid/Search/results.html.twig"));

        // line 2
        echo "
<div class=\"row\">
    <form name=\"search\" method=\"get\" action=\"";
        // line 4
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new Twig_Error_Runtime('Variable "route" does not exist.', 4, $this->source); })()));
        echo "\">
        <div class=\"row\">
            ";
        // line 6
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 6, $this->source); })()), "search", array()), 'widget');
        echo "
        </div>

        <div class=\"row\">
            ";
        // line 10
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 10, $this->source); })()), "priceStart", array()), 'widget', array("horizontal_input_wrapper_class" => "col-sm-3", "attr" => array("min" => 1, "class" => "form-control", "placeholder" => "Start from")));
        // line 14
        echo "

            ";
        // line 16
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 16, $this->source); })()), "priceEnd", array()), 'widget', array("horizontal_input_wrapper_class" => "col-sm-3", "attr" => array("min" => 1, "class" => "form-control", "placeholder" => "End to")));
        // line 20
        echo "
        </div>

        <div class=\"row\">
            ";
        // line 24
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 24, $this->source); })()), "sort", array()), 'widget', array("horizontal_input_wrapper_class" => "col-sm-3"));
        echo "
        </div>

        <div class=\"row col-sm-3\">
            <input class=\"btn btn-primary\" type=\"submit\" value=\"Search\" />
        </div>
    </form>
</div>

<div class=\"row text-center\">
    ";
        // line 34
        $this->loadTemplate("@SonataDatagrid/Search/pager.html.twig", "@SonataDatagrid/Search/results.html.twig", 34)->display($context);
        // line 35
        echo "</div>

<div class=\"row\">
    ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["results"]) || array_key_exists("results", $context) ? $context["results"] : (function () { throw new Twig_Error_Runtime('Variable "results" does not exist.', 38, $this->source); })()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 39
            echo "        <div class=\"col-sm-4\" itemscope itemtype=\"http://schema.org/Product\">
            ";
            // line 40
            $this->loadTemplate("@SonataProduct/Catalog/_product_grid.html.twig", "@SonataDatagrid/Search/results.html.twig", 40)->display($context);
            // line 41
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SonataDatagrid/Search/results.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 43,  101 => 41,  99 => 40,  96 => 39,  79 => 38,  74 => 35,  72 => 34,  59 => 24,  53 => 20,  51 => 16,  47 => 14,  45 => 10,  38 => 6,  33 => 4,  29 => 2,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% sonata_template_deprecate 'none' %}

<div class=\"row\">
    <form name=\"search\" method=\"get\" action=\"{{ path(route) }}\">
        <div class=\"row\">
            {{ form_widget(form.search) }}
        </div>

        <div class=\"row\">
            {{ form_widget(form.priceStart, {horizontal_input_wrapper_class: 'col-sm-3', attr: {
                min: 1,
                class: 'form-control',
                placeholder: 'Start from'
            }}) }}

            {{ form_widget(form.priceEnd, {horizontal_input_wrapper_class: 'col-sm-3', attr: {
                min: 1,
                class: 'form-control',
                placeholder: 'End to'
            }}) }}
        </div>

        <div class=\"row\">
            {{ form_widget(form.sort, {horizontal_input_wrapper_class: 'col-sm-3'}) }}
        </div>

        <div class=\"row col-sm-3\">
            <input class=\"btn btn-primary\" type=\"submit\" value=\"Search\" />
        </div>
    </form>
</div>

<div class=\"row text-center\">
    {% include '@SonataDatagrid/Search/pager.html.twig' %}
</div>

<div class=\"row\">
    {% for product in results %}
        <div class=\"col-sm-4\" itemscope itemtype=\"http://schema.org/Product\">
            {% include '@SonataProduct/Catalog/_product_grid.html.twig' %}
        </div>
    {% endfor %}
</div>
", "@SonataDatagrid/Search/results.html.twig", "/app/vendor/sonata-project/datagrid-bundle/src/Resources/views/Search/results.html.twig");
    }
}
