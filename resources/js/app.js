import Vue from 'vue';

import VueRouter from 'vue-router';
import routes from './routes';
Vue.use(VueRouter);


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const app = new Vue({
    el: '#app',
    router : new VueRouter(routes)
});
