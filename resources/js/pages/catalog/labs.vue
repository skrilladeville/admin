<template>
  <div class="app-container">
    <el-card>
      <div slot="header" class="clearfix">
        <span>Labs</span>
        <router-link :to="{ name:'add lab'}">
        <el-button style="float: right;" type="success" icon="el-icon-plus" size="small" round>
          Add Lab
        </el-button>
        </router-link>
      </div>

       <v-client-table name="labTable" :data="getLabs" :columns="['name','email','phone','description','action']">
     <template slot="action" slot-scope="props">
       <div class="d-flex">
       <router-link :to="`/catalog/lab/edit/${props.row.id}`"><el-button  size="small"  icon="el-icon-edit"  type="success"></el-button></router-link>
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
// import {mapState} from 'vuex';
// import {api} from '../../config'

import axios from 'axios'

export default {
  created() {
    console.log('creeate')
    axios
      .get('/api/catalog/lab')
      .then(response => {
       response.data.forEach(element => {
          this.$store.commit('SET_LAB',element)
        });
        console.log(response)
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
      labs: []
    }
  },
  computed:{
    getLabs(){
      return this.$store.getters.getLabs
    }
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
      let uri = `/api/catalog/lab/delete/${this.id}`
      axios.post(uri).then(res => {
        console.log(res.data)
        this.$store.commit('DELETE_LAB',this.index)
      })
    }
  }
}
</script>

<style scoped>
.box-card {
  margin-top: 100px;
  margin-left: 20px;
  margin-right: 20px;
}
.card-body {
  padding: 10px;
}

label {
  font-size: 12px !important;
}
</style>
