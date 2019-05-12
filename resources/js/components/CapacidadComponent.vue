<template>
    <div class="">
        <!--<select v-model="cierre" class="custom-select form-control select2" multiple>
            <option v-for="item in cierres" v-bind:value="item.title">
                {{ item.title }}
            </option>
        </select>-->
        <label class="typo__label">Seleccionar Capacidades</label>
        <multiselect v-model="capacidad" @select="addCierres" :options="capacidades" :multiple="true" :custom-label="nameWithLang" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Cierres" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" label="cc" track-by="id" :preselect-first="true">
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
                    <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Orden</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in capacidad">
                    <td>{{ item.cc}}</td>
                    <td>{{ item.price}}</td>
                    <td>{{ item.quantity}}</td>
                    <td>{{ item.order}}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    // register globally
    //Vue.component('multiselect', Multiselect)
    export default {
        props:['capacidades'],
        components: {
            Multiselect
        },
        data(){
          return{
              capacidad:[],
          }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            nameWithLang({cc, price}) {
                return `${cc} — [${price}]`
            },
            addCierres(){
                //alert('se añadio')
            }
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
