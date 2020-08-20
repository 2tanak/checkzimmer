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
                        <b-form-group label="Объекты недвижимости"  label-for="input-phone">
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
                                    <a href="" v-b-modal.modal-feature-delete @click.prevent="featureDelete(data)">&times;</a>
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
            </div>
        </div>
    </section>
</template>

<script>
    import ApiRequest from '../../../API/ApiRequest';
    let PropertyRequest = ApiRequest('property')
    let properties = new PropertyRequest;
    let TypesRequest = ApiRequest('booking-roomtypes');
    let types = new TypesRequest;

    export default {
        name: "Index",
        data() {
            return {
                role: 'admin',
                type: '',
                fields: ['id', 'user', 'type', 'hotelType', 'status', 'views', 'name', 'delete'],
                types: [],
                property: [],

            }
        },
        created() {
            properties.all()
                .then(resp => {
                    this.property = resp.data;
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
                for (let i in item.options) {
                    if (item.options[i].key === 'hotel_type') {
                        return item.options[i].value;
                    }
                }
                return false;
            }
        },
        computed: {
            propertyTypes() {
                let types = [];
                let typeNames = [];
                this.property.forEach( item => {
                    let typeId = this.getTypeId(item);

                    if (types.indexOf(typeId) === -1) {
                        types.push(typeId);
                    }
                });

                for (let i in types) {
                    typeNames.push( this.getTypeName(types[i]));
                }
                return typeNames;
            },
            filteredHotels() {
                let hotels = [];
                let hotelsv2 = []
                if (this.type) {
                    for (let i in this.property) {
                        let id = this.getTypeId(this.property[i]);
                        if (id === this.type) {
                            hotels.push(this.property[i]);
                        }
                    }
                } else {
                    hotels = this.property;
                }
                if (this.role) {
                    for (let i in hotels) {
                        if (
                            hotels[i].user.role === 'admin' && this.role === 'admin' ||
                            hotels[i].user.role !== 'admin' && this.role === -1) {
                                hotelsv2.push( hotels[i] );
                            }
                    }
                } else {
                    return hotels;
                }
                return hotelsv2;
            }
        },
    }
</script>

<style scoped>

</style>
