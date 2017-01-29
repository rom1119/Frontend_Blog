<template>
  <form accept-charset="utf-8" id="comment-form" action="" method="POST">
    <div class="comment-form-header">
      <h4>
        Dodaj komentarz
      </h4>
    </div>
    <div class="form-element" id="text-element-form">
      <legend>
        <span>
          Komentarz
        </span>
      </legend>
      <label for="" class="comment-text">
        <p>Wpisz komentarz</p>
        <textarea name="_comment_text" id="input-comment-text" cols="30" rows="5" placeholder="user123" required="true"></textarea>
      </label>
    </div>
    <div class="form-element" id="email-element-form">
      <legend>
        <span>
          Email
        </span>
      </legend>
      <label for="" class="comment-email">
        <p>Wpisz swój email</p>
        <input type="email" name="_comment_email" class="" id="input-comment-email" placeholder="user123" required="true">
      </label>
    </div>
    <div class="form-element" id="name-element-form">
      <legend>
        <span>
          Imię
        </span>
      </legend>
      <label for="" class="comment-name">
        <p>Wpisz swoje imie</p>
        <input type="text" name="_comment_name" class="" id="input-comment-name" placeholder="user123" required="true">
      </label>
    </div>
    <div class="form-element" id="send-comment-element-form">
      <label for="" class="comment-send">
        <input type="submit" value="Odpowiedz" id="input-comment-send">
      </label>
    </div>
    <div class="error-comment-form">
      <span>
        Musisz wypełnic wszystkie pola
      </span>
    </div>
  </form>
</template>

<script>


export default {
  name: 'comment-post-form',
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
