<template>
    <picture>
        <source :srcset="webP" type="image/webp">
        <source :srcset="thumb" type="image/jpeg">
        <img :src="src" alt="">
    </picture>
</template>

<script>
export default {
    name: "Picture",
    props: ['src'],
    computed: {
        webP() {
            return this.src.replace('uploaded', 'webp/thumbs300').replace(/\.(jpeg|jpg|png)/, '.webp');
        },
        thumb() {
            return this.src.replace('uploaded', 'thumbs300')
        }
    }
}
</script>

<style scoped>

</style>
