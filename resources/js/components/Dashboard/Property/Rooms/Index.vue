<template>
    <section class="header-dashboard">
        <h1>Доступные комнаты</h1>
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
                        <b-form-group label="Объект" label-for="input-phone">
                            <b-dropdown>
                                <template v-slot:button-content>
                                    Объект недвижимости
                                </template>
                                <b-dropdown-item href="#" :value="0">Не выбран</b-dropdown-item>
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
                        <b-form-group label="Комнаты"  label-for="input-phone">
                            <b-table striped hover :items="subTypes" >
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
                <b-button type="submit" variant="success" class="mr-2">Новый тип комнаты</b-button>
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
                room_types: [
                    {
                        id: 1,
                        room_type_id: 0,
                        picture: '+',
                        name: 'дом (целиком)',
                        persons: 2
                    },
                    {
                        id: 6,
                        room_type_id: 1,
                        picture: '+',
                        name: 'одноместный',
                        persons: 2
                    },
                    {
                        id: 8,
                        room_type_id: 1,
                        picture: '+',
                        name: 'одноместный',
                        persons: 2
                    },
                    {
                        id: 16,
                        room_type_id: 0,
                        picture: '+',
                        name: 'квартира',
                        persons: 2
                    },
                    {
                        id: 31,
                        room_type_id: 16,
                        picture: '+',
                        name: 'двухместная',
                        persons: 2
                    },

                ],
                features: [
                    {
                        id: 39,
                        room_type_id: 5,
                        picture: '+',
                        name: 'Eigene kuche',
                    },
                    {
                        id: 40,
                        room_type_id: 5,
                        picture: '-',
                        name: 'Gemeinschaftskuche',
                    },
                    {
                        id: 41,
                        room_type_id: 6,
                        picture: '*',
                        name: 'Sauna'
                    }
                ]
            }
        },
        computed: {
            rootTypes() {
                return this.room_types.filter( item => item.room_type_id === 0)
            },
            subTypes() {
                return this.room_types.filter( item => item.room_type_id !== 0)
            }
        },
    }
</script>

<style scoped>

</style>
