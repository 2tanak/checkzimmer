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
                        <b-form-group>
                            <b-table striped hover responsive :busy="loading" :items="subTypes" :fields="fields">
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
                                <template v-slot:cell(edit)="data">
                                    <a style="text-decoration:none;" href="" v-b-modal.modal-rooms @click.prevent="roomsEdit(data)"><span style="font-size:18px;">&#9998;</span></a>
                                </template>
                                <template v-slot:cell(delete)="data">
                                    <a style="text-decoration:none;" href="" v-b-modal.modal-rooms-delete @click.prevent="roomsDelete(data)"><span style="font-size:22px;">&times;</span></a>
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
                <b-button v-b-modal.modal-rooms type="submit" variant="success" class="mr-2">Новый тип комнаты</b-button>
            </div>
        </div>

        <b-modal id="modal-rooms" title="Add/Edit type rooms">
            <Forms v-model="addNewRoomType" :fields="addNewRoomType" :data="data"></Forms>
        </b-modal>
        <b-modal id="modal-rooms-delete" title="Feature delete">
            <span class="text-danger">A you sure you want to delete?</span>
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
                loading: false,
                types: '',
                fields: [ 'id', 'room_type_id', 'picture', 'name', 'persons', 'edit', 'delete' ],
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
        }
    }
</script>

<style scoped>

</style>
