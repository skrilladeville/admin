<template>
<el-card class="box-card">
  <div slot="header" class="clearfix">
    <span>Feedback</span>
    <!-- <el-button style="float: right; padding: 3px 0"></el-button> -->
  </div>
    <div class="card-body">

<form @submit.prevent="onSubmit">
<p>Describe recent experience with prescribed medication</p>
<div class="row">
    <div class="col-md-12">
            <div class="form-group">
            <fieldset class="form-group">
                <label>Please Select a doctor</label>
                <el-select v-model="form.profile_doctors_id" placeholder="Please select a doctor">
      <el-option   v-for="item in optionsDoctor"
      :key="item.id"
      :label="item.first_name +' '+item.last_name"
      :value="item.id"></el-option>
  
    </el-select>
            </fieldset>
            </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <fieldset class="form-group">
                <label>Rate your satisfaction with the prescribed medication. Between 1 to 5, with 5 as the highest and 1 as lowest.</label>
                <el-slider :min="0" :max="5"  v-model="form.score"></el-slider>
            </fieldset>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <fieldset class="form-group">
                <label>Describe what work well for you?</label>
                <el-input type="textarea"  v-model="form.what_did_work" id="" rows="3" placeholder=""></el-input>
            </fieldset>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <fieldset class="form-group">
                <label>Describe what did not work well for you?</label>
                <el-input type="textarea"  id="" v-model="form.what_did_not_work" rows="3" placeholder=""></el-input>
            </fieldset>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <fieldset class="form-group">
                <label>Where there unforseen issues? </label>
                 <el-checkbox v-model="checked">Option</el-checkbox>
                    </fieldset>
        </div>
    </div>

    <div class="col-md-8">
        <div class="form-group">
            <fieldset class="form-group">
                <label>Why?</label>
                <el-input type="textarea" :disabled="!checked" v-model="form.why" id="otherIssue" rows="3" placeholder=""></el-input>
            </fieldset>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Post</button>
</div>


</form>

</div>


</el-card>
   </template>

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


<script>
import {mapState} from 'vuex';
import {api} from '../../config'
  export default {
      created(){

          axios.get('/api/users/profileDoctors')
                .then(res=>{
                    console.log(res)
             this.optionsDoctor=res.data
                })

      },
    data() {
      return {

           optionsDoctor: [],
        feedbacks:[],
          checked:false,
        form: {
            score: 0,
            vote:0,
              what_did_work: '',
              what_did_not_work:'',
              why:'',
              profile_patients_id:5,
              profile_doctors_id:2
        }
      }
    },
    methods: {
      onSubmit() {
        axios.post('/api/cms/feedback/create',this.form)
              .then(res=>{
               //this.feedbacks.push(res.data.feedback)

               this.$router.push('/cms/feedback')
               console.log('ni abot dri')
                }).catch(err=>console.log(err));

      }

    },
  }

</script>
