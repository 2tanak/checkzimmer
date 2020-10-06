<template>
    <section class="requests-dashboard">
        <h1>Обработка запросов</h1>
        <div class=" row mt-4">
            <div class="col-xl-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4">Фильтры</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <b-form-group label="Статус" label-for="selectStatus">
                                    <b-select v-model="selectStatus" id="selectStatus">
                                        <b-select-option href="#" value="not_choice">Не выбрано</b-select-option>
                                        <b-select-option href="#" value="status_1">Новый</b-select-option>
                                        <b-select-option href="#" value="status_2">На утверждении</b-select-option>
                                        <b-select-option href="#" value="status_3">Утвержденный</b-select-option>
                                    </b-select>
                                </b-form-group>
                            </div>
                            <div class="col-md-4">
                                <b-form-group label="Дата" label-for="selectData">
                                    <b-select v-model="selectData" id="selectData">
                                        <b-select-option href="#" value="not_choice">Не выбрано</b-select-option>
                                        <b-select-option href="#" value="data">По дате</b-select-option>
                                        <b-select-option href="#" value="dataFrom_To">По дате от - до</b-select-option>
                                    </b-select>
                                </b-form-group>
                            </div>
                            <div class="col-md-4">
                                <b-form-group label="Пользователь" label-for="selectUser">
                                    <b-select v-model="selectUser" id="selectUser">
                                        <b-select-option href="#" value="not_choice">Не выбрано</b-select-option>
                                        <b-select-option href="#" value="allUser">Все</b-select-option>
                                        <b-select-option href="#" value="individual">Индивидуальный</b-select-option>
                                    </b-select>
                                </b-form-group>
                            </div>
                        </div>
                        <div class="mt-4" v-if="selectData === 'data' ">
                            <b-calendar v-model="requestsCalendarUsual" locale="en-US"></b-calendar>
                        </div>
                        <div class="mt-4" v-if="selectData === 'dataFrom_To' ">
                            <b-calendar v-model="requestsCalendarFromTo" locale="en-US"></b-calendar>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4">Сортировка</h4>
                        <div class="row">
                            <div class="col-12">
                                <b-form-group label="Сортировка" label-for="selectSorting">
                                    <b-select v-model="selectSorting" id="selectSorting">
                                        <b-select-option href="#" value="not_choice">Не выбрано</b-select-option>
                                        <b-select-option href="#" value="sorting_1">Дата</b-select-option>
                                        <b-select-option href="#" value="sorting_2">Дата возрастающая</b-select-option>
                                        <b-select-option href="#" value="sorting_3">Пользователь</b-select-option>
                                    </b-select>
                                </b-form-group>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <b-table striped hover responsive :busy="loading" :items="requestsItems" :fields="requestsFields">
                            <template v-slot:cell(created_at)="data">
                                {{ data.item.created_at }}
                            </template>
                            <template v-slot:cell(status)="data">
                                {{ data.item.status }}
                            </template>
                            <template v-slot:cell(picture)="data">
                                <img style="width:70px;" src="/images/banner_2.jpg" >
                            </template>
                            <template v-slot:cell(object)="data">
                                <a style="text-decoration:none;" target="_blank" href="">http://immobilien.test-depot.info/dashboard/property/1</a>
                            </template>
                            <template v-slot:cell(address)="data">
                                {{ data.item.address }}
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
    </section>
</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            selectStatus: 'not_choice',
            selectData: 'not_choice',
            selectUser: 'not_choice',
            selectSorting: 'not_choice',
            requestsCalendarUsual: '',
            requestsCalendarFromTo: '',
            loading: false,
            requestsFields: ['created_at', 'status', 'picture', 'object', 'address'],
            requestsItems: [
                { id: 1, created_at: '01.01.2020', status: 'Новый', picture: '', object: '', address: 'Berlin' },
                { id: 2, created_at: '02.02.2020', status: 'На утверждении', picture: '', object: '', address: 'Berlin' },
                { id: 3, created_at: '03.03.2020', status: 'Утвержденный', picture: '', object: '', address: 'Berlin' }
            ],

        }
    }
}
</script>

<style>

.rounded-circle {
    border-radius: 0 !important;
}
.b-calendar-inner {
    width: 450px !important;
    margin: auto;
}

</style>
