<template>
    <div class="dots">
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
        <div class="dots-item"></div>
    </div>
</template>

<script>
export default {
name: "DotDotDot"
}
</script>

<style lang="scss">

.steps-section {
    .dots {
        .dots-item {
            &:first-of-type {
                margin-left: 0;
            }
            &:last-of-type {
                margin-right: 0;
            }
            width: 4px;
            height: 4px;
            background: #DCDEEB;
            border-radius: 50%;
            margin: 2px;
        }
        display: none;
    }
}

@media (max-width: 1040px) {
    .steps-section {
        .dots {
            display: flex;
            align-items: center;
            width: 148px;
            margin: 0 22px;
        }
    }
}
@media (max-width: 767px) {
    .steps-section {
        .dots {
            .dots-item {
                &:nth-of-type(1) {
                    display: none;
                }
                &:nth-of-type(2) {
                    display: none;
                }
                &:nth-of-type(3) {
                    display: none;
                }
                &:nth-of-type(4) {
                    display: none;
                }
                &:nth-of-type(5) {
                    display: none;
                }
                &:nth-of-type(6) {
                    display: none;
                }
                &:nth-of-type(7) {
                    display: none;
                }
                &:nth-of-type(8) {
                    display: none;
                }
                &:nth-of-type(9) {
                    display: none;
                }
                &:nth-of-type(10) {
                    display: none;
                }
                &:nth-of-type(11) {
                    margin-left: 0;
                }
            }
            width: 68px;
        }
    }
}
@media (max-width: 575px) {
    .steps-section {
        .dots {
            margin: 0 17px;
        }
        .steps-item-block.in-work {
            .number-step {
                &::before {
                    min-width: 44px;
                    max-width: 44px;
                    height: 44px;
                }
            }
        }
    }
}
@media (max-width: 479px) {
    .steps-section {
        .dots {
            .dots-item {
                &:nth-of-type(11) {
                    display: none;
                }
                &:nth-of-type(12) {
                    display: none;
                }
                &:nth-of-type(13) {
                    display: none;
                }
                &:nth-of-type(14) {
                    display: none;
                }
                &:nth-of-type(15) {
                    display: none;
                }
                &:nth-of-type(16) {
                    margin-left: 0;
                }
            }
            margin: 0 9px;
            width: 28px;
        }
    }
}

</style>
