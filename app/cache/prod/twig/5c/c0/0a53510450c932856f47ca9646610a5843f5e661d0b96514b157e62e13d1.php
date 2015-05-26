<?php

/* JennyImportBundle:import:view.html.twig */
class __TwigTemplate_5cc00a53510450c932856f47ca9646610a5843f5e661d0b96514b157e62e13d1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("JennyUserBundle::layout.html.twig", "JennyImportBundle:import:view.html.twig", 3);
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
        echo "    ";
        if ((isset($context["data"]) ? $context["data"] : null)) {
            // line 7
            echo "        <table class=\"table table-striped table-bordered table-hover\" style=\"width: 200px;\" align=\"center\">
            ";
            // line 8
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : null));
            foreach ($context['_seq'] as $context["keyr"] => $context["row"]) {
                // line 9
                echo "                <tr>
                    ";
                // line 10
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($context["row"]);
                foreach ($context['_seq'] as $context["keyc"] => $context["column"]) {
                    // line 11
                    echo "                        <td>";
                    echo twig_escape_filter($this->env, $context["keyc"], "html", null, true);
                    echo twig_escape_filter($this->env, $context["keyr"], "html", null, true);
                    echo " : ";
                    echo twig_escape_filter($this->env, $context["column"], "html", null, true);
                    echo " <td>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['keyc'], $context['column'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 13
                echo "                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['keyr'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "        </table>
    ";
        }
    }

    public function getTemplateName()
    {
        return "JennyImportBundle:import:view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 15,  60 => 13,  48 => 11,  44 => 10,  41 => 9,  37 => 8,  34 => 7,  31 => 6,  28 => 5,  11 => 3,);
    }
}
