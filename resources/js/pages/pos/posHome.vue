<template>
  <div>
    <v-layout row>
      <v-flex md8 pt-5 mr-3>
        <v-card height="400" >
          <v-layout row ml-2 mr-2 pa-2 justify-space-between>
            <v-flex xs2>
              <v-btn outline color="indigo">Add</v-btn>
            </v-flex>
            <v-flex xs4>
              <el-input placeholder="Type product" prefix-icon="el-icon-search"></el-input>
            </v-flex>
          </v-layout>

          <hr style="margin: 0px 0px;">
 
          <v-layout row pa-2 ml-2 mr-2 wrap id="style-5" style="height:330px; max-height:330px; overflow-y:scroll;">
            <v-flex md3  pa-1 v-for="(prod, index) in products" :key="index">
              <v-card hover raised class="rounded-card">
                <v-img class="white--text" height="80px" :src="`/uploadedImages/${prod.image}`">
                  <v-container fill-height fluid>
                    <v-layout fill-height></v-layout>
                  </v-container>
                </v-img>

                <v-card-title>
                  <v-layout row>
                    <v-flex md6>
                      <span class="success--text ml-3">
                        <b>{{prod.name}}</b>
                      </span>
                    </v-flex>
                    <v-flex md6>
                      <span class="success--text mr-3" style="float:right;">
                        <b>{{prod.strain}}</b>
                      </span>
                    </v-flex>
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
                        return o.range_price;
                        }))}}
                      </span>
                      
                    </template>
                    <template v-if="prod.price_measurement=='Per Unit Range'">
                      <span>
                        For Low As $ {{Math.min.apply(Math, prod.prices.map(function (o) {
                        return o.piece_price;
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
            <v-flex sm3 pa-1>
                <v-card height="130" dark
                      hover raised class="rounded-card">
                               <v-card-title><span>Flowers</span></v-card-title>
                      </v-card>
            </v-flex>
               <v-flex sm3 pa-1>
                <v-card height="130"  dark   hover raised class="rounded-card  white--text">
                 <v-card-title><span>Seeds</span></v-card-title>
                </v-card>
            </v-flex>
               <v-flex sm3 pa-1>
                <v-card height="130"  dark   hover raised class="rounded-card">
                         <v-card-title><span>Edible</span></v-card-title>

                </v-card>
            </v-flex>
               <v-flex sm3 pa-1 >
                <v-card height="130" dark    hover raised class="rounded-card">
                             <v-card-title><span>Accesories</span></v-card-title>
                </v-card>
            </v-flex>
        
            
        </v-layout>
      </v-flex>
      <v-flex md4 pt-5>
        <v-card height="500">
          <v-card-title>
            <center>
              <span><b>Checkout</b></span>
            </center>
          </v-card-title>
          <hr>

          
        </v-card>
        <v-btn outline color="success" block>Pay</v-btn>
      </v-flex>
    </v-layout>
  </div>
</template>

<style scoped>
.rounded-card{
    border-radius:5px;
    border-color: blueviolet;
    
    
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
      products: []
    }
  },
  created() {
    axios.get('/api/catalog/product').then(res => {
      this.products = res.data
      console.log(this.products)
    })
  }
}
</script>


