<template>
    <section class="header-dashboard">
        <h1>Данные в подвале сайта</h1>

        <div class="row mt-4" v-if="loading">
            Загрузка
        </div>
        <div class="row mt-4" v-if="!loading">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Текст для Copyright" label-for="input-phone">
                            <b-form-textarea v-model="options.copyright" type="text" id="input-copyright" placeholder="copyright"></b-form-textarea>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4" v-if="!loading">
            <div class="col-md-12">
                <b-button type="submit" variant="success" class="mr-2" @click.prevent="save">Сохранить</b-button>
                <b-button variant="light">Отмена</b-button>
            </div>
        </div>

        <b-modal id="save-success">Данные успешно сохранены</b-modal>
    </section>
</template>

<script>
    import ApiRequest from '../../../API/ApiRequest';
    let OptionsRequest = ApiRequest('options')
    let options = new OptionsRequest;
    export default {
        name: "Index",
        data() {
            return {
                options: {
                    copyright: ''
                },
                loading: true
            }
        },
        mounted() {
            options.get('copyright')
                .then(resp => {
                    this.options = resp.data;
                    this.loading = false;
                });
        },
        methods: {
            save() {
                options.update('copyright', this.options.copyright)
                    .then( () => {
                        this.$bvModal.show('save-success');
                    })
            }
        }
    }
</script>

<style scoped>

</style>
