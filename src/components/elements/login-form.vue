<template>
  <form accept-charset="utf-8" @submit.prevent="login" id="login-form" action="" method="POST">
    <div class="login-form-header">
      <h4>
        Logowanie
      </h4>
    </div>
    <div class="form-element row" id="username-element-form">
      <label for="" class="login-form-username col-sm-8 col-xs-12">
        <p>Email</p>
        <input type="text" name="_username" class="" id="input-username" required="true">
      </label>
    </div>
    <div class="form-element row" id="password-element-form">
      <label for="" class="login-form-password  col-sm-8 col-xs-12">
        <p>Hasło</p>
        <input type="password" name="_password" id="input-password" min="6" required="true">
      </label>

    </div>
    <div class="form-element" id="submit-element-form">
      <label for="" class="login-form-password">
        <input type="submit" id="input-send" value="Zaloguj" required="true">
      </label>
      <div class="login-error">
        <span>Login lub hasło jest niepoprawne</span>
      </div>
    </div>
    
  </form>
</template>

<script>
//import jwt_decode from 'jwt-decode';

export default {
  name: 'login-page',
  data: function() {
    return {
      email: '',
      password: '',
      csrf: document.cookie.slice(document.cookie.indexOf("XSRF-TOKEN=") + 11)
      
    }
    
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
