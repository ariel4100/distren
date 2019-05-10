<template>
    <div class="container">
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
                        <td style="vertical-align: middle">Farmacia</td>
                        <td style="vertical-align: middle">Colirios</td>
                        <td style="vertical-align: middle">10 cc</td>
                        <td style="vertical-align: middle">$8,00</td>
                        <td style="width: 90px; vertical-align: middle">
                            <div class="form-group m-0">
                                <input type="number" v-model="item.cantidadenvases" class="form-control form-control-sm">
                            </div>
                        </td>
                        <td style="vertical-align: middle">$16,00</td>
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
                                <button @click="addCarrito" class="btn btn-link p-0"><i class="fas fa-plus distren-color"></i></button>
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
                        <td style="vertical-align: middle">$0,80</td>
                        <td style="vertical-align: middle">$1,60</td>
                        <td style="vertical-align: middle">
                            <div class="d-flex align-items-center justify-content-between">
                                <span>$17,60</span>
                                <button @click="deleteCarrito(index)" class="btn btn-link p-0 ml-3"><i class="far fa-times-circle"></i></button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                carrito:[
                    {
                        cantidadenvases: '',
                        terminacion: '',
                        cierre: '',
                        cantidadcierres: '',
                    }
                ]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            addCarrito: function () {
                this.carrito.push( {
                    cantidadenvases: '',
                    terminacion: '',
                    cierre: '',
                    cantidadcierres: '',
                });
                console.log(this.carrito)
            },
            deleteCarrito: function (index) {
                console.log(index);
                this.carrito.splice(index, 1);
                if (this.carrito.length === 0)
                    this.addCarrito()

            }
        }
    }
</script>
