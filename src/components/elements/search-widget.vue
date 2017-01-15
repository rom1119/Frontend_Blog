<template>
  <section class="search-widget">
    <form action="">
      <label>Wpisz słowo ktorego szukasz
        <input type="text" name="search_post" value="" placeholder="Java, Linux, Wzorce projektowe etc." required="true">
      </label>
      <button type="submit" class="button-search">
        Wyszukaj...
      </button>
    </form>
  </section>
</template>

<script>


export default {
  name: 'search-widget',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  props: {

  },
  components: {
    
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>