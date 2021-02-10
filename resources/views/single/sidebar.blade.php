<div class="sidebar desctop-sidebar">
    <div class="sidebar-top">
        <div class="sidebar-top-block roominess">
            <img src="/svg/i-people.svg" alt="alt">
            <div class="sidebar-top-block-item roominess-item">
                <div class="title">{{ __('roomin.') }}:</div>
                @if ($hotel->getRoomPersonsMin() == 0)
                    <div class="subtitle">{{ __('n/a') }}</div>
                @else
                    <div class="subtitle">{{ $hotel->getRoomPersonsMin() }} – {{ $hotel->getRoomPersonsMax() }} {{ __('ppl') }}.</div>
                @endif
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
                <div class="sh_nmr">
                    <span>{{ __('show') }}</span>
                </div>
                <div class="message">{{ __('Let us know that you are from the site Check-zimmer.de') }}</div>
                <div class="language">
                    <div class="speaks">{{ __('Speaks') }}:</div>
                    <div class="language-item">{{ implode(', ', $hotel->languages()) }}</div>
                </div>
            </div>
        @endif
        <div class="address-map">
            <div class="address">
                <div class="hotel-name">{{$hotel->name}}</div>
                <div class="name-surname"></div>
                <div class="hotel-adress">{{$hotel->address}}</div>
                <div class="zip-city" style="white-space: nowrap;">{{$hotel->zip}} {{$hotel->city}}</div>
            </div>
            <div class="map-container">
                <a class="map-picture" href="#object-description">
                    <svg width="102" height="88" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M96 0H6C2.7 0 0 2.7 0 6v76c0 3.3 2.7 6 6 6h90c3.3 0 6-2.7 6-6V6c0-3.3-2.7-6-6-6z" fill="#fff"/>
                        <path d="M0 6v3.9l48.5 53.6 53.3-58.9C101.2 2 98.8 0 96 0H6C2.7 0 0 2.7 0 6zM0 45.2L7 37l-7-7.8v16zM15.5 47L0 65.2V82c0 3.3 2.7 6 6 6h46.4L15.5 47z" fill="#E4EBF3"/>
                        <path d="M24 22L45 0H6c-.6 0-1.2.1-1.8.3L24 22zM16 57L0 74.8V82c0 3.3 2.7 6 6 6h38.2L16 57z" fill="#B5F5D2"/>
                        <path d="M54.5 69.5L70.8 88H96c3.3 0 6-2.7 6-6V15.3L54.5 69.5z" fill="#E4EBF3"/>
                        <path d="M102 55.2V29L90.5 43 102 55.2zM102 71.8v-4.4L84.5 49.5 67 69.5 82.9 88h5.2L102 71.8z" fill="#D4DEE8"/>
                        <rect x=".5" y=".5" width="101" height="87" rx="5.5" stroke="#E1E3E8"/>
                    </svg>
                    <svg class="pin" width="14" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="7.001" cy="7.143" rx="4.2" ry="4.286" fill="#fff"/>
                        <path d="M.427 9.69c1.204 3.385 4.516 8.062 5.92 9.974a.81.81 0 001.305 0c1.405-1.912 4.717-6.59 5.921-9.974A7.346 7.346 0 0014 7.21C14 3.23 10.864 0 7 0S0 3.23 0 7.21c0 .878.15 1.705.427 2.48zm10.336-2.48c0 2.144-1.68 3.85-3.763 3.85-2.082 0-3.738-1.732-3.738-3.85 0-2.145 1.68-3.877 3.738-3.877 2.082.026 3.763 1.732 3.763 3.876z" fill="#6BB63F"/>
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
