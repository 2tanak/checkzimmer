@extends('layouts.app')

@section('content')

    <section class="plans-section">
        <div class="plans-content">
            <div class="plans-container">
                <h1>{{ __('Our pricing plans are transparent & flexible (domain plans)') }}</h1>
                <div class="subtitle">{{ __('Contact us, we will compare the properties in the city (domain plans)') }}</div>
                <div class="price-block">
                    <div class="price-block-item">
                        <div class="price-block-head">
                            <div class="name-tariff">{{ __('Intro') }}</div>
                            <div class="price-item">
                                <div class="max-price">€39 <span>*</span></div>
                                <div class="month">/ {{ __('Month') }}</div>
                            </div>
                            <div class="description">
                                {{ __('For most businesses that want to optimize web queries') }}
                            </div>
                        </div>
                        <div class="price-block-body">
                            <ul class="advantages">
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Own analytics platform') }}
                                </li>
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Chat support') }}
                                </li>
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Unlimited options') }}
                                </li>
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Optimization') }}
                                </li>
                                <li class="not-available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#BABCC5"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.75015 10.1644L11.293 12.7072L12.7072 11.293L10.1644 8.75015L12.7073 6.20718L11.2931 4.79297L8.75015 7.33594L6.20718 4.79297L4.79297 6.20718L7.33594 8.75015L4.79312 11.293L6.20733 12.7072L8.75015 10.1644Z" fill="white"/>
                                    </svg>
                                    {{ __('Phone support') }}
                                </li>
                                <li class="not-available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#BABCC5"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.75015 10.1644L11.293 12.7072L12.7072 11.293L10.1644 8.75015L12.7073 6.20718L11.2931 4.79297L8.75015 7.33594L6.20718 4.79297L4.79297 6.20718L7.33594 8.75015L4.79312 11.293L6.20733 12.7072L8.75015 10.1644Z" fill="white"/>
                                    </svg>
                                    {{ __('Special application') }}
                                </li>
                            </ul>
                            <a class="choose-plan" href="#">{{ __('Choose Plan') }}</a>
                            <div class="footnote">
                                * {{ __('Please note that the annual rate is EUR') }} 468.
                            </div>
                        </div>
                    </div>
                    <div class="price-block-item">
                        <div class="price-block-head">
                            <div class="name-tariff">{{ __('Base') }}</div>
                            <div class="price-item">
                                <div class="max-price">€99 <span>*</span></div>
                                <div class="month">/ {{ __('Month') }}</div>
                            </div>
                            <div class="description">
                                {{ __('For most businesses that want to optimize web queries') }}
                            </div>
                        </div>
                        <div class="price-block-body">
                            <ul class="advantages">
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Own analytics platform') }}
                                </li>
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Chat support') }}
                                </li>
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Unlimited options') }}
                                </li>
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Optimization') }}
                                </li>
                                <li class="not-available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#BABCC5"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.75015 10.1644L11.293 12.7072L12.7072 11.293L10.1644 8.75015L12.7073 6.20718L11.2931 4.79297L8.75015 7.33594L6.20718 4.79297L4.79297 6.20718L7.33594 8.75015L4.79312 11.293L6.20733 12.7072L8.75015 10.1644Z" fill="white"/>
                                    </svg>
                                    {{ __('Phone support') }}
                                </li>
                                <li class="not-available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#BABCC5"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.75015 10.1644L11.293 12.7072L12.7072 11.293L10.1644 8.75015L12.7073 6.20718L11.2931 4.79297L8.75015 7.33594L6.20718 4.79297L4.79297 6.20718L7.33594 8.75015L4.79312 11.293L6.20733 12.7072L8.75015 10.1644Z" fill="white"/>
                                    </svg>
                                    {{ __('Special application') }}
                                </li>
                            </ul>
                            <a class="choose-plan" href="#">{{ __('Choose Plan') }}</a>
                            <div class="footnote">
                                * {{ __('Please note that the annual rate is EUR') }} 468.
                            </div>
                        </div>
                    </div>
                    <div class="price-block-item popular">
                        <div class="price-block-head">
                            <div class="name-tariff">{{ __('Popular') }}</div>
                            <div class="price-item">
                                <div class="max-price">€129 <span>*</span></div>
                                <div class="month">/ {{ __('Month') }}</div>
                            </div>
                            <div class="description">
                                {{ __('For most businesses that want to optimize web queries') }}
                            </div>
                        </div>
                        <div class="price-block-body">
                            <ul class="advantages">
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Own analytics platform') }}
                                </li>
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Chat support') }}
                                </li>
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Unlimited options') }}
                                </li>
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Optimization') }}
                                </li>
                                <li>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Phone support') }}
                                </li>
                                <li>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Special application') }}
                                </li>
                            </ul>
                            <a class="choose-plan" href="#">{{ __('Choose Plan') }}</a>
                            <div class="footnote">
                                * {{ __('Please note that the annual rate is EUR') }} 468.
                            </div>
                        </div>
                    </div>
                    <div class="price-block-item">
                        <div class="price-block-head">
                            <div class="name-tariff">{{ __('Enterprice') }}</div>
                            <div class="price-item">
                                <div class="max-price">€229 <span>*</span></div>
                                <div class="month">/ {{ __('Month') }}</div>
                            </div>
                            <div class="description">
                                {{ __('For most businesses that want to optimize web queries') }}
                            </div>
                        </div>
                        <div class="price-block-body">
                            <ul class="advantages">
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Own analytics platform') }}
                                </li>
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Chat support') }}
                                </li>
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Unlimited options') }}
                                </li>
                                <li class="available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
                                    </svg>
                                    {{ __('Optimization') }}
                                </li>
                                <li class="not-available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#BABCC5"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.75015 10.1644L11.293 12.7072L12.7072 11.293L10.1644 8.75015L12.7073 6.20718L11.2931 4.79297L8.75015 7.33594L6.20718 4.79297L4.79297 6.20718L7.33594 8.75015L4.79312 11.293L6.20733 12.7072L8.75015 10.1644Z" fill="white"/>
                                    </svg>
                                    {{ __('Phone support') }}
                                </li>
                                <li class="not-available">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="9" fill="#BABCC5"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.75015 10.1644L11.293 12.7072L12.7072 11.293L10.1644 8.75015L12.7073 6.20718L11.2931 4.79297L8.75015 7.33594L6.20718 4.79297L4.79297 6.20718L7.33594 8.75015L4.79312 11.293L6.20733 12.7072L8.75015 10.1644Z" fill="white"/>
                                    </svg>
                                    {{ __('Special application') }}
                                </li>
                            </ul>
                            <a class="choose-plan" href="#">{{ __('Choose Plan') }}</a>
                            <div class="footnote">
                                * {{ __('Please note that the annual rate is EUR') }} 468.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="questions-block">
                <div class="questions-content">
                    <div class="title">{{ __('Freequently asked Questions') }}</div>
                    <div class="questions-block-item">
                        <div class="questions-item">
                            <div class="collapse-button" data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1">
                                <div style="display:flex;">
                                    <div class="point"></div>
                                    What is the best pricing plan?
                                </div>
                                <div class="plus-minus"></div>
                            </div>
                            <div  class="collapse-content collapse" id="collapse-1">
                                <p>Текст ответа 1</p>
                            </div>
                        </div>
                        <div class="questions-item">
                            <div class="collapse-button" data-toggle="collapse" href="#collapse-2" role="button" aria-expanded="false" aria-controls="collapse-2">
                                <div style="display:flex;">
                                    <div class="point"></div>
                                    How many real-estate objects do you have in your database?
                                </div>
                                <div class="plus-minus"></div>
                            </div>
                            <div class="collapse-content collapse" id="collapse-2">
                                <p>Есть два варианта проверки обратных ссылок для сайта или отдельной страницы. Первый
                                    работает только для ваших собственных сайтов. Второй можно применять для проверки
                                    обратных ссылок на чужие сайты или страницы.</p>
                                <p>Инструмент Google Search Console предоставляет вам сведения об органическом поисковом
                                    трафике и общей производительности вашего сайта. Это бесплатный инструмент — просто
                                    зарегистрируйтесь и подтвердите, что вы являетесь владельцем сайта.</p>
                            </div>
                        </div>
                        <div class="questions-item">
                            <div class="collapse-button" data-toggle="collapse" href="#collapse-3" role="button" aria-expanded="false" aria-controls="collapse-3">
                                <div style="display:flex;">
                                    <div class="point"></div>
                                    What is the best pricing plan?
                                </div>
                                <div class="plus-minus"></div>
                            </div>
                            <div  class="collapse-content collapse" id="collapse-3">
                                <p>Текст ответа 3</p>
                            </div>
                        </div>
                        <div class="questions-item">
                            <div class="collapse-button" data-toggle="collapse" href="#collapse-4" role="button" aria-expanded="false" aria-controls="collapse-4">
                                <div style="display:flex;">
                                    <div class="point"></div>
                                    What is the best pricing plan?
                                </div>
                                <div class="plus-minus"></div>
                            </div>
                            <div  class="collapse-content collapse" id="collapse-4">
                                <p>Текст ответа 4</p>
                            </div>
                        </div>
                        <div class="questions-item">
                            <div class="collapse-button" data-toggle="collapse" href="#collapse-5" role="button" aria-expanded="false" aria-controls="collapse-5">
                                <div style="display:flex;">
                                    <div class="point"></div>
                                    Our team is very big (100 persons). Is it legal to book all the rooms for our monteruzimmer team?
                                </div>
                                <div class="plus-minus"></div>
                            </div>
                            <div  class="collapse-content collapse" id="collapse-5">
                                <p>Текст ответа 5</p>
                            </div>
                        </div>
                        <div class="questions-item">
                            <div class="collapse-button" data-toggle="collapse" href="#collapse-6" role="button" aria-expanded="false" aria-controls="collapse-6">
                                <div style="display:flex;">
                                    <div class="point"></div>
                                    What is the best pricing plan?
                                </div>
                                <div class="plus-minus"></div>
                            </div>
                            <div  class="collapse-content collapse" id="collapse-6">
                                <p>Текст ответа 6</p>
                            </div>
                        </div>
                    </div>
                    <div class="communication-manager">
                        Не нашли ответ на свой вопрос? Не проблема, просто свяжитесь с нашим менежером напрямую
                        <a class="communication-manager" href="#">Связаться с менеджером</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
