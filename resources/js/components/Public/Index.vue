<template>
    <div id="app">
        <div class="list-content">
            <div class="list-content-item">
                <div class="container">
                    <div class="sorting-block">
                        <div class="left-block">
                            <a class="list active" href="#">{{ $t('List') }}</a>
                            <a class="map" href="#">{{ $t('Map') }}</a>
                            <div class="result"><span class="property-found">{{ totals }}</span> {{ $t('housing options') }}</div>
                        </div>
                        <div class="sorting">
                            <a href="#">{{ $t('Sort by default') }}</a>
                            <div class="filter-block">
                                <ul>
                                    <li @click.prevent="loadSort('default')" class="check">{{ $t('Sort by default') }}</li>
                                    <li @click.prevent="loadSort('min')">{{ $t('Price low to high') }}</li>
                                    <li @click.prevent="loadSort('max')">{{ $t('Price high to low') }}</li>
                                    <li @click.prevent="loadSort('rating')">{{ $t('By rating') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="property not-map">
                    <div class="container">
                        <transition name="fade" appear>
                        <div class="property-container" :style="{position: 'relative', opacity: loading ? 0:1, position: loading ? 'absolute':'relative'}">
                            <div class="property-item">
                                <div>
                                    <PropertyListItem v-for="(item, index) in property" :key="'prop-id-'+index+'-'+item.id" :item="item" :active="activeItems[index]" :index="index" :ref="'listItem' + item.id" @click.native="goToMap(item, index)" @favsUpdated="updateFavCount"/>
                                </div>
                                <ItemLoading first="true" />

                                <div class="load-all-objects" v-if="loadingData" @click.prevent="loadMore">
                                    <div class="load-all">
                                        <svg class="rot" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.00281 0.330903C6.77399 0.330985 6.54232 0.342716 6.30831 0.36667C6.30831 0.36667 6.30591 0.367316 6.30125 0.368581C5.36538 0.468219 4.48872 0.76195 3.71128 1.20818C3.26076 1.46771 2.842 1.77883 2.46372 2.13299C1.86113 2.6993 1.36427 3.37639 1.00525 4.13089C0.738588 4.68923 1.13859 5.33089 1.75525 5.33089C2.01615 5.33089 2.26511 5.21157 2.41632 5.00825C3.18549 3.23976 4.95037 2.00001 6.99997 2C7.22735 2 7.45068 2.01554 7.66914 2.04554M7.00281 0.330903C8.84369 0.330239 10.5001 1.08351 11.7083 2.29167L11.7207 2.27913L12.2416 1.75C12.7666 1.225 13.6666 1.6 13.6666 2.34167V5.33334C13.6666 5.48629 13.6249 5.62996 13.5522 5.75351C13.4207 5.97705 13.188 6.13473 12.9182 6.16235C12.8903 6.16521 12.862 6.16668 12.8333 6.16668H11.9398L9.84164 6.16667C9.09997 6.16667 8.7333 5.26667 9.2583 4.74167L10.5166 3.48334C9.76469 2.72443 8.78005 2.1982 7.66966 2.04561M7.01588 13.6667C7.24303 13.6664 7.47299 13.6547 7.70526 13.6309C7.70513 13.6305 7.70501 13.6301 7.70489 13.6298C8.64366 13.5309 9.523 13.2367 10.3026 12.7892C10.7529 12.5298 11.1715 12.2187 11.5497 11.8647C12.1523 11.2984 12.6493 10.6212 13.0083 9.86668C13.275 9.30834 12.875 8.66668 12.2583 8.66668C11.9974 8.66668 11.7484 8.786 11.5972 8.98932C10.8281 10.7578 9.06319 11.9976 7.01359 11.9976C6.78625 11.9976 6.56295 11.982 6.34452 11.952C5.23387 11.7996 4.24901 11.2733 3.49692 10.5142L4.75526 9.25589C5.28026 8.73089 4.91359 7.83089 4.17192 7.83089H1.18026C1.15161 7.83089 1.12329 7.83235 1.09537 7.83521C0.825604 7.86283 0.592869 8.02051 0.461363 8.24406C0.388683 8.36761 0.346924 8.51127 0.346924 8.66422V11.6559C0.346924 12.3976 1.24692 12.7726 1.77192 12.2476L2.2929 11.7184L2.30526 11.7059C2.31587 11.7165 2.32651 11.7271 2.3372 11.7376C3.54253 12.9272 5.18604 13.6673 7.01075 13.6667C7.01246 13.6667 7.01417 13.6667 7.01588 13.6667Z" fill="#7A8793"/>
                                        </svg>
                                        <span>{{ $t('Loading') }}...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="property-shadow" v-if="property.length"></div>
                            <div class="google-map">
                                <div id="map"></div>

                                <div class="fullscreen-button"><img src="/svg/i-fullscrean.svg" alt="Full Screen Map"></div>
                                <div class="close-button"><img src="/svg/i-close-burger.svg" alt="Full Screen Map"></div>

                                <div class="mobile-picture">
                                    <img src="/img/property-picture.png" alt="alt">
                                </div>
                                <div class="property-card">
                                    <div class="mobile-card-button"></div>
                                    <div class="property-card-slider">
                                        <div><img src="/img/property-picture.png" alt="Property picture"></div>
                                        <div><img src="/img/property-picture2.png" alt="Property picture"></div>
                                        <div><img src="/img/property-picture.png" alt="Property picture"></div>
                                        <div><img src="/img/property-picture2.png" alt="Property picture"></div>
                                        <div><img src="/img/property-picture.png" alt="Property picture"></div>
                                    </div>
                                        <div class="data">
                                            <a href="#" class="title"><span>Frisch renovierte 4 Zimmer in Grimma West Leipzig</span></a>
                                            <div class="data-item">
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
                                    <table class="type">
                                        <thead>
                                            <tr>
                                                <th class="title">Тип</th>
                                                <th class="title">Кол-во</th>
                                                <th class="title">Personen</th>
                                                <th class="title">Цена</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="room in property.rooms">
                                                <td class="type-block filling-block">
                                                    <img  src="svg/i-one.svg" alt="Одноместный">
                                                    одноместный
                                                </td>
                                                <td class="type-block quantity-block">{{ room.number }}</td>
                                                <td class="type-block personen-block">{{ room.person }}</td>
                                                <td class="type-block price-block"><b>{{  minRoomPrice(item, room) }}&#8364;</b>/persone</td>
                                            </tr>
                                            <tr>
                                                <td class="type-block">
                                                    <img  src="svg/i-one.svg" alt="Одноместный">
                                                    одноместный
                                                </td>
                                                <td class="type-block quantity-block">1</td>
                                                <td class="type-block personen-block">1</td>
                                                <td class="type-block price-block"><b>25&#8364;</b>/persone</td>
                                            </tr>
                                            <tr>
                                                <td class="type-block">
                                                    <img  src="svg/i-two.svg" alt="двухместный">
                                                    двухместный
                                                </td>
                                                <td class="type-block quantity-block">2</td>
                                                <td class="type-block personen-block">2</td>
                                                <td class="type-block price-block"><b>22&#8364;</b>/persone</td>
                                            </tr>
                                            <tr>
                                                <td class="type-block">
                                                    <img  src="svg/i-multi.svg" alt="многоместный">
                                                    многоместный
                                                </td>
                                                <td class="type-block quantity-block">3</td>
                                                <td class="type-block personen-block">3</td>
                                                <td class="type-block price-block"><b>20&#8364;</b>/persone</td>
                                            </tr>
                                            <tr>
                                                <td class="type-block">
                                                    <img  src="svg/i-flat.svg" alt="квартира целиком">
                                                    квартира целиком
                                                </td>
                                                <td class="type-block quantity-block">5</td>
                                                <td class="type-block personen-block">5</td>
                                                <td class="type-block price-block"><b>18&#8364;</b>/persone</td>
                                            </tr>
                                            <tr>
                                                <td class="type-block">
                                                    <img  src="svg/i-house.svg" alt="дом">
                                                    дом
                                                </td>
                                                <td class="type-block quantity-block">12</td>
                                                <td class="type-block personen-block">20</td>
                                                <td class="type-block price-block"><b>15&#8364;</b>/persone</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="night">
                                        <a href="#" class="favorites">
                                            <svg class="favorites-usual" width="12" height="11" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.6211 5.98172C12.6977 4.8747 12.6977 3.07667 11.6211 1.96965C10.5487 0.867074 8.8134 0.867074 7.74102 1.96965L7.20482 2.52096C7.09263 2.6363 6.90737 2.6363 6.79518 2.52096L6.25898 1.96965C5.1866 0.867074 3.45132 0.867074 2.37895 1.96965C1.30226 3.07667 1.30226 4.8747 2.37895 5.98172L7 10.7329L11.6211 5.98172ZM7.33139 1.57124C8.62813 0.237973 10.7339 0.237973 12.0307 1.57124C13.3231 2.90006 13.3231 5.05131 12.0307 6.38013L7.20482 11.3419C7.09263 11.4573 6.90737 11.4573 6.79518 11.3419L1.96932 6.38013C0.676895 5.05131 0.676895 2.90006 1.96932 1.57124C3.26606 0.237973 5.37187 0.237973 6.66861 1.57124L7 1.91196L7.33139 1.57124Z" fill="#333646" stroke="#333646" stroke-width="0.2"/>
                                            </svg>
                                            <svg class="favorites-active" width="14" height="11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.1 1.5c-.6-.7-1.5-1-2.4-1-.9 0-1.8.4-2.4 1l-.3.3-.3-.3C6.1.8 5.2.5 4.3.5c-.9 0-1.8.4-2.4 1C.6 2.9.6 5.1 1.9 6.4l4.8 5c.1.1.2.1.3.1.1 0 .2 0 .3-.1l4.8-5c1.3-1.3 1.3-3.5 0-4.9z" fill="#EE483F"/>
                                            </svg>
                                        </a>
                                        <div class="price"><span>от € 250</span> ночь</div>
                                    </div>
                                    <div class="rating">
                                        <div class="rating-number">
                                            <img src="/img/i-rate.png" alt="rating">
                                            4.6
                                        </div>
                                        <a href="#" class="collapse-circle">
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
                        </div>
                        </transition>
                        <transition name="fade">
                        <div class="load-block-content" :style="{ display: loading ? 'block':'none !important' }">
                            <div class="load-block-item">
                                <div class="load-block big-load-block">
                                    <div class="left-part images-block recast">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
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

                                <div class="load-block big-load-block">
                                    <div class="left-part images-block recast">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                    <div class="circle-gray-block bg recast "></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="place-card"></div>
                        </div>
                        </transition>
                    </div>
                </div>

                <div class="container">
                    <PromoBlock v-if="false" />
                </div>

                <div class="alternative-classifieds" v-if="this.nodist && this.propertyAlt.length">
                    <div class="property not-map">
                    <div class="container">
                        <span class="title-text">Alternative Anzeigen in der Umgebung</span>
                        <div class="alternative-classifieds-content">
                            <PropertyListItem v-for="(item, index) in propertyAlt" :key="'prop-id-'+index+'-'+item.id" :item="item" :active="activeItems[index]" :index="index" :ref="'listItem' + item.id" @click.native="goToMap(item, index)" @favsUpdated="updateFavCount"/>
                        </div>
                    </div>
                    </div>
                </div>


                <transition name="fade">
                <div class="communication not-active" style="top:34px;position:relative;">
                    <div class="description">
                    <div class="load-more" v-if="additional_load">
                        <div style="display:none;" class="btn btn-success" @click.prevent="loadMore">{{ $t('Load more') }}</div>
                    </div>
                    <div style="display:none;" class="description" v-if="!additional_load && !endoflist">
                        {{ $t('The offers on your request are over, but you can check surrounding places within chosen distance') }}
                    </div>
                    <div class="description" v-if="!additional_load && endoflist">
                        {{ $t('The offers on your request are over, increase the distance or contact the manager directly') }}
                    </div>
                    <div style="display:none;" class="link-block" v-if="!additional_load && !endoflist">
                        <a href="/registration" @click.prevent="loadMore">{{ $t('Load surrounding places') }}</a>
                        <div class="shadow-block"></div>
                    </div>
                    <div class="link-block" v-if="!additional_load && endoflist" @click.prevent="modalShow">
                        <a href="#">{{ $t('Contact manager') }}</a>
                        <div class="shadow-block"></div>
                    </div>
                </div>
                </div>
                </transition>

            </div>

        </div>
    </div>
</template>

<script>

import ApiRequest from "../API/ApiRequest";
import PropertyListItem from "./PropertyListItem";
import ItemLoading from "./partials/ItemLoading";

import styles from '../Data/mapStyle';
import popupInit from '../Data/mapMarker';
import PromoBlock from "./partials/PromoBlock";
let PropertyRequest = ApiRequest('property')
let properties = new PropertyRequest;

let search = document.location.search.substr(1).split('&').map( item => item.split('=') );
let searchLine = {};

for (let i in search) {
    searchLine[ search[i][0] ] = search[i][1]
}

let newSearch = {
    address: searchLine.address || '',
    distance: searchLine.distance || '30',
    people: searchLine.person || '2',
    single: false,
    double: false,
    multi: false,
    ord: 'def'
};

export default {
    name: 'app',
    components: {
        PromoBlock,
        PropertyListItem,
        ItemLoading
    },
    data() {
        return {
            map: null,
            loading: true,
            loadingData: false,
            endoflist: false,
            property: [],
            totals: 0,
            propertyAlt: [],
            page: 1,
            nocity: 0,
            nodist: 0,
            additional_load: true,
            coords_load: [],
            additional_pages: true,
            search: {...newSearch},
            activeItems: [],
        };
    },
    mounted() {
        let that = this;

        jQuery('.entry.login-link').click(function(e) {
            that.login(e);
        })
        jQuery('.modal-form.login input').on('input', function() {
            jQuery(this).removeClass('error');
            jQuery(this).closest('.input-block').find('.error-text').removeClass('active')
        });
        jQuery(document).on('click', '.popup-container .index', (e) => {
            this.selectMapMarker(e);
        });
        jQuery('#number-personse').change( (e) => {
            this.search.people = jQuery('#number-personse').val()
        })
        jQuery('#distance-select').change( (e) => {
            this.search.distance = jQuery('#distance-select').val()
        })
        jQuery('#text').on('input', (e) => {
            this.search.address = jQuery('#text').val()
        })
        jQuery('#single-rooms').on('input', (e) => {
            this.search.single = jQuery('#single-rooms').prop('checked')
        })
        jQuery('#double-rooms').on('input', (e) => {
            this.search.double = jQuery('#double-rooms').prop('checked')
        })
        jQuery('#multi-bed-rooms').on('change', (e) => {
            this.search.multi = jQuery('#multi-bed-rooms').prop('checked')
        })

        jQuery('.find-housing').click((e) => {
            e.preventDefault();
            this.submitForm(true);
        });

        jQuery(window).scroll((e) => {
            this.mapScrolling()
        });

        this.submitForm(true);

        jQuery('body').on('click', 'a.favorites', function(e) {
            e.preventDefault();
            jQuery(this).toggleClass('active');
        });
        jQuery(window).scroll( () => {
            this.lazySearch()
        })

        let timer = null;
        jQuery('[name="address"]').on('focus', () => {
            let item = jQuery('.result-search ul li:first-child');
            if (jQuery(item).attr('type')) {
                jQuery('.result-search').addClass('active');
            }
        });
        jQuery('[name="address"]').on('input', (e) => {
            if (e.target.value.length < 3) {
                return;
            }
            if (timer) {
                clearTimeout(timer);
            }
            timer = setTimeout( () => {
                timer = null;
                // ToDo: geocode address in not postcode or city
                // ToDo: check distances for city and postcode in case ciy does not have a domain
                axios.post('/search/tooltip', { input: e.target.value})
                    .then( (resp) => {
                        that.searchRes = resp.data;
                        if (that.searchRes.length === 0) {
                            jQuery('.result-search ul').html('<li>' + that.$t('No results found') + '</li>');
                            jQuery('.result-search').addClass('active');
                            return;
                        }
                        let str = [];
                        for (let i in that.searchRes) {
                            let value = that.searchRes[i]['type'] === 'code' ? that.searchRes[i]['code'] : '';
                            let line = `<li type="${that.searchRes[i]['type']}" domain="${that.searchRes[i]['domain']}" value="${value}">${that.searchRes[i]['text']}</li>`;
                            str.push(line)
                        }
                        jQuery('.result-search ul').html(str);
                        jQuery('.result-search').addClass('active');
                    })
            }, 1000)
        })
        jQuery('.result-search').on('click', 'ul li', (e) => {
            let type = jQuery(e.target).attr('type');
            if (!type) {
                jQuery('.result-search').removeClass('active');
                return;
            }
            let domain = jQuery(e.target).attr('domain');
            let value = jQuery(e.target).attr('value');

            jQuery('form input[name="address"]').val(value);
            jQuery('form input[name="address"]').attr('type', type);
            jQuery('form input[name="address"]').attr('domain', domain);
            let subdomain = domain.split('//')[1].split('.')[0];
            let current = document.location.hostname.split('.')[0];
            if (current !== subdomain) {
                //console.log(domain + '/?' + jQuery('form.find-subdomain-redirect').serialize().replace(/_token=.*?&/, ''));
                document.location = domain + '/?' + jQuery('form.find-subdomain-redirect').serialize().replace(/_token=.*?&/, '');
            } else {
                this.search.address = value;
                jQuery('.result-search').removeClass('active');
                this.submitForm(true);
            }

        })
        jQuery('body').on('click', (e) => {
            if (jQuery(e.target).closest('.result-search').length === 0 && jQuery(e.target).closest('form').length === 0) {
                jQuery('.result-search').removeClass('active');
            }

        })
    },
    methods: {
        lazySearch() {
            if (this.loadingData) {
                return;
            }
            let screenTop = jQuery(window).scrollTop();
            let screenHeight = jQuery(window).height();
            let itemTop = jQuery('.property-container').offset().top;
            let itemHeight = jQuery('.property-container').height();

            if (screenTop + screenHeight + 200 > itemTop + itemHeight && !this.endoflist) {
                this.submitForm();
            }
        },
        modalShow() {
            jQuery('.inquiry-modal-overlay').addClass('modal-show');
        },
        mapScrolling() {
            if (!jQuery('.list-content .property').hasClass('show-map')) {
                return;
            }
            let mapLayout = jQuery('.property-container').offset();
            let scrollTop = jQuery(window).scrollTop();
            let delta = scrollTop - mapLayout.top;
            let scrollEnd = scrollTop - (mapLayout.top + jQuery('.property-container').height() - jQuery(window).height());
            if (delta > 0 && scrollEnd <=0) {
                jQuery('.list-content .google-map').css({ position: 'fixed', transform: 'translate3d(0, 0, 0)' })

            } else if (scrollEnd > 0 ) {
                jQuery('.list-content .google-map').css({ position: 'fixed', transform: 'translate3d(0, -'+scrollEnd+'px, 0)', 'transition-duration': '0' })
            } else {
                jQuery('.list-content .google-map').css({ position: 'absolute', transform: 'translate3d(0, 0, 0)' })
            }

        },
        initMap() {
            if (typeof google === 'undefined' || !document.getElementById('map')) {
                setTimeout( () => { this.initMap() }, 100 );
                return;
            }

            this.map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 51.340654, lng: 12.375411},
                disableDefaultUI: true,
                zoom: 15,
                styles: styles
            });

            this.map.setOptions({styles: styles});
            this.setMapMarker();
        },
        setMapMarker() {
            if (typeof google === 'undefined' || !document.getElementById('map')) {
                setTimeout(() => {
                    this.setMapMarker();
                }, 100);
            } else {
                let popupClass = new popupInit();
                let popupFactory = new popupClass.init();
                this.property.forEach(item => {
                    var popup = new popupFactory(
                        new google.maps.LatLng(parseFloat(item.lat), parseFloat(item.lng)),
                        this.createInfoBlock('&euro;' + this.minRoomPrice(item), item.id)
                    );
                    popup.setMap(this.map);
                })
            }
        },
        goToMap(item, index) {
            this.setActiveProperty(index);
            this.map.setCenter({ lat: parseFloat(item.lat), lng: parseFloat(item.lng)});
            setTimeout(() => {
                jQuery('.popup-bubble[data-id="' + item.id + '"]').closest('.popup-bubble-anchor').addClass('active');
            }, 10);
        },
        createInfoBlock(text, id) {
            var newDiv = document.createElement("div");
            newDiv.setAttribute("id", "object_modal");
            newDiv.setAttribute("data-id", id);
            newDiv.innerHTML = '<span class="index">'+ text +'</span>';
            newDiv.addEventListener("click", this.selectMapMarker);
            return newDiv;
        },
        selectMapMarker(e) {
            let elem = e.target;
            if (jQuery(elem).hasClass('index')) {
                elem = jQuery(elem).parent();
            }

            let id = parseInt(jQuery(elem).attr('data-id'));

            let index = this.property.findIndex( item => item.id === id );

            this.setActiveProperty(index);
            this.scrollActiveMap(id);

            jQuery(elem).closest('.popup-bubble-anchor').addClass('active');

        },
        setActiveProperty(index) {
            jQuery('.popup-bubble-anchor').removeClass('active');
            this.activeItems.forEach((item, ind) => {
                Vue.set(this.activeItems, ind, false);
            })
            Vue.set(this.activeItems, index, true);

        },
        scrollActiveMap(id) {
            let elem = document.getElementById('property-'+id);
            let rect = elem.getBoundingClientRect();
            jQuery('html, body').animate({scrollTop: window.scrollY + rect.top - 200}, 200);
        },
        login(e) {
            e.preventDefault();
            let res = true;
            jQuery('.modal-form.login input').each(function() {
                var value = jQuery(this).val();
                if (value === '') {
                    jQuery(this).addClass('error');
                    jQuery(this).closest('.input-block').find('.error-text').addClass('active')
                    res = false;
                }
            })

            if (res === false) {
                return;
            }
            this.$auth.login({
                data: {
                    email: jQuery('#mail-phone').val(),
                    password: jQuery('#password').val()
                },
                redirect: '/dashboard',
                staySignedIn: true,
                fetchUser: true
            })
            .then((resp) => {
                document.location = '/dashboard';
            });
        },

        submitForm(clear) {
            clear = clear || false

            if (clear) {
                this.page = 1;
                this.nocity = 0;
                this.additional_load = true;
                this.endoflist = false;
                this.nodist = 0;
                this.property = [];
                this.propertyAlt = [];
            } else {
                this.page += 1;
            }

            this.loadingData = true;
            let that = this;

            let search = { ...this.search };
            search.distance = this.nodist ? search.distance : 60;

           properties.request('queryFilter', this.search, 'post', { page: this.page, nocity: this.nocity, nodist: this.nodist})
                .then( resp => {
                    if (!this.nodist) {
                        that.property = that.property.concat(resp.data.objects.data);
                    } else {
                        that.propertyAlt = resp.data.objects.data;
                    }
                    that.totals = resp.data.objects.total;
                    that.page = resp.data.objects.current_page;
                    that.additional_pages = resp.data.current_page < resp.data.last_page;
                    that.loadingData = false;
                    that.loading = false;
                    if (resp.data.objects.current_page  >= resp.data.objects.last_page) {
                        if (that.additional_load === false) {
                            if (this.nodist === 0 ) {
                                that.nodist = 1;
                            } else {
                                that.endoflist = true;
                            }

                        }
                        that.additional_load = false;
                        that.page = 0;
                        that.nocity = 1;
                    }
                    that.foundTotal()
                    that.favoritesDisplay();
                    that.initMap();
                })
        },
        loadMore() {
            let that = this;
            that.page = ++that.page;
            let params = {};
            if (!this.additional_load) {
                params.nocity = 1
            }
            properties.byPage(that.page, params)
                .then( resp => {
                    that.property = that.property.concat(resp.data.objects.data);
                    that.loading = false;
                    that.additional_pages = resp.data.current_page < resp.data.last_page;

                    if (resp.data.objects.current_page  >= resp.data.objects.last_page - 1) {
                        if (that.additional_load == false) {
                            that.endoflist = true;
                        }
                        that.additional_load = false;
                        that.page = 0;
                    }

                    that.favoritesDisplay();
                    that.foundTotal();
            })
        },

        loadSort(order) {
            this.search.ord = order;
            this.loading = true;
            this.loadingData = true;
            this.submitForm(true);

            /*properties.request('querySort', data)
                .then( resp => {
                    this.property = resp.data.objects.data;
                    that.favoritesDisplay();
                    that.foundTotal();
                })*/
        },

        favoritesCount() {
            let favs = JSON.parse(localStorage.getItem("favoritesList")) || [];
            let favNoNull = favs.filter( (item) => item !== null);
            if (favs.filter( (item) => item === null).length) {
                localStorage.setItem('favoritesList', JSON.stringify(favNoNull));
            }
            return favNoNull.length;
        },
        favoritesDisplay() {
            jQuery('.favoritesCount').text( this.favoritesCount() )
        },
        updateFavCount() {
            this.favoritesDisplay();
        },
        foundTotal() {
        },
        minRoomPrice(property, room) {
            if (room && room.price) {
                return room.price;
            }
            if (property.rooms.length === 0) {
                return 0;
            }
            return property.rooms.reduce( (acc, cur) => cur.price ? ( acc ? Math.min(acc, cur.price) : cur.price ) : acc, 0 )
        }
    }
}
</script>
<style>
.fade-enter-active, .fade-leave-active {
    transition: opacity 1.2s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
    opacity: 0;
}
/* The popup bubble styling. */
.popup-bubble {
    /* Position the bubble centred-above its parent. */
    position: absolute;
    top: 0;
    left: 0;
    transform: translate(-50%, -100%);
    /* Style the bubble. */
    background-color: white;
    padding: 5px;
    border-radius: 5px;
    font-family: sans-serif;
    overflow-y: auto;
    max-height: 60px;
    box-shadow: 0px 2px 10px 1px rgba(0, 0, 0, 0.5);
}

/* The parent of the bubble. A zero-height div at the top of the tip. */
.popup-bubble-anchor {
    /* Position the div a fixed distance above the tip. */
    position: absolute;
    width: 100%;
    bottom: 8px;
    left: 0;
}

/* This element draws the tip. */
.popup-bubble-anchor::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    /* Center the tip horizontally. */
    transform: translate(-50%, 0);
    /* The tip is a https://css-tricks.com/snippets/css/css-triangle/ */
    width: 0;
    height: 0;
    /* The tip is 8px high, and 12px wide. */
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-top: 8px solid white;
}

/* JavaScript will position this div at the bottom of the popup tip. */
.popup-container {
    cursor: auto;
    height: 0;
    position: absolute;
    /* The max width of the info window. */
    width: 200px;
}
</style>
