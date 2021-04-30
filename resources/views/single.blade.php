@extends('layouts.app-single')

@section('content')

    @include('css.loader-single')

    <div class="container single-container">
        <div class="single-content not-active">
            <div class="left-part">
                <div class="main-block">
                    <div class="main-top-block">

                        @include('single.slider-single', ['hotel' => $hotel])
                        @include('single.sidebar-modal', ['phoneHide' => $phoneHide])
                        @include('single.gallery', ['hotel' => $hotel])

                        <h1>{{ $hotel->name }}</h1>
                        <div class="additional-information">
                            <div class="mobile-title">{{ __('Reviews') }}</div>
                            @if ($hotel->rate!=null)
                                @include('single.rating', ['rating' => $hotel->rate])
                            @endif
                            @if ($hotel->getCurrentOption('superhost') == 1)
                            <div class="superhost-single">
                                <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="4" cy="10" r="3" fill="#6BB63F"/>
                                    <path d="M8 0H0V3L4 6L8 3V0Z" fill="#6BB63F"/>
                                </svg>
                                <span>{{ __('Superhost') }}</span>
                            </div>
                            @endif
                            <div class="add-time">{{ __('Added') }}: {{ __('in')}} {{ $date }}</div>
                            <div class="viewed">{{ __('Views') }}: {{ $hotel->views }}</div>
                        </div>
                    </div>
                    @include('single.prices-appointments', ['hotel' => $hotel])
                    @include('single.prices-appointments-mobile', ['hotel' => $hotel])
                </div>
                @include('single.features', ['hotel' => $hotel])
                @include('single.description', ['hotel' => $hotel, 'questions' => $questions, 'reviews' => $reviews])
                @include('single.description-modal', ['hotel' => $hotel, 'questions' => $questions, 'reviews' => $reviews])
            </div>
            <div class="right-part">
                <div class="right-part-item">
                    @include('single.sidebar')
                    @include('single.feedback')
                </div>
            </div>
        </div>

        <div class="fixed-bar">
            <a href="#" class="send-inquiry inquiry">{{ __('Send request') }}</a>
            @if (($hotel->getCurrentOption('landlordPhoneNumber') == null) || ($hotel->getCurrentOption('landlordHidePhone') == 1))
                <div class="not-phone">
                    <div class="speaks">{{ __('Object owner speaks') }}:</div>
                    <div class="language-item">{{ $hotel->getCurrentOption('landlordLanguages') ?: 'DE' }}</div>
                </div>
                @else
                <div class="see-number-phone">
                    <span class="number-phone-text">{{ __('Show phone') }}</span>
                    <a class="number-phone phone-hide" href="tel:">{{ $phoneHide }}</a>
                </div>
            @endif
        </div>

        <div class="scroll-top">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.29079 9.28982C1.47816 9.47607 1.73161 9.58061 1.99579 9.58061C2.25998 9.58061 2.51343 9.47607 2.70079 9.28982L7.36079 4.63982C7.37894 4.62238 7.40177 4.61059 7.42649 4.60587C7.45121 4.60116 7.47677 4.60372 7.50007 4.61325C7.52336 4.62278 7.54339 4.63887 7.55772 4.65956C7.57205 4.68025 7.58007 4.70466 7.58079 4.72982V15.5898C7.58079 15.855 7.68615 16.1094 7.87369 16.2969C8.06122 16.4845 8.31558 16.5898 8.58079 16.5898C8.84601 16.5898 9.10036 16.4845 9.2879 16.2969C9.47544 16.1094 9.58079 15.855 9.58079 15.5898V4.71982C9.58152 4.69466 9.58953 4.67025 9.60386 4.64956C9.61819 4.62887 9.63822 4.61278 9.66152 4.60325C9.68481 4.59372 9.71037 4.59116 9.7351 4.59587C9.75982 4.60059 9.78264 4.61238 9.80079 4.62982L14.4608 9.29982C14.6482 9.48607 14.9016 9.59061 15.1658 9.59061C15.43 9.59061 15.6834 9.48607 15.8708 9.29982C16.057 9.11245 16.1616 8.859 16.1616 8.59482C16.1616 8.33063 16.057 8.07718 15.8708 7.88982L9.29079 1.28982C9.10343 1.10357 8.84998 0.999023 8.58579 0.999023C8.32161 0.999023 8.06816 1.10357 7.88079 1.28982L1.29079 7.87982C1.10454 8.06718 1 8.32063 1 8.58482C1 8.849 1.10454 9.10245 1.29079 9.28982Z" fill="#7A8793"/>
            </svg>
        </div>

        @include('single.loader')

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChFeaunpThR-Lo4t-SMP3n7s-fDBs67hU&callback=initMap" async defer></script>
    </div>

    @include('single.scripts-inline')

    <style>
        @media print {
            * {
                margin: 0;
                padding: 0;
            }
            .single-content .sidebar .number-phone .sh_nmr {
                display: none !important;
            }
            .single-content .sidebar .number-phone a {
                text-align: center !important;
            }
            body {
                padding: 0 !important;
                min-width: auto !important;
                background: #ffffff;
            }
            .single-gallery {
                display: none !important;
                margin-bottom: 0 !important;
            }
            .sidebar-bottom {
                display: none !important;
                padding: 0 !important;
                border: 0 !important;
            }
            .single-content .sidebar .address-map {
                margin-bottom: 0 !important;
            }
            .single-load-content {
                display: none !important;
            }
            header {
                display: none !important;
                height: 0 !important;
            }
            footer {
                display: none !important;
            }
            .single-main-slider {
                display: none !important;
            }
            .single-content .favorites {
                display: none !important;
            }
            .single-content .sidebar {
                width: 100% !important;
            }
            .single-content .sidebar a.inquiry {
                display: none !important;
                margin-bottom: 0 !important;
            }
            .single-content {
                padding-top: 0 !important;
            }
            h1 {
                color: black !important;
                font-size: 2.25rem !important;
                font-weight: 500 !important;
                line-height: normal !important;
                display: inline-block !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            .additional-information {
                display: none !important;
                margin-bottom: 0 !important;
                padding-bottom: 0 !important;
            }
            .favorites.favorites-mobile {
                display: none !important;
            }
            .single-content .additional-information .mobile-title {
                display: none !important;
            }
            .superhost-icon {
                display: none !important;
            }
            .main-top-block {
                display: block !important;
            }
            .single-content .bottom-text {
                font-size: 1rem !important;
                color: black !important;
            }
            .single-content .object-description .description-content {
                font-size: 1rem !important;
                color: black !important;
            }
            .single-content .object-description .description-content a.more-details {
                display: none !important;
            }
            .comfort a.comfort-collapse-link {
                display: none !important;
            }
            .nav.nav-tabs {
                display: none; !important;
            }
            .single-content .bottom-text {
                display: none; !important;
            }
            .single-content .mobile-price-situation h2 {
                display: none !important;
            }
            .single-content .mobile-object-description {
                display: none !important;
            }
            .single-content .comfort {
                margin-bottom: 0 !important;
                padding: 0 !important;
            }
            .single-content .object-description-desctope .description-content {
                padding-top: 0 !important;
            }
            .single-content .main-block {
                margin-bottom: 0 !important;
                padding: 0 !important;
            }
            .single-content .object-description .nav-tabs .nav-link {
                padding-bottom: 0 !important;
            }
            .single-content .object-description-desctope {
                padding: 0 !important;
            }
            .single-content .add-time {
                display: none !important;
                padding: 0 !important;
                margin: 0 !important;
                font-size: 0 !important;
                line-height: 0 !important;
            }
            .single-content .viewed {
                display: none !important;
                padding: 0 !important;
                margin: 0 !important;
                font-size: 0 !important;
                line-height: 0 !important;
            }
            .single-content .sidebar {
                padding: 0 !important;
                margin: 0 !important;
            }
            .desctop-sidebar {
                display: flex !important;
                justify-content: space-between !important;
                align-items: center !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            .mobile-sidebar {
                display: none !important;
                margin: 0 !important;
                padding: 0 !important;
            }
            .single-content {
                display: flex !important;
                flex-direction: column-reverse !important;
            }
            .single-content .sidebar .sidebar-top {
                padding: 0 !important;
                margin-bottom: 0 !important;
                margin-right: 25px !important;
                border: 0;
            }
            .sidebar-middle {
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
            }
            .single-content .sidebar .sidebar-middle .price {
                margin: 0 !important;
                align-items: center !important;
            }
            .single-content .sidebar .number-phone {
                margin: 0 !important;
                width: 300px !important;
            }
            .single-content .sidebar .address-map .map-container {
                display: none !important;
            }
            .single-content .sidebar .address-map .address {
                font-size: 1.1rem !important;
                margin-left: 25px !important;
            }
            .single-content .sidebar .sidebar-middle .left,
            .single-content .sidebar .sidebar-middle .right {
                font-size: 1.1rem !important;
            }
            .single-content .sidebar .number-phone {
                margin-bottom: 0 !important;
            }
            .single-content .sidebar .sidebar-middle .right {
                width: 110px !important;
                margin-right: 25px !important;
            }
            .single-content .sidebar .number-phone a {
                font-size: 1.3rem !important;
            }
            .single-content .sidebar .sidebar-top-block .title {
                font-size: 1.1rem !important;
            }
            .single-content .sidebar .sidebar-top-block .subtitle {
                font-size: 1.1rem !important;
            }
            .single-content .sidebar .sidebar-top-block img {
                width: 20px !important;
            }
            .single-content .sidebar .sidebar-top-block {
                align-items: center !important;
            }
            .roominess {
                margin-right: 25px !important;
            }
            .quality {
                padding: 0 !important;
                margin: 0 !important;
            }
            .sidebar-small-block {
                padding: 0 !important;
                margin: 0 !important;
            }
            .inquiry-modal {
                padding: 0 !important;
                margin: 0 !important;
                display: none !important;
            }
            .modal-overlay {
                padding: 0 !important;
                margin: 0 !important;
                display: none !important;
            }
            .main-top-block {
                padding-left: 0 !important;
                padding-right: 0 !important;
                padding-bottom: 0 !important;
                margin-left: 0 !important;
                margin-right: 0 !important;
                margin-bottom: 0 !important;
            }
        }
    </style>

@endsection
