<template>
    <div class="questions-item">
        <div class="collapse-button" data-toggle="collapse" :href="'#collapse-'+index" role="button" aria-expanded="false" :aria-controls="'collapse-'+index">
            <div style="display:flex;">
                <div class="point"></div>
                {{ question.text }}
            </div>
            <div class="plus-minus"></div>
        </div>
        <div  class="collapse-content collapse" :id="'collapse-'+index">
            <p v-html="question.reply"></p>
        </div>
    </div>
</template>

<script>
export default {
    name: "QuestionItem",
    props: [ 'question', 'index' ]
}
</script>

<style scoped>

</style>
