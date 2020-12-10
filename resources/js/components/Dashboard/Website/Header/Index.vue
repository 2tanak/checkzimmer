<template>
    <section class="header-dashboard">
        <h1>Данные в заголовке сайта</h1>
        <div class="row mt-4">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Номер телефона"  label-for="input-phone">
                            <b-form-input type="text" id="input-phone" v-model="options.website_phone" placeholder="Номер телефона"></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Заголовок объявления"  label-for="input-motto-header">
                            <b-form-input type="text" id="input-motto-header" v-model="options.motto_header" placeholder="Текст"></b-form-input>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Текст под заголовком"  label-for="input-motto-subtitle">
                            <b-form-textarea type="text" id="input-motto-subtitle" placeholder="Текст"
                                             v-model="options.motto_subtitle"
                                             rows="3"
                                             max-rows="6"></b-form-textarea>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b-button type="submit" variant="success" class="mr-2" @click="save">Сохранить</b-button>
            </div>
        </div>
        <b-modal id="save-success">Данные успешно сохранены</b-modal>
    </section>
</template>

<script>
    import ApiRequest from '../../../API/ApiRequest';
    let OptionsRequest = ApiRequest('options')
    let options = new OptionsRequest;

    let optionsDefault = {
        website_phone: '',
        motto_header: '',
        motto_subtitle: ''
    };

    export default {
        name: "Index",
        data() {
            return {
                options: { ...optionsDefault },
                loading: true
            }
        },
        mounted() {
            options.get('bytype/system')
                .then(resp => {
                    for (let key in optionsDefault) {
                        this.options[key] = resp.data[key] || ''
                    }

                    this.loading = false;
                });
        },
        methods: {
            save() {
                options.update('system', this.options)
                    .then( () => {
                        this.$bvModal.show('save-success');
                    })
            }
        }
    }
</script>

<style scoped>

</style>
