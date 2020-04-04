<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,500,600,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="property-list">
        <div class="property-list-head">
            <div class="container">
                <div class="property-list-head-content">
                    <a href="{{ url('/list') }}">
                        <img src="/img/head-logo.png" alt="Logo">
                    </a>
                    <div class="property-list-head-menu">
                        <ul>
                            <li>
                                <a href="#">
                                    <img class="normal" src="/svg/i-favourites.svg" alt="Favourites">
                                    <img class="hover" src="/svg/i-favourites-hover.svg" alt="Favourites">
                                    <img class="active" src="/svg/i-favourites-active.svg" alt="Favourites">
                                    Фавориты <span>(1)</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="normal" src="/svg/i-rent.svg" alt="Аренда Жилья">
                                    <img class="hover" src="/svg/i-rent-hover.svg" alt="Аренда Жилья">
                                    Сдать жилье
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="normal" src="/svg/i-account.svg" alt="Аренда Жилья">
                                    <img class="hover" src="/svg/i-account-hover.svg" alt="Аренда Жилья">
                                    Личный Кабинет
                                </a>
                            </li>
                        </ul>
                    </div>
                    <a class="whatsapp-number" href="tel:+49 341 1234 2223">
                        <svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d)">
                                <path d="M27.36 4.599C24.32 1.66 20.32 0 16.06 0 3.833 0-3.844 13.247 2.261 23.784L0 32l8.447-2.203c3.68 1.988 6.694 1.812 7.621 1.93 14.177 0 21.235-17.152 11.272-27.076l.02-.052z" fill="#fff"/>
                                <path d="M16.09 29.001L16.08 29h-.021c-4.243 0-6.953-2.01-7.22-2.125l-5 1.3 1.34-4.86-.319-.5A13.158 13.158 0 012.84 15.8c0-11.724 14.326-17.587 22.617-9.3 8.27 8.2 2.464 22.5-9.368 22.5z" fill="#4CAF50"/>
                                <path d="M23.343 19.076l-.012.1c-.401-.2-2.356-1.156-2.72-1.288-.817-.303-.587-.048-2.156 1.75-.233.26-.465.28-.861.1-.4-.2-1.685-.62-3.205-1.98-1.183-1.06-1.978-2.36-2.213-2.76-.39-.675.427-.771 1.17-2.18.134-.28.066-.5-.033-.698-.1-.2-.896-2.16-1.229-2.941-.32-.78-.65-.68-.896-.68-.768-.067-1.33-.056-1.824.458-2.152 2.366-1.61 4.806.232 7.4 3.619 4.736 5.547 5.608 9.072 6.819.952.303 1.82.26 2.507.161.765-.121 2.356-.961 2.688-1.901.34-.94.34-1.72.24-1.9-.099-.18-.36-.28-.76-.46z" fill="#FAFAFA"/>
                            </g>
                            <defs>
                                <filter id="filter0_d" x="0" y="0" width="32" height="33" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                    <feOffset dy="1"/><feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.16 0"/>
                                    <feBlend in2="BackgroundImageFix" result="effect1_dropShadow"/><feBlend in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                                </filter>
                            </defs>
                        </svg>
                        +49 341 1234 2223
                    </a>
                </div>
            </div>
        </div>

        <div class="property-list-subhead">
            <div class="container">
                <div class="title">4 быстрых шага к жилью в городе Х</div>
                <div class="subtitle">Обратитесь к нам мы сравним для вас объекты в городе Х и подберем для вас самое оптимальное размещение!</div>
                <div class="property-list-subhead-gallery">
                        <div class="gallery-block step-one">
                            <div class="double-photo">
                                <img class="first-photo" src="/img/hand-with-phone.png" alt="Phone">
                                <div style="width:229px; text-align:center">
                                    <img class="second-photo" src="/img/QR.png" alt="QR-код">
                                    <div class="gallery-block-text">
                                        Открой камеру на телефоне и отсканируй QR-код
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gallery-block step-two">
                            <img class="screen" src="/img/screen1.png" alt="Phone">
                            <div style="width:170px" class="gallery-block-text">
                                Ответь на наши вопросы
                            </div>
                        </div>
                    <div class="gallery-block step-three">
                        <img class="screen" src="/img/screen2.png" alt="Phone">
                        <div style="width:224px" class="gallery-block-text">
                            Получи актуальные предложения в городе
                        </div>
                    </div>
                    <div class="gallery-block step-four">
                        <img class="screen" src="/img/screen3.png" alt="Phone">
                        <div style="width:170px" class="gallery-block-text">
                            Выбери и сразу забронируй
                        </div>
                    </div>
                </div>
                <div class="whatsapp-link">
                    <a class="whatsapp-link-number" href="tel:+49 341 1234 2223">
                        <img src="/svg/whatsapp-big.svg" alt="Whatsapp">
                        +49 341 1234 2223
                    </a>
                    <a class="whatsapp-link-text" href="tel:+49 341 1234 2223">Просто напишите нам в Whatsapp</a>
                </div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer id="main-footer">
        <div class="container">
            <div class="footer-content">
                <a href="/list"><img class="footer-logo" src="/img/footer-logo.png" alt="Logotip"></a>
                <ul class="footer-menu">
                    <li><a href="#">Datenschutz</a></li>
                    <li><a href="#">Impressum</a></li>
                </ul>
                <div class="copyright">
                    Copyright 2020 Immobilien.de LLC All rights reserved.
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{ asset('js/select2.full.js') }}" defer></script>
    <script src="{{ asset('js/slick.min.js') }}" defer></script>
    <script src="{{ asset('js/ui.js') }}" defer></script>

</body>
</html>
