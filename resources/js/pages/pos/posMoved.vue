<template>
    <v-layout row>
      <transition name="slide-fade">
        <template v-if="tender == true">
          <v-flex md5 pt-5 mr-3>
            <v-card  class="text--white" height="540" >
              <v-layout  row wrap mr-1 ml-1>
                <v-flex  m12 pb-2>
                  <v-container fluid grid-list-sm>
                    <v-layout class="white--text" pa-0 ma-0 row wrap>
                      <v-flex md12 style="background:#2f2f31" class="rounded-div">
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
                              <button class="calculator-btn" @click="addExpresion('.')">.</button>
                            </div>
                            <div class="calculator-col">
                              <button class="calculator-btn del" @click="del">del</button>
                            </div>
                          </div>
                          <div class="calculator-row">
                            <div style="margin-bottom:10px;" class="calculator-col">
                              <v-btn large style="  color: #D4D4D2 !important;" block color="success">Change</v-btn>
                            </div>
                          </div>
                        </div>
                      </v-flex>
                    </v-layout>
                  </v-container>
                </v-flex>
              </v-layout>
            </v-card>
          </v-flex>
        </template>
      </transition>

      <transition name="slide-fade">
        <template v-if="tender == false">
          <v-flex md7 pt-5 mr-3>

            <v-card height="400" >
              <!-- TopBar -->
                  <v-toolbar
                    light
                    color="white"
                  >
                    <v-autocomplete
                      v-model="model"
                      :items="items"
                      :loading="isLoading"
                      :search-input.sync="search"
                      chips
                      clearable
                      hide-details
                      hide-selected
                      item-text="name"
                      item-value="id"
                      label="Patient Name"
                      return-object
                    >
                      <template v-slot:no-data>
                        <v-list-tile>
                          <v-list-tile-title>
                            Search a 
                            <strong>Patient</strong>
                          </v-list-tile-title>
                        </v-list-tile>
                      </template>
                    </v-autocomplete>
                  </v-toolbar>
                  <v-divider></v-divider>
                  <v-expand-transition>
                    <v-list v-if="model" class="lighten-3">
                      <v-list-tile
                        v-for="(field, i) in fields"
                        :key="i"
                      >
                        <v-list-tile-content>
                          <v-list-tile-title v-text="field.value"></v-list-tile-title>
                          <v-list-tile-sub-title v-text="field.key"></v-list-tile-sub-title>
                        </v-list-tile-content>
                      </v-list-tile>
                    </v-list>
                  </v-expand-transition>
              <v-layout row ml-2 mr-2 pa-2 justify-space-between>
                <v-btn outline color="indigo">Add</v-btn>
                <v-flex xs6>
                </v-flex>
                <v-flex xs4>
                  <el-input v-model="product_query" placeholder="Type product" prefix-icon="el-icon-search"></el-input>
                </v-flex>
              </v-layout>
              <!-- /TopBar -->
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

              <!-- Posts -->
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
              <!-- /Posts -->
            </v-card>

            <!-- FooterBar -->
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
                  <v-card-title>
                    <span>{{cat.name}}</span>
                  </v-card-title>
                </v-card>
              </v-flex>
            </v-layout>
            <!-- /FooterBar -->
          </v-flex>
        </template>
      </transition>

      <v-flex md7 pt-5>
        <v-card height="540">
          <v-card-title>
            <el-input @keyup.enter.native="addProductbyBarcode()" v-model="barcode"    prefix-icon="el-icon-tickets" placeholder="Scan Barcode"></el-input>
          </v-card-title>
          <hr>

          <v-layout mr-2 ml-2 row wrap style="height:320px; max-height:320px; overflow-y:scroll;">
            <v-flex md12>

              <el-table
                :data="addProducts"
                style="width: 100%">
                <el-table-column
                  type="selection"
                  width="55">
                </el-table-column>
                <el-table-column
                  prop="product"
                  label="product"
                  width="120">
                </el-table-column>
                <el-table-column
                  prop="count"
                  label="count"
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
              <v-card height="70">
              </v-card>
            </v-flex>
            <v-flex md4>
              <v-btn color="warning" style="color:white !important;" mr-2 block>F3-Void Line</v-btn>
            </v-flex>
            <v-flex md4>
              <v-btn color="success" dark  block style="color:white !important;">F4-Void Transaction</v-btn>
            </v-flex>
            <v-flex md4>
              <v-btn color="error" dark @click="tender=true" block style="color:white !important;">F5-Tender</v-btn>
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
              <v-flex sm12 mt-2> 
                <h3>${{price_weight_selected}}</h3>
              </v-flex>
            </template>
            <template v-if="product.price_measurement=='Weight Range'">
              <v-flex sm12>
                <h5>Weight in Grams</h5>
                <el-input-number style="width:100%;" v-model="count" controls-position="right" @change="changeWeight"></el-input-number>
              </v-flex>
              <v-flex sm12 mt-2> 
                <h3>price ${{price}}</h3> 
              </v-flex> 
            </template>
            <template v-if="product.price_measurement=='Per Unit Range'">
              <v-flex sm12>
                <h5>Count</h5>
                <el-input-number v-model="count" style="width:100%;"  controls-position="right" @change="changeCount"></el-input-number>
              </v-flex>
              <v-flex sm12 mt-2> 
                <h3>price ${{price}}</h3>
              </v-flex> 
            </template>
            <template v-if="product.price_measurement=='Per Unit'">
              <v-flex sm12>
                <h5>Count</h5>
                <el-input-number v-model="count" style="width:100%;"  controls-position="right" @change="changeCount"></el-input-number>
              </v-flex>
          
              <v-flex sm12 mt-2>
                <h3>price ${{price}}</h3> 
              </v-flex> 
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

  </div>
</template>

<style scoped>

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
  padding: 0;
  max-width: 320px;
  min-width: 320px;
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
export default {
  data() {
    return {
      tender:false,
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

      isLoading: false,
      items: [],
      model: null,
      search: null
    }
  },
  watch: {
    search (val) {
      // Items have already been loaded
      if (this.items.length > 0) return

      this.isLoading = true

      // Lazily load input items
      fetch('api/patient/profiles')
        .then(res => res.json())
        .then(res => {
          const { items } = res
          this.items = res.data
        })
        .catch(err => {
          console.log(err)
        })
        .finally(() => (this.isLoading = false))
    }
  },
  created() {
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
        this.tender = false
      }
    });
  },
  methods:{
    addProductbyBarcode(){
      console.log('ni abot')
      let prod=this.barcodes.find(el=>el.code == this.barcode)

      if(prod.product.price_measurement=='Weight'){
          console.log(prod.size)
          
        if(prod.size=='1g'){
          
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product:`${prod.product.name} ${prod.size}`,price:p.prices[0].gram_price,count:1,amount:p.prices[0].gram_price})
        }
        if(prod.size=='1/8oz'){
          console.log('naka abot pud')
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product:`${prod.product.name} ${prod.size}`,price:p.prices[0].eight_price,count:1,amount:p.prices[0].eight_price})
        }
      if(prod.size=='1/4oz'){
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product:`${prod.product.name} ${prod.size}`,price:p.prices[0].quarter_price,count:1,amount:p.prices[0].quarter_price})
        }
              if(prod.size=='1/2oz'){
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product:`${prod.product.name} ${prod.size}`,price:p.prices[0].half_price,count:1,amount:p.prices[0].half_price})
        }

        if(prod.size=='1oz'){
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product:`${prod.product.name} ${prod.size}`,price:p.prices[0].half_price,count:1,amount:p.prices[0].ounce_price})
        }
        if(prod.size=='pre-roll'){
          let p=this.products.find(el=>el.id == prod.product.id)
          this.addProducts.push({product:`${prod.product.name} ${prod.size}`,price:p.prices[0].joint_price,count:1,amount:p.prices[0].joint_price})
        }
      }
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
      if ( Number.isInteger(this.value) )
        this.value = ''; 
      this.value += e;
    },
    del(){
      this.value = this.value.slice(0, -1);
    },
    addProduct(){
        if(this.product.price_measurement == 'Weight'){
         let prod=`${this.product.name} ${this.weight_selected}`
         let amount=this.count*this.price
         this.addProducts.push({product:prod,price:this.price,count:this.count,amount:amount})
        }
         if(this.product.price_measurement == 'Weight Range'){
         let prod=`${this.product.name} 1g`
          let amount=this.count*this.price
         this.addProducts.push({product:prod,price:this.price,count:this.count,amount:amount})
        }
        if(this.product.price_measurement == 'Per Unit' || this.product.price_measurement == 'Per Unit Range' ){
          let prod=`${this.product.name} ${this.product.net_weight}g`
           let amount=this.count*this.price
         this.addProducts.push({product:prod,price:this.price,count:this.count,amount:amount})
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
    },
    addProd(index){
      this.dialogAdd=true
      this.product=this.products[index]
      console.log(this.product)
    },
    fillCard(){
      //console.log(this.items);
      //alert( 'filling card: '+this.items['value'] );
    }
  },
  computed:{
    fields() {
      if (!this.model) return []

      return Object.keys(this.model).map(key => {
        return {
          key,
          value: this.model[key] || 'n/a'
        }
      })
    },
    items () {
      return this.items.map(entry => {
        const Description = '...'

        return Object.assign({}, entry, { Description })
      })
    },
    total(){
        let total=0
        this.addProducts.forEach(el=>{
          total=total+el.amount
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
