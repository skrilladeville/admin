<template>
  <div class="app-container">
    <div class="button-container">
      <el-button class="filter-item right" type="primary" @click="dialogPermission">Add Permission</el-button>
      <el-button class="filter-item right" type="primary" @click="dialogRole">Add Role</el-button>
    </div>
    <div>
      <el-tabs v-model="activeName" style="margin-top:15px;" type="border-card">
        <el-tab-pane v-for="item in roleNames" :label="item.name" :key="item.id" :name="item.name">
          <keep-alive>
            <tab-pane v-if="activeName==item.name" :type="item.id" @create="showCreatedTimes"/>
            <check-list/>
          </keep-alive>
        </el-tab-pane>
      </el-tabs>
    </div>
    <el-dialog class="dialogSize" :visible.sync="dialogRoleVisible">
      <el-form ref="dataForm" :rules="rules" :model="temp" label-position="left" label-width="100px" placeholder="Enter Role Name" style="width: 400px; margin-left:50px;">
        <el-form-item label="Role Name" prop="title">
          <el-input v-model="temp.title"/>
        </el-form-item>
        <el-form-item label="Description">
          <el-input :autosize="{ minRows: 2, maxRows: 4}" v-model="temp.remark" type="textarea" placeholder="Enter Description"/>
        </el-form-item>
      </el-form>
      <div slot="footer" class="dialog-footer">
        <el-button @click="dialogRoleVisible = false">Cancel</el-button>
        <el-button type="primary" @click="createRole()">Confirm</el-button>
      </div>
    </el-dialog>
    <el-dialog class="dialogSize" :visible.sync="dialogPermissionVisible">
      <el-form ref="dataForm" :rules="rules" :model="temp" label-position="left" label-width="140px" placeholder="Enter Permission Name" style="width: 400px; margin-left:50px;">
        <el-form-item label="Permission Name" prop="title">
          <el-input v-model="temp.title"/>
        </el-form-item>
        <el-form-item label="Description">
          <el-input :autosize="{ minRows: 2, maxRows: 4}" v-model="temp.remark" type="textarea" placeholder="Enter Description"/>
        </el-form-item>
      </el-form>
      <div slot="footer" class="dialog-footer">
        <el-button @click="dialogPermissionVisible = false">Cancel</el-button>
        <el-button type="primary" @click="addPermission()">Confirm</el-button>
      </div>
    </el-dialog>
  </div>
</template>

<script>
import axios from 'axios'
import checkList from './checkList'

export default {
  name: 'Tab',
  components: { checkList },
  data() {
    return {
      roleNames: '',
      activeName: 'super-admin',
      createdTimes: 0,
      rules: {
        title: [{ required: true, message: 'Role name is required', trigger: 'blur' }]
      },
      temp: {
        id: undefined,
        title: '',
        description: '',
      },
      dialogRoleVisible: false,
      dialogPermissionVisible: false,
    }
  },
  created() {
     axios.get('/api/roles/get-roles')
        .then(response => {
          this.roleNames = response.data
          console.log(this.roleNames)
        })
        .catch(error => {
          console.log(error)
        })
  },
  methods: {
    getRoles() {

    },
    resetTemp() {
        this.temp = {
        title: '',
        description: ''
      }
    },
    dialogRole() {
      this.resetTemp()
      this.dialogStatus = 'Create User Role'
      this.dialogRoleVisible = true
      this.$nextTick(() => {
        //this.$refs['dataForm'].clearValidate()
      })
    },
    dialogPermission(){
      this.resetTemp()
      this.dialogStatus = 'Add User Permission'
      this.dialogPermissionVisible = true
      this.$nextTick(() => {
       // this.$refs['dataForm'].clearValidate()
      })
    },
    createRole() {
      axios.post('/api/user/create-role', { data: this.temp })
            .then(function (response) {
              console.log(response.data)
            })
            .catch(function (error) {
            })
      this.dialogRoleVisible = false
    }
  }
}
</script>

<style scoped>
  .tab-container{
    margin: 110px 30px 30px;
  }
  .dialogSize {
    left: -180px;
    position: absolute;
    margin:50px auto;
    width: 65% !important;
  }
</style>
