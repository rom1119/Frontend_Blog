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
        password: '',
        _csrf: ''
      },
      data: {},
      msg: '',     
      //auth: document.cookie.slice(document.cookie.indexOf("X-AUTH-TOKEN=")),
      //sessid: document.cookie.slice(document.cookie.indexOf("PHPSESSID=") + 11)
      
    }
    
  },
  created: function (argument) {
    this.verify();
  },
  methods: {
    test: function (argument) {
      this.msg = this.$root.authenticate;
    },
    setVal: function (argument) {
      this.$root.authenticate = !this.$root.authenticate;
    },
    login: function() {
      this.$http.post('../api/web/login_check', 
        `_csrf_token=${this.credential._csrf}&_username=${this.credential.email}&_password=${this.credential.password}`
        ,
      {
        headers: {
          'Content-type': 'application/x-www-form-urlencoded',
        //   //'X-XSRF-TOKEN': this.getCsrf()
        //   'X-AUTH-TOKEN': 'this.auth',
        //   'Cookie': 'this.sessid'
        }
      }
      
     ).then(response => {
        //var res = JSON.parse(response.body);
        if(response.body.isAuth) {
          this.$root.authenticate = true;
          this.$root.router.push('/');
          this.$root.loggedMsg = 'Zalogowany jako ' + response.body.message;
        } else {
          this.$root.authenticate = false;
          this.msg = response.body.message;
        }
        console.log(response);
      }, 
      error => {
        console.log( error);
      })
    },
    verify: function () {
      this.$http.get('../api/web/login',   
      {
      headers: {
          //'X-XSRF-TOKEN': this.getCsrf()
          //'Content-type': 'application/x-www-form-urlencoded',
         // 'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'
        }
      }
      )
      .then(response => {
       // this.msg = this.$root.getCsrfHeader(response);
       this.credential._csrf = this.$root.getCsrf(response);
        console.log(response);
      }, 
      error => {
        this.msg = error;
        console.log( error);
      })
    },
    users: function () {
      this.$http.get('../api/web/admin/users', {
        
      },
      {
      // headers: {
      //     //'X-XSRF-TOKEN': this.getCsrf()
      //     'Cookie': 'this.sessid'
      //   }
      }
      )
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
