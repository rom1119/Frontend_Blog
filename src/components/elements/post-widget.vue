<template>
  <article class="post-item col-md-4">
    <div class="post-content">
      <span class="fa fa-google"></span>
      <div class="post-category">
        <h2>Programming</h2>
      </div>
      <div class="post-title">
        <h3>
          <router-link to="">This is title of post</router-link>
        </h3>
      </div>
      <div class="post-entry">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius illum in nisi aspernatur quam molestiae id, laudantium architecto dicta voluptas nemo repudiandae optio facilis adipisci similique, necessitatibus vero doloribus at.
        </p>
      </div>
      <div class="post-meta">
        <div class="post-likes">
          <span class="fa fa-facebook"></span>14
        </div>
        <div class="post-comments">
          <span class="fa fa-facebook"></span>5
        </div>
        <time datetime="22-10-2016 09:58:11" class="post-date">
          <span class="post-time">22-10-2016 09:58:11</span>
        </time>
      </div>
    </div>
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

  },
  components: {

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>
