<template>
    <section class="header-dashboard">
            <h1>Каталог типов комнат</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Типы жилья"  label-for="input-phone">
                            <b-select v-model="types">
                                <b-select-option href="#" :value="0">Все типы</b-select-option>
                                <b-dropdown-item v-for="rootType in rootTypes" href="#" :value="rootType.id">{{ rootType.name }}</b-dropdown-item>
                            </b-select>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Создать категорию" label-for="input-phone">
                            <b-form-input type="text" id="input-phone" placeholder="Название, Enter для подтверждения" ></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Текст под заголовком"  label-for="input-phone">
                            <b-table striped hover :busy="loading" :items="subTypes" :fields="fields">
                                <template v-slot:cell(room_type)="data">
                                    {{ rootCategory(data.item).name }}
                                </template>
                                <template v-slot:cell(picture)="data">
                                    <img :src="data.item.picture" >
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
                <b-button type="submit" variant="success" class="mr-2" v-b-modal.modal-room-type>Новый тип комнаты</b-button>
                <b-button variant="light">Отмена</b-button>
            </div>
        </div>
        <b-modal id="modal-room-type" title="Room Type add/edit">
            <Forms v-model="room_types[0]" :fields="room_types[0]" :data="data"></Forms>
        </b-modal>
    </section>
</template>

<script>
    import Forms from '../../../Forms/Index';

    import ApiRequest from "../../../API/ApiRequest";

    import roomTypesForm from "../../../Data/roomTypesForm";

    let RoomTypesRequest = ApiRequest('room-types');
    let roomTypes = new RoomTypesRequest;

    export default {
        name: "Index",
        components: { Forms },
        data() {
            return {
                types: '',
                loading: true,
                room_types: [
                    { id: 1, room_type_id: 0, picture: '+', name: 'дом (целиком)', persons: 2 },
                    { id: 6, room_type_id: 1, picture: '+', name: 'одноместный', persons: 2 },
                    { id: 8, room_type_id: 1, picture: '+', name: 'одноместный', persons: 2 },
                    { id: 16, room_type_id: 0, picture: '+', name: 'квартира', persons: 2 },
                    { id: 31, room_type_id: 16, picture: '+', name: 'двухместная', persons: 2 },
                ],
                fields: ['id', 'room_type', 'picture', 'name', 'persons'],
                data: roomTypesForm,
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
        mounted() {
            roomTypes.all()
                .then(resp => {
                    this.room_types = resp.data;
                    this.loading = false;
                })
        },
        methods: {
            rootCategory(item) {
                for (let i in this.room_types) {
                    if (item.room_type_id == this.room_types[i].id) {
                        return this.room_types[i]
                    }
                }
                return this.room_types;
            }
        }
    }
</script>

<style scoped>

</style>
