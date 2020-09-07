<template>
    <section class="header-dashboard">
        <h1>Типы комнат</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Объект" label-for="input-phone">
                            <b-select v-model="selectedObject">
                                <b-select-option value="not_choice">Не выбран</b-select-option>
                                <b-select-option v-for="rootType in rootTypes" :value="rootType.id">{{ rootType.name }}</b-select-option>
                            </b-select>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex" style="width:100%;">
                            <b-form-group label="Администрирование"  label-for="selectedUser" class="mr-3" style="width:50%;">
                                <b-select v-model="selectedUser">
                                    <b-select-option href="#" value="admin">Админ</b-select-option>
                                    <b-select-option href="#" value="choice">Выбор пользователя</b-select-option>
                                </b-select>
                            </b-form-group>
                            <b-form-group label="Пользователи" label-for="selectedUserItem" style="width:50%;" v-if="selectedUser === 'choice' ">
                                <b-select v-model="selectedUserItem">
                                    <b-select-option href="#" value="not_choice">Не выбрано</b-select-option>
                                    <b-select-option href="#" value="user_1">Пользователь 1</b-select-option>
                                    <b-select-option href="#" value="user_2">Пользователь 2</b-select-option>
                                    <b-select-option href="#" value="user_3">Пользователь 3</b-select-option>
                                </b-select>
                            </b-form-group>
                        </div>
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
                <b-button type="submit" variant="success" class="mr-2">Добавить тип комнаты</b-button>
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
                selectedObject: 'not_choice',
                selectedUser: 'admin',
                selectedUserItem: 'not_choice',
                room_types: [
                    { id: 1, room_type_id: 0, picture: '+', name: 'дом (целиком)', persons: 2 },
                    { id: 6, room_type_id: 1, picture: '+', name: 'одноместный', persons: 2 },
                    { id: 8, room_type_id: 1, picture: '+', name: 'одноместный', persons: 2 },
                    { id: 16, room_type_id: 0, picture: '+', name: 'квартира', persons: 2 },
                    { id: 31, room_type_id: 16, picture: '+', name: 'двухместная', persons: 2 }
                ]
            }
        },
        computed: {
            rootTypes() {
                return this.room_types.filter( item => item.room_type_id === 0);
            },
            subTypes() {
                return this.room_types.filter( item => item.room_type_id !== 0);
            }
        },
        methods: {

        }
    }

</script>

<style scoped>

</style>
