<template>
   <div class="app-container">
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
          prop="profile_doctors_id"
          label="Doctor Name">
        </el-table-column>
        <el-table-column
          prop="profile_patients_id"
          label="Patient Name">
        </el-table-column>
      </el-table>
   </div>
</template>

<script>
// import {mapState} from 'vuex';
// import {api} from '../../config'

import axios from 'axios';

export default {

    created() {
   //    console.log('mounted')
   //     axios.get('/api/cms/feedback')
   //          .then(res=>{
   //          this.feedbacks=res.data.feedbacks

   // console.log(res.data.feedbacks)
   //          }

   //          ).catch(err=>console.log(err))

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
