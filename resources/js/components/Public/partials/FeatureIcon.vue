<template>
    <div :class="classes">
        <div class="tooltip-block">{{ featureName(item) }}</div>
        <img :src="item.picture">
    </div>
</template>

<script>
export default {
    name: "FeatureIcon",
    props: ['item', 'classes'],
    methods: {
        featureName(item) {
            let la = this.$i18n.locale;
            let translation = item.options.find( item => item.key === 'lang-' + la );
            return translation ? translation.value : item.name;
        },
    }
}
</script>

<style scoped>

</style>
