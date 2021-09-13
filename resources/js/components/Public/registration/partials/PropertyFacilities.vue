<template>
    <section class="furnishings-section">
        <div class="title">{{ $t('Choose furniture') }}</div>
        <div class="furnishings-content">
            <PropertyFacilitiesCategory v-for="category in categories" :key="JSON.stringify(category)" :category="category" :facilities="facilities" :noactive="readonly" :items="belongToCat(category.id)" @update="facilityUpdate" />
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
    props: ['facilities', 'readonly', 'filtered'],
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
            let features = this.features;
            if (this.filtered) {
                features = features.filter( item => this.facilities.indexOf(item.id) !== -1);
            }
            return features.filter( (item) => item.feature_category_id  === id);
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
            let features = this.features;
            if (this.filtered) {
                features = features.filter( item => this.facilities.indexOf(item.id) !== -1);
            }

            features.forEach( (item) => {
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

<style lang="scss">

.registration-section {
    .title {
        a {
            font-weight: 500;
            font-size: 14px;
            line-height: 100%;
            color: #3B8B3E;
            text-decoration: none;
        }
        margin-bottom: 16px;
        font-weight: 600;
        font-size: 20px;
        line-height: 130%;
        color: #333646;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .furnishings-section {
        &::after {
            position: absolute;
            content: "";
            max-width: 720px;
            width: 100%;
            height: 110px;
            left: 50%;
            transform: translateX(-50%);
            bottom: 0;
            background: #FFFFFF;
            box-shadow: 0 4px 30px rgb(51 54 70 / 16%);
            border-radius: 14px;
            z-index: -1;
        }
        background: #FFFFFF;
        box-shadow: 0 0 14px rgb(51 54 70 / 14%);
        border-radius: 12px;
        padding: 30px 16px 0 16px;
        margin-bottom: 20px;
        max-width: 800px;
        width: 100%;
        position: relative;
        min-height: 110px;
    }
}
.registration-section.data-checking-section {
    .furnishings-section {
        .furnishings-content {
            display: flex;
            flex-wrap: wrap;
        }
        .col-lg-3.col-md-4.col-sm-6 {
            flex: 0 0 100%;
            max-width: 100%;
            padding-right: 0;
        }
    }
}

@media (max-width: 1040px) {
    .registration-section {
        .furnishings-section {
            &::after {
                width: calc(100% - 32px);
            }
            max-width: none;
            border-radius: 0;
        }
        .title {
            font-size: 18px;
        }
    }
}

</style>
