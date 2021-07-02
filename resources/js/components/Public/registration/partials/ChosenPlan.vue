<template>
    <div class="your-tariff">
        <div class="your-tariff-top">
            <div style="display:flex;align-items:center">
                <div class="sidebar-title">{{ $t('Your tariff') }}:</div>
                <div class="tariff tariff-mobile">{{ plan.title }}</div>
            </div>
            <a href="#" @click.prevent="backToPlans">{{ $t('Edit (register sidebar)') }}</a>
        </div>
        <div class="tariff tariff-desctope">{{ plan.title }}</div>
        <div class="price">
            <div class="price-item">&euro;{{ plan.price }}<span>*</span></div>
            <div class="month">/ {{ $t('Month') }}</div>
        </div>
        <div class="description">
            {{ plan.description }}
        </div>
    </div>
</template>

<script>
export default {
    name: "ChosenPlan",
    props: ['plan'],
    methods: {
        backToPlans() {
            console.log('!');
            this.$emit('backToPlans', '');
        }
    }
}
</script>

<style scoped>

</style>
