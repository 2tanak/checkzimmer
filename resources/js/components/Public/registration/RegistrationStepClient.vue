<template>
    <div id="wrapper">
        <section class="registration-section billing-section">
            <div class="billing-address-container">
                <div class="main-registration-content">
                    <BillingAddress :data="account.billing" v-model="account.billing" :validate="account.validate"
                                    @setContactAsBilling="setContactAsBilling" @setLegalAsBilling="setLegalAsBilling" @unsetLegalAsBilling="unsetLegalAsBilling"/>
                    <LegalAddress :data="account.post" v-model="account.post" @setContactAsBilling="setContactAsBilling" :validate="account.validate" v-if="!account.billing.match_address"/>
                    <ContactInformation :data="account.contact" v-model="account.contact" :validate="account.validate" />
                    <SpokenLanguage :data="account.languages" v-model="account.languages" :validate="account.validate" />

                    <a href="#" class="save" @click.prevent="saveAndContinue">{{ $t('Save and continue') }}</a>

                </div>
                <aside class="registration-sidebar">
                    <ChosenPlan :plan="plan" @backToPlans="backToPlans" />
                    <AdvertiseBlock />
                </aside>
            </div>
        </section>
    </div>
</template>

<script>
import RegistrationSteps from "./partials/RegistrationSteps";
import BillingAddress from "./partials/BillingAddress";
import LegalAddress from "./partials/LegalAddress";
import ContactInformation from "./partials/ContactInformation";
import SpokenLanguage from "./partials/SpokenLanguage";
import ChosenPlan from "./partials/ChosenPlan";
import AdvertiseBlock from "./partials/AdvertiseBlock";
export default {
    name: "RegistrationStepClient",
    props: ['account', 'plan'],
    components: {AdvertiseBlock, RegistrationSteps, ChosenPlan, SpokenLanguage, ContactInformation, BillingAddress, LegalAddress},
    mounted() {
        window.setTimeout( () => {
            let hash = window.location.hash;
            let top = 0;
            if (hash) {
                let elem = document.getElementById(hash.substr(1));
                if (elem) {
                    top = elem.offsetTop;
                }
            }
            window.scrollTo(0, top-100);
        }, 500);

    },
    methods: {
        backToPlans() {
            this.$emit('backToPlans', '');
        },
        saveAndContinue() {
            if (this.allValid) {
                this.$emit('dataProceed', '');
                this.$emit('validate', false);
                this.$emit('toPropertyData', '');
                return;
            }
            this.$emit('validate', true);
            window.setTimeout(() => {
                let element = jQuery('.error-text');
                let offs = jQuery(element).offset().top;
                console.log(offs);
                window.scroll(0, offs-200);
            }, 500);
        },
        setContactAsBilling() {
            let account = { ...this.account }
            account.contact.person.name = account.billing.person.addr + ' ' + account.billing.person.first_name + ' ' + account.billing.person.last_name;
            this.$emit('input', account);
        },
        setLegalAsBilling() {
            if (this.account.billing.match_address) {
                this.account.post.address = { ...this.account.billing.address }
                this.account.post.person = { ...this.account.billing.person }
            }
        },
        unsetLegalAsBilling() {
            this.account.post.address = {
                street: '',
                house: '',
                postcode: '',
                country: this.$t('Germany'),
                city: 'Leipzig'
            };
            this.account.post.person = {
                addr: this.$t('Mister'),
                first_name: '',
                last_name: '',
            }
        }
    },
    computed: {
        allValid() {
            return this.account.billing.person.first_name && this.account.billing.person.last_name // Billing
                && this.account.billing.address.street && this.account.billing.address.house &&  this.account.billing.address.postcode
                &&  this.account.billing.address.city
                // Post
                && this.account.post.person.first_name && this.account.post.person.last_name
                && this.account.post.address.street && this.account.post.address.house &&  this.account.post.address.postcode
                &&  this.account.post.address.city
                // Contact
                && this.account.contact.person.name && this.account.contact.email && this.account.contact.phone;

        }
    }
}
</script>

<style scoped>

</style>
