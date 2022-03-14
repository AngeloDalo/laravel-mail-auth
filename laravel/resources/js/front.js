require('./bootstrap');

window.Vue = require('vue');

import App from './views/App';
import Home from './pages/Home';
import Projects from './pages/Projects';
import Contacts from './pages/Contacts';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes:  [
            {
                path: '/',
                name: 'home',
                component: Home
            },
            {
                path: '/projects',
                name: 'projects',
                component: Projects
            },
            {
                path: '/contacts',
                name: 'contacts',
                component: Contacts
            },
            
        ]
});
 
const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});