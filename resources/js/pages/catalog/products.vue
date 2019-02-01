<template>
      <div class="app-container">
      <el-card>
         <div slot="header" class="clearfix">
    <span>Products</span>
    <router-link :to="{name:'catalog.addProduct'}"><el-button  style="float: right;" type="success" round>Add Product</el-button></router-link>
  </div>


   <el-table
        :data="products"
        stripe
        style="width: 100%">
        <el-table-column
          prop="name"
          label="Name"
          width="180">
        </el-table-column>
        <el-table-column
          prop="symbol"
          label="Symbol"
          width="180">
        </el-table-column>
        <el-table-column
          prop="sku"
          label="SKU">
        </el-table-column>
     
        <el-table-column
          prop="description"
          label="Description">
        </el-table-column>
     

      <el-table-column
       width="180"
      label="Operations">
      <template slot-scope="scope">
     
        <el-button
          size="mini"
          type="success"
          >Edit</el-button>
  
        <el-button
          size="mini"
          type="danger"
        
          >Delete</el-button>
      </template>
    </el-table-column>
      </el-table>


   
 

           





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
data(){
    return{
products:[]
    }

},

 created(){
     axios.get('/api/catalog/product')
            .then(res=>{console.log(res.data)
            this.products=res.data
             } )
 }
   
}


</script>


