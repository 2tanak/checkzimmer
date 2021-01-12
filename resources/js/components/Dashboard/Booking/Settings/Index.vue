<template>
    <section class="header-dashboard">
        <h1>{{ $t('Integration settings') }} {{ $t('Booking') }}.{{ $t('Com') }}</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Логин') + '  ' + $t('Booking') + '.' + $t('com')"  label-for="input-login">
                            <b-form-input type="text" id="input-login" v-model="options.booking_login" :placeholder="$t('Enter your username') + '  ' + $t('Booking') + '.' + $t('com')"></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Password')"  label-for="input-password">
                            <b-form-input type="password" id="input-password" v-model="options.booking_password" :placeholder="$t('Password') + '  ' + $t('for') + '  ' + $t('Booking') + '.' + $t('com')"></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('API URL')"  label-for="input-booking_url">
                            <b-form-textarea type="text" id="input-booking_url" :placeholder="$t('Text')"
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
                <b-button variant="info" class="float-right" @click.prevent="connectionTest">{{ $t('Test') }}</b-button>
                <b-button type="submit" variant="success" class="mr-2" @click.prevent="save">{{ $t('Save')}}</b-button>
                <b-button variant="light">{{ $t('Cancel') }}</b-button>
            </div>
        </div>
        <b-modal id="save-success" :title="$t('Saving settings')"><strong>{{ $t('Data saved successfully') }}</strong></b-modal>
        <b-modal id="connect-success" :title="$t('Checking connection')"><strong>{{ $t('Connection successful') }}</strong></b-modal>
        <b-modal id="connect-fail" :title="$t('Checking connection')"><strong>{{ $t('Connection failed, check credentials') }}</strong></b-modal>
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
                axios.post( 'booking-test', this.options)
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

