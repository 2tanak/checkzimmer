<template>
    <section class="header-dashboard">
        <h1>Маппинг объектов</h1>

        <div class="row mt-5">
            <div class="col-md-12 col-lg-6 mt-4">
                <h4>Маппинг удобств</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-6 mt-4">
                                <strong>Типы удобств на Booking.com</strong>
                            </div>
                            <div class="col-md-12 col-lg-6 mt-4">
                                <strong>Типы удобств на сайте</strong>
                            </div>
                        </div>
                        <div class="row pb-4" v-for="(row, i) in mappingFeatureRows">
                            <div class="col-md-12 col-lg-6 mt-4">
                                <b-select v-model="mappingFeatureRows[i].mapping_booking_feature_select">
                                    <b-select-option value="">Ничего не выбрано</b-select-option>
                                    <b-select-option v-for="item in featureBookingList" :value="item ?  item.native_id : 0" >
                                        {{ item ? item.name : '' }}
                                    </b-select-option>
                                </b-select>
                            </div>
                            <div class="col-md-12 col-lg-6 mt-4">
                                <b-select v-model="mappingFeatureRows[i].mapping_site_feature_select">
                                    <b-select-option value="">Ничего не выбрано</b-select-option>
                                    <b-select-option v-for="item in featuresSite" :value="item.id">{{ item.name }}</b-select-option>
                                </b-select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <p v-if="errorText" class="error-text">Вы ничего не выбрали</p>
                            </div>
                            <div class="col-md-6" style="text-align:right;">
                                <b-button @click="addRowFeature" variant="success">Добавить ряд</b-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 mt-4">
                <h4>Маппинг типов жилья</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-6 mt-4">
                                <strong>Типы жилья на Booking.com</strong>
                            </div>
                            <div class="col-md-12 col-lg-6 mt-4">
                                <strong>Типы жилья на сайте</strong>
                            </div>
                        </div>
                        <div class="row pb-4" v-for="(row, i) in mappingHousingRows">
                            <div class="col-md-12 col-lg-6 mt-4">
                                <b-select v-model="mappingHousingRows[i].mapping_booking_housing_select">
                                    <b-select-option value="">Ничего не выбрано</b-select-option>
                                    <b-select-option v-for="item in housingBooking" :value="item ? item.native_id : ''">
                                        {{ item ? item.name : '' }}
                                    </b-select-option>
                                </b-select>
                            </div>
                            <div class="col-md-12 col-lg-6 mt-4">
                                <b-select v-model="mappingHousingRows[i].mapping_site_housing_select">
                                    <b-select-option value="">Ничего не выбрано</b-select-option>
                                    <b-select-option v-for="item in housingSite" :value="item.id">
                                        {{ item.name }}
                                    </b-select-option>
                                </b-select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-4" style="text-align:right;">
                                <b-button @click="addRowHousing" variant="success">Добавить ряд</b-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4" v-if="!loading">
            <div class="col-md-12">
                <b-button type="submit" variant="success" class="mr-2" @click.prevent="save">Сохранить</b-button>
            </div>
        </div>
        <b-modal id="save-success">Данные успешно сохранены</b-modal>
    </section>

</template>

<script>
import ApiRequest from '../../../API/ApiRequest';

let FeaturesRequestBooking = ApiRequest('booking-facilities');
let TypesRequestBooking = ApiRequest('booking-roomtypes');
let FeaturesRequest = ApiRequest('features');
let RoomTypesRequest = ApiRequest('room-types');
let OptionsRequest = ApiRequest('options');

let featuresBooking = new FeaturesRequestBooking;
let typesBooking = new TypesRequestBooking;
let features = new FeaturesRequest;
let roomTypes = new RoomTypesRequest;
let options = new OptionsRequest;

export default {
    name: "Index",
    data() {
        return {
            loading: true,
            errorText: false,
            typeHousingSiteSelect: '',
            typeHousingBookingSelect: '',
            featuresBooking: { children: [], root: [], rooted: [] },
            features: [],
            roomTypes: [],
            housingBooking: [
                { created_at: '', id: 1, name: "Apartments", native_id: "201", type: "hotel", updated_at: '' },
                { created_at: '', id: 2, name: "Hostels", native_id: "201", type: "hotel", updated_at: '' },
                { created_at: '', id: 3, name: "Hotel", native_id: "201", type: "hotel", updated_at: '' }
            ],
            featureBooking: [
                { created_at: '', id: 1, name: "Parking", native_id: "2", parent: 1, type: "hotel", updated_at: '' },
                { created_at: '', id: 2, name: "Wi-Fi", native_id: "2", parent: 1, type: "hotel", updated_at: '' },
                { created_at: '', id: 3, name: "Darts", native_id: "2", parent: 1, type: "hotel", updated_at: '' }
            ],

            mappingFeatureRows: [
                { mapping_booking_feature_select: '', mapping_site_feature_select: '' }
            ],
            mappingHousingRows: [
                { mapping_booking_housing_select: '', mapping_site_housing_select: '' }
            ]
        }
    },
    mounted() {
        options.get('bytype/system')
            .then(resp => {
                this.mappingFeatureRows = resp.data.mapping_features ? JSON.parse(resp.data.mapping_features) : this.mappingFeatureRows;
                this.mappingHousingRows = resp.data.mapping_housing ? JSON.parse(resp.data.mapping_housing) : this.mappingHousingRows;

                featuresBooking.all()
                    .then(resp => {
                        this.featuresBooking = resp.data;
                    });
                typesBooking.all()
                    .then(resp => {
                        this.housingBooking = resp.data;
                    });
                features.all()
                    .then(resp => {
                        this.features = resp.data;
                    });
                roomTypes.all()
                    .then(resp => {
                        this.room_types = resp.data;
                    })
                this.loading = false;
            });
    },
    methods: {
        addRowFeature() {
            this.mappingFeatureRows.push({
                mapping_booking_feature_select: '',
                mapping_site_feature_select: ''
            });
        },
        addRowHousing() {
            this.mappingHousingRows.push({
                mapping_booking_housing_select: '',
                mapping_site_housing_select: ''
            });
        },
        save() {
            options.update('system',
                {
                        mapping_features: JSON.stringify(this.mappingFeatureRows),
                        mapping_housing: JSON.stringify(this.mappingHousingRows)
                })
                .then( () => {
                    this.$bvModal.show('save-success');
                })
        }
    },
    computed: {
        featureBookingList() {
            // let featuresSelected = this.mappingFeatureRows.map( item => item.mapping_booking_feature_select );

            if (this.featuresBooking.root.length === 0) {
                return [{name: '', native_id: ''}];
            }
            this.featureBooking = this.featuresBooking.root || [];
            for (let key in this.featureBooking.rooted) {
                this.featureBooking = this.featureBooking.concat(this.featureBooking.rooted[key]);
            }
            this.featureBooking = this.featureBooking.concat(this.featureBooking.children);
            return this.featureBooking.sort( (a, b) => a.name.localeCompare(b.name));
        },
        housingBookingList() {
            return this.housingBooking.sort( (a, b) => a.name.localeCompare(b.name) )
        },
        featuresSite() {
            return this.features;
        },
        housingSite() {
            return this.roomTypes;
        }
    }
}
</script>

<style scoped>

</style>
