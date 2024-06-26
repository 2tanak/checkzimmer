@extends('layouts.app-subdomain')

@section('content')

    @include('css.loader-main')
    <div class="background-image-block">
        <a href="https://wa.me/{{ __($options['website_phone_watsapp'] ?? '' ) }}" class="write-whatsapp">
            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)" filter="url(#filter0_d)">
                    <path d="M17.1 2.87417C15.2 1.0375 12.7 0 10.0375 0C2.39583 0 -2.4025 8.27917 1.41333 14.865L0 20L5.27917 18.6233C7.57917 19.8658 9.46333 19.7558 10.0425 19.8292C18.9033 19.8292 23.3142 9.10917 17.0875 2.90667L17.1 2.87417Z" fill="white"/>
                    <path d="M10.056 18.1258L10.051 18.1249H10.0376C7.38598 18.1249 5.69181 16.8691 5.52515 16.7966L2.40015 17.6091L3.23765 14.5716L3.03848 14.2591C2.21348 12.9458 1.77515 11.4333 1.77515 9.87576C1.77515 2.54827 10.7293 -1.1159 15.911 4.06327C21.0801 9.18826 17.451 18.1258 10.056 18.1258Z" fill="#4CAF50"/>
                    <path d="M14.5895 11.9226L14.582 11.9851C14.3312 11.8601 13.1095 11.2626 12.882 11.1801C12.3712 10.9909 12.5154 11.1501 11.5345 12.2734C11.3887 12.4359 11.2437 12.4484 10.9962 12.3359C10.7462 12.2109 9.94369 11.9484 8.99369 11.0984C8.25369 10.4359 7.75703 9.62339 7.61036 9.37339C7.36619 8.95173 7.87703 8.89173 8.34203 8.01173C8.42536 7.83673 8.38286 7.69923 8.32119 7.57506C8.25869 7.45006 7.76119 6.22506 7.55286 5.73673C7.35286 5.25006 7.14703 5.31173 6.99286 5.31173C6.51286 5.27006 6.16203 5.27673 5.85286 5.59839C4.50786 7.07673 4.84703 8.60173 5.99786 10.2234C8.25953 13.1834 9.46453 13.7284 11.6679 14.4851C12.2629 14.6742 12.8054 14.6476 13.2345 14.5859C13.7129 14.5101 14.707 13.9851 14.9145 13.3976C15.127 12.8101 15.127 12.3226 15.0645 12.2101C15.0029 12.0976 14.8395 12.0351 14.5895 11.9226Z" fill="#FAFAFA"/>
                </g>
                <defs>
                    <filter id="filter0_d" x="0" y="0" width="20" height="21" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                        <feOffset dy="1"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.16 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                    </filter>
                    <clipPath id="clip0">
                        <rect width="20" height="20" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
            <span>{{ __('Write to WhatsApp') }}</span>
        </a>
        <h1 class="list-title">{{ __($domain->tagline()) }}</h1>

        <form class="find-subdomain-redirect" method="POST">
            @csrf
        <div class="container">
            <div class="sample-block">
                <div class="input-block sample-block-item">
                    <label for="text">{{ __($options['label_input'] ?? '' ) }}</label>
                    <div class="input-container">
                        <input id="text" name="address" type="text" autocomplete="off" placeholder="{{  __($options['placeholder'] ?? '' ) }}" value="{{ $getData['address'] ?? '' }}">
                    </div>

                    <div class="result-search">
                        <ul>
                            <li>Результат</li>
                        </ul>
                    </div>

                </div>
                <div class="distance-block select-block">
                    <label for="distance-select">{{ __($options['label_distance'] ?? '' ) }}</label>
                    <div class="select-container">
                        <select name="distance" id="distance-select" class="distance">
                            @foreach(range(10, 60, 10) as $km)
                                <option value="{{ $km }}"
                                    {{ ($getData['distance'] ?? 30) == $km ? 'selected' : '' }}>{{ $km }} {{ __('km') }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="number-personse-block select-block">
                    <label class="desctop-label" for="number-personse">{{ __($options['label_people'] ?? '' ) }}</label>
                    <div class="select-container">
                        <select name="person" id="number-personse" class="number-personse">
                            <option value="1" {{ 1 == ($getData['person'] ?? 1) ? 'selected' : '' }}>1 {{ __('person') }}</option>
                            @foreach(range(2, 21, 1) as $person)
                                <option value="{{ $person }}" {{ $person == ($getData['person'] ?? 1) ? 'selected' : '' }}>{{ $person <= 20 ? $person : '20+' }} {{ __('persons') }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <a class="find-housing" href="#" >{{ __($options['text_button'] ?? '' ) }}</a>
            </div>
            <div class="checkbox-form-block">
                <div class="checkbox-item single-rooms-checkbox">
                    <input type="checkbox" id="single-rooms" class="checkbox">
                    <label for="single-rooms">{{ __('Single rooms') }}</label>
                </div>
                <div class="checkbox-item double-rooms-checkbox">
                    <input type="checkbox" id="double-rooms" class="checkbox">
                    <label for="double-rooms">{{ __('Double rooms')}}</label>
                </div>
                <div class="checkbox-item multi-bed-rooms-checkbox">
                    <input type="checkbox" id="multi-bed-rooms" class="checkbox">
                    <label for="multi-bed-rooms">{{ __('Multi-bed rooms') }}</label>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div id="application" class="init-container">

        <div class="load-block-content first-load-block-content">
            <div class="load-block-item">
                <div class="load-block head-load-block">
                    <div class="left-part">
                        <div class="left-part-item">
                            <div class="list recast"></div>
                            <div class="map recast"></div>
                            <div class="found recast"></div>
                        </div>
                    </div>
                    <div class="select recast"></div>
                </div>
                <div class="load-block big-load-block">
                    <div class="left-part images-block recast">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <rect width="32" height="32" rx="2" fill="#EDEDEF"></rect>
                            <path d="M10 19L4 27H28L21 16L15 24L10 19Z" fill="#D8D8D8"></path>
                        </svg>
                    </div>
                    <div class="load-main-block">
                        <div class="middle-part">
                            <div class="top-block">
                                <div class="middle-gray-block bg height-item margin-bottom recast"></div>
                                <div class="short-gray-block bg height-item recast"></div>
                            </div>
                            <div class="bottom-block">
                                <div class="circle-gray-block bg margin-right recast"></div>
                                <div class="circle-gray-block bg margin-right recast"></div>
                                <div class="circle-gray-block bg margin-right recast"></div>
                                <div class="circle-gray-block bg recast"></div>
                            </div>
                        </div>
                        <div class="right-part">
                            <div class="right-left">
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item"></div>
                            </div>
                            <div class="right-right">
                                <div class="rectangle-content">
                                    <div class="rectangle-block bg recast"></div>
                                </div>
                                <div class="circle-content">
                                    <div class="circle-gray-block bg recast"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="load-block big-load-block">
                    <div class="left-part images-block recast">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <rect width="32" height="32" rx="2" fill="#EDEDEF"></rect>
                            <path d="M10 19L4 27H28L21 16L15 24L10 19Z" fill="#D8D8D8"></path>
                        </svg>
                    </div>
                    <div class="load-main-block">
                        <div class="middle-part">
                            <div class="top-block">
                                <div class="middle-gray-block bg height-item margin-bottom recast"></div>
                                <div class="short-gray-block bg height-item recast"></div>
                            </div>
                            <div class="bottom-block">
                                <div class="circle-gray-block bg margin-right recast"></div>
                                <div class="circle-gray-block bg margin-right recast"></div>
                                <div class="circle-gray-block bg margin-right recast"></div>
                                <div class="circle-gray-block bg recast"></div>
                            </div>
                        </div>
                        <div class="right-part">
                            <div class="right-left">
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item recast"></div>
                            </div>
                            <div class="right-right">
                                <div class="rectangle-content">
                                    <div class="rectangle-block bg recast"></div>
                                </div>
                                <div class="circle-content">
                                    <div class="circle-gray-block bg recast"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="load-block big-load-block">
                    <div class="left-part images-block recast">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <rect width="32" height="32" rx="2" fill="#EDEDEF"></rect>
                            <path d="M10 19L4 27H28L21 16L15 24L10 19Z" fill="#D8D8D8"></path>
                        </svg>
                    </div>
                    <div class="load-main-block">
                        <div class="middle-part">
                            <div class="top-block">
                                <div class="middle-gray-block bg height-item margin-bottom recast"></div>
                                <div class="short-gray-block bg height-item recast"></div>
                            </div>
                            <div class="bottom-block">
                                <div class="circle-gray-block bg margin-right recast"></div>
                                <div class="circle-gray-block bg margin-right recast"></div>
                                <div class="circle-gray-block bg margin-right recast"></div>
                                <div class="circle-gray-block bg recast"></div>
                            </div>
                        </div>
                        <div class="right-part">
                            <div class="right-left">
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item margin-bottom recast"></div>
                                <div class="long-gray-block bg height-item recast"></div>
                            </div>
                            <div class="right-right">
                                <div class="rectangle-content">
                                    <div class="rectangle-block bg recast"></div>
                                </div>
                                <div class="circle-content">
                                    <div class="circle-gray-block bg recast"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="load-block small-load-block">
                    <div class="very-big-gray-block height-item bg recast"></div>
                    <div class="very-small-block">
                        <div class="very-small-gray-block height-item bg recast"></div>
                        <div class="very-small-gray-block height-item bg recast"></div>
                    </div>
                    <div class="right-right">
                        <div class="rectangle-content">
                            <div class="rectangle-block bg recast"></div>
                        </div>
                        <div class="circle-content">
                            <div class="circle-gray-block bg recast"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="place-card"></div>
        </div>

        <Public></Public>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChFeaunpThR-Lo4t-SMP3n7s-fDBs67hU&callback=initMap" async defer></script>
    <script>
        let map = null;
        function initMap() {

        }
    </script>
@endsection
