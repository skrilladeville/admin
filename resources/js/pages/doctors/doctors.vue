<template>
  <div class="app-container">
    <el-card>
      <div slot="header" class="clearfix">
        <span>Doctors</span>
        <router-link :to="{ name:'doctorslists.create'}">
          <el-button
            style="float: right;"
            icon="el-icon-plus"
            size="small"
            type="success"
            round
          >Add doctor</el-button>
        </router-link>
      </div>

 

    <v-client-table name="doctorlistsTable" :data="getDoctorlists" :columns="titles">
     <template slot="action" slot-scope="props">
       <div class="d-flex">
       <router-link :to="`/doctorlists/edit/${props.row.id}`"><el-button  size="small"  icon="el-icon-edit"  type="success"></el-button></router-link>
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

<style scoped>
</style>
