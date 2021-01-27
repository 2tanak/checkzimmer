<template>
  <b-navbar class="fixed-top" toggleable="md" type="dark" variant="info">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="head-logo" href="/">
            <svg width="210" height="28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M45.4 19.1c.1 0 .2 0 .3.1.1 0 .2.1.3.2l1.5 1.6c-.7.9-1.5 1.5-2.5 1.9-1 .4-2.1.6-3.5.6-1.2 0-2.3-.2-3.3-.6-1-.4-1.8-1-2.5-1.7s-1.2-1.6-1.6-2.6c-.4-1-.5-2.1-.5-3.3 0-1.2.2-2.3.6-3.3.4-1 1-1.9 1.7-2.6.7-.7 1.6-1.3 2.7-1.7 1-.4 2.2-.6 3.4-.6.6 0 1.2.1 1.7.2s1 .3 1.5.4c.5.2.9.4 1.3.7.4.3.7.5 1 .9L46.2 11l-.3.3c-.1.1-.3.1-.5.1-.1 0-.3 0-.4-.1-.1-.1-.2-.1-.4-.2-.1-.1-.3-.2-.4-.3-.2-.1-.3-.2-.6-.3-.2-.1-.5-.2-.8-.2-.3-.1-.6-.1-1-.1-.7 0-1.3.1-1.9.4-.6.2-1 .6-1.5 1-.4.4-.7 1-.9 1.6-.2.6-.3 1.4-.3 2.1 0 .8.1 1.6.3 2.2.2.6.5 1.2.9 1.6.4.4.8.8 1.4 1 .5.2 1.1.3 1.7.3h.9c.3 0 .5-.1.8-.2.2-.1.5-.2.7-.3.2-.1.4-.3.7-.5.1-.1.2-.1.3-.2.3-.1.4-.1.5-.1zm18.3 4.2h-3.8v-6.8h-6.6v6.8h-3.8V7.1h3.8v6.8h6.6V7.1h3.8v16.2zM77.2 7.1V10h-6.6v3.8h5.1v2.8h-5.1v3.9h6.6v2.9H66.8V7.1h10.4zm13.5 12c.1 0 .2 0 .3.1.1 0 .2.1.3.2l1.5 1.6c-.7.9-1.5 1.5-2.5 1.9-1 .4-2.1.6-3.5.6-1.2 0-2.3-.2-3.3-.6-1-.4-1.8-1-2.5-1.7s-1.2-1.6-1.6-2.6c-.4-1-.5-2.1-.5-3.3 0-1.2.2-2.3.6-3.3.4-1 1-1.9 1.7-2.6.8-.9 1.7-1.4 2.7-1.8 1-.4 2.2-.6 3.4-.6.6 0 1.2.1 1.7.2s1 .3 1.5.4c.5.1.9.4 1.3.6.4.3.7.5 1 .9l-1.3 1.7-.3.3c-.1.1-.3.1-.5.1-.1 0-.3 0-.4-.1-.1-.1-.2-.1-.4-.2-.1-.1-.3-.2-.4-.3-.2-.1-.3-.2-.6-.3-.2-.1-.5-.2-.8-.2-.3-.1-.6-.1-1-.1-.7 0-1.3.1-1.9.4-.6.2-1 .6-1.5 1-.4.4-.7 1-.9 1.6-.2.6-.3 1.4-.3 2.1 0 .8.1 1.6.3 2.2.2.6.5 1.2.9 1.6.4.4.8.8 1.4 1 .5.2 1.1.3 1.7.3h.9c.3 0 .5-.1.8-.2.2-.1.5-.2.7-.3.2-.1.4-.3.7-.5.1-.1.2-.1.3-.2.2.1.4.1.5.1zm7.9-5.4h.6c.6 0 1-.2 1.2-.5l3.6-5.3c.2-.3.4-.5.7-.6.3-.1.6-.2.9-.2h3.3l-4.8 6.5c-.2.2-.3.4-.5.6-.2.2-.4.3-.6.4.3.1.5.2.8.4.2.2.5.4.6.7l4.9 7.5h-4c-.1 0-.3-.1-.4-.1-.1 0-.2-.1-.3-.2-.1-.1-.2-.2-.2-.3l-3.7-5.6c-.1-.2-.3-.4-.5-.4-.2-.1-.5-.1-.8-.1h-.9v6.9h-3.8V7.1h3.8v6.6h.1zm11.5 1.5h6V18h-6v-2.8zm20.2-8.1v1.4c0 .2 0 .4-.1.6-.1.2-.1.4-.3.5l-7.6 10.8h7.7v2.9h-12.5v-1.4c0-.2 0-.3.1-.5s.1-.3.2-.5l7.6-10.9h-7.3V7.1h12.2zm6.2 16.2h-3.8V7.1h3.8v16.2zm11.7-7.4c.1.3.3.6.4.9.1.3.3.6.4.9.1-.3.3-.6.4-.9.1-.3.3-.6.4-.9l4.1-8.2c.1-.1.1-.2.2-.3.1-.1.2-.1.3-.2.1 0 .2-.1.3-.1h3.3v16.2h-3.3V14c0-.5 0-.9.1-1.5l-4.3 8.3c-.1.3-.3.5-.5.6-.2.1-.5.2-.8.2h-.5c-.3 0-.5-.1-.8-.2-.2-.1-.4-.3-.5-.6l-4.3-8.3c0 .3.1.5.1.8v10H140V7.1h3.3c.1 0 .2 0 .3.1.1 0 .2.1.3.2.1.1.2.2.2.3l4.1 8.2zm21.3 0c.1.3.3.6.4.9.1.3.3.6.4.9.1-.3.3-.6.4-.9.1-.3.3-.6.4-.9l4.2-8.2c.1-.1.1-.2.2-.3.1-.1.2-.1.3-.2.1 0 .2-.1.3-.1h3.3v16.2h-3.3V14c0-.5 0-.9.1-1.5l-4.3 8.3c-.1.3-.3.5-.5.6-.2.1-.5.2-.8.2h-.5c-.3 0-.5-.1-.8-.2-.2-.1-.4-.3-.5-.6l-4.3-8.3c0 .3.1.5.1.8v10h-3.3V7.1h3.3c.1 0 .2 0 .3.1.1 0 .2.1.3.2.1.1.2.2.2.3l4.1 8.2zM193 7.1V10h-6.6v3.8h5.1v2.8h-5.1v3.9h6.6v2.9h-10.4V7.1H193zm6.3 10.2v6h-3.8V7.1h5.3c1.2 0 2.2.1 3 .4.8.2 1.5.6 2 1s.9.9 1.1 1.5c.2.6.4 1.2.4 1.9 0 .5-.1 1-.2 1.5s-.4.9-.6 1.3c-.3.4-.6.7-1 1.1-.4.3-.9.6-1.4.8.3.1.5.3.7.5.2.2.4.4.6.7l3.4 5.6h-3.4c-.6 0-1.1-.2-1.4-.7l-2.7-4.7c-.1-.2-.3-.4-.4-.4-.2-.1-.4-.1-.7-.1h-.9v-.2zm0-2.6h1.5c.5 0 .9-.1 1.3-.2s.7-.3.9-.5c.2-.2.4-.5.5-.8.1-.3.2-.6.2-1 0-.7-.2-1.3-.7-1.7-.5-.4-1.2-.6-2.1-.6h-1.5v4.8h-.1z" fill="#333646"/>
                <path d="M12.7 0L0 12.6v12.7h25.3V12.6L12.7 0zm-2.5 22.2l-5.5-5.5 2.6-2.6 2.8 2.8 6.8-6.9 2.6 2.6-9.3 9.6z" fill="url(#paint0_linear)"/>
                <defs>
                    <linearGradient id="paint0_linear" x1="25.433" y1="12.753" x2="1.201" y2="25.449" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FF2E00"/>
                        <stop offset="1" stop-color="#FF8E58"/>
                    </linearGradient>
                </defs>
            </svg>
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center ml-auto ml-lg-0">
      <!--<b-navbar-nav class="header-links d-none d-md-flex" v-if="$auth.ready() && $auth.user()">
        <b-nav-item href="#"><i class="mdi mdi-image-filter"></i>Gallery</b-nav-item>
        <b-nav-item href="#" active><i class="mdi mdi-email-outline"></i>Inbox</b-nav-item>
        <b-nav-item href="#"><i class="mdi mdi-calendar"></i>Calendar</b-nav-item>
      </b-navbar-nav>-->
      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto" v-if="$auth.ready() && $auth.user()">
        <!--<b-nav-item-dropdown right class="preview-list">
          <template slot="button-content">
            <div class="count-indicator">
              <i class="icon mdi mdi-email-variant"></i>
              <span class="count">7</span>
            </div>
          </template>
          <b-dropdown-item class="preview-item" href="#">
            <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
            </p>
            <span class="badge badge-pill badge-warning">View all</span>
          </b-dropdown-item>
          <b-dropdown-item class="preview-item" href="#">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-success">
                <i class="mdi mdi-alert-circle-outline mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-medium">Application Error</h6>
              <p class="font-weight-light small-text">
                Just now
              </p>
            </div>
          </b-dropdown-item>
          <b-dropdown-item class="preview-item" href="#">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-warning">
                <i class="mdi mdi-comment-text-outline mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-medium">Settings</h6>
              <p class="font-weight-light small-text">
                Private message
              </p>
            </div>
          </b-dropdown-item>
          <b-dropdown-item class="preview-item" href="#">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-info">
                <i class="mdi mdi-email-outline mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-medium">New user registration</h6>
              <p class="font-weight-light small-text">
                2 days ago
              </p>
            </div>
          </b-dropdown-item>
        </b-nav-item-dropdown>-->
        <!--<b-nav-item-dropdown right class="preview-list">
          <template slot="button-content">
            <div class="count-indicator">
              <i class="icon mdi mdi-bell-outline"></i>
              <span class="count">7</span>
            </div>
          </template>
          <b-dropdown-item class="preview-item flex-wrap flex-sm-nowrap" href="#">
            <p class="mb-0 font-weight-normal float-left">You have 4 unread mails</p>
            <span class="badge badge-pill badge-warning">View all</span>
          </b-dropdown-item>
          <b-dropdown-item class="preview-item">
            <div class="preview-thumbnail">
              <img src="../../assets/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
            </div>
            <div class="preview-item-content flex-grow py-2">
              <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
              <p class="font-weight-light small-text"> The meeting is cancelled </p>
            </div>
          </b-dropdown-item>
          <b-dropdown-item class="preview-item">
            <div class="preview-thumbnail">
              <img src="../../assets/images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
            </div>
            <div class="preview-item-content flex-grow py-2">
              <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey</p>
              <p class="font-weight-light small-text"> The meeting is cancelled </p>
            </div>
          </b-dropdown-item>
          <b-dropdown-item class="preview-item">
            <div class="preview-thumbnail">
              <img src="../../assets/images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
            </div>
            <div class="preview-item-content flex-grow py-2">
              <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins</p>
              <p class="font-weight-light small-text"> The meeting is cancelled </p>
            </div>
          </b-dropdown-item>
        </b-nav-item-dropdown>-->
        <b-nav-item-dropdown right class="preview-list">
          <template slot="button-content">
              <i class="fa fa-user-circle text-white profile-pic"></i>
          </template>
          <!--<b-dropdown-item href="#" class="preview-item flex-wrap">Profile</b-dropdown-item>-->
          <b-dropdown-item href="#" class="preview-item flex-wrap" @click.prevent="logout">Signout</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
      <button v-if="$auth.ready() && $auth.user()"
              class="navbar-toggler navbar-toggler-right align-self-center" type="button" @click="collapedMobileSidebar()">
        <span class="mdi mdi-menu"></span>
      </button>
        <b-dropdown :text="language_active" class="languages-block">
            <b-dropdown-item v-for="language in langList" href="#" @click.prevent="langSwitch(language)">{{ language }}</b-dropdown-item>
        </b-dropdown>
    </div>
  </b-navbar>
</template>

<script lang="js">
import ApiRequest from "../../../components/API/ApiRequest";

let LanguageRequest = ApiRequest('languages');
let languages = new LanguageRequest;

export default {
    name: 'app-header',
    data() {
        return {
            languages: [],
            language_active: ''
        }
    },
    mounted() {
        languages.all()
            .then(resp => {
                this.languages = resp.data;
                this.language_active = this.$i18n.locale;
            })
    },
    methods: {
        collapedMobileSidebar() {
            document.querySelector('.sidebar').classList.toggle('active')
        },
        logout() {
            this.$auth.logout({
                makeRequest: true,
                redirect: {name: 'login'},
            })
        },
        langSwitch(lang) {
            this.language_active = lang;
            localStorage.setItem('lang', lang);
            document.location.reload();
        }
    },
    computed: {
        langList() {
            if (!this.languages) {
                return []
            }
            console.log(this.languages);
            return this.languages.map( item => item.split('.')[0] );
        },
    }
}
</script>

<style scoped>
.app-header {
}
.profile-pic {
    font-size: 24px;
}

</style>
