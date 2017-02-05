<template>
  <div class="row">
    <section class="full-post-page col-md-12">
      <full-post></full-post>
    </section>
  </div>
</template>

<script>
import fullPost from '../layout/public/post.vue'

export default {
  name: 'post-page',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  props: {

  },
  components: {
    'full-post': fullPost
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>