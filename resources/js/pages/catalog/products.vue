<template>
  <div class="app-container">
    <el-card>
      <div slot="header" class="clearfix">
        <span>Products</span>
        <el-button
          size="small"
          @click="dialogCheckIn=true"
          style="float: right;"
          round
          type="primary"
        >Check In</el-button>
        <router-link :to="{name:'catalog.addProduct'}">
          <el-button
            style="float: right; margin-right:10px;"
            size="small"
            type="success"
            round
          >Add Product</el-button>
        </router-link>
      </div>

      <v-client-table :data="products" :columns="['name','symbol','sku','description','action']">
        <template slot="action" slot-scope="props">
          <div class="d-flex">
            <el-button size="small" icon="el-icon-edit" type="success"></el-button>
            <el-button size="small" icon="el-icon-delete" type="danger"></el-button>
          </div>
        </template>
      </v-client-table>
    </el-card>


        <el-dialog
      title="Confirmation"
      :visible.sync="dialogConfirmation"
      width="50%"
      center
    >
    <h5><b>{{this.product.name}}</b></h5>
    
    <el-row>
      <el-col :md="8">
        <p>Check In To</p>
      </el-col>
      <el-col :md="16">
        <p>{{getBranch_name}}</p>
      </el-col>
           <el-col :md="8">
        <p>Vendor</p>
      </el-col>
      <el-col :md="16">
        <p>{{getVendorName.name}}</p>
      </el-col>
          <el-col :md="8">
        <p>Batch Id</p>
      </el-col>
      <el-col :md="16">
        <p v-if="this.form.batch_id != ''">{{this.form.batch_id}}</p>
        <p v-else>-------------</p>
      </el-col>
            <el-col :md="8">
        <p>Account</p>
      </el-col>
      <el-col :md="16">
        <p>{{getAccount_name}}</p>
      </el-col>
    </el-row>

      <template v-if="product.price_measurement=='Weight'">
    <el-card>

      <table class="table table-sm">
        <thead>
           <tr>
          <th>
            jar, g
          </th>
             <th>
            1 g
          </th>
             <th>
            1/8 oz
          </th>
             <th>
           1/4 oz
          </th>
             <th>
            1/2 oz
          </th>
                <th>
            1 oz
          </th>
        </tr>
        </thead>
       
        <tbody>
          <tr>
            <td v-if="form.jar_g > 0">
              {{form.jar_g}} pc
            </td>
            <td v-else>-</td>
             <td v-if="form.one_g > 0">
              {{form.one_g}} pc
            </td>
            <td v-else>-</td>
             <td v-if="form.eight_oz > 0">
                 {{form.eight_oz}} pc
            </td>
            <td v-else>-</td>
             <td v-if="form.fourth_oz > 0">
              {{form.fourth_oz}} pc
            </td>
            <td v-else>-</td>
             <td v-if="form.half_oz > 0">
              {{form.half_oz}} pc
            </td>
            <td v-else>-</td>
             <td v-if="form.one_oz > 0">
              {{form.one_oz}} pc
            </td>
            <td v-else>-</td>
          </tr>

                    <tr>
            <td v-if="form.jar_g > 0">
                     {{form.jar_g}} g
            </td>
            <td v-else>-</td>
             <td v-if="form.one_g > 0">
               {{one_g_cal}} g
            </td>
            <td v-else>-</td>
             <td v-if="form.eight_oz > 0">
                {{eigth_oz_to_g}} g
            </td>
            <td v-else>-</td>
             <td v-if="form.fourth_oz > 0">
                  {{fourth_oz_to_g}} g
            </td>
            <td v-else>-</td>
             <td v-if="form.half_oz > 0">
              {{half_oz_to_g}} g
            </td>
            <td v-else>-</td>
             <td v-if="form.one_oz > 0">
           {{one_oz_to_g}} g
            </td>
            <td v-else>-</td>
          </tr>




          
        </tbody>
      </table>
          </el-card>

          <el-row :gutter="5">
            <el-col :md="8">
            <el-card>
            <p>Check In Weight:</p>
            <h1><b>{{form.total_weight}} g</b></h1>
            <h5>{{parseFloat(form.total_weight * 0.00220462262)}} lb</h5>
          </el-card>
            </el-col>

                    <el-col :md="8">
                  <el-card>
            <p>Vendor Price:</p>
            <h1><b>{{form.total_cost}} g</b></h1>
            <h5 class="warning">per Gram ${{form.cost_per_gram}}</h5>
          </el-card>
            </el-col>
                    <el-col :md="8">
                  <el-card>
            <p>Balance:</p>
            <h1><b>{{parseFloat(form.total_cost - form.pament_info.payment_amount)}}</b></h1>
            <h5 v-if="parseFloat(form.total_cost - form.pament_info.payment_amount) == 0" class="primary">Paid</h5>
            <h5 v-else>Partial(${{form.payment_amount}})</h5>
          </el-card>
            </el-col>

      

          </el-row>
      </template>
      <template v-if="product.price_measurement=='Weight Range'">
        <div>
          <el-row :gutter="5">
            <el-col :md="8">
            <el-card>
            <p>Check In Weight:</p>
            <h1><b>{{form.total_weight}} g</b></h1>
            <h5>{{parseFloat(form.total_weight * 0.00220462262)}} lb</h5>
          </el-card>
            </el-col>

                    <el-col :md="8">
                  <el-card>
            <p>Vendor Price:</p>
            <h1><b>{{form.total_cost}} g</b></h1>
            <h5 class="warning">per Gram ${{form.cost_per_gram}}</h5>
          </el-card>
            </el-col>
                    <el-col :md="8">
                  <el-card>
            <p>Balance:</p>
            <h1><b>{{parseFloat(form.total_cost - form.pament_info.payment_amount)}}</b></h1>
            <h5 v-if="parseFloat(form.total_cost - form.pament_info.payment_amount) == 0" class="primary">Paid</h5>
            <h5 v-else>Partial(${{form.payment_amount}})</h5>
          </el-card>
            </el-col>

      

          </el-row>
          
        </div>
      </template>


      <template v-if="product.price_measurement=='Per Unit' || product.price_measurement=='Per Unit Range'">
        <div>
          <el-row :gutter="5">
            <el-col :md="8">
            <el-card>
            <p>Check In Quantity:</p>
            <h1><b>{{form.total_quantity}} pcs</b></h1>
            <h5>&nbsp;</h5>
          </el-card>
            </el-col>

                    <el-col :md="8">
                  <el-card>
            <p>Vendor Price:</p>
            <h1><b>{{form.total_cost}} g</b></h1>
            <h5 class="warning">per Unit ${{form.cost_per_piece}}</h5>
          </el-card>
            </el-col>
                    <el-col :md="8">
                  <el-card>
            <p>Balance:</p>
            <h1><b>{{parseFloat(form.total_cost - form.pament_info.payment_amount)}}</b></h1>
            <h5 v-if="parseFloat(form.total_cost - form.pament_info.payment_amount) == 0" class="primary">Paid</h5>
            <h5 v-else>Partial(${{form.payment_amount}})</h5>
          </el-card>
            </el-col>

      

          </el-row>
          
        </div>
      </template>




      <span slot="footer" class="dialog-footer">
        <el-button @click="cancelConfirmation" type="danger">Edit</el-button>
        <el-button type="primary" @click="confirmCheckIn">Confirm</el-button>
      </span>
    </el-dialog>
    

    <el-dialog
      title="Check In Product"
      :before-close="clearData"
      :visible.sync="dialogCheckIn"
      width="80%"
      center
    >
      <el-form label-position="top" size="mini" :model="form" ref="form">
        <el-form-item label="Product">
          <el-select
            @change="getProductSelected"
            filterable
            style="width:100%;"
            v-model="form.product_id"
            placeholder="please select a product"
          >
            <el-option :label="prod.name" v-for="prod in products" :value="prod.id" :key="prod.id"></el-option>
          </el-select>
        </el-form-item>

        <el-row :gutter="10">
          <el-col :md="12">
            <el-form-item label="Vendor">
              <el-select
                style="width:100%;"
                v-model="form.vendor_id"
                placeholder="please select a vendor"
              >
                <el-option
                  :label="vendor.name"
                  v-for="vendor in vendors"
                  :value="vendor.id"
                  :key="vendor.id"
                ></el-option>
              </el-select>
            </el-form-item>
          </el-col>
          <el-col :md="12">
            <el-form-item style="line-height:1px;" label="Check In To">
              <el-select
                style="width:100%;"
                v-model="form.branch_id"
                placeholder="please select office"
              >
                <el-option label="Amsterdam Gardens" value="1"></el-option>
                <el-option label="Indica Online" value="2"></el-option>
                <el-option label="Medibook" value="3"></el-option>
                <el-option label="Billing" value="4"></el-option>
              </el-select>
            </el-form-item>
          </el-col>
        </el-row>
        <el-row :gutter="10">
          <el-col :md="12">
            <el-form-item label="Batch Id">
              <el-input v-model="form.batch_id"></el-input>
            </el-form-item>
          </el-col>
          <el-col :md="12">
            <el-form-item label="Date">
              <el-input disabled v-model="form.date"></el-input>
            </el-form-item>
          </el-col>
        </el-row>
        <el-row :gutter="10">
          <el-col :md="12">
            <el-form-item label="UID">
              <el-input v-model="form.uid"></el-input>
            </el-form-item>
          </el-col>
          <el-col :md="12">
            <el-form-item label="Harvest Date">
              <el-date-picker
                style="width:100%;"
                v-model="form.harvest_date"
                type="date"
                placeholder="Pick a day"
              ></el-date-picker>
            </el-form-item>
          </el-col>
        </el-row>

        <template v-if="price_measurement=='Weight'">
          <div>
            <el-row :gutter="5">
              <el-col :md="8">
                <p>Quantity And Prices</p>
              </el-col>

              <el-col :md="16">
                <hr>
              </el-col>
            </el-row>
            <el-row :gutter="5">
              <el-col :md="4">
                <el-form-item label="Jar,g">
                  <el-input type="number" v-model="form.jar_g">
                    <template slot="append">g</template>
                  </el-input>
                </el-form-item>
              </el-col>
              <el-col :md="4">
                <el-form-item label="1 g">
                  <el-input type="number" v-model="form.one_g">
                    <template slot="append">pcs</template>
                  </el-input>
                  <p class="convert">{{one_g_cal}} g</p>
                </el-form-item>
              </el-col>
              <el-col :md="4">
                <el-form-item label="1/8 0z">
                  <el-input type="number" v-model="form.eight_oz">
                    <template slot="append">pcs</template>
                  </el-input>
                  <p class="convert">{{eigth_oz_to_g}} g</p>
                </el-form-item>
              </el-col>
              <el-col :md="4">
                <el-form-item label="1/4 oz">
                  <el-input type="number" v-model="form.fourth_oz">
                    <template slot="append">pcs</template>
                  </el-input>
                  <p class="convert">{{fourth_oz_to_g}} g</p>
                </el-form-item>
              </el-col>
              <el-col :md="4">
                <el-form-item label="1/2 oz">
                  <el-input type="number" v-model="form.half_oz">
                    <template slot="append">pcs</template>
                  </el-input>
                  <p class="convert">{{half_oz_to_g}} g</p>
                </el-form-item>
              </el-col>
              <el-col :md="4">
                <el-form-item label="1 oz">
                  <el-input type="number" v-model="form.one_oz">
                    <template slot="append">pcs</template>
                  </el-input>
                  <p class="convert">{{one_oz_to_g}} g</p>
                </el-form-item>
              </el-col>
            </el-row>
            <el-row :gutter="5">
              <el-col :md="6">
                <el-form-item label="Weight">
                  <el-input
                    disabled
                    v-model="form.total_weight"
                    type="number"
                    :value="total_weight"
                  >
                    <template slot="append">g</template>
                  </el-input>
                </el-form-item>
              </el-col>
              <el-col :md="6">
                <el-form-item label="Cost Per Gram">
                  <el-input type="number" v-model="form.cost_per_gram">
                    <template slot="prepend">$</template>
                  </el-input>
                </el-form-item>
              </el-col>
              <el-col :md="12">
                <el-form-item label="Total Cost">
                  <el-input
                    type="number"
                    v-model="form.total_cost"
                    :value="total_cost"
                  >
                    <template slot="prepend">$</template>
                  </el-input>
                </el-form-item>
              </el-col>
            </el-row>
            <el-row :gutter="5">
              <el-col :md="12">
                <el-form-item style="line-height:1px;" label="Account">
                  <el-select
                    style="width:100%;"
                    v-model="form.pament_info.account_id"
                    placeholder="please select Account"
                  >
                    <el-option label="ZTEGRITYBANK ($10,000,000,272,564,224.00)" value="1"></el-option>
                    <el-option label="Universal Credit Card ($88,599,127,130,112.00)" value="2"></el-option>
                    <el-option label="Urban Leaf ($85,764,322,885,632.00)" value="3"></el-option>
                    <el-option label="Stripe ($500,000,094,158,848.00)" value="4"></el-option>
                    <el-option
                      label="Quincy And Priscilla Adams ($125,800,011,530,240.00)"
                      value="5"
                    ></el-option>
                  </el-select>
                </el-form-item>
              </el-col>
              <el-col :md="8">
                <el-form-item label="Payment Amount">
                  <el-input type="number" v-model="form.pament_info.payment_amount" :value="total_cost">
                    <template slot="prepend">$</template>
                  </el-input>
                </el-form-item>
              </el-col>
              <el-col :md="4">
                <el-form-item label=" ">
                  <el-button size="small" type="primary" @click="paidFull">Paid In Full</el-button>
                </el-form-item>
              </el-col>
            </el-row>
          </div>
        </template>

        <template v-if="price_measurement == 'Weight Range'">
          <div>
            <el-row :gutter="5">
              <el-col :md="8">
                <p>Quantity And Prices</p>
              </el-col>

              <el-col :md="16">
                <hr>
              </el-col>
            </el-row>
            <el-row :gutter="5">
              <el-col :md="6">
                <el-form-item label="Weight">
                  <el-input v-model="form.total_weight" type="number">
                    <template slot="append">g</template>
                  </el-input>
                </el-form-item>
              </el-col>
              <el-col :md="6">
                <el-form-item label="Cost Per Gram">
                  <el-input type="number" v-model="form.cost_per_gram">
                    <template slot="prepend">$</template>
                  </el-input>
                </el-form-item>
              </el-col>
              <el-col :md="12">
                <el-form-item label="Total Cost">
                  <el-input
                    type="number"
                    v-model="form.total_cost"
                    :value="total_cost_weight_range"
                  >
                    <template slot="prepend">$</template>
                  </el-input>
                </el-form-item>
              </el-col>
            </el-row>
            <el-row :gutter="5">
              <el-col :md="12">
                <el-form-item style="line-height:1px;" label="Account">
                  <el-select
                    style="width:100%;"
                    v-model="form.pament_info.account_id"
                    placeholder="please select Account"
                  >
                    <el-option label="ZTEGRITYBANK ($10,000,000,272,564,224.00)" value="1"></el-option>
                    <el-option label="Universal Credit Card ($88,599,127,130,112.00)" value="2"></el-option>
                    <el-option label="Urban Leaf ($85,764,322,885,632.00)" value="3"></el-option>
                    <el-option label="Stripe ($500,000,094,158,848.00)" value="4"></el-option>
                    <el-option
                      label="Quincy And Priscilla Adams ($125,800,011,530,240.00)"
                      value="5"
                    ></el-option>
                  </el-select>
                </el-form-item>
              </el-col>
              <el-col :md="8">
                <el-form-item label="Payment Amount">
                  <el-input type="number" v-model="form.pament_info.payment_amount" :value="total_cost">
                    <template slot="prepend">$</template>
                  </el-input>
                </el-form-item>
              </el-col>
              <el-col :md="4">
                <el-form-item label=" ">
                  <el-button size="small" type="primary" @click="paidFull">Paid In Full</el-button>
                </el-form-item>
              </el-col>
            </el-row>
          </div>
        </template>

        <template v-if="price_measurement =='Per Unit' || price_measurement =='Per Unit Range'">
          <div>
            <el-row :gutter="5">
              <el-col :md="8">
                <p>Quantity And Prices</p>
              </el-col>

              <el-col :md="16">
                <hr>
              </el-col>
            </el-row>

            <el-row :gutter="5">
              <el-col :md="6">
                <el-form-item label="Total Quantity">
                  <el-input v-model="form.total_quantity" type="number">
                    <template slot="append">pcs</template>
                  </el-input>
                </el-form-item>
              </el-col>
              <el-col :md="6">
                <el-form-item label="Cost Per Piece">
                  <el-input type="number" v-model="form.cost_per_piece">
                    <template slot="prepend">$</template>
                  </el-input>
                </el-form-item>
              </el-col>
              <el-col :md="12">
                <el-form-item label="Total Cost">
                  <el-input
                    type="number"
                    v-model="form.total_cost"
                    :value="total_cost_per_piece"
                  >
                    <template slot="prepend">$</template>
                  </el-input>
                </el-form-item>
              </el-col>
            </el-row>
            <el-row :gutter="5">
              <el-col :md="12">
                <el-form-item style="line-height:1px;" label="Account">
                  <el-select
                    style="width:100%;"
                    v-model="form.pament_info.account_id"
                    placeholder="please select Account"
                  >
                    <el-option label="ZTEGRITYBANK ($10,000,000,272,564,224.00)" value="1"></el-option>
                    <el-option label="Universal Credit Card ($88,599,127,130,112.00)" value="2"></el-option>
                    <el-option label="Urban Leaf ($85,764,322,885,632.00)" value="3"></el-option>
                    <el-option label="Stripe ($500,000,094,158,848.00)" value="4"></el-option>
                    <el-option
                      label="Quincy And Priscilla Adams ($125,800,011,530,240.00)"
                      value="5"
                    ></el-option>
                  </el-select>
                </el-form-item>
              </el-col>
              <el-col :md="8">
                <el-form-item label="Payment Amount">
                  <el-input type="number" v-model="form.pament_info.payment_amount" :value="total_cost">
                    <template slot="prepend">$</template>
                  </el-input>
                </el-form-item>
              </el-col>
              <el-col :md="4">
                <el-form-item label=" ">
                  <el-button size="small" type="primary" @click="paidFull">Paid In Full</el-button>
                </el-form-item>
              </el-col>
            </el-row>
          </div>
        </template>

        <template v-if="form.product_id !=''">
          <div>
            <el-switch
              style="display: block"
              v-model="form.has_lab_results"
              inactive-text="Lab Results"
            ></el-switch>

            <el-card style="margin-top:10px;" v-if="form.has_lab_results">
              <el-form-item>
                <el-col :md="6">
                  <el-form-item label="Lab">
                    <el-select v-model="formLab.lab_id" placeholder="please select lab">
                      <el-option
                        v-for="lab in labs"
                        :key="lab.id"
                        :label="lab.name"
                        :value="lab.id"
                      ></el-option>
                    </el-select>
                  </el-form-item>
                </el-col>

                <el-col :md="11">
                  <el-form-item label="Test Date">
                    <el-date-picker
                      v-model="formLab.test_date"
                      type="datetime"
                      placeholder="Select date and time"
                    ></el-date-picker>
                  </el-form-item>
                </el-col>
              </el-form-item>

              <el-row :gutter="10">
                <el-col :md="6">
                  <el-form-item label="Measurement">
                    <el-radio-group v-model="formLab.lab_mesurement" size="medium">
                      <el-radio-button label="%"></el-radio-button>
                      <el-radio-button label="Mg"></el-radio-button>
                    </el-radio-group>
                  </el-form-item>
                </el-col>

                <el-col :span="3">
                  <el-form-item label="Indica">
                    <el-input v-model="formLab.indica" type="number" style="padding-top:18px;"></el-input>
                  </el-form-item>
                </el-col>

                <el-col :span="3">
                  <el-form-item label="Sativa">
                    <el-input v-model="formLab.sativa" type="number" style="padding-top:18px;"></el-input>
                  </el-form-item>
                </el-col>

                <el-col :span="3">
                  <el-form-item label="THC">
                    <el-input v-model="formLab.thc" type="number" style="padding-top:18px;"></el-input>
                  </el-form-item>
                </el-col>
                <el-col :span="3">
                  <el-form-item label="CBD">
                    <el-input v-model="formLab.cbd" type="number" style="padding-top:18px;"></el-input>
                  </el-form-item>
                </el-col>

                <el-col :span="3">
                  <el-form-item label="CBN">
                    <el-input v-model="formLab.cbn" type="number" style="padding-top:18px;"></el-input>
                  </el-form-item>
                </el-col>
              </el-row>
            </el-card>

            <el-form-item label="Note">
              <el-input v-model="form.note" type="textarea"></el-input>
            </el-form-item>
          </div>
        </template>
      </el-form>

      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogCheckIn = false">Cancel</el-button>
        <el-button type="primary" @click="confirm">Continue</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<style scoped>
.content {
  margin-top: 100px;
  margin-left: 20px;
  margin-right: 20px;
}
.convert {
  margin-top: 12px;
  font-size: 12px;
}
</style>

<script>
export default {
  data() {
    return {
      products: [],
      vendors: [],
      labs: [],
      product: {},
      vendor:{},
      dialogCheckIn: false,
      dialogConfirmation:false,
      price_measurement: '',

      form: {
        product_id: '',
        vendor_id: '',
        branch_id: '',
        batch_id: '',
        date: null,
        uid: '',
        has_lab_results: false,
        harvest_date: '',
            jar_g: 0,
          one_g: 0,
          eight_oz: 0,
          fourth_oz: 0,
          half_oz: 0,
          one_oz: 0,
          total_weight: 0,
          cost_per_gram: 0,
          cost_per_piece: 0,
          total_quantity: 0,
         
        total_cost: 0,
         note: '',
        pament_info:{
          account_id: null,
          check_in_product_id:0,
          payment_amount: 0,
        },
       

      },
      formLab: {
        product_id: 0,
        lab_id: null,
        test_date: '',
        cbn: '',
        cbd: '',
        thc: '',
        sativa: '',
        indica: '',
        lab_mesurement: '%'
      }
    }
  },
  created() {
    axios.get('/api/catalog/product').then(res => {
      console.log(res.data)
      this.products = res.data
    })

    axios.get('/api/catalog/lab')
      .then(response => {
        this.labs = response.data
        console.log(response)
      })
      .catch(error => {
        console.log(error)
      })

    axios.get('/api/catalog/vendor').then(res => {
      this.vendors = res.data
    })
    let date = new Date()
    this.form.date = date.toString()

    console.log(`naka abot ${this.form.date}`)
  },
  computed: {
    getVendorName:function()
    {
      let vendor=this.vendors.filter(el=> el.id==this.form.vendor_id)
      vendor.forEach(e=>{
        this.vendor=e
      })
     return this.vendor
     
    },
    getBranch_name:function(){
      if(this.form.branch_id==1){
        return "Amsterdam Gardens"
      }
      else if(this.form.branch_id==2){
         return "Indica Online"
      }
       else if(this.form.branch_id==3){
         return "Medibook"
      }
       else{
         return "Billing"
      }
    },
        getAccount_name:function(){
      if(this.form.account_id==1){
        return "ZTEGRITYBANK ($10,000,000,272,564,224.00)"
      }
      else if(this.form.account_id==2){
         return "Universal Credit Card ($88,599,127,130,112.00)"
      }
       else if(this.form.account_id==3){
         return "Urban Leaf ($85,764,322,885,632.00)"
      }
       else if(this.form.account_id==4){
         return "Stripe ($500,000,094,158,848.00)"
      }
       else{
         return "Quincy And Priscilla Adams ($125,800,011,530,240.00)"
      }
    },
       
    one_g_cal: function() {
      return this.form.one_g * 1
    },
    eigth_oz_to_g: function() {
      console.log(this.form.eight_oz)
      return this.form.eight_oz * 4
    },
    fourth_oz_to_g: function() {
      return this.form.fourth_oz * 7
    },
    half_oz_to_g: function() {
      return this.form.half_oz * 14
    },
    one_oz_to_g: function() {
      return this.form.one_oz * 28
    },
    total_weight: function() {
      let one_oz = this.form.one_oz * 28
      let half_oz = this.form.half_oz * 14
      let fouth_oz = this.form.fourth_oz * 7
      let eigth_oz = this.form.eight_oz * 4
      let one_g = this.form.one_g
      let jar_g = this.form.jar_g

      this.form.total_weight =
        parseFloat(one_oz) +
        parseFloat(half_oz) +
        parseFloat(fouth_oz) +
        parseFloat(eigth_oz) +
        parseFloat(one_g) +
        parseFloat(jar_g)

      return (
        parseFloat(one_oz) +
        parseFloat(half_oz) +
        parseFloat(fouth_oz) +
        parseFloat(eigth_oz) +
        parseFloat(one_g) +
        parseFloat(jar_g)
      )
    },
    total_cost: function() {
      this.form.total_cost =
        parseFloat(this.form.total_weight) *
        parseFloat(this.form.cost_per_gram)
      return (
        parseFloat(this.form.total_weight) *
        parseFloat(this.form.cost_per_gram)
      )
    },

    total_cost_per_piece: function() {
      this.form.total_cost =
        parseFloat(this.form.total_quantity) *
        parseFloat(this.form.cost_per_piece)
      return (
        parseFloat(this.form.total_quantity) *
        parseFloat(this.form.cost_per_piece)
      )
    },
    total_cost_weight_range() {
      this.form.total_cost =
        parseFloat(this.form.total_quantity) *
        parseFloat(this.form.cost_per_piece)
      return (
        parseFloat(this.form.total_quantity) *
        parseFloat(this.form.cost_per_gram)
      )
    }
  },
  methods: {
    cancelConfirmation(){
      this.dialogConfirmation = false 
      this.dialogCheckIn=true
    },
    confirmCheckIn()
    {
      axios.post('/api/catalog/product/checkin/create',this.form)
          .then(res=>{
                this.$notify({
          title: 'Success',
          message: 'Check In Successfully',
          position: 'top-left',
          type:'success'
        });

        this.price_measurement = ''

     this.form= {
        product_id: '',
        vendor_id: '',
        branch_id: '',
        batch_id: '',
        date: null,
        uid: '',
        has_lab_results: false,
        harvest_date: '',
            jar_g: 0,
          one_g: 0,
          eight_oz: 0,
          fourth_oz: 0,
          half_oz: 0,
          one_oz: 0,
          total_weight: 0,
          cost_per_gram: 0,
          cost_per_piece: 0,
          total_quantity: 0,
         
        total_cost: 0,
         note: '',
        pament_info:{
          account_id: null,
          payment_amount: 0,
        },
       

      }
          this.formLab = {
            product_id: 0,
            lab_id: null,
            test_date: '',
            cbn: '',
            cbd: '',
            thc: '',
            sativa: '',
            indica: '',
            lab_mesurement: '%'
          }

        this.form.pament_info.check_in_product_id=res.data.id
          axios.post('/api/catalog/product/checkinpayment/create',this.form.pament_info)
          .then(res=>{
            console.log(res)
            console.log('nka abot dri a')
          }).catch(err=>{
            console.log(err)
            console.log('ne error oh')
          })

          }).catch(err=>{
            console.log(err)
          })

      this.dialogConfirmation = false 
      

    },
    confirm(){

      if(this.form.product_id==''){
        this.$notify({
          title: 'Warning',
          message: 'Product is required',
          position: 'top-left',
          type:'warning'
        });
      }
      else if(this.form.vendor_id==''){
        this.$notify({
          title: 'Warning',
          message: 'vendor  is required',
          position: 'top-left',
          type:'warning'
        });
      }

      else if(this.form.branch_id==''){
         this.$notify({
          title: 'Warning',
          message: 'check in to  is required',
          position: 'top-left',
          type:'warning'
        });
      
      }

      else{
      console.log('nka abot')
      this.dialogCheckIn=false
      this.dialogConfirmation=true
      }

    },
    clearData(done) {
      this.$confirm('Are you sure to close this dialog?')
        .then(_ => {
          this.product = {}

          this.price_measurement = ''

     this.form= {
        product_id: '',
        vendor_id: '',
        branch_id: '',
        batch_id: '',
        date: null,
        uid: '',
        has_lab_results: false,
        harvest_date: '',
            jar_g: 0,
          one_g: 0,
          eight_oz: 0,
          fourth_oz: 0,
          half_oz: 0,
          one_oz: 0,
          total_weight: 0,
          cost_per_gram: 0,
          cost_per_piece: 0,
          total_quantity: 0,
         
        total_cost: 0,
         note: '',
        pament_info:{
          account_id: null,
          payment_amount: 0,
        },
       

      }
          this.formLab = {
            product_id: 0,
            lab_id: null,
            test_date: '',
            cbn: '',
            cbd: '',
            thc: '',
            sativa: '',
            indica: '',
            lab_mesurement: '%'
          }
          done()
        })
        .catch(_ => {})
    },

    paidFull() {
      console.log('ni abot')
      this.form.pament_info.payment_amount = this.form.total_cost
    },

    getProductSelected() {
      console.log(this.form.product_id)
      this.form.total_quantity = 0
      this.form.cost_per_piece = 0
      this.form.total_weight = 0
      this.form.cost_per_gram = 0
      this.form.total_weight = 0
      this.form.cost_per_gram = 0
      this.form.total_cost = 0
      this.form.account_id = null
      this.form.payment_amount = 0

      this.formLab = {
        product_id: 0,
        lab_id: null,
        test_date: '',
        cbn: '',
        cbd: '',
        thc: '',
        sativa: '',
        indica: '',
        lab_mesurement: '%'
      }

      this.products.forEach(e => {
        console.log(e.price_measurement)
        if (this.form.product_id == e.id) {
          this.price_measurement = e.price_measurement
          console.log(e.price_measurement)
        }
      })

      axios.get(`/api/catalog/product/view/${this.form.product_id}`)
        .then(res => {
          this.product = res.data
          if (res.data.is_lab_results == 1) {
            this.form.has_lab_results = true
          } else {
            this.form.has_lab_results = false
          }

          res.data.lab_results.forEach(e => {
            this.formLab = {
              id: e.id,
              test_date: e.test_date,
              product_id: e.product_id,
              lab_id: e.lab_id,
              cbn: e.cbn,
              cbd: e.cbd,
              thc: e.thc,
              sativa: e.sativa,
              indica: e.indica,
              lab_mesurement: e.lab_mesurement
            }
          })

          console.log(this.form.formLab)
        })
    }
  }
}
</script>


