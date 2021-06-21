<template>
    <div class="wrapper">
        <section class="registration-section data-section">
            <div class="object-data-container">
                <div class="main-registration-content">
                    <PropertyData />
                    <PropertyFacilities />
                    <PropertyPhotos />
                    <PropertyContacts />

                    <a href="#" class="save">Сохранить и продолжить</a>

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
import PropertyPhotos from "./partials/PropertyPhotos";
import PropertyContacts from "./partials/PropertyContacts";
export default {
    name: "RegistrationStepProperty",
    props: ['plan'],
    components: {
        PropertyContacts,
        PropertyPhotos, PropertyFacilities, PropertyData, AdvertiseBlock, ChosenPlan, RegistrationSteps},
    methods: {
        backToPlans() {
            this.$emit('backToPlans', '');
        }
    }
}
</script>

<style scoped>

</style>
