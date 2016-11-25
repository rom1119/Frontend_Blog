<template>
    <navigation></navigation>
</template>

<script>
import navigation from '../../elements/navigation.vue'
export default {
  name: "header-site",
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  props: {

  },
  components: {
  	navigation: navigation
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>