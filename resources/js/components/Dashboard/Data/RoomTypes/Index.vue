<template>
    <section class="header-dashboard">
        <div style="display:flex;align-items:center;justify-content:space-between;">
            <h1>{{ $t('Room type catalog') }}</h1>
            <b-button style="margin-right:0 !important;" type="submit" variant="success" class="mr-2" v-b-modal.modal-room-type>{{ $t('New room type') }}</b-button>
        </div>
        <!--<div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Housing types')"  label-for="types">
                            <b-select v-model="types">
                                <b-select-option href="#" :value="0">{{ $t('All types') }}</b-select-option>
                                <b-select-option v-for="rootType in rootTypes" :value="rootType.id">{{ rootType.name }}</b-select-option>
                            </b-select>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Create category')" label-for="input-phone">
                            <b-form-input type="text" id="input-phone" :placeholder="$t('Name, Enter to confirm')" ></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group>
                            <b-table striped hover responsive :busy="loading" :items="rootTypes" :fields="fields">
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
                                    <a style="text-decoration:none;" href="" v-b-modal.modal-room-type @click.prevent="roomTypeEdit(data.item)"><span style="font-size:18px;">&#9998;</span></a>
                                </template>
                                <template v-slot:cell(delete)="data">
                                    <a style="text-decoration:none;" href="" v-b-modal.modal-room-type-delete @click.prevent="roomTypeDelete(data.item)"><span style="font-size:22px;">&times;</span></a>
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
                <b-button type="submit" variant="success" class="mr-2" v-b-modal.modal-room-type>{{ $t('New room type') }}</b-button>
            </div>
        </div>
        <b-modal id="modal-room-type" :title="$t('Room Type add/edit')" @ok='roomTypeUpdateOk'>
            <Forms v-model="roomTypesAction" :fields="roomTypesAction" :data="data"></Forms>
        </b-modal>
        <b-modal id="modal-room-type-delete" :title="$t('Room type delete')" @ok='roomTypeDeleteOk'>
            <span class="text-danger">{{ $t('A you sure you want to delete') }} <strong>{{ roomTypesAction.name }}</strong>?</span>
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
                types: 0,
                loading: true,
                modalApproove: false,
                room_types: [
                    { id: 1, room_type_id: 0, picture: '', name: 'дом (целиком)', persons: 2 },
                    { id: 6, room_type_id: 1, picture: '', name: 'одноместный', persons: 2 },
                    { id: 8, room_type_id: 1, picture: '', name: 'одноместный', persons: 2 },
                    { id: 16, room_type_id: 0, picture: '', name: 'квартира', persons: 2 },
                    { id: 31, room_type_id: 16, picture: '', name: 'двухместная', persons: 2 },
                ],
                fields: [this.$t('id'), this.$t('picture'), this.$t('Name'), this.$t('Edit'), this.$t('Delete')],
                data: roomTypesForm,
                roomTypesAction: { name: ''}
            }
        },
        mounted() {
            roomTypes.all()
                .then(resp => {
                    this.room_types = resp.data;
                    this.loading = false;
                    this.data.room_type_id.options = this.getRootTypes();
                })
        },
        computed: {
            rootTypes() {
                return this.room_types.filter( item => item.room_type_id === 0 );
            },
            subTypes() {
                return this.room_types.filter( item => item.room_type_id !== 0)
            },
            subTypesFiltered() {
                return this.subTypes.filter( item => !this.types || item.room_type_id === this.types );
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
            rootCategory(item) {
                for (let i in this.room_types) {
                    if (item.room_type_id === this.room_types[i].id) {
                        return this.room_types[i]
                    }
                }
                return this.room_types;
            },
            roomTypeEdit(item) {
                this.roomTypesAction = item;
            },
            roomTypeDelete(item) {
                this.roomTypesAction = item;
            },
            roomTypeDeleteOk(item) {
                this.roomTypesAction = item;
            }
        }
    }
</script>

<style scoped>

</style>
