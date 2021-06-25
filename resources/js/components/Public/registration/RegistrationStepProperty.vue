<template>
    <div class="wrapper">
        <section class="registration-section data-section">
            <div class="object-data-container">
                <div class="main-registration-content">
                    <PropertyData :property="account.property" v-model="account.property" />
                    <PropertyFacilities v-model="account.property.facilities" :facilities="account.property.facilities" />
                    <PropertyMedia v-model="account.property.media" :media="account.property.media" />
                    <PropertyContacts v-model="account.property.contact" :contact="account.property.contact" :billing="account.billing.person"/>

                    <a href="#" class="save" @click.prevent="toSummary">Сохранить и продолжить</a>

                </div>
                <aside class="registration-sidebar">
                    <ChosenPlan :plan="plan" @backToPlans="backToPlans"/>
                    <AdvertiseBlock />
                </aside>
            </div>
        </section>
    </div>
</template>

<script>
import RegistrationSteps from "./partials/RegistrationSteps";
import ChosenPlan from "./partials/ChosenPlan";
import AdvertiseBlock from "./partials/AdvertiseBlock";
import PropertyData from "./partials/PropertyData";
import PropertyFacilities from "./partials/PropertyFacilities";
import PropertyMedia from "./partials/PropertyMedia";
import PropertyContacts from "./partials/PropertyContacts";
export default {
    name: "RegistrationStepProperty",
    props: ['plan', 'account'],
    mounted() {
    },
    components: {
        PropertyContacts,
        PropertyMedia, PropertyFacilities, PropertyData, AdvertiseBlock, ChosenPlan, RegistrationSteps},
    methods: {
        backToPlans() {
            this.$emit('backToPlans', '');
        },
        toSummary() {
            this.$emit('toSummaryData', '');
        }
    }
}
</script>

<style scoped>

</style>
