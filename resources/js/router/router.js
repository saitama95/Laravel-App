import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


import Login from '../components/Login/Login'
const routes = [
    { path: '/login', component: Login },
    //{ path: '/bar', component: Bar }
]
const router = new VueRouter({
       routes, // short for `routes: routes`
      hashbang:false,
       mode:'history'
  })

export default router