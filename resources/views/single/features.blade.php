<div class="comfort">
    <h2>{{ __('Features') }}</h2>
    <div class="comfort-block">
        @foreach($hotel->featureCategories() as $featureCategory)
            <h3>{{ $featureCategory['name'] }}</h3>
            <div class="row">
                @foreach($hotel->featuresByCat($featureCategory['id']) as $feature)
                <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                    <img src="{{ $feature['picture'] }}" alt="{{ $feature['name'] }}">
                    <span>{{ $feature->tName() }}</span>
                </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <a class="comfort-collapse-link" data-toggle="collapse" href="#comfort-collapse" role="button" aria-expanded="false" aria-controls="comfort-collapse">
        {{ __('Show all amenities') }}
        <img src="/svg/i-arrow-show-more.svg" alt="alt">
    </a>
</div>
