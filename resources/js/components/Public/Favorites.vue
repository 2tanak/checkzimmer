<template>
    <div id="app">
        <div class="list-content favorites-content">
            <div class="container">
                <h1>{{ $t('Favorites') }}</h1>
            </div>

            <div class="list-content-item">
                <div class="container">
                    <div class="sorting-block" v-if="property.length !== 0">
                        <div class="left-block">
                            <a class="list active" href="#">{{ $t('List') }}</a>
                            <a class="map" href="#">{{ $t('Map') }}</a>
                        </div>
                        <div class="sorting">
                            <a href="#">{{ $t('Sort by default') }}</a>
                            <div class="filter-block">
                                <ul>
                                    <li class="check">{{ $t('Sort by default') }}</li>
                                    <li>{{ $t('Cheap to expensive') }}</li>
                                    <li>{{ $t('Expensive to cheap') }}</li>
                                    <li>{{ $t('By rating') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="property not-map">
                    <div class="container">
                        <transition name="fade" appear>
                            <div :style="{position: 'relative', opacity: loading ? 0:1, position: loading ? 'absolute':'relative' }">
                                <div class="property-item">
                                    <PropertyListItem v-for="item in property" :key="'id-'+item.id" :item="item"/>
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
                                                <svg class="favorites-usual" width="12" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.6211 5.98172C12.6977 4.8747 12.6977 3.07667 11.6211 1.96965C10.5487 0.867074 8.8134 0.867074 7.74102 1.96965L7.20482 2.52096C7.09263 2.6363 6.90737 2.6363 6.79518 2.52096L6.25898 1.96965C5.1866 0.867074 3.45132 0.867074 2.37895 1.96965C1.30226 3.07667 1.30226 4.8747 2.37895 5.98172L7 10.7329L11.6211 5.98172ZM7.33139 1.57124C8.62813 0.237973 10.7339 0.237973 12.0307 1.57124C13.3231 2.90006 13.3231 5.05131 12.0307 6.38013L7.20482 11.3419C7.09263 11.4573 6.90737 11.4573 6.79518 11.3419L1.96932 6.38013C0.676895 5.05131 0.676895 2.90006 1.96932 1.57124C3.26606 0.237973 5.37187 0.237973 6.66861 1.57124L7 1.91196L7.33139 1.57124Z" fill="#333646" stroke="#333646" stroke-width="0.2"/>
                                                </svg>
                                                <svg class="favorites-active" width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            <div class="load-block-content" :style="{ display: loading ? 'display':'none !important' }">
                                <div class="load-block-item">
                                    <div class="load-block big-load-block">
                                        <div class="left-part images-block">
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="32" height="32" rx="2" fill="#D8D8D8"/>
                                                <path d="M10 19L4 27H28L21 16L15 24L10 19Z" fill="#EDEDEF"/>
                                            </svg>
                                        </div>
                                        <div class="load-main-block">
                                            <div class="middle-part">
                                                <div class="top-block">
                                                    <div class="middle-gray-block bg height-item margin-bottom"></div>
                                                    <div class="short-gray-block bg height-item"></div>
                                                </div>
                                                <div class="bottom-block">
                                                    <div class="circle-gray-block bg margin-right"></div>
                                                    <div class="circle-gray-block bg margin-right"></div>
                                                    <div class="circle-gray-block bg margin-right"></div>
                                                    <div class="circle-gray-block bg"></div>
                                                </div>
                                            </div>
                                            <div class="right-part">
                                                <div class="right-left">
                                                    <div class="long-gray-block bg height-item margin-bottom"></div>
                                                    <div class="long-gray-block bg height-item margin-bottom"></div>
                                                    <div class="long-gray-block bg height-item margin-bottom"></div>
                                                    <div class="long-gray-block bg height-item margin-bottom"></div>
                                                    <div class="long-gray-block bg height-item margin-bottom"></div>
                                                    <div class="long-gray-block bg height-item"></div>
                                                </div>
                                                <div class="right-right">
                                                    <div class="rectangle-content">
                                                        <div class="rectangle-block bg"></div>
                                                    </div>
                                                    <div class="circle-content">
                                                        <div class="circle-gray-block bg"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="load-block small-load-block">
                                        <div class="very-big-gray-block height-item bg"></div>
                                        <div class="very-small-block">
                                            <div class="very-small-gray-block height-item bg"></div>
                                            <div class="very-small-gray-block height-item bg"></div>
                                        </div>
                                        <div class="right-right">
                                            <div class="rectangle-content">
                                                <div class="rectangle-block bg"></div>
                                            </div>
                                            <div class="circle-content">
                                                <div class="circle-gray-block bg"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="place-card"></div>
                            </div>
                        </transition>
                    </div>
                </div>

                <transition>
                    <div class="communication" v-if="!loading && property.length === 0">
                        <div class="description">
                            {{ $t('You have not added anything to your favorites yet.') }}
                        </div>
                        <div class="link-block">
                            <a href="/">{{ $t('Go to Main page') }}</a>
                            <div class="shadow-block"></div>
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

let PropertyRequest = ApiRequest('property')
let properties = new PropertyRequest;

export default {
    name: "favorites",
    components: {
        PropertyListItem
    },
    data() {
        return {
            loading: true,
            endoflist: false,
            notAddFavorites: true,
            property: []
        }
    },
    mounted() {
        let that = this;
        let favs = JSON.parse(localStorage.getItem("favoritesList")) || [];

        properties.query({id: favs})
            .then( resp => {
                that.loading = false;
                that.favoritesDisplay();
                that.property = resp.data;
            })

        jQuery('.entry.login-link').click(function(e) {
            that.login(e);
        })
        jQuery('.modal-form.login input').on('input', function() {
            jQuery(this).removeClass('error');
            jQuery(this).closest('.input-block').find('.error-text').removeClass('active')
        });

        setTimeout(function() {
            console.log(that.$auth.user());
        }, 1000);
        jQuery('body').on('click', 'a.collapse-circle', function(e) {
            e.preventDefault();
            var parent = jQuery(this).closest('.property-card');
            jQuery(parent).toggleClass('collapse-item');
            jQuery(this).toggleClass('active');
        });
        jQuery('body').on('click', 'a.favorites', function(e) {
            e.preventDefault();
            jQuery(this).toggleClass('active');
        });
        function initMap() {
            if (typeof google === 'undefined' || !document.getElementById('map')) {
                setTimeout( () => { initMap() }, 100 )
                return;
            }
            console.log(document.getElementById('map'));
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 51.340000, lng: 12.382000},
                zoom: 8
            });
        }
        initMap()
    },
    methods: {
        favoritesCount() {
            let favs = JSON.parse(localStorage.getItem("favoritesList")) || [];
            return favs.length;
        },
        favoritesDisplay() {
            jQuery('.favoritesCount').text( this.favoritesCount() )
        },
        updateFavCount() {
            this.favoritesDisplay();
        }
    }
}
</script>

<style scoped>

</style>
