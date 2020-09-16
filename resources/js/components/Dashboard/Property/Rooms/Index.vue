<template>
    <section class="header-dashboard">
        <h1>Доступные комнаты</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Тип жилья" label-for="input-phone">
                            <b-select v-model="typePropertySelect">
                                <b-select-option href="#" value="not_choice">Не выбран</b-select-option>
                                <b-select-option v-for="rootType in rootTypes" href="#" :value="rootType.id">{{ rootType.name }}</b-select-option>
                            </b-select>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Объект недвижимости" label-for="input-phone">
                            <b-select v-model="propertyObjectSelect">
                                <b-select-option href="#" value="not_choice">Не выбран</b-select-option>
                                <b-select-option v-for="rootType in rootTypes" href="#" :value="rootType.id">{{ rootType.name }}</b-select-option>
                            </b-select>
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
                            <b-table striped hover :items="subTypes" :fields="fields">
                                <template v-slot:cell(room_type_id)="data">
                                    {{ data.item.room_type_id }}
                                </template>
                                <template v-slot:cell(picture)="data">
                                    <img src="/svg/i-one.svg" alt="">
                                </template>
                                <template v-slot:cell(name)="data">
                                    {{ data.item.name }}
                                </template>
                                <template v-slot:cell(persons)="data">
                                    {{ data.item.persons }}
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
                <b-button v-b-modal.newRoomTypeModal type="submit" variant="success" class="mr-2">Новый тип комнаты</b-button>
            </div>
        </div>

        <b-modal @ok="newRoomTypeModalOk" @cancel="newRoomTypeModalCancel" @hidden="newRoomTypeModalHidden" id="newRoomTypeModal" title="Добавить новый тип комнаты">
            <Forms v-model="addNewRoomType" :fields="addNewRoomType" :data="data"></Forms>
        </b-modal>

    </section>
</template>

<script>
    import Forms from "../../../Forms/Index";

    import addNewRoomType from "../../../Data/addTypeRooms";

    export default {
        name: "Index",
        components: {Forms},
        data() {
            return {
                typePropertySelect: 'not_choice',
                propertyObjectSelect: 'not_choice',
                types: '',
                fields: [ 'id', 'room_type_id', 'picture', 'name', 'persons' ],
                room_types: [
                    { id: 1, room_type_id: 0, picture: '', name: 'дом (целиком)', persons: 2 },
                    { id: 6, room_type_id: 1, picture: '', name: 'одноместный', persons: 2 },
                    { id: 8, room_type_id: 1, picture: '', name: 'одноместный', persons: 2 },
                    { id: 16, room_type_id: 0, picture: '', name: 'квартира', persons: 2 },
                    { id: 31, room_type_id: 16, picture: '', name: 'двухместная', persons: 2
                    },
                ],
                addNewRoomType: '',
                data: addNewRoomType
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
        methods: {
            newRoomTypeModalOk() {

            },
            newRoomTypeModalCancel() {

            },
            newRoomTypeModalHidden() {

            }
        }
    }
</script>

<style scoped>

</style>
