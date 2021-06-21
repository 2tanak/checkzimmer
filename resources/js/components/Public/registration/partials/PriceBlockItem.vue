<template>
    <div :class="{'price-block-item': true, 'popular': active }">
        <div class="price-block-head">
            <div class="name-tariff">{{ plan.title }}</div>
            <div class="price-item">
                <div class="max-price">&euro;{{ plan.price }} <span>*</span></div>
                <div class="month">/ {{ $t('Month') }}</div>
            </div>
            <div class="description">
                {{ plan.description }}
            </div>
        </div>
        <div class="price-block-body">
            <ul class="advantages">
                <PriceBlockItemOption v-for="(option, index) in plan.options" :text="option.text" :active="option.active"
                                      :key="plan.title.toLowerCase().replace(/[^a-z]/, '') + index" />
            </ul>
            <a class="choose-plan" href="#" @click.prevent="chosenPlan">{{ $t('Choose Plan') }}</a>
            <div class="footnote">
                * {{ $t('Please note that the annual rate is EUR') }} {{ plan.annual }}.
            </div>
        </div>
    </div>
</template>

<script>
import PriceBlockItemOption from "./PriceBlockItemOption";
export default {
    name: "PriceBlockItem",
    components: {PriceBlockItemOption},
    props: [ 'plan', 'active' ],
    methods: {
        chosenPlan() {
            this.$emit('input', '');
        }
    }
}
</script>

<style scoped>

</style>
