/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueSweetalert2);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ProductComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('product-component', require('./components/ProductComponent.vue').default);
Vue.component('carrito-component', require('./components/CarritoComponent.vue').default);
Vue.component('confirmar-component', require('./components/ConfirmarComponent.vue').default);
Vue.component('cierres-component', require('./components/CierresComponent.vue').default);
Vue.component('capacidad-component', require('./components/CapacidadComponent.vue').default);
Vue.component('gallery-component', require('./components/GalleryComponent.vue').default);
Vue.component('select-component', require('./components/SelectComponent.vue').default);
Vue.component('select-component2', require('./components/SelectComponentGrupop.vue').default);
Vue.component('product-carrito', require('./components/ProductCarritoComponent.vue').default);



Vue.component('familia-component', require('./components/FamiliaComponent.vue').default);
Vue.component('botonera-component', require('./components/BotoneraComponent.vue').default);
Vue.component('producto-carro', require('./components/ProductCarroComponent.vue').default);
Vue.component('carro-component', require('./components/CarroComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
