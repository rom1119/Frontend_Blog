<template>
  <form accept-charset="utf-8" id="login-form" action=""  method="POST">
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
        <input type="submit" @click.prevent="login" id="input-send" value="Zaloguj">
      </label>
      <button @click.prevent="verify">Verify</button>
      <div class="login-error">
        <span v-text="msg"></span>
      </div>
    </div>
    
  </form>
</template>

<script>

export default {
  name: 'login-page',
  data: function() {
    return {
      credential: {
        email: '',
        password: ''
      },
      data: {},
      msg: 'dsd',
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
        var res = JSON.parse(response.body);
        this.msg = this.data;
        console.log(response);
      }, 
      error => {
        console.log( error);
      })
    },
    verify: function () {
      this.$http.post('http://localhost:81/symfony-project/api/web/app_dev.php/user/verify', {
        data: this.data,
      })
      .then(response => {
        this.msg = response.body.message || response.body;
        console.log(response);
      }, 
      error => {
        this.msg = error;
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
