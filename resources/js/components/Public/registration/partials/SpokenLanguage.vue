<template>
    <section class="languages-speak-section">
        <div class="title">{{ $t('Languages you speak') }}</div>
        <div class="subtitle subtitle-desctope">
            {{ $t('Select the languages you speak') }}:
            <a class="tooltip-link">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="9" cy="9" r="8.5" stroke="#6BB63F"/>
                    <path d="M7.90909 10.3835H9.52415V10.2386C9.53267 9.40767 9.83097 9.01989 10.5043 8.61506C11.3011 8.14205 11.821 7.51562 11.821 6.5142C11.821 5.02273 10.6193 4.15341 8.92756 4.15341C7.38068 4.15341 6.11932 4.96307 6.08097 6.66761H7.8196C7.84517 5.97301 8.3608 5.60227 8.91903 5.60227C9.49432 5.60227 9.95881 5.9858 9.95881 6.57812C9.95881 7.13636 9.55398 7.5071 9.02983 7.83949C8.31392 8.29119 7.91335 8.74716 7.90909 10.2386V10.3835ZM8.74858 13.1108C9.29403 13.1108 9.76705 12.6548 9.77131 12.0881C9.76705 11.5298 9.29403 11.0739 8.74858 11.0739C8.18608 11.0739 7.72159 11.5298 7.72585 12.0881C7.72159 12.6548 8.18608 13.1108 8.74858 13.1108Z" fill="#3B8B3E"/>
                </svg>
                <div class="tooltip languages-speak-tooltip">
                    {{ $t('See this tooltip for an example which could have any helpful hint') }}
                </div>
            </a>
        </div>
        <div class="subtitle subtitle-mobile">
            {{ $t('Select languages') }}:
            <a class="tooltip-link">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="9" cy="9" r="8.5" stroke="#6BB63F"/>
                    <path d="M7.90909 10.3835H9.52415V10.2386C9.53267 9.40767 9.83097 9.01989 10.5043 8.61506C11.3011 8.14205 11.821 7.51562 11.821 6.5142C11.821 5.02273 10.6193 4.15341 8.92756 4.15341C7.38068 4.15341 6.11932 4.96307 6.08097 6.66761H7.8196C7.84517 5.97301 8.3608 5.60227 8.91903 5.60227C9.49432 5.60227 9.95881 5.9858 9.95881 6.57812C9.95881 7.13636 9.55398 7.5071 9.02983 7.83949C8.31392 8.29119 7.91335 8.74716 7.90909 10.2386V10.3835ZM8.74858 13.1108C9.29403 13.1108 9.76705 12.6548 9.77131 12.0881C9.76705 11.5298 9.29403 11.0739 8.74858 11.0739C8.18608 11.0739 7.72159 11.5298 7.72585 12.0881C7.72159 12.6548 8.18608 13.1108 8.74858 13.1108Z" fill="#3B8B3E"/>
                </svg>
                <div class="tooltip languages-speak-tooltip">
                    {{ $t('See this tooltip for an example which could have any helpful hint') }}
                </div>
            </a>
        </div>
        <div class="languages-speak-item">
            <div class="languages-speak-content">
                <SpokenLanguageItem v-for="(language, index) in languages" :key="language.flag" :language="language " :active="data[language.slug]" @click.native="switchLang(index)"/>
            </div>
        </div>
    </section>

</template>

<script>
import SpokenLanguageItem from "./SpokenLanguageItem";
export default {
    name: "SpokenLanguage",
    components: {SpokenLanguageItem},
    props: [ 'data' ],
    data() {
        return {
            languages: {
                german: {
                    title: this.$t('German'),
                    flag: '/svg/de.svg',
                    alt: 'German flag',
                    slug: 'german',
                },
                english: {
                    title: this.$t('English'),
                    flag: '/svg/us.svg',
                    alt: 'USA flag',
                    slug: 'english',
                },
                poland: {
                    title: this.$t('Polish'),
                    flag: '/svg/pl.svg',
                    alt: 'Polish flag',
                    slug: 'poland',
                },
                russian: {
                    title: this.$t('Russian'),
                    flag: '/svg/ru.svg',
                    alt: 'Russian flag',
                    slug: 'russian',
                }}
        }
    },
    mounted() {
        document.addEventListener('DOMContentLoaded', function() {

            jQuery('.languages-speak-block').click(function () {
                jQuery(this).toggleClass('active');
            });

        });
    },
    methods: {
        switchLang(index) {
            let langs = this.data;
            langs[index] = !langs[index];
            this.$emit('input', langs);
        }
    }
}
</script>

<style lang="scss">

.registration-section {
    .languages-speak-section {
        &::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background: #FFFFFF;
            box-shadow: 0 4px 30px rgba(51, 54, 70, 0.16);
            border-radius: 14px;
            max-width: 720px;
            width: 100%;
            height: 100px;
            z-index: -1;
        }
        .subtitle {
            display: flex;
            align-items: center;
            margin-bottom: 16px;
            font-weight: 500;
            font-size: 16px;
            line-height: 100%;
            color: #545769;
        }
        .subtitle.subtitle-mobile {
            display: none;
        }
        a.tooltip-link {
            &:hover {
                .tooltip {
                    opacity: 1;
                    visibility: visible;
                    transform: translateX(-50%) scale(1);
                }
            }
            position: relative;
            margin-left: 7px;
            cursor: pointer;
        }
        background: #FFFFFF;
        box-shadow: 0 0 14px rgb(51 54 70 / 14%);
        border-radius: 12px;
        padding: 30px 16px 10px 16px;
        margin-bottom: 30px;
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
    .subtitle {
        svg {
            border-radius: 50%;
            display: block;
        }
    }
    .languages-speak-item {
        .languages-speak-block {
            &:nth-of-type(4n) {
                margin-right: 0;
            }
        }
        display: flex;
        align-items: center;
    }
    .tooltip {
        &::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%) matrix(0.71, -0.7, -0.71, -0.71, 0, 0);
            width: 24.27px;
            height: 24.27px;
            background: #333646;
            border-radius: 2px;
            z-index: -1;
        }
        background: #333646;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.18);
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 400;
        font-size: 12px;
        line-height: 130%;
        color: #FFFFFF;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16);
        width: 282px;
        padding: 14px 12px;
        position: absolute;
        bottom: 24px;
        left: 50%;
        transform: translateX(-50%) scale(0.7);
        opacity: 0;
        visibility: hidden;
        transition: all 0.2s;
    }
    .languages-speak-content {
        &:not(:last-of-type) {
            margin-right: 16px;
        }
        display: flex;
        align-items: center;
        width: 100%;
        flex-wrap: wrap;
    }
}

@media (max-width: 1100px) {
    .registration-section {
        .languages-speak-item {
            .languages-speak-block {
                padding: 0;
                justify-content: center;
            }
        }
    }
}
@media (max-width: 1040px) {
    .registration-section {
        .languages-speak-section {
            &::after {
                width: calc(100% - 60px);
                max-width: none;
            }
            max-width: none;
            border-radius: 0;
        }
        .languages-speak-item {
            .languages-speak-block {
                padding: 0 21px;
                justify-content: flex-start;
            }
        }
        .languages-speak-content {
            width: 100%;
        }
    }
}
@media (max-width: 680px) {
    .registration-section {
        .languages-speak-section {
            .subtitle.subtitle-mobile {
                display: flex;
            }
            .subtitle.subtitle-desctope {
                display: none;
            }
        }
        .languages-speak-item {
            .languages-speak-block {
                &:nth-of-type(2n) {
                    margin-right: 0;
                }
                width: 48.6%;
            }
            flex-direction: column;
        }
        .languages-speak-content {
            &:not(:last-of-type) {
                margin-right: 0;
                margin-bottom: 16px;
            }
        }
    }
}
@media (max-width: 575px) {
    .registration-section {
        .languages-speak-item {
            .languages-speak-block {
                img {
                    margin-right: 7px;
                }
                padding: 0 12px;
            }
        }
        .languages-speak-content {
            &:not(:last-of-type) {
                margin-bottom: 14px;
            }
        }
    }
}

</style>
