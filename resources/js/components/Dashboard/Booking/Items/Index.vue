<template>
    <section class="header-dashboard">
        <h1>{{ $t('Importing Booking objects') }}</h1>
        <b-overlay :show="loading" rounded="lg" opacity="0.6">
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('City')">
                            <b-form-input type="text" v-model="filter.city" :placeholder="$t('City')"></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body constraight-list">
                        <b-form-group :label="$t('Hotel type')" label-for="input-hotel-type">
                            <b-form-select v-model="filter.type" :options="getTypes"></b-form-select>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-md-12">
                    <b-button variant="info" class="float-right" @click.prevent="loadHotels">{{ $t('Load hotels') }}</b-button>
                    <b-overlay :show="importLoader" rounded opacity="0.6" spinner-small spinner-variant="danger" class="d-inline-block">
                        <b-button v-if="this.hotels.length" variant="success" class="mr-2" @click.prevent="importHotels">
                            {{ $t('Import') }}</b-button>
                    </b-overlay>
                    <!--<b-button variant="light" @click.prevent="loadTypes">Загрузить типы </b-button>-->
                </div>
            </div>

            <div class="row mt-4">

            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body constraight-list">
                        <b-form-group :label="$t('Bed')" label-for="input-hotel-type">
                            <b-form-select v-model="filter.bed" :options="bedTypes"></b-form-select>
                        </b-form-group>
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body constraight-list">
                        <b-form-group :label="$t('Shower')" label-for="input-hotel-type">
                            <b-form-select v-model="filter.shower" :options="showerTypes"></b-form-select>
                        </b-form-group>
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body constraight-list">
                        <b-form-group :label="$t('Kitchen')" label-for="input-hotel-type">
                            <b-form-select v-model="filter.kitchen" :options="kitchenTypes"></b-form-select>
                        </b-form-group>
                    </div>
                </div>
            </div>

            <div class="col-md-3 grid-margin">
                <div class="card">
                    <span class="card-price_value">{{ filter.price }}</span>
                    <div class="card-body">
                        <b-form-group :label="$t('Price')" label-for="input-city">
                            <b-form-input type="range" id="input-city" min="10" max="25"
                                v-model="filter.price" :placeholder="$t('City')"></b-form-input>
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
                                    <small class="d-block mb-3"><strong>{{ $t('Condition') }}:</strong>
                                        <b-form-checkbox v-if="hotel.imported === null" :id="'checkbox-hotel-'+hotel.hotel_id"
                                                         v-model="hotels[ind].tbi"
                                                         :name="'checkbox-hotel-' + hotel.hotel_id"
                                                         value="true"
                                                         unchecked-value="false">
                                            {{ $t('Import') }}
                                        </b-form-checkbox>
                                        <span v-else>{{ $t('Imported') }}</span>
                                    </small>
                                    <div class="collapse-button">
                                        <b-button class="mr-4" v-b-toggle="'collapse-rooms-'+hotel.hotel_id" variant="info">
                                            {{ $t('Show Rooms') }}</b-button>
                                        <b-button v-b-toggle="'collapse-hotel-'+hotel.hotel_id" size="sm">{{ $t('Hotel amenities') }}</b-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <b-collapse :id="'collapse-hotel-'+hotel.hotel_id" class="mt-2">
                                <b-card>
                                    <h3 class="mb-4">{{ $t('Facilities') }}</h3>
                                    <b-list-group>
                                        <b-list-group-item v-for="feature in hotel.hotel_data.hotel_facilities">{{ feature.name }}</b-list-group-item>
                                    </b-list-group>
                                    <b-button class="mt-4" v-b-toggle="'collapse-hotel-'+hotel.hotel_id" size="sm">
                                        {{ $t('Collapse') }}</b-button>
                                </b-card>
                            </b-collapse>
                        </div>
                        <b-collapse :id="'collapse-rooms-'+hotel.hotel_id">
                            <h3 class="mb-4">{{ $t('Rooms') }}</h3>
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
                            <b-button v-b-toggle="'collapse-rooms-'+hotel.hotel_id" size="sm">{{ $t('Collapse') }}</b-button>
                        </b-collapse>
                    </div>
                </div>
            </div>
        </div>

        <b-modal id="import-success" :title="$t('Importing objects')"><strong>{{ $t('Import completed') }}</strong></b-modal>

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
                        text: this.$t('All types')
                    },
                    {
                        value: 'single',
                        text:  this.$t('Single bed')
                    },
                    {
                        value: 'single+',
                        text:  this.$t('Single bed') + ' + ' + this.$t('options')
                    },
                    {
                        value: 'double',
                        text:  this.$t('Double bed')
                    },
                ],
                showerTypes: [
                    {
                        value: 'all',
                        text: this.$t('All types')
                    },
                    {
                        value: 'shared',
                        text: this.$t('Shared shower')
                    },
                    {
                        value: 'private',
                        text: this.$t('Private shower')
                    },
                    {
                        value: 'none',
                        text: this.$t('None shower')
                    }
                ],
                kitchenTypes: [
                    {
                        value: 'all',
                        text: this.$t('All types')
                    },
                    {
                        value: 'kitchenette',
                        text: this.$t('Kitchenette')
                    },
                    {
                        value: 'private kitchen',
                        text: this.$t('Private kitchen')
                    },
                    {
                        value: 'shared kitchen',
                        text: this.$t('Shared kitchen')
                    },
                    {
                        value: 'none',
                        text: this.$t('None kitchen')
                    }
                ],
                hotels: [],
                loading: false,
                importLoader: false
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
            findOption(item, name) {
                if (!item.options) {
                    return false;
                }
                return item.options.find( elem => elem.key === name);
            },
            typeKitchen(item, roomFacilities) {
                let rawOptions = this.findOption(item, 'features')
                if (rawOptions === false) {
                    return 'none';
                }
                let features = JSON.parse(rawOptions.value)
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
                this.importLoader = true;
                let hotelsToImport = this.hotels.filter( item => item.tbi === true);
                hotelsAPI.create({...hotelsToImport}).then(resp => {
                    this.importLoader = false;
                    this.$bvModal.show('import-success');
                })

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

