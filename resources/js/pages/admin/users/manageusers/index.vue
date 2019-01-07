<template>
  <div class="tab-container">
    <div class="button-container">
      <el-button class="filter-item right" type="primary" @click="dialogUser">Add User</el-button>
    </div>
    <div>
      <el-tabs v-model="activeName" style="margin-top:15px;" type="border-card">
        <el-tab-pane v-for="item in tabMapOptions" :label="item.label" :key="item.key" :name="item.key">
          <keep-alive>
            <users-list/>
            <!-- <tab-pane v-if="activeName==item.key" :type="item.key"/> -->
          </keep-alive>
        </el-tab-pane>
      </el-tabs>
    </div>
    <el-dialog class="dialogSize" :visible.sync="dialogUserVisible">
      <el-form ref="dataForm" :rules="rules" :model="temp" label-position="left" label-width="140px" placeholder="Enter Permission Name" style="width: 400px; margin-left:50px;">
        <el-form-item label="Name" prop="title">
          <el-input v-model="temp.title"/>
        </el-form-item>
        <el-form-item label="Username" prop="title">
          <el-input v-model="temp.title"/>
        </el-form-item>
        <el-form-item label="Password" prop="title">
          <el-input v-model="temp.title"/>
        </el-form-item>
        <el-form-item label="Role">
          <el-select v-model="temp.status" class="filter-item" placeholder="Please select">
            <el-option v-for="item in statusOptions" :key="item" :label="item" :value="item"/>
          </el-select>
        </el-form-item>
      </el-form>
      <div slot="footer" class="dialog-footer">
        <el-button @click="dialogUserVisible = false">Cancel</el-button>
        <el-button type="primary" @click="addUser()">Confirm</el-button>
      </div>
    </el-dialog>
  </div>
</template>

<script>
import axios from 'axios'
import usersList from './usersList'

export default {
  name: 'Tab',
  components: { usersList },
  data() {
    return {
      tabMapOptions: [
        { label: 'Super Administrator', key: 'SA' },
        { label: 'Branch Administrator', key: 'BA' },
        { label: 'Doctor', key: 'doc' },
        { label: 'Patient', key: 'Pa' },
        { label: 'Online User', key: 'OU' }
      ],
      activeName: 'CN',
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
      dialogUserVisible: false,
      statusOptions: ['Branch Administrator', 'Doctor', 'Patient', 'Online User']
    }
  },
  created() {
    this.getRolesPermissions()
  },
  methods: {
    getRolesPermissions() {

    },
    resetTemp() {
        this.temp = {
        title: '',
        description: ''
      }
    },
    dialogUser() {
      this.resetTemp()
      this.dialogStatus = 'Create User Role'
      this.dialogUserVisible = true
      this.$nextTick(() => {
        //this.$refs['dataForm'].clearValidate()
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
