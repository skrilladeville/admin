<template>
<div style="margin-top:20px;">
  <v-container fluid>
    <el-row :gutter="10">

        <el-col :md="16">
            <el-card>
<el-breadcrumb>
  <el-breadcrumb-item><el-button style="width:50px; height:50px;" type="warning" circle size="small"> <i class="fas fa-map-marker-alt"></i></el-button> Information</el-breadcrumb-item>
  <el-breadcrumb-item><el-button style="width:50px; height:50px;"  type="warning" circle size="small"><i class="fas fa-shipping-fast"></i></el-button> Shipping</el-breadcrumb-item>
  <el-breadcrumb-item><el-button style="width:50px; height:50px;"  type="warning" circle size="small"><i class="fas fa-credit-card"></i></el-button> Payment</el-breadcrumb-item>
  <el-breadcrumb-item><el-button style="width:50px; height:50px;"  type="warning" circle size="small"><i class="fas fa-clipboard-list"></i></el-button> Complete</el-breadcrumb-item>
</el-breadcrumb>


            </el-card>
 <el-card>
   <el-col :md="24">

                 <h4><b>Billing Information</b></h4>
        <el-form>
       <el-row :gutter="5">
         <el-col :md="12">

                <el-input placeholder="First Name"></el-input>
       
         </el-col>
         <el-col :md="12">
          
                <el-input placeholder="Last Name"></el-input>
  
         </el-col>
         
       </el-row>
             <el-row :gutter="5">
         <el-col :md="12" style="margin-top:10px;">

                <el-input placeholder="Email"></el-input>
       
         </el-col>
         <el-col :md="12" style="margin-top:10px;">
          
                <el-input placeholder="Address"></el-input>
  
         </el-col>
         
       </el-row>

              <el-row :gutter="5">
         <el-col :md="12" style="margin-top:10px;">

                <el-input placeholder="City"></el-input>
       
         </el-col>
         <el-col :md="12" style="margin-top:10px;">
          
                <el-input placeholder="State"></el-input>
  
         </el-col>
         
       </el-row>

              <el-row :gutter="5">
         <el-col :md="12" style="margin-top:10px;">

                <el-input placeholder="ZIP"></el-input>
       
         </el-col>
         <el-col :md="12" style="margin-top:10px;">
          
                <el-input placeholder="Country"></el-input>
  
         </el-col>
         
       </el-row>

         

               
          
                <el-input  style="margin-top:10px;" placeholder="phone Number"></el-input>
            
            <el-form-item>
              <hr>
          <el-button @click="checkout=true" style="float:right; margin-top:10px;" type="warning">Continue</el-button>
            </el-form-item>

  
             
        </el-form>
                
            </el-col>
<!-- <router-view></router-view> -->
 </el-card>


        </el-col>
        <el-col :md="8">
<h4 style="margin-top:0px;"><b>Order Summary</b></h4>
          <el-row v-for="(order,index) in getCarts" :key="index">
       <el-col :md="18">
   
        <h5 style="margin-bottom:5px;">{{order.product.name}} @{{order.unit}} x {{order.quantity}}</h5>
      </el-col>

      <el-col :md="6">
        <h5  style="float:right;margin-bottom:5px;">${{order.price}}</h5>
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
    



</v-container>

<v-layout row justify-center>
    <v-dialog v-model="checkout"  max-width="800px">

      <v-card>
        <v-card-title>
          <span class="headline">User Profile</span>
        </v-card-title>
 <paymentForm v-show="checkout"  v-bind:showPaymentForm=checkout />
     
      </v-card>
    </v-dialog>
  </v-layout>

</div>    
</template>

<style scoped>
.el-form-item--mini .el-form-item__content, .el-form-item--mini .el-form-item__label {
    line-height: 0px;
}
</style>

<script>
import {mapGetters} from 'vuex'
import paymentForm from './paymentForm.vue'

export default {

  data(){
    return{
checkout:false,
    }
  },
  components:{
    paymentForm
  },
    computed:{
    ...mapGetters([
      'getCarts'
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

  },
  created(){


},
mounted(){
  try {
let element = document.getElementById("blade");
element.classList.remove("fixed-navbar");
let gcsicss=document.getElementById("gcis")
let robustcss=document.getElementById("robust")
let robustjs=document.getElementById("robustjs")
gcsicss.remove()
//robustcss.remove()
//robustjs.remove()
  } catch (error) {
   console.log('error occur') 
  }
}
  
}
</script>