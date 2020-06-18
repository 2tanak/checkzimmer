<template>
    <section class="header-dashboard">
        <h1>Каталог предоставляемых удобств</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Категория"  label-for="input-phone">
                            <b-dropdown>
                                <template v-slot:button-content>
                                    Select category
                                </template>
                                <b-dropdown-item v-for="category in categories" href="#" :value="category.id">{{ category.name }}</b-dropdown-item>
                            </b-dropdown>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Создать категорию" label-for="input-phone">
                            <b-form-input type="text" id="input-phone" placeholder="Название, Enter для подтверждения" ></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Текст под заголовком"  label-for="input-phone">
                            <b-table striped hover :busy="loading" :items="features" :fields="fields">
                                <template v-slot:cell(feature_category)="data">
                                    {{ data.item.feature_category.name }}
                                </template>
                                <template v-slot:cell(picture)="data">
                                    <img :src="data.item.picture">
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
                <b-button type="submit" variant="success" class="mr-2" v-b-modal.modal-feature >Новое удобство</b-button>
                <b-button variant="light">Отмена</b-button>
            </div>
        </div>
        <b-modal id="modal-feature" title="Feature add/edit">
            <Forms v-model="features[0]" :fields="features[0]" :data="data"></Forms>
        </b-modal>
    </section>
</template>

<script>
    import Forms from "../../../Forms/Index";

    import ApiRequest from "../../../API/ApiRequest";

    import featuresForm from "../../../Data/featuresForm";

    let FeaturesRequest = ApiRequest('features');
    let features = new FeaturesRequest;
    export default {
        name: "Index",
        components: {Forms},

        data() {
            return {
                loading: true,
                categories: [
                    {
                        id: 5,
                        picture: '+',
                        name: 'Кухня'
                    },
                    {
                        id: 6,
                        picture: '+',
                        name: 'Ванная'
                    },
                ],
                features: [
                    {
                        id: 39,
                        feature_category_id: 5,
                        picture: '+',
                        name: 'Eigene kuche',
                    },
                    {
                        id: 40,
                        feature_category_id: 5,
                        picture: '-',
                        name: 'Gemeinschaftskuche',
                    },
                    {
                        id: 41,
                        feature_category_id: 6,
                        picture: '*',
                        name: 'Sauna'
                    }
                ],
                fields: ['id', 'feature_category', 'picture', 'name', 'edit', 'delete'],
                data: featuresForm
            }
        },
        mounted() {
            features.all()
                .then(resp => {
                    this.features = resp.data;
                    this.loading = false;
                })
        },
        methods: {
            parentCat(item) {
                for(let i in this.features) {
                    if (item.feature_category_id == this.features[i].id) {
                        return this.features[i];
                    }
                }
                return {};
            }
        }
    }
</script>

<style scoped>

</style>
