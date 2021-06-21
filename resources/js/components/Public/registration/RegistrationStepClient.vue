<template>
    <div id="wrapper">
        <section class="registration-section billing-section">
            <div class="billing-address-container">
                <div class="main-registration-content">
                    <BillingAddress :data="account.billing" v-model="account.billing" />
                    <ContactInformation :data="account.contact" v-model="account.contact" />
                    <SpokenLanguage :data="account.languages" v-model="account.languages" />

                    <a href="#" class="save" @click.prevent="saveAndContinue">Сохранить и продолжить</a>

                </div>
                <aside class="registration-sidebar">
                    <ChosenPlan :plan="plan" @backToPlans="backToPlans" />
                    <AdvertiseBlock />
                </aside>
            </div>
        </section>
    </div>
</template>

<script>
import RegistrationSteps from "./partials/RegistrationSteps";
import BillingAddress from "./partials/BillingAddress";
import ContactInformation from "./partials/ContactInformation";
import SpokenLanguage from "./partials/SpokenLanguage";
import ChosenPlan from "./partials/ChosenPlan";
import AdvertiseBlock from "./partials/AdvertiseBlock";
export default {
    name: "RegistrationStepClient",
    props: ['account', 'plan'],
    components: {AdvertiseBlock, RegistrationSteps, ChosenPlan, SpokenLanguage, ContactInformation, BillingAddress},
    methods: {
        backToPlans() {
            this.$emit('backToPlans', '');
        },
        saveAndContinue() {
            this.$emit('toPropertyData', '')
        }
    }
}
</script>

<style scoped>

</style>
