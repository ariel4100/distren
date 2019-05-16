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
                        <td style="vertical-align: middle">{{ item.cc }}</td>
                        <td style="vertical-align: middle">{{ item.precioenvase }}</td>
                        <td style="width: 90px; vertical-align: middle">
                            <div class="form-group m-0">
                                <input type="number" v-model="item.cantidadenvases" class="form-control form-control-sm">
                            </div>
                        </td>
                        <td style="vertical-align: middle">{{ item.precioenvase*item.cantidadenvases }}</td>
                        <td style="vertical-align: middle">
                            <select class="browser-default custom-select custom-select-sm" v-model="item.terminacion">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </td>
                        <td style="vertical-align: middle">
                            <div class="d-flex align-items-center justify-content-between">
                                <button @click="addCarrito(item,index)" class="btn btn-link p-0"><i class="fas fa-plus distren-color"></i></button>
                                <select class="browser-default custom-select custom-select-sm" v-model="item.cierre">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </td>
                        <td style="width: 90px; vertical-align: middle">
                            <div class="form-group m-0">
                                <input type="number" v-model="item.cantidadcierres" class="form-control form-control-sm">
                            </div>
                        </td>
                        <td style="vertical-align: middle">{{ item.preciocierre }}</td>
                        <td style="vertical-align: middle">{{ item.preciocierre*item.cantidadcierres }}</td>
                        <td style="vertical-align: middle">
                            <div class="d-flex align-items-center justify-content-between">
                                <span>${{ (parseFloat(item.precioenvase*item.cantidadenvases) + (item.cantidadcierres*item.preciocierre)).toFixed(2) }}</span>
                                <button @click="deleteCarrito(index)" class="btn btn-link p-0 ml-3"><i class="far fa-times-circle"></i></button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <h4  v-if="!carrito.length">Carrito esta vacio</h4>
            </div>
            <div class="col-md-4 offset-md-8">
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
                    <button @click="addCarrito" class="btn py-2" style="border: 1px solid #8BBF40">Seguir comprando</button>
                    <button @click="addCarrito" class="btn distren-fondo py-2">Pagar</button>
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
                    this.total += ((item.precioenvase*item.cantidadenvases) + (item.cantidadcierres*item.preciocierre))
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
                    precioenvase: item.precioenvase,
                    cc: item.cc,
                    cantidadenvases: item.cantidadenvases,
                    tipo: item.cierre,
                    preciocierre: item.preciocierre,
                    cantidadcierres: item.cantidadcierres,
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
                toastr.success('Have fun storming the castle!', 'Miracle Max Says')
                if (this.carrito.length === 0)
                    this.addCarrito()

            }
        }
    }
</script>
