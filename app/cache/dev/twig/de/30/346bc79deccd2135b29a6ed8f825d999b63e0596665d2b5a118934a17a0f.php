<?php

/* JennyStatBundle::layout.html.twig */
class __TwigTemplate_de30346bc79deccd2135b29a6ed8f825d999b63e0596665d2b5a118934a17a0f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheet' => array($this, 'block_stylesheet'),
            'body' => array($this, 'block_body'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset='utf-8' \" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 9
        echo "    <body>
        <nav class=\"navbar navbar-default\">
            <div class=\"container-fluid\">
                <div class=\"navbar-header\">
                    <a class=\"navbar-brand\" href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getUrl("_accueil");
        echo "\">Accueil</a>
                    <a class=\"navbar-brand\" href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getUrl("_import");
        echo "\">Import</a>
                    ";
        // line 15
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 16
            echo "                        <a class=\"navbar-brand\" href=\"";
            echo $this->env->getExtension('routing')->getUrl("_adminstat");
            echo "\">Stats</a>
                    ";
        }
        // line 18
        echo "                    <a class=\"navbar-brand\" href=\"";
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\" align=\"right\">Déconnexion</a>
                </div>
            </div>
        </nav>

        ";
        // line 23
        $this->displayBlock('body', $context, $blocks);
        // line 50
        echo "</body>
";
        // line 51
        $this->displayBlock('javascript', $context, $blocks);
        // line 54
        echo "</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Note de frais";
    }

    // line 6
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 7
        echo "            <link rel=\"stylesheet\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css\">
        ";
    }

    // line 23
    public function block_body($context, array $blocks = array())
    {
        // line 24
        echo "        <body>
            <div>
                ";
        // line 26
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 27
            echo "                    ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array())), "FOSUserBundle"), "html", null, true);
            echo " |
                    <a href=\"";
            // line 28
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">
                        ";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html", null, true);
            echo "
                    </a>
                ";
        } else {
            // line 32
            echo "                    <a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.login", array(), "FOSUserBundle"), "html", null, true);
            echo "</a>
                ";
        }
        // line 34
        echo "            </div>

            ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashBag", array()), "all", array()));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 37
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 38
                echo "                    <div class=\"";
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                        ";
                // line 39
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["message"], array(), "FOSUserBundle"), "html", null, true);
                echo "
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "
            <div>
                ";
        // line 45
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 47
        echo "            </div>
        </body
    ";
    }

    // line 45
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 46
        echo "                ";
    }

    // line 51
    public function block_javascript($context, array $blocks = array())
    {
        // line 52
        echo "
";
    }

    public function getTemplateName()
    {
        return "JennyStatBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 52,  176 => 51,  172 => 46,  169 => 45,  163 => 47,  161 => 45,  157 => 43,  151 => 42,  142 => 39,  137 => 38,  132 => 37,  128 => 36,  124 => 34,  116 => 32,  110 => 29,  106 => 28,  101 => 27,  99 => 26,  95 => 24,  92 => 23,  87 => 7,  84 => 6,  78 => 5,  74 => 54,  72 => 51,  69 => 50,  67 => 23,  58 => 18,  52 => 16,  50 => 15,  46 => 14,  42 => 13,  36 => 9,  34 => 6,  30 => 5,  24 => 1,);
    }
}
