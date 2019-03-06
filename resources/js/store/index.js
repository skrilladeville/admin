import Vue from 'vue';
import Vuex from 'vuex';
import auth from "./modules/auth";
import app from './modules/app';
import shipmentMethodsTable from './modules/shipments'
import onlineStore from './modules/onlineStore';
import getters from './getters';


Vue.use(Vuex);

export default new Vuex.Store({
	modules: {
		auth,
		app,
		shipmentMethodsTable,
		onlineStore
	},
	getters,
	strict: true
});
