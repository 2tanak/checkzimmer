<picture>
    <source srcset="{{
                str_replace( ['.jpeg', '.jpg', '.png'], '.webp', str_replace('uploaded', 'webp', $src) )
             }}" type="image/webp">
    <source srcset="{{ $mode == '500' ? str_replace('uploaded', 'small500', $src) : $src }}" type="image/jpeg">
    <img src="{{ $mode == '500' ? str_replace('uploaded', 'small500', $src) : $src }}" alt="">
</picture>
