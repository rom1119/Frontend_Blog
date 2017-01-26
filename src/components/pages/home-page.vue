<template>
  <main class="content-home col-md-8">
   <!--  <section class="slider" data-gallery="slider">
      
    </section> -->
    <section class="latest-posts">
      <header class="latest-posts-header">
        <h3>
          Najnowsze wpisy
        </h2>
      </header>
      <div class="row">
        <post-widget v-for="i in 6"></post-widget>
      </div>
      
    </section>
    <section class="most-rating-posts">
      <header class="most-rating-posts-header">
        <h3>
          Najwyżej oceniane wpisy
        </h2>
      </header>
      <post-widget v-for="i in 6"></post-widget>
    </section>


  </main>
  
</template>

<script>

import post from '../elements/post-content-widget'



export default {
  name: 'home-page',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  props: {

  },
  components: {
    'post-widget': post

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>