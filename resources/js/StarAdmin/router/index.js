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

import Requests from '../../components/Dashboard/Requests/Index';
import Header from '../../components/Dashboard/Website/Header/Index';
import Footer from '../../components/Dashboard/Website/Footer/Index';
import Settings from '../../components/Dashboard/Website/Settings/Index';
import Users from '../../components/Dashboard/Users/Index';
import Guests from '../../components/Dashboard/Guests/Index';
import Languages from '../../components/Dashboard/Languages/Index';
import Features from '../../components/Dashboard/Data/Features/Index';
import RoomTypes from '../../components/Dashboard/Data/RoomTypes/Index';
import GeocoderCache from '../../components/Dashboard/Data/GeocoderCache/Index';
import Questions from '../../components/Dashboard/Feedback/Questions/Index';
import Reviews from '../../components/Dashboard/Feedback/Reviews/Index';
import Property from '../../components/Dashboard/Property/Property/Index';
import PropertySingle from '../../components/Dashboard/Property/Property/Single';
import Rooms from '../../components/Dashboard/Property/Rooms/Index';
import AssignedRoomTypes from '../../components/Dashboard/Property/AssignedRoomTypes/Index';
import BookingItems from '../../components/Dashboard/Booking/Items/Index';
import BookingMapping from '../../components/Dashboard/Booking/Mapping/Index';
import BookingData from '../../components/Dashboard/Booking/Data/Index';
import BookingSettings from '../../components/Dashboard/Booking/Settings/Index';

Vue.use(Router);

const permissionsAdmin = {
    roles: 'admin',
    redirect: { name: 'login' },
    forbiddenRedirect:  { name: 'login' }
}

export default new Router({
    linkActiveClass: 'active',
    mode: 'history',
    routes: [
        {
            path: '/dashboard',
            name: 'dashboard',
            component: dashboard,
            meta: { auth: true }
        },
        {
            path: '/dashboard/requests',
            name: 'requests',
            component: Requests,
            meta: { auth: true }
        },
        {
            path: '/dashboard/property/items',
            name: 'property',
            component: Property,
            meta: { auth: true }
        },
        {
            path: '/dashboard/booking/items',
            name: 'booking-items',
            component: BookingItems,
            meta: { auth: true }
        },
        {
            path: '/dashboard/property/assigned-room-types',
            name: 'assigned-room-types',
            component: AssignedRoomTypes,
            meta: { auth: true }
        },
        {
            path: '/dashboard/property/rooms',
            name: 'rooms',
            component: Rooms,
            meta: { auth: true }
        },
        {
            path: '/dashboard/property/:item',
            name: 'property-single',
            component: PropertySingle,
            meta: { auth: true }
        },
        {
            path: '/dashboard/booking/mapping',
            name: 'booking-mapping',
            component: BookingMapping,
            meta: { auth: true }
        },
        {
            path: '/dashboard/booking/data',
            name: 'booking-data',
            component: BookingData,
            meta: { auth: true }
        },
        {
            path: '/dashboard/booking/settings',
            name: 'booking-settings',
            component: BookingSettings,
            meta: { auth: true }
        },
        {
            path: '/dashboard/categories',
            name: 'categories',
            component: widgets,
            meta: { auth: true }
        },
        {
            path: '/dashboard/website/header',
            name: 'website-header',
            component: Header,
            meta: { auth: true }
        },
        {
            path: '/dashboard/website/footer',
            name: 'website-footer',
            component: Footer,
            meta: { auth: true }
        },
        {
            path: '/dashboard/website/settings',
            name: 'website-settings',
            component: Settings,
            meta: { auth: true }
        },
        {
            path: '/dashboard/users',
            name: 'users',
            component: Users,
            meta: { auth: true }
        },
        {
            path: '/dashboard/guests',
            name: 'guests',
            component: Guests,
            meta: { auth: true }
        },
        {
            path: '/dashboard/languages',
            name: 'languages',
            component: Languages,
            meta: { auth: true }
        },
        {
            path: '/dashboard/data/features',
            name: 'features',
            component: Features,
            meta: { auth: true }
        },
        {
            path: '/dashboard/data/room-types',
            name: 'room-types',
            component: RoomTypes,
            meta: { auth: true }
        },
        {
            path: '/dashboard/data/geocoder-cache',
            name: 'geocoder-cache',
            component: GeocoderCache,
            meta: { auth: true }
        },
        {
            path: '/dashboard/feedback/questions',
            name: 'questions',
            component: Questions,
            meta: { auth: true }
        },
        {
            path: '/dashboard/data/reviews',
            name: 'reviews',
            component: Reviews,
            meta: { auth: true }
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
            path: '/dashboard/login',
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
