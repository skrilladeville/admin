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
                    <v-client-table :columns="columns" :data="data" :options="options">
                      <a slot="uri" slot-scope="props" target="_blank" :href="props.row.uri" class="glyphicon glyphicon-eye-open"></a>

                      <div slot="child_row" slot-scope="props">
                        The link to {{props.row.name}} is <a :href="props.row.uri">{{props.row.uri}}</a>
                      </div>

                    </v-client-table>
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
      columns: ['type', 'order_number', 'patient_name', 'qty', 
      'created_at', 'total_amount', 'status', 'fulfillment', 'uri'],
    data: getData(),
    options: {
      headings: {
        type: 'Type',
        order_number: 'Order Number',
        patient_name: 'Patient Name',
        qty: 'Qty',
        created_at: 'Created At',
        total_amount: 'Total Amount',
        status: 'Status',
        fulfillment: 'Fulfillment',
        uri: 'View Record'
      },
      sortable: ['patient_name', 'created_at'],
      filterable: ['patient_name', 'created_at']
    }
  }
  }
}


function getData() {
  // return [];
  var type = ['Order','Walkin','Pickup'];
  var patient_name = ['TOMMY JOHN', 'MATTHEW T GRAY', 'PRISCILLA V. GEORGE'];
  var status = ['Completed', 'Pending', 'Pickup', 'In Transit', 'Cancelled', 'Delivered'];
  var fulfillment = ['Fulfilled', 'Unfulfilled', 'Processing'];
  var list =[];              
                for (var i=0; i<10; i++){
                    list.push({
                        type: type[Math.floor(Math.random()*type.length)],
                        patient_name: patient_name[Math.floor(Math.random()*patient_name.length)],
                        status: status[Math.floor(Math.random()*status.length)],
                        order_number: Math.floor(Math.random() * (Math.floor(6245) -  Math.ceil(4567) + 1)) +  Math.ceil(4567),
                        qty: Math.floor(Math.random() * (Math.floor(100) -  Math.ceil(50) + 1)) +  Math.ceil(50),
                        created_at: new Date(new Date(2019, 0, 1).getTime() + Math.random() * (new Date().getTime() - new Date(2019, 0, 1).getTime())),
                        total_amount: Math.floor(Math.random() * (Math.floor(100) -  Math.ceil(50) + 1)) +  Math.ceil(50),
                        fulfillment: fulfillment[Math.floor(Math.random()*fulfillment.length)]
                    });
                }
    return list;
}
</script>

<style scoped>
</style>
