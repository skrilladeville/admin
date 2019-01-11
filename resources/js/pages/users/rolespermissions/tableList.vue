<template>
  <div>
    <el-table>
      <el-table-column
        label=""
        style="width: 100%"
        border>
      </el-table-column>
      <el-table-column
        label="Create"
        width="100"
        style="background: #f8f8f8">
      </el-table-column>
      <el-table-column
        label="View"
        width="100">
      </el-table-column>
      <el-table-column
        label="Edit"
        width="100">
      </el-table-column>
      <el-table-column
        label="Delete"
        width="100">
      </el-table-column>
    </el-table>
    <el-table
      ref="multipleTable"
      :data="dashboard"
      style="width: 100%"
      border
      @selection-change="handleSelectionChange">
      <el-table-column
        property="page"
        label="Dashboard"
        width="300"
        show-overflow-tooltip
        style="backround: #f8f8f8;">
      </el-table-column>
      <el-table-column
        property="description"
        label="Description"
        show-overflow-tooltip>
      </el-table-column>
      <el-table-column
        type="selection"
        width="100">
      </el-table-column>
      <el-table-column
        type="selection"
        width="100">
      </el-table-column>
      <el-table-column
        type="selection"
        width="100">
      </el-table-column>
      <el-table-column
        type="selection"
        width="100">
      </el-table-column>
    </el-table>
    <el-table
      ref="multipleTable"
      :data="users"
      style="width: 100%"
      border
      @selection-change="handleSelectionChange">
      <el-table-column
        property="page"
        label="Users"
        width="300"
        show-overflow-tooltip
        style="backround: #f8f8f8;">
      </el-table-column>
      <el-table-column
        property="description"
        label=""
        show-overflow-tooltip>
      </el-table-column>
      <el-table-column
        type="selection"
        width="100">
      </el-table-column>
      <el-table-column
        type="selection"
        width="100">
      </el-table-column>
      <el-table-column
        type="selection"
        width="100">
      </el-table-column>
      <el-table-column
        type="selection"
        width="100">
      </el-table-column>
    </el-table>
    <!-- <div style="margin-top: 20px">
      <el-button @click="toggleSelection([tableData3[1], tableData3[2]])">Toggle selection status of second and third rows</el-button>
      <el-button @click="toggleSelection()">Clear selection</el-button>
    </div> -->
  </div>
</template>

<script>
  export default {
    data() {
      return {
        dashboard: [{
          page: 'Chart',
          description: 'View sales, invoices, records daily, weekly or monthly',
          create: '',
          view: '',
          update: '',
          delete: ''
        }, {
          page: 'Invoices',
          description: 'List current invoices',
          create: '',
          view: '',
          update: '',
          delete: ''
        }, {
          page: 'Customers',
          description: 'Show top customers',
          create: '',
          view: '',
          update: '',
          delete: ''
        }, {
          page: 'Doctors',
          description: 'List newly added or update doctors',
          create: '',
          view: '',
          update: '',
          delete: ''
        }, {
          page: 'Patients',
          description: 'List newly added or update patients',
          create: '',
          view: '',
          update: '',
          delete: ''
        }],
        users: [{
          page: 'Doctors',
          description: 'List doctors page',
          create: '',
          view: '',
          update: '',
          delete: ''
        }, {
          page: 'Patients',
          description: 'List doctors page',
          create: '',
          view: '',
          update: '',
          delete: ''
        }, {
          page: 'Staff',
          description: 'List staff page',
          create: '',
          view: '',
          update: '',
          delete: ''
        }, {
          page: 'Online Users',
          description: 'List online users page',
          create: '',
          view: '',
          update: '',
          delete: ''
        }],
        multipleSelection: []
      }
    },

    methods: {
      toggleSelection(rows) {
        if (rows) {
          rows.forEach(row => {
            this.$refs.multipleTable.toggleRowSelection(row);
          });
        } else {
          this.$refs.multipleTable.clearSelection();
        }
      },
      handleSelectionChange(val) {
        this.multipleSelection = val;
      }
    }
  }
</script>
<style>
  .el-table__empty-block {
    display: none;
  }
  .el-table th, .el-table tr {
      background-color: transparent;
  }
  .el-table thead {
      color: #333333;
      font-weight: 500;
      text-transform: uppercase;
      background: #f8f8f8;
  }
  .el-table td, .el-table th {
    padding: 5px 10px;
  }
</style>
