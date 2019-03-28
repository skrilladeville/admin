<template>
  <div class="app-container">
    <el-row>
      <el-col :span="24">
        <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
                <span class="card-title" >Shipments</span>
            </div>
            <div class="card-content" >
                <div class="card-body" >

                    <v-client-table name='shipmentsTable' ref="table" :columns="columns" :data="getShipments" :options="options">
                       <el-row class="actions-col" slot="actions" slot-scope="props">
                          <router-link :to="{name:'sales.order', params:{id:props.row.order_number}}">
                            <el-button type="warning" size="small">
                              <font-awesome-icon :icon="'eye'" size="sm"/>
                            </el-button>
                          </router-link>
                        <el-button v-if="props.row.status=='In Transit'" type="danger" size="small" @click="onCancel(props.row.id, props.index)">
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
        status: ['Completed', 'In Transit', 'Cancelled', 'Delivered']
    }
  },
   methods: {
      onCancel(id, index){
         this.$confirm('Are you sure you want to cancel this shipment?', 'Warning', {
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
          type: 'warning'
        }).then(() => {
          axios.put('/api/sales/shipment/cancel/'+id)
            .then(res=>{
              this.$store.dispatch('SET_SHIPMENT_STATUS', index);
              this.$message({
                type: 'success',
                message: 'Shipment cancelled'
              });
          }
        ).catch(err=>console.log(err))
          
        }).catch(() => {  
                 
        });
      }
    },
  mounted(){
    var formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
    });
        axios.get('/api/sales/shipments/')
        .then(res=>{
          res.data.forEach(obj => {
            var shipment = {
              id: obj.id,
              order_number: obj.order_id,
              name: obj.first_name+' '+obj.last_name,
              address: obj.delivery_address,
              // courier: ,
              total_amount: formatter.format(obj.total),
              status: this.status[obj.status]
            }
            this.$store.dispatch('SET_SHIPMENTS', shipment)
          });;
        }
        ).catch(err=>console.log(err))
      
    },
    computed:{
      getShipments(){
        return this.$store.getters.getShipments;
      }
    }
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
