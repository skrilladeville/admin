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
import Chart from './../../components/common/Chart.vue'
export default {
  name: 'SalesByMonth',
  components: { 
        'sales-chart': Chart
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
                caption: 'Total Orders in Range',
                id: 'total-orders',
                icon: 'file-invoice-dollar',
                color: 'yellow',
                value: 0.00,
            },{
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
            }]
        ]
    }
  }
}
</script>

