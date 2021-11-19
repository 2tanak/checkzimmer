<template>
  <section class="app-sidebar" v-if="$auth.ready() && $auth.user() !== null && $auth.user().id ">
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
              <div class="badge badge-teal mx-auto mt-3">{{ $t('Online') }}</div>
            </div>
          </div>
        </li>
        <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'dashboard' }">
                <img class="menu-icon" :src="require('../../assets/images/menu_icons/01.png').default" alt="menu icon">
                <span class="menu-title">{{ $t('Dashboard') }}</span>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'requests'}">
                <img class="menu-icon" :src="require('../../assets/images/menu_icons/02.png').default" alt="menu icon">
                <span class="menu-title">{{ $t('Requests') }}</span>
            </router-link>
        </li>
        <li class="nav-item">
          <span class="nav-link" v-b-toggle="'sample-pages'">
            <img class="menu-icon" :src="require('../../assets/images/menu_icons/08.png').default" alt="menu icon">
              <span class="menu-title">{{ $t('Property') }}</span>
              <i class="fa fa-angle-down ml-auto mr-0"></i>
          </span>
          <b-collapse id="sample-pages">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'property' }">{{ $t('Property List') }}</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'assigned-room-types' }">{{ $t('Assigned Types') }}</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'rooms' }">{{ $t('Property Rooms') }}</router-link></li>
            </ul>
          </b-collapse>
        </li>
          <li class="nav-item">
          <span class="nav-link" v-b-toggle="'booking-submenu'">
            <img class="menu-icon" :src="require('../../assets/images/menu_icons/08.png').default" alt="menu icon">
              <span class="menu-title">{{ $t('Booking') }}.{{ $t('com') }}</span>
              <i class="fa fa-angle-down ml-auto mr-0"></i>
          </span>
              <b-collapse id="booking-submenu">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'booking-items' }">{{ $t('Items') }}</router-link></li>
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'booking-mapping' }">{{ $t('Mapping') }}</router-link></li>
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'booking-data' }">{{ $t('Data') }}</router-link></li>
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'booking-settings' }">{{ $t('Settings') }}</router-link></li>
                  </ul>
              </b-collapse>
          </li>
        <li class="nav-item">
          <span class="nav-link" v-b-toggle="'ui-components'">
            <img class="menu-icon" :src="require('../../assets/images/menu_icons/03.png').default" alt="menu icon">
            <span class="menu-title">{{ $t('Website') }}</span>
              <i class="fa fa-angle-down ml-auto mr-0"></i>
          </span>
          <b-collapse id="ui-components">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'website-header' }">{{ $t('Header') }}</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'website-footer' }">{{ $t('Footer') }}</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'website-settings' }">{{ $t('Settings') }}</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'website-domains' }">{{ $t('Domains') }}</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'website-pages' }">{{ $t('Pages') }}</router-link></li>
            </ul>
          </b-collapse>
        </li>
        <li class="nav-item">
          <span class="nav-link" v-b-toggle="'utilities'">
            <img class="menu-icon" :src="require('../../assets/images/menu_icons/06.png').default" alt="menu icon">
            <span class="menu-title">{{ $t('Data') }}</span>
              <i class="fa fa-angle-down ml-auto mr-0"></i>
          </span>
          <b-collapse id="utilities">
             <ul class="nav flex-column sub-menu">
               <li class="nav-item"><router-link class="nav-link" :to="{ name: 'room-types' }">{{ $t('Room Types') }}</router-link></li>
               <li class="nav-item"><router-link class="nav-link" :to="{ name: 'features' }">{{ $t('Features') }}</router-link></li>
                 <li class="nav-item"><router-link class="nav-link" :to="{ name: 'geocoder-cache' }">{{ $t('Geocoder Cache') }}</router-link></li>
             </ul>
          </b-collapse>
        </li>
          <li class="nav-item">
          <span class="nav-link" v-b-toggle="'feedback'">
            <img class="menu-icon" :src="require('../../assets/images/menu_icons/06.png').default" alt="menu icon">
            <span class="menu-title">{{ $t('Feedback') }}</span>
              <i class="fa fa-angle-down ml-auto mr-0"></i>
          </span>
              <b-collapse id="feedback">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'questions' }">{{ $t('Questions') }}</router-link></li>
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'reviews' }">{{ $t('Reviews') }}</router-link></li>
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'request' }">{{ $t('Requests') }}</router-link></li>
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'feedback-form' }">{{ $t('Feedback Form') }}</router-link></li>
                  </ul>
              </b-collapse>
          </li>
          <li class="nav-item">
              <span class="nav-link" v-b-toggle="'translation'">
                  <img class="menu-icon" :src="require('../../assets/images/menu_icons/06.png').default" alt="menu icon">
                   <span class="menu-title">{{ $t('Translation') }}</span>
                   <i class="fa fa-angle-down ml-auto mr-0"></i>
              </span>
              <b-collapse id="translation">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'languages' }">{{ $t('Languages') }}</router-link></li>
                      <li class="nav-item"><router-link class="nav-link" :to="{ name: 'featuresTranslation' }">{{ $t('Features') }}</router-link></li>
                  </ul>
              </b-collapse>
          </li>
          <li class="nav-item"><router-link class="nav-link" :to="{ name: 'users' }">
              <img class="menu-icon" :src="require('../../assets/images/menu_icons/04.png').default" alt="menu icon"><span class="menu-title">{{ $t('Users') }}</span></router-link>
          </li>
          <li class="nav-item"><router-link class="nav-link" :to="{ name: 'guests' }">
              <img class="menu-icon" :src="require('../../assets/images/menu_icons/04.png').default" alt="menu icon"><span class="menu-title">{{ $t('Guests') }}</span></router-link>
          </li>
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
