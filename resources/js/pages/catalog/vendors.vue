<template>
  <div class="app-container">
    <el-card>
      <div slot="header" class="clearfix">
        <span>Vendors</span>
        <router-link :to="{ name:'catalog.addvendors'}">
          <el-button
            style="float: right;"
            icon="el-icon-plus"
            size="small"
            type="success"
            round
          >Add vendor</el-button>
        </router-link>
      </div>

 

    <v-client-table name="vendors" :data="getVendors" :columns="titles">
     <template slot="action" slot-scope="props">
       <div class="d-flex">
       <router-link :to="`/catalog/vendors/edit/${props.row.id}`"><el-button  size="small"  icon="el-icon-edit"  type="success"></el-button></router-link>
     <el-button  size="small"  icon="el-icon-delete" @click="openDialog(props.index,props.row)"  type="danger"></el-button>
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
// import {mapState} from 'vuex';
// import {api} from '../../config'

import axios from 'axios'

export default {
  mounted() {
    console.log('creeate')
    axios
      .get('/api/catalog/vendor')
      .then(response => {
        
        response.data.forEach(element => {
              this.$store.commit('SET_VENDOR',element)
        })
        console.log(response.data)
      })
      .catch(error => {
        console.log(error)
      })
  },
  data() {
    return {
      centerDialogVisible: false,
      id: '',
      index: '',
     // vendors: [],
      titles: [
        'name','phone','email','description','action'
      ],
      
    }
  },
      computed: {
      getVendors(){
        // console.log("naa ra"+this.$store.getters.getVendors)
        return this.$store.getters.getVendors
      }
    },
  methods: {
    openDialog(index, row) {
      this.centerDialogVisible = true
      this.id = row.id
      this.index = index
      console.log(this.index)
    },
    Delete() {
      // console.log(row.id)
      this.centerDialogVisible = false
      let uri = `/api/catalog/vendor/delete/${this.id}`
      axios.post(uri).then(res => {
        console.log(res.data)
       this.$store.commit('DELETE_VENDOR',this.index)
     
      })
    },
    handleSelectionChange(val) {
      this.selectedRow = val
    }
  }
}
</script>

<style scoped>
</style>
