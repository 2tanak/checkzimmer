@if (count($hotel->photos()) >= 5)
    <div class="single-gallery">
        <div class="big-photo">
            <a class="open-gallery" href="#"><img src="{{ $hotel->photoMain()['url_original'] }}" alt="alt"></a>
        </div>
        <div class="small-photo">
            @foreach ($hotel->photos() as $key => $photo)
                @if ($key == 3 && count($hotel->photos()) > 5)
                    <a class="open-gallery amount-photo" href="#">
                        <img src="{{ $photo['url_max300'] }}" alt="alt">
                        <div class="number-photos">+{{ count($hotel->photos()) - 5 }} {{ __('photo') }}</div>
                    </a>
                @else
                    <a class="open-gallery" href="#" {{ $key }}><img src="{{ $photo['url_max300'] }}" alt="Фото отеля {{ $key }}"></a>
                @endif
                @if ($key == 3)
                    @break;
                @endif
            @endforeach
        </div>
        <a href="#" class="favorites">
            <svg class="favorites-usual" width="12" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.6211 5.98172C12.6977 4.8747 12.6977 3.07667 11.6211 1.96965C10.5487 0.867074 8.8134 0.867074 7.74102 1.96965L7.20482 2.52096C7.09263 2.6363 6.90737 2.6363 6.79518 2.52096L6.25898 1.96965C5.1866 0.867074 3.45132 0.867074 2.37895 1.96965C1.30226 3.07667 1.30226 4.8747 2.37895 5.98172L7 10.7329L11.6211 5.98172ZM7.33139 1.57124C8.62813 0.237973 10.7339 0.237973 12.0307 1.57124C13.3231 2.90006 13.3231 5.05131 12.0307 6.38013L7.20482 11.3419C7.09263 11.4573 6.90737 11.4573 6.79518 11.3419L1.96932 6.38013C0.676895 5.05131 0.676895 2.90006 1.96932 1.57124C3.26606 0.237973 5.37187 0.237973 6.66861 1.57124L7 1.91196L7.33139 1.57124Z" fill="#333646" stroke="#333646" stroke-width="0.2"/>
            </svg>
            <svg class="favorites-active" width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.1 1.5c-.6-.7-1.5-1-2.4-1-.9 0-1.8.4-2.4 1l-.3.3-.3-.3C6.1.8 5.2.5 4.3.5c-.9 0-1.8.4-2.4 1C.6 2.9.6 5.1 1.9 6.4l4.8 5c.1.1.2.1.3.1.1 0 .2 0 .3-.1l4.8-5c1.3-1.3 1.3-3.5 0-4.9z" fill="#EE483F"/>
            </svg>
        </a>
    </div>
@elseif (count($hotel->photos()) == 4)
    <div class="single-gallery option-two">
        <div class="big-photo"><a class="open-gallery" href="#"><img src="{{ $hotel->photoMain()['url_original'] }}" alt="alt"></a></div>
        <div class="middle-photo">
            <a class="open-gallery" href="#"><img src="{{ $hotel->photos()[0]['url_original']  }}" alt="alt"></a>
        </div>
        <div class="small-photo">
            @for ($i=1; $i<3; $i++)
                <a class="open-gallery" href="#"><img src="{{ $hotel->photos()[$i]['url_original'] }}" alt="alt"></a>
            @endfor
        </div>
        <a href="#" class="favorites">
            <svg class="favorites-usual" width="12" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.6211 5.98172C12.6977 4.8747 12.6977 3.07667 11.6211 1.96965C10.5487 0.867074 8.8134 0.867074 7.74102 1.96965L7.20482 2.52096C7.09263 2.6363 6.90737 2.6363 6.79518 2.52096L6.25898 1.96965C5.1866 0.867074 3.45132 0.867074 2.37895 1.96965C1.30226 3.07667 1.30226 4.8747 2.37895 5.98172L7 10.7329L11.6211 5.98172ZM7.33139 1.57124C8.62813 0.237973 10.7339 0.237973 12.0307 1.57124C13.3231 2.90006 13.3231 5.05131 12.0307 6.38013L7.20482 11.3419C7.09263 11.4573 6.90737 11.4573 6.79518 11.3419L1.96932 6.38013C0.676895 5.05131 0.676895 2.90006 1.96932 1.57124C3.26606 0.237973 5.37187 0.237973 6.66861 1.57124L7 1.91196L7.33139 1.57124Z" fill="#333646" stroke="#333646" stroke-width="0.2"/>
            </svg>
            <svg class="favorites-active" width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.1 1.5c-.6-.7-1.5-1-2.4-1-.9 0-1.8.4-2.4 1l-.3.3-.3-.3C6.1.8 5.2.5 4.3.5c-.9 0-1.8.4-2.4 1C.6 2.9.6 5.1 1.9 6.4l4.8 5c.1.1.2.1.3.1.1 0 .2 0 .3-.1l4.8-5c1.3-1.3 1.3-3.5 0-4.9z" fill="#EE483F"/>
            </svg>
        </a>
    </div>
@elseif (count($hotel->photos()) == 3)
    <div class="single-gallery option-three">
        <div class="big-photo"><a class="open-gallery" href="#"><img src="{{ $hotel->photoMain()['url_original'] }}" alt="alt"></a></div>
        <div class="middle-photo">
            <a class="open-gallery" href="#"><img src="{{ $hotel->photos()[0]['url_original'] }}" alt="alt"></a>
        </div>
        <div class="middle-photo radius">
            <a class="open-gallery amount-photo" href="#">
                <img src="{{ $hotel->photos()[1]['url_original'] }}" alt="alt">
            </a>
        </div>
        <a href="#" class="favorites">
            <svg class="favorites-usual" width="12" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.6211 5.98172C12.6977 4.8747 12.6977 3.07667 11.6211 1.96965C10.5487 0.867074 8.8134 0.867074 7.74102 1.96965L7.20482 2.52096C7.09263 2.6363 6.90737 2.6363 6.79518 2.52096L6.25898 1.96965C5.1866 0.867074 3.45132 0.867074 2.37895 1.96965C1.30226 3.07667 1.30226 4.8747 2.37895 5.98172L7 10.7329L11.6211 5.98172ZM7.33139 1.57124C8.62813 0.237973 10.7339 0.237973 12.0307 1.57124C13.3231 2.90006 13.3231 5.05131 12.0307 6.38013L7.20482 11.3419C7.09263 11.4573 6.90737 11.4573 6.79518 11.3419L1.96932 6.38013C0.676895 5.05131 0.676895 2.90006 1.96932 1.57124C3.26606 0.237973 5.37187 0.237973 6.66861 1.57124L7 1.91196L7.33139 1.57124Z" fill="#333646" stroke="#333646" stroke-width="0.2"/>
            </svg>
            <svg class="favorites-active" width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.1 1.5c-.6-.7-1.5-1-2.4-1-.9 0-1.8.4-2.4 1l-.3.3-.3-.3C6.1.8 5.2.5 4.3.5c-.9 0-1.8.4-2.4 1C.6 2.9.6 5.1 1.9 6.4l4.8 5c.1.1.2.1.3.1.1 0 .2 0 .3-.1l4.8-5c1.3-1.3 1.3-3.5 0-4.9z" fill="#EE483F"/>
            </svg>
        </a>
    </div>
@elseif (count($hotel->photos()) == 2)
    <div class="single-gallery option-four">
        <div class="big-photo"><a class="open-gallery" href="#"><img src="{{ $hotel->photos()[0]['url_max300'] }}" alt="alt"></a></div>
        <div class="big-photo"><a class="open-gallery" href="#"><img src="{{ $hotel->photos()[1]['url_max300'] }}" alt="alt"></a></div>
    </div>
@elseif (count($hotel->photos()) == 1 && $hotel->photoMain() != null)
    <div class="single-gallery option-four">
        <div class="big-photo"><a class="open-gallery" href="#"><img src="{{ $hotel->photoMain()['url_max300'] }}" alt="alt"></a></div>
        <div class="big-photo"><a class="open-gallery" href="#"><img src="{{ $hotel->photos()[0]['url_max300'] }}" alt="alt"></a></div>
    </div>
@elseif (count($hotel->photos()) == 0 && $hotel->photoMain() == null)
    <div class="no-photo">
        <div class="no-photo-small">
            <svg width="48" height="22" viewBox="0 0 48 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.375 5.8125L0.75 21.3125H47.25L33.6875 0L22.0625 15.5L12.375 5.8125Z" fill="#EDEDEF"/>
            </svg>
        </div>
    </div>
@else
<div class="single-gallery option-one">
    <div class="big-photo"><a class="open-gallery" href="#"><img src="{{ $hotel->photoMain()['url_original'] }}" alt="alt"></a></div>
</div>
@endif

