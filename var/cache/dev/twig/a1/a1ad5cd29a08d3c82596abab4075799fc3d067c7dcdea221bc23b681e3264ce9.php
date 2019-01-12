<?php

/* @SonataAdmin/Core/dashboard.html.twig */
class __TwigTemplate_dca79068b9e8d247d547496fca59a3f31c6ce59c8307a74f122f89a6bd20423c extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 12
        return $this->loadTemplate((isset($context["base_template"]) || array_key_exists("base_template", $context) ? $context["base_template"] : (function () { throw new Twig_Error_Runtime('Variable "base_template" does not exist.', 12, $this->source); })()), "@SonataAdmin/Core/dashboard.html.twig", 12);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/Core/dashboard.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@SonataAdmin/Core/dashboard.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("title_dashboard", array(), "SonataAdminBundle"), "html", null, true);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 15
    public function block_breadcrumb($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "breadcrumb"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "breadcrumb"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 17
        echo "
    ";
        // line 18
        $context["has_left"] = false;
        // line 19
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["blocks"]) || array_key_exists("blocks", $context) ? $context["blocks"] : (function () { throw new Twig_Error_Runtime('Variable "blocks" does not exist.', 19, $this->source); })()), "left", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
            // line 20
            echo "        ";
            if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())) == 0) || $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->isGrantedAffirmative(twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())))) {
                // line 21
                echo "            ";
                $context["has_left"] = true;
                // line 22
                echo "        ";
            }
            // line 23
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "
    ";
        // line 25
        $context["has_center"] = false;
        // line 26
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["blocks"]) || array_key_exists("blocks", $context) ? $context["blocks"] : (function () { throw new Twig_Error_Runtime('Variable "blocks" does not exist.', 26, $this->source); })()), "center", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
            // line 27
            echo "        ";
            if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())) == 0) || $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->isGrantedAffirmative(twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())))) {
                // line 28
                echo "            ";
                $context["has_center"] = true;
                // line 29
                echo "        ";
            }
            // line 30
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "
    ";
        // line 32
        $context["has_right"] = false;
        // line 33
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["blocks"]) || array_key_exists("blocks", $context) ? $context["blocks"] : (function () { throw new Twig_Error_Runtime('Variable "blocks" does not exist.', 33, $this->source); })()), "right", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
            // line 34
            echo "        ";
            if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())) == 0) || $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->isGrantedAffirmative(twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())))) {
                // line 35
                echo "            ";
                $context["has_right"] = true;
                // line 36
                echo "        ";
            }
            // line 37
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "
    ";
        // line 39
        $context["has_top"] = false;
        // line 40
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["blocks"]) || array_key_exists("blocks", $context) ? $context["blocks"] : (function () { throw new Twig_Error_Runtime('Variable "blocks" does not exist.', 40, $this->source); })()), "top", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
            // line 41
            echo "        ";
            if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())) == 0) || $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->isGrantedAffirmative(twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())))) {
                // line 42
                echo "            ";
                $context["has_top"] = true;
                // line 43
                echo "        ";
            }
            // line 44
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "
    ";
        // line 46
        $context["has_bottom"] = false;
        // line 47
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["blocks"]) || array_key_exists("blocks", $context) ? $context["blocks"] : (function () { throw new Twig_Error_Runtime('Variable "blocks" does not exist.', 47, $this->source); })()), "bottom", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
            // line 48
            echo "        ";
            if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())) == 0) || $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->isGrantedAffirmative(twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())))) {
                // line 49
                echo "            ";
                $context["has_bottom"] = true;
                // line 50
                echo "        ";
            }
            // line 51
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "
    ";
        // line 53
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("sonata.admin.dashboard.top", array("admin_pool" => twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 53, $this->source); })()), "adminPool", array()))));
        echo "

    ";
        // line 55
        if ((isset($context["has_top"]) || array_key_exists("has_top", $context) ? $context["has_top"] : (function () { throw new Twig_Error_Runtime('Variable "has_top" does not exist.', 55, $this->source); })())) {
            // line 56
            echo "        <div class=\"row\">
            ";
            // line 57
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["blocks"]) || array_key_exists("blocks", $context) ? $context["blocks"] : (function () { throw new Twig_Error_Runtime('Variable "blocks" does not exist.', 57, $this->source); })()), "top", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
                // line 58
                echo "                ";
                if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())) == 0) || $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->isGrantedAffirmative(twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())))) {
                    // line 59
                    echo "                    <div class=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "class", array()), "html", null, true);
                    echo "\">
                        ";
                    // line 60
                    echo call_user_func_array($this->env->getFunction('sonata_block_render')->getCallable(), array(array("type" => twig_get_attribute($this->env, $this->source, $context["block"], "type", array()), "settings" => twig_get_attribute($this->env, $this->source, $context["block"], "settings", array()))));
                    echo "
                    </div>
                ";
                }
                // line 63
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "        </div>
    ";
        }
        // line 66
        echo "
    <div class=\"row\">
        ";
        // line 68
        $context["width_left"] = 4;
        // line 69
        echo "        ";
        $context["width_right"] = 4;
        // line 70
        echo "        ";
        $context["width_center"] = 4;
        // line 71
        echo "
        ";
        // line 73
        echo "        ";
        if ( !(isset($context["has_center"]) || array_key_exists("has_center", $context) ? $context["has_center"] : (function () { throw new Twig_Error_Runtime('Variable "has_center" does not exist.', 73, $this->source); })())) {
            // line 74
            echo "            ";
            $context["width_left"] = 6;
            // line 75
            echo "            ";
            $context["width_right"] = 6;
            // line 76
            echo "        ";
        }
        // line 77
        echo "
        ";
        // line 79
        echo "        ";
        if (( !(isset($context["has_left"]) || array_key_exists("has_left", $context) ? $context["has_left"] : (function () { throw new Twig_Error_Runtime('Variable "has_left" does not exist.', 79, $this->source); })()) &&  !(isset($context["has_right"]) || array_key_exists("has_right", $context) ? $context["has_right"] : (function () { throw new Twig_Error_Runtime('Variable "has_right" does not exist.', 79, $this->source); })()))) {
            // line 80
            echo "            ";
            $context["width_center"] = 12;
            // line 81
            echo "        ";
        }
        // line 82
        echo "
        ";
        // line 84
        echo "        ";
        if (((isset($context["has_left"]) || array_key_exists("has_left", $context) ? $context["has_left"] : (function () { throw new Twig_Error_Runtime('Variable "has_left" does not exist.', 84, $this->source); })()) || (isset($context["has_right"]) || array_key_exists("has_right", $context) ? $context["has_right"] : (function () { throw new Twig_Error_Runtime('Variable "has_right" does not exist.', 84, $this->source); })()))) {
            // line 85
            echo "        <div class=\"col-md-";
            echo twig_escape_filter($this->env, (isset($context["width_left"]) || array_key_exists("width_left", $context) ? $context["width_left"] : (function () { throw new Twig_Error_Runtime('Variable "width_left" does not exist.', 85, $this->source); })()), "html", null, true);
            echo "\">
            ";
            // line 86
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["blocks"]) || array_key_exists("blocks", $context) ? $context["blocks"] : (function () { throw new Twig_Error_Runtime('Variable "blocks" does not exist.', 86, $this->source); })()), "left", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
                // line 87
                echo "                ";
                if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())) == 0) || $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->isGrantedAffirmative(twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())))) {
                    // line 88
                    echo "                    ";
                    echo call_user_func_array($this->env->getFunction('sonata_block_render')->getCallable(), array(array("type" => twig_get_attribute($this->env, $this->source, $context["block"], "type", array()), "settings" => twig_get_attribute($this->env, $this->source, $context["block"], "settings", array()))));
                    echo "
                ";
                }
                // line 90
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 91
            echo "        </div>
        ";
        }
        // line 93
        echo "
        ";
        // line 94
        if ((isset($context["has_center"]) || array_key_exists("has_center", $context) ? $context["has_center"] : (function () { throw new Twig_Error_Runtime('Variable "has_center" does not exist.', 94, $this->source); })())) {
            // line 95
            echo "            <div class=\"col-md-";
            echo twig_escape_filter($this->env, (isset($context["width_center"]) || array_key_exists("width_center", $context) ? $context["width_center"] : (function () { throw new Twig_Error_Runtime('Variable "width_center" does not exist.', 95, $this->source); })()), "html", null, true);
            echo "\">
                ";
            // line 96
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["blocks"]) || array_key_exists("blocks", $context) ? $context["blocks"] : (function () { throw new Twig_Error_Runtime('Variable "blocks" does not exist.', 96, $this->source); })()), "center", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
                // line 97
                echo "                    ";
                if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())) == 0) || $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->isGrantedAffirmative(twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())))) {
                    // line 98
                    echo "                        ";
                    echo call_user_func_array($this->env->getFunction('sonata_block_render')->getCallable(), array(array("type" => twig_get_attribute($this->env, $this->source, $context["block"], "type", array()), "settings" => twig_get_attribute($this->env, $this->source, $context["block"], "settings", array()))));
                    echo "
                    ";
                }
                // line 100
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 101
            echo "            </div>
        ";
        }
        // line 103
        echo "
        ";
        // line 105
        echo "        ";
        if (((isset($context["has_left"]) || array_key_exists("has_left", $context) ? $context["has_left"] : (function () { throw new Twig_Error_Runtime('Variable "has_left" does not exist.', 105, $this->source); })()) || (isset($context["has_right"]) || array_key_exists("has_right", $context) ? $context["has_right"] : (function () { throw new Twig_Error_Runtime('Variable "has_right" does not exist.', 105, $this->source); })()))) {
            // line 106
            echo "         <div class=\"col-md-";
            echo twig_escape_filter($this->env, (isset($context["width_right"]) || array_key_exists("width_right", $context) ? $context["width_right"] : (function () { throw new Twig_Error_Runtime('Variable "width_right" does not exist.', 106, $this->source); })()), "html", null, true);
            echo "\">
            ";
            // line 107
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["blocks"]) || array_key_exists("blocks", $context) ? $context["blocks"] : (function () { throw new Twig_Error_Runtime('Variable "blocks" does not exist.', 107, $this->source); })()), "right", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
                // line 108
                echo "                ";
                if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())) == 0) || $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->isGrantedAffirmative(twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())))) {
                    // line 109
                    echo "                    ";
                    echo call_user_func_array($this->env->getFunction('sonata_block_render')->getCallable(), array(array("type" => twig_get_attribute($this->env, $this->source, $context["block"], "type", array()), "settings" => twig_get_attribute($this->env, $this->source, $context["block"], "settings", array()))));
                    echo "
                ";
                }
                // line 111
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            echo "        </div>
        ";
        }
        // line 114
        echo "    </div>

    ";
        // line 116
        if ((isset($context["has_bottom"]) || array_key_exists("has_bottom", $context) ? $context["has_bottom"] : (function () { throw new Twig_Error_Runtime('Variable "has_bottom" does not exist.', 116, $this->source); })())) {
            // line 117
            echo "        <div class=\"row\">
            ";
            // line 118
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["blocks"]) || array_key_exists("blocks", $context) ? $context["blocks"] : (function () { throw new Twig_Error_Runtime('Variable "blocks" does not exist.', 118, $this->source); })()), "bottom", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
                // line 119
                echo "                ";
                if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())) == 0) || $this->extensions['Sonata\AdminBundle\Twig\Extension\SonataAdminExtension']->isGrantedAffirmative(twig_get_attribute($this->env, $this->source, $context["block"], "roles", array())))) {
                    // line 120
                    echo "                    <div class=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["block"], "class", array()), "html", null, true);
                    echo "\">
                        ";
                    // line 121
                    echo call_user_func_array($this->env->getFunction('sonata_block_render')->getCallable(), array(array("type" => twig_get_attribute($this->env, $this->source, $context["block"], "type", array()), "settings" => twig_get_attribute($this->env, $this->source, $context["block"], "settings", array()))));
                    echo "
                    </div>
                ";
                }
                // line 124
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 125
            echo "        </div>
    ";
        }
        // line 127
        echo "
    ";
        // line 128
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("sonata.admin.dashboard.bottom", array("admin_pool" => twig_get_attribute($this->env, $this->source, (isset($context["sonata_admin"]) || array_key_exists("sonata_admin", $context) ? $context["sonata_admin"] : (function () { throw new Twig_Error_Runtime('Variable "sonata_admin" does not exist.', 128, $this->source); })()), "adminPool", array()))));
        echo "

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SonataAdmin/Core/dashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  435 => 128,  432 => 127,  428 => 125,  422 => 124,  416 => 121,  411 => 120,  408 => 119,  404 => 118,  401 => 117,  399 => 116,  395 => 114,  391 => 112,  385 => 111,  379 => 109,  376 => 108,  372 => 107,  367 => 106,  364 => 105,  361 => 103,  357 => 101,  351 => 100,  345 => 98,  342 => 97,  338 => 96,  333 => 95,  331 => 94,  328 => 93,  324 => 91,  318 => 90,  312 => 88,  309 => 87,  305 => 86,  300 => 85,  297 => 84,  294 => 82,  291 => 81,  288 => 80,  285 => 79,  282 => 77,  279 => 76,  276 => 75,  273 => 74,  270 => 73,  267 => 71,  264 => 70,  261 => 69,  259 => 68,  255 => 66,  251 => 64,  245 => 63,  239 => 60,  234 => 59,  231 => 58,  227 => 57,  224 => 56,  222 => 55,  217 => 53,  214 => 52,  208 => 51,  205 => 50,  202 => 49,  199 => 48,  194 => 47,  192 => 46,  189 => 45,  183 => 44,  180 => 43,  177 => 42,  174 => 41,  169 => 40,  167 => 39,  164 => 38,  158 => 37,  155 => 36,  152 => 35,  149 => 34,  144 => 33,  142 => 32,  139 => 31,  133 => 30,  130 => 29,  127 => 28,  124 => 27,  119 => 26,  117 => 25,  114 => 24,  108 => 23,  105 => 22,  102 => 21,  99 => 20,  94 => 19,  92 => 18,  89 => 17,  80 => 16,  63 => 15,  45 => 14,  24 => 12,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}

{% extends base_template %}

{% block title %}{{ 'title_dashboard'|trans({}, 'SonataAdminBundle') }}{% endblock%}
{% block breadcrumb %}{% endblock %}
{% block content %}

    {% set has_left = false %}
    {% for block in blocks.left %}
        {% if block.roles|length == 0 or is_granted_affirmative(block.roles) %}
            {% set has_left = true %}
        {% endif %}
    {% endfor %}

    {% set has_center = false %}
    {% for block in blocks.center %}
        {% if block.roles|length == 0 or is_granted_affirmative(block.roles) %}
            {% set has_center = true %}
        {% endif %}
    {% endfor %}

    {% set has_right = false %}
    {% for block in blocks.right %}
        {% if block.roles|length == 0 or is_granted_affirmative(block.roles) %}
            {% set has_right = true %}
        {% endif %}
    {% endfor %}

    {% set has_top = false %}
    {% for block in blocks.top %}
        {% if block.roles|length == 0 or is_granted_affirmative(block.roles) %}
            {% set has_top = true %}
        {% endif %}
    {% endfor %}

    {% set has_bottom = false %}
    {% for block in blocks.bottom %}
        {% if block.roles|length == 0 or is_granted_affirmative(block.roles) %}
            {% set has_bottom = true %}
        {% endif %}
    {% endfor %}

    {{ sonata_block_render_event('sonata.admin.dashboard.top', { 'admin_pool': sonata_admin.adminPool }) }}

    {% if has_top %}
        <div class=\"row\">
            {% for block in blocks.top %}
                {% if block.roles|length == 0 or is_granted_affirmative(block.roles) %}
                    <div class=\"{{ block.class }}\">
                        {{ sonata_block_render({ 'type': block.type, 'settings': block.settings}) }}
                    </div>
                {% endif %}
            {% endfor %}
        </div>
    {% endif %}

    <div class=\"row\">
        {% set width_left = 4 %}
        {% set width_right = 4 %}
        {% set width_center = 4 %}

        {# if center block is not present we make left and right ones wider #}
        {% if not has_center %}
            {% set width_left = 6 %}
            {% set width_right = 6 %}
        {% endif %}

        {# if there is no right and left block present we make center one full width #}
        {% if not has_left and not has_right %}
            {% set width_center = 12 %}
        {% endif %}

        {# don't show left column if only center one is present #}
        {% if has_left or has_right %}
        <div class=\"col-md-{{ width_left }}\">
            {% for block in blocks.left %}
                {% if block.roles|length == 0 or is_granted_affirmative(block.roles) %}
                    {{ sonata_block_render({ 'type': block.type, 'settings': block.settings}) }}
                {% endif %}
            {% endfor %}
        </div>
        {% endif %}

        {% if has_center %}
            <div class=\"col-md-{{ width_center }}\">
                {% for block in blocks.center %}
                    {% if block.roles|length == 0 or is_granted_affirmative(block.roles) %}
                        {{ sonata_block_render({ 'type': block.type, 'settings': block.settings}) }}
                    {% endif %}
                {% endfor %}
            </div>
        {% endif %}

        {# don't show right column if only center one is present #}
        {% if has_left or has_right %}
         <div class=\"col-md-{{ width_right }}\">
            {% for block in blocks.right %}
                {% if block.roles|length == 0 or is_granted_affirmative(block.roles) %}
                    {{ sonata_block_render({ 'type': block.type, 'settings': block.settings}) }}
                {% endif %}
            {% endfor %}
        </div>
        {% endif %}
    </div>

    {% if has_bottom %}
        <div class=\"row\">
            {% for block in blocks.bottom %}
                {% if block.roles|length == 0 or is_granted_affirmative(block.roles) %}
                    <div class=\"{{ block.class }}\">
                        {{ sonata_block_render({ 'type': block.type, 'settings': block.settings}) }}
                    </div>
                {% endif %}
            {% endfor %}
        </div>
    {% endif %}

    {{ sonata_block_render_event('sonata.admin.dashboard.bottom', { 'admin_pool': sonata_admin.adminPool }) }}

{% endblock %}
", "@SonataAdmin/Core/dashboard.html.twig", "/app/vendor/sonata-project/admin-bundle/src/Resources/views/Core/dashboard.html.twig");
    }
}
