<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $hotel->getSEODescription() }}"/>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,500,600,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="property-list">
    <header class="height-menu">
        <div class="container">
            <div class="header-content single-header-content">
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
                <a class="head-logo" href="{{ route(app('locale')->routeApply('home')) }}">
                    @include('partials.logo')
                    @include('partials.logo-mobile')
                </a>

                <div class="head-search">
                    <form action="{{route(app('locale')->routeApply('home'))}}" method="GET">
                        <img src="/svg/i-search-input.svg" alt="alt">
                        <input type="search" name="search" placeholder="{{ __('Enter the city, postcode or region') }}">
                    </form>
                </div>

                <div class="main-menu">
                    <ul>
                        <li>
                            <a href="{{ route(app('locale')->routeApply('favorites')) }}">
                                <img class="normal" src="/svg/i-favourites-header.svg" alt="Favourites">
                                <img class="hover" src="/svg/i-favourites-hover.svg" alt="Favourites">
                                {{ __('Favorites') }} (<span class="favoritesCount">0</span>)
                            </a>
                        </li><li>
                            <a href="{{ route(app('locale')->routeApply('plans')) }}">
                                <img class="normal" src="/svg/i-rent-header.svg" alt="Аренда Жилья">
                                <img class="hover" src="/svg/i-rent-hover.svg" alt="Аренда Жилья">
                                {{ __('Rent out') }}
                            </a>
                        </li>
                    </ul>
                </div>
                @include('partials.lang-switch')
            </div>
        </div>

        <div class="mobile-menu">
            <div class="mobile-menu-content">
                <div class="logo-mobile-block" style="text-align:center;margin-bottom:28px;">
                    <a href="{{ route(app('locale')->routeApply('home')) }}" style="display:inline-block;">
                        @include('partials.logo-mobile-menu')
                    </a>
                </div>
                @include('partials.lang-switch-mobile')
                <ul>
                    <li>
                        <a href="{{ route(app('locale')->routeApply('favorites')) }}">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.1614 9.97563C16.597 8.4996 16.597 6.10223 15.1614 4.6262C13.7316 3.1561 11.4179 3.1561 9.98803 4.6262L9.27309 5.36128C9.12351 5.51507 8.87649 5.51507 8.72691 5.36128L8.01197 4.6262C6.58214 3.1561 4.26843 3.1561 2.8386 4.6262C1.40301 6.10223 1.40301 8.4996 2.8386 9.97563L9 16.3106L15.1614 9.97563ZM9.44185 4.09498C11.1708 2.3173 13.9786 2.3173 15.7076 4.09498C17.4308 5.86675 17.4308 8.73508 15.7076 10.5068L9.27309 17.1226C9.12351 17.2764 8.87649 17.2764 8.72691 17.1226L2.29242 10.5068C0.569193 8.73508 0.569193 5.86675 2.29242 4.09498C4.02141 2.3173 6.82916 2.3173 8.55815 4.09498L9 4.54928L9.44185 4.09498Z" fill="#7A8793" stroke="#7A8793" stroke-width="0.2"/>
                            </svg>
                            {{ __('Favorites') }} (<span class="favoritesCount">0</span>)
                        </a>
                    </li>
                    <li>
                        <a href="{{ route(app('locale')->routeApply('plans')) }}">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.6667 16.2381H13.5714C14.2026 16.2381 14.7143 15.7264 14.7143 15.0952V7.17201C14.7143 7.13056 14.7209 7.09066 14.7331 7.0533L9 1.89347L3.26686 7.0533C3.2791 7.09066 3.28572 7.13056 3.28572 7.17201V15.0952C3.28572 15.7264 3.79739 16.2381 4.42857 16.2381H6.33334V13.5714C6.33334 12.5195 7.18613 11.6667 8.2381 11.6667H9.76191C10.8139 11.6667 11.6667 12.5195 11.6667 13.5714V16.2381ZM15.4762 7.72204V15.0952C15.4762 16.1472 14.6234 17 13.5714 17H4.42857C3.3766 17 2.52381 16.1472 2.52381 15.0952V7.72204L1.6358 8.52126C1.47941 8.662 1.23854 8.64932 1.0978 8.49294C0.95705 8.33655 0.969727 8.09568 1.12611 7.95494L8.74516 1.09779C8.89003 0.967402 9.10997 0.967402 9.25484 1.09779L16.8739 7.95494C17.0303 8.09568 17.043 8.33655 16.9022 8.49294C16.7615 8.64932 16.5206 8.662 16.3642 8.52126L15.4762 7.72204ZM10.9048 13.5714C10.9048 12.9402 10.3931 12.4286 9.76191 12.4286H8.2381C7.60692 12.4286 7.09524 12.9402 7.09524 13.5714V16.2381H10.9048V13.5714Z" fill="#7A8793" stroke="#7A8793" stroke-width="0.2"/>
                            </svg>
                            {{ __('Rent out') }}
                        </a>
                    </li>
                </ul>
                @if ($options['website_phone'] ?? '')
                    <a class="whatsapp-number" href="tel:{{ $phoneNumAdmin }}">
                        {{ $options['website_phone'] ?? '' }}
                        <span class="explanatory-text">24/7 бесплатно с мобильного</span>
                    </a>
                @endif
            </div>
        </div>

    </header>

    <main class="py-4">
        @yield('content')
    </main>

</div>

<footer id="main-footer">
    <div class="container">
        <div class="footer-content">
            <a class="footer-logo" href="{{ url('/') }}">
                <svg class="logo-desctope" width="210" height="28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M45.4 19.1c.1 0 .2 0 .3.1.1 0 .2.1.3.2l1.5 1.6c-.7.9-1.5 1.5-2.5 1.9-1 .4-2.1.6-3.5.6-1.2 0-2.3-.2-3.3-.6-1-.4-1.8-1-2.5-1.7s-1.2-1.6-1.6-2.6c-.4-1-.5-2.1-.5-3.3 0-1.2.2-2.3.6-3.3.4-1 1-1.9 1.7-2.6.7-.7 1.6-1.3 2.7-1.7 1-.4 2.2-.6 3.4-.6.6 0 1.2.1 1.7.2s1 .3 1.5.4c.5.2.9.4 1.3.7.4.3.7.5 1 .9L46.2 11l-.3.3c-.1.1-.3.1-.5.1-.1 0-.3 0-.4-.1-.1-.1-.2-.1-.4-.2-.1-.1-.3-.2-.4-.3-.2-.1-.3-.2-.6-.3-.2-.1-.5-.2-.8-.2-.3-.1-.6-.1-1-.1-.7 0-1.3.1-1.9.4-.6.2-1 .6-1.5 1-.4.4-.7 1-.9 1.6-.2.6-.3 1.4-.3 2.1 0 .8.1 1.6.3 2.2.2.6.5 1.2.9 1.6.4.4.8.8 1.4 1 .5.2 1.1.3 1.7.3h.9c.3 0 .5-.1.8-.2.2-.1.5-.2.7-.3.2-.1.4-.3.7-.5.1-.1.2-.1.3-.2.3-.1.4-.1.5-.1zm18.3 4.2h-3.8v-6.8h-6.6v6.8h-3.8V7.1h3.8v6.8h6.6V7.1h3.8v16.2zM77.2 7.1V10h-6.6v3.8h5.1v2.8h-5.1v3.9h6.6v2.9H66.8V7.1h10.4zm13.5 12c.1 0 .2 0 .3.1.1 0 .2.1.3.2l1.5 1.6c-.7.9-1.5 1.5-2.5 1.9-1 .4-2.1.6-3.5.6-1.2 0-2.3-.2-3.3-.6-1-.4-1.8-1-2.5-1.7s-1.2-1.6-1.6-2.6c-.4-1-.5-2.1-.5-3.3 0-1.2.2-2.3.6-3.3.4-1 1-1.9 1.7-2.6.8-.9 1.7-1.4 2.7-1.8 1-.4 2.2-.6 3.4-.6.6 0 1.2.1 1.7.2s1 .3 1.5.4c.5.1.9.4 1.3.6.4.3.7.5 1 .9l-1.3 1.7-.3.3c-.1.1-.3.1-.5.1-.1 0-.3 0-.4-.1-.1-.1-.2-.1-.4-.2-.1-.1-.3-.2-.4-.3-.2-.1-.3-.2-.6-.3-.2-.1-.5-.2-.8-.2-.3-.1-.6-.1-1-.1-.7 0-1.3.1-1.9.4-.6.2-1 .6-1.5 1-.4.4-.7 1-.9 1.6-.2.6-.3 1.4-.3 2.1 0 .8.1 1.6.3 2.2.2.6.5 1.2.9 1.6.4.4.8.8 1.4 1 .5.2 1.1.3 1.7.3h.9c.3 0 .5-.1.8-.2.2-.1.5-.2.7-.3.2-.1.4-.3.7-.5.1-.1.2-.1.3-.2.2.1.4.1.5.1zm7.9-5.4h.6c.6 0 1-.2 1.2-.5l3.6-5.3c.2-.3.4-.5.7-.6.3-.1.6-.2.9-.2h3.3l-4.8 6.5c-.2.2-.3.4-.5.6-.2.2-.4.3-.6.4.3.1.5.2.8.4.2.2.5.4.6.7l4.9 7.5h-4c-.1 0-.3-.1-.4-.1-.1 0-.2-.1-.3-.2-.1-.1-.2-.2-.2-.3l-3.7-5.6c-.1-.2-.3-.4-.5-.4-.2-.1-.5-.1-.8-.1h-.9v6.9h-3.8V7.1h3.8v6.6h.1zm11.5 1.5h6V18h-6v-2.8zm20.2-8.1v1.4c0 .2 0 .4-.1.6-.1.2-.1.4-.3.5l-7.6 10.8h7.7v2.9h-12.5v-1.4c0-.2 0-.3.1-.5s.1-.3.2-.5l7.6-10.9h-7.3V7.1h12.2zm6.2 16.2h-3.8V7.1h3.8v16.2zm11.7-7.4c.1.3.3.6.4.9.1.3.3.6.4.9.1-.3.3-.6.4-.9.1-.3.3-.6.4-.9l4.1-8.2c.1-.1.1-.2.2-.3.1-.1.2-.1.3-.2.1 0 .2-.1.3-.1h3.3v16.2h-3.3V14c0-.5 0-.9.1-1.5l-4.3 8.3c-.1.3-.3.5-.5.6-.2.1-.5.2-.8.2h-.5c-.3 0-.5-.1-.8-.2-.2-.1-.4-.3-.5-.6l-4.3-8.3c0 .3.1.5.1.8v10H140V7.1h3.3c.1 0 .2 0 .3.1.1 0 .2.1.3.2.1.1.2.2.2.3l4.1 8.2zm21.3 0c.1.3.3.6.4.9.1.3.3.6.4.9.1-.3.3-.6.4-.9.1-.3.3-.6.4-.9l4.2-8.2c.1-.1.1-.2.2-.3.1-.1.2-.1.3-.2.1 0 .2-.1.3-.1h3.3v16.2h-3.3V14c0-.5 0-.9.1-1.5l-4.3 8.3c-.1.3-.3.5-.5.6-.2.1-.5.2-.8.2h-.5c-.3 0-.5-.1-.8-.2-.2-.1-.4-.3-.5-.6l-4.3-8.3c0 .3.1.5.1.8v10h-3.3V7.1h3.3c.1 0 .2 0 .3.1.1 0 .2.1.3.2.1.1.2.2.2.3l4.1 8.2zM193 7.1V10h-6.6v3.8h5.1v2.8h-5.1v3.9h6.6v2.9h-10.4V7.1H193zm6.3 10.2v6h-3.8V7.1h5.3c1.2 0 2.2.1 3 .4.8.2 1.5.6 2 1s.9.9 1.1 1.5c.2.6.4 1.2.4 1.9 0 .5-.1 1-.2 1.5s-.4.9-.6 1.3c-.3.4-.6.7-1 1.1-.4.3-.9.6-1.4.8.3.1.5.3.7.5.2.2.4.4.6.7l3.4 5.6h-3.4c-.6 0-1.1-.2-1.4-.7l-2.7-4.7c-.1-.2-.3-.4-.4-.4-.2-.1-.4-.1-.7-.1h-.9v-.2zm0-2.6h1.5c.5 0 .9-.1 1.3-.2s.7-.3.9-.5c.2-.2.4-.5.5-.8.1-.3.2-.6.2-1 0-.7-.2-1.3-.7-1.7-.5-.4-1.2-.6-2.1-.6h-1.5v4.8h-.1z" fill="#333646"></path>
                    <path d="M12.7 0L0 12.6v12.7h25.3V12.6L12.7 0zm-2.5 22.2l-5.5-5.5 2.6-2.6 2.8 2.8 6.8-6.9 2.6 2.6-9.3 9.6z" fill="url(#paint0_linear)"></path>
                    <defs>
                        <linearGradient id="paint0_linear" x1="30.766" y1="3.291" x2="-3.352" y2="29.115" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0F7FEB"></stop>
                            <stop offset="1" stop-color="#00CEFF"></stop>
                        </linearGradient>
                    </defs>
                </svg>
                <svg class="logo-mobile" width="165" height="22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M35.672 15.007c.078 0 .157 0 .236.079.078 0 .157.078.235.157l1.179 1.257c-.55.707-1.179 1.179-1.965 1.493-.785.314-1.65.471-2.75.471-.942 0-1.807-.157-2.592-.471-.786-.314-1.415-.786-1.965-1.336s-.942-1.257-1.257-2.043c-.314-.785-.393-1.65-.393-2.593 0-.942.158-1.807.472-2.592a6.145 6.145 0 011.335-2.043A5.768 5.768 0 0130.33 6.05c.786-.314 1.728-.471 2.671-.471.472 0 .943.078 1.336.157.393.078.786.235 1.179.314.392.157.707.314 1.021.55.314.236.55.393.786.707L36.3 8.643l-.235.236c-.079.078-.236.078-.393.078-.079 0-.236 0-.314-.078-.079-.079-.158-.079-.315-.158-.078-.078-.236-.157-.314-.235-.157-.079-.236-.157-.471-.236a1.48 1.48 0 00-.629-.157c-.236-.079-.471-.079-.786-.079-.55 0-1.021.079-1.493.315-.471.157-.785.471-1.178.785-.314.315-.55.786-.707 1.257-.157.472-.236 1.1-.236 1.65 0 .629.079 1.258.236 1.729.157.471.393.943.707 1.257.314.314.628.629 1.1.786.393.157.864.236 1.336.236h.707c.235 0 .393-.079.628-.158.157-.078.393-.157.55-.235.157-.079.314-.236.55-.393.079-.079.157-.079.236-.157.236-.079.314-.079.393-.079zm14.378 3.3h-2.985v-5.343h-5.186v5.343h-2.986V5.58h2.986v5.342h5.186V5.58h2.985v12.728zM60.658 5.58v2.278h-5.186v2.986h4.007v2.2h-4.007v3.064h5.185v2.279h-8.17V5.579h8.17zm10.607 9.428c.078 0 .157 0 .235.079.079 0 .157.078.236.157l1.179 1.257c-.55.707-1.179 1.179-1.965 1.493-.785.314-1.65.471-2.75.471-.943 0-1.807-.157-2.593-.471-.785-.314-1.414-.786-1.964-1.336s-.943-1.257-1.257-2.043c-.314-.785-.393-1.65-.393-2.593 0-.942.157-1.807.472-2.592A6.145 6.145 0 0163.8 7.386c.629-.707 1.336-1.1 2.122-1.415.785-.314 1.728-.471 2.671-.471.472 0 .943.079 1.336.157.393.079.786.236 1.178.314.393.079.708.315 1.022.472.314.236.55.393.786.707l-1.022 1.336-.236.235c-.078.079-.235.079-.392.079-.079 0-.236 0-.315-.079-.078-.078-.157-.078-.314-.157-.078-.078-.236-.157-.314-.235-.157-.079-.236-.158-.472-.236a1.48 1.48 0 00-.628-.157c-.236-.079-.472-.079-.786-.079-.55 0-1.021.079-1.493.314-.471.158-.785.472-1.178.786-.315.314-.55.786-.707 1.257-.158.472-.236 1.1-.236 1.65 0 .629.078 1.257.236 1.729.157.471.392.943.707 1.257.314.314.628.629 1.1.786.392.157.864.235 1.335.235h.707c.236 0 .393-.078.63-.157.156-.078.392-.157.55-.235.156-.079.313-.236.55-.393.078-.079.156-.079.235-.157.157.078.314.078.393.078zm6.207-4.243h.471c.472 0 .786-.157.943-.393l2.829-4.164c.157-.236.314-.393.55-.471.235-.079.471-.157.707-.157h2.593l-3.772 5.107c-.157.157-.236.314-.393.471a1.642 1.642 0 01-.471.314c.236.079.393.158.629.315.157.157.392.314.471.55l3.85 5.893h-3.143c-.079 0-.236-.079-.314-.079-.079 0-.157-.079-.236-.157-.079-.079-.157-.157-.157-.236l-2.907-4.4c-.079-.157-.236-.314-.393-.314-.157-.079-.393-.079-.629-.079h-.707v5.422h-2.986V5.579h2.986v5.185h.079zm9.035 1.179h4.715v2.2h-4.715v-2.2zm15.872-6.364v1.1c0 .157 0 .314-.079.471-.078.157-.078.314-.235.393l-5.972 8.486h6.05v2.278h-9.821v-1.1c0-.157 0-.236.078-.393.079-.157.079-.235.157-.393l5.972-8.564h-5.736V5.58h9.586zm4.871 12.728h-2.985V5.58h2.985v12.728zm9.193-5.814c.079.236.236.471.315.707.078.236.235.471.314.707.078-.236.236-.471.314-.707.079-.236.236-.471.314-.707l3.222-6.443c.078-.079.078-.157.157-.236.079-.078.157-.078.236-.157.078 0 .157-.078.235-.078h2.593v12.728h-2.593V11c0-.393 0-.707.079-1.179l-3.379 6.522a.802.802 0 01-.392.471 1.484 1.484 0 01-.629.157h-.393c-.236 0-.393-.078-.628-.157a.8.8 0 01-.393-.471l-3.379-6.522c0 .236.079.393.079.629v7.857H110V5.58h2.593c.079 0 .157 0 .236.078.079 0 .157.079.236.157.078.079.157.157.157.236l3.221 6.443zm16.736 0c.079.236.236.471.314.707.079.236.236.471.315.707.078-.236.235-.471.314-.707.078-.236.236-.471.314-.707l3.3-6.443c.079-.079.079-.157.157-.236.079-.078.157-.078.236-.157.079 0 .157-.078.236-.078h2.593v12.728h-2.593V11c0-.393 0-.707.078-1.179l-3.378 6.522a.807.807 0 01-.393.471 1.48 1.48 0 01-.629.157h-.393c-.235 0-.392-.078-.628-.157a.807.807 0 01-.393-.471L129.25 9.82c0 .236.079.393.079.629v7.857h-2.593V5.58h2.593c.079 0 .157 0 .236.078.078 0 .157.079.235.157.079.079.158.157.158.236l3.221 6.443zm18.464-6.914v2.278h-5.185v2.986h4.007v2.2h-4.007v3.064h5.185v2.279h-8.171V5.579h8.171zm4.95 8.014v4.714h-2.985V5.58h4.164c.943 0 1.728.078 2.357.314a4.203 4.203 0 011.571.786c.393.314.708.707.865 1.178.157.472.314.943.314 1.493 0 .393-.079.786-.157 1.179-.079.392-.314.707-.472 1.021-.235.314-.471.55-.785.864a5.026 5.026 0 01-1.1.629c.235.078.393.236.55.393.157.157.314.314.471.55l2.672 4.4h-2.672c-.471 0-.864-.157-1.1-.55l-2.121-3.693c-.079-.157-.236-.314-.315-.314-.157-.079-.314-.079-.55-.079h-.707v-.157zm0-2.043h1.179c.393 0 .707-.079 1.021-.157.315-.079.55-.236.707-.393.158-.157.315-.393.393-.629.079-.235.157-.471.157-.785 0-.55-.157-1.022-.55-1.336-.392-.314-.942-.471-1.65-.471h-1.178v3.771h-.079z" fill="#333646"></path>
                    <path d="M9.979 0L0 9.9v9.979h19.879V9.9L9.979 0zM8.014 17.443L3.693 13.12l2.043-2.042 2.2 2.2 5.343-5.422L15.32 9.9l-7.307 7.543z" fill="url(#paint0_linear2)"></path>
                    <defs>
                        <linearGradient id="paint0_linear2" x1="24.173" y1="2.586" x2="-2.634" y2="22.876" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0F7FEB"></stop>
                            <stop offset="1" stop-color="#00CEFF"></stop>
                        </linearGradient>
                    </defs>
                </svg>
            </a>
            <ul class="footer-menu">
                <li><a href="#">Datenschutz</a></li>
                <li><a href="#">Impressum</a></li>
            </ul>
            <div class="copyright">
                &copy; {{ now()->year }} {{ $system_option['copyright'] ?? '' }}
            </div>
        </div>
    </div>

    @include('single.inquiry-modal')

    @include('single.gallery-modal')
    <script>(function(a,m,o,c,r,m){a[m]={id:"41373",hash:"02054bc01863d1cb9eb06492ca7868cd80bac2992311ba581ade40ec6bbe7b4b",locale:"ru",setMeta:function(p){this.params=(this.params||[]).concat([p])}};a[o]=a[o]||function(){(a[o].q=a[o].q||[]).push(arguments)};var d=a.document,s=d.createElement('script');s.async=true;s.id=m+'_script';s.src='https://gso.amocrm.ru/js/button.js?1614073604';d.head&&d.head.appendChild(s)}(window,0,'amoSocialButton',0,0,'amo_social_button'));</script>
</footer>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<script src="{{ asset('js/ui.js') }}" defer></script>
<script src="{{ asset('js/select2.full.js') }}" defer></script>
<script src="{{ asset('js/slick.min.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" defer></script>
<script src="https://www.google.com/recaptcha/api.js?render={{env('GOOGLE_RECAPTHCA3')}}"></script>
<script>
    let favs = JSON.parse(localStorage.getItem("favoritesList")) || [];
    document.getElementsByClassName('favoritesCount')[0].innerHTML = favs.length;

    document.addEventListener('DOMContentLoaded', function() {
        jQuery('#arrival-date, #date-departure').datepicker({
            format: "dd/mm/yyyy"
        })
    });
</script>

<script>
    (function(w, d, s, h, id) {
        w.roistatProjectId = id; w.roistatHost = h;
        var p = d.location.protocol == "https:" ? "https://" : "http://";
        var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);
        var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
    })(window, document, 'script', 'cloud.roistat.com', '3471f90cb1269b9107391c11fb73fefc');
</script>
</body>
</html>
