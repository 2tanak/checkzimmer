<template>

    <section class="billing-address-section legal-address-section">
        <div class="title">{{ $t('Legal address') }}</div>

        <form class="billing-address-form">

            <div class="forms-line company-line">
                <div class="company-name forms-line-block">
                    <label for="legal-company">{{ $t('Company Name') }}:</label>
                    <input type="text" :placeholder="$t('Please enter your company name')" id="legal-company" name="name-company" v-model="data.company">
                </div>
            </div>

            <div class="forms-line">
                <div class="name-block forms-line-block">
                    <label for="name-input-legal">{{ $t('Name') }}:*</label>
                    <input class="only-text" type="text" :placeholder="$t('Please enter your name')" name="name-input" id="name-input-legal" v-model="data.person.first_name" @input="toContactDetails">
                    <span class="error-text visible"v-if="validate && !data.person.first_name">{{ $t('You did not provide a name') }}</span>
                </div>
                <div class="surname-block forms-line-block">
                    <label for="surname-input-legal">{{ $t('Surname') }}:*</label>
                    <input class="only-text" type="text" :placeholder="$t('Enter your last name')" name="surname-input" id="surname-input-legal" v-model="data.person.last_name" @input="toContactDetails">
                    <span class="error-text visible" v-if="validate && !data.person.last_name">{{ $t('You did not enter your last name') }}</span>
                </div>
            </div>

            <div class="forms-line">
                <div class="street-block forms-line-block">
                    <label for="street-input-legal">{{ $t('Street') }}:*</label>
                    <input type="text" :placeholder="$t('Indicate your street')" id="street-input-legal" name="street-input" v-model="data.address.street">
                    <span class="error-text visible" v-if="validate && !data.address.street">{{ $t('You have not indicated the street') }}</span>
                </div>
                <div class="house-number-block forms-line-block">
                    <label for="house-number-input-legal">{{ $t('House number') }}:*</label>
                    <input type="number" :placeholder="$t('House number')" id="house-number-input-legal" name="house-number-input" v-model="data.address.house">
                    <span class="error-text visible" v-if="validate && !data.address.house">{{ $t('You have not indicated the house number') }}</span>
                </div>
            </div>

            <div class="forms-line" v-if="!data.match_address">
                <div class="zip-block forms-line-block">
                    <label for="zip-input-legal">{{ $t('Postcode (register)') }}:*</label>
                    <input type="number" :placeholder="$t('Postcode (register)')" id="zip-input-legal" name="zip-input" v-model="data.address.postcode">
                    <span class="error-text visible" v-if="validate && !data.address.postcode">{{ $t('You have not provided a postal code') }}</span>
                </div>
                <div class="city-block forms-line-block">
                    <label for="city-input-legal">{{ $t('City') }}:*</label>
                    <input class="only-text" type="text" :placeholder="$t('Enter your city')" id="city-input-legal" name="city-input-legal" v-model="data.address.city">
                    <span class="error-text visible" v-if="validate && !data.address.city">{{ $t('You have not specified a city') }}</span>
                </div>
                <div class="country-block forms-line-block">
                    <label for="country-select-legal">{{ $t('Country') }}:*</label>
                    <v-select id="country-select-legal" v-model="data.address.country" :options="optionsCountry"></v-select>
                </div>
            </div>
        </form>

    </section>


</template>

<script>
export default {
    name: "LegalAddress",
    props: ['data', 'validate'],
    data() {
        return {
            optionsCountry: [ this.$t('Germany'), this.$t('Russia'), this.$t('USA')  ]
        }
    },
    methods: {
        toContactDetails() {
            this.$emit('setContactAsBilling', '');
        },
    },
    mounted() {
        jQuery(document).on('keypress', '.only-text', function (event) {
            var regex = new RegExp("^[a-zA-Z ]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });
    }
}
</script>

<style lang="scss">

.registration-section {
    .billing-address-section {
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
            box-shadow: 0 4px 30px rgba(51, 54, 70, 0.16);
            border-radius: 14px;
            z-index: -1;
        }
        background: #FFFFFF;
        box-shadow: 0 0 14px rgba(51, 54, 70, 0.14);
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
    input {
        &::-webkit-input-placeholder {
            font-weight: 400;
            font-size: 15px;
            line-height: 100%;
            color: #8F98A2;
        }
        &::-moz-placeholder {
            font-weight: 400;
            font-size: 15px;
            line-height: 100%;
            color: #8F98A2;
        }
        &:-moz-placeholder {
            font-weight: 400;
            font-size: 15px;
            line-height: 100%;
            color: #8F98A2;
        }
        &:-ms-input-placeholder {
            font-weight: 400;
            font-size: 15px;
            line-height: 100%;
            color: #8F98A2;
        }
    }
    .billing-address-section.legal-address-section {
        .company-name {
            width: 100%;
        }
        form {
            .name-block {
                width: 50%;
                max-width: none;
                margin-right: 20px;
                position: relative;
            }
            .surname-block {
                 width: 50%;
                 max-width: none;
                 position: relative;
             }
        }
    }
    form {
        .street-block {
            width: 100%;
            max-width: 596px;
            margin-right: 20px;
            position: relative;
        }
        .house-number-block {
            width: 100%;
            max-width: 132px;
            position: relative;
        }
        .zip-block {
            width: 100%;
            max-width: 150px;
            margin-right: 20px;
            position: relative;
        }
        .city-block {
            width: 100%;
            max-width: 288px;
            margin-right: 20px;
            position: relative;
        }
        .country-block {
            width: 100%;
            max-width: 288px;
        }
        label {
            margin-bottom: 16px;
            font-weight: 500;
            font-size: 16px;
            line-height: 100%;
            color: #545769;
        }
        input[type="text"] {
            &:focus {
                background: #FFFFFF;
                border: 1px solid #C0C1C2;
                border-radius: 6px;
                box-shadow: 0 0 0 4px rgb(243 243 243 / 90%);
            }
            width: 100%;
            height: 54px;
            background: #F3F3F3;
            border-radius: 6px;
            border: 0;
            font-weight: 400;
            font-size: 15px;
            line-height: 100%;
            color: #333646;
            padding: 0 13px;
            outline: none;
        }
        [type="email"] {
            &:focus {
                background: #FFFFFF;
                border: 1px solid #C0C1C2;
                border-radius: 6px;
                box-shadow: 0 0 0 4px rgb(243 243 243 / 90%);
            }
            width: 100%;
            height: 54px;
            background: #F3F3F3;
            border-radius: 6px;
            border: 0;
            font-weight: 400;
            font-size: 15px;
            line-height: 100%;
            color: #333646;
            padding: 0 13px;
            outline: none;
        }
        [type="tel"] {
            &:focus {
                background: #FFFFFF;
                border: 1px solid #C0C1C2;
                border-radius: 6px;
                box-shadow: 0 0 0 4px rgb(243 243 243 / 90%);
            }
            width: 100%;
            height: 54px;
            background: #F3F3F3;
            border-radius: 6px;
            border: 0;
            font-weight: 400;
            font-size: 15px;
            line-height: 100%;
            color: #333646;
            padding: 0 13px;
            outline: none;
        }
        [type="number"] {
            &:focus {
                background: #FFFFFF;
                border: 1px solid #C0C1C2;
                border-radius: 6px;
                box-shadow: 0 0 0 4px rgb(243 243 243 / 90%);
            }
            &::-webkit-outer-spin-button {
                display: none;
                -webkit-appearance: none;
                margin: 0;
            }
            &::-webkit-inner-spin-button {
                display: none;
                -webkit-appearance: none;
                margin: 0;
            }
            width: 100%;
            height: 54px;
            background: #F3F3F3;
            border-radius: 6px;
            border: 0;
            font-weight: 400;
            font-size: 15px;
            line-height: 100%;
            color: #333646;
            padding: 0 13px;
            outline: none;
        }
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
    .company-line {
        transition: all 0.2s;
    }
    .forms-line-block {
        position: relative;
    }
}


@media (max-width: 1040px) {
    .registration-section {
        .title {
            font-size: 18px;
        }
        .billing-address-section {
            max-width: none;
            border-radius: 0;
        }
        form {
            .street-block {
                max-width: none;
            }
            .house-number-block {
                max-width: none;
            }
            .city-block {
                max-width: none;
            }
            .country-block {
                max-width: none;
            }
        }
    }
}
@media (max-width: 575px) {
    .registration-section {
        .billing-address-section.legal-address-section {
            form {
                .name-block {
                    width: 100%;
                    margin-right: 0;
                    margin-bottom: 24px;
                }
                .surname-block {
                    width: 100%;
                }
            }
        }
        form {
            .street-block {
                margin-right: 0;
                margin-bottom: 24px;
            }
            .zip-block {
                max-width: none;
                margin-right: 0;
                margin-bottom: 24px;
            }
            .city-block {
                margin-right: 0;
                margin-bottom: 24px;
            }
        }
    }
}

</style>
