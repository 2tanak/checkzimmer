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
                                {{ data.item.created_at }}
                            </template>
                            <template v-slot:cell(coordinates)="data">
                                {{ data.item.coordinates }}
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

        <b-modal id="clearСacheModal" title="Delete cache" @ok="deleteCache">
            <p class="text-danger">A you sure you want to clear cache?</p>
        </b-modal>

    </section>

</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            searchText: '',
            loading: false,
            geocoderCacheFields: [ 'address', 'created_at', 'coordinates', 'update', 'delete'],
            geocoderCacheItems: [
                { id: 1, address: 'Berlin', created_at: '01.01.2020', coordinates: '10.15.768.345' },
                { id: 2, address: 'Leipzig', created_at: '02.02.2020', coordinates: '11.235.4567.345' },
                { id: 3, address: 'Berlin', created_at: '03.03.2020', coordinates: '345.456,345,78' }
            ]
        }
    },
    methods: {
        geocoderCacheDelete(item) {
            let index = this.geocoderCacheItems.findIndex( (elem, index, arr) => elem.id === item.id);
            this.geocoderCacheItems.splice(index, 1);
        },
        geocoderCacheUpdate(item) {

        },
        deleteCache() {

        }
    }
}
</script>

<style scoped>

</style>
