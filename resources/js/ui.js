jQuery(document).ready(function() {

    jQuery('#distance-select').select2();

    jQuery('#number-personse').select2();

    jQuery(function () {
        jQuery('[data-toggle="tooltip"]').tooltip()
    });

    jQuery(window).on('load', function() {
        jQuery('.property-card-slider').css({'opacity': 1, 'transition-duration': '0.2s'})
    });

    jQuery('.property-card-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        responsive: [
            {
                breakpoint: 1041,
                settings: "unslick"
            }
        ]
    });

    jQuery('a.collapse-circle').click(function(e) {
        e.preventDefault();
        var parent = jQuery(this).closest('.property-card');
        jQuery(parent).toggleClass('collapse-item');
        jQuery(this).toggleClass('active');
    });

    jQuery('a.favorites').click(function(e) {
        e.preventDefault();
        jQuery(this).toggleClass('active');
    });

    jQuery('.sorting a').click(function(e) {
        e.preventDefault();
        jQuery('.sorting').toggleClass('up');
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

    jQuery('.modal-block input').focus(function () {
        var parent = jQuery(this).closest('.input-block');
        jQuery(parent).find('label').addClass('active');
    });

    jQuery('.modal-block input').blur(function () {
        var value = jQuery(this).val();
        var parent = jQuery(this).closest('.input-block');
        if (value === '') {
            jQuery('label').removeClass('active');
            jQuery(parent).find('label').css('display','inline-block');
            jQuery(parent).find('input').css('padding-top','26px');
            jQuery(parent).find('input').css('padding-bottom','13px');
        } else {
            jQuery(parent).find('label').css('display','none');
            jQuery(parent).find('input').css('padding-top','0');
            jQuery(parent).find('input').css('padding-bottom','0');
        }
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
        jQuery('.modal-overlay').addClass('active');
    });

    jQuery('a.forgot-password').click(function (e) {
        e.preventDefault();
        jQuery('.modal-login').addClass('active');
        jQuery('.modal-forgot-password').addClass('active');
    });

    jQuery('a.forgot-password-link').click(function (e) {
        e.preventDefault();
        jQuery('.modal-forgot-password').removeClass('active');
        jQuery('.modal-success').addClass('active');
    });

    jQuery('.modal-close').click(function () {
        jQuery('.modal-overlay').removeClass('active');
        jQuery('.modal-block').removeClass('active');
    });

    jQuery('.login-link').click(function (e) {
        e.preventDefault();
        var value = jQuery(this).val();
        if (value === '') {
            jQuery('input').addClass('error');
            jQuery('.error-text').addClass('active')
        }
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

});
