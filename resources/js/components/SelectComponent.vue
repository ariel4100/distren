<template>
    <div class="row">
        <div class="col-md-6 mt-4">
            <p>Seleccionar Categoria</p>
            <select class="custom-select form-control select2" v-model="catseleccionado"   name="category_id" >
                <option v-for="item in categorias" :value="item.id">{{ item.title}}</option>
<!--                <input type="text" name="category_id" :value="catseleccionado.id" class="">-->
            </select>
        </div>
        <div class="col-md-6 mt-4">
            <p>Seleccionar Subcategoria</p>
            <select class="custom-select form-control select2" v-model="subcatseleccionado" name="subcategory_id">
                <option v-if="catseleccionado == item.category_id" v-for="item in subcategoria" :value="item.id">{{ item.title}}</option>
<!--                <input type="text" name="subcategory_id" :value="subcatseleccionado.id" class="">-->
            </select>
        </div>
        <div class="col-md-6 mt-4">
            <p>Seleccionar Grupo de Productos</p>
            <select class="custom-select form-control select2" v-model="grupoproseleccionado" name="group_product_id">
                <option v-if="subcatseleccionado == item.subcategory_id" v-for="item in grupoproductos" :value="item.id">{{ item.title }} </option>
<!--                  <input type="text" name="group_product_id" :value="grupoproseleccionado.id" class="">-->
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
        props:['grupoproductos','producto','subcategoria','categorias'],
        components: {
            Multiselect,
            Money
        },
        data(){
          return{
              catseleccionado: this.producto && this.producto.category_id ? this.producto.category_id : 0,
              subcatseleccionado: this.producto && this.producto.subcategory_id ? this.producto.subcategory_id : 0,
              grupoproseleccionado: this.producto && this.producto.group_product_id ? this.producto.group_product_id : 0,
              subcate:[],
              cate:[],
              terminacion:[],

              url : document.__API_URL,
          }
        },
        mounted() {
            // this.getSubcategoria();
            // this.getCapacidad()
            console.log(this.grupoproductos)
        },
        methods: {
            getSubcategoria(){
                // this.catseleccionado = this.producto.category_id != null ? this.producto.category_id : 0;
                // this.subcatseleccionado = this.producto.subcategory_id != null ? this.producto.subcategory_id : 0;
                console.log(this.catseleccionado)
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
