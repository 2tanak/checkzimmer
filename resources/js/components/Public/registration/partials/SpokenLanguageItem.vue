<template>
    <div :class="['languages-speak-block', language.slug,  active ? 'active' : '']">
        <img :src="language.flag" :alt="language.alt">
        {{  language.title  }}
    </div>
</template>

<script>
export default {
    name: "SpokenLanguageItem",
    props: [ 'language', 'active' ]
}
</script>

<style scoped>

</style>
