{{--<div class="languages-block languages-block-desctope">
    <div class="selected-language">
        <a href="#">{{ app()->getLocale() }}</a>
    </div>
    <div class="list-languages">
        <div class="list-languages-container">
        @foreach (app('locale')->getLanguagesAvailable() as $lang)
            <a href="{{ app('locale')->getLocaleUrl($lang) }}">{{ $lang }}</a>
        @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function (e) {
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
    });

</script>
--}}
