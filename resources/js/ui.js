jQuery(document).ready(function() {

    jQuery('.distance').select2();

    jQuery('.property-card-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    jQuery('a.collapse').click(function() {
        jQuery('a.collapse').toggleClass('active');
        jQuery('.property-card').toggleClass('collapse');
    });

    jQuery('a.favorites').click(function() {
        jQuery('a.favorites').toggleClass('heart-active');
    });

    jQuery('.sorting a').click(function() {
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
        jQuery('.property').removeClass('no-map');
    });
    jQuery('.left-block a.list').click(function() {
        jQuery('.property .container').removeClass('active');
        jQuery('.property').removeClass('show-map');
        jQuery('.property').addClass('no-map');
    });

});
