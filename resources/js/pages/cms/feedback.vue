<template>
   <div class="app-container">

     <el-card>
         <div slot="header" class="clearfix">
    <span>Feedbacks</span>
    <el-button style="float: right;" type="success" round><router-link :to="{ name:'add feedback'}">Add feedback</router-link></el-button>
  </div>
    
    <el-table
        :data="feedbacks"
        stripe
        style="width: 100%">
        <el-table-column
          prop="vote"
          label="Vote"
          width="180">
        </el-table-column>
        <el-table-column
          prop="what_did_work"
          label="What Did Work"
          width="180">
        </el-table-column>
        <el-table-column
          prop="what_did_not_work"
          label="What Did Not Work">
        </el-table-column>
        <el-table-column
          prop="why"
          label="Why">
        </el-table-column>
        <el-table-column
          prop="doctor_name"
          label="Doctor Name">
        </el-table-column>
        <el-table-column
          prop="patient_name"
          label="Patient Name">
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
         axios.get('/api/cms/feedback')
            .then(response => {
              this.feedbacks = response.data
              console.log(this.feedbacks)
            })
            .catch(error => {
              console.log(error)
            })
      },
    data() {
      return {
        feedbacks:[]
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
