<template>

    <section class="header-dashboard">
        <h1>{{ $t('Features translate')}}</h1>
        <div class="row mt-4">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <b-form-group :label="$t('Language selection')" style="margin-bottom:0;">
                                    <b-select v-model="language_active" :options="langList" @change="langChanged"></b-select>
                                </b-form-group>
                            </div>
                            <div class="col-md-12 grid-margin">
                                <b-form-input v-model="search" :placeholder="$t('Search')" @input="searchLine"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body strings-table">
                        <b-form-group>
                            <b-table striped hover responsive :fields="fields" :items="featuresLoaded" :busy="loading">
                                <template v-slot:cell(id)="data">
                                    {{ data.item.data.id }}
                                </template>
                                <template v-slot:cell(original)="data">
                                    <img :src="data.item.data.picture" /> {{ data.item.data.name }}
                                </template>
                                <template v-slot:cell(translation)="data">
                                    <b-form-input
                                        v-model="strings[data.item.ind]"
                                        :placeholder="data.item.name"
                                        style="width: 200px"
                                        @input="dataInput(data.item)"   />
                                </template>
                                <template #table-busy>
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
    </section>

</template>

<script>
import ApiRequest from "../../../API/ApiRequest";

let LanguageRequest = ApiRequest('languages');
let languages = new LanguageRequest;
let featureRequest = ApiRequest('features');
let features = new featureRequest;

export default {
    name: "Index",
    data() {
        return {
            languages: [],
            language_active: '',
            features: [],
            strings: [],
            search: '',
            timer: null,
            loading: true,
            fields: [this.$t('id'), this.$t('original'), this.$t('translation')],
        }
    },
    mounted() {
        languages.all()
            .then(resp => {
                this.languages = resp.data;
                this.language_active = this.languages[0].split('.')[0];
                features.all()
                    .then(resp => {
                        this.features = resp.data;
                        this.langChanged();
                    })
                this.loading = false;
            })
    },
    methods: {
        searchLine() {},
        dataInput(item) {
            if (this.timer) {
                clearTimeout(this.timer);
            }

            let feature = this.features[item.ind];
            let la = this.language_active;

            let translation = feature.options.find( itm => itm.key === 'lang-' + la)
            let translationIndex = feature.options.findIndex( itm => itm.key === 'lang-' + la)
            if (translation) {
                this.features[item.ind].options[translationIndex].value = this.strings[item.ind]
                translation.value = this.strings[item.ind]
            } else {
                translation = {
                    id: null,
                    key: 'lang-' + la,
                    parent: item.data.id,
                    type: 'feature',
                    value: this.strings[item.ind]
                };
                this.features[item.ind].options.push(translation)
            }

            this.timer = setTimeout( () => {
                features.request('language', translation, 'post');
            }, 2000)

        },
        langChanged() {
            let la = this.language_active;

            this.strings = [];
            this.features.forEach( item => {
                let opt = item.options.find( itm => itm.key === 'lang-' + la);
                if (opt) {
                    this.strings.push( opt.value )
                } else {
                    this.strings.push( '' )
                }
            });
        }

    },
    computed: {
        langList() {
            return this.languages.map( item => item.split('.')[0] );
        },
        featuresLoaded() {
            let lowerSearch = this.search.toLowerCase();
            if (!this.language_active) {
                return []
            }
            return this.features.map(
                (item, ind) => {
                    return {
                        ind: ind,
                        data: item
                    }
                }
            ).filter(
                item => (this.strings[item.ind] && this.strings[item.ind].toLowerCase().includes(lowerSearch) )||
                    item.data.name.toLowerCase().includes(lowerSearch)
            );
        }
    }
}
</script>

<style scoped>
</style>

