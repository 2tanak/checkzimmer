<template>
    <section class="billing-address-checking contact-information-checking">
        <div class="title">
            {{ $t('Contact Information') }}
            <a href="#" @click.prevent="toAccountData('account-contact')">{{  $t('Change') }}</a>
        </div>
        <div class="address-checking-content">
            <div class="address-checking-block">
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Contact persone') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ account.contact.person.name }}</div>
                </div>
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Email') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ account.contact.email }}</div>
                </div>
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Display the specified Email address') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ account.contact.email_display ? $t('Yes') : $t('No') }}</div>
                </div>
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Phone') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ account.contact.phone }}</div>
                </div>
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Display this phone number') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ account.contact.phone_display ? $t('Yes') : $t('No') }}</div>
                </div>
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Enable WhatsApp for this phone') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ account.contact.phone_whatsapp ? $t('Yes') : $t('No') }}</div>
                </div>
            </div>
            <div class="address-checking-block">
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Additional phone number') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ account.contact.phoneAdditional }}</div>
                </div>
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Display the specified phone number') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ account.contact.phoneAdditional_display ? $t('Yes') : $t('No') }}</div>
                </div>
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Enable request via Whatsapp') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ account.contact.phoneAdditional_whatsapp ? $t('Yes') : $t('No') }}</div>
                </div>
            </div>
            <div class="address-checking-block">
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Landline phone number') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ account.contact.phoneStat }}</div>
                </div>
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Display the specified phone number') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ account.contact.phoneStat_display ? $t('Yes') : $t('No') }}</div>
                </div>
                <div class="address-checking-line" v-if="account.contact.phone_fax" >
                    <div class="address-checking-name">{{ $t('Fax') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ account.contact.phone_fax }}</div>
                </div>
                <div class="address-checking-line" v-if="account.contact.website" >
                    <div class="address-checking-name">{{ $t('Website URL') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ account.contact.website }}</div>
                </div>
            </div>
            <div class="address-checking-block">
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Legal address matches object address') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ account.contact.match_address ? $t('Yes') : $t('No') }}</div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "ContactInformationSummary",
    props: ['account'],
    methods: {
        toAccountData(hash) {
            window.location.hash = hash;
            this.$emit('toAccountData', '');
        }
    }
}
</script>

<style lang="scss">

.registration-section {
    .billing-address-checking.contact-information-checking {
        padding: 30px 0;
    }
    .title {
        padding: 0 16px;
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
    .error-text {
        font-weight: 400;
        font-size: 12px;
        line-height: 100%;
        color: #EE483F;
        margin-top: 8px;
        margin-bottom: 18px;
        display: none;
    }
    .error-text.visible {
        display: block;
    }
    .forms-line-block.error {
        input {
            border: 1px solid #EE483F;
            border-radius: 6px;
        }
        .error-text {
            display: block;
        }
    }
    .forms-line-block {
        position: relative;
    }
    .contact-information-checking {
        .address-checking-block {
            &:first-of-type {
                padding-top: 0;
            }
            &:last-of-type {
                padding-bottom: 0;
                border-bottom: 0;
            }
            .address-checking-line {
                padding: 0 16px;
            }
            padding-bottom: 25px;
            padding-top: 25px;
            border-bottom: 2px solid #e3e4e6;
        }
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
        .billing-address-checking.contact-information-checking {
            .address-checking-line {
                span {
                    display: none;
                }
                flex-direction: column;
                align-items: flex-start;
                margin-bottom: 24px;
            }
            .address-checking-name {
                margin-right: 0;
                margin-bottom: 12px;
                overflow: visible;
                white-space: normal;
            }
        }
        .billing-address-checking {
            .address-checking-total {
                flex-basis: auto;
            }
            .address-checking-total {
                margin-left: 0;
            }
            .dots {
                display: none;
            }
        }
        form {
            .forms-line {
                &:not(:last-of-type) {
                    margin-bottom: 24px;
                }
            }
        }
        .contact-information-checking {
            .address-checking-block {
                &:last-of-type {
                    .address-checking-line {
                        margin-bottom: 0;
                    }
                }
                padding: 0;
                border-bottom: 0;
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
                margin-right: 0;
                margin-bottom: 12px;
            }
            .address-checking-name span {
                display: none;
            }
            .address-checking-total {
                min-width: auto;
            }
        }
    }
}

</style>
