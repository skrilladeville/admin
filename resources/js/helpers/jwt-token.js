export default {
	setToken(token) {
		window.localStorage.setItem('jwt_token', token);
	},
	setUser(user){
		window.localStorage.setItem('user', user);
	},
	getToken() {
		return window.localStorage.getItem('jwt_token');
	},
	removeToken() {
		window.localStorage.removeItem('jwt_token');
	},
	getUser(){
		return window.localStorage.getItem('user');
	},
	removeUser() {
		window.localStorage.removeItem('user');
	},
}
