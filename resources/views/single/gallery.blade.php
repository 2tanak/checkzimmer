@if (count($hotel->photos()) >= 4)
    <div class="single-gallery">
        <div class="big-photo">
            <a class="open-gallery" href="#"><img src="{{ $hotel->photoMain()['url_original'] }}" alt="alt"></a>
        </div>
        <div class="small-photo">
            @foreach ($hotel->photos() as $key => $photo)
                @if ($key == 3 && count($hotel->photos())+1 > 5)
                    <a class="open-gallery amount-photo" href="#">
                        <img src="{{ $photo['url_max300'] }}" alt="alt">
                        <div class="number-photos">+{{ count($hotel->photos()) - 5 + 1 }} {{ __('photo') }}</div>
                    </a>
                @else
                    <a class="open-gallery" href="#" {{ $key }}><img src="{{ $photo['url_max300'] }}" alt="Фото отеля {{ $key }}"></a>
                @endif
                @if ($key == 3)
                    @break;
                @endif
            @endforeach
        </div>
        @include('single.favorites-button')
    </div>
@elseif (count($hotel->photos()) == 3)
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
        @include('single.favorites-button')
    </div>
@elseif (count($hotel->photos()) == 2)
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
        @include('single.favorites-button')
    </div>
@elseif (count($hotel->photos()) == 1 && $hotel->photoMain() != null)
    <div class="single-gallery option-four">
        <div class="big-photo"><a class="open-gallery" href="#"><img src="{{ $hotel->photoMain()['url_max300'] }}" alt="alt"></a></div>
        <div class="big-photo"><a class="open-gallery" href="#"><img src="{{ $hotel->photos()[0]['url_max300'] }}" alt="alt"></a></div>
        @include('single.favorites-button')
    </div>
@elseif (count($hotel->photos()) == 0 && $hotel->photoMain() == null)
    <div class="no-photo">
        <div class="no-photo-small">
            <svg width="48" height="22" viewBox="0 0 48 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.375 5.8125L0.75 21.3125H47.25L33.6875 0L22.0625 15.5L12.375 5.8125Z" fill="#EDEDEF"/>
            </svg>
        </div>
        @include('single.favorites-button')
    </div>
@else
<div class="single-gallery option-one">
    <div class="big-photo"><a class="open-gallery" href="#"><img src="{{ $hotel->photoMain()['url_original'] }}" alt="alt"></a></div>
    @include('single.favorites-button')
</div>
@endif

