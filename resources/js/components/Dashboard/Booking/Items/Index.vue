<template>
    <section class="header-dashboard">
        <h1>Импорт объектов Booking</h1>
        <b-overlay :show="loading" rounded="lg" opacity="0.6">
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Город">
                            <b-form-input type="text" v-model="filter.city" placeholder="Город"></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body constraight-list">
                        <b-form-group label="Тип отеля" label-for="input-hotel-type">
                            <b-form-select v-model="filter.type" :options="getTypes"></b-form-select>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-md-12">
                    <b-button variant="info" class="float-right" @click.prevent="loadHotels">Загрузить отели</b-button>
                    <b-button v-if="this.hotels.length" variant="success" class="mr-2" @click.prevent="importHotels">Импортировать</b-button>
                    <!--<b-button variant="light" @click.prevent="loadTypes">Загрузить типы </b-button>-->
                </div>
            </div>

            <div class="row mt-4">

            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body constraight-list">
                        <b-form-group label="Кровать" label-for="input-hotel-type">
                            <b-form-select v-model="filter.bed" :options="bedTypes"></b-form-select>
                        </b-form-group>
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body constraight-list">
                        <b-form-group label="Душ" label-for="input-hotel-type">
                            <b-form-select v-model="filter.shower" :options="showerTypes"></b-form-select>
                        </b-form-group>
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body constraight-list">
                        <b-form-group label="Кухня" label-for="input-hotel-type">
                            <b-form-select v-model="filter.kitchen" :options="kitchenTypes"></b-form-select>
                        </b-form-group>
                    </div>
                </div>
            </div>

            <div class="col-md-3 grid-margin">
                <div class="card">
                    <span class="card-price_value">{{ filter.price }}</span>
                    <div class="card-body">
                        <b-form-group label="Цена" label-for="input-city">
                            <b-form-input type="range" id="input-city" min="10" max="25"
                                v-model="filter.price" placeholder="Город"></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>

        </b-overlay>
        <div class="row mt-4" v-for="(hotel, ind) in hotels">
            <div class="col-md-12 grid-margin">
                <div class="card border-top">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="pictures-block">
                                    <img :src="getMainHotelPhoto(hotel)" class="w-100">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h3>{{ hotel.hotel_data.name }}</h3>
                                <div class="">{{ hotel.hotel_data.address }}</div>
                                <div class="">
                                </div>
                                <div class="state-block mt-3">
                                    <small class="d-block mb-3"><strong>Состояние:</strong>
                                        <b-form-checkbox v-if="hotel.imported === null" :id="'checkbox-hotel-'+hotel.hotel_id"
                                                         v-model="hotels[ind].tbi"
                                                         :name="'checkbox-hotel-' + hotel.hotel_id"
                                                         value="true"
                                                         unchecked-value="false">
                                            Импортировать
                                        </b-form-checkbox>
                                        <span v-else>Импортировано</span>
                                    </small>
                                    <div class="collapse-button">
                                        <b-button class="mr-4" v-b-toggle="'collapse-rooms-'+hotel.hotel_id" variant="info">Показать комнаты</b-button>
                                        <b-button v-b-toggle="'collapse-hotel-'+hotel.hotel_id" size="sm">Удобства отеля</b-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <b-collapse :id="'collapse-hotel-'+hotel.hotel_id" class="mt-2">
                                <b-card>
                                    <h3 class="mb-4">Удобства</h3>
                                    <b-list-group>
                                        <b-list-group-item v-for="feature in hotel.hotel_data.hotel_facilities">{{ feature.name }}</b-list-group-item>
                                    </b-list-group>
                                    <b-button class="mt-4" v-b-toggle="'collapse-hotel-'+hotel.hotel_id" size="sm">Свернуть</b-button>
                                </b-card>
                            </b-collapse>
                        </div>
                        <b-collapse :id="'collapse-rooms-'+hotel.hotel_id">
                            <h3 class="mb-4">Комнаты</h3>
                        <div class="row">
                            <div v-for="room in hotel.room_data" class="col-md-12 mb-2">
                                <div class="d-flex room-item mb-3">
                                    <div class="">
                                        <img v-if="room.room_photos" :src="room.room_photos[0].url_square60" class="room-photo">
                                    </div>
                                    <div class="col-md-10">
                                        <h6 class="title">{{ room.room_name}}</h6>
                                        <small class="description">{{ room.room_description }}</small>
                                        <div class="d-flex">
                                            <div class="w-25">
                                                <img :src="getPersonsPic(room.room_info.max_persons)">
                                                <small>{{ getPersonsText(room.room_info.max_persons) }}</small>
                                            </div>
                                            <div class="w-50">
                                                <div v-for="(bedroom, index) in room.room_info.bed_configurations" class="ml-4">
                                                    <span v-for="bed_type in bedroom.bed_types" class="mr-4">
                                                        <img :src="getBedPic(room.room_info.bedrooms[index])">
                                                        <small>{{ bed_type.name }}&nbsp;&times;&nbsp;{{ bed_type.count }}</small>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="" v-if="room.room_info.min_price || room.room_info.max_price" class="ml-4 w-25">
                                                <small>
                                                    &euro;{{ room.room_info.min_price }} &mdash; &euro;{{ room.room_info.max_price }}
                                                </small>
                                            </div>
                                            <div class="w-25">
                                                <div class="mr-4">
                                                    <img src="/svg/i-own-kitchen.svg">
                                                    <small>{{ typeKitchenStr(hotel, room.room_facilities) }}</small>
                                                </div>
                                                <div class="mr-4">
                                                    <img src="/svg/i-own-shower.svg">
                                                    <small>{{ typeShowerStr(room.room_facilities) }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <b-button v-b-toggle="'collapse-rooms-'+hotel.hotel_id" size="sm">Свернуть</b-button>
                        </b-collapse>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import ApiRequest from '../../../API/ApiRequest';
    let HotelsRequest = ApiRequest('hotels-request');
    let TypesRequest = ApiRequest('booking-roomtypes');
    let BedRequest = ApiRequest('booking-bedtypes');
    let ShowerRequest = ApiRequest('booking-showertypes');
    let KitchenRequest = ApiRequest('booking-kitchentypes');

    let types = new TypesRequest;
    let hotelsAPI = new HotelsRequest;
    let bed = new BedRequest;
    let shower = new ShowerRequest;
    let kitchen = new KitchenRequest;

    export default {
        name: "Index",
        data() {
            return {
                filter: {
                    city: 'Leipzig',
                    type: '',
                    shower: 'all',
                    kitchen: 'all',
                    bed: 'single',
                    price: 10
                },
                types: [],
                bedTypes: [
                    {
                        value: 'all',
                        text: 'Все типы'
                    },
                    {
                        value: 'single',
                        text:  'Одиночная кровать'
                    },
                    {
                        value: 'single+',
                        text:  'Одиночная кровать + варианты'
                    },
                    {
                        value: 'double',
                        text:  'Двойная кровать'
                    },
                ],
                showerTypes: [
                    {
                        value: 'all',
                        text: 'Все типы'
                    },
                    {
                        value: 'shared',
                        text: 'Раздельный душ'
                    },
                    {
                        value: 'private',
                        text: 'Свой душ'
                    },
                    {
                        value: 'none',
                        text: 'Без душа'
                    }
                ],
                kitchenTypes: [
                    {
                        value: 'all',
                        text: 'Все типы'
                    },
                    {
                        value: 'kitchenette',
                        text: 'Кухонька'
                    },
                    {
                        value: 'private kitchen',
                        text: 'Своя кухня'
                    },
                    {
                        value: 'shared kitchen',
                        text: 'Совместная кухня'
                    },
                    {
                        value: 'none',
                        text: 'Без кухни'
                    }
                ],
                hotels: [],
                loading: false
            }
        },
        mounted() {
            types.all()
                .then(resp => {
                    this.types = resp.data;
                });
            bed.all()
                .then(resp => {
                    this.bed = resp.data;
                });
            shower.all()
                .then(resp => {
                    this.shower = resp.data;
                });
            kitchen.all()
                .then(resp => {
                    this.kitchen = resp.data;
                });
        },
        methods: {
            loadHotels() {
                this.loading = true;

                hotelsAPI.query(this.filter).then(resp => {
                    this.hotels = resp.data;

                    this.hotels.map((item, index) => this.hotels[index].tbi = this.hotels[index].imported === null);

                    this.loading = false;
                });
            },

            getMainHotelPhoto(hotel) {
                for (let i in hotel.hotel_data.hotel_photos) {
                    if (hotel.hotel_data.hotel_photos[i].main_photo) {
                        return hotel.hotel_data.hotel_photos[i].url_max300;
                    }
                }
                return hotel.hotel_data.hotel_photos[0].url_max300;
            },
            getPersonsPic(number) {
                switch (number) {
                    case 1: return '/svg/i-one.svg';
                    case 2: return '/svg/i-two.svg';
                    default: return '/svg/i-multi.svg';
                }
            },
            getBedPic(bedType) {
                if (!bedType || !bedType.description) {
                    return '';
                }
                if (bedType.description.toLowerCase().includes('single')) {
                    return '/svg/i-signlebed.svg';
                }
                if (bedType.description.toLowerCase().includes('double')) {
                    return '/svg/i-double-bed.svg';
                }
                if (bedType.description.toLowerCase().includes('combined')) {
                    return '/svg/i-combined-bed.svg';
                }
                return '/svg/i-extra-bed.svg';
            },
            getPersonsText(number) {
                switch (number) {
                    case 1: return 'одноместный';
                    case 2: return 'двухместый';
                    case 3: return 'трехместный';
                    case 4: return 'четырехместный';
                    case 5: return 'пятиместный';
                    case 6: return 'шестиместный';
                    case 7: return 'семиместный';
                    case 8: return 'восьмиместный';
                    default: return 'не указано';
                }
            },
            findOption(item, name) {
                return item.options.find( elem => elem.key === name);
            },
            typeKitchen(item, roomFacilities) {
                let features = JSON.parse(this.findOption(item, 'features').value)
                if (features.some(item => item.name === 'Shared kitchen')) {
                    return 'shared kitchen'
                }
                if (roomFacilities.some(item => item.name === 'Kitchenette')) {
                    return 'kitchenette';
                }
                if (roomFacilities.some(item => item.name === 'Kitchen')) {
                    return 'private kitchen'
                }

                return 'none';
            },
            typeKitchenStr(item, roomFaclities) {
                let str = { 'none': 'Без кухни', ' kitchen kitchen': 'Совместная кухня', 'private kitchen': 'Личная кухня', 'kitchenette': 'Мини-кухня' };
                let type = this.typeKitchen(item, roomFaclities);
                return str[type];
            },
            typeShower(roomFacilities) {
                if (roomFacilities.some(item => item.name === 'Shared bathroom')) {
                    return 'shared';
                }
                if (roomFacilities.some(item => item.name === 'Shower') || roomFacilities.some(item => item.name === 'Private bathroom')) {
                    return 'private'
                }

                return 'none';
            },
            typeShowerStr(roomFaclities) {
                let str = { none: 'Без душа', 'shared': 'Совместный душ', 'private': 'Личный душ'};
                let type = this.typeShower(roomFaclities);
                return str[type];
            },
            importHotels() {
                let hotelsToImport = this.hotels.filter( item => item.tbi === true);
                hotelsAPI.create({ ...hotelsToImport });
            }
        },
        computed: {
            getTypes() {
                return this.types.map((item) => ({
                    value: item.native_id,
                    text:  item.name
                }));
            },
            getBed() {
                return this.bed.map((item) => ({
                    value: item.type,
                    text: item.name
                }));
            },
            getShower() {
                return this.shower.map((item) => ({
                    value: item.type,
                    text: item.name
                }));
            },
            getKitchen() {
                return this.kitchen.map((item) => ({
                    value: item.type,
                    text: item.name
                }));
            },
            filteredItems() {
                return this.hotels.filter( item =>
                    (
                        filter.shower === 'all' ||
                        item.room_data.some( child => this.typeShower(child.room_facilities) === filter.shower )
                    ) &&
                    (
                        filter.kitchen === 'all' ||
                        item.room_data.some( child => this.typeKitchen(item, child.room_facilities) === filter.kitchen )
                    ) &&
                    (
                        filter.bed === 'all' ||
                        item.room_data.some( child =>
                            this.typeBed(child.room_facilities) === filter.bed && filter.bed !== 'single+' ||
                            this.typeBed(child.room_facilities) !== 'double' && filter.bed === 'single+'
                        )
                    )
                );
            }
        },

    }
</script>

<style scoped>
    .card.border-top {
        border-top: 2px solid rgba(116, 90, 242, 0.18)!important;
    }
    .room-item .title {
        margin-bottom: 0;
    }
    .room-item .description {
        display: block;
        line-height: 1.6;
    }
    .room-item .room-photo {
        height: 60px;
        width: 60px;
        object-fit: cover;
    }
    .state-block {
        display: flex;
        flex-direction: column;
    }
    .collapse-button {
        display: flex;
        align-items: center;
    }
    .pictures-block {
        width: 100%;
        height: 255px;
    }
    .pictures-block img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

