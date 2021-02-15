<template>
    <section class="users-dashboard">
        <h1>{{ $t('Site guests')}}</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Sorting')" label-for="input-phone">
                            <b-select style="margin:0 !important;" id="orderby" text="Сортировка по полю" class="m-md-2" v-model="order">
                                <b-select-option value="id">{{ $t('Id') }}</b-select-option>
                                <b-select-option value="pin">{{ $t('PIN') }}</b-select-option>
                                <b-select-option value="name">{{ $t('Name') }}</b-select-option>
                                <b-select-option value="email">{{ $t('E-mail') }}</b-select-option>
                            </b-select>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Search')" label-for="input-search">
                            <b-form-input style="height:37px;border: 1px solid #ced4da;border-radius:0.25rem;" type="text" id="input-search" v-model="search"
                                          :placeholder="$t('Search text')"></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-table striped hover :busy="loading" :items="guestList" :fields="guestFields">
                            <template v-slot:cell(edit)="data">
                                <a href="" v-b-modal.modal-user @click.prevent="guestEdit(data)">&#9998;</a>
                            </template>
                            <template v-slot:cell(delete)="data">
                                <a href="" v-b-modal.modal-user-delete @click.prevent="guestDelete(data)">&times;</a>
                            </template>
                            <template v-slot:table-busy>
                                <div class="text-center text-danger my-2">
                                    <b-spinner class="align-middle"></b-spinner>
                                    <strong>{{ $t('Loading') }}...</strong>
                                </div>
                            </template>
                        </b-table>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b-button type="submit" variant="success" class="mr-2" v-b-modal.modal-user @click="newGuest">
                    {{ $t('New guest')}}
                </b-button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">

                <b-alert dismissible v-model="operationOk" variant="success">
                    {{ textOperation }}
                </b-alert>
                <b-alert dismissible v-model="operationError" variant="danger">
                    {{ textOperation }}
                </b-alert>
            </div>
        </div>
        <b-modal id="modal-user" :title="editGuest.id ? $t('User editing') : $t('New user')" @ok.prevent="guestCreate">
            <Forms v-model="editGuest" :fields="editGuest" :data="data"/>
        </b-modal>
        <b-modal id="modal-user-delete" title="Delete guest" @ok.prevent="guestDeleteApproved">
            <span class="text-danger">{{ $t('A you sure you want to delete guest with PIN') }} #<strong>{{ deleteGuest.pin }}</strong>
                (<strong>{{ deleteGuest.email }}</strong>)
            </span>
        </b-modal>
    </section>
</template>

<script>
import Forms from "../../Forms/Index";
import guestsTable from "../../Data/guestsForm"
import ApiRequest from "../../API/ApiRequest";

let GuestsRequest = ApiRequest('guests');
let guests = new GuestsRequest;

let newGuest = {
    id: '',
    pin: '',
    name: '',
    email: '',
    reference: '',
    active: true,
    password: ''
};

export default {
    name: "Guests",
    components: {Forms},
    currentGuest: {},
    data() {
        return {
            order: 'name',
            operationOk : false,
            operationError : false,
            search: '',
            loading: true,
            editGuest: {...newGuest},
            textOperation: '',
            deleteGuest: {},
            guests: [],
            guestFields: [
                this.$t('id'), this.$t('pin'), this.$t('name'), this.$t('email'), this.$t('active'), this.$t('Edit'), this.$t('Delete')
            ],
            data: guestsTable
        }
    },
    computed: {
        guestList() {
            let guestList = [];
            if (this.guests.length === 0) {
                return guestList;
            }
            if (this.search) {
                guestList = this.guests.filter(
                    item =>
                        item.name.toLowerCase().includes(this.search.toLowerCase()) ||
                        item.email.toLowerCase().includes(this.search.toLowerCase())
                );
            } else {
                guestList = this.guests;
            }
            let that = this;
            guestList = guestList.sort((a, b) => {
                String(a[that.order]).localeCompare(String(b[that.order]))
            })
            return guestList;
        }
    },
    methods: {
        newGuest() {
            this.editGuest = {...newGuest};
        },
        guestEdit(data) {
            this.editGuest = data.item;
        },
        guestDelete(data) {
            this.deleteGuest = data.item;
        },
        // guestUpdate() {
            // this.clearModalErrors();
            // guests.update(this.editGuest.id,this.editGuest).then(response => {
            //     if(response.data.code === 'ok'){
            //         this.textOperation = this.$t('Guest updated');
            //         this.operationOk = true
            //     }else{
            //         this.textOperation = this.$t('Update error');
            //         this.operationError = true;
            //     }
            //     this.$nextTick(() => {
            //         this.$bvModal.hide('modal-user');
            //     });
            // }).catch(error => {
            //     this.generateModalErrors(error.response.data.errors);
            // });
        // },
        guestDeleteApproved() {
            guests.delete(this.deleteGuest.id).then(response => {
                if(response.data.code === 'ok'){
                    this.textOperation = this.$t('Guest deleted');
                    this.operationOk = true;
                    var index = this.guests.findIndex(n => n.id === this.deleteGuest.id);
                    if (index !== -1) {
                        this.guests.splice(index, 1);
                    }

                } else{
                    this.textOperation = this.$t('User deletion error');
                    this.operationError = true;
                    this.operationError = true;
                }

            }).catch(error => {
            });
            this.$nextTick(() => {
                this.$bvModal.hide('modal-user-delete');
            });
        },
        guestCreate() {
            this.$bvToast.toast();
            // if(this.guestEdit.id){
            //     this.guestUpdate();
            //     return;
            // }
            this.clearModalErrors();
            guests.create(this.editGuest).then(response => {
                if(response.data.code === 'ok'){
                    this.operationOk = true;
                    if(!this.editGuest.id) {
                        this.guests.push(response.data.guest);
                        this.textOperation = this.$t('Guest added');
                    }else{
                        this.textOperation = this.$t('Guest edited');
                    }
                }else{
                    this.textOperation = this.$t('Error adding guest');
                    this.operationError = true;
                }
                this.$nextTick(() => {
                    this.$bvModal.hide('modal-user');
                });
            }).catch(error => {
                this.generateModalErrors(error.response.data.errors);
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

    },
    mounted() {
        guests.all()
            .then(resp => {
                this.guests = resp.data.guests;
                this.loading = false;
            })
    }
}
</script>

<style scoped>

</style>
