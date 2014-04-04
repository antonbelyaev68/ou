<?php

/* SonataBlockBundle:Block:block_base.html.twig */
class __TwigTemplate_6d08adf888388017e30991461901bf0aaa0fee40eb3553eb63e6626fb0ed0c95 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'block' => array($this, 'block_block'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        echo "<div id=\"cms-block-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "id"), "html", null, true);
        echo "\" class=\"cms-block cms-block-element\">
    ";
        // line 12
        $this->displayBlock('block', $context, $blocks);
        // line 13
        echo "</div>
";
    }

    // line 12
    public function block_block($context, array $blocks = array())
    {
        echo "EMPTY CONTENT";
    }

    public function getTemplateName()
    {
        return "SonataBlockBundle:Block:block_base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 12,  27 => 13,  25 => 12,  20 => 11,  179 => 72,  173 => 71,  169 => 69,  163 => 68,  157 => 64,  153 => 62,  151 => 61,  145 => 59,  142 => 58,  139 => 57,  135 => 55,  124 => 52,  121 => 51,  117 => 50,  112 => 47,  110 => 46,  106 => 44,  102 => 42,  100 => 41,  94 => 39,  91 => 38,  89 => 37,  82 => 33,  78 => 31,  75 => 30,  71 => 29,  65 => 26,  62 => 25,  60 => 24,  57 => 23,  50 => 22,  47 => 21,  41 => 20,  38 => 19,  34 => 18,  29 => 15,  26 => 14,);
    }
}
