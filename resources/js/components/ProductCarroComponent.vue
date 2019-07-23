<template>
    <div class="row my-3">
        <div class="col-md-12">
            <!--<pre class="language-json"><code>{{ producto  }}</code></pre>-->
            <h4 class="">$ {{ producto.price.toFixed(3) }}</h4>
            <div class="form-group ">
                <input style="width: 100px;" type="number" :min="0" v-model="carrito.qty" class="form-control ">
            </div>
            <button @click="addCarrito" class="btn distren-fondo p-2 mx-0"><i class="fas fa-shopping-cart text-white"></i> Añadir al carrito</button>
        </div>
        <div class="col-md-6">
            <!--<p class="">$ {{ producto.price.toFixed(3) }}</p>-->
        </div>
        <!--<div class="col-md-4 offset-md-8">-->
            <!--<div class="d-flex justify-content-between">-->
                <!--<h4 class="">Sub Total</h4>-->
                <!--<h4 class="">$ {{ getTotal.toFixed(2)  }}</h4>-->
            <!--</div>-->
            <!--<div class="d-flex justify-content-between">-->
                <!--<h4 class="">IVA (21%)</h4>-->
                <!--<h4>${{ (getTotal*0.21).toFixed(2)  }}</h4>-->
            <!--</div>-->
            <!--<hr class=" bg-dark">-->
            <!--<div class="d-flex justify-content-between">-->
                <!--<h4 class="distren-color">TOTAL</h4>-->
                <!--<h4 class="">{{ (getTotal*1.21).toFixed(2)  }}</h4>-->
            <!--</div>-->
            <!--<div class="d-flex justify-content-end">-->

                <!--<button @click="addCarrito" class="btn distren-fondo p-2 mx-0"><i class="fas fa-shopping-cart text-white"></i> Añadir al carrito</button>-->
            <!--</div>-->
        <!--</div>-->
    </div>
</template>

<script>
    import toastr from 'toastr';
    import {Money} from 'v-money'
    export default {
        props: ['producto'],
        components: {Money},
        data(){
            return{
                carrito:[],
                productocapacidad:[],
                total: 0,
                subtotal:0,
                test: 1,
                quantity_max_cierre: {},
                quantity_max_cc: {},
                money: {
                    decimal: ',',
                    thousands: '.',
                    prefix: '$',
                    // suffix: '',
                    precision: 2,
                    masked: true /* doesn't work with directive */
                }
            }
        },
        mounted() {

            console.log(this.nombrecategoria)
            //console.log(this.cierres)
            // toastr.options = {
            //     "closeButton": false,
            //     "debug": false,
            //     "newestOnTop": false,
            //     "progressBar": true,
            //     "positionClass": "toast-top-right",
            //     "preventDuplicates": false,
            //     "onclick": null,
            //     "showDuration": "300",
            //     "hideDuration": "1000",
            //     "timeOut": "5000",
            //     "extendedTimeOut": "1000",
            //     "showEasing": "swing",
            //     "hideEasing": "linear",
            //     "showMethod": "fadeIn",
            //     "hideMethod": "fadeOut"
            // },
            //this.total_price();

            // this.getCapacidad()
            //console.log(['dsd',this.quantity_max_cierre])
        },
        computed:{
            getTotal: function() {
                // return this.productocapacidad.reduce((total, product) => {
                let total = 0;
                this.productocapacidad.forEach((item, key)=>{
                    if (item.offer)
                    {
                        total += item.qty*item.price + item.qty_cierre*item.cierre.price + item.qty*item.terminacion.price

                    }else{
                        total += item.qty*item.price + item.qty_cierre*item.cierre.price + item.qty*item.terminacion.price

                    }
                })
                // console.log(total)
                return total
                // }, 0)
            },

        },
        methods: {
            getSubtotal: function(item) {
                //console.log(item)
                let subtotal = 0;
                subtotal = item.qty*item.price + item.qty_cierre*item.cierre.price + item.qty*item.terminacion.price
                return subtotal
                // }, 0)
            },

            // changeTipoCierre(item){
            //     this.test = 0;
            //     item.cantidad_cierre = '';
            //     this.test = 1;
            // },
            // changeCantidadCC(event){
            //     var self = this;
            //     this.test = 0;
            //     this.precio.forEach(function(item){
            //         self.quantity_max_cc[item.capacity_id] = item.quantity;
            //         console.log([self.quantity_max_cc])
            //     });
            //     this.productocapacidad.forEach(function (item) {
            //         self.quantity_max_cc[item.cc.id] -= item.cantidad_cc
            //     });
            //     this.test = 1;
            // },
            // changeCantidadCierre(event, item){
            //     var self = this;
            //     this.test = 0;
            //     this.cierres.forEach(function(item){
            //         self.quantity_max_cierre[item.id] = item.quantity;
            //     });
            //     //
            //     //console.log(['este', self.quantity_max_cierre])
            //     this.productocapacidad.some(function (item) {
            //         self.quantity_max_cierre[item.tipo_cierre.id] -= item.cantidad_cierre
            //         // item.cierres.forEach(function (cierre) {
            //         //     self.quantity_max_cierre[cierre.id] -= item.cantidad_cierre
            //         //     // console.log(self.quantity_max_cierre)
            //         // });
            //     });
            //     this.test = 1;
            // },
            getCapacidad: function(){
                //console.log(this.precio);
                this.capacidad.forEach((ob,index)=>{
                    this.productocapacidad.push(
                        {
                            cc: ob.cc,
                            price: parseFloat(ob.price),
                            price_offer: parseFloat(ob.precio_offer),
                            qty: 0,
                            qty_cierre: 0,
                            cierre: {price: 0},
                            terminacion: this.terminaciones[0],
                            offer: parseInt(ob.offer),
                            activo: false,
                        }
                    )
                    //this.quantity_max_cc = ob.quantity;
                });
                //console.log(this.productocapacidad)
            },
            //
            addCapacidad: function (item,index) {
                // let cantidad_max = 0;

                this.productocapacidad.splice(index+1,0, {
                    cc: item.cc,
                    price: item.price,
                    qty: 0,
                    // terminaciones: this.terminaciones,
                    // precio_terminacion: 0,
                    cierre: {price: 0},
                    terminacion: {price: 0},
                    // cierres:this.cierres,
                    price_cierre: 0,
                    qty_cierre: 0,
                    activo: false,
                    // oferta: item.oferta,
                    price_offer: item.price_offer,
                    // quantity_max: item.quantity_max-item.cantidad_cc
                });
                //console.log(this.productocapacidad)
            },
            deleteCapacidad: function (index) {
                this.productocapacidad.splice(index, 1);
                if (this.productocapacidad.length === 0)
                    this.addCapacidad()

            },
            // getSubTotal(item) {
            //     return item.priceenvase*item.cantidadenvases;
            // },
            addCarrito(){
                //let b = localStorage.setItem("carrito",[]);
                //filtro all los activos
                let carrito = [];
                let isactive = this.productocapacidad.filter(item => item.activo);
                // console.log(isactive);

                if (isactive.length != 0)
                {

                    // let isactive = this.productocapacidad.filter(item => item.activo);
                    if (localStorage.getItem('carrito')){
                        carrito = JSON.parse(localStorage.getItem('carrito'));
                    }
                    //Armo el carro para mandarlo al carrito
                    isactive.forEach((item)=>{
                        // console.log(item)
                        carrito.push({
                            categoria: this.nombrecategoria,
                            producto:  this.nombreproducto,
                            cc: item.cc,
                            terminaciones: this.terminaciones,
                            cierres: this.cierres,
                            cierre: item.cierre,
                            terminacion: item.terminacion,
                            precio: item.price,
                            cantidad: item.qty,
                            // precio_cierre: item.precio_cierre,
                            cantidad_cierre: item.qty_cierre,
                            oferta: item.offer,
                            precio_oferta: item.price_offer,
                        });
                    });
                    localStorage.setItem('carrito', JSON.stringify(carrito));
                    let b = JSON.parse(localStorage.getItem('carrito'));
                    console.log(b);
                    toastr.success('Agregado al carrito',this.nombreproducto)
                }else{
                    toastr.warning('Agregue algun producto')
                }
            }
        }
    }
</script>

<style scoped>

    table{
        border-bottom: 2px solid #8BBF40 ;
    }
</style>
