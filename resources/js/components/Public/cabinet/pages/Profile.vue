<template>
    <div class="container">
        <RegistrationStepClient
            v-model="account"
            :account="account"
            :plan="plans[account.plan]"
            @backToPlans="choosePlan"
            @toPropertyData="toPropertyData"
            @validate="validate"
            @dataProceed="dataProceed"
        />
    </div>
</template>

<script>
import RegistrationStepClient from "../../registration/RegistrationStepClient";
import axios from "axios";

export default {
    name: "profile",
    components: {
        RegistrationStepClient
    },
    data() {
        return {
           plans: {
                base: {
                    title: this.$t("Base"),
                    price: 0,
                    annual: 468,
                    description: this.$t("Our permanently free version"),
                    options: [
                        {
                            text: this.$t("Own analytics platform"),
                            active: true
                        },
                        { text: this.$t("Chat support"), active: true },
                        { text: this.$t("Unlimited options"), active: false },
                        { text: this.$t("Optimization"), active: false },
                        { text: this.$t("Phone support"), adtive: false },
                        { text: this.$t("Special application"), active: false },
                        { text: this.$t("own sub-domain"), active: false }
                    ]
                },
                intro: {
                    title: this.$t("Intro"),
                    price: 10,
                    annual: 468,
                    description: this.$t(
                        "Perfect for beginners with multiple objects"
                    ),
                    options: [
                        {
                            text: this.$t("Own analytics platform"),
                            active: true
                        },
                        { text: this.$t("Chat support"), active: true },
                        { text: this.$t("Unlimited options"), active: true },
                        { text: this.$t("Optimization"), active: true },
                        { text: this.$t("Phone support"), active: true },
                        { text: this.$t("Special application"), active: false },
                        { text: this.$t("own sub-domain"), active: false }
                    ]
                },
                popular: {
                    title: this.$t("Popular"),
                    price: 20,
                    annual: 468,
                    description: this.$t(
                        "Our recommendation for maximum profit"
                    ),
                    options: [
                        {
                            text: this.$t("Own analytics platform"),
                            active: true
                        },
                        { text: this.$t("Chat support"), active: true },
                        { text: this.$t("Unlimited options"), active: true },
                        { text: this.$t("Optimization"), active: true },
                        { text: this.$t("Phone support"), active: true },
                        { text: this.$t("Special application"), active: true },
                        { text: this.$t("own sub-domain"), active: false }
                    ]
                },
                enterprise: {
                    title: this.$t("Enterprise"),
                    price: 50,
                    annual: 468,
                    description: this.$t(
                        "The luxury version with its own page"
                    ),
                    options: [
                        {
                            text: this.$t("Own analytics platform"),
                            active: true
                        },
                        { text: this.$t("Chat support"), active: true },
                        { text: this.$t("Unlimited options"), active: true },
                        { text: this.$t("Optimization"), active: true },
                        { text: this.$t("Phone support"), active: true },
                        { text: this.$t("Special application"), active: true },
                        { text: this.$t("own sub-domain"), active: true }
                    ]
                }
            },

            account: {
                validate: false,
                plan: "intro",
                billing: {
                    type: "private",
                    company: "",
                    stid: "",
                    person: {
                        addr: this.$t("Mister"),
                        first_name: "",
                        last_name: ""
                    },
                    address: {
                        street: "",
                        house: "",
                        postcode: "",
                        country: this.$t("Germany"),
                        city: "Leipzig"
                    },
                    match_address: true,
                    match_person: false
                },
                post: {
                    person: {
                        addr: this.$t("Mister"),
                        first_name: "",
                        last_name: ""
                    },
                    address: {
                        street: "",
                        house: "",
                        postcode: "",
                        country: this.$t("Germany"),
                        city: "Leipzig"
                    }
                },
                contact: {
                    person: {
                        name: "",
                        addr: ""
                    },
                    email: "",
                    email_display: true,

                    phone: "",
                    phone_display: true,
                    phone_whatsapp: false,
                    phone_fax: "",
                    phone_fax_enable: "",
                    phoneAdditional: "",
                    phoneAdditional_display: false,
                    phoneAdditional_whatsapp: false,
                    phoneStat: "",
                    phoneStat_display: false,
                    website: "",
                    website_enable: false
                },
                languages: {
                    german: true,
                    english: false,
                    poland: false,
                    russian: false
                },
                property: {
                    contact: {
                        person: {
                            name: "",
                            addr: ""
                        },
                        email: "",
                        email_display: true,
                        phone: "",
                        phone_display: true,
                        phone_whatsapp: false,
                        phoneAdditional: "",
                        phoneAdditional_display: false,
                        phoneAdditional_whatsapp: false,
                        phoneStat: "",
                        phoneStat_display: false,
                        phone_fax: "",
                        phone_fax_enable: "",
                        website: "",
                        website_enable: false,
                        form_display: true
                    },
                    propertyTypes: [
                        {
                            name: "Wohnung",
                            num: 9,
                            persons: 18,
                            price: 10,
                            rooms: []
                        }
                    ],
                    facilities: [],
                    media: {
                        photos: [],
                        video: "",
                        facebook: ""
                    }
                }
            }
        };
    },
    created() {
        axios
            .post("/auth/profile", this.account)
            .then(resp => {
                this.account = { ...resp.data };
            })
            .catch(resp => {
                this.modalFail = true;
            });
    },
    mounted() {},
    methods: {
        toPropertyData() {
            //здесь будет отправка на сохранение
        },

        validate(value) {
            this.account.validate = value;
        },
        dataProceed() {}
    }
};
</script>
