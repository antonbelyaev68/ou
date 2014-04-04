<?php

/* SonataAdminBundle:Block:block_my_newsletter.html.twig */
class __TwigTemplate_3bb5fbb482f95a5f09309c9ebad64429ed510101a235bec3e8ed132f95c13ecf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'block' => array($this, 'block_block'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute($this->getAttribute((isset($context["sonata_block"]) ? $context["sonata_block"] : $this->getContext($context, "sonata_block")), "templates"), "block_base"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_block($context, array $blocks = array())
    {
        // line 4
        echo "<table class=\"table table-bordered table-striped sonata-ba-list\">
    <thead>
        <tr>
            <th colspan=\"3\">My block</th>
        </tr>
    </thead>
 
    <tbody>
        <tr>
            <td>
                <div class=\"btn-group\" align=\"center\">
                    <a class=\"btn btn-small\" href=\"#\">Servizio Newsletter</a>
                </div>
            </td>
        </tr>
    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Block:block_my_newsletter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 12,  27 => 13,  25 => 12,  20 => 11,  179 => 72,  173 => 71,  169 => 69,  163 => 68,  157 => 64,  153 => 62,  151 => 61,  145 => 59,  142 => 58,  139 => 57,  135 => 55,  124 => 52,  121 => 51,  117 => 50,  112 => 47,  110 => 46,  106 => 44,  102 => 42,  100 => 41,  94 => 39,  91 => 38,  89 => 37,  82 => 33,  78 => 31,  75 => 30,  71 => 29,  65 => 26,  62 => 25,  60 => 24,  57 => 23,  50 => 22,  47 => 21,  41 => 20,  38 => 19,  34 => 18,  29 => 4,  26 => 3,);
    }
}
