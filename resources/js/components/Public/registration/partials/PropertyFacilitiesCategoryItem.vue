<template>
    <div class="col-lg-3 col-md-4 col-sm-6 margin-bottom">
        <div :class="{'furnishings-block': true, active: active}">
            <img :src="item.picture" />
            <span>{{ item.name }}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "PropertyFacilitiiesCategoryItem",
    props: ['item', 'active']
}
</script>

<style scoped>

</style>
