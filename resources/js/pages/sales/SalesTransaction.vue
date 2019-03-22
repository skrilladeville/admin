<template>
  <div class="app-container">
    <el-row>
      <el-col :span="24">
        <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
                <span class="card-title" >Transactions</span>
            </div>
            <div class="card-content" >
                <div class="card-body" >
                    <v-client-table name='transactionsTable' ref="table" :columns="columns" :data="data" :options="options">
                       <el-row slot="afterFilter" class="filter-row">
                       <el-card class="filters-card box-card" shadow="never">
                          <el-row :gutter="20">
                            
                              <el-col  :span="6" :class="'filter-col'">
                                  <div class="filter-dropdown">
                                      <span>Date</span>
                                          <el-date-picker
                                          
                                          type="daterange"
                                          align="right"
                                          start-placeholder="Start Date"
                                          end-placeholder="End Date"
                                          default-value="2010-10-01">
                                          </el-date-picker>
                                  </div>
                              </el-col> 
                              <el-col :span="4"  :class="'filter-col'">
                                <div class="filter-dropdown">
                                    <span>Register Name</span>
                                    <el-select >
                                        <el-option>
                                        </el-option>
                                    </el-select>
                                </div>
                            </el-col>
                            <el-col :span="4"  :class="'filter-col'">
                                <div class="filter-dropdown">
                                    <span>Payment Method</span>
                                    <el-select >
                                        <el-option>
                                        </el-option>
                                    </el-select>
                                </div>
                            </el-col>
                            <el-col :span="4"  :class="'filter-col'">
                                <div class="filter-dropdown">
                                    <span>Type</span>
                                    <el-select >
                                        <el-option>
                                        </el-option>
                                    </el-select>
                                </div>
                            </el-col>
                              <el-col :span="4" :class="'filter-col'">
                                  <el-button type="primary" class="filter-button">Filter</el-button>
                              </el-col>
                          </el-row>
                      </el-card>
                       </el-row>
                       <div slot="date" slot-scope="props" class="date-row">{{props.row.date}}</div>
                       <div slot="amount" slot-scope="props">{{props.row.amount}}</div>
                       <div slot="discount" slot-scope="props" class="discount-row">{{props.row.discount}}</div>
                       <div slot="tax" slot-scope="props" class="tax-row">{{props.row.tax}}</div>
                       <div slot="total" slot-scope="props">$ {{props.row.total}}</div>
                       <div slot="total_paid" slot-scope="props">{{props.row.total_paid}}</div>
                      <el-button type="warning" size="small" slot="view" slot-scope="props" @click="viewTransaction(props.row)">
                        <font-awesome-icon :icon="'eye'" size="sm"/>
                      </el-button>
                    </v-client-table>

                    <el-dialog
                      title="Transaction #"
                      :visible.sync="dialogVisible"
                      width="70%">
                      <el-row>
                        <el-col :span="24">
                          <table class="table">
                            <thead>
                              <tr>
                                <th v-for="(th, index) in transaction.headings" :key="index">
                                  {{th}}
                                </th>
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
                          <el-row v-if="transaction.type=='Sale'||transaction.type=='Return Cash'">
                            <el-col :span="12" :offset="12">
                              <p class="lead">Total due</p>
                              <div class="table-responsive">
                                <table class="table table-borderless table-sm">
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
                    </el-dialog>
                </div>
            </div>
        </el-card>
      </el-col>
    </el-row>
     <router-view/>
  </div>
</template>
<script>
export default {

  name: 'SalesTransaction',
  components: {  },
  data() {
    return {
    dialogVisible: false,
    transaction:{},
    checkedRows:[],
    columns: ['date', 'register_name', 'register_type', 'type', 
      'amount', 'discount', 'tax', 'total', 'total_paid', 'view'],
    data: [],
    options: {
      headings: {
        date: 'Date',
        register_name: 'Register Name',
        register_type: 'Register Type',
        type: 'Type',
        amount: 'Amount',
        discount: 'Discount',
        tax: "Tax",
        total: "Total",
        total_paid: "Total Paid",
        view: "View"
      },
      // preserveState: true
      dateColumns:['date']
    },
    filter:{
      date:[],
      register_name: '',
      type: 'Type',
    },
    register_types: ['Register', 'Courier']
    }
  },
   methods: {
     viewTransaction(row){
       this.transaction = row;
       this.dialogVisible = true;
     }
    },
  mounted() {
    var formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
    });
        axios.get('/api/sales/transactions/')
        .then(res=>{
          res.data.forEach(obj => {
            var transaction = {
              register_name: obj.name,
              register_type: this.register_types[obj.register_type],
              type: obj.type,
              amount: formatter.format(obj.amount),
              discount: formatter.format(obj.discount),
              tax: formatter.format(obj.sales_tax),
              total_paid: formatter.format(obj.total-0.00),
              date: moment(new Date(obj.created_at)).format('MMM DD, YYYY h:MM:ss a'),
              total:formatter.format(obj.total),
            }

            this.$store.dispatch('SET_TRANSACTIONS', transaction)
          });;
        }
        ).catch(err=>console.log(err))
      }
  }

</script>

<style>

  .VueTables__search, 
  .VueTables__search-field,
  .VueTables__search-field > input {
    width: 100%!important;
  }

  .filters-card{
    margin-top: 10px;
  }

  .filter-row{
    width:100%;
  }

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

    .tax-row{
      width: 50px;
    }

    .date-row{
      width: 100px;
    }

    /* .table th{
      white-space: normal;
      word-wrap: break-word;
    } */
    
</style>
