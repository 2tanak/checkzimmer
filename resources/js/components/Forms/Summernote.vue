<template>
    <textarea :name="name" ref="textarea" style="visibility: hidden">{{ value }}</textarea>
</template>

<script>
export default {
    name: "summernote",
    props: ['model', 'name', 'height', 'value', 'id'],
    data() {
        return {
            itemvalue: this.value
        }
    },
    mounted() {
        /*let snStyle = document.createElement('link')
        snStyle.setAttribute('href', 'https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css')
        document.head.appendChild(snStyle)
        let snScript = document.createElement('link')
        snScript.setAttribute('src', 'https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js')
        document.head.appendChild(snScript)*/

        this.init();

    },
    methods: {
        init() {
            let config = {
                height: this.height || 400,
            };

            let that = this;

            config.callbacks = {

                onInit: function () {
                    $(that.$refs.textarea).summernote("code", that.value);
                },

                onChange: function () {
                    that.$emit('input', $(that.$refs.textarea).summernote('code'));
                },

                onBlur: function () {
                    that.$emit('input', $(that.$refs.textarea).summernote('code'));
                }
            };
            if (jQuery(this.$refs.textarea).summernote === undefined) {
                setTimeout( () => {
                    this.init()
                }, 100);
            } else {
                setTimeout( () => { jQuery(this.$refs.textarea).summernote(config) }, 1000 );
            }
        }
    },
    watch: {
        id() {
            jQuery(this.$el).summernote('code', this.value)
        }
    },
}
</script>

<style scoped>

</style>
