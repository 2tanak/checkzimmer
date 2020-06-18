<template>
    <section class="header-dashboard">
        <h1>Импорт объектов Booking</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Город"  label-for="input-city">
                            <b-form-input type="text" id="input-city" v-model="filter.city" placeholder="Город"></b-form-input>
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
            <!--<div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Цена" label-for="input-city">
                            <b-form-input type="range" id="input-city" v-model="filter.city" placeholder="Город"></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>-->
        </div>

        <div class="row">
            <div class="col-md-12">
                <b-button variant="info" class="float-right" @click.prevent="loadHotels">Загрузить отели</b-button>
                <!--<b-button type="submit" variant="success" class="mr-2" @click.prevent="loadCities">Загрузить города</b-button>
                <b-button variant="light" @click.prevent="loadTypes">Загрузить типы </b-button>-->
            </div>
        </div>
        <div class="row mt-2" v-for="hotel in hotels">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ hotel.hotel_data.name }}</h3>
                        <div class="">{{ hotel.hotel_data.address }}</div>
                        <b-table striped hover :items="hotel.hotel_data.hotel_facilities"></b-table>
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
    let types = new TypesRequest;
    let hotelsAPI = new HotelsRequest;

    export default {
        name: "Index",
        data() {
            return {
                filter: {
                    city: 'Leipzig',
                    type: ''
                },
                types: [],
                hotels: [],
                loading: true
            }
        },
        mounted() {
            types.all()
                .then(resp => {
                    this.types = resp.data;
                });
        },
        methods: {
            loadHotels() {
                hotelsAPI.query(this.filter)
                    .then(resp => {
                        this.hotels = resp.data;
                    })
            }
        },
        computed: {
            getTypes() {
                let types = [];
                for (let i in this.types) {
                    types.push( { value: this.types[i].native_id, text: this.types[i].name } )
                }
                return types;
            },
        },

    }
</script>

<style scoped>
</style>

