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
            return this.src.replace('uploaded', 'webp');
        },
        thumb() {
            return this.src.replace('uploaded', 'thumbs300')
        }
    }
}
</script>

<style scoped>

</style>
