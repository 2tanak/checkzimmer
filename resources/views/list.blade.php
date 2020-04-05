@extends('layouts.app')

@section('content')
    <div class="list-content">
        <div class="container">
            <h1>Найди лучшее жилье для монтеров в Лейпциге!</h1>
            <div class="sample-block">
                <div class="input-block sample-block-item">
                    <label for="text">адрес рабочего места:</label>
                    <input id="text" type="text">
                </div>
                <div class="distance-block select-block">
                    <label for="distance-select">дистанция:</label>
                    <select name="distance" id="distance-select" class="distance">
                        <option value="1">10 км.</option>
                        <option value="2">20 км.</option>
                        <option value="3">30 км.</option>
                        <option value="4">40 км.</option>
                    </select>
                </div>
                <div class="number-personse-block select-block">
                    <label for="number-personse">Кол-во человек:</label>
                    <select name="distance" id="number-personse" class="number-personse">
                        <option value="1">1 чел.</option>
                        <option value="2">2 чел.</option>
                        <option value="3">3 чел.</option>
                        <option value="4">4 чел.</option>
                    </select>
                </div>
                <a class="find-housing" href="#">Найти жильё</a>
            </div>
        </div>

        <div class="list-content-item">
            <div class="container">
                <div class="sorting-block">
                    <div class="left-block">
                        <a class="list active" href="#">Список</a>
                        <a class="map" href="#">На карте</a>
                        <div class="result">Найдено 1240 вариантов жилья</div>
                    </div>
                    <div class="sorting">
                        <a href="#">Сортировка по умолчанию</a>
                        <img src="/svg/i-arrow-dropdown-input.svg" alt="arrow">
                    </div>
                </div>
            </div>

            <div class="property not-map">
                <div class="container">
                    <div>
                    <div class="property-item">
                        <div class="property-card">
                            <div class="property-card-slider">
                                <div><img src="/img/property-picture.png" alt="Property picture"></div>
                                <div><img src="/img/property-picture2.png" alt="Property picture"></div>
                                <div><img src="/img/property-picture.png" alt="Property picture"></div>
                                <div><img src="/img/property-picture2.png" alt="Property picture"></div>
                                <div><img src="/img/property-picture.png" alt="Property picture"></div>
                            </div>
                            <div class="data">
                                <a href="#" class="title"><span>Maisonette-Whg in Markkleeberg-West mit viel Entfaltungspotenzial, Leipzig</span></a>
                                <div>
                                    <div class="geolocation">
                                        <img src="/svg/i-pin.svg" alt="geo">
                                        04158 Leipzig
                                    </div>
                                    <div class="humans">
                                        <img src="/svg/i-people.svg" alt="humans">
                                        12 человек
                                    </div>
                                    <div class="distance">
                                        <img src="/svg/i-distance.svg" alt="distance">
                                        7км от указанного вами адреса
                                    </div>
                                    <div class="additionally">
                                        <div class="wi-fi data-block-circle" data-toggle="tooltip" data-placement="top" title="wi-fi"><img src="/svg/i-wifi.svg"></div>
                                        <div class="double-bed data-block-circle" data-toggle="tooltip" data-placement="top" title="двухспальная кровать"><img src="/svg/i-bedroom.svg"></div>
                                        <div class="tv data-block-circle" data-toggle="tooltip" data-placement="top" title="телевизор"><img src="/svg/i-tv.svg"></div>
                                        <div class="washing-machine data-block-circle" data-toggle="tooltip" data-placement="top" title="стиральная машина"><img src="/svg/i-washingmachine.svg"></div>
                                        <div class="kitchen data-block-oval">
                                            <img src="/svg/i-canteen.svg">
                                            общая кухня
                                        </div>
                                        <div class="shower data-block-oval">
                                            <img src="/svg/i-shower.svg">
                                            общий душ
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="type">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="title">Тип</th>
                                        <th class="title">Кол-во</th>
                                        <th class="title">Personen</th>
                                        <th class="title">Цена</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-one.svg" alt="one">
                                            одноместный
                                        </td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td><span>25&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-two.svg" alt="one">
                                            двухместный
                                        </td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td><span>22&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-multi.svg" alt="one">
                                            многоместный
                                        </td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td><span>20&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-flat.svg" alt="one">
                                            квартира целиком
                                        </td>
                                        <td>5</td>
                                        <td>5</td>
                                        <td><span>18&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-house.svg" alt="one">
                                            дом
                                        </td>
                                        <td>12</td>
                                        <td>20</td>
                                        <td><span>15&#8364;</span>/persone</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="night">
                                <a href="#" class="favorites">
                                    <img class="favorites-icon" src="/svg/i-favourites-black.svg" alt="favorites">
                                    <img class="favorites-active-icon" src="/svg/i-favourites-active.svg" alt="favorites">
                                </a>
                                <div class="price"><span>от € 250</span> ночь</div>
                            </div>
                            <div class="rating">
                                <div class="rating-number">
                                    <img src="/img/i-rate.png" alt="rating">
                                    4.6
                                </div>
                                <a href="#" class="collapse">
                                    <svg class="minus" width="12" height="2" viewBox="0 0 12 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="12" width="2" height="12" rx="1" transform="rotate(90 12 0)" fill="#DF9D3C"/>
                                    </svg>
                                    <svg class="plus" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <rect x="12" y="5" width="2" height="12" rx="1" transform="rotate(90 12 5)" fill="#545769"/>
                                            <rect x="5" width="2" height="12" rx="1" fill="#545769"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="12" height="12" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="property-card">
                            <div class="property-card-slider">
                                <div><img src="/img/property-picture.png" alt="Property picture"></div>
                            </div>
                            <div class="data">
                                <a href="#" class="title"><span>Gemütliche Wohnung in Top Lage, Leipzig</span></a>
                                <div>
                                    <div class="geolocation">
                                        <img src="/svg/i-pin.svg" alt="geo">
                                        04668 Grimma, Leipzig (Kreis)
                                    </div>
                                    <div class="humans">
                                        <img src="/svg/i-people.svg" alt="humans">
                                        12 человек
                                    </div>
                                    <div class="distance">
                                        <img src="/svg/i-distance.svg" alt="distance">
                                        7км от указанного вами адреса
                                    </div>
                                    <div class="additionally">
                                        <div class="wi-fi data-block-circle" data-toggle="tooltip" data-placement="top" title="wi-fi"><img src="/svg/i-wifi.svg"></div>
                                        <div class="kitchen data-block-oval">
                                            <img src="/svg/i-canteen.svg">
                                            своя + общая кухня
                                        </div>
                                        <div class="shower data-block-oval">
                                            <img src="/svg/i-shower.svg">
                                            общий + общий душ
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="type">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="title">Тип</th>
                                        <th class="title">Кол-во</th>
                                        <th class="title">Personen</th>
                                        <th class="title">Цена</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-one.svg" alt="one">
                                            одноместный
                                        </td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td><span>25&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-two.svg" alt="one">
                                            двухместный
                                        </td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td><span>22&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-multi.svg" alt="one">
                                            многоместный
                                        </td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td><span>20&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-flat.svg" alt="one">
                                            квартира целиком
                                        </td>
                                        <td>5</td>
                                        <td>5</td>
                                        <td><span>18&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-house.svg" alt="one">
                                            дом
                                        </td>
                                        <td>12</td>
                                        <td>20</td>
                                        <td><span>15&#8364;</span>/persone</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="night">
                                <a href="#" class="favorites">
                                    <img class="favorites-icon" src="/svg/i-favourites-black.svg" alt="favorites">
                                    <img class="favorites-active-icon" src="/svg/i-favourites-active.svg" alt="favorites">
                                </a>
                                <div class="price"><span>от € 250</span> ночь</div>
                            </div>
                            <div class="rating">
                                <div class="rating-number">
                                    <img src="/img/i-rate.png" alt="rating">
                                    4.6
                                </div>
                                <a href="#" class="collapse">
                                    <svg class="minus" width="12" height="2" viewBox="0 0 12 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="12" width="2" height="12" rx="1" transform="rotate(90 12 0)" fill="#DF9D3C"/>
                                    </svg>
                                    <svg class="plus" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <rect x="12" y="5" width="2" height="12" rx="1" transform="rotate(90 12 5)" fill="#545769"/>
                                            <rect x="5" width="2" height="12" rx="1" fill="#545769"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="12" height="12" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="property-card">
                            <div class="property-card-slider">
                                <div><img src="/img/property-picture.png" alt="Property picture"></div>
                            </div>
                            <div class="data">
                                <a href="#" class="title"><span>Frisch renovierte 4 Zimmer in Grimma West Leipzig</span></a>
                                <div>
                                    <div class="geolocation">
                                        <img src="/svg/i-pin.svg" alt="geo">
                                        04158 Leipzig
                                    </div>
                                    <div class="humans">
                                        <img src="/svg/i-people.svg" alt="humans">
                                        12 человек
                                    </div>
                                    <div class="distance">
                                        <img src="/svg/i-distance.svg" alt="distance">
                                        7км от указанного вами адреса
                                    </div>
                                    <div class="additionally">
                                        <div class="wi-fi data-block-circle" data-toggle="tooltip" data-placement="top" title="wi-fi"><img src="/svg/i-wifi.svg"></div>
                                        <div class="double-bed data-block-circle" data-toggle="tooltip" data-placement="top" title="двухспальная кровать"><img src="/svg/i-bedroom.svg"></div>
                                        <div class="tv data-block-circle" data-toggle="tooltip" data-placement="top" title="телевизор"><img src="/svg/i-tv.svg"></div>
                                        <div class="washing-machine data-block-circle" data-toggle="tooltip" data-placement="top" title="стиральная машина"><img src="/svg/i-washingmachine.svg"></div>
                                        <div class="kitchen data-block-oval">
                                            <img src="/svg/i-canteen.svg">
                                            своя кухня
                                        </div>
                                        <div class="shower data-block-oval">
                                            <img src="/svg/i-shower.svg">
                                            свой душ
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="type">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="title">Тип</th>
                                        <th class="title">Кол-во</th>
                                        <th class="title">Personen</th>
                                        <th class="title">Цена</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-one.svg" alt="one">
                                            одноместный
                                        </td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td><span>25&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-two.svg" alt="one">
                                            двухместный
                                        </td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td><span>22&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-multi.svg" alt="one">
                                            многоместный
                                        </td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td><span>20&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-flat.svg" alt="one">
                                            квартира целиком
                                        </td>
                                        <td>5</td>
                                        <td>5</td>
                                        <td><span>18&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-house.svg" alt="one">
                                            дом
                                        </td>
                                        <td>12</td>
                                        <td>20</td>
                                        <td><span>15&#8364;</span>/persone</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="night">
                                <a href="#" class="favorites">
                                    <img class="favorites-icon" src="/svg/i-favourites-black.svg" alt="favorites">
                                    <img class="favorites-active-icon" src="/svg/i-favourites-active.svg" alt="favorites">
                                </a>
                                <div class="price"><span>от € 250</span> ночь</div>
                            </div>
                            <div class="rating">
                                <div class="rating-number">
                                    <img src="/img/i-rate.png" alt="rating">
                                    4.6
                                </div>
                                <a href="#" class="collapse">
                                    <svg class="minus" width="12" height="2" viewBox="0 0 12 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="12" width="2" height="12" rx="1" transform="rotate(90 12 0)" fill="#DF9D3C"/>
                                    </svg>
                                    <svg class="plus" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <rect x="12" y="5" width="2" height="12" rx="1" transform="rotate(90 12 5)" fill="#545769"/>
                                            <rect x="5" width="2" height="12" rx="1" fill="#545769"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="12" height="12" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="property-card">
                            <div class="property-card-slider">
                                <div><img src="/img/property-picture.png" alt="Property picture"></div>
                            </div>
                            <div class="data">
                                <a href="#" class="title"><span>Maisonette-Whg in Markkleeberg-West mit viel Entfaltungspotenzial, Leipzig</span></a>
                                <div>
                                    <div class="geolocation">
                                        <img src="/svg/i-pin.svg" alt="geo">
                                        04668 Grimma, Leipzig (Kreis)
                                    </div>
                                    <div class="humans">
                                        <img src="/svg/i-people.svg" alt="humans">
                                        12 человек
                                    </div>
                                    <div class="distance">
                                        <img src="/svg/i-distance.svg" alt="distance">
                                        7км от указанного вами адреса
                                    </div>
                                    <div class="additionally">
                                        <div class="wi-fi data-block-circle" data-toggle="tooltip" data-placement="top" title="wi-fi"><img src="/svg/i-wifi.svg"></div>
                                        <div class="double-bed data-block-circle" data-toggle="tooltip" data-placement="top" title="двухспальная кровать"><img src="/svg/i-bedroom.svg"></div>
                                        <div class="tv data-block-circle" data-toggle="tooltip" data-placement="top" title="телевизор"><img src="/svg/i-tv.svg"></div>
                                        <div class="washing-machine data-block-circle" data-toggle="tooltip" data-placement="top" title="стиральная машина"><img src="/svg/i-washingmachine.svg"></div>
                                        <div class="kitchen data-block-oval">
                                            <img src="/svg/i-canteen.svg">
                                            общая кухня
                                        </div>
                                        <div class="shower data-block-oval">
                                            <img src="/svg/i-shower.svg">
                                            общий душ
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="type">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="title">Тип</th>
                                        <th class="title">Кол-во</th>
                                        <th class="title">Personen</th>
                                        <th class="title">Цена</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-one.svg" alt="one">
                                            одноместный
                                        </td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td><span>25&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-two.svg" alt="one">
                                            двухместный
                                        </td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td><span>22&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-multi.svg" alt="one">
                                            многоместный
                                        </td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td><span>20&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-flat.svg" alt="one">
                                            квартира целиком
                                        </td>
                                        <td>5</td>
                                        <td>5</td>
                                        <td><span>18&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-house.svg" alt="one">
                                            дом
                                        </td>
                                        <td>12</td>
                                        <td>20</td>
                                        <td><span>15&#8364;</span>/persone</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="night">
                                <a href="#" class="favorites">
                                    <img class="favorites-icon" src="/svg/i-favourites-black.svg" alt="favorites">
                                    <img class="favorites-active-icon" src="/svg/i-favourites-active.svg" alt="favorites">
                                </a>
                                <div class="price"><span>от € 250</span> ночь</div>
                            </div>
                            <div class="rating">
                                <div class="rating-number">
                                    <img src="/img/i-rate.png" alt="rating">
                                    4.6
                                </div>
                                <a href="#" class="collapse">
                                    <svg class="minus" width="12" height="2" viewBox="0 0 12 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="12" width="2" height="12" rx="1" transform="rotate(90 12 0)" fill="#DF9D3C"/>
                                    </svg>
                                    <svg class="plus" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <rect x="12" y="5" width="2" height="12" rx="1" transform="rotate(90 12 5)" fill="#545769"/>
                                            <rect x="5" width="2" height="12" rx="1" fill="#545769"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="12" height="12" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="property-card">
                            <div class="property-card-slider">
                                <div><img src="/img/property-picture.png" alt="Property picture"></div>
                            </div>
                            <div class="data">
                                <a href="#" class="title"><span>Frisch renovierte 4 Zimmer in Grimma West Leipzig</span></a>
                                <div>
                                    <div class="geolocation">
                                        <img src="/svg/i-pin.svg" alt="geo">
                                        04158 Leipzig
                                    </div>
                                    <div class="humans">
                                        <img src="/svg/i-people.svg" alt="humans">
                                        12 человек
                                    </div>
                                    <div class="distance">
                                        <img src="/svg/i-distance.svg" alt="distance">
                                        7км от указанного вами адреса
                                    </div>
                                    <div class="additionally">
                                        <div class="wi-fi data-block-circle" data-toggle="tooltip" data-placement="top" title="wi-fi"><img src="/svg/i-wifi.svg"></div>
                                        <div class="double-bed data-block-circle" data-toggle="tooltip" data-placement="top" title="двухспальная кровать"><img src="/svg/i-bedroom.svg"></div>
                                        <div class="tv data-block-circle" data-toggle="tooltip" data-placement="top" title="телевизор"><img src="/svg/i-tv.svg"></div>
                                        <div class="washing-machine data-block-circle" data-toggle="tooltip" data-placement="top" title="стиральная машина"><img src="/svg/i-washingmachine.svg"></div>
                                        <div class="kitchen data-block-oval">
                                            <img src="/svg/i-canteen.svg">
                                            общая кухня
                                        </div>
                                        <div class="shower data-block-oval">
                                            <img src="/svg/i-shower.svg">
                                            общий душ
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="type">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="title">Тип</th>
                                        <th class="title">Кол-во</th>
                                        <th class="title">Personen</th>
                                        <th class="title">Цена</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-one.svg" alt="one">
                                            одноместный
                                        </td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td><span>25&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-two.svg" alt="one">
                                            двухместный
                                        </td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td><span>22&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-multi.svg" alt="one">
                                            многоместный
                                        </td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td><span>20&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-flat.svg" alt="one">
                                            квартира целиком
                                        </td>
                                        <td>5</td>
                                        <td>5</td>
                                        <td><span>18&#8364;</span>/persone</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/svg/i-house.svg" alt="one">
                                            дом
                                        </td>
                                        <td>12</td>
                                        <td>20</td>
                                        <td><span>15&#8364;</span>/persone</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="night">
                                <a href="#" class="favorites">
                                    <img class="favorites-icon" src="/svg/i-favourites-black.svg" alt="favorites">
                                    <img class="favorites-active-icon" src="/svg/i-favourites-active.svg" alt="favorites">
                                </a>
                                <div class="price"><span>от € 250</span> ночь</div>
                            </div>
                            <div class="rating">
                                <div class="rating-number">
                                    <img src="/img/i-rate.png" alt="rating">
                                    4.6
                                </div>
                                <a href="#" class="collapse">
                                    <svg class="minus" width="12" height="2" viewBox="0 0 12 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="12" width="2" height="12" rx="1" transform="rotate(90 12 0)" fill="#DF9D3C"/>
                                    </svg>
                                    <svg class="plus" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <rect x="12" y="5" width="2" height="12" rx="1" transform="rotate(90 12 5)" fill="#545769"/>
                                            <rect x="5" width="2" height="12" rx="1" fill="#545769"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="12" height="12" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                        <div class="google-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d577325.3464555088!2d36.825138985066985!3d55.581524476867195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54afc73d4b0c9%3A0x3d44d6cc5757cf4c!2z0JzQvtGB0LrQstCw!5e0!3m2!1sru!2sru!4v1585977864342!5m2!1sru!2sru" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>

                </div>
                </div>
            </div>


            <div class="communication">
                <div class="description">
                    Предложения по вашему запросу закончились, увеличьте дистанцию или свяжитесь с менежером напрямую
                </div>
                <a href="#">Связаться с менеджером</a>
            </div>

        </div>

    </div>

@endsection
