<template>
  <section class="most-rating-widget">
    <ul class="most-rating-list container">
      <li class="most-rating-item row">
        <div class="post-icon col-md-2">
          <a href="">
            <i class="icon fa fa-facebook"></i>
          </a>
        </div>
        <div class="post-info col-md-10">
          <div class="post-title">
            <h3>
              <router-link to="/">Programowanie obiektowe (polimorfizm)</router-link>
            </h3>
          </div>
          <div class="post-time">
            <time datetime="2009-10-21T18:26-07:00">2009/10/21 at 6:26pm</time>
          </div>
        </div>
      </li>
      <li class="most-rating-item row">
        <div class="post-icon col-md-2">
          <a href="">
            <i class="icon fa fa-facebook"></i>
          </a>
        </div>
        <div class="post-info col-md-10">
          <div class="post-title">
            <h3><router-link to="/">Jak przyspieszyc dzialanie komputera</router-link></h3>
          </div>
          <div class="post-time">
            <time datetime="2009-10-21T18:26-07:00">2009/10/21 at 6:26pm</time>
          </div>
        </div>
      </li>
      <li class="most-rating-item row">
        <div class="post-icon col-md-2">
          <a href="">
            <i class="icon fa fa-facebook"></i>
          </a>
        </div>
        <div class="post-info col-md-10">
          <div class="post-title">
            <h3><router-link to="/">Przydatne narzedzia dla frontendowca</router-link></h3>
          </div>
          <div class="post-time">
            <time datetime="2009-10-21T18:26-07:00">2009/10/21 at 6:26pm</time>
          </div>
        </div>
      </li>
    </ul>
  </section>
</template>

<script>


export default {
  name: 'most-rating-widget',
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