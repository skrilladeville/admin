<template>
  <div class="app-container">
    <el-row>
      <el-col :span="24">
        <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
                <span class="card-title" >New Tax Tier</span>
                <el-button style="float: right; padding: 3px 0" type="text"><router-link :to="{name:'sales.tax'}">Back To List</router-link></el-button>
            </div>
            <div class="card-content" >
                <div class="card-body" >
                  <el-form :model="form" class="edit-tax-form" label-width="150px">  
                    <el-row :gutter="20">
                      <el-col :span="12">
                            <el-form-item label="Tax Tier Name">
                              <el-input v-model="form.tier_name"></el-input>
                          </el-form-item>
                      </el-col>
                    </el-row>
                    <el-row :gutter="20">
                      <el-col :span="4" :offset="6" class="tax-header">
                        <span>Flower</span>
                      </el-col>
                      <el-col :span="4" class="tax-header">
                        <span>Trim</span>
                      </el-col>
                      <el-col :span="4" class="tax-header">
                        <span>Seed</span>
                      </el-col>
                      <el-col :span="4" class="tax-header">
                        <span>Seedling</span>
                      </el-col>
                    </el-row>
                    <el-row :gutter="20" v-for="(obj, index) in tax_rates" :key="index">
                      <el-col :span="6" class="province-header">
                        <span>{{obj.province}}</span>
                      </el-col>
                      <el-col :span="4">
                        <el-checkbox v-model="obj.flower.checked"  border>{{obj.flower.rate}}</el-checkbox>
                      </el-col>
                      <el-col :span="4">
                        <el-checkbox v-model="obj.trim.checked" border>{{obj.trim.rate}}</el-checkbox>
                      </el-col>
                      <el-col :span="4">
                        <el-checkbox v-model="obj.seed.checked" border>{{obj.seed.rate}}</el-checkbox>
                      </el-col>
                      <el-col :span="4">
                        <el-checkbox v-model="obj.seedling.checked" border>{{obj.seedling.rate}}</el-checkbox>
                      </el-col>
                    </el-row>
                    <el-row :gutter="20">
                        <el-form-item size="large">
                          <el-button type="primary" @click="onSubmit">Save</el-button>
                          <router-link :to="{name:'sales.tax'}">
                              <el-button>Cancel</el-button>
                          </router-link>
                      </el-form-item>
                    </el-row>
                  </el-form>
                </div>
            </div>
        </el-card>
      </el-col>
    </el-row>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'NewTaxTier',
  components: { },
  data() {
    return {
        form: {
            tier_name: '',
        },
        tax_rates: [
          {
            province: 'Alberta',
            flower: {
              rate: '16.8',
              checked: false,
            },
            trim: {
              rate: '16.8',
              checked: false
            },
            seed: {
              rate: '16.8',
              checked: false
            },
            seedling: {
              rate: '16.8',
              checked: false
            }
          },{
            province: 'British Columbia',
            flower: {
              rate: '0',
              checked: false
            },
            trim: {
              rate: '0',
              checked: false
            },
            seed: {
              rate: '0',
              checked: false
            },
            seedling: {
              rate: '0',
              checked: false
            }
          },{
            province: 'Manitoba',
            flower:{
              rate: '0',
              checked: false
            },
            trim: {
              rate: '0',
              checked: false
            },
            seed: {
              rate: '0',
              checked: false
            },
            seedling: {
              rate: '0',
              checked: false
            }
          },{
            province: 'New Brunswick',
            flower: {
              rate: '0',
              checked: false
            },
            trim: {
              rate: '0',
              checked: false
            },
            seed: {
              rate: '0',
              checked: false
            },
            seedling: {
              rate: '0',
              checked: false
            }
          },{
            province: 'Newfoundland and Labrador',
            flower: {
              rate: '0',
              checked: false
            },
            trim: {
              rate: '0',
              checked: false
            },
            seed: {
              rate: '0',
              checked: false
            },
            seedling: {
              rate: '0',
              checked: false
            }
          },{
            province: 'Northwest Territories',
            flower: {
              rate: '0',
              checked: false
            },
            trim: {
              rate: '0',
              checked: false
            },
            seed: {
              rate: '0',
              checked: false
            },
            seedling: {
              rate: '0',
              checked: false
            }
          },{
            province: 'Nova Scotia',
            flower: {
              rate: '0',
              checked: false
            },
            trim: {
              rate: '0',
              checked: false
            },
            seed: {
              rate: '0',
              checked: false
            },
            seedling: {
              rate: '0',
              checked: false
            }
          },{
            province: 'Nunavut',
            flower: {
              rate: '19.3',
              checked: false
            },
            trim: {
              rate: '19.3',
              checked: false
            },
            seed: {
              rate: '19.3',
              checked: false
            },
            seedling: {
              rate: '19.3',
              checked: false
            },
          },{
            province: 'Ontario',
            flower: {
              rate: '3.9',
              checked: false
            },
            trim: {
              rate: '3.9',
              checked: false
            },
            seed: {
              rate: '3.9',
              checked: false
            },
            seedling: {
              rate: '3.9',
              checked: false
            }
          },{
            province: 'Prince Edward Island',
            flower: {
              rate: '0',
              checked: false
            },
            trim: {
              rate: '0',
              checked: false
            },
            seed: {
              rate: '0',
              checked: false
            },
            seedling: {
              rate: '0',
              checked: false
            }
          },{
            province: 'Quebec',
            flower: {
              rate: '0',
              checked: false
            },
            trim: {
              rate: '0',
              checked: false
            },
            seed: {
              rate: '0',
              checked: false
            },
            seedling: {
              rate: '0',
              checked: false
            }
          },{
            province: 'Ontario',
            flower: {
              rate: '6.45',
              checked: false
            },
            trim: {
              rate: '6.45',
              checked: false
            },
            seed: {
              rate: '6.45',
              checked: false
            },
            seedling: {
              rate: '6.45',
              checked: false
            },
          },{
            province: 'Yukon',
            flower: {
              rate: '0',
              checked: false
            },
            trim: {
              rate: '6.45',
              checked: false
            },
            seed: {
              rate: '6.45',
              checked: false
            },
            seedling: {
              rate: '6.45',
              checked: false
            }
          }

        ]
    }
  },
  created() {
  },
  methods: {
  }
}
</script>

<style>
.edit-tax-form > .el-col > .el-form-item > .el-form-item__label{
    margin: 0!important;
  }

  .tax-header{
    text-align: center;
  }

  .province-header{
    height: 50px;
 line-height: 50px;
 text-align: center;
}
 
 .province-header > span {
 display: inline-block;
 vertical-align: bottom;
 line-height: normal;
}

</style>