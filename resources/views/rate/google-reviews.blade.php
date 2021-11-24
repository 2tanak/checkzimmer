<section class="google-reviews-section">
    <h2>{{ __('Google reviews') }}</h2>
    <div class="subtitle-reviews">{{ __('We are always there and ready to help, resolve any negative or conflict situation') }}.</div>

    @include('rate.real-rating')
    @include('rate.reviews')

    <a class="all-reviews" href="http://g.page/dkn-monteurzimmer/review?rc" target="_blank">{{ __('Read all reviews') }}</a>
</section>
