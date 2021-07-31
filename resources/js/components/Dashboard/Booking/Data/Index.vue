<template>
    <section class="header-dashboard">
        <div style="display:flex;align-items:center;justify-content:space-between;">
        <h1>{{ $t('Imported data') }} {{ $t('Booking') }}.{{ $t('Com') }}</h1>
            <div style="display:flex;align-items:center;">
                <b-overlay :show="citiesLoader" rounded opacity="0.6" spinner-small spinner-variant="danger" class="d-inline-block">
                    <b-button type="submit" variant="success" class="mr-2" @click.prevent="loadCities">{{ $t('Upload cities') }}</b-button>
                </b-overlay>
                <b-overlay :show="typesLoader" rounded opacity="0.6" spinner-small spinner-variant="danger" class="d-inline-block">
                    <b-button style="margin-right:0.5rem;" variant="light" @click.prevent="loadTypes">{{ $t('Load types') }}</b-button>
                </b-overlay>
                <b-overlay :show="featuresLoader" rounded opacity="0.6" spinner-small spinner-variant="danger" class="d-inline-block float-right">
                    <b-button style="margin-right:0 !important;" variant="info" @click.prevent="loadFeatures">{{ $t('Download amenities') }}</b-button>
                </b-overlay>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4>{{ $t('Cities') }}</h4>
                        {{ $t('Import') }}: <strong>{{ cities.count }}</strong> {{ $t('cities') }}
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4>{{ $t('Property types') }}</h4>
                        <b-table striped hover responsive :busy="loading" :items="types" :fields="fields">
                            <template v-slot:table-busy>
                                <div class="text-center text-danger my-2">
                                    <b-spinner class="align-middle"></b-spinner>
                                    <strong>{{ $t('Loading')}}...</strong>
                                </div>
                            </template>
                        </b-table>
                    </div>

                </div>
            </div>
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4>{{ $t('Facilities') }}</h4>
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
                <b-overlay :show="featuresLoader" rounded opacity="0.6" spinner-small spinner-variant="danger" class="d-inline-block float-right">
                    <b-button variant="info" @click.prevent="loadFeatures">{{ $t('Download amenities') }}</b-button>
                </b-overlay>
                <b-overlay :show="citiesLoader" rounded opacity="0.6" spinner-small spinner-variant="danger" class="d-inline-block">
                    <b-button type="submit" variant="success" class="mr-2" @click.prevent="loadCities">{{ $t('Upload cities') }}</b-button>
                </b-overlay>
                <b-overlay :show="typesLoader" rounded opacity="0.6" spinner-small spinner-variant="danger" class="d-inline-block">
                    <b-button variant="light" @click.prevent="loadTypes">{{ $t('Load types') }}</b-button>
                </b-overlay>
            </div>
        </div>
        <b-modal id="save-success" :title="$t('Loading types')"><strong>{{ $t('Types loaded successfully') }}</strong></b-modal>
        <b-modal id="connect-success" :title="$t('Loading cities')"><strong>{{ $t('Cities loaded successfully') }}</strong></b-modal>
        <b-modal id=load-features :title="$t('Loading amenities')"><strong>{{ $t('Amenities loaded successfully') }}</strong></b-modal>
        <b-modal id="connect-fail" :title="$t('Checking connection')">{{ $t('Connection failed, check credentials') }}</b-modal>
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
                fields: [
                    {
                        key: 'id',
                        label: this.$t('id')
                    },
                    {
                        key: 'name',
                        label: this.$t('name'),
                    },
                    {
                        key: 'type',
                        label: this.$t('type')
                    }
                ],
                loading: true,
                featuresLoader: false,
                citiesLoader: false,
                typesLoader: false
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
                        this.typesLoader = false;
                    });
                this.typesLoader = true;
            },
            loadCities() {
                cities.create({})
                    .then( resp => {
                        this.$bvModal.show('connect-success');
                        this.citiesLoader = false;
                    })
                    .catch(resp => {
                        this.$bvModal.show('connect-fail');
                        this.citiesLoader = false;
                    });
                this.citiesLoader = true;
            },
            loadFeatures() {
                features.create({})
                    .then( () => {
                        this.$bvModal.show('load-features');
                        this.featuresLoader = false;
                    });
                this.featuresLoader = true;
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

