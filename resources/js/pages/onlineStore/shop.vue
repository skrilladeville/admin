<template>
  <div class="shop" style="margin-top:20px;">

    <div v-if="getIslegalAge">
    <v-container fluid>
      <el-row>
        <el-col>
          <el-card style="margin-bottom:20px;">
            <h1>
              <b>Category</b>
            </h1>
            <el-breadcrumb separator-class="el-icon-arrow-right">
              <el-breadcrumb-item :to="{ path: '/' }">Flowers</el-breadcrumb-item>
              <el-breadcrumb-item>Edible</el-breadcrumb-item>
              <el-breadcrumb-item>Concentrate</el-breadcrumb-item>
              <el-breadcrumb-item>E-vapes</el-breadcrumb-item>
            </el-breadcrumb>
          </el-card>
        </el-col>
      </el-row>
      <v-layout row wrap>
        <v-flex md3 xs12 pa-1 v-for="(prod, index) in products" :key="index">
          <v-card hove raised @click="viewDetails(index)">
            <v-img class="white--text" height="250px" :src="`/uploadedImages/${prod.image}`">
              <v-container fill-height fluid>
                <v-layout fill-height>
                  <v-flex xs12 align-end flexbox>
                    <span class="headline">{{prod.name}}</span>
                  </v-flex>
                </v-layout>
              </v-container>
            </v-img>
            <v-card-title>
              <div>
                <span class="grey--text">{{prod.name}}</span>
                <br>
                <template v-if="prod.price_measurement=='Weight'">
                  <span>For Low As ${{prod.prices[0].gram_price}}</span>
                  <br>
                </template>
                <template v-if="prod.price_measurement=='Weight Range'">
                  <span>
                    For Low As $ {{Math.min.apply(Math, prod.prices.map(function (o) {
                    return o.range_price;
                    }))}}
                  </span>
                  <br>
                </template>
                    <template v-if="prod.price_measurement=='Per Unit Range'">
                  <span>
                    For Low As $ {{Math.min.apply(Math, prod.prices.map(function (o) {
                    return o.piece_price;
                    }))}}
                  </span>
                  <br>
                </template>
                <template v-if="prod.price_measurement=='Per Unit'">
                  <span>Price $ {{prod.prices[0].piece_price}}</span>
                  <br>
                </template>
              </div>
            </v-card-title>
            <v-card-actions>
                 <v-layout row align-end>
              <v-flex>
                  <v-btn style="float:right;" @click="viewDetails(index)" flat icon color="primary">
                  <v-icon>shopping_cart</v-icon>
                </v-btn>
              </v-flex>
              </v-layout>
            </v-card-actions>
          </v-card>
        </v-flex>

        <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
          <v-card hover raised>
            <v-toolbar dark color="primary">
              <v-btn icon dark @click="dialog = false">
                <v-icon>close</v-icon>
              </v-btn>
              <v-toolbar-title style="color:white;">Cart</v-toolbar-title>

              <v-spacer></v-spacer>
            </v-toolbar>
            <br>

<template v-if="product.price_measurement=='Weight'">
            <v-layout row>
              <v-flex sm5 pa-2 ml-5>
                <v-img
                  v-if="product.image!=''"
                  height="300px"
                  :src="`/uploadedImages/`+product.image"
                ></v-img>
                <h3>{{product.name}}</h3>
                <p>{{product.description}}</p>
              </v-flex>
              <v-flex sm7>
                <v-layout row class="pa-1">
                  <v-flex sm12 md3 class="ml-5 pa-3">
                    <h4>Weight</h4>
                  </v-flex>

                  <v-flex sm12 md6>
                    <v-select
                   
                      v-model="weight_selected"
                      :items="weigths"
                      item-value="labelWeight"
                      item-text="label"
                      
                
                    ></v-select>
                  </v-flex>
              
                </v-layout>
                   <v-layout row class="pa-1">
                  <v-flex sm12 md3 class="ml-5 pa-3">
                    <h4>Price</h4>
                  </v-flex>

                  <v-flex sm12 md6>
                    <h2>{{countItem}}</h2>
              
                  <h2>${{getPriceWeight}}</h2>
               
                      </v-flex>
                </v-layout>
                <v-layout row class="pa-1">
                  <v-flex sm12 md3 class="ml-5 pa-3">
                    <h4>Quantity</h4>
                  </v-flex>

                  <v-flex sm12 md6>
                    <v-text-field v-model="quantity" type="number" single-line outline></v-text-field>
                  </v-flex>
                </v-layout>
                <v-layout row>
                  <v-flex md3></v-flex>
                  <v-flex sm12 md6 class="ml-5">
                      <v-btn color="error" :disabled="quantity < 1 || weight_selected==''" @click="addTocart(product,weight_selected,quantity)" block>Add To Cart</v-btn>
                  </v-flex>
                </v-layout>

            
              </v-flex>
            </v-layout>

</template>


<template v-if="product.price_measurement=='Per Unit Range'">
            <v-layout row>
              <v-flex sm5 sm5 pa-2 ml-5>
                <v-img
                  v-if="product.image!=''"
                  height="300px"
                  :src="`/uploadedImages/`+product.image"
                ></v-img>
                  <h3>{{product.name}}</h3>
                <p>{{product.description}}</p>
              </v-flex>
              <v-flex sm7>
                <v-layout row class="pa-1">
                  <v-flex sm12 md3 class="ml-5 pa-3">
                    <h4>Count</h4>
                  </v-flex>

                  <v-flex sm12 md6>
                    <v-select
                   
                      v-model="count_range_selected"
                      :items="pieceCounts"
                      item-value="count_price"
                      item-text="count_range"
                 
                      
                
                    ></v-select>
                  </v-flex>
              
                </v-layout>
                   <v-layout row class="pa-1">
                  <v-flex sm12 md3 class="ml-5 pa-3">
                    <h4>Price</h4>
                  </v-flex>

                  <v-flex sm12 md6>
                   <h2>{{countItem}}</h2>
                    
                  <h2>${{getPriceCountRange}}</h2>
               
                      </v-flex>
                </v-layout>
                <v-layout row class="pa-1">
                  <v-flex sm12 md3 class="ml-5 pa-3">
                    <h4>Quantity</h4>
                  </v-flex>

                  <v-flex sm12 md6>
                    <v-text-field v-model="quantity" type="number" single-line outline></v-text-field>
                  </v-flex>
                </v-layout>
                <v-layout row>
                  <v-flex md3></v-flex>
                  <v-flex sm12 md6 class="ml-5">
                      <v-btn color="error" :disabled="quantity < 1 || count_range_selected ==''" @click="addTocart(product,count_range_selected,quantity)" block>Add To Cart</v-btn>
                  </v-flex>
                </v-layout>

            
              </v-flex>
            </v-layout>

</template>



<template v-if="product.price_measurement=='Weight Range'">
            <v-layout row>
              <v-flex sm5 sm5 pa-2 ml-5>
                <v-img
                  v-if="product.image!=''"
                  height="300px"
                  :src="`/uploadedImages/`+product.image"
                ></v-img>
                  <h3>{{product.name}}</h3>
                <p>{{product.description}}</p>
              </v-flex>
              <v-flex sm7>
                <v-layout row class="pa-1">
                  <v-flex sm12 md3 class="ml-5 pa-3">
                    <h4>Weight</h4>
                  </v-flex>

                  <v-flex sm12 md6>
                    <v-select
                   
                      v-model="weight_range_selected"
                      :items="getPriceRanges"
                      item-text="weight_range"
                      item-value="price"
                    
                  
                    ></v-select>
                  </v-flex>
              
                </v-layout>
                   <v-layout row class="pa-1">
                  <v-flex sm12 md3 class="ml-5 pa-3">
                    <h4>Price</h4>
                  </v-flex>

                  <v-flex sm12 md6>
               
                  <h2>{{countItem}}</h2>
                     <h2>${{getPrice}}</h2>

               
                      </v-flex>
                </v-layout>
                <v-layout row class="pa-1">
                  <v-flex sm12 md3 class="ml-5 pa-3">
                    <h4>Quantity</h4>
                  </v-flex>

                  <v-flex sm12 md6>
                    <v-text-field v-model="quantity" type="number" single-line outline></v-text-field>
                  </v-flex>
                </v-layout>
                <v-layout row>
                  <v-flex md3></v-flex>
                  <v-flex sm12 md6 class="ml-5">
                      <v-btn color="error" :disabled="quantity < 1 || weight_range_selected ==''" block @click="addTocart(product,weight_range_selected,quantity)">Add To Cart</v-btn>
                  </v-flex>
                </v-layout>

            
              </v-flex>
            </v-layout>

</template>

<template v-if="product.price_measurement=='Per Unit'">
            <v-layout row>
              <v-flex sm5 sm5 pa-2 ml-5>
                <v-img
                  v-if="product.image!=''"
                  height="300px"
                  :src="`/uploadedImages/`+product.image"
                ></v-img>
                  <h3>{{product.name}}</h3>
                <p>{{product.description}}</p>
              </v-flex>
              <v-flex sm7>
                <v-layout row class="pa-1">
                  <v-flex sm12 md3 class="ml-5 pa-3">
                    <h4>Weight</h4>
                  </v-flex>

                  <v-flex sm12 md6>
                  <h4>PC</h4>
                  </v-flex>
              
                </v-layout>
                   <v-layout row class="pa-1">
                  <v-flex sm12 md3 class="ml-5 pa-3">
                    <h4>Price</h4>
                  </v-flex>

                  <v-flex sm12 md6>
                  <h2>${{product.prices[0].piece_price}}</h2>
               
                      </v-flex>
                </v-layout>
                <v-layout row class="pa-1">
                  <v-flex sm12 md3 class="ml-5 pa-3">
                    <h4>Quantity</h4>
                  </v-flex>

                  <v-flex sm12 md6>
                    <v-text-field v-model="quantity" type="number" single-line outline></v-text-field>
                  </v-flex>
                </v-layout>
                <v-layout row>
                  <v-flex md3></v-flex>
                  <v-flex sm12 md6 class="ml-5">
                      <v-btn color="error" :disabled="quantity < 1" block @click="addTocart(product,`pc@${product.prices[0].piece_price}`,quantity)"
                                >Add To Cart</v-btn>
                  </v-flex>
                </v-layout>

            
              </v-flex>
            </v-layout>

              </template>

              </el-col>
            </el-row>
          </v-card>
        </v-dialog>
      </v-layout>

      <el-dialog title="Cart" :visible.sync="cartDialog" width="80%"></el-dialog>
    </v-container>
</div>


      <v-layout v-if="getIslegalAge==false" row justify-center>
    <v-dialog v-model="dialogAgree"
     width="500"
     persistent>

      <v-card style="padding:10px 10px;">
        <v-card-title class="headline">Legal Age Verification</v-card-title>
    

          <v-flex md12><h2>Mandatory 19+ to enter</h2></v-flex>
          <p>This website offers cannabis products and information and is restricted to adults aged 19 years and older.</p>

        <v-checkbox
          v-model="allowage"
          label="Yes I am atleast 19 years old up."
        ></v-checkbox>
  
  



           <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn  :disabled="!allowage" color="error" @click="setAge(true)">Enter Site</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
</v-layout>
   


  </div>
</template>



<style scoped>
p {
  padding-right: 10px;
  padding-left: 10px;
  font-size: 11px;
  margin-bottom: 0px;
}
div.el-dialog__body {
  padding: 0px 0px;
}
.el-button,
.el-button--default,
.el-button--mini {
  padding-right: 0dp;
  padding-left: 0dp;
}
.shop {
  margin-top: 20px;
}
.time {
  font-size: 13px;
  color: #999;
}

button {
  padding: 0dp;
}

.thumbnail {
  position: relative;
  width: 300px;
  height: 300px;
  overflow: hidden;
}
.thumbnail img {
  position: absolute;
  left: 50%;
  top: 50%;
  height: 100%;
  width: auto;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.image {
  width: 100%;
  display: block;
}

.clearfix:before,
.clearfix:after {
  display: table;
  content: '';
}

.clearfix:after {
  clear: both;
}
</style>

<script>
import { mapState, mapMutations, mapGetters } from 'vuex'
export default {


    data(){
    return {
      dialogAgree:true,
      allowage:false,
      products: [],
      cartDialog: false,
      product:{ image: '', prices: [],price_measurement:'',},
      weight_selected: '',
      weight_range_selected: '',
      count_range_selected:'',
      per_unit: 0,
      dialog: false,
      out_stock_mes:'',

      quantity: 1,
      weight: '',
      price:0,
      carts: [],
         }
  },


  created() {
    axios.get('/api/catalog/product').then(res => {
      this.products = res.data
      console.log(this.products)
    })
  },

  mounted() {
    try {
      let element = document.getElementById('blade')
      element.classList.remove('fixed-navbar')
      let gcsicss = document.getElementById('gcis')
      let robustcss = document.getElementById('robust')
      let robustjs = document.getElementById('robustjs')
      gcsicss.remove()
      //robustcss.remove()
      //robustjs.remove()
    } catch (error) {
      console.log('error occur')
    }
  },
  computed: {
    ...mapGetters(['getCarts', 'getCartCount','getIslegalAge']),


    countItem(){
  let splitUnit = this.weight_range_selected.split('@')
    let count=0
if(splitUnit[0]=='1g'){

  this.product.checkin_products.forEach(e=>{
    count=count+e.one_g
  })
}
if(splitUnit[0]=='1/8oz'){

  this.product.checkin_products.forEach(e=>{
    count=count+e.eight_oz
  })
}
if(splitUnit[0]=='1/4oz'){

  this.product.checkin_products.forEach(e=>{
    count=count+e.fourth_oz
  })
}

if(splitUnit[0]=='1oz'){

  this.product.checkin_products.forEach(e=>{
    count=count+e.one_oz
  })
}

if(splitUnit[0]=='1/8oz'){

  this.product.checkin_products.forEach(e=>{
    count=count+e.eight_oz
  })
}

if(splitUnit[0]=='Pre-roll'){

  this.product.checkin_products.forEach(e=>{
    count=count+e.jar_g
  })

  if(this.product.price_measurement=='Weight Range'){
      count=count+e.total_weight
  }

  if(this.product.price_measurement=='Per Unit' || this.product.price_measurement=='Per Unit Range'){
      count=count+e.total_quantity
  }

  console.log(`ihap: ${count}`)

  if(count < 0){
    return "Out of Stock"
  }
  
}
},




    weigths(){
      return [{label:"1g",labelWeight:"1g@"+this.product.prices[0].gram_price},{label:"1/8oz",labelWeight:"1/8oz@"+this.product.prices[0].eight_price},{label:"1/4oz",
      labelWeight:"1/4oz@"+this.product.prices[0].quarter_price},{label:"1/2oz",labelWeight:"1/2oz@"+this.product.prices[0].half_price}
      ,{label:"1oz",labelWeight:"1oz@"+this.product.prices[0].ounce_price},{label:"Pre-roll",labelWeight:"Pre-roll@"+this.product.prices[0].joint_price}]
    },

        pieceCounts(){

          let price_ranges = []
      this.product.prices.forEach(element => {
        price_ranges.push({
          count_range: `${element.count}pcs`,
          count_price: `${element.count}pcs@${element.piece_price}`
        })
      })
      return price_ranges
         },
 
    getPriceRanges() {
      let price_ranges = []
      this.product.prices.forEach(element => {
        price_ranges.push({
          weight_range: `${element.from}g to ${element.to}g`,
          price: `${element.from}g to ${element.to}g@${element.range_price}`
        })
      })
      return price_ranges
    },
    getDialogstate() {
      console.log(this.dialogCart)
      return this.dialogCart
    },

        getPrice(){
      try{
             let splitUnit = this.weight_range_selected.split('@')
    return splitUnit[1]
      }catch(err){
        return 0
      }
  
    },

    getPriceWeight(){
          try{
             let splitUnit = this.weight_selected.split('@')
    return splitUnit[1]

    console.log(splitUnit[1])
    
      }catch(err){
        return 0
      }
    },
        getPriceCountRange(){
          try{
             let splitUnit = this.count_range_selected.split('@')
    return splitUnit[1]
      }catch(err){
        return 0
      }
    }
  },

  methods: {


    ...mapMutations(['SET_LEGAL_AGE']),


    
    
    setAge(isLegal){
        this.SET_LEGAL_AGE(isLegal)
        this.dialogAgree=false
    },    

       getprice(weight){
         console.log(weight)
      return this.price=weight
    },
    viewCart() {
      console.log('ni abot dri')
    },
    viewDetails(index) {
      this.weight_selected = ''
      this.weight_range_selected = ''
      this.unit_price = ''
      this.quantity = 1

      this.product = this.products[index]
      //this.cartDialog=true

      this.dialog = true
    },

    ...mapMutations(['ADD_TO_CART', 'UPDATE_CART', 'ADD_CART_COUNT']),



    addTocart(product, unitAndPrice, count) {
      console.log(this.getCartCount)

      let splitUnit = unitAndPrice.split('@')

      let filterCart = this.getCarts.filter(
        e => e.unit == splitUnit[0] && e.product == product
      )

      this.ADD_CART_COUNT(count)

      //console.log(filterCart)
      if (filterCart.length > 0) {
        let index = this.getCarts.findIndex(
          e => e.unit == splitUnit[0] && e.product == product
        )
        this.UPDATE_CART({
          index: index,
          obj: {
            product: product,
            unit: splitUnit[0],
            price: splitUnit[1],
            quantity: parseInt(count) + parseInt(filterCart[0].quantity)
          }
        })
      } else {
        this.ADD_TO_CART({
          product: product,
          unit: splitUnit[0],
          price: splitUnit[1],
          quantity: count
        })
      }

      this.dialog = false
    }
  }
}
</script>
