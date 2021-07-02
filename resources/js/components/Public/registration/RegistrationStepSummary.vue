<template>
    <section class="registration-section data-checking-section">
        <div class="billing-address-container">
            <div class="main-registration-content">
                <BillingAddressSummary :account="account" @toAccountData="toAccountData" />
                <ContactInformationSummary :account="account" @toAccountData="toAccountData"  />
                <PropertyDataSummary :property="account.property"  @toPropertyData="toPropertyData" />
                <PropertyFacilities :facilities="account.property.facilities" :readonly="true" :filtered="true" />
                <PropertyMediaSummary :media="account.property.media" @toPropertyData="toPropertyData" />
                <div class="familiarization">
                    <div class="checkbox-line legal-address-line">
                        <input type="checkbox" id="got-acquainted">
                        <label for="got-acquainted">{{ $t('I got acquainted with') }} <span>{{ $t('conditions') }}</span>,
                            <span>{{ $t('cancellation policy') }}</span> {{ $t('and the data protection regulations of the provider, and I agree to the execution of my application.') }}</label>
                    </div>
                </div>

                <a href="#" class="save">{{ $t('Confirm with payment obligation') }}</a>

                <div class="duration">
                    * {{ $t('Duration 12 months with automatic machine. Renewal. Notice period 4 weeks. Payback procedure (§ 13b UStG) for clients staying abroad') }}
                </div>

            </div>
            <aside class="registration-sidebar">
                <ChosenPlan :plan="plan" @backToPlans="backToPlans" />
                <AdvertiseBlock />
            </aside>
        </div>
    </section>
</template>

<script>
import ChosenPlan from "./partials/ChosenPlan";
import PromoBlock from "../partials/PromoBlock";
import PropertyFacilities from "./partials/PropertyFacilities";
import BillingAddressSummary from "./partials/BillingAddressSummary";
import ContactInformationSummary from "./partials/ContactInformationSummary";
import PropertyData from "./partials/PropertyData";
import PropertyMediaSummary from "./partials/PropertyMediaSummary";
import AdvertiseBlock from "./partials/AdvertiseBlock";
import PropertyDataSummary from "./partials/PropertyDataSummary";
export default {
    name: "RegistrationStepSummary",
    props: ['account', 'plan'],
    components: {
        PropertyDataSummary,
        AdvertiseBlock,
        PropertyMediaSummary,
        PropertyData,
        ContactInformationSummary, BillingAddressSummary, PropertyFacilities, PromoBlock, ChosenPlan},
    mounted() {
        window.scrollTo(0, 0);
    },
    methods: {
        backToPlans() {
            this.$emit('backToPlans', '');
        },
        toAccountData() {
            this.$emit('toAccountData', '');
        },
        toPropertyData() {
            this.$emit('toPropertyData', '');

        }
    }
}
</script>

<style scoped>

</style>
