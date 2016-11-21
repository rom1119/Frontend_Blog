<template>
<div id="app">
  <header class="main-header">
    <div class="logo">
      <a href="#/home">
<!--         <img src="./assets/photo.jpg" alt="">
 -->      </a>
    </div>
    <nav class="nav">
      <ul>
        <li><a href="#/">Home</a></li>
        <li><a href="#/posts">Posts</a></li>
        <li><a href="#/about">About</a></li>
        <li><a href="#/contact">Contact</a></li>
        <li><a href=""></a></li>
      </ul>
    </nav>
  </header>
  <aside class="sidebar">
    
  </aside>
  <main class="main-content">
    <router-view></router-view> 
  </main>
  <footer class="main-footer">
    
  </footer>
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
  }
}
</script>

<style src="./assets/_components.scss"  lang="scss"></style>
<style src="./assets/bootstrap/css/bootstrap.min.css"  lang="css"></style>
