<template>
 <div class="app-container">
     <el-card>
    <div slot="header" class="clearfix">
    <span>Add Price Presets</span>
    <el-button style="float: right; padding: 3px 0" type="text"><router-link :to="{ name:'add pricepreset'}">New Preset</router-link></el-button>
  </div>
  <el-table
    ref="multipleTable"
    :data="price_presets"
    style="width: 100%"
    >
    <el-table-column
      type="selection"
      width="55">
    </el-table-column>
    <el-table-column
      label="Id"
      width="55">
      <template slot-scope="scope">{{ scope.row.id }}</template>
    </el-table-column>
    <el-table-column
      property="name"
      label="Name"
      width="120">
    </el-table-column>
    <el-table-column
      property="price_type"
      label="Price Type"
      show-overflow-tooltip>
    </el-table-column>
        <el-table-column
      property="is_custom_prices"
      label="Custom Prices"
      show-overflow-tooltip>
    </el-table-column>
        <el-table-column
      property="is_dynamic_preset"
      label="Dynamic Price"
      show-overflow-tooltip>
    </el-table-column>

    <el-table-column
      label="Operations">
      <template slot-scope="scope">
        <el-button
          size="mini"
          >Edit</el-button>
        <el-button
          size="mini"
          type="danger"
        @click="handleDelete(scope.$index, scope.row)"
          >Delete</el-button>
      </template>
    </el-table-column>
  </el-table>
  <!-- <div style="margin-top: 20px">
    <el-button @click="toggleSelection([tableData3[1], tableData3[2]])">Toggle selection status of second and third rows</el-button>
    <el-button @click="toggleSelection()">Clear selection</el-button>
  </div> -->

     </el-card>
 </div>
</template>

<script>
export default {

    data(){
        return{
            price_presets:[]
        }
        
    }, 
    created(){
        axios.get('/api/catalog/pricePreset')
            .then(res=>{
                this.price_presets=res.data;
                this.price_presets.forEach(price=>{
                    if(price.is_custom_prices ==0){
                      price.is_custom_prices="no"  
                    }
                    else{
                      price.is_custom_prices="yes"   
                    }

                     if(price.is_dynamic_preset ==0){
                      price.is_dynamic_preset="no"  
                    }
                    else{
                      price.is_dynamic_preset="yes"   
                    }
                })
            }).catch(err=>{
                console.log(err)
            })
    },
    methods:{
        handleDelete(index,row){
            console.log(row.id)
            let uri=`/api/catalog/pricePreset/delete/${row.id}`
            axios.post(uri)
                .then(res=>{
                    console.log(res.data)
                    this.price_presets.splice(index,1)
                })
        
        }
    }
    
}

</script>