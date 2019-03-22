import Vue from 'vue';
import Vuex from 'vuex';
import auth from "./modules/auth";
import app from './modules/app';
import onlineStore from './modules/onlineStore';
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
		transactionsTable
	},
	getters,
	strict: true
});
