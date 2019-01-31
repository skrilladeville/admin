<template>
    <el-row :gutter="20" class="row">
        <el-col :span="24" :key="index">
            <el-card class="box-card">
            <div slot="header" class="clearfix">
                <span>Personal Information</span>
            </div>
            <el-row :gutter="20">
                    <el-col :span="10">
                        <el-form-item class="personal-form-item" label="First Name" required>
                        <el-input placeholder="First Name" v-model="form.first_name"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="4">
                        <el-form-item class="personal-form-item" label="Middle Initial" prop="mi">
                        <el-input placeholder="Middle Initial" v-model="form.mi" ></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="10">
                        <el-form-item class="personal-form-item" label="Last Name" required>
                        <el-input placeholder="Last Name" v-model="form.last_name"></el-input>
                        </el-form-item>
                    </el-col>
            </el-row> 
            <el-row :gutter="20">
                    <el-col :span="10">
                        <el-form-item class="personal-form-item" label="Date of Birth" required>
                        <el-date-picker type="date" placeholder="Pick a date" v-model="form.birth_date" style="width: 100%;"></el-date-picker>
                        </el-form-item>
                    </el-col>
                    <el-col :span="4">
                        <el-form-item class="personal-form-item" label="Weight" prop="weight">
                        <el-input placeholder="Weight" v-model="form.weight" ></el-input>
                        </el-form-item>
                    </el-col>
                     <el-col :span="4">
                       <el-form-item class="personal-form-item" label="Unit(kg/lb)">
							<el-select placeholder="Unit" v-model="form.weight_unit">
							<el-option label="lb" value="lb"></el-option>
							<el-option label="kg" value="kg"></el-option>
							</el-select>
						</el-form-item>
                    </el-col>
            </el-row>
                <el-row :gutter="20">
                     <el-col :span="10">
                        <el-form-item class="personal-form-item" label="Health Card" required>
                        <el-input placeholder="Health Card" v-model="form.health_card"></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-row :gutter="20">
                     <el-col :span="10">
                        <el-form-item class="personal-form-item" label="Passport No.">
                        <el-input placeholder="Passport No." v-model="form.passport_num"></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-row :gutter="20">
                     <el-col :span="10">
                        <el-form-item class="personal-form-item" label="Driver's License">
                        <el-input placeholder="Driver's License" v-model="form.drivers_license"></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>
        </el-card>
    </el-col>
    </el-row>
</template>
<script>
export default {
    name: 'PersonalInfo',
    props:{
        form: {
            first_name: String,
            mi: CharacterData,
            last_name: String,
            birth_date: String,
            weight: Number,
            weight_unit: String,
            health_card: String,
            emg_contact_phone: String,
            emg_contact: String,
            email:String,
            passport_num: String,
            drivers_license: String,
            fax_phone: String,
            address_1: String,
            address_1: String
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

     .is-required > .el-form-item__content > .el-input > .el-input__inner{
		border: 1px solid red!important;
    }
</style>