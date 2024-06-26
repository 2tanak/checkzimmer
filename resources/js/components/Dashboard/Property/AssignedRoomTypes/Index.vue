<template>
    <section class="header-dashboard">
        <div style="display:flex;align-items:center;justify-content:space-between;">
            <h1>{{ $t('Available rooms') }}</h1>
            <b-button style="margin-right:0 !important;" v-b-modal.modal-rooms type="submit" variant="success" class="mr-2" @click="roomsNew">{{ $t('New room type') }}</b-button>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Housing type')" label-for="input-phone">
                            <b-select v-model="typePropertySelect">
                                <b-select-option href="#" value="not_choice">{{ $t('Not chosen') }}</b-select-option>
                                <b-select-option v-for="rootType in rootTypes" href="#" :value="rootType.id">{{ rootType.name }}</b-select-option>
                            </b-select>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Property object')" label-for="input-phone">
                            <b-select v-model="propertyObjectSelect">
                                <b-select-option href="#" value="not_choice">{{ $t('Not chosen') }}</b-select-option>
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
                                    {{ getTypeName(data.item.room_type_id) }}
                                </template>
                                <template v-slot:cell(picture)="data">
                                    <img :src="data.item.picture || '/svg/i-multi.svg'" alt="">
                                </template>
                                <template v-slot:cell(name)="data">
                                    {{ data.item.name }}
                                </template>
                                <template v-slot:cell(persons)="data">
                                    {{ data.item.persons }}
                                </template>
                                <template v-slot:cell(edit)="data">
                                    <a style="text-decoration:none;" href="" v-b-modal.modal-rooms @click.prevent="roomsEdit(data.item)"><span style="font-size:18px;">&#9998;</span></a>
                                </template>
                                <template v-slot:cell(delete)="data">
                                    <a style="text-decoration:none;" href="" v-b-modal.modal-rooms-delete @click.prevent="roomsDelete(data.item)"><span style="font-size:22px;">&times;</span></a>
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
            <div class="col-md-12">
                <b-button v-b-modal.modal-rooms type="submit" variant="success" class="mr-2" @click="roomsNew">{{ $t('New room type') }}</b-button>
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

        <b-modal id="modal-rooms" :title="$t('Add/Edit type rooms')" @ok.prevent="createRoom">
            <Forms v-model="roomTypeAction" :fields="roomTypeAction" :data="data"></Forms>
        </b-modal>

        <b-modal id="modal-rooms-delete" :title="$t('Feature delete')" @ok="deleteRoom">
            <span class="text-danger">{{ $t('A you sure you want to delete') }} {{ roomTypeAction.name }}?</span>
            <span>{{ $t('This action cannot be undone') }}!</span>
        </b-modal>

    </section>
</template>

<script>
import Forms from "../../../Forms/Index";
import ApiRequest from '../../../API/ApiRequest';

import addNewRoomType from "../../../Data/addTypeRooms";

let RoomRequest = ApiRequest('room-types')
let room_types = new RoomRequest;

export default {
    name: "Index",
    components: {Forms},
    data() {
        return {
            typePropertySelect: 'not_choice',
            propertyObjectSelect: 'not_choice',
            loading: false,
            types: '',
            operationOk : false,
            operationError : false,
            textOperation: '',
            fields: [
                {
                    key: 'id',
                    label: this.$t('id')
                },
                {
                    key: 'room_type_id',
                    label: this.$t('room_type_id')
                },
                {
                    key: 'picture',
                    label: this.$t('picture')
                },
                {
                    key: 'name',
                    label: this.$t('Name')
                },
                {
                    key: 'persons',
                    label: this.$t('Persons')
                },
                {
                    key: 'edit',
                    label: this.$t('Edit')
                },
                {
                    key: 'delete',
                    label: this.$t('Delete')
                }
            ],
            room_types: [
                { id: 1, room_type_id: 0, name: 'дом (целиком)' },
                { id: 6, room_type_id: 1,  name: 'одноместный' }
            ],

            data: addNewRoomType,
            roomTypeDefault: { name: '', room_type_id: 0, picture: 'src//', persons: 1 },
            roomTypeAction: { name: '' }
        }
    },
    created() {
        room_types.all()
            .then(resp => {
                this.room_types = resp.data;
            })
    },
    mounted() {
        this.data.room_type_id.options = this.getRootTypes();
    },
    computed: {
        rootTypes() {
            return this.room_types.filter( item => item.room_type_id === 0 )
        },
        subTypes() {
            return this.room_types.filter( item => item.room_type_id !== 0 )
        }
    },
    methods: {
        getRootTypes() {
            let types = { 0: 'Родительский тип' };
            for (let i in this.rootTypes) {
                types[this.rootTypes[i].id] = this.rootTypes[i].name;
            }
            return types;
        },
        getTypeName(id) {
            return this.room_types.find( item => item.id === id ).name;
        },
        roomsEdit(item) {
            this.roomTypeAction = item;
        },
        roomsDelete(item) {
            this.roomTypeAction = item;
        },
        roomsNew() {
            this.roomTypeAction = { ...this.roomTypeDefault };
        },
        createRoom() {
            this.clearModalErrors();

            room_types.create(this.roomTypeAction).then(response => {
                if(response.data.code == 'ok'){
                    this.textOperation = 'Добавлено';
                    this.operationOk = true
                }else{
                    this.textOperation = 'Ошибка добавления';
                    this.operationError = true;
                }
                this.$nextTick(() => {
                    this.$bvModal.hide('modal-rooms');
                });
            }).catch(error => {
                this.generateModalErrors(error.response.data.errors);
            });
        },
        deleteRoom() {
            room_types.delete(this.roomTypeAction.id)
                .then(resp => {
                    let toDeleteIndex = this.room_types.findIndex( item => item.id === this.roomTypeAction.id );
                    this.room_types.splice(toDeleteIndex, 1);
                });
        },

        //helpers
        clearModalErrors() {
            var errText = document.querySelectorAll('.errText');
            errText.forEach((n, i) => {
                n.parentNode.removeChild(n);
            });
        },
        generateModalErrors(errors){
            var keys = Object.keys(errors)
            for (var i = 0, l = keys.length; i < l; i++) {
                let p = document.createElement("p");
                p.textContent = errors[keys[i]];
                p.setAttribute('class','errText');
                document.querySelector('#input-' + keys[i]).parentNode.append(p);
            }
        }
    }
}
</script>

<style>
.errText{
    color:red;
    font-size: 12px;
}
</style>
