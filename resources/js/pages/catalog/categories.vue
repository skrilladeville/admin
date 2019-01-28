<template>
      <div class="app-container">
      <el-card>
         <div slot="header" class="clearfix">
    <span>Category List</span>
    <el-button @click="centerDialogVisible = true" style="float: right; padding: 3px 0" type="text">Add Category</el-button>
  </div>


   <el-table
        :data="categories"
        stripe
        style="width: 100%">
        <el-table-column
          prop="name"
          label="Category Name"
          >
       
        </el-table-column>
        
         <el-table-column
   
          label="Total Products">
        </el-table-column>
            <el-table-column
          label="Marijuana/ Non Marijuana">
        </el-table-column>
      
        <el-table-column
          prop="description"
          label="Description">
        </el-table-column>
    
   
      </el-table>

   
 

           


<el-dialog
  title="Add Category"
  :visible.sync="centerDialogVisible"
  width="30%"
  center>
  <el-form :model="form" label-position="top">

 
  <el-form-item label="Name">

    <el-input v-model="form.name"></el-input>

  </el-form-item>
   <el-form-item label="Parent">
    <el-select v-model="form.product_cat_id" style="width:100%;" placeholder="please select your zone">
      <el-option label="None" :value="0"></el-option>
      <el-option v-for="parent in parents" :key="parent.id" :label="parent.name" :value="parent.id"></el-option>
      
    </el-select>
  </el-form-item>
    <el-form-item label="Description">

    <el-input type="textarea" v-model="form.description"></el-input>

  </el-form-item>
  
   </el-form>
  <span slot="footer" class="dialog-footer">
    <el-button @click="centerDialogVisible = false">Cancel</el-button>
    <el-button type="primary" @click="save">Add</el-button>
  </span>
</el-dialog>



      </el-card>


  



      </div>




    
</template>

<style scoped>

.content{
    margin-top: 100px;
    margin-left: 20px;
    margin-right: 20px;
}
</style>

<script>
import { VueGoodTable } from 'vue-good-table';

export default {
 name: 'product-categories',
    components: {
        VueGoodTable,
    },
    data(){

      return{

        form:{
          name:'',
          product_cat_id:0,
          description:'',
        },
        categories:[],
        parents:[{
          name:'0',
          product_cat_id:0,
          description:'',

        }],
        centerDialogVisible: false,
         
      }  
      
    },

    computed:{
       

    },
    created(){
      axios.get('/api/catalog/category/getParent')
            .then(res=>{
              this.parents=res.data
            })


           axios.get('/api/catalog/category/all')
            .then(res=>{
                      res.data.forEach(element => {
                  if(element.product_cat_id==0){
                      this.categories.push(element)
                      let subCats=res.data.filter(e=>e.product_cat_id == element.id)
                      subCats.forEach(sub=>{
                           this.categories.push(sub)
                      })
                  }
              });
            })

    },


    methods:{
      save(){

        console.log('test')
        axios.post('/api/catalog/category/create',this.form)
              .then(res=>{
                this.centerDialogVisible=false

                //add to parent
                if(res.data.product_cat_id==0){
                  this.parents.push(res.data)
                }
              })
      }
    }
}


</script>


