<template>
<div class="row">
  <form accept-charset="utf-8" id="login-form" class="col-sm-6" action=""  method="POST">
    <div class="login-form-header">
      <h4>
        Dodaj nowy artykuł
      </h4>
    </div>
    <div class="form-element row" id="username-element-form">
      <label for="" class="login-form-username col-xs-12">
        <p>Tytuł</p>
        <input type="text" name="_title" v-model="dateForm.title" class="" id="input-username" required="true">
      </label>
    </div>
    <div class="form-element row" id="password-element-form">
      <label for="" class="login-form-password  col-xs-12">
        <p>Treść</p>
        <input type="textarea" name="_content" v-model="dateForm.content" id="input-password" min="6" required="true">
      </label>

    </div>

    <div class="form-element row" id="">
      <label for="" class="login-form-password  col-xs-12">
        <p>Kategoria</p>
        <select name="_category" v-model="dateForm.category" id="">
          <option :value="c" v-for="c in category" v-text="c"></option>
        </select>
      </label>

    </div>
    <div class="form-element" id="submit-element-form">
      <label for="" class="login-form-password">
        <input type="submit" @click.prevent="sendArticle" id="input-send" value="Dodaj Artykuł">
      </label>
      <div class="login-error">
        <span v-text="msg"></span>
      </div>
    </div>
    
  </form>

  <form accept-charset="utf-8" id="login-form"class="col-sm-6" action=""  method="POST">
    <div class="login-form-header">
      <h4>
        Dodaj nową kategorie
      </h4>
    </div>
    <div class="form-element row" id="username-element-form">
      <label for="" class="login-form-username col-xs-12">
        <p>Tytuł</p>
        <input type="text" name="new_category" v-model="dateForm.new_category" class="" id="input-username" required="true">
      </label>
    </div>
    <div class="form-element" id="submit-element-form">
      <label for="" class="login-form-password">
        <input type="submit" @click.prevent="sendCategory" id="input-send" value="Dodaj Kategorie">
      </label>
      <div class="login-error">
        <span v-text="msg"></span>
      </div>
    </div>
    
  </form>
  </div>
</template>

<script>


export default {
  name: 'login-page',
  data: function() {
    return {
      dateForm: {
        title: '',
        content: '',
        category: '',
        new_category: '',
        _csrf: ''
      },
      category: '',
      data: {},
      msg: 'dsd',     
      auth: document.cookie.slice(document.cookie.indexOf("X-AUTH-TOKEN=")),
      sessid: document.cookie.slice(document.cookie.indexOf("PHPSESSID=") + 11)
      
    }
    
  },
  created: function (argument) {
    this.loadCategories();
  },
  methods: {
    test: function (argument) {
      this.msg = this.$root.authenticate;
    },
    setVal: function (argument) {
      this.$root.authenticate = !this.$root.authenticate;
    },
    sendArticle: function() {
      this.$http.post('../api/web/post', 
        `_csrf_token=${this.dateForm._csrf}&_title=${this.dateForm.title}&_content=${this.dateForm.content}
        &_category=${this.dateForm.category}`
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
          this.msg = response.body.message;
        console.log(response);
      }, 
      error => {
        console.log( error);
      })
    },
    sendCategory: function() {
      this.$http.post('../api/web/category', 
        `_csrf_token=${this.dateForm._csrf}&_category=${this.dateForm.new_category}`
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
          this.msg = response.body.message;
        console.log(response);
      }, 
      error => {
        console.log( error);
      })
    },
    loadCategories: function () {
      this.$http.get('../api/web/category/all',   
      {
      headers: {
          //'X-XSRF-TOKEN': this.getCsrf()
          //'Content-type': 'application/x-www-form-urlencoded',
         // 'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'
        }
      }
      )
      .then(response => {
        this.category = response.body;
       //this.dateForm._csrf = this.$root.getCsrfHeader(response);
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
