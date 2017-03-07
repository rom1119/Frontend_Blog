<template>
  <add-post-form></add-post-form>
</template>

<script>
import postFormAdd from '../../elements/add-post-form.vue'

export default {
  name: 'admin-add-post',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  props: {

  },
  components: {
    'add-post-form': postFormAdd
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>