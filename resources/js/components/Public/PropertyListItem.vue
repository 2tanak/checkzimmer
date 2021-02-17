<template>
    <div :class="{'property-card':true, 'active' : active}" :id="'property-'+item.id">
        <div class="property-card-container">
            <div style="position:relative;" class="no-photo-block">
                <div class="no-photo" v-if="noPhotos">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="32" height="32" rx="2" fill="#EDEDEF"></rect> <path d="M10 19L4 27H28L21 16L15 24L10 19Z" fill="#D8D8D8"></path></svg>
                </div>
                <div v-if="isSuperhost" class="superhost-icon">{{ $t('Superhost') }}</div>
            </div>
            <div style="position:relative;" v-if="getPhotos.length && !sizedForSlider">
                <a href="":href="'/'+$i18n.locale+'/single/'+item.slug" class="img-link">
                    <img v-if="getPhotos.length && !sizedForSlider" :src="getPhotos[0].url_max300">
                </a>
                <div v-if="isSuperhost" class="superhost-icon">{{ $t('Superhost') }}</div>
            </div>
            <div style="position:relative;" v-if="getPhotos.length && sizedForSlider">
                <VueSlickCarousel v-if="getPhotos.length && sizedForSlider" class="property-card-slider" :arrows="false" :dots="true"
                                  :slidesToShow="1" :slidesToScroll="1"
                                  ref="carousel" :infinite="true">
                    <div v-for="photo in getPhotos" class="slider-item">
                        <a style="display:block;" :href="'/'+$i18n.locale+'/single/'+item.slug">
                            <img :src="photo.url_max300" alt="Property picture">
                        </a>
                    </div>
                </VueSlickCarousel>
                <div v-if="isSuperhost" class="superhost-icon">{{ $t('Superhost') }}</div>
            </div>
            <div class="data">
                <a :href="'/'+$i18n.locale+'/single/'+item.slug" class="title"><span>{{ item.name }}</span></a>
                <div class="data-item">
                    <div v-if="hideAdress" class="data-item-container">
                        <div class="distance" v-if="distance">
                            <img src="/svg/i-distance.svg" alt="">
                            {{ distance }}{{ $t('km') }} {{ $t('from') }} &nbsp; <span class="desctop-span">{{ $t('said') }}</span> <span class="mobile-span">{{ $t('said') }}.</span> &nbsp; {{ $t('your addresses') }}
                        </div>
                    <div class="geolocation">
                        <img src="/svg/i-pin.svg" alt="">
                        {{ item.zip }}, {{ item.city }}
                    </div>
                    <div class="humans">
                        <img src="/svg/i-people.svg" alt="">
                        {{  sumPeopleNumStr }}
                    </div>
                    <div class="distance" v-if="distance">
                        <img src="/svg/i-distance.svg" alt="">
                        {{ distance }}{{ $t('km') }} {{ $t('from') }} &nbsp; <span class="desctop-span">{{ $t('said') }}</span> <span class="mobile-span">{{ $t('said') }}.</span> &nbsp; {{ $t('your addresses') }}
                    </div>
                    <div class="additionally">
                        <div v-if="hasWiFi" class="wi-fi data-block-circle" title="WiFi">
                            <div class="tooltip-block">{{ $t('WiFi') }}</div>
                            <img src="/svg/i-wifi.svg">
                        </div>
                        <div v-if="hasLaundry" class="laundry data-block-circle" title="Laundry">
                            <div class="tooltip-block">{{ $t('Washing machine') }}</div>
                            <img src="/svg/i-washingmachine.svg">
                        </div>
                        <div v-if="hasTV" class="tv data-block-circle" title="TV">
                            <div class="tooltip-block">{{ $t('Tv') }}</div>
                            <img src="/svg/i-tv.svg">
                        </div>
                        <div v-if="getBedType" class="bed data-block-oval" title="Bed">
                            <img v-if="getBedType === 'single'" src="/svg/i-singlebed.svg">
                            <img v-if="getBedType === 'double'" src="/svg/i-bedroom.svg">
                            <span class="property-title">{{ getBedType }} {{ $t('bed') }}</span>
                        </div>
                        <div v-if="getKitchenType" class="kitchen data-block-oval">
                            <img src="/svg/i-canteen.svg">
                            <span class="property-title" v-if="getKitchenType !== 'kitchenette'">
                                {{ getKitchenType }} {{ $t('kitchen') }}
                            </span>
                            <span v-else>
                                {{ getKitchenType }}
                            </span>
                        </div>
                        <div v-if="getShowerType" class="shower data-block-oval">
                            <img src="/svg/i-shower.svg">
                            {{ getShowerType }} {{ $t('shower') }}
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="table-container">
                <table class="type">
                    <thead>
                    <tr>
                        <th class="title">{{ $t('Type') }}</th>
                        <th class="title">{{ $t('Num') }}</th>
                        <th class="title">{{ $t('Personen') }}</th>
                        <th class="title">{{ $t('Price') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="room in item.rooms.slice(0, 5)">
                        <td class="type-block filling-block">
                            <img :src="getPersonsPic(room.person)" :alt="getPersonsText(room.person)">
                            <span> {{  room.room_type ? room.room_type.name : getRoomName(room) }} </span>
                        </td>
                        <td class="type-block quantity-block">{{ room.number }}</td>
                        <td class="type-block personen-block">{{ room.person }}</td>
                        <td class="type-block price-block"><b>{{ getMinRoomPrice(item, room) }}&#8364;</b>/{{ $t('persone') }}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="all-types-content fade collapse active" :id="'id-' + item.id">
                    <table class="type collapse-table">
                        <tbody>
                        <tr v-for="room in item.rooms.slice(5)">
                            <td class="type-block filling-block">
                                <img :src="getPersonsPic(room.person)" :alt="getPersonsText(room.person)">
                                <span> {{ room.room_type ? room.room_type.name : getRoomName(room) }} </span>
                            </td>
                            <td class="type-block quantity-block">{{ room.number }}</td>
                            <td class="type-block personen-block">{{ room.person }}</td>
                            <td class="type-block price-block"><b>{{ getMinRoomPrice(item, room) }}&#8364;</b>/{{ $t('persone') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <a v-if="item.rooms.length > 5" :href="'#' + 'id-' + item.id" class="all-types" aria-expanded="false" role="button" data-toggle="collapse" :aria-controls="'id-' + item.id">
                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 1.5C6.72386 1.5 6.5 1.72386 6.5 2V6H2.5C2.22386 6 2 6.22386 2 6.5C2 6.77614 2.22386 7 2.5 7H6.5V11C6.5 11.2761 6.72386 11.5 7 11.5C7.27614 11.5 7.5 11.2761 7.5 11V7H11.5C11.7761 7 12 6.77614 12 6.5C12 6.22386 11.7761 6 11.5 6H7.5V2C7.5 1.72386 7.27614 1.5 7 1.5Z" fill="#7A8793"/>
                    </svg>
                    <span>{{ $t('Show all facilities') }}</span>
                </a>
            </div>
            <div class="night-rating-block">
                <div class="night">
                    <a href="#" class="favorites" :class="{ active: isFavorite }" @click.prevent="addToFavorites">
                        <svg class="favorites-usual" width="12" height="11" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.6211 5.98172C12.6977 4.8747 12.6977 3.07667 11.6211 1.96965C10.5487 0.867074 8.8134 0.867074 7.74102 1.96965L7.20482 2.52096C7.09263 2.6363 6.90737 2.6363 6.79518 2.52096L6.25898 1.96965C5.1866 0.867074 3.45132 0.867074 2.37895 1.96965C1.30226 3.07667 1.30226 4.8747 2.37895 5.98172L7 10.7329L11.6211 5.98172ZM7.33139 1.57124C8.62813 0.237973 10.7339 0.237973 12.0307 1.57124C13.3231 2.90006 13.3231 5.05131 12.0307 6.38013L7.20482 11.3419C7.09263 11.4573 6.90737 11.4573 6.79518 11.3419L1.96932 6.38013C0.676895 5.05131 0.676895 2.90006 1.96932 1.57124C3.26606 0.237973 5.37187 0.237973 6.66861 1.57124L7 1.91196L7.33139 1.57124Z" fill="#333646" stroke="#333646" stroke-width="0.2"/>
                        </svg>
                        <svg class="favorites-active" width="14" height="11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.1 1.5c-.6-.7-1.5-1-2.4-1-.9 0-1.8.4-2.4 1l-.3.3-.3-.3C6.1.8 5.2.5 4.3.5c-.9 0-1.8.4-2.4 1C.6 2.9.6 5.1 1.9 6.4l4.8 5c.1.1.2.1.3.1.1 0 .2 0 .3-.1l4.8-5c1.3-1.3 1.3-3.5 0-4.9z" fill="#EE483F"/>
                        </svg>
                    </a>
                    <div class="price"><span>{{ $t('from') }} &euro;{{ minRoomPrice }}</span> {{ $t('night') }}</div>
                    <div class="price-free">
                        <div v-if="isRealPrice" class="real-price">
                            <svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99502 1.00501C9.26839 1.27838 9.26839 1.7216 8.99502 1.99496L3.99502 6.99496C3.72166 7.26833 3.27844 7.26833 3.00507 6.99496L0.505074 4.49496C0.231707 4.2216 0.231707 3.77838 0.505074 3.50501C0.778441 3.23165 1.22166 3.23165 1.49502 3.50501L3.50005 5.51004L8.00507 1.00501C8.27844 0.731646 8.72166 0.731646 8.99502 1.00501Z" fill="#333646"/>
                            </svg>
                            <span>{{ $t('Real price') }}</span>
                        </div>
                        <div v-if="isFree" class="free">
                            <div class="green-circle"></div>
                            <span>{{ $t('Free') }}</span>
                        </div>
                    </div>
                </div>
                <div class="rating">
                    <div v-if="item.rate" class="rating-number">
                        <img src="/img/i-rate.png" alt="rating">
                        {{ item.rate }}
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
</template>

<script>
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
export default {
    name: "PropertyListItem",
    props: [ 'item', 'active' ],
    components: { VueSlickCarousel },
    data() {
        return {
            sizedForSlider: true,
            NoPhoto: false,
            hideAdress: true,
        }
    },
    mounted() {
        jQuery(document).ready( () => {
            this.sizedForSlider = jQuery(window).width() > 1040;
        });
    },
    created() {
        this.checkHideAdressStatus();
    },
    methods: {
        checkHideAdressStatus(){
            if(this.item.options.filter(it => it.key === 'hide_address').length === 1)
                this.hideAdress = false;
        },
        findOption(name) {
            if (!this.item.options) {
                return false;
            }
            return this.item.options.find( elem => elem.key === name);
        },
        findOptionRoom(room, name) {
            if (!room.options) {
                return false;
            }
            return room.options.find( elem => elem.key === name);
        },
        sumPeopleNum() {
            if (!this.item.rooms.some( elem => elem.person > 0 )) {
                return 'n/a';
            }
            return this.item.rooms.reduce((sum, elem) => sum + elem.person * elem.number, 0)
        },
        addToFavorites() {
            let id = this.item.id;
            let favoritesObject = JSON.parse(localStorage.getItem("favoritesList"));

            if (favoritesObject === null) {
                favoritesObject = [];
            }
            if (favoritesObject.indexOf(id) !== -1) {
               favoritesObject.splice(favoritesObject.indexOf(id), 1);
            } else {
                favoritesObject.push(id);
            }
            localStorage.setItem('favoritesList', JSON.stringify(favoritesObject));
            this.$emit('favsUpdated');
        },
        getMinRoomPrice(property, room) {
            if (room.price) {
                return Math.floor(room.price);
            }
            return this.minRoomPrice;
        },
        getPersonsPic(number) {
            switch (number) {
                case 1: return '/svg/i-one.svg';
                case 2: return '/svg/i-two.svg';
                default: return '/svg/i-multi.svg';
            }
        },
        getPersonsText(number) {
            switch (number) {
                case 1: return this.$t('single');
                case 2: return this.$t('double');
                case 3: return this.$t('triple');
                case 4: return this.$t('quadruple');
                case 5: return this.$t('five-seater');
                case 6: return this.$t('six-seater');
                case 7: return this.$t('seven-seater');
                case 8: return this.$t('eight-seater');
                default: return this.$t('not specified');
            }
        },
        getRoomOptionByType(name){
            let resultName = name.charAt(0).toUpperCase() + name.slice(1);
            let result =[];
            this.item.rooms.some( room => {
                if(room[name] !== 'none') {
                    let text = room[name].charAt(0).toUpperCase() + room[name].slice(1);
                    if(result.indexOf(text) === -1)
                        result.push(text);
                }
            } );
            if(result.length > 0)
                return  (result[result.length - 1] === 'Kitchenette')? result.join(' + ') : result.join(' + ') + ' ' + resultName ;
            else
                return false;
        },
        getRoomName(room) {
            //let name = this.findOptionRoom(room, 'name');
            let names = ['', this.$t('Single room'), this.$t('Double room'), this.$t('Triple room'), this.$t('Quadruple'), this.$t('Quintuple'), this.$t('Six-seater'), this.$t('Seven-seater'), this.$t('Eight-seater'), this.$t('Nine-seater'), this.$t('Ten-seater') ]
            return names[room.person] ? names[room.person] : 'n/a';
        },
        featureName(item) {
            let la = this.language_active;
            let translation = item.options.find( item => item.key === 'lang-' + la );
            return translation ? translation.value : item.name;
        },
    },
    computed: {
        isSuperhost() {
            let superhost = this.findOption('superhost')
            return superhost && parseInt(superhost.value);
        },
        isHideZip() {
            let hideZip = this.findOption('hideZip');
            return hideZip && parseInt(hideZip.value);
        },
        isRealPrice() {
            let realprice = this.findOption('realprice');
            return realprice && parseInt(realprice.value);
        },
        isFree() {
            let free = this.findOption('free');
            return free && parseInt(free.value);
        },
        getKitchenType() {
            let personal = this.item.rooms.some( room => room['kitchen'] === 'single' );
            let kitchenette = this.item.rooms.some( room => room['kitchen'] === 'kitchenette' );
            let shared = this.item.rooms.some( room => room['kitchen'] === 'shared' );
            return personal ? 'private' : ( kitchenette ? 'kitchenette' : ( shared ? 'shared' : ''));
        },
        getShowerType() {
            let personal = this.item.rooms.some( room => room['shower'] === 'single' );
            let shared = this.item.rooms.some( room => room['shower'] === 'shared' );
            return personal ? 'private' : ( shared ? 'shared' : '');
        },
        getBedType() {
            let single = this.item.rooms.some( room => room['bed'] === 'single' );
            let double = this.item.rooms.some( room => room['bed'] === 'double' );
            return single ? 'single' : ( double ? 'double' : '');
        },
        sumPeopleNumStr() {
            let sum = this.sumPeopleNum(),
                base_sum = sum;
            if (sum === 'n/a') {
                return sum;
            }
            sum = sum % 10;
            if (sum >= 2 && sum <= 4) {
                return base_sum + ' ' + this.$t('people');
            }
            return base_sum + ' ' + this.$t('person');
        },
        minRoomPrice() {
            let prices = this.item.rooms.map( elem => elem.price ).filter( elem => elem > 0);
            if (prices.length === 0) {
                return 0
            }
            return Math.floor(Math.min( ...prices ));
        },
        getPhotos() {
            let photos = this.findOption('photos');
            if (!photos) {
                return []
            }
            return JSON.parse(photos.value).slice(0, 5);
        },
        noPhotos() {
            return this.getPhotos.length === 0;
        },
        getRooms() {
            return this.item.rooms;
        },
        isFavorite() {
            let id = this.item.id;
            let favoritesObject = JSON.parse(localStorage.getItem("favoritesList")) || [];

            return favoritesObject.includes(id);
        },
        hasWiFi() {
            if (!this.findOption('features')) {
                return false;
            }
            let features = JSON.parse(this.findOption('features').value);
            return features.some( itm => itm.name === 'WiFi' );
        },
        hasLaundry() {
            if (!this.findOption('features')) {
                return false;
            }
            let features = JSON.parse(this.findOption('features').value);
            return features.some( itm => itm.name === 'Laundry' );
        },
        hasTV() {
            if (!this.findOption('features')) {
                return false;
            }
            return this.item.rooms.some( room => {
                let facilities = this.findOptionRoom(room, 'facilities');
                let features = facilities ? JSON.parse(facilities.value) : [];
                return features.some( feature => feature.name === 'TV')
            })
        },
        distance() {
            if (!this.item.geo) {
                return 0;
            }
            let c_1 = Math.abs(parseFloat(this.item.geo.lng) - parseFloat(this.item.lng));
            let c_2 = Math.abs(parseFloat(this.item.geo.lat) - parseFloat(this.item.lat));
            return Math.ceil(Math.sqrt( c_1 ** 2 + c_2 ** 2 ) * 111);
        },

    }
}

</script>

<style scoped>

</style>
