<template>
    <div class="data-item">
        <ItemProperties :item="item" />
        <div class="additionally">
            <FeatureIcon v-for="feature in featuresForList" :item="feature" classes="data-block-circle" />

            <template v-if="getKitchenType==='private' || getKitchenType==='kitchenette'">
                <FeatureKitchen v-if="getKitchenType" :type="$t(getKitchenType)" />
                <FeatureShower v-if="getShowerType" :type="$t(getShowerType)" />
            </template>
            <template v-else-if="getShowerType==='private'">
                <FeatureShower v-if="getShowerType" :type="$t(getShowerType)" />
                <FeatureKitchen v-if="getKitchenType" :type="$t(getKitchenType)" />
            </template>
            <template v-else>
                <FeatureKitchen v-if="getKitchenType" :type="$t(getKitchenType)" />
                <FeatureShower v-if="getShowerType" :type="$t(getShowerType)" />
            </template>
        </div>
    </div>
</template>

<script>
import FeatureIcon from "./../partials/FeatureIcon";
import FeatureKitchen from "./../partials/FeatureKitchen";
import FeatureShower from "./../partials/FeatureShower";
import ItemProperties from "./../partials/ItemProperties";

export default {
    name: "ItemFeatures",
    props: ['item'],
    components: {FeatureIcon, FeatureKitchen, FeatureShower, ItemProperties},
    computed: {
        getKitchenType() {
            let personal = this.item.rooms.some( room => room['kitchen'] === 'single' );
            let kitchenette = this.item.rooms.some( room => room['kitchen'] === 'kitchenette' );
            let shared = this.item.rooms.some( room => room['kitchen'] === 'shared' );
            return personal ? 'private' : ( kitchenette ? 'kitchenette' : ( shared ? 'shared' : ''));
        },
        getShowerType() {
            let personal = this.item.rooms.some( room => room['shower'] === 'single' );
            let shared = this.item.rooms.some( room => room['shower'] === 'shared' );
            return personal ? 'private' : ( shared ? 'shared' : '');
        },
        getBedType() {
            let single = this.item.rooms.some( room => room['bed'] === 'single' );
            let double = this.item.rooms.some( room => room['bed'] === 'double' );
            return single ? 'single' : ( double ? 'double' : '');
        },
        featuresForList() {
            return this.item.features.filter( itm => Array(...itm.options).some( itmOpt => itmOpt.key === 'inlist' && itmOpt.value === '1' )).sort( (a,b) => b.ord - a.ord).slice(0, 4);
        }

    }
}
</script>

<style scoped>

</style>
