<template>
  <div class="app-container">
    <div class="button-container">
      <!-- <el-button class="filter-item right" type="primary" @click="dialogPermission">Add Permission</el-button> -->
      <span class="page-title">Roles and Permissions</span>
      <el-button class="filter-item right" type="primary" @click="dialogRole">Add Role</el-button>
    </div>
    <div>
      <el-tabs v-model="activeName" style="margin-top:15px;" type="border-card">
        <el-tab-pane label="Super Admin" name="super-admin">
              <div class="checklist-container">
                <div class="check-all">
                  <el-checkbox :indeterminate="isDashboard" v-model="checkAllDashboard" @change="handleCheckAllDashboard">Dashboard Display</el-checkbox>
                </div>
                <div style="margin: 15px 0;"></div>
                <div class="checkboxes-container">
                    <el-checkbox-group v-model="checkedDashboardItems" @change="handleCheckedDashboard">
                    <el-checkbox v-for="dashboardItem in dashboard" :label="dashboardItem" :key="dashboardItem">{{dashboardItem}}</el-checkbox>
                  </el-checkbox-group>
                </div>
                <div class="check-all">
                  <el-checkbox :indeterminate="isUsers" v-model="checkAllUsers" @change="handleCheckAllUsers">Users</el-checkbox>
                </div>
                <div style="margin: 15px 0;"></div>
                <div class="checkboxes-container">
                    <el-checkbox-group v-model="checkedUsersItems" @change="handleCheckedUsers">
                    <el-checkbox v-for="usersItem in users" :label="usersItem" :key="usersItem">{{usersItem}}</el-checkbox>
                  </el-checkbox-group>
                </div>
                <div class="check-all">
                  <el-checkbox :indeterminate="isPrescriptions" v-model="checkAllPrescriptions" @change="handleCheckAllPrescriptions">Prescriptions</el-checkbox>
                </div>
                <div style="margin: 15px 0;"></div>
                <div class="checkboxes-container">
                    <el-checkbox-group v-model="checkedPrescriptionsItems" @change="handleCheckedPrescriptions">
                    <el-checkbox v-for="prescriptionsItem in prescriptions" :label="prescriptionsItem" :key="prescriptionsItem">{{prescriptionsItem}}</el-checkbox>
                  </el-checkbox-group>
                </div>
                <div class="check-all">
                  <el-checkbox :indeterminate="isBookings" v-model="checkAllBookings" @change="handleCheckAllBookings">Bookings</el-checkbox>
                </div>
                <div style="margin: 15px 0;"></div>
                <div class="checkboxes-container">
                    <el-checkbox-group v-model="checkedBookingsItems" @change="handleCheckedBookings">
                    <el-checkbox v-for="bookingsItem in bookings" :label="bookingsItem" :key="bookingsItem">{{bookingsItem}}</el-checkbox>
                  </el-checkbox-group>
                </div>
                <div class="check-all">
                  <el-checkbox :indeterminate="isCatalog" v-model="checkAllCatalog" @change="handleCheckAllCatalog">Catalog</el-checkbox>
                </div>
                <div style="margin: 15px 0;"></div>
                <div class="checkboxes-container">
                    <el-checkbox-group v-model="checkedCatalogItems" @change="handleCheckedCatalog">
                    <el-checkbox v-for="catalogItem in catalog" :label="catalogItem" :key="catalogItem">{{catalogItem}}</el-checkbox>
                  </el-checkbox-group>
                </div>
                <div class="check-all">
                  <el-checkbox :indeterminate="isSales" v-model="checkAllSales" @change="handleCheckAllSales">Sales</el-checkbox>
                </div>
                <div style="margin: 15px 0;"></div>
                <div class="checkboxes-container">
                    <el-checkbox-group v-model="checkedSalesItems" @change="handleCheckedSales">
                    <el-checkbox v-for="salesItem in sales" :label="salesItem" :key="salesItem">{{salesItem}}</el-checkbox>
                  </el-checkbox-group>
                </div>
                <div class="check-all">
                  <el-checkbox :indeterminate="isCMS" v-model="checkAllCMS" @change="handleCheckAllCMS">CMS</el-checkbox>
                </div>
                <div style="margin: 15px 0;"></div>
                <div class="checkboxes-container">
                    <el-checkbox-group v-model="checkedCMSItems" @change="handleCheckedCMS">
                    <el-checkbox v-for="cmsItem in cms" :label="cmsItem" :key="cmsItem">{{cmsItem}}</el-checkbox>
                  </el-checkbox-group>
                </div>
                <div class="check-all">
                  <el-checkbox :indeterminate="isReports" v-model="checkAllReports" @change="handleCheckAllReports">Reports</el-checkbox>
                </div>
                <div style="margin: 15px 0;"></div>
                <div class="checkboxes-container">
                    <el-checkbox-group v-model="checkedReportsItems" @change="handleCheckedReports">
                    <el-checkbox v-for="reportsItem in reports" :label="reportsItem" :key="reportsItem">{{reportsItem}}</el-checkbox>
                  </el-checkbox-group>
                </div>
                <div class="check-all">
                  <el-checkbox :indeterminate="isSystem" v-model="checkAllSystem" @change="handleCheckAllSystem">System</el-checkbox>
                </div>
                <div style="margin: 15px 0;"></div>
                <div class="checkboxes-container">
                    <el-checkbox-group v-model="checkedSystemItems" @change="handleCheckedSystem">
                    <el-checkbox v-for="systemItem in system" :label="systemItem" :key="systemItem">{{systemItem}}</el-checkbox>
                  </el-checkbox-group>
                </div>
              </div>
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
    <!-- <el-dialog class="dialogSize" :visible.sync="dialogPermissionVisible">
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
    </el-dialog> -->
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Tab',
  //components: { checkList },
  data() {
    return {
      adminPermission: '',
      branchAdminPermission: '',
      doctorPermission: '',
      patientPermission: '',
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
      checkAllDashboard: false,
      checkAllUsers: false,
      checkAllPrescriptions: false,
      checkAllBookings: false,
      checkAllCatalog: false,
      checkAllSales: false,
      checkAllCMS: false,
      checkAllReports: false,
      checkAllContact: false,
      checkAllSystem: false,
      checkedDashboardItems: [],
      checkedUsersItems: [],
      checkedPrescriptionsItems: [],
      checkedBookingsItems: [],
      checkedCatalogItems: [],
      checkedSalesItems: [],
      checkedCMSItems: [],
      checkedReportsItems: [],
      checkedSystemItems: [],
      //dashboard: [],
      dashboard: ['User List', 'Catalog', 'Reports', 'Prescriptions', 'Booking', 'Continuous Care'],
      users: ['View Users', 'Add User', 'Edit User', 'Delete User', 'View Roles and Permissions', 'Add Role', 'Delete Role'],
      prescriptions: ['View Prescriptions', 'Add Prescription', 'Edit Prescription', 'Delete Prescription'],
      bookings: ['Setup Calendar', 'View Bookings', 'Create Booking', 'Edit Booking', 'Delete Booking'],
      catalog: ['View Catalog', 'Modify Users', 'View Roles and Permissions', 'Modify Roles and Permissions'],
      sales: ['Sales Orders', 'Sales Invoices', 'Shipments', 'Transactions', 'Credit Memos', 'Billing Agreements', 'Terms of Condition', 'Recurring Profiles', 'Sales Tax'],
      cms: ['View Feedback' , 'Add Feedback', 'Edit Feedback', 'Delete Feedback', 'View Survey', 'Add Survey', 'Edit Survey', 'Delete Survey', 'Widgets'],
      reports: ['Sales', 'Shopping Card', 'Products', 'Customers', 'Tags', 'Reviews', 'Search Term'],
      system: ['My Account', 'Tools', 'Notifications', 'Manage Currency', 'Transaction Emails', 'Custom Variables', 'Manage Store'],
      patients: ['Add Patient', 'Delete Patient', 'Edit Patient', 'View Patient'],
      doctors: ['Add Doctor', 'Delete Doctor', 'Edit Doctor', 'View Doctor'],
      branchAdmin: ['Add Branch Admin', 'Delete Branch Admin', 'Edit Branch Admin', 'View Branch Admin'],
      isDashboard: false,
      isUsers: false,
      isPrescriptions: false,
      isBookings: false,
      isCatalog: false,
      isSales: false,
      isCMS: false,
      isReports: false,
      isContact: false,
      isSystem: false
    }
  },
  created() {
     axios.get('/api/roles/get-admin-permission')
        .then(response => {
          this.adminPermission = response.data.permissions
          console.log(this.adminPermission)
        })
        .catch(error => {
          console.log(error)
        }),

    this.checkedDashboardItems = ['User List']
  },
  methods: {
    handleCheckAllDashboard(val) {
      this.checkedDashboardItems = val ? this.dashboard : [];
      this.isDashboard = false;
      if(val) {
         console.log(this.dashboard);
       } else {
         console.log([]);
       }

    },
    handleCheckedDashboard(value) {
      let checkedCount = value.length;
      this.checkAllDashboard = checkedCount === this.dashboard.length;
      this.isDashboard = checkedCount > 0 && checkedCount < this.dashboard.length;
    },
    handleCheckAllUsers(val) {
      this.checkedUsersItems = val ? this.users : [];
      this.isUsers = false;
    },
    handleCheckedUsers(value) {
      let checkedCount = value.length;
      this.checkAllPrescriptions = checkedCount === this.prescriptions.length;
      this.isUsers = checkedCount > 0 && checkedCount < this.users.length;
    },
    handleCheckAllPrescriptions(val) {
      this.checkedPrescriptionsItems = val ? this.prescriptions : [];
      this.isPrescriptions = false;
    },
    handleCheckedPrescriptions(value) {
      let checkedCount = value.length;
      this.checkAllPrescriptions = checkedCount === this.prescriptions.length;
      this.isPrescriptions = checkedCount > 0 && checkedCount < this.prescriptions.length;
    },
    handleCheckAllBookings(val) {
      this.checkedBookingsItems = val ? this.bookings : [];
      this.isBookings = false;
    },
    handleCheckedBookings(value) {
      let checkedCount = value.length;
      this.checkAllBookings = checkedCount === this.bookings.length;
      this.isBookings = checkedCount > 0 && checkedCount < this.bookings.length;
    },
    handleCheckAllCatalog(val) {
      this.checkedCatalogItems = val ? this.catalog : [];
      this.isCatalog = false;
    },
    handleCheckedCatalog(value) {
      let checkedCount = value.length;
      this.checkAllCatalog = checkedCount === this.catalog.length;
      this.isCatalog = checkedCount > 0 && checkedCount < this.catalog.length;
    },
    handleCheckAllSales(val) {
      this.checkedSalesItems = val ? this.sales : [];
      this.isSales = false;
    },
    handleCheckedSales(value) {
      let checkedCount = value.length;
      this.checkAllSales = checkedCount === this.sales.length;
      this.isSales = checkedCount > 0 && checkedCount < this.sales.length;
    },
    handleCheckAllCMS(val) {
      this.checkedCMSItems = val ? this.cms : [];
      this.isCMS = false;
    },
    handleCheckedCMS(value) {
      let checkedCount = value.length;
      this.checkAllCMS = checkedCount === this.cms.length;
      this.isCMS = checkedCount > 0 && checkedCount < this.cms.length;
    },
    handleCheckAllCMS(val) {
      this.checkedCMSItems = val ? this.cms : [];
      this.isCMS = false;
    },
    handleCheckedCMS(value) {
      let checkedCount = value.length;
      this.checkAllCMS = checkedCount === this.cms.length;
      this.isCMS = checkedCount > 0 && checkedCount < this.cms.length;
    },
    handleCheckAllReports(val) {
      this.checkedReportsItems = val ? this.reports : [];
      this.isReports = false;
    },
    handleCheckedReports(value) {
      let checkedCount = value.length;
      this.checkAllReports = checkedCount === this.reports.length;
      this.isReports = checkedCount > 0 && checkedCount < this.reports.length;
    },
    handleCheckAllSystem(val) {
      this.checkedSystemItems = val ? this.system : [];
      this.isSystem = false;
    },
    handleCheckedSystem(value) {
      let checkedCount = value.length;
      this.checkAllSystem = checkedCount === this.system.length;
      this.isSystem = checkedCount > 0 && checkedCount < this.system.length;
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
  .checklist-container {
    padding: 20px;
  }
  .check-all {
    background: #f8f8f8;
    padding: 8px 10px 0;
  }
  .checkboxes-container {
    padding: 10px 10px 30px;
  }
</style>
