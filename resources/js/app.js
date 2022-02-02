require('./bootstrap');

import Vue from 'vue';
import App from '@/js/views/App.vue';
import router from '@/js/router'

import { $api } from '@/js/axios';

Vue.config.productionTip = false;
Vue.prototype.$api = $api;

require('@/assets/sass/normalize.css')

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
