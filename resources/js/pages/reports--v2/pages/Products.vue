<template>
	<widgetize title="Product Sales">
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
  name: 'Products',
	components: {
		Widgetize,
		JqxGrid,
		ExportButtons
	},
	data: function () {
		return {
			width: '99%',
			dataAdapter: new jqx.dataAdapter(this.source),
			columns: [
				{ text: 'Date Sold', datafield: 'date_sold', width: 140 },
				{ text: 'Product Name', datafield: 'product_id', width: 200 },
				{ text: 'Register Name', datafield: 'register_id', width: 150 },
				{ text: 'Shelf', datafield: 'shelf_id', width: 140 },
				{ text: 'Order Type', datafield: 'order_type_id', width: 120 },
				{ text: 'Source', datafield: 'source_id', width: 140 },
				{ text: 'Qty Sold', datafield: 'sold_qty', cellsalign: 'right', cellsformat: 'f', width: 120 },
				{ text: 'Unit Price', datafield: 'price_unit', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Transactions', datafield: 'transaction_qty', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Gross Sales', datafield: 'sales_gross', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'COGS', datafield: 'COGS', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Gross Profit', datafield: 'profit_gross', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Gross Profit %', datafield: 'profit_gross_percent', cellsalign: 'right', cellsformat: 'f', width: 120 }
			]
		}
	},
	beforeCreate: function () {
		this.source = {
			datatype: 'json',
			datafields: [
				{ name: 'date_sold', type: 'string' },
				{ name: 'product_id', type: 'string' },
				{ name: 'register_id', type: 'int' },
				{ name: 'shelf_id', type: 'int' },
				{ name: 'order_type_id', type: 'int' },
				{ name: 'source_id', type: 'int' },
				{ name: 'sold_qty', type: 'int' },
				{ name: 'price_unit', type: 'float' },
				{ name: 'transaction_qty', type: 'int' },
				{ name: 'sales_gross', type: 'float' },
				{ name: 'COGS', type: 'float' },
				{ name: 'profit_gross', type: 'float' },
				{ name: 'profit_gross_percent', type: 'int' }
			],
			id: 'id',
			url: '/api/reports/admin/products',
			sortcolumn: 'date_sold',
			sortdirection: 'asc'
		};
	},
	methods: {
		exportBtnOnClick: function (format) {
			this.$refs.myGrid.exportdata(format, 'jqxGrid');
		},
		ready: function () {
				this.addfilter();
		},
		onSort: function (event) {
			let sortinformation = event.args.sortinformation;
			let sortdirection = sortinformation.sortdirection;
			let sortcolumn = sortinformation.sortcolumn;
			console.log("Sorted by: " + sortcolumn);
		}
	}
}
</script>