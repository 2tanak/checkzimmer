<template>

  <section class="login">
    <div class="wrapper d-flex align-items-center auth login-full-bg">
      <div class="row w-100">
        <div class="col-lg-6 mx-auto">
          <div class="auth-form-dark text-left p-5">
            <h2>Login</h2>
            <h4 class="font-weight-light">Hello! let's get started</h4>
            <form class="pt-5">
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input v-model="form.email"
                         type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
                  <i class="mdi mdi-account"></i>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input v-model="form.password"
                         type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  <i class="mdi mdi-eye"></i>
                </div>
                <div class="mt-5">
                  <a class="btn btn-block btn-warning btn-lg font-weight-medium" href="#" @click.prevent="login">Login</a>
                </div>
                <div class="mt-3 text-center">
                  <a href="#" class="auth-link text-white">Forgot password?</a>
                </div>
              </form>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</template>

<script lang="js">
export default {
    name: 'login',
    data() {
        return {
            form: {
                //csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                email: '',
                password: ''
            },
        }
    },
    methods: {
        login() {
            this.$auth.login({
                data: this.form,
                redirect: {name: 'dashboard'},
                staySignedIn: true,
                fetchUser: true
            })
        }
    }
}
</script>

<style scoped lang="scss">
.login {

}
</style>
