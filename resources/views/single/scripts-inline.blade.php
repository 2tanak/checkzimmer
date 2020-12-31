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
    })
</script>
