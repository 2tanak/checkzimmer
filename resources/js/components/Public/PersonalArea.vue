<template>
    <div>
        <Nav />
        <router-view></router-view>
    </div>
</template>

<script>
import Nav from "./cabinet/partials/Nav";
export default {
    name: "personal",
    components: {
        Nav
    },
    data() {
        return {};
    },
    mounted() {},
    methods: {}
};
</script>
