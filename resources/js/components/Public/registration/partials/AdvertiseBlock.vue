<template>
    <div class="try">
        <div class="guarantee">{{ $t('Try us for 14 days with our') }} <span>{{ $t('money back guarantee') }}</span></div>
        <div class="choice">{{ $t('Just choose the appropriate package from the types of applications we have presented!')}}</div>
    </div>
</template>

<script>
export default {
    name: "AdvertiseBlock"
}
</script>

<style lang="scss">

.registration-sidebar {
    .try {
        &::before {
        content: "";
        position: absolute;
        background: #0B95F1;
        opacity: 0.12;
        width: 165px;
        height: 400px;
        top: 50%;
        right: 109px;
        transform: translateY(-50%) rotate(25deg);
        pointer-events: none;
        z-index: 1;
    }
        &::after {
            content: "";
            position: absolute;
            opacity: 0.13;
            width: 120px;
            height: 170px;
            border-radius: 12px;
            background: #0B95F1;
            top: 50%;
            right: 56px;
            pointer-events: none;
            -webkit-transform: translateY(-50%) skew(-25deg);
            -moz-transform: translateY(-50%) skew(-25deg);
            -o-transform: translateY(-50%) skew(-25deg);
        }
        width: 380px;
        height: 261px;
        background-image: url("/img/img.png");
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        overflow: hidden;
        padding: 0 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .guarantee {
        span {
            border-bottom: 1px solid rgba(255,255,255,0.4);
        }
        font-weight: 600;
        font-size: 18px;
        line-height: 150%;
        text-align: center;
        color: #FFFFFF;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16);
        margin-bottom: 16px;
    }
    .choice {
        font-weight: normal;
        font-size: 14px;
        line-height: 150%;
        text-align: center;
        color: #FFFFFF;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16);
    }
}

@media (max-width: 1040px) {
    .registration-sidebar {
        .try {
            display: none;
        }
    }
}

</style>
