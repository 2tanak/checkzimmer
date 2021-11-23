@extends('layouts.app-rate')

@section('content')

<section class="rate-section">
        <div class="rate-content">
            <h1>{{ __('Please, rate your experience with Check-Zimmer') }}</h1>
            <div class="subtitle">{{ __('You ive given your host an overall rating. Let them know how they did in these areas too so they have a better idea of what went well and how they can improve') }}.</div>
            <div id="application"></div>
            @include('rate.rating')
            @include('rate.command')
            @include('rate.google-reviews')

            @include('rate.thanks-modal')

        </div>
</section>

@endsection
