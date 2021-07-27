@extends('layouts.app')

@section('content')

    <section class="plans-section city-section">

        <div class="background-image-block">
            <a href="https://wa.me/{{ __($options['website_phone_watsapp'] ?? '' ) }}" class="write-whatsapp">
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none">
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
            <h1 class="list-title">{{ __('Find suitable accommodations') }}</h1>
            <form class="find-subdomain-redirect" method="POST">
                @csrf
                <div class="container">
                    <div class="sample-block">
                        <div class="input-block sample-block-item">
                            <label for="text">{{ __('workplace address') }}</label>
                            <div class="input-container">
                                <input id="text" name="address" type="text" autocomplete="off" placeholder="{{ __('Example') }}: 04315 Leipzig">
                            </div>
                            <div class="result-search">
                                <ul>
                                    <li>Результат</li>
                                </ul>
                            </div>
                        </div>
                        <div class="distance-block select-block">
                            <label for="distance-select">{{ __('distance') }}</label>
                            <div class="select-container">
                                <select name="distance" id="distance-select" class="distance">
                                    <option value="10">10 {{ __('km') }}.</option>
                                    <option value="20">20 {{ __('km') }}.</option>
                                    <option value="30" selected>30 {{ __('km') }}.</option>
                                    <option value="40">40 {{ __('km') }}.</option>
                                    <option value="50">50 {{ __('km') }}.</option>
                                    <option value="60">60 {{ __('km') }}.</option>
                                </select>
                            </div>
                        </div>
                        <div class="number-personse-block select-block">
                            <label class="desctop-label" for="number-personse">{{ __('Num people') }}</label>
                            <div class="select-container">
                                <select name="person" id="number-personse" class="number-personse">
                                    <option value="1" {{ 1 == ($getData['person'] ?? 1) ? 'selected' : '' }}>1 {{ __('person') }}</option>
                                    @foreach(range(2, 21, 1) as $person)
                                        <option value="{{ $person }}" {{ $person == ($getData['person'] ?? 1) ? 'selected' : '' }}>{{ $person <= 20 ? $person : '20+' }} {{ __('persons') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <a class="find-housing" href="#">{{ __('Find housing') }}</a>
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


        <div class="plans-content city-content">
            <div class="plans-container">

                <h1>{{ __('Our pricing plans are transparent & flexible (main page)') }}</h1>
                <div class="subtitle">{{ __('Contact us, we will compare the properties in the city (main page)') }}</div>
                <div class="price-block">
                    @foreach($subdomains as $subdomain)
                        <a href="{{$subdomain['link']}}"
                           class="price-block-item">
                            <div class="price-block-head">
                                <div class="name-tariff">{{$subdomain['count']}} {{ __('free places') }}</div>
                                <div class="price-item">
                                    <div class="max-price">{{$subdomain['city']}}</div>
                                </div>
                                <div class="description">
                                    {{ __('For most businesses that want to optimize web queries') }}
                                </div>
                            </div>
                        </a>
                    @endforeach


                    <a href="/registration" class="plus-city">
                        <span class="add">{{ __('Add your city') }}</span>
                        <span class="plus">✚</span>
                    </a>

                    <a href="/registration" class="plus-city">
                        <span class="add">{{ __('Add your city') }}</span>
                        <span class="plus">✚</span>
                    </a>

                </div>
            </div>

            <div class="subtitle down-subtitle">{{ __('Contact us, we will compare the properties in the city X for you and find the most optimal accommodation for you!') }}</div>

            <div class="questions-block">
                <div class="questions-content">
                    <div class="title">{{ __('Freequently asked Questions') }}</div>
                    <div class="questions-block-item">
                        <div class="questions-item">
                            <div class="collapse-button" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
                                <div style="display:flex;">
                                    <div class="point"></div>
                                    Was ist ein Monteurzimmer?
                                </div>
                                <div class="plus-minus"></div>
                            </div>
                            <div  class="collapse-content collapse" id="collapse1">
                                <p>Ein Monteurzimmer ist eine Unterkunft für Menschen, die außerhalb ihrer Wohnumgebung arbeiten. In der Regel sind dies Handwerker oder Bauarbeiter, aber im Grunde kann jeder der beruflich unterwegs ist und einen Platz zum Übernachten benötigt.</p>
                                <p>Monteurunterkünfte sind in der Regel eher einfach eingerichtet. Für jeden Mieter ist stehen ein Bett, Aufbewahrungsmöglichkeiten, ein Platz zum Sitzen und Essen sowie die Möglichkeit sich etwas zum Essen zu machen zur Verfügung. Dies kann ganz unterschiedlich aufgebaut sein: Man findet Einzel- oder Gruppenzimmer, private Küchen und Badezimmer, aber auch Gemeinschaftsbäder und -küchen. All dies hängt von der Immobilie und den Möglichkeiten des Vermieters ab.</p>
                                <p>Da Monteure in der Regel sehr untypische Arbeitszeiten haben, ist eine Unterbringung im Hotel nicht immer sinnvoll. Hotels sind deutlich teurer und die meisten Annehmlichkeiten können aufgrund der Arbeitszeiten nicht genutzt werden. Stattdessen ist den meisten Monteuren wichtig, die Möglichkeit zu haben, sich essen zuzubereiten oder aufzuwärmen und Arbeitgeber profitieren vom günstigen Preis.</p>
                            </div>
                        </div>
                        <div class="questions-item">
                            <div class="collapse-button" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">
                                <div style="display:flex;">
                                    <div class="point"></div>
                                    Wo finde ich eine günstige Monteurunterkunft?
                                </div>
                                <div class="plus-minus"></div>
                            </div>
                            <div  class="collapse-content collapse" id="collapse2">
                                <p>Wenn Sie auf der Suche nach einem günstigen Monteurzimmer sind, finden Sie bei CHECK-ZIMMER eine große Auswahl an Vermietern.</p>
                                <p>Wir sind sogar auf Sachsen und Sachsen-Anhalt spezialisiert:</p>
                                <p><a href="https://leipzig.check-zimmer.de">https://leipzig.check-zimmer.de</a></p>
                                <p><a href="https://schkeuditz.check-zimmer.de">https://schkeuditz.check-zimmer.de</a></p>
                                <p><a href="https://bitterfeld.check-zimmer.de">https://bitterfeld.check-zimmer.de</a></p>
                                <p><a href="https://chemnitz.check-zimmer.de">https://chemnitz.check-zimmer.de</a></p>
                                <p><a href="https://halle.check-zimmer.de">https://halle.check-zimmer.de</a></p>
                                <p><a href="https://sandersdorf.check-zimmer.de">https://sandersdorf.check-zimmer.de</a></p>
                            </div>
                        </div>
                        <div class="questions-item">
                            <div class="collapse-button" data-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">
                                <div style="display:flex;">
                                    <div class="point"></div>
                                    Wie viel kostet eine Übernachtung in einer Monteurunterkunft?
                                </div>
                                <div class="plus-minus"></div>
                            </div>
                            <div  class="collapse-content collapse" id="collapse3">
                                <p>Aktuell finden Sie bei uns Anbieter, die ihre Monteurzimmer für einen Preis von 13€ bis 25€ pro Nacht und Person vermieten.</p>
                                <p>Die Preise von Monteurwohnungen sind in der Regel von verschiedenen Faktoren abhängig. Der wichtigste Faktor ist die Lage der Monteurunterkunft. Immobilien in großen Städten sind teurer als in ländlichen Regionen und somit auch die Preise für das Monteurzimmer. Auch innerhalb einer Stadt kann der Preis je nach Stadtteil unterschiedlich ausfallen.</p>
                                <p>Ähnlich verhält es sich mit der Aufenthaltsdauer. Je länger die Monteurunterkunft gemietet wird desto günstiger der Preis, da Leerstand vermieden wird und nicht kompensiert werden muss. Dasselbe gilt für die Personenzahl.</p>
                                <p>Auch die Saison ist für den Preis entscheidend. In der Hauptsaison sind die Preise aufgrund der hohen Nachfrage etwas höher als in der Nebensaison.</p>
                            </div>
                        </div>
                        <div class="questions-item">
                            <div class="collapse-button" data-toggle="collapse" href="#collapse4" role="button" aria-expanded="false" aria-controls="collapse4">
                                <div style="display:flex;">
                                    <div class="point"></div>
                                    Wie finde ich geeignete Monteurzimmer für große Gruppen?
                                </div>
                                <div class="plus-minus"></div>
                            </div>
                            <div  class="collapse-content collapse" id="collapse4">
                                <p>Kontaktieren Sie uns jederzeit telefonisch oder senden Sie uns eine Kontaktanfrage (Hyperlink) und wir erledigen den Rest. Außerdem finden Sie bei CHECK-ZIMMER eine große Anzahl an Vermietern, die über kleine wie große Wohneinheiten verfügen. Sie finden bei uns das perfekte Monteurzimmer für jeden Ihrer Mitarbeiter schnell und günstig.</p>
                                <p>Sie finden bei jedem Objekt Angaben über die Ausstattung des Monteurzimmers und können entscheiden welche Gebäude-Art (Haus oder Wohnung) und welche Annehmlichkeiten, wie zum Beispiel Einzelbäder oder Gemeinschaftsbäder, eigene Küchen oder Gemeinschaftsküchen, Sie in der Monteurunterkunft haben möchten.</p>
                                <p>Sie sind sich nicht sicher, was genau Sie benötigen oder welche Monteurzimmer für Ihren Zweck geeignet sind? Kontaktieren Sie uns jederzeit Online oder telefonisch – wir sind rund um die Uhr für Sie da.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div id="application">
        <Home/>
    </div>

@endsection
