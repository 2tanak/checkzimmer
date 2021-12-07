import Vue from 'vue'
import Router from 'vue-router'
import dashboard from "./StarAdmin/views/dashboard";

Vue.use(Router);

let Index = () => import( './components/Public/Index')
let Favorites = () => import('./components/Public/Favorites')
let Single = () => import('./components/Public/Single')
let Registration = () => import('./components/Public/Registration')
let Personal = () => import('./components/Public/cabinet/Index.vue')
let General = () => import('./components/Public/cabinet/Index.vue')
let Profile = () => import('./components/Public/cabinet/pages/Profile.vue')
let Contact = () => import('./components/Public/cabinet/pages/Contact.vue')
let Property = () => import('./components/Public/cabinet/pages/Property.vue')
let Security = () => import('./components/Public/cabinet/pages/Security.vue')

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
		 {
            path: '/personal',
            name: 'personal',
            component: Personal
        },
		{
            path: '/personal/general',
            name: 'general',
            component: General
        },
		{
            path: '/personal/profile',
            name: 'profile',
            component: Profile
        },
		{
            path: '/personal/contact',
            name: 'contact',
            component: Contact
        },
		{
            path: '/personal/property',
            name: 'property',
            component: Property
        },
		{
            path: '/personal/security',
            name: 'security',
            component: Security
        }
    ]
});
