<template>
    <div class="your-tariff">
        <div class="your-tariff-top">
            <div style="display:flex;align-items:center">
                <div class="sidebar-title">Ваш тариф:</div>
                <div class="tariff tariff-mobile">{{ plan.title }}</div>
            </div>
            <a href="#" @click.prevent="backToPlans">Изменить</a>
        </div>
        <div class="tariff tariff-desctope">{{ plan.title }}</div>
        <div class="price">
            <div class="price-item">&euro;{{ plan.price }}<span>*</span></div>
            <div class="month">/ Month</div>
        </div>
        <div class="description">
            {{  plan.description }}
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
