
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)

var VueResource = require('vue-resource');
Vue.use(VueResource);

require('vue-flash-message/dist/vue-flash-message.min.css');
import VueFlashMessage from 'vue-flash-message';
Vue.use(VueFlashMessage);


import VueLoading from 'vue2-loading'
Vue.use(VueLoading, {
  text: 'Wait ...',
  bg: 'rgba(230, 233, 236, 0.8)',
  textColor: '#000',
  spinnerClass: 'fa fa-spin fa-spinner fa-3x'
});

Vue.use(require('vue-moment'));


import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);


import store from './store'

var id_username =  localStorage.getItem('id_username');
$(".id-localStorage").attr("href", "/#/dashboard/users/"+id_username+"/edit");

 

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.http.headers.common['X-CSRF-TOKEN']  = $('meta[name="csrf-token"]').attr('content');



const Dashboard        = require('./components/dashboard/dashboard.vue');
const Home             = require('./components/home/index.vue');
const Settings         = require('./components/settings/Settings.vue');
const IndexUser        = require('./components/users/index.vue');
const UsersCreate      = require('./components/users/create.vue');
const UsersEdit        = require('./components/users/edit.vue');
const CategorysIndex   = require('./components/categorys/index.vue');
const ArticlesIndex    = require('./components/articles/index.vue');
const ArticlesCreate   = require('./components/articles/create.vue');
const ArticlesEdit     = require('./components/articles/edit.vue');
const contactIndex     = require('./components/contact/index.vue');
const messageShow      = require('./components/contact/show.vue');
const subscribe        = require('./components/subscribe/subscribe.vue');
const chat             = require('./components/chat/index.vue');
const LoginComponent   = require('./components/auth/LoginComponent.vue');
const LogoutComponent  = require('./components/auth/LogoutComponent.vue');


const routes = [

     {
      path: '/dashboard',
      redirect: '/dashboard',
      name: 'Home',
      component: Home,
      meta:{ requiresAuth: true },
      children:[
          {path: '/'                                    , name: 'dashboard', component: Dashboard},

          { path: '/dashboard/settings'                  , name: 'settings', component: Settings },

          { path: '/dashboard/users'                     , component: IndexUser },
          { path: '/dashboard/users/create'              , component: UsersCreate },
          { path: '/dashboard/users/:user_id/edit'       , name:'edituser' , component: UsersEdit ,props:true },

          { path: '/dashboard/categorys'                 , component: CategorysIndex },

          { path: '/dashboard/articles'                  , component: ArticlesIndex },

          { path: '/dashboard/articles/create'           , component: ArticlesCreate },
          { path: '/dashboard/articles/:article_id/edit' , name:'ediarticle' , component: ArticlesEdit ,props:true },

          { path: '/dashboard/contact/us'                , component: contactIndex },
          { path: '/dashboard/contact/us/:message_id'    , name:'showData' , component: messageShow ,props:true },

          { path: '/dashboard/subscribe'                 , component: subscribe },
          { path: '/dashboard/chat'                      , component: chat },
      ]},
      { path: '/login'                                   , name: 'login',component: LoginComponent},
      { path: '/logout'                                  , name: 'logout',component: LogoutComponent},
]



// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
 /* mode: 'history',*/
  routes // short for `routes: routes`
})


router.beforeEach((to, from, next) => {
    Vue.http.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');


 if (to.matched.some(record => record.meta.requiresAuth)) {
        if(!localStorage.getItem('authCheck')) {
            router.push({ name: 'login' });
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }

});


// 4. Create and mount the root instance.
// Make sure to inject the router with the router option to make the
// whole app router-aware.
const app = new Vue({
  router
}).$mount('#app')
