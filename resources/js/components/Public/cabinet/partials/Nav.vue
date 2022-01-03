<template>
    <div
        class="container"
        v-if="$auth.ready() && $auth.user() !== null && $auth.user().id"
    >
        <ul class="nav">
            <li class="nav-item" active-class="active">
                <router-link class="nav-link" :to="{ name: 'general' }">
                    <span class="menu-title">{{ $t("General") }}</span>
                </router-link>
            </li>
            <li class="nav-item" active-class="active">
                <router-link class="nav-link" :to="{ name: 'profile' }">
                    <span class="menu-title">{{ $t("Profile") }}</span>
                </router-link>
            </li>
            <li class="nav-item" active-class="active">
                <router-link class="nav-link" :to="{ name: 'Tarif' }">
                    <span class="menu-title">{{ $t("Tarif") }}</span>
                </router-link>
            </li>
            <li class="nav-item" active-class="active">
                <router-link class="nav-link" :to="{ name: 'property' }">
                    <span class="menu-title">{{ $t("Advert") }}</span>
                </router-link>
            </li>

            <li class="nav-item" active-class="active">
                <router-link class="nav-link" :to="{ name: 'security' }">
                    <span class="menu-title">{{ $t("Security") }}</span>
                </router-link>
            </li>

            <li class="nav-item" @click.prevent="logout">
                <a class="nav-link" href="#">{{ $t("Logout") }}</a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Nav",
    mounted() {
        this.$auth.load().then(() => {
            this.$auth.fetch().then(user => {
                this.name = user.data.name;
                this.role = user.data.role;
            });
        });
    },
    methods: {
        logout() {
            this.$auth.logout({
                makeRequest: true,
                redirect: { name: "login" }
            });
        }
    }
};
</script>
<style lang="scss">
.active {
    color: green;
}
</style>
