Vue.directive('tooltip', function(el, binding){
    $(el).tooltip({
        title: binding.value,
        placement: binding.arg,
        trigger: 'hover'
    })
});

Vue.component('datepicker', {
    template: '<input name="date" type="text" autocomplete="off" placeholder="Seleccionar fecha" class="form-control">',
    mounted: function() {
        const self = this;
        $(this.$el).datepicker({
            autoclose: true,
            startView: 'years',
            dateFormat: 'yy-mm-dd',
            onSelect: function(dateText) {
                self.$emit('input', dateText);
            },
        });
    },
    destroyed: function () {
        $(this.$el).datepicker('destroy');
    },
});
Vue.component('my-currency-input', {
    props: ["value"],
    template: `<input type="text" class="form-control" v-model="displayValue" @blur="isInputActive = false" @focus="isInputActive = true"  @keyup="keyupInput"/>`,
    data: function() {
        return {
            isInputActive: false
        }
    },
    computed: {
        displayValue: {
            get: function() {
                if (this.isInputActive) {
                    // Cursor is inside the input field. unformat display value for user
                    return this.value.toString()
                } else {
                    // User is not modifying now. Format display value for user interface
                    return "S/ " + this.value.toFixed(3).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,")
                    // return "S/ " + this.value
                }
            },
            set: function(modifiedValue) {
                // Recalculate value after ignoring "$" and "," in user input
                let newValue = parseFloat(modifiedValue.replace(/[^\d\.]/g, ""))
                // Ensure that it is not NaN
                if (isNaN(newValue)) {
                    newValue = 0
                }
                // Note: we cannot set this.value as it is a "prop". It needs to be passed to parent component
                // $emit the event so that parent component gets it
                this.$emit('input', newValue);
            }
        },
    },
    methods: {
        keyupInput(){
            this.$emit('keyup', this.value);
        },
        updateInput() {

        }
    }
});

Vue.directive('focus', {
    inserted: function (el, binding, vnode) {
        Vue.nextTick(function() {
            el.focus();
            el.select();
            // highlight(-1);
            // vnode.context.indx_selected = -1;

        })
    }
});

var app_vender = new Vue({
    el: '#app_vender',
    data() {
        return {
            perfil_empleado_vue: perfil_empleado,
            fecha_proximo_pago: "",
            nro_guia_remision: "",
            es_credito: "0",
            show_forma_pago: false,
            guardandoEnviar: false,
            search: "",
            products: [],
            categorias: [],
            cart: [],
            pagos: [{
                id_metodo_pago: 0,
                tipo: 'efectivo',
                name_pay: "Pago en Efectivo",
                fecha: $.datepicker.formatDate('yy-mm-dd', new Date()),
                monto: 0,
            }],
            total: 0,
            active_codigo_barras: 0,
            active: "0", //categoria

            //pagination
            pagination: [],
            total_prod: 0,
            page: 1,

            pagina_fin: 1,

            //botones
            is_press_pagar: false,
            is_active_tab_pago: false,

            //facturacion

            hasComprobante: false,
            tipo_comprobante: "",
            numero_comprobante: "",

            //textos y titulos
            textDeudaVuelto: "Deuda",

            //datos devueltos al guardar
            order: [],

            //datos del cliente
            mostrar_form_cliente: false,
            id_customer: 1,
            cliente: "",
            nombre_legal: "",
            tipo_doc: "",
            cod_sunat: "",
            numero_doc: "",
            direccion_cliente: "No Definido",

            //errores
            bloquear_error: false,
            mostrar_adventencia: false,
            msg_errores: [],

            monto_deuda: 0,

            indx_selected: -1,

            //extras var
            exist_product_sinstock: false,
        };
    },
    ready: function() {
        $('[data-toggle="tooltip"]').tooltip();

    },
    created: function(){
        let self = this;
        $('#app_vender').addClass('loaded');

    },
    computed: {

        deudaItem: function(){
            let sum_pagos = 0;
            let deuda_vuelto;
            this.pagos.forEach(function(item) {
                sum_pagos += parseFloat(item.monto);
            });

            deuda_vuelto = this.total - sum_pagos;
            if (deuda_vuelto < 0){
                this.textDeudaVuelto = "Vuelto";

            }else{
                this.textDeudaVuelto = "Deuda";

            }
            this.monto_deuda = deuda_vuelto;
            // if (deuda_vuelto === 0) this.bloquear_error = false;

            return deuda_vuelto ? Math.abs(deuda_vuelto) : 0;
        },
        totalItem: function(){
            let sum = 0;
            this.cart.forEach(function(item) {
                sum += (parseFloat(item.price) * item.quantity);
            });

            return sum;
        },
    },
    methods: {
        changePrecioUnitario: function(item){
            item.importe_linea = ps_round((item.price * item.quantity), 5);
            this.refreshTotal();
        },
        changeImporte: function(item){
            item.price = ps_round((item.importe_linea / item.quantity), 6);
            this.refreshTotal();
        },
        filterKey(e){
            const key = e.key;

            // If is '.' key, stop it
            if (key === '.')
                return e.preventDefault();

            // OPTIONAL
            // If is 'e' key, stop it
            if (key === 'e')
                return e.preventDefault();
        },
        // This can also prevent copy + paste invalid character
        filterInput(e){
            e.target.value = e.target.value.replace(/[^0-9]+/g, '');
        },
        triggerBuscarSunat () {
            this.$refs.enterBuscarSunat.click()
        },
        verificarCliente(){
            // console.log(this.nombre_legal.length);
          this.bloquear_error = this.nombre_legal.length < 4;
          if (this.hasComprobante && this.tipo_comprobante === 'Factura' && this.cliente.length === 8){
              this.msg_errores = [];
              this.mostrarErrores();
              this.msg_errores.push({
                  msg: "Debe indicar un cliente con RUC"
              });
          }
        },
        borrarErrores(){
            this.mostrar_adventencia = false;
            this.bloquear_error = false;
            this.msg_errores = [];
        },
        mostrarErrores(){
            this.mostrar_adventencia = true;
            this.bloquear_error = true;
        },
        changeMetodoPago: function(e, pago){
            if(e.target.options.selectedIndex > -1) {
                // console.log(e.target.options[e.target.options.selectedIndex].dataset.tipo)
                pago.tipo = e.target.options[e.target.options.selectedIndex].dataset.tipo;
                if (e.target.options[e.target.options.selectedIndex].dataset.tipo === "cuenta") {
                    pago.name_pay = "Pago a Cuenta";
                }else{
                    pago.name_pay = "Pago en Efectivo";
                }
            }

        },
        activarComprobante: function(tipo){
            if (tipo === "Eliminar"){
                this.hasComprobante = false;
                this.tipo_comprobante = "";

               this.borrarErrores();
            }else{
                this.hasComprobante = true;
                this.tipo_comprobante = tipo;

                this.$refs.cliente.focus();

                if (this.id_customer === 1 && tipo === 'Factura'){
                    this.mostrarErrores();
                    this.msg_errores.push({
                        msg: "Una FACTURA debe tener un cliente",
                    });
                    this.msg_errores.push({
                        msg: "Debe indicar un cliente con RUC"
                    });
                }

                if (this.id_customer !== 1 && parseInt(this.cod_sunat) === 1 && tipo === 'Factura'){
                    this.mostrarErrores();
                    this.msg_errores.push({
                        msg: "Debe indicar un cliente con RUC"
                    })
                }

                if (this.hasComprobante && this.tipo_comprobante === 'Factura' && this.cliente.length === 8){
                    this.borrarErrores();
                    this.mostrarErrores();
                    this.msg_errores.push({
                        msg: "Debe indicar un cliente con RUC"
                    })
                }

            }

        },
        activeTabPago: function(state){
            this.is_active_tab_pago = state;
            if (this.cart.length){
                if (state){
                    $('#tabProductosCliente a[href="#pagos"]').tab('show');
                    this.$refs.cliente.focus();
                    highlight(-1);
                    self.indx_selected = -1;
                }
            }


        },
        keyUpSearch: function() {
            let key_array_valid = [8, 16, 32, 13];
            let that = this;
            // console.log('keycode ' + event.which + ' triggered this event');
            if (event.which <= 90 && event.which >= 48 ||
                event.which >= 96 && event.which <= 111 ||
                event.which >= 186 && event.which <= 222 ||
                in_array(event.which, key_array_valid) ||
                !event.which
            ) {

                //do whatever
                $.ajax({
                    type:"POST",
                    url: url_ajax_vender,
                    async: true,
                    dataType: "json",
                    data:{
                        ajax: "1",
                        token: token_vender,
                        tab: "AdminVender",
                        action : "GetContentAche",
                        search: $.trim(that.search),
                        category: that.active,
                    },
                    beforeSend: function(){
                        $('.table_list_products').waitMe({
                            effect: 'bounce',
                            text: 'Cargando...',
                            color: '#000',
                            maxSize: '',
                            textPos: 'vertical',
                            fontSize: '',
                            source: ''
                        });
                    },
                    success: function (data) {
                        let res = data;
                        that.products = [];
                        that.products = res.products;
                        that.pagination = res.pagination;
                        that.total_prod = res.pagination.total_items;
                        that.page = 1;

                        if (parseInt(that.active_codigo_barras) === 1){
                            that.$nextTick(() => {
                                let text = $.trim(that.search);
                                if ($.trim(text) !== '') {
                                    if (that.products.length === 1) {
                                        that.addItem(that.products[0]);
                                        that.search = "";
                                        that.keyUpSearch();
                                        that.setFocus();

                                    }
                                }
                            });
                        }
                    },
                    error: function (error) {
                        // console.log(error);
                    },
                    complete: function (data) {
                        $('.table_list_products').waitMe('hide');

                    }
                });
            }
        },
        setFocus: function() {
            // Note, you need to add a ref="search" attribute to your input.
            this.$refs.search.select();
            highlight(-1);
            this.indx_selected = -1;
        },
        infiniteScroll (event) {
            let self = this;
            // let debug = [
            //      `scrollTop: ${event.target.scrollTop}`,
            //      `offsetHeight: ${event.target.offsetHeight}`,
            //      `scrollHeight: ${event.target.scrollHeight}`,
            //      `content: ${this.products.length}`
            //  ].join(' | ');
            //  console.log(debug);

            // Posición actual de scroll + height of parent (.products) >= altura del contenido en scroll
            if ((event.target.scrollTop + event.target.offsetHeight) >= event.target.scrollHeight) {
                if (self.pagina_fin === self.page){
                    if (self.total_prod !== self.pagination.items_shown_to && $.trim(self.search) === ""){
                        self.page++;
                        self.getProductos(self.page);
                    }
                }
            }
        },
        getProductos($page){
            let self = this;
            // this.$refs.search.focus();
            $.ajax({
                type:"POST",
                url: url_ajax_vender,
                async: true,
                dataType: "json",
                data:{
                    ajax: "1",
                    token: token_vender,
                    tab: "AdminVender",
                    action : "GetContentAche",
                    page : $page,
                },
                beforeSend: function(){
                    // $('.preloader-background').fadeOut('slow');
                    $('.loader_search').css("display","");
                    $('.table_list_products').waitMe({
                        effect: 'bounce',
                        text: 'Cargando...',
                        color: '#000',
                        maxSize: '',
                        textPos: 'vertical',
                        fontSize: '',
                        source: ''
                    });

                },
                success: function (data) {
                    let res = data;
                    if (res.products.length){
                        for (let i = 0; i < res.products.length; i++) {
                            self.products.push(res.products[i]);
                        }
                    }

                    self.pagination = res.pagination;
                    self.total_prod = res.pagination.total_items;
                    // console.log(JSON.parse(data));
                    self.pagina_fin = self.page;
                },
                error: function (error) {
                    console.log(error);
                },
                complete: function (data) {
                    $('.loader_search').css("display","none");
                    $('.table_list_products').waitMe('hide');
                }
            });
        },
        refreshTotal() {
            let self = this;
            let total_temporal = 0;
            for (let i = 0; i < this.cart.length; i++) {

                // this.cart[i].importe_linea = ps_round((this.cart[i].price * this.cart[i].quantity), 6);
                // this.cart[i].price =  ps_round((this.cart[i].importe_linea / this.cart[i].quantity), 6);

                total_temporal += this.cart[i].importe_linea;
                // alert(this.cart[i].price * this.cart[i].quantity);

            }
            // alert(this.total);
            this.total = ps_round(total_temporal, 4);
            this.pagos[0].monto = ps_round(this.total, 4);

            let error_stock = 0;
            for (let i = 0; i < this.cart.length; i++) {
                if (this.cart[i].cantidad_fisica <= 0 || this.cart[i].cantidad_fisica < this.cart[i].quantity) {
                    error_stock += 1;
                    break;
                }
            }

            self.exist_product_sinstock = error_stock > 0;

        },
        // // descuento por precio unitario
        // refreshTotal(){
        //     let total_temporal = 0;
        //     for(let i = 0; i < this.cart.length; i++) {
        //
        //         if (parseFloat(this.cart[i].descuento) > this.cart[i].price_temporal){
        //             this.cart[i].descuento = 0;
        //             $.growl.error({ title: 'El descuento no puede ser mayor al precio base!', message: '', duration: 500, location: 'tr' });
        //         }
        //
        //         if ((parseFloat(this.cart[i].descuento) > 0 && parseFloat(this.cart[i].descuento) <= this.cart[i].price_temporal) || parseFloat(this.cart[i].aumento) > 0){
        //             this.cart[i].price = (this.cart[i].price_temporal + parseFloat(this.cart[i].aumento)) - parseFloat(this.cart[i].descuento);
        //         }else{
        //             this.cart[i].price = this.cart[i].price_temporal;
        //         }
        //
        //         this.cart[i].importe_linea = ps_round((this.cart[i].price * this.cart[i].quantity), 6);
        //
        //         total_temporal += this.cart[i].importe_linea;
        //         // alert(this.cart[i].price * this.cart[i].quantity);
        //     }
        //     // alert(this.total);
        //     this.total = ps_round(total_temporal, 4);
        //     this.pagos[0].monto = ps_round(this.total, 4);
        // },
        addItem(prod, index = 0){
            let self = this;
            // Increment total price
            this.total += parseFloat(prod.price_tax_incl);

            let inCart = false;
            // Update quantity if the item is already in the cart
            for(let i = 0; i < this.cart.length; i++){
                if(this.cart[i].id === prod.id_product){
                    inCart = true;
                    this.cart[i].quantity++;
                    $.growl.notice({ title: 'Prod. Agregado!', message: '', duration: 500, location: 'br' });
                    this.refreshTotal();
                    Vue.nextTick(function() {
                        self.$refs.number_cantidad[i].focus();
                    });
                    break;
                }
            }



            // Add item if not already in the cart
            if(! inCart){

                    this.cart.push({
                        id: prod.id_product,
                        title: prod.name,
                        price: parseFloat(prod.price_tax_incl),
                        price_temporal: parseFloat(prod.price_tax_incl),
                        quantity: 1,
                        cantidad_fisica: prod.quantity,
                        importe_linea: parseFloat(prod.price_tax_incl),
                        importe_linea_temporal: parseFloat(prod.price_tax_incl),
                        descuento: 0,
                        aumento: 0,
                        precio_coste: parseFloat(prod.wholesale_price)
                    });
                    $.growl.notice({ title: 'Prod. Agregado!', message: '', duration: 1000, location: 'br' });
                    //actualizar monto de pago
                    this.pagos[0].monto = ps_round(this.total, 4);

                if (prod.quantity <= 0){
                    this.exist_product_sinstock = true;
                }

                // }else{
                //     $.growl.error({ title: 'Alerta!', message: 'No hay stock', location: 'br' });
                // }

                this.refreshTotal();

            }

            // this.search = "";
            // this.setFocus();
            highlight(index);
            self.indx_selected = index;
        },
        changeCantidad(item){
            this.total = 0;
            //truncar a 1 decimal
            item.quantity = item.quantity ? item.quantity.toString().match(/^-?\d+(?:\.\d{0,1})?/)[0] : item.quantity;

            item.importe_linea = ps_round((item.price * item.quantity), 6);

            this.refreshTotal();


        },
        borrarProducto (item) {

            this.total -= item.importe_linea;

            for( let i = 0; i < this.cart.length; i++){
                if(this.cart[i].id === item.id){
                    this.cart.splice(i, 1);
                    break;
                }
            }

            let error_stock = 0;
            for( let i = 0; i < this.cart.length; i++){
                if (this.cart[i].cantidad_fisica <= 0){
                    error_stock += 1;
                    break;
                }
            }

            this.exist_product_sinstock = !!error_stock;

            this.refreshTotal();

        },
        agregarVenta(tipo_venta){
            let self = this;
            self.borrarErrores();
            if (self.id_customer === 1 && self.tipo_comprobante === 'Factura'){
                self.mostrarErrores();
                self.msg_errores.push({
                    msg: "Una FACTURA debe tener un cliente",
                });
                self.msg_errores.push({
                    msg: "Debe indicar un cliente con RUC"
                });

                return false;
            }

            if (self.id_customer !== 1 && parseInt(self.cod_sunat) === 1 && self.tipo_comprobante === 'Factura'){
                self.mostrarErrores();
                self.msg_errores.push({
                    msg: "Debe indicar un cliente con RUC"
                });
                return false;
            }

            //tipo venta
            // 1 SIN PAGO
            // 2 PAGAR, ENVIAR A SUNAT E IMPRIMIR
            // 3 PAGAR, ENVIAR A SUNAT Y NUEVO

            // console.log(self.cart)
            // if (self.cart.length && self.nombre_legal && self.numero_doc){
            if (self.cart.length){
                if (!self.exist_product_sinstock){
                    if (self.monto_deuda > 0 && !self.fecha_proximo_pago){
                        $.growl.error({ title: 'Tiene que colocar una fecha próxima de pago!', message: '',});
                    }else{
                        $.ajax({
                            type:"POST",
                            url: url_ajax_vender,
                            async: true,
                            dataType: "json",
                            data:{
                                ajax: "1",
                                token: token_vender,
                                action : "realizarVenta",
                                productos: self.cart,
                                tipo_venta: tipo_venta,
                                hasComprobante: self.hasComprobante,
                                tipo_comprobante: self.tipo_comprobante,
                                id_customer: self.id_customer,
                                nombre_legal: self.nombre_legal,
                                numero_doc: self.numero_doc,
                                direccion_cliente: self.direccion_cliente,
                                array_pagos: self.pagos,
                                fecha_proximo_pago: self.fecha_proximo_pago,
                                nro_guia_remision: self.nro_guia_remision,
                                es_credito: self.es_credito,
                            },
                            beforeSend: function(){
                                self.guardandoEnviar = true;
                                $('body').waitMe({
                                    effect: 'bounce',
                                    text: 'Guardando...',
                                    color: '#000',
                                    maxSize: '',
                                    textPos: 'vertical',
                                    fontSize: '',
                                    source: ''
                                });
                            },
                            success: function (data) {
                                if (data.result === 'error'){
                                    $.each(data.msg, function (index, value) {
                                        self.mostrar_adventencia = true;
                                        self.msg_errores.push({
                                            msg: value,
                                        })
                                    })
                                }
                                if (data.response === 'ok'){
                                    // if (data.reload === 'ok'){
                                    //     location.reload();
                                    // }
                                    self.order = data.order;
                                    let html_buttons = '';

                                    if(self.perfil_empleado_vue !== 'Vendedor'){
                                        html_buttons += '<a class="btn btn-primary" style="margin: 5px;" target="_blank" href="'+data.link_venta+'">Venta</a>';
                                    }

                                    html_buttons += '<input type="button" class="btn btn-warning" value="Ticket Venta - '+data.order.nro_ticket+'" style="margin: 5px;" onclick="windowPrintAche(\'PDFtoTicket\')">';
                                    let iframes = '<iframe id="PDFtoTicket" src="'+data.order.ruta_ticket_normal+'" style="display: none;"></iframe>';
                                    if (data.comprobantes){
                                        $.each(data.comprobantes, function (index, value) {
                                            self.numero_comprobante = value.numero_comprobante;
                                            if (this.ruta_ticket !== ""){
                                                iframes += `<iframe id="PDFtoTicketComp`+this.id_pos_ordercomprobantes+`" src="`+this.ruta_ticket+`" style="display: none;"></iframe>`;
                                                html_buttons += '<input type="button" class="btn btn-warning" value="Ticket '+self.tipo_comprobante+'" style="margin: 5px;" onclick="windowPrintAche(\'PDFtoTicketComp'+this.id_pos_ordercomprobantes+'\')">';
                                            }

                                            if (this.ruta_pdf_a4 !== "") {
                                                iframes += `<iframe id="PDFtoA4Comp` + this.id_pos_ordercomprobantes + `" src="` + this.ruta_pdf_a4 + `" style="display: none;"></iframe>`;
                                                html_buttons += '<input type="button" class="btn btn-warning" value="A4 '+self.tipo_comprobante+'" style="margin: 5px;" onclick="windowPrintAche(\'PDFtoA4Comp'+this.id_pos_ordercomprobantes+'\')">';
                                            }

                                        });

                                    }

                                    $('#alertmessage').after(iframes);
                                    $('.alertmessage').append(html_buttons);
                                    $('.alertmessage').css('display', 'grid');

                                    $("#toolbar_caja_soles").fadeOut("slow", function() {
                                        $(this).text(data.caja_actual.monto_operaciones).fadeIn("slow");
                                    });

                                    self.cart = [];
                                    self.is_active_tab_pago = false;
                                    $('#left-panel').css('pointer-events', 'none');
                                    $('.sales-add-edit-payments').css('pointer-events', 'none');
                                    $('.tabla_lista_venta').css('pointer-events', 'none');
                                }

                            },
                            error: function (error) {
                                console.log(error);
                            },
                            complete: function(data) {
                                // location.reload();
                                $('body').waitMe('hide');
                                self.guardandoEnviar = false;
                            },
                        });
                    }
                }else{
                    $.growl.error({ title: 'Solo puede hacer cotizaciones!', message: '',});
                }
            }else{
                $.growl.error({ title: 'No existen productos para vender!', message: '',});
            }
        },
        transferenciaInterna(tipo_venta){
            let self = this;
            self.borrarErrores();
            if (self.id_customer === 1 && self.tipo_comprobante === 'Factura'){
                self.mostrarErrores();
                self.msg_errores.push({
                    msg: "Una FACTURA debe tener un cliente",
                });
                self.msg_errores.push({
                    msg: "Debe indicar un cliente con RUC"
                });

                return false;
            }

            if (self.id_customer !== 1 && parseInt(self.cod_sunat) === 1 && self.tipo_comprobante === 'Factura'){
                self.mostrarErrores();
                self.msg_errores.push({
                    msg: "Debe indicar un cliente con RUC"
                });
                return false;
            }

            //tipo venta
            // 1 SIN PAGO
            // 2 PAGAR, ENVIAR A SUNAT E IMPRIMIR
            // 3 PAGAR, ENVIAR A SUNAT Y NUEVO

            // console.log(self.cart)
            // if (self.cart.length && self.nombre_legal && self.numero_doc){
            if (self.cart.length){
                if (!self.exist_product_sinstock){
                    if (self.monto_deuda > 0 && !self.fecha_proximo_pago){
                        $.growl.error({ title: 'Tiene que colocar una fecha próxima de pago!', message: '',});
                    }else{
                        $.ajax({
                            type:"POST",
                            url: url_ajax_vender,
                            async: true,
                            dataType: "json",
                            data:{
                                ajax: "1",
                                token: token_vender,
                                action : "realizarVenta",
                                productos: self.cart,
                                tipo_venta: tipo_venta,
                                hasComprobante: self.hasComprobante,
                                tipo_comprobante: self.tipo_comprobante,
                                id_customer: self.id_customer,
                                nombre_legal: self.nombre_legal,
                                numero_doc: self.numero_doc,
                                direccion_cliente: self.direccion_cliente,
                                array_pagos: self.pagos,
                                fecha_proximo_pago: self.fecha_proximo_pago,
                                nro_guia_remision: self.nro_guia_remision,
                                es_credito: self.es_credito,
                                es_transferencia_interna: 1,
                            },
                            beforeSend: function(){
                                self.guardandoEnviar = true;
                                $('body').waitMe({
                                    effect: 'bounce',
                                    text: 'Guardando...',
                                    color: '#000',
                                    maxSize: '',
                                    textPos: 'vertical',
                                    fontSize: '',
                                    source: ''
                                });
                            },
                            success: function (data) {
                                if (data.result === 'error'){
                                    $.each(data.msg, function (index, value) {
                                        self.mostrar_adventencia = true;
                                        self.msg_errores.push({
                                            msg: value,
                                        })
                                    })
                                }
                                if (data.response === 'ok'){
                                    // if (data.reload === 'ok'){
                                    //     location.reload();
                                    // }
                                    self.order = data.order;
                                    let html_buttons = '';

                                    if(self.perfil_empleado_vue !== 'Vendedor'){
                                        html_buttons += '<a class="btn btn-primary" style="margin: 5px;" target="_blank" href="'+data.link_venta+'">Venta</a>';
                                    }

                                    html_buttons += '<input type="button" class="btn btn-warning" value="Ticket Venta - '+data.order.nro_ticket+'" style="margin: 5px;" onclick="windowPrintAche(\'PDFtoTicket\')">';
                                    let iframes = '<iframe id="PDFtoTicket" src="'+data.order.ruta_ticket_normal+'" style="display: none;"></iframe>';
                                    if (data.comprobantes){
                                        $.each(data.comprobantes, function (index, value) {
                                            self.numero_comprobante = value.numero_comprobante;
                                            if (this.ruta_ticket !== ""){
                                                iframes += `<iframe id="PDFtoTicketComp`+this.id_pos_ordercomprobantes+`" src="`+this.ruta_ticket+`" style="display: none;"></iframe>`;
                                                html_buttons += '<input type="button" class="btn btn-warning" value="Ticket '+self.tipo_comprobante+'" style="margin: 5px;" onclick="windowPrintAche(\'PDFtoTicketComp'+this.id_pos_ordercomprobantes+'\')">';
                                            }

                                            if (this.ruta_pdf_a4 !== "") {
                                                iframes += `<iframe id="PDFtoA4Comp` + this.id_pos_ordercomprobantes + `" src="` + this.ruta_pdf_a4 + `" style="display: none;"></iframe>`;
                                                html_buttons += '<input type="button" class="btn btn-warning" value="A4 '+self.tipo_comprobante+'" style="margin: 5px;" onclick="windowPrintAche(\'PDFtoA4Comp'+this.id_pos_ordercomprobantes+'\')">';
                                            }

                                        });

                                    }

                                    $('#alertmessage').after(iframes);
                                    $('.alertmessage').append(html_buttons);
                                    $('.alertmessage').css('display', 'grid');

                                    $("#toolbar_caja_soles").fadeOut("slow", function() {
                                        $(this).text(data.caja_actual.monto_operaciones).fadeIn("slow");
                                    });

                                    self.cart = [];
                                    self.is_active_tab_pago = false;
                                    $('#left-panel').css('pointer-events', 'none');
                                    $('.sales-add-edit-payments').css('pointer-events', 'none');
                                    $('.tabla_lista_venta').css('pointer-events', 'none');
                                }

                            },
                            error: function (error) {
                                console.log(error);
                            },
                            complete: function(data) {
                                // location.reload();
                                $('body').waitMe('hide');
                                self.guardandoEnviar = false;
                            },
                        });
                    }
                }else{
                    $.growl.error({ title: 'Solo puede hacer cotizaciones!', message: '',});
                }
            }else{
                $.growl.error({ title: 'No existen productos para vender!', message: '',});
            }
        },
        cotizarVenta(){
            let self = this;

            if (self.cart.length){
                $.ajax({
                            type:"POST",
                            url: url_ajax_vender,
                            async: true,
                            dataType: "json",
                            data:{
                                ajax: "1",
                                token: token_vender,
                                action : "cotizarVenta",
                                id_cart: id_cart,
                                productos: self.cart,
                                id_customer: self.id_customer,
                                nombre_legal: self.nombre_legal,
                                numero_doc: self.numero_doc,
                                direccion_cliente: self.direccion_cliente,
                            },
                            beforeSend: function(){
                                self.guardandoEnviar = true;
                                $('body').waitMe({
                                    effect: 'bounce',
                                    text: 'Guardando cotización...',
                                    color: '#000',
                                    maxSize: '',
                                    textPos: 'vertical',
                                    fontSize: '',
                                    source: ''
                                });
                            },
                            success: function (data) {
                                if (data.response === 'ok'){

                                    let html_buttons = '';
                                    if(self.perfil_empleado_vue !== 'Vendedor'){
                                        html_buttons += '<a class="btn btn-primary" style="margin: 5px;" target="_blank" href="'+data.link_cotizacion+'">Cotización</a>';
                                    }

                                    $('.alertmessage').append(html_buttons);
                                    $('.alertmessage').css('display', 'grid');

                                    self.cart = [];
                                    self.is_active_tab_pago = false;
                                    $('#left-panel').css('pointer-events', 'none');
                                    $('.sales-add-edit-payments').css('pointer-events', 'none');
                                    $('.tabla_lista_venta').css('pointer-events', 'none');
                                }else{
                                    jAlert("Algo fallo al guardar")
                                }
                            },
                            error: function (error) {
                                console.log(error);
                            },
                            complete: function(data) {
                                // location.reload();
                                $('body').waitMe('hide');
                                self.guardandoEnviar = false;
                            },
                        });
            }else{
                $.growl.error({ title: 'No existen productos para cotizar!', message: '',});v
            }
        },
        enviarComprobanteSunat(){
            let self = this;
            if (!self.order){
                $.growl.error({ title: 'Error al enviar!', message: '',});
            }else{
                $.ajax({
                    type:"POST",
                    url: url_ajax_vender,
                    async: true,
                    dataType: "json",
                    data:{
                        ajax: "1",
                        token: token_vender,
                        action : "enviarSunat",
                        id_order: self.order.id,
                    },
                    beforeSend: function(){
                        // self.guardandoEnviar = true;
                        // $('body').waitMe({
                        //     effect: 'bounce',
                        //     text: 'Enviando...',
                        //     color: '#000',
                        //     maxSize: '',
                        //     textPos: 'vertical',
                        //     fontSize: '',
                        //     source: ''
                        // });
                    },
                    success: function (data) {
                        if (data.result === 'error'){
                            self.msg_errores = [];
                            $.each(data.msg, function (index, value) {
                                self.mostrar_adventencia = true;
                                self.msg_errores.push({
                                    msg: value,
                                });
                            })
                        }
                        if (data.response === 'ok'){

                        }
                    },
                    error: function (error) {
                        // console.log(error);
                    },
                    complete: function(data) {

                    },
                });
            }
        },
        buscarCliente(){
            let that = this;
            //do whatever
            $('.error_ache').remove();
            $.ajax({
                type:"POST",
                url: url_ajax_vender,
                async: true,
                dataType: "json",
                data:{
                    ajax: "1",
                    token: token_vender,
                    tab: "AdminVender",
                    action : "SearchClientes",
                    cliente_search: $.trim(that.cliente),
                },
                beforeSend: function(){
                    $('body').waitMe({
                        effect: 'bounce',
                        text: 'Buscando...',
                        color: '#000',
                        maxSize: '',
                        textPos: 'vertical',
                        fontSize: '',
                        source: ''
                    });
                },
                success: function (data) {
                    that.bloquear_error = false;
                    if (data.msg){
                        that.buscarEnSunat();
                    }else{
                        that.fillCustomer(data.result);
                        $('body').waitMe('hide');
                    }
                },
                error: function (error) {
                    // console.log(error);
                },
                complete: function (data) {


                }
            });
        },
        buscarEnSunat(){
            let that = this;
            //do whatever
            $.ajax({
                type:"POST",
                url: url_ajax_vender,
                async: true,
                dataType: "json",
                data:{
                    ajax: "1",
                    token: token_vender,
                    tab: "AdminVender",
                    action : "getDataSunat",
                    nruc: $.trim(that.cliente),
                },
                success: function (data) {
                    // console.log(data)
                    if (data.tipo_msg === 'encontrado'){
                        that.fillCustomer(data.cliente);
                    }else if(data.tipo_msg === 'nofound'){
                        $('.v-autocomplete').after('<small style="color: red;" class="error_ache">Cliente no encontrado en SUNAT (Llene los campos)</small>');
                        that.mostrar_form_cliente = true;
                        that.id_customer = 0;
                        that.bloquear_error = true;
                        that.numero_doc = that.cliente;
                        that.show_forma_pago = false;
                    }else{
                        $('.v-autocomplete').after('<small style="color: red;" class="error_ache">Número de documento no válido</small>');
                        that.mostrar_form_cliente = false;
                        that.bloquear_error = true;
                        that.show_forma_pago = false;
                    }
                },
                error: function (error) {
                    // console.log(error);
                },
                complete: function (data) {
                    $('body').waitMe('hide');

                }
            });
        },
        fillCustomer(data){
            // console.log(data);
            let self = this;
            self.id_customer = data.id_customer;
            self.cliente = data.num_document;
            // self.cliente = data.firstname +' - '+ data.num_document;
            self.nombre_legal = data.firstname;
            self.numero_doc = data.num_document;
            self.tipo_doc = data.tipo_documento;
            self.cod_sunat = data.cod_sunat;
            self.show_forma_pago = parseInt(data.es_credito) === 1;

            if (data.direccion){
                self.direccion_cliente = data.direccion;
            }

            if (parseInt(self.cod_sunat) === 6 && self.tipo_comprobante === 'Factura'){
                self.borrarErrores();
            }

            if (self.id_customer !== 1 && parseInt(self.cod_sunat) === 1 && self.tipo_comprobante === 'Factura'){
                self.borrarErrores();
                self.mostrarErrores();
                self.msg_errores.push({
                    msg: "Debe indicar un cliente con RUC"
                })
            }

        },
        borrarCliente(){
            $('.error_ache').remove();
            let self = this;
            self.id_customer = 1;
            self.cliente = "";
            self.nombre_legal = "";
            self.numero_doc = "";
            self.tipo_doc = "";
            self.direccion_cliente = "No Definido";
            self.mostrar_form_cliente = false;
            self.show_forma_pago = false;
            this.$refs.cliente.focus();


            self.borrarErrores();
            if (self.id_customer === 1 && self.tipo_comprobante === 'Factura'){
                self.mostrarErrores();
                self.msg_errores.push({
                    msg: "Una FACTURA debe tener un cliente",
                });
                self.msg_errores.push({
                    msg: "Debe indicar un cliente con RUC"
                });
            }

        },
        addPayment(){
            let self = this;
            self.pagos.push({
                id_metodo_pago: 0,
                tipo: 'efectivo',
                name_pay: "Pago en Efectivo",
                fecha: $.datepicker.formatDate('yy-mm-dd', new Date()),
                monto: 0,
            });
        },
        borrarPago (item) {

            for( let i = 0; i < this.pagos.length; i++){
                if(this.pagos[i].id_metodo_pago === item.id_metodo_pago){
                    this.pagos.splice(i, 1);
                    break;
                }
            }

        },
    },
    mounted() {
        let self = this;

            window.addEventListener('keyup', function(event) {
                if (event.keyCode === 13 && self.indx_selected >= 0) {
                    if (!self.is_active_tab_pago){
                        $('#table_list_products tr').eq(self.indx_selected).trigger('click');
                        highlight(-1);
                        self.indx_selected = -1;
                    }
                }
            });

            window.addEventListener('keydown', function(e) {
                switch(e.which)
                {
                    case 38:
                        if (!self.is_active_tab_pago) {
                            self.indx_selected = $('#table_list_products tbody tr.highlight').index() - 1;
                            highlight($('#table_list_products tbody tr.highlight').index() - 1);
                            self.$refs.search.blur();
                        }
                        break;
                    case 40:
                        if (!self.is_active_tab_pago) {
                            self.indx_selected = $('#table_list_products tbody tr.highlight').index() + 1;
                            highlight($('#table_list_products tbody tr.highlight').index() + 1);
                            self.$refs.search.blur();
                        }
                        break;
                }
            });
    },
    updated(){

    },
    filters: {
        moneda_ache: function (price) {
            // return 'S/ ' + parseFloat(price).toFixed(4);
            return 'S/ ' + ps_round(parseFloat(price), 6);
        },
        num_entero: function (cant) {
            return parseInt(cant);
        }
    }
});


function windowPrintAche(id_selector){
    var ua = navigator.userAgent.toLowerCase();
    var iframe = document.getElementById(id_selector);
    var msie = ua.indexOf ("msie");
    if( navigator.userAgent.match(/Android/i)
        || navigator.userAgent.match(/webOS/i)
        || navigator.userAgent.match(/iPhone/i)
        || navigator.userAgent.match(/iPad/i)
        || navigator.userAgent.match(/iPod/i)
        || navigator.userAgent.match(/BlackBerry/i)
    ){
        var url = iframe.src;
        var tabOrWindow = window.open(url, '_blank');
        tabOrWindow.focus();
    }
    else{

        iframe.focus();
        if (msie > 0) {
            iframe.contentWindow.document.execCommand('print', false, null);
        } else {
            iframe.contentWindow.print();
        }
    }
}