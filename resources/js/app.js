require('./bootstrap');

import { createApp } from 'vue'
import App from './App.vue'
import router from './router.js'

const app = createApp({})

app.use(router)
app.component('vueBody', App)

app.mount('#app')
