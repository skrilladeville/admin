<template>
    <div class="app-container">
        <el-card>
    <div slot="header" class="clearfix">
    <span>Add Lab</span>
    <el-button style="float: right;" type="success" icon="el-icon-tickets" size="small"><router-link :to="{name:'labs'}"> To List</router-link></el-button>
  </div>
    
    <el-form ref="form" label-position="top" :model="form" label-width="250px"  size="mini">
      <el-row :gutter="10">
<el-col :md="12">
<el-form-item label="Name">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
          
</el-col>
<el-col :md="12">
 <el-form-item label="Licence number">
                        <el-input v-model="form.licence_no"></el-input>
                    </el-form-item> 
</el-col>
      </el-row>

                    
                
     
              


   <el-form-item label="Description">
    <el-input type="textarea" v-model="form.description"></el-input>
  </el-form-item>

<el-row :gutter="10">
  <el-col :md="12">
<el-form-item label="Phone Number">
                        <el-input v-model="form.phone"></el-input>
                    </el-form-item> 
  </el-col >
  <el-col :md="12">
    <el-form-item label="Fax">
                        <el-input v-model="form.fax"></el-input>
                    </el-form-item> 
  </el-col>
  
</el-row> 

<el-row :gutter="10">
  <el-col :md="12">
   <el-form-item label="Email">
                        <el-input v-model="form.email"></el-input>
                    </el-form-item> 
                     
  </el-col >
  <el-col :md="12">
   <el-form-item label="city/state/zip">
                        <el-input v-model="form.city_state_zip"></el-input>
                    </el-form-item> 
  </el-col>
  
</el-row> 
                 
                    
  <el-form-item>
    <el-button type="success" @click="onSubmit" size="small" round>Update</el-button>
    <el-button type="danger" size="small" round>Cancel</el-button>
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
        licence_no:'',
        description:'',
        phone:'',
        fax:'',
        email:'',
        city_state_zip:''
        }
      }
    },
    created(){
        axios.get(`/api/catalog/lab/view/${this.$route.params.id}`)
            .then(res=>{
                this.form=res.data
            })
    },
    methods: {
      onSubmit() {
          axios.post(`/api/catalog/lab/update/${this.$route.params.id}`,this.form)
                .then(res=>{
                    console.log(res.data)

                   this.$router.push({name:'labs'})
                })
      }
    },

  }
</script>



