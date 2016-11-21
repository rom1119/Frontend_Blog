import Vue from 'vue'
import Bootstrap from 'bootstrap'
import VueRouter from 'vue-router'
import Resource from 'vue-resource'
import App from './App'
import Login from './Login'
import Post from './components/Post'
import Category from './components/Category'
import Posts from './components/Posts'
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
		{path: 'posts', component: Posts},
		{path: 'post', component: Post},
		{path: 'category', component: Category}
	]
},
	{path: '/login', component: Login}
	]
	
})
new Vue({
	el: '#app',
  router: router
})