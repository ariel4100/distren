<template>
    <div class="row">
        <div class="col-md-6 mt-4">
            <label class="typo__label">Seleccionar Terminaciones</label>
            <multiselect v-model="terminacion_select" :options="terminaciones" :multiple="true" :custom-label="cierreNombre" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" label="title" track-by="id" :preselect-first="true">
                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
            </multiselect>
            <div class="row my-4">
                <div class="col-md-3" v-for="item in terminacion_select">
                    <img :src="item.image" style="height: 100px;" alt="" class="img-fluid">
                    <p class="text-center">{{ item.title }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <label class="typo__label">Seleccionar Cierres</label>
            <multiselect v-model="cierres_select" :options="cierres" :multiple="true" :custom-label="cierreNombre" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" label="title" track-by="id"  >
                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
            </multiselect>
            <div class="row my-4">
                <div class="col-md-3" v-for="item in cierres_select">
                    <img :src="item.image" style="height: 100px;" alt="" class="img-fluid">
                    <p class="text-center">{{ item.title }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <label class="typo__label">Seleccionar Capacidades</label>
            <multiselect v-model="capacidades_select" :options="capacidades" :multiple="true" :custom-label="capacidadNombre" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" label="cc" track-by="id"  >
                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
            </multiselect>
            <div class="my-4">
                <table class="table">
                    <thead class="distren-fondo white-text">
                    <tr>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">cc</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio de Oferta</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Stock</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in capacidades_select">
                        <td>{{ item.cc}}</td>
                        <td>
                            <money v-model="item.price"  class="form-control form-control-sm" style="text-align: right"  v-bind="money"></money>

                            <!--<input type="number" v-model="item.price" class="form-control form-control-sm">-->
                        </td>
                        <td>
                            <money v-model="item.offerprice"  class="form-control form-control-sm" style="text-align: right"  v-bind="money"></money>
                        </td>
                        <td>
                            <input type="number" v-model="item.quantity" class="form-control form-control-sm">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12 my-4 text-right">
            <button @click="updateProduct" type="submit"  class="btn btn-success">Guardar</button>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import {Money} from 'v-money'
    // register globally
    //Vue.component('multiselect', Multiselect)
    export default {
        props:['cierre','precio','terminacion'],
        components: {
            Multiselect,
            Money
        },
        data(){
            return{
                terminaciones: [],
                cierres: [],
                capacidades: [],

                terminacion_select: [],
                cierres_select: [],
                capacidades_select: [],
                url : document.__API_URL,
                money: {
                    decimal: ',',
                    thousands: '.',
                    prefix: '$',
                    // suffix: '',
                    precision: 2,
                    masked: false /* doesn't work with directive */
                }
            }
        },
        mounted() {
            this.getPresentacion()
            this.getProduct()
            //console.log(this.cierre)
        },
        methods: {
            getProduct() {
                this.cierre.forEach((item)=>{
                    this.cierres_select.push({
                        id: item.id,
                        title: item.title,
                        image: item.image,

                    })
                });
                this.terminacion.forEach((item)=>{
                    this.terminacion_select.push({
                        id: item.id,
                        title: item.title,
                        image: item.image,

                    })
                });
                this.precio.forEach((item)=>{
                    this.capacidades_select.push({
                        id: item.capacity.id,
                        cc: item.capacity.cc,
                        price: item.price,
                        offerprice: item.offer_price,
                        quantity: item.quantity,

                    })
                });
               // console.log(this.precio)
            },
            cierreNombre({title, price}) {
                return `${title}`
            },
            capacidadNombre({cc, price}) {
                return `${cc}`
            },
            getPresentacion(){
                //console.log(this.editarcapacidad)
                axios.get(this.url+'/api/presentaciones').then(res => {
                    this.terminaciones = res.data.terminaciones;
                    this.cierres = res.data.cierres;
                    this.capacidades = res.data.capacidades;
                    console.log(res.data)
                }).catch(e => {
                    console.log(e);
                });
            },
            updateProduct(){
                console.log(this.editarcapacidad)
                axios.post(this.url+'/api/updateproduct',{capacidad: this.capacidades_select,cierre: this.cierres_select,terminacion: this.terminacion_select}).then(res => {
                    console.log(res.data)
                }).catch(e => {
                    console.log(e);
                });
            }
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
