window._ = require('lodash');
window.$ = require('jquery');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Vue from 'vue';
window.Vue = Vue;

import Vuex from 'vuex';
window.Vuex = Vuex;
Vue.use(Vuex);

// import VuePhoneNumberInput from 'vue-phone-number-input';
// import 'vue-phone-number-input/dist/vue-phone-number-input.css';
// Vue.component('vue-phone-number-input', VuePhoneNumberInput);

import Fragment from 'vue-fragment'
Vue.use(Fragment.Plugin)


Vue.component('index', require('@/js/components/pages/Index').default);
Vue.component('history', require('@/js/components/pages/History').default);
Vue.component('service', require('@/js/components/pages/Service').default);
Vue.component('gallery', require('@/js/components/pages/Gallery').default);

import Store from '@/js/store/Store'

const app = new Vue({
    el: '#app',
    store: new Vuex.Store(Store)
});
