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
                <p style="font-size:18px;">{{ $t('We won\'t be able to process your application unril you approved our agreements') }}</p>
            </div>
        </div>

        <div :class="{'modal-overlay': true, 'modal-show': modalFail}" id="modal-fail" @click="modalCloseFail">
            <div class="register-modal">
                <div class="modal-close">
                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z" fill="#545769"></path>
                    </svg>
                </div>
                <div class="modal-title text-danger">{{ $t('Your application was not sent') }}</div>
                <p style="font-size:18px;">{{ $t('It seems something went wrong on our side.') }}</p>
                <p style="font-size:16px;">{{ $t('Your application was saved, please try again later from this browser') }}</p>
                <p style="font-size:16px;">{{ $t('In case of any concerns please contact us') }}</p>
            </div>
        </div>

        <div :class="{'modal-overlay': true, 'modal-show': modalOk}" id="modal-accepted" @click="modalCloseOk">
            <div class="register-modal">
                <div class="modal-close">
                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z" fill="#545769"></path>
                    </svg>
                </div>
                <div class="modal-title">{{ $t('Your registration request is pending') }}</div>
                <p style="font-size:18px;">{{ $t('We will review your application and send feedback') }}</p>
                <p style="font-size:16px;">{{ $t('In case of any concerns please contact us') }}</p>
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
