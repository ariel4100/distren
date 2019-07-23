<template>
    <!--<div class=" ">-->
        <div class="col-md-3" id="sidebar">
            <ul class="list-unstyled">
                <li class="list-group-item border-0 px-0" v-for="(categoria,cat_index) in categorias">
                    <a :data-target="'#categoria_'+cat_index" data-toggle="collapse" aria-expanded="false" class="d-flex align-items-center p-2 border-bottom " :class="categoria.id == category.id ? 'distren-color' : ''">
                        <span @click="redirectFamilias(categoria)">{{ categoria.title }}</span><i class="fas fa-chevron-right ml-auto"></i>
                    </a>
                    <ul class="list-unstyled collapse" :class="categoria.id == category.id ? 'show' : ''" :id="'categoria_'+cat_index">
                        <li class="list-group-item border-0 px-3" v-for="(grupo_producto,grupopro_index) in categoria.group_product">
                            <a @click="grupoProducto(grupo_producto)" :data-target="'#grupo_p_'+grupopro_index" data-toggle="collapse" aria-expanded="false" class="d-flex align-items-center p-2 border-bottom " :class="grupo  && grupo_producto.id == grupo.id ? 'distren-color' : ''">
                                <span @click="redirectGrupo(grupo_producto)">{{ grupo_producto.title }} </span><i class="fas fa-chevron-right ml-auto"></i>
                            </a>
                            <ul class="list-unstyled collapse" :class="grupo && grupo_producto.id == grupo.id ? 'show' : ''" :id="'grupo_p_'+grupopro_index">
                                <li class=" " v-for="(productos,pro_index) in grupo_producto.product">
                                 <a :href="url+'/familias/producto/'+productos.id" class="px-3 py-2" :class="producto  && productos.id == producto.id ? 'distren-color' : ''">{{ productos.title  }}</a>
                                    <!--<a href=" " :data-target="'#producto_'+pro_index" data-toggle="collapse" aria-expanded="false" class="d-flex align-items-center p-2 border-bottom ">-->
                                        <!--<span onclick="location.href=' '">{{ producto.title }}</span><i class="fas fa-chevron-right ml-auto"></i>-->
                                    <!--</a>-->
                                    <!--<ul class="list-unstyled collapse" :id="'producto_'+pro_index">-->
                                        <!--<li class="list-group-item border-0 px-0" v-for="(producto,pro_index) in grupo_producto.product">-->
                                            <!--<a href=" "  data-toggle="collapse" aria-expanded="false" class="d-flex align-items-center p-2 border-bottom ">-->
                                                <!--<span onclick="location.href=' '">{{ producto.title }}</span><i class="fas fa-chevron-right ml-auto"></i>-->
                                            <!--</a>-->
                                        <!--</li>-->
                                    <!--</ul>-->
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--<familia v-if="category" :categorias="categorias" :category="category" :activo="activo"></familia>-->
    <!--</div>-->
</template>

<script>

    //Vue.component('multiselect', Multiselect)
    import Familia from './FamiliaComponent.vue'

    export default {
        props:['category','categorias','productos','grupo','producto'],
        components: {
            Familia,
        },
        data(){
          return{
              seleccionado: 0,
              subcate:[],
              terminacion:[],
              filterproduct:[],
              url : document.__API_URL2,
              activo: {}
          }
        },
        mounted() {
            // this.getSubcategoria()
            this.getFilter()
            console.log(this.categorias)
        },
        methods: {
            redirectFamilias(item){
                location.href = this.url+'/familias/categoria/'+item.id
            },
            redirectGrupo(item){
                location.href = this.url+'/familias/grupos/'+item.id
            },
            getFilter(id){
                if (id){
                    this.filterproduct = this.productos.filter(item => item.subcategory_id == id);
                }else{
                    this.filterproduct = this.productos
                }
                // console.log(this.filterproduct)
            },
            grupoProducto(item){
               this.activo = item
            },
            deleteCapacidad(index) {
                this.capacidad.splice(index, 1);
                //this.imageData[index]= '';
            }
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
