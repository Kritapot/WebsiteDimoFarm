
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

// vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from './store/index.js'
const store = new Vuex.Store(
    storeData
)

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);

// vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes';
const router = new VueRouter({
    routes, // short for `routes: routes`
    mode:'hash',
})

const app = new Vue({
    el: '#adminmaster',
    router,
    store,
});
