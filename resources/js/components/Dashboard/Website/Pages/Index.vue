<template>
    <section class="header-dashboard">
        <div style="display:flex;align-items:center;justify-content:space-between;">
            <h1>{{ $t('Pages') }}</h1>
            <b-button style="margin-right:0 !important;" v-b-modal.modal-object-create type="button" variant="success" class="mr-2">
                {{ $t('New page') }}
            </b-button>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group>
                            <b-table-simple striped hover responsive>
                                <b-thead>
                                    <b-th>{{ $t('ID') }}</b-th>
                                    <b-th>{{ $t('Title') }}</b-th>
                                    <b-th>{{ $t('Slug') }}</b-th>
                                    <b-th>{{ $t('Link') }}</b-th>
                                    <b-th>{{ $t('Delete') }}</b-th>
                                </b-thead>
                                <tbody>
                                <b-tr v-for="page in pages" :key="page.slug">
                                    <td>
                                        {{ page.id }}
                                    </td>
                                    <td>
                                        <router-link
                                            :to="{ name: 'website-pages-single', params: { page: page.id } }">
                                            {{ page.title }}
                                        </router-link>
                                    </td>
                                    <td>
                                        {{ page.slug }}
                                    </td>
                                    <td>
                                        <a :href="'http://check-zimmer.de/'+page.slug" target="_blank">
                                            {{ page.title }}
                                        </a>
                                    </td>
                                    <td >
                                        <a href="" v-b-modal.modal-object-delete @click.prevent="deletePage(page)">&times;</a>
                                    </td>
                                </b-tr>
                                </tbody>
                            </b-table-simple>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b-button v-b-modal.modal-object-create type="button" variant="success" class="mr-2">
                    {{ $t('New page') }}
                </b-button>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <!--<b-alert dismissible v-model="operationOk" variant="success">
                    {{ 'textOperation' }}
                </b-alert>
                <b-alert dismissible v-model="operationError" variant="danger">
                    {{ 'textOperation' }}
                </b-alert>-->
            </div>
        </div>

        <b-modal id="modal-object-delete" :title="$t('Property delete')" @ok="deleteOk">
            <span class="text-danger">{{ $t('A you sure you want to delete page') }}?</span>
            <span>{{ $t('This action can not be undone') }}</span>
        </b-modal>

        <b-modal id="modal-object-create" :title="$t('New page')" @ok.prevent="newPageApply">
            <Forms v-model="newPage" :fields="newPage" :data="pageFields" />
        </b-modal>

    </section>
</template>

<script>
import ApiRequest from '../../../API/ApiRequest';
import Forms from '../../../Forms/Index';

import pageForm from "../../../Data/pageForm";

let PageRequest = ApiRequest('pages')
let pages = new PageRequest;

export default {
    name: "Index",
    components: { Forms },
    data() {
        return {
            pages: [],
            newPage: {
                title: '',
                slug: '',
                text: ''
            },
            pageFields: pageForm,
            operationOk: '',
            operationError: '',
            pageDelete: {},
        }
    },
    mounted() {
        pages.all()
            .then(resp => {
                this.pages = resp.data;
            })
    },
    methods: {
        deletePage(page) {
            this.pageDelete = page;
        },
        newPageApply() {
            pages.create(this.newPage).then(response => {
                console.log(response);
                if(response.data.id){
                    this.textOperation = this.$t('Added');
                    this.operationOk = true;
                    this.pages.push(response.data);
                } else {
                    this.textOperation = this.$t('Add error');
                    this.operationError = true;
                }
                this.$nextTick(() => {
                    this.$bvModal.hide('modal-object-create');
                });
            }).catch(error => {
                this.generateModalErrors(error.response.data.errors);
            });
        },
        deleteOk(page) {
            pages.delete(this.pagesDelete.id)
                .then(resp => {
                    let toDeleteIndex = this.pages.findIndex( item => item.id === this.pages.id );
                    this.pages.splice(toDeleteIndex, 1);
                });
        },
        badge(item) {
            return item.active ? 'success' : 'danger';
        },
        badgeStr(item) {
            return this.$t(item.active ? 'active' : 'disabled');
        }
    }
}
</script>

<style scoped>

</style>
