import Vue from 'vue'

import Public from './components/Public/PublicRoot';
import Home from './components/Public/Home';

//require('./bootstrap');

import axios from 'axios';
import VueAxios from 'vue-axios';
import {store} from './store';
import router from "./router-public";

Vue.config.productionTip = false;
axios.defaults.baseURL = `/api`;

Vue.router = router;

Vue.use(VueAxios, axios)

import auth from './auth'

auth.plugins = {
    http: Vue.axios, // Axios
    router: Vue.router
};

import VueAuth from '@websanova/vue-auth/dist/v2/vue-auth.esm'

Vue.use(VueAuth, auth)

window.Vue = require('vue');


//var jQuery = require('jquery')

import VueI18n from 'vue-i18n'
Vue.use(VueI18n)

import messagesLocaleEn from '../lang/en.json';
import messagesLocaleDe from "../lang/de.json";

import vSelect from "vue-select";
Vue.component("v-select", vSelect);
import 'vue-select/dist/vue-select.css';

let locale = document.location.pathname.split('/')[1];
let translations = {
        en: messagesLocaleEn,
        de: messagesLocaleDe
    }
if (!translations[locale]) {
    locale = 'de'
}

const i18n = new VueI18n({
    locale: locale, // set locale
    messages: translations,
})

import closable from './directives/closeable';

Vue.directive('closable', closable);

const app = new Vue({
    el: '#application',
    router,
    components: {
        //Public,
        Home,
        Public,
        //Favorites,
        //Single,
        //Registration,
    },
    store,
    i18n,
});


jQuery(document).ready(function() {

    jQuery('.write-whatsapp').click(function(e) {
        gtag('event', 'clickWhatsapp', {
            'event_category': 'clicks',
            'event_label': 'WhatsApp click',
            });
    })

    function indexFormSelect2Init() {
        if (!jQuery('#distance-select').select2) {
            setTimeout(indexFormSelect2Init, 100);
            return;
        }
        if (jQuery(window).width() <= 575) {
            jQuery('#distance-select, #number-personse').select2('destroy');
        } else {
            jQuery('#distance-select, #number-personse').select2();
        }
    }

    jQuery(window).on('load', function() {
        if (jQuery('#distance-select, #number-personse').length) {
            indexFormSelect2Init()
        }

        jQuery('.nothing-found-section .avatar-slider').css('overflow', 'visible').css('opacity', '1');

        if (jQuery(window).width() > 575) {
            jQuery('form.find-subdomain-redirect').css('opacity', '1').css('overflow', 'visible')
        }
    });


    var tempScrollTop = jQuery(window).scrollTop();
    var currentScrollTop = jQuery(window).scrollTop();
    jQuery(window).scroll(function() {
        currentScrollTop = jQuery(window).scrollTop();
        if (currentScrollTop > jQuery('header').height()) {
            jQuery('body').addClass('fixed-header');
            if ( tempScrollTop > currentScrollTop ) {
                jQuery('header').addClass('show');
                jQuery('header').addClass('height-menu');
            } else {
                jQuery('header').removeClass('show');
                jQuery('header').removeClass('height-menu');
            }
        } else {
            jQuery('body').removeClass('fixed-header');
            jQuery('header').removeClass('show');
            jQuery('header').addClass('height-menu');
        }
        tempScrollTop = currentScrollTop;
    });

    if(jQuery(".single-main-slider .main-slider-item").length === 1) {
        jQuery('.single-main-slider').addClass( "disabled-dots" );
    } else {
        jQuery('.single-main-slider').removeClass( "disabled-dots" );
    }

    jQuery('.collapse-button').click(function() {
        var item = jQuery(this).parents('.questions-item');
        item.toggleClass('show').siblings('.show').removeClass('show');
    })

});

jQuery(window).scroll( function() {

    var element = jQuery('#main-footer');
    let counter = 0;

    var scroll = jQuery(window).scrollTop() + jQuery(window).height();
    var offset = element.offset().top;

    if(jQuery(this).scrollTop() > 108) {
        jQuery('.single-content .right-part-item').addClass('scroll');
    } else {
        jQuery('.single-content .right-part-item').removeClass('scroll');
    }

    if (scroll > offset && counter === 0) {
        jQuery('.scroll-top').addClass('absolute');
        jQuery('.fixed-bar').addClass('bottom');
    } else {
        jQuery('.scroll-top').removeClass('absolute');
        jQuery('.fixed-bar').removeClass('bottom');
    }

    if (jQuery(this).scrollTop() > 300) {
        jQuery('.scroll-top').fadeIn();
    } else {
        jQuery('.scroll-top').fadeOut();
    }

    if (jQuery(window).width() < 991) {
        if (scroll > offset && counter === 0) {
            jQuery('#main-footer').addClass('margin');
        } else {
            jQuery('#main-footer').removeClass('margin');
        }
    }

    if (jQuery(window).scrollTop() > 300 && jQuery(window).width() <= 991 && jQuery(window).width() >= 650)
    {
        jQuery(".fixed-bar").addClass('active');
    }
    else if (jQuery(window).scrollTop() > 700 && jQuery(window).width() <= 650) {
        jQuery(".fixed-bar").addClass('active');
    }
    else
    {
        jQuery(".fixed-bar").removeClass('active');
    }

});
