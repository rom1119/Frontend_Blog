<template>
  <full-post></full-post>
</template>

<script>
import post from '../../elements/full-post'

export default {
  name: 'one-post',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  props: {

  },
  components: {
    'full-post': post
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>