<template>
  <nav class="navbar navbar-default navigation-site">
   <div class="navbar-header navigation-site-header">
      <button type="button" id="hamburger" class="open-nav" data-toggle="collapse" data-target="#nav-main-page" aria-expanded="false" >
        <span class="fa fa-bars"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="nav-main-page">
      <ul class="nav navbar-nav nav-main">
        <li>
          <router-link to="/">Strona Główna</router-link>
        </li>
        <li>
          <router-link to="posts">Posts</router-link>
        </li>
        <li>
          <router-link to="category">Category</router-link>
          <!-- <ul class="main-categories">
            <li>
              <router-link to="/">Programowanie</router-link>
              <ul class="sub-categories">
                <li>
                 <router-link to="/">Javascript</router-link>
                </li>
                <li>
                 <router-link to="/">C++</router-link>
                </li>
                <li>
                <router-link to="/">Java</router-link>
                </li>
                <li>
                  <router-link to="/">PHP</router-link>
                </li>
                <li>
                  <router-link to="/">C#</router-link>
                </li>
              </ul>
            </li>
            <li>
              <router-link to="posts">Wzorce projektowe</router-link>
              <ul>
                <li>
                 <router-link to="/">Singleton</router-link>
                </li>
                <li>
                 <router-link to="/">Factory</router-link>
                </li>
                <li>
                <router-link to="/">Abstract factory</router-link>
                </li>
                <li>
                  <router-link to="/">Strategy</router-link>
                </li>
                <li>
                  <router-link to="/">Observer</router-link>
                </li>
                <li>
                  <router-link to="/">Flyweight</router-link>
                </li>
              </ul>
            </li>
            <li>
              <router-link to="category">Hardware</router-link>
            </li>
            <li>
              <router-link to="login">Front-end</router-link>
            </li>
            <li>
              <router-link to="register">Back-end</router-link>
            </li>
          </ul> -->
        </li>
        <li v-if="!$root.authenticate">
          <router-link to="login">Zaloguj</router-link>
        </li>
        <li v-if="$root.authenticate">
          <router-link @click.native.prevent="logout" to="#">Wyloguj się</router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>

export default {
  name: 'navigation',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App',

    }
  },
  methods: {
    logout: function () {
      this.$emit('logout');
      this.$http.get('http://localhost:81/symfony-project/api/web/app_dev.php/logout', 
      {
      headers: {
          //'X-XSRF-TOKEN': this.getCsrf()
          //'Content-type': 'application/x-www-form-urlencoded',
         // 'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'
        }
      }
      )
      .then(response => {
       // this.msg = response.body.message || response.body;
       if(response.body === 'Zostałeś wylogowany') {
          this.$root.authenticate = false;
          this.$root.router.push('/');
         
          this.$root.loggedMsg = response.body;
        }
        console.log(response);

      }, 
      error => {
        this.msg = error;
        console.log( error);
      })
    },
  },
  props: {

  },
  components: {
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
