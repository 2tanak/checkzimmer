<template>
    <section class="header-dashboard">
        <h1>Импортируемые данные Booking.Com</h1>
        <div class="row mt-4">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4>Города</h4>
                        Импортировано: <strong>{{ cities.count }}</strong> городов
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4>Типы недвижимости</h4>
                        <b-table striped hover responsive :busy="loading" :items="types" :fields="fields">
                            <template v-slot:table-busy>
                                <div class="text-center text-danger my-2">
                                    <b-spinner class="align-middle"></b-spinner>
                                    <strong>Loading...</strong>
                                </div>
                            </template>
                        </b-table>
                    </div>

                </div>
            </div>
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4>Удобства</h4>
                        <b-card v-for="feature in features.root" :header="feature.id + ': ' + feature.name ">
                            <b-list-group>
                                <b-list-group-item v-for="child in rootedFeatures(feature.id)">
                                    {{ child.id }}: {{ child.name }}
                                </b-list-group-item>
                            </b-list-group>
                        </b-card>
                        <!--<b-table responsive striped hover :items="rootFeatures"></b-table>-->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <b-button variant="info" class="float-right" @click.prevent="loadFeatures">Загрузить удобства</b-button>
                <b-button type="submit" variant="success" class="mr-2" @click.prevent="loadCities">Загрузить города</b-button>
                <b-button variant="light" @click.prevent="loadTypes">Загрузить типы </b-button>
            </div>
        </div>
        <b-modal id="save-success" title="Сохранение настроек">Данные успешно сохранены</b-modal>
        <b-modal id="connect-success" title="Проверка подключения">Подключение успешно</b-modal>
        <b-modal id="connect-fail" title="Проверка подключения">Подключение не удалось, проверьте учётные данные</b-modal>
    </section>
</template>

<script>
    import ApiRequest from '../../../API/ApiRequest';
    let CitiesRequest = ApiRequest('booking-cities');
    let FeaturesRequest = ApiRequest('booking-facilities');
    let TypesRequest = ApiRequest('booking-roomtypes');
    let cities = new CitiesRequest;
    let features = new FeaturesRequest;
    let types = new TypesRequest;

    export default {
        name: "Index",
        data() {
            return {
                cities: { count: 0 },
                features: { root: [], rooted: [], children: []},
                types: [],
                fields: [ 'id', 'name', 'type' ],
                loading: true
            }
        },
        mounted() {
            cities.all()
                .then(resp => {
                   this.cities = resp.data;
                });
            features.all()
                .then(resp => {
                    this.features = resp.data;
                });
            types.all()
                .then(resp => {
                    this.types = resp.data;
                    this.loading = false;
                });
        },
        methods: {
            loadTypes() {
                types.create()
                    .then( () => {
                        this.$bvModal.show('save-success');
                    })
            },
            loadCities() {
                cities.create({})
                    .then( resp => {
                        this.$bvModal.show('connect-success');
                    })
                    .catch(resp => {
                        this.$bvModal.show('connect-fail');
                    });
            },
            loadFeatures() {
                features.create({});
            },
            rootedFeatures(parent) {
                console.log(this.features.rooted[parent]);
                return this.features.rooted[parent];
            }
        },
        computed: {
        }
    }
</script>

<style scoped>

</style>

