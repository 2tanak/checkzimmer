
<template>
    <section class="header-dashboard">
        <h1>{{ $t('Room types') }}</h1>
        <div class="row mt-4">
            <div class="col-xl-6 grid-margin">
                <div class="card">
                    <div class="card-body" style="min-height:135px;">
                        <div style="width:100%;" class="d-flex">
                            <b-form-group :label="$t('Object')" label-for="input-phone" style="width:50%;" class="mr-3">
                                <b-select v-model="selectedObject">
                                    <b-select-option value="not_choice">{{ $t('Not chosen') }}</b-select-option>
                                    <!-- <b-select-option v-for="rootType in rootTypes" :value="rootType.id">{{ rootType.name }}</b-select-option> -->
                                    <b-select-option href="#" value="1">Гостиничный комплекс "У моря"</b-select-option>
                                    <b-select-option href="#" value="2">Жилой комплек "Плаза"</b-select-option>
                                    <b-select-option href="#" value="3">Многоэтажный дом</b-select-option>
                                </b-select>
                            </b-form-group>
                            <b-form-group :label="$t('Room type')" label-for="selectedObjectItem" style="width:50%;" class="mr-3">
                                <b-select v-model="selectedObjectItem">
                                    <b-select-option value="not_choice">{{ $t('Not chosen') }}</b-select-option>
                                    <!-- <b-select-option v-for="rootType in rootTypes" :value="rootType.id">{{ rootType.name }}</b-select-option> -->
                                    <b-select-option href="#" value="1_1">Одноместный номер</b-select-option>
                                    <b-select-option href="#" value="2_2">Двухместный номер</b-select-option>
                                    <b-select-option href="#" value="3_3">Многоместный номер</b-select-option>
                                    <b-select-option href="#" value="4_4">Люкс</b-select-option>
                                    <b-select-option href="#" value="5_5">Призедентский</b-select-option>
                                    <b-select-option href="#" value="6_6">Для новобрачных</b-select-option>
                                </b-select>
                            </b-form-group>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex" style="width:100%;">
                            <b-form-group :label="$t('Administration')"  label-for="selectedUser" class="mr-3" style="width:50%;">
                                <b-select v-model="selectedUser">
                                    <b-select-option href="#" value="admin">{{ $t('Admin') }}</b-select-option>
                                    <b-select-option href="#" value="choice">{{ $t('User choice') }}</b-select-option>
                                </b-select>
                            </b-form-group>
                            <b-form-group :label="$t('Users')" label-for="selectedUserItem" style="width:50%;" v-if="selectedUser === 'choice' ">
                                <b-select v-model="selectedUserItem">
                                    <b-select-option href="#" value="not_choice">{{ $t('Not chosen') }}</b-select-option>
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
            <div class="col-xl-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group>
                            <b-table striped hover responsive :busy="loading" :items="subTypes" :fields="fields">
                                <template v-slot:cell(room_type)="data">
                                    {{ rootCategory(data.item).name }}
                                </template>
                                <template v-slot:cell(picture)="data">
                                    <img :src="data.item.picture" >
                                </template>
                                <template v-slot:cell(name)="data">
                                    {{ data.item.name }}
                                </template>
                                <template v-slot:cell(persons)="data">
                                    {{ data.item.persons }}
                                </template>
                                <template v-slot:cell(edit)="data">
                                    <a style="text-decoration:none;" href="" v-b-modal.assignedModal @click.prevent="assignedEdit(data.item)"><span style="font-size:18px;">&#9998;</span></a>
                                </template>
                                <template v-slot:cell(delete)="data">
                                    <a style="text-decoration:none;" href="" v-b-modal.assignedModalDelete @click.prevent="assignedDelete(data.item)"><span style="font-size:22px;">&times;</span></a>
                                </template>
                                <template v-slot:table-busy>
                                    <div class="text-center text-danger my-2">
                                        <b-spinner class="align-middle"></b-spinner>
                                        <strong>{{ $t('Loading') }}...</strong>
                                    </div>
                                </template>
                            </b-table>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <b-button v-b-modal.assignedModal type="submit" variant="success" class="mr-2">{{ $t('Add room type') }}</b-button>
            </div>
        </div>


        <b-modal id="assignedModal" :title="$t('Add room type')">
            <Forms v-model="assignedAction" :fields="assignedAction" :data="data"></Forms>
        </b-modal>
        <b-modal id="assignedModalDelete" title="Feature delete">
            <span class="text-danger">{{ $t('A you sure you want to delete') }} {{ assignedAction.name }}?</span>
            <span>{ $t('This action cannot be undone') }}!</span>
        </b-modal>

    </section>
</template>

<script>

import ApiRequest from "../../../API/ApiRequest";

let RoomTypesRequest = ApiRequest('room-types');
let roomTypes = new RoomTypesRequest;

import Forms from '../../../Forms/Index';

import addTypeRooms from "../../../Data/addTypeRooms";

export default {
    name: "Index",
    components: {Forms},

    data() {
        return {
            types: '',
            loading: false,
            selectedObject: 'not_choice',
            selectedUser: 'admin',
            selectedUserItem: 'not_choice',
            selectedObjectItem: 'not_choice',
            fields: [this.$t('id'), this.$t('room_type'), this.$t('picture'), this.$t('Name'), this.$t('Persons'), this.$t('Edit'), this.$t('Delete')],
            room_types: [
                { id: 1, room_type_id: 0, picture: '', name: 'дом (целиком)', persons: 2 },
                { id: 6, room_type_id: 1, picture: '', name: 'многоместный', persons: 10 },
                { id: 8, room_type_id: 1, picture: '', name: 'многоместный', persons: 10 },
                { id: 16, room_type_id: 0, picture: '', name: 'квартира', persons: 2 },
                { id: 31, room_type_id: 16, picture: '', name: 'двухместная', persons: 2 }
            ],
            data: addTypeRooms,
            assignedAction: { name: '' }
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
    mounted() {
        roomTypes.all()
            .then(resp => {
                //this.room_types = resp.data;
                this.loading = false;
            })
    },
    methods: {
        getRootTypes() {
            let types = { 0: 'Родительский тип' };
            for (let i in this.rootTypes) {
                types[this.rootTypes[i].id] = this.rootTypes[i].name;
            }
            return types;
        },
        rootCategory(item) {
            return this.room_types.find( ch => ch.id === item.room_type_id )
        },
        assignedEdit(item) {
            this.assignedAction = item;
        },
        assignedDelete(item) {
            this.assignedAction = item;
        }
    }
}

</script>

<style scoped>

</style>
