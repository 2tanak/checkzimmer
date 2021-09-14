@include('partials.button-favorites', ['hotel' => $hotel])

@if ($hotel->getCurrentOption('superhost') == 1)
    <div class="superhost-icon">{{ __('Superhost') }}</div>
@endif
@if (count($hotel->photos()) || $hotel->photoMain())
<div class="single-main-slider">
    <div class="main-slider-item">
        <a class="open-gallery" href="#">
            {{--<img src="{{ $hotel->photoMain()['url_original'] }}" alt="alt">--}}
            @include('partials.picture', ['src' => $hotel->photoMain()['url_original'], 'mode' => 'full'])
        </a>
    </div>
    @foreach ($hotel->photos() as $key => $photo)
        <div class="main-slider-item">
            <a class="open-gallery" href="#">
                {{--<img src="{{ $photo['url_original'] }}" alt="alt">--}}
                @include('partials.picture', ['src' => $photo['url_original'], 'mode' => 'full'])
            </a>
        </div>
    @endforeach
</div>
@endif
