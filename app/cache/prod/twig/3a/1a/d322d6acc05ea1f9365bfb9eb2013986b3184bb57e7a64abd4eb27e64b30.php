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
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 13
        echo "    </body>
    ";
        // line 14
        $this->displayBlock('javascript', $context, $blocks);
        // line 17
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

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 11
        echo "
        ";
    }

    // line 14
    public function block_javascript($context, array $blocks = array())
    {
        // line 15
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "JennyUserBundle::layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  74 => 15,  71 => 14,  66 => 11,  63 => 10,  58 => 7,  55 => 6,  49 => 5,  45 => 17,  43 => 14,  40 => 13,  38 => 10,  35 => 9,  33 => 6,  29 => 5,  23 => 1,);
    }
}
