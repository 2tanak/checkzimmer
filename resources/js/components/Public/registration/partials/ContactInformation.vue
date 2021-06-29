<template>
    <section class="contact-information-section">
        <div class="title">{{ $t('Contact Information') }}</div>
        <form class="contact-information-form">
            <div class="forms-line">
                <div class="contact-person forms-line-block">
                    <label for="contact-person-input">
                        {{ $t('Contact persone') }}:*
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
                    <input type="text" v-bind:placeholder="$t('Indicate who is the contact person')" id="contact-person-input" name="contact-person-input" v-model="data.person.name">
                    <span class="error-text">{{ $t('You have not specified a contact person') }}</span>
                </div>
            </div>

            <div class="forms-line">
                <div class="email-address forms-line-block">
                    <label for="email-address-input">{{ $t('Email address') }}:*</label>
                    <input type="email" v-bind:placeholder="$t('Enter your email address')" id="email-address-input" name="email-address-input" v-model="data.email">
                    <span class="error-text">{{ $t('You did not enter your email') }}</span>
                    <div class="checkbox-line email-contacts-line">
                        <input type="checkbox" id="email-contacts" v-model="data.email_display">
                        <label for="email-contacts">{{ $t('Display email address') }}</label>
                    </div>
                </div>
            </div>

            <div class="forms-line main-phone-line">
                <div class="number-phone main-phone-number forms-line-block">
                    <div class="number-phone-content">
                        <div class="number-phone-item">
                            <label for="number-phone-input">{{ $t("Phone number (register)") }}:*</label>
                            <input type="tel" placeholder="+49 15168161326" id="number-phone-input" name="number-phone-input" v-model="data.phone">
                            <span class="error-text">{{ $t('You did not provide your phone number') }}</span>
                        </div>
                        <a href="#" class="add-phone add-phone-desctope">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4 9C4 9.55228 4.44772 10 5 10C5.55228 10 6 9.55229 6 9V6H9C9.55228 6 10 5.55228 10 5C10 4.44772 9.55229 4 9 4L6 4V1C6 0.447715 5.55228 0 5 0C4.44772 0 4 0.447715 4 1V4L1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6H4V9Z" fill="#3B8B3E"/>
                            </svg>
                            {{ $t('Add another phone') }}
                        </a>
                    </div>
                    <div class="checkbox-line number-phone-show-line">
                        <input type="checkbox" id="number-phone-show" v-model="data.phone_display">
                        <label for="number-phone-show">{{ $t('Display this contact phone number') }}</label>
                    </div>
                    <div class="checkbox-line number-phone-watsapp-line">
                        <input type="checkbox" id="number-phone-watsapp" v-model="data.phone_whatsapp">
                        <label for="number-phone-watsapp">{{ $t('Enable request for this number via Whatsapp (if the number is available on the network)') }}</label>
                    </div>
                </div>
            </div>

            <div class="forms-line additional-phone-line">
                <div class="number-phone additional-phone-number forms-line-block">
                    <div class="number-phone-content">
                        <div class="number-phone-item">
                            <label for="additional-number-phone-input">{{ $t('Additional phone number') }}:</label>
                            <input type="tel" placeholder="+49 15168161326" id="additional-number-phone-input" name="additional-number-phone-input">
                        </div>
                        <a href="#" class="add-phone add-phone-desctope">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4 9C4 9.55228 4.44772 10 5 10C5.55228 10 6 9.55229 6 9V6H9C9.55228 6 10 5.55228 10 5C10 4.44772 9.55229 4 9 4L6 4V1C6 0.447715 5.55228 0 5 0C4.44772 0 4 0.447715 4 1V4L1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6H4V9Z" fill="#3B8B3E"/>
                            </svg>
                            {{ $t('Add another phone') }}
                        </a>
                    </div>
                    <div class="checkbox-line number-phone-show-line">
                        <input type="checkbox" id="additional-number-phone-show">
                        <label for="additional-number-phone-show">{{ $t('Display this contact phone number') }}</label>
                    </div>
                    <div class="checkbox-line number-phone-watsapp-line">
                        <input type="checkbox" id="additional-number-phone-watsapp">
                        <label for="additional-number-phone-watsapp">{{ $t('Enable request for this number via Whatsapp (if the number is available on the network)') }}</label>
                    </div>
                </div>
            </div>

            <div class="forms-line landline-phone-line">
                <div class="number-phone landline-phone-number forms-line-block">
                    <div class="number-phone-content">
                        <div class="number-phone-item">
                            <label for="landline-number-phone-input">{{ $t('Phone number (landline)') }}:</label>
                            <input type="tel" placeholder="+49 15168161326" id="landline-number-phone-input" name="landline-number-phone-input">
                        </div>
                    </div>
                    <div class="checkbox-line number-phone-show-line">
                        <input type="checkbox" id="landline-number-phone-show">
                        <label for="landline-number-phone-show">{{ $t('Display this contact phone number') }}</label>
                    </div>
                </div>
            </div>

            <div :class="{'forms-line': true, 'fax-line': true, 'show': data.fax_enable}">
                <div class="number-phone fax-number forms-line-block">
                    <div class="number-phone-content">
                        <div class="number-phone-item">
                            <label for="fax-input">{{ $t('Fax') }}:</label>
                            <input type="tel" v-bind:placeholder="$t('Enter the fax number')" id="fax-input" name="fax-input"  v-model="data.phone_fax">
                        </div>
                    </div>
                </div>
            </div>

            <div :class="{'forms-line': true, 'url-line': true, 'show': data.website_enable}">
                <div class="number-phone url-address forms-line-block">
                    <div class="number-phone-content">
                        <div class="number-phone-item">
                            <label for="url-address-input">{{ $t('Your site url') }}:</label>
                            <input type="text" v-bind:placeholder="$t('Enter your website URL')" id="url-address-input" name="url-address-input" v-model="data.website">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="add-links">
            <a href="#" class="add-phone add-phone-mobile">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 9C4 9.55228 4.44772 10 5 10C5.55228 10 6 9.55229 6 9V6H9C9.55228 6 10 5.55228 10 5C10 4.44772 9.55229 4 9 4L6 4V1C6 0.447715 5.55228 0 5 0C4.44772 0 4 0.447715 4 1V4L1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6H4V9Z" fill="#3B8B3E"/>
                </svg>
                {{ $t('Add another phone') }}
            </a>
            <a href="#" class="add-fax" @click.prevent="doShowFax" :style="{ display: data.fax_enable ? 'none' : 'block'}">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 9C4 9.55228 4.44772 10 5 10C5.55228 10 6 9.55229 6 9V6H9C9.55228 6 10 5.55228 10 5C10 4.44772 9.55229 4 9 4L6 4V1C6 0.447715 5.55228 0 5 0C4.44772 0 4 0.447715 4 1V4L1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6H4V9Z" fill="#3B8B3E"/>
                </svg>
                {{ $t('Add fax') }}
            </a>
            <a href="#" class="add-url" @click.prevent="doShowUrl" :style="{ display: data.website_enable ? 'none' : 'block'}">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 9C4 9.55228 4.44772 10 5 10C5.55228 10 6 9.55229 6 9V6H9C9.55228 6 10 5.55228 10 5C10 4.44772 9.55229 4 9 4L6 4V1C6 0.447715 5.55228 0 5 0C4.44772 0 4 0.447715 4 1V4L1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6H4V9Z" fill="#3B8B3E"/>
                </svg>
                {{ $t('Add your site url') }}
            </a>
        </div>

        <div class="display-request-form">
            <div class="checkbox-line">
                <input type="checkbox" id="display-request">
                <label for="display-request">{{ $t('Display the request form, otherwise the ads will be received by phone') }}</label>
            </div>
        </div>

    </section>

</template>

<script>
export default {
    name: "ContactInformation",
    props: [ 'data' ],
    data() {
        return {
            showFax: false,
            showUrl: false
        }
    },
    mounted() {
        document.addEventListener('DOMContentLoaded', function () {
            jQuery('a.add-phone').on('click', function (e) {
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

        });
    },
    methods: {
        doShowFax() {
            let contact = { ...this.data };
            contact.fax_enable = !contact.fax_enable;
            this.$emit('input', contact);
        },
        doShowUrl() {
            let contact = { ...this.data };
            contact.website_enable = !contact.website_enable;
            this.$emit('input', contact);
        }
    }
}
</script>

<style scoped>

</style>
