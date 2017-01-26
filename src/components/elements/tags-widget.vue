<template>
  <section class="tags-cloud-widget">
    <header class="tags-header">
      <span class="fa fa-tags"></span>
      <h3>
        Tagi
      </h3>
    </header>
    <ul class="tags-list">
      <li class="tags-item">
        <a href="">Front-end</a>
      </li>
      <li class="tags-item">
        <a href="">Back-end</a>
      </li>
      <li class="tags-item">
        <a href="">Java</a>
      </li>
      <li class="tags-item">
        <a href="">Singleton</a>
      </li>
      <li class="tags-item">
        <a href="">Fabryka abstrakcyjna</a>
      </li>
      <li class="tags-item">
        <a href="">Konfiguracja systemu</a>
      </li>
      <li class="tags-item">
        <a href="">Linux</a>
      </li>
    </ul>
  </section>
</template>

<script>


export default {
  name: 'tags-widget',
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