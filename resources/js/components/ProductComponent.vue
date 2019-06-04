<template>
    <div class="row my-3">
        <div class="col-md-12">
            <h4 class="distren-color">Capacidad</h4>
            <!--<pre class="language-json"><code>{{ total_price  }}</code></pre>-->
            <table class="table table-responsive ">
                <thead class="distren-fondo white-text">
                <tr>
                    <th class="align-middle py-1 text-center" rowspan="2" style="border-right: 1px solid white; line-height: 1">ml/cm2</th>
                    <th class="align-middle py-1 text-center" colspan="3" style="border-right: 1px solid white; line-height: 1">Envases</th>
                    <th class="align-middle py-1 text-center" colspan="2" style="border-right: 1px solid white; line-height: 1">Terminacion</th>
                    <th class="align-middle py-1 text-center" colspan="4" style="border-right: 1px solid white; line-height: 1">Cierre</th>
                    <th class="align-middle py-1 text-center" rowspan="2" style="border-right: 1px solid white; line-height: 1">Subtotal Productos</th>
                </tr>
                <tr>
                    <th class="align-middle py-1 text-center"  style="border-right: 1px solid white; line-height: 1">Precio</th>
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Cant. Envases / Potes</th>
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Subtotal</th>
                    <!--<th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Terminación</th>-->
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Tipo</th>
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio</th>
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Tipo</th>
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Cant.</th>
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio</th>
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item,index) in productocapacidad" :key="index">
                    <td style="vertical-align: middle">{{ item.cc.cc }}</td>
                    <td style="vertical-align: middle" v-if="item.oferta.offer">
                        <del>${{ item.precio_cc.toFixed(2) }}</del>
                        ${{ item.precio_oferta.toFixed(2) }}
                    </td>
                    <td style="vertical-align: middle" v-else>${{ item.precio_cc.toFixed(2) }}</td>
                    <td style="width: 90px; vertical-align: middle">
                        <div class="form-group m-0">
                            <input style="width: 50px;" type="number" v-model="item.cantidad_cc" class="form-control form-control-sm">
                        </div>
                    </td>
                    <td style="vertical-align: middle" v-if="item.oferta.offer">${{ (item.precio_oferta*item.cantidad_cc).toFixed(2) }}</td>
                    <td style="vertical-align: middle" v-else>${{ (item.precio_cc*item.cantidad_cc).toFixed(2) }}</td>
                    <!---TERMINACIONES--->
                    <td style="width: 90px; vertical-align: middle">
                        <div class="d-flex align-items-center justify-content-between">
                            <button @click="addCapacidad(item,index)" class="btn btn-link p-0"><i class="fas fa-plus distren-color"></i></button>
                            <select style="width: 100px;" class="browser-default custom-select custom-select-sm" v-model="item.tipo_terminacion">
                                <option :value="item.tipo_terminacion.title ? item.tipo_terminacion.title : item.tipo_terminacion" disabled selected>Seleccione...</option>
                                <option v-for="item in item.terminaciones" :value="item">
                                    {{ item.title }}
                                </option>
                            </select>
                        </div>
                    </td>
                    <td style="vertical-align: middle">${{ item.tipo_terminacion.price.toFixed(2) }}</td>
                    <!---CIERRES--->
                    <td style="width: 90px; vertical-align: middle">
                        <div class="d-flex align-items-center justify-content-between">
                            <button @click="addCapacidad(item,index)" class="btn btn-link p-0"><i class="fas fa-plus distren-color"></i></button>
                            <select style="width: 100px;" class="browser-default custom-select custom-select-sm" v-model="item.tipo_cierre">
                                <option :value="item.tipo_cierre.title ? item.tipo_cierre.title : item.tipo_cierre" disabled selected>Seleccione...</option>
                                <option v-for="cierre in item.cierres" :value="cierre">
                                    {{ cierre.title }}
                                </option>
                            </select>
                        </div>
                    </td>
                    <td style="width: 90px; vertical-align: middle">
                        <div class="form-group m-0">
                            <input style="width: 50px;" type="number" v-model="item.cantidad_cierre" class="form-control form-control-sm">
                        </div>
                    </td>
                    <td style="vertical-align: middle">${{ item.tipo_cierre.price.toFixed(2) }}</td>
                    <td style="vertical-align: middle">${{ (item.cantidad_cierre*item.tipo_cierre.price).toFixed(2) }}</td>
                    <td style="vertical-align: middle">
                        <div class="d-flex align-items-center justify-content-between">
                            <span v-if="item.oferta.offer">${{ ((item.precio_oferta*item.cantidad_cc) + (item.cantidad_cc*item.tipo_terminacion.price) + (item.cantidad_cierre*item.tipo_cierre.price)).toFixed(2) }}</span>
                            <span v-else>${{ (parseFloat(item.precio_cc*item.cantidad_cc) + (item.cantidad_cc*item.tipo_terminacion.price) + (item.cantidad_cierre*item.tipo_cierre.price)).toFixed(2) }}</span>
                            <span> {{ parseInt((item.precio_cc*item.cantidad_cc) + (item.cantidad_cc*item.tipo_terminacion.price) + (item.cantidad_cierre*item.tipo_cierre.price)) > 0 ? item.activo = true : item.activo = false }}</span>
                            <button @click="deleteCapacidad(index)" class="btn btn-link p-0 ml-3"><i class="fas fa-shopping-cart" v-bind:class="(parseInt(item.precio_cc*item.cantidad_cc) + (item.cantidad_cc*item.tipo_terminacion.price) + (item.cantidad_cierre*item.tipo_cierre.price)) != 0 ? 'distren-color' : null"></i></button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 offset-md-8">
            <div class="d-flex justify-content-between">
                <h4 class="">Sub Total</h4>
                <h4 class="">$ {{ getTotal.toFixed(2) }}</h4>
            </div>
            <div class="d-flex justify-content-between">
                <h4 class="">IVA (21%)</h4>
                <h4>${{ (getTotal*0.21).toFixed(2) }}</h4>
            </div>
            <hr class=" bg-dark">
            <div class="d-flex justify-content-between">
                <h4 class="distren-color">TOTAL</h4>
                <h4 class="">{{ (getTotal*1.21).toFixed(2) }}</h4>
            </div>
            <div class="d-flex justify-content-end">

                <button @click="addCarrito" class="btn distren-fondo p-2 mx-0"><i class="fas fa-shopping-cart text-white"></i> Añadir al carrito</button>
            </div>
        </div>
    </div>
</template>

<script>
    import toastr from 'toastr';
    import {Money} from 'v-money'
    export default {
        props:{
            nombrecategoria: String,
            nombreproducto: String,
            cierres: Array,
            producto: Array,
            precio: Array,
            terminaciones: Array,
        },
        components: {Money},
        data(){
            return{
                carrito:[],
                productocapacidad:[],
                qty:0,
                total: 0,
                subtotal:0,
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
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            },
            //this.total_price();

            this.ponerdatos()
            //console.log('Component mounted.')
        },
        computed:{
            getSubtotal: function(item) {
                // return this.productocapacidad.reduce((total, product) => {
                this.subtotal = 0;

                return this.subtotal
                // }, 0)
            },
            getTotal: function() {
                // return this.productocapacidad.reduce((total, product) => {
                    this.total = 0;
                    this.productocapacidad.forEach((item, key)=>{
                        //console.log(item)
                        if (item.oferta.offer)
                        {

                            this.total += ((item.precio_oferta*item.cantidad_cc) + (item.cantidad_cc*item.tipo_terminacion.price) +(item.cantidad_cierre*item.tipo_cierre.price))
                        }else{

                            this.total += ((item.precio_cc*item.cantidad_cc) + (item.cantidad_cc*item.tipo_terminacion.price) +(item.cantidad_cierre*item.tipo_cierre.price))
                        }
                    })
                    return this.total
                // }, 0)
            },
        },
        methods: {
            ponerdatos: function(){
                console.log(this.precio);
                this.precio.forEach((ob,index)=>{
                    this.productocapacidad.push(
                        {
                            cc: ob.capacity,
                            precio_cc: ob.price,
                            precio_oferta: ob.offer_price,
                            cantidad_cc: 0,
                            terminaciones: this.terminaciones,
                            cierres : this.cierres,
                            tipo_cierre: {price: 0},
                            tipo_terminacion: {price: 0},
                            precio_terminacion:0,
                            precio_cierre:0,
                            cantidad_cierre: 0,
                            oferta: ob.product,
                            activo: false
                        }
                    )
                });
                //console.log(this.precio)
            },

            addCapacidad: function (item,index) {
                this.productocapacidad.splice(index+1,0, {
                    precio_cc: item.precio_cc,
                    cc: item.cc,
                    cantidad_cc: 0,
                    terminaciones: this.terminaciones,
                    precio_terminacion: 0,
                    tipo_cierre: {price: 0},
                    tipo_terminacion: {price: 0},
                    cierres:this.cierres,
                    precio_cierre: 0,
                    cantidad_cierre: 0,
                    activo: false,
                    oferta: item.oferta,
                    precio_oferta: item.precio_oferta,
                });
                //console.log(this.carrito)
            },
            deleteCapacidad: function (index) {
                this.productocapacidad.splice(index, 1);
                if (this.productocapacidad.length === 0)
                    this.addCapacidad()

            },
            getSubTotal(item) {
                return item.priceenvase*item.cantidadenvases
            },
            addCarrito(){
                //let b = localStorage.setItem("carrito",[]);
                //filtro all los activos
                let carro = [];
                let isactive = this.productocapacidad.filter(item => item.activo);
                if (localStorage.getItem('carrito')){
                    carro = JSON.parse(localStorage.getItem('carrito'));
                }


                //Armo el carro para mandarlo al carrito
                isactive.forEach((item)=>{
                    carro.push({
                        categoria: this.nombrecategoria,
                        producto:  this.nombreproducto,
                        cc: item.cc,
                        terminaciones: this.terminaciones,
                        cierres: this.cierres,
                        tipo_cierre: item.tipo_cierre,
                        tipo_terminacion: item.tipo_terminacion,
                        precio_terminacion: item.precio_terminacion,
                        cantidad_terminacion: item.cantidad_terminacion,
                        precio_cc: item.precio_cc,
                        cantidad_cc: item.cantidad_cc,
                        precio_cierre: item.precio_cierre,
                        cantidad_cierre: item.cantidad_cierre,
                        oferta: item.oferta,
                        precio_oferta: item.precio_oferta
                    });
                });
                localStorage.setItem('carrito', JSON.stringify(carro));
                let b = JSON.parse(localStorage.getItem('carrito'));
                console.log(b);
                toastr.success('Agregado al carrito',this.nombreproducto)

            }
        }
    }
</script>

<style scoped>

    table{
        border-bottom: 2px solid #8BBF40 ;
    }
</style>
