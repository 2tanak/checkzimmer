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

const app = new Vue({
    el: '#application',
    router,
    components: {
        //Public,
        //Home,
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
    jQuery('a.comfort-collapse-link').click(function (e) {
        e.preventDefault();
        jQuery(this).toggleClass('active');
    });

    //jQuery('.list-content').css('display', 'block');
    //jQuery(' .load-block-content.first-load-block-content').css('display', 'none')

    jQuery(document).mouseup(function (e){
        var modal = jQuery(".filter-block");
        if (!modal.is(e.target) && modal.has(e.target).length === 0){
            jQuery('.sorting').removeClass('up');
        }
    });

    jQuery('.mobile-button label').click(function () {
        jQuery('.mobile-menu').toggleClass('active')
    });

    jQuery('#password').on('input', function () {
        var value = jQuery(this).val();
        if (value !== '') {
            jQuery('a.forgot-password').addClass('active');
        } else {
            jQuery('a.forgot-password').removeClass('active');
        }
    });

    jQuery('.personal-area-link').click(function (e) {
        e.preventDefault();
        jQuery('.modal-overlay.modal-login-item').addClass('modal-show');
    });

    jQuery('a.forgot-password').click(function (e) {
        e.preventDefault();
        jQuery('.modal-login').removeClass('show');
        jQuery('.modal-forgot-password').addClass('show');
    });
    jQuery('a.remember-login').click(function (e) {
        e.preventDefault();
        jQuery('.modal-forgot-password').removeClass('show');
        jQuery('.modal-login').addClass('show');
    });

    jQuery('a.forgot-password-link').click(function (e) {
        e.preventDefault();
        jQuery('.modal-forgot-password').removeClass('show');
        jQuery('.modal-success').addClass('show');
    });

    jQuery('.modal-close').click(function () {
        jQuery('.modal-overlay').removeClass('modal-show');
    });

    jQuery('.fullscreen-button').click(function () {
        jQuery('.google-map').addClass('fullscreen');
    });
    jQuery('.close-button').click(function () {
        jQuery('.google-map').removeClass('fullscreen');
    });

    jQuery('.expand-collapse').click(function () {
        jQuery('.single-object-modal .property-card').toggleClass('active');
        jQuery('.single-object-modal .modal-map').toggleClass('active');
    });

    jQuery('a.full').click(function (e) {
        e.preventDefault();
        jQuery('.reviews-text').toggleClass('full');
        jQuery('a.full').toggleClass('active');
    });

    jQuery('.stars img').mouseover(function() {
        jQuery(this).addClass('hovered');

        var block = false;
        jQuery('.stars img').each(function() {
            if (block) {
                return;
            }
            jQuery(this).attr('src', '/svg/star-yellow.svg');
            if (jQuery(this).hasClass('hovered')) {
                block = true;
            }
        })
    });
    jQuery('.stars img').mouseout(function() {
        jQuery('.stars img').removeClass('hovered')
        jQuery('.stars img').each(function() {
            if (!jQuery(this).hasClass('clicked')) {
                jQuery(this).attr('src', '/svg/star-gray.svg');
            }
        })
    })
    jQuery('.stars img').click(function() {
        jQuery('.stars img').removeClass('clicked')
        jQuery(this).addClass('clicked');

        var block = false;
        var count = 0;
        jQuery('.stars img').each(function() {
            if (block) {
                jQuery(this).attr('src', '/svg/star-gray.svg');
                return;
            }
            count++;
            if (jQuery(this).hasClass('clicked')) {
                block = true;
                return;
            }
            jQuery(this).addClass('clicked');
        })
        jQuery('[name="rating"]').val(count);
    });

    jQuery('.give-feedback').click(function (e) {
        e.preventDefault();
        jQuery('.empty-block').addClass('active');
        jQuery('.give-feedback').addClass('hide');
    });

    jQuery('.close-form').click(function () {
        jQuery('.empty-block').removeClass('active');
        jQuery('.give-feedback').removeClass('hide');
    });

    jQuery.fn.textToggle = function(cls, str) {
        return this.each(function(i) {
            jQuery(this).click(function() {
                var c = 0, el = jQuery(cls).eq(i), arr = [str,el.text()];
                return function() {
                    el.text(arr[c++ % arr.length]);
                }}());
        })};

    jQuery('.languages-block .selected-language').click(function (e) {
        e.preventDefault();
        jQuery(this).toggleClass('active');
        jQuery('.list-languages').toggleClass('active');
    });

    jQuery(document).mouseup(function (e){
        var div = jQuery(".selected-language");
        if (!div.is(e.target)
            && div.has(e.target).length === 0) {
            jQuery('.list-languages').removeClass('active');
            jQuery('.selected-language').removeClass('active');
        }
    });


    jQuery('.modal-block input').focus(function () {
        var parent = jQuery(this).closest('.input-block-item, .modal-block');
        jQuery(parent).find('label').addClass('active');
    });
    jQuery('.modal-block input').blur(function () {
        var value = jQuery(this).val();
        var parent = jQuery(this).closest('.input-block-item, .modal-block');
        if (value === '') {
            jQuery(parent).find('label').removeClass('active');
        }
    });

    jQuery('.sidebar-bottom a').click(function (e) {
        var parent = jQuery(this).closest('.sidebar-bottom-block');
        jQuery('.sidebar-modal-block').removeClass('active');
        jQuery(parent).find('.sidebar-modal-block').addClass('active');
    });

    jQuery('a.drucken').click(function (e) {
        e.preventDefault();
        jQuery('.sidebar-modal-block').removeClass('active');
        window.print();
    });

    jQuery('.number-phone a').click(function (e) {
        e.preventDefault();
        jQuery('.quality, .modal-quality-block.sidebar-modal-block').addClass('active');
    });

    jQuery('a.another-time').click(function (e) {
        e.preventDefault();
        jQuery('.quality, .modal-quality-block.sidebar-modal-block').removeClass('active');
    });

    jQuery('.close-block').click(function () {
        jQuery('.sidebar-modal-block').removeClass('active');
    });

    jQuery(document).mouseup(function (e){
        var div = jQuery(".quality");
        if (!div.is(e.target)
            && div.has(e.target).length === 0) {
            jQuery('.quality').removeClass('active');
        }
    });

    jQuery(document).click(function (e) {
        if (jQuery(e.target).closest('.sidebar-small-block').length === 0 &&
            jQuery(e.target).closest('.select2-container').length === 0  &&
            jQuery('.sidebar-small-block').hasClass('active')) {
            jQuery('.sidebar-modal-block').removeClass('active');
        }
    });


    jQuery('.sidebar-modal-block .overlay').click(function () {
        jQuery('.sidebar-modal-block').removeClass('active');
    });

    jQuery('#offer-select').select2();

    jQuery(window).on('load', function() {
        if (jQuery(window).width() <= 575) {
            jQuery('#offer-select3, #distance-select, #number-personse').select2('destroy');
        } else {
            jQuery('#offer-select3, #distance-select, #number-personse').select2();
        }
    });


    jQuery('.mobile-card-button').click(function () {
        jQuery('.property-card').toggleClass('big');
        jQuery('.mobile-picture').toggleClass('active');
    });

    jQuery('a.inquiry').click(function (e) {
        e.preventDefault();
        jQuery('.inquiry-modal-overlay').addClass('modal-show');
    });

    jQuery('.big-slider').slick({
        arrows: true,
        prevArrow: '<img class="prev-arrow" src="/svg/i-previous-lightbox.svg">',
        nextArrow: '<img class="next-arrow" src="/svg/i-next-lightbox.svg">',
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        asNavFor: '.small-slider'
    });

    jQuery('.property-card-slider').slick({
        arrows: false,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true
    });

    if (jQuery(window).width() < 1040) {
        jQuery('.property-card-slider').slick('unslick');
    }

    jQuery('.small-slider').slick({
        slidesToShow: 10,
        slidesToScroll: 1,
        arrows: false,
        infinite: true,
        focusOnSelect: true,
        asNavFor: '.big-slider',
        centerMode: true,
        responsive: [
            {
                breakpoint: 1212,
                settings: "unslick"
            }
        ]
    });

    jQuery('a.open-gallery').click(function (e) {
        e.preventDefault();
        jQuery('.slider-modal-overlay').addClass('modal-show');
    });

    jQuery('.see-number-phone').click(function () {
       jQuery('.see-number-phone').addClass('active');
        jQuery('.phone-hide').html(atob(window.phonenumStr));
        jQuery('.phone-hide').attr('href', 'tel:' + atob(window.phonenum));
    });

    jQuery('a.map-picture').bind("click", function(e){
        e.preventDefault();
        var anchor = jQuery(this);
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(anchor.attr('href')).offset().top
        }, 650);
        jQuery('.tab-pane').removeClass('active show');
        jQuery('a.nav-link').removeClass('active');
        jQuery('.map-content').addClass('active show');
        jQuery('.map-active a').addClass('active');
    });

    jQuery('a.map-mobile-picture').bind("click", function(e){
        e.preventDefault();
        var anchor = jQuery(this);
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(anchor.attr('href')).offset().top
        }, 650);
        jQuery('.mobile-map-content .collapse').addClass('show');
        jQuery('.click-collapse').find('.head-collapse').attr("aria-expanded", true).removeClass('collapsed');
    });

    jQuery(window).scroll(function () {
        if(jQuery(this).scrollTop() > 108) {
            jQuery('.single-content .right-part-item').addClass('scroll');
        } else {
            jQuery('.single-content .right-part-item').removeClass('scroll');
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

    let id = parseInt(jQuery('.single-content .favorites').attr('id'));
    let favoritesObject = JSON.parse(localStorage.getItem("favoritesList"));
    if (favoritesObject === null) {
        favoritesObject = [];
    }
    if (favoritesObject.indexOf(id) !== -1) {
        jQuery('.single-content .favorites').addClass('active');
    }

    jQuery('.single-content .favorites').click(function (e) {
        e.preventDefault();

        jQuery('.single-content .favorites').toggleClass('active');
        let id = parseInt(jQuery(this).attr('id'));
        let favoritesObject = JSON.parse(localStorage.getItem("favoritesList"));

        if (favoritesObject === null) {
            favoritesObject = [];
        }
        if (favoritesObject.indexOf(id) !== -1) {
            favoritesObject.splice(favoritesObject.indexOf(id), 1);
        } else {
            favoritesObject.push(id);
        }
        jQuery('.favoritesCount').html(favoritesObject.length);
        localStorage.setItem('favoritesList', JSON.stringify(favoritesObject));
    });

    if(jQuery(".single-main-slider .main-slider-item").length === 1) {
        jQuery('.single-main-slider').addClass( "disabled-dots" );
    } else {
        jQuery('.single-main-slider').removeClass( "disabled-dots" );
    }

});

jQuery(window).on('load', function() {
    if(jQuery(window).width() <= 991) {
        jQuery('.comfort .collapse').removeClass('show');
    }
    if (jQuery(window).width() <= 680) {
        jQuery('a.inquiry').click(function (e) {
            e.preventDefault();
            jQuery('body').addClass('overflow');
        });
        jQuery('.inquiry-modal .modal-close').click(function (e) {
            e.preventDefault();
            jQuery('body').removeClass('overflow');
        });
    }

    jQuery(window).scroll(function () {

        var element = jQuery('#main-footer');
        var counter = 0;

        var scroll = jQuery(window).scrollTop() + jQuery(window).height();
        var offset = element.offset().top;

        if (scroll > offset && counter === 0) {
            jQuery('.scroll-top').addClass('absolute');
            jQuery('.fixed-bar').addClass('bottom');
            jQuery('.single-content').addClass('padding-bottom');
        } else {
            jQuery('.scroll-top').removeClass('absolute');
            jQuery('.fixed-bar').removeClass('bottom');
            jQuery('.single-content').removeClass('paddong-bottom');
        }

        if (jQuery(this).scrollTop() > 300) {
            jQuery('.scroll-top').fadeIn();
        } else {
            jQuery('.scroll-top').fadeOut();
        }
    });


    jQuery('.scroll-top').click(function () {
        jQuery('html, body').animate({
            scrollTop: 0
        }, 400);
    });

    if (jQuery('.main-top-block .no-photo').length === 0) {
        jQuery('.single-main-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            infinite: true,
            dots: true,
            centerMode: true
        });
    }

    if(jQuery('.small-slider .slider-item').length <= 10) {
        jQuery('.small-slider').addClass('transform');
    } else {
        jQuery('.small-slider').removeClass('transform');
    }

});

jQuery(window).scroll( function() {

    var element = jQuery('#main-footer');
    let counter = 0;

    var scroll = jQuery(window).scrollTop() + jQuery(window).height();
    var offset = element.offset().top;

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


window.onload = function () {
    jQuery('.single-load-content').addClass('hide');
    jQuery('.single-content').removeClass('not-active');
    setTimeout (function() {
        jQuery('.communication').removeClass('not-active');
    }, 1000);

    jQuery('.nothing-found-section .avatar-slider').css('overflow', 'visible').css('opacity', '1');

    jQuery('.background-image-block .find-subdomain-redirect').css('overflow', 'visible').css('opacity', '1');
};
