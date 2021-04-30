<template>
    <div class="kitchen data-block-oval">
        <img src="/svg/i-canteen.svg">
        <span class="property-title" v-if="type !== 'kitchenette'">
            {{ type }} {{ $t('kitchen') }}
        </span>
        <span v-else>
            {{ type }}
        </span>
    </div>
</template>

<script>
export default {
    name: "FeatureKitchen",
    props: ['type']
}
</script>

<style scoped>

</style>
