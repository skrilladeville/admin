<template>
  <div class="dashboard-container">
    <el-row :gutter="20" class="row" v-for="(row, index) in rows" :key="index">
          <el-col :span=widget.size v-for="(widget, index) in row" :key="index">
            <widget v-bind="widget" v-if="widget.title!='Inner Col'">
            </widget>
            <el-col v-else v-for="(inner, index) in widget.inner_widgets" :key="index">
               <widget v-bind="inner">
              </widget>
            </el-col>
          </el-col>
          <el-col>
          </el-col>
      </el-row>
    </div>
</template>

<script>

import { mapGetters } from 'vuex'
import DashboardWidget from './../dashboard/DashboardWidget.vue'
import customWidgets from './customWidgets.js'
export default {
  name: 'Dashboard',
  components: {
    'widget' : DashboardWidget
   },
  data() {
    return {
      userRole: this.$store.getters.role,
      rows:[],
      widgets:[],
      widget: {
					title: '',
					widgetType: '',
					showTitle: 0,
					size:''
				}
    }
  },
  computed: {
  },
  created() {
    this.rows = customWidgets[this.userRole[0]]
  },
  methods: {
    createRow() {
    }
  }
}
</script>

<style rel="stylesheet/scss" lang="scss">
  .el-row {
    margin-bottom: 20px;
    &:last-child {
      margin-bottom: 0;
    }
  }
  .el-col {
    border-radius: 4px;
  }
  .bg-purple-dark {
    background: #99a9bf;
  }
  .bg-purple {
    background: #d3dce6;
  }
  .bg-purple-light {
    background: #e5e9f2;
  }
  .grid-content {
    border-radius: 4px;
    min-height: 36px;
  }
  .row-bg {
    padding: 10px 0;
    background-color: #f9fafc;
  }
</style>