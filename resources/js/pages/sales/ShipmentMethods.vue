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

                    <v-client-table name='orderTable' ref="table" :columns="columns" :data="data">
                      
                    </v-client-table>
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

  name: 'ShipmentMethods',
  components: {  },
  data() {
    return {
      tag_new:{
        key: '',
        value: ''
      },
      filters:[{
        label: 'Status',
        value: 'status',
        items: ['Pending', 'Pending Pickup', 'Picked up', 'Declined', 'Processing', 'In Transit',
        'Rejected', 'Not Home', 'Cancelled', 'Delivered', 'Returned', 'Completed', 'Partial', 'Unpaid'],
      },{
        label: 'Register',
        value: 'register',
        items: ['Back Office', 'POS #1', 'POS#2'],
      },{
        label: 'Courier',
        value: 'courier',
        items: ['Primary', 'Courier #1', 'Courier #2'],
      },{
        label: 'Shelf',
        value: 'shelf',
        items: ['Indica Online']
      },{
        label: 'Fulfillment',
        value: 'fulfillment',
        items: ['Unfulfilled', 'Processing', 'Fulfilled']
      }],
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
      customFilters: [{
          name: 'all_fields',
          callback: function(row, query) {
            return row.status == 'Pickup'
          }
        }]
    },
        dynamicTags: [],
        popover_visible: false,
        filter_list: { 
          status:['Pickup']
        }
    }
  },
   methods: {
      
    },
  computed: {
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