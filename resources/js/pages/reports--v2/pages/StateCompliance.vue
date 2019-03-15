<template>
	<widgetize title="Excise Tax Report (CA)">
		<JqxGrid @sort="onSort($event)" ref="myGrid" :theme="'material'" :width="width" :source="dataAdapter" :columns="columns" :filterable="true" 
			:autoshowfiltericon="false" :sorting="true" :groupable="true" :groups="['month_sold']">
		</JqxGrid>
		<ExportButtons @exportBtnOnClick="exportBtnOnClick"/>
	</widgetize>		
</template>

<script>
import Widgetize from '../../../components/common/widgetize.vue'
import JqxGrid from 'jqwidgets-scripts/jqwidgets-vue/vue_jqxgrid.vue'
import ExportButtons from '../ExportButtons.vue'

export default {
  name: 'StateCompliance',
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
							{ text: 'Product Name', datafield: 'product_id', width: 200 },
							{ text: 'Month Sold', datafield: 'month_sold', cellsformat: 'd', width: 140 },
							{ text: 'Sold In', datafield: 'location_id', width: 150 },
							{ text: 'Sale Qty', datafield: 'sold_qty', cellsalign: 'right', cellsformat: 'f', width: 100 },
							{ text: 'Total Sale', datafield: 'sold_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
							{ text: 'Tax Amount', datafield: 'tax_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
							{ text: 'Tax Calculation', datafield: 'tax_calc', width: 350 },
							{ text: 'Returned Qty', datafield: 'returned_qty', cellsalign: 'right', cellsformat: 'f', width: 130 },
							{ text: 'Returned Amt', datafield: 'returned_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
							{ text: 'Tax Return Amount', datafield: 'tax_return_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
							{ text: 'Tax Adjust Amount', datafield: 'tax_adjust_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 }
					]
			}
	},
	beforeCreate: function () {
			this.source = {
					datatype: 'json',
					datafields: [
							{ name: 'product_id', type: 'string' },
							{ name: 'month_sold', type: 'string' },
							{ name: 'location_id', type: 'string' },
							{ name: 'sold_qty', type: 'int' },
							{ name: 'sold_amt', type: 'float' },
							{ name: 'tax_amt', type: 'float' },
							{ name: 'tax_calc', type: 'string' },
							{ name: 'returned_qty', type: 'int' },
							{ name: 'returned_amt', type: 'float' },
							{ name: 'tax_return_amt', type: 'float' },
							{ name: 'tax_adjust_amt', type: 'float' }
					],
					id: 'id',
					url: '/api/reports/admin/state-compliance',
					sortcolumn: 'month_sold',
					sortdirection: 'desc'
			};
	},
	methods: {
		exportBtnOnClick: function (format) {
			this.$refs.myGrid.exportdata(format, 'jqxGrid');
		},
		ready: function () {
			//this.addfilter();
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
