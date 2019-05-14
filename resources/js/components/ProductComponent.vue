<template>
    <div class="row my-3">
        <div class="col-md-12">
            <h4 class="distren-color">Capacidad</h4>
            <!--<pre class="language-json"><code>{{ carrito  }}</code></pre>-->
            <table class="table table-responsive ">
                <thead class="distren-fondo white-text">
                <tr>
                    <th class="align-middle py-1 text-center" rowspan="2" style="border-right: 1px solid white; line-height: 1">ml/cm2</th>
                    <th class="align-middle py-1 text-center" colspan="3" style="border-right: 1px solid white; line-height: 1">Envases</th>
                    <th class="align-middle py-1 text-center" colspan="4" style="border-right: 1px solid white; line-height: 1">Cierre</th>
                    <th class="align-middle py-1 text-center" rowspan="2" style="border-right: 1px solid white; line-height: 1">Subtotal Productos</th>
                </tr>
                <tr>
                    <th class="align-middle py-1 text-center"  style="border-right: 1px solid white; line-height: 1">Precio</th>
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Cant. Envases / Potes</th>
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Subtotal</th>
                    <!--<th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Terminación</th>-->
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Tipo</th>
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Cant.</th>
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio</th>
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item,index) in carrito" :key="index">
                    <td style="vertical-align: middle">{{ item.cc }}</td>
                    <td style="vertical-align: middle">${{ item.priceenvase }}</td>
                    <td style="width: 90px; vertical-align: middle">
                        <div class="form-group m-0">
                            <input type="number" v-model="item.cantidadenvases" class="form-control form-control-sm">
                        </div>
                    </td>
                    <td style="vertical-align: middle">${{ item.priceenvase*item.cantidadenvases }}</td>
                    <!--<td style="vertical-align: middle">-->
                        <!--<select class="browser-default custom-select custom-select-sm" v-model="item.terminacion">-->
                            <!--<option selected>Open this select menu</option>-->
                            <!--<option value="1">One</option>-->
                            <!--<option value="2">Two</option>-->
                            <!--<option value="3">Three</option>-->
                        <!--</select>-->
                    <!--</td>-->
                    <td style="vertical-align: middle; width: 200px">
                        <div class="d-flex align-items-center justify-content-between">
                            <button @click="addCarrito(item,index)" class="btn btn-link p-0"><i class="fas fa-plus distren-color"></i></button>
                            <select class="browser-default custom-select custom-select-sm" v-model="item.pricecierre">
                                <option value="0" disabled selected>Seleccione..</option>
                                <option v-for="item in item.tipo" :value="item.price">
                                    {{ item.title }}
                                </option>
                            </select>
                        </div>
                    </td>
                    <td style="width: 90px; vertical-align: middle">
                        <div class="form-group m-0">
                            <input type="number" v-model="item.cantidadcierres" class="form-control form-control-sm">
                        </div>
                    </td>
                    <td style="vertical-align: middle">${{ item.pricecierre }}</td>
                    <td style="vertical-align: middle">${{ item.cantidadcierres*item.pricecierre }}</td>
                    <td style="vertical-align: middle">
                        <div class="d-flex align-items-center justify-content-between">
                            <span>${{ (parseFloat(item.priceenvase*item.cantidadenvases) + (item.cantidadcierres*item.pricecierre)).toFixed(2) }}</span>
                            <button @click="deleteCarrito(index)" class="btn btn-link p-0 ml-3"><i class="fas fa-shopping-cart" v-bind:class="(parseInt(item.priceenvase*item.cantidadenvases) + (item.cantidadcierres*item.pricecierre)) != 0 ? 'distren-color' : null"></i></button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 offset-md-8">
            <div class="d-flex justify-content-between">
                <h4 class="">Sub Total</h4>
                <h4 class="">$212,00</h4>
            </div>
            <div class="d-flex justify-content-between">
                <h4 class="">IVA (21%)</h4>
                <h4>$13,20</h4>
            </div>
            <hr class=" bg-dark">
            <div class="d-flex justify-content-between">
                <h4 class="distren-color">TOTAL</h4>
                <h4 class="">$225,20</h4>
            </div>
            <div class="d-flex justify-content-end">
                <button @click="Carrito" class="btn distren-fondo p-2 mx-0"><i class="fas fa-shopping-cart text-white"></i> Añadir al carrito</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['producto','cierres'],
        data(){
            return{
                carrito:[],
                qty:0,
                total:0
            }
        },
        mounted() {

            this.ponerdatos()
            //console.log('Component mounted.')
        },
        methods: {
            ponerdatos: function(){
                this.producto.forEach((ob,index)=>{
                    //console.log(index)
                    this.carrito.push(
                        {
                            priceenvase: ob.price,
                            cc: ob.cc,
                            cantidadenvases: 0,
                            tipo:this.cierres,
                            pricecierre:0,
                            cantidadcierres: 0

                        }
                    )
                    //console.log(this.carrito)
                });
                console.log(this.carrito)
            },
            getProduct() {
                // axios.get(this.url+'/api/productos').then(res => {
                //     console.log(res.data)
                // }).catch(e => {
                //     console.log(e);
                // });
                console.log(this.producto)
            },

            addCarrito: function (item,index) {
                this.carrito.splice(index+1,0, {
                    priceenvase: item.priceenvase,
                    cc: item.cc,
                    cantidadenvases: 0,
                    tipo:this.cierres,
                    pricecierre:0,
                    cantidadcierres: 0
                });
                console.log(this.carrito)
            },
            deleteCarrito: function (index) {
                console.log(index);
                this.carrito.splice(index, 1);
                if (this.carrito.length === 0)
                    this.addCarrito()

            },
            Carrito(){
                console.log(this.carrito);
                // this.carrito.reduce(function(total, item){
                //     total + item.number;
                // },0);
            }
        }
    }
</script>

<style scoped>
    table{
        border-bottom: 2px solid #8BBF40 ;
    }
</style>
