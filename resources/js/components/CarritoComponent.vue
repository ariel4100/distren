<template>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table">
                    <thead class="distren-fondo white-text">
                    <tr>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Categoria</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Producto</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">ml/cm2</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Cant. Envases / Potes</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Subtotal</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Terminación</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Cierre</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Cant. Cierres</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Subtotal</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Subtotal Productos</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item,index) in carrito" :key="index">
                        <td style="vertical-align: middle">{{ item.categoria }}</td>
                        <td style="vertical-align: middle">{{ item.producto }}</td>
                        <td style="vertical-align: middle">{{ item.cc.cc }}</td>
                        <td style="vertical-align: middle" v-if="item.oferta.offer">
                            <del>${{ item.precio_cc.toFixed(2) }}</del>
                            ${{ item.precio_oferta.toFixed(2) }}
                        </td>
                        <td style="vertical-align: middle" v-else>${{ item.precio_cc.toFixed(2) }}</td>
                        <td style="width: 90px; vertical-align: middle">
                            <div class="form-group m-0">
                                <input type="number" v-model="item.cantidad_cc" class="form-control form-control-sm">
                            </div>
                        </td>
                        <td style="vertical-align: middle" v-if="item.oferta.offer">${{ (item.precio_oferta*item.cantidad_cc).toFixed(2) }}</td>
                        <td style="vertical-align: middle" v-else>${{ (item.precio_cc*item.cantidad_cc).toFixed(2) }}</td>
                        <!----TERMINACION----->
                        <td style="vertical-align: middle">
                            <select style="width: 100px;" class="browser-default custom-select custom-select-sm" v-model="item.tipo_terminacion">
                                <option disabled selected>Seleccionar</option>
                                <option v-for="(item,index) in item.terminaciones" :value="item">
                                    {{ item.title }}
                                </option>
                            </select>
                        </td>
                        <td style="vertical-align: middle">${{ item.tipo_terminacion.price }}</td>
                        <!----CIERRES----->
                        <td style="vertical-align: middle">
                            <div class="d-flex align-items-center justify-content-between">
                                <button @click="addCarrito(item,index)" class="btn btn-link p-0"><i class="fas fa-plus distren-color"></i></button>
                                <select style="width: 100px;" class="browser-default custom-select custom-select-sm" v-model="item.tipo_cierre">
                                    <option disabled selected>Seleccionar</option>
                                    <option v-for="(item,index) in item.cierres" :value="item">
                                        {{ item.title }}
                                    </option>
                                </select>
                            </div>
                        </td>
                        <td style="width: 90px; vertical-align: middle">
                            <div class="form-group m-0">
                                <input type="number" v-model="item.cantidad_cierre" class="form-control form-control-sm">
                            </div>
                        </td>
                        <td style="vertical-align: middle">${{ parseFloat(item.tipo_cierre.price) }}</td>
                        <td style="vertical-align: middle">${{ item.tipo_cierre.price*item.cantidad_cierre }}</td>
                        <td style="vertical-align: middle">
                            <div class="d-flex align-items-center justify-content-between">
                                <span v-if="item.oferta.offer">${{ ((item.precio_oferta*item.cantidad_cc) + (item.cantidad_cc*item.tipo_terminacion.price) + (item.cantidad_cierre*item.tipo_cierre.price)).toFixed(2) }}</span>
                                <span v-else>${{ (parseFloat(item.precio_cc*item.cantidad_cc) + (item.cantidad_cc*item.tipo_terminacion.price) + (item.cantidad_cierre*item.tipo_cierre.price)).toFixed(2) }}</span>
                                <button @click="deleteCarrito(index)" class="btn btn-link p-0 ml-3"><i class="far fa-times-circle"></i></button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <h4  v-if="!carrito.length" class="text-center">Carrito esta vacio</h4>
            </div>
            <div class="col-md-4 offset-md-8">
                <div class="mb-3">
                    <h5 class="distren-color border-bottom">Forma de envío</h5>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Retiro en el local" value="Retiro en el local" v-model="compra.envio">
                        <label class="custom-control-label" for="Retiro en el local">Retiro en el local (sin cargo)</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="caba" value="C.A.B.A y G.B.A" v-model="compra.envio" checked>
                        <label class="custom-control-label" for="caba">Envío a C.A.B.A y G.B.A</label>
                    </div>
                    <div class="" v-if="compra.envio == 'C.A.B.A y G.B.A'">
                        <p class="m-0 my-1">Ingrese Código Postal</p>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <div class="md-form m-0">
                                    <input type="text" id="Dirección" class="form-control">
                                    <label for="Dirección">Dirección</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Expreso" value="Expreso" v-model="compra.envio">
                        <label class="custom-control-label" for="Expreso">Expreso</label>
                    </div>
                    <div class="" v-if="compra.envio == 'Expreso'">
                        <p class="">Acuerdas la forma de entrega del producto después de la compra.</p>
                    </div>
                </div>
                <div class=" ">
                    <h5 class="distren-color border-bottom">Métodos de Pago</h5>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample1" value="Transferencia Bancaria" v-model="compra.pago">
                        <label class="custom-control-label" for="defaultGroupExample1">Transferencia Bancaria</label>
                    </div>
                    <div class="" v-if="compra.pago == 'Transferencia Bancaria'">
                        <h5 class="">Sdsdsdsdsddd</h5>
                        <h5 class="">$sadasdasdasdas</h5>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample2" value="Efectivo" v-model="compra.pago" checked>
                        <label class="custom-control-label" for="defaultGroupExample2">Efectivo</label>
                    </div>
                </div>
                <hr class="distren-fondo">
                <div class="d-flex justify-content-between">
                    <h5 class="">Sub Total</h5>
                    <h5 class="">$ {{ getTotal.toFixed(2) }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="">IVA (21%)</h5>
                    <h5>${{ (getTotal*0.21).toFixed(2) }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class="">Envio</h5>
                    <h5>$700</h5>
                </div>
                <div class="d-flex justify-content-between align-item-center mt-3">
                    <h5 class="distren-color m-0">Total a pagar</h5>
                    <h5 class="m-0 text-dark">${{ (getTotal*1.21).toFixed(2) }}</h5>
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
        data(){
            return{
                carrito : JSON.parse(localStorage.getItem('carrito')),
                url : document.__API_URL,
                compra:{
                    pago:'',
                    envio:'',
                    total: ''
                }
            }
        },
        mounted() {
            this.getCapacidad();
            // if (localStorage.getItem('carrito')) {
            //     try {
            //         this.carrito = JSON.parse(localStorage.getItem('carrito'));
            //     } catch(e) {
            //         localStorage.removeItem('carrito');
            //     }
            // }
        },
        computed:{
            getTotal: function() {
                // return this.productocapacidad.reduce((total, product) => {
                this.total = 0;
                this.carrito.forEach((item, key)=>{
                    if (item.oferta.offer)
                    {
                        this.compra.total = (((item.precio_oferta*item.cantidad_cc) + (item.cantidad_cc*item.tipo_terminacion.price) +(item.cantidad_cierre*item.tipo_cierre.price))*1.21).toFixed(2);
                        this.total += ((item.precio_oferta*item.cantidad_cc) + (item.cantidad_cc*item.tipo_terminacion.price) +(item.cantidad_cierre*item.tipo_cierre.price))
                    }else{

                        this.total += ((item.precio_cc*item.cantidad_cc) + (item.cantidad_cc*item.tipo_terminacion.price) +(item.cantidad_cierre*item.tipo_cierre.price));
                        this.compra.total = (((item.precio_cc*item.cantidad_cc) + (item.cantidad_cc*item.tipo_terminacion.price) +(item.cantidad_cierre*item.tipo_cierre.price)) *1.21).toFixed(2);
                    }
                })
                return this.total
                // }, 0)
            },
        },
        methods:{
            getCapacidad: function(){

                console.log(this.carrito)
            },
            // addCarrito: function () {
            //     this.carrito.push( {
            //         cantidadenvases: '',
            //         terminacion: '',
            //         cierre: '',
            //         cantidadcierres: '',
            //     });
            //     //console.log(this.carrito)
            // },
            addCarrito: function (item,index) {
                this.carrito.splice(index+1,0, {
                    categoria: item.categoria,
                    producto:  item.producto,
                    cc: item.cc,
                    precio_cc: item.precio_cc,
                    cantidad_cc: item.cantidad_cc,
                    terminaciones: item.terminaciones,
                    cierres: item.cierres,
                    tipo_terminacion: item.tipo_terminacion,
                    precio_terminacion: item.precio_terminacion,
                    cantidad_terminacion: item.cantidad_terminacion,
                    tipo_cierre: item.tipo_cierre,
                    precio_cierre: item.precio_cierre,
                    cantidad_cierre: item.cantidad_cierre,
                    activo: false
                });
                //console.log(this.carrito)
            },
            deleteCarrito: function (index) {
                //console.log(index);
                this.carrito.splice(index, 1);
                localStorage.setItem('carrito', JSON.stringify(this.carrito));
                let b = JSON.parse(localStorage.getItem('carrito'));
                console.log(b);
                // toastr.success('Have fun storming the castle!', 'Miracle Max Says')
                if (this.carrito.length === 0)
                    this.addCarrito()

            },
            updateCarrito(){
                //console.log(this.compra)
                let carro = [];
                //Actualizo los productos que modifico en el carrito.
                this.carrito.forEach((item)=>{
                    carro.push({
                        categoria: item.categoria,
                        producto:  item.producto,
                        cc: item.cc,
                        terminaciones: item.terminaciones,
                        cierres: item.cierres,
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