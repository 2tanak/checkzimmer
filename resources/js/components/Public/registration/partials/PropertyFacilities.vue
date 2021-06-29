<template>
    <section class="furnishings-section">
        <div class="title">{{ $t('Choose furniture') }}</div>
        <div class="furnishings-content">
            <PropertyFacilitiesCategory v-for="category in categories" :key="JSON.stringify(category)" :category="category" :facilities="facilities" :items="belongToCat(category.id)" @update="facilityUpdate" />
        </div>
    </section>
</template>

<script>
import ApiRequest from "../../../API/ApiRequest";
import PropertyFacilitiesCategory from "./PropertyFacilitiesCategory";

let featureRequest = ApiRequest('features-public');
let features = new featureRequest;

export default {
    name: "PropertyFacilities",
    components: {PropertyFacilitiesCategory},
    props: ['facilities', 'readonly'],
    data() {
        return {
            features: []
        }
    },
    mounted() {
        features.all()
            .then( (resp) => {
                this.features = resp.data;
            })
    },
    methods: {
        belongToCat(id) {
            return this.features.filter( (item) => item.feature_category_id  === id);
        },
        facilityUpdate(facility) {
            if (this.readonly) {
                return false;
            }
            let facilities = this.facilities;
            let index = facilities.findIndex((item) => item === facility.id)
            if (index === -1) {
                facilities.push(facility.id)
            } else {
                facilities.splice(index, 1);
            }
            this.$emit('facilityUpdate', facilities);
        }
    },
    computed: {
        categories() {
            let cats = [];
            let ids = [];
            this.features.forEach( (item) => {
                if (!ids.find( (itm) => itm === item.feature_category_id)) {
                    cats.push(item.feature_category);
                    ids.push(item.feature_category_id);
                }
            })
            return cats;
        }
    }
}
</script>

<style scoped>

</style>
