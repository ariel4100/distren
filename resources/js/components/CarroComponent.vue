<template>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table">
                    <thead class="distren-fondo white-text">
                    <tr>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Codigo</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Categoria</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Producto</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Cantidad</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="test == 1"  v-for="(item,index) in carrito" :key="index">
                        <td class="text-center" style="width: 200px; vertical-align: middle">{{ item.producto.code}}</td>
                        <td class="text-center" style="width: 200px; vertical-align: middle">{{ item.producto.category.title  }}</td>
                        <td class="text-center" style="width: 300px; vertical-align: middle">
                            {{ item.producto.title  }}<br>
                            <!--Codigo: {{ item.producto.code  }}-->
                        </td>
                        <td class="text-center" style="vertical-align: middle">$ {{ item.producto.price.toFixed(2) }}</td>
                        <!--<td style="vertical-align: middle">{{ item.producto }}</td>-->
                        <!--<td style="vertical-align: middle">{{ item.cc }}</td>-->
                        <!--<td style="vertical-align: middle">${{ item.precio  }}</td>-->
                        <td style="width: 90px; vertical-align: middle">
                            <div class="form-group m-0">
                                <input style="width: 70px;" type="number" :min="0" v-model="item.qty" class="form-control form-control-sm">
                            </div>
                        </td>

                        <td class="text-center position-relative" style="width: 200px; vertical-align: middle">

                                <div class="">
                                    $ {{ (item.producto.price*item.qty).toFixed(2) }}
                                </div>

                            <button @click="deleteProducto(index)" class="btn btn-link  p-0 ml-3 position-absolute" style="right: 0; top: 15px"><i class="far fa-times-circle"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <h4  v-if="!carrito.length" class="text-center">Carrito esta vacio</h4>
            </div>
            <div class="col-md-4 offset-md-8" v-if="carrito.length > 0">
                <div class="mb-3">
                    <h5 class="distren-color border-bottom">{{ info && info.envio }}</h5>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Retiro en el local" value="retiro-local" v-model="compra.envio">
                        <label class="custom-control-label" for="Retiro en el local">Retiro en el local (sin cargo)</label>
                    </div>
                    <div class="" v-if="compra.envio == 'Retiro en el local'">
                        <div class="" v-html="info.local"></div>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="caba" value="caba" v-model="compra.envio">
                        <label class="custom-control-label" for="caba">Envío a C.A.B.A y G.B.A</label>
                    </div>
                    <div class="" v-if="compra.envio == 'C.A.B.A y G.B.A'">
                        <p class="m-0 my-1">Ingrese Código Postal</p>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" v-model="compra.postal" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" v-model="compra.precio" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <div class="md-form m-0">
                                    <input type="text" id="Dirección" v-model="compra.direccion" class="form-control">
                                    <label for="Dirección">Dirección</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Expreso" value="expreso" v-model="compra.envio">
                        <label class="custom-control-label" for="Expreso">Expreso</label>
                    </div>
                    <div class="" v-if="compra.envio == 'Expreso'">
                        <div class="" v-html="info && info.expreso"></div>
                    </div>
                    <p class="">Acuerdas la forma de entrega del producto después de la compra.</p>
                </div>
                <div class=" ">
                    <h5 class="distren-color border-bottom">{{ info && info.pago }}</h5>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample1" value="Transferencia Bancaria" v-model="compra.pago">
                        <label class="custom-control-label" for="defaultGroupExample1">Transferencia Bancaria</label>
                    </div>
                    <div class="" v-if="compra.pago == 'Transferencia Bancaria'">
                        <div class="" v-html="info && info.banco"></div>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample2" value="Efectivo" v-model="compra.pago">
                        <label class="custom-control-label" for="defaultGroupExample2">Efectivo</label>
                    </div>
                    <div class="" v-if="compra.pago == 'Efectivo'">
                        <div class="" v-html="info && info.efectivo"></div>
                    </div>
                </div>
                <hr class="distren-fondo">
                <div class="d-flex justify-content-between">
                    <h5 class="">Sub Total</h5>
                    <h5 class="">$ {{ getTotal.toFixed(2)  }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="">IVA (21%)</h5>
                    <h5>${{ (getTotal*0.21).toFixed(2) }}</h5>
                </div>
                <div v-if="compra.envio == 'C.A.B.A y G.B.A'" class="d-flex justify-content-between">
                    <h5 class="">Envio</h5>
                    <h5>$700</h5>
                </div>
                <div class="d-flex justify-content-between align-item-center mt-3">
                    <h5 class="distren-color m-0">Total a pagar</h5>
                    <h5 class="m-0 text-dark">${{ (getTotal*1.21).toFixed(2)  }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="text-small m-0 p-0">Precio Final IVA incluido</p>
                </div>
                <hr class="distren-fondo">
                <div class="d-flex justify-content-between">
                    <a @click="updateCarrito" :href="`productos`" class="btn py-2" style="border: 1px solid #8BBF40">Seguir comprando</a>
                    <a @click="updateCarrito" :href="`confirmar`"  class="btn distren-fondo py-2">Pagar</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import toastr from 'toastr';
    export default {
        props:['info'],
        data(){
            return{
                carrito : JSON.parse(localStorage.getItem('carrito')) ?  JSON.parse(localStorage.getItem('carrito')) : [],
                url : document.__API_URL,
                //total: 0,
                test: 1,

                compra:{
                    pago:'Efectivo',
                    envio:'retiro-local',
                    precio:0,
                    postal:0,
                    direccion:'',
                    total: 0
                }
            }
        },
        mounted() {
            // console.log(this.carrito)
            // console.log(this.info)
            var self = this;
            // this.cierres.forEach(function(item){
            //     self.quantity_max_cierre[item.id] = item.quantity;
            // });
            // this.carrito.forEach(function(item){
            //     //console.log(['aca',item]);
            //     self.quantity_max_cc = item.quantity_max_cc
            //     //console.log(['aca',self.quantity_max_cc])
            // });
            //console.log(this.quantity_max_cc)
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

                //this.getCapacidad();

        },

        computed:{

            getTotal: function() {
                // return this.productocapacidad.reduce((total, product) => {
                // console.log(this.carrito)
                let total = 0;
                this.carrito.forEach((item, key)=>{
                    if (item.offer)
                    {
                        // console.log(item)
                        total += item.qty*item.producto.price_offer

                    }else{
                        // console.log(item)
                        total += item.qty*item.producto.price

                    }
                })
                this.compra.total = total
                console.log(this.compra.total)
                return total
                // }, 0)
            },
        },
        methods:{
            getSubtotal: function(item) {
                //console.log(item)
                let subtotal = 0;
                subtotal = item.cantidad*item.precio + item.cantidad_cierre*item.cierre.price + item.cantidad*item.terminacion.price
                return subtotal
                // }, 0)
            },
            // changeCantidadCC(event){
            //     var self = this;
            //     this.test = 0;
            //     this.carrito.forEach(function (item) {
            //         //console.log(item.quantity_max_cc[item.cc.id]);
            //         self.quantity_max_cc[item.cc.id] = item.quantity_max
            //         //self.quantity_max_cc[item.cc.id] -= item.cantidad_cc
            //     });
            //     this.carrito.forEach(function (item) {
            //         //console.log(item.quantity_max_cc[item.cc.id]);
            //         self.quantity_max_cc[item.cc.id] -= item.cantidad_cc
            //         //self.quantity_max_cc[item.cc.id] -= item.cantidad_cc
            //     });
            //     this.test = 1;
            // },
            getCapacidad: function(){

                console.log(this.carrito)
            },

            addProducto: function (item,index) {

                this.carrito.splice(index+1,0, {
                    categoria: item.categoria,
                    producto:  item.producto,
                    cc: item.cc,
                    precio: item.precio,
                    cantidad: 0,
                    terminaciones: item.terminaciones,
                    cierres: item.cierres,
                    terminacion: item.terminacion,
                    cierre: item.cierre,
                    cantidad_cierre: 0,
                    activo: false,
                    precio_oferta: item.precio_oferta,
                    oferta: item.oferta,
                });
                //console.log(this.carrito)
            },
            deleteProducto: function (index) {
                //console.log(index);
                this.carrito.splice(index, 1);
                localStorage.setItem('carrito', JSON.stringify(this.carrito));
                let b = JSON.parse(localStorage.getItem('carrito'));
                console.log(b);
                // toastr.success('Have fun storming the castle!', 'Miracle Max Says')
                // if (this.carrito.length === 0)
                //     this.addCarrito()

            },
            updateCarrito(){
                //console.log(this.compra)
                let carro = [];
                //Actualizo los productos que modifico en el carrito.
                // this.carrito.forEach((item)=>{
                //     carro.push({
                //         categoria: item.categoria,
                //         producto:  item.producto,
                //         cc: item.cc,
                //         terminaciones: item.terminaciones,
                //         cierres: item.cierres,
                //         tipo_cierre: item.tipo_cierre,
                //         tipo_terminacion: item.tipo_terminacion,
                //         precio_terminacion: item.precio_terminacion,
                //         cantidad_terminacion: item.cantidad_terminacion,
                //         precio_cc: item.precio_cc,
                //         cantidad_cc: item.cantidad_cc,
                //         precio_cierre: item.precio_cierre,
                //         cantidad_cierre: item.cantidad_cierre,
                //         oferta: item.oferta,
                //         precio_oferta: item.precio_oferta
                //     });
                // });
                localStorage.setItem('carrito', JSON.stringify(this.carrito));
                localStorage.setItem('compra', JSON.stringify(this.compra));
                let b = JSON.parse(localStorage.getItem('compra'));
                console.log(b);

                // toastr.success('Agregado al carrito',this.nombreproducto)
            }
        }
    }
</script>

<style scoped>

    table{
        border-bottom: 2px solid #8BBF40 ;
    }
</style>