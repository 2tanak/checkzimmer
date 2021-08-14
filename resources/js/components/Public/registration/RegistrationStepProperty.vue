<template>
    <div class="wrapper">
        <section class="registration-section data-section">
            <div class="object-data-container">
                <div class="main-registration-content">
                    <PropertyData :property="account.property" v-model="account.property" />
                    <PropertyFacilities v-model="account.property.facilities" :facilities="account.property.facilities" />
                    <PropertyMedia v-model="account.property.media" :media="account.property.media" />
                    <PropertyContacts v-model="account.property.contact" :contact="account.property.contact" :billing="account.billing.person" :validate="account.validate"/>

                    <a href="#" class="save" @click.prevent="toSummary">{{ $t('Save and continue') }}</a>

                </div>
                <aside class="registration-sidebar">
                    <ChosenPlan :plan="plan" @backToPlans="backToPlans"/>
                    <AdvertiseBlock />
                </aside>
            </div>
        </section>
    </div>
</template>

<script>
import RegistrationSteps from "./partials/RegistrationSteps";
import ChosenPlan from "./partials/ChosenPlan";
import AdvertiseBlock from "./partials/AdvertiseBlock";
import PropertyData from "./partials/PropertyData";
import PropertyFacilities from "./partials/PropertyFacilities";
import PropertyMedia from "./partials/PropertyMedia";
import PropertyContacts from "./partials/PropertyContacts";
export default {
    name: "RegistrationStepProperty",
    props: ['plan', 'account'],
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
            window.location.hash = '';
        }, 500);
    },
    components: {
        PropertyContacts,
        PropertyMedia, PropertyFacilities, PropertyData, AdvertiseBlock, ChosenPlan, RegistrationSteps},
    methods: {
        backToPlans() {
            this.$emit('backToPlans', '');
        },
        toSummary() {
            if (this.allValid) {
                this.$emit('dataProceed', '');
                this.$emit('validate', false);
                this.$emit('toSummaryData', '');
                return;
            }
            this.$emit('validate', true);
            window.setTimeout(() => {
                let element = jQuery('.error-text');
                let offs = jQuery(element).offset().top;
                window.scroll(0, offs-200);
            }, 500);
        }
    },
    computed: {
        allValid() {
            return this.account.property.contact.person.name && this.account.property.contact.email && this.account.property.contact.phone
        }
    }
}
</script>

<style lang="scss">

.registration-section {
    a.save {
        &::after {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 0;
            background: #FFFFFF;
            box-shadow: 0 4px 30px rgba(107, 182, 63, 0.6);
            border-radius: 14px;
            z-index: -1;
            max-width: 720px;
            width: 100%;
            height: 33px;
        }
        width: 100%;
        height: 54px;
        background: #6BB63F;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-weight: 500;
        font-size: 16px;
        line-height: 100%;
        color: #FFFFFF;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16);
        position: relative;
    }
    .main-registration-content {
        margin-right: 20px;
        width: 100%;
    }
    .object-data-container {
        display: flex;
        align-items: flex-start;
        padding: 0 16px;
        width: 100%;
        max-width: 1232px;
        margin: 0 auto;
    }
    padding-bottom: 100px;
}

@media (max-width: 1040px) {
    .registration-section {
        a.save {
            &::after {
                width: calc(100% - 60px);
                max-width: none;
            }
            width: calc(100% - 32px);
            margin: 0 auto;
        }
        .registration-sidebar {
            width: 100%;
            margin-top: 20px;
        }
        .object-data-container {
            flex-direction: column-reverse;
            padding: 0;
        }
        .main-registration-content {
            margin-right: 0;
            width: 100%;
        }
        padding-bottom: 40px;
    }
}
@media (max-width: 575px) {
    .registration-section {
        a.save {
            padding: 0 16px;
            text-align: center;
        }
        .registration-sidebar {
            margin-top: 0;
        }
    }
}

</style>
