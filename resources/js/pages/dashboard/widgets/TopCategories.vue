<template>
 <el-table
      :data="tableData"
      style="width: 100%">
      <el-table-column
        prop="rank"
        label="#"
       >
      </el-table-column>
      <el-table-column
        prop="category"
        label="Category"
        >
      </el-table-column>
      <el-table-column
        prop="sales"
        label="Sales">
      </el-table-column>
    </el-table>
</template>

<script>

	export default {
        name: 'TopCategories',
       methods: {
      tableRowClassName({row, rowIndex}) {
        if (rowIndex === 1) {
          return 'warning-row';
        } else if (rowIndex === 3) {
          return 'success-row';
        }
        return '';
      }
    },
    data() {
       return {
        tableData:  [{
          rank: '1',
          category: 'Category_1',
          sales: '$0.00'
        }, {
          rank: '2',
          category: 'Category_2',
          sales: '$0.00'
        }, {
          rank: '3',
          category: 'Category_3',
          sales: '$0.00'
        }, {
         rank: '4',
          category: 'Category_4',
          sales: '$0.00'
        },
        {
          rank: '5',
          category: 'Category_5',
          sales: '$0.00'
        }]
      }
    }
	}
</script>