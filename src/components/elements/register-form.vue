<template>
  <form accept-charset="utf-8" id="register-form" action="" method="POST">
    <div class="form-element" id="name-form-element">
      <fieldset>
        <legend>
          <span>
            Nazwa
          </span>
        </legend>
        <label class="register-firstName">Wpisz swoje imię
          <input type="text" class="input-firstname" name="_firstName" value="" placeholder="Jan, Michał, Jerzy">
        </label>
        <label class="register-lastName">Wpisz swoje nazwisko
          <input type="text" class="input-lastname" name="_lastName" value="" placeholder="Nowak, Kowalski, Wiśniewski">
        </label>
      </fieldset>
    </div>
    <div class="form-element" id="username-form-element">
        <legend>
          <span>
            Nazwa urzytkownika
          </span>
        </legend>
      <label for="">
        <input type="text" name="_username" class="input-username">
      </label>
      <span class="has-user-error"></span>
    </div>
    <div class="form-element" id="password-form-element">
      <fieldset>
        <legend>
          <span>
            Hasło
          </span>
        </legend>
        <label for="">Wpisz hasło min. 6 znaków
          <input type="password" name="_password" class="input-password">
        </label>
        <label for="">Potwierdż hasło
          <input type="password" name="_password" class="input-password">
        </label>
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
        <label for="">Rok
          <input type="number" name="_birthday-year" class="input-birthday-year">
        </label>
        <label for="">Miesiąc
          <select name="_birthday-month" class="input-birthday-month">
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
        <label for="">Dzień
          <input type="number" name="_birthday-day" class="input-birthday-day">
        </label>
        <span class="birthday-error"></span>
      </fieldset>
    </div>
    <div class="form-element" id="gender-element-form">
      <legend>
        <span>
          Płeć
        </span>
      </legend>
      <label for="">
        <select name="_gender" id="">
          <option value="f">Kobieta</option>
          <option value="m">Mężczyzna</option>
        </select>
        <span class="gender-error"></span>
      </label>
    </div>
    <div class="form-element" id="phone-element-form">
      <legend>
        <span>
          Telefon komórkowy
        </span>
      </legend>
      <label for=""> 
        <input type="tel" name="_phone" class="input-phone" value="" placeholder="">   
      </label>
    </div>
    <div class="form-element" id="email-element-form">
      <legend>
        <span>
          Twój email
        </span>
      </legend>
      <label for=""> 
        <input type="email" name="_phone" class="input-email" value="" placeholder="">   
      </label>
    </div>
    <div class="form-element" id="country-element-form">
      <legend>
        <span>
          Lokalizacja
        </span>
      </legend>
      <select name="_country" id="">
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
    </div>
    <div class="form-element" id="register-element-form">
      <label for="">
        <input type="submit" value="Zarejestruj">
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