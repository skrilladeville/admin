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
                      <router-link slot="uri" slot-scope="props" :to="{name:'order'}">
                      <!-- <a slot="uri" slot-scope="props" target="_blank" :href="props.row.uri"> -->
                        <font-awesome-icon :icon="'eye'" size="sm"/>
                      </router-link>
                      <div slot="child_row" slot-scope="props">
                        The link to {{props.row.name}} is <a :href="props.row.uri">{{props.row.uri}}</a>
                      </div>
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
import Event from 'vue-tables-2'
// import path from 'path'
// import VueRouter from 'vue-router'
// import Vue from 'vue';
import ViewOrder from './ViewOrder'
// const User = {
//   template: '<div>Order here</div>'
// }
// Vue.use(VueRouter)
// const router = new VueRouter({
//   routes: [
//     { name: 'orders', path: '/', component: SalesOrder },
//     { name: 'order', path: '/order/', component: ViewOrder }
//   ]
// })
export default {
//   router,
  name: 'OrderList',
  components: { ViewOrder },
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
          // this.$store.commit('orderTable/SET_CUSTOM_FILTER', {filter:'all_fields', value:this.filter_list})
          // this.$store.commit('orderTable/FILTER', {filter:'all_fields', value:this.filter_list})
          // Event.$emit('vue-tables.orderTable.filter::all_fields', this.filter_list);
        }
      },

      resolvePath(routePath) {
      if (/^(https?:|mailto:|tel:)/.test(routePath)) {
        return routePath
      }
      return path.resolve('/sales/orders', routePath)
    },
    },
  computed: {
    items(){
      if(this.tag_new.key){
        var result = this.filters.filter(obj=>obj.value==this.tag_new.key);
        return result[0].items;
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

</style>

