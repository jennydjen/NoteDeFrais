<?php

/* JennyImportBundle:import:check.html.twig */
class __TwigTemplate_b4721077b5bf1fdfc76140cd501127613b9e16a5763c25895ef3baea941e12d1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("JennyUserBundle::layout.html.twig", "JennyImportBundle:import:check.html.twig", 1);
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
    <form action=\"#\" method=\"post\">
        <table class=\"table table-striped table-bordered table-hover\" style=\"width: 200px;\" align=\"center\">
            <tr>
                <td>Les notes de frais de cette semaine ont déjà été importé. Que voulez-vous faire ? </td>
            </tr>    

            <tr>
                <td><input type=\"radio\" name=\"choix\" id=\"remplacer\" value=\"replace\">Remplacer</td>
            </tr>    
            <tr>
                <td><input type=\"radio\" name=\"choix\" id=\"nothing\" value=\"nothing\" checked>Ne rien faire</td>
            </tr>   
            <tr>
                <td><input type=\"submit\" value=\"Valider\" name=\"submit\"></td>
            </tr>
        </table>
    </form>
";
    }

    public function getTemplateName()
    {
        return "JennyImportBundle:import:check.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }
}
