import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Signup from '../components/Login/Signup'
import Login from '../components/Login/Login'
import Formu from '../components/formu/Formu'
import Read from '../components/formu/Read'
import Create from '../components/formu/Create'
import Logout from '../components/Login/Logout'
const routes = [
    { path: '/login', component: Login ,name:'login' },
    { path: '/signup', component: Signup },
    { path: '/logout', component: Logout },
    { path: '/formu', component: Formu,name:'formu' },
    { path: '/ask', component: Create},
    { path: '/question/:slug', component: Read,name:'read'},

]
const router = new VueRouter({
      routes, // short for `routes: routes`
      hashbang:false,
      mode:'history'
  })

export default router