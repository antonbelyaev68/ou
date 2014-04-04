<?php

/* SonataAdminBundle:ListField:field_tree_up.html.twig */
class __TwigTemplate_6e49e8e10ba6ffa46d94ad2354c9f81c31b8ac7ee538ffd6259812fdcf7340e1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_list_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        ob_start();
        // line 5
        echo "        ";
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "parent"), "children"), 0, array(), "array"), "id") != $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id"))) {
            // line 6
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_tree_up", array("page_id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id"))), "html", null, true);
            echo "\">
                <img  height=\"30\" width=\"30\" src=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/arrow_up.png"), "html", null, true);
            echo "\" alt=\"";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Вверх", array(), "messages");
            echo "\" />
            </a>
        ";
        }
        // line 10
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:ListField:field_tree_up.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 10,  28 => 3,  81 => 20,  73 => 34,  67 => 32,  56 => 28,  48 => 25,  38 => 21,  36 => 20,  32 => 19,  30 => 13,  24 => 12,  21 => 11,  34 => 5,  31 => 4,  29 => 15,  26 => 14,  22 => 12,  19 => 11,  857 => 274,  854 => 273,  849 => 268,  845 => 266,  839 => 263,  836 => 262,  834 => 261,  829 => 259,  821 => 258,  818 => 257,  816 => 256,  813 => 255,  807 => 253,  805 => 252,  802 => 251,  796 => 249,  794 => 248,  791 => 247,  785 => 245,  783 => 244,  780 => 243,  774 => 241,  772 => 240,  769 => 239,  766 => 238,  762 => 221,  757 => 218,  751 => 216,  748 => 215,  745 => 214,  731 => 213,  725 => 211,  720 => 208,  714 => 206,  706 => 204,  704 => 203,  701 => 202,  698 => 201,  680 => 200,  677 => 199,  675 => 198,  671 => 196,  668 => 195,  665 => 194,  661 => 191,  658 => 190,  655 => 189,  651 => 280,  649 => 273,  644 => 270,  642 => 238,  638 => 237,  635 => 236,  629 => 233,  626 => 232,  624 => 231,  619 => 228,  613 => 225,  610 => 224,  608 => 223,  605 => 222,  603 => 194,  599 => 192,  596 => 189,  593 => 188,  588 => 179,  584 => 174,  569 => 168,  566 => 167,  563 => 166,  557 => 163,  553 => 162,  550 => 161,  544 => 160,  539 => 157,  533 => 156,  521 => 154,  518 => 153,  509 => 150,  504 => 148,  501 => 147,  498 => 146,  491 => 145,  488 => 144,  482 => 142,  476 => 141,  470 => 139,  467 => 137,  460 => 136,  457 => 135,  448 => 133,  443 => 132,  440 => 131,  437 => 130,  431 => 129,  425 => 175,  423 => 166,  419 => 164,  416 => 163,  411 => 129,  399 => 124,  392 => 120,  386 => 119,  381 => 118,  378 => 117,  371 => 182,  367 => 180,  365 => 179,  362 => 178,  357 => 125,  355 => 124,  352 => 123,  350 => 117,  343 => 115,  341 => 114,  330 => 105,  310 => 80,  300 => 78,  297 => 77,  291 => 75,  289 => 74,  284 => 72,  279 => 70,  274 => 68,  270 => 67,  266 => 66,  260 => 63,  256 => 61,  250 => 60,  242 => 59,  238 => 57,  235 => 56,  228 => 52,  220 => 49,  205 => 38,  203 => 37,  193 => 33,  184 => 30,  181 => 29,  178 => 28,  165 => 281,  163 => 188,  157 => 104,  154 => 103,  150 => 101,  146 => 99,  140 => 97,  123 => 95,  99 => 91,  96 => 90,  93 => 89,  85 => 86,  80 => 84,  60 => 22,  57 => 21,  55 => 20,  53 => 27,  51 => 26,  49 => 17,  43 => 14,  41 => 13,  37 => 6,  609 => 190,  598 => 188,  594 => 187,  586 => 184,  581 => 182,  575 => 170,  573 => 179,  567 => 175,  558 => 172,  554 => 171,  548 => 170,  545 => 169,  541 => 168,  536 => 166,  529 => 164,  524 => 162,  517 => 161,  514 => 152,  511 => 159,  506 => 149,  502 => 140,  499 => 139,  495 => 138,  492 => 137,  489 => 136,  485 => 143,  481 => 128,  478 => 127,  473 => 140,  462 => 108,  458 => 107,  451 => 134,  447 => 102,  442 => 101,  439 => 100,  427 => 89,  424 => 88,  418 => 113,  415 => 112,  413 => 130,  409 => 98,  407 => 127,  404 => 126,  401 => 86,  396 => 141,  394 => 136,  388 => 132,  384 => 130,  382 => 127,  379 => 126,  374 => 123,  360 => 126,  351 => 121,  334 => 120,  329 => 119,  327 => 104,  323 => 116,  320 => 115,  317 => 101,  314 => 85,  312 => 84,  307 => 82,  304 => 79,  301 => 80,  296 => 77,  281 => 75,  278 => 74,  275 => 73,  258 => 72,  255 => 71,  252 => 70,  246 => 66,  240 => 65,  237 => 64,  233 => 62,  229 => 61,  224 => 51,  218 => 59,  206 => 58,  204 => 57,  201 => 56,  198 => 35,  195 => 54,  192 => 53,  189 => 32,  186 => 51,  183 => 50,  180 => 49,  177 => 48,  174 => 47,  172 => 22,  168 => 44,  162 => 40,  159 => 186,  155 => 38,  151 => 36,  148 => 35,  143 => 98,  136 => 155,  133 => 154,  131 => 153,  128 => 152,  122 => 149,  119 => 93,  116 => 92,  112 => 145,  110 => 144,  107 => 143,  105 => 80,  102 => 79,  100 => 70,  97 => 69,  95 => 35,  92 => 34,  87 => 28,  82 => 31,  79 => 30,  76 => 35,  74 => 56,  71 => 55,  69 => 28,  64 => 24,  61 => 29,  58 => 22,  52 => 20,  47 => 16,  45 => 24,  42 => 7,  39 => 12,);
    }
}
