<template>
    <section class="header-dashboard">
        <h1>{{ $t('Objects') }}</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Housing type')"  label-for="input-phone">
                            <b-select v-model="type">
                                <b-select-option href="#" value="">{{ $t('Not chosen') }}</b-select-option>
                                <b-select-option v-for="rootType in propertyTypes" href="#" :value="rootType.native_id">{{ rootType.name }}</b-select-option>
                            </b-select>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Administration')"  label-for="input-phone">
                            <b-select v-model="role">
                                <b-select-option href="#" value="" selected>{{ $t('Not chosen') }}</b-select-option>
                                <b-select-option href="#" value="admin" selected>{{ $t('Admin') }}</b-select-option>
                                <b-select-option href="#" :value="-1">{{ $t('All users')}}</b-select-option>
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
                            <b-table-simple striped hover responsive>
                                <b-thead>
                                    <b-th>{{ $t('User') }}</b-th>
                                    <b-th>{{ $t('Status') }}</b-th>
                                    <b-th>{{ $t('Name') }}</b-th>
                                    <b-th>{{ $t('Link') }}</b-th>
                                    <b-th>{{ $t('Delete') }}</b-th>
                                </b-thead>
                                <draggable @start="drag=true" @end="sortEnded" v-model="property" tag="tbody">
                                <b-tr v-for="item in filteredHotels">
                                    <td>
                                        {{ item.user ? item.user.name : '' }}
                                    </td>
                                    <td>
                                        <b-badge :variant="badge(item)">{{ item.status }}</b-badge>
                                    </td>
                                    <td>
                                        {{ getTypeName( getTypeId(item) ).name }}
                                    </td>
                                    <td>
                                        <router-link :to="{ name: 'property-single',  params: { item: item.id } }">{{ item.name }}</router-link>
                                    </td>
                                    <td >
                                        <a style="text-decoration:none;" href="" v-b-modal.modal-object-delete @click.prevent="featureDelete(item)"><span style="font-size:22px;">&times;</span></a>
                                    </td>
                                </b-tr>
                                </draggable>
                            </b-table-simple>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b-button v-b-modal.modal-object-create type="button" variant="success" class="mr-2" @click="hotelNew">
                    {{ $t('New object') }}</b-button>
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

        <b-modal id="modal-object-delete" :title="$t('Property delete')" @ok="deleteOk">
            <span class="text-danger">{{ $t('A you sure you want to delete hotel') }} {{ hotelDelete.name }}?</span>
            <span>{{ $t('This action can not be undone') }}</span>
        </b-modal>

        <b-modal id="modal-object-create" :title="$t('New property')" @ok.prevent="createProperty">
            <Forms v-model="this.hotelNewData" :fields="this.hotelNewData" :data="data" />
        </b-modal>

    </section>
</template>

<script>
    import ApiRequest from '../../../API/ApiRequest';
    import draggable from 'vuedraggable';

    import Forms from '../../../Forms/Index';

    import propertyForm from "../../../Data/propertyForm";

    let PropertyRequest = ApiRequest('property')
    let properties = new PropertyRequest;
    let TypesRequest = ApiRequest('booking-roomtypes');
    let types = new TypesRequest;

    export default {
        name: "Index",
        components: {Forms, draggable},
        data() {
            return {
                role: 'admin',
                type: '',
                fields: ['id', 'user', 'type', 'hotelType', 'status', 'views', 'name', 'delete'],
                types: [],
                property: [],
                operationOk : false,
                operationError : false,
                textOperation: '',
                hotelDelete: { name: '' },
                hotelNewData: '',
                data: propertyForm,
                hotelDefault: { name: '', address: '', city: 'Leipzig', zip: '' }
            }
        },
        created() {
            properties.all()
                .then(resp => {
                    this.property = resp.data.objects;
                })
            types.all()
                .then(resp => {
                    this.types = resp.data;
                })
        },
        methods: {
            sortEnded() {
                this.property = this.property.map( (item, num) => {
                    item.ord = num;
                    return item;
                })
                properties.request('list', this.property, 'post');
            },
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
            createProperty() {
                this.clearModalErrors();
                properties.create(this.hotelNewData).then(response => {
                    if(response.data.code == 'ok'){
                        this.textOperation = this.$t('Added');
                        this.operationOk = true
                    }else{
                        this.textOperation = this.$t('Add error');
                        this.operationError = true;
                    }
                    this.$nextTick(() => {
                        this.$bvModal.hide('modal-object-create');
                    });
                }).catch(error => {
                    this.generateModalErrors(error.response.data.errors);
                });
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

<style>
    .errText{
        color:red;
        font-size: 12px;
    }
</style>

