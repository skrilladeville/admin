<template>
    <el-row :gutter="20" class="row">
        <el-col :span="24">
            <el-card class="box-card">
            <div slot="header" class="clearfix">
                <span>Edit Shipment Method</span>
            </div>
            <el-form ref="form" :model="form" :rules="rules" class="shipping-method-form" label-width="200px">
                <el-form-item class="" label="Shipping Method Name" prop="" >
                <el-input v-model="form.method_name"></el-input>
                </el-form-item>

                 <el-form-item class="" label="Delivery Charge">
                <el-input v-model="form.delivery_charge" ></el-input>
                </el-form-item>
                
                <el-form-item class="" label="Time" prop="" >
                <el-time-picker
                    is-range
                    v-model="form.time"
                    range-separator="To"
                    start-placeholder="Start time"
                    end-placeholder="End time">
                </el-time-picker>
                </el-form-item>

                <el-form-item class="" label="Free Delivery Amount">
                <el-input v-model="form.free_delivery_amt" ></el-input>
                </el-form-item>

                <el-form-item class="" label="Minimum Order Amount">
                <el-input v-model="form.min_order_amt" ></el-input>
                </el-form-item>

                <el-form-item class="" label="Active">
                <el-switch
                    v-model="form.is_active"
                    active-color="#13ce66"
                    inactive-color="#ff4949"
                    >
                </el-switch>
            </el-form-item>
            <el-form-item size="large">
                <el-button type="primary" @click="onSubmit">Save</el-button>
                <router-link :to="{name:'sales.shipment-methods'}">
                    <el-button>Cancel</el-button>
                </router-link>
            </el-form-item>
		    </el-form>
        </el-card>
    </el-col>
    </el-row>
</template>

<script>
import axios from 'axios'

export default {
  name: 'EditShipmentMethod',
  components: { },
  data() {
    return {
        form:{
            method_name: '',
            delivery_charge: '',
            time: []
,            start_time: '',
            end_time: '',
            free_delivery_amt: '',
            min_order_amt: '',
            is_active: ''
        }
    }
  },
  created() {
  },
  methods: {
      onSubmit(){
           this.$message({
                message: 'Successfully saved!',
                type: 'success'
            });
      }
  }
}
</script>

<style>
.shipping-method-form label{
    margin: 0!important;
}
</style>
