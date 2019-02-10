<template>
      <div class="app-container">
      <el-card>
         <div slot="header" class="clearfix">
    <span>Categories</span>
    <el-button @click="dialogAdd = true" style="float: right;" icon="el-icon-plus" type="success" size="small">Add Category</el-button>
  </div>

   <v-client-table :data="categories" :columns="['name','products','marijuana','nonmarijuana','description','action']">
     <template slot="action" slot-scope="props">
       <div class="d-flex">
      <el-button  size="small"  icon="el-icon-edit" @click="openDialogEdit(props.row)" type="success"></el-button>
     <el-button  size="small"  icon="el-icon-delete" @click="openDialog(props.$index, props.row)" type="danger"></el-button>
       </div>
     </template>
     
   </v-client-table>



      <el-dialog
  title="Edit Category"
  :visible.sync="dialogEdit"
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
    <el-button @click="dialogEdit = false">Cancel</el-button>
    <el-button type="primary" @click="update('form')">Update</el-button>
  </span>
</el-dialog>

   
 

           


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
           dialogEdit:false,
        centerDialogVisible:false,
        id:'',
        index:'',
        edit_id:'',

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
              console.log(res.data)
                      res.data.forEach(element => {
                  if(element.product_cat_id==0){
                      this.categories.push(element)
                      let subCats=res.data.filter(e=>e.product_cat_id == element.id)
                      subCats.forEach(sub=>{
                           this.categories.push(sub)
                      })
                  }
              });


              this.categories.forEach(e=>{
                e.products=e.products.length
                e.marijuana=`${e.marijuana_products.length} marijuana` 
                e.nonmarijuana=`${e.nonmarijuana_products.length} non marijuana`
              })

    

              console.log("total"+this.categories)
            })

    },


    methods:{
       openDialog(index,row){
          this.centerDialogVisible=true
          this.id=row.id
          this.index=index

            
        
        },

        openDialogEdit(row){
          this.dialogEdit=true
          this.edit_id=row.id

          this.form.name=row.name
          this.form.description=row.description
          this.form.product_cat_id=row.product_cat_id
   
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

        update(formName){

          this.$refs[formName].validate((valid) => {
          if (valid) {
                    console.log('test')
        axios.post(`/api/catalog/category/update/${this.edit_id}`,this.form)
              .then(res=>{
                this.dialogEdit=false


                //add to parent

                this.categories.push(res.data)
                this.categories[this.index]={
                  id:this.edit_id,
                  name:this.form.name,
                  product_cat_id:this.form.product_cat_id,
                  description:this.form.description
               
                }

                
                if(res.data.product_cat_id==0){
                  this.parents.push(res.data)
                }

                
                this.form.name=''
                this.form.product_cat_id=''
                this.form.description=''
              })
          } else {
            console.log('error submit!!');
            return false;
          }
        });

        },
      save(formName){
         this.$refs[formName].validate((valid) => {
          if (valid) {
                    console.log('test')
        axios.post('/api/catalog/category/create',this.form)
              .then(res=>{
                this.dialogAdd=false
                    this.form.name=''
                    this.form.product_cat_id=''
                    this.form.description=''

                //add to parent
                

                this.categories.push(res.data)

                this.categories.forEach(el=>{
                  if(el.id == res.data.id){
                    el.nonmarijuana_products=[]
                    el.marijuana_products=[]
                    el.products=[]
                  }
                })
                
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

    handleSelectionChange(val) {
      this.selectedRow = val
    }
    
    }
}


</script>


