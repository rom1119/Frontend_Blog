import Vue from 'vue'
import Bootstrap from 'bootstrap'
import VueResource from 'vue-resource'
import router from './router'
import VueLocalStorage from 'vue-localstorage'
import App from 'App'


//import scripts from './assets/js/script.js'
	
// import Posts from './Posts'
// import Post from './Post'
// import Category from './Category'

Vue.use(VueResource)
Vue.use(VueLocalStorage)

/* eslint-disable no-new */

new Vue({
	el: '#app',
	router: router,
  template: '<App/>',
  components: { App },
	data: function() {
		return {
			authenticate: false,
			loggedMsg : '',
			router: router
		}
	},
	created: function () {
		this.isLogged();
	},
	methods: {
		getCsrfHeader: function (response) {
			if(response.body.csrf_token) {
				return response.body.csrf_token;
			}

			return false;
		},
		isLogged: function (argument) {
			this.$root.router.push('/');
			this.$http.get('../api/web/', 
      {
      headers: {
          //'Content-type': 'application/x-www-form-urlencoded',
         // 'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'
        }
      }
      )
      .then(response => {
       // this.msg = response.body.message || response.body;
       if(response.body.isAuth) {
         this.$root.authenticate = true;
         this.loggedMsg = 'Zalogowany jako ' + response.body.message;
        } 
        
        console.log(response);

      }, 
      error => {
        this.msg = error;
        console.log( error);
      })
		}
	},
	watch: {
		authenticate: function (val, oldVal) {
			// body...
		}
	},
	localStorage: {
		someObject: {
			type: Object,
			default: {
				hello: 'world'
			}
		},
		someNumber: {
			type: Number,
		},
		someBoolean: {
			type: Boolean
		},
		stringOne: '',
		stringTwo: {
			type: String,
			default: 'helloworld!'
		},
		stringThree: {
			default: 'hello'
		}
	},
})