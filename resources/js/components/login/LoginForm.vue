<template>
	<div>
		<div class="card">
		
				<img class="img-responsive" src="/images/logo--Green-Card.svg" alt="">
		
			

		
			<p class="lead">Please Login With your credentials</p>
			<div class="card-body" style="padding:30px;">
<form @submit.prevent="login">
			<div class="form-group">
				<label for="email">Email</label>
				<input
					type="email"
					class="form-control"
					:class="{'is-invalid' : error.email}"
					id="email"
					v-model="form.email"
					autocomplete="off"
					:disabled="loading"
				/>
				<div class="invalid-feedback" v-show="error.email">{{ error.email }}</div>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input
					type="password"
					class="form-control"
					:class="{'is-invalid' : error.password}"
					id="password"
					v-model="form.password"
					:disabled="loading"
				/>
				<div class="invalid-feedback" v-show="error.password">{{ error.password }}</div>
			</div>
			<hr>
			<div class="form-group row" style="margin-left:30px; margin-right:30px;">
				<div class="col">
	<button type="submit" class="btn btn-info btn-block" :disabled="loading">
					<span v-show="loading">Logging in</span>
					<span v-show="!loading">Login</span>
				</button>
				</div>
				<div class="col">
					<button class="btn btn-danger btn-block" @click="clear">
					Cancel
				</button>
				</div>
			
					
			</div>
		</form>
		</div>
		</div>
		
	</div>
</template>

<style scoped>

img{
	margin-top: 30px;
width: 100px;
height: 100px;
    display: block;
    margin-left: auto;
    margin-right: auto;
}


	p.lead{
		text-align: center;
		font-size: 14px!important;
		margin-top: 20px;
	}
	
</style>

<script>
	import {api} from "../../config";

	export default {
		data() {
			return {
				loading: false,
				form: {
					email: null,
					password: null
				},
				error: {
					email: null,
					password: null
				}
			}
		},
		methods: {
			clear(){

				this.form.email=null,
				this.form.password=null,
					this.error.email = null;
				this.error.password = null;
			},
			login() {
				this.loading = true;
				axios.post(api.login, this.form)
					.then(res => {
						this.loading = false;
						this.$noty.success('Welcome back!');
						this.$emit('loginSuccess', res.data);
					})
					.catch(err => {
						(err.response.data.error) && this.$noty.error(err.response.data.error);

						(err.response.data.errors)
							? this.setErrors(err.response.data.errors)
							: this.clearErrors();

						this.loading = false;
					});
			},
			setErrors(errors) {
				this.error.email = errors.email ? errors.email[0] : null;
				this.error.password = errors.password ? errors.password[0] : null;
			},
			clearErrors() {
				this.error.email = null;
				this.error.password = null;
			}
		}
	}
</script>
