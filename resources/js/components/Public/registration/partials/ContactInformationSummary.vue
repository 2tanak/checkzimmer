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
                    <div class="address-checking-total">+34149 994488</div>
                </div>
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Display the specified phone number') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ $t('Yes') }}</div>
                </div>
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Enable request via Whatsapp') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ $t('Yes') }}</div>
                </div>
            </div>
            <div class="address-checking-block">
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Landline phone number') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">+34149 994488</div>
                </div>
                <div class="address-checking-line">
                    <div class="address-checking-name">{{ $t('Display the specified phone number') }}:</div>
                    <div class="dots"></div>
                    <div class="address-checking-total">{{ $t('Yes') }}</div>
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

<style scoped>

</style>
