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
    <a class="comfort-collapse-link">
        <span class="open-link">
            {{ __('Show all amenities') }}
            <img src="/svg/i-arrow-show-more.svg" alt="alt">
        </span>
        <span class="close-link">
            {{ __('Hide all amenities') }}
            <img src="/svg/i-arrow-show-more.svg" alt="alt">
        </span>
    </a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if(jQuery(window).width() <= 991) {
            jQuery('.comfort .collapse').removeClass('show');
        }

        jQuery('a.comfort-collapse-link').click(function (e) {
            e.preventDefault();
            jQuery(this).toggleClass('active');
        });
    });
</script>
