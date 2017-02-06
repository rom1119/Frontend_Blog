<template>
  <form accept-charset="utf-8" id="register-form" @submit.prevent="register()" action="" method="POST">
    <div class="register-form-header">
      <h4>
        Załóż konto
      </h4>
    </div>
    <div class="form-element" id="username-element-form">
      <legend>
        <span>
          Nazwa użytkownika
        </span>
      </legend>
      <label for="" class="register-username">
        <p>Wpisz nazwę użytkownika <span class="text-danger">*</span></p>
        <input type="text" name="_username" v-model="formData.username" class="" id="input-username" placeholder="user123" >
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
            <input type="text" id="input-firstname" name="_firstName" v-model="formData.name" value="" placeholder="Jan, Michał, Jerzy">
          </label>
          <label class="register-lastName col-sm-6 col-xs-12">
            <p>Wpisz swoje nazwisko</p>
            <input type="text" id="input-lastname" name="_lastName" v-model="formData.secondname" value="" placeholder="Nowak, Kowalski, Wiśniewski">
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
            <p>Wpisz hasło <span class="text-danger">*</span></p>
            <input type="password" name="_password" v-model="formData.password_first" id="input-password" min="6" placeholder="min. 6 znaków" >
          </label>
          <label for="" class="register-password col-sm-6 col-xs-12">
            <p>Potwierdż hasło <span class="text-danger">*</span></p>
            <input type="password" name="_password_conf" v-model="formData.password_conf" id="input-password-conf" min="6" placeholder="min. 6 znaków" >
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
            <input type="number" name="_birthday-year" v-model="formData.birthday_year" id="input-birthday-year">
          </label>
          <label for="" class="register-month col-sm-4 col-xs-6">
            <p>Miesiąc</p>
            <select name="_birthday-month" v-model="formData.birthday_month" id="input-birthday-month">
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
            <input type="number" name="_birthday-day" v-model="formData.birthday_day" id="input-birthday-day">
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
        <select name="_gender" id="input-gender" v-model="formData.gender" value="">
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
            <input type="tel" name="_phone" v-model="formData.phone" id="input-phone" value="" placeholder="+48 123 456 789">   
          </label>
          <label for="" class="register-email col-sm-6 col-xs-12"> 
            <p>Twój email <span class="text-danger">*</span></p>
            <input type="text" name="_email" v-model="formData.email" id="input-email" value="" placeholder="user123@domena.pl" >   
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
        <input  type="submit" value="Zarejestruj" id="input-send">
      </label>
      <div class="register-error">
        <span v-text="msg"></span>
      </div>
    </div>
  </form>
</template>

<script>


export default {
  name: 'register-form',
  data () {
    return {
      formData: {
        name: '',
        secondname: '',
        username: '',
        password_first: '',
        password_conf: '',
        email: '',
        birthday_day: '',
        birthday_month: '',
        birthday_year: '',
        gender: '',
        phone: '',
        desc: '',
        website: ''
      },
      msg: '* - pole obowiązkowe do rejestracji',
      
    }
  },
  methods: {
    register: function() {
      this.$http.post('http://localhost:81/symfony-project/api/web/app_dev.php/user/register', {
        name: this.formData.name,
        secondname: this.formData.secondname,
        username: this.formData.username,
        password_first: this.formData.password_first,
        password_conf: this.formData.password_conf,
        email: this.formData.email,
        birthday_date: this.formData.birthday_day + '-' + this.formData.birthday_month + '-' + this.formData.birthday_year,
        gender: this.formData.gender,
        phone: this.formData.phone,
        //'_csrf': this.getCsrf()
      },
      {
       
      }
      
     ).then(response => {
        console.log(response);
        this.msg = response.body;
      }, 
      error => {
        console.log( error);
        this.msg = error.body;
      })
    },
  },
  props: ['registerMessage'],

  components: {

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>