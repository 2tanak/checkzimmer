<template>
    <section class="steps-section">
        <div class="steps-container">
            <div class="steps-content">
                <RegistrationStepsItem :step="1" :activeStep="step" :title="$t('Plan select')"/>
                <DotDotDot />
                <RegistrationStepsItem :step="2" :activeStep="step" :title="$t('Billing address')"/>
                <DotDotDot />
                <RegistrationStepsItem :step="3" :activeStep="step" :title="$t('Property data')"/>
                <DotDotDot />
                <RegistrationStepsItem :step="4" :activeStep="step" :title="$t('Data approve')"/>
            </div>
        </div>
    </section>

</template>

<script>
import RegistrationStepsItem from "./RegistrationStepsItem";
import DotDotDot from "./DotDotDot";
export default {
    name: "RegistrationSteps",
    props: [ 'step' ],
    components: {DotDotDot, RegistrationStepsItem}
}
</script>

<style lang="scss">

.steps-section {
    .steps-container {
        width: 100%;
        max-width: 1212px;
        padding: 0 16px;
        margin: auto;
    }
    .steps-content {
        display: flex;
        align-items: center;
        padding: 30px 0;
    }
}

@media (max-width: 1040px) {
    .steps-section {
        .steps-content {
            justify-content: space-between;
            padding-bottom: 48px;
        }
    }
}

</style>
