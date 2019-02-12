import Vue from 'vue';
import VueRouter from 'vue-router';
import jwtToken from '../helpers/jwt-token';

Vue.use(VueRouter);

import store from '../store/index';
import routes from './routes';

import {api} from "../config";

const router = new VueRouter({
	mode: 'history',
	routes
});

router.beforeEach(async (to, from, next) => {

	if (jwtToken.getToken() && !store.getters.isLoggedIn) {
		try{
			var {data: authUser} = await axios.get(api.currentUser).catch(err=> this.authUser=null);
		}
		catch(err){
			return
		}
		await store.dispatch('setAuthUser', authUser);
	}

	if (to.meta.requiresAuth) {
		if (store.getters.isLoggedIn || jwtToken.getToken())
			return next();
		else
			return next({name: 'login'});
	}
	if (to.meta.requiresGuest) {
		if (store.getters.isLoggedIn || jwtToken.getToken())
		{
			return next({name: 'index'});
		}
		else
			return next();
	}

	next();
});

export default router;