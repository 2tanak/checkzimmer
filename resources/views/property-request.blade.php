@extends('layouts.app')

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

    <div class="picture-form-block">
        <div class="left-part">
            <img class="left-part-bg" src="/img/left-part-bg.png" alt="">
            <img class="monteur" src="/img/monteur.png" alt="">
        </div>
        <div class="nothing-found-block">
            <div class="title">{{ __('Send request') }}</div>
            @include('single.inquiry-form', ['id' => 0, 'classes' => 'nothing-found-form'])
        </div>
        <div class="right-part"></div>
    </div>

    <div class="advertising">
        <div class="advertising-item">
            <img src="/img/rectangle139.png" alt="">
            <div>
                <div class="advertising-title">
                    {{ __('Who we are and why you can rely on us') }}
                </div>
                <div class="advertising-text">
                    <p>{{ __('Since 2015 we have been your loyal, reliable and competent companion looking for one perfect fitters room. We have 5678 accommodations across Germany') }}.</p>
                    <p>{{ __('Wir sind ein service-orientiertes Unternehmen, bei dem Kundenzufriedenheit oberste Priorität hat') }}.</p>
                    <p style="font-weight:600">{{ __('Whatever we do, we do it for you and with all of our hearts') }}.</p>
                    <p>{{ __('The awareness of our agency is growing steadily, so that we already have an extensive database of landlords, partners and regular customers') }}.</p>
                </div>
            </div>
        </div>

        <div class="advertising-item">
            <div style="text-align:center;max-width:580px;margin:auto;">
                <div class="advertising-title">
                    {{ __('Our team') }}
                </div>
                <div class="advertising-text">
                    <p style="font-weight:600">{{ __('We pull together') }}.</p>
                    <p>{{ __('It is our goal to meet your wishes and needs quickly, efficiently and to your complete satisfaction. We will answer your questions quickly and guarantee an offer tailored to you') }}.</p>
                </div>
            </div>
        </div>

        <div class="advertising-item">
            <img src="/img/rectangle140.png" alt="">
            <div>
                <div class="advertising-title">
                    {{ __('We have made your comfort our main task') }}
                </div>
                <div class="advertising-text">
                    <p>{{ __('All rooms have a TV and WiFi and usually have separate beds. All apartments also have fully equipped kitchens (fridge, oven, stove, cutlery, plates, kettle, etc.). Each employee has a single bed, their own closet and enough space to relax in our accommodation') }}.</p>
                </div>
            </div>
        </div>
    </div>

</section>


@endsection


