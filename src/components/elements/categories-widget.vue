<template>
  <section class="categories-widget">
    <header class="categories-widget-header">
      <h3>
        Kategorie
      </h3>
    </header>
    <ul class="main-categories-widget">
      <li class="main-categories-item">
        <router-link to="/">Programowanie</router-link>
        <ul class="sub-categories-widget">
          <li class="sub-categories-item">
           <router-link to="/">Javascript</router-link>
          </li>
          <li class="sub-categories-item">
           <router-link to="/">C++</router-link>
          </li>
          <li class="sub-categories-item">
            <router-link to="/">Java</router-link>
          </li>
          <li class="sub-categories-item">
            <router-link to="/">PHP</router-link>
          </li>
          <li class="sub-categories-item">
            <router-link to="/">C#</router-link>
          </li>
        </ul>
      </li>
      <li class="main-categories-item">
        <router-link to="posts">Wzorce projektowe</router-link>
        <ul class="sub-categories-widget">
          <li class="sub-categories-item">
           <router-link to="/">Singleton</router-link>
          </li>
          <li class="sub-categories-item">
           <router-link to="/">Factory</router-link>
          </li>
          <li class="sub-categories-item">
          <router-link to="/">Abstract factory</router-link>
          </li>
          <li class="sub-categories-item">
            <router-link to="/">Strategy</router-link>
          </li>
          <li class="sub-categories-item">
            <router-link to="/">Observer</router-link>
          </li>
          <li class="sub-categories-item">
            <router-link to="/">Flyweight</router-link>
          </li>
        </ul>
      </li>
      <li class="main-categories-item">
        <router-link to="category">Hardware</router-link>
      </li>
      <li class="main-categories-item">
        <router-link to="login">Front-end</router-link>
      </li>
      <li class="main-categories-item">
        <router-link to="register">Back-end</router-link>
      </li>
    </ul>
  </section>
</template>

<script>


export default {
  name: 'tags-widget',
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
<style lang="scss" scoped>

</style>