import Vue from 'vue'
import Router from 'vue-router'
import App from 'App'
import Post from './../components/pages/post-page'
import Login from './../components/pages/login-page'
import Posts from './../components/pages/posts-page'
import Home from './../components/pages/home-page'
import Register from './../components/pages/register-page'
import AddPost from './../components/layout/admin/add-post'

Vue.use(Router)

export default new Router({
  routes: [
    // {path: '/',  component: App,
    //  children: [
    {path: '/', name: 'home', component: Home},
    {path: '/posts', name: 'posts', component: Posts},
    {path: '/post', name: 'post', component: Post},
    {path: '/register', name: 'register', component: Register},
    {path: '/login', name: 'login', component: Login},
    {path: '/admin/add-post', name: 'add-post', component: AddPost}
    //]
  // }
  // ,
  // {path: '/admin', component: Admin, 
  //  children: [

  //  ]
  // }
  ]
})
