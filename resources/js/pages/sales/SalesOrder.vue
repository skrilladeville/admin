<template>
  <div class="app-container">
    <el-row>
      <el-col :span="24">
        <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
                <span class="card-title" >Sales</span>
            </div>
            <div class="card-content" ><!-- widgetType-content here -->
                <div class="card-body" >
                   <el-row>
                      <el-button type="primary" plain>Sales by Date</el-button>
                       <el-button type="primary" plain>Sales by Month</el-button>
                   </el-row>
                   <el-row>
                     <el-card class="filter box-card" shadow="never">
                       
                     </el-card>
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
  name: 'Sales',
  components: { },
  data() {
    return {
    }
  },
  created() {
  },
  methods: {
  }
}
</script>

<style scoped>
</style>
