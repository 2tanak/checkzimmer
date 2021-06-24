<template>
    <section class="photos-object-section">
        <div class="title">Фотографии объекта размещения</div>
        <div class="subtitle subtitle-desctope">
            <div class="left-subtitle">Загрузите фото объекта:</div>
            <div class="right-subtitle">JPG, PNG размером до 20MB,  не менее 1780px в ширину, не более 10 шт.</div>
        </div>
        <form class="input-file-block" id="uploadForm" method="post">
            <input type="file" id="input-file">
            <label for="input-file" multiple="multiple" accept=".jpg,.png,image/*" class="add-photo">
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.3089 7.82155L7.53244 14.598C6.23018 15.9002 4.12065 15.9002 2.81839 14.598C1.51614 13.2957 1.51614 11.1862 2.81839 9.88395L10.1841 2.51825C10.9973 1.70508 12.3172 1.70508 13.1304 2.51825C13.9435 3.33142 13.9435 4.65136 13.1304 5.46453L6.94318 11.6517C6.61909 11.9758 6.08876 11.9758 5.76467 11.6517C5.44058 11.3276 5.44058 10.7973 5.76467 10.4732L11.3626 4.87527L10.4787 3.99139L4.88079 9.58932C4.06761 10.4025 4.06761 11.7224 4.88079 12.5356C5.69396 13.3488 7.01389 13.3488 7.82706 12.5356L14.0142 6.34841C15.3165 5.04616 15.3165 2.93662 14.0142 1.63437C12.712 0.332111 10.6025 0.332111 9.3002 1.63437L1.93451 9.00006C0.14317 10.7914 0.143171 13.6905 1.93451 15.4819C3.72585 17.2732 6.62498 17.2732 8.41632 15.4819L15.1928 8.70543L14.3089 7.82155Z" fill="#3B8B3E"/>
                </svg>
                Загрузить фото объекта
            </label>
        </form>
        <div class="subtitle subtitle-mobile">
            <div class="left-subtitle">Загрузите фото объекта:</div>
            <div class="right-subtitle">JPG, PNG размером до 20MB,  не менее 1780px в ширину, не более 10 шт.</div>
        </div>
        <div class="pictures-block">
            <PropertyMediaPhoto v-for="(photo, index) in media.photos" :photo="photo" :index="index" :key="JSON.stringify(photo)+index" @delPhoto="delPhoto" />
        </div>
        <div class="social-media-object">
            <div class="title">Социальные медиа объекта</div>
            <div class="social-media-links">
                <div class="facebook-block">
                    <label for="facebook-input">Видео объекта:</label>
                    <input type="text" id="facebook-input" name="facebook-input" placeholder="Укажите ссылку на Facebook объекта" v-model="media.video">
                </div>
                <div class="video-block">
                    <label for="video-input">Ссылка на Facebook:</label>
                    <input type="text" id="video-input" name="video-input" placeholder="Укажите ссылку на видео объекта" v-model="media.facebook">
                </div>
            </div>
        </div>
    </section>

</template>

<script>
import PropertyMediaPhoto from "./PropertyMediaPhoto";
export default {
    name: "PropertyMedia",
    components: {PropertyMediaPhoto},
    props: ['media'],
    methods: {
        delPhoto(index) {
            let media = this.media;
            media.photos.splice(index, 1);
            this.$emit('input', media);
        }
    }
}
</script>

<style scoped>

</style>
