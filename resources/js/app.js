import $ from 'jquery';
import Vue from 'vue';
import VueNoty from 'vuejs-noty';
import axios from 'axios';
import 'normalize.css/normalize.css';
import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/en'
import 'element-ui/lib/theme-chalk/index.css';
//import vue-tables-2
import {ServerTable, ClientTable, Event} from 'vue-tables-2';
Vue.use(ClientTable, {}, true, 'bootstrap4');
Vue.use(ServerTable, {}, false, 'bootstrap4');
Vue.use(Event)

import VueGoodTablePlugin from 'vue-good-table';
import VueCharts from 'vue-chartjs'
import { Bar, Line } from 'vue-chartjs'

// import the styles
import 'vue-good-table/dist/vue-good-table.css'

/*Font-Awesome Icons*/
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCoffee, faCalendarCheck, faUser, 
	faStore, faClock, faFileInvoice, faThumbsUp, faTimes,
	faShoppingCart, faMoneyBillWave, faTags, faFileInvoiceDollar, 
	faLandmark, faPercent, faEye, faEllipsisH, faTimesCircle,
	faCheckCircle, faBan } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faCoffee, faCalendarCheck, faUser, faStore, faClock, faFileInvoice, faThumbsUp, faTimes,
	faShoppingCart, faMoneyBillWave,faTags, faFileInvoiceDollar, faLandmark, faPercent,faEye, faEllipsisH,
	faTimesCircle, faCheckCircle, faBan)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.use(VueGoodTablePlugin);

window.$ = window.jQuery = $;
window.axios = axios;
window.moment = require('moment');
require('bootstrap');

Vue.use( VueNoty, {
	progressBar: false,
	layout: 'bottomRight',
	theme: 'bootstrap-v4',
	timeout: 3000
});

Vue.use( ElementUI, { locale } );

import router from './router--v2/router';
import store from './store/index';
import SvgIcon from './components/SvgIcon'
import App from './components/App.vue';
import jwtToken from './helpers/jwt-token';

Vue.component('svg-icon', SvgIcon)

const req = require.context('./icons/svg', false, /\.svg$/)
const requireAll = requireContext => requireContext.keys().map(requireContext)
requireAll(req)

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
	return response;
}, error => {
	// console.log(error)

	// if (error.response.status == 401) {
	// 	store.dispatch('unsetAuthUser')
	// 	.then(() => {
	// 		jwtToken.removeToken();
	// 		router.push({name: 'login'});
	// 	});
	// }
	// return Promise.reject(error);
	let errorResponseData = error.response.data;

	const errors = ["token_invalid", "token_expired", "token_not_provided"];

	if (errorResponseData.error && errors.includes(errorResponseData.error)) {
		store.dispatch('unsetAuthUser')
			.then(() => {
				jwtToken.removeToken();
				router.push({name: 'login'});
			});
	}

	return Promise.reject(error);
});

Vue.config.productionTip = false;

new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App)
})
