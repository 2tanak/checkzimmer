import Vue from 'vue'
import Public from './components/Public/Index'
import Favorites from './components/Public/Favorites'
import Single from './components/Public/Single'

require('./bootstrap');

import axios from 'axios';
import VueAxios from 'vue-axios';
import {store} from './store';
import router from "./StarAdmin/router";

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

/*jQuery(window).on('load', function() {
    jQuery('.property-card-slider').css({'opacity': 1, 'transition-duration': '0.2s'})
});*/

const app = new Vue({
    el: '#application',
    router,
    components: {
        Public,
        Favorites,
        Single
    },
    store
});


jQuery(document).ready(function() {

    jQuery(function () {
        jQuery('[data-toggle="tooltip"]').tooltip()
    });

    jQuery('.sorting a').click(function(e) {
        e.preventDefault();
        jQuery('.sorting').toggleClass('up');
    });

    jQuery('.filter-block li').click(function () {
        var paragraph = jQuery(this).text();
        jQuery('.filter-block li').removeClass('check');
        jQuery(this).addClass('check');
        jQuery('.sorting a').text(paragraph);
        jQuery('.sorting').removeClass('up');
    });

    jQuery(document).mouseup(function (e){
        var modal = jQuery(".filter-block");
        if (!modal.is(e.target) && modal.has(e.target).length === 0){
            jQuery('.sorting').removeClass('up');
        }
    });

    jQuery(".left-block a").click(function(e) {
        e.preventDefault();
        jQuery(".left-block a").removeClass('active');
        jQuery(this).addClass('active');
    });

    jQuery('.left-block a.map').click(function() {
        jQuery('.property .container').addClass('active');
        jQuery('.property').addClass('show-map');
        jQuery('.property').removeClass('not-map');
    });
    jQuery('.left-block a.list').click(function() {
        jQuery('.property .container').removeClass('active');
        jQuery('.property').removeClass('show-map');
        jQuery('.property').addClass('not-map');
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
        jQuery('.modal-overlay').addClass('modal-show');
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
    jQuery(function() {
        jQuery('.sh_nmr').textToggle(".sh_nmr","").click();
        jQuery('.sh_nmr').textToggle(".num_hide","ХХХХ ХХХX").click();
        jQuery('.sh_nmr').click(function () {
            jQuery('.sidebar .number-phone').addClass('gray');
        });
    });

    jQuery('.inquiry-modal .input-block-item input, .modal-block input').focus(function () {
        var parent = jQuery(this).closest('.input-block-item, .modal-block');
        jQuery(parent).find('label').addClass('active');
    });
    jQuery('.inquiry-modal .input-block-item input, .modal-block input').blur(function () {
        var value = jQuery(this).val();
        var parent = jQuery(this).closest('.input-block-item, .modal-block');
        if (value === '') {
            jQuery(parent).find('label').removeClass('active');
        }
    });
    jQuery('.inquiry-modal .data-block input').focus(function () {
        var parent = jQuery(this).closest('.data-block');
        jQuery(parent).find('label').addClass('active');
    });

    jQuery('.sidebar-bottom a').click(function (e) {
        e.preventDefault();
        var parent = jQuery(this).closest('.sidebar-bottom-block');
        jQuery('.sidebar-modal-block').removeClass('active');
        jQuery(parent).find('.sidebar-modal-block').addClass('active');
    });

    jQuery('a.drucken').click(function (e) {
        e.preventDefault();
        jQuery('.sidebar-modal-block').removeClass('active');
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
        jQuery('.sidebar-small-block, .sidebar-modal-block').removeClass('active');
    });

    jQuery('.sidebar-modal-block .overlay').click(function () {
        jQuery('.sidebar-modal-block').removeClass('active');
    });

    jQuery('#offer-select').select2();

    /*jQuery(window).on('load', function() {
        if (jQuery(window).width() <= 575) {
            jQuery('#number-persons, #type, #offer-select3, #distance-select, #number-personse').select2('destroy');
        } else {
            jQuery('#number-persons, #type, #offer-select3, #distance-select, #number-personse').select2();
        }
    });*/

    jQuery(window).on('load', function() {
        jQuery('#number-persons, #type, #offer-select3, #distance-select, #number-personse').select2();
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
        asNavFor: '.small-slider',
        cssEase: 'ease-in',
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
    });

    jQuery('.small-slider').slick({
        slidesToShow: 10,
        slidesToScroll: 1,
        arrows: false,
        infinite: true,
        asNavFor: '.big-slider',
        focusOnSelect: true,
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
        jQuery('#mobile-map-content-collapse').addClass('show');
    });

    jQuery('.map-mobile-picture').click(function(e) {
        e.preventDefault();
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
            } else {
                jQuery('header').removeClass('show');
            }
        } else {
            jQuery('body').removeClass('fixed-header');
            jQuery('header').removeClass('show');
        }
        tempScrollTop = currentScrollTop;
    });



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
        } else {
            jQuery('.scroll-top').removeClass('absolute');
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

    jQuery('.single-main-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        infinite: true,
        dots: true
    });

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

jQuery(window).on("load resize", function(){
    if (jQuery(window).width() <= 1040) {
        jQuery('.property-card-slider').filter('.slick-initialized').slick('unslick');
    } else if (jQuery('.property-card-slider').length) {
        jQuery('.property-card-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true
        });
    }
});

window.onload = function () {
    jQuery('.single-load-content').addClass('hide');
    jQuery('.single-content').removeClass('not-active');
    setTimeout (function() {
        jQuery('.communication').removeClass('not-active');
    }, 1000);
};
