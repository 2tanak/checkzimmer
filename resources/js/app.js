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
import 'es6-promise/auto';
import {store} from './store';

Vue.config.productionTip = false;

axios.defaults.baseURL = '/api';
Vue.use(VueAxios, axios);

Vue.router = router;

import auth from './auth'

auth.plugins = {
    http: Vue.axios, // Axios
    router: Vue.router
};

import VueAuth from '@websanova/vue-auth/dist/v2/vue-auth.esm'

Vue.use(VueAuth, auth)


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

import VueI18n from 'vue-i18n'
Vue.use(VueI18n)

import messagesLocaleEn from '../lang/en.json';
import messagesLocaleDe from '../lang/de.json';
import messagesLocaleRu from '../lang/ru.json';
import messagesLocalePl from '../lang/pl.json';

const lang = localStorage.getItem('lang') || 'de'

const i18n = new VueI18n({
    locale: lang, // set locale
    messages: {
        en: messagesLocaleEn,
        de: messagesLocaleDe,
        ru: messagesLocaleRu,
        pl: messagesLocalePl,
    },
})

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
    store,
    i18n
});
