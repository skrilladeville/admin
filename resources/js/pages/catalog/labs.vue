<template>
   <div class="app-container">

     <el-card>
         <div slot="header" class="clearfix">
    <span>Vendors</span>
    <el-button style="float: right;" type="success" round><router-link :to="{ name:'add lab'}">Add Lab</router-link></el-button>
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
    
   <el-button
          size="mini"
          type="success"
          >Edit</el-button>
        <el-button
          size="mini"
          type="danger"
     
          >Delete</el-button>
      </el-table>
       </el-card>
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
        labs:[]
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
