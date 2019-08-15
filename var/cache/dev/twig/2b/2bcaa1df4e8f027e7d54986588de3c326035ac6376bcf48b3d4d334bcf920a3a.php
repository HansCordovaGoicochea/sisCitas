<?php

/* @PrestaShop/Admin/Product/CatalogPage/Lists/list.html.twig */
class __TwigTemplate_6039e3f808b55cf2aab8e45784682f17a9f6f14359063abdb7d07505578d04fd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'product_catalog_form_table_row' => array($this, 'block_product_catalog_form_table_row'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Product/CatalogPage/Lists/list.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Product/CatalogPage/Lists/list.html.twig"));

        // line 25
        echo "<tbody
    ";
        // line 26
        if (((isset($context["activate_drag_and_drop"]) ? $context["activate_drag_and_drop"] : $this->getContext($context, "activate_drag_and_drop")) && (isset($context["has_category_filter"]) ? $context["has_category_filter"] : $this->getContext($context, "has_category_filter")))) {
            echo "class=\"sortable\"";
        }
        // line 27
        echo "    last_sql=\"";
        echo twig_escape_filter($this->env, (isset($context["last_sql_query"]) ? $context["last_sql_query"] : $this->getContext($context, "last_sql_query")), "html_attr");
        echo "\"
>
    ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")));
        $context['_iterated'] = false;
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 30
            echo "    ";
            $this->displayBlock('product_catalog_form_table_row', $context, $blocks);
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 176
            echo "<tr><td colspan=\"11\">
        ";
            // line 177
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("There is no result for this search. Update your filters to view other products.", array(), "Admin.Catalog.Notification"), "html", null, true);
            echo "
    </td></tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 30
    public function block_product_catalog_form_table_row($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "product_catalog_form_table_row"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "product_catalog_form_table_row"));

        // line 32
        echo "    <tr data-uniturl=\"";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "unit_action_url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "unit_action_url", array()), "#")) : ("#")), "html", null, true);
        echo "\" data-product-id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id_product", array()), "html", null, true);
        echo "\" ";
        if (($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "sav_quantity", array()) <= $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "low_stock_threshold", array()))) {
            echo " style=\"background: #fde1e1\" ";
        }
        echo ">
        <td class=\"checkbox-column form-group\">
            <div class=\"md-checkbox md-checkbox-inline\">
                <label>
                    <input type=\"checkbox\" id=\"bulk_action_selected_products-";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id_product", array()), "html", null, true);
        echo "\" name=\"bulk_action_selected_products[]\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id_product", array()), "html", null, true);
        echo "\">
                    <i class=\"md-checkbox-control\"></i>
                </label>
            </div>
        </td>
        <td>
            <label class=\"form-check-label\" for=\"bulk_action_selected_products-";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id_product", array()), "html", null, true);
        echo "\">
                ";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id_product", array()), "html", null, true);
        echo "
            </label>
        </td>
        <td>
            <a href=\"";
        // line 47
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "url", array()), "")) : ("")), "html", null, true);
        echo "#tab-step1\">";
        echo $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "image", array());
        echo "</a>
        </td>
        <td>
            <a href=\"";
        // line 50
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "url", array()), "")) : ("")), "html", null, true);
        echo "#tab-step1\">";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "name", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "name", array()), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("N/A", array(), "Admin.Global"))) : ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("N/A", array(), "Admin.Global"))), "html", null, true);
        echo "</a>
        </td>
        <td>
            ";
        // line 53
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "reference", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "reference", array()), "")) : ("")), "html", null, true);
        echo "
        </td>
        <td>
            ";
        // line 56
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "name_category", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "name_category", array()), "")) : ("")), "html", null, true);
        echo "
        </td>
        <td>
            ";
        // line 59
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "name_manufacturer", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "name_manufacturer", array()), "")) : ("")), "html", null, true);
        echo "
        </td>
        <td class=\"text-center\">
            <a href=\"";
        // line 62
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "url", array()), "")) : ("")), "html", null, true);
        echo "#tab-step2\">";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "price_final", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "price_final", array()), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("N/A", array(), "Admin.Global"))) : ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("N/A", array(), "Admin.Global"))), "html", null, true);
        echo "</a>
        </td>

        ";
        // line 65
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 66
            echo "            <style>
                .badge.badge-danger{
                    background-color: #fa0013;
                    padding: 1px 5px;
                    font-weight: normal;
                    font-size: 1em;
                    line-height: inherit;
                    letter-spacing: .0625em;
                    display: inline-block;
                    min-width: 10px;
                    color: #fff;
                    vertical-align: baseline;
                    white-space: nowrap;
                    text-align: center;
                    border-radius: 10px;
                }
                .product-sav-quantity .stock-warning.ico {
                    border: 1px solid #c05c67;
                    background: #ebcace;
                    padding: 0 5px;
                    cursor: pointer;
                }

                .product-sav-quantity .stock-warning {
                    color: #c05c67;
                    font-weight: 700;
                }
            </style>
            <td class=\"product-sav-quantity text-center\" data-product-quantity-value=\"";
            // line 94
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "sav_quantity", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "sav_quantity", array()), "")) : ("")), "html", null, true);
            echo "\">
                <a href=\"";
            // line 95
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "url", array()), "")) : ("")), "html", null, true);
            echo "#tab-step3\" ";
            if (($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "sav_quantity", array()) <= $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "low_stock_threshold", array()))) {
                echo " class=\"badge badge-danger\" ";
            }
            echo " >
                    ";
            // line 96
            if (($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "sav_quantity", array(), "any", true, true) && ($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "sav_quantity", array()) > 0))) {
                // line 97
                echo "                        ";
                echo twig_escape_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\DataFormatterExtension')->intCast($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "sav_quantity", array())), "html", null, true);
                echo "
                    ";
            } else {
                // line 99
                echo "                        ";
                echo twig_escape_filter($this->env, _twig_default_filter($this->env->getExtension('PrestaShopBundle\Twig\DataFormatterExtension')->intCast($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "sav_quantity", array())), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("N/A", array(), "Admin.Global")), "html", null, true);
                echo "
                    ";
            }
            // line 101
            echo "
                </a>
                ";
            // line 103
            if (($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "sav_quantity", array()) <= $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "low_stock_threshold", array()))) {
                // line 104
                echo "                <span data-toggle=\"pstooltip\" data-placement=\"top\" data-html=\"true\" title=\"\" class=\"stock-warning ico ml-2\" data-original-title=\"<div class=&quot;text-sm-left&quot;>
                <p>Este producto se encuentra por debajo del nivel de stock más bajo que has definido.</p>
                <p><strong>Nivel de stock bajo: ";
                // line 106
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "low_stock_threshold", array()), "html", null, true);
                echo "</strong></p>
              </div>\">!</span>
                ";
            }
            // line 109
            echo "            </td>
        ";
        } else {
            // line 111
            echo "            <td></td>
        ";
        }
        // line 113
        echo "        <td class=\"text-center\">
            ";
        // line 114
        if (((($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "active", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "active", array()), 0)) : (0)) == 0)) {
            // line 115
            echo "                <a href=\"#\" onclick=\"unitProductAction(this, 'activate'); return false;\">
                    <i class=\"material-icons action-disabled\">clear</i>
                </a>
            ";
        } else {
            // line 119
            echo "                <a href=\"#\" onclick=\"unitProductAction(this, 'deactivate'); return false;\">
                    <i class=\"material-icons action-enabled \">check</i>
                </a>
            ";
        }
        // line 123
        echo "        </td>
        ";
        // line 124
        if ($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "position", array(), "any", true, true)) {
            // line 125
            echo "            <td ";
            if ((isset($context["activate_drag_and_drop"]) ? $context["activate_drag_and_drop"] : $this->getContext($context, "activate_drag_and_drop"))) {
                echo "class=\"placeholder\"";
            }
            echo " style=\"cursor: pointer; cursor: hand;\">
                ";
            // line 126
            if ((isset($context["activate_drag_and_drop"]) ? $context["activate_drag_and_drop"] : $this->getContext($context, "activate_drag_and_drop"))) {
                // line 127
                echo "                    <big><big>⇅</big></big>
                ";
            }
            // line 129
            echo "                <span class=\"position\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "position", array()), "html", null, true);
            echo "</span>
                <input type=\"hidden\" name=\"mass_edit_action_sorted_products[]\" value=\"";
            // line 130
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id_product", array()), "html", null, true);
            echo "\" />
                <input type=\"hidden\" name=\"mass_edit_action_sorted_positions[]\" value=\"";
            // line 131
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "position", array()), "html", null, true);
            echo "\" />
            </td>
        ";
        }
        // line 134
        echo "        <td class=\"text-right\">
            <div class=\"btn-group-action\">

                ";
        // line 137
        $context["buttons_action"] = array(0 => array("href" => (($this->getAttribute(        // line 139
(isset($context["product"]) ? $context["product"] : null), "preview_url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "preview_url", array()), "#")) : ("#")), "target" => "_blank", "icon" => "remove_red_eye", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Preview", array(), "Admin.Actions")));
        // line 145
        echo "
                ";
        // line 146
        $context["buttons_action"] = twig_array_merge((isset($context["buttons_action"]) ? $context["buttons_action"] : $this->getContext($context, "buttons_action")), array(0 => array("onclick" => "unitProductAction(this, 'duplicate');", "icon" => "content_copy", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Duplicate", array(), "Admin.Actions"))));
        // line 153
        echo "
                ";
        // line 154
        $context["buttons_action"] = twig_array_merge((isset($context["buttons_action"]) ? $context["buttons_action"] : $this->getContext($context, "buttons_action")), array(0 => array("onclick" => "unitProductAction(this, 'delete');", "icon" => "delete", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete", array(), "Admin.Actions"))));
        // line 161
        echo "
                ";
        // line 162
        $this->loadTemplate("@Product/CatalogPage/Forms/form_edit_dropdown.html.twig", "@PrestaShop/Admin/Product/CatalogPage/Lists/list.html.twig", 162)->display(array_merge($context, array("button_id" => (("product_list_id_" . $this->getAttribute(        // line 163
(isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id_product", array())) . "_menu"), "default_item" => array("href" => (($this->getAttribute(        // line 165
(isset($context["product"]) ? $context["product"] : null), "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "url", array()), "#")) : ("#")), "icon" => "mode_edit"), "right" => true, "items" =>         // line 169
(isset($context["buttons_action"]) ? $context["buttons_action"] : $this->getContext($context, "buttons_action")))));
        // line 171
        echo "            </div>
        </td>
    </tr>
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Product/CatalogPage/Lists/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  336 => 171,  334 => 169,  333 => 165,  332 => 163,  331 => 162,  328 => 161,  326 => 154,  323 => 153,  321 => 146,  318 => 145,  316 => 139,  315 => 137,  310 => 134,  304 => 131,  300 => 130,  295 => 129,  291 => 127,  289 => 126,  282 => 125,  280 => 124,  277 => 123,  271 => 119,  265 => 115,  263 => 114,  260 => 113,  256 => 111,  252 => 109,  246 => 106,  242 => 104,  240 => 103,  236 => 101,  230 => 99,  224 => 97,  222 => 96,  214 => 95,  210 => 94,  180 => 66,  178 => 65,  170 => 62,  164 => 59,  158 => 56,  152 => 53,  144 => 50,  136 => 47,  129 => 43,  125 => 42,  114 => 36,  100 => 32,  91 => 30,  74 => 177,  71 => 176,  57 => 30,  39 => 29,  33 => 27,  29 => 26,  26 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *#}
<tbody
    {% if activate_drag_and_drop and has_category_filter %}class=\"sortable\"{% endif %}
    last_sql=\"{{ last_sql_query|escape('html_attr') }}\"
>
    {% for product in products %}
    {% block product_catalog_form_table_row %}
{#        {{ dump(product) }}#}
    <tr data-uniturl=\"{{ product.unit_action_url|default('#') }}\" data-product-id=\"{{ product.id_product }}\" {% if product.sav_quantity <= product.low_stock_threshold %} style=\"background: #fde1e1\" {% endif %}>
        <td class=\"checkbox-column form-group\">
            <div class=\"md-checkbox md-checkbox-inline\">
                <label>
                    <input type=\"checkbox\" id=\"bulk_action_selected_products-{{ product.id_product }}\" name=\"bulk_action_selected_products[]\" value=\"{{ product.id_product }}\">
                    <i class=\"md-checkbox-control\"></i>
                </label>
            </div>
        </td>
        <td>
            <label class=\"form-check-label\" for=\"bulk_action_selected_products-{{ product.id_product }}\">
                {{ product.id_product }}
            </label>
        </td>
        <td>
            <a href=\"{{ product.url|default('') }}#tab-step1\">{{ product.image|raw }}</a>
        </td>
        <td>
            <a href=\"{{ product.url|default('') }}#tab-step1\">{{ product.name|default('N/A'|trans({}, 'Admin.Global')) }}</a>
        </td>
        <td>
            {{ product.reference|default('') }}
        </td>
        <td>
            {{ product.name_category|default('') }}
        </td>
        <td>
            {{ product.name_manufacturer|default('') }}
        </td>
        <td class=\"text-center\">
            <a href=\"{{ product.url|default('') }}#tab-step2\">{{ product.price_final|default('N/A'|trans({}, 'Admin.Global')) }}</a>
        </td>

        {% if 'PS_STOCK_MANAGEMENT'|configuration %}
            <style>
                .badge.badge-danger{
                    background-color: #fa0013;
                    padding: 1px 5px;
                    font-weight: normal;
                    font-size: 1em;
                    line-height: inherit;
                    letter-spacing: .0625em;
                    display: inline-block;
                    min-width: 10px;
                    color: #fff;
                    vertical-align: baseline;
                    white-space: nowrap;
                    text-align: center;
                    border-radius: 10px;
                }
                .product-sav-quantity .stock-warning.ico {
                    border: 1px solid #c05c67;
                    background: #ebcace;
                    padding: 0 5px;
                    cursor: pointer;
                }

                .product-sav-quantity .stock-warning {
                    color: #c05c67;
                    font-weight: 700;
                }
            </style>
            <td class=\"product-sav-quantity text-center\" data-product-quantity-value=\"{{ product.sav_quantity|default('') }}\">
                <a href=\"{{ product.url|default('') }}#tab-step3\" {% if product.sav_quantity <= product.low_stock_threshold %} class=\"badge badge-danger\" {% endif %} >
                    {% if product.sav_quantity is defined and product.sav_quantity > 0 %}
                        {{ intCast(product.sav_quantity) }}
                    {% else %}
                        {{ intCast(product.sav_quantity)|default('N/A'|trans({}, 'Admin.Global')) }}
                    {% endif %}

                </a>
                {% if product.sav_quantity <= product.low_stock_threshold %}
                <span data-toggle=\"pstooltip\" data-placement=\"top\" data-html=\"true\" title=\"\" class=\"stock-warning ico ml-2\" data-original-title=\"<div class=&quot;text-sm-left&quot;>
                <p>Este producto se encuentra por debajo del nivel de stock más bajo que has definido.</p>
                <p><strong>Nivel de stock bajo: {{ product.low_stock_threshold }}</strong></p>
              </div>\">!</span>
                {% endif %}
            </td>
        {% else %}
            <td></td>
        {% endif %}
        <td class=\"text-center\">
            {% if product.active|default(0) == 0 %}
                <a href=\"#\" onclick=\"unitProductAction(this, 'activate'); return false;\">
                    <i class=\"material-icons action-disabled\">clear</i>
                </a>
            {% else %}
                <a href=\"#\" onclick=\"unitProductAction(this, 'deactivate'); return false;\">
                    <i class=\"material-icons action-enabled \">check</i>
                </a>
            {% endif %}
        </td>
        {% if product.position is defined %}
            <td {% if activate_drag_and_drop %}class=\"placeholder\"{% endif %} style=\"cursor: pointer; cursor: hand;\">
                {% if activate_drag_and_drop %}
                    <big><big>⇅</big></big>
                {% endif %}
                <span class=\"position\">{{ product.position }}</span>
                <input type=\"hidden\" name=\"mass_edit_action_sorted_products[]\" value=\"{{ product.id_product }}\" />
                <input type=\"hidden\" name=\"mass_edit_action_sorted_positions[]\" value=\"{{ product.position }}\" />
            </td>
        {% endif %}
        <td class=\"text-right\">
            <div class=\"btn-group-action\">

                {% set buttons_action = [
                    {
                        \"href\": product.preview_url|default('#'),
                        \"target\": \"_blank\",
                        \"icon\": \"remove_red_eye\",
                        \"label\": \"Preview\"|trans({}, 'Admin.Actions')
                    }
                ] %}

                {% set buttons_action = buttons_action|merge([
                    {
                        \"onclick\": \"unitProductAction(this, 'duplicate');\",
                        \"icon\": \"content_copy\",
                        \"label\": \"Duplicate\"|trans({}, 'Admin.Actions')
                    }
                ]) %}

                {% set buttons_action = buttons_action|merge([
                    {
                        \"onclick\": \"unitProductAction(this, 'delete');\",
                        \"icon\": \"delete\",
                        \"label\": \"Delete\"|trans({}, 'Admin.Actions')
                    }
                ]) %}

                {% include '@Product/CatalogPage/Forms/form_edit_dropdown.html.twig' with {
                    'button_id': \"product_list_id_\" ~ product.id_product ~ \"_menu\",
                    'default_item': {
                        \"href\": product.url|default('#'),
                        \"icon\": \"mode_edit\"
                    },
                    'right': true,
                    'items': buttons_action
                } %}
            </div>
        </td>
    </tr>
    {% endblock %}
{% else %}
<tr><td colspan=\"11\">
        {{ \"There is no result for this search. Update your filters to view other products.\"|trans({}, 'Admin.Catalog.Notification') }}
    </td></tr>
{% endfor %}
", "@PrestaShop/Admin/Product/CatalogPage/Lists/list.html.twig", "C:\\xampp\\htdocs\\siscitas\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\Lists\\list.html.twig");
    }
}
