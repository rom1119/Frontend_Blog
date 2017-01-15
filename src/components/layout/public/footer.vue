<template>
  <footer class="main-footer">
    <div class="container">
      <div class="row">
        <section class="blogroll col-md-4">
          <h3>
            Strony
          </h3>
          <ul class="page-links">
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
        <section class="categories col-md-4">
          <h3>
            Kategorie
          </h3>
          <ul class="main-categories">
            <li>
              <router-link to="/">Programowanie</router-link>
            </li>
            <li>
              <router-link to="posts">Wzorce projektowe</router-link>
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
        <section class="contact-footer col-md-4">
          <h3>
            Kontakt
          </h3>
          <form accept-charset="utf-8" id="contact-form-footer" action="" method="POST">
            <div class="contact-form-element" id="contact-email">
              <legend>
                <span>
                  Email:
                </span>
              </legend>
              <label >
                <input type="text" id="email-input" name="email" placeholder="nick_jonson@domain.com">
              </label>
            </div>
            <div class="contact-form-element" id="contact-message">
              <legend>
                <span>
                  Message:
                </span>
              </legend>
              <textarea name="message" id="message-input" placeholder="Your message..."></textarea>
            </div>
            <div class="contact-form-element" id="contact-send">
              <label for="">
                <input type="submit" class="contact-submit" id="submit-input" value="Wyślij">
              </label>
            </div>
          </form>
        </section>
      </div>
      <div class="row">
        <div class="copyright">
          <span>
            Copyright &copy; 2017 Develped by Roman Pytka
          </span>
        </div>
      </div>
    </div>
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