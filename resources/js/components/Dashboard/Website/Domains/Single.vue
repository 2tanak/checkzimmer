<template>
    <section>
        <router-link :to="{name: 'website-domains'}" class="all-domains">{{ $t('All Domains') }}</router-link>
        <h1>{{ $t('Edit domain')}} {{domain.subdomain }}</h1>
        <Forms v-model="domain" :fields="domain" :data="domainFields" />
        <hr>
        <b-form-group :label="$t('Home page SEO title')">
            <b-form-input v-model="domain.options.seo_title" />
        </b-form-group>
        <b-form-group :label="$t('Home page SEO description')">
            <b-form-input v-model="domain.options.seo_description" />
        </b-form-group>
        <b-form-group :label="$t('Home page tagline')">
            <b-form-input v-model="domain.options.tagline" />
        </b-form-group>
        <b-form-group :label="$t('Number Phone')">
            <b-form-input v-model="domain.options.number_phone" />
        </b-form-group>
        <b-form-group :label="$t('Picture')">
            <b-form-file v-model="domain.options.picture" :placeholder="$t('Choose a picture or drop it here...')"/>
        </b-form-group>
        <b-form-group :label="$t('Label in the input form search')">
            <b-form-input v-model="domain.options.label_input" />
        </b-form-group>
        <b-form-group :label="$t('Placeholder in the input form search')">
            <b-form-input v-model="domain.options.placeholder" />
        </b-form-group>
        <b-form-group :label="$t('Label in the select distance')">
            <b-form-input v-model="domain.options.label_distance" />
        </b-form-group>
        <b-form-group :label="$t('Label in the select num people')">
            <b-form-input v-model="domain.options.label_people" />
        </b-form-group>
        <b-form-group :label="$t('Text in the button form search')">
            <b-form-input v-model="domain.options.text_button" />
        </b-form-group>
        <b-button variant="success" @click.prevent="save">{{ $t('Save') }}</b-button>
    </section>
</template>

<script>
import ApiRequest from '../../../API/ApiRequest';
import Forms from '../../../Forms/Index';

import domainsForm from "../../../Data/subdomainForm";

let SubdomainRequest = ApiRequest('domains')
let subdomains = new SubdomainRequest;

export default {
    name: "Single",
    components: {Forms},
    data() {
        return {
            domain: {
                subdomain: '',
                city: '',
                active: true,
                options: {
                    seo_title: '',
                    seo_description: '',
                    tagline: '',
                    number_phone: '',
                    placeholder: '',
                    text_button: '',
                    label_input: '',
                    label_distance: '',
                    label_people: ''
                }
            },
            domainFields: domainsForm,
        }
    },
    mounted() {
        subdomains.get(this.$route.params.domain)
            .then(resp => {
                delete resp.data.geo;
                this.domain.subdomain = resp.data.subdomain;
                this.domain.city = resp.data.city;
                this.domain.options.seo_title = resp.data.options.seo_title;
                this.domain.options.seo_description = resp.data.options.seo_description;
                this.domain.options.tagline = resp.data.options.tagline;
                this.domain.options.number_phone = resp.data.options.number_phone;
                this.domain.options.placeholder = resp.data.options.placeholder;
                this.domain.options.text_button = resp.data.options.text_button;
                this.domain.options.label_distance = resp.data.options.label_distance;
                this.domain.options.label_people = resp.data.options.label_people;
                this.domain.options.label_input = resp.data.options.label_input;
            })
    },
    methods: {
        save() {
            console.log(this.domain);
            subdomains.update(this.$route.params.domain, this.domain)
                .then(resp => {
                    console.log('***');
                    console.log(this.domain);
                    if (this.domain.subdomain !== this.$route.params.domain) {
                        this.$router.push( {name: 'website-domains-single', params: {domain: this.domain.subdomain}} )
                    }
                });
        }
    }
}
</script>

<style scoped>

</style>
