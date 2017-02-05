<template>
  <div class="row">
    <section class="login-page col-md-8">
      <login-form @submit.native.prevent="login"></login-form>
      <div class="register">
        <p>
          Jeśli nie masz jeszcze konta 
          <router-link to="register">załóż konto</router-link>
           aby móc dodawac posty 
        </p>
      </div>
    </section>
    <sidebar></sidebar>
  </div>
</template>

<script>
//import jwt_decode from 'jwt-decode';
import loginForm from './../elements/login-form.vue'
import sidebar from './../layout/public/sidebar'

export default {
  name: 'login-page',
  data: function() {
    return {
      email: '',
      password: '',
      csrf: document.cookie.slice(document.cookie.indexOf("XSRF-TOKEN=") + 11)
      
    }
    
  },
  components: {
    'login-form': loginForm,
    'sidebar': sidebar
  },
  methods: {
    login: function() {
      this.$http.post('/auth/local/', {
        email: this.email,
        password: this.password,
        //'_csrf': this.getCsrf()
      },
      {
        headers: {
          'X-XSRF-TOKEN': this.getCsrf()
        }
      }
      
     ).then(response => {
        console.log(response);
      }, 
      error => {
        console.log( error);
      })
    },
    getCsrf: function() {
      return decodeURIComponent(document.cookie.slice(document.cookie.indexOf("XSRF-TOKEN=") + 11));
    }
  }
}
</script>

<style>

</style>
