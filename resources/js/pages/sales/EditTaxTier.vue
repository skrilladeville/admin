<template>
  <div class="app-container">
    <el-row>
      <el-col :span="24">
        <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
                <span class="card-title" >Edit Tax Tier</span>
                <el-button style="float: right; padding: 3px 0" type="text"><router-link :to="{name:'sales.tax'}">Back To List</router-link></el-button>
            </div>
            <div class="card-content" >
                <div class="card-body" >
                  <el-form :model="form" class="edit-tax-form" label-width="150px">  
                    <el-row :gutter="20">
                      <el-col :span="12">
                            <el-form-item label="Tax Tier Name">
                              <el-input v-model="form.name"></el-input>
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
                          <el-button type="primary" @click="onSubmit(tax_rates)">Save</el-button>
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
  name: 'EditTaxTier',
  components: { },
  data() {
    return {
        form: {
            name: '',
        },
        tax_rates: [
          {
            province: 'Alberta',
            flower: {
              id: 1,
              rate: '16.8',
              checked: false,
            },
            trim: {
              id: 2,
              rate: '16.8',
              checked: false
            },
            seed: {
              id: 3,
              rate: '16.8',
              checked: false
            },
            seedling: {
              id: 4,
              rate: '16.8',
              checked: false
            }
          },{
            province: 'British Columbia',
            flower: {
              id: 5,
              rate: '0',
              checked: false
            },
            trim: {
              id: 6,
              rate: '0',
              checked: false
            },
            seed: {
              id: 7,
              rate: '0',
              checked: false
            },
            seedling: {
              id: 8,
              rate: '0',
              checked: false
            }
          },{
            province: 'Manitoba',
            flower:{
              id: 9,
              rate: '0',
              checked: false
            },
            trim: {
              id: 10,
              rate: '0',
              checked: false
            },
            seed: {
              id: 11,
              rate: '0',
              checked: false
            },
            seedling: {
              id: 12,
              rate: '0',
              checked: false
            }
          },{
            province: 'New Brunswick',
            flower: {
              id: 13,
              rate: '0',
              checked: false
            },
            trim: {
              id: 14,
              rate: '0',
              checked: false
            },
            seed: {
              id: 15,
              rate: '0',
              checked: false
            },
            seedling: {
              id: 16,
              rate: '0',
              checked: false
            }
          },{
            province: 'Newfoundland and Labrador',
            flower: {
              id: 17,
              rate: '0',
              checked: false
            },
            trim: {
              id: 18,
              rate: '0',
              checked: false
            },
            seed: {
              id: 19,
              rate: '0',
              checked: false
            },
            seedling: {
              id: 20,
              rate: '0',
              checked: false
            }
          },{
            province: 'Northwest Territories',
            flower: {
              id: 21,
              rate: '0',
              checked: false
            },
            trim: {
              id: 22,
              rate: '0',
              checked: false
            },
            seed: {
              id: 23,
              rate: '0',
              checked: false
            },
            seedling: {
              id: 24,
              rate: '0',
              checked: false
            }
          },{
            province: 'Nova Scotia',
            flower: {
              id: 25,
              rate: '0',
              checked: false
            },
            trim: {
              id: 26,
              rate: '0',
              checked: false
            },
            seed: {
              id: 27,
              rate: '0',
              checked: false
            },
            seedling: {
              id: 28,
              rate: '0',
              checked: false
            }
          },{
            province: 'Nunavut',
            flower: {
              id: 29,
              rate: '19.3',
              checked: false
            },
            trim: {
              id: 30,
              rate: '19.3',
              checked: false
            },
            seed: {
              id: 31,
              rate: '19.3',
              checked: false
            },
            seedling: {
              id: 32,
              rate: '19.3',
              checked: false
            },
          },{
            province: 'Ontario',
            flower: {
              id: 33,
              rate: '3.9',
              checked: false
            },
            trim: {
              id: 34,
              rate: '3.9',
              checked: false
            },
            seed: {
              id: 35,
              rate: '3.9',
              checked: false
            },
            seedling: {
              id: 36,
              rate: '3.9',
              checked: false
            }
          },{
            province: 'Prince Edward Island',
            flower: {
              id: 37,
              rate: '0',
              checked: false
            },
            trim: {
              id: 38,
              rate: '0',
              checked: false
            },
            seed: {
              id: 39,
              rate: '0',
              checked: false
            },
            seedling: {
              id: 40,
              rate: '0',
              checked: false
            }
          },{
            province: 'Quebec',
            flower: {
              id: 41,
              rate: '0',
              checked: false
            },
            trim: {
              id: 42,
              rate: '0',
              checked: false
            },
            seed: {
              id: 43,
              rate: '0',
              checked: false
            },
            seedling: {
              id: 44,
              rate: '0',
              checked: false
            }
          },{
            province: 'Saskatchewan',
            flower: {
              id: 45,
              rate: '6.45',
              checked: false
            },
            trim: {
              id: 46,
              rate: '6.45',
              checked: false
            },
            seed: {
              id: 47,
              rate: '6.45',
              checked: false
            },
            seedling: {
              id: 48,
              rate: '6.45',
              checked: false
            },
          },{
            province: 'Yukon',
            flower: {
              id: 49,
              rate: '0',
              checked: false
            },
            trim: {
              id: 50,
              rate: '6.45',
              checked: false
            },
            seed: {
              id: 51,
              rate: '6.45',
              checked: false
            },
            seedling: {
              id: 52,
              rate: '6.45',
              checked: false
            }
          }
        ]  
    }
  },
  mounted(){
    axios.get('/api/sales/tax_rates/'+this.$route.params.id).then(res=>{
      var tier = res.data;
      this.form.name = tier.name;
      var rates = tier.rates;
      rates.forEach(data_obj => {
        var checklist = this.tax_rates.filter(checklist_obj => 
            checklist_obj.province === data_obj.province);

        checklist[0][data_obj.category].checked = true;
      });
    }).catch(err=>console.log(err));
  },
  methods: {
    onSubmit(tax_rates){
      var post_payload = this.form;
      post_payload['rates'] = getRates(tax_rates);
      axios.post('/api/sales/tax_tier/edit/'+this.$route.params.id, post_payload).then(res=>{
        this.$message({
          message: 'Successfully saved!',
          type: 'success'
          });

        this.$router.push({name:'sales.tax'});
      }).catch(err=>console.log(err))
    }
  }
}

function getRates(tax_rates){
  var checklist = tax_rates;
  var post_checklist = [];
  var categories = ['flower', 'trim', 'seed', 'seedling'];
  checklist.forEach(obj => {
    for(var i=0; i<categories.length; i++){
      if(obj[categories[i]].checked){
          post_checklist.push(obj[categories[i]].id)
      }
    }
  });
  return post_checklist;
}
</script>

<style>
    .edit-tax-form > .el-col > .el-form-item > .el-form-item__label{
    margin: 0!important;
  }
</style>
