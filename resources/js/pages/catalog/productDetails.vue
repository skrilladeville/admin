<template>
    <div>

        <el-card>

            <el-row :gutter="5">
                <el-col :md="6">
                  <div class="thumbnail">
                    <img :src="`/uploadedImages/${product.image}`"  alt="">
                </div>
                <el-menu
      default-active="1"
      class="el-menu-vertical-demo"
    >
      <el-menu-item index="1">
        <i class="el-icon-menu"></i>
        <span>Management</span>
      </el-menu-item>
      <el-menu-item index="2">
        <i class="el-icon-document"></i>
        <span>Specials</span>
      </el-menu-item>
      <el-menu-item index="3">
        <i class="el-icon-setting"></i>
        <span>Pakages</span>
      </el-menu-item>
         <el-menu-item index="4">
        <i class="el-icon-setting"></i>
        <span>Documents</span>
      </el-menu-item>
         <el-menu-item index="5">
        <i class="el-icon-setting"></i>
        <span>History</span>
      </el-menu-item>
    </el-menu>


                </el-col>
                <el-col :md="18">
                    <h3>{{product.name}}</h3>
                    <el-breadcrumb separator="/">
  <el-breadcrumb-item>{{product.product_category.name}}</el-breadcrumb-item>
  <el-breadcrumb-item>{{product.price_measurement}}<span v-if="product.price_measurement =='Per Unit' || product.price_measurement=='Per Unit Range'"> {{product.net_weight}} g</span></el-breadcrumb-item>
  <el-breadcrumb-item>promotion list</el-breadcrumb-item>

</el-breadcrumb>
<br>
<br>
<br>

<template v-if="product.price_measurement=='Per Unit'">
  <el-table
    :data="inventories"
      border
    style="width: 100%">
    <el-table-column
      prop="branch_id"
      label="Branch"
      width="180"
   >
    </el-table-column>
    
    <el-table-column
      prop="total_qty_per_unit"
      label="Total"
   >
    </el-table-column>

  </el-table>
</template>
<template v-if="product.price_measurement=='Per Unit Range'">
  <el-table
    :data="inventories"
      border
    style="width: 100%">
    <el-table-column
      prop="branch_id"
      label="Branch"
      width="180"
   >
    </el-table-column>
    
    <el-table-column
      prop="total_qty_per_unit_range"
      label="Total"
   >
    </el-table-column>

  </el-table>
</template>
<template v-if="product.price_measurement=='Weight'">
  <el-table
    :data="inventories"
      border
    style="width: 100%">
    <el-table-column
      prop="branch_id"
      label="Branch"
      width="180"
   >
    </el-table-column>
    
    <el-table-column
      prop="jar_g_total"
      label="in jar"
   >
    </el-table-column>
    <el-table-column
      prop="one_g_total"
      label="1g">
    </el-table-column>
        <el-table-column
      prop="one_eight_oz_total"
      label="1/8oz">
    </el-table-column>
            <el-table-column
      prop="one_fourth_oz_total"
      label="1/4oz">
    </el-table-column>
            <el-table-column
      prop="one_half_oz_total"
      label="1/2oz">
    </el-table-column>
      
            <el-table-column
      prop="one_oz_total"
      label="1oz">
    </el-table-column>
      <el-table-column
      prop="pre_pack_total"
      label="pre-pack">
    </el-table-column>
  </el-table>
</template>



                </el-col>


            </el-row>
        </el-card>

    </div>
</template>
<style scoped>

.thumbnail {
  position: relative;
  width: 235px;
  height: 150px;
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


.image {
  width: 100%;
  display: block;
}


</style>

<script>
export default {
data(){
    return{
        product:{name:'',product_category:{name:''}},
     
    }
},
computed:{
inventories(){
  console.log(this.product.inventories)
  let inventories=[]
  this.product.inventories.forEach(el=>{
    console.log(el.branch_name)
    inventories.push(el)
  })
  console.log(inventories)
  return inventories
}
},
created() {
  axios.get(`/api/catalog/product/view/${this.$route.params.id}`).then(res=>{
      this.product=res.data
      console.log(res.data)

      this.product.inventories.forEach(el=>{
        axios.get(`/api/user/branch/view/${el.branch_id}`).then(res=>{
       el['branch_id']=`${res.data.branch_name}`
   
        
        })
      })



      
  })


},    
}
</script>

