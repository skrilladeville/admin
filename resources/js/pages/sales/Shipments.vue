<template>
  <div class="app-container">
    <el-row>
      <el-col :span="24">
        <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
                <span class="card-title" >Shipment Methods</span>
            </div>
            <div class="card-content" >
                <div class="card-body" >

                    <v-client-table name='shipmentsTable' ref="table" :columns="columns" :data="data" :options="options">
                       <el-row class="actions-col" slot="actions" slot-scope="props">
                          <router-link :to="{name:'sales.order', params:{id:props.row.order_number}}">
                            <el-button type="warning" size="small">
                              <font-awesome-icon :icon="'eye'" size="sm"/>
                            </el-button>
                          </router-link>
                        <el-button type="danger" size="small" @click="onCancel">
                          <font-awesome-icon :icon="'ban'" size="sm"/>
                        </el-button>
                      </el-row>
                      <div class="address-col" slot="address" slot-scope="props">
                        {{props.row.address}}
                      </div>
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

  name: 'Shipments',
  components: {  },
  data() {
    return {
    checkedRows:[],
    columns: ['order_number', 'name', 'address', 'courier', 
      'total_amount', 'status', 'actions'],
    data: getData(),
    options: {
      headings: {
        order_number: 'Order Number',
        name: 'Patient/Customer',
        address: 'Address',
        courier: 'Courier',
        total_amount: 'Total Amount',
        status: 'Status',
        actions: 'Actions'
      },
      // preserveState: true

    },
        dynamicTags: [],
    }
  },
   methods: {
      onCancel(){
         this.$confirm('Are you sure you want to cancel this shipment?', 'Warning', {
          confirmButtonText: 'OK',
          cancelButtonText: 'Cancel',
          type: 'warning'
        }).then(() => {
          this.$message({
            type: 'success',
            message: 'Shipment cancelled'
          });
        }).catch(() => {         
        });
      }
    },
  computed: {
  }
  }



function getData() {
  var name = ['TOMMY JOHN', 'MATTHEW T GRAY', 'PRISCILLA V. GEORGE'];
  var address = ['55534 Ryan Harbors Suite 898', '123 High street BATH ME 04530']
  var status = ['Completed', 'In Transit', 'Cancelled', 'Delivered'];
  var courier = ['Courier #1', 'Courier #2'];
  var list =[];              
                for (var i=0; i<10; i++){
                    list.push({
                        name: name[Math.floor(Math.random()*name.length)],
                        address: address[Math.floor(Math.random()*address.length)],
                        courier: courier[Math.floor(Math.random()*courier.length)],
                        status: status[Math.floor(Math.random()*status.length)],
                        order_number: Math.floor(Math.random() * (Math.floor(6245) -  Math.ceil(4567) + 1)) +  Math.ceil(4567),
                        total_amount: Math.floor(Math.random() * (Math.floor(100) -  Math.ceil(50) + 1)) +  Math.ceil(50),
                    });
                    
                }

  return list;
}
</script>

<style scoped>
.address-col{
  width: 200px;
}
.actions-col {
  width: 115px!important;
}
.el-button--warning {
  color: #fff!important;
  background-color: #e6a23c!important;
  border-color: #e6a23c!important;
}

.el-button--warning:hover {
  background-color: rgba(230,162,60,.7)!important;
  border-color: rgba(230,162,60,.2)!important;
  color: #fff!important;
}

.el-button--danger {
    color: #fff!important;
    background-color: #f56c6c!important;
    border-color: #f56c6c!important;
}

.el-button--danger:hover{
  background-color: rgba(245,108,108,.7)!important;
  border-color: rgba(245,108,108,.2)!important;
  color: #fff!important;
}
</style>
