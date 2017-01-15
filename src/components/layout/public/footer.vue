<template>
  <footer class="main-footer">
    <section class="blogroll">
      <h3>
        Pages
      </h3>
      <ul>
        <li>
          <router-link to="/">Home</router-link>
        </li>
        <li>
          <router-link to="posts">Posts</router-link>
        </li>
        <li>
          <router-link to="category">Category</router-link>
        </li>
        <li>
          <router-link to="login">Login</router-link>
        </li>
        <li>
          <router-link to="register">Register</router-link>
        </li>
      </ul>
      
    </section>
    <section class="categories">
      <h3>
        Posts categories
      </h3>
      <ul>
        <li>
          <router-link to="/">Proggraming</router-link>
          <ul>
            <li>
             <router-link to="/">Javascript</router-link>
            </li>
            <li>
             <router-link to="/">C++</router-link>
            </li>
            <li>
            <router-link to="/">Java</router-link>
            </li>
            <li>
              <router-link to="/">PHP</router-link>
            </li>
            <li>
              <router-link to="/">C#</router-link>
            </li>
          </ul>
        </li>
        <li>
          <router-link to="posts">Design patterns</router-link>
          <ul>
            <li>
             <router-link to="/">Singleton</router-link>
            </li>
            <li>
             <router-link to="/">Factory</router-link>
            </li>
            <li>
            <router-link to="/">Abstract factory</router-link>
            </li>
            <li>
              <router-link to="/">Strategy</router-link>
            </li>
            <li>
              <router-link to="/">Observer</router-link>
            </li>
            <li>
              <router-link to="/">Flyweight</router-link>
            </li>
          </ul>
        </li>
        <li>
          <router-link to="category">Hardware</router-link>
        </li>
        <li>
          <router-link to="login">Front-end</router-link>
        </li>
        <li>
          <router-link to="register">Back-end</router-link>
        </li>
      </ul>
      
    </section>
    <section class="contact-footer">
      <h3>
        Contact me
      </h3>
      <form accept-charset="utf-8" class="form-contact-footer" id="login-form-footer" action="" method="POST">
        <div class="contact-email">
          <label >
            Email:
            <input type="text" class="email" name="email" placeholder="nick_jonson@gmail.com">
          </label>
        </div>
        <div class="contact-email">
          <textarea name="message" id="" cols="30" rows="10">Your message...</textarea>
        </div>
      </form>
    </section>
  </footer>
</template>

<script>


export default {
  name: 'footer-page',
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