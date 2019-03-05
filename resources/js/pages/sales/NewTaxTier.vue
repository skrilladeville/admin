<template>
  <div class="app-container">
    <el-row>
      <el-col :span="24">
        <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
                <span class="card-title" >New Tax Tier</span>
                <el-button style="float: right; padding: 3px 0" type="text"><router-link :to="{name:'sales.tax'}">Back To List</router-link></el-button>
            </div>
            <div class="card-content" >
                <div class="card-body" >
                    <el-row :gutter="20">
                        <el-form :model="form" class="edit-tax-form" label-width="150px">
                            <el-col :span="12">
                                 <el-form-item label="Tax Tier Name">
                                    <el-input v-model="form.tier_name"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="Location">
                                <el-input v-model="form.tier_name" placeholder="Enter Zip Code"></el-input>
                                </el-form-item>
                            </el-col>
                             <el-form-item size="large">
                                <el-button type="primary" @click="onSubmit">Save</el-button>
                                <router-link :to="{name:'sales.tax'}">
                                    <el-button>Cancel</el-button>
                                </router-link>
                            </el-form-item>
                        </el-form>
                    </el-row>
                </div>
            </div>
        </el-card>
      </el-col>
    </el-row>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'NewTaxTier',
  components: { },
  data() {
    return {
        form: {
            tier_name: '',
        },
      
    }
  },
  created() {
  },
  methods: {
  }
}
</script>

<style>
.edit-tax-form > .el-col > .el-form-item > .el-form-item__label{
    margin: 0!important;
  }
</style>