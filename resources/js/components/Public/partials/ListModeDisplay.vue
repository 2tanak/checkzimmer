<template>
    <div class="left-block">
        <a :class="{list: true, active: listMode === 'list'}" href="#" @click.prevent="modeSwitch('list')">{{ $t('List') }}</a>
        <a :class="{map: true, active: listMode === 'map'}" href="#" @click.prevent="modeSwitch('map')">{{ $t('Map') }}</a>
        <div class="result"><span class="property-found">{{ total }}</span> {{ $t('housing options') }}</div>
    </div>
</template>

<script>
export default {
    name: "ListModeDisplay",
    props: ['listMode', 'total'],
    methods: {
        modeSwitch(mode) {
            this.$emit('input', mode);
        }
    }
}
</script>

<style scoped>

</style>
