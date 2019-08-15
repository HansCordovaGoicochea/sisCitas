<?php

/* @Product/ProductPage/Panels/essentials.html.twig */
class __TwigTemplate_36f35847208fc6f429fcf5ad9b86e67ac10299e8f47af080031465c055355972 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Product/ProductPage/Panels/essentials.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Product/ProductPage/Panels/essentials.html.twig"));

        // line 25
        echo "<div role=\"tabpanel\" class=\"form-contenttab tab-pane active\" id=\"step1\">
  <div class=\"row\">
    <div class=\"col-md-12\">
      <div class=\"container-fluid\">
        <div class=\"row\">

          ";
        // line 32
        echo "          <div class=\"col-md-12 col-xs-12\">
";
        // line 37
        echo "          </div>

          ";
        // line 40
        echo "          <div class=\"col-md-3 col-xs-12\">
            <div class=\"row\">
              <div class=\"col-md-12\">

                ";
        // line 44
        if ((isset($context["is_combination_active"]) ? $context["is_combination_active"] : $this->getContext($context, "is_combination_active"))) {
            // line 45
            echo "                  <style>
                    #show_variations_selector{
                      display: none!important;
                    }
                  </style>
                  <div class=\"form-group mb-3\" id=\"show_variations_selector\">
                    <h2>
                      ";
            // line 52
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Combinations", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "
                      <span class=\"help-box\" data-toggle=\"popover\"
                            data-content=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Combinations are the different variations of a product, with attributes like its size, weight or color taking different values. Does your product require combinations?", array(), "Admin.Catalog.Help"), "html", null, true);
            echo "\" ></span>
                    </h2>
                    <div class=\"radio\">
                      <label>
                        <input type=\"radio\" name=\"show_variations\" value=\"0\" ";
            // line 58
            if ( !(isset($context["has_combinations"]) ? $context["has_combinations"] : $this->getContext($context, "has_combinations"))) {
                echo "checked=\"checked\"";
            }
            echo ">
                        ";
            // line 59
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Simple product", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "
                      </label>
                    </div>
                    <div class=\"radio\">
                      <label>
                        <input type=\"radio\" name=\"show_variations\" value=\"1\" ";
            // line 64
            if ((isset($context["has_combinations"]) ? $context["has_combinations"] : $this->getContext($context, "has_combinations"))) {
                echo "checked=\"checked\"";
            }
            echo ">
                        ";
            // line 65
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Product with combinations", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "
                      </label>
                      <div id=\"product_type_combinations_shortcut\">
                          <span class=\"small font-secondary\">
                            ";
            // line 70
            echo "                            ";
            echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Advanced settings in [1][2]Combinations[/1]", array(), "Admin.Catalog.Help"), array("[1]" => "<a href=\"#tab-step3\" onclick=\"\$('a[href=\\'#step3\\']').tab('show');\" class=\"btn sensitive px-0\">", "[/1]" => "</a>", "[2]" => "<i class=\"material-icons\">open_in_new</i>"));
            echo "
                          </span>
                      </div>
                    </div>
                  </div>
                ";
        }
        // line 76
        echo "
                <div class=\"form-group\">
                  <h2>
                    ";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Código", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                    <span class=\"help-box\" data-toggle=\"popover\"
                          data-content=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Your reference code for this product. Allowed special characters: .-_#.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                  </h2>
                  ";
        // line 83
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formReference"]) ? $context["formReference"] : $this->getContext($context, "formReference")), 'errors');
        echo "
                  <div class=\"row\">
                    <div class=\"col-xl-12 col-lg-12\" id=\"product_reference_field\">
                      ";
        // line 86
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formReference"]) ? $context["formReference"] : $this->getContext($context, "formReference")), 'widget');
        echo "
                    </div>
                  </div>
                </div>

                ";
        // line 91
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 92
            echo "                  <div class=\"form-group\" id=\"product_qty_0_shortcut_div\">
                    <h2>
                      ";
            // line 94
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Quantity", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "
                      <span class=\"help-box\" data-toggle=\"popover\"
                            data-content=\"";
            // line 96
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("How many products should be available for sale?", array(), "Admin.Catalog.Help"), "html", null, true);
            echo "\" ></span>
                    </h2>
                    ";
            // line 98
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formQuantityShortcut"]) ? $context["formQuantityShortcut"] : $this->getContext($context, "formQuantityShortcut")), 'errors');
            echo "
                    <div class=\"row\">
                      <div class=\"col-xl-6 col-lg-12\">
                        ";
            // line 101
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formQuantityShortcut"]) ? $context["formQuantityShortcut"] : $this->getContext($context, "formQuantityShortcut")), 'widget');
            echo "
                      </div>
                    </div>
                    <span class=\"small font-secondary hide\">
";
            // line 106
            echo "                    ";
            echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Advanced settings in [1][2]Quantities[/1]", array(), "Admin.Catalog.Help"), array("[1]" => "<a href=\"#tab-step3\" onclick=\"\$('a[href=\\'#step3\\']').tab('show');\" class=\"btn sensitive px-0\">", "[/1]" => "</a>", "[2]" => "<i class=\"material-icons\">open_in_new</i>"));
            echo "
                    </span>
                  </div>
                ";
        }
        // line 110
        echo "
";
        // line 112
        echo "                <fieldset class=\"form-group\">
                  <div class=\"row\">
                    <div class=\"col-md-12\">
                      <h2 class=\"form-control-label\">
                        ";
        // line 116
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["formLowStockThreshold"]) ? $context["formLowStockThreshold"] : $this->getContext($context, "formLowStockThreshold")), "vars", array()), "label", array()), "html", null, true);
        echo "
                        <span class=\"help-box\" data-toggle=\"popover\"
                              data-content=\"";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cantidad minima de stock para mostrar alerta", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                      </h2>
                      ";
        // line 120
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formLowStockThreshold"]) ? $context["formLowStockThreshold"] : $this->getContext($context, "formLowStockThreshold")), 'errors');
        echo "
                      ";
        // line 121
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formLowStockThreshold"]) ? $context["formLowStockThreshold"] : $this->getContext($context, "formLowStockThreshold")), 'widget');
        echo "
                    </div>
                  </div>
                </fieldset>

";
        // line 129
        echo "              </div>
            </div>
          </div>

          ";
        // line 134
        echo "          <div class=\"col-md-3\">
            <div class=\"form-group\">
              <h2>
                ";
        // line 137
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Price", array(), "Admin.Global"), "html", null, true);
        echo "
                <span class=\"help-box\" data-toggle=\"popover\"
                      data-content=\"";
        // line 139
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This is the retail price at which you intend to sell this product to your customers. The tax included price will change according to the tax rule you select.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
              </h2>
              <div class=\"row\">
                <div class=\"col-md-6 \">
                  <label class=\"form-control-label\">";
        // line 143
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Tax included", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
                  ";
        // line 144
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formPriceShortcutTTC"]) ? $context["formPriceShortcutTTC"] : $this->getContext($context, "formPriceShortcutTTC")), 'widget');
        echo "
                  ";
        // line 145
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formPriceShortcutTTC"]) ? $context["formPriceShortcutTTC"] : $this->getContext($context, "formPriceShortcutTTC")), 'errors');
        echo "
                </div>
                <div class=\"col-md-6 col-offset-md-1\">
                  <label class=\"form-control-label\">";
        // line 148
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Tax excluded", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
                  ";
        // line 149
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formPriceShortcut"]) ? $context["formPriceShortcut"] : $this->getContext($context, "formPriceShortcut")), 'widget');
        echo "
                  ";
        // line 150
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formPriceShortcut"]) ? $context["formPriceShortcut"] : $this->getContext($context, "formPriceShortcut")), 'errors');
        echo "
                </div>
                <div class=\"col-md-12 mt-1 \">
                  <label class=\"form-control-label\">";
        // line 153
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Tax rule", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
                  ";
        // line 154
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("PrestaShopBundle:Admin/Product:renderField", array("productId" => (isset($context["productId"]) ? $context["productId"] : $this->getContext($context, "productId")), "step" => "step2", "fieldName" => "id_tax_rules_group")));
        echo "
                </div>
                <div class=\"col-md-12 hide\">
                        <span class=\"small font-secondary\">
                          ";
        // line 159
        echo "                          ";
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Advanced settings in [1][2]Pricing[/1]", array(), "Admin.Catalog.Help"), array("[1]" => "<a href=\"#tab-step2\" onclick=\"\$('a[href=\\'#step2\\']').tab('show');\" class=\"btn sensitive px-0\">", "[/1]" => "</a>", "[2]" => "<i class=\"material-icons\">open_in_new</i>"));
        echo "
                        </span>
                </div>
              </div>
              <div class=\"row hide\">
                <div class=\"col-md-12\">
                  <label>";
        // line 165
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Tax rule", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
                </div>
                <div class=\"clearfix\"></div>
                <div class=\"col-md-11\" id=\"tax_rule_shortcut\">
                </div>
                <a href=\"#\" onclick=\"\$(this).parent().hide()\">&times;</a>
              </div>

              <div class=\"form-group col-md-12\">
                <h2>
                  ";
        // line 175
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cost price", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                  <span class=\"help-box\" data-toggle=\"popover\"
                        data-content=\"";
        // line 177
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("The cost price is the price you paid for the product. Do not include the tax. It should be lower than the retail price: the difference between the two will be your margin.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                </h2>
                <div class=\"row\">
";
        // line 181
        echo "                  ";
        // line 182
        echo "                  ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "step2", array()), "wholesale_price", array()), 'errors');
        echo "
                  ";
        // line 183
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "step2", array()), "wholesale_price", array()), 'widget');
        echo "
                </div>
              </div>
            </div>
          </div>

          ";
        // line 190
        echo "          <div class=\"col-md-3\">
            <div class=\"form-group\" id=\"categories\">
              ";
        // line 192
        echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_categories.html.twig", array("form" => (isset($context["formCategories"]) ? $context["formCategories"] : $this->getContext($context, "formCategories")), "productId" => (isset($context["productId"]) ? $context["productId"] : $this->getContext($context, "productId"))));
        echo "
            </div>

            ";
        // line 195
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayAdminProductsMainStepRightColumnBottom", array("id_product" => (isset($context["productId"]) ? $context["productId"] : $this->getContext($context, "productId"))));
        echo "
          </div>

          ";
        // line 199
        echo "          <div class=\"col-md-3\">

            <div id=\"product-images-container\" class=\"mb-4\">
              <div id=\"product-images-dropzone\" class=\"panel dropzone ui-sortable col-md-12 col-lg-12\"
                   url-upload=\"";
        // line 203
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_image_upload", array("idProduct" => (isset($context["productId"]) ? $context["productId"] : $this->getContext($context, "productId")))), "html", null, true);
        echo "\"
                   url-position=\"";
        // line 204
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_image_positions");
        echo "\"
                   data-max-size=\"";
        // line 205
        echo twig_escape_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_LIMIT_UPLOAD_IMAGE_VALUE"), "html", null, true);
        echo "\"
              >
                <div id=\"product-images-dropzone-error\" class=\"text-danger\"></div>
                <div class=\"dz-default dz-message openfilemanager\">
                  <i class=\"material-icons\">add_a_photo</i><br/>
                  ";
        // line 210
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["js_translatable"]) ? $context["js_translatable"] : $this->getContext($context, "js_translatable")), "Drop images here", array(), "array"), "html", null, true);
        echo "<br/>
                  <a>";
        // line 211
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["js_translatable"]) ? $context["js_translatable"] : $this->getContext($context, "js_translatable")), "or select files", array(), "array"), "html", null, true);
        echo "</a><br/>
                  <small>
                    ";
        // line 213
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["js_translatable"]) ? $context["js_translatable"] : $this->getContext($context, "js_translatable")), "files recommandations", array(), "array"), "html", null, true);
        echo "<br/>
                    ";
        // line 214
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["js_translatable"]) ? $context["js_translatable"] : $this->getContext($context, "js_translatable")), "files recommandations2", array(), "array"), "html", null, true);
        echo "
                  </small>
                </div>
                ";
        // line 217
        if (array_key_exists("images", $context)) {
            // line 218
            echo "                  ";
            if ((isset($context["editable"]) ? $context["editable"] : $this->getContext($context, "editable"))) {
                // line 219
                echo "                    <div class=\"dz-preview disabled openfilemanager\">
                      <div><span>+</span></div>
                    </div>
                  ";
            }
            // line 223
            echo "                  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["images"]) ? $context["images"] : $this->getContext($context, "images")));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 224
                echo "                    <div class=\"dz-preview dz-processing dz-image-preview dz-complete ui-sortable-handle\"
                         data-id=\"";
                // line 225
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "id", array()), "html", null, true);
                echo "\"
                         url-delete=\"";
                // line 226
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_image_delete", array("idImage" => $this->getAttribute($context["image"], "id", array()))), "html", null, true);
                echo "\"
                         url-update=\"";
                // line 227
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_image_form", array("idImage" => $this->getAttribute($context["image"], "id", array()))), "html", null, true);
                echo "\"
                    >
                      <div class=\"dz-image bg\" style=\"background-image: url('";
                // line 229
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "base_image_url", array()), "html", null, true);
                echo "-home_default.";
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "format", array()), "html", null, true);
                echo "');\"></div>
                      <div class=\"dz-details\">
                        <div class=\"dz-size\"><span data-dz-size=\"\"></span></div>
                        <div class=\"dz-filename\"><span data-dz-name=\"\"></span></div>
                      </div>
                      <div class=\"dz-progress\"><span class=\"dz-upload\" data-dz-uploadprogress=\"\" style=\"width: 100%;\"></span></div>
                      <div class=\"dz-error-message\"><span data-dz-errormessage=\"\"></span></div>
                      <div class=\"dz-success-mark\"></div>
                      <div class=\"dz-error-mark\"></div>
                      ";
                // line 238
                if ($this->getAttribute($context["image"], "cover", array())) {
                    // line 239
                    echo "                        <div class=\"iscover\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cover", array(), "Admin.Catalog.Feature"), "html", null, true);
                    echo "</div>
                      ";
                }
                // line 241
                echo "                    </div>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 243
            echo "                ";
        }
        // line 244
        echo "              </div>
              <div class=\"dropzone-expander text-sm-center col-md-12\" style=\"text-align: center;\">
                <span class=\"expand\">";
        // line 246
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("View all images", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</span>
                <span class=\"compress\">";
        // line 247
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("View less", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</span>
              </div>
              <div id=\"product-images-form-container\" class=\"col-md-12\" style=\"display: none;\">
                <div id=\"product-images-form\"></div>
              </div>
            </div>
            ";
        // line 253
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 254
            echo "              <div id=\"pack_stock_type\">
                <h2>";
            // line 255
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["formPackStockType"]) ? $context["formPackStockType"] : $this->getContext($context, "formPackStockType")), "vars", array()), "label", array()), "html", null, true);
            echo "</h2>
                <div class=\"row col-md-12\">
                  <fieldset class=\"form-group\">
                    ";
            // line 258
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formPackStockType"]) ? $context["formPackStockType"] : $this->getContext($context, "formPackStockType")), 'errors');
            echo "
                    ";
            // line 259
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formPackStockType"]) ? $context["formPackStockType"] : $this->getContext($context, "formPackStockType")), 'widget');
            echo "
                  </fieldset>
                </div>
              </div>
            ";
        }
        // line 264
        echo "          </div>

          ";
        // line 267
        echo "          <div class=\"col-md-6\">

";
        // line 274
        echo "
";
        // line 284
        echo "
            ";
        // line 285
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayAdminProductsMainStepLeftColumnMiddle", array("id_product" => (isset($context["productId"]) ? $context["productId"] : $this->getContext($context, "productId"))));
        echo "
          </div>
          <div class=\"col-md-6\">


            ";
        // line 290
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayAdminProductsMainStepLeftColumnBottom", array("id_product" => (isset($context["productId"]) ? $context["productId"] : $this->getContext($context, "productId"))));
        echo "

          </div>

        </div>
      </div>
    </div>
  </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Panels/essentials.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  498 => 290,  490 => 285,  487 => 284,  484 => 274,  480 => 267,  476 => 264,  468 => 259,  464 => 258,  458 => 255,  455 => 254,  453 => 253,  444 => 247,  440 => 246,  436 => 244,  433 => 243,  426 => 241,  420 => 239,  418 => 238,  404 => 229,  399 => 227,  395 => 226,  391 => 225,  388 => 224,  383 => 223,  377 => 219,  374 => 218,  372 => 217,  366 => 214,  362 => 213,  357 => 211,  353 => 210,  345 => 205,  341 => 204,  337 => 203,  331 => 199,  325 => 195,  319 => 192,  315 => 190,  306 => 183,  301 => 182,  299 => 181,  293 => 177,  288 => 175,  275 => 165,  265 => 159,  258 => 154,  254 => 153,  248 => 150,  244 => 149,  240 => 148,  234 => 145,  230 => 144,  226 => 143,  219 => 139,  214 => 137,  209 => 134,  203 => 129,  195 => 121,  191 => 120,  186 => 118,  181 => 116,  175 => 112,  172 => 110,  164 => 106,  157 => 101,  151 => 98,  146 => 96,  141 => 94,  137 => 92,  135 => 91,  127 => 86,  121 => 83,  116 => 81,  111 => 79,  106 => 76,  96 => 70,  89 => 65,  83 => 64,  75 => 59,  69 => 58,  62 => 54,  57 => 52,  48 => 45,  46 => 44,  40 => 40,  36 => 37,  33 => 32,  25 => 25,);
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
<div role=\"tabpanel\" class=\"form-contenttab tab-pane active\" id=\"step1\">
  <div class=\"row\">
    <div class=\"col-md-12\">
      <div class=\"container-fluid\">
        <div class=\"row\">

          {# TOP #}
          <div class=\"col-md-12 col-xs-12\">
{#            <div id=\"js_form_step1_inputPackItems\">#}
{#              {{ form_errors(formPackItems) }}#}
{#              {{ form_widget(formPackItems) }}#}
{#            </div>#}
          </div>

          {# LEFT #}
          <div class=\"col-md-3 col-xs-12\">
            <div class=\"row\">
              <div class=\"col-md-12\">

                {% if is_combination_active %}
                  <style>
                    #show_variations_selector{
                      display: none!important;
                    }
                  </style>
                  <div class=\"form-group mb-3\" id=\"show_variations_selector\">
                    <h2>
                      {{ \"Combinations\"|trans({}, 'Admin.Catalog.Feature') }}
                      <span class=\"help-box\" data-toggle=\"popover\"
                            data-content=\"{{ \"Combinations are the different variations of a product, with attributes like its size, weight or color taking different values. Does your product require combinations?\"|trans({}, 'Admin.Catalog.Help') }}\" ></span>
                    </h2>
                    <div class=\"radio\">
                      <label>
                        <input type=\"radio\" name=\"show_variations\" value=\"0\" {% if not has_combinations %}checked=\"checked\"{% endif %}>
                        {{ \"Simple product\"|trans({}, 'Admin.Catalog.Feature') }}
                      </label>
                    </div>
                    <div class=\"radio\">
                      <label>
                        <input type=\"radio\" name=\"show_variations\" value=\"1\" {% if has_combinations %}checked=\"checked\"{% endif %}>
                        {{ \"Product with combinations\"|trans({}, 'Admin.Catalog.Feature') }}
                      </label>
                      <div id=\"product_type_combinations_shortcut\">
                          <span class=\"small font-secondary\">
                            {# First tag [1][/1] is for a HTML link. Second tag [2] is an icon (no closing tag needed). #}
                            {{ \"Advanced settings in [1][2]Combinations[/1]\"|trans({}, 'Admin.Catalog.Help')|replace({'[1]': '<a href=\"#tab-step3\" onclick=\"\$(\\'a[href=\\\\\\'#step3\\\\\\']\\').tab(\\'show\\');\" class=\"btn sensitive px-0\">', '[/1]': '</a>', '[2]': '<i class=\"material-icons\">open_in_new</i>'})|raw }}
                          </span>
                      </div>
                    </div>
                  </div>
                {% endif %}

                <div class=\"form-group\">
                  <h2>
                    {{ \"Código\"|trans({}, 'Admin.Catalog.Feature') }}
                    <span class=\"help-box\" data-toggle=\"popover\"
                          data-content=\"{{ \"Your reference code for this product. Allowed special characters: .-_#\\.\"|trans({}, 'Admin.Catalog.Help') }}\" ></span>
                  </h2>
                  {{ form_errors(formReference) }}
                  <div class=\"row\">
                    <div class=\"col-xl-12 col-lg-12\" id=\"product_reference_field\">
                      {{ form_widget(formReference) }}
                    </div>
                  </div>
                </div>

                {% if 'PS_STOCK_MANAGEMENT'|configuration %}
                  <div class=\"form-group\" id=\"product_qty_0_shortcut_div\">
                    <h2>
                      {{ \"Quantity\"|trans({}, 'Admin.Catalog.Feature') }}
                      <span class=\"help-box\" data-toggle=\"popover\"
                            data-content=\"{{ \"How many products should be available for sale?\"|trans({}, 'Admin.Catalog.Help') }}\" ></span>
                    </h2>
                    {{ form_errors(formQuantityShortcut) }}
                    <div class=\"row\">
                      <div class=\"col-xl-6 col-lg-12\">
                        {{ form_widget(formQuantityShortcut) }}
                      </div>
                    </div>
                    <span class=\"small font-secondary hide\">
{#                     First tag [1][/1] is for a HTML link. Second tag [2] is an icon (no closing tag needed).#}
                    {{ \"Advanced settings in [1][2]Quantities[/1]\"|trans({}, 'Admin.Catalog.Help')|replace({'[1]': '<a href=\"#tab-step3\" onclick=\"\$(\\'a[href=\\\\\\'#step3\\\\\\']\\').tab(\\'show\\');\" class=\"btn sensitive px-0\">', '[/1]': '</a>', '[2]': '<i class=\"material-icons\">open_in_new</i>'})|raw }}
                    </span>
                  </div>
                {% endif %}

{#                <h2>{{ 'Stock alerts'|trans({}, 'Admin.Catalog.Feature') }}</h2>#}
                <fieldset class=\"form-group\">
                  <div class=\"row\">
                    <div class=\"col-md-12\">
                      <h2 class=\"form-control-label\">
                        {{ formLowStockThreshold.vars.label }}
                        <span class=\"help-box\" data-toggle=\"popover\"
                              data-content=\"{{ \"Cantidad minima de stock para mostrar alerta\"|trans({}, 'Admin.Catalog.Help') }}\" ></span>
                      </h2>
                      {{ form_errors(formLowStockThreshold) }}
                      {{ form_widget(formLowStockThreshold) }}
                    </div>
                  </div>
                </fieldset>

{#                <div id=\"manufacturer\">#}
{#                  {{ include('@Product/ProductPage/Forms/form_manufacturer.html.twig', { 'form': formManufacturer }) }}#}
{#                </div>#}
              </div>
            </div>
          </div>

          {#center LEFT#}
          <div class=\"col-md-3\">
            <div class=\"form-group\">
              <h2>
                {{ \"Price\"|trans({}, 'Admin.Global') }}
                <span class=\"help-box\" data-toggle=\"popover\"
                      data-content=\"{{ \"This is the retail price at which you intend to sell this product to your customers. The tax included price will change according to the tax rule you select.\"|trans({}, 'Admin.Catalog.Help') }}\" ></span>
              </h2>
              <div class=\"row\">
                <div class=\"col-md-6 \">
                  <label class=\"form-control-label\">{{ \"Tax included\"|trans({}, 'Admin.Catalog.Feature') }}</label>
                  {{ form_widget(formPriceShortcutTTC) }}
                  {{ form_errors(formPriceShortcutTTC) }}
                </div>
                <div class=\"col-md-6 col-offset-md-1\">
                  <label class=\"form-control-label\">{{ \"Tax excluded\"|trans({}, 'Admin.Catalog.Feature') }}</label>
                  {{ form_widget(formPriceShortcut) }}
                  {{ form_errors(formPriceShortcut) }}
                </div>
                <div class=\"col-md-12 mt-1 \">
                  <label class=\"form-control-label\">{{ \"Tax rule\"|trans({}, 'Admin.Catalog.Feature') }}</label>
                  {{ render(controller('PrestaShopBundle:Admin/Product:renderField', {'productId': productId, 'step': 'step2', 'fieldName': 'id_tax_rules_group' })) }}
                </div>
                <div class=\"col-md-12 hide\">
                        <span class=\"small font-secondary\">
                          {# First tag [1][/1] is for a HTML link. Second tag [2] is an icon (no closing tag needed). #}
                          {{ \"Advanced settings in [1][2]Pricing[/1]\"|trans({}, 'Admin.Catalog.Help')|replace({'[1]': '<a href=\"#tab-step2\" onclick=\"\$(\\'a[href=\\\\\\'#step2\\\\\\']\\').tab(\\'show\\');\" class=\"btn sensitive px-0\">', '[/1]': '</a>', '[2]': '<i class=\"material-icons\">open_in_new</i>'})|raw }}
                        </span>
                </div>
              </div>
              <div class=\"row hide\">
                <div class=\"col-md-12\">
                  <label>{{ \"Tax rule\"|trans({}, 'Admin.Catalog.Feature') }}</label>
                </div>
                <div class=\"clearfix\"></div>
                <div class=\"col-md-11\" id=\"tax_rule_shortcut\">
                </div>
                <a href=\"#\" onclick=\"\$(this).parent().hide()\">&times;</a>
              </div>

              <div class=\"form-group col-md-12\">
                <h2>
                  {{ 'Cost price'|trans({}, 'Admin.Catalog.Feature') }}
                  <span class=\"help-box\" data-toggle=\"popover\"
                        data-content=\"{{ \"The cost price is the price you paid for the product. Do not include the tax. It should be lower than the retail price: the difference between the two will be your margin.\"|trans({}, 'Admin.Catalog.Help') }}\" ></span>
                </h2>
                <div class=\"row\">
{#                  <label class=\"form-control-label\">{{ 'Price (tax excl.)'|trans({}, 'Admin.Catalog.Feature') }}</label>#}
                  {#<label class=\"form-control-label\">{{ pricingForm.wholesale_price.vars.label|raw }}</label>#}
                  {{ form_errors(form.step2.wholesale_price) }}
                  {{ form_widget(form.step2.wholesale_price) }}
                </div>
              </div>
            </div>
          </div>

          {#center RIGHT#}
          <div class=\"col-md-3\">
            <div class=\"form-group\" id=\"categories\">
              {{ include('@Product/ProductPage/Forms/form_categories.html.twig', { 'form': formCategories, 'productId': productId }) }}
            </div>

            {{ renderhook('displayAdminProductsMainStepRightColumnBottom', { 'id_product': productId }) }}
          </div>

          {# RIGHT #}
          <div class=\"col-md-3\">

            <div id=\"product-images-container\" class=\"mb-4\">
              <div id=\"product-images-dropzone\" class=\"panel dropzone ui-sortable col-md-12 col-lg-12\"
                   url-upload=\"{{ path('admin_product_image_upload', {'idProduct': productId}) }}\"
                   url-position=\"{{ path('admin_product_image_positions') }}\"
                   data-max-size=\"{{ 'PS_LIMIT_UPLOAD_IMAGE_VALUE'|configuration }}\"
              >
                <div id=\"product-images-dropzone-error\" class=\"text-danger\"></div>
                <div class=\"dz-default dz-message openfilemanager\">
                  <i class=\"material-icons\">add_a_photo</i><br/>
                  {{js_translatable['Drop images here']}}<br/>
                  <a>{{js_translatable['or select files']}}</a><br/>
                  <small>
                    {{js_translatable['files recommandations']}}<br/>
                    {{js_translatable['files recommandations2']}}
                  </small>
                </div>
                {% if images is defined %}
                  {% if editable %}
                    <div class=\"dz-preview disabled openfilemanager\">
                      <div><span>+</span></div>
                    </div>
                  {% endif %}
                  {% for image in images %}
                    <div class=\"dz-preview dz-processing dz-image-preview dz-complete ui-sortable-handle\"
                         data-id=\"{{ image.id }}\"
                         url-delete=\"{{ path('admin_product_image_delete', {'idImage': image.id}) }}\"
                         url-update=\"{{ path('admin_product_image_form', {'idImage': image.id}) }}\"
                    >
                      <div class=\"dz-image bg\" style=\"background-image: url('{{ image.base_image_url }}-home_default.{{ image.format }}');\"></div>
                      <div class=\"dz-details\">
                        <div class=\"dz-size\"><span data-dz-size=\"\"></span></div>
                        <div class=\"dz-filename\"><span data-dz-name=\"\"></span></div>
                      </div>
                      <div class=\"dz-progress\"><span class=\"dz-upload\" data-dz-uploadprogress=\"\" style=\"width: 100%;\"></span></div>
                      <div class=\"dz-error-message\"><span data-dz-errormessage=\"\"></span></div>
                      <div class=\"dz-success-mark\"></div>
                      <div class=\"dz-error-mark\"></div>
                      {% if image.cover %}
                        <div class=\"iscover\">{{ 'Cover'|trans({}, 'Admin.Catalog.Feature') }}</div>
                      {% endif %}
                    </div>
                  {% endfor %}
                {% endif %}
              </div>
              <div class=\"dropzone-expander text-sm-center col-md-12\" style=\"text-align: center;\">
                <span class=\"expand\">{{ 'View all images'|trans({}, 'Admin.Catalog.Feature') }}</span>
                <span class=\"compress\">{{ 'View less'|trans({}, 'Admin.Catalog.Feature') }}</span>
              </div>
              <div id=\"product-images-form-container\" class=\"col-md-12\" style=\"display: none;\">
                <div id=\"product-images-form\"></div>
              </div>
            </div>
            {% if 'PS_STOCK_MANAGEMENT'|configuration %}
              <div id=\"pack_stock_type\">
                <h2>{{ formPackStockType.vars.label }}</h2>
                <div class=\"row col-md-12\">
                  <fieldset class=\"form-group\">
                    {{ form_errors(formPackStockType) }}
                    {{ form_widget(formPackStockType) }}
                  </fieldset>
                </div>
              </div>
            {% endif %}
          </div>

          {# BOTOOM #}
          <div class=\"col-md-6\">

{#            <div class=\"summary-description-container\">#}
{#              <ul class=\"nav nav-tabs bordered\">#}
{#                <li id=\"tab_description_short\" class=\"nav-item\"><a href=\"#description_short\" data-toggle=\"tab\" class=\"nav-link description-tab active\">{{ 'Summary'|trans({}, 'Admin.Catalog.Feature') }}</a></li>#}
{#                <li id=\"tab_description\" class=\"nav-item\"><a href=\"#description\" data-toggle=\"tab\" class=\"nav-link description-tab\">{{ 'Description'|trans({}, 'Admin.Global') }}</a></li>#}
{#              </ul>#}

{#              <div class=\"tab-content bordered\">#}
{#                <div class=\"tab-pane panel panel-default active\" id=\"description_short\">#}
{#                  {{ form_widget(form.step1.description_short) }}#}
{#                </div>#}
{#                <div class=\"tab-pane panel panel-default \" id=\"description\">#}
{#                  {{ form_widget(form.step1.description) }}#}
{#                </div>#}
{#              </div>#}
{#            </div>#}

            {{ renderhook('displayAdminProductsMainStepLeftColumnMiddle', { 'id_product': productId }) }}
          </div>
          <div class=\"col-md-6\">


            {{ renderhook('displayAdminProductsMainStepLeftColumnBottom', { 'id_product': productId }) }}

          </div>

        </div>
      </div>
    </div>
  </div>
</div>
", "@Product/ProductPage/Panels/essentials.html.twig", "C:\\xampp\\htdocs\\siscitas\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Panels\\essentials.html.twig");
    }
}
