<template>
  <div class="app-container">
    <el-card class="box-card" shadow="always">
      <div slot="header" class="clearfix">
      <span>Order Details</span>
      <el-button style="float: right; padding: 3px 0" type="text"><router-link :to="{name:'sales.orders'}">Back To List</router-link></el-button>
      </div>
       <div class="card-content" >
         <h2>Order # {{this.details.order.id}}</h2>
         <el-row :gutter="20">
           <el-col :span="24">
              <el-card>
                 <table class="table details">
                  <tbody>
                    <tr>
                      <td class="text-muted">
                        Patient Name
                      </td>
                      <td class="text-xs-right name">{{this.details.order.first_name+ ' ' +this.details.order.last_name}}</td> 
                    </tr>
                     <tr>
                      <td class="text-muted">
                        Customer Type
                      </td>
                      <td class="text-xs-right">{{this.details.order.customer_type}}</td> 
                    </tr>
                    <tr>
                      <td class="text-muted">
                        Delivery Address
                      </td>
                      <td class="text-xs-right">{{this.details.order.delivery_address}}</td> 
                    </tr>
                    <tr>
                      <td class="text-muted">
                        Cashier
                      </td>
                      <td class="text-xs-right">Nancee Pourvoieur</td> 
                    </tr>
                    <tr>
                      <td class="text-muted">
                        Register
                      </td>
                      <td class="text-xs-right">{{this.details.order.register}}</td> 
                    </tr>
                    <tr>
                      <td class="text-muted">
                        Order Status
                      </td>
                      <td class="text-xs-right">
                        <el-tag :type="tag_type">{{this.status[this.details.order.status]}}</el-tag>
                      <!-- <el-tag type="danger">{{}}</el-tag> -->
                      <!-- <el-tag type="warning">Pending</el-tag> -->
                      </td> 
                    </tr>
                     <tr>
                      <td class="text-muted">
                        Fulfillment Status
                      </td>
                      <td class="text-xs-right">
                        <font-awesome-icon :icon="this.fulfillment_types[this.fulfillment[this.details.order.fulfillment]]" size="md" class=" fulfilled"/>
                          <span> {{this.fulfillment[this.details.order.fulfillment]}} </span>
                        </td> 
                    </tr>
                  </tbody>
                 </table>
              </el-card>
           </el-col>
         </el-row>
         <el-row :gutter="20">
            <el-col :span="12">
              <el-card>
                <el-row>
                  <el-col :span="24">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Product</th>
                          <th class="text-xs-right">Qty</th>
                          <th class="text-xs-right">Price</th>
                          <th class="text-xs-right">Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item, index) in this.details.items" :key="index">
                          <th scope="row">{{index + 1}}</th>
                          <td>
                            <p>{{item.name}}</p>
                          </td>
                          <td class="text-xs-right">{{item.qty}}</td>
                          <td class="text-xs-right">{{0.00}}</td>
                          <td class="text-xs-right">{{item.qty * 0.00}}</td>
                        </tr>
                      </tbody>
                    </table>
                    <el-row>
                      <el-col :span="24">
                        <p class="lead">Total due</p>
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>Sub Total</td>
                                <td class="text-xs-right">$ {{sub_total}}</td>
                              </tr>
                               <tr>
                                <td>Discount</td>
                                <td class="text-xs-right">- $ {{this.details.order.discount}}</td>
                              </tr>
                              <tr>
                                <td>TAX (12%)</td>
                                <td class="text-xs-right">$ {{this.details.order.sales_tax}}</td>
                              </tr>
                              <tr>
                                <td class="text-bold-800">Total</td>
                                <td class="text-bold-800 text-xs-right"> $ {{this.details.order.total}}</td>
                              </tr>
                              <tr>
                                <td>Shipping</td>
                                <td class="text-xs-right">$ {{this.details.order.shipping}}</td>
                              </tr>
            
                              <tr class="bg-grey bg-lighten-4">
                                <td class="text-bold-800">Balance Due</td>
                                <td class="text-bold-800 text-xs-right">$ {{this.details.order.balance}}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                       
                      </el-col>
                    </el-row>
                  </el-col>
                  
                </el-row>
              </el-card>
           </el-col>
           <el-col :span="12">
                  <p class="lead">Order Log:</p>
                  <div class="">
                  <table class="table table-borderless table-sm">
                    <tbody>
                      <tr>
                        <td>Created by John Smith</td>
                        <td class="text-xs-right">September 5, 2018 02:08 pm</td>
                      </tr>
                      <tr>
                        <td>Accepted by John Smith</td>
                        <td class="text-xs-right">September 5, 2018 02:08 pm</td>
                      </tr>
                      <tr>
                        <td>Started fulfilling by Staff Acct</td>
                        <td class="text-xs-right">December 27, 2018 02:30 pm</td>
                      </tr>
                      <tr>
                        <td>Invoice No.</td>
                        <td class="text-xs-right"><a href="">BTNPP34</a></td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                
              </el-col>
         </el-row>
        </div>
    </el-card>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'ViewOrder',
  components: { },
  data() {
    return {
      details: {
        order: {
        register: '',
        first_name: '',
        last_name: '',
        customer_type: '',
        delivery_address: '',
        balance: 0.00,
        total: 0.00,
        discount: 0.00,
        status: 0.00,
        created_at: ''
    },
    items: []
      },
    fulfillment: ['Unfulfilled', 'Processing', 'Fulfilled'],
    status: ['Pending', 'Pending Pickup', 'Picked Up', 'Declined',
    'Processing', 'In Transit', 'Rejected', 'Not Home', 'Cancelled', 'Delivered', 
    'Returned', 'Completed', 'Partial', 'Unpaid'],
    fulfillment_types: {
      'Unfulfilled': 'times-circle',
      'Processing': 'spinner',
    'Fulfilled': 'check-circle'},
    status_types: {
      'Pending': 'success', 
      'Pending Pickup': 'success', 
      'Picked Up': 'success', 
      'Declined': 'warning',
      'Processing': 'danger', 
      'In Transit': 'warning', 
      'Rejected': 'danger', 
      'Not Home': 'warning', 
      'Cancelled': 'danger', 
      'Delivered': 'success', 
      'Returned': 'warning', 
      'Completed': 'success', 
      'Partial': 'warning', 
      'Unpaid': 'danger'
      }
    }
  },
  created() {
     axios.get('/api/sales/order/'+this.$route.params.id)
        .then(res=>{
          this.details = res.data;
        }
        ).catch(err=>console.log(err))
  },
  methods: {
  },
  computed:{
    sub_total(){
      var sub_total=0;
      this.details.items.forEach(function(item){
        console.log(item.qty * 0.00)
        sub_total += item.qty * 0.00
      })
      return sub_total;
    },
    tag_type(){
      return this.status_types[this.status[this.details.order.status]]
    }
  }
}
</script>

<style scoped>
  .details td {
    border:none!important;
  }

  .name{
    color: #053922;
    font-size: 1.5rem;
  }
  .fulfilled{
    color: #14bd74;;
  }

   .unfulfilled{
    color: #14bd74;;
  }

  .el-tag--danger {
    background-color: rgba(245,108,108,.1)!important;
    border-color: rgba(245,108,108,.2)!important;
    color: #f56c6c!important;
  }

  .el-tag--warning {
    background-color: rgba(230,162,60,.1)!important;
    border-color: rgba(230,162,60,.2)!important;
    color: #e6a23c!important;
  }
</style>
