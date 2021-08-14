<template>
    <div class="furnishings-line  furnishings-line-kitchen">
        <div class="furnishings-title furnishings-title-desctope">{{ category.name }}</div>
        <a class="furnishings-title furnishings-title-mobile"  data-toggle="collapse" href="#kitchen-collapse" role="button" aria-expanded="false" aria-controls="#kitchen-collapse">{{ category.name }}</a>
        <div class="collapse" id="kitchen-collapse">
            <div class="row padding-left">
                <PropertyFacilitiesCategoryItem v-for="item in items" :key="JSON.stringify(item)" :item="item" :active="!noactive && isItemActive(item.id)"
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
    props: ['category', 'items', 'facilities', 'noactive'],
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

<style lang="scss">

.registration-section {
    .furnishings-section {
        .furnishings-line {
            &:last-of-type {
                padding-bottom: 24px;
            }
            padding-bottom: 40px;
        }
        img {
            margin-right: 10px;
        }
        .furnishings-title {
            margin-bottom: 20px;
            font-weight: 500;
            font-size: 16px;
            line-height: 100%;
            color: #333646;
        }
        .furnishings-title.furnishings-title-mobile {
            &::before {
                position: absolute;
                content: "";
                top: 50%;
                transform: translateY(-50%);
                left: 1px;
                height: 1.4px;
                width: 10px;
                background: #333646;
                border-radius: 1px;
            }
            display: none;
            position: relative;
            text-decoration: none;
            width: 100%;
            padding: 20px 0 20px 16px;
        }
        .collapse {
            &:not(.show) {
                display: block;
            }
        }
        .row {
            margin-left: 0;
            margin-right: 0;
        }
    }
}
.registration-section.data-checking-section {
    .furnishings-section {
        .furnishings-line {
            &:nth-of-type(4n) {
                margin-right: 0;
            }
            padding-bottom: 28px;
            width: 23%;
            margin-right: 2.6%;
        }
        .furnishings-title {
            margin-bottom: 10px;
        }
    }
}

@media (max-width: 1040px) {
    .registration-section {
        .furnishings-section {
            .furnishings-line {
                padding-bottom: 0;
                margin-bottom: 15px;
            }
            .furnishings-title {
                margin-bottom: 10px;
            }
            .row {
                padding-bottom: 8px;
                margin-left: -15px;
                margin-right: -15px;
            }
            .furnishings-line {
                &:first-of-type {
                    padding-top: 0;
                }
                &:last-of-type {
                    border-bottom: 0;
                    padding-bottom: 8px;
                }
                border-bottom: 1px solid #edeef0;
            }
            .furnishings-line-kitchen {
                .margin-bottom {
                    &:nth-of-type(4) {
                        .furnishings-block {
                            margin-bottom: 0;
                        }
                    }
                    &:nth-of-type(5) {
                        .furnishings-block {
                            margin-bottom: 0;
                        }
                    }
                    &:nth-of-type(6) {
                        .furnishings-block {
                            margin-bottom: 0;
                        }
                    }
                }
            }
        }
    }
    .registration-section.data-checking-section {
        .furnishings-section {
            .furnishings-line {
                margin-bottom: 0;
                border-bottom: 0;
            }
        }
    }
}
@media (max-width: 575px) {
    .registration-section.data-checking-section {
        .furnishings-section {
            .furnishings-line {
                padding-bottom: 10px;
                width: 100%;
                margin-right: 0;
            }
        }
    }
}

</style>
