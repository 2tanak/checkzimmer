<template>
    <section class="billing-address-checking">
        <div class="title">
            {{ $t('Billing address') }}
            <a href="#" @click.prevent="toAccountData">{{ $t('Change') }}</a>
        </div>
        <div class="address-checking-content">
            <div class="address-checking-line">
                <div class="address-checking-name">{{ $t('Account type') }}:</div>
                <div class="dots"></div>
                <div CLASS="address-checking-total">{{ account.billing.type === 'company' ? $t('Company') : $t('Private person') }}</div>
            </div>
            <div class="address-checking-line" v-if="account.billing.type === 'company'">
                <div class="address-checking-name">{{ $t('Company name') }}:</div>
                <div class="dots"></div>
                <div CLASS="address-checking-total">{{ account.billing.company }}</div>
            </div>
            <div class="address-checking-line" v-if="account.billing.type === 'company'">
                <div class="address-checking-name">{{ $t('Steuer ID Nr') }}:</div>
                <div class="dots"></div>
                <div CLASS="address-checking-total">{{ account.billing.stid }}</div>
            </div>
            <div class="address-checking-line">
                <div class="address-checking-name">{{ $t('Greeting') }}:</div>
                <div class="dots"></div>
                <div CLASS="address-checking-total">{{ account.billing.person.addr }}</div>
            </div>
            <div class="address-checking-line">
                <div class="address-checking-name">{{ $t('First Name') }}:</div>
                <div class="dots"></div>
                <div CLASS="address-checking-total">{{ account.billing.person.first_name }}</div>
            </div>
            <div class="address-checking-line">
                <div class="address-checking-name">{{ $t('Last name') }}:</div>
                <div class="dots"></div>
                <div CLASS="address-checking-total">{{ account.billing.person.last_name }}</div>
            </div>
            <div class="address-checking-line">
                <div class="address-checking-name">{{ $t('Street address') }}:</div>
                <div class="dots"></div>
                <div CLASS="address-checking-total">{{ account.billing.address.street }}</div>
            </div>
            <div class="address-checking-line">
                <div class="address-checking-name">{{ $t('House Nr') }}:</div>
                <div class="dots"></div>
                <div CLASS="address-checking-total">{{ account.billing.address.house }}</div>
            </div>
            <div class="address-checking-line">
                <div class="address-checking-name">{{ $t('Postcode') }}:</div>
                <div class="dots"></div>
                <div CLASS="address-checking-total">{{ account.billing.address.postcode }}</div>
            </div>
            <div class="address-checking-line">
                <div class="address-checking-name">{{ $t('City') }}:</div>
                <div class="dots"></div>
                <div class="address-checking-total">{{ account.billing.address.city }}</div>
            </div>
            <div class="address-checking-line">
                <div class="address-checking-name">{{ $t('Country') }}:</div>
                <div class="dots"></div>
                <div CLASS="address-checking-total">{{ account.billing.address.country }}</div>
            </div>
        </div>
    </section>

</template>

<script>
export default {
    name: "BillingAddressSummary",
    props: ['account'],
    methods: {
        toAccountData() {
            this.$emit('toAccountData', '');
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
    .billing-address-checking {
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
        .address-checking-line {
            &:not(:last-of-type) {
                margin-bottom: 12px;
            }
            display: flex;
            align-items: flex-end;
        }
        .address-checking-name {
            margin-right: 10px;
            font-weight: 400;
            font-size: 16px;
            line-height: 140%;
            color: #545769;
            overflow: hidden;
            white-space: nowrap;
        }
        .address-checking-total {
            font-weight: 400;
            font-size: 16px;
            line-height: 140%;
            color: #333646;
            white-space: nowrap;
            flex-basis: 285px;
            margin-left: 10px;
        }
        .dots {
            flex-grow: 1;
            border-bottom: 1px dotted #545769;
            margin-bottom: 5px;
            opacity: 0.3;
        }
        background: #FFFFFF;
        box-shadow: 0 0 14px rgb(51 54 70 / 14%);
        border-radius: 12px;
        padding: 30px 16px;
        margin-bottom: 20px;
        max-width: 780px;
        width: 100%;
        position: relative;
    }
}

@media (max-width: 1040px) {
    .registration-section {
        .title {
            font-size: 18px;
        }
        .billing-address-checking {
            &::after {
                width: calc(100% - 32px);
            }
            max-width: none;
            border-radius: 0;
        }
    }
}
@media (max-width: 575px) {
    .registration-section {
        .billing-address-checking {
            .address-checking-total {
                flex-basis: auto;
                margin-left: 0;
            }
            .dots {
                display: none;
            }
        }
    }
}
@media (max-width: 479px) {
    .registration-section {
        .billing-address-checking {
            .address-checking-line {
                &:not(:last-of-type) {
                    margin-bottom: 26px;
                }
                flex-direction: column;
                align-items: flex-start;
            }
            .address-checking-name {
                span {
                    display: none;
                }
                margin-right: 0;
                margin-bottom: 12px;
            }
            .address-checking-total {
                min-width: auto;
            }
        }
    }
}

</style>
