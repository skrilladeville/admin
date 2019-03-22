<template>
  <div class="app-container">
    <el-card>
      <div slot="header" class="clearfix">
        <span>Price Presets</span>
        <router-link :to="{ name:'add pricepreset'}">
          <el-button
            style="float: right;"
            icon="el-icon-plus"
            type="success"
            size="small"
          >New Preset</el-button>
        </router-link>
      </div>
  
       <v-client-table name="pricePresetTable" :data="price_presets" :columns="['name','price_type','is_custom_prices','is_dynamic_preset','action']">
     <template slot="action" slot-scope="props">
       <div class="d-flex">
       <router-link :to="`/catalog/pricePresets/edit/${props.row.id}`"><el-button  size="small"  icon="el-icon-edit"  type="success"></el-button></router-link>
     <el-button  size="small"  icon="el-icon-delete" @click="openDialog(props.$index,props.row)"  type="danger"></el-button>
       </div>
     </template>
     
   </v-client-table>

      
    
    </el-card>

    <el-dialog title="Warning" :visible.sync="centerDialogVisible" width="30%" center>
      <span>Are you sure you want to delete</span>
      <span slot="footer" class="dialog-footer">
        <el-button @click="centerDialogVisible = false">Cancel</el-button>
        <el-button type="danger" @click="Delete">Confirm</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      centerDialogVisible: false,
      index: '',
      id: '',
      price_presets: []
    }
  },
  created() {
    axios
      .get('/api/catalog/pricePreset')
      .then(res => {
        res.data.forEach(el=>{
           this.price_presets.push(el)
        })
       // this.price_presets = res.data
        this.price_presets.forEach(price => {
          if (price.is_custom_prices == 0) {
            price.is_custom_prices = 'no'
          } else {
            price.is_custom_prices = 'yes'
          }

          if (price.is_dynamic_preset == 0) {
            price.is_dynamic_preset = 'no'
          } else {
            price.is_dynamic_preset = 'yes'
          }
        })
      })
      .catch(err => {
        console.log(err)
      })
  },
  methods: {
    openDialog(index, row) {
      this.centerDialogVisible = true
      this.id = row.id
      this.index = index
    },

    Delete() {
      // console.log(row.id)
      this.centerDialogVisible = false
      let uri = `/api/catalog/pricePreset/delete/${this.id}`
      axios.post(uri).then(res => {
        console.log(res.data)
        this.price_presets.splice(this.index, 1)
      })
    }
  }
}
</script>