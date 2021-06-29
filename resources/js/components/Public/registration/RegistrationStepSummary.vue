<template>
    <section class="registration-section data-checking-section">
        <div class="billing-address-container">
            <div class="main-registration-content">
                <BillingAddressSummary :account="account" @toAccountData="toAccountData" />
                <ContactInformationSummary :account="account" @toAccountData="toAccountData"  />
                <PropertyDataSummary :property="account.property"  />
                <PropertyFacilities :facilities="account.property.facilities" :readonly="true" />
                <PropertyMediaSummary :media="account.property.media" @toPropertyData="toPropertyData" />
                <div class="familiarization">
                    <div class="checkbox-line legal-address-line">
                        <input type="checkbox" id="got-acquainted">
                        <label for="got-acquainted">Я ознакомился с <span>условиями</span>, <span>политикой отмены</span> и положениями о защите данных провайдера,<br>
                            и я согласен на оформление моей заявки.</label>
                    </div>
                </div>

                <a href="#" class="save">Подтвердить с обязанностью платежа</a>

                <div class="duration">
                    * Продолжительность 12 месяцев с автоматом. Продление. Срок уведомления 4 недели. Процедура обратной оплаты (§ 13b UStG) для клиентов, находящихся за границей
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
