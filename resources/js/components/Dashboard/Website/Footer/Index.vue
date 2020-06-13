<template>
    <section class="header-dashboard">
        <h1>Данные в заголовке сайта</h1>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="row flex-grow">
                    <div class="card">
                        <div class="card-body">
                            <b-form-group label="Текст для Copyright"  label-for="input-phone">
                                <b-form-textarea type="text" id="input-phone" placeholder="Текст"></b-form-textarea>
                            </b-form-group>
                            <b-button type="submit" variant="success" class="mr-2">Сохранить</b-button>
                            <b-button variant="light">Отмена</b-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Index"
    }
</script>

<style scoped>

</style>
