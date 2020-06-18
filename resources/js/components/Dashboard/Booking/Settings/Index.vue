<template>
    <section class="header-dashboard">
        <h1>Настройки интеграции Booking.Com</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Логин Booking.Com"  label-for="input-login">
                            <b-form-input type="text" id="input-login" v-model="options.booking_login" placeholder="Укажите свой логин Booking.Com"></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Пароль"  label-for="input-password">
                            <b-form-input type="password" id="input-password" v-model="options.booking_password" placeholder="Пароль для Booking.Com"></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="URL-адрес API"  label-for="input-booking_url">
                            <b-form-textarea type="text" id="input-booking_url" placeholder="Текст"
                                             v-model="options.booking_url"
                                             rows="3"
                                             max-rows="6"></b-form-textarea>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b-button variant="info" class="float-right" @click.prevent="connectionTest">Протестировать</b-button>
                <b-button type="submit" variant="success" class="mr-2" @click.prevent="save">Сохранить</b-button>
                <b-button variant="light">Отмена</b-button>
            </div>
        </div>
        <b-modal id="save-success" title="Сохранение настроек">Данные успешно сохранены</b-modal>
        <b-modal id="connect-success" title="Проверка подключения">Подключение успешно</b-modal>
        <b-modal id="connect-fail" title="Проверка подключения">Подключение не удалось, проверьте учётные данные</b-modal>
    </section>
</template>

<script>
    import ApiRequest from '../../../API/ApiRequest';
    let OptionsRequest = ApiRequest('options');
    let options = new OptionsRequest;

    export default {
        name: "Index",
        data() {
            return {
                options: {
                    booking_login: '',
                    booking_password: '',
                    booking_url: ''
                },
                loading: true
            }
        },
        mounted() {
            options.get('bytype/system')
                .then(resp => {
                    if (Object.keys(resp.data).length !== 0) {
                        this.options = resp.data;
                    }
                    this.loading = false;
                });
        },
        methods: {
            save() {
                options.update('system', this.options)
                    .then( () => {
                        this.$bvModal.show('save-success');
                    })
            },
            connectionTest() {
                axios.post( '/api/booking-test', this.options)
                    .then( resp => {
                        this.$bvModal.show('connect-success');
                    })
                    .catch(resp => {
                        this.$bvModal.show('connect-fail');
                    });
            }
        }
    }
</script>

<style scoped>

</style>

