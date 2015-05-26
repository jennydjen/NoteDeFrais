<?php

/* JennyUserBundle:Accueil:accueil.html.twig */
class __TwigTemplate_04abecfbc63cc7a1ccda026071130d89f161cdd0bdbb9c61f73359fbade30718 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("JennyUserBundle::layout.html.twig", "JennyUserBundle:Accueil:accueil.html.twig", 1);
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
        echo "    <h1>Bienvenue sur mon site de note de frais : ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "prenom", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "nom", array()), "html", null, true);
        echo "</h1>

    <p align='center'>
        <img src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/image02.png"), "html", null, true);
        echo "\" alt=\"Excel\"  />
        <img src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/image01.jpg"), "html", null, true);
        echo "\" alt=\"Statistique de note de frais\"/>
    </p>

";
    }

    public function getTemplateName()
    {
        return "JennyUserBundle:Accueil:accueil.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 8,  40 => 7,  31 => 4,  28 => 3,  11 => 1,);
    }
}
