@extends('layouts.app-single')

@section('content')

    @include('css.loader-single')

    <div class="container single-container">
        <div class="single-content">
            <div class="left-part">
            <div class="main-block">
                <div class="main-top-block">
                    <div class="single-main-slider">
                        <div class="main-slider-item"><a class="open-gallery" href="#"><img src="/img/gallery-big-photo.png" alt="alt"></a></div>
                        <div class="main-slider-item"><a class="open-gallery" href="#"><img src="/img/gallery-small-photo1.png" alt="alt"></a></div>
                        <div class="main-slider-item"><a class="open-gallery" href="#"><img src="/img/gallery-small-photo2.png" alt="alt"></a></div>
                        <div class="main-slider-item"><a class="open-gallery" href="#"><img src="/img/gallery-small-photo3.png" alt="alt"></a></div>
                        <div class="main-slider-item"><a class="open-gallery" href="#"><img src="/img/gallery-small-photo4.png" alt="alt"></a></div>
                    </div>
                    <div class="sidebar mobile-sidebar">
                        <div class="sidebar-top">
                            <div class="sidebar-top-block roominess">
                                <img src="/svg/i-people.svg" alt="alt">
                                <div class="sidebar-top-block-item roominess-item">
                                    <div class="title">Вместит.:</div>
                                    <div class="subtitle">2 – 14 чел.</div>
                                </div>
                            </div>
                            <div class="sidebar-top-block rental-period">
                                <img src="/svg/i-clock.svg" alt="alt">
                                <div class="sidebar-top-block-item rental-period-item">
                                    <div class="title">Мин. срок аренды:</div>
                                    <div class="subtitle">3 дня</div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-middle">
                            <div class="price">
                                <div class="left">от</div>
                                <div class="middle">€250</div>
                                <div class="right">на человека (включая НДС)</div>
                            </div>
                            <a href="#" class="inquiry">Отправить запрос</a>
                            <div class="number-phone">
                                <a href="tel:+4917616573456">+49 176&nbsp;<span class="num_hide">1657 3456</span></a>
                                <span class="sh_nmr">показать</span>
                                <div class="message">Сообщите что вы с сайта Immbilien.de</div>
                                <div class="language">
                                    <div class="speaks">Говорит на:</div>
                                    <div class="language-item">EN, RU, DE</div>
                                </div>
                            </div>
                            <div class="address-map">
                                <div class="address">DKN Immobilien <span>Anja Klepzigolf</span> Kolonnadenstr. 1 04109 Leipzig</div>
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
                                    <a class="map-picture map-mobile-picture" href="#map-mobile-block">
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
                            <div class="sidebar-bottom-block">
                                <a class="teilen" href="#">
                                    <img style="margin-right:3px;" class="not-hover" src="/svg/i-share.svg" alt="">
                                    <img style="margin-right:3px;" class="hover" src="/svg/i-share-hover.svg" alt="">
                                    <span>Teilen</span>
                                </a>
                                <div class="modal-share-block sidebar-modal-block">
                                    <div class="overlay"></div>
                                    <div class="share-block sidebar-small-block">
                                        <h3>Поделиться:</h3>
                                        <div class="close-block"><img src="/svg/i-close-burger.svg" alt="alt"></div>
                                        <div class="share-block-content">
                                            <div class="row">
                                                <div class="col-4 share-block-item">
                                                    <a href="#">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.97521 0C1.33205 0 0 1.33205 0 2.97521V17.0248C0 18.668 1.33205 20 2.97521 20H8.9539V12.8409H6.36364V9.8794H8.9539V7.62232C8.9539 5.05466 10.477 3.63636 12.8073 3.63636C13.9235 3.63636 15.0909 3.83646 15.0909 3.83646V6.3577H13.8045C12.5373 6.3577 12.142 7.14829 12.142 7.95849V9.8794H14.9714L14.5191 12.8409H12.142V20H17.0248C18.668 20 20 18.668 20 17.0248V2.97521C20 1.33205 18.668 0 17.0248 0H2.97521Z" fill="#7A8793"/>
                                                        </svg>
                                                        <span>Facebook</span>
                                                    </a>
                                                </div>
                                                <div class="col-4 share-block-item">
                                                    <a href="#">
                                                        <svg width="24" height="19" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.25 2.77C22.38 3.1375 21.51 3.385 20.5875 3.4825C21.555 2.9125 22.2525 2.08 22.6275 0.9475C21.7174 1.48054 20.7271 1.86297 19.695 2.08C18.7725 1.12 17.6325 0.625 16.3125 0.625C13.755 0.625 11.685 2.6725 11.685 5.215C11.685 5.5825 11.7375 5.9275 11.8125 6.25C8.1075 6.0775 4.68 4.3 2.3175 1.465C1.8975 2.1775 1.6725 2.9425 1.6725 3.7825C1.6725 5.335 2.445 6.715 3.735 7.5775C2.985 7.555 2.295 7.3525 1.62 7.0075V7.06C1.62 9.2275 3.21 11.125 5.325 11.545C4.8525 11.6725 4.455 11.7175 4.11 11.7175C3.885 11.7175 3.585 11.695 3.2625 11.62C3.55234 12.5367 4.12498 13.3382 4.89834 13.9094C5.67169 14.4807 6.60606 14.7925 7.5675 14.8C5.9025 16.105 3.9825 16.7725 1.8225 16.7725C1.4025 16.7725 1.0275 16.75 0.75 16.6975C2.8875 18.0775 5.25 18.7675 7.8075 18.7675C13.275 18.7675 17.43 15.76 19.44 11.7925C20.46 9.7975 20.955 7.7725 20.955 5.725V5.38C20.9325 5.2525 20.9325 5.155 20.9325 5.1325C21.838 4.4845 22.6224 3.68227 23.25 2.7625" fill="#7A8793"/>
                                                        </svg>
                                                        <span>Twitter</span>
                                                    </a>
                                                </div>
                                                <div class="col-4 share-block-item">
                                                    <a href="#">
                                                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M18 0H2C0.9 0 0.00999999 0.9 0.00999999 2L0 14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2C20 0.9 19.1 0 18 0ZM17.6 4.25L10.53 8.67C10.21 8.87 9.79 8.87 9.47 8.67L2.4 4.25C2.15 4.09 2 3.82 2 3.53C2 2.86 2.73 2.46 3.3 2.81L10 7L16.7 2.81C17.27 2.46 18 2.86 18 3.53C18 3.82 17.85 4.09 17.6 4.25Z" fill="#7A8793"/>
                                                        </svg>
                                                        <span>Email</span>
                                                    </a>
                                                </div>
                                                <div class="col-4 share-block-item">
                                                    <a href="#">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5275 15.8854C17.295 16.5379 16.1775 17.1304 15.6375 17.2129C15.15 17.2879 14.5425 17.3179 13.875 17.1004C13.3324 16.9341 12.7991 16.7388 12.2775 16.5154C9.4725 15.3079 7.635 12.4954 7.4925 12.3079C7.35 12.1204 6.3525 10.8004 6.3525 9.42787C6.3525 8.05537 7.08 7.38037 7.335 7.10287C7.59 6.82537 7.8975 6.75787 8.085 6.75787C8.2725 6.75787 8.46 6.75787 8.6175 6.76537C8.79 6.77287 9.0225 6.69787 9.2475 7.24537C9.48 7.80787 10.0425 9.17287 10.11 9.31537C10.1775 9.45037 10.23 9.61537 10.1325 9.80287C10.0425 9.99037 9.99 10.1029 9.855 10.2679C9.7125 10.4329 9.5625 10.6279 9.435 10.7554C9.2925 10.8979 9.15 11.0479 9.315 11.3254C9.48 11.6029 10.0425 12.5179 10.875 13.2604C11.9475 14.2054 12.8475 14.5054 13.125 14.6404C13.4025 14.7829 13.5675 14.7604 13.7325 14.5729C13.8975 14.3854 14.43 13.7554 14.6175 13.4779C14.805 13.2004 14.9925 13.2454 15.2475 13.3354C15.5025 13.4254 16.8825 14.1004 17.16 14.2429C17.4375 14.3854 17.625 14.4529 17.7 14.5654C17.7675 14.6854 17.7675 15.2404 17.535 15.8929L17.5275 15.8854ZM19.98 4.02787C18.9395 2.98701 17.7034 2.16224 16.3429 1.60103C14.9823 1.03983 13.5242 0.753275 12.0525 0.757867C5.88 0.757867 0.8475 5.76037 0.8475 11.9104C0.844465 13.867 1.3594 15.7896 2.34 17.4829L0.75 23.2579L6.69 21.7054C8.3342 22.5965 10.1748 23.0631 12.045 23.0629H12.0525C18.225 23.0629 23.25 18.0604 23.2575 11.9104C23.2619 10.4436 22.9744 8.99054 22.4118 7.63595C21.8491 6.28137 21.0224 5.0523 19.98 4.02037" fill="#7A8793"/>
                                                        </svg>
                                                        <span>WhatsApp</span>
                                                    </a>
                                                </div>
                                                <div class="col-4 share-block-item">
                                                    <a href="#">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1925 14.9625L10.14 11.7L4.1775 14.9625L10.7325 8.0025L13.86 11.265L19.7475 8.0025L13.1925 14.9625ZM12 0C5.37 0 0 4.9725 0 11.115C0 14.61 1.7475 17.73 4.47 19.77V24L8.5575 21.7575C9.67886 22.0666 10.8368 22.223 12 22.2225C18.63 22.2225 24 17.25 24 11.1075C24 4.9725 18.63 0 12 0V0Z" fill="#7A8793"/>
                                                        </svg>
                                                        <span>Messanger</span>
                                                    </a>
                                                </div>
                                                <div class="col-4 share-block-item">
                                                    <a href="#">
                                                        <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13 0H2C0.9 0 0 0.9 0 2V15C0 15.55 0.45 16 1 16C1.55 16 2 15.55 2 15V3C2 2.45 2.45 2 3 2H13C13.55 2 14 1.55 14 1C14 0.45 13.55 0 13 0ZM13.59 4.59L18.42 9.42C18.79 9.79 19 10.3 19 10.83V20C19 21.1 18.1 22 17 22H5.99C4.89 22 4 21.1 4 20L4.01 6C4.01 4.9 4.9 4 6 4H12.17C12.7 4 13.21 4.21 13.59 4.59ZM13 11H17.5L12 5.5V10C12 10.55 12.45 11 13 11Z" fill="#7A8793"/>
                                                        </svg>
                                                        <span>Copy link</span>
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
                                    <span>Drucken</span>
                                </a>
                            </div>
                            <div class="sidebar-bottom-block">
                                <a class="melden" href="#">
                                    <img class="not-hover" src="/svg/i-report.svg" alt="">
                                    <img class="hover" src="/svg/i-report-hover.svg" alt="">
                                    <span>Melden</span>
                                </a>

                                <div class="modal-offer-block sidebar-modal-block">
                                    <div class="overlay"></div>
                                    <div class="offer sidebar-small-block">
                                        <div class="close-block"><img src="/svg/i-close-burger.svg" alt="alt"></div>
                                        <h3>Das Angebot</h3>
                                        <div class="offer-select">
                                            <label for="offer-select">Причина жалобы</label>
                                            <select id="offer-select3">
                                                <option value="1">erscheint unseriös</option>
                                                <option value="2">ist am falschen Standort platziert</option>
                                                <option value="3"> wird als Werbefläche genutzt</option>
                                                <option value="4">wird als Gesuch genutzt</option>
                                                <option value="5">wird als Gesuch genutzt</option>
                                                <option value="6">wird als Gesuch genutzt</option>
                                            </select>
                                        </div>
                                        <div class="textarea-block">
                                            <textarea placeholder="Erläuterung zur Beanstandung"></textarea>
                                        </div>
                                        <a class="submit" href="#">Отправить</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <div class="single-gallery">
                    <div class="big-photo"><a class="open-gallery" href="#"><img src="/img/gallery-big-photo.png" alt="alt"></a></div>
                    <div class="small-photo">
                        <a class="open-gallery" href="#"><img src="/img/gallery-small-photo1.png" alt="alt"></a>
                        <a class="open-gallery" href="#"><img src="/img/gallery-small-photo2.png" alt="alt"></a>
                        <a class="open-gallery" href="#"><img src="/img/gallery-small-photo3.png" alt="alt"></a>
                        <a class="open-gallery amount-photo" href="#">
                            <img src="/img/gallery-small-photo4.png" alt="alt">
                            <div class="number-photos">+11 фото</div>
                        </a>
                    </div>
                    <a href="#" class="favorites">
                        <svg class="favorites-usual" width="12" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.6211 5.98172C12.6977 4.8747 12.6977 3.07667 11.6211 1.96965C10.5487 0.867074 8.8134 0.867074 7.74102 1.96965L7.20482 2.52096C7.09263 2.6363 6.90737 2.6363 6.79518 2.52096L6.25898 1.96965C5.1866 0.867074 3.45132 0.867074 2.37895 1.96965C1.30226 3.07667 1.30226 4.8747 2.37895 5.98172L7 10.7329L11.6211 5.98172ZM7.33139 1.57124C8.62813 0.237973 10.7339 0.237973 12.0307 1.57124C13.3231 2.90006 13.3231 5.05131 12.0307 6.38013L7.20482 11.3419C7.09263 11.4573 6.90737 11.4573 6.79518 11.3419L1.96932 6.38013C0.676895 5.05131 0.676895 2.90006 1.96932 1.57124C3.26606 0.237973 5.37187 0.237973 6.66861 1.57124L7 1.91196L7.33139 1.57124Z" fill="#333646" stroke="#333646" stroke-width="0.2"/>
                        </svg>
                        <svg class="favorites-active" width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.1 1.5c-.6-.7-1.5-1-2.4-1-.9 0-1.8.4-2.4 1l-.3.3-.3-.3C6.1.8 5.2.5 4.3.5c-.9 0-1.8.4-2.4 1C.6 2.9.6 5.1 1.9 6.4l4.8 5c.1.1.2.1.3.1.1 0 .2 0 .3-.1l4.8-5c1.3-1.3 1.3-3.5 0-4.9z" fill="#EE483F"/>
                        </svg>
                    </a>
                </div>
                <div class="single-gallery option-two">
                    <div class="big-photo"><a class="open-gallery" href="#"><img src="/img/gallery-big-photo.png" alt="alt"></a></div>
                    <div class="middle-photo">
                        <a class="open-gallery" href="#"><img src="/img/gallery-small-photo1.png" alt="alt"></a>
                    </div>
                    <div class="small-photo">
                        <a class="open-gallery" href="#"><img src="/img/gallery-small-photo2.png" alt="alt"></a>
                        <a class="open-gallery amount-photo" href="#">
                            <img src="/img/gallery-small-photo3.png" alt="alt">
                            <div class="number-photos">+11 фото</div>
                        </a>
                    </div>
                    <a href="#" class="favorites">
                        <svg class="favorites-usual" width="12" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.6211 5.98172C12.6977 4.8747 12.6977 3.07667 11.6211 1.96965C10.5487 0.867074 8.8134 0.867074 7.74102 1.96965L7.20482 2.52096C7.09263 2.6363 6.90737 2.6363 6.79518 2.52096L6.25898 1.96965C5.1866 0.867074 3.45132 0.867074 2.37895 1.96965C1.30226 3.07667 1.30226 4.8747 2.37895 5.98172L7 10.7329L11.6211 5.98172ZM7.33139 1.57124C8.62813 0.237973 10.7339 0.237973 12.0307 1.57124C13.3231 2.90006 13.3231 5.05131 12.0307 6.38013L7.20482 11.3419C7.09263 11.4573 6.90737 11.4573 6.79518 11.3419L1.96932 6.38013C0.676895 5.05131 0.676895 2.90006 1.96932 1.57124C3.26606 0.237973 5.37187 0.237973 6.66861 1.57124L7 1.91196L7.33139 1.57124Z" fill="#333646" stroke="#333646" stroke-width="0.2"/>
                        </svg>
                        <svg class="favorites-active" width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.1 1.5c-.6-.7-1.5-1-2.4-1-.9 0-1.8.4-2.4 1l-.3.3-.3-.3C6.1.8 5.2.5 4.3.5c-.9 0-1.8.4-2.4 1C.6 2.9.6 5.1 1.9 6.4l4.8 5c.1.1.2.1.3.1.1 0 .2 0 .3-.1l4.8-5c1.3-1.3 1.3-3.5 0-4.9z" fill="#EE483F"/>
                        </svg>
                    </a>
                </div>
                <div class="single-gallery option-three">
                    <div class="big-photo"><a class="open-gallery" href="#"><img src="/img/gallery-big-photo.png" alt="alt"></a></div>
                    <div class="middle-photo">
                        <a class="open-gallery" href="#"><img src="/img/gallery-small-photo1.png" alt="alt"></a>
                    </div>
                    <div class="middle-photo radius">
                        <a class="open-gallery amount-photo" href="#">
                            <img src="/img/gallery-small-photo3.png" alt="alt">
                            <div class="number-photos">+11 фото</div>
                        </a>
                    </div>
                    <a href="#" class="favorites">
                        <svg class="favorites-usual" width="12" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.6211 5.98172C12.6977 4.8747 12.6977 3.07667 11.6211 1.96965C10.5487 0.867074 8.8134 0.867074 7.74102 1.96965L7.20482 2.52096C7.09263 2.6363 6.90737 2.6363 6.79518 2.52096L6.25898 1.96965C5.1866 0.867074 3.45132 0.867074 2.37895 1.96965C1.30226 3.07667 1.30226 4.8747 2.37895 5.98172L7 10.7329L11.6211 5.98172ZM7.33139 1.57124C8.62813 0.237973 10.7339 0.237973 12.0307 1.57124C13.3231 2.90006 13.3231 5.05131 12.0307 6.38013L7.20482 11.3419C7.09263 11.4573 6.90737 11.4573 6.79518 11.3419L1.96932 6.38013C0.676895 5.05131 0.676895 2.90006 1.96932 1.57124C3.26606 0.237973 5.37187 0.237973 6.66861 1.57124L7 1.91196L7.33139 1.57124Z" fill="#333646" stroke="#333646" stroke-width="0.2"/>
                        </svg>
                        <svg class="favorites-active" width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.1 1.5c-.6-.7-1.5-1-2.4-1-.9 0-1.8.4-2.4 1l-.3.3-.3-.3C6.1.8 5.2.5 4.3.5c-.9 0-1.8.4-2.4 1C.6 2.9.6 5.1 1.9 6.4l4.8 5c.1.1.2.1.3.1.1 0 .2 0 .3-.1l4.8-5c1.3-1.3 1.3-3.5 0-4.9z" fill="#EE483F"/>
                        </svg>
                    </a>
                </div>
                <h1>Monteurhaus - Monteur und Ferienhaus Pengal - in Leipzig</h1>
                <div class="additional-information">
                    <div class="mobile-title">Bewertungen</div>
                    <div class="rating">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="12" height="12" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="12" height="12" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="12" height="12" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="12" height="12" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#CBCDD1"/>
                                <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.04586 2L7.91396 4.02558C7.91396 6 7.91396 8.58101 7.91396 11.05L6.00032 9.77196Z" fill="#F5C61C"/>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="12" height="12" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span>4.7</span>
                    </div>
                    <div class="add-time">Добавлено: в 21:39, 10 апреля 2020</div>
                    <div class="viewed">Просмотры: 6977</div>
                </div>
                </div>
                <div class="price-situation">
                    <div class="titles">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                        <div class="title">Цены</div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                        <div class="title padding-left">Обстановка</div>
                            </div>
                        </div>
                    </div>
                    <div class="parameters">
                        <div class="row">
                            <div class="parameters-block parameters-left-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                                <div class="row">
                                    <div class="title type col-xl-5 col-lg-5 col-md-5 col-sm-5">Тип</div>
                                    <div class="title quantity col-xl-2 col-lg-2 col-md-2 col-sm-2">Кол-во</div>
                                    <div class="title personen col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">Personen</div>
                                    <div class=" title price col-xl-3 col-lg-3 col-md-3 col-sm-3">Цена</div>
                                </div>
                            </div>
                            <div class="parameters-block parameters-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                                <div class="row">
                                    <div class="title type-bed col-xl-4 col-lg-4 col-md-4 col-sm-4">Тип кровати</div>
                                    <div class="title shower col-xl-4 col-lg-4 col-md-4 col-sm-4">Душ</div>
                                    <div class="title kitchen col-xl-4 col-lg-4 col-md-4 col-sm-4">Кухня</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="position">
                        <div class="top-bloc-collapse" data-toggle="collapse" data-target="#position1-collapse" role="button" aria-expanded="false" aria-controls="position1-collapse">
                            <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                                <div class="top-bloc-collapse-item top-bloc-collapse-left">
                                    <div class="row">
                                        <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                            <img src="/svg/i-house-filled.svg" alt="house">
                                            дом (целиком)
                                        </div>
                                        <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">1x</div>
                                        <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2">10+</div>
                                        <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>25€</span>/person</div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                                <div class="top-bloc-collapse-item top-bloc-collapse-right">
                                    <div class="row" style="height:100%;">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center"></div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                    <div class="shower-item-block shower-item-block-green">
                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                        </svg>
                                        свой
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-sm-4 d-flex align-items-center bg">
                                    <div class="kitchen-item-block kitchen-item-block-green">
                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                        </svg>
                                        своя
                                    </div>
                                </div>
                                    </div>
                                        </div>
                            </div>
                        </div>
                        </div>
                        <div class="collapse show" id="position1-collapse">
                            <div class="collapse-content-line">
                                <div class="row">
                                <div class="collapse-left-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                                    <div class="row">
                                    <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                        <img src="/svg/i-one.svg" alt="alt">
                                        одноместный
                                    </div>
                                    <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">2x</div>
                                    <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">1</div>
                                    <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-2">от<span>22€</span>/person</div>
                                    </div>
                                </div>
                                <div class="collapse-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                                    <div class="row" style="height:100%;">
                                    <div class="type-bed-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                        <div class="type-bed-item-block type-bed-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="shower-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                        <div class="shower-item-block shower-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            свой
                                        </div>
                                    </div>
                                    <div class="kitchen-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                        <div class="kitchen-item-block kitchen-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            своя
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="collapse-content-line">
                                <div class="row">
                                    <div class="collapse-left-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                                        <div class="row">
                                            <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                                <img src="/svg/i-two.svg" alt="alt">
                                                двухместный
                                            </div>
                                            <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">3x</div>
                                            <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">2</div>
                                            <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>20€</span>/person</div>
                                        </div>
                                    </div>
                                    <div class="collapse-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                                        <div class="row" style="height:100%;">
                                            <div class="type-bed-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                <div class="type-bed-item-block type-bed-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    одноместная
                                                </div>
                                            </div>
                                            <div class="shower-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                <div class="shower-item-block shower-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    свой
                                                </div>
                                            </div>
                                            <div class="kitchen-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                <div class="kitchen-item-block kitchen-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    своя
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse-content-line">
                                <div class="row">
                                    <div class="collapse-left-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                                        <div class="row">
                                            <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                                <img src="/svg/i-multi.svg" alt="alt">
                                                многоместная
                                            </div>
                                            <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">5x</div>
                                            <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">4</div>
                                            <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>18€</span>/person</div>
                                        </div>
                                    </div>
                                    <div class="collapse-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                                        <div class="row" style="height:100%;">
                                            <div class="type-bed-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                <div class="type-bed-item-block type-bed-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    одноместная
                                                </div>
                                            </div>
                                            <div class="shower-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                <div class="shower-item-block shower-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    свой
                                                </div>
                                            </div>
                                            <div class="kitchen-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                <div class="kitchen-item-block kitchen-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    своя
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                    <div class="position">
                        <div class="top-bloc-collapse" data-toggle="collapse" data-target="#position2-collapse" role="button" aria-expanded="false" aria-controls="position2-collapse">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                                    <div class="top-bloc-collapse-item top-bloc-collapse-left">
                                        <div class="row">
                                            <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                                <img src="/svg/i-room-filled.svg" alt="house">
                                                квартира
                                            </div>
                                            <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">1x</div>
                                            <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2">5</div>
                                            <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>25€</span>/person</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                                    <div class="top-bloc-collapse-item top-bloc-collapse-right">
                                        <div class="row" style="height:100%;">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center"></div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                <div class="shower-item-block shower-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    свой
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center bg">
                                                <div class="kitchen-item-block kitchen-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    своя
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse show" id="position2-collapse">
                                <div class="collapse-content-line">
                                    <div class="row">
                                        <div class="collapse-left-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                                            <div class="row">
                                                <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                                    <img src="/svg/i-two.svg" alt="alt">
                                                    двухместный
                                                </div>
                                                <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">2x</div>
                                                <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">5</div>
                                                <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3 col-sm-3">от<span>22€</span>/person</div>
                                            </div>
                                        </div>
                                        <div class="collapse-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                                            <div class="row" style="height:100%;">
                                                <div class="type-bed-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="type-bed-item-block type-bed-item-block-green">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                        </svg>
                                                        одноместная
                                                    </div>
                                                </div>
                                                <div class="shower-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="shower-item-block shower-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместный
                                                    </div>
                                                </div>
                                                <div class="kitchen-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="kitchen-item-block kitchen-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместная
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse-content-line">
                                    <div class="row">
                                        <div class="collapse-left-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                                            <div class="row">
                                                <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                                    <img src="/svg/i-multi.svg" alt="alt">
                                                    трехместный
                                                </div>
                                                <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">3x</div>
                                                <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">3</div>
                                                <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>20€</span>/person</div>
                                            </div>
                                        </div>
                                        <div class="collapse-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                                            <div class="row" style="height:100%;">
                                                <div class="type-bed-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="type-bed-item-block type-bed-item-block-green">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                        </svg>
                                                        одноместная
                                                    </div>
                                                </div>
                                                <div class="shower-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="shower-item-block shower-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместный
                                                    </div>
                                                </div>
                                                <div class="kitchen-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="kitchen-item-block kitchen-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместная
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="position">
                        <div class="top-bloc-collapse" data-toggle="collapse" data-target="#position3-collapse" role="button" aria-expanded="false" aria-controls="position3-collapse">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                                    <div class="top-bloc-collapse-item top-bloc-collapse-left">
                                        <div class="row">
                                            <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                                <img src="/svg/i-hotel-filled.svg" alt="house">
                                                гостиница
                                            </div>
                                            <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">1x</div>
                                            <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2">100+</div>
                                            <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>18€</span>/person</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                                    <div class="top-bloc-collapse-item top-bloc-collapse-right">
                                        <div class="row" style="height:100%;">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center"></div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                <div class="shower-item-block shower-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    свой
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center bg">
                                                <div class="kitchen-item-block kitchen-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    своя
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse show" id="position3-collapse">
                                <div class="collapse-content-line">
                                    <div class="row">
                                        <div class="collapse-left-block col-xl-6 col-md-6 col-lg-6 col-sm-6 pr-1">
                                            <div class="row">
                                                <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                                    <img src="/svg/i-one.svg" alt="alt">
                                                    одноместный
                                                </div>
                                                <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">2x</div>
                                                <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">1</div>
                                                <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>25€</span>/person</div>
                                            </div>
                                        </div>
                                        <div class="collapse-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                                            <div class="row" style="height:100%;">
                                                <div class="type-bed-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="type-bed-item-block type-bed-item-block-green">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                        </svg>
                                                        одноместная
                                                    </div>
                                                </div>
                                                <div class="shower-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="shower-item-block shower-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместный
                                                    </div>
                                                </div>
                                                <div class="kitchen-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="kitchen-item-block kitchen-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместная
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse-content-line">
                                    <div class="row">
                                        <div class="collapse-left-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                                            <div class="row">
                                                <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                                    <img src="/svg/i-two.svg" alt="alt">
                                                    двухместный
                                                </div>
                                                <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">3x</div>
                                                <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">2</div>
                                                <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>22€</span>/person</div>
                                            </div>
                                        </div>
                                        <div class="collapse-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                                            <div class="row" style="height:100%;">
                                                <div class="type-bed-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="type-bed-item-block type-bed-item-block-green">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                        </svg>
                                                        одноместная
                                                    </div>
                                                </div>
                                                <div class="shower-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="shower-item-block shower-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместный
                                                    </div>
                                                </div>
                                                <div class="kitchen-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="kitchen-item-block kitchen-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместная
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse-content-line">
                                    <div class="row">
                                        <div class="collapse-left-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                                            <div class="row">
                                                <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                                    <img src="/svg/i-multi.svg" alt="alt">
                                                    трехместный
                                                </div>
                                                <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">5x</div>
                                                <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">3</div>
                                                <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>20€</span>/person</div>
                                            </div>
                                        </div>
                                        <div class="collapse-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                                            <div class="row" style="height:100%;">
                                                <div class="type-bed-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="type-bed-item-block type-bed-item-block-green">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                        </svg>
                                                        одноместная
                                                    </div>
                                                </div>
                                                <div class="shower-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="shower-item-block shower-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместный
                                                    </div>
                                                </div>
                                                <div class="kitchen-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="kitchen-item-block kitchen-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместная
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse-content-line">
                                    <div class="row">
                                        <div class="collapse-left-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-1">
                                            <div class="row">
                                                <div class="name col-xl-5 col-lg-5 col-md-5 col-sm-5">
                                                    <img src="/svg/i-multi.svg" alt="alt">
                                                    четырехместный
                                                </div>
                                                <div class="quantity-item col-xl-2 col-lg-2 col-md-2 col-sm-2">1x</div>
                                                <div class="personen-item col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center">4</div>
                                                <div class="price-item col-xl-3 col-lg-3 col-md-3 col-sm-3">от<span>18€</span>/person</div>
                                            </div>
                                        </div>
                                        <div class="collapse-right-block col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                                            <div class="row" style="height:100%;">
                                                <div class="type-bed-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="type-bed-item-block type-bed-item-block-green">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                        </svg>
                                                        одноместная
                                                    </div>
                                                </div>
                                                <div class="shower-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="shower-item-block shower-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместный
                                                    </div>
                                                </div>
                                                <div class="kitchen-item col-xl-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                                                    <div class="kitchen-item-block kitchen-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместная
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bottom-text">
                        * Текст комментария к таблице с ценами. Предложения по вашему запросу закончились, увеличьте дистанцию или свяжитесь с менежером напрямую
                    </div>
            </div>

                <div class="mobile-price-situation">
                    <h2>Цены и обстановка</h2>
                    <div class="position-collapse">
                        <div class="visible-part" type="button" data-toggle="collapse" data-target="#position-collapse1" aria-expanded="false" aria-controls="position-collapse1">
                            <div class="top-part">
                                <div class="name">
                                    <img src="/svg/i-house-filled.svg" alt="alt">
                                    дом (целиком)
                                </div>
                                <div class="price">
                                    от<span>25€</span>/person
                                </div>
                                    <div class="collapse-button"></div>
                            </div>
                            <div class="position-line">
                                <div class="position-line-title">Кол-во</div>
                                <div class="position-line-details">1x</div>
                                <div class="empty-block"></div>
                            </div>
                            <div class="position-line">
                                <div class="position-line-title">Personen</div>
                                <div class="position-line-details">100+</div>
                                <div class="empty-block"></div>
                            </div>
                        </div>
                        <div class="collapse position-content" id="position-collapse1">
                            <div class="bg-color">
                                <div class="position-line">
                                    <div class="position-line-title">Душ</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            свой
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кухня</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            своя
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                            </div>

                            <div class="position">
                                <div class="top-part">
                                    <div class="name">
                                        <img src="/svg/one.svg" alt="alt">
                                        одноместный
                                    </div>
                                    <div class="price">
                                        от<span>22€</span>/person
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кол-во</div>
                                    <div class="position-line-details">2x</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Personen</div>
                                    <div class="position-line-details">1</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Тип кровати</div>
                                    <div class="position-line-details">
                                        <div class="big-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Душ</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            свой
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кухня</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            своя
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                            </div>

                            <div class="position">
                                <div class="top-part">
                                    <div class="name">
                                        <img src="/svg/i-two.svg" alt="alt">
                                        двухместный
                                    </div>
                                    <div class="price">
                                        от<span>20€</span>/person
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кол-во</div>
                                    <div class="position-line-details">3x</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Personen</div>
                                    <div class="position-line-details">2</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Тип кровати</div>
                                    <div class="position-line-details">
                                        <div class="big-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Душ</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            свой
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кухня</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            своя
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                            </div>

                            <div class="position">
                                <div class="top-part">
                                    <div class="name">
                                        <img src="/svg/i-multi.svg" alt="alt">
                                        многоместный
                                    </div>
                                    <div class="price">
                                        от<span>20€</span>/person
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кол-во</div>
                                    <div class="position-line-details">5x</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Personen</div>
                                    <div class="position-line-details">4</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Тип кровати</div>
                                    <div class="position-line-details">
                                        <div class="big-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Душ</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            свой
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кухня</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            своя
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="position-collapse">
                        <div class="visible-part" type="button" data-toggle="collapse" data-target="#position-collapse2" aria-expanded="false" aria-controls="position-collapse2">
                            <div class="top-part">
                                <div class="name">
                                    <img src="/svg/i-room-filled.svg" alt="alt">
                                    квартира
                                </div>
                                <div class="price">
                                    от<span>25€</span>/person
                                </div>
                                <div class="collapse-button"></div>
                            </div>
                            <div class="position-line">
                                <div class="position-line-title">Кол-во</div>
                                <div class="position-line-details">1x</div>
                                <div class="empty-block"></div>
                            </div>
                            <div class="position-line">
                                <div class="position-line-title">Personen</div>
                                <div class="position-line-details">100+</div>
                                <div class="empty-block"></div>
                            </div>
                        </div>
                        <div class="collapse position-content" id="position-collapse2">
                            <div class="bg-color">
                                <div class="position-line">
                                    <div class="position-line-title">Душ</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            свой
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кухня</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            своя
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                            </div>

                            <div class="position">
                                <div class="top-part">
                                    <div class="name">
                                        <img src="/svg/i-multi.svg" alt="alt">
                                        двухместный
                                    </div>
                                    <div class="price">
                                        от<span>22€</span>/person
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кол-во</div>
                                    <div class="position-line-details">2x</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Personen</div>
                                    <div class="position-line-details">1</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Тип кровати</div>
                                    <div class="position-line-details">
                                        <div class="big-yellow-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                            </svg>
                                            совместная
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Душ</div>
                                    <div class="position-line-details">
                                        <div class="big-yellow-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                            </svg>
                                            совместный
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кухня</div>
                                    <div class="position-line-details">
                                        <div class="big-yellow-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                            </svg>
                                            совместная
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                            </div>

                            <div class="position">
                                <div class="top-part">
                                    <div class="name">
                                        <img src="/svg/i-two.svg" alt="alt">
                                        двухместный
                                    </div>
                                    <div class="price">
                                        от<span>20€</span>/person
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кол-во</div>
                                    <div class="position-line-details">3x</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Personen</div>
                                    <div class="position-line-details">2</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Тип кровати</div>
                                    <div class="position-line-details">
                                        <div class="big-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Душ</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            свой
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кухня</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            своя
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="position-collapse">
                        <div class="visible-part" type="button" data-toggle="collapse" data-target="#position-collapse3" aria-expanded="false" aria-controls="position-collapse3">
                            <div class="top-part">
                                <div class="name">
                                    <img src="/svg/i-hotel-filled.svg" alt="alt">
                                    гостиница
                                </div>
                                <div class="price">
                                    от<span>25€</span>/person
                                </div>
                                <div class="collapse-button"></div>
                            </div>
                            <div class="position-line">
                                <div class="position-line-title">Кол-во</div>
                                <div class="position-line-details">1x</div>
                                <div class="empty-block"></div>
                            </div>
                            <div class="position-line">
                                <div class="position-line-title">Personen</div>
                                <div class="position-line-details">100+</div>
                                <div class="empty-block"></div>
                            </div>
                        </div>
                        <div class="collapse position-content" id="position-collapse3">
                            <div class="bg-color">
                                <div class="position-line">
                                    <div class="position-line-title">Душ</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            свой
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кухня</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            своя
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                            </div>

                            <div class="position">
                                <div class="top-part">
                                    <div class="name">
                                        <img src="/svg/one.svg" alt="alt">
                                        одноместный
                                    </div>
                                    <div class="price">
                                        от<span>22€</span>/person
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кол-во</div>
                                    <div class="position-line-details">2x</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Personen</div>
                                    <div class="position-line-details">1</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Тип кровати</div>
                                    <div class="position-line-details">
                                        <div class="big-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Душ</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            свой
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кухня</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            своя
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                            </div>

                            <div class="position">
                                <div class="top-part">
                                    <div class="name">
                                        <img src="/svg/i-two.svg" alt="alt">
                                        двухместный
                                    </div>
                                    <div class="price">
                                        от<span>20€</span>/person
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кол-во</div>
                                    <div class="position-line-details">3x</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Personen</div>
                                    <div class="position-line-details">2</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Тип кровати</div>
                                    <div class="position-line-details">
                                        <div class="big-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Душ</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            свой
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кухня</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            своя
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                            </div>

                            <div class="position">
                                <div class="top-part">
                                    <div class="name">
                                        <img src="/svg/i-multi.svg" alt="alt">
                                        трехместный
                                    </div>
                                    <div class="price">
                                        от<span>20€</span>/person
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кол-во</div>
                                    <div class="position-line-details">5x</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Personen</div>
                                    <div class="position-line-details">4</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Тип кровати</div>
                                    <div class="position-line-details">
                                        <div class="big-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Душ</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            свой
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кухня</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            своя
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                            </div>

                            <div class="position">
                                <div class="top-part">
                                    <div class="name">
                                        <img src="/svg/i-multi.svg" alt="alt">
                                        четырехместный
                                    </div>
                                    <div class="price">
                                        от<span>20€</span>/person
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кол-во</div>
                                    <div class="position-line-details">3x</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Personen</div>
                                    <div class="position-line-details">2</div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Тип кровати</div>
                                    <div class="position-line-details">
                                        <div class="big-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Душ</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            свой
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                                <div class="position-line">
                                    <div class="position-line-title">Кухня</div>
                                    <div class="position-line-details">
                                        <div class="small-green-block line-details-color">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            своя
                                        </div>
                                    </div>
                                    <div class="empty-block"></div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="bottom-text">
                        * Текст комментария к таблице с ценами. Предложения по вашему запросу закончились, увеличьте дистанцию или свяжитесь с менежером напрямую
                    </div>

                </div>

            </div>

                <div class="comfort">
                    <h2>Удобства</h2>
                    <div class="comfort-block">
                        <h3>Кухня</h3>
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                                <img src="/svg/i-own-kitchen.svg" alt="alt">
                                <span>Eigene kuche</span>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                                <img src="/svg/i-shared-kitchen.svg" alt="alt">
                                <span>Gemeinschaftskuche</span>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                                <img src="/svg/i-fridge.svg" alt="alt">
                                <span>Kuchlshrank</span>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                                <img src="/svg/i-coffee-machine.svg" alt="alt">
                                <span>Kaffemaschine</span>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                                <img src="/svg/i-microwave-oven.svg" alt="alt">
                                <span>Mikrowelle</span>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                                <img src="/svg/i-dishwasher.svg" alt="alt">
                                <span>Spulmaschine</span>
                            </div>
                        </div>
                </div>
                <div class="comfort-block">
                    <h3>Ванная</h3>
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-bath.svg" alt="alt">
                            <span>Badewanne</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-bath.svg" alt="alt">
                            <span>Gemeinschafstbad</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-towel.svg" alt="alt">
                            <span>Handtuscher inkl.</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-no-towel.svg" alt="alt">
                            <span>Handtuscher nicht verf.</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/sauna.svg" alt="alt">
                            <span>Sauna</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-hair-dryer.svg" alt="alt">
                            <span>Fon</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-toilet.svg" alt="alt">
                            <span>Personlich toilette</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-shared-toilet.svg" alt="alt">
                            <span>Gemeinsame toilette</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-washingmachine.svg" alt="alt">
                            <span>Waschmaschine</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-own-shower.svg" alt="alt">
                            <span>Deinee dusche</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-shared-shower.svg" alt="alt">
                            <span>Gemeinschaftsdusche</span>
                        </div>
                    </div>
                </div>
                <div class="collapse show" id="comfort-collapse">
                <div class="comfort-block">
                    <h3>Комната</h3>
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-signlebed.svg" alt="alt">
                            <span>Einzelbett</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-combined-bed.svg" alt="alt">
                            <span>Getrente betten</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-extra-bed.svg" alt="alt">
                            <span>Zustellbett</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-double-bed.svg" alt="alt">
                            <span>Doppelbett</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-linens.svg" alt="alt">
                            <span>Bettwasche inkl.</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-no-linens.svg" alt="alt">
                            <span>Bettwasche nicht verf.</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-restroom.svg" alt="alt">
                            <span>Gemeinschafrsraum</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-radio.svg" alt="alt">
                            <span>Radio</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-safe.svg" alt="alt">
                            <span> Spind/Safe</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-darts.svg" alt="alt">
                            <span>Dart</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-tv.svg" alt="alt">
                            <span>TV</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-table-billiard.svg" alt="alt">
                            <span>Billiartisch</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-balcony.svg" alt="alt">
                            <span>Balkon</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-air-conditioning.svg" alt="alt">
                            <span>Kimaanlage</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-fireplace.svg" alt="alt">
                            <span>Kamin</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-computer-place.svg" alt="alt">
                            <span>Platz fur computer</span>
                        </div>
                    </div>
                </div>
                <div class="comfort-block">
                    <h3>Прочее</h3>
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-dryer.svg" alt="alt">
                            <span>Trockenschrank</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-friendly.svg" alt="alt">
                            <span>Familienfreundlich</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-gym.svg" alt="alt">
                            <span>Fitness</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-pets-friendly.svg" alt="alt">
                            <span>Haustier</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-wifi.svg" alt="alt">
                            <span>WiFi</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-iron.svg" alt="alt">
                            <span>Bugeleisen zum Bugeln</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-jacuzi.svg" alt="alt">
                            <span>Whirpool</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-table-soccer.svg" alt="alt">
                            <span>Tisch-futbal</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-smoking.svg" alt="alt">
                            <span>Raucher</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-no-smoking.svg" alt="alt">
                            <span>Nicht rauchen</span>
                        </div>
                    </div>
                </div>
                <div class="comfort-block">
                    <h3>Снаружи</h3>
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-terrace.svg" alt="alt">
                            <span>Terrace</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-parking.svg" alt="alt">
                            <span>Offentliche parkzplatz</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-car-parking.svg" alt="alt">
                            <span>PKW-Parkzplatz</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-truck-parking.svg" alt="alt">
                            <span>LKW-Parkzplatz</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-swimming-pool.svg" alt="alt">
                            <span>Schwimmbad</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-garden.svg" alt="alt">
                            <span>Wintergarten</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/garden.svg" alt="alt">
                            <span>Garten</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-disabled.svg" alt="alt">
                            <span>Barrierefrei</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-barbecue.svg" alt="alt">
                            <span>Grillmoglichkeit</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-bike.svg" alt="alt">
                            <span>Fahhradelveih</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 comfort-block-item">
                            <img src="/svg/i-elevator.svg" alt="alt">
                            <span>Heben</span>
                        </div>
                    </div>
                </div>
                </div>
                <a class="comfort-collapse-link" data-toggle="collapse" href="#comfort-collapse" role="button" aria-expanded="false" aria-controls="comfort-collapse">
                    Показать все удобства
                    <img src="/svg/i-arrow-show-more.svg" alt="alt">
                </a>
            </div>

                <div class="object-description object-description-desctope" id="object-description">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#description">Описание объекта</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#reviews">Отзывы<span>(72)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#questions">Вопросы<span>(12)</span></a>
                        </li>
                        <li class="nav-item map-active">
                            <a class="nav-link" data-toggle="tab" href="#map-block">Карта</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="description-content tab-pane fade show active" id="description">
                            Absolutely brand new, amazing studio unit (part of 3 unit complex) located in prime central Leipzig,
                            one block from Ristrasse Street. Surrounded by embassies, restaurants, cafes this makes for
                            amazing location. The apartment is totally equipped with everything including king sized bed,
                            LCD TV with Smart TV, fully equipped kitchen, balcony, Air Conditioner, High Speed Wi Fi,
                            washing machine, shower cabin and much more. Perfect place for your next stay in Leipzig!
                            Absolutely brand new, amazing studio unit (part of 3 unit complex) located in prime central
                            Leipzig, one block from Ristrasse Street. Surrounded by embassies, restaurants, cafes this
                            makes for amazing location. The apartment is totally equipped with everything including king
                            sized bed, LCD TV with Smart TV, fully equipped kitchen, balcony, Air Conditioner, High Speed
                            Wi Fi, washing machine, shower cabin and much more. Perfect place for your next stay in Leipzig!
                            <div class="collapse collapse-content" id="description-collapse">
                                Absolutely brand new, amazing studio unit (part of 3 unit complex) located in prime central Leipzig,
                                one block from Ristrasse Street. Surrounded by embassies, restaurants, cafes this makes for amazing
                                location. The apartment is totally equipped with everything including king sized bed, LCD TV with Smart TV,
                                fully equipped kitchen, balcony, Air Conditioner, High Speed Wi Fi, washing machine, shower cabin and much
                                more. Perfect place for your next stay in Leipzig! Absolutely brand new, amazing studio unit
                                (part of 3 unit complex) located in prime central Leipzig, one block from Ristrasse Street.
                                Surrounded by embassies, restaurants, cafes this makes for amazing location. The apartment is
                                totally equipped with everything including king sized bed, LCD TV with Smart TV, fully equipped
                                kitchen, balcony, Air Conditioner, High Speed Wi Fi, washing machine, shower cabin and much more.
                                Perfect place for your next stay in Leipzig!
                            </div>
                            <a class="more-details" data-toggle="collapse" href="#description-collapse" role="button" aria-expanded="false" aria-controls="description-collapse">
                                Подробнее
                                <img src="/svg/i-arrow-show-more.svg" alt="alt">
                            </a>
                        </div>
                        <div class="tab-pane fade reviews-content" id="reviews">
                            <div class="top-block">
                                <div class="top-block-head">
                                    <div class="overall-rating">
                                        <div class="top">
                                            <div class="stars">
                                                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#CBCDD1"/>
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.04586 2L7.91396 4.02558C7.91396 6 7.91396 8.58101 7.91396 11.05L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <span>4.6</span>
                                        </div>
                                        <div class="bottom">На основе отзывов</div>
                                    </div>
                                    <a class="give-feedback" href="#">Оставить отзыв</a>
                                </div>
                                <div class="empty-block">
                                <div class="reviews-form">
                                    <div class="close-form">
                                        <img src="/svg/i-close-popup.svg" alt="alt">
                                    </div>
                                    <div class="rate">
                                        <div class="title">Оцените объект:</div>
                                        <div class="stars">
                                            <img src="/svg/star-gray.svg" alt="alt">
                                            <img src="/svg/star-gray.svg" alt="alt">
                                            <img src="/svg/star-gray.svg" alt="alt">
                                            <img src="/svg/star-gray.svg" alt="alt">
                                            <img src="/svg/star-gray.svg" alt="alt">
                                        </div>
                                    </div>
                                    <form>
                                        <div class="top-form">
                                            <input type="text" placeholder="Ваше имя">
                                            <input type="text" placeholder="Название компании">
                                        </div>
                                        <input type="text" placeholder="Заголовок отзыва">
                                        <textarea placeholder="Текст отзыва"></textarea>
                                        <input type="submit" value="Отправить">
                                    </form>
                                </div>
                                </div>
                            </div>
                            <div class="reviews-block">
                                <div class="reviews-block-item">
                                    <div class="reviews-head">
                                        <img class="avatar" src="/svg/avatar.svg" alt="avatar">
                                        <div class="customer-data">
                                            <div class="name">Amina</div>
                                            <div class="entity">Tmobile LTD</div>
                                        </div>
                                    </div>
                                    <div class="set-rating">
                                        <div class="stars-item">
                                            <div class="stars-block">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#CBCDD1"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <span>4.1</span>
                                        </div>
                                        <div class="title">Sehr gute Qualität</div>
                                    </div>
                                    <div class="reviews-text">
                                        Dem Band liegt eine kleine Anleitung / Broschüre bei, in der ein paar Übungen abgebildet
                                        sind die mit dem Band durchführen kann. Das Resistance Band ist vor allem für das
                                        Sprinttraining geeignet. Man kann sich das Band um die Hüfte legen und sich wunderbar
                                        dagegen anlehnen. Vorausgesetzt, das Band ist auf der anderen Seite gut festgemacht.
                                        So lassen sich Sprints auf der Stelle durchführen. Dem Band liegt eine kleine Anleitung /
                                        Broschüre bei, in der ein paar Übungen abgebildet sind die mit dem Band durchführen kann.
                                        Das Resistance Band ist vor allem für das Sprinttraining geeignet. Man kann sich das Band um die Hüfte legen und sich wunderbar
                                        dagegen anlehnen. Vorausgesetzt, das Band ist auf der anderen Seite gut festgemacht.
                                        So lassen sich Sprints auf der Stelle durchführen.

                                    </div>
                                    <a class="full" href="#">
                                        Читать полностью
                                        <img src="/svg/i-arrow-show-more.svg" alt="alt">
                                    </a>
                                </div>

                                <div class="reviews-block-item">
                                    <div class="reviews-head">
                                        <img class="avatar" src="/svg/avatar.svg" alt="avatar">
                                        <div class="customer-data">
                                            <div class="name">Amina</div>
                                            <div class="entity">Tmobile LTD</div>
                                        </div>
                                    </div>
                                    <div class="set-rating">
                                        <div class="stars-item">
                                            <div class="stars-block">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#CBCDD1"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <span>4.1</span>
                                        </div>
                                        <div class="title">Sehr gute Qualität</div>
                                    </div>
                                    <div class="reviews-text">
                                        Dem Band liegt eine kleine Anleitung / Broschüre bei, in der ein paar Übungen
                                        abgebildet sind die mit dem Band durchführen kann. Das Resistance Band ist vor
                                        allem für das Sprinttraining geeignet.
                                    </div>
                                </div>

                                <div class="reviews-block-item">
                                    <div class="reviews-head">
                                        <img class="avatar" src="/svg/avatar.svg" alt="avatar">
                                        <div class="customer-data">
                                            <div class="name">Amina</div>
                                            <div class="entity">Tmobile LTD</div>
                                        </div>
                                    </div>
                                    <div class="set-rating">
                                        <div class="stars-item">
                                            <div class="stars-block">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#CBCDD1"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <span>4.1</span>
                                        </div>
                                        <div class="title">Sehr gute Qualität</div>
                                    </div>
                                    <div class="reviews-text">
                                        Dem Band liegt eine kleine Anleitung / Broschüre bei, in der ein paar Übungen abgebildet
                                        sind die mit dem Band durchführen kann. Das Resistance Band ist vor allem für das
                                        Sprinttraining geeignet. Man kann sich das Band um die Hüfte legen und sich wunderbar
                                        dagegen anlehnen. Vorausgesetzt, das Band ist auf der anderen Seite gut festgemacht.
                                        So lassen sich Sprints auf der Stelle durchführen. Dem Band liegt eine kleine Anleitung /
                                        Broschüre bei, in der ein paar Übungen abgebildet sind die mit dem Band durchführen kann.
                                        Das Resistance Band ist vor allem für das Sprinttraining geeignet. Man kann sich das Band um die Hüfte legen und sich wunderbar
                                        dagegen anlehnen. Vorausgesetzt, das Band ist auf der anderen Seite gut festgemacht.
                                        So lassen sich Sprints auf der Stelle durchführen.

                                    </div>
                                    <a class="full" href="#">
                                        Читать полностью
                                        <img src="/svg/i-arrow-show-more.svg" alt="alt">
                                    </a>
                                </div>

                            </div>
                            <div class="pagination-block">
                                <ul class="pagination-list">
                                    <li class="prev">
                                        <a href="">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.4227 1.57613C9.65702 1.81044 9.65702 2.19034 9.4227 2.42465L4.84697 7.00039L9.4227 11.5761C9.65702 11.8104 9.65702 12.1903 9.4227 12.4247C9.18839 12.659 8.80849 12.659 8.57417 12.4247L3.57417 7.42465C3.33986 7.19034 3.33986 6.81044 3.57417 6.57613L8.57417 1.57613C8.80849 1.34181 9.18839 1.34181 9.4227 1.57613Z" fill="#3B8B3E"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="number-page"><a class="active" href="#">1</a></li>
                                    <li class="number-page"><a href="#">2</a></li>
                                    <li class="number-page"><a href="#">3</a></li>
                                    <li class="number-page"><a href="#">4</a></li>
                                    <li class="next">
                                        <a href="">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.5773 1.57613C4.34298 1.81044 4.34298 2.19034 4.5773 2.42465L9.15303 7.00039L4.5773 11.5761C4.34298 11.8104 4.34298 12.1903 4.5773 12.4247C4.81161 12.659 5.19151 12.659 5.42583 12.4247L10.4258 7.42465C10.6601 7.19034 10.6601 6.81044 10.4258 6.57613L5.42583 1.57613C5.19151 1.34181 4.81161 1.34181 4.5773 1.57613Z" fill="#3B8B3E"/>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade questions-content" id="questions">
                            <form class="questions-form">
                                <input type="text" placeholder="Задайте свой вопрос">
                                <a class="submit" href="#">Отправить</a>
                            </form>
                            <div class="questions-received">
                                <div class="questions-block">
                                    <div class="questions" data-toggle="collapse" data-target="#questions1" aria-expanded="false" aria-controls="questions1">
                                        <div class="collapse-button"></div>
                                        Сколько квартир в этом доме?
                                    </div>
                                    <div class="collapse " id="questions1">
                                        <div class="answer">
                                            Dem Band liegt eine kleine Anleitung / Broschüre bei, in der ein paar Übungen
                                            abgebildet sind die mit dem Band durchführen kann. Das Resistance Band ist vor
                                            allem für das Sprinttraining geeignet. Man kann sich das Band um die Hüfte legen
                                            und sich wunderbar dagegen anlehnen. Vorausgesetzt, das Band ist auf der anderen
                                            Seite gut festgemacht.
                                        </div>
                                    </div>
                                </div>
                                <div class="questions-block">
                                    <div class="questions" data-toggle="collapse" data-target="#questions2" aria-expanded="false" aria-controls="questions2">
                                        <div class="collapse-button"></div>
                                        Мы хотим приехать большой компанией. Вы сможете нас встретить?
                                    </div>
                                    <div class="collapse " id="questions2">
                                        <div class="answer">
                                            Dem Band liegt eine kleine Anleitung / Broschüre bei, in der ein paar Übungen
                                            abgebildet sind die mit dem Band durchführen kann. Das Resistance Band ist vor
                                            allem für das Sprinttraining geeignet. Man kann sich das Band um die Hüfte legen
                                            und sich wunderbar dagegen anlehnen. Vorausgesetzt, das Band ist auf der anderen
                                            Seite gut festgemacht.
                                        </div>
                                    </div>
                                </div>
                                <div class="questions-block">
                                    <div class="questions" data-toggle="collapse" data-target="#questions3" aria-expanded="false" aria-controls="questions3">
                                        <div class="collapse-button"></div>
                                        Мы хотим приехать большой компанией. Вы сможете нас встретить?
                                    </div>
                                    <div class="collapse " id="questions3">
                                        <div class="answer">
                                            Dem Band liegt eine kleine Anleitung / Broschüre bei, in der ein paar Übungen
                                            abgebildet sind die mit dem Band durchführen kann. Das Resistance Band ist vor
                                            allem für das Sprinttraining geeignet. Man kann sich das Band um die Hüfte legen
                                            und sich wunderbar dagegen anlehnen. Vorausgesetzt, das Band ist auf der anderen
                                            Seite gut festgemacht.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade map-content" id="map-block">
                            <div id="map"></div>
                            <script>
                                var map, map2;
                            function initMap() {
                                var mapCanvas = document.getElementById("map");
                                var mapCanvas2 = document.getElementById("map-mobile");
                                var myCenter = new google.maps.LatLng(51.337542, 12.367605);
                                var myCenter2 = new google.maps.LatLng(51.337542, 12.367605);
                                var myTrip = [{lat:51.306084, lng:12.208921},
                                              {lat:51.219721, lng:12.327711},
                                              {lat:51.276026, lng:12.377149},
                                              {lat:51.330974, lng:12.601682},
                                              {lat:51.380715, lng:12.488386},
                                              {lat:51.463781, lng:12.453367},
                                              {lat:51.423980, lng:12.304365},
                                              {lat:51.397426, lng:12.211668}];
                                var myTrip2 = [{lat:51.306084, lng:12.208921},
                                    {lat:51.219721, lng:12.327711},
                                    {lat:51.276026, lng:12.377149},
                                    {lat:51.330974, lng:12.601682},
                                    {lat:51.380715, lng:12.488386},
                                    {lat:51.463781, lng:12.453367},
                                    {lat:51.423980, lng:12.304365},
                                    {lat:51.397426, lng:12.211668}];
                                var mapOptions = {
                                    center: myCenter,
                                    zoom: 10,
                                    disableDefaultUI: true,
                                    zoomControl: true,
                                    zoomControlOptions: {
                                        style: google.maps.ZoomControlStyle.DEFAULT,
                                        position: google.maps.ControlPosition.TOP_RIGHT
                                    },
                                    mapTypeId: google.maps.MapTypeId.DESCTOPE
                                };
                                var mapOptions2 = {
                                    center: myCenter,
                                    zoom: 10,
                                    disableDefaultUI: true,
                                    zoomControl: true,
                                    zoomControlOptions: {
                                        style: google.maps.ZoomControlStyle.DEFAULT,
                                        position: google.maps.ControlPosition.TOP_RIGHT
                                    },
                                    mapTypeId: google.maps.MapTypeId.MOBILE
                                };
                                var images = '/img/point-img.png';
                                var marker = new google.maps.Marker ({
                                    position: myCenter,
                                    map: mapCanvas,
                                    icon: images
                                });
                                var marker2 = new google.maps.Marker ({
                                    position: myCenter2,
                                    map: mapCanvas2
                                });
                                var map = new google.maps.Map(mapCanvas ,mapOptions);
                                var map2 = new google.maps.Map(mapCanvas2 ,mapOptions2);

                                var contentString = '<div id="content">'+
                                                    '<span class="index">04109</span>'+
                                                    '<span>&nbsp;</span>'+
                                                    '<span class="town">Leipzig</span>'+
                                                    '</div>';
                                var contentString2 = '<div id="content">'+
                                    '<span class="index">04109</span>'+
                                    '<span>&nbsp;</span>'+
                                    '<span class="town">Leipzig</span>'+
                                    '</div>';
                                var infowindow = new google.maps.InfoWindow({
                                    content: contentString
                                });
                                var infowindow2 = new google.maps.InfoWindow({
                                    content: contentString2
                                });
                                infowindow.open(map, marker);
                                infowindow2.open(map2, marker2);

                                var flightPath = new google.maps.Polygon({
                                    path: myTrip,
                                    strokeColor: "#6bb638",
                                    strokeOpacity: 0.8,
                                    strokeWeight: 2,
                                    fillColor: "rgb(117, 242, 122)",
                                    fillOpacity: 0.2
                                });
                                var flightPath2 = new google.maps.Polygon({
                                    path: myTrip2,
                                    strokeColor: "#6bb638",
                                    strokeOpacity: 1,
                                    strokeWeight: 2,
                                    fillColor: "rgb(117, 242, 122)",
                                    fillOpacity: 0.2
                            });

                                marker.setMap(map);
                                marker2.setMap(map2);
                                flightPath.setMap(map);
                                flightPath2.setMap(map2);
                            }
                        </script>
                        </div>
                    </div>
                </div>

                <div class="mobile-object-description object-description">

                    <div class="mobile-description-content paddings-block">
                        <div class="head-collapse" data-toggle="collapse" data-target="#mobile-description-content-collapse" aria-expanded="false" aria-controls="mobile-description-content-collapse">
                            <div>Описание объекта</div>
                            <div class="decompose-button"></div>
                        </div>
                        <div class="collapse" id="mobile-description-content-collapse">
                            <div class="description-content">
                                Absolutely brand new, amazing studio unit (part of 3 unit complex) located in prime central Leipzig,
                                one block from Ristrasse Street. Surrounded by embassies, restaurants, cafes this makes for
                                amazing location. The apartment is totally equipped with everything including king sized bed,
                                LCD TV with Smart TV, fully equipped kitchen, balcony, Air Conditioner, High Speed Wi Fi,
                                washing machine, shower cabin and much more. Perfect place for your next stay in Leipzig!
                                Absolutely brand new, amazing studio unit (part of 3 unit complex) located in prime central
                                Leipzig, one block from Ristrasse Street. Surrounded by embassies, restaurants, cafes this
                                makes for amazing location. The apartment is totally equipped with everything including king
                                sized bed, LCD TV with Smart TV, fully equipped kitchen, balcony, Air Conditioner, High Speed
                                Wi Fi, washing machine, shower cabin and much more. Perfect place for your next stay in Leipzig!
                                <div class="collapse collapse-content" id="description-collapse">
                                    Absolutely brand new, amazing studio unit (part of 3 unit complex) located in prime central Leipzig,
                                    one block from Ristrasse Street. Surrounded by embassies, restaurants, cafes this makes for amazing
                                    location. The apartment is totally equipped with everything including king sized bed, LCD TV with Smart TV,
                                    fully equipped kitchen, balcony, Air Conditioner, High Speed Wi Fi, washing machine, shower cabin and much
                                    more. Perfect place for your next stay in Leipzig! Absolutely brand new, amazing studio unit
                                    (part of 3 unit complex) located in prime central Leipzig, one block from Ristrasse Street.
                                    Surrounded by embassies, restaurants, cafes this makes for amazing location. The apartment is
                                    totally equipped with everything including king sized bed, LCD TV with Smart TV, fully equipped
                                    kitchen, balcony, Air Conditioner, High Speed Wi Fi, washing machine, shower cabin and much more.
                                    Perfect place for your next stay in Leipzig!
                                </div>
                                <a class="more-details" data-toggle="collapse" href="#description-collapse" role="button" aria-expanded="false" aria-controls="description-collapse">
                                    Подробнее
                                    <img src="/svg/i-arrow-show-more.svg" alt="alt">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="reviews-content mobile-reviews-content paddings-block">
                        <div class="head-collapse" data-toggle="collapse" data-target="#mobile-reviews-content-collapse" aria-expanded="false" aria-controls="mobile-reviews-content-collapse">
                            <div>Отзывы <span>(72)</span></div>
                            <div class="decompose-button"></div>
                        </div>
                        <div class="collapse" id="mobile-reviews-content-collapse">
                            <div class="overall-rating">
                                <div class="top">
                                    <div class="stars">
                                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0)">
                                                <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0">
                                                    <rect width="12" height="12" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0)">
                                                <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0">
                                                    <rect width="12" height="12" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0)">
                                                <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0">
                                                    <rect width="12" height="12" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0)">
                                                <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0">
                                                    <rect width="12" height="12" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0)">
                                                <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#CBCDD1"/>
                                                <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.04586 2L7.91396 4.02558C7.91396 6 7.91396 8.58101 7.91396 11.05L6.00032 9.77196Z" fill="#F5C61C"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0">
                                                    <rect width="12" height="12" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <span>4.6</span>
                                </div>
                                <div class="bottom">На основе отзывов</div>
                            </div>
                            <div class="link-container"><a class="give-feedback" href="#">Оставить отзыв</a></div>
                            <div class="empty-block">
                                <div class="reviews-form">
                                    <div class="close-form">
                                        <img src="/svg/i-close-popup.svg" alt="alt">
                                    </div>
                                    <div class="rate">
                                        <div class="title">Оцените объект:</div>
                                        <div class="stars">
                                            <img src="/svg/star-gray.svg" alt="alt">
                                            <img src="/svg/star-gray.svg" alt="alt">
                                            <img src="/svg/star-gray.svg" alt="alt">
                                            <img src="/svg/star-gray.svg" alt="alt">
                                            <img src="/svg/star-gray.svg" alt="alt">
                                        </div>
                                    </div>
                                    <form>
                                        <div class="top-form">
                                            <input type="text" placeholder="Ваше имя">
                                            <input type="text" placeholder="Название компании">
                                        </div>
                                        <input type="text" placeholder="Заголовок отзыва">
                                        <textarea placeholder="Текст отзыва"></textarea>
                                        <input type="submit" value="Отправить">
                                    </form>
                                </div>
                            </div>
                            <div class="reviews-block">
                                <div class="reviews-block-item">
                                    <div class="reviews-head">
                                        <img class="avatar" src="/svg/avatar.svg" alt="avatar">
                                        <div class="customer-data">
                                            <div class="name">Amina</div>
                                            <div class="entity">Tmobile LTD</div>
                                        </div>
                                    </div>
                                    <div class="set-rating">
                                        <div class="stars-item">
                                            <div class="stars-block">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#CBCDD1"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <span>4.1</span>
                                        </div>
                                        <div class="title">Sehr gute Qualität</div>
                                    </div>
                                    <div class="reviews-text">
                                        Dem Band liegt eine kleine Anleitung / Broschüre bei, in der ein paar Übungen abgebildet
                                        sind die mit dem Band durchführen kann. Das Resistance Band ist vor allem für das
                                        Sprinttraining geeignet. Man kann sich das Band um die Hüfte legen und sich wunderbar
                                        dagegen anlehnen. Vorausgesetzt, das Band ist auf der anderen Seite gut festgemacht.
                                        So lassen sich Sprints auf der Stelle durchführen. Dem Band liegt eine kleine Anleitung /
                                        Broschüre bei, in der ein paar Übungen abgebildet sind die mit dem Band durchführen kann.
                                        Das Resistance Band ist vor allem für das Sprinttraining geeignet. Man kann sich das Band um die Hüfte legen und sich wunderbar
                                        dagegen anlehnen. Vorausgesetzt, das Band ist auf der anderen Seite gut festgemacht.
                                        So lassen sich Sprints auf der Stelle durchführen.

                                    </div>
                                    <a class="full" href="#">
                                        Читать полностью
                                        <img src="/svg/i-arrow-show-more.svg" alt="alt">
                                    </a>
                                </div>

                                <div class="reviews-block-item">
                                    <div class="reviews-head">
                                        <img class="avatar" src="/svg/avatar.svg" alt="avatar">
                                        <div class="customer-data">
                                            <div class="name">Amina</div>
                                            <div class="entity">Tmobile LTD</div>
                                        </div>
                                    </div>
                                    <div class="set-rating">
                                        <div class="stars-item">
                                            <div class="stars-block">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#CBCDD1"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <span>4.1</span>
                                        </div>
                                        <div class="title">Sehr gute Qualität</div>
                                    </div>
                                    <div class="reviews-text">
                                        Dem Band liegt eine kleine Anleitung / Broschüre bei, in der ein paar Übungen
                                        abgebildet sind die mit dem Band durchführen kann. Das Resistance Band ist vor
                                        allem für das Sprinttraining geeignet.
                                    </div>
                                </div>

                                <div class="reviews-block-item">
                                    <div class="reviews-head">
                                        <img class="avatar" src="/svg/avatar.svg" alt="avatar">
                                        <div class="customer-data">
                                            <div class="name">Amina</div>
                                            <div class="entity">Tmobile LTD</div>
                                        </div>
                                    </div>
                                    <div class="set-rating">
                                        <div class="stars-item">
                                            <div class="stars-block">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#CBCDD1"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="12" height="12" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <span>4.1</span>
                                        </div>
                                        <div class="title">Sehr gute Qualität</div>
                                    </div>
                                    <div class="reviews-text">
                                        Dem Band liegt eine kleine Anleitung / Broschüre bei, in der ein paar Übungen abgebildet
                                        sind die mit dem Band durchführen kann. Das Resistance Band ist vor allem für das
                                        Sprinttraining geeignet. Man kann sich das Band um die Hüfte legen und sich wunderbar
                                        dagegen anlehnen. Vorausgesetzt, das Band ist auf der anderen Seite gut festgemacht.
                                        So lassen sich Sprints auf der Stelle durchführen. Dem Band liegt eine kleine Anleitung /
                                        Broschüre bei, in der ein paar Übungen abgebildet sind die mit dem Band durchführen kann.
                                        Das Resistance Band ist vor allem für das Sprinttraining geeignet. Man kann sich das Band um die Hüfte legen und sich wunderbar
                                        dagegen anlehnen. Vorausgesetzt, das Band ist auf der anderen Seite gut festgemacht.
                                        So lassen sich Sprints auf der Stelle durchführen.

                                    </div>
                                    <a class="full" href="#">
                                        Читать полностью
                                        <img src="/svg/i-arrow-show-more.svg" alt="alt">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="questions-content mobile-questions-content paddings-block">
                        <div class="head-collapse" data-toggle="collapse" data-target="#mobile-questions-content-collapse" aria-expanded="false" aria-controls="mobile-questions-content-collapse">
                            <div>Вопросы <span>(12)</span></div>
                            <div class="decompose-button"></div>
                        </div>
                        <div class="collapse" id="mobile-questions-content-collapse">
                            <form class="questions-form">
                                <input type="text" placeholder="Задайте свой вопрос">
                                <a class="submit" href="#">Отправить</a>
                            </form>
                            <div class="questions-received">
                                <div class="questions-block">
                                    <div class="questions" data-toggle="collapse" data-target="#questions1" aria-expanded="false" aria-controls="questions1">
                                        <div class="collapse-button"></div>
                                        Сколько квартир в этом доме?
                                    </div>
                                    <div class="collapse " id="questions1">
                                        <div class="answer">
                                            Dem Band liegt eine kleine Anleitung / Broschüre bei, in der ein paar Übungen
                                            abgebildet sind die mit dem Band durchführen kann. Das Resistance Band ist vor
                                            allem für das Sprinttraining geeignet. Man kann sich das Band um die Hüfte legen
                                            und sich wunderbar dagegen anlehnen. Vorausgesetzt, das Band ist auf der anderen
                                            Seite gut festgemacht.
                                        </div>
                                    </div>
                                </div>
                                <div class="questions-block">
                                    <div class="questions" data-toggle="collapse" data-target="#questions2" aria-expanded="false" aria-controls="questions2">
                                        <div class="collapse-button"></div>
                                        Мы хотим приехать большой компанией. Вы сможете нас встретить?
                                    </div>
                                    <div class="collapse " id="questions2">
                                        <div class="answer">
                                            Dem Band liegt eine kleine Anleitung / Broschüre bei, in der ein paar Übungen
                                            abgebildet sind die mit dem Band durchführen kann. Das Resistance Band ist vor
                                            allem für das Sprinttraining geeignet. Man kann sich das Band um die Hüfte legen
                                            und sich wunderbar dagegen anlehnen. Vorausgesetzt, das Band ist auf der anderen
                                            Seite gut festgemacht.
                                        </div>
                                    </div>
                                </div>
                                <div class="questions-block">
                                    <div class="questions" data-toggle="collapse" data-target="#questions3" aria-expanded="false" aria-controls="questions3">
                                        <div class="collapse-button"></div>
                                        Мы хотим приехать большой компанией. Вы сможете нас встретить?
                                    </div>
                                    <div class="collapse " id="questions3">
                                        <div class="answer">
                                            Dem Band liegt eine kleine Anleitung / Broschüre bei, in der ein paar Übungen
                                            abgebildet sind die mit dem Band durchführen kann. Das Resistance Band ist vor
                                            allem für das Sprinttraining geeignet. Man kann sich das Band um die Hüfte legen
                                            und sich wunderbar dagegen anlehnen. Vorausgesetzt, das Band ist auf der anderen
                                            Seite gut festgemacht.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-map-content paddings-block click-collapse" id="map-mobile-block">
                        <div class="head-collapse" data-toggle="collapse" data-target="#mobile-map-content-collapse" aria-expanded="false" aria-controls="mobile-questions-content-collapse">
                            <div>Карта</div>
                            <div class="decompose-button"></div>
                        </div>
                        <div class="collapse" id="mobile-map-content-collapse">
                            <div class="map-content">
                            <div id="map-mobile"></div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
            <div class="right-part">
                <div class="right-part-item">
            <div class="sidebar desctop-sidebar">
                <div class="sidebar-top">
                    <div class="sidebar-top-block roominess">
                        <img src="/svg/i-people.svg" alt="alt">
                        <div class="sidebar-top-block-item roominess-item">
                            <div class="title">Вместит.:</div>
                            <div class="subtitle">2 – 14 чел.</div>
                        </div>
                    </div>
                    <div class="sidebar-top-block rental-period">
                        <img src="/svg/i-clock.svg" alt="alt">
                        <div class="sidebar-top-block-item rental-period-item">
                            <div class="title">Мин. срок аренды:</div>
                            <div class="subtitle">3 дня</div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-middle">
                    <div class="price">
                        <div class="left">от</div>
                        <div class="middle">€250</div>
                        <div class="right">на человека (включая НДС)</div>
                    </div>
                    <a href="#" class="inquiry">Отправить запрос</a>
                    <div class="number-phone">
                        <a href="tel:+4917616573456">+49 176&nbsp;<span class="num_hide">1657 3456</span></a>
                        <span class="sh_nmr">показать</span>
                        <div class="message">Сообщите что вы с сайта Immbilien.de</div>
                        <div class="language">
                            <div class="speaks">Говорит на:</div>
                            <div class="language-item">EN, RU, DE</div>
                        </div>
                    </div>
                    <div class="address-map">
                        <div class="address">DKN Immobilien <span>Anja Klepzigolf</span> Kolonnadenstr. 1 04109 Leipzig</div>
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
                            <span>Teilen</span>
                        </a>

                        <div class="modal-share-block sidebar-modal-block">
                            <div class="overlay"></div>
                            <div class="share-block sidebar-small-block">
                                <h3>Поделиться:</h3>
                                <div class="close-block"><img src="/svg/i-close-burger.svg" alt="alt"></div>
                                <div class="share-block-content">
                                    <div class="row">
                                        <div class="col-4 share-block-item">
                                            <a href="#">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.97521 0C1.33205 0 0 1.33205 0 2.97521V17.0248C0 18.668 1.33205 20 2.97521 20H8.9539V12.8409H6.36364V9.8794H8.9539V7.62232C8.9539 5.05466 10.477 3.63636 12.8073 3.63636C13.9235 3.63636 15.0909 3.83646 15.0909 3.83646V6.3577H13.8045C12.5373 6.3577 12.142 7.14829 12.142 7.95849V9.8794H14.9714L14.5191 12.8409H12.142V20H17.0248C18.668 20 20 18.668 20 17.0248V2.97521C20 1.33205 18.668 0 17.0248 0H2.97521Z" fill="#7A8793"/>
                                                </svg>
                                                <span>Facebook</span>
                                            </a>
                                        </div>
                                        <div class="col-4 share-block-item">
                                            <a href="#">
                                                <svg width="24" height="19" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M23.25 2.77C22.38 3.1375 21.51 3.385 20.5875 3.4825C21.555 2.9125 22.2525 2.08 22.6275 0.9475C21.7174 1.48054 20.7271 1.86297 19.695 2.08C18.7725 1.12 17.6325 0.625 16.3125 0.625C13.755 0.625 11.685 2.6725 11.685 5.215C11.685 5.5825 11.7375 5.9275 11.8125 6.25C8.1075 6.0775 4.68 4.3 2.3175 1.465C1.8975 2.1775 1.6725 2.9425 1.6725 3.7825C1.6725 5.335 2.445 6.715 3.735 7.5775C2.985 7.555 2.295 7.3525 1.62 7.0075V7.06C1.62 9.2275 3.21 11.125 5.325 11.545C4.8525 11.6725 4.455 11.7175 4.11 11.7175C3.885 11.7175 3.585 11.695 3.2625 11.62C3.55234 12.5367 4.12498 13.3382 4.89834 13.9094C5.67169 14.4807 6.60606 14.7925 7.5675 14.8C5.9025 16.105 3.9825 16.7725 1.8225 16.7725C1.4025 16.7725 1.0275 16.75 0.75 16.6975C2.8875 18.0775 5.25 18.7675 7.8075 18.7675C13.275 18.7675 17.43 15.76 19.44 11.7925C20.46 9.7975 20.955 7.7725 20.955 5.725V5.38C20.9325 5.2525 20.9325 5.155 20.9325 5.1325C21.838 4.4845 22.6224 3.68227 23.25 2.7625" fill="#7A8793"/>
                                                </svg>
                                                <span>Twitter</span>
                                            </a>
                                        </div>
                                        <div class="col-4 share-block-item">
                                            <a href="#">
                                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18 0H2C0.9 0 0.00999999 0.9 0.00999999 2L0 14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2C20 0.9 19.1 0 18 0ZM17.6 4.25L10.53 8.67C10.21 8.87 9.79 8.87 9.47 8.67L2.4 4.25C2.15 4.09 2 3.82 2 3.53C2 2.86 2.73 2.46 3.3 2.81L10 7L16.7 2.81C17.27 2.46 18 2.86 18 3.53C18 3.82 17.85 4.09 17.6 4.25Z" fill="#7A8793"/>
                                                </svg>
                                                <span>Email</span>
                                            </a>
                                        </div>
                                        <div class="col-4 share-block-item">
                                            <a href="#">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5275 15.8854C17.295 16.5379 16.1775 17.1304 15.6375 17.2129C15.15 17.2879 14.5425 17.3179 13.875 17.1004C13.3324 16.9341 12.7991 16.7388 12.2775 16.5154C9.4725 15.3079 7.635 12.4954 7.4925 12.3079C7.35 12.1204 6.3525 10.8004 6.3525 9.42787C6.3525 8.05537 7.08 7.38037 7.335 7.10287C7.59 6.82537 7.8975 6.75787 8.085 6.75787C8.2725 6.75787 8.46 6.75787 8.6175 6.76537C8.79 6.77287 9.0225 6.69787 9.2475 7.24537C9.48 7.80787 10.0425 9.17287 10.11 9.31537C10.1775 9.45037 10.23 9.61537 10.1325 9.80287C10.0425 9.99037 9.99 10.1029 9.855 10.2679C9.7125 10.4329 9.5625 10.6279 9.435 10.7554C9.2925 10.8979 9.15 11.0479 9.315 11.3254C9.48 11.6029 10.0425 12.5179 10.875 13.2604C11.9475 14.2054 12.8475 14.5054 13.125 14.6404C13.4025 14.7829 13.5675 14.7604 13.7325 14.5729C13.8975 14.3854 14.43 13.7554 14.6175 13.4779C14.805 13.2004 14.9925 13.2454 15.2475 13.3354C15.5025 13.4254 16.8825 14.1004 17.16 14.2429C17.4375 14.3854 17.625 14.4529 17.7 14.5654C17.7675 14.6854 17.7675 15.2404 17.535 15.8929L17.5275 15.8854ZM19.98 4.02787C18.9395 2.98701 17.7034 2.16224 16.3429 1.60103C14.9823 1.03983 13.5242 0.753275 12.0525 0.757867C5.88 0.757867 0.8475 5.76037 0.8475 11.9104C0.844465 13.867 1.3594 15.7896 2.34 17.4829L0.75 23.2579L6.69 21.7054C8.3342 22.5965 10.1748 23.0631 12.045 23.0629H12.0525C18.225 23.0629 23.25 18.0604 23.2575 11.9104C23.2619 10.4436 22.9744 8.99054 22.4118 7.63595C21.8491 6.28137 21.0224 5.0523 19.98 4.02037" fill="#7A8793"/>
                                                </svg>
                                                <span>WhatsApp</span>
                                            </a>
                                        </div>
                                        <div class="col-4 share-block-item">
                                            <a href="#">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1925 14.9625L10.14 11.7L4.1775 14.9625L10.7325 8.0025L13.86 11.265L19.7475 8.0025L13.1925 14.9625ZM12 0C5.37 0 0 4.9725 0 11.115C0 14.61 1.7475 17.73 4.47 19.77V24L8.5575 21.7575C9.67886 22.0666 10.8368 22.223 12 22.2225C18.63 22.2225 24 17.25 24 11.1075C24 4.9725 18.63 0 12 0V0Z" fill="#7A8793"/>
                                                </svg>
                                                <span>Messanger</span>
                                            </a>
                                        </div>
                                        <div class="col-4 share-block-item">
                                            <a href="#">
                                                <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13 0H2C0.9 0 0 0.9 0 2V15C0 15.55 0.45 16 1 16C1.55 16 2 15.55 2 15V3C2 2.45 2.45 2 3 2H13C13.55 2 14 1.55 14 1C14 0.45 13.55 0 13 0ZM13.59 4.59L18.42 9.42C18.79 9.79 19 10.3 19 10.83V20C19 21.1 18.1 22 17 22H5.99C4.89 22 4 21.1 4 20L4.01 6C4.01 4.9 4.9 4 6 4H12.17C12.7 4 13.21 4.21 13.59 4.59ZM13 11H17.5L12 5.5V10C12 10.55 12.45 11 13 11Z" fill="#7A8793"/>
                                                </svg>
                                                <span>Copy link</span>
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
                            <span>Drucken</span>
                        </a>
                    </div>
                    <div class="sidebar-bottom-block sidebar-bottom-modal">
                        <a class="melden" href="#">
                            <img class="not-hover" src="/svg/i-report.svg" alt="">
                            <img class="hover" src="/svg/i-report-hover.svg" alt="">
                            <span>Melden</span>
                        </a>

                        <div class="modal-offer-block sidebar-modal-block">
                            <div class="overlay"></div>
                            <div class="offer sidebar-small-block">
                                <div class="close-block"><img src="/svg/i-close-burger.svg" alt="alt"></div>
                                <h3>Das Angebot</h3>
                                <div class="offer-select">
                                    <label for="offer-select">Причина жалобы</label>
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
                                    <textarea placeholder="Erläuterung zur Beanstandung"></textarea>
                                </div>
                                <a class="submit" href="#">Отправить</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

                <div class="modal-quality-block sidebar-modal-block">
                    <div class="overlay"></div>
                    <div class="quality sidebar-small-block">
                        <div class="close-block"><img src="/svg/i-close-burger.svg" alt="alt"></div>
                        <h3>Оцените качество звонка</h3>
                        <div class="stars">
                            <img src="/svg/star-gray.svg" alt="alt">
                            <img src="/svg/star-gray.svg" alt="alt">
                            <img src="/svg/star-gray.svg" alt="alt">
                            <img src="/svg/star-gray.svg" alt="alt">
                            <img src="/svg/star-gray.svg" alt="alt">
                        </div>
                        <div class="links">
                            <a class="another-time" href="#">В другой раз</a>
                            <a class="get-through" href="#">Я не дозвонился</a>
                        </div>
                    </div>
                </div>


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

        <div class="single-load-content">
            <div class="main-load-block">
                <div class="top-block">
                    <div class="mobile-images-sidebar">
                    <div class="images-block">
                        <svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="62" height="62" rx="4" fill="#D8D8D8"/>
                            <path d="M19.375 36.8125L7.75 52.3125H54.25L40.6875 31L29.0625 46.5L19.375 36.8125Z" fill="#EDEDEF"/>
                        </svg>
                    </div>
                        <div class="load-sidebar load-sidebar-mobile">
                            <div class="sidebar-head">
                                <div class="sidebar-head-item"></div>
                                <div class="sidebar-head-item"></div>
                                <div class="sidebar-head-item"></div>
                                <div class="sidebar-head-item"></div>
                            </div>
                            <div class="sidebar-body">
                                <div class="small-block"></div>
                                <div class="big-block"></div>
                                <div class="big-block"></div>
                                <div class="sidebar-body-item">
                                    <div class="address">
                                        <div class="address-item"></div>
                                        <div class="address-item"></div>
                                        <div class="address-item"></div>
                                    </div>
                                    <div class="map">
                                        <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect y="0.00195312" width="22" height="22" rx="2" fill="#D8D8D8"/>
                                            <path d="M6.875 13.0645L2.75 18.5645H19.25L14.4375 11.002L10.3125 16.502L6.875 13.0645Z" fill="#EDEDEF"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-footer"></div>
                        </div>
                        <div class="head-title-block"></div>
                        <div class="subtitle-block"></div>
                    </div>
                    <div class="top-block-content top-block-content-desctop">
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                        <div class="content-item"></div>
                    </div>
                    <div class="top-block-content top-block-content-mobile">
                        <div class="title"></div>
                        <div class="mobile-block-item">
                            <div class="line-block">
                                <div class="block-item"></div>
                                <div class="block-item"></div>
                                <div class="circle-item"></div>
                            </div>
                            <div class="line-block">
                                <div class="block-item"></div>
                                <div class="block-item"></div>
                                <div class="empty"></div>
                            </div>
                            <div class="line-block">
                                <div class="block-item"></div>
                                <div class="block-item"></div>
                                <div class="empty"></div>
                            </div>
                        </div>
                        <div class="mobile-block-item">
                            <div class="line-block">
                                <div class="block-item"></div>
                                <div class="block-item"></div>
                                <div class="circle-item"></div>
                            </div>
                            <div class="line-block">
                                <div class="block-item"></div>
                                <div class="block-item"></div>
                                <div class="empty"></div>
                            </div>
                            <div class="line-block">
                                <div class="block-item"></div>
                                <div class="block-item"></div>
                                <div class="empty"></div>
                            </div>
                        </div>
                        <div class="mobile-block-item">
                            <div class="line-block">
                                <div class="block-item"></div>
                                <div class="block-item"></div>
                                <div class="circle-item"></div>
                            </div>
                            <div class="line-block">
                                <div class="block-item"></div>
                                <div class="block-item"></div>
                                <div class="empty"></div>
                            </div>
                            <div class="line-block">
                                <div class="block-item"></div>
                                <div class="block-item"></div>
                                <div class="empty"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="middle-block">
                    <div class="head-title-block"></div>
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6 middle-block-item">
                            <div class="title"></div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                            <div class="content-block">
                                <div class="circle"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="link"></div>
                </div>
                <div class="bottom-block bottom-block-desctop">
                    <div class="head-block">
                        <div class="head-block-item"></div>
                        <div class="head-block-item"></div>
                        <div class="head-block-item"></div>
                    </div>
                    <div class="middle-content-block">
                        <div class="middle-content-block-item"></div>
                        <div class="middle-content-block-item"></div>
                        <div class="middle-content-block-item"></div>
                        <div class="middle-content-block-item"></div>
                        <div class="middle-content-block-item"></div>
                        <div class="middle-content-block-item"></div>
                        <div class="middle-content-block-item"></div>
                    </div>
                    <div claSS="footer-block"></div>
                </div>
                <div class="bottom-block bottom-block-mobile">
                    <div class="mobile-block">
                        <div class="content"></div>
                        <div class="circle-item"></div>
                    </div>
                    <div class="mobile-block">
                        <div class="content"></div>
                        <div class="circle-item"></div>
                    </div>
                    <div class="mobile-block">
                        <div class="content"></div>
                        <div class="circle-item"></div>
                    </div>
                </div>
            </div>

            <div class="load-sidebar load-sidebar-desctope">
                <div class="sidebar-head">
                    <div class="sidebar-head-item"></div>
                    <div class="sidebar-head-item"></div>
                    <div class="sidebar-head-item"></div>
                    <div class="sidebar-head-item"></div>
                </div>
                <div class="sidebar-body">
                    <div class="small-block"></div>
                    <div class="big-block"></div>
                    <div class="big-block"></div>
                    <div class="sidebar-body-item">
                        <div class="address">
                            <div class="address-item"></div>
                            <div class="address-item"></div>
                            <div class="address-item"></div>
                        </div>
                        <div class="map">
                            <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect y="0.00195312" width="22" height="22" rx="2" fill="#D8D8D8"/>
                                <path d="M6.875 13.0645L2.75 18.5645H19.25L14.4375 11.002L10.3125 16.502L6.875 13.0645Z" fill="#EDEDEF"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="sidebar-footer"></div>
            </div>
        </div>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChFeaunpThR-Lo4t-SMP3n7s-fDBs67hU&callback=initMap" async defer></script>

    </div>

@endsection
