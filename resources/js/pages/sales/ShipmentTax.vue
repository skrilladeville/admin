<template>
  <div class="app-container">
    <el-row>
      <el-col :span="24">
        <el-card class="box-card" shadow="always">
            <div slot="header" class="clearfix">
                <span class="card-title" >Shipment Tax Tier</span>
                <el-button style="float: right; padding: 3px 0" type="text"><router-link :to="{name:'sales.tax'}">Back To List</router-link></el-button>
            </div>
            <div class="card-content" >
                <div class="card-body" >
                   
                    <el-row :gutter="20">
                      <el-col :span="4" :offset="4" class="tax-header">
                        <span>GST (%)</span>
                      </el-col>
                      <el-col :span="4" class="tax-header">
                        <span>PST (%)</span>
                      </el-col>
                      <el-col :span="4" class="tax-header">
                        <span>HST (%)</span>
                      </el-col>
                      <el-col :span="4" class="tax-header">
                        <span>QST (%)</span>
                      </el-col>
                      <el-col :span="2" class="tax-header">
                        <span>Total Tax Applied (%)</span>
                      </el-col>
                    </el-row>
                    <el-row :gutter="20" v-for="(obj, index) in tax_rates" :key="index">
                      <el-col :span="4" class="province-header">
                        <span>{{obj.province}}</span>
                      </el-col>
                      <el-col :span="4">
                        <el-input-number size="small" v-model="obj.gst.rate" :precision="2" :disabled="obj.disabled"></el-input-number>
                      </el-col>
                      <el-col :span="4">
                        <el-input-number size="small" v-model="obj.pst.rate" :precision="2" :disabled="obj.disabled"></el-input-number>
                      </el-col>
                      <el-col :span="4">
                        <el-input-number size="small" v-model="obj.hst.rate" :precision="2" :disabled="obj.disabled"></el-input-number>
                      </el-col>
                      <el-col :span="4">
                        <el-input-number size="small" v-model="obj.qst.rate" :precision="2" :disabled="obj.disabled"></el-input-number>
                      </el-col>
                      <el-col :span="2" class="province-header">
                        <span>{{obj.gst.rate + obj.pst.rate + obj.hst.rate + obj.qst.rate}}</span>
                      </el-col>
                      <el-col :span="2" class="province-header">
                        <el-button v-if="obj.disabled" type="warning" icon="el-icon-edit" size="small" @click="editRate(index)">
                        </el-button>
                        <el-button v-else type="primary" icon="el-icon-check" size="small" @click="editRate(index)">
                        </el-button>
                      </el-col>
                    </el-row>
                    <el-row :gutter="20">
                          <el-button type="primary" @click="onSubmit(tax_rates)">Save</el-button>
                          <router-link :to="{name:'sales.tax'}">
                              <el-button>Cancel</el-button>
                          </router-link>
                    </el-row>
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
  name: 'ShipmentTax',
  components: { },
  data() {
    return {
        tax_rates: [
          {
            province: 'Alberta',
            disabled: true,
            gst: {
              rate: '0.0'
            },
            pst: {
              rate: '0.0'
            },
            hst: {
              rate: '0.0'
            },
            qst: {
              rate: '0.0'
            }
          },{
            province: 'British Columbia',
            disabled: true,
            gst: {
              rate: '0.0'
            },
            pst: {
              rate: '0.0'
            },
            hst: {
              rate: '0.0'
            },
            qst: {
              rate: '0.0'
            }
          },{
            province: 'Manitoba',
             disabled: true,
            gst: {
              rate: '0.0'
            },
            pst: {
              rate: '0.0'
            },
            hst: {
              rate: '0.0'
            },
            qst: {
              rate: '0.0'
            }
          },{
            province: 'New Brunswick',
             disabled: true,
            gst: {
              rate: '0.0'
            },
            pst: {
              rate: '0.0'
            },
            hst: {
              rate: '0.0'
            },
            qst: {
              rate: '0.0'
            }
          },{
            province: 'Newfoundland and Labrador',
             disabled: true,
            gst: {
              rate: '0.0'
            },
            pst: {
              rate: '0.0'
            },
            hst: {
              rate: '0.0'
            },
            qst: {
              rate: '0.0'
            }
          },{
            province: 'Northwest Territories',
             disabled: true,
            gst: {
              rate: '0.0'
            },
            pst: {
              rate: '0.0'
            },
            hst: {
              rate: '0.0'
            },
            qst: {
              rate: '0.0'
            }
          },{
            province: 'Nova Scotia',
             disabled: true,
            gst: {
              rate: '0.0'
            },
            pst: {
              rate: '0.0'
            },
            hst: {
              rate: '0.0'
            },
            qst: {
              rate: '0.0'
            }
          },{
            province: 'Nunavut',
             disabled: true,
            gst: {
              rate: '0.0'
            },
            pst: {
              rate: '0.0'
            },
            hst: {
              rate: '0.0'
            },
            qst: {
              rate: '0.0'
            }
          },{
            province: 'Ontario',
             disabled: true,
            gst: {
              rate: '0.0'
            },
            pst: {
              rate: '0.0'
            },
            hst: {
              rate: '0.0'
            },
            qst: {
              rate: '0.0'
            }
          },{
            province: 'Prince Edward Island',
             disabled: true,
            gst: {
              rate: '0.0'
            },
            pst: {
              rate: '0.0'
            },
            hst: {
              rate: '0.0'
            },
            qst: {
              rate: '0.0'
            }
          },{
            province: 'Quebec',
             disabled: true,
            gst: {
              rate: '0.0'
            },
            pst: {
              rate: '0.0'
            },
            hst: {
              rate: '0.0'
            },
            qst: {
              rate: '0.0'
            }
          },{
            province: 'Saskatchewan',
             disabled: true,
            gst: {
              rate: '0.0'
            },
            pst: {
              rate: '0.0'
            },
            hst: {
              rate: '0.0'
            },
            qst: {
              rate: '0.0'
            }
          },{
            province: 'Yukon',
             disabled: true,
            gst: {
              rate: '0.0'
            },
            pst: {
              rate: '0.0'
            },
            hst: {
              rate: '0.0'
            },
            qst: {
              rate: '0.0'
            }
          }

        ]
    }
  },
  created() {
    axios.get('/api/sales/shipment_tax').then(res=>{
      var tier = res.data;
        Object.entries(tier).forEach(obj => {
            let key = obj[0];
            let value = obj[1];
            
            var grp = this.tax_rates.filter(list_obj => 
            list_obj.province === key);
            
            value.forEach(type_obj => {
                grp[0][type_obj.type.toLowerCase()].rate = type_obj.rate;
            })    
        });
      
    }).catch(err=>console.log(err));
  },
  methods: {
    onSubmit(tax_rates){
      var payload = [];
      var categories = ['gst', 'pst', 'hst', 'qst'];

      tax_rates.forEach(obj =>{
          for(var i=0; i<categories.length; i++){
            let payload_obj = {};
            payload_obj["province"] = obj.province;
            payload_obj["type"] = categories[i].toUpperCase();
            payload_obj["rate"] = obj[categories[i]].rate;
            payload.push(payload_obj);
          }
      });
      
      axios.put('/api/sales/shipment_tax/update', payload).then(res=>{
        this.$message({
          message: 'Successfully saved!',
          type: 'success'
          });
            console.log(res.data)
        this.$router.push({name:'sales.tax'});
      }).catch(err=>console.log(err))
    },
    editRate(index){
        this.tax_rates[index].disabled = !this.tax_rates[index].disabled;
    }
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
 line-height: 30px;
 text-align: center;
}
 
 .province-header > span {
 display: inline-block;
 vertical-align: bottom;
 line-height: normal;
}

</style>