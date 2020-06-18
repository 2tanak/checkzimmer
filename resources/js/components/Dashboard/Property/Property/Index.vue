<template>
    <section class="header-dashboard">
        <h1>Комнаты</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Категория"  label-for="input-phone">
                            <b-dropdown>
                                <template v-slot:button-content>
                                    Тип жилья
                                </template>
                                <b-dropdown-item href="#" :value="0">Не выбран</b-dropdown-item>
                                <b-dropdown-item v-for="rootType in rootTypes" href="#" :value="rootType.id">{{ rootType.name }}</b-dropdown-item>
                            </b-dropdown>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Администрирование"  label-for="input-phone">
                            <b-dropdown>
                                <template v-slot:button-content>
                                    Пользователь
                                </template>
                                <b-dropdown-item href="#" :value="0">Админ</b-dropdown-item>
                                <b-dropdown-item href="#" :value="0">Все пользователи</b-dropdown-item>
                                <b-dropdown-item v-for="rootType in rootTypes" href="#" :value="rootType.id">{{ rootType.name }}</b-dropdown-item>
                            </b-dropdown>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Объекты недвижимости"  label-for="input-phone">
                            <b-table striped hover responsive :items="property" >
                                <template v-slot:cell(status)="data">
                                    <b-badge :variant="badge(data.item)">{{ data.item.status }}</b-badge>
                                </template>
                                <template v-slot:table-busy>
                                    <div class="text-center text-danger my-2">
                                        <b-spinner class="align-middle"></b-spinner>
                                        <strong>Loading...</strong>
                                    </div>
                                </template>
                            </b-table>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b-button type="submit" variant="success" class="mr-2">Новый объект</b-button>
                <b-button variant="light">Отмена</b-button>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Index",
        data() {
            return {
                property: [
                    {
                        id: 1,
                        room_type_id: 0,
                        picture: '+',
                        name: 'дом (целиком)',
                        status: 'approved',
                        views: '78',
                        city: 'Лейпциг',
                        address: 'улица ААБ',
                    },
                    {
                        id: 6,
                        room_type_id: 1,
                        picture: '+',
                        name: 'одноместный',
                        status: 'approved',
                        views: '14',
                        city: 'Берлин',
                        address: 'улица Фонарей',
                    },
                    {
                        id: 8,
                        room_type_id: 1,
                        picture: '+',
                        name: 'одноместный',
                        status: 'approved',
                        views: '11',
                        city: 'Лейпциг',
                        address: 'Улица Проверки, 65-34',
                    },
                    {
                        id: 16,
                        room_type_id: 0,
                        picture: '+',
                        name: 'квартира',
                        status: 'pending',
                        views: '234',
                        city: 'Берлин',
                        address: 'ул. Неизвестного, 32',
                    },
                    {
                        id: 31,
                        room_type_id: 16,
                        picture: '+',
                        name: 'двухместная',
                        status: 'declined',
                        views: '102',
                        city: 'Франкфурт-на-Майне',
                        address: 'бульв Бульвар, 93-17',
                        },

                ],

            }
        },
        methods: {
            badge(item) {

                switch (item.status) {
                    case 'approved': return 'success';
                    case 'pending': return 'warning';
                    case 'declined': return 'danger';
                }
                return 'dark';
            }
        },
        computed: {
            rootTypes() {
                return this.property.filter( item => item.room_type_id === 0)
            },
            subTypes() {
                return this.property.filter( item => item.room_type_id !== 0)
            }
        },
    }
</script>

<style scoped>

</style>
