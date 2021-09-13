<template>
    <section class="photos-object-section" id="property-media">
        <div class="title">{{ $t('Accommodation photos') }}</div>
        <div class="subtitle subtitle-desctope">
            <div class="left-subtitle">{{ $t('Upload a photo of the object') }}:</div>
            <div class="right-subtitle">{{ $t('JPG, PNG up to 20MB in size, no less than 1780px wide, no more than 10 pieces.') }}</div>
        </div>
        <form class="input-file-block" id="uploadForm" method="post" @input="addPhoto">
            <input type="file" id="input-file">
            <label for="input-file" multiple="multiple" accept=".jpg,.png,image/*" class="add-photo">
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.3089 7.82155L7.53244 14.598C6.23018 15.9002 4.12065 15.9002 2.81839 14.598C1.51614 13.2957 1.51614 11.1862 2.81839 9.88395L10.1841 2.51825C10.9973 1.70508 12.3172 1.70508 13.1304 2.51825C13.9435 3.33142 13.9435 4.65136 13.1304 5.46453L6.94318 11.6517C6.61909 11.9758 6.08876 11.9758 5.76467 11.6517C5.44058 11.3276 5.44058 10.7973 5.76467 10.4732L11.3626 4.87527L10.4787 3.99139L4.88079 9.58932C4.06761 10.4025 4.06761 11.7224 4.88079 12.5356C5.69396 13.3488 7.01389 13.3488 7.82706 12.5356L14.0142 6.34841C15.3165 5.04616 15.3165 2.93662 14.0142 1.63437C12.712 0.332111 10.6025 0.332111 9.3002 1.63437L1.93451 9.00006C0.14317 10.7914 0.143171 13.6905 1.93451 15.4819C3.72585 17.2732 6.62498 17.2732 8.41632 15.4819L15.1928 8.70543L14.3089 7.82155Z" fill="#3B8B3E"/>
                </svg>
                {{ $t('Upload object photo') }}
            </label>
        </form>
        <div class="subtitle subtitle-mobile">
            <div class="left-subtitle">{{ $t('Upload a photo of the object') }}:</div>
            <div class="right-subtitle">{{ $t('JPG, PNG up to 20MB in size, no less than 1780px wide, no more than 10 pieces.') }}</div>
        </div>
        <div class="pictures-block">
            <PropertyMediaPhoto v-for="(photo, index) in media.photos" :photo="photo" :index="index" :key="JSON.stringify(photo)+index" @delPhoto="delPhoto" />
        </div>
        <div class="social-media-object">
            <div class="title">{{ $t('Social media facility') }}</div>
            <div class="social-media-links">
                <div class="facebook-block">
                    <label for="facebook-input">{{ $t('Object video') }}:</label>
                    <input type="text" id="facebook-input" name="facebook-input" :placeholder="$t('Provide a link to the video of the object')" v-model="media.video">
                </div>
                <div class="video-block">
                    <label for="video-input">{{ $t('Link to Facebook') }}:</label>
                    <input type="text" id="video-input" name="video-input" :placeholder="$t('Provide a link to the Facebook object')" v-model="media.facebook">
                </div>
            </div>
        </div>
    </section>

</template>

<script>
import PropertyMediaPhoto from "./PropertyMediaPhoto";

import ApiRequest from "../../../API/ApiRequest";

let ImageRequest = ApiRequest('image-public');
let imageRequest = new ImageRequest;

export default {
    name: "PropertyMedia",
    components: {PropertyMediaPhoto},
    props: ['media'],
    methods: {
        delPhoto(index) {
            let media = this.media;
            media.photos.splice(index, 1);
            this.$emit('input', media);
        },
        addPhoto(e) {
            let photo = e.target.value;
            let photoExt = photo.split('.').pop().toLowerCase();
            /*var formData = new FormData();
            var imagefile = document.querySelector('#file');
            formData.append("image", imagefile.files[0]);
            axios.post('upload_file', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })*/
            if (['png', 'jpg', 'jpeg'].indexOf(photoExt) === -1) {
                alert('Wrong file, only PNG and JPG are allowed');
                return;
            }

            const input = e.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = (e) => {
                    imageRequest.create({"image": e.target.result})
                        .then(res => {
                            let media = this.media;
                            media.photos.push(res.data.image);
                            this.$emit('input', media);
                        })
                }
            }
        }
    }
}
</script>

<style lang="scss">

.registration-section {
    .photos-object-section {
        &:after {
            position: absolute;
            content: "";
            max-width: 720px;
            width: 100%;
            height: 110px;
            left: 50%;
            transform: translateX(-50%);
            bottom: 0;
            background: #FFFFFF;
            box-shadow: 0 4px 30px rgb(51 54 70 / 16%);
            border-radius: 14px;
            z-index: -1;
        }
        .subtitle {
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
        }
        .left-subtitle {
            margin-right: 25px;
            font-weight: 500;
            font-size: 16px;
            line-height: 100%;
            color: #545769;
        }
        .right-subtitle {
            font-weight: 400;
            font-size: 13px;
            line-height: 140%;
            color: #545769;
        }
        .input-file-block {
            label {
                &::before {
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    border: 1px solid rgba(107, 182, 63, 0.3);
                    border-radius: 6px;
                    pointer-events: none;
                }
                &:hover {
                    &::before {
                        content: "";
                    }
                }
                svg {
                    display: block;
                    margin-right: 4px;
                }
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 500;
                font-size: 16px;
                line-height: 100%;
                color: #3B8B3E;
                background: #E7F4EF;
                border-radius: 6px;
                width: 100%;
                height: 54px;
                cursor: pointer;
                position: relative;
                transition: all 0.2s;
                margin-bottom: 0;
            }
            input[type="file"] {
                opacity: 0;
                visibility: hidden;
                position: absolute;
                left: -99999px;
            }
            padding-left: 16px;
            padding-right: 16px;
        }
        .pictures-block {
            padding: 20px 16px;
            border-bottom: 2px solid #E3E4E6;
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
        }
        .title {
            padding: 0 16px;
        }
        .social-media-object {
            padding: 0 16px;
        }
        .social-media-links {
            label {
                margin-bottom: 16px;
                font-weight: 500;
                font-size: 16px;
                line-height: 100%;
                color: #545769;
            }
            input {
                &:focus {
                    background: #FFFFFF;
                    border: 1px solid #C0C1C2;
                    border-radius: 6px;
                    box-shadow: 0 0 0 4px rgb(243 243 243 / 90%);
                }
                &::-moz-placeholder {
                    color:#c0392b;
                }
                &::-webkit-input-placeholder {
                    font-weight: 400;
                    font-size: 15px;
                    line-height: 100%;
                    color: #8F98A2;
                }
                &:-moz-placeholder {
                    color:#c0392b;
                }
                &:-ms-input-placeholder {
                    color:#c0392b;
                }
                padding: 0 13px;
                background: #F3F3F3;
                border-radius: 6px;
                width: 100%;
                height: 54px;
                border: 0;
                font-weight: 400;
                font-size: 15px;
                line-height: 100%;
                color: #333646;
                outline: none;
            }
            display: flex;
            justify-content: space-between;
        }
        .facebook-block {
            width: 50%;
            margin-right: 20px;
        }
        .video-block {
            width: 50%;
        }
        .social-media-object {
            .title {
                padding: 0;
            }
        }
        .subtitle-mobile {
            display: none;
            margin-top: 16px;
        }
        background: #FFFFFF;
        box-shadow: 0 0 14px rgb(51 54 70 / 14%);
        border-radius: 12px;
        padding: 30px 0;
        margin-bottom: 20px;
        max-width: 800px;
        width: 100%;
        position: relative;
        display: flex;
        flex-direction: column;
    }
    .title {
        a {
            font-weight: 500;
            font-size: 14px;
            line-height: 100%;
            color: #3B8B3E;
            text-decoration: none;
        }
        margin-bottom: 16px;
        font-weight: 600;
        font-size: 20px;
        line-height: 130%;
        color: #333646;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
}

@media (max-width: 1100px) {
    .registration-section {
        .photos-object-section {
            &::after {
                width: calc(100% - 32px);
            }
            max-width: none;
            border-radius: 0;
        }
    }
}
@media (max-width: 1040px) {
    .registration-section {
        .title {
            font-size: 18px;
        }
    }
}
@media (max-width: 760px) {
    .registration-section {
        .photos-object-section {
            .subtitle-desctope {
                .right-subtitle {
                    display: none;
                }
            }
            .subtitle-mobile {
                .left-subtitle {
                    display: none;
                }
                display: block;
            }
        }
    }
}
@media (max-width: 575px) {
    .registration-section {
        .photos-object-section {
            .social-media-links {
                flex-direction: column;
            }
            .facebook-block {
                width: 100%;
                margin-right: 0;
                margin-bottom: 24px;
            }
            .video-block {
                width: 100%;
            }
        }
    }
}

</style>
