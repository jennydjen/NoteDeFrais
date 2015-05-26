<?php

/* JennyUserBundle:Security:login.html.twig */
class __TwigTemplate_8e13e7818ac114f83b70e6380c08f5f8deb5022a1a4d6ba10ccc31bc8ac958ee extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("JennyUserBundle::layout.html.twig", "JennyUserBundle:Security:login.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "JennyUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
    ";
        // line 6
        echo "    ";
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 7
            echo "        <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "message", array()), "html", null, true);
            echo "</div>
    ";
        }
        // line 9
        echo "
    ";
        // line 11
        echo "    <form action=\"";
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">
        <table class=\"table table-striped table-bordered table-hover\" style=\"width: 200px;\" align=\"center\">
            <tr>
                <td><label for=\"username\">Login :</label></td>
            </tr>
            <tr>
                <td><input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" /></td>
            </tr>
            <tr>
                <td><label for=\"password\">Mot de passe :</label></td>
            </tr>
            <tr>
                <td><input type=\"password\" id=\"password\" name=\"_password\" /></td>
            </tr>
            <tr>
                <td align=\"right\"><input type=\"submit\" value=\"Connexion\" /></td>
            </tr>
        </table>
    </form>
";
    }

    public function getTemplateName()
    {
        return "JennyUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 17,  46 => 11,  43 => 9,  37 => 7,  34 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
