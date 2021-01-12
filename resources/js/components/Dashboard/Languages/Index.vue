<template>

    <section class="header-dashboard">
        <h1>{{ $t('Language selection')}}</h1>
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
            <!--<div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Add language')" style="margin-bottom:0;">
                            <div class="row">
                                <div class="col-md-6 grid-margin">
                                    <b-form-input v-model="languageName" :placeholder="$t('Language name')"></b-form-input>
                                </div>
                                <div class="col-md-6 grid-margin">
                                    <b-form-input v-model="languageCode" :placeholder="$t('Language code')"></b-form-input>
                                </div>
                                <div class="col-md-6 grid-margin">
                                    <b-form-input v-model="locale" :placeholder="$t('Locale')"></b-form-input>
                                </div>
                                <div class="col-md-6 grid-margin">
                                    <b-button variant="success" style="width:100%;">{{ $t('Create') }}</b-button>
                                </div>
                            </div>
                        </b-form-group>
                    </div>
                </div>
            </div>-->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body strings-table">
                        <b-form-group>
                            <b-table striped hover responsive :fields="fields" :items="stringList" :busy="loading">
                                <template v-slot:cell(id)="data">
                                    {{ data.item.id }}
                                </template>
                                <template v-slot:cell(original)="data">
                                    {{ data.item.original }}
                                </template>
                                <template v-slot:cell(translation)="data">
                                    <b-form-input v-model="strings[data.item.original]"
                                                  :placeholder="data.item.translation"
                                                  style="width: 200px"
                                                  @input="dataInput"
                                    />
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
import ApiRequest from "../../API/ApiRequest";

let LanguageRequest = ApiRequest('languages');
let languages = new LanguageRequest;

export default {
    name: "Index",
    data() {
        return {
            languages: [],
            language_active: 0,
            strings: [],
            search: '',
            timer: null,
            loading: true,
            fields: [this.$t('id'), this.$t('Original'), this.$t('Translation')],
        }
    },
    mounted() {
        languages.all()
            .then(resp => {
                this.languages = resp.data;
                this.language_active = this.languages[0].split('.')[0];
                this.langChanged();
            })
    },
    methods: {
        searchLine() {},
        dataInput() {
            if (this.timer) {
                clearTimeout(this.timer);
            }
            this.timer = setTimeout( () => {
                languages.update(this.language_active, { data: this.strings });
            }, 2000)
        },
        langChanged() {
            this.loading = true;
            languages.get(this.language_active)
                .then( respLang => {
                    this.strings = respLang.data;
                    this.loading = false;
                })
        }
    },
    computed: {
        langList() {
            return this.languages.map( item => item.split('.')[0] );
        },
        stringList() {
            let res = [];
            let i = 0;
            for (let key in this.strings) {
                res.push({id: i+1, original: key, translation: this.strings[key]})
                i++;
            }
            let lowerSearch = this.search.toLowerCase();
            return res.filter(
                item =>
                    item.original.toLowerCase().includes(lowerSearch) ||
                    item.translation.toLowerCase().includes(lowerSearch));
        }
    }
}
</script>

<style scoped>
</style>
