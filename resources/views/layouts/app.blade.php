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
                            <li>
                                <a class="personal-area-link" href="#">
                                    <img class="normal" src="/svg/i-account-header.svg" alt="Аренда Жилья">
                                    <img class="hover" src="/svg/i-account-hover.svg" alt="Аренда Жилья">
                                    Личный Кабинет
                                </a>
                            </li>
                        </ul>
                    </div>
                    <a class="whatsapp-number" href="tel:+49 341 1234 2223">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27.36 4.59867C24.32 1.66 20.32 0 16.06 0C3.83333 0 -3.844 13.2467 2.26133 23.784L0 32L8.44667 29.7973C12.1267 31.7853 15.1413 31.6093 16.068 31.7267C30.2453 31.7267 37.3027 14.5747 27.34 4.65067L27.36 4.59867Z" fill="#E8E9EB"/>
                            <path d="M16.0892 29.0011L16.0812 28.9998H16.0598C11.8172 28.9998 9.10651 26.9905 8.83984 26.8745L3.83984 28.1745L5.17984 23.3145L4.86118 22.8145C3.54118 20.7131 2.83984 18.2931 2.83984 15.8011C2.83984 4.07713 17.1665 -1.78554 25.4572 6.50113C33.7278 14.7011 27.9212 29.0011 16.0892 29.0011Z" fill="#4CAF50"/>
                            <path d="M23.3429 19.0759L23.3309 19.1759C22.9295 18.9759 20.9749 18.0199 20.6109 17.8879C19.7935 17.5852 20.0242 17.8399 18.4549 19.6372C18.2215 19.8972 17.9895 19.9172 17.5935 19.7372C17.1935 19.5372 15.9095 19.1172 14.3895 17.7572C13.2055 16.6972 12.4109 15.3972 12.1762 14.9972C11.7855 14.3226 12.6029 14.2266 13.3469 12.8186C13.4802 12.5386 13.4122 12.3186 13.3135 12.1199C13.2135 11.9199 12.4175 9.9599 12.0842 9.17857C11.7642 8.3999 11.4349 8.49857 11.1882 8.49857C10.4202 8.4319 9.85885 8.44257 9.36418 8.95723C7.21218 11.3226 7.75485 13.7626 9.59618 16.3572C13.2149 21.0932 15.1429 21.9652 18.6682 23.1759C19.6202 23.4786 20.4882 23.4359 21.1749 23.3372C21.9402 23.2159 23.5309 22.3759 23.8629 21.4359C24.2029 20.4959 24.2029 19.7159 24.1029 19.5359C24.0042 19.3559 23.7429 19.2559 23.3429 19.0759Z" fill="#FAFAFA"/>
                        </svg>
                        +49 341 1234 2223
                    </a>
                    <a href="#" class="mobile-accaunt personal-area-link"><img src="/svg/i-account-mobile.svg" alt="mobile-accaunt"></a>
                </div>
            </div>

            <div class="mobile-menu">
                <ul>
                    <li>
                        <a href="#">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.63022 4.02565C6.86197 2.20759 3.98938 2.20759 2.22113 4.02565C0.460145 5.83623 0.460145 8.76638 2.22113 10.577L8.65562 17.1927C8.84446 17.3868 9.15632 17.3868 9.34517 17.1927L15.7797 10.577C17.5406 8.76638 17.5406 5.83623 15.7797 4.02565C14.0114 2.20759 11.1388 2.20759 9.37056 4.02565L9.00039 4.40625L8.63022 4.02565ZM2.91067 4.69631C4.30124 3.26658 6.55011 3.26658 7.94067 4.69631L8.65562 5.43139C8.84446 5.62556 9.15632 5.62556 9.34517 5.43139L10.0601 4.69631C11.4507 3.26658 13.6995 3.26658 15.0901 4.69631C16.4879 6.13352 16.4879 8.46909 15.0901 9.9063L9.00039 16.1675L2.91067 9.9063C1.51284 8.46909 1.51284 6.13352 2.91067 4.69631Z" fill="#ffffff"/>
                            </svg>
                            Фавориты <span>(1)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.32213 1.02337C9.13922 0.858747 8.86156 0.858747 8.67865 1.02337L1.05961 7.88051C0.86217 8.0582 0.846165 8.3623 1.02386 8.55974C1.20155 8.75717 1.50565 8.77318 1.70309 8.59549L2.4242 7.94648V15.0951C2.4242 16.2023 3.32177 17.0999 4.42896 17.0999H13.5718C14.679 17.0999 15.5766 16.2023 15.5766 15.0951V7.94648L16.2977 8.59549C16.4951 8.77318 16.7992 8.75717 16.9769 8.55974C17.1546 8.3623 17.1386 8.0582 16.9412 7.88051L9.32213 1.02337ZM3.38611 7.17192C3.38611 7.14315 3.38357 7.11491 3.3787 7.08744L9.00039 2.02791L14.6221 7.08744C14.6172 7.11491 14.6147 7.14315 14.6147 7.17192V15.0951C14.6147 15.6711 14.1478 16.138 13.5718 16.138H11.7671V13.5713C11.7671 12.4641 10.8695 11.5666 9.7623 11.5666H8.23849C7.13129 11.5666 6.23373 12.4641 6.23373 13.5713V16.138H4.42897C3.85301 16.138 3.38611 15.6711 3.38611 15.0951V7.17192ZM7.19563 13.5713C7.19563 12.9954 7.66254 12.5285 8.23849 12.5285H9.7623C10.3383 12.5285 10.8052 12.9954 10.8052 13.5713V16.138H7.19563V13.5713Z" fill="#ffffff"/>
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
                <div class="mobile-underlink-text">Нажмите на кнопку и сделайте прямой запрос по WhatsApp. Сравните цены и доступность из более 150
                    обьектов в городе Х</div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>

        <div class="modal-overlay">

            <div class="modal-block modal-login show">
                <div class="modal-content-item">
                    <div class="modal-close">
                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z" fill="#545769"/>
                        </svg>
                    </div>
                    <div class="title">Войти</div>
                    <form class="modal-form">
                        <div class="text input-block">
                            <div class="input-block-item">
                                <input id="mail-phone" type="text">
                                <label for="mail-phone">Email или номер телефона</label>
                            </div>
                            <div class="error-text">Вы не указали Email</div>
                        </div>
                        <div class="password input-block">
                            <div class="input-block-item">
                                <input id="password" type="password">
                                <label for="password">Пароль</label>
                                <a class="forgot-password desctop-link" href="#">Забыли пароль?</a>
                                <a class="forgot-password mobile-link" href="#">Забыли?</a>
                            </div>
                            <div class="error-text">Вы не указали пароль</div>
                        </div>
                        <a class="entry login-link" href="#">Войти</a>
                    </form>
                    <div class="or">Или</div>
                    <a class="facebook-entry" href="#">
                        <img class="standart" src="/svg/i-facebook-cube.svg" alt="Facebook Icon">
                        <img class="hover" src="/svg/i-facebook-cube-hover.svg" alt="Facebook Icon">
                        Войти через Facebook
                    </a>
                    <div class="new">Новый пользователь? <a href="#">Регестрация</a></div>
                </div>
            </div>

            <div class="modal-block modal-forgot-password">
                <div class="modal-content-item">
                    <div class="modal-close">
                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z" fill="#545769"/>
                        </svg>
                    </div>
                    <div class="title">Восстановление пароля</div>
                    <form>
                        <div class="email input-block">
                            <div class="input-block-item">
                                <input id="mail" type="mail">
                                <label for="mail">Укажите ваш email</label>
                            </div>
                            <div class="error-text">Вы не указали Email</div>
                        </div>
                        <a class="entry forgot-password-link" href="#">Сбросить пароль</a>
                    </form>
                </div>
            </div>

            <div class="modal-block modal-success">
                <div class="modal-content-item">
                    <div class="modal-close">
                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z" fill="#545769"/>
                        </svg>
                    </div>
                    <img src="/svg/i-success-big.svg" alt="Success Icon">
                    <div class="title">Спасибо!</div>
                    <div class="description">На указанный вами email была отправленна инструкция по восстановлению пароля</div>
                </div>
            </div>

        </div>

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
    </footer>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/select2.full.js') }}" defer></script>
    <script src="{{ asset('js/slick.min.js') }}" defer></script>
    <script src="{{ asset('js/ui.js') }}" defer></script>

</body>
</html>
