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
              <label for="email-input">
                Twoj email:
              </label>
              <input type="text" id="email-input" name="_email" v-model="dataForm.email" placeholder="nick_jonson@domain.com">
              <div class="msg-error">
                <span v-text="msg.email">sdfasd</span>
              </div>
            </div>
            <div class="contact-form-element" id="contact-subject">
              <label for="subject-input">
                Temat wiadomosci:
              </label>
              <input type="text" id="subject-input" name="_subject" v-model="dataForm.subject">
              <div class="msg-error">
                <span v-text="msg.subject"></span>
              </div>
            </div>
            <div class="contact-form-element" id="contact-message">
              <label for="message-input">
                Tresc wiadomosci:
              </label>
              <textarea name="_body" v-model="dataForm.body" id="message-input" placeholder="Your message..."></textarea>
              <div class="msg-error">
                <span v-text="msg.body"></span>
              </div>
            </div>
            <div class="contact-form-element" id="contact-send">
              <label for="submit-input"></label>
              <input type="submit" @click.prevent="sendContactMessage" class="contact-submit" id="submit-input" value="Wyślij">
              <div class="msg-success">
                <span v-text="msg.success"></span>
              </div>
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
      msg: '',
      dataForm: {
        _csrf: '',
        email: '',
        subject: '',
        body: ''
      }
    }
  },
  created: function (argument) {
    this.$root.fetchCsrf(this.dataForm);
  },
  methods: {
    sendContactMessage: function (argument) {
      this.$http.post('../api/web/contact', 
        `_csrf_token=${this.dataForm._csrf}&_email=${this.dataForm.email}&_subject=${this.dataForm.subject}&_body=${this.dataForm.body}`
        ,
      {
        headers: {
          'Content-type': 'application/x-www-form-urlencoded',
        //   //'X-XSRF-TOKEN': this.getCsrf()
        //   'X-AUTH-TOKEN': 'this.auth',
        //   'Cookie': 'this.sessid'
        }
      }
      
     ).then(response => {
        //var res = JSON.parse(response.body);
          this.msg = response.body;

        console.log(response);
      }, 
      error => {
        console.log( error);
      })
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