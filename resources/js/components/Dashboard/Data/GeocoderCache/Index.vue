<template>
    <section class="header-dashboard">
        <div style="display:flex;align-items:center;justify-content:space-between;">
            <h1>{{ $t('Geocoder cache management')}}</h1>
            <b-button v-b-modal.clearСacheModal style="margin-right:0 !important;" variant="success">{{ $t('Clear cache') }}</b-button>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <b-form-input v-model="searchText" :placeholder="$t('Enter the address')"></b-form-input>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <b-table striped hover responsive :busy="loading" :items="geocoderCacheItems" :fields="geocoderCacheFields">
                            <template v-slot:cell(address)="data">
                                {{ data.item.address }}
                            </template>
                            <template v-slot:cell(created_at)="data">
                                {{ data.item.timestamp }}
                            </template>
                            <template v-slot:cell(coordinates)="data">
                                lat: {{ data.item.lat }}
                                lng: {{ data.item.lng }}
                            </template>
                            <template v-slot:cell(update)="data">
                                <a style="text-decoration:none;" href="" @click.prevent="geocoderCacheUpdate(data.item)"><span style="font-size:20px;font-weight:700;">&#8635;</span></a>
                            </template>
                            <template v-slot:cell(delete)="data">
                                <a style="text-decoration:none;" href="" @click.prevent="geocoderCacheDelete(data.item)"><span style="font-size:22px;">&times;</span></a>
                            </template>
                            <template v-slot:table-busy>
                                <div class="text-center text-danger my-2">
                                    <b-spinner class="align-middle"></b-spinner>
                                    <strong>{{ $t('Loading') }}...</strong>
                                </div>
                            </template>
                        </b-table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-2">
                <div class="card">
                    <div class="card-body">
                        <b-button v-b-modal.clearСacheModal style="width:100%;" variant="success">{{ $t('Clear cache') }}</b-button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">

                <b-alert dismissible v-model="operationOk" variant="success">
                    {{ textOperation}}
                </b-alert>
                <b-alert dismissible v-model="operationError" variant="danger">
                    {{ textOperation}}
                </b-alert>
            </div>
        </div>

        <b-modal id="clearСacheModal" :title="$t('Delete cache')" @ok="deleteCache">
            <p class="text-danger">{{ $t('A you sure you want to clear cache') }}?</p>
        </b-modal>

    </section>
</template>

<script>
import Forms from '../../../Forms/Index';
import ApiRequest from "../../../API/ApiRequest";

let GeocodeRequest = ApiRequest('geocode-cache');
let geocodeItems = new GeocodeRequest;

export default {
    name: "Index",
    data() {
        return {
            searchText: '',
            operationOk : false,
            operationError : false,
            textOperation: '',
            loading: false,
            geocoderCacheFields: [
                {
                    key: 'address',
                    label: this.$t('address')
                },
                {
                    key: 'created_at',
                    label: this.$t('created_at')
                },
                {
                    key: 'coordinates',
                    label: this.$t('coordinates')
                },
                {
                    key: 'update',
                    label: this.$t('update')
                },
                {
                    key: 'delete',
                    label: this.$t('Delete')
                }
            ],
            geocoderCacheItems: []
        }
    },
    created() {
        geocodeItems.all()
            .then(resp => {
                this.geocoderCacheItems = resp.data;
        })
    },
    methods: {
        geocoderCacheDelete(item) {
            geocodeItems.delete(item.id)
                .then(response => {
                    if(response.data.code == 'ok') {
                        this.textOperation = this.$t('Cache deleted');
                        this.operationOk = true;
                        let index = this.geocoderCacheItems.findIndex( (elem, index, arr) => elem.id === item.id);
                        this.geocoderCacheItems.splice(index, 1);
                    } else {
                        this.textOperation = this.$t('Delete error');
                        this.operationError = true;
                    }
            });
        },
        geocoderCacheUpdate(item) {
            geocodeItems.update(item.id)
                .then(response => {
                    if(response.data.code == 'ok') {
                        this.textOperation = this.$t('Cache updated');
                        this.operationOk = true;
                    } else {
                        this.textOperation = this.$t('Delete error');
                        this.operationError = true;
                    }
            });
        },
        deleteCache() {
            geocodeItems.deleteAll()
                .then(resp => {
                    if(response.data.code == 'ok') {
                        this.textOperation = this.$t('Cache is cleared');
                        this.operationOk = true;
                        this.geocoderCacheItems = [];
                    } else {
                        this.textOperation = this.$t('Cache clearing error');
                        this.operationError = true;
                    }
            });
        }
    }
}
</script>

<style scoped>

</style>
