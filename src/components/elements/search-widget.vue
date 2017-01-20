<template>
  <section class="search-widget">
    <p>Wpisz szukaną frazę</p>
    <form action="" class="row" id="form-search" method="POST">
      <div class="form-element" id="search-form-element">
        <label >
          <input type="text" name="search_post" class="input-search" value="" placeholder="Java, Linux, Wzorce proje..." required="true">
        </label>
      </div>
      <div class="form-element" id="submit-form-element">
        <button type="submit" class="button-search">
          Wyszukaj
        </button>
      </div>
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