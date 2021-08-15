<template>
    <section class="photos-property-section">
        <div class="title">
            {{ $t('Photo of the property') }}
            <a href="#" @click.prevent="toPropertyData('property-media')">{{ $t('Change') }}</a>
        </div>
        <div class="photo-checking-block">
            <img v-for="photo in media.photos" :src="photo" alt="">
        </div>
        <div class="social-media-checking" v-if="media.facebook || media.video ">
            <div class="title">{{ $t('Social Media') }}</div>
            <div class="address-checking-line" v-if="media.facebook">
                <div class="address-checking-name">{{ $t('Facebook link') }}: </div>
                <div class="dots"></div>
                <div class="address-checking-total">{{ media.facebook }}</div>
            </div>
            <div class="address-checking-line" v-if="media.video">
                <div class="address-checking-name">{{ $t('Property video') }}: </div>
                <div class="dots"></div>
                <div class="address-checking-total">{{ media.video }}</div>
            </div>
        </div>
    </section>

</template>

<script>
export default {
    name: "PropertyMediaSummary",
    props: ['media'],
    methods: {
        toPropertyData(hash) {
            window.location.hash = hash;
            this.$emit('toPropertyData', '');
        }
    }
}
</script>

<style lang="scss">

.registration-section {
    .photos-property-section {
        &:after {
            position: absolute;
            content: "";
            max-width: 720px;
            width: 100%;
            height: 110px;
            left: 50%;
            transform: translateX(-50%);
            bottom: 0;
            background: #FFFFFF;
            box-shadow: 0 4px 30px rgb(51 54 70 / 16%);
            border-radius: 14px;
            z-index: -1;
        }
        .title {
            padding: 0 16px;
        }
        background: #FFFFFF;
        box-shadow: 0 0 14px rgb(51 54 70 / 14%);
        border-radius: 12px;
        padding: 30px 0;
        margin-bottom: 20px;
        max-width: 780px;
        width: 100%;
        position: relative;
    }
    .title {
        a {
            font-weight: 500;
            font-size: 14px;
            line-height: 100%;
            color: #3B8B3E;
            text-decoration: none;
        }
        margin-bottom: 16px;
        font-weight: 600;
        font-size: 20px;
        line-height: 130%;
        color: #333646;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .photo-checking-block {
        img {
            &:nth-of-type(5n) {
                margin-right: 0;
            }
            width: 18.93%;
            height: 92px;
            margin-bottom: 10px;
            margin-right: 1.33%;
            border-radius: 6px;
            border: 0.495536px solid rgba(0, 0, 0, 0.12);
            object-fit: cover;
        }
        padding-bottom: 20px;
        border-bottom: 2px solid #E3E4E6;
        display: flex;
        flex-wrap: wrap;
        padding-left: 16px;
        padding-right: 16px;
    }
    .social-media-checking {
        .address-checking-line {
            &:not(:last-of-type) {
                margin-bottom: 12px;
            }
            padding: 0 16px;
            display: flex;
            align-items: center;
        }
        .address-checking-name {
            margin-right: 10px;
            font-weight: 400;
            font-size: 16px;
            line-height: 140%;
            color: #545769;
            overflow: hidden;
            white-space: nowrap;
        }
        .address-checking-total {
            font-weight: 400;
            font-size: 16px;
            line-height: 140%;
            color: #333646;
            margin-left: 10px;
            white-space: nowrap;
        }
        .dots {
            flex-grow: 1;
            border-bottom: 1px dotted #c5c5c5;
        }
        padding-top: 20px;
    }
}

@media (max-width: 1040px) {
    .registration-section {
        .title {
            font-size: 18px;
        }
        .social-media-checking {
            .address-checking-name {
                max-width: none;
            }
        }
        .photos-property-section {
            &:after {
                width: calc(100% - 32px);
            }
            max-width: none;
            border-radius: 0;
        }
    }
}
@media (max-width: 575px) {
    .registration-section {
        .photo-checking-block {
            img {
                &:nth-of-type(5n) {
                    margin-right: 2%;
                }
                &:nth-of-type(3n) {
                    margin-right: 0;
                }
                width: 32%;
                margin-right: 2%;
            }
            padding-bottom: 10px;
        }
        .social-media-checking {
            .address-checking-line {
                &:last-of-type {
                    margin-bottom: 0;
                }
                span {
                    display: none;
                }
                flex-direction: column;
                align-items: flex-start;
                margin-bottom: 24px;
            }
            .address-checking-name {
                margin-right: 0;
                margin-bottom: 12px;
                overflow: visible;
                white-space: normal;
            }
            .dots {
                display: none;
            }
            .address-checking-total {
                flex-basis: auto;
            }
            .address-checking-total {
                margin-left: 0;
            }
        }
    }
}
@media (max-width: 370px) {
    .registration-section {
        .photo-checking-block {
            img {
                &:nth-of-type(3n) {
                    margin-right: 3.3%;
                }
                &:nth-of-type(2n) {
                    margin-right: 0;
                }
                &:nth-of-type(5n) {
                    margin-right: 3.3%;
                }
                &:last-of-type {
                    margin-right: 0;
                }
                width: 48.3%;
                margin-right: 3.3%;
            }
        }
    }
}

</style>
