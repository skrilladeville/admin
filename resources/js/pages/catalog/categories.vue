<template>
      <div class="app-container">
      <el-card>
         <div slot="header" class="clearfix">
    <span>Categories</span>
    <el-button @click="dialogAdd = true" style="float: right;" icon="el-icon-plus" type="success" size="small">Add Category</el-button>
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

     <el-table-column
      label="Operations">
      <template slot-scope="scope">
        <el-button
          size="mini"
          type="success"
          >Edit</el-button>
        <el-button
          size="mini"
          type="danger"
            
        @click="openDialog(scope.$index, scope.row)"
          >Delete</el-button>
      </template>
    </el-table-column>
    
   
      </el-table>

   
 

           


<el-dialog
  title="Add Category"
  :visible.sync="dialogAdd"
  width="30%"
  center>
  <el-form  status-icon :rules="rule" ref="form" :model="form" label-position="top">

 
  <el-form-item label="Name" prop="name">

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
    <el-button @click="dialogAdd = false">Cancel</el-button>
    <el-button type="primary" @click="save('form')">Add</el-button>
  </span>
</el-dialog>



      </el-card>


  <el-dialog
  title="Warning"
  :visible.sync="centerDialogVisible"
  width="30%"
  center>
  <span>Are you sure you want to delete</span>
  <span slot="footer" class="dialog-footer">
    <el-button @click="centerDialogVisible = false">Cancel</el-button>
    <el-button type="danger" @click="Delete">Confirm</el-button>
  </span>
</el-dialog>




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

      var validateName = (rule,value,callback)=>{
         if (value === '') {
          callback(new Error('Please input name Again'));
        }
        else{
          callback()
        }
      }

      return{
        centerDialogVisible:false,
        id:'',
        index:'',

        form:{
          name:'',
          product_cat_id:0,
          description:'',
        },
        rule:{
          name:[{ validator: validateName, trigger: 'blur' }]
          
        },
        categories:[],
        parents:[{
          name:'0',
          product_cat_id:0,
          description:'',

        }],
        dialogAdd: false,
         
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
       openDialog(index,row){
          this.centerDialogVisible=true
          this.id=row.id
          this.index=index

            
        
        },

        Delete(){
          // console.log(row.id)
          this.centerDialogVisible=false
            let uri=`/api/catalog/category/delete/${this.id}`
            axios.post(uri)
                .then(res=>{
                    console.log(res.data)
                    this.categories.splice(this.index,1)

                })
        },
      save(formName){
         this.$refs[formName].validate((valid) => {
          if (valid) {
                    console.log('test')
        axios.post('/api/catalog/category/create',this.form)
              .then(res=>{
                this.dialogAdd=false

                this.name=''
                    this.product_cat_id=0
                    this.description=''

                //add to parent

                this.categories.push(res.data)
                
                if(res.data.product_cat_id==0){
                  this.parents.push(res.data)
                }
              })
          } else {
            console.log('error submit!!');
            return false;
          }
        });


      },
    
    }
}


</script>


