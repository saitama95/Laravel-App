/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('home-app', require('./components/HomeApp.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import HomeApp from './components/HomeApp';
import router from './router/router';
import Vuetify from 'vuetify'
import User from './helpers/User'
import AppStorage from './helpers/AppStorage'
import Vue from 'vue'
import md from 'marked'
import VueSimplemde from 'vue-simplemde'
Vue.use(VueSimplemde)

window.AppStorage=AppStorage
window.User=User
window.md=md
Vue.use(Vuetify)
window.EventBus=new Vue();

Vue.filter('capitalize', function (value) {
    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1)
})

const vuetify= new Vuetify({})

const app = new Vue({
    el: '#app',
    vuetify,
    router,
    components:{
        'home-app':HomeApp,
    }
});

