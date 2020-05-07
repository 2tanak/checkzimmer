<template>
  <section class="app-sidebar">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item nav-profile">
          <div class="nav-link">
            <div class="profile-image"> <img src="../../assets/images/faces/face4.jpg" alt="image"/> <span class="online-status online"></span> </div>
            <div class="profile-name">
              <p class="name">Richard V.Welsh</p>
              <p class="designation">Manager</p>
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
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'property' }">Property</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'rooms' }">Rooms</router-link></li>
              <li class="nav-item"><router-link class="nav-link" :to="{ name: 'categories' }">Categories</router-link></li>
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
        <li class="nav-item"><router-link class="nav-link" to="/forms/"><img class="menu-icon" src="../../assets/images/menu_icons/04.png" alt="menu icon"><span class="menu-title">Users</span></router-link></li>
      </ul>
    </nav>
  </section>

</template>

<script lang="js">
export default {
  name: 'app-sidebar'
}
</script>

<style scoped lang="scss">
.app-sidebar {

}
</style>
