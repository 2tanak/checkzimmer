<div class="single-main-slider">
    @foreach ($hotel->photos() as $key => $photo)
        <div class="main-slider-item"><a class="open-gallery" href="#"><img src="{{ $photo['url_original'] }}" alt="alt"></a></div>
    @endforeach
</div>
