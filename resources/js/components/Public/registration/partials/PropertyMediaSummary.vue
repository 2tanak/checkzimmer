<template>
    <section class="photos-property-section">
        <div class="title">
            {{ $t('Photo of the property') }}
            <a href="#" @click.prevent="toPropertyData">{{ $t('Change') }}</a>
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
        toPropertyData() {
            this.$emit('toPropertyData', '');
        }
    }
}
</script>

<style scoped>

</style>
