<template>
  <section class="slider-container">
    <slider></slider>
  </section>
</template>

<script>

import slider from '../../elements/slider.vue'

export default {
  name: 'home-layout',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  props: {

  },
  components: {
    'slider': slider
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>