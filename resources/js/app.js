//必要
import Vue from 'vue';

//Vue Select
import vSelect from 'vue-select'

//必要
require('./bootstrap');
window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('v-select', vSelect);
Vue.component('vue-select-component', require('./components/VueSelectComponent.vue').default);

//必要
const app = new Vue({
    el: '#app',

});