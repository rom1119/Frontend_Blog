<template>
  <div class="container">
    <div class="row asd">
       <post v-for="x in 10" first="sahdihias"></post>
    </div>
  </div>
</template>

<script>
import post from './Post'

export default {
  name: 'admin-edit-post',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  props: {

  },
  components: {
    post: post
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>