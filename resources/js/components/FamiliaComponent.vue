<template>
    <div class="col-md-9" >
        <div v-if="!mostrar_productos" class="r ow d-flex justify-content-center flex-row mb-3">
            <div class="col-m d-3">
                <a @click="getFilter(null)" class="nav-link text-uppercase">
                    Todos
                </a>
            </div>
            <div class="col- md-3" v-for="item in category.subcategory">
                <a @click="getFilter(item.id)" class="nav-link text-uppercase">
                    {{ item.title }}
                </a>
            </div>
        </div>
        <div v-if="!mostrar_productos" class="row">
            <div v-for="item in filterproduct" class="col-md-3 text-center mt-4">
                <!--:href="url+'/familias/producto/'+item.id" -->
                <a @click="redirectGrupo(item)" class="position-relative" style="color: #9FA3A5;">
                    <div class="view overlay" style="cursor: pointer">
                        <div v-if="parseInt(item.offer)" class="img position-relative">
                            <img class="position-absolute img-fluid " style="z-index: 1; left: -8px; top: -8px;" src="http://osolelaravel.com/partscam/images/general/ofertas.fw.png" alt="">
                        </div>
                        <!--{{ item.image[0].image }}-->
                        <img v-if="item.image" :src="url+'/'+item.image" style="height: 184px" class="img-fluid " alt="smaple image">
                        <img v-else :src="'http://osolelaravel.com/distren/uploads/no-img.png'" alt="" class="img-fluid">
                        <div class="mask flex-center rgba-black-strong" style="cursor: pointer">
                            <span class="text-white">+</span>
                        </div>
                    </div>
                    <h4 class="text-center py-1 m-0">{{ item.title }}</h4>
                    <!--                    <h5 class="text-center">Desde <del>${{ $item->price->min('price') }} </del> <span class="distren-color"> ${{ $item->price->min('offer_price') }}</span></h5>-->
                </a>
            </div>

            <!--<div v-if="!item.offer" v-for="item in filterproduct" class="col-md-3 mt-4">-->
            <!--<a :href="url+'/familias/producto/'+item.id"  class="" style="color: #9FA3A5;">-->
            <!--<div class="view overlay">-->
            <!--<img v-if="item.image" src="" class="img-fluid " alt="smaple image">-->
            <!--<img v-else :src="'http://osolelaravel.com/distren/uploads/no-img.png'" alt="" class="img-fluid">-->
            <!--<div class="mask flex-center rgba-black-strong">-->
            <!--<span class="text-white">+</span>-->
            <!--</div>-->
            <!--</div>-->
            <!--<h4 class="text-center py-1 m-0">{{ item.title }}</h4>-->
            <!--&lt;!&ndash;                    <h5 class="text-center">Desde <span class="distren-color">${{ $item->price->min('price') }}</span></h5>&ndash;&gt;-->
            <!--</a>-->
            <!--</div>-->
        </div>
        <!--<div v-if="mostrar_productos" class="r ow d-flex justify-content-center flex-row mb-3">-->
            <!--<div class="col-m d-3">-->
                <!--<a @click="getFilterProduct(null)" class="nav-link text-uppercase">-->
                    <!--Todos-->
                <!--</a>-->
            <!--</div>-->
            <!--<div class="col- md-3" v-for="item in category.subcategory">-->
                <!--<a @click="getFilterProduct(item.id)" class="nav-link text-uppercase">-->
                    <!--{{ item.title }}-->
                <!--</a>-->
            <!--</div>-->
        <!--</div>-->
        <div v-if="grupo" class="row">
            <div v-if="item.status == 1" v-for="item in grupo.product" class="col-md-3 text-center mt-4">
                <!--:href="url+'/familias/producto/'+item.id" -->

                <a   :href="url+'/familias/producto/'+item.id" class="position-relative" style="color: #9FA3A5;">
                    <div class="view overlay" style="cursor: pointer">
                        <div v-if="parseInt(item.offer)" class="img position-relative">
                            <img class="position-absolute img-fluid " style="z-index: 1; left: -8px; top: -8px;" src="http://osolelaravel.com/partscam/images/general/ofertas.fw.png" alt="">
                        </div>
                        <!--{{ item.image[0].image }}-->
                        <img v-if="item.image" :src="url+'/'+item.image[0].image" style="height: 184px" class="img-fluid " alt="smaple image">
                        <img v-else :src="'http://osolelaravel.com/distren/uploads/no-img.png'" alt="" class="img-fluid">
                        <div class="mask flex-center rgba-black-strong" style="cursor: pointer">
                            <span class="text-white">+</span>
                        </div>
                    </div>
                    <h4 class="text-center py-1 m-0">{{ item.title }}</h4>
                    <!--                    <h5 class="text-center">Desde <del>${{ $item->price->min('price') }} </del> <span class="distren-color"> ${{ $item->price->min('offer_price') }}</span></h5>-->
                </a>

            </div>

            <!--<div v-if="!item.offer" v-for="item in filterproduct" class="col-md-3 mt-4">-->
            <!--<a :href="url+'/familias/producto/'+item.id"  class="" style="color: #9FA3A5;">-->
            <!--<div class="view overlay">-->
            <!--<img v-if="item.image" src="" class="img-fluid " alt="smaple image">-->
            <!--<img v-else :src="'http://osolelaravel.com/distren/uploads/no-img.png'" alt="" class="img-fluid">-->
            <!--<div class="mask flex-center rgba-black-strong">-->
            <!--<span class="text-white">+</span>-->
            <!--</div>-->
            <!--</div>-->
            <!--<h4 class="text-center py-1 m-0">{{ item.title }}</h4>-->
            <!--&lt;!&ndash;                    <h5 class="text-center">Desde <span class="distren-color">${{ $item->price->min('price') }}</span></h5>&ndash;&gt;-->
            <!--</a>-->
            <!--</div>-->
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import VueCurrencyFilter from 'vue-currency-filter'
    // register globally
    //Vue.component('multiselect', Multiselect)
    export default {
        props:['categorias','cierres','subcategoria','category','activo','grupo'],

        data(){
          return{
              productos: [],
              mostrar_productos: false,
              seleccionado: 0,
              subcate:[],
              terminacion:[],
              filterproduct:[],
              filter:[],
              url : document.__API_URL2,
              active:{}
          }
        },

        mounted() {
            // this.getSubcategoria()
            this.getFilter()

            console.log(this.filterproduct)
        },
        methods: {
            redirectGrupo(item){
                location.href = this.url+'/familias/grupos/'+item.id
            },
            getFilter(id){
                if (id){
                    this.filterproduct = this.category.group_product.filter(item => item.subcategory_id == id);
                }else{
                    this.filterproduct = this.category.group_product
                }
                // console.log(this.filterproduct)
            },
            getFilterProduct(id){
                if (id){
                    this.filter = this.filter.filter(item => item.subcategory_id == id);
                }
                // console.log(this.filter)
            },
            allProduct(item){
                this.mostrar_productos = true
                console.log(this.active)
                this.filter = item.product
                // console.log(this.filter)
                // this.getFilterProduct()

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
