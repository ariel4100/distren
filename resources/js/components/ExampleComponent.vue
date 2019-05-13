<template>
    <div class="row my-5">

        <table class="table">
            <thead class="distren-fondo white-text">
            <tr>
                <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">cc</th>
                <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Precio</th>
                <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Cantidad</th>
                <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Subtottal</th>
                <th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Orden</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in pro[0]">
                <td>{{ item.cc}}</td>
                <td>{{ item.price}}</td>
                <td style="width: 10px">
                    <input type="number" class="form-control" v-model="item.qty">
                </td>
                <td>{{ item.price * qty}}</td>
            </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
    export default {
        props:['producto'],
        data(){
            return{
                pro:[],
                qty:0
            }
        },
        mounted() {
            this.getProduct()
            //console.log('Component mounted.')
        },
        methods: {
            getProduct() {
                this.pro.push(this.producto);

                //console.log(this.editarcierre[0])
            },
        }
    }
</script>
