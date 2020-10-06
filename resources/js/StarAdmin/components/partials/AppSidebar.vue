<template>
  <section class="app-sidebar" v-if="$auth.ready() && $auth.user()">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item nav-profile">
          <div class="nav-link">
            <div class="profile-image">
                <i class="fa fa-user-circle text-info userpic"></i>
            </div>
            <div class="profile-name">
              <p class="name">{{ name }}</p>
              <p class="designation">{{ role }}</p>
              <div class="badge badge-teal mx-auto mt-3">Online</div>
            </div>
          </div>
        </li>
        <li class="nav-item"><router-link class="nav-link" :to="{ name: 'dashboard' }">
            <img class="menu-icon" src="../../assets/images/menu_icons/01.png" alt="menu icon">
            <span class="menu-title">Dashboard</span></router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'requests'}">
                <img class="menu-icon" src="../../assets/images/menu_icons/02.png" alt="menu icon">
                <span class="menu-title">Requests</span>
            </router-link>
        </li>
        <li class="nav-item">
          <span class="nav-link" v-b-toggle="'sample-pages'">
            <img class="menu-icon" src="../../assets/images/menu_icons/08.png" alt="menu icon">
              <span class="menu-title">Property</span>
              <i class="fa fa-angle-down ml-auto mr-0"></i>
          </span>
          <b-collapse id="sample-pages">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'property' }">Property List</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'assigned-room-types' }">Assigned Types</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'rooms' }">Property Rooms</router-link></li>
            </ul>
          </b-collapse>
        </li>
          <li class="nav-item">
          <span class="nav-link" v-b-toggle="'booking-submenu'">
            <img class="menu-icon" src="../../assets/images/menu_icons/08.png" alt="menu icon">
              <span class="menu-title">Booking.com</span>
              <i class="fa fa-angle-down ml-auto mr-0"></i>
          </span>
              <b-collapse id="booking-submenu">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'booking-items' }">Items</router-link></li>
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'booking-mapping' }">Mapping</router-link></li>
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'booking-data' }">Data</router-link></li>
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'booking-settings' }">Settings</router-link></li>
                  </ul>
              </b-collapse>
          </li>
        <li class="nav-item">
          <span class="nav-link" v-b-toggle="'ui-components'">
            <img class="menu-icon" src="../../assets/images/menu_icons/03.png" alt="menu icon">
            <span class="menu-title">Website</span>
              <i class="fa fa-angle-down ml-auto mr-0"></i>
          </span>
          <b-collapse id="ui-components">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'website-header' }">Header</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'website-footer' }">Footer</router-link></li>
            </ul>
          </b-collapse>
        </li>
        <li class="nav-item">
          <span class="nav-link" v-b-toggle="'utilities'">
            <img class="menu-icon" src="../../assets/images/menu_icons/06.png" alt="menu icon">
            <span class="menu-title">Data</span>
              <i class="fa fa-angle-down ml-auto mr-0"></i>
          </span>
          <b-collapse id="utilities">
             <ul class="nav flex-column sub-menu">
               <li class="nav-item"><router-link class="nav-link" :to="{ name: 'room-types' }">Room Types</router-link></li>
               <li class="nav-item"><router-link class="nav-link" :to="{ name: 'features' }">Features</router-link></li>
                 <li class="nav-item"><router-link class="nav-link" :to="{ name: 'geocoder-cache' }">Geocoder Cache</router-link></li>
             </ul>
          </b-collapse>
        </li>
          <li class="nav-item">
          <span class="nav-link" v-b-toggle="'feedback'">
            <img class="menu-icon" src="../../assets/images/menu_icons/06.png" alt="menu icon">
            <span class="menu-title">Feedback</span>
              <i class="fa fa-angle-down ml-auto mr-0"></i>
          </span>
              <b-collapse id="feedback">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'questions' }">Questions</router-link></li>
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'reviews' }">Reviews</router-link></li>
                  </ul>
              </b-collapse>
          </li>
        <li class="nav-item"><router-link class="nav-link" :to="{ name: 'users' }"><img class="menu-icon" src="../../assets/images/menu_icons/04.png" alt="menu icon"><span class="menu-title">Users</span></router-link></li>
      </ul>
    </nav>
  </section>

</template>

<script lang="js">
export default {
    name: 'app-sidebar',
    data() {
        return {
            name: '',
            role: ''
        }
    },
    mounted() {
        this.$auth
            .load()
            .then(() => {
                this.$auth.fetch()
                    .then( user => {
                        this.name = user.data.name;
                        this.role = user.data.role;
                    })
            });
    },
    computed: {
    }
}
</script>

<style scoped>
.app-sidebar {
}
.userpic {
    font-size: 76px!important;
}
</style>
