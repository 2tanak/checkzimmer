import Vue from 'vue'
import Router from 'vue-router'
import dashboard from "./StarAdmin/views/dashboard";

Vue.use(Router);

let Index = () => import( './components/Public/Index')
let Favorites = () => import('./components/Public/Favorites')
let Single = () => import('./components/Public/Single')
let Registration = () => import('./components/Public/Registration')
let General = () => import('./components/Public/cabinet/Index.vue')
let Profile = () => import('./components/Public/cabinet/pages/Profile.vue')
let Contact = () => import('./components/Public/cabinet/pages/Contact.vue')
let Property = () => import('./components/Public/cabinet/pages/Property.vue')
let Security = () => import('./components/Public/cabinet/pages/Security.vue')
let Show_property = () => import('./components/Public/cabinet/pages/children/property/Update.vue')

import login from './StarAdmin/views/sample-pages/login'

export default new Router({
    linkActiveClass: 'active',
    mode: 'history',
    routes: [
	    {
            path: '/dashboard/login',
            name: 'login',
            component: login
        },
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
            component: General,
			meta: { auth: true }
        },
		{
            path: '/personal/general',
            name: 'general',
            component: General,
			meta: { auth: true }
        },
		{
            path: '/personal/profile',
            name: 'profile',
            component: Profile,
			meta: { auth: true }
        },
		{
            path: '/personal/contact',
            name: 'contact',
            component: Contact,
			meta: { auth: true }
        },
		{
            path: '/personal/property',
            name: 'property',
            component: Property,
			meta: { auth: true }
        },
		{
            path: '/personal/property/update',
            name: 'update',
            component: Show_property,
			meta: { auth: true }
        },
		{
            path: '/personal/security',
            name: 'security',
            component: Security,
			meta: { auth: true }
        }
    ]
});
