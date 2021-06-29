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

<style scoped>

</style>
