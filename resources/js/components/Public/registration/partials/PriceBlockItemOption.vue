<template>
    <li :class="{ 'available': active, 'not-available': !active }">
        <svg class="active-svg" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
        </svg>
        <svg class="not-active-svg" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="9" cy="9" r="9" fill="#BABCC5"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.75015 10.1644L11.293 12.7072L12.7072 11.293L10.1644 8.75015L12.7073 6.20718L11.2931 4.79297L8.75015 7.33594L6.20718 4.79297L4.79297 6.20718L7.33594 8.75015L4.79312 11.293L6.20733 12.7072L8.75015 10.1644Z" fill="white"/>
        </svg>
        {{ text }}
    </li>
</template>

<script>
export default {
    name: "PriceBlockItemOption",
    props: [ 'text', 'active' ]
}
</script>

<style lang="scss">

svg.active-svg {
    display: none;
}
svg.not-active-svg {
    display: none;
}
.available {
    svg.active-svg {
        display: block;
    }
}
.not-available {
    svg.not-active-svg {
        display: block;
    }
}

</style>
