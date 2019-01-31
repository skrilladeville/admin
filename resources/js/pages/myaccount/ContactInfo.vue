<template>
    <el-row :gutter="20" class="row">
        <el-col :span="24" :key="index">
            <el-card class="box-card">
            <div slot="header" class="clearfix">
                <span>Contact Information</span>
            </div>
            <el-row :gutter="20">
                    <el-col :span="8">
                        <el-form-item class="contactinfo-form-item" label="Best Contact No." prop="emg_contact_phone">
                        <el-input placeholder="Best Contact No." v-model="form.emg_contact_phone"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="8">
                        <el-form-item class="contactinfo-form-item" label="Best Contact Person">
                        <el-input placeholder="Best Contact Person" v-model="form.emg_contact"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="8">
                        <el-form-item class="contactinfo-form-item" label="Home Phone No." prop="home_phone">
                        <el-input placeholder="Home Phone No." v-model="form.home_phone"></el-input>
                        </el-form-item>
                    </el-col>
            </el-row> 
            <el-row :gutter="20">
                    <el-col :span="10">
                        <el-form-item class="contactinfo-form-item" label="Fax Phone No.">
                        <el-input placeholder="Fax Phone No." v-model="form.fax_phone"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="14">
                        <el-form-item class="contactinfo-form-item" label="Email" prop="email">
                        <el-input placeholder="Email" v-model="form.email"></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-row :gutter="20">
                     <el-col :span="24">
                        <el-form-item class="contactinfo-form-item" label="Address 1" required>
                        <el-input placeholder="Address 1" v-model="form.address_1"></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-row :gutter="20">
                     <el-col :span="24">
                        <el-form-item class="contactinfo-form-item" label="Address 2">
                        <el-input placeholder="Address 2" v-model="form.address_2"></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>
        </el-card>

    </el-col>
    </el-row>
</template>
<script>
export default {
    name: 'ContactInfo',
    props:{
        form: {

        emg_contact_phone: String,
        emg_contact: String,
        email:String,
        passport_num: String,
        drivers_license:String,
        fax_phone: String,
        address_1: String,
        address_1: String,
        home_phone: String

        }
    }
	}
</script>
<style rel="stylesheet/scss" lang="scss">
	.contactinfo-form-item > .el-form-item__content > .el-input > .el-input__inner{
		border: 1px solid #067144!important;
    }
    
    .contactinfo-form-item > .el-form-item__content > .el-select > .el-input > .el-input__inner{
		border: 1px solid #067144!important;
    }
    
    .el-row{
        margin-bottom:0px!important;
    }

      .is-required > .el-form-item__content > .el-input > .el-input__inner{
		border: 1px solid red!important;
    }
</style>