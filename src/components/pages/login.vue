<template>
  <div class="container">
    <div class="row">
      <form class="col-xs-offset-3 col-xs-6">
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">Email</label>
          <input v-model="email" type="text" name="email" class="form-control" id="inputSuccess1" aria-describedby="helpBlock2">
          <span id="helpBlock2" class="help-block">{{ email }}</span>
        </div>
        <div class="form-group has-warning">
          <label class="control-label" for="inputWarning1">Password</label>
          <input v-model="password" name="password" type="password" class="form-control" id="inputWarning1">
          <span id="helpBlock2" class="help-block">{{ password }}</span>
        </div>
<!--        <div class="form-group has-error">
          <label class="control-label" for="inputError1">Input with error</label>
          <input type="text" class="form-control" id="inputError1">
        </div> -->
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button v-on:click="ale" type="button" class="btn btn-default">Sign in</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
//import jwt_decode from 'jwt-decode';

export default {
  name: 'Login',
  data: function() {
    return {
      email: '',
      password: '',
      csrf: document.cookie.slice(document.cookie.indexOf("XSRF-TOKEN=") + 11)
      
    }
    
  },
  methods: {
    ale: function() {
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
