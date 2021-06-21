<template>
    <li :class="{ 'available': active, 'not-available': !active }">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="9" cy="9" r="9" fill="#5A5A5E"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2071 6.70706L7.99995 12.9142L4.29285 9.20706L5.70706 7.79285L7.99995 10.0857L12.7928 5.29285L14.2071 6.70706Z" fill="white"/>
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

<style scoped>

</style>
