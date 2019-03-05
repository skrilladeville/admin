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

                    <v-client-table name='shipmentMethodsTable' ref="table" :columns="columns" :data="data" :options="options">
                      <el-switch
                        slot="is_active"
                        slot-scope="props"
                        :value="props.row.is_active"
                        active-color="#13ce66"
                        inactive-color="#ff4949"
                        @change="switchActive(props.row)">
                      </el-switch>
                       <el-row class="actions-col" slot="actions" slot-scope="props">
                          <router-link :to="{name:'sales.edit-shipment-method', params:{id:123}}">
                            <el-button type="warning" icon="el-icon-edit" size="small">
                            </el-button>
                          </router-link>
                        <el-button type="danger" icon="el-icon-delete" size="small" @click="onDelete"></el-button>
                      </el-row>
                    </v-client-table>
                      <div class="button-div">
                        <router-link :to="{name:'sales.add-shipment-method'}">
                          <el-button type="primary" icon="el-icon-plus" :class="'button-new'">Add New Shipping Method</el-button>
                        </router-link>
                      </div>
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
    checkedRows:[],
    columns: ['type', 'shipping_method', 'delivery_charge', 'min_order_amount', 
      'free_delivery_after', 'time', 'is_active', 'actions'],
    data: getData(),
    options: {
      headings: {
        type: 'Type',
        shipping_method: 'Shipping Method Name',
        delivery_charge: 'Delivery Charge',
        min_order_amount: 'Min. Order Amount',
        free_delivery_after: 'Free Delivery After',
        time: 'Time',
        is_active: "Active",
        actions: "Actions"
      },
      // preserveState: true

    },
        dynamicTags: [],
    }
  },
   methods: {
      switchActive(row){
        
        this.$store.dispatch('switchActive', row)
      },
      onDelete(){
         this.$confirm('This will permanently delete the file. Continue?', 'Warning', {
          confirmButtonText: 'OK',
          cancelButtonText: 'Cancel',
          type: 'warning'
        }).then(() => {
          this.$message({
            type: 'success',
            message: 'Delete completed'
          });
        }).catch(() => {
          this.$message({
            type: 'info',
            message: 'Delete canceled'
          });          
        });
      }
    },
  computed: {
  }
  }



function getData() {
  var list = [{
    id: 0,
    type: 'Delivery',
    shipping_method: 'Courier #1',
    delivery_charge: '$0.00',
    min_order_amount: '-',
    free_delivery_after: '$50.00',
    time: '',
    is_active: false
  },
  {
    id: 1,
    type: 'Delivery',
    shipping_method: 'Courier #2',
    delivery_charge: '$0.00',
    min_order_amount: '-',
    free_delivery_after: '$50.00',
    time: '',
    is_active: false
  },
  {
    id: 2,
    type: 'Pickup',
    shipping_method: 'Pickup',
    delivery_charge: '$0.00',
    min_order_amount: '-',
    free_delivery_after: '$50.00',
    time: '',
    is_active: true
  }];

  return list;
}
</script>

<style>
.actions-col {
  width: 115px!important;
}

.button-div{
  display: flex;
  justify-content: center;
}

.button-new{
  margin: auto 0;
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
