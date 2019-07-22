<template>
    <div class="row">
        <div class="col-md-6 mt-4">
            <p>Seleccionar Categoria</p>
            <select class="custom-select form-control select2" v-model="catseleccionado" @change="getSubcategoria()" name="category_id" >
                <option v-for="item in categoria" :value="item.id">{{ item.title}}</option>
            </select>
        </div>
        <div class="col-md-6 mt-4">
            <p>Seleccionar Subcategoria</p>
            <select class="custom-select form-control select2" v-model="subcatseleccionado" name="subcategory_id">
                <option v-for="item in subcate" :value="item.id">{{ item.title}}</option>
            </select>
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
        props:['capacidades','producto','subcategoria','categoria'],
        components: {
            Multiselect,
            Money
        },
        data(){
          return{
              catseleccionado: this.producto && this.producto.category_id ? this.producto.category_id : 1,
              subcatseleccionado: this.producto && this.producto.subcategory_id ? this.producto.subcategory_id : 1,
              subcate:[],
              cate:[],
              terminacion:[],

              url : document.__API_URL,
          }
        },
        mounted() {
            this.getSubcategoria();
            // this.getCapacidad()
        },
        methods: {
            getSubcategoria(){
                // this.catseleccionado = this.producto.category_id != null ? this.producto.category_id : 0;
                // this.subcatseleccionado = this.producto.subcategory_id != null ? this.producto.subcategory_id : 0;
                // console.log(this.subcategoria)
                // this.cate = this.categoria.filter(item => item.id == this.producto.category_id);
                this.subcate = this.subcategoria.filter(item => (item.category_id && item.category_id == this.catseleccionado));
                // console.log(this.subcate)
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
