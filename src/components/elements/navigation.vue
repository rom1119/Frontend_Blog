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
        <li>
          <router-link to="login">Zaloguj</router-link>
        </li>
        <li>
          <router-link to="logout">Wyloguj się</router-link>
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
