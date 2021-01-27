<div class="sidebar desctop-sidebar">
    <div class="sidebar-top">
        <?php /*> <div class="sidebar-top-block roominess">
            <img src="/svg/i-people.svg" alt="alt">
            <div class="sidebar-top-block-item roominess-item">
                <div class="title">{{ __('roomin.') }}:</div>
                <div class="subtitle">{{ $hotel->getRoomPersonsMin() }} – {{ $hotel->getRoomPersonsMax() }} {{ __('ppl') }}.</div>
            </div>
        </div>
        @if ($hotel->type != 'affiliate')
            <div class="sidebar-top-block rental-period">
                <img src="/svg/i-clock.svg" alt="alt">
                <div class="sidebar-top-block-item rental-period-item">
                    <div class="title">{{ __('Min. lease term') }}:</div>
                    <div class="subtitle">3 {{ __('days') }}</div>
                </div>
            </div>
        @endif
            */ ?>

        <div class="free-now">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                    <path d="M8 16C12.411 16 16 12.4113 16 8C16 7.23861 15.8937 6.48828 15.6833 5.76969C15.5796 5.41634 15.2106 5.21338 14.8563 5.31706C14.5026 5.42041 14.3003 5.79069 14.4036 6.14404C14.578 6.74105 14.6667 7.36572 14.6667 8C14.6667 11.6759 11.6759 14.6667 8 14.6667C4.32406 14.6667 1.33333 11.6759 1.33333 8C1.33333 4.32406 4.32406 1.33333 8 1.33333C9.33594 1.33333 10.6213 1.72396 11.717 2.46273C12.022 2.66862 12.4367 2.58773 12.6423 2.28271C12.848 1.97738 12.7677 1.56299 12.4624 1.35726C11.1457 0.469401 9.6027 0 8 0C3.58903 0 0 3.5887 0 8C0 12.4113 3.58903 16 8 16Z" fill="#3B8B3E"/>
                    <path d="M14.8622 1.52869L8.0002 8.39034L5.80489 6.19535C5.54447 5.9351 5.1226 5.9351 4.86218 6.19535C4.60193 6.45577 4.60193 6.87765 4.86218 7.13806L7.52885 9.80473C7.65922 9.9351 7.82947 10 8.0002 10C8.17094 10 8.34119 9.9351 8.47156 9.80473L15.8049 2.47139C16.0651 2.21098 16.0651 1.7891 15.8049 1.52869C15.5445 1.26843 15.1226 1.26843 14.8622 1.52869Z" fill="#3B8B3E"/>
                </g>
                <defs>
                    <clipPath id="clip0">
                        <rect width="16" height="16" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
            <span>Свободен сейчас</span>
        </div>

    </div>

    <div class="sidebar-middle">
        <div class="price">
            <div class="left">{{ __('from') }}</div>
            <div class="middle">
                {{ $hotel->getRoomPriceMin() != 0 ? '€'.$hotel->getRoomPriceMin() : 'n/a' }}
            </div>
            <div class="right">{{ __('per person (including VAT)') }}</div>
        </div>
        <a href="#" class="inquiry">{{ __('Send request') }}</a>
        @if ($hotel->type == 'affiliate')
            <div class="number-phone not-phone">
                <div class="speaks">{{ __('Object owner speaks') }}:</div>
                <div class="language-item">{{ implode(', ', $hotel->languages()) }}</div>
            </div>
        @else
            <div class="number-phone">
                <a href="tel:+4917616573456">+49 176&nbsp;<span class="num_hide">1657 3456</span></a>
                <span class="sh_nmr">{{ __('show') }}</span>
                <div class="message">{{ __('Let us know that you are from the site Check-zimmer.de') }}</div>
                <div class="language">
                    <div class="speaks">{{ __('Speaks') }}:</div>
                    <div class="language-item">{{ implode(', ', $hotel->languages()) }}</div>
                </div>
            </div>
        @endif
        <div class="address-map">
            <div class="address">{{$hotel->address}}<span></span> {{$hotel->zip}} {{$hotel->city}} </div>
            <div class="map-container">
                <a class="map-picture" href="#object-description">
                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <path d="M1 -5.1811V-2.04882L39.1139 41L81 -6.30551C80.5285 -8.3937 78.6424 -10 76.442 -10H5.71513C3.12181 -10 1 -7.8315 1 -5.1811Z" fill="#E4EBF3"/>
                            <path d="M1 27L6 19.825L1 13V27Z" fill="#E4EBF3"/>
                            <path d="M13.4237 27L1 41.6488V55.1707C1 57.8268 3.16412 60 5.80916 60H43L13.4237 27Z" fill="#E4EBF3"/>
                            <path d="M19.5294 8L36 -10H5.41176C4.94118 -10 4.47059 -9.91818 4 -9.75455L19.5294 8Z" fill="#B5F5D2"/>
                            <path d="M13.6697 35L1 49.3548V55.1613C1 57.8226 3.13801 60 5.75113 60H36L13.6697 35Z" fill="#B5F5D2"/>
                            <rect x="0.5" y="0.5" width="43" height="43" rx="5.5" stroke="#E1E3E8"/>
                        </g>
                        <ellipse cx="21.9998" cy="18.1428" rx="4.2" ry="4.28571" fill="white"/>
                        <path d="M15.4265 20.6899C16.6308 24.0749 19.9427 28.7519 21.3477 30.6641C21.6738 31.1034 22.3262 31.1034 22.6523 30.6641C24.0573 28.7519 27.3692 24.0749 28.5735 20.6899C28.8495 19.9147 29 19.0879 29 18.2093C29 14.23 25.8638 11 22 11C18.1362 11 15 14.23 15 18.2093C15 19.0879 15.1505 19.9147 15.4265 20.6899ZM25.7634 18.2093C25.7634 20.354 24.0824 22.0594 22 22.0594C19.9176 22.0594 18.2616 20.3282 18.2616 18.2093C18.2616 16.0646 19.9427 14.3333 22 14.3333C24.0824 14.3592 25.7634 16.0646 25.7634 18.2093Z" fill="#6BB63F"/>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="44" height="44" rx="6" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-bottom">
        <div class="sidebar-bottom-block sidebar-bottom-modal">
            <a class="teilen" href="#">
                <img style="margin-right:3px;" class="not-hover" src="/svg/i-share.svg" alt="">
                <img style="margin-right:3px;" class="hover" src="/svg/i-share-hover.svg" alt="">
                <span>{{ __('Share') }}</span>
            </a>

            <div class="modal-share-block sidebar-modal-block">
                <div class="overlay"></div>
                <div class="share-block sidebar-small-block">
                    <h3>{{ __('Share') }}:</h3>
                    <div class="close-block"><img src="/svg/i-close-burger.svg" alt="alt"></div>
                    <div class="share-block-content">
                        <div class="row">
                            <div class="col-4 share-block-item">
                                <a href="#">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.97521 0C1.33205 0 0 1.33205 0 2.97521V17.0248C0 18.668 1.33205 20 2.97521 20H8.9539V12.8409H6.36364V9.8794H8.9539V7.62232C8.9539 5.05466 10.477 3.63636 12.8073 3.63636C13.9235 3.63636 15.0909 3.83646 15.0909 3.83646V6.3577H13.8045C12.5373 6.3577 12.142 7.14829 12.142 7.95849V9.8794H14.9714L14.5191 12.8409H12.142V20H17.0248C18.668 20 20 18.668 20 17.0248V2.97521C20 1.33205 18.668 0 17.0248 0H2.97521Z" fill="#7A8793"/>
                                    </svg>
                                    <span>{{ __('Facebook') }}</span>
                                </a>
                            </div>
                            <div class="col-4 share-block-item">
                                <a href="#">
                                    <svg width="24" height="19" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M23.25 2.77C22.38 3.1375 21.51 3.385 20.5875 3.4825C21.555 2.9125 22.2525 2.08 22.6275 0.9475C21.7174 1.48054 20.7271 1.86297 19.695 2.08C18.7725 1.12 17.6325 0.625 16.3125 0.625C13.755 0.625 11.685 2.6725 11.685 5.215C11.685 5.5825 11.7375 5.9275 11.8125 6.25C8.1075 6.0775 4.68 4.3 2.3175 1.465C1.8975 2.1775 1.6725 2.9425 1.6725 3.7825C1.6725 5.335 2.445 6.715 3.735 7.5775C2.985 7.555 2.295 7.3525 1.62 7.0075V7.06C1.62 9.2275 3.21 11.125 5.325 11.545C4.8525 11.6725 4.455 11.7175 4.11 11.7175C3.885 11.7175 3.585 11.695 3.2625 11.62C3.55234 12.5367 4.12498 13.3382 4.89834 13.9094C5.67169 14.4807 6.60606 14.7925 7.5675 14.8C5.9025 16.105 3.9825 16.7725 1.8225 16.7725C1.4025 16.7725 1.0275 16.75 0.75 16.6975C2.8875 18.0775 5.25 18.7675 7.8075 18.7675C13.275 18.7675 17.43 15.76 19.44 11.7925C20.46 9.7975 20.955 7.7725 20.955 5.725V5.38C20.9325 5.2525 20.9325 5.155 20.9325 5.1325C21.838 4.4845 22.6224 3.68227 23.25 2.7625" fill="#7A8793"/>
                                    </svg>
                                    <span>{{ __('Twitter') }}</span>
                                </a>
                            </div>
                            <div class="col-4 share-block-item">
                                <a href="#">
                                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 0H2C0.9 0 0.00999999 0.9 0.00999999 2L0 14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2C20 0.9 19.1 0 18 0ZM17.6 4.25L10.53 8.67C10.21 8.87 9.79 8.87 9.47 8.67L2.4 4.25C2.15 4.09 2 3.82 2 3.53C2 2.86 2.73 2.46 3.3 2.81L10 7L16.7 2.81C17.27 2.46 18 2.86 18 3.53C18 3.82 17.85 4.09 17.6 4.25Z" fill="#7A8793"/>
                                    </svg>
                                    <span>{{ __('Email') }}</span>
                                </a>
                            </div>
                            <div class="col-4 share-block-item">
                                <a href="#">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5275 15.8854C17.295 16.5379 16.1775 17.1304 15.6375 17.2129C15.15 17.2879 14.5425 17.3179 13.875 17.1004C13.3324 16.9341 12.7991 16.7388 12.2775 16.5154C9.4725 15.3079 7.635 12.4954 7.4925 12.3079C7.35 12.1204 6.3525 10.8004 6.3525 9.42787C6.3525 8.05537 7.08 7.38037 7.335 7.10287C7.59 6.82537 7.8975 6.75787 8.085 6.75787C8.2725 6.75787 8.46 6.75787 8.6175 6.76537C8.79 6.77287 9.0225 6.69787 9.2475 7.24537C9.48 7.80787 10.0425 9.17287 10.11 9.31537C10.1775 9.45037 10.23 9.61537 10.1325 9.80287C10.0425 9.99037 9.99 10.1029 9.855 10.2679C9.7125 10.4329 9.5625 10.6279 9.435 10.7554C9.2925 10.8979 9.15 11.0479 9.315 11.3254C9.48 11.6029 10.0425 12.5179 10.875 13.2604C11.9475 14.2054 12.8475 14.5054 13.125 14.6404C13.4025 14.7829 13.5675 14.7604 13.7325 14.5729C13.8975 14.3854 14.43 13.7554 14.6175 13.4779C14.805 13.2004 14.9925 13.2454 15.2475 13.3354C15.5025 13.4254 16.8825 14.1004 17.16 14.2429C17.4375 14.3854 17.625 14.4529 17.7 14.5654C17.7675 14.6854 17.7675 15.2404 17.535 15.8929L17.5275 15.8854ZM19.98 4.02787C18.9395 2.98701 17.7034 2.16224 16.3429 1.60103C14.9823 1.03983 13.5242 0.753275 12.0525 0.757867C5.88 0.757867 0.8475 5.76037 0.8475 11.9104C0.844465 13.867 1.3594 15.7896 2.34 17.4829L0.75 23.2579L6.69 21.7054C8.3342 22.5965 10.1748 23.0631 12.045 23.0629H12.0525C18.225 23.0629 23.25 18.0604 23.2575 11.9104C23.2619 10.4436 22.9744 8.99054 22.4118 7.63595C21.8491 6.28137 21.0224 5.0523 19.98 4.02037" fill="#7A8793"/>
                                    </svg>
                                    <span>{{ __('WhatsApp') }}</span>
                                </a>
                            </div>
                            <div class="col-4 share-block-item">
                                <a href="#">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1925 14.9625L10.14 11.7L4.1775 14.9625L10.7325 8.0025L13.86 11.265L19.7475 8.0025L13.1925 14.9625ZM12 0C5.37 0 0 4.9725 0 11.115C0 14.61 1.7475 17.73 4.47 19.77V24L8.5575 21.7575C9.67886 22.0666 10.8368 22.223 12 22.2225C18.63 22.2225 24 17.25 24 11.1075C24 4.9725 18.63 0 12 0V0Z" fill="#7A8793"/>
                                    </svg>
                                    <span>{{ __('Messanger') }}</span>
                                </a>
                            </div>
                            <div class="col-4 share-block-item">
                                <a href="#">
                                    <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 0H2C0.9 0 0 0.9 0 2V15C0 15.55 0.45 16 1 16C1.55 16 2 15.55 2 15V3C2 2.45 2.45 2 3 2H13C13.55 2 14 1.55 14 1C14 0.45 13.55 0 13 0ZM13.59 4.59L18.42 9.42C18.79 9.79 19 10.3 19 10.83V20C19 21.1 18.1 22 17 22H5.99C4.89 22 4 21.1 4 20L4.01 6C4.01 4.9 4.9 4 6 4H12.17C12.7 4 13.21 4.21 13.59 4.59ZM13 11H17.5L12 5.5V10C12 10.55 12.45 11 13 11Z" fill="#7A8793"/>
                                    </svg>
                                    <span>{{ __('Copy link') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="sidebar-bottom-block">
            <a class="drucken" href="#">
                <img style="margin-right:5px;" class="not-hover" src="/svg/i-print.svg" alt="">
                <img style="margin-right:5px;" class="hover" src="/svg/i-print-hover.svg" alt="">
                <span>{{ __('Print') }}</span>
            </a>
        </div>
        <div class="sidebar-bottom-block sidebar-bottom-modal">
            <a class="melden" href="#">
                <img class="not-hover" src="/svg/i-report.svg" alt="">
                <img class="hover" src="/svg/i-report-hover.svg" alt="">
                <span>{{ __('Report') }}</span>
            </a>

            <div class="modal-offer-block sidebar-modal-block">
                <div class="overlay"></div>
                <div class="offer sidebar-small-block">
                    <div class="close-block"><img src="/svg/i-close-burger.svg" alt="alt"></div>
                    <h3>{{ __('Sentence') }}</h3>
                    <div class="offer-select">
                        <label for="offer-select">{{ __('Reason complaint') }}</label>
                        <select id="offer-select">
                            <option value="1">erscheint unseriös</option>
                            <option value="2">ist am falschen Standort platziert</option>
                            <option value="3"> wird als Werbefläche genutzt</option>
                            <option value="4">wird als Gesuch genutzt</option>
                            <option value="5">wird als Gesuch genutzt</option>
                            <option value="6">wird als Gesuch genutzt</option>
                        </select>
                    </div>
                    <div class="textarea-block">
                        <textarea placeholder="{{ __('Complaint or suggestion text') }}"></textarea>
                    </div>
                    <a class="submit" href="#">{{ __('Send') }}</a>
                </div>
            </div>

        </div>
    </div>
</div>
