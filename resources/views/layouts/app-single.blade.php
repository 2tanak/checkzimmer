<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,500,600,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="property-list">
    <header>
        <div class="container">
            <div class="header-content">
                <div class="mobile-button">
                    <input type="checkbox" id="checkbox-item" class="checkbox visuallyHidden">
                    <label for="checkbox-item" class="hamburger-label">
                        <div class="hamburger hamburger-item">
                            <span class="bar bar1"></span>
                            <span class="bar bar2"></span>
                            <span class="bar bar3"></span>
                            <span class="bar bar4"></span>
                            <span class="bar bar5"></span>
                        </div>
                    </label>
                </div>
                <a class="head-logo" href="{{ url('/list') }}">
                    <img src="/img/head-logo.png" alt="Logo" class="head-logo-img">
                    Immobilien.de
                </a>
                <div class="head-search">
                    <img src="/svg/i-search-input.svg" alt="alt">
                    <input type="search" placeholder="Введите город почтовый индекс или регион">
                </div>
                <div class="main-menu">
                    <ul>
                        <li>
                            <a href="#">
                                <img class="normal" src="/svg/i-favourites-header.svg" alt="Favourites">
                                <img class="hover" src="/svg/i-favourites-hover.svg" alt="Favourites">
                                Фавориты <span>(1)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img class="normal" src="/svg/i-rent-header.svg" alt="Аренда Жилья">
                                <img class="hover" src="/svg/i-rent-hover.svg" alt="Аренда Жилья">
                                Сдать жилье
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="mobile-accaunt personal-area-link"><img src="/svg/i-account-mobile.svg" alt="mobile-accaunt"></a>
            </div>
        </div>

        <div class="mobile-menu">
            <ul>
                <li>
                    <a href="#">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.1614 9.97563C16.597 8.4996 16.597 6.10223 15.1614 4.6262C13.7316 3.1561 11.4179 3.1561 9.98803 4.6262L9.27309 5.36128C9.12351 5.51507 8.87649 5.51507 8.72691 5.36128L8.01197 4.6262C6.58214 3.1561 4.26843 3.1561 2.8386 4.6262C1.40301 6.10223 1.40301 8.4996 2.8386 9.97563L9 16.3106L15.1614 9.97563ZM9.44185 4.09498C11.1708 2.3173 13.9786 2.3173 15.7076 4.09498C17.4308 5.86675 17.4308 8.73508 15.7076 10.5068L9.27309 17.1226C9.12351 17.2764 8.87649 17.2764 8.72691 17.1226L2.29242 10.5068C0.569193 8.73508 0.569193 5.86675 2.29242 4.09498C4.02141 2.3173 6.82916 2.3173 8.55815 4.09498L9 4.54928L9.44185 4.09498Z" fill="#7A8793" stroke="#7A8793" stroke-width="0.2"/>
                        </svg>
                        Фавориты <span>(1)</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.6667 16.2381H13.5714C14.2026 16.2381 14.7143 15.7264 14.7143 15.0952V7.17201C14.7143 7.13056 14.7209 7.09066 14.7331 7.0533L9 1.89347L3.26686 7.0533C3.2791 7.09066 3.28572 7.13056 3.28572 7.17201V15.0952C3.28572 15.7264 3.79739 16.2381 4.42857 16.2381H6.33334V13.5714C6.33334 12.5195 7.18613 11.6667 8.2381 11.6667H9.76191C10.8139 11.6667 11.6667 12.5195 11.6667 13.5714V16.2381ZM15.4762 7.72204V15.0952C15.4762 16.1472 14.6234 17 13.5714 17H4.42857C3.3766 17 2.52381 16.1472 2.52381 15.0952V7.72204L1.6358 8.52126C1.47941 8.662 1.23854 8.64932 1.0978 8.49294C0.95705 8.33655 0.969727 8.09568 1.12611 7.95494L8.74516 1.09779C8.89003 0.967402 9.10997 0.967402 9.25484 1.09779L16.8739 7.95494C17.0303 8.09568 17.043 8.33655 16.9022 8.49294C16.7615 8.64932 16.5206 8.662 16.3642 8.52126L15.4762 7.72204ZM10.9048 13.5714C10.9048 12.9402 10.3931 12.4286 9.76191 12.4286H8.2381C7.60692 12.4286 7.09524 12.9402 7.09524 13.5714V16.2381H10.9048V13.5714Z" fill="#7A8793" stroke="#7A8793" stroke-width="0.2"/>
                        </svg>
                        Сдать жилье
                    </a>
                </li>
            </ul>
            <a class="whatsapp-number" href="tel:+49 341 1234 2223">
                <img src="/svg/whatsapp-mobile.svg" alt="Whatsapp">
                +49 341 1234 2223
            </a>
        </div>

    </header>

    <main class="py-4">
        @yield('content')
    </main>

</div>

<footer id="main-footer">
    <div class="container">
        <div class="footer-content">
            <a class="footer-logo" href="/list">
                <img class="footer-logo-img" src="/img/footer-logo.png" alt="Logotip">
                Immobilien.de
            </a>
            <ul class="footer-menu">
                <li><a href="#">Datenschutz</a></li>
                <li><a href="#">Impressum</a></li>
            </ul>
            <div class="copyright">
                Copyright 2020 Immobilien.de LLC All rights reserved.
            </div>
        </div>
    </div>



    <div class="modal-overlay">
        <div class="inquiry-modal">
            <div class="modal-close">
                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z" fill="#545769"/>
                </svg>
            </div>
            <div class="title">Отправить запрос</div>
            <form>
                <div class="input-block-item">
                    <input id="company" type="text">
                    <label for="company">Название компании</label>
                </div>
                <div class="input-block-item">
                    <input id="name" type="text">
                    <label for="name">Имя и Фамилия*</label>
                </div>
                <div class="input-block-item">
                    <input id="email" type="email">
                    <label for="email">Email*</label>
                </div>
                <div class="input-block-item">
                    <input id="telephone" type="tel">
                    <label for="telephone">Номер телефона*</label>
                </div>
                <div class="select-block">
                    <select id="number-persons">
                        <option>1 человек</option>
                        <option>2 человека</option>
                        <option>3 человека</option>
                        <option>4 человека</option>
                        <option>5 человек</option>
                        <option>6 человек</option>
                    </select>
                    <label for="number-persons">Количество человек</label>
                </div>
            </form>
        </div>
    </div>


</footer>

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('js/select2.full.js') }}" defer></script>
<script src="{{ asset('js/slick.min.js') }}" defer></script>
<script src="{{ asset('js/ui.js') }}" defer></script>

</body>
</html>
