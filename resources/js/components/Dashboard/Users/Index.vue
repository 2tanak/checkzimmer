<template>
    <section class="users-dashboard">
        <h1>Пользователи</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Сортировка" label-for="input-phone">
                            <b-select id="orderby" text="Сортировка по полю" class="m-md-2" v-model="order">
                                <b-select-option value="id">Id</b-select-option>
                                <b-select-option value="name">Name</b-select-option>
                                <b-select-option value="email">E-mail</b-select-option>
                            </b-select>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Поиск" label-for="input-search">
                            <b-form-input type="text" id="input-search" v-model="search"
                                          placeholder="Текст для поиска"></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-table striped hover :busy="loading" :items="userList" :fields="userFields">
                            <template v-slot:cell(edit)="data">
                                <a href="" v-b-modal.modal-user @click.prevent="userEdit(data)">&#9998;</a>
                            </template>
                            <template v-slot:cell(delete)="data">
                                <a href="" v-b-modal.modal-user-delete @click.prevent="userDelete(data)">&times;</a>
                            </template>
                            <template v-slot:table-busy>
                                <div class="text-center text-danger my-2">
                                    <b-spinner class="align-middle"></b-spinner>
                                    <strong>Loading...</strong>
                                </div>
                            </template>
                        </b-table>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b-button type="submit" variant="success" class="mr-2" v-b-modal.modal-user @click="newUser">Новый
                    пользователь
                </b-button>

                <!--<b-button variant="light">Отмена</b-button>-->
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
        <b-modal id="modal-user" :title="editUser.id ? 'Редактирование пользователя' : 'Новый пользователь'" @ok.prevent="userCreate">
            <Forms v-model="editUser" :fields="editUser" :data="data"/>
        </b-modal>
        <b-modal id="modal-user-delete" title="Delete user" @ok.prevent="userDeleteApproved">
            <span class="text-danger">A you sure you want to delete user <strong>{{ deleteUser.name }}</strong>
                (<strong>{{ deleteUser.email }}</strong>)
            </span>
        </b-modal>
    </section>
</template>

<script>
import Forms from "../../Forms/Index";
import usersTable from "../../Data/usersForm"
import ApiRequest from "../../API/ApiRequest";

let UsersRequest = ApiRequest('users');
let users = new UsersRequest;

let newUser = {
    id: '',
    name: '',
    email: '',
    role: 'client',
    password: ''
};

export default {
    name: "Index",
    components: {Forms},
    currentUser: {},
    data() {
        return {
            order: 'name',
            operationOk : false,
            operationError : false,
            search: '',
            loading: true,
            editUser: {...newUser},
            textOperation: '',
            deleteUser: {},
            users: [],
            userFields: [
                'id', 'name', 'email', 'role', 'edit', 'delete'
            ],
            data: usersTable
        }
    },
    computed: {
        userList() {
            let userList = [];
            if (this.users.length === 0) {
                return userList;
            }
            if (this.search) {
                userList = this.users.filter(
                    item =>
                        item.name.toLowerCase().includes(this.search.toLowerCase()) ||
                        item.email.toLowerCase().includes(this.search.toLowerCase())
                );
            } else {
                userList = this.users;
            }
            let that = this;
            console.log(userList, userList.sort);
            userList = userList.sort((a, b) => {
                String(a[that.order]).localeCompare(String(b[that.order]))
            })
            return userList;
        }
    },
    methods: {
        newUser() {
            this.editUser = {...newUser};
        },
        userEdit(data) {
            this.editUser = data.item;
        },
        userDelete(data) {
            this.deleteUser = data.item;
        },
        userUpdate() {
            this.clearModalErrors();
            users.update(this.editUser.id,this.editUser).then(response => {
                if(response.data.code == 'ok'){
                    this.textOperation = 'Пользователь обновлен';
                    this.operationOk = true
                }else{
                    this.textOperation = 'Ошибка обновления';
                    this.operationError = true;
                }
                this.$nextTick(() => {
                    this.$bvModal.hide('modal-user');
                });
            }).catch(error => {
                this.generateModalErrors(error.response.data.errors);
            });
        },
        userDeleteApproved() {
            users.delete(this.deleteUser.id).then(response => {
                if(response.data.code == 'ok'){
                    this.textOperation = 'Пользователь удален';
                    this.operationOk = true;
                    var index = this.users.findIndex(n => n.id === this.deleteUser.id);
                    if (index !== -1) {
                        this.users.splice(index, 1);
                    }


                } else{
                    this.textOperation = 'Ошибка удаления пользователя';
                    this.operationError = true;
                    this.operationError = true;
                }

            }).catch(error => {
            });
            this.$nextTick(() => {
                this.$bvModal.hide('modal-user-delete');
            });
        },
        userCreate() {
            this.$bvToast.toast();
            if(this.editUser.id){
                this.userUpdate();
                return;
            }
            this.clearModalErrors();
            users.create(this.editUser).then(response => {
                if(response.data.code == 'ok'){
                    this.textOperation = 'Пользователь добавлен';
                    this.operationOk = true;
                    this.users.push(response.data.user);
                } else{
                    this.textOperation = 'Ошибка добавления пользователя';
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
        users.all()
            .then(resp => {
                this.users = resp.data.users;
                this.loading = false;
            })
    }
}
</script>

<style>
    .errText{
        color:red;
        font-size: 12px;
    }
</style>
