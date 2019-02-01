<template>
   <div class="app-container">

     <el-card>
         <div slot="header" class="clearfix">
    <span>Labs</span>
    <el-button style="float: right;" type="success" icon="el-icon-plus" size="small" round><router-link :to="{ name:'add lab'}">Add Lab</router-link></el-button>
  </div>
    
    <el-table
        :data="labs"
        stripe
        style="width: 100%">
        <el-table-column
          prop="name"
          label="Name"
          width="180">
        </el-table-column>
         <el-table-column
          prop="description"
          label="Description">
        </el-table-column>
            <el-table-column
          prop="email"
          label="Email">
        </el-table-column>
      
        <el-table-column
          prop="phone"
          label="Phone">
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

<script>
// import {mapState} from 'vuex';
// import {api} from '../../config'

import axios from 'axios';

export default {

    created() {
          console.log('creeate')
         axios.get('/api/catalog/lab')
            .then(response => {
              this.labs = response.data
              console.log(response)
            })
            .catch(error => {
              console.log(error)
            })
      },
    data() {
      return {
        centerDialogVisible:false,
        id:'',
        index:'',
        labs:[]
    }
           
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
            let uri=`/api/catalog/lab/delete/${this.id}`
            axios.post(uri)
                .then(res=>{
                    console.log(res.data)
                    this.labs.splice(this.index,1)

                })
        }
    }
}

</script>

<style scoped>
   .box-card{
       margin-top: 100px;
       margin-left: 20px;
       margin-right: 20px;

   }
   .card-body{
         padding: 10px;
   }

   label{
       font-size: 12px !important;
   }
</style>
