<template>
<el-row :gutter="20" class="row">
    <el-col :span="24" :key="index">
	<el-card class="box-card">
		<div slot="header" class="clearfix">
    		<span>Contact Form</span>
  		</div>
		<el-form ref="form" :model="form" label-width="120px" label-position="top">
			<el-row>
				<el-col :span="10" :offset="14">
					<el-col :span="12">
					<el-form-item class="service-dropdown">
						<el-select placeholder="Related Service" v-model="form.related_service">
						<el-option label="Customer Service" value="Customer Service"></el-option>
						<el-option label="Booking Inquiry" value="Booking Inquiry"></el-option>
						<el-option label="Tech Support" value="Tech Support"></el-option>
						</el-select>
					</el-form-item>
					</el-col>
					<el-col :span="12">
					<el-form-item class="priority-dropdown">
							<el-select placeholder="Priority" v-model="form.priority">
							<el-option label="High" value="1"></el-option>
							<el-option label="Medium" value="2"></el-option>
							<el-option label="Low" value="3"></el-option>
							</el-select>
						</el-form-item>
					</el-col>
				</el-col>
			</el-row>
			<el-row  :gutter="20">
				<el-col :span="12">
					<el-form-item class="contact-form-item" label="Name">
					<el-input placeholder="Name" v-model="form.name"></el-input>
					</el-form-item>
				</el-col>
				<el-col :span="12">
					<el-form-item class="contact-form-item" label="Email">
					<el-input placeholder="Email" v-model="form.email"></el-input>
					</el-form-item>
				</el-col>
			</el-row>
			<el-row>
				<el-col :span="24">
					<el-form-item class="contact-form-item" label="Subject">
					<el-input placeholder="Subject" v-model="form.subject"></el-input>
					</el-form-item>
				</el-col>
			</el-row>
			<el-row>
				<el-col :span="24">
					<el-form-item class="contact-form-item" label="Message">
					<el-input placeholder="Message" type="textarea" v-model="form.message"></el-input>
					</el-form-item>
				</el-col>
			</el-row>
			<el-row type="flex" justify="center">
				<el-form-item>
    				<el-button type="primary" @click="onSubmit">
						 <font-awesome-icon :icon="'thumbs-up'" size="xs"/> Submit
					</el-button>
    				<el-button type="warning">
						<font-awesome-icon :icon="'times'" size="xs"/>
						Cancel
					</el-button>
  				</el-form-item>
			</el-row>
		</el-form>
  	</el-card>
    </el-col>
</el-row>
</template>
<script>
export default {
    name: 'ContactForm',
	data(){
		return{
			form :{
				user_id: this.$store.getters.user_id,
				related_service: '',
				priority: '',
				name: '',
				email:'',
				subject:'',
				message:''
			}
		};
	},
	methods:{
		onSubmit(){
			axios.post('/api/contact/create',this.form)
                .then(res=>{
                    alert('success')
                }).catch(err=>console.log(err))
		}
	}
}
</script>
<style rel="stylesheet/scss" lang="scss">
	.service-dropdown > .el-form-item__content{
		margin-left: 10px!important;
	}

	.service-dropdown > .el-form-item__content > .el-select > .el-input > input{
		background: #067144;
    	color: #D3FFC9 !important;
	}

	.contact-form-item > .el-form-item__content > .el-input > .el-input__inner{
		border: 1px solid #067144!important;
	}

	.contact-form-item > .el-form-item__content > .el-textarea > .el-textarea__inner{
		min-height: 300px!important;
		border: 1px solid #067144!important;
	}


	.priority-dropdown > .el-form-item__content > .el-select > .el-input > input{
		background: #067144;
    	color: #D3FFC9 !important;
	}

	.priority-dropdown > .el-form-item__content{
		margin-left: 10px!important;
	}

	.el-select-dropdown {
		background: #CDE2D9 !important;
		color: #067144!important;
	}

	.el-select-dropdown__item.hover, .el-select-dropdown__item:hover {
		color: #067144!important;
		background-color: #8CB160;
	}

	.popper__arrow::after{
		border: none!important;
		background: #CDE2D9 !important;
	}

	.el-row{
        margin-bottom:none!important;
    }
</style>