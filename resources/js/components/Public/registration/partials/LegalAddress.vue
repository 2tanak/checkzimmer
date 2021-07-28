<template>

    <section class="billing-address-section legal-address-section">
        <div class="title">{{ $t('Legal address') }}</div>

        <form class="billing-address-form">

            <div class="forms-line company-line">
                <div class="company-name forms-line-block">
                    <label for="legal-company">{{ $t('Company Name') }}:</label>
                    <input type="text" :placeholder="$t('Please enter your company name')" id="legal-company" name="name-company" v-model="data.company">
                </div>
            </div>

            <div class="forms-line">
                <div class="name-block forms-line-block">
                    <label for="name-input-legal">{{ $t('Name') }}:*</label>
                    <input class="only-text" type="text" :placeholder="$t('Please enter your name')" name="name-input" id="name-input-legal" v-model="data.person.first_name" @input="toContactDetails">
                    <span class="error-text visible"v-if="validate && !data.person.first_name">{{ $t('You did not provide a name') }}</span>
                </div>
                <div class="surname-block forms-line-block">
                    <label for="surname-input-legal">{{ $t('Surname') }}:*</label>
                    <input class="only-text" type="text" :placeholder="$t('Enter your last name')" name="surname-input" id="surname-input-legal" v-model="data.person.last_name" @input="toContactDetails">
                    <span class="error-text visible" v-if="validate && !data.person.last_name">{{ $t('You did not enter your last name') }}</span>
                </div>
            </div>

            <div class="forms-line">
                <div class="street-block forms-line-block">
                    <label for="street-input-legal">{{ $t('Street') }}:*</label>
                    <input type="text" :placeholder="$t('Indicate your street')" id="street-input-legal" name="street-input" v-model="data.address.street">
                    <span class="error-text visible" v-if="validate && !data.address.street">{{ $t('You have not indicated the street') }}</span>
                </div>
                <div class="house-number-block forms-line-block">
                    <label for="house-number-input-legal">{{ $t('House number') }}:*</label>
                    <input type="number" :placeholder="$t('House number')" id="house-number-input-legal" name="house-number-input" v-model="data.address.house">
                    <span class="error-text visible" v-if="validate && !data.address.house">{{ $t('You have not indicated the house number') }}</span>
                </div>
            </div>

            <div class="forms-line" v-if="!data.match_address">
                <div class="zip-block forms-line-block">
                    <label for="zip-input-legal">{{ $t('Postcode (register)') }}:*</label>
                    <input type="number" :placeholder="$t('Postcode (register)')" id="zip-input-legal" name="zip-input" v-model="data.address.postcode">
                    <span class="error-text visible" v-if="validate && !data.address.postcode">{{ $t('You have not provided a postal code') }}</span>
                </div>
                <div class="city-block forms-line-block">
                    <label for="city-input-legal">{{ $t('City') }}:*</label>
                    <input class="only-text" type="text" :placeholder="$t('Enter your city')" id="city-input-legal" name="city-input-legal" v-model="data.address.city">
                    <span class="error-text visible" v-if="validate && !data.address.city">{{ $t('You have not specified a city') }}</span>
                </div>
                <div class="country-block forms-line-block">
                    <label for="country-select-legal">{{ $t('Country') }}:*</label>
                    <v-select id="country-select-legal" v-model="data.address.country" :options="optionsCountry"></v-select>
                </div>
            </div>
        </form>

    </section>


</template>

<script>
export default {
    name: "LegalAddress",
    props: ['data', 'validate'],
    data() {
        return {
            optionsCountry: [ this.$t('Germany'), this.$t('Russia'), this.$t('USA')  ]
        }
    },
    methods: {
        toContactDetails() {
            this.$emit('setContactAsBilling', '');
        },
    },
    mounted() {
        jQuery(document).on('keypress', '.only-text', function (event) {
            var regex = new RegExp("^[a-zA-Z ]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });
    }
}
</script>

<style scoped>

</style>
