<picture>
    <source srcset="{{
                str_replace(['http:', 'https:'], '',
                str_replace('uploaded', $mode == '500' ? 'small500' : ( $mode == '300' ? 'thumbs300' : 'uploaded'),
                str_replace( ['.jpeg', '.jpg', '.png'], '.webp', str_replace('/images', '/images/webp', $src) )))
             }}" type="image/webp">
    <source srcset="{{ str_replace(['http:', 'https:'], '',
        $mode == '500' ? str_replace('uploaded', 'small500', $src) : $src) }}" type="image/jpeg">
    <img src="{{ str_replace(['http:', 'https:'], '',
        $mode == '500' ? str_replace('uploaded', 'small500', $src) : $src) }}" alt="">
</picture>
