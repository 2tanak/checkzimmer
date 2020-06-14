import Vue from 'vue'
import Router from 'vue-router'

// Dashboard Components
import dashboard from '../views/dashboard'

// Widgets
import widgets from '../views/widgets'

// UI Components
import alerts from '../views/ui-components/alerts'
import badges from '../views/ui-components/badges'
import breadcrumbs from '../views/ui-components/breadcrumbs'
import buttons from '../views/ui-components/buttons'
import carousel from '../views/ui-components/carousel'
import dropdowns from '../views/ui-components/dropdowns'
import icons from '../views/ui-components/icons'
import modals from '../views/ui-components/modals'
import paginations from '../views/ui-components/paginations'
import progress from '../views/ui-components/progress'
import tables from '../views/ui-components/tables'
import typography from '../views/ui-components/typography'
import tabs from '../views/ui-components/tabs'
import tooltips from '../views/ui-components/tooltips'

// Form Components
import forms from '../views/forms/forms'

// Sample Pages
import error404 from '../views/sample-pages/error-404'
import error500 from '../views/sample-pages/error-500'
import login from '../views/sample-pages/login'
import register from '../views/sample-pages/register'

import Header from '../../components/Dashboard/Website/Header';
import Footer from '../../components/Dashboard/Website/Footer';
import Users from '../../components/Dashboard/Users';
import Features from '../../components/Dashboard/Data/Features';
import RoomTypes from '../../components/Dashboard/Data/RoomTypes';
import Property from '../../components/Dashboard/Property/Property';
import Rooms from '../../components/Dashboard/Property/Rooms';
import AssignedRoomTypes from '../../components/Dashboard/Property/AssignedRoomTypes';
import BookingItems from '../../components/Dashboard/Booking/Items';
import BookingMapping from '../../components/Dashboard/Booking/Mapping';
import BookingData from '../../components/Dashboard/Booking/Data';
import BookingSettings from '../../components/Dashboard/Booking/Settings';

Vue.use(Router);

export default new Router({
    linkActiveClass: 'active',
    routes: [
        {
            path: '/dashboard',
            name: 'dashboard',
            component: dashboard
        },
        {
            path: '/dashboard/requests',
            name: 'requests',
            component: widgets
        },
        {
            path: '/dashboard/property/items',
            name: 'property',
            component: Property
        },
        {
            path: '/dashboard/property/rooms',
            name: 'rooms',
            component: Rooms
        },
        {
            path: '/dashboard/property/assigned-room-types',
            name: 'assigned-room-types',
            component: AssignedRoomTypes
        },
        {
            path: '/dashboard/booking/items',
            name: 'booking-items',
            component: BookingItems
        },
        {
            path: '/dashboard/booking/mapping',
            name: 'booking-mapping',
            component: BookingMapping
        },
        {
            path: '/dashboard/booking/data',
            name: 'booking-data',
            component: BookingData
        },
        {
            path: '/dashboard//booking/settings',
            name: 'booking-settings',
            component: BookingSettings
        },
        {
            path: '/dashboard/categories',
            name: 'categories',
            component: widgets
        },
        {
            path: '/dashboard/website/header',
            name: 'website-header',
            component: Header
        },
        {
            path: '/dashboard/website/footer',
            name: 'website-footer',
            component: Footer
        },
        {
            path: '/dashboard/users',
            name: 'users',
            component: Users
        },
        {
            path: '/dashboard/data/features',
            name: 'features',
            component: Features
        },
        {
            path: '/dashboard/data/room-types',
            name: 'room-types',
            component: RoomTypes
        },
        {
    path: '/404',
    name: 'error-404',
    component: error404
  },
  {
    path: '/500',
    name: 'error-500',
    component: error500
  },
        {
            path: '/login',
            name: 'login',
            component: login
        },
        {
            path: '/register',
            name: 'register',
            component: register
        },
  {
    path: '/alerts',
    name: 'alerts',
    component: alerts
  },
  {
    path: '/badges',
    name: 'badges',
    component: badges
  },
  {
    path: '/breadcrumbs',
    name: 'breadcrumbs',
    component: breadcrumbs
  },
  {
    path: '/buttons',
    name: 'buttons',
    component: buttons
  },
  {
    path: '/carousel',
    name: 'carousel',
    component: carousel
  },
  {
    path: '/dropdowns',
    name: 'dropdowns',
    component: dropdowns
  },
  {
    path: '/icons',
    name: 'icons',
    component: icons
  },
  {
    path: '/modals',
    name: 'modals',
    component: modals
  },
  {
    path: '/paginations',
    name: 'paginations',
    component: paginations
  },
  {
    path: '/progress',
    name: 'progress',
    component: progress
  },
  {
    path: '/tables',
    name: 'tables',
    component: tables
  },
  {
    path: '/typography',
    name: 'typography',
    component: typography
  },
  {
    path: '/tabs',
    name: 'tabs',
    component: tabs
  },
  {
    path: '/tooltips',
    name: 'tooltips',
    component: tooltips
  },
  {
    path: '/forms',
    name: 'forms',
    component: forms
  }]
})
