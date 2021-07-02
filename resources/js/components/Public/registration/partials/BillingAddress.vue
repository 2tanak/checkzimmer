<template>

    <section class="billing-address-section">
        <div class="title">{{ $t('Billing address') }}</div>
        <div class="type-company">
            <span>{{ $t('Select the type of company') }}:</span>
            <div class="type-company-links">
                <a href="#" class="private-person" @click.prevent="setAccountType('private')">{{ $t('Private person') }}</a>
                <a href="#" class="entity active" @click.prevent="setAccountType('company')">{{ $t('Legal entity') }}</a>
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
                    <input type="text" :placeholder="$t('Please enter your name')" name="name-input" id="name-input" v-model="data.person.first_name" @input="toContactDetails">
                    <span class="error-text visible" v-if="validate && !data.person.first_name">{{ $t('You did not provide a name') }}</span>
                </div>
                <div class="surname-block forms-line-block">
                    <label for="surname-input">{{ $t('Surname') }}:*</label>
                    <input type="text" :placeholder="$t('Enter your last name')" name="surname-input" id="surname-input" v-model="data.person.last_name" @input="toContactDetails">
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
                    <input type="text" :placeholder="$t('House number')" id="house-number-input" name="house-number-input" v-model="data.address.house" @input="setLegalAsBilling">
                    <span class="error-text visible" v-if="validate && !data.address.house">{{ $t('You have not indicated the house number') }}</span>
                </div>
            </div>

            <div class="forms-line">
                <div class="zip-block forms-line-block">
                    <label for="zip-input">{{ $t('Postcode') }}:*</label>
                    <input type="text" :placeholder="$t('Your postcode')" id="zip-input" name="zip-input" v-model="data.address.postcode" @input="setLegalAsBilling">
                    <span class="error-text visible" v-if="validate && !data.address.postcode">{{ $t('You have not provided a postal code') }}</span>
                </div>
                <div class="city-block forms-line-block">
                    <label for="city-input">{{ $t('City') }}:*</label>
                    <input type="text" :placeholder="$t('Enter your city')" id="city-input" name="city-input" v-model="data.address.city" @input="setLegalAsBilling">
                    <span class="error-text visible" v-if="validate && !data.address.city">{{ $t('You have not specified a city') }}</span>
                </div>
                <div class="country-block forms-line-block">
                    <label for="country-select">{{ $t('Country') }}:*</label>
                    <v-select id="country-select" v-model="data.address.country" :options="optionsCountry" @input="setLegalAsBilling"></v-select>
                </div>
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

<style scoped>

</style>

