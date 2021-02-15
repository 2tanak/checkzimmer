<template>
    <section class="header-dashboard">
        <div style="display:flex;align-items:center;justify-content:space-between;">
            <h1>{{ $t('Domains') }}</h1>
            <b-button style="margin-right:0 !important;" v-b-modal.modal-object-create type="button" variant="success" class="mr-2">
                {{ $t('New subdomain') }}
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
                                    <b-th>{{ $t('Domain') }}</b-th>
                                    <b-th>{{ $t('Status') }}</b-th>
                                    <b-th>{{ $t('City') }}</b-th>
                                    <b-th>{{ $t('Link') }}</b-th>
                                    <b-th>{{ $t('Delete') }}</b-th>
                                </b-thead>
                                <tbody>
                                    <b-tr v-for="domain in domains" :key="domain.subdomain">
                                        <td>
                                            {{ domain.id }}
                                        </td>
                                        <td>
                                            <router-link
                                                :to="{ name: 'website-domains-single', params: { domain: domain.subdomain } }">
                                                {{ domain.subdomain }}
                                            </router-link>
                                        </td>
                                        <td>
                                            <b-badge :variant="badge(domain)">{{ badgeStr(domain) }}</b-badge>
                                        </td>
                                        <td>
                                            {{ domain.city }}
                                        </td>
                                        <td>
                                            <a :href="'http://' + domain.subdomain + '.check-zimmer.de'" target="_blank">
                                                {{ domain.subdomain }}.check-zimmer.de
                                            </a>
                                        </td>
                                        <td >
                                            <a href="" v-b-modal.modal-object-delete @click.prevent="deleteDomain(domain)">&times;</a>
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
                    {{ $t('New subdomain') }}
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
            <span class="text-danger">{{ $t('A you sure you want to delete domain') }}?</span>
            <span>{{ $t('This action can not be undone') }}</span>
        </b-modal>

        <b-modal id="modal-object-create" :title="$t('New domain')" @ok.prevent="newDomainApply">
            <Forms v-model="newDomain" :fields="newDomain" :data="domainFields" />
        </b-modal>

    </section>
</template>

<script>
import ApiRequest from '../../../API/ApiRequest';
import Forms from '../../../Forms/Index';

import domainsForm from "../../../Data/subdomainForm";

let SubdomainRequest = ApiRequest('domains')
let subdomains = new SubdomainRequest;

export default {
    name: "Index",
    components: { Forms },
    data() {
        return {
            domains: [],
            newDomain: {
                subdomain: '',
                city: '',
                active: true
            },
            domainFields: domainsForm,
            operationOk: '',
            operationError: '',
            domainDelete: {},
        }
    },
    mounted() {
        subdomains.all()
            .then(resp => {
                this.domains = resp.data;
            })
    },
    methods: {
        deleteDomain(domain) {
            this.domainDelete = domain;
        },
        newDomainApply() {
            subdomains.create(this.newDomain).then(response => {
                if(response.data.code === 'ok'){
                    this.textOperation = this.$t('Added');
                    this.operationOk = true;
                    this.domains.push(response.data.domain);
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
        deleteOk(domain) {
            subdomains.delete(this.domainDelete.id)
                .then(resp => {
                    let toDeleteIndex = this.domains.findIndex( item => item.id === this.domainDelete.id );
                    this.domains.splice(toDeleteIndex, 1);
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
