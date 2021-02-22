<template>
    <div class="shower data-block-oval">
        <img src="/svg/i-shower.svg">
        {{ type }} {{ $t('shower') }}
    </div>
</template>

<script>
export default {
    name: "FeatureShower",
    props: ['type']
}
</script>

<style scoped>

</style>
