<template>
  <div class="row">
    <section class="content-home col-md-8">
     <!--  <section class="slider" data-gallery="slider">
        
      </section> -->
      <section class="latest-posts">
        <header class="latest-posts-header">
          <h3>
            Najnowsze artykuły
          </h3>
        </header>
        <div class="row">
          <post-widget v-for="post in posts" v-if="post" v-bind:post="post"></post-widget>
        </div>
        
      </section>
      <!-- <section class="most-rating-posts">
        <header class="most-rating-posts-header">
          <h3>
            Najwyżej oceniane artykuły
          </h3>
        </header>
        <post-widget v-for="i in 6"></post-widget>
      </section>  --> 
    </section>
    <sidebar></sidebar>
  </div>
</template>

<script>

import post from '../elements/post-content-widget'
import sidebar from '../layout/public/sidebar'



export default {
  name: 'home-page',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App',
      posts: []
    }
  },
  beforeUpdate: function (argument) {
    

  },
  beforeCreate: function (argument) {
    
  },
  created: function (argument) {
    this.loadPosts();
  },
  methods: {
    loadPosts: function () {
      this.$http.get('http://localhost:81/symfony-project/api/web/app_dev.php/posts',   
      {
      headers: {
          //'X-XSRF-TOKEN': this.getCsrf()
          //'Content-type': 'application/x-www-form-urlencoded',
         // 'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'
        }
      }
      )
      .then(response => {
        this.posts = response.body;
        console.log(response);
      }, 
      error => {
        this.msg = error;
        console.log( error);
      })
    },
  },
  props: {

  },
  components: {
    'post-widget': post,
    'sidebar': sidebar

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>