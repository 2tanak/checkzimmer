<script>
    document.addEventListener('DOMContentLoaded', function() {
        /*jQuery.get('/api/questions?page=1', function(resp) {
            console.log(resp)
            jQuery('[href="#reviews"] > span').text(resp.total)
        })
        jQuery.get('/api/reviews?page=1', function(resp) {
            console.log(resp)
            jQuery('[href="#reviews"] > span').text(resp.total)
        })*/
        jQuery('.open-gallery').click(function() {
            setTimeout( function() {
                jQuery('.slick-track .slick-active').focus();
            }, 200 );
        });
        jQuery('.comfort a.comfort-collapse-link').click(function(e) {
            e.preventDefault();
            var maxHeight = jQuery('.comfort-block').css('max-height');
            if (!maxHeight || maxHeight === 'none') {
                jQuery('.comfort-block').css('max-height', '74px');
                jQuery('.comfort-block').css('overflow', 'hidden');
            } else {
                jQuery('.comfort-block').css('max-height', 'none');
                jQuery('.comfort-block').css('overflow', 'hidden');
            }

        });
        jQuery('.comfort a.comfort-collapse-link span.open-link').click(function (e) {
            e.preventDefault();
            jQuery(this).addClass('not-active')
            jQuery('.comfort a.comfort-collapse-link span.close-link').addClass('active');
        });
        jQuery('.comfort a.comfort-collapse-link span.close-link').click(function (e) {
            e.preventDefault();
            jQuery(this).removeClass('active')
            jQuery('.comfort a.comfort-collapse-link span.open-link').removeClass('not-active');
        });
    })
</script>
