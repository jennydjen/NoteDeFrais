<?php

/* JennyStatBundle:Stats:stats.html.twig */
class __TwigTemplate_d180f1d4135c2d04f35fde86f24f53619f8cae06830911bda327eb30bdcc4c68 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("JennyUserBundle::layout.html.twig", "JennyStatBundle:Stats:stats.html.twig", 1);
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
        echo "    ";
        // line 5
        echo "    <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js\" type=\"text/javascript\"></script>

    <script src=\"//code.highcharts.com/4.0.1/highcharts.js\"></script>
    <script src=\"//code.highcharts.com/4.0.1/modules/exporting.js\"></script>
    <script type=\"text/javascript\">
        ";
        // line 10
        echo $this->env->getExtension('highcharts_extension')->chart((isset($context["chart"]) ? $context["chart"] : $this->getContext($context, "chart")));
        echo "
    </script>

    <form action=\"#\" method=\"post\">
        <table class=\"table table-striped table-bordered table-hover\" style=\"width: 50%;\" align=\"center\">
            <tr>
                <td>Période</td>
                <td>Du <input type=\"date\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["dateDebut"]) ? $context["dateDebut"] : $this->getContext($context, "dateDebut")), "html", null, true);
        echo "\" name=\"dateDebut\" style=\"height: 20px\"></td>
                <td>au <input type=\"date\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["dateFin"]) ? $context["dateFin"] : $this->getContext($context, "dateFin")), "html", null, true);
        echo "\" name=\"dateFin\" style=\"height: 20px\"></td>
            </tr>
            <tr>
                <td>Filtre</td>
                ";
        // line 22
        if ((isset($context["users"]) ? $context["users"] : $this->getContext($context, "users"))) {
            // line 23
            echo "                    <td>Utilisateur 
                        <select name=\"choixUser\">
                            <option value=\"0\"></option>
                            ";
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : $this->getContext($context, "users")));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                echo "         
                                ";
                // line 27
                if (((isset($context["idUser"]) ? $context["idUser"] : $this->getContext($context, "idUser")) == $this->getAttribute($context["user"], "id", array()))) {
                    // line 28
                    echo "                                    <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
                    echo "\" selected>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "prenom", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "nom", array()), "html", null, true);
                    echo "</option>
                                ";
                } else {
                    // line 30
                    echo "                                    <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "prenom", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "nom", array()), "html", null, true);
                    echo "</option>
                                ";
                }
                // line 32
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "                        </select>
                    </td>
                ";
        } else {
            // line 36
            echo "                    <td></td>
                ";
        }
        // line 38
        echo "                <td>Catégorie
                    <select name=\"choixCategory\">
                        <option value=\"0\"></option>
                        ";
        // line 41
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : $this->getContext($context, "categories")));
        foreach ($context['_seq'] as $context["_key"] => $context["categorie"]) {
            // line 42
            echo "                            ";
            if (($this->getAttribute($context["categorie"], "num", array()) == 1)) {
                // line 43
                echo "                                ";
                if (((isset($context["typeCategory"]) ? $context["typeCategory"] : $this->getContext($context, "typeCategory")) == 1)) {
                    // line 44
                    echo "                                    ";
                    if (($this->getAttribute($context["categorie"], "parent", array()) == null)) {
                        // line 45
                        echo "                                        ";
                        if (((isset($context["idCategory"]) ? $context["idCategory"] : $this->getContext($context, "idCategory")) == $this->getAttribute($context["categorie"], "id", array()))) {
                            // line 46
                            echo "                                            <option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["categorie"], "id", array()), "html", null, true);
                            echo "\" selected>";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["categorie"], "nom", array()), "html", null, true);
                            echo "</option>
                                        ";
                        } else {
                            // line 48
                            echo "                                            <option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["categorie"], "id", array()), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["categorie"], "nom", array()), "html", null, true);
                            echo "</option>
                                        ";
                        }
                        // line 50
                        echo "                                    ";
                    }
                    // line 51
                    echo "                                ";
                } else {
                    echo "  
                                    ";
                    // line 52
                    if ($this->getAttribute($context["categorie"], "parent", array())) {
                        // line 53
                        echo "                                        ";
                        if (((isset($context["idCategory"]) ? $context["idCategory"] : $this->getContext($context, "idCategory")) == $this->getAttribute($context["categorie"], "id", array()))) {
                            // line 54
                            echo "                                            <option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["categorie"], "id", array()), "html", null, true);
                            echo "\" selected>";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["categorie"], "nom", array()), "html", null, true);
                            echo "</option>
                                        ";
                        } else {
                            // line 56
                            echo "                                            <option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["categorie"], "id", array()), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["categorie"], "nom", array()), "html", null, true);
                            echo "</option>
                                        ";
                        }
                        // line 58
                        echo "                                    ";
                    }
                    // line 59
                    echo "                                ";
                }
                // line 60
                echo "                            ";
            }
            // line 61
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categorie'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    ";
        // line 68
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 69
            echo "                        ";
            if (((isset($context["typeCategory"]) ? $context["typeCategory"] : $this->getContext($context, "typeCategory")) == 1)) {
                // line 70
                echo "                            <input type=\"radio\" name=\"typeCategory\" value=\"1\" checked>
                        ";
            } else {
                // line 72
                echo "                            <input type=\"radio\" name=\"typeCategory\" value=\"1\">
                        ";
            }
            // line 74
            echo "                        Sur Catégorie
                        ";
            // line 75
            if (((isset($context["typeCategory"]) ? $context["typeCategory"] : $this->getContext($context, "typeCategory")) == 2)) {
                // line 76
                echo "                            <input type=\"radio\" name=\"typeCategory\" value=\"2\" checked>
                        ";
            } else {
                // line 78
                echo "                            <input type=\"radio\" name=\"typeCategory\" value=\"2\">
                        ";
            }
            // line 80
            echo "                        Sous Catégorie
                    ";
        }
        // line 82
        echo "                </td>
                <td align=\"right\"><input type=\"submit\" value=\"Afficher\"></td>
            </tr>
        </table>
        <div id=\"barchart\" align=\"right\" style=\"width: 100%; height: 400px;\"></div>
    </form>


";
    }

    public function getTemplateName()
    {
        return "JennyStatBundle:Stats:stats.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  230 => 82,  226 => 80,  222 => 78,  218 => 76,  216 => 75,  213 => 74,  209 => 72,  205 => 70,  202 => 69,  200 => 68,  192 => 62,  186 => 61,  183 => 60,  180 => 59,  177 => 58,  169 => 56,  161 => 54,  158 => 53,  156 => 52,  151 => 51,  148 => 50,  140 => 48,  132 => 46,  129 => 45,  126 => 44,  123 => 43,  120 => 42,  116 => 41,  111 => 38,  107 => 36,  102 => 33,  96 => 32,  86 => 30,  76 => 28,  74 => 27,  68 => 26,  63 => 23,  61 => 22,  54 => 18,  50 => 17,  40 => 10,  33 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
