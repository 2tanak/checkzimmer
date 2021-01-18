<template>
    <section>
        <router-link :to="{name: 'website-domains'}">{{ $t('All Domains') }}</router-link>
        <h1>{{ $t('Edit domain')}} {{domain.subdomain }}</h1>
        <Forms v-model="domain" :fields="domain" :data="domainFields" />
        <hr>
        <b-form-group :label="$t('Home page SEO title')">
            <b-form-input v-model="domain.options.seo_title" />
        </b-form-group>
        <b-form-group :label="$t('Home page SEO description')">
            <b-form-input v-model="domain.options.seo_description" />
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
                seo_title: '',
                seo_description: ''
            },
            domainFields: domainsForm,
        }
    },
    mounted() {
        subdomains.get(this.$route.params.domain)
            .then(resp => {
                this.domain = resp.data;
            })
    },
    methods: {
        save() {
            subdomains.update(this.$route.params.domain, this.domain)
                .then(resp => {
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
