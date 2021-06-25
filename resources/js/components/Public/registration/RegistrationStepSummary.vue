<template>
    <section class="registration-section data-checking-section">
        <div class="billing-address-container">
            <div class="main-registration-content">
                <PropertyFacilities :facilities="account.property.facilities" />
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
                <PromoBlock />
            </aside>
        </div>
    </section>
</template>

<script>
import ChosenPlan from "./partials/ChosenPlan";
import PromoBlock from "../partials/PromoBlock";
import PropertyFacilities from "./partials/PropertyFacilities";
export default {
    name: "RegistrationStepSummary",
    props: ['account', 'plan'],
    components: {PropertyFacilities, PromoBlock, ChosenPlan},
    methods: {
        backToPlans() {
            this.$emit('backToPlans', '');
        }
    }
}
</script>

<style scoped>

</style>
