<template>
  <div>
    <div class="checkList-title">
      <el-checkbox :indeterminate="isIndeterminate" v-model="checkAll" @change="checkAllDashboard">Dashboard</el-checkbox>
    </div>
    <div class="checkList-body">
      <el-checkbox-group v-model="checkedCities" @change="handleCheckedCitiesChange">
        <el-checkbox v-for="city in cities" :label="city" :key="city">{{city}}</el-checkbox>
      </el-checkbox-group>
    </div>
    <div class="checkList-title">
      <el-checkbox :indeterminate="isIndeterminate" v-model="checkAll" @change="checkAllUsers">Users</el-checkbox>
    </div>
    <div class="checkList-body">
      <el-checkbox-group v-model="checkedCities" @change="handleCheckedCitiesChange">
        <el-checkbox v-for="city in cities" :label="city" :key="city">{{city}}</el-checkbox>
      </el-checkbox-group>
    </div>
  </div>
</template>
<script>
  const dashboardOptions = ['Chart', 'Doctors', 'Patients', 'Invoices', 'Bookings', 'Catalog'];
  const usersOptions = ['Manage Users', 'Roles/Permissions', 'Patients', 'Invoices', 'Bookings', 'Catalog'];
  export default {
    data() {
      return {
        checkAll: false,
        checkedCities: ['Shanghai', 'Beijing'],
        cities: cityOptions,
        isIndeterminate: true
      };
    },
    methods: {
      handleCheckAllChange(val) {
        this.checkedCities = val ? cityOptions : [];
        this.isIndeterminate = false;
      },
      handleCheckedCitiesChange(value) {
        let checkedCount = value.length;
        this.checkAll = checkedCount === this.cities.length;
        this.isIndeterminate = checkedCount > 0 && checkedCount < this.cities.length;
      }
    }
  };
</script>
<style>
  .el-tabs--border-card>.el-tabs__content {
    padding:15px;
  }
  .checkList-title {
    padding: 5px 15px 0;
    background: #f8f8f8;
  }
  .checkList-body {
    margin: 15px 0;
  }
</style>
