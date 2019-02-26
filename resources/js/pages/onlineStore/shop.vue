<template>
  <div class="shop" style="margin-top:20px;">
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
                <template v-if="prod.price_measurement=='Per Unit'">
                  <span>Price $ {{prod.prices[0].piece_price}}</span>
                  <br>
                </template>
              </div>
            </v-card-title>
            <v-card-actions>
              <v-flex xs12 sm3>
                <v-btn @click="viewDetails(index)" flat icon color="warning">
                  <v-icon large>shopping_cart</v-icon>
                </v-btn>
              </v-flex>
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

               <!-- <v-layout row>

        <v-flex sm5>
            <v-img
            v-if="product.image!=''"
             height="300px"
        :src="`/uploadedImages/`+product.image">
              
            </v-img>
        </v-flex>
        <v-flex sm7>
          <v-layout row>
              <v-flex sm3>
            weight
          </v-flex>
          <v-flex sm3>
          <v-select
          :items="getPriceRanges"
          item-text="weight_range"
          item-value="price"
          box
          label="Box style"
        >
      
        </v-select>
 </v-flex>
            </v-layout> 
          
         
          <v-flex sm6>

          </v-flex>

        </v-flex>
      </v-layout> -->

            <el-row>
              <el-col :md="10">
                <img :src="`/uploadedImages/${product.image}`" class="image">
                <br>
                <h2>{{product.name}}</h2>
                <p class="lead">{{product.description}}</p>
              </el-col>
              <el-col :md="14">
                <!-- <center> <h4 style="margin-top:0px; float:center;">{{product.name}}</h4></center> -->
                <center>
                  <template v-if="product.price_measurement=='Weight'">
                    <center>
                      <h5 style="margin-bottom:0px;">Select Weight</h5>
                    </center>

                    <div>
                      <el-radio-group v-model="weight_selected">
                        <el-radio-button :label="`1g@${product.prices[0].gram_price}`">1g
                          <br>
                          ${{product.prices[0].gram_price}}
                        </el-radio-button>
                        <el-radio-button :label="`1/8oz@${product.prices[0].eight_price}`">1/8oz
                          <br>
                          ${{product.prices[0].eight_price}}
                        </el-radio-button>
                        <el-radio-button :label="`1/4oz@${product.prices[0].quarter_price}`">1/4oz
                          <br>
                          ${{product.prices[0].quarter_price}}
                        </el-radio-button>
                        <el-radio-button :label="`1/2oz@${product.prices[0].half_price}`">1/2oz
                          <br>
                          ${{product.prices[0].half_price}}
                        </el-radio-button>
                        <el-radio-button :label="`1oz@${product.prices[0].ounce_price}`">1oz
                          <br>
                          ${{product.prices[0].ounce_price}}
                        </el-radio-button>
                        <el-radio-button
                          :label="`Pre-roll@${product.prices[0].joint_price}`"
                        >Pre-roll
                          <br>
                          ${{product.prices[0].joint_price}}
                        </el-radio-button>
                      </el-radio-group>

                      <br>
                      <el-col :md="12" :offset="6">
                        <el-row :gutter="5">
                          <el-col :md="12">
                            
                         
                            <div class="input-group">
      <input type="number" v-model="quantity" class="form-control" placeholder="qty" aria-label="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-warning" :disabled="quantity <= 0 || weight_selected==''"
                              @click="addTocart(product,weight_selected,quantity)" type="button">Add to Cart</button>
      </span>
    </div>
                          </el-col>&nbsp;
                          <el-col style="margin-top:30px;" :md="8">
                 
                          </el-col>
                        </el-row>
                      </el-col>
                    </div>
                  </template>
                </center>
                <center>
                  <template v-if="product.price_measurement=='Weight Range'">
                    <div>
                      <center>
                        <h5 style="margin-bottom:0px;">Select Weight Range</h5>
                      </center>
                      <el-radio-group v-model="weight_range_selected">
                        <el-radio-button
                          v-for="price in product.prices"
                          :label="`${price.from}g to ${price.to}g@${price.range_price}`"
                          :key="price.id"
                        >{{price.from}}gram to {{price.to}}gram ${{price.range_price}}</el-radio-button>
                      </el-radio-group>
                      <br>
                      <el-col :md="12" :offset="6">
                        <el-row :gutter="5">
                          <el-col :md="12">
                             <div class="input-group">
      <input type="number" v-model="quantity" class="form-control" placeholder="qty" aria-label="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-warning" :disabled="quantity <= 0 || weight_range_selected==''"
                              @click="addTocart(product,weight_range_selected,quantity)" type="button">Add To Cart</button>
      </span>
    </div>
                          </el-col>&nbsp;
                          <el-col style="margin-top:30px;" :md="8">
                   
                          </el-col>
                        </el-row>
                      </el-col>
                    </div>
                  </template>
                </center>

                <center>
                  <template v-if="product.price_measurement=='Per Unit'">
                    <div>
                      <center>
                        <h5 style="margin-bottom:0px;">Select Unit Price</h5>
                      </center>
                      <el-radio-group v-model="per_unit">
                        <el-radio-button
                          :label="`pc@${product.prices[0].piece_price}`"
                        >${{product.prices[0].piece_price}}</el-radio-button>
                      </el-radio-group>
                      <br>
                      <el-col :md="12" :offset="6">
                        <el-row :gutter="5">
                          <el-col :md="12">
                              <div class="input-group">
      <input type="number" v-model="quantity" class="form-control" placeholder="qty" aria-label="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-warning"  :disabled="quantity <= 0"
                              @click="addTocart(product,`pc@${product.prices[0].piece_price}`,quantity)"
                          type="button">Add to Cart</button>
      </span>
    </div>


                          </el-col>&nbsp;
                          <el-col style="margin-top:30px;" :md="8">
                            
                          </el-col>
                        </el-row>
                      </el-col>
                    </div>
                  </template>
                </center>
              </el-col>
            </el-row>
          </v-card>
     
        </v-dialog>
        
      </v-layout>
      
      <el-dialog title="Cart" :visible.sync="cartDialog" width="80%"></el-dialog>
    </v-container>
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
  data() {
    return {
      products: [],
      cartDialog: false,
      product: { image: '',prices:[] },
      weight_selected: '',
      weight_range_selected: '',
      per_unit: 0,
      dialog: false,

      quantity: 1,
      weight: '',
      carts: []
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
    ...mapGetters(['getCarts', 'getCartCount']),
getPriceRanges(){
let price_ranges=[]
this.product.prices.forEach(element => {
  price_ranges.push({weight_range:`${element.from}g to ${element.to}g@${element.range_price}`,price:element.range_price})
});
return price_ranges
},
    getDialogstate() {
      console.log(this.dialogCart)
      return this.dialogCart
    }
  },

  methods: {
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
