import Vue from 'vue';
import Vuex from 'vuex';
import auth from "./modules/auth";
import app from './modules/app';
import onlineStore from './modules/onlineStore';
import products from './modules/products'
import vendors from './modules/vendors'
import categories from './modules/categories'
import labs from './modules/labs'
import getters from './getters';
import orderTable from './modules/orders';
import transactionsTable from './modules/transactions';
import shipmentMethodsTable from './modules/shipmentMethods';
import shipmentsTable from './modules/shipments';

Vue.use(Vuex);

export default new Vuex.Store({
	modules: {
		auth,
		app,
		shipmentsTable,
		shipmentMethodsTable,
		onlineStore,
		orderTable,
		transactionsTable,
		products,
		vendors,
		labs,
		categories
	},
	getters,
	strict: true
});
