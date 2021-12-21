<template>
    <div class="container">
        <RegistrationStepProperty
            v-model="account"
            :account="account"
            :plan="plans[account.plan]"
            @backToPlans="choosePlan"
            @toSummaryData="toSummaryData"
            @validate="validate"
            @dataProceed="dataProceed"
        />
        <div
            :class="{ 'modal-overlay': true, 'modal-show': modalOk }"
            id="modal-accepted"
            @click="modalCloseOk"
        >
            <div class="register-modal">
                <div class="modal-close">
                    <svg
                        width="11"
                        height="11"
                        viewBox="0 0 11 11"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z"
                            fill="#545769"
                        ></path>
                    </svg>
                </div>

                <div style="text-align:center;">
                    <svg
                        width="56"
                        height="56"
                        viewBox="0 0 56 56"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <circle cx="28" cy="28" r="28" fill="#E1FCD2" />
                        <path
                            d="M38.7625 20.5703C38.4112 20.2272 37.936 20.0347 37.4407 20.0347C36.9453 20.0347 36.4701 20.2272 36.1188 20.5703L24.9625 31.0703L19.9375 26.3545C19.5795 26.0126 19.0978 25.8243 18.5985 25.8312C18.0992 25.8381 17.6231 26.0396 17.275 26.3914C16.9269 26.7432 16.7353 27.2164 16.7424 27.7069C16.7494 28.1975 16.9545 28.6652 17.3125 29.0072L23.6688 35.0493C24.0184 35.3813 24.4857 35.5669 24.9719 35.5669C25.4582 35.5669 25.9254 35.3813 26.275 35.0493L38.725 23.1861C38.9033 23.0173 39.0457 22.8155 39.1441 22.5924C39.2425 22.3692 39.295 22.1291 39.2985 21.8859C39.302 21.6427 39.2564 21.4013 39.1644 21.1755C39.0724 20.9497 38.9359 20.744 38.7625 20.5703Z"
                            fill="#3B8B3E"
                        />
                    </svg>
                    <div class="modal-title">{{ $t("Thank you") }}!</div>
                    <p
                        style="margin-bottom:0;font-weight:400;color:#545769;line-height:150%;font-size:15px;width:100%;max-width:384px;"
                    >
                        {{
                            $t(
                                "Your application has been successfully completed"
                            )
                        }}.
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import RegistrationStepProperty from "../../../..//registration/RegistrationStepProperty";
import ApiRequest from "../../../../../API/ApiRequest";
let AdvertRequest = ApiRequest("advert");
let advert = new AdvertRequest();

export default {
    name: "profile",
    components: {
        RegistrationStepProperty
    },
    data() {
        return {
            modalOk: false,
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
    created() {},
    mounted() {
        const params = window.location.search.split("&");
        const id = params[0].split("=")[1];
        if (id) {
            advert.show(id).then(response => {
                console.log(response.data);
                let account = { ...this.account };
                account.property = { ...response.data.property };
                account.post.address = { ...response.data.post.address };
                account.plan = response.data.plan;
                this.account = account;
            });
        }
    },
    methods: {
        modalCloseOk() {
            this.modalOk = false;
        },
        toSummaryData() {
            const params = window.location.search.split("&");
            const id = params[0].split("=")[1];
            let save_text = $(".save").text();
            $(".save").text("");
            $(".save").addClass("loader");

            advert.update(id, this.account).then(response => {
                $(".save").removeClass("loader");
                $(".save").text(save_text);
                if (response.data.status == "success") {
                    this.modalOk = true;
                }
                console.log(response.data);
                return false;
            });
        },

        validate(value) {
            this.account.validate = value;
        },
        dataProceed() {}
    }
};
</script>
<style lang="scss">
a.save {
    &::after {
        content: "";
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: 0;
        background: #ffffff;
        box-shadow: 0 4px 30px rgba(107, 182, 63, 0.6);
        border-radius: 14px;
        z-index: -1;
        max-width: 720px;
        width: 100%;
        height: 33px;
    }
    &.loader {
        background: #6BB63Furl("/img/loading.gif");
        background-repeat: no-repeat;
        background-position: center center;
    }
    width: 100%;
    height: 54px;
    background: #6bb63f;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
    line-height: 100%;
    color: #ffffff;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16);
    position: relative;
}

.register-modal {
    .modal-close {
        position: absolute;
        top: 18px;
        right: 22px;
        cursor: pointer;
    }
    svg {
        margin-bottom: 10px;
    }
    .modal-title {
        margin-bottom: 15px;
    }
    transform: scale(0.7);
    opacity: 0;
    transition: all 0.3s;
    background: #fff;
    box-shadow: 0 0 14px rgb(51 54 70 / 14%);
    border-radius: 12px;
    width: 468px;
    padding: 33px 44px;
}
.modal-overlay.modal-show {
    .register-modal {
        transform: scale(1);
        opacity: 1;
    }
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
        .checkbox-line {
            label {
                font-size: 14px;
            }
        }
        .billing-address-container {
            padding: 0;
            flex-direction: column-reverse;
        }
        .main-registration-content {
            margin-right: 0;
            width: 100%;
        }
        padding-bottom: 40px;
    }
    .data-checking-section {
        .familiarization {
            padding: 0 16px;
        }
    }
}
@media (max-width: 700px) {
    .data-checking-section {
        .familiarization {
            br {
                display: none;
            }
        }
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
    .register-modal {
        p {
            max-width: none !important;
        }
        width: 100%;
        height: 100%;
        border-radius: 0;
        padding: 25px;
    }
}
</style>
