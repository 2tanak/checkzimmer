<template>
    <section class="languages-speak-section">
        <div class="title">Языки которыми владеете</div>
        <div class="subtitle subtitle-desctope">
            Выберите языки которыми владеете:
            <a class="tooltip-link">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="9" cy="9" r="8.5" stroke="#6BB63F"/>
                    <path d="M7.90909 10.3835H9.52415V10.2386C9.53267 9.40767 9.83097 9.01989 10.5043 8.61506C11.3011 8.14205 11.821 7.51562 11.821 6.5142C11.821 5.02273 10.6193 4.15341 8.92756 4.15341C7.38068 4.15341 6.11932 4.96307 6.08097 6.66761H7.8196C7.84517 5.97301 8.3608 5.60227 8.91903 5.60227C9.49432 5.60227 9.95881 5.9858 9.95881 6.57812C9.95881 7.13636 9.55398 7.5071 9.02983 7.83949C8.31392 8.29119 7.91335 8.74716 7.90909 10.2386V10.3835ZM8.74858 13.1108C9.29403 13.1108 9.76705 12.6548 9.77131 12.0881C9.76705 11.5298 9.29403 11.0739 8.74858 11.0739C8.18608 11.0739 7.72159 11.5298 7.72585 12.0881C7.72159 12.6548 8.18608 13.1108 8.74858 13.1108Z" fill="#3B8B3E"/>
                </svg>
                <div class="tooltip languages-speak-tooltip">
                    Этот tooltip для примера в котором может быть любая полезная подсказка
                </div>
            </a>
        </div>
        <div class="subtitle subtitle-mobile">
            Выберите языки:
            <a class="tooltip-link">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="9" cy="9" r="8.5" stroke="#6BB63F"/>
                    <path d="M7.90909 10.3835H9.52415V10.2386C9.53267 9.40767 9.83097 9.01989 10.5043 8.61506C11.3011 8.14205 11.821 7.51562 11.821 6.5142C11.821 5.02273 10.6193 4.15341 8.92756 4.15341C7.38068 4.15341 6.11932 4.96307 6.08097 6.66761H7.8196C7.84517 5.97301 8.3608 5.60227 8.91903 5.60227C9.49432 5.60227 9.95881 5.9858 9.95881 6.57812C9.95881 7.13636 9.55398 7.5071 9.02983 7.83949C8.31392 8.29119 7.91335 8.74716 7.90909 10.2386V10.3835ZM8.74858 13.1108C9.29403 13.1108 9.76705 12.6548 9.77131 12.0881C9.76705 11.5298 9.29403 11.0739 8.74858 11.0739C8.18608 11.0739 7.72159 11.5298 7.72585 12.0881C7.72159 12.6548 8.18608 13.1108 8.74858 13.1108Z" fill="#3B8B3E"/>
                </svg>
                <div class="tooltip languages-speak-tooltip">
                    Этот tooltip для примера в котором может быть любая полезная подсказка
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
                    title: 'Немецкий',
                    flag: '/svg/de.svg',
                    alt: 'German flag',
                    slug: 'german',
                },
                english: {
                    title: 'Английский',
                    flag: '/svg/us.svg',
                    alt: 'USA flag',
                    slug: 'english',
                },
                poland: {
                    title: 'Польский',
                    flag: '/svg/pl.svg',
                    alt: 'Polish flag',
                    slug: 'poland',
                },
                russian: {
                    title: 'Русский',
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

<style scoped>

</style>
