<template>
    <div class="row">
        <div class="col-md-12 mt-4">
            <label class="typo__label">Selecciona Cierres</label>
            <multiselect v-model="cierre" :options="cierres" :multiple="true" :custom-label="cierreNombre" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Cierres" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" label="title" track-by="id" :preselect-first="true">
                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
            </multiselect>
            <div class="row my-4">
                <div class="col-md-3" v-for="item in cierre">
                    <img :src="item.image" style="height: 100px;" alt="" class="img-fluid">
                    <p class="text-center">{{ item.title }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <label class="typo__label">Seleccionar Capacidades</label>
            <multiselect v-model="capacidad" :options="capacidades" :multiple="true" :custom-label="capacidadNombre" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Cierres" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" label="cc" track-by="id" :preselect-first="true">
                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
            </multiselect>
            <!--<pre class="language-json"><code>{{ cierre  }}</code></pre>-->
            <div class=" my-4">
                <table class="table">
                    <thead class="distren-fondo white-text">
                    <tr>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">cc</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio</th>
                        <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Stock</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in capacidad">
                        <td>{{ item.cc}}</td>
                        <td>
                            <input type="number" v-model="item.price" class="form-control form-control-sm">
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
            <button @click="addProduct" type="submit"  class="btn btn-success">Guardar</button>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import VueCurrencyFilter from 'vue-currency-filter'
    // register globally
    //Vue.component('multiselect', Multiselect)
    export default {
        props:['capacidades','cierres'],
        components: {
            Multiselect
        },
        data(){
          return{
              cierre:[],
              capacidad:[],
              // precio:55858,
              url : document.__API_URL,
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
            //this.preciocantidad()
            console.log('Component mounted.')
        },
        methods: {
            cierreNombre({title, price}) {
                return `${title} — [${price}]`
            },
            capacidadNombre({cc, price}) {
                return `${cc} — [${price}]`
            },
            preciocantidad() {
               console.log(this.capacidad);
               this.capacidad.push({
                   precio: 0,
                   cantidad: 0,
                   // this.precio.push({
                   //     cc: item.cc,
                   //     precio: 0,
                   //     cantidad: 0,
                   // });
                   // console.log(item);
                });
            },
            addProduct(){
                console.log(this.capacidad)
                axios.post(this.url+'/api/addproduct',{capacidad: this.capacidad,cierre: this.cierre}).then(res => {
                    console.log(res.data)
                }).catch(e => {
                    console.log(e);
                });
            }
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
