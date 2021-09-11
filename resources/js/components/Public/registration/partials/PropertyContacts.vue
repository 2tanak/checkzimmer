<template>
    <section class="contact-information-section">
        <div class="title">{{ $t('Contact Information') }}</div>
        <div class="checkbox-line transfer-line">
            <input type="checkbox" id="transfer" v-model="sameAsBilling" @input="setAsBilling">
            <label for="transfer">{{ $t('Migrate contact information from billing information') }}</label>
        </div>
        <form class="contact-information-form">
            <div class="forms-line">
                <div class="contact-person forms-line-block">
                    <label for="contact-person-input">
                        {{ $t('Contact person') }}:*
                        <a class="tooltip-link">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="9" cy="9" r="8.5" stroke="#6BB63F"/>
                                <path d="M7.90909 10.3835H9.52415V10.2386C9.53267 9.40767 9.83097 9.01989 10.5043 8.61506C11.3011 8.14205 11.821 7.51562 11.821 6.5142C11.821 5.02273 10.6193 4.15341 8.92756 4.15341C7.38068 4.15341 6.11932 4.96307 6.08097 6.66761H7.8196C7.84517 5.97301 8.3608 5.60227 8.91903 5.60227C9.49432 5.60227 9.95881 5.9858 9.95881 6.57812C9.95881 7.13636 9.55398 7.5071 9.02983 7.83949C8.31392 8.29119 7.91335 8.74716 7.90909 10.2386V10.3835ZM8.74858 13.1108C9.29403 13.1108 9.76705 12.6548 9.77131 12.0881C9.76705 11.5298 9.29403 11.0739 8.74858 11.0739C8.18608 11.0739 7.72159 11.5298 7.72585 12.0881C7.72159 12.6548 8.18608 13.1108 8.74858 13.1108Z" fill="#3B8B3E"/>
                            </svg>
                            <div class="tooltip person-tooltip">
                                {{ $t('See this tooltip for an example which could have any helpful hint') }}
                            </div>
                        </a>
                    </label>
                    <input class="only-text" type="text" :placeholder="$t('Indicate who is the contact person')" id="contact-person-input" name="contact-person-input" v-model="contact.person.name">
                    <span class="error-text visible" v-if="validate && !contact.person.name">{{ $t('You have not specified a contact person') }}</span>
                </div>
            </div>

            <div class="forms-line">
                <div class="email-address forms-line-block">
                    <label for="email-address-input">{{ $t('Email address') }}:*</label>
                    <input type="email" :placeholder="$t('Enter your email address')" id="email-address-input" name="email-address-input" v-model="contact.email">
                    <span class="error-text visible" v-if="validate && !contact.email">{{ $t('You did not enter your email') }}</span>
                    <div class="checkbox-line email-contacts-line">
                        <input type="checkbox" id="email-contacts" v-model="contact.email_display">
                        <label for="email-contacts">{{ $t('Display email address') }}</label>
                    </div>
                </div>
            </div>

            <div class="forms-line main-phone-line">
                <div class="number-phone main-phone-number forms-line-block">
                    <div class="number-phone-content">
                        <div class="number-phone-item">
                            <label for="number-phone-input">{{ $t("Phone number (register)") }}:*</label>
                            <div style="display:flex;align-items:center;width:100%;">
                                <input type="number" placeholder="+49 15168161326" id="number-phone-input" name="number-phone-input" v-model="contact.phone">
                                <a href="#" class="add-phone add-phone-desctope" @click.prevent="addNumber('two')" v-if="!numberDisplay.two">
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4 9C4 9.55228 4.44772 10 5 10C5.55228 10 6 9.55229 6 9V6H9C9.55228 6 10 5.55228 10 5C10 4.44772 9.55229 4 9 4L6 4V1C6 0.447715 5.55228 0 5 0C4.44772 0 4 0.447715 4 1V4L1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6H4V9Z" fill="#3B8B3E"/>
                                    </svg>
                                    {{ $t('Add another phone') }}
                                </a>
                            </div>
                            <span class="error-text visible" v-if="validate && !contact.phone">{{ $t('You did not provide your phone number') }}</span>
                        </div>
                    </div>
                    <div class="checkbox-line number-phone-show-line">
                        <input type="checkbox" id="number-phone-show" v-model="contact.phone_display" >
                        <label for="number-phone-show">{{ $t('Display this contact phone number') }}</label>
                    </div>
                    <div class="checkbox-line number-phone-watsapp-line">
                        <input type="checkbox" id="number-phone-watsapp" v-model="contact.phone_whatsapp">
                        <label for="number-phone-watsapp">{{ $t('Enable request for this number via Whatsapp (if the number is available on the network)') }}</label>
                    </div>
                </div>
            </div>

            <div class="forms-line additional-phone-line show" v-if="numberDisplay.two">
                <div class="number-phone additional-phone-number forms-line-block">
                    <div class="number-phone-content">
                        <div class="number-phone-item">
                            <label for="additional-number-phone-input">{{ $t('Additional phone number') }}:</label>
                            <div style="display:flex;align-items:center;width:100%;">
                                <input type="number" placeholder="+49 15168161326" id="additional-number-phone-input" name="additional-number-phone-input" v-model="contact.phoneAdditional">
                                <a href="#" class="add-phone add-phone-desctope" @click.prevent="addNumber('three')" v-if="!numberDisplay.three">
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4 9C4 9.55228 4.44772 10 5 10C5.55228 10 6 9.55229 6 9V6H9C9.55228 6 10 5.55228 10 5C10 4.44772 9.55229 4 9 4L6 4V1C6 0.447715 5.55228 0 5 0C4.44772 0 4 0.447715 4 1V4L1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6H4V9Z" fill="#3B8B3E"/>
                                    </svg>
                                    {{ $t('Add another phone') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox-line number-phone-show-line">
                        <input type="checkbox" id="additional-number-phone-show" v-model="contact.phoneAdditional_display">
                        <label for="additional-number-phone-show">{{ $t('Display this contact phone number') }}</label>
                    </div>
                    <div class="checkbox-line number-phone-watsapp-line">
                        <input type="checkbox" id="additional-number-phone-watsapp" v-model="contact.phoneAdditional_whatsapp">
                        <label for="additional-number-phone-watsapp">{{ $t('Enable request for this number via Whatsapp (if the number is available on the network)') }}</label>
                    </div>
                </div>
            </div>

            <div class="forms-line landline-phone-line show" v-if="numberDisplay.three">
                <div class="number-phone landline-phone-number forms-line-block">
                    <div class="number-phone-content">
                        <div class="number-phone-item">
                            <label for="landline-number-phone-input">{{ $t('Phone number (landline)') }}:</label>
                            <input type="number" placeholder="+49 15168161326" id="landline-number-phone-input" name="landline-number-phone-input" v-model="contact.phoneStat">
                        </div>
                    </div>
                    <div class="checkbox-line number-phone-show-line">
                        <input type="checkbox" id="landline-number-phone-show" v-model="contact.phoneStat_display">
                        <label for="landline-number-phone-show">{{ $t('Display this contact phone number') }}</label>
                    </div>
                </div>
            </div>

            <div :class="{'forms-line': true, 'fax-line': true, 'show': faxDisplay}">
                <div class="number-phone fax-number forms-line-block">
                    <div class="number-phone-content">
                        <div class="number-phone-item">
                            <label for="fax-input">{{ $t('Fax') }}:</label>
                            <input type="number" :placeholder="$t('Enter the fax number')" id="fax-input" name="fax-input" v-model="contact.phone_fax">
                        </div>
                    </div>
                </div>
            </div>

            <div :class="{'forms-line': true, 'url-line': true, 'show': urlDisplay}">
                <div class="number-phone url-address forms-line-block">
                    <div class="number-phone-content">
                        <div class="number-phone-item">
                            <label for="url-address-input">{{ $t('Your site url') }}:</label>
                            <input type="text" :placeholder="$t('Enter your website URL')" id="url-address-input" name="url-address-input" v-model="contact.website">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="add-links">
            <a href="#" class="add-phone add-phone-mobile" @click.prevent="addNumber('two')" v-if="!numberDisplay.two">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 9C4 9.55228 4.44772 10 5 10C5.55228 10 6 9.55229 6 9V6H9C9.55228 6 10 5.55228 10 5C10 4.44772 9.55229 4 9 4L6 4V1C6 0.447715 5.55228 0 5 0C4.44772 0 4 0.447715 4 1V4L1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6H4V9Z" fill="#3B8B3E"/>
                </svg>
                {{ $t('Add another phone') }}
            </a>
            <a href="#" class="add-fax" @click.prevent="showFax" v-if="!faxDisplay">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 9C4 9.55228 4.44772 10 5 10C5.55228 10 6 9.55229 6 9V6H9C9.55228 6 10 5.55228 10 5C10 4.44772 9.55229 4 9 4L6 4V1C6 0.447715 5.55228 0 5 0C4.44772 0 4 0.447715 4 1V4L1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6H4V9Z" fill="#3B8B3E"/>
                </svg>
                {{ $t('Add fax') }}
            </a>
            <a href="#" class="add-url" @click.prevent="showUrl" v-if="!urlDisplay">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 9C4 9.55228 4.44772 10 5 10C5.55228 10 6 9.55229 6 9V6H9C9.55228 6 10 5.55228 10 5C10 4.44772 9.55229 4 9 4L6 4V1C6 0.447715 5.55228 0 5 0C4.44772 0 4 0.447715 4 1V4L1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6H4V9Z" fill="#3B8B3E"/>
                </svg>
                {{ $t('Add your site url') }}
            </a>
        </div>

        <div class="display-request-form">
            <div class="checkbox-line">
                <input type="checkbox" id="display-request" v-model="contact.form_display">
                <label for="display-request">{{ $t('Display the request form, otherwise the ads will be received by phone') }}</label>
            </div>
        </div>

    </section>


</template>

<script>
export default {
    name: "PropertyContacts",
    props: ['contact', 'billing', 'validate'],
    data() {
        return {
            sameAsBilling: false,
            faxDisplay: false,
            urlDisplay: false,
            numberDisplay: {
                one: true,
                two: false,
                three: false
            }
        }
    },
    mounted() {
        document.addEventListener('DOMContentLoaded', function() {
            jQuery('a.add-phone').on('click', function(e) {
                e.preventDefault();
                jQuery(this).css('display', 'none');
            });

            jQuery('a.add-fax').click(function (e) {
                e.preventDefault();
                jQuery(this).css('display', 'none');
                jQuery('.fax-line').addClass('show');
            });

            jQuery('a.add-url').click(function (e) {
                e.preventDefault();
                jQuery(this).css('display', 'none');
                jQuery('.url-line').addClass('show');
            });
            jQuery(document).on('keypress', '.only-text', function (event) {
                var regex = new RegExp("^[a-zA-Z ]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            });

        });

    },
    methods: {
        setAsBilling() {
            this.sameAsBilling = !this.sameAsBilling;
            if (this.sameAsBilling) {
                let contact = { ...this.contact };
                contact.person.name = this.billing.addr + ' ' + this.billing.first_name + ' ' + this.billing.last_name;
                this.$emit('input', contact);
            }
        },
        addNumber(num) {
            this.numberDisplay[num] = true;
        },
        showFax() {
            this.faxDisplay = true;
        },
        showUrl() {
            this.urlDisplay = true;
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
    .contact-information-section {
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
        .contact-person {
            label {
                svg {
                    circle {
                        transition: all 0.2s;
                    }
                    path {
                        transition: all 0.2s;
                    }
                    transition: all 0.2s;
                    border-radius: 50%;
                }
                display: flex;
                align-items: center;
            }
            width: 100%;
            padding: 0 16px;
        }
        .checkbox-line {
            margin-top: 10px;
        }
        .title {
            padding: 0 16px;
        }
        background: #FFFFFF;
        box-shadow: 0 0 14px rgb(51 54 70 / 14%);
        border-radius: 12px;
        padding-top: 30px;
        margin-bottom: 20px;
        max-width: 780px;
        width: 100%;
        position: relative;
    }
    form {
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
        .forms-line {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
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
        .checkbox-line {
            display: flex;
            align-items: center;
        }
    }
    .contact-person {
        label {
            a {
                position: relative;
                margin-left: 7px;
                cursor: pointer;
            }
        }
    }
    .tooltip {
        &:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%) matrix(0.71, -0.7, -0.71, -0.71, 0, 0);
            width: 24.27px;
            height: 24.27px;
            background: #333646;
            border-radius: 2px;
            z-index: -1;
        }
        background: #333646;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.18);
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 400;
        font-size: 12px;
        line-height: 130%;
        color: #FFFFFF;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16);
        width: 282px;
        padding: 14px 12px;
        position: absolute;
        bottom: 24px;
        left: 50%;
        transform: translateX(-50%) scale(0.7);
        opacity: 0;
        visibility: hidden;
        transition: all 0.2s;
    }
    .checkbox-line {
        label {
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
            span {
                color: #3b8b3e;
                border-bottom: 1px solid #3b8b3e;
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
    .email-address {
        width: 100%;
        padding: 0 16px;
    }
    .number-phone {
        .number-phone-content {
            display: flex;
            align-items: flex-end;
        }
        a.add-phone {
            svg {
                margin-right: 6px;
                min-width: 10px;
                max-width: 10px;
            }
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            line-height: 100%;
            color: #3B8B3E;
            display: flex;
            align-items: center;
            margin-left: 20px;
        }
        width: 100%;
        padding: 0 16px;
    }
    .number-phone-item {
        input {
            max-width: 440px;
        }
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .number-phone.additional-phone-number {
        &::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #e3e4e6;
        }
        padding-top: 24px;
        position: relative;
    }
    .number-phone.landline-phone-number {
        &:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #e3e4e6;
        }
        padding-top: 24px;
        position: relative;
    }
    .number-phone.fax-number {
        &:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #e3e4e6;
        }
        padding-top: 24px;
        position: relative;
    }
    .number-phone.url-address {
        &:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #e3e4e6;
        }
        padding-top: 24px;
        position: relative;
    }
    .landline-phone-line {
        margin-bottom: 0 !important;
        height: 0;
        visibility: hidden;
        opacity: 0;
        transition: all 0.2s;
    }
    .fax-line {
        margin-bottom: 0 !important;
        height: 0;
        visibility: hidden;
        opacity: 0;
        transition: all 0.2s;
    }
    .url-line {
        margin-bottom: 0 !important;
        height: 0;
        visibility: hidden;
        opacity: 0;
        transition: all 0.2s;
    }
    .add-links {
        a {
            svg {
                margin-right: 6px;
                min-width: 10px;
                max-width: 10px;
            }
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            line-height: 100%;
            color: #3B8B3E;
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
        a.add-phone-mobile {
            display: none;
        }
        padding: 0 16px;
    }
    .additional-phone-line {
        margin-bottom: 0 !important;
        height: 0;
        visibility: hidden;
        opacity: 0;
        transition: all 0.2s;
    }
    .additional-phone-line.show {
        margin-bottom: 30px !important;
        height: auto;
        visibility: visible;
        opacity: 1;
    }
    .landline-phone-line.show {
        margin-bottom: 30px !important;
        height: auto;
        visibility: visible;
        opacity: 1;
    }
    .fax-line.show {
        margin-bottom: 30px !important;
        height: auto;
        visibility: visible;
        opacity: 1;
    }
    .url-line.show {
        height: auto;
        visibility: visible;
        opacity: 1;
    }
    input[type=checkbox]:checked + label {
        &::after {
            content: "";
        }
        &::before {
            background-color: #6BB63F;
            border-color: #6BB63F;
        }
    }
    label {
        a {
            &:hover {
                svg {
                    circle {
                        stroke: #6BB63F;
                    }
                    path {
                        fill: #ffffff;
                    }
                    background-color: #6BB63F;
                }
                .tooltip {
                    opacity: 1;
                    visibility: visible;
                    transform: translateX(-50%) scale(1);
                }
            }
        }
    }
    .subtitle {
        a {
            &:hover {
                svg {
                    circle {
                        stroke: #6BB63F;
                    }
                    path {
                        fill: #ffffff;
                    }
                    background-color: #6BB63F;
                }
                .tooltip {
                    opacity: 1;
                    visibility: visible;
                    transform: translateX(-50%) scale(1);
                }
            }
            position: relative;
            margin-left: 7px;
            cursor: pointer;
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
}
.data-section {
    .contact-information-section {
        max-width: 800px !important;
        margin-bottom: 30px !important;
    }
    .display-request-form {
        padding: 20px 16px 0 16px;
        border-top: 2px solid #E3E4E6;
        margin-top: 30px;
        display: block;
    }
    .transfer-line {
        display: block;
        padding: 0 16px;
        margin-top: 0;
        margin-bottom: 30px;
    }
}
.billing-section {
    .transfer-line {
        display: none;
    }
}




@media (max-width: 1040px) {
    .registration-section {
        .title {
            font-size: 18px;
        }
        .contact-information-section {
            &::after {
                width: calc(100% - 32px);
            }
            display: flex;
            flex-direction: column;
            max-width: none;
            border-radius: 0;
        }
        form {
            .checkbox-line {
                label {
                    font-size: 14px;
                }
            }
        }
    }
}
@media (max-width: 575px) {
    .registration-section {
        .number-phone-item {
            input {
                max-width: none;
            }
            max-width: none;
            margin-right: 0;
        }
        .number-phone {
            a.add-phone-desctope {
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
        .url-line.show {
            padding-bottom: 30px !important;
        }
        .add-links {
            a.add-phone-mobile {
                display: inline-block;
                margin-bottom: 0 !important;
                margin-top: 0;
            }
            margin-bottom: 30px;
        }
    }
    .data-section {
        .contact-information-section {
            .display-request-form {
                margin-top: 0;
                margin-bottom: 30px;
            }
            padding-bottom: 0;
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
                &::after {
                    top: 6px !important;
                }
            }
        }
    }
}

</style>
