<template>
  <div class="row">
    <section class="register-page col-md-8">
        <register-form ></register-form>
    </section>
    <sidebar></sidebar>
  </div>
</template>

<script>
import registerForm from './../elements/register-form.vue'
import sidebar from './../layout/public/sidebar'
//@submit.native.prevent="register" :registerMessage="msg.body"
export default {
  name: 'register-page',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  props: {

  },
  methods: {
    register: function() {
      this.$http.post('http://localhost:81/symfony-project/api/web/app_dev.php/user/register', {
        name: 'this.sdfsddsfsdfemail',
        secondname: 'this.sdfsdfssdfemail',
        username: 'this.password',
        password: 'PUT',
        role: 'PUT',
        email: 'PUT',
        birthday: '12-11-1999',
        gender: 'PUT',
        phone: '1234',
        avatar: 'PUT',
        desc: 'PUT',
        posts: 'PUT',
        website: 'PUT',
        //'_csrf': this.getCsrf()
      },
      {
        headers: {
          //'X-XSRF-TOKEN': this.getCsrf()
          //'X-HTTP-Method-Override': 'PUT'
        }
      }
      
     ).then(response => {
        console.log(response);
        this.msg = response;
      }, 
      error => {
        console.log( error);
        this.msg = error;
      })
    },
    getCsrf: function() {
      return decodeURIComponent(document.cookie.slice(document.cookie.indexOf("XSRF-TOKEN=") + 11));
    }
  },
  components: {
    'register-form': registerForm,
    'sidebar': sidebar
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>