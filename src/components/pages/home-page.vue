<template>
  <main class="content-home">
    <section class="slider-container">
      <span>Slider</span>
    </section>
    <section class="latest-posts">
      <post-widget></post-widget>
    </section>
    <section class="most-rating-article">
      
    </section>


  </main>
  
</template>

<script>

import post from '../elements/post-widget'



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