import Vue from 'vue';
import VueRouter from 'vue-router'

import Main from './components/Paginas/Main'
import NotFound from './components/NotFound'
import Imovel from './components/Paginas/Imovel'

Vue.use(VueRouter)

export default new VueRouter({
    routes: [
        { path: '/',  component: Main, name: 'Main'},
        { path: '/Imovel',  component: Imovel, name: 'Imovel'},
        { path: '/*', component:NotFound }
    ],
    mode:'history'
})