import Vue from 'vue';
import VueRouter from 'vue-router'

import Main from './components/Paginas/Main'
import NotFound from './components/NotFound'
import Imovel from './components/Paginas/Imovel'
import Contrato from './components/Paginas/Contrato'
import ImovelCriar from './components/Paginas/ImovelCriar'
import ContratoCriar from './components/Paginas/ContratosCriar'

Vue.use(VueRouter)

export default new VueRouter({
    routes: [
        { path: '/',  component: Main, name: 'main'},
        { path: '/imovel',  component: Imovel, name: 'imovel'},
        { path: '/contrato',  component: Contrato, name: 'contrato'},
        { path: '/imovel-criar',  component: ImovelCriar, name: 'imovel-criar'},
        { path: '/contrato-criar',  component: ContratoCriar, name: 'contrato-criar'},
        { path: '/*', component:NotFound }
    ],
    mode:'history'
})