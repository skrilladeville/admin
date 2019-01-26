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
        prop="product"
        label="Name"
        >
      </el-table-column>
      <el-table-column
        prop="sales"
        label="Sales">
      </el-table-column>
    </el-table>
</template>

<script>
  import ElTable from './../../common/ElTable.vue'

	export default {
        name: 'TopSales',
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
          product: 'Product_1',
          sales: '$0.00'
        }, {
          rank: '2',
          product: 'Product_2',
          sales: '$0.00'
        }, {
          rank: '3',
          product: 'Product_3',
          sales: '$0.00'
        }, {
         rank: '4',
          product: 'Product_4',
          sales: '$0.00'
        },
        {
          rank: '5',
          product: 'Product_5',
          sales: '$0.00'
        }]
      }
    }
	}
</script>