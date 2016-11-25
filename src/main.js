import Vue from 'vue'
import Bootstrap from 'bootstrap'
import VueRouter from 'vue-router'
import Resource from 'vue-resource'
import App from './App'
import Post from './components/pages/post'
import Login from './components/pages/login'
import Posts from './components/pages/posts'
import Home from './components/pages/home'
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
		{path: '', component: Home},
		{path: 'posts', component: Posts},
		{path: 'post', component: Post},
		{path: 'login', component: Login}
		]
	}
	]
	
})
new Vue({
	el: '#app',
  router: router
})