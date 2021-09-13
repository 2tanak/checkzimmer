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

<style lang="scss">

.tooltip-block {
    &::after {
         content: "";
         position: absolute;
         left: 50%;
         transform: translateX(-50%) rotate(-45deg);
         bottom: -3px;
         background: #333646;
         opacity: 0.94;
         width: 6px;
         height: 6px;
     }
    background-color: #333646;
    border-radius: 3px;
    font-weight: 400;
    font-size: 11px;
    line-height: 100%;
    color: #FFFFFF;
    padding: 3px 8px 6px 8px;
    opacity: 0;
    visibility: hidden;
    position: absolute;
    top: -28px;
    left: 50%;
    transform: translateX(-50%) scale(0.7);
    z-index: 1;
    white-space: nowrap;
    transition: all 0.4s;
}
.data-block-circle {
    &:hover {
        .tooltip-block {
            opacity: 0.94;
            transform: translateX(-50%) scale(1);
            visibility: visible;
            transition: all 0.2s;
        }
    }
}

</style>
