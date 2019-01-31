<template>
      <div class="app-container">
      <el-card>
         <div slot="header" class="clearfix">
    <span>Products</span>
    <router-link :to="{name:'catalog.addProduct'}"><el-button  style="float: right;" type="success" round>Add Product</el-button></router-link>
  </div>


   
 

           





      </el-card>


  



      </div>




    
</template>

<style scoped>

.content{
    margin-top: 100px;
    margin-left: 20px;
    margin-right: 20px;
}
</style>

<script>


export default {
 name: 'product-categories',
   
}


</script>


