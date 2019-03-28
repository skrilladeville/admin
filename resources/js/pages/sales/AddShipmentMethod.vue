<template>
    <el-row :gutter="20" class="row">
        <el-col :span="24">
            <el-card class="box-card">
            <div slot="header" class="clearfix">
                <span>Add Shipment Method</span>
            </div>
            <el-form ref="form" :rules="rules" :model="form" class="shipping-method-form" label-width="200px">
                <el-form-item class="" label="Shipping Method Name" prop="" >
                <el-input v-model="form.method"></el-input>
                </el-form-item>
                <el-form-item class="" label="Type" prop="type" >
                <el-select v-model="form.type" clearable placeholder="Select Type">
                    <el-option
                    v-for="item in options"
                    :key="item.value"
                    :label="item.label"
                    :value="item.value">
                    </el-option>
                </el-select>
                </el-form-item>

                 <el-form-item class="" label="Delivery Charge ($)">
                  <el-input-number v-model="form.charge" :precision="2" :step="0.1">
                  </el-input-number>
                </el-form-item>
                
                <el-form-item class="" label="Time" prop="" >
                <el-time-select
                    v-model="form.start_time"
                    :picker-options="{
                        start: '00:00',
                        step: '00:15',
                        end: '23:00'
                    }" 
                    placeholder="Start time">
                    </el-time-select>
                    <el-time-select
                    v-if="form.start_time"
                    v-model="form.end_time"
                    :picker-options="{
                        start: form.start_time,
                        step: '00:15',
                        end: '23:00'
                    }" 
                    placeholder="End time">
                    </el-time-select>
                </el-form-item>

                <el-form-item class="" label="Free Delivery Amount ($)">
                    <el-input-number v-model="form.free_after" :precision="2" 
                    :step="0.1">
                  </el-input-number>                
                </el-form-item>

                <el-form-item class="" label="Minimum Order Amount ($)">
                <el-input-number v-model="form.min_amount" :precision="2" 
                    :step="0.1"></el-input-number>
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
                <el-button type="primary" @click="onSubmit('form')">Save</el-button>
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
  name: 'AddShipmentMethod',
  components: { },
  data() {
    var checkType = (rule, value, callback) => {
        if (!value) {
        return callback(new Error('This field is required.'));
        }
        setTimeout(() => { 
            if (!value) {
                callback(new Error('This field is required.'));
            }else{
                callback();
            }
        }, 1000);
    };

    return {
        form:{
            method: '',
            type: null,
            charge: '',
            start_time: '',
            end_time: '',
            free_after: '',
            min_amount: '',
            is_active: false
        },
        options:[{value: 1, label: 'Pickup'}, {value: 2, label: 'Delivery'}],
        rules: {
            type: [
					 { required: true,  validator: checkType, trigger: 'blur' }
				 ]
        }
    }
  },
  created() {
  },
  methods: {
    onSubmit(formName){
        var post_form = this.form;
        if(post_form.start_time==''){
            post_form.start_time = '00:00';
            post_form.end_time = '00:00';
        }
         var formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
        });
        this.$refs[formName].validate((valid) => {
			if (valid) {
                axios.post('/api/sales/shipmentMethod/new', post_form)
                .then(res=>{
                    this.$message({
                    message: 'Successfully saved!',
                    type: 'success'
                    });
                    var new_method = {
                        id: res.data.id,
                        type: res.data.type==1? 'Pickup': 'Delivery',
                        shipping_method: res.data.method,
                        delivery_charge: formatter.format(res.data.charge),
                        min_order_amount: formatter.format(res.data.min_amount),
                        free_delivery_after: formatter.format(res.data.free_after),
                        time: res.data.start_time +' '+res.data.end_time,
                        is_active: (res.data.is_active)? true : false,
                    };
                    this.$store.dispatch('ADD_NEW_SHIPMENT_METHOD', new_method)

                    this.$router.push({name: 'sales.shipment-methods'})
                    
                }).catch(err=>this.$message.error('Please check your fields.'))
            }else{
                this.$message.error('Please check your fields.')
            }
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
