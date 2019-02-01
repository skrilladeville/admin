<template>
   <div class="app-container">

     <el-card>
         <div slot="header" class="clearfix">
    <span>Vendors</span>
<router-link :to="{ name:'catalog.addvendors'}">    <el-button style="float: right;" icon="el-icon-plus" size="small" type="success" round>Add vendor</el-button></router-link>
  </div>
    
    <el-table
        :data="vendors"
        stripe
        style="width: 100%">
        <el-table-column
          prop="name"
          label="Name"
          width="180">
        </el-table-column>
        <el-table-column
          prop="licence_or_registration_no"
          label="licence/registration#"
          width="180">
        </el-table-column>
        <el-table-column
          prop="phone"
          label="Phone">
        </el-table-column>
        <el-table-column
          prop="email"
          label="Email">
        </el-table-column>
        <el-table-column
          prop="description"
          label="Description">
        </el-table-column>
        <el-table-column
         
          label="Balance">
        </el-table-column>

      <el-table-column
       width="180"
      label="Operations">
      <template slot-scope="scope">
        <router-link :to="`/catalog/vendors/edit/${scope.row.id}`">
        <el-button
          size="mini"
          type="success"
          >Edit</el-button>
          </router-link>
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
         axios.get('/api/catalog/vendor')
            .then(response => {
              this.vendors = response.data
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
        vendors:[]
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
            let uri=`/api/catalog/vendor/delete/${this.id}`
            axios.post(uri)
                .then(res=>{
                    console.log(res.data)
                    this.vendors.splice(this.index,1)

                })
        }
  }
}

</script>

<style scoped>

</style>
