<template>
    <div class="wrapper">
        <section class="plans-section">
            <div class="plans-content">
                <div class="plans-container">
                    <h1>{{ $t('Our pricing plans are transparent & flexible (domain plans)') }}</h1>
                    <div class="subtitle">{{ $t('Contact us, we will compare the properties in the city (domain plans)') }}</div>
                    <div class="price-block">
                        <PriceBlockItem v-for="(plan, key) in plans" :active="key === planActive" :plan="plan" @input="planSelect(key)"/>
                    </div>
                </div>
                <div class="questions-block">
                    <div class="questions-content">
                        <div class="title">{{ $t('Freequently asked Questions') }}</div>
                        <div class="questions-block-item">
                            <QuestionItem v-for="(item, index) in questions" :question="item" :index="index" />
                        </div>
                        <div class="communication-manager">
                            {{ $t('Did not find an answer to your question ? No problem, just contact our manager directly') }}
                            <a class="communication-manager" href="#" @click.prevent="modalShow">{{ $t('Contact the manager') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import PriceBlockItem from "./partials/PriceBlockItem";
import QuestionItem from "./partials/QuestionItem";
export default {
    name: "RegistrationStepPlans",
    props: ['planActive', 'plans', 'questions'],
    components: {QuestionItem, PriceBlockItem},
    data() {
        return {

        }
    },
    methods: {
        planSelect(key) {
            this.$emit('input', key);
        },
        modalShow() {
            jQuery('.inquiry-modal-overlay').addClass('modal-show');
        }
    }
}
</script>

<style scoped>

</style>
