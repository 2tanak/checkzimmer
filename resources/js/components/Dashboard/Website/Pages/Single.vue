<template>
    <section>
        <router-link :to="{name: 'website-pages'}" class="all-domains">{{ $t('All Pages') }}</router-link>
        <h1>{{ $t('Edit page')}} {{page.title }}</h1>
        <Forms v-model="page" :fields="page" :data="pageFields" />
        <hr>
        <!--<b-form-group :label="$t('Home page SEO title')" label-for="input-seo-title">
            <b-form-input v-model="page.options.seo_title" />
        </b-form-group>
        <b-form-group :label="$t('Home page SEO description')" label-for="input-seo-description">
            <b-form-input v-model="domain.options.seo_description" />
        </b-form-group>-->
        <b-button variant="success" @click.prevent="save">{{ $t('Save') }}</b-button>

        <b-modal id="page-save-success">{{ $t('Data saved successfully') }}</b-modal>

    </section>
</template>

<script>
import ApiRequest from '../../../API/ApiRequest';
import Forms from '../../../Forms/Index';

import pagesForm from "../../../Data/pageForm";

let PageRequest = ApiRequest('pages')
let pages = new PageRequest;

export default {
    name: "SinglePage",
    components: {Forms},
    data() {
        return {
            page: {
                title: '',
                slug: '',
                text: ''
            },
            pageFields: pagesForm,
        }
    },
    mounted() {
        pages.get(this.$route.params.page)
            .then(resp => {
                delete resp.data.geo;
                this.page = resp.data;
            })
    },
    methods: {
        save() {
            pages.update(this.$route.params.page, this.page)
                .then(resp => {
                    if (this.page.id !== this.$route.params.page) {
                        this.$router.push( {name: 'website-pages-single', params: {page: this.page.id}} )
                    }
                    this.$bvModal.show('page-save-success');
                });
        }
    }
}
</script>

<style scoped>

</style>
