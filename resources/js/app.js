
require('./bootstrap');
window.Vue = require('vue');

// vue vform
import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;

//moment js
import moment from 'moment'
Vue.filter('timeformat', (arg) => {
    return moment(arg).format('MMMM Do YYYY, h:mm:ss a')
})
// sortlink
Vue.filter('sortlength',function (text,length,suffix) {
    return text.substring(0,length)+suffix;
})

// Editor support
import 'v-markdown-editor/dist/index.css';
import Vue from 'vue'
import Editor from 'v-markdown-editor'
Vue.use(Editor);

// vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from './store/index.js'
const store = new Vuex.Store(
    storeData
)

//vue progress-bar
import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '5px'
})

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);
Vue.component('home-main', require('./components/public/PublicMaster.vue').default);


// vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes';
const router = new VueRouter({
    routes, // short for `routes: routes`
    mode:'hash',
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",
})


const app = new Vue({
    router,
    store,
}).$mount('#adminmaster');


