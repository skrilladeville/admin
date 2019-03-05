<template>
    <div>
    <el-row>
      <el-col :span="18">
        <sales-chart :height="300"></sales-chart>
      </el-col>
      <el-col :span="6">
        <el-row :gutter="20" v-for="(row, index) in cards" :key="index">
          <el-col  v-for="(card, index) in row" :key="index">
              <div class="card">
                  <div class="card-body">
                      <div class="card-block">
                          <div class="media">
                              <div class="media-body text-xs-left">
                                  <h3 :class="card.color">$ {{card.value}}</h3>
                                  <span>{{card.caption}}</span>
                              </div>
                              <div class="media-right media-middle font-large-1 " :class="card.color">
                                  <font-awesome-icon :icon="card.icon" size="lg"/>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </el-col>
      </el-row>
      </el-col>
    </el-row>
    
    <el-row>
        <el-table
            :data="tableData"
            stripe
            style="width: 100%">
            <el-table-column
            prop="hour"
            label="Hour"
            width="180">
            </el-table-column>
            <el-table-column
            prop="transactions_count"
            label="Transactions Count"
            width="180">
            </el-table-column>
            <el-table-column
            prop="gross"
            label="Gross">
            </el-table-column>
            <el-table-column
            prop="refund"
            label="Refund">
            </el-table-column>
        </el-table>
    </el-row>
    </div>
</template>

<script>
import axios from 'axios'
import Chart from './../../components/common/Chart.vue'
export default {
  name: 'HourlyReport',
  components: { 
        'sales-chart': Chart,
    },
  data() {
    return {
        cards: [
            [{
                caption: 'Total Sales Today',
                id: 'total-sales',
                icon: 'shopping-cart',
                color: 'cyan',
                value: 0.00,
            }]
        ],
        tableData: [{
          hour: '12am-1am',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '1am-2am',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '2am-3am',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '3am-4am',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '5am-6am',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '6am-7am',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '7am-8am',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '8am-9am',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '9am-10am',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '10am-11am',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '11am-12pm',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '12pm-1pm',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },,{
          hour: '1pm-2pm',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '2pm-3pm',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '3pm-4pm',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '5pm-6pm',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '6am-7am',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '7pm-8pm',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '8pm-9pm',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '9pm-10pm',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '10pm-11am',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        },{
          hour: '11pm-12pm',
          transactions_count: 0,
          gross: '$ 0.00',
          refund: '$ 0.00'
        }]
    }
  }
}
</script>
<style>
.el-table th.is-leaf {
    background: #067144!important;
}

</style>


