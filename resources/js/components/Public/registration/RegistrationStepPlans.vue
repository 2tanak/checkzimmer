<template>
    <div class="wrapper">
        <section class="plans-section">
            <div class="plans-content">
                <div class="plans-container">
                    <h1>{{ $t('Our pricing plans are transparent & flexible') }}</h1>
                    <div class="subtitle">{{ $t('Contact us, we will compare the properties in the city') }} {{ $t('Х') }} {{ $t('for you and find the most optimal accommodation for you!') }}</div>
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
                            Не нашли ответ на свой вопрос? Не проблема, просто свяжитесь с нашим менежером напрямую
                            <a class="communication-manager" href="#">Связаться с менеджером</a>
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
        }
    }
}
</script>

<style scoped>

</style>
