<template>
    <section class="header-dashboard">
        <h1>Каталог предоставляемых удобств</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Категория"  label-for="cats">
                            <b-select v-model="cats">
                                <b-select-option value="">Все категории</b-select-option>
                                <b-select-option v-for="(category, i) in catList.concat(categoriesTemp)" href="#" :value="category" :key="'cat-key-'+i">{{ category }}</b-select-option>
                            </b-select>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Создать категорию" label-for="newCat">
                            <b-form-input v-model="newCat" type="text" id="input-phone" placeholder="Название, Enter для подтверждения" @keyup="catInput"></b-form-input>
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
                                        <strong>Loading...</strong>
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
                <b-button type="submit" variant="success" class="mr-2" v-b-modal.modal-feature @click="featureNew">Новое удобство</b-button>
            </div>
        </div>
        <b-modal id="modal-feature" :title="editFeature.id ? 'Feature edit' : 'Feature add'" @ok="featureAddOk">
            <Forms v-model="editFeature" :fields="editFeature" :data="data"></Forms>
        </b-modal>
        <b-modal id="modal-feature-delete" title="Feature delete" @ok="featureDeleteOk">
            <span class="text-danger">A you sure you want to delete feature <strong>{{ deleteFeature.name}}</strong>
                in <strong>{{ deleteFeature.feature_category ? deleteFeature.feature_category.name : ''}}</strong> category?</span>
        </b-modal>
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
        feature_category: {
            id: 0,
            name: ''
        }
    };

    export default {
        name: "Index",
        components: {Forms},

        data() {
            return {
                cats: '',
                loading: true,
                categoriesTemp: [

                ],
                features: [],
                fields: ['id', 'feature_category', 'picture', 'name', 'edit', 'delete'],
                data: featuresForm,
                newCat: '',
                editFeature: '',
                deleteFeature: ''
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
                this.editFeature.category = this.data.category.options.indexOf(this.editFeature.feature_category.name);
            },
            featureDelete(data) {
                this.deleteFeature = { ...data.item }
            },
            featureDeleteOk() {
                let index = this.featureList.findIndex( (elem, index, arr) => elem.id === this.deleteFeature.id);
                this.featureList.splice(index, 1);
            },
            featureAddOk() {
                this.editFeature.feature_category.name = this.editFeature.name;
                this.editFeature.feature_category.id = this.editFeature.category;
                this.features.push(this.editFeature);
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
