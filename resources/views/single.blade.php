@extends('layouts.app-single')

@section('content')

    <div class="container">
        <div class="single-content">
            <div class="left-part">
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
                        <div class="row">
                            <div class="col-xl-6 pr-1">
                        <div class="title">Цены</div>
                            </div>
                            <div class="col-xl-6 pl-0">
                        <div class="title padding-left">Обстановка</div>
                            </div>
                        </div>
                    </div>
                    <div class="parameters">
                        <div class="row">
                            <div class="parameters-block parameters-left-block col-xl-6 pr-1">
                                <div class="row">
                                    <div class="title type col-xl-5">Тип</div>
                                    <div class="title quantity col-xl-2">Кол-во</div>
                                    <div class="title personen col-xl-2 pr-0 pl-0 text-center">Personen</div>
                                    <div class=" title price col-xl-3">Цена</div>
                                </div>
                            </div>
                            <div class="parameters-block parameters-right-block col-xl-6 pl-0">
                                <div class="row">
                                    <div class="title type-bed col-xl-4">Тип кровати</div>
                                    <div class="title shower col-xl-4">Душ</div>
                                    <div class="title kitchen col-xl-4">Кухня</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="position">
                        <div class="top-bloc-collapse" data-toggle="collapse" data-target="#position1-collapse" role="button" aria-expanded="false" aria-controls="position1-collapse">
                            <div class="row">
                            <div class="col-xl-6 pr-1">
                                <div class="top-bloc-collapse-item top-bloc-collapse-left">
                                    <div class="row">
                                        <div class="name col-xl-5">
                                            <img src="/svg/i-house-filled.svg" alt="house">
                                            дом (целиком)
                                        </div>
                                        <div class="quantity-item col-xl-2">1x</div>
                                        <div class="personen-item col-xl-2">10+</div>
                                        <div class="price-item col-xl-3">от<span>25€</span>/person</div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-xl-6 pl-0">
                                <div class="top-bloc-collapse-item top-bloc-collapse-right">
                                    <div class="row" style="height:100%;">
                                <div class="col-xl-4 d-flex align-items-center"></div>
                                <div class="col-xl-4 d-flex align-items-center">
                                    <div class="shower-item-block shower-item-block-green">
                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                        </svg>
                                        свой
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-center">
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
                        <div class="collapse show" id="position1-collapse">
                            <div class="collapse-content-line">
                                <div class="row">
                                <div class="collapse-left-block col-xl-6 pr-1">
                                    <div class="row">
                                    <div class="name col-xl-5">
                                        <img src="/svg/i-one.svg" alt="alt">
                                        одноместный
                                    </div>
                                    <div class="quantity-item col-xl-2">2x</div>
                                    <div class="personen-item col-xl-2 pl-0 pr-0 text-center">1</div>
                                    <div class="price-item col-xl-3">от<span>22€</span>/person</div>
                                    </div>
                                </div>
                                <div class="collapse-right-block col-xl-6 pl-0">
                                    <div class="row" style="height:100%;">
                                    <div class="type-bed-item col-xl-4 d-flex align-items-center">
                                        <div class="type-bed-item-block type-bed-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            одноместная
                                        </div>
                                    </div>
                                    <div class="shower-item col-xl-4 d-flex align-items-center">
                                        <div class="shower-item-block shower-item-block-green">
                                            <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                            </svg>
                                            свой
                                        </div>
                                    </div>
                                    <div class="kitchen-item col-xl-4 d-flex align-items-center">
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
                                    <div class="collapse-left-block col-xl-6 pr-1">
                                        <div class="row">
                                            <div class="name col-xl-5">
                                                <img src="/svg/i-two.svg" alt="alt">
                                                двухместный
                                            </div>
                                            <div class="quantity-item col-xl-2">3x</div>
                                            <div class="personen-item col-xl-2 pl-0 pr-0 text-center">2</div>
                                            <div class="price-item col-xl-3">от<span>20€</span>/person</div>
                                        </div>
                                    </div>
                                    <div class="collapse-right-block col-xl-6 pl-0">
                                        <div class="row" style="height:100%;">
                                            <div class="type-bed-item col-xl-4 d-flex align-items-center">
                                                <div class="type-bed-item-block type-bed-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    одноместная
                                                </div>
                                            </div>
                                            <div class="shower-item col-xl-4 d-flex align-items-center">
                                                <div class="shower-item-block shower-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    свой
                                                </div>
                                            </div>
                                            <div class="kitchen-item col-xl-4 d-flex align-items-center">
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
                                    <div class="collapse-left-block col-xl-6 pr-1">
                                        <div class="row">
                                            <div class="name col-xl-5">
                                                <img src="/svg/i-multi.svg" alt="alt">
                                                многоместная
                                            </div>
                                            <div class="quantity-item col-xl-2">5x</div>
                                            <div class="personen-item col-xl-2 pl-0 pr-0 text-center">4</div>
                                            <div class="price-item col-xl-3">от<span>18€</span>/person</div>
                                        </div>
                                    </div>
                                    <div class="collapse-right-block col-xl-6 pl-0">
                                        <div class="row" style="height:100%;">
                                            <div class="type-bed-item col-xl-4 d-flex align-items-center">
                                                <div class="type-bed-item-block type-bed-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    одноместная
                                                </div>
                                            </div>
                                            <div class="shower-item col-xl-4 d-flex align-items-center">
                                                <div class="shower-item-block shower-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    свой
                                                </div>
                                            </div>
                                            <div class="kitchen-item col-xl-4 d-flex align-items-center">
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
                </div>

                    <div class="position">
                        <div class="top-bloc-collapse" data-toggle="collapse" data-target="#position2-collapse" role="button" aria-expanded="false" aria-controls="position2-collapse">
                            <div class="row">
                                <div class="col-xl-6 pr-1">
                                    <div class="top-bloc-collapse-item top-bloc-collapse-left">
                                        <div class="row">
                                            <div class="name col-xl-5">
                                                <img src="/svg/i-room-filled.svg" alt="house">
                                                квартира
                                            </div>
                                            <div class="quantity-item col-xl-2">1x</div>
                                            <div class="personen-item col-xl-2">5</div>
                                            <div class="price-item col-xl-3">от<span>25€</span>/person</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 pl-0">
                                    <div class="top-bloc-collapse-item top-bloc-collapse-right">
                                        <div class="row" style="height:100%;">
                                            <div class="col-xl-4 d-flex align-items-center"></div>
                                            <div class="col-xl-4 d-flex align-items-center">
                                                <div class="shower-item-block shower-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    свой
                                                </div>
                                            </div>
                                            <div class="col-xl-4 d-flex align-items-center">
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
                                        <div class="collapse-left-block col-xl-6 pr-1">
                                            <div class="row">
                                                <div class="name col-xl-5">
                                                    <img src="/svg/i-two.svg" alt="alt">
                                                    двухместный
                                                </div>
                                                <div class="quantity-item col-xl-2">2x</div>
                                                <div class="personen-item col-xl-2 pl-0 pr-0 text-center">5</div>
                                                <div class="price-item col-xl-3">от<span>22€</span>/person</div>
                                            </div>
                                        </div>
                                        <div class="collapse-right-block col-xl-6 pl-0">
                                            <div class="row" style="height:100%;">
                                                <div class="type-bed-item col-xl-4 d-flex align-items-center">
                                                    <div class="type-bed-item-block type-bed-item-block-green">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                        </svg>
                                                        одноместная
                                                    </div>
                                                </div>
                                                <div class="shower-item col-xl-4 d-flex align-items-center">
                                                    <div class="shower-item-block shower-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместный
                                                    </div>
                                                </div>
                                                <div class="kitchen-item col-xl-4 d-flex align-items-center">
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
                                        <div class="collapse-left-block col-xl-6 pr-1">
                                            <div class="row">
                                                <div class="name col-xl-5">
                                                    <img src="/svg/i-multi.svg" alt="alt">
                                                    трехместный
                                                </div>
                                                <div class="quantity-item col-xl-2">3x</div>
                                                <div class="personen-item col-xl-2 pl-0 pr-0 text-center">3</div>
                                                <div class="price-item col-xl-3">от<span>20€</span>/person</div>
                                            </div>
                                        </div>
                                        <div class="collapse-right-block col-xl-6 pl-0">
                                            <div class="row" style="height:100%;">
                                                <div class="type-bed-item col-xl-4 d-flex align-items-center">
                                                    <div class="type-bed-item-block type-bed-item-block-green">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                        </svg>
                                                        одноместная
                                                    </div>
                                                </div>
                                                <div class="shower-item col-xl-4 d-flex align-items-center">
                                                    <div class="shower-item-block shower-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместный
                                                    </div>
                                                </div>
                                                <div class="kitchen-item col-xl-4 d-flex align-items-center">
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
                                <div class="col-xl-6 pr-1">
                                    <div class="top-bloc-collapse-item top-bloc-collapse-left">
                                        <div class="row">
                                            <div class="name col-xl-5">
                                                <img src="/svg/i-hotel-filled.svg" alt="house">
                                                гостиница
                                            </div>
                                            <div class="quantity-item col-xl-2">1x</div>
                                            <div class="personen-item col-xl-2">100+</div>
                                            <div class="price-item col-xl-3">от<span>18€</span>/person</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 pl-0">
                                    <div class="top-bloc-collapse-item top-bloc-collapse-right">
                                        <div class="row" style="height:100%;">
                                            <div class="col-xl-4 d-flex align-items-center"></div>
                                            <div class="col-xl-4 d-flex align-items-center">
                                                <div class="shower-item-block shower-item-block-green">
                                                    <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                    </svg>
                                                    свой
                                                </div>
                                            </div>
                                            <div class="col-xl-4 d-flex align-items-center">
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
                                        <div class="collapse-left-block col-xl-6 pr-1">
                                            <div class="row">
                                                <div class="name col-xl-5">
                                                    <img src="/svg/i-one.svg" alt="alt">
                                                    одноместный
                                                </div>
                                                <div class="quantity-item col-xl-2">2x</div>
                                                <div class="personen-item col-xl-2 pl-0 pr-0 text-center">1</div>
                                                <div class="price-item col-xl-3">от<span>25€</span>/person</div>
                                            </div>
                                        </div>
                                        <div class="collapse-right-block col-xl-6 pl-0">
                                            <div class="row" style="height:100%;">
                                                <div class="type-bed-item col-xl-4 d-flex align-items-center">
                                                    <div class="type-bed-item-block type-bed-item-block-green">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                        </svg>
                                                        одноместная
                                                    </div>
                                                </div>
                                                <div class="shower-item col-xl-4 d-flex align-items-center">
                                                    <div class="shower-item-block shower-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместный
                                                    </div>
                                                </div>
                                                <div class="kitchen-item col-xl-4 d-flex align-items-center">
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
                                        <div class="collapse-left-block col-xl-6 pr-1">
                                            <div class="row">
                                                <div class="name col-xl-5">
                                                    <img src="/svg/i-two.svg" alt="alt">
                                                    двухместный
                                                </div>
                                                <div class="quantity-item col-xl-2">3x</div>
                                                <div class="personen-item col-xl-2 pl-0 pr-0 text-center">2</div>
                                                <div class="price-item col-xl-3">от<span>22€</span>/person</div>
                                            </div>
                                        </div>
                                        <div class="collapse-right-block col-xl-6 pl-0">
                                            <div class="row" style="height:100%;">
                                                <div class="type-bed-item col-xl-4 d-flex align-items-center">
                                                    <div class="type-bed-item-block type-bed-item-block-green">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                        </svg>
                                                        одноместная
                                                    </div>
                                                </div>
                                                <div class="shower-item col-xl-4 d-flex align-items-center">
                                                    <div class="shower-item-block shower-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместный
                                                    </div>
                                                </div>
                                                <div class="kitchen-item col-xl-4 d-flex align-items-center">
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
                                        <div class="collapse-left-block col-xl-6 pr-1">
                                            <div class="row">
                                                <div class="name col-xl-5">
                                                    <img src="/svg/i-multi.svg" alt="alt">
                                                    трехместный
                                                </div>
                                                <div class="quantity-item col-xl-2">5x</div>
                                                <div class="personen-item col-xl-2 pl-0 pr-0 text-center">3</div>
                                                <div class="price-item col-xl-3">от<span>20€</span>/person</div>
                                            </div>
                                        </div>
                                        <div class="collapse-right-block col-xl-6 pl-0">
                                            <div class="row" style="height:100%;">
                                                <div class="type-bed-item col-xl-4 d-flex align-items-center">
                                                    <div class="type-bed-item-block type-bed-item-block-green">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                        </svg>
                                                        одноместная
                                                    </div>
                                                </div>
                                                <div class="shower-item col-xl-4 d-flex align-items-center">
                                                    <div class="shower-item-block shower-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместный
                                                    </div>
                                                </div>
                                                <div class="kitchen-item col-xl-4 d-flex align-items-center">
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
                                        <div class="collapse-left-block col-xl-6 pr-1">
                                            <div class="row">
                                                <div class="name col-xl-5">
                                                    <img src="/svg/i-multi.svg" alt="alt">
                                                    четырехместный
                                                </div>
                                                <div class="quantity-item col-xl-2">1x</div>
                                                <div class="personen-item col-xl-2 pl-0 pr-0 text-center">4</div>
                                                <div class="price-item col-xl-3">от<span>18€</span>/person</div>
                                            </div>
                                        </div>
                                        <div class="collapse-right-block col-xl-6 pl-0">
                                            <div class="row" style="height:100%;">
                                                <div class="type-bed-item col-xl-4 d-flex align-items-center">
                                                    <div class="type-bed-item-block type-bed-item-block-green">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CAF50"/>
                                                        </svg>
                                                        одноместная
                                                    </div>
                                                </div>
                                                <div class="shower-item col-xl-4 d-flex align-items-center">
                                                    <div class="shower-item-block shower-item-block-orange">
                                                        <svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#F8981D"/>
                                                        </svg>
                                                        совместный
                                                    </div>
                                                </div>
                                                <div class="kitchen-item col-xl-4 d-flex align-items-center">
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
        </div>

            <div class="comfort">
                <h2>Удобства</h2>
                <div class="comfort-block">
                    <h3>Кухня</h3>
                        <div class="row">
                            <div class="col-xl-3 comfort-block-item">
                                <img src="/svg/i-own-kitchen.svg" alt="alt">
                                <span>Eigene kuche</span>
                            </div>
                            <div class="col-xl-3 comfort-block-item">
                                <img src="/svg/i-shared-kitchen.svg" alt="alt">
                                <span>Gemeinschaftskuche</span>
                            </div>
                            <div class="col-xl-3 comfort-block-item">
                                <img src="/svg/i-fridge.svg" alt="alt">
                                <span>Kuchlshrank</span>
                            </div>
                            <div class="col-xl-3 comfort-block-item">
                                <img src="/svg/i-coffee-machine.svg" alt="alt">
                                <span>Kaffemaschine</span>
                            </div>
                            <div class="col-xl-3 comfort-block-item">
                                <img src="/svg/i-microwave-oven.svg" alt="alt">
                                <span>Mikrowelle</span>
                            </div>
                            <div class="col-xl-3 comfort-block-item">
                                <img src="/svg/i-dishwasher.svg" alt="alt">
                                <span>Spulmaschine</span>
                            </div>
                        </div>
                </div>
                <div class="comfort-block">
                    <h3>Ванная</h3>
                    <div class="row">
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-bath.svg" alt="alt">
                            <span>Badewanne</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-bath.svg" alt="alt">
                            <span>Gemeinschafstbad</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-towel.svg" alt="alt">
                            <span>Handtuscher inkl.</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-no-towel.svg" alt="alt">
                            <span>Handtuscher nicht verf.</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/sauna.svg" alt="alt">
                            <span>Sauna</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-hair-dryer.svg" alt="alt">
                            <span>Fon</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-toilet.svg" alt="alt">
                            <span>Personlich toilette</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-shared-toilet.svg" alt="alt">
                            <span>Gemeinsame toilette</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-washingmachine.svg" alt="alt">
                            <span>Waschmaschine</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-own-shower.svg" alt="alt">
                            <span>Deinee dusche</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-shared-shower.svg" alt="alt">
                            <span>Gemeinschaftsdusche</span>
                        </div>
                    </div>
                </div>
                <div class="comfort-block">
                    <h3>Комната</h3>
                    <div class="row">
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-signlebed.svg" alt="alt">
                            <span>Einzelbett</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-combined-bed.svg" alt="alt">
                            <span>Getrente betten</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-extra-bed.svg" alt="alt">
                            <span>Zustellbett</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-double-bed.svg" alt="alt">
                            <span>Doppelbett</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-linens.svg" alt="alt">
                            <span>Bettwasche inkl.</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-no-linens.svg" alt="alt">
                            <span>Bettwasche nicht verf.</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-restroom.svg" alt="alt">
                            <span>Gemeinschafrsraum</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-radio.svg" alt="alt">
                            <span>Radio</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-safe.svg" alt="alt">
                            <span> Spind/Safe</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-darts.svg" alt="alt">
                            <span>Dart</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-tv.svg" alt="alt">
                            <span>TV</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-table-billiard.svg" alt="alt">
                            <span>Billiartisch</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-balcony.svg" alt="alt">
                            <span>Balkon</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-air-conditioning.svg" alt="alt">
                            <span>Kimaanlage</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-fireplace.svg" alt="alt">
                            <span>Kamin</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-computer-place.svg" alt="alt">
                            <span>Platz fur computer</span>
                        </div>
                    </div>
                </div>
                <div class="comfort-block">
                    <h3>Прочее</h3>
                    <div class="row">
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-dryer.svg" alt="alt">
                            <span>Trockenschrank</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-friendly.svg" alt="alt">
                            <span>Familienfreundlich</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-gym.svg" alt="alt">
                            <span>Fitness</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-pets-friendly.svg" alt="alt">
                            <span>Haustier</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-wifi.svg" alt="alt">
                            <span>WiFi</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-iron.svg" alt="alt">
                            <span>Bugeleisen zum Bugeln</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-jacuzi.svg" alt="alt">
                            <span>Whirpool</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-table-soccer.svg" alt="alt">
                            <span>Tisch-futbal</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-smoking.svg" alt="alt">
                            <span>Raucher</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-no-smoking.svg" alt="alt">
                            <span>Nicht rauchen</span>
                        </div>
                    </div>
                </div>
                <div class="comfort-block">
                    <h3>Снаружи</h3>
                    <div class="row">
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-terrace.svg" alt="alt">
                            <span>Terrace</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-parking.svg" alt="alt">
                            <span>Offentliche parkzplatz</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-car-parking.svg" alt="alt">
                            <span>PKW-Parkzplatz</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-truck-parking.svg" alt="alt">
                            <span>LKW-Parkzplatz</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-swimming-pool.svg" alt="alt">
                            <span>Schwimmbad</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-garden.svg" alt="alt">
                            <span>Wintergarten</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/garden.svg" alt="alt">
                            <span>Garten</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-disabled.svg" alt="alt">
                            <span>Barrierefrei</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-barbecue.svg" alt="alt">
                            <span>Grillmoglichkeit</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-bike.svg" alt="alt">
                            <span>Fahhradelveih</span>
                        </div>
                        <div class="col-xl-3 comfort-block-item">
                            <img src="/svg/i-elevator.svg" alt="alt">
                            <span>Heben</span>
                        </div>
                    </div>
                </div>
            </div>

                <div class="object-description">
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
                    </div>
                </div>
        </div>
            <div class="sidebar">
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
                        <a href="tel:+49176">+49 176&nbsp;<span class="num_hide">6666 9999</span></a>
                        <span class="sh_nmr">показать</span>
                    </div>
                    <div class="address-map">
                        <div class="address">DKN Immobilien <span>Anja Klepzigolf</span> Kolonnadenstr. 1 04109 Leipzig</div>
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2492.551932385999!2d12.36563791593532!3d51.33776073091309!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sDKN%20Immobilien%20Anja%20Klepzigolf%20Kolonnadenstr.%201%2004109%20Leipzig!5e0!3m2!1sru!2sru!4v1588597677861!5m2!1sru!2sru" width="200" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
                <div class="sidebar-bottom">
                    <div class="sidebar-bottom-block">
                        <img src="/svg/i-share.svg" alt="">
                        Teilen
                    </div>
                    <div class="sidebar-bottom-block">
                        <img src="/svg/i-print.svg" alt="">
                        Drucken
                    </div>
                    <div class="sidebar-bottom-block">
                        <img src="/svg/i-report.svg" alt="">
                        Melden
                    </div>
                </div>
            </div>
    </div>
    </div>

@endsection
