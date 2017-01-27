<template>
  <main class="register-page col-md-8">
      <register-form></register-form>
  </main>
</template>

<script>
import registerForm from './../elements/register-form.vue'

export default {
  name: 'register-page',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  props: {

  },
  components: {
    'register-form': registerForm
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>