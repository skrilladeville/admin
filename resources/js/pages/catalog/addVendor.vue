<template>
    <div class="app-container">
    
    <el-form ref="form" :label-position="labelPosition" :model="form" label-width="250px"  size="mini">


                    <el-form-item label="Name">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
          
                 <el-form-item label="Licence or Registration Number">
                        <el-input v-model="form.licence_or_registration_no"></el-input>
                    </el-form-item> 
     
                  <el-form-item label="Patient Id">
    <el-select v-model="form.profile_patients_id" filterable placeholder="please select Patient Id">
      <el-option label="Zone one" value="1"></el-option>
      <el-option label="Zone two" value="2"></el-option>
    </el-select>
  </el-form-item>


   <el-form-item label="Description">
    <el-input type="textarea" v-model="form.description"></el-input>
  </el-form-item>


                    <el-form-item label="Address">
                        <el-input v-model="form.address"></el-input>
                    </el-form-item>
         
                 <el-form-item label="Phone Number">
                        <el-input v-model="form.phone"></el-input>
                    </el-form-item> 
                    
                 <el-form-item label="Fax">
                        <el-input v-model="form.fax"></el-input>
                    </el-form-item> 
                    
                 <el-form-item label="Email">
                        <el-input v-model="form.email"></el-input>
                    </el-form-item> 
                    
                 <el-form-item label="Skype">
                        <el-input v-model="form.skype"></el-input>
                    </el-form-item> 
      
        


  <el-form-item>
    <el-button type="primary" @click="onSubmit">Create</el-button>
    <el-button>Cancel</el-button>
  </el-form-item>
</el-form>
    </div>
</template>

<script>
  export default {
    data() {
      return {
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
          axios.post('/api/catalog/vendor/create',this.form)
                .then(res=>{
                    console.log(res)
                })
      }
    }
  }
</script>
