<template>
    <div class="wrapper">
        <section class="plans-section">
            <div class="plans-content">
                <div class="plans-container">
                    <h1>{{ $t('Our pricing plans are transparent & flexible (domain plans)') }}</h1>
                    <div class="subtitle">{{ $t('Contact us, we will compare the properties in the city (domain plans)') }}</div>
                    <div class="price-block">
                        <PriceBlockItem v-for="(plan, key) in plans" :active="key === planActive" :plan="plan" @input="planSelect(key)"/>
                    </div>
                </div>
                <div class="questions-block">
                    <div class="questions-content">
                        <div class="title">{{ $t('Freequently asked Questions') }}</div>
                        <div class="questions-block-item">
                            <QuestionItem v-for="(item, index) in questions" :question="item" :index="index" />
                        </div>
                        <div class="communication-manager">
                            {{ $t('Did not find an answer to your question ? No problem, just contact our manager directly') }}
                            <a class="communication-manager" href="#" @click.prevent="modalShow">{{ $t('Contact the manager') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import PriceBlockItem from "./partials/PriceBlockItem";
import QuestionItem from "./partials/QuestionItem";
export default {
    name: "RegistrationStepPlans",
    props: ['planActive', 'plans', 'questions'],
    components: {QuestionItem, PriceBlockItem},
    data() {
        return {

        }
    },
    mounted() {
        window.scrollTo(0, 0);
    },
    methods: {
        planSelect(key) {
            this.$emit('input', key);
        },
        modalShow() {
            jQuery('.inquiry-modal-overlay').addClass('modal-show');
        }
    }
}
</script>

<style lang="scss">

.plans-section {
    .plans-container {
        width: 100%;
        max-width: 1240px;
        margin: auto;
        padding: 0 30px;
    }
    .plans-content {
        padding: 100px 0;
    }
    h1 {
        margin-bottom: 10px;
        font-weight: 600;
        font-size: 28px;
        line-height: 130%;
        text-align: center;
        color: #333646;
    }
    .subtitle {
        margin: 0 auto 34px;
        font-weight: 400;
        font-size: 18px;
        line-height: 150%;
        text-align: center;
        color: #545769;
        width: 100%;
        max-width: 728px;
    }
    .questions-block {
        &::after {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 0;
            background: #FFFFFF;
            box-shadow: 0 4px 30px rgba(51, 54, 70, 0.16);
            border-radius: 14px;
            z-index: -1;
            width: 100%;
            max-width: 1060px;
            height: 110px;
        }
        .title {
            margin-bottom: 41px;
            font-weight: 600;
            font-size: 28px;
            line-height: 130%;
            text-align: center;
            color: #333646;
        }
        background: #FCFCFF;
        box-shadow: 0 0 14px rgba(51, 54, 70, 0.14);
        border-radius: 12px;
        position: relative;
        width: 100%;
        max-width: 1120px;
        margin: auto;
    }
    .questions-content {
        padding: 100px 170px;
    }
    .questions-item {
        &:first-of-type {
            border-top: 0;
            padding-top: 0;
        }
        padding-bottom: 20px;
        padding-top: 20px;
        border-bottom: 1px solid #E8E8ED;
    }
    .collapse-button {
        &:hover {
            .point {
                background-color: #3b8b3e;
            }
            .plus-minus {
                &::after {
                    background: #3b8b3e;
                }
                &::before {
                    background: #3b8b3e;
                }
                border-color: #eeeeee;
                background-color: transparent;
            }
            color: #3b8b3e;
        }
        .point {
            min-width: 6px;
            max-width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: #333646;
            transition: all 0.2s;
            margin-right: 12px;
            margin-top: 11px;
        }
        .plus-minus {
            &::after {
                content: "";
                position: absolute;
                width: 2px;
                height: 12px;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%) rotate(90deg);
                background-color: #545769;
                border-radius: 1px;
                transition: all 0.2s;
            }
            &::before {
                content: "";
                position: absolute;
                width: 2px;
                height: 12px;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                background: #545769;
                border-radius: 1px;
                transition: all 0.2s;
            }
            min-width: 30px;
            max-width: 30px;
            height: 30px;
            border: 1px solid #f2f2f2;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            background-color: #f2f2f2;
            transition: all 0.2s;
            margin-left: 15px;
        }
        font-weight: 500;
        font-size: 18px;
        line-height: 150%;
        color: #333646;
        position: relative;
        cursor: pointer;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        transition: all 0.2s;
    }
    .collapse-button[aria-expanded="true"] {
        .point {
            background: #545769;
        }
        &:hover {
            .plus-minus {
                &::before {
                    transform: translate(-50%, -50%) rotate(90deg);
                    background: #df9d3c;
                }
                &::after {
                    background: #df9d3c;
                }
                padding-left: 18px;
            }
            color: #545769;
        }
        .plus-minus {
            &::before {
                transform: translate(-50%, -50%) rotate(90deg);
                background: #df9d3c;
            }
            &::after {
                background: #df9d3c;
            }
            background: #fff0db;
            border: 1px solid #fff0db;
        }
    }
    .collapse-content {
        p {
            &:first-of-type {
                padding-top: 9px;
                margin-bottom: 0;
                margin-top: 0;
            }
            &:last-of-type {
                margin-bottom: 0;
            }
            font-weight: 400;
            font-size: 16px;
            line-height: 160%;
            color: #545769;
            margin-top: 1rem;
        }
        padding-left: 18px;
    }
    .questions-block-item {
        margin-bottom: 39px;
    }
    .communication-manager {
        a.communication-manager {
            &:hover {
                color: #ffffff;
                background-color: #6BB63F;
            }
            background: #FFFFFF;
            border: 1px solid #6BB63F;
            box-sizing: border-box;
            border-radius: 6px;
            width: 100%;
            max-width: 240px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            line-height: 100%;
            color: #3B8B3E;
            transition: all 0.2s;
            margin-top: 17px;
            position: relative;
            box-shadow: 0 4px 10px rgba(29, 29, 36, 0.16);
        }
        margin: auto;
        text-align: center;
        width: 100%;
        max-width: 600px;
        font-weight: 400;
        font-size: 15px;
        line-height: 160%;
        color: #545769;
    }
    .price-block {
        display: flex;
        align-items: flex-start;
        margin-bottom: 100px;
    }
    .price-block-item {
        &:first-of-type:after {
            content: "";
            position: absolute;
            width: 1px;
            height: 100%;
            top: 0;
            right: 0;
            background: #CFCFD4;
        }
        &:last-of-type:after {
            content: none;
            border-right: 0;
        }
        .price-block-head {
            padding: 33px 30px 17px 30px;
            margin-bottom: 17px;
        }
        .price-block-body {
            padding: 0 30px 36px 30px;
        }
        .name-tariff {
            padding: 4px 10px;
            font-weight: 500;
            font-size: 11px;
            line-height: 130%;
            letter-spacing: 0.02em;
            text-transform: uppercase;
            color: #FFFFFF;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16);
            border-radius: 100px;
            margin-bottom: 22px;
            display: inline-block;
            transition: all 0.2s;
            background: #9FA0A4;
        }
        .price-item {
            display: flex;
            align-items: flex-end;
            margin-bottom: 14px;
        }
        .max-price {
            span {
                position: absolute;
                top: -6px;
                right: -10px;
                font-size: 18px;
                line-height: 130%;
            }
            font-weight: 600;
            font-size: 38px;
            line-height: 85%;
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
        .description {
            font-weight: 400;
            font-size: 16px;
            line-height: 160%;
            color: #545769;
        }
        .advantages {
            li {
                &:last-of-type {
                    margin-bottom: 0;
                }
                font-weight: 400;
                font-size: 15px;
                line-height: 140%;
                color: #333646;
                margin-bottom: 14px;
                display: flex;
                align-items: center;
            }
            svg {
                margin-right: 8px;
                min-width: 18px;
                max-width: 18px;
                height: 18px;
            }
            .not-available {
                color: #B5B7C1;
            }
            padding: 0;
            margin: 0;
            list-style: none;
        }
        a.choose-plan {
            &:hover {
                background: #6BB63F;
                border: 1px solid #6BB63F;
                box-shadow: 0 4px 10px rgba(107, 182, 63, 0.16);
                border-radius: 6px;
                color: #F8F9FB;
                text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16);
            }
            background: #F8F9FB;
            border: 1px solid #6BB63F;
            border-radius: 6px;
            box-shadow: 0 4px 10px rgba(29, 29, 36, 0.16);
            font-weight: 500;
            font-size: 15px;
            line-height: 100%;
            color: #3B8B3E;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 40px;
            margin-bottom: 12px;
            width: 100%;
            height: 48px;
            text-decoration: none;
            transition: all 0.2s;
        }
        .footnote {
            font-weight: 400;
            font-size: 13px;
            line-height: 130%;
            color: #545769;
        }
        width: 100%;
        max-width: 295px;
        border-radius: 12px;
        position: relative;
    }
    .price-block-item.popular {
        &::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            border: 4px solid #6BB63F;
            border-radius: 12px;
            pointer-events: none;
        }
        &::after {
            content: none;
        }
        .price-block-head {
            background: #E7F5F0;
            border-radius: 12px 12px 0 0;
        }
        .name-tariff {
            background: #6BB63F;
        }
        a.choose-plan {
            background: #6BB63F;
            box-shadow: 0 4px 10px rgba(107, 182, 63, 0.4);
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16);
            color: #FFFFFF;
        }
        &:hover {
            a.choose-plan {
                background: #6BB63F;
                box-shadow: 0 4px 10px rgba(107, 182, 63, 0.4);
                text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16);
                color: #FFFFFF;
            }
        }
        .advantages {
            svg.active-svg {
                circle {
                    fill: #6BB63F;
                }
            }
        }
        background: #FFFFFF;
    }
    position: relative;
}


@media (max-width: 991px) {
    .plans-section {
        h1 {
            font-size: 24px;
            line-height: 120%;
        }
        .subtitle {
            font-size: 14px;
            line-height: 130%;
            max-width: 500px;
            margin: 0 auto 28px;
        }
        .plans-content {
            padding: 34px 0 40px 0;
        }
        .questions-content {
            padding: 40px 16px;
        }
        .questions-block {
            .title {
                font-size: 24px;
                line-height: 120%;
            }
            border-radius: 0;
        }
        .questions-block-item {
            margin-bottom: 29px;
        }
        .price-block {
            margin-bottom: 60px;
        }
        .plans-container {
            padding: 0 16px;
        }
        .price-block-item {
            .advantages {
                li {
                    align-items: flex-start;
                }
            }
            .name-tariff {
                margin-bottom: 15px;
            }
            .price-item {
                margin-bottom: 10px;
            }
            .description {
                font-weight: 400;
                font-size: 15px;
            }
            .price-block-head {
                padding: 26px 14px 13px 14px;
                margin-bottom: 13px;
            }
            .price-block-body {
                padding: 0 14px 36px 14px;
            }
            a.choose-plan {
                margin-top: 26px;
            }
            .max-price {
                margin-right: 7px;
            }
        }
        &::after {
            content: none;
        }
    }
}
@media (max-width: 750px) {
    .plans-section {
        .price-block {
            flex-wrap: wrap;
        }
    }
}
@media (max-width: 640px) {
    .plans-section {
        .price-block-item {
            .price-block-head {
                padding: 26px 20px 13px 20px;
            }
            .price-block-body {
                padding: 0 20px 26px 20px;
            }
            width: 50%;
            max-width: none;
        }
    }
}
@media (max-width: 575px) {
    .plans-section {
        .plans-container {
            padding: 0 20px;
        }
        h1 {
            font-size: 22px;
            margin-bottom: 18px;
        }
        .subtitle {
            margin: 0 auto 38px;
            line-height: 140%;
        }
        .questions-content {
            padding: 34px 16px 40px 16px;
        }
        .questions-block {
            .title {
                font-size: 22px;
                margin-bottom: 37px;
            }
            &::after {
                max-width: 420px;
            }
        }
        .collapse-button {
            font-size: 17px;
        }
        .collapse-content {
            p {
                font-size: 15px;
            }
        }
        .questions-block-item {
            margin-bottom: 24px;
        }
        .communication-manager {
            a.communication-manager {
                max-width: none;
            }
            max-width: none;
        }
        .price-block {
            margin-bottom: 40px;
        }
    }
}
@media (max-width: 440px) {
    .plans-section {
        .price-block-item {
            &:first-of-type {
                &::after {
                    width: 100%;
                    height: 1px;
                    bottom: 0;
                    top: auto;
                    right: auto;
                    left: 0;
                }
            }
            &:last-of-type {
                &::after {
                    content: "";
                    position: absolute;
                    width: 100%;
                    height: 1px;
                    bottom: 0;
                    top: auto;
                    right: auto;
                    left: 0;
                    background: #CFCFD4;
                }
            }
            .price-block-head {
                padding: 0 26px 13px 26px;
            }
            &:first-of-type {
                margin-bottom: 26px;
            }
            .description {
                line-height: 140%;
            }
            width: 100%;
        }
        .price-block-item.popular {
            .price-block-head {
                padding-top: 22px;
            }
            margin-bottom: 26px;
        }
        .plans-container {
            padding: 0 16px;
        }
    }
}
@media (max-width: 320px) {
    .plans-section {
        .subtitle {
            margin: 0 auto 48px;
        }
        .plans-content {
            padding: 40px 0;
        }
        .questions-block {
            &:after {
                max-width: 260px;
            }
        }
    }
}

</style>
