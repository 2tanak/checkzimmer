<template>
    <div class="furnishings-line  furnishings-line-kitchen">
        <div class="furnishings-title furnishings-title-desctope">{{ category.name }}</div>
        <a class="furnishings-title furnishings-title-mobile"  data-toggle="collapse" href="#kitchen-collapse" role="button" aria-expanded="false" aria-controls="#kitchen-collapse">{{ category.name }}</a>
        <div class="collapse" id="kitchen-collapse">
            <div class="row padding-left">
                <PropertyFacilitiesCategoryItem v-for="item in items" :key="JSON.stringify(item)" :item="item" :active="isItemActive(item.id)"
                                                 @click.native="itemClicked(item)"/>
            </div>
        </div>
    </div>
</template>

<script>
import PropertyFacilitiesCategoryItem from "./PropertyFacilitiesCategoryItem";
export default {
    name: "PropertyFacilitiesCategory",
    components: {PropertyFacilitiesCategoryItem},
    props: ['category', 'items', 'facilities'],
    methods: {
        itemClicked(item) {
            this.$emit('update', item)
        },
        isItemActive(id) {
            return this.facilities.findIndex( item => item === id) !== -1;
        }
    }
}
</script>

<style scoped>

</style>
