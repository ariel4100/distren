<template>
    <!-- Section: Contact v.3 -->
    <section class="container my-5">
        <div class="card">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card-body form">
                        <h3 class="mt-4">Datos Personales:</h3>
                        <div class="alert alert-danger" role="alert" v-if="errors.length">
                            <ul class="m-0">
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="nombre" v-model="datos.nombre" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="Apellido">Apellido</label>
                                    <input type="text" id="Apellido"  v-model="datos.apellido" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--<div class="col-md-6">-->
                                <!--<div class="md-form mb-0">-->
                                    <!--<input type="text" placeholder="CUIT" v-model="datos.nombre" class="form-control" required>-->
                                <!--</div>-->
                            <!--</div>-->

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="CUIT">CUIT / DNI</label>
                                    <input type="text" id="CUIT" v-model="datos.cuit" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="Email">Email</label>
                                    <input type="email" id="Email"  v-model="datos.email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="Telefono">Telefono</label>
                                    <input type="text" id="Telefono"  v-model="datos.telefono" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="Domicilio">Domicilio</label>
                                    <input type="text" id="Domicilio"  v-model="datos.domicilio" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="Provincia">Provincia</label>
                                    <input type="text" id="Provincia"  v-model="datos.provincia" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="Localidad">Localidad</label>
                                    <input type="email" id="Localidad"  v-model="datos.localidad" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-body distren-fondo text-center h-100 ">
                        <h3 class="my-4 pb-2">Resumen del Pedido</h3>
                        <ul class="text-lg-left list-unstyled px-4">
                            <li v-for="item in carrito" class="d-flex justify-content-between">
                                {{ item.producto.title }}
                                <span v-if="item.oferta">{{ (getSubtotal(item)).toFixed(2).replace('.', ',') }}</span>
                                <span v-else>${{ (getSubtotal(item)).toFixed(2).replace('.', ',') }}</span>
                            </li>
                        </ul>
                        <hr class="hr-light p-0 my-2">
                        <ul class="list-unstyled px-4">
                            <li class="list-inline-item  d-flex justify-content-between">
                                Sub Total
                                <span>${{ getTotal.toFixed(2).replace('.', ',') }}</span>
                            </li>
                            <li class="list-inline-item d-flex justify-content-between">
                                IVA(21%)
                                <span>${{ (getTotal*0.21).toFixed(2).replace('.', ',') }}</span>
                            </li>
                            <template v-if="compra.envio == 'gba' && getTotal < 2500">
                                <li class="list-inline-item d-flex justify-content-between">
                                    Envio
                                    <span>$ 200</span>
                                </li>
                            </template>
                            <template v-else>

                            </template>

                            <li class="list-inline-item d-flex justify-content-between">
                                Total a Pagar
                                <span>${{ (compra.total).toFixed(2).replace('.', ',') }}</span>
                            </li>
                        </ul>


                        <a @click="confirmar" v-if="loading" class="btn btn-white distren-color my-2 py-2 btn-block"><i class="fas fa-spinner fa-pulse"></i></a>
                        <a @click="confirmar" v-else class="btn btn-white distren-color my-2 py-2 btn-block">Confirmar</a>
                        <a href="carrito" class="btn btn-outline-white my-2 py-2 btn-block">Volver atras</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Contact v.3 -->
</template>

<script>
    import toastr from 'toastr';

    export default {
        data(){
            return{
                datos:{
                    nombre:'',
                    apellido:'',
                    email:'',
                    telefono:'',
                    domicilio:'',
                    localidad:'',
                    provincia:'',
                    cuit: '',
                    iva: [
                        'Consumidor Final',
                        'Exento',
                        'Monotributo',
                        'No responsable',
                        'Responsable inscripto',
                    ]
                },
                loading:false,
                errors: [],
                carrito : JSON.parse(localStorage.getItem('carrito')),
                compra : JSON.parse(localStorage.getItem('compra')),
                url : document.__API_URL2,
            }
        },
        mounted() {
            // console.log(this.carrito)
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

                return total
                // }, 0)
            },
        },
        methods:{
            getSubtotal: function(item) {
                // console.log(item)
                let subtotal = 0;
                subtotal = item.producto.price*item.qty
                return subtotal
                // }, 0)
            },
            confirmar(){
                this.errors = [];

                if (this.datos.nombre && this.datos.apellido && this.datos.email && this.datos.telefono && this.datos.localidad && this.datos.provincia && this.datos.domicilio)
                {
                    if (!this.validEmail(this.datos.email))
                    {
                        this.errors.push("Email requerido");
                    }else{
                        this.loading = true;
                        axios.post(this.url+'/api/confirmar',{datos: this.datos,pedido: this.carrito,compra: this.compra}).then(res => {
                            console.log(res)
                            if (res.data.mp)
                            {
                                this.loading = false;
                                localStorage.removeItem('carrito');
                                setTimeout(function(){
                                    location.href = res.data.mp;
                                }, 1000);
                            }else{
                                this.loading = false;
                                this.$swal({
                                    type: 'success',
                                    title: 'Compra realizado correctamente',
                                    showConfirmButton: false,
                                    timer: 3500
                                })
                                localStorage.removeItem('carrito');
                                setTimeout(function(){
                                    location.href = "familias";
                                }, 3000);
                            }



                        }).catch(e => {
                            // console.log('document.location', this.url);
                            this.loading = false;
                            // console.log(e);
                        });
                    }
                }else{
                    this.errors.push('Complete todos los campos');
                }
            },
            validEmail:function(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            },

        }
    }
</script>
<style>
    .md-form .form-control.is-invalid{
        padding-right: 0 ;
        box-shadow: 0 1px 0 0 #dc3545;
        border-bottom: 1px solid #dc3545;
        /*border-color: #dc3545;*/
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23dc3545' viewBox='-2 -2 7 7'%3e%3cpath stroke='%23dc3545' d='M0 0l3 3m0-3L0 3'/%3e%3ccircle r='.5'/%3e%3ccircle cx='3' r='.5'/%3e%3ccircle cy='3' r='.5'/%3e%3ccircle cx='3' cy='3' r='.5'/%3e%3c/svg%3E");
        background-repeat: no-repeat;
        background-position: center right calc(.375em + .1875rem);
        background-size: calc(.75em + .375rem) calc(.75em + .375rem);
    }
    .md-form .form-control.is-valid{
        padding-right: 0 ;
        box-shadow: 0 1px 0 0 #28a745;
        border-bottom: 1px solid #28a745;
        /*border-color: #dc3545;*/
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: center right calc(.375em + .1875rem);
        background-size: calc(.75em + .375rem) calc(.75em + .375rem);
    }
    label{
        color: #8BBF40 !important;
    }

</style>
