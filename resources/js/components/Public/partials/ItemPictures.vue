<template>
    <div class="photo-container">
        <div style="position:relative;" class="no-photo-block">
            <div class="no-photo" v-if="noPhotos">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="32" height="32" rx="2" fill="#EDEDEF"></rect> <path d="M10 19L4 27H28L21 16L15 24L10 19Z" fill="#D8D8D8"></path></svg>
            </div>
            <div v-if="isSuperhost" class="superhost-icon">{{ $t('Superhost') }}</div>
        </div>
        <div style="position:relative;" v-if="getPhotos.length && !sizedForSlider">
            <a href="":href="getUrlLangPrefix+'/single/'+item.slug" class="img-link">
                <img v-if="getPhotos.length && !sizedForSlider" :src="getPhotos[0].url_max300">
            </a>
            <div v-if="isSuperhost" class="superhost-icon">{{ $t('Superhost') }}</div>
        </div>
        <div style="position:relative;" v-if="getPhotos.length && sizedForSlider" class="main-small-slider">
            <VueSlickCarousel v-if="getPhotos.length && sizedForSlider" class="property-card-slider" :arrows="false" :dots="true"
                              :slidesToShow="1" :slidesToScroll="1"
                              ref="carousel" :infinite="true">
                <div v-for="photo in getPhotos" class="slider-item">
                    <a style="display:block;" :href="getUrlLangPrefix+'/single/'+item.slug">
                        <img :src="photo.url_max300" alt="Property picture">
                    </a>
                </div>
            </VueSlickCarousel>
            <div v-if="isSuperhost" class="superhost-icon">{{ $t('Superhost') }}</div>
        </div>
    </div>
</template>

<script>
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'

export default {
    name: "ItemPictures",
    props: ['item'],
    components: {VueSlickCarousel},
    data() {
        return {
            sizedForSlider: this.sizedForSlider = jQuery(window).width() > 1040
        }
    },
    mounted() {
        jQuery(document).ready( () => {
            this.sizedForSlider = jQuery(window).width() > 1040;

            jQuery(window).resize( () => {
                this.sizedForSlider = jQuery(window).width() > 1040;
            })
        });
    },
    methods: {
        findOption(name) {
            if (!this.item.options) {
                return false;
            }
            return this.item.options.find( elem => elem.key === name);
        },

    },
    computed: {
        isSuperhost() {
            let superhost = this.findOption('superhost')
            return superhost && parseInt(superhost.value);
        },
        getPhotos() {
            let photos = this.findOption('photos');

            if (!photos) {
                return []
            }

            return JSON.parse(photos.value).slice(0, 5);
        },
        noPhotos() {
            return this.getPhotos.length === 0;
        },
        getUrlLangPrefix() {
            let locale = jQuery('html').attr('lang');
            console.log(locale);
            //temporary solution
            return locale && locale !== 'de' ? `/${locale}/` : '';
        },
    }

}
</script>

<style scoped>

</style>
