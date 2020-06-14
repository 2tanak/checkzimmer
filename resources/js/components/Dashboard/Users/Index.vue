<template>
    <section class="users-dashboard">
        <h1>Пользователи</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Сортировка"  label-for="input-phone">
                            <b-dropdown id="orderby" text="Сортировка по полю" class="m-md-2">
                                <b-dropdown-item>Id</b-dropdown-item>
                                <b-dropdown-item>Name</b-dropdown-item>
                                <b-dropdown-item>E-mail</b-dropdown-item>
                            </b-dropdown>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Поиск"  label-for="input-search">
                            <b-form-input type="text" id="input-search" placeholder="Текст для поиска"></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-table striped hover :busy="loading" :items="users" :fields="userFields">
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
                <b-button type="submit" variant="success" class="mr-2" v-b-modal.modal-user>Новый пользователь</b-button>
                <b-button variant="light">Отмена</b-button>
            </div>
        </div>

        <b-modal id="modal-user" title="User add/edit">
            <Forms v-model="users[0]" :fields="users[0]" :data="data"></Forms>
        </b-modal>
    </section>
</template>

<script>
    import Forms from "../../Forms";
    import usersTable from "../../Data/usersForm"
    import ApiRequest from "../../API/ApiRequest";

    let UsersRequest = ApiRequest('users');
    let users = new UsersRequest;

    export default {
        name: "Index",
        components: {Forms},
        data() {
            return {
                loading: true,
                users: [
                    {
                        id: 39,
                        name: 'Test User',
                        email: 'test@test.com',
                        role: 'User',
                    },
                    {
                        id: 40,
                        name: 'Vasily Terkin',
                        email: 'vacily@terkin.com',
                        role: 'Admin'
                    }, {

                    }
                ],
                userFields: [
                    'id', 'name', 'email', 'role', 'edit', 'delete'
                ],
                data: usersTable
            }
        },
        mounted() {
            users.all()
                .then(resp => {
                    this.users = resp.data;
                    this.loading = false;
                })
        }
    }
</script>

<style scoped>

</style>
