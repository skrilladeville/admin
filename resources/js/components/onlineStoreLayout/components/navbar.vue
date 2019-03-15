<template>
    <div>
   

 
<v-toolbar

      color="#006064"
      dark
      fixed 
      app
>
    
    <v-toolbar-side-icon class="hidden-md-and-up" @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      
     
      <v-toolbar-items class="hidden-sm-and-down">
         <v-btn
          v-for="item in menu"
          :key="item.icon"
          :to="item.link"
          flat
        >  <v-icon right>{{item.icon}}</v-icon>&nbsp;{{ item.title }}</v-btn>
      </v-toolbar-items>
    <v-spacer></v-spacer>
        <v-toolbar-items>
       
              <div>  
   <v-text-field
   @change="search"
   v-model="plant_type"
            placeholder="Search by plant type"
            append-icon="search"
          ></v-text-field>
     
     
      </div>
   
    
      
 
          <v-btn flat :disabled="getCartCount < 1" @click="viewCart">
      <v-badge color="purple">
      <span slot="badge" style="color:white;">{{getCartCount}}</span>
    
      <v-icon
      >
        shopping_cart
      </v-icon>
    </v-badge>
          </v-btn>
  
      </v-toolbar-items>
       
      
    </v-toolbar>

       <v-navigation-drawer
      v-model="drawer"
      :mini-variant="mini"
  fixed
      dark
      temporary
      
    >
      <v-list class="pa-1">
        <v-list-tile v-if="mini" @click.stop="mini = !mini">
          <v-list-tile-action>
            <v-icon>chevron_right</v-icon>
          </v-list-tile-action>
        </v-list-tile>

        <v-list-tile avatar tag="div">
          <v-list-tile-avatar>
            <img src="https://randomuser.me/api/portraits/men/85.jpg">
          </v-list-tile-avatar>

          <v-list-tile-content>
            <v-list-tile-title>John Leider</v-list-tile-title>
          </v-list-tile-content>

  
        </v-list-tile>
      </v-list>

      <v-list class="pt-0" dense>
        <v-divider light></v-divider>

        <v-list-tile
          v-for="item in menu"
          :key="item.title"
          :to="item.link"
        >
          <v-list-tile-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>

          <v-list-tile-content>
            <v-list-tile-title>{{ item.title }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>

 


<el-dialog
  title="My Cart"
  :visible.sync="dialogCart"
  width="80%"

 
  >
<el-row :gutter="10">
  <el-col :md="16">
      <el-card style="margin:5px 5px;" v-for="(cart,index) in getCarts" :key="index" shadow="never">
        <el-row :gutter="10">
          <el-col :md="4">
            <div class="thumbnail">
            <img class="image"  :src="`/uploadedImages/${cart.product.image}`" alt="">
            </div>
          </el-col>
          <el-col :md="20">
            <div class="d-flex justify-content-between"><h5 style="margin-bottom:0px;">{{cart.product.name}} @{{cart.unit}}</h5> <el-button style="float:right;" @click="remove(index,cart.quantity)" size="mini" icon="el-icon-close" type="text" circle></el-button></div>
            
            <p>Price:${{cart.price}}</p>
            <label for="">Quantity</label>
            <el-input :value="parseInt(cart.quantity)" style="width:60px" type="number" size="mini"></el-input>
          </el-col>
          
        </el-row>
      </el-card> 
    </el-col>
    
    <el-col :md="8">
      <h4 style="margin-top:0px;"><b>Order Summary</b></h4>
      <el-row>
       <el-col :md="18">
      <h5 style="margin-bottom:5px;" v-if="getCartCount>1">{{getCartCount}} Items price</h5>
        <h5 style="margin-bottom:5px;" v-else>1 Items price</h5>
      </el-col>

      <el-col :md="6">
        <h5  style="float:right;margin-bottom:5px;">${{sumPrice}}</h5>
      </el-col>

      </el-row>
         <el-row>
       <el-col :md="18">
     
        <h5 style="margin-bottom:5px;">Tax</h5>
      </el-col>

      <el-col :md="6">
        <h5  style="float:right; margin-bottom:5px;">$0.0</h5>
      </el-col>

      </el-row>

 
              <el-row>
                <hr>
       <el-col :md="18">
     
        <h5 style="margin-bottom:5px;">Grand Total</h5>
      </el-col>

      <el-col :md="6">
        <h5  style="float:right; margin-bottom:5px;">${{sumPrice}}</h5>
      </el-col>

      </el-row>

      


    </el-col>
</el-row>
  <span slot="footer" class="dialog-footer">
    <el-button @click="dialogCart = false">Cancel</el-button>
    <router-link to="/onlineStore/checkout"><el-button type="primary" :disabled="countCart==0" @click="dialogCart = false">Checkout</el-button></router-link>
  </span>
</el-dialog>



    </div>
</template>

<style scoped>

html body.fixed-navbar {
  padding-top: 0%;
}

.thumbnail {
  position: relative;
  width: 100px;
  height: 100px;
  overflow: hidden;
}
.thumbnail img {
  position: absolute;
  left: 50%;
  top: 50%;
  height: 100%;
  width: auto;
  -webkit-transform: translate(-50%,-50%);
      -ms-transform: translate(-50%,-50%);
          transform: translate(-50%,-50%);
}



</style>

<script>
import {mapGetters,mapMutations,mapState} from 'vuex'



export default {

  data(){
    return{
        productCount:'',
        dialogCart:false,
        drawer:null,
        plant_type:'',
menu: [
        { icon: 'home', title: 'Home',link:'/onlineStore' },
        { icon: 'shopping_cart', title: 'Canabis',link:'/onlineStore/shop' },
        { icon: 'info', title: 'About',link:'/onlineStore/about' }
      ],
      mini: false,
      right: null
        
        
        
    }
  },
  computed:{
    ...mapGetters([
      'getCarts',
      'getCartCount'
    ]),
    
    countCart(){
      var total=0
      this.getCarts.forEach(element => {
        total=total+parseInt(element.quantity)
      });

      return total
     
    },
    sumPrice(){
            var total=0
      this.getCarts.forEach(element => {
        total=total+parseFloat(element.price * element.quantity)
      });
    
       return parseFloat(Math.round(total * 100) / 100).toFixed(2);
    }

  

  },
  methods: {
              ...mapMutations([
          'REMOVE_CART',
          'REMOVE_CART_COUNT',
          'SEARCH'
      ]),


      search(){
       // this.SEARCH(this.plant_type)
        console.log('xvxvx')
      },

 
 

    viewCart(){
     this.dialogCart=true
    },
    remove(index,count){
      this.REMOVE_CART_COUNT(count)
      this.REMOVE_CART(index)
      

      if(this.getCarts.length==0){
this.dialogCart=false
      }
      
    }
  },
  
}
</script>
