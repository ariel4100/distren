<template>
    <div class=" ">
        <label class="typo__label">Cierres relacionados</label>
        <multiselect v-model="value" :options="related" :multiple="true" :custom-label="customLabel" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" track-by="id">
            <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
        </multiselect>
        <div class="row my-4">
            <div class="col-md-3" v-for="(item,index) in value" :key="index">
                <input type="text" class="d-none" :name="'related_id['+index+']'" :value="item.id">
                <!--<pre class="language-json"><code>{{ item.image.gallery[0].image   }}</code></pre>-->

            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    export default {
        props:['related','selectedrelated','model'],
        components: {
            Multiselect,
        },
        data(){
            return{
                value: [],
                value1: [],
                url : document.__API_URL+'/',

            }
        },

        mounted() {
            this.getProduct();
        },
        created() {


            this.value = this.model


        },
        methods: {
            customLabel ({ title, order }) {
                // console.log(title);
                // return `${text.title_es} – ${desc}`
                return `${title}`
            },
            getProduct () {
                this.value = this.selectedrelated;
                // this.value1 = this.selectedaccesorios;
                //console.log(this.accesorios)
                // JSON.parse(this.selectedenvasadoras);
                // this.selectedenvasadoras.forEach((item)=>{
                //     console.log(item.text);
                //     this.value.push(
                //         {
                //             title_es: item,
                //             image:  item.image[0].image
                //         }
                //     );
                // });
            }
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>