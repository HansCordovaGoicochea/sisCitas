<?php

/* @Product/CatalogPage/Lists/products_table.html.twig */
class __TwigTemplate_e0c582bafa1e46e8dc9d97504e4f33fffc2738ace00220eaa8311821311455eb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'product_catalog_form_table_header' => array($this, 'block_product_catalog_form_table_header'),
            'product_catalog_form_table_filters' => array($this, 'block_product_catalog_form_table_filters'),
            'product_catalog_form_table_items' => array($this, 'block_product_catalog_form_table_items'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Product/CatalogPage/Lists/products_table.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Product/CatalogPage/Lists/products_table.html.twig"));

        // line 25
        echo "<div class=\"table-responsive\">
  <table
    class=\"table product mt-3\"
    redirecturl=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_catalog", array("limit" =>         // line 29
(isset($context["limit"]) ? $context["limit"] : $this->getContext($context, "limit")), "offset" =>         // line 30
(isset($context["offset"]) ? $context["offset"] : $this->getContext($context, "offset")), "orderBy" =>         // line 31
(isset($context["orderBy"]) ? $context["orderBy"] : $this->getContext($context, "orderBy")), "sortOrder" =>         // line 32
(isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")))), "html", null, true);
        // line 34
        echo "\"
  >
    <thead class=\"with-filters\">
      ";
        // line 37
        $this->displayBlock('product_catalog_form_table_header', $context, $blocks);
        // line 83
        echo "
      ";
        // line 84
        $this->displayBlock('product_catalog_form_table_filters', $context, $blocks);
        // line 193
        echo "    </thead>
    ";
        // line 194
        $this->displayBlock('product_catalog_form_table_items', $context, $blocks);
        // line 204
        echo "  </table>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 37
    public function block_product_catalog_form_table_header($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "product_catalog_form_table_header"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "product_catalog_form_table_header"));

        // line 38
        echo "        <tr class=\"column-headers\">
          <th scope=\"col\" style=\"width: 2rem\"></th>
          <th scope=\"col\" style=\"width: 5rem\">
            ";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "sortable_column_header", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("ID", array(), "Admin.Global"), 1 => "id_product", 2 => (isset($context["orderBy"]) ? $context["orderBy"] : $this->getContext($context, "orderBy")), 3 => (isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder"))), "method"), "html", null, true);
        echo "
          </th>
          <th scope=\"col\">
            ";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Image", array(), "Admin.Global"), "html", null, true);
        echo "
          </th>
          <th scope=\"col\">
            ";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "sortable_column_header", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Name", array(), "Admin.Global"), 1 => "name", 2 => (isset($context["orderBy"]) ? $context["orderBy"] : $this->getContext($context, "orderBy")), 3 => (isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder"))), "method"), "html", null, true);
        echo "
          </th>
          <th scope=\"col\" style=\"width: 9%\">
            ";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "sortable_column_header", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Código", array(), "Admin.Global"), 1 => "reference", 2 => (isset($context["orderBy"]) ? $context["orderBy"] : $this->getContext($context, "orderBy")), 3 => (isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder"))), "method"), "html", null, true);
        echo "
          </th>
          <th scope=\"col\">
            ";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "sortable_column_header", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Category", array(), "Admin.Catalog.Feature"), 1 => "name_category", 2 => (isset($context["orderBy"]) ? $context["orderBy"] : $this->getContext($context, "orderBy")), 3 => (isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder"))), "method"), "html", null, true);
        echo "
          </th>
          <th scope=\"col\">
            ";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "sortable_column_header", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Marca", array(), "Admin.Catalog.Feature"), 1 => "name_manufacturer", 2 => (isset($context["orderBy"]) ? $context["orderBy"] : $this->getContext($context, "orderBy")), 3 => (isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder"))), "method"), "html", null, true);
        echo "
          </th>
          <th scope=\"col\" class=\"text-center\" style=\"width: 9%\">
            ";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "sortable_column_header", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Precio Venta", array(), "Admin.Catalog.Feature"), 1 => "price_final", 2 => (isset($context["orderBy"]) ? $context["orderBy"] : $this->getContext($context, "orderBy")), 3 => (isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder"))), "method"), "html", null, true);
        echo "
          </th>

          ";
        // line 62
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 63
            echo "          <th scope=\"col\" class=\"text-center\" style=\"width: 9%\">
            ";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "sortable_column_header", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Quantity", array(), "Admin.Catalog.Feature"), 1 => "sav_quantity", 2 => (isset($context["orderBy"]) ? $context["orderBy"] : $this->getContext($context, "orderBy")), 3 => (isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder"))), "method"), "html", null, true);
            echo "
          </th>
          ";
        } else {
            // line 67
            echo "            <th></th>
          ";
        }
        // line 69
        echo "
          <th scope=\"col\" class=\"text-center\">
            ";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "sortable_column_header", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Status", array(), "Admin.Global"), 1 => "active", 2 => (isset($context["orderBy"]) ? $context["orderBy"] : $this->getContext($context, "orderBy")), 3 => (isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder"))), "method"), "html", null, true);
        echo "
          </th>
          ";
        // line 73
        if (((isset($context["has_category_filter"]) ? $context["has_category_filter"] : $this->getContext($context, "has_category_filter")) == true)) {
            // line 74
            echo "            <th scope=\"col\">
              ";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "sortable_column_header", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Position", array(), "Admin.Global"), 1 => "position"), "method"), "html", null, true);
            echo "
            </th>
          ";
        }
        // line 78
        echo "          <th scope=\"col\" class=\"text-right\" style=\"width: 3rem; padding-right: 2rem\">
              ";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Actions", array(), "Admin.Global"), "html", null, true);
        echo "
          </th>
        </tr>
      ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 84
    public function block_product_catalog_form_table_filters($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "product_catalog_form_table_filters"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "product_catalog_form_table_filters"));

        // line 85
        echo "        <tr class=\"column-filters\">
          <th colspan=\"2\">
            ";
        // line 87
        $this->loadTemplate("PrestaShopBundle:Admin/Helpers:range_inputs.html.twig", "@Product/CatalogPage/Lists/products_table.html.twig", 87)->display(array_merge($context, array("input_name" => "filter_column_id_product", "min" => "0", "max" => "1000000", "minLabel" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Min", array(), "Admin.Global"), "maxLabel" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Max", array(), "Admin.Global"), "value" =>         // line 93
(isset($context["filter_column_id_product"]) ? $context["filter_column_id_product"] : $this->getContext($context, "filter_column_id_product")))));
        // line 95
        echo "          </th>
          <th>&nbsp;</th>
          <th>
            <input
              type=\"text\"
              class=\"form-control\"
              placeholder=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search name", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
              name=\"filter_column_name\"
              value=\"";
        // line 103
        echo twig_escape_filter($this->env, (isset($context["filter_column_name"]) ? $context["filter_column_name"] : $this->getContext($context, "filter_column_name")), "html", null, true);
        echo "\"
            />
          </th>
          <th>
            <input
              type=\"text\"
              class=\"form-control\"
              placeholder=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search ref.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
              name=\"filter_column_reference\"
              value=\"";
        // line 112
        echo twig_escape_filter($this->env, (isset($context["filter_column_reference"]) ? $context["filter_column_reference"] : $this->getContext($context, "filter_column_reference")), "html", null, true);
        echo "\"
            />
          </th>
          <th>
            <input
              type=\"text\"
              class=\"form-control\"
              placeholder=\"";
        // line 119
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search category", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
              name=\"filter_column_name_category\"
              value=\"";
        // line 121
        echo twig_escape_filter($this->env, (isset($context["filter_column_name_category"]) ? $context["filter_column_name_category"] : $this->getContext($context, "filter_column_name_category")), "html", null, true);
        echo "\"
            />
          </th>
            <th>
                <input
                        type=\"text\"
                        class=\"form-control\"
                        placeholder=\"";
        // line 128
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Buscar Marca", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
                        name=\"filter_column_name_manufacturer\"
                        value=\"";
        // line 130
        echo twig_escape_filter($this->env, (isset($context["filter_column_name_manufacturer"]) ? $context["filter_column_name_manufacturer"] : $this->getContext($context, "filter_column_name_manufacturer")), "html", null, true);
        echo "\"
                />
            </th>
          <th class=\"text-center\"></th>
";
        // line 135
        echo "
          ";
        // line 136
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 137
            echo "          <th class=\"text-center\">
";
            // line 146
            echo "          </th>
          ";
        } else {
            // line 148
            echo "            <th></th>
          ";
        }
        // line 150
        echo "
          <th id=\"product_filter_column_active\" class=\"text-center\">
            <div class=\"form-select\">
              <select class=\"custom-select\"  name=\"filter_column_active\">
                <option value=\"\"></option>
                <option value=\"1\" ";
        // line 155
        if ((array_key_exists("filter_column_active", $context) && ((isset($context["filter_column_active"]) ? $context["filter_column_active"] : $this->getContext($context, "filter_column_active")) == "1"))) {
            echo "selected=\"selected\"";
        }
        echo ">Active</option>
                <option value=\"0\" ";
        // line 156
        if ((array_key_exists("filter_column_active", $context) && ((isset($context["filter_column_active"]) ? $context["filter_column_active"] : $this->getContext($context, "filter_column_active")) == "0"))) {
            echo "selected=\"selected\"";
        }
        echo ">Inactive</option>
              </select>
            </div>
          </th>
          ";
        // line 160
        if (((isset($context["has_category_filter"]) ? $context["has_category_filter"] : $this->getContext($context, "has_category_filter")) == true)) {
            // line 161
            echo "            <th>
              ";
            // line 162
            if ( !(isset($context["activate_drag_and_drop"]) ? $context["activate_drag_and_drop"] : $this->getContext($context, "activate_drag_and_drop"))) {
                // line 163
                echo "                <input type=\"button\" class=\"btn btn-outline-secondary\" name=\"products_filter_position_asc\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Reorder", array(), "Admin.Actions"), "html", null, true);
                echo "\" onclick=\"productOrderPrioritiesTable();\" />
                ";
            } else {
                // line 165
                echo "                <input type=\"button\" id=\"bulk_edition_save_keep\" class=\"btn\" onclick=\"bulkProductAction(this, 'edition');\" value=\"";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save & refresh", array(), "Admin.Actions");
                echo "\" />
            ";
            }
            // line 167
            echo "
            </th>
          ";
        }
        // line 170
        echo "          <th class=\"text-right\" style=\"width: 5rem\">
            <button
              type=\"submit\"
              class=\"btn btn-primary\"
              name=\"products_filter_submit\"
              title=\"";
        // line 175
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search", array(), "Admin.Actions"), "html", null, true);
        echo "\"
            >
              <i class=\"material-icons\">search</i>
              ";
        // line 178
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search", array(), "Admin.Actions"), "html", null, true);
        echo "
            </button>
            <button
              type=\"reset\"
              class=\"btn btn-link\"
              name=\"products_filter_reset\"
              onclick=\"productColumnFilterReset(\$(this).closest('tr.column-filters'))\"
              title=\"";
        // line 185
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Reset", array(), "Admin.Actions"), "html", null, true);
        echo "\"
            >
              <i class=\"material-icons\">clear</i>
              ";
        // line 188
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Reset", array(), "Admin.Actions"), "html", null, true);
        echo "
            </button>
          </th>
        </tr>
      ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 194
    public function block_product_catalog_form_table_items($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "product_catalog_form_table_items"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "product_catalog_form_table_items"));

        // line 195
        echo "      ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("PrestaShopBundle\\Controller\\Admin\\ProductController::listAction", array("limit" =>         // line 196
(isset($context["limit"]) ? $context["limit"] : $this->getContext($context, "limit")), "offset" =>         // line 197
(isset($context["offset"]) ? $context["offset"] : $this->getContext($context, "offset")), "orderBy" =>         // line 198
(isset($context["orderBy"]) ? $context["orderBy"] : $this->getContext($context, "orderBy")), "sortOrder" =>         // line 199
(isset($context["sortOrder"]) ? $context["sortOrder"] : $this->getContext($context, "sortOrder")), "products" =>         // line 200
(isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "last_sql" =>         // line 201
(isset($context["last_sql"]) ? $context["last_sql"] : $this->getContext($context, "last_sql")))));
        // line 202
        echo "
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@Product/CatalogPage/Lists/products_table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  381 => 202,  379 => 201,  378 => 200,  377 => 199,  376 => 198,  375 => 197,  374 => 196,  372 => 195,  363 => 194,  348 => 188,  342 => 185,  332 => 178,  326 => 175,  319 => 170,  314 => 167,  308 => 165,  302 => 163,  300 => 162,  297 => 161,  295 => 160,  286 => 156,  280 => 155,  273 => 150,  269 => 148,  265 => 146,  262 => 137,  260 => 136,  257 => 135,  250 => 130,  245 => 128,  235 => 121,  230 => 119,  220 => 112,  215 => 110,  205 => 103,  200 => 101,  192 => 95,  190 => 93,  189 => 87,  185 => 85,  176 => 84,  162 => 79,  159 => 78,  153 => 75,  150 => 74,  148 => 73,  143 => 71,  139 => 69,  135 => 67,  129 => 64,  126 => 63,  124 => 62,  118 => 59,  112 => 56,  106 => 53,  100 => 50,  94 => 47,  88 => 44,  82 => 41,  77 => 38,  68 => 37,  56 => 204,  54 => 194,  51 => 193,  49 => 84,  46 => 83,  44 => 37,  39 => 34,  37 => 32,  36 => 31,  35 => 30,  34 => 29,  33 => 28,  28 => 25,);
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
<div class=\"table-responsive\">
  <table
    class=\"table product mt-3\"
    redirecturl=\"{{ path('admin_product_catalog', {
        'limit': limit,
        'offset': offset,
        'orderBy': orderBy,
        'sortOrder': sortOrder
      })
    }}\"
  >
    <thead class=\"with-filters\">
      {% block product_catalog_form_table_header %}
        <tr class=\"column-headers\">
          <th scope=\"col\" style=\"width: 2rem\"></th>
          <th scope=\"col\" style=\"width: 5rem\">
            {{ ps.sortable_column_header(\"ID\"|trans({}, 'Admin.Global'), 'id_product', orderBy, sortOrder) }}
          </th>
          <th scope=\"col\">
            {{ \"Image\"|trans({}, 'Admin.Global') }}
          </th>
          <th scope=\"col\">
            {{ ps.sortable_column_header(\"Name\"|trans({}, 'Admin.Global'), 'name', orderBy, sortOrder) }}
          </th>
          <th scope=\"col\" style=\"width: 9%\">
            {{ ps.sortable_column_header(\"Código\"|trans({}, 'Admin.Global'), 'reference', orderBy, sortOrder) }}
          </th>
          <th scope=\"col\">
            {{ ps.sortable_column_header(\"Category\"|trans({}, 'Admin.Catalog.Feature'), 'name_category', orderBy, sortOrder) }}
          </th>
          <th scope=\"col\">
            {{ ps.sortable_column_header(\"Marca\"|trans({}, 'Admin.Catalog.Feature'), 'name_manufacturer', orderBy, sortOrder) }}
          </th>
          <th scope=\"col\" class=\"text-center\" style=\"width: 9%\">
            {{ ps.sortable_column_header(\"Precio Venta\"|trans({}, 'Admin.Catalog.Feature'), 'price_final', orderBy, sortOrder) }}
          </th>

          {% if 'PS_STOCK_MANAGEMENT'|configuration %}
          <th scope=\"col\" class=\"text-center\" style=\"width: 9%\">
            {{ ps.sortable_column_header(\"Quantity\"|trans({}, 'Admin.Catalog.Feature'), 'sav_quantity', orderBy, sortOrder) }}
          </th>
          {% else %}
            <th></th>
          {% endif %}

          <th scope=\"col\" class=\"text-center\">
            {{ ps.sortable_column_header(\"Status\"|trans({}, 'Admin.Global'), 'active', orderBy, sortOrder) }}
          </th>
          {% if has_category_filter == true %}
            <th scope=\"col\">
              {{ ps.sortable_column_header(\"Position\"|trans({}, 'Admin.Global'), 'position') }}
            </th>
          {% endif %}
          <th scope=\"col\" class=\"text-right\" style=\"width: 3rem; padding-right: 2rem\">
              {{ \"Actions\"|trans({}, 'Admin.Global') }}
          </th>
        </tr>
      {% endblock %}

      {% block product_catalog_form_table_filters %}
        <tr class=\"column-filters\">
          <th colspan=\"2\">
            {% include 'PrestaShopBundle:Admin/Helpers:range_inputs.html.twig' with {
              'input_name': \"filter_column_id_product\",
              'min': '0',
              'max': '1000000',
              'minLabel': \"Min\"|trans({}, 'Admin.Global'),
              'maxLabel': \"Max\"|trans({}, 'Admin.Global'),
              'value': filter_column_id_product,
            } %}
          </th>
          <th>&nbsp;</th>
          <th>
            <input
              type=\"text\"
              class=\"form-control\"
              placeholder=\"{{ \"Search name\"|trans({}, 'Admin.Catalog.Help') }}\"
              name=\"filter_column_name\"
              value=\"{{ filter_column_name }}\"
            />
          </th>
          <th>
            <input
              type=\"text\"
              class=\"form-control\"
              placeholder=\"{{ \"Search ref.\"|trans({}, 'Admin.Catalog.Help') }}\"
              name=\"filter_column_reference\"
              value=\"{{ filter_column_reference }}\"
            />
          </th>
          <th>
            <input
              type=\"text\"
              class=\"form-control\"
              placeholder=\"{{ \"Search category\"|trans({}, 'Admin.Catalog.Help') }}\"
              name=\"filter_column_name_category\"
              value=\"{{ filter_column_name_category }}\"
            />
          </th>
            <th>
                <input
                        type=\"text\"
                        class=\"form-control\"
                        placeholder=\"{{ \"Buscar Marca\"|trans({}, 'Admin.Catalog.Help') }}\"
                        name=\"filter_column_name_manufacturer\"
                        value=\"{{ filter_column_name_manufacturer }}\"
                />
            </th>
          <th class=\"text-center\"></th>
{#          <th class=\"text-center\"></th>#}

          {% if 'PS_STOCK_MANAGEMENT'|configuration %}
          <th class=\"text-center\">
{#            {% include 'PrestaShopBundle:Admin/Helpers:range_inputs.html.twig' with {#}
{#              'input_name': \"filter_column_sav_quantity\",#}
{#              'min': '-1000000',#}
{#              'max': '1000000',#}
{#              'minLabel': \"Min\"|trans({}, 'Admin.Global'),#}
{#              'maxLabel': \"Max\"|trans({}, 'Admin.Global'),#}
{#              'value': filter_column_sav_quantity,#}
{#            } %}#}
          </th>
          {% else %}
            <th></th>
          {% endif %}

          <th id=\"product_filter_column_active\" class=\"text-center\">
            <div class=\"form-select\">
              <select class=\"custom-select\"  name=\"filter_column_active\">
                <option value=\"\"></option>
                <option value=\"1\" {% if (filter_column_active is defined) and filter_column_active == '1' %}selected=\"selected\"{% endif %}>Active</option>
                <option value=\"0\" {% if (filter_column_active is defined) and filter_column_active == '0' %}selected=\"selected\"{% endif %}>Inactive</option>
              </select>
            </div>
          </th>
          {% if has_category_filter == true %}
            <th>
              {% if not(activate_drag_and_drop) %}
                <input type=\"button\" class=\"btn btn-outline-secondary\" name=\"products_filter_position_asc\" value=\"{{ \"Reorder\"|trans({}, 'Admin.Actions') }}\" onclick=\"productOrderPrioritiesTable();\" />
                {% else %}
                <input type=\"button\" id=\"bulk_edition_save_keep\" class=\"btn\" onclick=\"bulkProductAction(this, 'edition');\" value=\"{{ \"Save & refresh\"|trans({}, 'Admin.Actions')|raw }}\" />
            {% endif %}

            </th>
          {% endif %}
          <th class=\"text-right\" style=\"width: 5rem\">
            <button
              type=\"submit\"
              class=\"btn btn-primary\"
              name=\"products_filter_submit\"
              title=\"{{ \"Search\"|trans({}, 'Admin.Actions') }}\"
            >
              <i class=\"material-icons\">search</i>
              {{ \"Search\"|trans({}, 'Admin.Actions') }}
            </button>
            <button
              type=\"reset\"
              class=\"btn btn-link\"
              name=\"products_filter_reset\"
              onclick=\"productColumnFilterReset(\$(this).closest('tr.column-filters'))\"
              title=\"{{ \"Reset\"|trans({}, 'Admin.Actions') }}\"
            >
              <i class=\"material-icons\">clear</i>
              {{ \"Reset\"|trans({}, 'Admin.Actions') }}
            </button>
          </th>
        </tr>
      {% endblock %}
    </thead>
    {% block product_catalog_form_table_items %}
      {{ render(controller('PrestaShopBundle\\\\Controller\\\\Admin\\\\ProductController::listAction', {
        'limit': limit,
        'offset': offset,
        'orderBy': orderBy,
        'sortOrder': sortOrder,
        'products': products,
        'last_sql': last_sql
      })) }}
    {% endblock %}
  </table>
</div>
", "@Product/CatalogPage/Lists/products_table.html.twig", "C:\\xampp\\htdocs\\siscitas\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\Lists\\products_table.html.twig");
    }
}
