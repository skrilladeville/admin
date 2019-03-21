import Vue from 'vue';
import Vuex from 'vuex';
import auth from "./modules/auth";
import app from './modules/app';
import shipmentMethodsTable from './modules/shipments'
import onlineStore from './modules/onlineStore';
import products from './modules/products'
import vendors from './modules/vendors'
import categories from './modules/categories'
import labs from './modules/labs'
import getters from './getters';


Vue.use(Vuex);

export default new Vuex.Store({
	modules: {
		auth,
		app,
		shipmentMethodsTable,
		onlineStore,
		products,
		vendors,
		labs,
		categories
	},
	getters,
	strict: true
});
