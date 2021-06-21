<template>
    <div class="wrapper">
        <RegistrationSteps v-if="step > 1" :step="step" />

        <RegistrationStepPlans v-if="step === 1" :planActive="planActive" :plans="plans" :questions="questions" v-model="account.plan" @input="toAccountData"/>
        <RegistrationStepClient v-else-if="step === 2" v-model="account" :account="account" :plan="plans[account.plan]" @backToPlans="choosePlan" @toPropertyData="toPropertyData"/>
        <RegistrationStepProperty v-else-if="step === 3" v-model="account" :account="account" :plan="plans[account.plan]" @backToPlans="choosePlan" @toPropertyData="toPropertyData"/>
    </div>
</template>

<script>
require('../../bootstrap');

import RegistrationStepProperty from "./registration/RegistrationStepProperty";
import RegistrationSteps from "./registration/partials/RegistrationSteps";
import RegistrationStepPlans from "./registration/RegistrationStepPlans";
import RegistrationStepClient from "./registration/RegistrationStepClient";

export default {
    name: "Registration",
    components: {RegistrationStepProperty, RegistrationSteps, RegistrationStepClient, RegistrationStepPlans},
    data() {
        return {
            step: 3,
            planActive: 'popular',
            plans: {
                intro: {
                    title: this.$t('Intro'),
                    price: 39,
                    annual: 468,
                    description: this.$t('For most businesses that want to optimize web queries'),
                    options: [
                        { text: this.$t('Own analytics platform'), active: true },
                        { text: this.$t('Chat support'), active: true },
                        { text: this.$t('Unlimited options'), active: true },
                        { text: this.$t('Optimization'), active: true },
                        { text: this.$t('Phone support'), adtive: false },
                        { text: this.$t('Special application'), active: false }
                    ]
                },
                base: {
                    title: this.$t('Base'),
                    price: 99,
                    annual: 468,
                    description: this.$t('For most businesses that want to optimize web queries'),
                    options: [
                        { text: this.$t('Own analytics platform'), active: true },
                        { text: this.$t('Chat support'), active: true },
                        { text: this.$t('Unlimited options'), active: true },
                        { text: this.$t('Optimization'), active: true },
                        { text: this.$t('Phone support'), active: true },
                        { text: this.$t('Special application'), active: false }
                    ]
                },
                popular: {
                    title: this.$t('Popular'),
                    price: 129,
                    annual: 468,
                    description: this.$t('For most businesses that want to optimize web queries'),
                    options: [
                        { text: this.$t('Own analytics platform'), active: true },
                        { text: this.$t('Chat support'), active: true },
                        { text: this.$t('Unlimited options'), active: true },
                        { text: this.$t('Optimization'), active: true },
                        { text: this.$t('Phone support'), active: true },
                        { text: this.$t('Special application'), active: true }
                    ]
                },
                enterprise: {
                    title: this.$t('Enterprise'),
                    price: 229,
                    annual: 468,
                    description: this.$t('For most businesses that want to optimize web queries'),
                    options: [
                        { text: this.$t('Own analytics platform'), active: true },
                        { text: this.$t('Chat support'), active: true },
                        { text: this.$t('Unlimited options'), active: true },
                        { text: this.$t('Optimization'), active: true },
                        { text: this.$t('Phone support'), active: true },
                        { text: this.$t('Special application'), active: true }
                    ]
                }
            },
            questions: [
                {
                    text: 'What is the best pricing plan?',
                    reply: 'Text 1'
                },
                {
                    text: 'How many real-estate objects do you have in your database?',
                    reply: '<p>Есть два варианта проверки обратных ссылок для сайта или отдельной страницы. Первый\n' +
                        '                                        работает только для ваших собственных сайтов. Второй можно применять для проверки\n' +
                        '                                        обратных ссылок на чужие сайты или страницы.</p>\n' +
                        '                                    <p>Инструмент Google Search Console предоставляет вам сведения об органическом поисковом\n' +
                        '                                        трафике и общей производительности вашего сайта. Это бесплатный инструмент — просто\n' +
                        '                                        зарегистрируйтесь и подтвердите, что вы являетесь владельцем сайта.</p>'
                },
                {
                    text: 'Our team is very big (100 persons). Is it legal to book all the rooms for our monteruzimmer team?',
                    reply: 'Text 3'
                }
            ],
            account: {
                plan: 'intro',
                billing: {
                    type: '',
                    company: 'Test Name',
                    stid: 'A123',
                    person: {
                        addr: 'Mister',
                        first_name: '',
                        last_name: '',
                    },
                    address: {
                        street: '',
                        house: '',
                        postcode: '',
                        city: '',
                    },
                    match_address: false,
                    match_person: false
                },
                contact: {
                    person: {
                        addr: '',
                        first_name: '',
                        last_name: '',
                    },
                    email: '',
                    email_display: true,
                    phones: [
                        ''
                    ],
                    phone: '',
                    phone_display: true,
                    phone_whatsapp: false,
                    phone_fax: '',
                    phone_fax_enable: '',
                    website: '',
                    website_enable: false
                },
                languages: {}
            }
        }
    },
    methods: {
        choosePlan() {
            this.step = 1;
        },
        toAccountData() {
            this.step = 2;
        },
        toPropertyData() {
            this.step = 3;
        }
    }
}
</script>

<style scoped>

</style>
