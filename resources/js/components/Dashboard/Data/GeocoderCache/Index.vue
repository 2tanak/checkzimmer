<template>
    <section class="header-dashboard">
        <h1>Управления кешем геокодера</h1>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <b-form-input v-model="searchText" placeholder="Введите адрес"></b-form-input>
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
                                    <strong>Loading...</strong>
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
                        <b-button v-b-modal.clearСacheModal style="width:100%;" variant="success">Очистить кеш</b-button>
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

        <b-modal id="clearСacheModal" title="Delete cache" @ok="deleteCache">
            <p class="text-danger">A you sure you want to clear cache?</p>
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
            geocoderCacheFields: [ 'address', 'created_at', 'coordinates', 'update', 'delete'],
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
                        this.textOperation = 'Кеш удален';
                        this.operationOk = true;
                        let index = this.geocoderCacheItems.findIndex( (elem, index, arr) => elem.id === item.id);
                        this.geocoderCacheItems.splice(index, 1);
                    } else {
                        this.textOperation = 'Ошибка удаления';
                        this.operationError = true;
                    } 
            });
        },
        geocoderCacheUpdate(item) {
            geocodeItems.update(item.id)
                .then(response => {
                    if(response.data.code == 'ok') {
                        this.textOperation = 'Кеш обновлен';
                        this.operationOk = true;
                    } else {
                        this.textOperation = 'Ошибка обновления';
                        this.operationError = true;
                    } 
            });
        },
        deleteCache() {
            geocodeItems.deleteAll()
                .then(resp => {
                    if(response.data.code == 'ok') {
                        this.textOperation = 'Кеш очищен';
                        this.operationOk = true;
                        this.geocoderCacheItems = [];
                    } else {
                        this.textOperation = 'Ошибка очистки кеша';
                        this.operationError = true;
                    } 
            });
        }
    }
}
</script>

<style scoped>

</style>
