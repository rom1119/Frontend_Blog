<template>
  <div id="app">
    <header-page v-on:logout="al"></header-page>
    <section id="strap-info">
      <div class="logged-as" v-text="$root.loggedMsg">
        
      </div>
    </section>  
    <main>   
      <div class="container">
        <router-view></router-view>
      </div>
    </main>
    <footer-page></footer-page>
  </div>
</template>

<script>
import header from 'components/layout/public/header.vue'
import sidebar from 'components/layout/public/sidebar.vue'
import footer from 'components/layout/public/footer.vue'

export default {
  name: 'App',
  data: function() {
    return {
      path: "window.location.hash",
      loggedAs : ''
    }
  },
  methods: {
    isActive: function(url) {
      return window.location.hash == url;
    },
    someMethod () {
      let lsValue = this.$localStorage.get('someObject')
      this.$localStorage.set('someBoolean', true)
      this.$localStorage.remove('stringOne')
    },
    al: function (argument) {
      alert('sdf');
    }
  },
  components: {
    'header-page': header,
    'sidebar': sidebar,
    'footer-page': footer
  }
}
</script>

<!-- <style src="./assets/bootstrap/scss/bootstrap-reboot.scss"  lang="scss"></style> -->
<!-- <style src="./assets/bootstrap/scss/bootstrap-grid.scss"  lang="scss"></style> -->
<style src="./assets/bootstrap/css/bootstrap.css"  lang="css"></style>
<style src="./assets/font-awesome-4.7.0/scss/font-awesome.scss"  lang="scss"></style>
<style src="./assets/sass/main.scss"  lang="scss"></style>
<style src="./assets/slider/style.css"  lang="css"></style>