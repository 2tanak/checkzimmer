/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//window.Vue = require('vue');

import Vue from 'vue'
import App from './StarAdmin/App'
import router from './StarAdmin/router'
import BootstrapVue from 'bootstrap-vue'

require('./bootstrap');

Vue.use(BootstrapVue);

import axios from 'axios';
import VueAxios from 'vue-axios';
import {store} from './store';

Vue.config.productionTip = false;

axios.defaults.baseURL = '/api';
Vue.use(VueAxios, axios);

Vue.router = router;

import auth from '@websanova/vue-auth';
import authBasic from '@websanova/vue-auth/dist/drivers/auth/bearer.min.js';
import httpAxios from '@websanova/vue-auth/dist/drivers/http/axios.1.x.js';
import routerVueRouter from '@websanova/vue-auth/dist/drivers/router/vue-router.2.x.esm.js';

Vue.use(auth, {
    auth: authBasic,
    http: httpAxios,
    router: routerVueRouter,
    rolesKey: 'role',
    authRedirect: { path: '/dashboard/login' }
});


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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#application',
    router,
    components: {
        App
    },
    store
});
