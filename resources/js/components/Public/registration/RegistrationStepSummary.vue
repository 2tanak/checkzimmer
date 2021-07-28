<template>
    <section class="registration-section data-checking-section">
        <div class="billing-address-container">
            <div class="main-registration-content">
                <BillingAddressSummary :account="account" @toAccountData="toAccountData" />
                <ContactInformationSummary :account="account" @toAccountData="toAccountData"  />
                <PropertyDataSummary :property="account.property"  @toPropertyData="toPropertyData" />
                <PropertyFacilities :facilities="account.property.facilities" :readonly="true" :filtered="true" />
                <PropertyMediaSummary :media="account.property.media" @toPropertyData="toPropertyData" />
                <div class="familiarization">
                    <div class="checkbox-line legal-address-line">
                        <input type="checkbox" id="got-acquainted" v-model="agreement">
                        <label for="got-acquainted">{{ $t('I got acquainted with') }} <span>{{ $t('conditions') }}</span>,
                            <span>{{ $t('cancellation policy') }}</span> {{ $t('and the data protection regulations of the provider, and I agree to the execution of my application.') }}</label>
                    </div>
                </div>

                <a href="#" class="save" @click.prevent="processApplication">{{ $t('Confirm with payment obligation') }}</a>

                <div class="duration">
                    * {{ $t('Duration 12 months with automatic machine. Renewal. Notice period 4 weeks. Payback procedure (§ 13b UStG) for clients staying abroad') }}
                </div>

            </div>
            <aside class="registration-sidebar">
                <ChosenPlan :plan="plan" @backToPlans="backToPlans" />
                <AdvertiseBlock />
            </aside>
        </div>

        <div :class="{'modal-overlay': true, 'modal-show': modalError}" id="modal-error" @click="modalCloseErr">
            <div class="register-modal">
                <div class="modal-close">
                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z" fill="#545769"></path>
                    </svg>
                </div>
                <div class="modal-title text-danger">{{ $t('Please accept our terms and conditions before proceed') }}</div>
                <p style="font-size:18px;">{{ $t('We won\'t be able to process your application unril you approved our agreements') }}.</p>
            </div>
        </div>

        <div :class="{'modal-overlay': true, 'modal-show': modalFail}" id="modal-fail" @click="modalCloseFail">
            <div class="register-modal">
                <div class="modal-close">
                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z" fill="#545769"></path>
                    </svg>
                </div>
                <div style="text-align:center;">
                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="28" cy="28" r="28" fill="#FFE7E6"/>
                        <rect x="25" y="36" width="6" height="6" rx="3" fill="#EE483F"/>
                        <rect x="26" y="15" width="4" height="18" rx="2" fill="#EE483F"/>
                    </svg>
                    <div class="modal-title text-danger">{{ $t('Error') }}</div>
                    <p style="margin-bottom:0;font-weight:400;color:#545769;line-height:150%;font-size:15px;width:100%;max-width:384px;">{{ $t('It seems something went wrong on our side. Your application was saved, please try again later from this browser') }}.</p>
                </div>
            </div>
        </div>

        <div :class="{'modal-overlay': true, 'modal-show': modalOk}" id="modal-accepted" @click="modalCloseOk">
            <div class="register-modal">
                <div class="modal-close">
                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z" fill="#545769"></path>
                    </svg>
                </div>
                <div style="text-align:center;">
                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="28" cy="28" r="28" fill="#E1FCD2"/>
                        <path d="M38.7625 20.5703C38.4112 20.2272 37.936 20.0347 37.4407 20.0347C36.9453 20.0347 36.4701 20.2272 36.1188 20.5703L24.9625 31.0703L19.9375 26.3545C19.5795 26.0126 19.0978 25.8243 18.5985 25.8312C18.0992 25.8381 17.6231 26.0396 17.275 26.3914C16.9269 26.7432 16.7353 27.2164 16.7424 27.7069C16.7494 28.1975 16.9545 28.6652 17.3125 29.0072L23.6688 35.0493C24.0184 35.3813 24.4857 35.5669 24.9719 35.5669C25.4582 35.5669 25.9254 35.3813 26.275 35.0493L38.725 23.1861C38.9033 23.0173 39.0457 22.8155 39.1441 22.5924C39.2425 22.3692 39.295 22.1291 39.2985 21.8859C39.302 21.6427 39.2564 21.4013 39.1644 21.1755C39.0724 20.9497 38.9359 20.744 38.7625 20.5703Z" fill="#3B8B3E"/>
                    </svg>
                    <div class="modal-title">{{ $t('Thank you') }}!</div>
                    <p style="margin-bottom:0;font-weight:400;color:#545769;line-height:150%;font-size:15px;width:100%;max-width:384px;">{{ $t('Your application has been successfully completed') }}.</p>
                </div>
            </div>
        </div>

    </section>
</template>

<script>
import ChosenPlan from "./partials/ChosenPlan";
import PromoBlock from "../partials/PromoBlock";
import PropertyFacilities from "./partials/PropertyFacilities";
import BillingAddressSummary from "./partials/BillingAddressSummary";
import ContactInformationSummary from "./partials/ContactInformationSummary";
import PropertyData from "./partials/PropertyData";
import PropertyMediaSummary from "./partials/PropertyMediaSummary";
import AdvertiseBlock from "./partials/AdvertiseBlock";
import PropertyDataSummary from "./partials/PropertyDataSummary";
export default {
    name: "RegistrationStepSummary",
    props: ['account', 'plan'],
    data() {
        return {
            agreement: true,
            modalError: false,
            modalFail: false,
            modalOk: false,
        }
    },
    components: {
        PropertyDataSummary,
        AdvertiseBlock,
        PropertyMediaSummary,
        PropertyData,
        ContactInformationSummary, BillingAddressSummary, PropertyFacilities, PromoBlock, ChosenPlan},
    mounted() {
        window.scrollTo(0, 0);
    },
    methods: {
        backToPlans() {
            this.$emit('backToPlans', '');
        },
        toAccountData() {
            this.$emit('toAccountData', '');
        },
        toPropertyData() {
            this.$emit('toPropertyData', '');

        },
        modalCloseErr() {
            this.modalError = false;
        },
        modalCloseOk() {
            this.modalOk = false;
            this.$emit('dataProceed', '');
            document.location = '/';
        },
        modalCloseFail() {
            this.modalFail = false;
        },
        processApplication() {
            if (!this.agreement) {
                this.modalFail = true;
                return;
            }
            axios.post('/registration', this.account)
                .then( resp => {
                    this.modalOk = true;
                }).catch( resp => {
                    this.modalFail = true;
                });

        }
    }
}
</script>

<style scoped>

</style>
