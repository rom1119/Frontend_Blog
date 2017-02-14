import Vue from 'vue'
import Bootstrap from 'bootstrap'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import VueLocalStorage from 'vue-localstorage'
import App from './App'
import Post from './components/pages/post-page'
import Login from './components/pages/login-page'
import Posts from './components/pages/posts-page'
import Home from './components/pages/home-page'
import Register from './components/pages/register-page'

import scripts from './assets/js/script.js'
	
// import Posts from './Posts'
// import Post from './Post'
// import Category from './Category'

Vue.use(VueRouter)
Vue.use(VueResource)
Vue.use(VueLocalStorage)

/* eslint-disable no-new */

var router = new VueRouter({
	routes: [
		{path: '/',  component: App,
		 children: [
		{path: '', name: 'home', component: Home},
		{path: 'posts', name: 'posts', component: Posts},
		{path: 'post', name: 'post', component: Post},
		{path: 'register', name: 'register', component: Register},
		{path: 'login', name: 'login', component: Login}
		]
	}
	// ,
	// {path: '/admin', component: Admin, 
	// 	children: [

	// 	]
	// }
	]
	
})
new Vue({
	el: '#app',
	router: router,
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
			this.$http.get('http://localhost:81/symfony-project/api/web/app_dev.php/', 
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