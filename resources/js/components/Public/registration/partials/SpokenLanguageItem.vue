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

<style lang="scss">

.registration-section {
    .languages-speak-item {
        .languages-speak-block {
            img {
                margin-right: 10px;
            }
            &::after {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                border: 2px solid #6BB63F;
                border-radius: 6px;
            }
            display: flex;
            align-items: center;
            background: #F3F3F3;
            border-radius: 6px;
            width: 22.97%;
            height: 54px;
            padding: 0 21px;
            margin-right: 2.7%;
            cursor: pointer;
            position: relative;
            font-weight: 400;
            font-size: 15px;
            line-height: 100%;
            color: #333646;
            margin-bottom: 20px;
        }
        .languages-speak-block.active {
            &:after {
                content: "";
            }
        }
    }
}

</style>
