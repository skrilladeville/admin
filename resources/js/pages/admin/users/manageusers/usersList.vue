<template>
  <div>
    <el-table
    ref="multipleTable"
    :data="tableData3"
    style="width: 100%"
    border
    @selection-change="handleSelectionChange">
    <el-table-column
      type="selection"
      width="55">
    </el-table-column>
    <el-table-column
      property="username"
      label="Username"
      width="120">
    </el-table-column>
    <el-table-column
      property="name"
      label="Full Name"
      width="120">
    </el-table-column>
    <el-table-column
      property="address"
      label="Email Address"
      show-overflow-tooltip>
    </el-table-column>
    <el-table-column
      label="Status"
      width="120">
      <template slot-scope="scope">{{ scope.row.status }}</template>
    </el-table-column>
    <el-table-column
      label="Date Added"
      width="120">
      <template slot-scope="scope">{{ scope.row.date }}</template>
    </el-table-column>
    <el-table-column
          label="Operations">
          <template slot-scope="scope">
            <el-button
              size="mini"
              @click="handleEdit(scope.$index, scope.row)">Edit</el-button>
            <el-button
              size="mini"
              type="danger"
              @click="handleDelete(scope.$index, scope.row)">Delete</el-button>
          </template>
        </el-table-column>
      </el-table>
  </el-table>
  </div>
  <!--
  <div style="margin-top: 20px">
    <el-button @click="toggleSelection([tableData3[1], tableData3[2]])">Toggle selection status of second and third rows</el-button>
    <el-button @click="toggleSelection()">Clear selection</el-button>
  </div> -->
</template>

<script>
  export default {
    data() {
      return {
        tableData3: [{
          username: 'jjStone',
          name: 'Jack Stone',
          address: 'jxsd@gmail.com',
          date: '2016-05-03',
          status: 'Active'
        }, {
          username: 'tommmm',
          name: 'Tom Mayer',
          address: 'tester@yahoo.com',
          date: '2016-05-02',
          status: 'Active'
        }, {
          username: 'julia888',
          name: 'Julie Julia',
          address: 'gsdfgsdf@hotmail.com',
          date: '2016-05-04',
          status: 'Active'
        }, {
          username: 'beepbeep',
          name: 'Juan Dela Cruz',
          address: 'testser@asdf.com',
          date: '2016-05-01',
          status: 'Active'
        }, {
          username: 'stonecold',
          name: 'Pepe Smith',
          address: 'testserse@asdf.com',
          date: '2016-05-08',
          status: 'Active'
        }, {
          username: 'padawan',
          name: 'Darth Vader',
          address: '123@gmail.com',
          date: '2016-05-06',
          status: 'Active'
        }, {
          username: 'realonda',
          name: 'Jose Rizal',
          address: 'oiu@hotmail.com',
          date: '2016-05-07',
          status: 'Active'
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
