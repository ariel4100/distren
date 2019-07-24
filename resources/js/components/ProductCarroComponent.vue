<template>
    <div class="row my-3">
        <div class="col-md-6">
            <!--<pre class="language-json"><code>{{ producto  }}</code></pre>-->

            <div class="form-group ">
                <input style="width: 100px;" type="number" :min="0" v-model="carrito.qty" class="form-control ">
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="">$ {{ carrito.qty != 0 ? (producto.price*carrito.qty).toFixed(2) : producto.price.toFixed(2) }}</h4>
            <!--<p class="">$ {{ producto.price.toFixed(3) }}</p>-->
        </div>
        <div class="col-md-12">
            <button @click="addCarrito" class="btn distren-fondo p-2 mx-0"><i class="fas fa-shopping-cart text-white"></i> Añadir al carrito</button>
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
                carrito:{
                    // categoria: this.producto.category.title,
                    producto: this.producto,
                    qty:0,
                },
                productocapacidad:[],
                total: 0,
                subtotal:0,
                test: 1,
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

            // console.log(this.producto)
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
 
            addCarrito(){

                let carrito = []
                let new_id = true
                // console.log(this.carrito);
                if (this.carrito.qty > 0){
                    if (localStorage.getItem('carrito')){
                        carrito = JSON.parse(localStorage.getItem('carrito'));
                    }
                    if (carrito.length)
                    {
                         carrito.filter(cart => {
                            if (cart.producto.id == this.carrito.producto.id) {
                                // console.log(cart)
                                cart.qty = this.carrito.qty
                                localStorage.setItem('carrito', JSON.stringify(carrito));
                                new_id = false
                            }
                        });
                    }else{
                        new_id = true
                    }
                    console.log(new_id)
                    if (new_id){
                        carrito.push(this.carrito);
                        localStorage.setItem('carrito', JSON.stringify(carrito));
                    }

                    //imprimo el carrito
                    // let b = JSON.parse(localStorage.getItem('carrito'));
                    // console.log(b);
                    toastr.success('Agregado al carrito',this.carrito.producto.title)
                }else{
                    toastr.warning('Agregue algun producto')
                }
                return false;
            }
        }
    }
</script>

<style scoped>

    table{
        border-bottom: 2px solid #8BBF40 ;
    }
</style>
