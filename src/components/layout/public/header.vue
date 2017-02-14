<template>
  <header class="header-site">
    <logo></logo>
    <navigation ></navigation>
  </header>
</template>

<script>
import navigation from '../../elements/navigation.vue'
import logo from '../../elements/logo.vue'
export default {
  name: "header-page",
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  methods: {
    al: function (argument) {
      alert('sdf');
    }
  },
  props: {

  },
  components: {
  	navigation: navigation,
    logo: logo
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
