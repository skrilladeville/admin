<template>
  <div class="app-container">
    <el-row>
      <el-col :span="24">
        <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
                <span class="card-title" >General Tax Settings</span>
            </div>
            <div class="card-content" >
                <div class="card-body" >
                  <el-form :model="form" class="tax-form">
                    <el-form-item label="Enable Taxes and Tax Calculations">
                      <el-switch v-model="form.enable_tax" @change="onSwitch('enable_tax', form.enable_tax==true?1:0)"></el-switch>
                    </el-form-item>
                    <el-form-item label="Apply Sales to Local Cannabis Business Tax Amount">
                      <el-switch v-model="form.apply_sales_tax" @change="onSwitch('apply_biz_tax', form.apply_sales_tax==true?1:0)"></el-switch>
                    </el-form-item>
                    <el-form-item label="Enter Prices Inclusive of Tax">
                      <el-switch v-model="form.prices_inclusive_tax" @change="onSwitch('prices_inclusive_tax', form.prices_inclusive_tax==true?1:0)"></el-switch>
                    </el-form-item>
                    <el-form-item label="Tax Tier for Medical Customers with State Card">
                      <el-select clearable v-model="form.med_w_card_tax" placeholder="Please select a Tax Tier"
                      @change="onSwitch('tier_w/card', form.med_w_card_tax)">
                        <el-option v-for="(tier, index) in tiers" :key="index" :label="tier.name" :value="tier.id"></el-option>
                      </el-select>
                    </el-form-item>
                    <el-form-item label="Tax Tier for Medical Customers with Record (18+)">
                      <el-select clearable v-model="form.med_rec_18_tax" placeholder="Please select a Tax Tier"
                      @change="onSwitch('tier_18+', form.med_rec_18_tax)">
                        <el-option v-for="(tier, index) in tiers" :key="index" :label="tier.name" :value="tier.id"></el-option>
                      </el-select>
                    </el-form-item>
                    <el-form-item label="Tax Tier for Adult Use (21+)">
                       <el-select clearable v-model="form.adult_tax" placeholder="Please select a Tax Tier"
                       @change="onSwitch('tier_adult_use', form.adult_tax)">
                        <el-option v-for="(tier, index) in tiers" :key="index" :label="tier.name" :value="tier.id"></el-option>
                      </el-select>
                    </el-form-item>
                    <el-form-item label="Tax Tier for Walk-in Patients">
                      <el-select clearable v-model="form.walk_in_tax" placeholder="Please select a Tax Tier"
                      @change="onSwitch('tier_walk_in', form.walk_in_tax)">
                        <el-option v-for="(tier, index) in tiers" :key="index" :label="tier.name" :value="tier.id"></el-option>
                      </el-select>
                    </el-form-item>
                  </el-form>
                </div>
            </div>
        </el-card>
      </el-col>
    </el-row>
    <el-row>
      <el-col :span="24">
        <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
                <span class="card-title" >Tax Tiers</span>
                <el-button style="float: right; padding: 3px 0" type="text"><router-link :to="{name:'sales.new-tax-tier'}">Add New</router-link></el-button>
            </div>
            <div class="card-content" >
                <div class="card-body" >
                  <table class="table table-borderless table-sm">
                    <tbody>
                      <tr v-for="(tier, index) in tiers" :key="index">
                        <td>{{tier.name}}</td>
                        <td class="text-xs-right">
                          <router-link :to="{name:'sales.edit-tax-tier', params:{id:tier.id}}">
                            <el-button type="warning" icon="el-icon-edit" size="small">
                            </el-button>
                          </router-link>
                        <el-button type="danger" icon="el-icon-delete" size="small" @click="onDelete(tier.id, index)"></el-button>
                        </td>
                      </tr>
                      <tr>
                        <td>Shipment Tax</td>
                        <td class="text-xs-right">
                          <router-link :to="{name:'sales.shipment-tax-tier'}">
                            <el-button type="warning" icon="el-icon-edit" size="small">
                            </el-button>
                          </router-link>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </el-card>
      </el-col>
    </el-row>
  </div>
</template>

<script>
import axios from 'axios'
// import Event from 'vue-tables-2'


export default {
  name: 'SalesTax',
  components: {  },
  data() {
    return {
      tiers: [],
      form: {
        enable_tax: false,
        apply_sales_tax: false,
        prices_inclusive_tax: false,
        med_w_card_tax: '',
        med_rec_18_tax: '',
        adult_tax: '',
        walk_in_tax: ''
      }
    }
  },
  mounted(){
    axios.get('/api/sales/tax_tiers').then(res=>{
      this.tiers = res.data.tiers;
      this.form.enable_tax = res.data.settings.enable_tax==1?true:false;
      this.form.apply_sales_tax = res.data.settings.apply_biz_tax==1?true:false;
      this.form.prices_inclusive_tax = res.data.settings.prices_inclusive_tax==1?true:false;
      this.form.med_w_card_tax = res.data.settings["tier_w/card"];
      this.form.med_rec_18_tax = res.data.settings['tier_18+'];
      this.form.adult_tax = res.data.settings.tier_adult_use;
      this.form.walk_in_tax = res.data.settings.tier_walk_in;

    }).catch(err=>console.log(err));
  },
  methods:{
    onSwitch(key, value){
            console.log(this.form)
      var payload = {};
      payload[key]= value;
      axios.put('/api/sales/tax_settings/update', payload).then(res=>{
      }).catch(err=>console.log(err))
    },
    onDelete(id, index){
      axios.delete('/api/sales/tax_tier/delete/'+id).then(res=>{
        this.tiers.splice(index, 1);
      }).catch(err=>console.log(err))
    }
  }
}
</script>

<style>
  .tax-form > .el-form-item > .el-form-item__label{
    margin-top: 0!important;
    width: 50%;
    white-space: normal;
    word-wrap: break-word;
  }
</style>
