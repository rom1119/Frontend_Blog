<template>
  <article class="post-mini col-md-6">
    <header class="post-mini-header">
      <div class="fa fa-google post-mini-icon"></div>
      <div class="post-mini-info">
        <div class="post-mini-title">
          <h2>
            <router-link to="post" v-text="post.title"></router-link>
          </h2>
        </div>
        <div class="post-mini-category">
          <h2>Kategoria: <span v-text="post.category"></span></h2>
        </div>
        <div class="post-mini-category">
          <h2>Autor: <span v-text="post.author"></span></h2>
        </div>
      </div>
    </header>
    <div class="post-entry">
      <p v-text="post.content">
        
      </p>
    </div>
    <footer class="post-mini-footer">
      <div class="post-meta">
        <div class="post-likes">
          <span class="fa fa-thumbs-up">14</span>
        </div>
        <div class="post-comments">
          <span class="fa fa-comments">5</span>
        </div>
        <time datetime="22-10-2016 09:58:11" class="post-date">
          <span class="post-time" >22-10-2016 09:58:11</span>
        </time>
      </div>
      <div class="read-more">
        <a href="#/post" class="read-more-btn">
          Read More
        </a>
      </div>
    </footer>
  </article>
</template>

<script>


export default {
  name: 'post',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  props: {
    post: {
      type: Object,
      default: function () {
        return {  }
      }
    }
  },
  components: {

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>
