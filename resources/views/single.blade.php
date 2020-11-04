@extends('layouts.app-single')

@section('content')

    @include('css.loader-single')

    <div class="container single-container">
        <div class="single-content not-active">
            <div class="left-part">
                <div class="main-block">
                    <div class="main-top-block">
                        @include('single.slider-single', ['hotel' => $hotel])
                        @include('single.sidebar')
                        @include('single.gallery', ['hotel' => $hotel])

                        <h1>{{ $hotel->name }}</h1>
                        <div class="additional-information">
                            <div class="mobile-title">Bewertungen</div>
                            @include('single.rating', ['rating' => $hotel->rate])
                            <div class="add-time">Добавлено: в {{ date('H:i, j F Y', strtotime($hotel->created_at)) }}</div>
                            <div class="viewed">Просмотры: {{ $hotel->views }}</div>
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
                    @include('single.sidebar-desktop')
                    @include('single.feedback')
                </div>
            </div>
        </div>

        <div class="fixed-bar">
            <a href="#" class="send-inquiry inquiry">Отправить запрос</a>
            <a href="#" class="see-number-phone">Показать телефон</a>
        </div>

        <div class="scroll-top">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.29079 9.28982C1.47816 9.47607 1.73161 9.58061 1.99579 9.58061C2.25998 9.58061 2.51343 9.47607 2.70079 9.28982L7.36079 4.63982C7.37894 4.62238 7.40177 4.61059 7.42649 4.60587C7.45121 4.60116 7.47677 4.60372 7.50007 4.61325C7.52336 4.62278 7.54339 4.63887 7.55772 4.65956C7.57205 4.68025 7.58007 4.70466 7.58079 4.72982V15.5898C7.58079 15.855 7.68615 16.1094 7.87369 16.2969C8.06122 16.4845 8.31558 16.5898 8.58079 16.5898C8.84601 16.5898 9.10036 16.4845 9.2879 16.2969C9.47544 16.1094 9.58079 15.855 9.58079 15.5898V4.71982C9.58152 4.69466 9.58953 4.67025 9.60386 4.64956C9.61819 4.62887 9.63822 4.61278 9.66152 4.60325C9.68481 4.59372 9.71037 4.59116 9.7351 4.59587C9.75982 4.60059 9.78264 4.61238 9.80079 4.62982L14.4608 9.29982C14.6482 9.48607 14.9016 9.59061 15.1658 9.59061C15.43 9.59061 15.6834 9.48607 15.8708 9.29982C16.057 9.11245 16.1616 8.859 16.1616 8.59482C16.1616 8.33063 16.057 8.07718 15.8708 7.88982L9.29079 1.28982C9.10343 1.10357 8.84998 0.999023 8.58579 0.999023C8.32161 0.999023 8.06816 1.10357 7.88079 1.28982L1.29079 7.87982C1.10454 8.06718 1 8.32063 1 8.58482C1 8.849 1.10454 9.10245 1.29079 9.28982Z" fill="#7A8793"/>
            </svg>
        </div>

        @include('single.loader')

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChFeaunpThR-Lo4t-SMP3n7s-fDBs67hU&callback=initMap" async defer></script>
    </div>

    @include('single.grecaptcha')
    @include(('single.styles-inline'))

@endsection
