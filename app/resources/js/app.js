import Vue from 'vue';
import router from './router'
import DataTable from 'laravel-vue-datatable';

Vue.use(DataTable);
require('./bootstrap');


const app = new Vue({
    el: '#app',
    router
});