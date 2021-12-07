<template>
    <div class="container">
        <ul class="nav">
            <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'general' }">
                    <span class="menu-title">General</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'profile' }">
                    <span class="menu-title">Profile</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'contact' }">
                    <span class="menu-title">Contact</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'property' }">
                    <span class="menu-title">Property</span>
                </router-link>
            </li>

            <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'security' }">
                    <span class="menu-title">Security</span>
                </router-link>
            </li>

            <li class="nav-item" @click.prevent="logout">
                <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Nav",

    methods: {
        logout() {}
    }
};
</script>


