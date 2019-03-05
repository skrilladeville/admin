<template>
    <el-row :gutter="20" class="row">
        <el-col :span="24" :key="index">
            <el-card class="box-card">
            <div slot="header" class="clearfix">
                <span>Personal Information</span>
            </div>
            <el-row :gutter="20">
                    <el-col :span="12">
                        <el-form-item class="personal-form-item" label="First Name" prop="first_name" >
                        <el-input placeholder="First Name" v-model="form.first_name"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="12">
                        <el-form-item class="personal-form-item" label="Last Name" prop="last_name" >
                        <el-input placeholder="Last Name" v-model="form.last_name"></el-input>
                        </el-form-item>
                    </el-col>
            </el-row> 
            <el-row :gutter="20">
                    <el-col :span="12">
                        <el-form-item class="personal-form-item" label="Profession" prop="profession">
                        <el-input placeholder="Profession" v-model="form.profession"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="12">
                        <el-form-item class="personal-form-item" label="Medical license number" prop="license_no">
                        <el-input placeholder="Medical license number" v-model="form.license_no"></el-input>
                        <p class="badge-default badge-info block-tag text-left">
                            <small class="block-area white">Identify licensing province if different than that of your clinic</small></p>
                        </el-form-item>
                    </el-col>
            </el-row>
                <el-row :gutter="20">
                     <el-col :span="12">
                        <el-form-item class="personal-form-item" label="Clinic/Business Name" prop="clinic_name">
                        <el-input placeholder="Clinic/Business Name" v-model="form.clinic_name"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="12">
                        <el-form-item class="personal-form-item" label="Street Address"  prop="address_1">
                        <el-input placeholder="Street Address" v-model="form.address_1"></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>
                
                <el-row :gutter="20">
                     <el-col :span="10">
                        <el-form-item class="personal-form-item" label="City"  prop="city">
                        <el-input placeholder="City" v-model="form.city"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="10">
                        <el-form-item class="personal-form-item" label="Province"  prop="province">
                        <el-input placeholder="Province" v-model="form.province"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="4">
                        <el-form-item class="personal-form-item" label="Postal Code"  prop="postal_code">
                        <el-input placeholder="Postal Code" v-model="form.postal_code"></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-row :gutter="20">
                     <el-col :span="6">
                        <el-form-item class="personal-form-item" label="Telephone" prop="telephone">
                        <el-input placeholder="Telephone" v-model="form.telephone"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="4">
                        <el-form-item class="personal-form-item" label="Ext.">
                        <el-input placeholder="Ext." v-model="form.extension"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="6">
                        <el-form-item class="personal-form-item" label="Fax" prop="emg_contact_phone">
                        <el-input placeholder="Fax" v-model="form.emg_contact_phone"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="8">
                        <el-form-item class="personal-form-item" label="Email" prop="email">
                        <el-input placeholder="Email" v-model="form.email"></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>
        </el-card>
    </el-col>
    </el-row>
</template>
<script>
export default {
    name: 'DoctorInfo',
    props:{
        form: {
            first_name: '',
            last_name: '',
            profession: '',
            license_no: '',
            clinic_name: '',
            address_1: '',
            city: '',
            province: '',
            postal_code: '',
            telephone: '',
            extension: '',
            emg_contact_phone: '',
            email: ''
        }
    }
	}
</script>
<style rel="stylesheet/scss" lang="scss">
    
	.personal-form-item > .el-form-item__content > .el-input > .el-input__inner{
		border: 1px solid #067144!important;
    }
    
    .personal-form-item > .el-form-item__content > .el-select > .el-input > .el-input__inner{
		border: 1px solid #067144!important;
    }
    
    .el-row{
        margin-bottom:0px!important;
    }

     .is-error > .el-form-item__content > .el-input > .el-input__inner{
		border: 1px solid red!important;
    }

    .block-area {
        background: #54987A;
        color: white !important;
    }
    .block-area {
        padding: 0.2rem 0.5rem;
        display: block;
    }

    .block-tag{
        margin-top: 5px;
    }
</style>