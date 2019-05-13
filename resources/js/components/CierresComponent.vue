<template>
    <div class="mt-4">
        <!--<select v-model="cierre" class="custom-select form-control select2" multiple>
            <option v-for="item in cierres" v-bind:value="item.title">
                {{ item.title }}
            </option>
        </select>-->
        <label class="typo__label">Selecciona Cierres</label>
        <multiselect v-model="cierre" @select="addCierres" :options="cierres" :multiple="true" :custom-label="nameWithLang" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Cierres" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" label="title" track-by="id" :preselect-first="true">
            <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
        </multiselect>
        <!--<pre class="language-json"><code>{{ cierre  }}</code></pre>-->
        <div class="row my-4">
            <div class="col-md-3" v-for="item in cierre">
                <img :src="item.image" style="height: 100px;" alt="" class="img-fluid">
                <p class="text-center">{{ item.title }}</p>
            </div>
        </div>
        <div class="col-md-12 my-4 text-right">
            <button @click="addProduct" type="submit" class="btn btn-success">Guardar</button>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    // register globally
    //Vue.component('multiselect', Multiselect)
    export default {
        props:['cierres'],
        components: {
            Multiselect
        },
        data(){
          return{
              cierre:[],
          }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            nameWithLang({title, price}) {
                return `${title} — [${price}]`
            },
            addCierres(){
                //alert('se añadio')
            },
            addProduct(){
                alert(this.cierre);
            }
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
