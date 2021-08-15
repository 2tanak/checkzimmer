<template>
    <div :class="{sorting: true, up: active}">
        <a href="#" @click.prevent="switchActive">{{ modeActive.title }}</a>
        <div class="filter-block">
            <ul>
                <li v-for="option in options" @click.prevent="loadSort(option.mode)" :class="{check: mode === option.mode}">{{ option.title }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "OrderDropdown",
    props: ['mode'],
    data() {
        return {
            active: false,
            options: [
                {
                    title:  this.$t('Sort by default'),
                    mode: 'def',
                },
                {
                    title:  this.$t('Price low to high'),
                    mode: 'min',
                },
                {
                    title:  this.$t('Price high to low'),
                    mode: 'max',
                },
                {
                    title:  this.$t('By rating'),
                    mode: 'rating',
                }
            ]
        }
    },
    methods: {
        switchActive() {
            this.active = !this.active
        },
        loadSort(mode) {
            this.$emit('switch', mode);
            this.active = false;
        }
    },
    computed: {
        modeActive() {
            return this.options.find(item => item.mode === this.mode)
        }
    }
}
</script>

<style scoped>

</style>
