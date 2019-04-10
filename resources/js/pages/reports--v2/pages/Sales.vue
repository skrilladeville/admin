<template>
  <widgetize title="Sales">
		<JqxGrid @sort="onSort($event)" ref="myGrid" :theme="'material'" :width="width" :source="dataAdapter" :columns="columns" :filterable="true" 
			:autoshowfiltericon="false" :sorting="true" :groupable="true">
		</JqxGrid>
		<ExportButtons @exportBtnOnClick="exportBtnOnClick"/>
  </widgetize>
</template>

<script>
import Widgetize from '../../../components/common/robust-admin/widgetize.vue'
import JqxGrid from 'jqwidgets-scripts/jqwidgets-vue/vue_jqxgrid.vue'
import ExportButtons from '../ExportButtons.vue'

export default {
  name: 'Sales',
	components: {
		Widgetize,
		JqxGrid,
		ExportButtons
	},
  data: 
    function () {
      return {
				width: '99%',
        dataAdapter: new jqx.dataAdapter(this.source),
        columns: [
					{ text: 'Date', datafield: 'order_date', cellsformat: 'd', width: 140 },
					{ text: 'Time', datafield: 'order_time', width: 120 },
					{ text: 'Customer Name', datafield: 'customer_id', width: 200 },
					{ text: 'Shelf', datafield: 'shelf_id', width: 140 },
					{ text: 'Register Name', datafield: 'register_id', width: 150 },
					{ text: 'Payment Method', datafield: 'payment_method_id', width: 140 },
					{ text: 'Order Type', datafield: 'order_type_id', width: 120 },
					{ text: 'Order Amount', datafield: 'order_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
					{ text: 'Items Qty', datafield: 'items_qty', cellsalign: 'right', cellsformat: 'f', width: 120 }
        ]
      }
  },
	beforeCreate: function () {
		this.source = {
			datatype: 'json',
			datafields: [
				{ name: 'customer_id', type: 'int' },
				{ name: 'shelf_id', type: 'int' },
				{ name: 'register_id', type: 'int' },
				{ name: 'payment_method_id', type: 'int' },
				{ name: 'order_type_id', type: 'int' },
				{ name: 'order_date', type: 'string' },
				{ name: 'order_time', type: 'string' },
				{ name: 'order_amt', type: 'float' },
				{ name: 'items_qty', type: 'int' }
			],
			id: 'id',
			url: '/api/reports/admin/sales',
			sortcolumn: 'order_date',
			sortdirection: 'desc'
		}
	},
	methods: {
		exportBtnOnClick: function (format) {
			this.$refs.myGrid.exportdata(format, 'jqxGrid');
		}
  }
}
</script>
