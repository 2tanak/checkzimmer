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
                            <b-form-input class="form-control" type="text" v-model="options.seo_title" />
                        </b-form-group>
                        <b-form-group :label="$t('Homepage SEO Description')" label-for="input-seo-title">
                            <b-form-input class="form-control" type="text" v-model="options.seo_description" />
                        </b-form-group>
                        <b-form-group :label="$t('Homepage tagline')" label-for="input-seo-title">
                            <b-form-input class="form-control" type="text" v-model="options.tagline" />
                        </b-form-group>
                        <b-form-group :label="$t('Maintenance mode')" label-for="input-maintenance">
                            <label class="mt-2">
                                <input type="checkbox" v-model="options.maintenance" id="input-maintenance">
                                {{ $t('Maintenance mode enabled') }}
                            </label>
                        </b-form-group>
                        <b-form-group :label="$t('Number Phone')">
                            <b-form-input v-model="options.number_phone" />
                        </b-form-group>
                        <b-form-group :label="$t('Picture')">
                            <b-form-file v-model="options.picture" :placeholder="$t('Choose a picture or drop it here...')"/>
                        </b-form-group>
                        <b-form-group :label="$t('Label in the input form search')">
                            <b-form-input v-model="options.label_input" />
                        </b-form-group>
                        <b-form-group :label="$t('Placeholder in the input form search')">
                            <b-form-input v-model="options.placeholder" />
                        </b-form-group>
                        <b-form-group :label="$t('Label in the select distance')">
                            <b-form-input v-model="options.label_distance" />
                        </b-form-group>
                        <b-form-group :label="$t('Label in the select num people')">
                            <b-form-input v-model="options.label_people" />
                        </b-form-group>
                        <b-form-group :label="$t('Text in the button form search')">
                            <b-form-input v-model="options.text_button" />
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
                seo_title: '',
                seo_description: '',
                tagline: ''
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
