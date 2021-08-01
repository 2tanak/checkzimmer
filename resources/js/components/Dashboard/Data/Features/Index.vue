<template>
    <section class="header-dashboard">
        <div style="display:flex;align-items:center;justify-content:space-between;">
            <h1>{{ $t('Catalog of provided amenities') }}</h1>
            <b-button style="margin-right:0 !important;" type="submit" variant="success" class="mr-2" v-b-modal.modal-feature @click="featureNew">
                {{ $t('New convenience') }}
            </b-button>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Category')"  label-for="cats">
                            <b-select v-model="cats">
                                <b-select-option value="">{{ $t('All categories') }}</b-select-option>
                                <b-select-option v-for="(category, i) in catList.concat(categoriesTemp)" href="#" :value="category" :key="'cat-key-'+i">{{ category }}</b-select-option>
                            </b-select>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Create category')" label-for="newCat">
                            <b-form-input v-model="newCat" type="text" id="input-phone" :placeholder="$t('Name, Enter to confirm')" @keyup="catInput"></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group>
                            <b-table striped hover responsive :busy="loading" :items="featureList" :fields="fields">
                                <template v-slot:cell(feature_category)="data">
                                    {{ data.item.feature_category.name }}
                                </template>
                                <template v-slot:cell(picture)="data">
                                    <img :src="data.item.picture">
                                </template>
                                <template v-slot:cell(edit)="data">
                                    <a style="text-decoration:none;" href="" v-b-modal.modal-feature @click.prevent="featureEdit(data)"><span style="font-size:18px;">&#9998;</span></a>
                                </template>
                                <template v-slot:cell(delete)="data">
                                    <a style="text-decoration:none;" href="" v-b-modal.modal-feature-delete @click.prevent="featureDelete(data)"><span style="font-size:22px;">&times;</span></a>
                                </template>
                                <template v-slot:table-busy>
                                    <div class="text-center text-danger my-2">
                                        <b-spinner class="align-middle"></b-spinner>
                                        <strong>{{ $t('Loading') }}...</strong>
                                    </div>
                                </template>
                            </b-table>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b-button type="submit" variant="success" class="mr-2" v-b-modal.modal-feature @click="featureNew">
                    {{ $t('New convenience') }}</b-button>
            </div>
        </div>
        <b-modal id="modal-feature" :title="editFeature.id ? $t('Feature edit') : $t('Feature add')" @ok="featureAddOk">
            <Forms v-model="editFeature" :fields="editFeature" :data="data"></Forms>
        </b-modal>
        <b-modal id="modal-feature-delete" :title="$t('Feature delete')" @ok="featureDeleteOk">
            <span class="text-danger">{{ $t('A you sure you want to delete feature') }} <strong>{{ deleteFeature.name}}</strong>
                {{ $t('in') }} <strong>{{ deleteFeature.feature_category ? deleteFeature.feature_category.name : ''}}</strong> {{ $t('category') }}?</span>
        </b-modal>

        <div class="row mt-5">
            <div class="col-md-12">

                <b-alert dismissible v-model="operationOk" variant="success">
                    {{ textOperation}}
                </b-alert>
                <b-alert dismissible v-model="operationError" variant="danger">
                    {{ textOperation}}
               </b-alert>
            </div>
        </div>
    </section>
</template>

<script>
    import Forms from "../../../Forms/Index";

    import ApiRequest from "../../../API/ApiRequest";

    import featuresForm from "../../../Data/featuresForm";

    let FeaturesRequest = ApiRequest('features');
    let features = new FeaturesRequest;

    let newFeature = {
        id: 0,
        name: '',
        picture: '',
        listShow: false,
        order: 0,
        feature_category: {}
    };

    export default {
        name: "Index",
        components: {Forms},

        data() {
            return {
                cats: '',
                loading: true,
                categoriesTemp: [],
                features: [],
                fields: [
                    {
                        key: 'id',
                        label: this.$t('id')
                    },
                    {
                        key: 'feature_category',
                        label: this.$t('feature_category')
                    },
                    {
                        key: 'picture',
                        label: this.$t('picture')
                    },
                    {
                        key: 'name',
                        label: this.$t('name')
                    },
                    {
                        key: 'edit',
                        label: this.$t('edit')
                    },
                    {
                        key: 'delete',
                        label: this.$t('delete')
                    }
                ],
                data: featuresForm,
                operationOk : false,
                operationError : false,
                textOperation: '',
                newCat: '',
                editFeature: '',
                deleteFeature: '',
            }
        },
        created() {
            features.all()
                .then(resp => {
                    this.features = resp.data;
                    this.loading = false;
                })
        },
        methods: {
            parentCat(item) {
                for(let i in this.features) {
                    if (item.feature_category_id === this.features[i].id) {
                        return this.features[i];
                    }
                }
                return {};
            },

            getCategories() {
                let cats = [];

                this.features.forEach( item => {
                    if (item.feature_category && cats.indexOf( item.feature_category.name ) === -1 ) {
                        cats.push(item.feature_category.name);
                    }
                });
                return cats;
            },

            catInput(e) {
                if (e.key === 'Enter') {
                    this.categoriesTemp.push( this.newCat );
                    this.cats = this.newCat;
                    this.newCat = '';
                }
            },

            featureNew() {
                this.editFeature = { ...newFeature };
                this.editFeature.feature_category.name = this.cats;
                this.data.category.options = this.getCategories().concat(this.categoriesTemp);
                this.editFeature.category = this.data.category.options.indexOf(this.editFeature.feature_category.name);
            },

            featureEdit(data) {
                this.editFeature = { ...data.item };
                this.data.category.options = this.getCategories().concat(this.categoriesTemp);
                this.editFeature.category = this.data.category.options.findIndex(item => item === this.editFeature.feature_category.name);
                this.editFeature.inlist = this.editFeature.options.find( index => index.key === 'inlist');
                this.editFeature.inlist = this.editFeature.inlist.value && this.editFeature.inlist.value !== '0';
            },

            featureDelete(data) {
                this.deleteFeature = { ...data.item }
            },

            featureDeleteOk() {
                features.delete(this.deleteFeature.id)
                    .then(response => {
                        if(response.data.code == 'ok') {
                            this.textOperation = this.$t('Delete OK');
                            this.operationOk = true;
                            let index = this.features.findIndex( (elem, index, arr) => elem.id === this.deleteFeature.id);
                            this.features.splice(index, 1);
                        } else {
                            this.textOperation = this.$t('Delete error');
                            this.operationError = true;
                        }
                });
            },

            featureAddOk() {
                let cat = 0;

                this.editFeature.feature_category.id = this.editFeature.category;

                if (this.editFeature.picture.data !== undefined) {
                    this.editFeature.feature_category.picture = this.editFeature.picture.data.image;
                } else {
                    this.editFeature.feature_category.picture = this.editFeature.picture;
                }

                cat = this.data.category.options[this.editFeature.category];
                cat = this.features.find( item => {
                    return item.feature_category && item.feature_category.name === cat }
                    );
                this.editFeature.feature_category.id = cat.feature_category_id;
                this.editFeature.feature_category.name = cat.feature_category.name;

                let index = this.features.findIndex( item => item.id === this.editFeature.id );
                if (index !== -1) {
                    this.features[index].feature_category = { ...cat.feature_category }
                    this.features[index].feature_category_id = cat.feature_category.id;
                    this.features[index].name = this.editFeature.name;
                }

                let data = {
                    'name' : this.editFeature.name,
                    'category' : this.editFeature.feature_category.id,
                    'image' : this.editFeature.feature_category.picture,
                    'ord': this.editFeature.ord,
                    'inlist': this.editFeature.inlist
                };

                features.update(this.editFeature.id, data)
                    .then(response => {
                        if(response.data.code === 'ok') {
                            this.textOperation = this.$t('Feature added');
                            this.operationOk = true;
                            this.features.push(response.data.feature);
                        } else {
                            this.textOperation = this.$t('Feature adding error');
                            this.operationError = true;
                        }
                });
            }
        },
        computed: {
            catList() {
                return this.getCategories();
            },
            featureList() {
                let featList = [];
                if (this.cats) {
                    featList = this.features.filter( item => item.feature_category && item.feature_category.name === this.cats);
                } else {
                    featList = this.features;
                }
                return featList;
            }
        }
    }
</script>

<style scoped>

</style>
