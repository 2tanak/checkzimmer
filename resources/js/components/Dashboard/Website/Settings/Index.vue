<template>
    <section class="header-dashboard">
        <h1>{{ $t('Website Settings') }}</h1>

        <div class="row mt-4" v-if="loading">
            {{ $t('Loading') }}
        </div>
        <div class="row mt-4" v-if="!loading">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Homepage SEO Title')" label-for="input-seo-title">
                            <b-form-input class="form-control" type="text" v-model="options.general_seo_title" />
                        </b-form-group>
                        <b-form-group :label="$t('Homepage SEO Description')" label-for="input-seo-title">
                            <b-form-input class="form-control" type="text" v-model="options.general_seo_descr" />
                        </b-form-group>
                        <b-form-group :label="$t('Maintenance mode')" label-for="input-maintenance">
                            <label class="mt-2">
                                <input type="checkbox" v-model="options.maintenance" id="input-maintenance">
                                {{ $t('Maintenance mode enabled') }}
                            </label>
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

let defaults = {
    maintenance: false,
    general_seo_title: '',
    general_seo_descr: '',
}
export default {
    name: "Settings",
    data() {
        return {
            options: {
                maintenance: false,
                general_seo_title: '',
                general_seo_descr: '',
            },
            loading: true
        }
    },
    mounted() {
        options.get('bytype/system')
            .then(resp => {
                for (let key in this.options) {
                    if (!resp.data[key]) {
                        resp.data[key] = defaults[key]
                    }
                }
                this.options = resp.data;
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
