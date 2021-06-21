<template>
    <div :class="{ 'steps-item-block': true, 'completed': step < activeStep, 'in-work': step === activeStep }">
        <div class="number-step">
            {{ step }}
            <svg class="step-check" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="11" cy="11" r="10" fill="#6BB63F" stroke="#F7F8FA" stroke-width="2"/>
                <g filter="url(#filter0_d)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2072 8.70712L10.0001 14.9142L6.29297 11.2071L7.70718 9.79291L10.0001 12.0858L14.793 7.29291L16.2072 8.70712Z" fill="white"/>
                </g>
                <defs>
                    <filter id="filter0_d" x="6.29297" y="7.29291" width="9.91421" height="8.62132" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                        <feOffset dy="1"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.16 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                    </filter>
                </defs>
            </svg>
        </div>
        <div class="name-step">{{ title }}</div>
    </div>
</template>

<script>
export default {
    name: "RegistrationStepsItem",
    props: [ 'step', 'activeStep', 'title' ]
}
</script>

<style scoped>

</style>
