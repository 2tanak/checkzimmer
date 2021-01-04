<template>

    <section class="header-dashboard">
        <h1>Выбор языка</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <b-form-group label="Выбор языка" style="margin-bottom:0;">
                                    <b-select v-model="selected" :options="options"></b-select>
                                </b-form-group>
                            </div>
                            <div class="col-md-12 grid-margin">
                                <b-form-input v-model="searchLanguage" placeholder="Search"></b-form-input>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Добавить язык" style="margin-bottom:0;">
                            <div class="row">
                                <div class="col-md-6 grid-margin">
                                    <b-form-input v-model="languageName" placeholder="Language name"></b-form-input>
                                </div>
                                <div class="col-md-6 grid-margin">
                                    <b-form-input v-model="languageCode" placeholder="Language code"></b-form-input>
                                </div>
                                <div class="col-md-6 grid-margin">
                                    <b-form-input v-model="locale" placeholder="Locale"></b-form-input>
                                </div>
                                <div class="col-md-6 grid-margin">
                                    <b-button variant="success" style="width:100%;">Create</b-button>
                                </div>
                            </div>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <b-form-group>
                            <b-table striped hover responsive :fields="fields" :items="items">
                                <template v-slot:cell(id)="data">
                                    {{ data.item.id }}
                                </template>
                                <template v-slot:cell(original)="data">
                                    {{ data.item.original }}
                                </template>
                                <template v-slot:cell(translation)="data">
                                    <b-form-input v-model="tableInput" placeholder="Translation"></b-form-input>
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
export default {
    name: "Index",
    data() {
        return {
            selected: 'a',
            options: [
                {value: 'a', text: 'Язык 1'},
                {value: 'b', text: 'Язык 2'},
                {value: 'c', text: 'Язык 3'}
            ],
            fields: ['id', 'original', 'translation'],
            items: [
                { id: 1, original: 'test' },
                { id: 2, original: 'test 2' },
                { id: 3, original: 'test 3' }
            ],
            languageName: '',
            languageCode: '',
            locale: '',
            searchLanguage: '',
            tableInput: ''
        }
    }
}
</script>

<style scoped>

</style>
