<template>
    <section class="header-dashboard">
        <h1>Импортируемые данные Booking.Com</h1>
        <div class="row mt-4">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4>Города</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4>Типы недвижимости</h4>
                    </div>

                </div>
            </div>
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4>Удобства</h4>
                        <b-table striped hover :items="rootFeatures"></b-table>
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
    let TypesRequest = ApiRequest('booking-types');
    let cities = new CitiesRequest;
    let features = new FeaturesRequest;
    let types = new TypesRequest;

    export default {
        name: "Index",
        data() {
            return {
                features: [],
                loading: true
            }
        },
        mounted() {
            features.all()
                .then(resp => {
                    this.features = resp.data;
                });
        },
        methods: {
            loadTypes() {
                types.all()
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
                features.create({})
            }
        },
        computed: {
            rootFeatures() {
                let _rootFeatures = [];
                for (let i in this.features) {
                    _rootFeatures.push( {
                            name: this.features[i].name,
                            hotelFeatures: this.features[i].hotel_features.length,
                            roomFeatures: this.features[i].room_features.length
                        }
                    )
                }
                return _rootFeatures;
            }
        }
    }
</script>

<style scoped>

</style>

