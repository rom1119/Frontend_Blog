<template>
  <div id="app" class="container">
    <div id="element1">
      strona glowna  <i class="fa fa-facebook"></i>
    </div>
    <div class="alert alert-danger" >sda
    <span class="close" data-dismiss="alert">&times;</span>
    </div>
  </div>
</template>

<script>


export default {
  name: 'App',
  data: function() {
    return {
      path: window.location.hash
    }
  },
  methods: {
    isActive: function(url) {
      return window.location.hash == url;
    }
  },
  components: {

  }
}
</script>

<style src="./assets/bootstrap/scss/bootstrap.scss"  lang="scss"></style>
<style src="./assets/bootstrap/scss/bootstrap-reboot.scss"  lang="scss"></style>
<style src="./assets/bootstrap/scss/bootstrap-grid.scss"  lang="scss"></style>
<style src="./assets/font-awesome-4.5.0/scss/font-awesome.scss"  lang="scss"></style>
<style src="./assets/sass/main.scss"  lang="scss"></style>