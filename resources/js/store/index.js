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
import orders from './modules/orders';
import transactions from './modules/transactions';
import shipmentMethods from './modules/shipmentMethods';
import shipments from './modules/shipments';
import DoctorlistsIndex from './modules/Doctorlists'
import DoctorlistsSingle from './modules/Doctorlists/single'
Vue.use(Vuex);

export default new Vuex.Store({
	modules: {
		auth,
		app,
		shipments,
		shipmentMethods,
		onlineStore,
		orders,
		transactions,
		products,
		vendors,
		labs,
		categories,
		DoctorlistsIndex,
        DoctorlistsSingle,
	},
	getters,
	strict: true
});
