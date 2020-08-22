<template>
    <div class="property-card">
        <div class="property-card-container">
            <div class="property-card-slider">
                <div v-for="photo in getPhotos">
                    <img :src="photo.url_max300" alt="Property picture">
                </div>
                <div><img src="/img/property-picture2.png" alt="Property picture"></div>
                <div><img src="/img/property-picture.png" alt="Property picture"></div>
                <div><img src="/img/property-picture2.png" alt="Property picture"></div>
                <div><img src="/img/property-picture.png" alt="Property picture"></div>
            </div>
            <div class="data">
                <a :href="'/single/'+item.id" class="title"><span>{{ item.name }}</span></a>
                <div class="data-item">
                    <div class="geolocation">
                        <img src="/svg/i-pin.svg" alt="geo">
                        {{ item.zip }}, {{ item.city }}
                    </div>
                    <div class="humans">
                        <img src="/svg/i-people.svg" alt="humans">
                        {{  maxPeopleNumStr }}
                    </div>
                    <div class="distance">
                        <img src="/svg/i-distance.svg" alt="distance">
                        7км от &nbsp; <span class="desctop-span">указанного</span> <span class="mobile-span">указ.</span> &nbsp; вами адреса
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
                <div class="type-item">
                    <div class="title">Тип</div>
                    <div class="type-block">
                        <img src="svg/i-one.svg" alt="Одноместный">
                        <span>одноместный</span>
                    </div>
                    <div class="type-block">
                        <img src="svg/i-two.svg" alt="Двухместный">
                        <span>двухместный</span>
                    </div>
                    <div class="type-block">
                        <img src="svg/i-multi.svg" alt="Многоместный">
                        <span>многоместный</span>
                    </div>
                    <div class="type-block">
                        <img src="/svg/i-flat.svg" alt="Квартира целиком">
                        <span>квартира целиком</span>
                    </div>
                    <div class="type-block">
                        <img src="/svg/i-house.svg" alt="Дом">
                        <span>дом</span>
                    </div>
                </div>
                <div class="quantity">
                    <div class="title">Кол-во</div>
                    <div class="type-block quantity-block">
                        <span>1</span>
                    </div>
                    <div class="type-block quantity-block">
                        <span>2</span>
                    </div>
                    <div class="type-block quantity-block">
                        <span>3</span>
                    </div>
                    <div class="type-block quantity-block">
                        <span>5</span>
                    </div>
                    <div class="type-block quantity-block">
                        <span>12</span>
                    </div>
                </div>
                <div class="personen">
                    <div class="title">Personen</div>
                    <div class="type-block personen-block">
                        <span>1</span>
                    </div>
                    <div class="type-block personen-block">
                        <span>2</span>
                    </div>
                    <div class="type-block personen-block">
                        <span>3</span>
                    </div>
                    <div class="type-block personen-block">
                        <span>5</span>
                    </div>
                    <div class="type-block personen-block">
                        <span>20</span>
                    </div>
                </div>
                <div class="price-item">
                    <div class="title">Цена</div>
                    <div class="type-block price-block">
                        <span><b>25&#8364;</b>/persone</span>
                    </div>
                    <div class="type-block price-block">
                        <span><b>22&#8364;</b>/persone</span>
                    </div>
                    <div class="type-block price-block">
                        <span><b>20&#8364;</b>/persone</span>
                    </div>
                    <div class="type-block price-block">
                        <span><b>18&#8364;</b>/persone</span>
                    </div>
                    <div class="type-block price-block">
                        <span><b>15&#8364;</b>/persone</span>
                    </div>
                </div>
            </div>
            <div class="night-rating-block">
                <div class="night">
                    <a href="#" class="favorites">
                        <svg class="favorites-usual" width="12" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.6211 5.98172C12.6977 4.8747 12.6977 3.07667 11.6211 1.96965C10.5487 0.867074 8.8134 0.867074 7.74102 1.96965L7.20482 2.52096C7.09263 2.6363 6.90737 2.6363 6.79518 2.52096L6.25898 1.96965C5.1866 0.867074 3.45132 0.867074 2.37895 1.96965C1.30226 3.07667 1.30226 4.8747 2.37895 5.98172L7 10.7329L11.6211 5.98172ZM7.33139 1.57124C8.62813 0.237973 10.7339 0.237973 12.0307 1.57124C13.3231 2.90006 13.3231 5.05131 12.0307 6.38013L7.20482 11.3419C7.09263 11.4573 6.90737 11.4573 6.79518 11.3419L1.96932 6.38013C0.676895 5.05131 0.676895 2.90006 1.96932 1.57124C3.26606 0.237973 5.37187 0.237973 6.66861 1.57124L7 1.91196L7.33139 1.57124Z" fill="#333646" stroke="#333646" stroke-width="0.2"/>
                        </svg>
                        <svg class="favorites-active" width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.1 1.5c-.6-.7-1.5-1-2.4-1-.9 0-1.8.4-2.4 1l-.3.3-.3-.3C6.1.8 5.2.5 4.3.5c-.9 0-1.8.4-2.4 1C.6 2.9.6 5.1 1.9 6.4l4.8 5c.1.1.2.1.3.1.1 0 .2 0 .3-.1l4.8-5c1.3-1.3 1.3-3.5 0-4.9z" fill="#EE483F"/>
                        </svg>
                    </a>
                    <div class="price"><span>от &euro; {{ minRoomPrice }}</span> ночь</div>
                </div>
                <div class="rating">
                    <div v-if="item.rating" class="rating-number">
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
</template>

<script>
export default {
    name: "PropertyListItem",
    props: [ 'item' ],
    data() {
        return {
        }
    },
    methods: {
        findOption(name) {
            return this.item.options.find( elem => elem.key === name);
        },
        maxPeopleNum() {
            return Math.max( ...this.item.rooms.map( elem => elem.person ) )
        },
    },
    computed: {
        maxPeopleNumStr() {
            let max = this.maxPeopleNum() % 10;
            if (max >= 2 && max <= 4) {
                return max+' человека';
            }
            return max + ' человек';
        },
        minRoomPrice() {
            return Math.min( ...this.item.rooms.map( elem => elem.price ).filter( elem => elem > 0) )
        },
        getPhotos() {
            let photos = this.findOption('photos');
            if (!photos) {
                return []
            }
            return JSON.parse(photos.value);
        },
        getRooms() {
            return this.item.rooms;
        }
    }
}
</script>

<style scoped>

</style>
