<template>
  <div class="app-container">
    <el-row>  
      <el-col :span="24">
        <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
                <span class="card-title" >Sales</span>
            </div>
            <div class="card-content" >
                <div class="card-body" >
                   <el-row>
                      <el-button-group>
                        <el-button type="primary" icon="" :class="sales_category==1?'active':''" @click="changeCategory(1)">Sales By Date</el-button>
                        <el-button type="primary" icon="" :class="sales_category==2?'active':''" @click="changeCategory(2)">Sales By Month</el-button>
                        <el-button type="primary" icon="" :class="sales_category==3?'active':''" @click="changeCategory(3)">Sales By Branch</el-button>
                        <el-button type="primary" icon="" :class="sales_category==4?'active':''" @click="changeCategory(4)">Hourly Report</el-button>
                        <el-button type="primary" icon="" :class="sales_category==5?'active':''" @click="changeCategory(5)">Sales By Zip</el-button>
                    </el-button-group>
                   </el-row>
                   <el-row>
                     <el-card class="filter box-card" shadow="never">
                        <el-row :gutter="20">
                            <el-col :span="4" v-for="(item, index) in filters" :key="index" :class="'filter-col'">
                                <div class="filter-dropdown">
                                    <span>{{item.name}}</span>
                                    <el-select v-model="filter[item.key]" :placeholder="item.options[0]">
                                        <el-option
                                        v-for="(option, index) in item.options"
                                        :key="index"
                                        :label="option"
                                        :value="option">
                                        </el-option>
                                    </el-select>
                                </div>
                            </el-col>
                            <el-col  :span="6" v-if="sales_category==2" :class="'filter-col'">
                                <div class="filter-dropdown">
                                    <span>Month and Year</span>
                                    <el-date-picker
                                    v-model="filter.month"
                                    type="month"
                                    placeholder="Pick a month">
                                    </el-date-picker>
                                </div>
                            </el-col> 
                            <el-col  :span="6" v-if="sales_category==1||sales_category==3||sales_category==5" :class="'filter-col'">
                                <div class="filter-dropdown">
                                    <span>Date</span>
                                        <el-date-picker
                                        v-model="filter.date"
                                        type="daterange"
                                        align="right"
                                        start-placeholder="Start Date"
                                        end-placeholder="End Date"
                                        default-value="2010-10-01">
                                        </el-date-picker>
                                </div>
                            </el-col> 
  
                            <el-col :span="4" :class="'filter-col'">
                                <el-button type="primary" class="filter-button">Filter</el-button>
                            </el-col>
                        </el-row>
                     </el-card>
                   </el-row>
                   <component v-bind:is="sales_component[sales_category-1]"></component>
                </div>
                </div>
                </el-card>
            </el-col>
    </el-row>
  </div>
</template>

<script>
import axios from 'axios'
import Chart from './../../components/common/Chart.vue'
import SalesByDate from './SalesByDate'
import SalesByMonth from './SalesByMonth'
import SalesByBranch from './SalesByBranch'
import HourlyReport from './HourlyReport'
import SalesByZip from './SalesByZip'

export default {
  name: 'Sales',
  components: { 
      'sales-chart': Chart,
      'sales-by-date': SalesByDate,
      'sales-by-month': SalesByMonth,
      'sales-by-branch': SalesByBranch,
      'hourly-report': HourlyReport,
      'sales-by-zip': SalesByZip
    },
  data() {
    return {
        sales_component: ['sales-by-date', 'sales-by-month', 'sales-by-branch', 'hourly-report', 'sales-by-zip'],
        sales_category: 1,//1-by_date, 2-by_month, 3-branch, 4-hourly, 5-by-zip
        filter_list:[
            ['register', 'shelf', 'payment_method', 'customer_type', 'order_type', 'order_source', 'are_marijuana'],
            ['register', 'shelf', 'payment_method', 'customer_type', 'order_type', 'order_source'],
            ['register', 'shelf', 'payment_method', 'customer_type', 'order_type', 'order_source', 'are_marijuana'],
            ['shelf', 'customer_type', 'order_type', 'order_source'],
            ['register', 'shelf', 'payment_method', 'customer_type', 'order_type', 'order_source', 'are_marijuana'],
        ],
        filter_meta:[{
            name: 'Register',
            key: 'register',
            options:['All Registers', 'Register 1'],
            },{
            name: 'Shelf',
            key: 'shelf',
            options:['All Shelves', 'Indica Online']
            },{
            name: 'Payment Method',
            key: 'payment_method',
            options:['All Payment Method', 'Cash', 'Credit Card', 'Check', 
                    'CC Terminal', 'Store Credit', 'Potify Credit']
            },{
            name: 'Customer Type',
            key: 'customer_type',
            options:['All Customer Types', 'Medical with State Card', 'Medical with Record 18+',
                    'Adult use 21+', 'Non-member']
            },{
            name: 'Order Type',
            key: 'order_type',
            options:['All Order Types', 'Walk-in', 'Pick Up', 'Delivery']
            },{
            name: 'Order Source',
            key: 'order_source',
            options:['All Order Sources', 'In-Store', 'WooCommerce', 'Potify', 'Offline Store']
            },{
            name: 'Are Marijuana Products',
            key: 'are_marijuana',
            options:['All Products', 'MMJ Products', 'Non-MMJ Products']
            },{
            name: 'Branches',
            key: 'branches',
            options:['All Branches', 'Branch 1', 'Branch 2']
            },{
            name: 'Year',
            key: 'year',
            options:[]
            },{
            name: 'Month',
            key: 'month',
            options:[]
            },
        ],
        filter:{
            register: '',
            shelf: '',
            payment_method: '',
            customer_type: '',
            order_type: '',
            order_source: '',
            are_marijuana: '', //0-no, 1-yes, 2-all
            date_start: '',
            date_end: '',
            year: '',
            month:'',
            branch: '',
            date: ''
        },
 
    }
  },
  computed:{
      filters(){
        return this.filter_meta.filter(item => this.filter_list[this.sales_category-1].includes(item.key));
      }
  },
  methods: {
      changeCategory(num){
          this.sales_category = num; 
      }
  }
}
</script>

<style>
    .active{
        background-color: white!important;
        border:1px solid #067144 !important;
        color: #067144 !important;
    }
    .filter-col{
        position:relative;
        height:90px;
    }

    .filter-dropdown, .filter-button{
        position: absolute;
        bottom:0;
    }

    .filter-dropdown span{
        display: flex;
        align-items: left;
    }
    .el-date-editor.el-input, .el-date-editor.el-input__inner{
        width: 100%!important;
    }

    .filter-button-col {
        display: table;
    }
    .filter-button {
        display: block;
        margin: 0 auto;
    }

    .line-div{
        width: 100%;
        margin: 0 auto;
        text-align: center;
        position:absolute;
        bottom:10px;
    }


</style>
