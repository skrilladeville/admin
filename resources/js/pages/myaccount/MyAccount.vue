<template>
	<div>
		<el-form ref="form" :model="form" :rules="rules" label-width="120px" label-position="top" v-if="user_role=='patient'" index="patient">
			<personal-info :form = form index="personal-info"></personal-info>
			<contact-info :form = form></contact-info>
			<el-row type="flex" justify="center">
				<el-form-item>
    				<el-button type="primary" @click="onSubmit('form')">
						 <font-awesome-icon :icon="'thumbs-up'" size="xs"/> Save
					</el-button>
  				</el-form-item>
			</el-row>
		</el-form>
		<el-form ref="form" :model="form" :rules="rules" label-width="120px" label-position="top" v-else index="doctor">
			<doctor-info :form = form></doctor-info>
			<el-row type="flex" justify="center">
				<el-form-item>
    				<el-button type="primary" @click="onSubmit('form')">
						 <font-awesome-icon :icon="'thumbs-up'" size="xs"/> Save
					</el-button>
  				</el-form-item>
			</el-row>
		</el-form>
	</div>
</template>

<script>
	import PersonalInfo from './PersonalInfo.vue'
	import ContactInfo from './ContactInfo.vue'
	import DoctorInfo from './DoctorInfo.vue'

	export default {
		name: 'MyAccount',
		components:{
			'personal-info': PersonalInfo,
			'contact-info': ContactInfo,
			'doctor-info': DoctorInfo
		},
		created(){
            axios.get(this.get_url[this.user_role]+this.user_id)
            .then(res=>{
                this.form=res.data
            }
            ).catch(err=>console.log(err))
        },
		data() {
			var checkText = (rule, value, callback) => {
				if (!value) {
				return callback(new Error('This field is required.'));
				}
				setTimeout(() => { 
					if (!value) {
						callback(new Error('This field is required.'));
					}else{
						callback();
					}
				}, 1000);
			};
			var checkWeight = (rule, value, callback) => {
				if (!value) {
				return callback();
				}
				setTimeout(() => { 
				if (!(/^[0-9]*$/).test(value)) {
					callback(new Error('Please input digits.'));
				} else {
					if (value < 10) {
					callback(new Error('Please enter valid weight.'));
					} else {
					callback();
					}
				}
				}, 1000);
			};
			var checkMI = (rule, value, callback) => {
				if (!value) {
				return callback();
				}
				setTimeout(() => {
				if (!(/^[a-zA-Z]+$/).test(value)) {
					callback(new Error('Please input only a letter.'));
				} else {
					if (value!=null&&value.length > 1) {
					callback(new Error('Please input only 1 letter.'));
					} else {
					callback();
					}
				}
				}, 1000);
			};
			var checkEmail = (rule, value, callback) => {
				 var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				 if (!value) {
					return callback(new Error('This field is required.'));
				}
				 setTimeout(() => {
					if (!re.test(String(value).toLowerCase())) { 
						callback(new Error('Please enter a valid email address.'));
					}else{
						callback();
					}
				}, 1000)
			};
			var checkPhone = (rule, value, callback) => {
				 var re = /^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/;
				 if (!value) {
					return callback(new Error('This field is required.'));
				}

				 setTimeout(() => {
					if (!re.test(String(value))) { 
						callback(new Error('Please enter a valid phone number.'));
					}else{
						callback();
					}
				}, 1000)
			};
			return {
			 get_url: {
				 patient: '/api/users/profilePatient/',
				 doctor: '/api/users/profileDoctor/'
			 },
			 put_url: {
				 patient: '/api/users/profilePatient/',
				 doctor: '/api/users/profileDoctor/'
			 },
			 user_id: this.$store.getters.user_id,
			 user_role: this.$store.getters.role[0],
			 form: {
					first_name: '',
					mi: '',
					last_name: '',
					birth_date: '',
					weight: 0,
					weight_unit: '',
					health_card: '',
					emg_contact_phone: '',
					emg_contact: '',
					email:'',
					passport_num: '',
					drivers_license: '',
					fax_phone: '',
					address_1: '',
					address_2: '',
					home_phone: '',

					
					profession: '',
					license_no: '',
					clinic_name: '',
					city: '',
					province: '',
					postal_code: '',
					telephone: '',
					extension: ''

			 },
			 rules: {
				 first_name:[
					 { required: true,  validator: checkText, trigger: 'blur' }
				 ],
				  last_name:[
					 { required: true,  validator: checkText, trigger: 'blur' }
				 ],
				  health_card:[
					 { required: true,  validator: checkText, trigger: 'blur' }
				 ],
				  birth_date:[
					 { required: true,  validator: checkText, trigger: 'blur' }
				 ],
				 emg_contact:[
					 { required: true,  validator: checkText, trigger: 'blur' }
				 ],
				 mi: [
					{ validator: checkMI, trigger: 'change' },
				],
				email: [
					{ required: true, validator: checkEmail, trigger: 'blur' },
				],
				weight: [
					{validator: checkWeight, trigger: 'blur'}
				],
				emg_contact_phone: [
					{ required: true, validator: checkPhone, trigger: 'blur'}
				],
				home_phone: [
					{validator: checkPhone, trigger: 'blur'}
				],
				fax_phone: [
					{ validator: checkPhone, trigger: 'blur'}
				],
				telephone: [
					{validator: checkPhone, required: true, trigger: 'blur'}
				],
				address_1: [
					{validator: checkText, required:true,  trigger: 'blur'}
				],
				profession: [
					{validator: checkText, required:true,  trigger: 'blur'}
				],
				license_no: [
					{validator: checkText, required:true,  trigger: 'blur'}
				],
				clinic_name: [
					{validator: checkText, required:true,  trigger: 'blur'}
				],
				city: [
					{validator: checkText, required:true,  trigger: 'blur'}
				],
				province: [
					{validator: checkText, required:true,  trigger: 'blur'}
				],
				postal_code: [
					{validator: checkText, required:true,  trigger: 'blur'}
				]
			}
			}
		},
		methods:{
        onSubmit(formName){
			this.$refs[formName].validate((valid) => {
				if (valid) {
					axios.put(this.put_url[this.user_role]+this.user_id,this.form)
					.then(res=>{
						// alert('Successfully saved! ')
						 this.$message({
						message: 'Successfully saved!',
						type: 'success'
						});
					}).catch(err=>this.$message.error('Please check your fields.'))
				} else {
					this.$message.error('Please check your fields.')
					return false;
				}
        	});
            
		}
    }
	}
</script>

<style>

</style>
