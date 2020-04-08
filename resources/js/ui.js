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

    jQuery('a.collapse').click(function(e) {
        e.preventDefault();
        var parent = jQuery(this).closest('.property-card');
        jQuery(parent).toggleClass('collapse');
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

});
