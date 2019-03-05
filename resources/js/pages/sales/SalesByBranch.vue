<template>
    <div>
    <el-row>
        <sales-chart :height="300"></sales-chart>
    </el-row>
    <el-row :gutter="20" v-for="(row, index) in cards" :key="index">
        <el-col :span="6" v-for="(card, index) in row" :key="index">
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
    </div>
</template>

<script>
import axios from 'axios'
import BarChart from './../../components/common/BarChart.vue'
export default {
  name: 'SalesByBranch',
  components: { 
        'sales-chart': BarChart
    },
  data() {
    return {
        cards: [
            [{
                caption: 'Total Sales in Range',
                id: 'total-sales',
                icon: 'shopping-cart',
                color: 'cyan',
                value: 0.00,
            },{
                caption: 'Net Sales in Range',
                id: 'net-sales',
                icon: 'shopping-cart',
                color: 'cyan',
                value: 0.00,
            },{
                caption: 'Gross Profit',
                id: 'gross-profit',
                icon: 'money-bill-wave',
                color: 'primary',
                value: 0.00,
            },{
                caption: 'Total Orders in Range',
                id: 'total-orders',
                icon: 'file-invoice-dollar',
                color: 'yellow',
                value: 0.00,
            }],
            [{
                caption: 'Average Orders in Range',
                id: 'avg-orders',
                icon: 'file-invoice-dollar',
                color: 'yellow',
                value: 0.00,
            },{
                caption: 'Average Ordered Items in Range',
                id: 'ordered-items',
                icon: 'tags',
                color: 'yellow',
                value: 0.00,
            },{
                caption: 'State Tax',
                id: 'state-tax',
                icon: 'landmark',
                color: 'green',
                value: 0.00,
            },{
                caption: 'County Tax',
                id: 'county-tax',
                icon: 'landmark',
                color: 'green',
                value: 0.00,
            }],
            [{
                caption: 'City Tax',
                id: 'city-tax',
                icon: 'landmark',
                color: 'green',
                value: 0.00,
            },{
                caption: 'State MJ Tax',
                id: 'state-mj-tax',
                icon: 'landmark',
                color: 'green',
                value: 0.00,
            },{
                caption: 'County MJ Tax',
                id: 'county-mj-tax',
                icon: 'landmark',
                color: 'green',
                value: 0.00,
            },{
                caption: 'City MJ Tax',
                id: 'city-mj-tax',
                icon: 'landmark',
                color: 'green',
                value: 0.00,
            }],
            [{
                caption: 'Total Discounts',
                id: 'total-discounts',
                icon: 'percent',
                color: 'red',
                value: 0.00,
            },{
                caption: 'Free Products',
                id: 'free-products',
                icon: 'percent',
                color: 'red',
                value: 0.00,
            }]
        ]
    }
  }
}
</script>

