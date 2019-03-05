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
                      <el-switch v-model="form.enable_tax"></el-switch>
                    </el-form-item>
                    <el-form-item label="Apply Sales to Local Cannabis Business Tax Amount">
                      <el-switch v-model="form.apply_sales_tax"></el-switch>
                    </el-form-item>
                    <el-form-item label="Enter Prices Inclusive of Tax">
                      <el-switch v-model="form.prices_inclusive_tax"></el-switch>
                    </el-form-item>
                    <el-form-item label="Tax Tier for Medical Customers with State Card">
                      <el-select v-model="form.med_w_card_tax" placeholder="Please select a Tax Tier">
                        <el-option label="Tier one" value="tier_one"></el-option>
                        <el-option label="Tier two" value="tier_two"></el-option>
                      </el-select>
                    </el-form-item>
                    <el-form-item label="Tax Tier for Medical Customers with Record (18+)">
                      <el-select v-model="form.med_rec_18_tax" placeholder="Please select a Tax Tier">
                        <el-option label="Tier one" value="tier_one"></el-option>
                        <el-option label="Tier two" value="tier_two"></el-option>
                      </el-select>
                    </el-form-item>
                    <el-form-item label="Tax Tier for Adult Use (21+)">
                      <el-select v-model="form.adult_tax" placeholder="Please select a Tax Tier">
                        <el-option label="Tier one" value="tier_one"></el-option>
                        <el-option label="Tier two" value="tier_two"></el-option>
                      </el-select>
                    </el-form-item>
                    <el-form-item label="Tax Tier for Walk-in Patients">
                      <el-select v-model="form.walk_in_tax" placeholder="Please select a Tax Tier">
                        <el-option label="Tier one" value="tier_one"></el-option>
                        <el-option label="Tier two" value="tier_two"></el-option>
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
                      <tr>
                        <td>Tier One</td>
                        <td class="text-xs-right">
                          <router-link :to="{name:'sales.edit-tax-tier', params:{id:123}}">
                            <el-button type="warning" icon="el-icon-edit" size="small">
                            </el-button>
                          </router-link>
                        <el-button type="danger" icon="el-icon-delete" size="small" @click="onDelete"></el-button>
                        </td>
                      </tr>
                      <tr>
                        <td>Tier Two</td>
                        <td class="text-xs-right">
                          <router-link :to="{name:'sales.edit-tax-tier', params:{id:123}}">
                            <el-button type="warning" icon="el-icon-edit" size="small">
                            </el-button>
                          </router-link>
                        <el-button type="danger" icon="el-icon-delete" size="small" @click="onDelete"></el-button>
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
