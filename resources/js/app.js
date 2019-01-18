import $ from 'jquery';
import Vue from 'vue';
import VueNoty from 'vuejs-noty';
import axios from 'axios';

import 'normalize.css/normalize.css';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import VueGoodTablePlugin from 'vue-good-table';
// import the styles 
import 'vue-good-table/dist/vue-good-table.css'

Vue.use(VueGoodTablePlugin);

window.$ = window.jQuery = $;
window.axios = axios;
require('bootstrap');

Vue.use( VueNoty, {
	progressBar: false,
	layout: 'bottomRight',
	theme: 'bootstrap-v4',
	timeout: 3000
});

Vue.use( ElementUI );

import router from './router/router';
import store from './store/index';
import App from './components/App.vue';
import jwtToken from './helpers/jwt-token';

Vue.config.productionTip = false;

axios.interceptors.request.use(config => {
	config.headers['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
	config.headers['X-Requested-With'] = 'XMLHttpRequest';

	if (jwtToken.getToken()) {
		config.headers['Authorization'] = 'Bearer ' + jwtToken.getToken();
	}

	return config;
}, error => {
	return Promise.reject(error);
});

axios.interceptors.response.use(response => {
	console.log("tttt")
	return response;
}, error => {
	console.log("ffff"+error)

	if (error.response.status == 401) {	
		store.dispatch('unsetAuthUser')
		.then(() => {
			jwtToken.removeToken();
			router.push({name: 'login'});
		});
	}
	return Promise.reject(error);
});


Vue.config.productionTip = false

// Vue.component('app', App);

// const app = new Vue({
// 	router,
// 	store
// }).$mount('#app');

new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App)
})
