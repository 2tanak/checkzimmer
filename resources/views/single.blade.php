@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="single-content">
            <div class="main-block">
                <div class="single-gallery">
                    <div class="big-photo"><img src="/img/gallery-big-photo.png" alt="alt"></div>
                    <div class="small-photo">
                        <img src="/img/gallery-small-photo1.png" alt="alt">
                        <img src="/img/gallery-small-photo2.png" alt="alt">
                        <img src="/img/gallery-small-photo3.png" alt="alt">
                        <img src="/img/gallery-small-photo4.png" alt="alt">
                    </div>
                    <a href="#" class="favorites">
                        <svg class="favorites-usual" width="12" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.6211 5.98172C12.6977 4.8747 12.6977 3.07667 11.6211 1.96965C10.5487 0.867074 8.8134 0.867074 7.74102 1.96965L7.20482 2.52096C7.09263 2.6363 6.90737 2.6363 6.79518 2.52096L6.25898 1.96965C5.1866 0.867074 3.45132 0.867074 2.37895 1.96965C1.30226 3.07667 1.30226 4.8747 2.37895 5.98172L7 10.7329L11.6211 5.98172ZM7.33139 1.57124C8.62813 0.237973 10.7339 0.237973 12.0307 1.57124C13.3231 2.90006 13.3231 5.05131 12.0307 6.38013L7.20482 11.3419C7.09263 11.4573 6.90737 11.4573 6.79518 11.3419L1.96932 6.38013C0.676895 5.05131 0.676895 2.90006 1.96932 1.57124C3.26606 0.237973 5.37187 0.237973 6.66861 1.57124L7 1.91196L7.33139 1.57124Z" fill="#333646" stroke="#333646" stroke-width="0.2"/>
                        </svg>
                        <svg class="favorites-active" width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.1 1.5c-.6-.7-1.5-1-2.4-1-.9 0-1.8.4-2.4 1l-.3.3-.3-.3C6.1.8 5.2.5 4.3.5c-.9 0-1.8.4-2.4 1C.6 2.9.6 5.1 1.9 6.4l4.8 5c.1.1.2.1.3.1.1 0 .2 0 .3-.1l4.8-5c1.3-1.3 1.3-3.5 0-4.9z" fill="#EE483F"/>
                        </svg>
                    </a>
                    <div class="number-photos">+11 фото</div>
                </div>
                <h1>Monteurhaus - Monteur und Ferienhaus Pengal - in Leipzig</h1>
                <div class="additional-information">
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
                <div class="price-situation">
                    <div class="titles">
                        <div class="title">Цены</div>
                        <div class="title padding-left">Обстановка</div>
                    </div>
                    <div class="parameters">
                        <div class="parameters-block parameters-left-block">
                            <div class="title type">Тип</div>
                            <div class="title quantity">Кол-во</div>
                            <div class="title personen">Personen</div>
                            <div class=" title price">Цена</div>
                        </div>
                        <div class="parameters-block parameters-right-block">
                            <div class="title type-bed">Тип кровати</div>
                            <div class="title shower">Душ</div>
                            <div class="title kitchen">Кухня</div>
                        </div>
                    </div>

                    <div class="position">
                        <div class="top-bloc-collapse">
                            <div class="top-bloc-collapse-item top-bloc-collapse-left">
                                <div class="name">
                                    <img src="/svg/i-house-filled.svg" alt="house">
                                    дом (целиком)
                                </div>
                                <div class="quantity-item">1x</div>
                                <div class="personen-item">10+</div>
                                <div class="price-item">от<span>25€</span>/person</div>
                            </div>
                            <div class="top-bloc-collapse-item top-bloc-collapse-right">
                                <div class="type-bed-item"></div>
                                <div class="shower-item">
                                    <div class="shower-item-block shower-item-block-green">
                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                        </svg>
                                        Свой
                                    </div>
                                </div>
                                <div class="kitchen-item">
                                    <div class="kitchen-item-block kitchen-item-block-green">
                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                        </svg>
                                        Своя
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse">
                            <div class="collapse-content-line">
                                <div class="collapse-left-block">
                                    <div class="name">
                                        <img src="/svg/i-one.svg" alt="alt">
                                        одноместный
                                    </div>
                                    <div class="quantity-item">2x</div>
                                    <div class="personen-item">1</div>
                                    <div class="price-item">от<span>22€</span>/person</div>
                                </div>
                                <div class="collapse-right-block">
                                    <div class="type-bed-item">
                                        <div class="type-bed-item-block type-bed-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="shower-item">
                                        <div class="shower-item-block shower-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            Свой
                                        </div>
                                    </div>
                                    <div class="kitchen-item">
                                        <div class="kitchen-item-block kitchen-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            Своя
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse-content-line">
                                <div class="collapse-left-block">
                                    <div class="name">
                                        <img src="/svg/i-two.svg" alt="alt">
                                        двухместный
                                    </div>
                                    <div class="quantity-item">3x</div>
                                    <div class="personen-item">2</div>
                                    <div class="price-item">от<span>20€</span>/person</div>
                                </div>
                                <div class="collapse-right-block">
                                    <div class="type-bed-item">
                                        <div class="type-bed-item-block type-bed-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            двухместная
                                        </div>
                                    </div>
                                    <div class="shower-item">
                                        <div class="shower-item-block shower-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            Свой
                                        </div>
                                    </div>
                                    <div class="kitchen-item">
                                        <div class="kitchen-item-block kitchen-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            Своя
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse-content-line">
                                <div class="collapse-left-block">
                                    <div class="name">
                                        <img src="/svg/i-multi.svg" alt="alt">
                                        многоместный
                                    </div>
                                    <div class="quantity-item">5x</div>
                                    <div class="personen-item">4</div>
                                    <div class="price-item">от<span>18€</span>/person</div>
                                </div>
                                <div class="collapse-right-block">
                                    <div class="type-bed-item">
                                        <div class="type-bed-item-block type-bed-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="shower-item">
                                        <div class="shower-item-block shower-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            Свой
                                        </div>
                                    </div>
                                    <div class="kitchen-item">
                                        <div class="kitchen-item-block kitchen-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            Своя
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="position">
                        <div class="top-bloc-collapse">
                            <div class="top-bloc-collapse-item top-bloc-collapse-left">
                                <div class="name">
                                    <img src="/svg/i-room-filled.svg" alt="house">
                                    квартира
                                </div>
                                <div class="quantity-item">1x</div>
                                <div class="personen-item">5</div>
                                <div class="price-item">от<span>25€</span>/person</div>
                            </div>
                            <div class="top-bloc-collapse-item top-bloc-collapse-right">
                                <div class="type-bed-item"></div>
                                <div class="shower-item">
                                    <div class="shower-item-block shower-item-block-green">
                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                        </svg>
                                        Свой
                                    </div>
                                </div>
                                <div class="kitchen-item">
                                    <div class="kitchen-item-block kitchen-item-block-green">
                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                        </svg>
                                        Своя
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse">
                            <div class="collapse-content-line">
                                <div class="collapse-left-block">
                                    <div class="name">
                                        <img src="/svg/i-two.svg" alt="alt">
                                        двухместный
                                    </div>
                                    <div class="quantity-item">2x</div>
                                    <div class="personen-item">5</div>
                                    <div class="price-item">от<span>22€</span>/person</div>
                                </div>
                                <div class="collapse-right-block">
                                    <div class="type-bed-item">
                                        <div class="type-bed-item-block type-bed-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="shower-item">
                                        <div class="shower-item-block shower-item-block-orange">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                            </svg>
                                            Совместный
                                        </div>
                                    </div>
                                    <div class="kitchen-item">
                                        <div class="kitchen-item-block kitchen-item-block-orange">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                            </svg>
                                            Совместная
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse-content-line">
                                <div class="collapse-left-block">
                                    <div class="name">
                                        <img src="/svg/i-multi.svg" alt="alt">
                                        трехместный
                                    </div>
                                    <div class="quantity-item">2x</div>
                                    <div class="personen-item">5</div>
                                    <div class="price-item">от<span>22€</span>/person</div>
                                </div>
                                <div class="collapse-right-block">
                                    <div class="type-bed-item">
                                        <div class="type-bed-item-block type-bed-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="shower-item">
                                        <div class="shower-item-block shower-item-block-orange">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                            </svg>
                                            совместный
                                        </div>
                                    </div>
                                    <div class="kitchen-item">
                                        <div class="kitchen-item-block kitchen-item-block-orange">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                            </svg>
                                            Совместная
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="position">
                        <div class="top-bloc-collapse">
                            <div class="top-bloc-collapse-item top-bloc-collapse-left">
                                <div class="name">
                                    <img src="/svg/i-hotel-filled.svg" alt="house">
                                    гостиница
                                </div>
                                <div class="quantity-item">1x</div>
                                <div class="personen-item">100+</div>
                                <div class="price-item">от<span>18€</span>/person</div>
                            </div>
                            <div class="top-bloc-collapse-item top-bloc-collapse-right">
                                <div class="type-bed-item"></div>
                                <div class="shower-item">
                                    <div class="shower-item-block shower-item-block-green">
                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                        </svg>
                                        Свой
                                    </div>
                                </div>
                                <div class="kitchen-item">
                                    <div class="kitchen-item-block kitchen-item-block-green">
                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                        </svg>
                                        Своя
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse">
                            <div class="collapse-content-line">
                                <div class="collapse-left-block">
                                    <div class="name">
                                        <img src="/svg/i-one.svg" alt="alt">
                                        одноместный
                                    </div>
                                    <div class="quantity-item">2x</div>
                                    <div class="personen-item">1</div>
                                    <div class="price-item">от<span>25€</span>/person</div>
                                </div>
                                <div class="collapse-right-block">
                                    <div class="type-bed-item">
                                        <div class="type-bed-item-block type-bed-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="shower-item">
                                        <div class="shower-item-block shower-item-block-orange">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                            </svg>
                                            совместный
                                        </div>
                                    </div>
                                    <div class="kitchen-item">
                                        <div class="kitchen-item-block kitchen-item-block-orange">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                            </svg>
                                            совместная
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse-content-line">
                                <div class="collapse-left-block">
                                    <div class="name">
                                        <img src="/svg/i-two.svg" alt="alt">
                                        двухместный
                                    </div>
                                    <div class="quantity-item">3x</div>
                                    <div class="personen-item">2</div>
                                    <div class="price-item">от<span>22€</span>/person</div>
                                </div>
                                <div class="collapse-right-block">
                                    <div class="type-bed-item">
                                        <div class="type-bed-item-block type-bed-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="shower-item">
                                        <div class="shower-item-block shower-item-block-orange">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                            </svg>
                                            совместный
                                        </div>
                                    </div>
                                    <div class="kitchen-item">
                                        <div class="kitchen-item-block kitchen-item-block-orange">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                            </svg>
                                            совместная
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse-content-line">
                                <div class="collapse-left-block">
                                    <div class="name">
                                        <img src="/svg/i-multi.svg" alt="alt">
                                        трехместный
                                    </div>
                                    <div class="quantity-item">5x</div>
                                    <div class="personen-item">3</div>
                                    <div class="price-item">от<span>20€</span>/person</div>
                                </div>
                                <div class="collapse-right-block">
                                    <div class="type-bed-item">
                                        <div class="type-bed-item-block type-bed-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="shower-item">
                                        <div class="shower-item-block shower-item-block-orange">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                            </svg>
                                            совместный
                                        </div>
                                    </div>
                                    <div class="kitchen-item">
                                        <div class="kitchen-item-block kitchen-item-block-orange">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                            </svg>
                                            совместная
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse-content-line">
                                <div class="collapse-left-block">
                                    <div class="name">
                                        <img src="/svg/i-multi.svg" alt="alt">
                                        четырехместный
                                    </div>
                                    <div class="quantity-item">1x</div>
                                    <div class="personen-item">4</div>
                                    <div class="price-item">от<span>18€</span>/person</div>
                                </div>
                                <div class="collapse-right-block">
                                    <div class="type-bed-item">
                                        <div class="type-bed-item-block type-bed-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="shower-item">
                                        <div class="shower-item-block shower-item-block-orange">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                            </svg>
                                            совместный
                                        </div>
                                    </div>
                                    <div class="kitchen-item">
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
    </div>

@endsection
