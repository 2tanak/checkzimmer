<template>
    <section class="furnishings-section">
        <div class="title">Выберите мебелирование</div>
        <div class="furnishings-content">
            <PropertyFacilitiesCategory v-for="category in categories" :key="JSON.stringify(category)" :category="category" :items="belongToCat(category.id)" />
        </div>
    </section>
</template>

<script>
import ApiRequest from "../../../API/ApiRequest";
import PropertyFacilitiesCategory from "./PropertyFacilitiesCategory";

let featureRequest = ApiRequest('features');
let features = new featureRequest;

export default {
    name: "PropertyFacilities",
    components: {PropertyFacilitiesCategory},
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
