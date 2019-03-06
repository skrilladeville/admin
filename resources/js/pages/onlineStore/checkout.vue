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
        <el-form  size="mini">
       
            <el-form-item  label="First Name">
                <el-input></el-input>
            </el-form-item >
               <el-form-item  label="Last Name">
                <el-input></el-input>
            </el-form-item>
               <el-form-item  label="Email">
                <el-input type="email"></el-input>
            </el-form-item>
               <el-form-item  label="Address">
                <el-input></el-input>
            </el-form-item>
               <el-form-item  label="Address 2">
                <el-input></el-input>
            </el-form-item>
                 <el-form-item  label="City">
                <el-input></el-input>
            </el-form-item>
              <el-form-item  label="State">
                <el-input></el-input>
            </el-form-item>
            <el-form-item  label="Zip/PostCode">
                <el-input></el-input>
            </el-form-item>
            <el-form-item  label="Country">
                <el-input></el-input>
            </el-form-item>
            <el-form-item  label="Telephone">
                <el-input></el-input>
            </el-form-item>
            <el-form-item>
              <hr>
          <el-button style="float:right; margin-top:10px;" type="warning">Continue</el-button>
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
</div>    
</template>

<style scoped>
.el-form-item--mini .el-form-item__content, .el-form-item--mini .el-form-item__label {
    line-height: 0px;
}
</style>

<script>
import {mapGetters} from 'vuex'
export default {
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