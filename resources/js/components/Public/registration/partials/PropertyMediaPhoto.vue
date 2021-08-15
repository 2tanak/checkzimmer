<template>
    <div class="img-block">
        <a href="#" class="delete-img" @click.prevent="delPhoto">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="10" cy="10" r="9" fill="#92949C"/>
                <circle cx="10" cy="10" r="9.5" stroke="white" stroke-opacity="0.3"/>
                <g clip-path="url(#clip0)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5356 7.59565C13.848 7.28323 13.848 6.7767 13.5356 6.46428C13.2231 6.15186 12.7166 6.15186 12.4042 6.46428L10.1415 8.72702L7.73726 6.32282C7.42484 6.0104 6.91831 6.0104 6.60589 6.32282C6.29347 6.63524 6.29347 7.14178 6.60589 7.4542L9.01008 9.85839L6.4645 12.404C6.15208 12.7164 6.15208 13.2229 6.4645 13.5353C6.77692 13.8478 7.28345 13.8478 7.59587 13.5353L10.1415 10.9898L12.5456 13.3939C12.858 13.7063 13.3645 13.7063 13.677 13.3939C13.9894 13.0815 13.9894 12.5749 13.677 12.2625L11.2728 9.85839L13.5356 7.59565Z" fill="white"/>
                </g>
                <defs>
                    <clipPath id="clip0">
                        <rect width="8" height="8" fill="white" transform="translate(6 6)"/>
                    </clipPath>
                </defs>
            </svg>
        </a>
        <img :src="photo" alt="">
    </div>
</template>

<script>
export default {
    name: "PropertyMediaPhoto",
    props: ['photo', 'index'],
    methods: {
        delPhoto() {
            this.$emit('delPhoto', this.index);
        }
    }
}
</script>

<style lang="scss">

.registration-section {
    .photos-object-section {
        .img-block {
            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 6px;
            }
            &:nth-of-type(5n) {
                margin-right: 0;
            }
            &::before {
                border: 0.495536px solid rgba(0, 0, 0, 0.12);
                border-radius: 6px;
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                content: "";
            }
            a.delete-img {
                svg {
                    display: block;
                }
                position: absolute;
                top: -5px;
                right: -5px;
                text-decoration: none;
            }
            width: 18.88%;
            height: 92px;
            margin-right: 1.36%;
            margin-bottom: 1.36%;
            position: relative;
            border-radius: 6px;
        }
    }
}

@media (max-width: 575px) {
    .registration-section {
        .photos-object-section {
            .img-block {
                &:nth-of-type(5n) {
                    margin-right: 1.36%;
                }

                &:nth-of-type(3n) {
                    margin-right: 0;
                    width: 32.3%;
                }
            }
        }
    }
}
@media (max-width: 479px) {
    .registration-section {
        .photos-object-section {
            .img-block {
                &:nth-of-type(3n) {
                    margin-right: 9px;
                }
                &:nth-of-type(2n) {
                    margin-right: 0;
                }
                &:nth-of-type(5n) {
                    margin-right: 9px;
                }
                width: 48.6%;
                margin-right: 9px;
                margin-bottom: 9px;
            }
        }
    }
}
@media (max-width: 370px) {
    .registration-section {
        .photos-object-section {
            .img-block {
                width: 48.3%;
            }
        }
    }
}

</style>
