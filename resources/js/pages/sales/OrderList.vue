<template>
  <div class="app-container">
    <el-row>
      <el-col :span="24">
        <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
                <span class="card-title" >Sales</span>
            </div>
            <div class="card-content" >
                <div class="card-body" >

                    <v-client-table name='orderTable' :columns="columns" :data="getOrders" :options="options">
                      <router-link slot="uri" slot-scope="props" :to="{name:'sales.order', params:{id:props.row.order_number}}">
                      <!-- <a slot="uri" slot-scope="props" target="_blank" :href="props.row.uri"> -->
                        <el-button type="warning" size="small"><font-awesome-icon :icon="'eye'" /></el-button>
                      </router-link>
                      <div slot="fulfillment" slot-scope="props">
                         <font-awesome-icon :icon="fulfillment_icons[props.row.fulfillment]"  :class="props.row.fulfillment"/>
                          <span> {{props.row.fulfillment}} </span>
                          <el-button-group v-if="props.row.fulfillment=='Processing'">
                            <el-button type="primary" size="small" @click="setFulfillment(props.index, props.row.order_number, 0)">                         
                              <font-awesome-icon :icon="fulfillment_icons['Unfulfilled']" :class="props.row.fulfillment"/>
                            </el-button>
                            <el-button type="primary" size="small" @click="setFulfillment(props.index, props.row.order_number, 2)">
                              <font-awesome-icon :icon="fulfillment_icons['Fulfilled']"  :class="props.row.fulfillment"/>
                            </el-button>
                          </el-button-group>
                      </div>
                      <div slot="created_at" slot-scope="props" class="created-at-row">{{props.row.created_at}}</div>
                      <el-row :class="'filters-row'" slot="afterFilter">
                        <el-tag
                          :key="index"
                          v-for="(tag, index) in dynamicTags"
                          closable
                          :disable-transitions="false"
                          @close="handleClose(tag)">
                          <span class="key-text">{{tag.key}} </span> 
                          is 
                          <span class="value-text">{{tag.value}}</span>
                        </el-tag>
                      <el-popover
                        placement="bottom"
                        width="200"
                        trigger="click"
                        v-model="popover_visible">
                         <el-form :model="tag_new">
                              <el-form-item label="Add filter">
                                <el-select v-model="tag_new.key" placeholder="Select">
                                  <el-option :label="filter.label" :value="filter.value" v-for="(filter, index) in filters" :key="index"></el-option>
                                </el-select>
                              </el-form-item>
                                <el-form-item label="" v-show="tag_new.key">
                                <el-select v-model="tag_new.value" placeholder="Select value">
                                  <el-option :label="item" :value="item" v-for="(item, index) in items" :key="index"></el-option>
                                </el-select>
                              </el-form-item>
                              <el-button  v-show="tag_new.value" size="small" @click="addTag($event)">Add Tag</el-button>
                          </el-form>
                        <el-button slot="reference" class="button-new-tag">
                          Add Filter Tags<i class="el-icon-arrow-down el-icon--right"></i>
                        </el-button>
                      </el-popover>
                      </el-row>
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
import axios from 'axios'
// import Event from 'vue-tables-2'


export default {
  name: 'OrderList',
  components: {  },
  data() {
    return {
      tag_new:{
        key: '',
        value: ''
      },
      orders:[],
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
      },{
        label: 'Order Type',
        value: 'order_type',
        items: ['Walk-In', 'Delivery', 'Pick-up']
      }],
      columns: ['order_type', 'order_number', 'patient_name', 'qty', 
      'created_at', 'total_amount', 'status', 'fulfillment', 'uri'],
    options: {
      headings: {
        order_type: 'Type',
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
        }],
      dateColumns:['date']
    },
    dynamicTags: [],
    popover_visible: false,
    filter_list: { 
      status:['Pickup']
    },
    order_types: ['Walk-in', 'Delivery', 'Pick-up'],
    fulfillment_types: ['Unfulfilled', 'Processing','Fulfilled'],
    fulfillment_icons: {
      'Unfulfilled': 'times-circle',
      'Processing': 'spinner',
    'Fulfilled': 'check-circle'},
    status_types: ['Pending', 'Pending Pickup', 'Picked Up', 'Declined',
    'Processing', 'In Transit', 'Rejected', 'Not Home', 'Cancelled', 'Delivered', 
    'Returned', 'Completed', 'Partial', 'Unpaid']
    }
  },
   methods: {
      handleClose(tag) {
        this.dynamicTags.splice(this.dynamicTags.indexOf(tag), 1);
      },

      addTag: function(event) {
        if(this.tag_new.key&&this.tag_new.value){
          this.dynamicTags.push({key: this.tag_new.key, value: this.tag_new.value});
          this.tag_new.key = '';
          this.tag_new.value = '';
          this.popover_visible = false;
          // console.log(this.$refs.table)
          this.$store.commit('orderTable/SET_CUSTOM_FILTER', {filter:'all_fields', value:this.filter_list})
          // this.$store.commit('orderTable/FILTER', {filter:'all_fields', value:this.filter_list})
          // Event.$emit('vue-tables.filter::all_fields', this.filter_list);
        }
      },
      setFulfillment(index, id, value){
        this.$store.dispatch('SET_FULFILLMENT', 
        {value: this.fulfillment_types[value], index: index})
      }
    },
  computed: {
    items(){
      if(this.tag_new.key){
        var result = this.filters.filter(obj=>obj.value==this.tag_new.key);
        return result[0].items;
      }
    },
    getOrders(){
      return this.$store.getters.getOrders
    }
  },
  created() {
    var formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
    });
        axios.get('/api/sales/orders/')
        .then(res=>{
          res.data.forEach(obj => {
            var order = {
              order_number: obj.id,
              order_type: this.order_types[obj.order_type],
              patient_name: obj.first_name+' '+obj.last_name,
              fulfillment: this.fulfillment_types[obj.fulfillment],
              created_at: moment(new Date(obj.created_at)).format('MMM DD, YYYY h:MM:ss a'),
              total_amount:formatter.format(obj.total),
              status: this.status_types[obj.status]
            }
            this.$store.dispatch('SET_ORDERS', order)
          });;
        }
        ).catch(err=>console.log(err))
      }
  }

</script>

<style>
  .el-tag + .el-tag {
    margin-left: 10px;
  }
  .button-new-tag {
    margin-left: 10px;
    height: 32px;
    line-height: 30px;
    padding-top: 0;
    padding-bottom: 0;
  }
  .input-new-tag {
    width: 90px;
    margin-left: 10px;
    vertical-align: bottom;
  }

  .VueTables__search, 
  .VueTables__search-field,
  .VueTables__search-field > input {
    width: 100%!important;
  }

  .key-text{
    text-transform: capitalize;
  }

  .filters-row{
    margin-top: 10px;
  }

  .el-button:active {
    color: #097244;
    border-color: #097244;
    outline: 0;
}

.el-button:focus, .el-button:hover {
    color: #097244;
    border-color: #14bd74;
    background-color: #CDE2D9;
}

.el-tag {
    color: #097244;
    border-color: #14bd74;
    background-color: #CDE2D9;
}

.el-icon-close{
    color: #097244!important; 
}

.el-icon-close:hover{
    background-color: #097244!important;
    color: #fff!important;
}

.created-at-row{
  width: 150px;
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
</style>

