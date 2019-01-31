<template>
    <div class="app-container">
        <el-card>
    <div slot="header" class="clearfix">
    <span>Add Lab</span>
    <el-button style="float: right; padding: 3px 0" type="text"><router-link :to="{name:'catalog.vendors'}"> To List</router-link></el-button>
  </div>
    
    <el-form ref="form" label-position="top" :model="form" label-width="250px"  size="mini">


                    <el-form-item label="Name">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
          
                 <el-form-item label="Licence number">
                        <el-input v-model="form.licence_no"></el-input>
                    </el-form-item> 
     
                


   <el-form-item label="Description">
    <el-input type="textarea" v-model="form.description"></el-input>
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
                    
                 <el-form-item label="city/state/zip">
                        <el-input v-model="form.city_state_zip"></el-input>
                    </el-form-item> 
      
        


  <el-form-item>
    <el-button type="primary" @click="onSubmit">Create</el-button>
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
        licence_no:'',
        description:'',
        phone:'',
        fax:'',
        email:'',
        city_state_zip:''
        }
      }
    },
    methods: {
      onSubmit() {
          axios.post('/api/catalog/lab/create',this.form)
                .then(res=>{
                    console.log(res.data)

                   // this.$router.push({name:'catalog.vendors'})
                })
      }
    },

  }
</script>
