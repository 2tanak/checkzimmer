<template>
    <picture>
        <source :srcset="webP" type="image/webp">
        <source :srcset="thumb" type="image/jpeg">
        <img :src="srcC" alt="">
    </picture>
</template>

<script>
export default {
    name: "Picture",
    props: ['src'],
    methods: {
        protoCorrection(src) {
            let protoB = 'https:';//document.location.protocol;
            let protoD = src.split('//')[0];
            if (protoD !== protoB) {
                src = src.replace(protoD, protoB);
            }
            return src;
        }
    },
    computed: {
        webP() {
            return this.protoCorrection(this.src.replace('uploaded', 'webp/thumbs300').replace(/\.(jpeg|jpg|png)/, '.webp'));
        },
        thumb() {
            return this.protoCorrection(this.src.replace('uploaded', 'thumbs300'));
        },
        srcC() {
            return this.protoCorrection(this.src);
        }
    }
}
</script>

<style scoped>

</style>
