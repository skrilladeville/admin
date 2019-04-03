<template>
  <div>
      <router-view/>
      
    <v-layout row>
        
            <v-dialog v-model="tenderCash" persistent max-width="700">
 
         
            
           

             <v-flex md12>
                <v-card  class="text--white" height="540" >
        
                <v-layout  row wrap mr-1 ml-1>
                  <v-flex  m12 pb-0>
                  
                     <v-container fluid grid-list-sm>
                    <v-layout    class="white--text" pa-0 ma-0 row wrap>
                        <v-flex md12  class="rounded-div">
                        <div id="calculator">

  <input type="string" class="calculator-input" v-model="value" @keyup.enter="getResult()">


  <div class="calculator-row">
    <div class="calculator-col">
      <button class="calculator-btn" @click="addExpresion(1)">1</button>
    </div>
    <div class="calculator-col">
      <button class="calculator-btn" @click="addExpresion(2)">3</button>
    </div>
    <div class="calculator-col">
      <button class="calculator-btn" @click="addExpresion(3)">3</button>
    </div>
  </div>
  <div class="calculator-row">
    <div class="calculator-col">
      <button class="calculator-btn" @click="addExpresion(4)">4</button>
    </div>
    <div class="calculator-col">
      <button class="calculator-btn" @click="addExpresion(5)">5</button>
    </div>
    <div class="calculator-col">
      <button class="calculator-btn" @click="addExpresion(6)">6</button>
    </div>

  </div>
  <div class="calculator-row">
    <div class="calculator-col">
      <button class="calculator-btn" @click="addExpresion(7)">7</button>
    </div>
    <div class="calculator-col">
      <button class="calculator-btn" @click="addExpresion(8)">8</button>
    </div>
    <div class="calculator-col">
      <button class="calculator-btn" @click="addExpresion(9)">9</button>
    </div>
  </div>
    <div class="calculator-row">
    <div class="calculator-col">
      <button class="calculator-btn" @click="addExpresion(0)">0</button>
    </div>
    <div class="calculator-col">
      <button class="calculator-btn" @click="addExpresion(100)">100</button>
    </div>
    <div class="calculator-col">
      <button class="calculator-btn" @click="addExpresion(200)">200</button>
    </div>
  </div>
  <div class="calculator-row">
    <div class="calculator-col">
      <button class="calculator-btn" @click="addExpresion(500)">500</button>
    </div>
    <div class="calculator-col">
      <button class="calculator-btn" @click="addExpresion('.')">.</button>
    </div>
    <div class="calculator-col">
      <button class="calculator-btn del" @click="del">del</button>
    </div>
  </div>

</div>
      <v-layout row wrap>
              <v-flex md12>
                <v-card height="120">
                 
                          <v-layout row wrap ml-3 pa-2>
               <v-flex md8><h6>Total Due</h6></v-flex>
        <v-flex md4><h5><b>{{(total).toFixed(2)}}</b></h5></v-flex> 
                      <v-flex md8><h6>Amount tenderCash</h6></v-flex>
        <v-flex md4><h5><b>{{value}}</b></h5></v-flex> 
                            <v-flex md8><h6>Change</h6></v-flex>
        <v-flex md4><h5><b>{{(value-total).toFixed(2)}}</b></h5></v-flex> 
              
      </v-layout>
    
     
      <v-btn block style="color:white !important;" @click="tenderCashAndPrintReciept" color="success">Tender Cash</v-btn>
           
       

                </v-card>
  

              </v-flex>
      
            </v-layout>
</v-flex>
</v-layout>
</v-container>
</v-flex>
</v-layout>
        
                
                </v-card>

  

             </v-flex>

      
            </v-dialog>
    
      <v-flex md6 pt-5 mr-3>
        <v-card height="400" >
          <v-layout row ml-2 mr-2 pa-2 justify-space-between>
            <v-flex xs2>
              <v-btn outline color="indigo">Add</v-btn>
            </v-flex>
            <v-flex xs4>
              <el-input v-model="product_query" placeholder="Type product" prefix-icon="el-icon-search"></el-input>
            </v-flex>
          </v-layout>

          <hr style="margin: 0px 0px;">
<template v-if="has_prod_emp">
    <br><br><br>
<v-alert
      :value="true"
      color="info"
      icon="info"

      outline
    >
      No products found
    </v-alert>
</template>


          


 
          <v-layout row pa-2 ml-2 mr-2 wrap id="style-5" style="height:330px; max-height:330px; overflow-y:scroll;">
            <v-flex md3  pa-1 v-for="(prod, index) in products_computed" :key="index">
              <v-card hover @click="addProd(index)" raised class="rounded-card">
                <v-img class="white--text" height="80px" :src="`/uploadedImages/${prod.image}`">
                  <v-container fill-height fluid>
                    <v-layout fill-height></v-layout>
                  </v-container>
                </v-img>

                <v-card-title>
                  <v-layout row>
                    <v-flex md12>
                      <span class="success--text ml-3">
                        <b>{{prod.name}}</b>
                      </span>
                    </v-flex>
                    <!-- <v-flex md6>
                      <span class="success--text mr-3" style="float:right;">
                        <b>{{prod.strain}}</b>
                      </span>
                    </v-flex> -->
                  </v-layout>
                </v-card-title>
                <v-card-title>
                  <div>
                    <template v-if="prod.price_measurement=='Weight'">
                      <span>For Low As ${{prod.prices[0].gram_price}}</span>
                    
                    </template>
                    <template v-if="prod.price_measurement=='Weight Range'">
                      <span>
                        For Low As $ {{Math.min.apply(Math, prod.prices.map(function (o) {
                        return o.price_per_gram;
                        }))}} 
                      </span>
                      
                    </template>
                    <template v-if="prod.price_measurement=='Per Unit Range'">
                      <span>
                        For Low As $ {{Math.min.apply(Math, prod.prices.map(function (o) {
                        return o.piece_price/o.count;
                        }))}}
                      </span>
                      
                    </template>
                    <template v-if="prod.price_measurement=='Per Unit'">
                      <span>Price $ {{prod.prices[0].piece_price}}</span>
                      
                    </template>
                  </div>
                </v-card-title>
             
              </v-card>
            </v-flex>
          </v-layout>
       
        </v-card>

        <v-layout row pt-1 ml-1 mr-1 wrap>
               <v-flex sm3 pa-1 >
                <v-card height="60" @click="setAll" style="background: linear-gradient(#26c6da, #90caf9);"
                      hover raised class="rounded-card white--text">
                               <v-card-title><span>all</span></v-card-title>
                      </v-card>
            </v-flex>
            <v-flex sm3 pa-1 v-for="(cat,index) in categories" :key="index">
                <v-card height="60" @click="finbyCategory(cat.id)" style="background: linear-gradient(#26c6da, #90caf9);"
                      hover raised class="rounded-card white--text">
                               <v-card-title><span>{{cat.name}}</span></v-card-title>
                      </v-card>
            </v-flex>
              
            
        </v-layout>
      </v-flex>

      

      <v-flex md6 pt-5>
        <v-card height="540">
          <v-card-title>
            <el-input @keyup.enter.native="addProductbyBarcode()" v-model="barcode"    prefix-icon="el-icon-tickets" placeholder="Scan Barcode"></el-input>
          </v-card-title>
     
          <hr>

          <v-layout mr-2 ml-2 row wrap style="height:220px; max-height:220px; overflow-y:scroll;">
            <v-flex md12>
 
                <el-table
      :data="addProducts"
 highlight-current-row
    @current-change="handleCurrentChange"
      style="width: 100%">
    <el-table-column
      type="index"
      width="50">
    </el-table-column>
      <el-table-column
        prop="product"
        label="product"
        width="160">
      </el-table-column>
      <el-table-column
        prop="qty"
        label="qty"
        width="80">
      </el-table-column>
      <el-table-column
        prop="price"
        label="price">
      </el-table-column>
          <el-table-column
        prop="amount"
        label="amount">
      </el-table-column>
    </el-table>

    </v-flex>
  </v-layout>
  <v-layout ml-2 mr-2 row wrap>
    <v-flex ma-2 md12>
      <v-card height="150">
      <v-layout row wrap ml-3 pa-2>
               <v-flex md8><h6>Sub Total</h6></v-flex>
        <v-flex md4><h6>{{(total-taxtotal).toFixed(2)}}</h6></v-flex> 
                      <v-flex md8><h6>Discount</h6></v-flex>
        <v-flex md4><h6>0.00</h6></v-flex> 
                            <v-flex md8><h6>Tax</h6></v-flex>
        <v-flex md4><h6>{{taxtotal.toFixed(2)}}</h6></v-flex> 
                            <v-flex md8><h6>Grand Total</h6></v-flex>
        <v-flex md4><h6>{{total.toFixed(2)}}</h6></v-flex> 
      </v-layout>

  

      </v-card>

    </v-flex>
    <v-flex md3>
  <v-btn color="warning" style="color:white !important;" mr-2 block @click="dialogVoidLine=true">F4-Void Line</v-btn>
  </v-flex>
        <v-flex md3>
  <v-btn color="success" dark  block style="color:white !important;" @click="dialogCancelTrans=true">F5-Void Transaction</v-btn>
  </v-flex>
      <v-flex md3>
  <v-btn color="error" dark @click="tenderCash=true" block style="color:white !important;">F6-Cash</v-btn>
  </v-flex>
     <v-flex md3>
  <v-btn color="primary" @click="dialogCard=true" dark block style="color:white !important;">F7-Credit/Debit Card</v-btn>
  </v-flex>

   </v-layout>       
        </v-card>
        
      </v-flex>
    </v-layout>

<v-layout row justify-center>


    <v-dialog
    persistent 
      v-model="dialogAdd"
      max-width="500"
    >
      <v-card>
        <v-card-title class="headline">Add Product</v-card-title>
        <v-layout pa-3 wrap>
      <!-- <v-flex><h5>{{product.name}}</h5></v-flex> -->
      
      <template v-if="product.price_measurement=='Weight'">
        <v-flex sm6>
          <el-select v-model="weight_selected" placeholder="select weight"  style="width:100%; margin-bottom:10px;">
              <el-option label="1g" value="1g"></el-option>
                 <el-option label="1/8oz" value="1/8oz"></el-option>
                    <el-option label="1/4oz" value="1/4oz"></el-option>
                       <el-option label="1/2oz" value="1/2oz"></el-option>
                    <el-option label="1oz" value="1oz"></el-option>
                    <el-option label="pre-roll" value="pre-roll"></el-option>
            </el-select>
           
              </v-flex>
                   <v-flex sm6>
                    <el-input v-model="count" style="width:100px;" placeholder="count"  type="number"></el-input>
            </v-flex>
              <v-flex sm12 mt-2> <h3>${{price_weight_selected}}</h3> </v-flex>
       
              
      </template>
      <template v-if="product.price_measurement=='Weight Range'">
          <v-flex sm12>
            <h5>Weight in Grams</h5>
      <el-input-number style="width:100%;" v-model="count" controls-position="right" @change="changeWeight"></el-input-number>
        
        </v-flex>
     
          <v-flex sm12 mt-2> <h3>price ${{price}}</h3> </v-flex> 
      </template>
      

       <template v-if="product.price_measurement=='Per Unit Range'">
          <v-flex sm12>
          <h5>Count</h5>
      <el-input-number v-model="count" style="width:100%;"  controls-position="right" @change="changeCount"></el-input-number>
        
        </v-flex>
     
          <v-flex sm12 mt-2> <h3>price ${{price}}</h3> </v-flex> 
      </template>

         <template v-if="product.price_measurement=='Per Unit'">
          <v-flex sm12>
          <h5>Count</h5>
      <el-input-number v-model="count" style="width:100%;"  controls-position="right" @change="changeCount"></el-input-number>
        
        </v-flex>
     
          <v-flex sm12 mt-2> <h3>price ${{price}}</h3> </v-flex> 
      </template>


        </v-layout>
    

      

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="green darken-1"
            flat="flat"
            @click="cancel"
          >
            cancel
          </v-btn>

          <v-btn
            color="green darken-1"
            flat="flat"
            @click="addProduct"
          >
            add
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-layout>
<v-layout row justify-center>
  <v-dialog v-model="dialogCard" max-width="400">
    <v-card>

      <v-card-title>Card Transaction</v-card-title>
  <v-card-text>


        <el-form label-position="top" size="small" :model="formcard" status-icon  ref="formcard" label-width="120px" class="demo-ruleForm">
  <el-form-item  label="Card Number">
    <el-input type="tel" id="cardNumber" v-model="formcard.cardnumber" autocomplete="off"></el-input>
  </el-form-item>
  <el-form-item label="Card Holder Name">
    <el-input type="text" id="cardholderName" v-model="formcard.cardholdername" autocomplete="off"></el-input>
  </el-form-item>
  <el-form-item label="Expiry">
<el-row :gutter="5">
  <el-col :md="12">
  <el-input  type="tel" id="expiryDateMM" v-model="formcard.expirydatemm" placeholder="MM" ></el-input><br><br>
    </el-col>
        <el-col :md="12">
  <el-input    type="tel" id="expiryDateYY" v-model="formcard.expirydateyy" placeholder="YY"></el-input>
  </el-col>
</el-row>
  </el-form-item>
  <el-form-item label="Security Code">
     <el-input  type="tel" id="cvn" v-model="formcard.cvn"></el-input>
    </el-form-item>
  <el-form-item>
    <v-btn color="primary" style="color:white !important;" @click="validate" block>Pay</v-btn>

  </el-form-item>
</el-form>
        </v-card-text>
    </v-card>
    

  </v-dialog>

</v-layout>

<v-layout row justify-center>
    <v-dialog v-model="dialogVoidLine" persistent max-width="350">

      <v-card>
        <v-card-title class="headline">Branch Admin User</v-card-title>
        <v-card-text>  <el-input type="email" placeholder="email here"></el-input>
        
        <el-input type="password"  placeholder="password here"></el-input></v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" flat @click="dialogVoidLine = false">Cancel</v-btn>
          <v-btn color="green darken-1" flat @click="voidline">Done</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-layout>

  <v-layout row justify-center>
    <v-dialog v-model="dialogCancelTrans" persistent max-width="350">

      <v-card>
        <v-card-title class="headline">Branch Admin User</v-card-title>
        <v-card-text>  <el-input type="email" placeholder="email here"></el-input>
        
        <el-input type="password"  placeholder="password here"></el-input></v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" flat @click="dialogCancelTrans = false">Cancel</v-btn>
          <v-btn color="green darken-1" flat @click="canceltrans">Done</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-layout>

  </div>
</template>

<style scoped>

.el-form-item--mini.el-form-item, .el-form-item--small.el-form-item {
    margin-bottom: 0px;
}

*, ::after, ::before {
  box-sizing: border-box;
}

body {
  margin: 0;
  height: 100vh;
  display: flex;
  font-size: 10px;
  align-items: flex-end;
  justify-content: center;
  background-color: #2f2f31;
}

#calculator {
  width: 100%;
  margin: 0 auto;
  display: flex;
  padding: 5px;

 
  flex-direction: column;
  background-color: #2f2f31;
}

#calculator .calculator-input {
  color: #D4D4D2;
  width: 100%;
  border: none;
  padding: .8rem;
  display: block;
  font-size: 2.4rem;
  background: none;
  text-align: right;
  font-weight: lighter;
}
#calculator .calculator-input:focus, #calculator .calculator-input:active {
  outline: none;
}
#calculator .calculator-row {
  display: flex;
  padding: 0;
  justify-content: space-around;
}
#calculator .calculator-row .calculator-col {
  flex: 1;
  box-shadow: 0 0 0 1px #2f2f31;
}
#calculator .calculator-row .calculator-col.wide {
  flex: 2;
}
#calculator .calculator-btn {
  width: 100%;
  color: #D4D4D2;
  border: none;
  cursor: pointer;
  padding: .8rem;
  outline: none;
  font-size: 1.6rem;
  transition: all .3s ease-in-out;
  font-weight: 200;
  justify-content: center;
  background-color: #616163;
}
#calculator .calculator-btn.accent {
  background-color: #f49e3f;
  color: #fff;
}
#calculator .calculator-btn.gray {
  background-color: #424345;
}
#calculator .calculator-btn:active {
  background-color: #2f2f31;
}

#calculator .calculator-btn.del{
    background-color: #d36a14;
    
}

#calculator .calculator-btn.del:active{
    background-color: #703a0e;

}





.rounded-card{
    border-radius:5px;
    border-color: blueviolet;
    
    
}
.rounded-div{
    border-radius:10px;
    border-color: blueviolet !important;
    
    
}

.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}


#style-5::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

#style-5::-webkit-scrollbar
{
	width: 10px;
	background-color: #F5F5F5;
}

#style-5::-webkit-scrollbar-thumb
{
	background-color: #0ae;
	
	background-image: -webkit-gradient(linear, 0 0, 0 100%,
	                   color-stop(.5, rgba(255, 255, 255, .2)),
					   color-stop(.5, transparent), to(transparent));
}
</style>

<script>
import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.vfs = pdfFonts.pdfMake.vfs;
//import * as rpx  from "rpx.js"
//resources\js\utils\rpx.js

export default {

  data() {
    return {
      dialogCard:false,
      formcard:{cardnumber:'',
    cardholdername:'',
    expirydatemm:'',
    expirydateyy:'',
    cvn:'',
    amount:0},
      tenderCash:false,
      dialogAdd:false,
      products: [],
      product_query:'',
      has_prod_emp:false,
      product:{name:'',prices:[],price_measurement:''},
      weight:'',
      weight_selected:'',
      price:'',
      count:'',
      addProducts:[],
      value:0,
      categories:[],
      category_id:'',
      barcodes:[],
      barcode:'',
      dialogVoidLine:false,
      dialogCancelTrans:false,
       currentRow: null,
       payment_method:'',
        activeIndex: -1,
        order:{},
    
        payment_methods:[]
        }


  },
  mounted(){
     const rpx = document.createElement("script");
    rpx.setAttribute(
      "src",
      "/js/rpx.js"
    );
    rpx.async = true;
    document.head.appendChild(rpx);

    axios.get('/api/sales/transaction/show/'+this.$route.params.transid).then(res=>{
        if(res.data.status==2){
            this.$router.push('/pos/terminal/'+this.$route.params.terminalId)
            	this.$noty.error('Void transaction'); 
        }
    })

  },
  created() {

    axios.get('/api/sales/paymentMethod/all').then(res=>{
      this.payment_methods=res.data
    })

    axios.get('/api/sales/order/show/'+this.$route.params.orderid).then(res=>{
     this.order=res.data 
     console.log(res.data)

    axios.get('/api/sales/orderItem/byOrder/'+this.order.id).then(res=>{
      console.log("naa ra"+res.data)
      res.data.forEach(el=>{
          this.addProducts.push({id:el.id,product_id:el.product_id,product:el.product_name,price:el.price,qty:el.qty,amount:el.price* el.qty,tax:el.tax})
      })
    }).catch(err=>console.log("error"+err))
    })
    axios.get('/api/catalog/product/barcode/all').then(res=>{
      this.barcodes=res.data
      console.log(res.data)
    })
    axios.get('/api/catalog/category/all').then(res=>{
      this.categories=res.data
    })
    axios.get('/api/catalog/product').then(res => {
      this.products = res.data

            this.products.forEach(e=>{
              e.prices.forEach(el=>{
          el.price_per_gram=el.range_price/el.to
          el.price_per_unit=el.piece_price/el.count
      })
            })
      console.log(this.products)
    })


     window.addEventListener('keydown', (e) => {
      if (e.key == 'Escape') {
        this.tenderCash = false
      }
    });
         window.addEventListener('keydown', (e) => {
      if (e.key == 'F4') {
       this.dialogVoidLine = true
      }
    });
    
  },
  methods:{

RealexRemote() {

    'use strict';

    /*
     * Validate Card Number. Returns true if card number valid. Only allows
     * non-empty numeric values between 12 and 19 characters. A Luhn check is
     * also run against the card number.
     */
    var validateCardNumber = function(cardNumber) {
        // test numeric and length between 12 and 19
        if (!/^\d{12,19}$/.test(cardNumber)) {
            return false;
        }

        // luhn check
        var sum = 0;
        var digit = 0;
        var addend = 0;
        var timesTwo = false;

        for (var i = cardNumber.length - 1; i >= 0; i--) {
            digit = parseInt(cardNumber.substring(i, i + 1), 10);
            if (timesTwo) {
                addend = digit * 2;
                if (addend > 9) {
                    addend -= 9;
                }
            } else {
                addend = digit;
            }
            sum += addend;
            timesTwo = !timesTwo;
        }

        var modulus = sum % 10;
        if (modulus !== 0) {
            return false;
        }

        return true;
    };

    /*
     * Validate Card Holder Name. Returns true if card holder valid. Only allows
     * non-empty ISO/IEC 8859-1 values 100 characters or less.
     */
    var validateCardHolderName = function(cardHolderName) {
        // test for undefined
        if (!cardHolderName) {
            return false;
        }

        // test white space only
        if (!cardHolderName.trim()) {
            return false;
        }

        // test ISO/IEC 8859-1 characters between 1 and 100
        if (!/^[\u0020-\u007E\u00A0-\u00FF]{1,100}$/.test(cardHolderName)) {
            return false;
        }

        return true;
    };

    /*
     * Validate CVN. Applies to non-Amex card types. Only allows 3 numeric
     * characters.
     */
    var validateCvn = function(cvn) {
        // test numeric length 3
        if (!/^\d{3}$/.test(cvn)) {
            return false;
        }

        return true;
    };

    /*
     * Validate Amex CVN. Applies to Amex card types. Only allows 4 numeric
     * characters.
     */
    var validateAmexCvn = function(cvn) {
        // test numeric length 4
        if (!/^\d{4}$/.test(cvn)) {
            return false;
        }

        return true;
    };

    /*
     * Validate Expiry Date Format. Only allows 4 numeric characters. Month must
     * be between 1 and 12.
     */
    var validateExpiryDateFormat = function(expiryDate) {

        // test numeric of length 4
        if (!/^\d{4}$/.test(expiryDate)) {
            return false;
        }

        var month = parseInt(expiryDate.substring(0, 2), 10);
        var year = parseInt(expiryDate.substring(2, 4), 10);

        // test month range is 1-12
        if (month < 1 || month > 12) {
            return false;
        }

        return true;
    };

    /*
     * Validate Expiry Date Not In Past. Also runs checks from
     * validateExpiryDateFormat.
     */
    var validateExpiryDateNotInPast = function(expiryDate) {
        // test valid format
        if (!validateExpiryDateFormat(expiryDate)) {
            return false;
        }

        var month = parseInt(expiryDate.substring(0, 2), 10);
        var year = parseInt(expiryDate.substring(2, 4), 10);

        // test date is not in the past
        var now = new Date();
        var currentMonth = now.getMonth() + 1;
        var currentYear = now.getFullYear();
        if (year < (currentYear % 100)) {
            return false;
        } else if (year === (currentYear % 100) && month < currentMonth) {
            return false;
        }

        return true;
    };

    return {
        validateCardNumber : validateCardNumber,
        validateCardHolderName : validateCardHolderName,
        validateCvn : validateCvn,
        validateAmexCvn : validateAmexCvn,
        validateExpiryDateFormat : validateExpiryDateFormat,
        validateExpiryDateNotInPast : validateExpiryDateNotInPast
    };
},


    validate(){

  var cardNumberCheck = this.RealexRemote().validateCardNumber(document.getElementById('cardNumber').value);
  var cardHolderNameCheck = this.RealexRemote().validateCardHolderName(document.getElementById('cardholderName').value);
  var expiryDate = document.getElementById('expiryDateMM').value.concat(document.getElementById('expiryDateYY').value);
  var expiryDateFormatCheck = this.RealexRemote().validateExpiryDateFormat(expiryDate);
  var expiryDatePastCheck = this.RealexRemote().validateExpiryDateNotInPast(expiryDate);
  if (document.getElementById('cardNumber').value.charAt(0) == "3") {
    var cvnCheck = this.RealexRemote().validateAmexCvn(document.getElementById('cvn').value);
  } else {
    var cvnCheck = this.RealexRemote().validateCvn(document.getElementById('cvn').value);
  }
  if (cardNumberCheck == false || cardHolderNameCheck == false || expiryDateFormatCheck == false || expiryDatePastCheck == false || cvnCheck == false) {
    // code here to inform the cardholder of an input error and prevent the form submitting
    
    alert('error')
  } else {
    this.formcard.amount=this.total
       axios.post('/api/globalpayments/pay',this.formcard).then(res=>{
        this.dialogCard=false
        	this.$noty.success('Successfully process the payments');
      })
  }
    },
    payCredit(){
   
    },
        finishCashTransaction(){

          //axios.post('/api/sales/payments/create',)
        },
        tenderCashAndPrintReciept: function () {

          // playground requires you to assign document definition to a variable called dd

          this.value=0
          this.tenderCash=true

let currentdate = new Date(); 
var date = currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/" 
                + currentdate.getFullYear()
var time =  currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds(); 
//var testImageDataUrl = 'data:image/png;base64,/images/indica_active.png'
var dd = {
  
  pageSize:{
		width: 100.28,
		height: 'auto'
  },
   pageMargins: [ 5, 5, 5, 5 ],
	content: [
    // 	{
		// 	image: 'indica_active.png',
	
		// },
{ text: 'Indica Online', fontSize: 8,alignment: 'center' },
{
  columns: [
				{
					width: 65,
          text: `TRANS NO: ${this.$route.params.transid}`,
          fontSize: 3
				},
				{
					width: "*",
          text: `DATE:${date}`,
          fontSize: 3 ,
          // alignment: 'right'
         
        },
        
      ]
},
{
  columns: [
				{
					width: 65,
          text: `ORDER NO: ${this.$route.params.orderid}`,
          fontSize: 3 
				},
				{
					width: "*",
          text: `TIME:${time}`,
          fontSize: 3 ,
          // alignment: 'right'
         
        },
        
      ]
},
{ text: '-----------------------------------------------------------------', fontSize: 5},
{
  columns: [
				{
					width: 5,
          text: '#',
          fontSize: 4 
				},
				{
					width: 45,
          text: 'item',
          fontSize: 4 
        },
        {
					width: 10,
          text: 'qty',
          fontSize: 4 
				},
				{
					width: '*',
          text: 'price',
          fontSize: 4,
          alignment: 'right'
        },
        	{
					width: '*',
          text: 'amount',
          fontSize: 4,
            alignment: 'right'
        
				}
			
			]
},
{ text: '-----------------------------------------------------------------', fontSize: 5},
],
styles: {

		style: {
      fontSize: 8,

		},
  },
  
  
	
}




this.addProducts.forEach((el, i)=>{
  
  dd.content.push({
    
  columns: [
				{
					width: 5,
          text: i+1,
          fontSize: 4 
				},
				{
					width: 45,
          text: el.product,
          fontSize: 4
        },
        	{
					width: 10,
          text: el.qty,
          fontSize: 4,
          alignment:'center'

				},
				{
					width: '*',
          text: (el.price).toFixed(2),
          fontSize: 4 ,
            alignment: 'right'
        },
        	{
					width: '*',
          text: (el.amount).toFixed(2),
          fontSize: 4,
            alignment: 'right'
        }]
      })
      
})

dd.content.push(
  [{ text: '-----------------------------------------------------------------', fontSize: 5},
  {
  columns: [
				{
					width: 50,
          text: 'Sub Total',
          fontSize: 5 ,
        alignment: 'left'
				},
				{
					width: "*",
          text: (this.total-this.taxtotal).toFixed(2),
          fontSize: 5 ,
           alignment: 'right'
         
        },
        
      ]
}, {
  columns: [
				{
					width: 50,
          text: 'Discount',
          fontSize: 5 ,
        alignment: 'left'
				},
				{
					width: "*",
          text:'0.00',
          fontSize: 5 ,
           alignment: 'right'
         
        },
        
      ]
},
{
  columns: [
				{
					width: 50,
          text: 'Tax',
          fontSize: 5 ,
        alignment: 'left'
				},
				{
					width: "*",
          text:(this.taxtotal).toFixed(2),
          fontSize: 5 ,
           alignment: 'right'
         
        },
        
      ]
},
{
  columns: [
				{
					width: 50,
          text: 'Total',
          fontSize: 5 ,
        alignment: 'left'
				},
				{
					width: "*",
          text:(this.total).toFixed(2),
          fontSize: 5 ,
           alignment: 'right'
         
        },
        
      ]
},
{ text: '-----------------------------------------------------------------', fontSize: 5},
{
  columns: [
				{
					width: 50,
          text: 'Amount tenderCash',
          fontSize: 5 ,
        alignment: 'left'
				},
				{
					width: "*",
          text:(this.value-0).toFixed(2),
          fontSize: 5 ,
           alignment: 'right'
         
        },
        
      ]
},
{
  columns: [
				{
					width: 50,
          text: 'Change',
          fontSize: 5 ,
        alignment: 'left'
				},
				{
					width: "*",
          text:(this.value-this.total).toFixed(2),
          fontSize: 5 ,
           alignment: 'right'
         
        },
        
      ]
},
{ text: '*****************************************', fontSize: 5},
{ text: 'Thank you for Shopping with Us', fontSize: 5, alignment:'center'},
{ text: '*****************************************', fontSize: 5},


  ]
)

    
    
      pdfMake.createPdf(dd).open();
    },


    getBase64FromImageUrl(url) {
      console.log('dsgsdg')
    // var img = new Image();

    // img.setAttribute('crossOrigin', 'anonymous');

    // img.onload = function () {
    //     var canvas = document.createElement("canvas");
    //     canvas.width =this.width;
    //     canvas.height =this.height;

    //     var ctx = canvas.getContext("2d");
    //     ctx.drawImage(this, 0, 0);

    //     var dataURL = canvas.toDataURL("image/png");

    //     alert(dataURL.replace(/^data:image\/(png|jpg);base64,/, ""));
    // };

    // img.src = url;
},

    addProductbyBarcode(){
      console.log('ni abot')
      var res = this.barcode.split("@")
      if(res.length==1){
      let prod=this.barcodes.find(el=>el.code == this.barcode)

      console.log(res)
      if(prod!=null){
      if(prod.product.price_measurement=='Weight'){
          console.log(prod.size)
          
        if(prod.size=='1g'){  
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product_id:p.id,product:`${prod.product.name} ${prod.size}`,price:p.prices[0].gram_price,qty:1,amount:p.prices[0].gram_price})
        }
        if(prod.size=='1/8oz'){
          console.log('naka abot pud')
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product_id:p.id,product:`${prod.product.name} ${prod.size}`,price:p.prices[0].eight_price,qty:1,amount:p.prices[0].eight_price})
        }
      if(prod.size=='1/4oz'){
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product_id:p.id,product:`${prod.product.name} ${prod.size}`,price:p.prices[0].quarter_price,qty:1,amount:p.prices[0].quarter_price})
        }
              if(prod.size=='1/2oz'){
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product_id:p.id,product:`${prod.product.name} ${prod.size}`,price:p.prices[0].half_price,qty:1,amount:p.prices[0].half_price})
        }

        if(prod.size=='1oz'){
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product_id:p.id,product:`${prod.product.name} ${prod.size}`,price:p.prices[0].half_price,qty:1,amount:p.prices[0].ounce_price})
        }
        
        if(prod.size=='pre-roll'){
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product_id:p.id,product:`${prod.product.name} ${prod.size}`,price:p.prices[0].joint_price,qty:1,amount:p.prices[0].joint_price})
        }
        

      }
        
      }
      }else{

        let prod=this.barcodes.find(el=>el.code == res[0])

      console.log(res)
      if(prod!=null){
      if(prod.product.price_measurement=='Weight'){
          console.log(prod.size)
          
        if(prod.size=='1g'){
          
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product_id:p.id,product:`${prod.product.name} ${prod.size}`,price:p.prices[0].gram_price,qty:res[1],amount:p.prices[0].gram_price * res[1]})
        }
        if(prod.size=='1/8oz'){
          console.log('naka abot pud')
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product_id:p.id,product:`${prod.product.name} ${prod.size}`,price:p.prices[0].eight_price,qty
          :res[1],amount:p.prices[0].eight_price * res[1]})
        }
      if(prod.size=='1/4oz'){
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product_id:p.id,product:`${prod.product.name} ${prod.size}`,price:p.prices[0].quarter_price,qty:res[1],amount:p.prices[0].quarter_price * res[1]})
        }
              if(prod.size=='1/2oz'){
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product_id:p.id,product:`${prod.product.name} ${prod.size}`,price:p.prices[0].half_price,qty:res[1],amount:p.prices[0].half_price * res[1]})
        }

        if(prod.size=='1oz'){
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product_id:p.id,product:`${prod.product.name} ${prod.size}`,price:p.prices[0].half_price,qty:res[1],amount:p.prices[0].ounce_price * res[1]})
        }
        
        if(prod.size=='pre-roll'){
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product_id:p.id,product:`${prod.product.name} ${prod.size}`,price:p.prices[0].joint_price,qty:res[1],amount:p.prices[0].joint_price * res[1]})
        }
      }
      }
      }



    },
      handleCurrentChange(val) {
        this.currentRow = val;
         this.activeIndex = this.addProducts.indexOf(val);
         
      },
    setAll(){
      this.category_id=''
      this.product_query=''
    },
    finbyCategory(id){
      this.product_query=''
this.category_id=id
    },
        addExpresion(e) {
         
      if ( Number.isInteger(this.value))
        this.value = '';
      this.value += e;
 
    },

    voidline(){
      console.log(this.currentRow.id)
        axios.post('/api/sales/orderItem/delete/'+this.currentRow.id).then(res=>{
          console.log(res)
   this.addProducts.splice(this.activeIndex, 1);
        this.dialogVoidLine = false
        })
     
    },

    canceltrans(){
      axios.post('/api/sales/transaction/void/'+this.$route.params.transid).then(res=>{ 
      axios.post('/api/sales/order/void/'+this.$route.params.orderid).then(res=>{
            this.$router.push('/pos/terminal/'+this.$route.params.terminalId)
          	this.$noty.error('Void transaction successfully'); 
      })
 
      })
    },
    del(){
this.value = this.value.slice(0, -1);
   
    },
    addProduct(){
        if(this.product.price_measurement == 'Weight'){
         let prod=`${this.product.name} ${this.weight_selected}`
         let amount=this.count*this.price
         axios.post('/api/sales/orderItem/create',{'order_id':this.$route.params.id,'product_name':prod,'product_id':this.product.id,'qty':this.count,'price':this.price,'tax':(this.price*0.10)*this.count}).then(el=>{
            console.log(el.data)
            console.log(this.count)
                this.addProducts.push({id:el.data.id,product_id:el.data.product_id,product:el.data.product_name,price:el.data.price,qty:el.data.qty,amount:el.data.price* el.data.qty,tax:el.data.tax})
   
           
         })
        //  this.addProducts.push({product_id:this.product.id,product:prod,price:this.price,qty:this.count,amount:amount})
 
        }
         if(this.product.price_measurement == 'Weight Range'){
         let prod=`${this.product.name} 1g`
          let amount=this.count*this.price
          axios.post('/api/sales/orderItem/create',{'order_id':this.$route.params.orderid,'product_name':prod,'product_id':this.product.id,'qty':this.count,'price':this.price,'tax':(this.price*0.10)*this.count}).then(el=>{
             console.log(this.price)
            console.log(this.count)
              this.addProducts.push({id:el.data.id,product_id:el.data.product_id,product:el.data.product_name,price:el.data.price,qty:el.data.qty,amount:el.data.price* el.data.qty,tax:el.data.tax})
   
         })
        //  this.addProducts.push({product_id:this.product.id,product:prod,price:this.price,qty:this.count,amount:amount})
       
         }
        if(this.product.price_measurement == 'Per Unit' || this.product.price_measurement == 'Per Unit Range' ){
          let prod=`${this.product.name} ${this.product.net_weight}g`
           let amount=this.count*this.price
           axios.post('/api/sales/orderItem/create',{'order_id':this.$route.params.orderid,'product_name':prod,'product_id':this.product.id,'qty':this.count,'price':this.price,'tax':(this.price*0.10)*this.count}).then(el=>{
           console.log(this.price)
            console.log(this.count)
            this.addProducts.push({id:el.data.id,product_id:el.data.product_id,product:el.data.product_name,price:el.data.price,qty:el.data.qty,amount:el.data.price* el.data.qty,tax:el.data.tax})
   
         }) 
         // this.addProducts.push({product_id:this.product.id,product:prod,price:this.price,qty:this.count,amount:amount})
       
         }
    
      this.weight=''
      this.weight_selected=''
      this.price=''
      this.count=''
      this.dialogAdd=false
    },
    cancel(){
      this.weight=''
      this.weight_selected=''
      this.price=''
      this.count=''
      this.dialogAdd=false
        },
        changeCount(value){
          if(this.product.price_measurement=='Per Unit Range'){
          let max=Math.max.apply(Math, this.product.prices.map(function(p) { return p.count; })) 
          console.log(this.product.prices) 
        if(value < max){
        this.product.prices.forEach(el=>{
          
          if(value==el.count){
            this.price=(el.piece_price/el.count).toFixed(2)
          }else{
            this.price=(this.product.prices[0].piece_price/this.product.prices[0].count).toFixed(2)
          }
        })
        }
        else{
          this.product.prices.forEach(el=>{
             this.price=(el.piece_price/el.count).toFixed(2)
          })
        }
        }
        else{
          this.price=this.product.prices[0].piece_price
        }
        },
        changeWeight(value) {

        let max=Math.max.apply(Math, this.product.prices.map(function(p) { return p.to; }))  
        if(value < max){
        this.product.prices.forEach(el=>{
          let inRange=this.inRange(value,el.from,el.to)
          if(inRange){
            this.price=(el.range_price/el.to).toFixed(2)
          }else{
            this.price=(this.product.prices[0].range_price/this.product.prices[0].to).toFixed(2)
          }
        })
        }
        else{
          this.product.prices.forEach(el=>{
             this.price=(el.range_price/el.to).toFixed(2)
          })
        }
      },
      inRange(x, min, max) {
          return ((x-min)*(x-max) <= 0);
      }

      ,
addProd(index){

  this.dialogAdd=true
  this.product=this.products[index]
  console.log(this.product)
}
  },
  computed:{
    
    username(){
  
        return this.$store.getters.name
    },
    total(){
        let total=0
        this.addProducts.forEach(el=>{
          total=total+el.amount
        })

        return total
    },
        taxtotal(){
        let total=0
        this.addProducts.forEach(el=>{
          total=total+el.tax
        })

        return total
    },

    price_weight_selected(){
      let price=0
        if(this.weight_selected=='1g'){
          price= this.product.prices[0].gram_price
        }
        else if(this.weight_selected=='1/8oz'){
        price= this.product.prices[0].eight_price
        }
           else if(this.weight_selected=='1/4oz'){
        price= this.product.prices[0].quarter_price
        }
           else if(this.weight_selected=='1/2oz'){
        price= this.product.prices[0].half_price
        }
           else if(this.weight_selected=='1oz'){
        price= this.product.prices[0].ounce_price
        }
           else if(this.weight_selected=='pre-roll'){
        price= this.product.prices[0].joint_price
        }
        this.price=price
        return price
    },
      products_computed(){
          let filter=this.products.filter(el=>el.name.toLowerCase().includes(this.product_query.toLowerCase()))
          let coutCatProd=0
          if(filter.length==0 && this.product_query!='' || coutCatProd.length==0){
              this.has_prod_emp=true
          }

          if(this.product_query==''){
               this.has_prod_emp=false
               if(this.category_id!=''){
                 coutCatProd=this.products.filter(el=>el.product_category_id==this.category_id)
                 return this.products.filter(el=>el.product_category_id==this.category_id)
               }
          return this.products

          

      }
      else{
          return this.products.filter(el=>el.name.toLowerCase().includes(this.product_query.toLowerCase()))
      }
      }
      
  }
}
</script>


