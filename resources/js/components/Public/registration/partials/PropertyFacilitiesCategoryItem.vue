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

<style lang="scss">

.registration-section {
    .furnishings-section {
        .furnishings-block {
            &:hover {
                svg {
                    path {
                        fill: #3b8b3e;
                    }
                }
                color: #3B8B3E;
                background: #E7F4EF;
                border-radius: 6px;
            }
            &::before {
                border: 1px solid #6BB63F;
                border-radius: 6px;
                width: 100%;
                height: 38px;
                pointer-events: none;
                position: absolute;
                top: 0;
                left: 0;
            }
            svg {
                display: block;
                margin-right: 7px;
                z-index: 1;
                transition: all 0.2s;
            }
            span {
                z-index: 1;
                width: 100%;
                white-space: nowrap;
                text-overflow: ellipsis;
                overflow: hidden;
            }
            img {
                margin-right: 7px;
            }
            font-weight: 400;
            font-size: 13px;
            line-height: 120%;
            color: #333646;
            cursor: pointer;
            display: flex;
            align-items: center;
            padding: 10px 6px;
            position: relative;
            transition: all 0.2s;
            margin-bottom: 2px;
        }
        .furnishings-block.active {
            &::before {
                content: "";
            }
            svg {
                path {
                    fill: #3b8b3e;
                }
            }
            color: #3B8B3E;
            border-radius: 6px;
        }
        .col-lg-3 {
            padding-right: 9px;
            padding-left: 0;
        }
    }
}
.data-checking-section {
    .furnishings-section {
        .furnishings-block {
            pointer-events: none;
            cursor: text;
        }
    }
}

@media (max-width: 1100px) {
    .registration-section {
        .furnishings-section {
            .col-lg-3 {
                padding-right: 15px;
                padding-left: 15px;
            }
        }
    }
}
@media (max-width: 575px) {
    .registration-section.data-checking-section {
        .furnishings-section {
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
                }
            }
            .furnishings-block {
                margin-bottom: 0;
            }
        }
    }
}

</style>
