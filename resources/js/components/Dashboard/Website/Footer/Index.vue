<template>
    <section class="header-dashboard">
        <h1>{{ $t('Site footer data') }}</h1>

        <div class="row mt-4" v-if="loading">
            {{ $t('Loading') }}
        </div>
        <div class="row mt-4" v-if="!loading">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Text for Copyright')" label-for="input-phone">
                            <b-form-textarea v-model="options.copyright" type="text" id="input-copyright" :placeholder="$t('copyright')"></b-form-textarea>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4" v-if="!loading">
            <div class="col-md-12">
                <b-button type="submit" variant="success" class="mr-2" @click="save">{{ $t('Save') }}</b-button>
            </div>
        </div>
        <b-modal id="save-success">{{ $t('Data saved successfully') }}</b-modal>
    </section>
</template>

<script>
    import ApiRequest from '../../../API/ApiRequest';
    let OptionsRequest = ApiRequest('options')
    let options = new OptionsRequest;
    export default {
        name: "Index",
        data() {
            return {
                options: {
                    copyright: ''
                },
                loading: true
            }
        },
        mounted() {
            options.get('bytype/system')
                .then(resp => {
                    this.options = resp.data;

                    if (this.options.copyrigt === null) {
                        this.options.copyrigt = '';
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
            }
        }
    }
</script>

<style scoped>

</style>
