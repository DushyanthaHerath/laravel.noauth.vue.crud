require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import App from './components/App';
import Home from './components/Home';
import EmployeeCreate from './components/employees/Create';
import EmployeeView from './components/employees/View';
import EmployeeEdit from './components/employees/Edit';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/create',
            name: 'create',
            component: EmployeeCreate
        },
        {
            path: '/edit',
            name: 'edit',
            component: EmployeeEdit
        },
        {
            path: '/view',
            name: 'view',
            component: EmployeeView
        },
    ],
});


const app = new Vue({
    el: '#app',
    components: { App },
    router,
});