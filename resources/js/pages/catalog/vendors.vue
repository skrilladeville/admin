<template>
   <div class="app-container">

     <el-card>
         <div slot="header" class="clearfix">
    <span>Vendors</span>
<router-link :to="{ name:'catalog.addvendors'}">    <el-button style="float: right;" type="success" round>Add vendor</el-button></router-link>
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
        vendors:[]
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
