<template>

    <section class="billing-address-section legal-address-section">
        <div class="title">Юридический адрес</div>

        <form class="billing-address-form">

            <div class="forms-line company-line">
                <div class="company-name forms-line-block">
                    <label for="legal-company">{{ $t('Company Name') }}:</label>
                    <input type="text" placeholder="Укажите название вашей компании" id="legal-company" name="name-company" v-model="data.company">
                </div>
            </div>

            <div class="forms-line">
                <div class="name-block forms-line-block">
                    <label for="name-input-legal">Имя:*</label>
                    <input type="text" placeholder="Укажите ваше имя" name="name-input" id="name-input-legal" v-model="data.person.first_name" @input="toContactDetails">
                    <span class="error-text">Вы не указали имя</span>
                </div>
                <div class="surname-block forms-line-block">
                    <label for="surname-input-legal">Фамилия:*</label>
                    <input type="text" placeholder="Укажите вашу фамилию" name="surname-input" id="surname-input-legal" v-model="data.person.last_name" @input="toContactDetails">
                    <span class="error-text">Вы не указали фамилию</span>
                </div>
            </div>

            <div class="forms-line">
                <div class="street-block forms-line-block">
                    <label for="street-input-legal">Улица:*</label>
                    <input type="text" placeholder="Укажите вашу улицу" id="street-input-legal" name="street-input" v-model="data.address.street">
                    <span class="error-text">Вы не указали улицу</span>
                </div>
                <div class="house-number-block forms-line-block">
                    <label for="house-number-input-legal">Номер дома:*</label>
                    <input type="text" placeholder="Номер дома" id="house-number-input-legal" name="house-number-input" v-model="data.address.house">
                    <span class="error-text">Вы не указали дома</span>
                </div>
            </div>

            <div class="forms-line">
                <div class="zip-block forms-line-block">
                    <label for="zip-input-legal">Индекс:*</label>
                    <input type="text" placeholder="Ваш индекс" id="zip-input-legal" name="zip-input" v-model="data.address.postcode">
                    <span class="error-text">Вы не указали индекс</span>
                </div>
                <div class="city-block forms-line-block">
                    <label for="city-input-legal">Город:*</label>
                    <input type="text" placeholder="Укажите ваш город" id="city-input-legal" name="city-input-legal" v-model="data.address.city">
                    <span class="error-text">Вы не указали город</span>
                </div>
                <div class="country-block forms-line-block">
                    <label for="country-select-legal">Страна:*</label>
                    <v-select id="country-select-legal" v-model="data.address.country" :options="optionsCountry"></v-select>
                </div>
            </div>
        </form>

    </section>


</template>

<script>
export default {
    name: "LegalAddress",
    props: ['data'],
    data() {
        return {
            optionsCountry: [ 'Germany', 'Russia', 'USA'  ]
        }
    },
    methods: {
        toContactDetails() {
            this.$emit('setContactAsBilling', '');
        },
    }
}
</script>

<style scoped>

</style>
