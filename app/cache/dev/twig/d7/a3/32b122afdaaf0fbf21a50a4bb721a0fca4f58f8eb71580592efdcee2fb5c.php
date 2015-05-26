<?php

/* JennyImportBundle:import:import.html.twig */
class __TwigTemplate_d7a332b122afdaaf0fbf21a50a4bb721a0fca4f58f8eb71580592efdcee2fb5c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("JennyUserBundle::layout.html.twig", "JennyImportBundle:import:import.html.twig", 3);
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

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "
    ";
        // line 8
        echo "    ";
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 9
            echo "        <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
            echo "</div>
    ";
        }
        // line 11
        echo "
    ";
        // line 13
        echo "    ";
        if ((isset($context["message"]) ? $context["message"] : $this->getContext($context, "message"))) {
            // line 14
            echo "        <div class=\"alert alert-success\">";
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
            echo "</div>
    ";
        }
        // line 16
        echo "    
    ";
        // line 17
        if ((isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning"))) {
            // line 18
            echo "        <div class=\"alert alert-warning\">";
            echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : $this->getContext($context, "warning")), "html", null, true);
            echo "</div>
    ";
        }
        // line 20
        echo "
    ";
        // line 22
        echo "    <form action=\"import\" method=\"post\" enctype=\"multipart/form-data\">
        <table class=\"table table-striped table-bordered table-hover\" style=\"width: 200px;\" align=\"center\">
            <tr>
                <td>Sélectionnez le fichier à charger: </td>
            </tr>    

            <tr>
                <td><input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\"></td>
            </tr>    

            <tr>
                <td><input type=\"submit\" value=\"Charger le fichier\" name=\"submit\"></td>
            </tr>
        </table>
    </form>
";
    }

    public function getTemplateName()
    {
        return "JennyImportBundle:import:import.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 22,  66 => 20,  60 => 18,  58 => 17,  55 => 16,  49 => 14,  46 => 13,  43 => 11,  37 => 9,  34 => 8,  31 => 6,  28 => 5,  11 => 3,);
    }
}
