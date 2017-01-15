import Vue from 'vue'
import Bootstrap from 'bootstrap'
import VueRouter from 'vue-router'
import Resource from 'vue-resource'
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
Vue.use(Resource)

/* eslint-disable no-new */

var router = new VueRouter({
	routes: [
		{path: '/', component: App,
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
  router: router
})