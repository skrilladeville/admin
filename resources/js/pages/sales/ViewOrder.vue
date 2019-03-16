<template>
  <div class="app-container">
    <el-card class="box-card" shadow="always">
      <div slot="header" class="clearfix">
      <span>Order Details</span>
      <el-button style="float: right; padding: 3px 0" type="text"><router-link :to="{name:'sales.orders'}">Back To List</router-link></el-button>
      </div>
       <div class="card-content" >
         <h2>Order #</h2>
         <el-row :gutter="20">
           <el-col :span="24">
              <el-card>
                 <table class="table details">
                  <tbody>
                    <tr>
                      <td class="text-muted">
                        Patient Name
                      </td>
                      <td class="text-xs-right name">John Doe</td> 
                    </tr>
                     <tr>
                      <td class="text-muted">
                        Customer Type
                      </td>
                      <td class="text-xs-right">Medical w/ State Card</td> 
                    </tr>
                    <tr>
                      <td class="text-muted">
                        Delivery Address
                      </td>
                      <td class="text-xs-right">032 Londonderry Park</td> 
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
                      <td class="text-xs-right">Register #1</td> 
                    </tr>
                    <tr>
                      <td class="text-muted">
                        Order Status
                      </td>
                      <td class="text-xs-right">
                        <el-tag type="success">Picked up</el-tag>
                      <el-tag type="danger">Cancelled</el-tag>
                      <el-tag type="warning">Pending</el-tag>
                      </td> 
                    </tr>
                     <tr>
                      <td class="text-muted">
                        Fulfillment Status
                      </td>
                      <td class="text-xs-right">
                        <font-awesome-icon :icon="'check-circle'" size="md" class=" fulfilled"/>
                          <span> Fulfilled </span>
                        <font-awesome-icon :icon="'times-circle'" size="md"/>
                          <span> Unfulfilled </span>
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
                        <tr>
                          <th scope="row">1</th>
                          <td>
                            <p>Create PSD for mobile APP</p>
                          </td>
                          <td class="text-xs-right">$ 20.00/hr</td>
                          <td class="text-xs-right">120</td>
                          <td class="text-xs-right">$ 2400.00</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>
                            <p>iOS Application Development</p>
                          </td>
                          <td class="text-xs-right">$ 25.00/hr</td>
                          <td class="text-xs-right">260</td>
                          <td class="text-xs-right">$ 6500.00</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>
                            <p>WordPress Template Development</p>
                          </td>
                          <td class="text-xs-right">$ 20.00/hr</td>
                          <td class="text-xs-right">300</td>
                          <td class="text-xs-right">$ 6000.00</td>
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
                                <td class="text-xs-right">$ 14,900.00</td>
                              </tr>
                              <tr>
                                <td>TAX (12%)</td>
                                <td class="text-xs-right">$ 1,788.00</td>
                              </tr>
                              <tr>
                                <td class="text-bold-800">Total</td>
                                <td class="text-bold-800 text-xs-right"> $ 16,688.00</td>
                              </tr>
                              <tr>
                                <td>Shipping</td>
                                <td class="text-xs-right">$ 4,688.00</td>
                              </tr>
                              <tr class="bg-grey bg-lighten-4">
                                <td class="text-bold-800">Balance Due</td>
                                <td class="text-bold-800 text-xs-right">$ 12,000.00</td>
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
    }
  },
  created() {
  },
  methods: {
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
