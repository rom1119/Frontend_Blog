<template>
  <form accept-charset="utf-8" id="login-form" @submit.prevent="login()"  method="POST">
    <div class="login-form-header">
      <h4>
        Logowanie
      </h4>
    </div>
    <div class="form-element row" id="username-element-form">
      <label for="" class="login-form-username col-sm-8 col-xs-12">
        <p>Email</p>
        <input type="email" name="_email" v-model="credential.email" class="" id="input-username" required="true">
      </label>
    </div>
    <div class="form-element row" id="password-element-form">
      <label for="" class="login-form-password  col-sm-8 col-xs-12">
        <p>Hasło</p>
        <input type="password" name="_password" v-model="credential.password" id="input-password" min="6" required="true">
      </label>

    </div>
    <div class="form-element" id="submit-element-form">
      <label for="" class="login-form-password">
        <input type="submit" id="input-send" value="Zaloguj" required="true">
      </label>
      <button @click="verify">Verify</button>
      <div class="login-error">
        <span>{{ msg }}</span>
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
      credential: {
        email: '',
        password: ''
      },
      msg: 'Login lub hasło jest niepoprawne',
      csrf: document.cookie.slice(document.cookie.indexOf("XSRF-TOKEN=") + 11)
      
    }
    
  },
  methods: {
    login: function() {
      this.$http.post('http://localhost:81/symfony-project/api/web/app_dev.php/user/auth', {
        email: this.credential.email,
        password: this.credential.password,
        //'_csrf': this.getCsrf()
      },
      {
        headers: {
         // 'X-XSRF-TOKEN': this.getCsrf()
        }
      }
      
     ).then(response => {
      this.msg = response.body.message || response.body;
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
