<template>

    <section class="billing-address-section">
        <div class="title">{{ $t('Billing address') }}</div>
        <div class="type-company">
            <span>{{ $t('Select the type of company') }}:</span>
            <div class="type-company-links">
                <a href="#" :class="{ 'private-person': true, 'active': data.type === 'private'}" @click.prevent="setAccountType('private')">{{ $t('Private person') }}</a>
                <a href="#" :class="{'entity': true, 'active': data.type === 'company'}" @click.prevent="setAccountType('company')">{{ $t('Legal entity') }}</a>
            </div>
        </div>

        <form class="billing-address-form">

            <div :class="{'forms-line': true, 'company-line': true, 'not-show': data.type === 'private' && !steurShow, 'steuer-show': steurShow && data.type === 'private'}">
                <div class="company-name forms-line-block">
                    <label for="name-company">{{ $t('Company Name') }}:</label>
                    <input type="text" :placeholder="$t('Please enter your company name')" id="name-company" name="name-company" v-model="data.company">
                </div>
                <div class="steuer forms-line-block">
                    <label for="steuer-input">{{ $t('Steuer ID Nr') }}:</label>
                    <input type="text" placeholder="DE300904393" name="steuer-input" id="steuer-input" v-model="data.stid">
                </div>
            </div>

            <div class="forms-line">
                <div class="greeting forms-line-block">
                    <label for="greeting-select">{{ $t('Greeting') }}:</label>
                    <v-select id="greeting-select" v-model="data.person.addr" :options="optionsPerson" @input="toContactDetails"></v-select>
                </div>
                <div class="name-block forms-line-block">
                    <label for="name-input">{{ $t('Name') }}:*</label>
                    <input class="only-text" type="text" :placeholder="$t('Please enter your name')" name="name-input" id="name-input" v-model="data.person.first_name" @input="toContactDetails">
                    <span class="error-text visible" v-if="validate && !data.person.first_name">{{ $t('You did not provide a name') }}</span>
                </div>
                <div class="surname-block forms-line-block">
                    <label for="surname-input">{{ $t('Surname') }}:*</label>
                    <input class="only-text" type="text" :placeholder="$t('Enter your last name')" name="surname-input" id="surname-input" v-model="data.person.last_name" @input="toContactDetails">
                    <span class="error-text visible" v-if="validate && !data.person.last_name">{{ $t('You did not enter your last name') }}</span>
                </div>
            </div>

            <div class="forms-line">
                <div class="street-block forms-line-block">
                    <label for="street-input">{{ $t('Street') }}:*</label>
                    <input type="text" :placeholder="$t('Indicate your street')" id="street-input" name="street-input" v-model="data.address.street" @input="setLegalAsBilling">
                    <span class="error-text visible" v-if="validate && !data.address.street">{{ $t('You have not indicated the street') }}</span>
                </div>
                <div class="house-number-block forms-line-block">
                    <label for="house-number-input">{{ $t('House number') }}:*</label>
                    <input type="number" :placeholder="$t('House number')" id="house-number-input" name="house-number-input" v-model="data.address.house" @input="setLegalAsBilling">
                    <span class="error-text visible" v-if="validate && !data.address.house">{{ $t('You have not indicated the house number') }}</span>
                </div>
            </div>

            <div class="forms-line">
                <div class="zip-block forms-line-block">
                    <label for="zip-input">{{ $t('Postcode (register)') }}:*</label>
                    <input type="number" :placeholder="$t('Postcode (register)')" id="zip-input" name="zip-input" v-model="data.address.postcode" @input="setLegalAsBilling">
                    <span class="error-text visible" v-if="validate && !data.address.postcode">{{ $t('You have not provided a postal code') }}</span>
                </div>
                <div class="city-block forms-line-block">
                    <label for="city-input">{{ $t('City') }}:*</label>
                    <input class="only-text" type="text" :placeholder="$t('Enter your city')" id="city-input" name="city-input" v-model="data.address.city" @input="setLegalAsBilling">
                    <span class="error-text visible" v-if="validate && !data.address.city">{{ $t('You have not specified a city') }}</span>
                </div>
                <div class="country-block forms-line-block">
                    <label for="country-select">{{ $t('Country') }}:*</label>
                    <v-select id="country-select" v-model="data.address.country" :options="optionsCountry" @input="setLegalAsBilling"></v-select>
                </div>
            </div>

            <div class="checkbox-line legal-address-line">
                <input type="checkbox" id="legal-address" v-model="data.match_address" @change="unsetLegalAsBilling">
                <label for="legal-address">{{ $t('The legal address is the same as the address of the object') }}</label>
            </div>

            <div class="checkbox-line transfer-contacts-line">
                <input type="checkbox" id="transfer-contacts" v-model="data.match_person" @change="toContactDetails">
                <label for="transfer-contacts">{{ $t('Migrate contact information from billing information') }}</label>
            </div>
        </form>

        <div :class="{'add-id': true, show: !steurShow && data.type === 'private'}">
            <a href="#" @click.prevent="showSteur">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 9C4 9.55228 4.44772 10 5 10C5.55228 10 6 9.55229 6 9V6H9C9.55228 6 10 5.55228 10 5C10 4.44772 9.55229 4 9 4L6 4V1C6 0.447715 5.55228 0 5 0C4.44772 0 4 0.447715 4 1V4L1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6H4V9Z" fill="#3B8B3E"/>
                </svg>
                {{ $t('Add Steuer ID') }}
            </a>
        </div>

    </section>


</template>

<script>
export default {
    name: "BillingAddress",
    props: [ 'data', 'validate' ],
    data() {
        return {
            account: this.data,
            optionsPerson: [ this.$t('Mister'), this.$t('Missis') ],
            optionsCountry: [ this.$t('Germany'), this.$t('Russia'), this.$t('USA')  ],
            steurShow: false,
        }
    },
    /*watch: {
        data() {
            this.props = data
        }
    },*/
    mounted() {
        jQuery(document).ready(function() {
            jQuery('.type-company-links a').click(function (e) {
                e.preventDefault();
                jQuery('.type-company-links a').removeClass('active');
                jQuery(this).addClass('active');
                //jQuery('.company-line').toggleClass('not-show');
                //jQuery('.add-id').toggleClass('show');
            });

            jQuery('.add-id a').click(function (e) {
                e.preventDefault();
                //jQuery('.company-line').removeClass('not-show');
                //jQuery('.company-line').addClass('steuer-show');
            });

            jQuery('.entity').click(function (e) {
                e.preventDefault();
                //jQuery('.company-line').removeClass('steuer-show');
                //jQuery('.company-line').removeClass('not-show');
            });
            jQuery(document).on('keypress', '.only-text', function (event) {
                var regex = new RegExp("^[a-zA-Z ]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            });
        })
    },
    methods: {
        setAccountType(type) {
            let billing = { ...this.data };
            billing.type = type
            if (type === 'private') {
                this.steurShow = false;
            }
            this.$emit('input', billing);
        },
        toContactDetails() {
            this.setContactAsBilling()
        },
        setContactAsBilling() {
            if (this.data.match_person) {
                this.$emit('setContactAsBilling', '');
            }
        },
        showSteur() {
            this.steurShow = !this.steurShow;
        },
        setLegalAsBilling() {
            this.$emit('setLegalAsBilling', '');
        },
        unsetLegalAsBilling() {
            if (this.data.match_address) {
                this.$emit('setLegalAsBilling', '');
                return;
            }

            this.$emit('unsetLegalAsBilling', '');
        }
    }
}
</script>

<style lang="scss">

.registration-section {
    .billing-address-section {
        &:after {
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
        form {
            .forms-line {
                &:last-of-type {
                    margin-bottom: 10px;
                }
            }
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
    .type-company {
        span {
            font-weight: 500;
            font-size: 16px;
            line-height: 100%;
            color: #545769;
        }
        margin-bottom: 30px;
    }
    .type-company-links {
        a {
            max-width: 374px;
            width: 100%;
            height: 44px;
            background: #FFFFFF;
            border: 1px solid #6BB63F;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            line-height: 100%;
            color: #3B8B3E;
            transition: all 0.2s;
        }
        a.private-person {
            border-radius: 6px 0 0 6px;
            border-right: 0;
        }
        a.entity {
            border-radius: 0 6px 6px 0;
        }
        a.active {
            color: #FFFFFF;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16);
            background: #6BB63F;
            border-color: #6BB63F;
        }
        display: flex;
        align-items: center;
        margin-top: 12px;
    }
    form {
        .forms-line {
            &:last-of-type {
                margin-bottom: 0;
            }
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
        }
        .checkbox-line {
            display: flex;
            align-items: center;
        }
        .legal-address-line {
            margin-bottom: 15px;
        }
        .company-name {
            width: 100%;
            max-width: 596px;
            margin-right: 20px;
        }
        .steuer {
            width: 100%;
            max-width: 132px;
        }
        .greeting {
            width: 100%;
            max-width: 132px;
            margin-right: 20px;
        }
        .name-block {
            width: 100%;
            max-width: 288px;
            margin-right: 20px;
            position: relative;
        }
        .surname-block {
            width: 100%;
            max-width: 288px;
            position: relative;
        }
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
        input[type="number"] {
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
        label {
            margin-bottom: 16px;
            font-weight: 500;
            font-size: 16px;
            line-height: 100%;
            color: #545769;
        }
    }
    .checkbox-line {
        label {
            span {
                color: #3b8b3e;
                border-bottom: 1px solid #3b8b3e;
            }
            &::before {
                content: "";
                display: inline-block;
                height: 20px;
                width: 20px;
                border: 2px solid #d9d9d9;
                left: 0;
                border-radius: 4px;
                transition: all 0.2s;
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
            }
            &::after {
                position: absolute;
                display: inline-block;
                border-left: 2px solid #fff;
                border-bottom: 2px solid #fff;
                transform: rotate(-45deg);
                left: 5px;
                top: 5px;
                height: 6px;
                width: 10px;
                transition: all 0.2s;
            }
            cursor: pointer;
            margin: 0;
            display: block;
            padding-left: 30px;
            position: relative;
            font-weight: 400;
            font-size: 14px;
            line-height: 130%;
            color: #545769;
        }
        input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            width: 20px;
            height: 20px;
        }
    }
    input[type=checkbox]:checked + label {
        &::before {
            background-color: #6BB63F;
            border-color: #6BB63F;
        }
        &::after {
            content: "";
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
    .company-line.not-show {
        height: 0;
        margin-bottom: 0 !important;
        opacity: 0;
        visibility: hidden;
    }
    .company-line.steuer-show {
        .company-name {
            width: 0;
            max-width: none;
            margin-right: 0;
            height: 0;
            opacity: 0;
            visibility: hidden;
            margin-bottom: 0;
        }
        .steuer {
            max-width: none;
        }
    }
    .add-id {
        height: 0;
        margin-top: 0;
        opacity: 0;
        visibility: hidden;
        transition: all 0.2s;
    }
    .add-id.show {
        opacity: 1;
        visibility: visible;
        margin-top: 30px;
        height: auto;
    }
    a {
        svg {
            display: block;
            margin-right: 6px;
        }
        display: flex;
        align-items: center;
        font-weight: 500;
        font-size: 16px;
        line-height: 100%;
        color: #3B8B3E;
        text-decoration: none;
    }
    .forms-line-block {
        position: relative;
    }
}

@media (max-width: 1040px) {
    .registration-section {
        .billing-address-section {
            &::after {
                width: calc(100% - 32px);
            }
            max-width: none;
            border-radius: 0;
        }
        .type-company-links {
            a {
                max-width: none;
            }
        }
        form {
            .name-block {
                max-width: none;
            }
            .surname-block {
                max-width: none;
            }
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
            .company-name {
                max-width: none;
            }
        }
        .title {
            font-size: 18px;
        }
    }
}
@media (max-width: 575px) {
    .registration-section {
        form {
            .forms-line {
                &:not(:last-of-type) {
                    margin-bottom: 24px;
                }
                flex-direction: column;
            }
            .steuer {
                max-width: none;
            }
            .greeting {
                width: 100%;
                margin-bottom: 24px;
                margin-right: 0;
                max-width: none;
            }
            .name-block {
                margin-right: 0;
                margin-bottom: 24px;
            }
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
            .company-name {
                margin-right: 0;
                margin-bottom: 24px;
                max-width: none;
            }
            .forms-line {
                a {
                    text-align: center;
                }
            }
        }
    }
}
@media (max-width: 479px) {
    .registration-section {
        .checkbox-line {
            label {
                &::before {
                    top: 0;
                    transform: none;
                }
                ::after {
                    top: 6px !important;
                }
            }
        }
    }
}

</style>

