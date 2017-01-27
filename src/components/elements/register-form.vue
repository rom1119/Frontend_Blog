<template>
  <form accept-charset="utf-8" id="register-form" action="" method="POST">
    <div class="register-form-header">
      <h4>
        Rejestracja
      </h4>
    </div>
    <div class="form-element" id="username-element-form">
      <legend>
        <span>
          Nazwa użytkownika
        </span>
      </legend>
      <label for="" class="register-username">
        <p>Wpisz nazwę użytkownika</p>
        <input type="text" name="_username" class="" id="input-username" placeholder="user123" required="true">
      </label>
      <span class="has-user-error"></span>
    </div>
    <div class="form-element" id="name-element-form">
      <fieldset>
        <legend>
          <span>
            Nazwa
          </span>
        </legend>
        <div class="row">
          <label class="register-firstName col-sm-6 col-xs-12">
            <p>Wpisz swoje imię</p>
            <input type="text" id="input-firstname" name="_firstName" value="" placeholder="Jan, Michał, Jerzy">
          </label>
          <label class="register-lastName col-sm-6 col-xs-12">
            <p>Wpisz swoje nazwisko</p>
            <input type="text" id="input-lastname" name="_lastName" value="" placeholder="Nowak, Kowalski, Wiśniewski">
          </label>
        </div>
      </fieldset>
    </div>
    <div class="form-element" id="password-element-form">
      <fieldset>
        <legend>
          <span>
            Hasło
          </span>
        </legend>
        <div class="row">
          <label for="" class="register-password col-sm-6 col-xs-12">
            <p>Wpisz hasło </p>
            <input type="password" name="_password" id="input-password" min="6" placeholder="min. 6 znaków" required="true">
          </label>
          <label for="" class="register-password col-sm-6 col-xs-12">
            <p>Potwierdż hasło</p>
            <input type="password" name="_password_conf" id="input-password-conf" min="6" placeholder="min. 6 znaków" required="true">
          </label>
        </div>
        <span class="password-error"></span>
      </fieldset>
    </div>
    <div class="form-element" id="birthday-element-form">
      <fieldset>
        <legend>
          <span class="label-element-form">
            Data urodzenia
          </span>
        </legend>
        <div class="row">
          <label for="" class="register-year col-sm-4 col-xs-6">
            <p>Rok</p>
            <input type="number" name="_birthday-year" id="input-birthday-year">
          </label>
          <label for="" class="register-month col-sm-4 col-xs-6">
            <p>Miesiąc</p>
            <select name="_birthday-month" id="input-birthday-month">
              <option value="0">Styczeń</option>
              <option value="1">Luty</option>
              <option value="2">Marzec</option>
              <option value="3">Kwiecień</option>
              <option value="4">Maj</option>
              <option value="5">Czerwiec</option>
              <option value="6">Lipiec</option>
              <option value="7">Sierpień</option>
              <option value="8">Wrzesień</option>
              <option value="9">Pażdziernik</option>
              <option value="10">Listopad</option>
              <option value="11">Grudzień</option>
            </select>
          </label>
          <label for="" class="register-day col-sm-4 col-xs-6">
            <p>Dzień</p>
            <input type="number" name="_birthday-day" id="input-birthday-day">
          </label>
        </div>
        <span class="birthday-error"></span>
      </fieldset>
    </div>
    <div class="form-element" id="gender-element-form">
      <legend>
        <span>
          Płeć
        </span>
      </legend>
      <label for="" class="register-gender">
        <select name="_gender" id="input-gender" value="">
          <option value="f">Kobieta</option>
          <option value="m">Mężczyzna</option>
        </select>
      </label>
      <span class="gender-error"></span>
    </div>

    <div class="form-element" id="contact-element-form">
      <fieldset>
        <legend>
          <span>
            Kontakt
          </span>
        </legend>
        <div class="row">
          <label for="" class="register-phone col-sm-6 col-xs-12"> 
            <p>Telefon komórkowy</p>
            <input type="tel" name="_phone" id="input-phone" value="" placeholder="+48 123 456 789">   
          </label>
          <label for="" class="register-email col-sm-6 col-xs-12"> 
            <p>Twój email</p>
            <input type="email" name="_email" id="input-email" value="" placeholder="user123@domena.pl" required="true">   
          </label>
        </div>
      </fieldset>
    </div>

   <!--  <div class="form-element" id="country-element-form">
      <legend>
        <span>
          Lokalizacja
        </span>
      </legend>
      <label for="" class="register-country">
        <select name="_country" id="input-country">
          <option value="Anglia">Anglia</option>
          <option value="Belgia">Belgia</option>
          <option value="Niemcy">Niemcy</option>
          <option value="Hiszpania">Hiszpania</option>
          <option value="Portugalia">Portugalia</option>
          <option value="Polska">Polska</option>
          <option value="Rosja">Rosja</option>
          <option value="Stany_Zjednoczone">Stany Zjednoczone</option>
          <option value="Chiny">Chiny</option>
          <option value="Brazylia">Brazylia</option>
        </select>
      </label>
    </div> -->
    <div class="form-element" id="register-element-form">
      <label for="" class="register-send">
        <input type="submit" value="Zarejestruj" id="input-send">
      </label>
    </div>
  </form>
</template>

<script>


export default {
  name: 'register-form',
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