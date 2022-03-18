//必要
import Vue from 'vue';

//Vue Select
import VueSelectComponent from 'vue-select'

//必要
require('./bootstrap');
window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('search-customer-component', require('./components/SearchCustomerComponent.vue').default);
Vue.component('vue-select-component', VueSelectComponent)

//必要
const app = new Vue({
    el: '#app',
});