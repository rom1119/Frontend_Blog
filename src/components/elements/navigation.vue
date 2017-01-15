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
          <router-link to="/">Home</router-link>
        </li>
        <li>
          <router-link to="posts">Posts</router-link>
        </li>
        <li>
          <router-link to="category">Category</router-link>
        </li>
        <li>
          <router-link to="login">Login</router-link>
        </li>
        <li>
          <router-link to="register">Register</router-link>
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
      msg: 'Welcome to Your Vue.js App'
    }
  },
  props: {

  },
  components: {
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
