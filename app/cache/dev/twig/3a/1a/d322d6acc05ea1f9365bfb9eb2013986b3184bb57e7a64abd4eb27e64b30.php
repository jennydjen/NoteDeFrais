<?php

/* JennyUserBundle::layout.html.twig */
class __TwigTemplate_3a1ad322d6acc05ea1f9365bfb9eb2013986b3184bb57e7a64abd4eb27e64b30 extends Twig_Template
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
                    ";
        // line 13
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 14
            echo "                        <a class=\"navbar-brand\" href=\"";
            echo $this->env->getExtension('routing')->getUrl("_accueil");
            echo "\">Accueil</a>
                        <a class=\"navbar-brand\" href=\"";
            // line 15
            echo $this->env->getExtension('routing')->getUrl("_import");
            echo "\">Import</a>
                        ";
            // line 16
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                // line 17
                echo "                            <a class=\"navbar-brand\" href=\"";
                echo $this->env->getExtension('routing')->getUrl("_adminstat");
                echo "\">Statistiques</a>
                        ";
            } else {
                // line 19
                echo "                            <a class=\"navbar-brand\" href=\"";
                echo $this->env->getExtension('routing')->getUrl("_stat");
                echo "\">Statistiques</a>
                        ";
            }
            // line 21
            echo "                        <a class=\"navbar-brand\" href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\" align=\"right\">Déconnexion</a>
                    ";
        } else {
            // line 23
            echo "                        <a class=\"navbar-brand\" href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\" align=\"right\">Connexion</a>
                        <a class=\"navbar-brand\" href=\"";
            // line 24
            echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
            echo "\" align=\"right\">Inscription</a>
                    ";
        }
        // line 26
        echo "                </div>
            </div>
        </nav>

        ";
        // line 30
        $this->displayBlock('body', $context, $blocks);
        // line 57
        echo "</body>
";
        // line 58
        $this->displayBlock('javascript', $context, $blocks);
        // line 61
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

    // line 30
    public function block_body($context, array $blocks = array())
    {
        // line 31
        echo "        <body>
            <div>
                ";
        // line 33
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 34
            echo "                    ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array())), "FOSUserBundle"), "html", null, true);
            echo " |
                    <a href=\"";
            // line 35
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">
                        ";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html", null, true);
            echo "
                    </a>
                ";
        } else {
            // line 39
            echo "                    <a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.login", array(), "FOSUserBundle"), "html", null, true);
            echo "</a>
                ";
        }
        // line 41
        echo "            </div>

            ";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashBag", array()), "all", array()));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 44
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 45
                echo "                    <div class=\"";
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                        ";
                // line 46
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["message"], array(), "FOSUserBundle"), "html", null, true);
                echo "
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "
            <div>
                ";
        // line 52
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 54
        echo "            </div>
        </body
    ";
    }

    // line 52
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 53
        echo "                ";
    }

    // line 58
    public function block_javascript($context, array $blocks = array())
    {
        // line 59
        echo "
";
    }

    public function getTemplateName()
    {
        return "JennyUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  201 => 59,  198 => 58,  194 => 53,  191 => 52,  185 => 54,  183 => 52,  179 => 50,  173 => 49,  164 => 46,  159 => 45,  154 => 44,  150 => 43,  146 => 41,  138 => 39,  132 => 36,  128 => 35,  123 => 34,  121 => 33,  117 => 31,  114 => 30,  109 => 7,  106 => 6,  100 => 5,  96 => 61,  94 => 58,  91 => 57,  89 => 30,  83 => 26,  78 => 24,  73 => 23,  67 => 21,  61 => 19,  55 => 17,  53 => 16,  49 => 15,  44 => 14,  42 => 13,  36 => 9,  34 => 6,  30 => 5,  24 => 1,);
    }
}
