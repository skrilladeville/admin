<template>
    <div class="app-container">
        <el-card>
    <div slot="header" class="clearfix">
    <span>Add Vendor</span>
    <router-link :to="{name:'catalog.vendors'}"> <el-button style="float: right;" icon="el-icon-tickets" size="small" type="success">To List</el-button></router-link>
  </div>
    
    <el-form ref="form" label-position="top" :model="form" label-width="250px"  size="small">

<el-row :gutter="10">
    <el-col :md="8">
<el-form-item label="Name">
                        <el-input v-model="form.name" placeholder="Name Here"></el-input>
                    </el-form-item>
    </el-col>
    <el-col :md="8">
        
                 <el-form-item label="Licence or Registration Number">
                        <el-input v-model="form.licence_or_registration_no" placeholder="Licence or Registration Number"></el-input>
                    </el-form-item> 
    </el-col>
    <el-col :md="8">
        
    <el-form-item label="Patient Id">
    <el-select style="width:100%;" v-model="form.profile_patients_id"  filterable placeholder="please select Patient Id">
      <el-option v-for="(patient,index) in profile_patients" :key="index" :label="patient.first_name" :value="patient.id"></el-option>
    </el-select>
  </el-form-item>
    </el-col>
</el-row>
                    
          
     


   <el-form-item label="Description">
    <el-input type="textarea" v-model="form.description" placeholder="Description"></el-input>
  </el-form-item>

<el-row :gutter="10">
    <el-col :md="12">
 <el-form-item label="Address">
                        <el-input v-model="form.address" placeholder="Address"></el-input>
                    </el-form-item>
    </el-col>
    <el-col :md="12">

                 <el-form-item label="Phone Number">
                        <el-input v-model="form.phone" placeholder="Phone Number"></el-input>
                    </el-form-item> 
                    
    </el-col>
</el-row>

             <el-row :gutter="10">
    <el-col :md="12">
<el-form-item label="Fax">
                        <el-input v-model="form.fax" placeholder="Fax Here"></el-input>
                    </el-form-item> 
                    
    </el-col>
    <el-col :md="12">

                <el-form-item label="Email">
                        <el-input v-model="form.email" placeholder="Email Here"></el-input>
                    </el-form-item> 
                    
    </el-col>
</el-row>      
         
                 
            
                    
                 <el-form-item label="Skype">
                        <el-input v-model="form.skype" placeholder="Skype here"></el-input>
                    </el-form-item> 
      
        


  <el-form-item>
    <el-button type="primary" @click="onSubmit">Update</el-button>
    <el-button>Cancel</el-button>
  </el-form-item>
</el-form>
        </el-card>
    </div>
</template>

<script>
  export default {
    data() {
      return {
          profile_patients:[],
          labelPosition:'left',
        form: {
         name:'',
        licence_or_registration_no:'',
        profile_patients_id:'',
        description:'',
        address:'',
        phone:'',
        fax:'',
        email:'',
        skype:''
        }
      }
    },
    methods: {
      onSubmit() {
          axios.post(`/api/catalog/vendor/update/${this.$route.params.id}`,this.form)
                .then(res=>{
                    console.log(res)

                    this.$router.push({name:'catalog.vendors'})
                })
      }
    },
    created(){

            axios.get(`/api/catalog/vendor/view/${this.$route.params.id}`)
                .then(res=>{
                    console.log(res)

                    this.form=res.data
                })
    }
  }
</script>
