import Vue from 'vue'
import Router from 'vue-router'
import dashboard from "./StarAdmin/views/dashboard";

Vue.use(Router);

let Index = () => import( './components/Public/Index')
let Favorites = () => import('./components/Public/Favorites')
let Single = () => import('./components/Public/Single')
let Registration = () => import('./components/Public/Registration')


export default new Router({
    linkActiveClass: 'active',
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'index',
            component: Index,
        },
        {
            path: '/registration',
            name: 'registration',
            component: Registration
        },
        {
            path: '/single/:property',
            name: 'single',
            component: Single
        },
        {
            path: '/favorites',
            name: 'favorites',
            component: Favorites
        },
    ]
});
