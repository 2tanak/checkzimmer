@extends('layouts.app')

@section('content')

<section class="nothing-found-section">
    <div class="nothing-found-container">
        <div class="nothing-found-content">

            <h1>{{ __('Nothing found') }}!</h1>

            <div class="description-text">
                <span>{{ __("Don't waste time researching the internet for hours") }}.</span> <br> <span>{{ __('Our team of fitters has years of experience and the right contacts') }}.</span>
            </div>

            @include('inquiry.team')

            @include('inquiry.contact')

            @include('single.inquiry-form', ['id' => 0, 'classes' => 'nothing-found-form'])

            <div class="fixed-bar">
                <a href="#" class="send-inquiry inquiry"><span>Unverbindliche</span><span>Anfrage</span></a>
                <div class="see-number-phone">
                    <a class="number-phone phone-hide" href="tel:+4915792467400">+49 157 92467400</a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


