<template>
    <div class="your-tariff">
        <div class="your-tariff-top">
            <div style="display:flex;align-items:center">
                <div class="sidebar-title">{{ $t('Your tariff') }}:</div>
                <div class="tariff tariff-mobile">{{ plan.title }}</div>
            </div>
            <a href="#" @click.prevent="backToPlans">{{ $t('Edit (register sidebar)') }}</a>
        </div>
        <div class="tariff tariff-desctope">{{ plan.title }}</div>
        <div class="price">
            <div class="price-item">&euro;{{ plan.price }}</div>
            <div class="month">/ {{ $t('Month') }}</div>
        </div>
        <div class="description">
            {{ plan.description }}
        </div>
    </div>
</template>

<script>
export default {
    name: "ChosenPlan",
    props: ['plan'],
    methods: {
        backToPlans() {
            console.log('!');
            this.$emit('backToPlans', '');
        }
    }
}
</script>

<style lang="scss">

.registration-sidebar {
    .your-tariff {
        &::after {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: -4px;
            z-index: -1;
            background: #FFFFFF;
            opacity: 0.5;
            box-shadow: 0 8px 30px rgba(107, 182, 63, 0.4);
            border-radius: 6px;
            width: 348px;
            height: 38px;
        }
        .your-tariff-top {
            a {
                font-weight: 500;
                font-size: 14px;
                line-height: 100%;
                color: #3B8B3E;
                text-decoration: none;
            }
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 17px;
        }
        .sidebar-title {
            font-weight: 600;
            font-size: 20px;
            line-height: 130%;
            color: #333646;
            margin-right: 15px;
        }
        .tariff {
            margin-bottom: 23px;
            background: #6BB63F;
            border-radius: 100px;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            font-size: 11px;
            line-height: 130%;
            letter-spacing: 0.02em;
            text-transform: uppercase;
            color: #FFFFFF;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16);
            width: 85px;
            height: 22px;
        }
        .tariff.tariff-desctope {
            display: flex;
        }
        .tariff.tariff-mobile {
            display: none;
        }
        .price {
            .price-item {
                span {
                    font-size: 18px;
                    position: absolute;
                    top: -6px;
                    right: -8px;
                    line-height: 18px;
                }
                font-weight: 600;
                font-size: 38px;
                line-height: 32px;
                letter-spacing: -0.04em;
                color: #333646;
                position: relative;
                margin-right: 5px;
            }
            .month {
                font-weight: 400;
                font-size: 14px;
                line-height: 130%;
                color: #333646;
            }
            display: flex;
            align-items: flex-end;
            margin-bottom: 18px;
        }
        .description {
            font-weight: 400;
            font-size: 16px;
            line-height: 160%;
            color: #545769;
        }
        background: #FFFFFF;
        border: 4px solid #6BB63F;
        border-radius: 12px;
        max-width: 380px;
        width: 100%;
        height: 255px;
        padding: 30px 20px;
        margin-bottom: 20px;
        position: relative;
    }
}

@media (max-width: 1040px) {
    .registration-sidebar {
        .your-tariff {
            &::after {
                width: calc(100% - 32px);
            }
            .sidebar-title {
                font-size: 18px;
                margin-right: 8px;
            }
            .your-tariff-top {
                a {
                    font-size: 13px;
                }
                margin-bottom: 15px;
            }
            .tariff.tariff-desctope {
                display: none;
            }
            .tariff.tariff-mobile {
                display: flex;
                margin-bottom: 0;
            }
            .price {
                .month {
                    font-size: 13px;
                }
                margin-bottom: 7px;
            }
            .description {
                font-size: 13px;
            }
            max-width: none;
            padding: 30px 12px;
            height: auto;
            border-radius: 0;
        }
    }
}

</style>
