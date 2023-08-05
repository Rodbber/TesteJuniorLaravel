import { createRouter, createWebHistory } from 'vue-router'

import UnidadeIndex from './views/Unidade/Index.vue';
import UnidadeRegister from './views/Unidade/Register.vue';
import ColaboradorIndex from './views/Colaborador/Index.vue';
import ColaboradorRegister from './views/Colaborador/Register.vue';
const routes = [
    { path: '/', redirect: '/unidade' },
    { path: '/unidade', component: UnidadeIndex },
    { path: '/unidade/register', component: UnidadeRegister },
    { path: '/colaborador', component: ColaboradorIndex },
    { path: '/colaborador/register', component: ColaboradorRegister },
  ];

  const router = createRouter({
    history: createWebHistory('/home#'),
    routes
  })
  export default router
