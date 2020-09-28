<template>
    <section class="header-dashboard">
        <h1>Комнаты</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Тип жилья"  label-for="input-phone">
                            <b-select v-model="type">
                                <b-select-option href="#" value="">Не выбран</b-select-option>
                                <b-select-option v-for="rootType in propertyTypes" href="#" :value="rootType.native_id">{{ rootType.name }}</b-select-option>
                            </b-select>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Администрирование"  label-for="input-phone">
                            <b-select v-model="role">
                                <b-select-option href="#" value="" selected>Не выбрано</b-select-option>
                                <b-select-option href="#" value="admin" selected>Админ</b-select-option>
                                <b-select-option href="#" :value="-1">Все пользователи</b-select-option>
                                <!--<b-select-option v-for="rootType in rootTypes" href="#" :value="rootType.id">{{ rootType.name }}</b-select-option>-->
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
                            <b-table striped hover responsive :items="filteredHotels" :fields="fields">
                                <template v-slot:cell(user)="data">
                                    {{ data.item.user ? data.item.user.name : '' }}
                                </template>
                                <template v-slot:cell(status)="data">
                                    <b-badge :variant="badge(data.item)">{{ data.item.status }}</b-badge>
                                </template>
                                <template v-slot:cell(hotelType)="data">
                                    {{ getTypeName( getTypeId(data.item) ).name }}
                                </template>
                                <template v-slot:cell(name)="data">
                                    <router-link :to="{ name: 'property-single',  params: { item: data.item.id } }">{{ data.item.name }}</router-link>
                                </template>

                                <template v-slot:cell(delete)="data">
                                    <a style="text-decoration:none;" href="" v-b-modal.modal-object-delete @click.prevent="featureDelete(data.item)"><span style="font-size:22px;">&times;</span></a>
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
                <b-button v-b-modal.modal-object-create type="button" variant="success" class="mr-2" @click="hotelNew">Новый объект</b-button>
            </div>
        </div>

        <b-modal id="modal-object-delete" title="Property delete" @ok="deleteOk">
            <span class="text-danger">A you sure you want to delete hotel {{ hotelDelete.name }}?</span>
            <span>This action can not be undone</span>
        </b-modal>

        <b-modal id="modal-object-create" title="New property" @ok="deleteOk">
            <Forms v-model="this.hotelNewData" :fields="this.hotelNewData" :data="data" />
        </b-modal>

    </section>
</template>

<script>
    import ApiRequest from '../../../API/ApiRequest';
    import Forms from '../../../Forms';

    import propertyForm from "../../../Data/propertyForm";

    let PropertyRequest = ApiRequest('property')
    let properties = new PropertyRequest;
    let TypesRequest = ApiRequest('booking-roomtypes');
    let types = new TypesRequest;

    export default {
        name: "Index",
        components: {Forms},
        data() {
            return {
                role: 'admin',
                type: '',
                fields: ['id', 'user', 'type', 'hotelType', 'status', 'views', 'name', 'delete'],
                types: [],
                property: [],
                hotelDelete: { name: '' },
                hotelNewData: '',
                data: propertyForm,
                hotelDefault: { name: '', address: '', city: 'Leipzig', zip: '' }
            }
        },
        created() {
            properties.all()
                .then(resp => {
                    this.property = resp.data.data;
                })
            types.all()
                .then(resp => {
                    this.types = resp.data;
                })
        },
        methods: {
            badge(item) {
                switch (item.status) {
                    case 'approved': return 'success';
                    case 'pending': return 'warning';
                    case 'declined': return 'danger';
                }
                return 'dark';
            },
            getTypeName(type) {
                for (let j in this.types) {
                    if (this.types[j].native_id === type) {
                        return this.types[j];
                    }
                }
                return false;
            },
            getTypeId(item) {
                let type = item.options.find( ch => ch.key === 'hotel_type')
                return type ? type.value : false;
            },
            featureDelete(item) {
                this.hotelDelete = item;
            },
            deleteOk() {
                properties.delete(this.hotelDelete.id)
                    .then(resp => {
                        let toDeleteIndex = this.property.findIndex( item => item.id === this.hotelDelete.id );
                        this.property.splice(toDeleteIndex, 1);
                    });
            },
            hotelNew() {
                this.hotelNewData = { ...this.hotelDefault }
            }
        },
        computed: {
            propertyTypes() {
                if (!this.property.length) {
                    return []
                }

                let types = [ ...new Set(this.property.map( item => this.getTypeId(item))) ];
                return this.types.filter( item => types.includes(item.native_id));
            },
            filteredHotels() {
                if (!this.property.length) {
                    return []
                }

                return this.property
                    .filter( item => !this.type || this.getTypeId(item) === this.type )
                    .filter( item => !this.role || item.user.role === this.role || (this.role === -1 && item.user.role !== 'admin'));
            }
        },
    }
</script>

<style scoped>

</style>
