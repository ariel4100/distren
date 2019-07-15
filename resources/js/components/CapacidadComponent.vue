<template>
    <div class="row">
        <div class="col-md-6 mt-4">
            <label class="typo__label">Seleccionar Terminaciones</label>
            <multiselect v-model="terminacion" :options="terminaciones" :multiple="true" :custom-label="cierreNombre" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" label="title" track-by="id" :preselect-first="false">
                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
            </multiselect>
            <div class="row my-4">
                <div class="col-md-3" v-for="(item,index) in terminacion">
                    <input type="text" class="d-none" :name="'terminacion_id['+index+']'" :value="item.id">
                    <img :src="item.image" style="height: 100px;" alt="" class="img-fluid">
                    <p class="text-center">{{ item.title }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <label class="typo__label">Seleccionar Cierres</label>
            <multiselect v-model="cierre" :options="cierres" :multiple="true" :custom-label="cierreNombre" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" label="title" track-by="id" :preselect-first="false">
                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
            </multiselect>
            <div class="row my-4">
                <div class="col-md-3" v-for="(item,index) in cierre">
                    <input type="text" class="d-none" :name="'cierre_id['+index+']'" :value="item.id">
                    <img :src="item.image" style="height: 100px;" alt="" class="img-fluid">
                    <p class="text-center">{{ item.title }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <a @click="addCapacidad" class="btn btn-md btn-info">Añadir Capacidad</a>
<!--            <multiselect v-model="capacidad" :options="capacidades" :multiple="true" :custom-label="capacidadNombre" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" label="cc" track-by="id">-->
<!--                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>-->
<!--            </multiselect>-->
            <!--<pre class="language-json"><code>{{ cierre  }}</code></pre>-->
            <div class=" my-4">
                <table class="table" v-if="capacidad.length > 0">
                    <thead class="distren-fondo white-text">
                    <tr>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">cc</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio de Oferta</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Oferta</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item,index) in capacidad" :key="index">
                        <td style="width: 100px">
                            <input type="text" v-model="item.cc" :name="'capacity['+index+'][cc]'" class="form-control form-control-sm">
                        </td>
                        <td>
                            <money v-model="item.price" :name="'capacity['+index+'][price]'"  class="form-control form-control-sm" style="text-align: right"  v-bind="money"></money>
                        </td>
                        <td>
                            <money v-model="item.price_offer" :name="'capacity['+index+'][price_offer]'"  class="form-control form-control-sm" style="text-align: right"  v-bind="money"></money>
                        </td>
                        <td class="text-center position-relative">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" v-model="item.offer" :name="'capacity['+index+'][offer]'" class="custom-control-input" :id="'customCheck_'+index">
                                <label class="custom-control-label" :for="'customCheck_'+index"></label>
                            </div>
                            <span @click="deleteCapacidad(index)" class="px-1 btn-danger position-absolute" style="cursor: pointer;bottom: 25px; right: 0px;">X</span>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import VueCurrencyFilter from 'vue-currency-filter'
    import {Money} from 'v-money'
    // register globally
    //Vue.component('multiselect', Multiselect)
    export default {
        props:['selectedcapacidad','cierres','terminaciones','selectedterminacion','selectedcierre'],
        components: {
            Multiselect,
            Money
        },
        data(){
          return{
              terminacion:[],
              cierre:[],
              capacidad:[],
              // precio:55858,
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
            if (VueCurrencyFilter) {
                Vue.use(VueCurrencyFilter, {
                    symbol: '$',
                    thousandsSeparator: '.',
                    fractionCount: 2,
                    fractionSeparator: ',',
                    symbolPosition: 'front',
                    symbolSpacing: true
                })
            }
            this.getCapacidad()
            //console.log(this.capacidad)
        },
        methods: {
            cierreNombre({title, price}) {
                return  `${title}`//`${title} — [${price}]`
            },
            capacidadNombre({cc, price}) {
                return `${cc}`
            },

            getCapacidad(){
                console.log(this.selectedcapacidad)
                this.selectedcapacidad.forEach((item)=>{
                    console.log(item)
                    this.capacidad.push(
                        {
                            cc: item.cc,
                            price: item.price,
                            price_offer: item.price_offer,
                            offer: item.offer
                        }
                    )
                });
                this.selectedterminacion.forEach((item)=>{
                    this.terminacion.push(
                        {
                            id: item.id,
                            title: item.title,
                            image: item.image,
                        }
                    )
                });
                this.selectedcierre.forEach((item)=>{
                    this.cierre.push(
                        {
                            id: item.id,
                            title: item.title,
                            image: item.image,
                        }
                    )
                });
            },
            addCapacidad(){
                this.capacidad.push(
                    {
                        cc:'',
                        price:'',
                        price_offer:'',
                        offer:''
                    }
                )
            },
            deleteCapacidad(index) {
                this.capacidad.splice(index, 1);
                //this.imageData[index]= '';
            }
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
