@extends('layouts.app-nothing-found')

@section('content')

<section class="nothing-found-section">
    <div class="nothing-found-container">
        <div class="nothing-found-content">

            <h1 class="desktop-title">{{ __('Nothing found') }}!</h1>
            <h1 class="mobile-title">{{ __('Sie suchen - wir finden') }}</h1>

            <div class="description-text">
                <span>{{ __("We ALWAYS have suitable accommodations for you in every city in Germany. Our professional team takes care of all the work and finds the right accommodation for you!") }}.</span>
            </div>

            @include('inquiry.team')

            @include('inquiry.contact')

        </div>
    </div>

    @include('inquiry.picture-form-block')

    @include('inquiry.advertising')

</section>


@endsection


