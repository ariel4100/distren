<template>
    <div class="row">
        <div class="col-md-6 mt-4">
            <p>Seleccionar Categoria</p>
            <select class="custom-select form-control select2" name="category_id">
                <option v-for="item in categoria" value=" ">{{ item.title}}</option>
            </select>
        </div>
        <div class="col-md-6 mt-4">
            <p>Seleccionar Subcategoria</p>
            <select class="custom-select form-control select2" name="subcategory_id">
                <option v-for="item in subcategoria" value="">{{ item.title}}</option>
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
        props:['capacidades','cierres','subcategoria','categoria'],
        components: {
            Multiselect,
            Money
        },
        data(){
          return{
              terminacion:[],

              url : document.__API_URL,

          }
        },
        mounted() {

            this.getCapacidad()
            //console.log(this.capacidad)
        },
        methods: {

            getCapacidad(){
                //console.log(this.selectedcapacidad)
                this.selectedcapacidad.forEach((item)=>{
                    this.capacidad.push(
                        {
                            cc: item.cc,
                            price: item.price,
                            price_offer: item.price_offer,
                            offer: item.offer
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
