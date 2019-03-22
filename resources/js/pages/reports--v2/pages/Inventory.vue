<template>
	<widgetize title="Purchase Inventory">
		<JqxGrid @sort="onSort($event)" ref="myGrid" :theme="'material'" :width="width" :source="dataAdapter" :columns="columns" :filterable="true" 
			:autoshowfiltericon="false" :sorting="true" :groupable="true" :groups="['created_at']">
		</JqxGrid>
		<ExportButtons @exportBtnOnClick="exportBtnOnClick"/>
	</widgetize>		
</template>

<script>
import Widgetize from '../../../components/common/widgetize.vue'
import JqxGrid from 'jqwidgets-scripts/jqwidgets-vue/vue_jqxgrid.vue'
import ExportButtons from '../ExportButtons.vue'

export default {
  name: 'Inventory',
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
							{ text: 'Date', datafield: 'created_at', width: 140 },
							{ text: 'Transaction No.', datafield: 'transaction_id', width: 120 },
							{ text: 'Vendor', datafield: 'vendor_id', width: 200 },
							{ text: 'Receiver', datafield: 'receiver_id', width: 200 },
							{ text: 'Product Name', datafield: 'product_id', width: 200 },
							{ text: 'Product Qty', datafield: 'product_qty', cellsalign: 'right', cellsformat: 'f', width: 120 },
							{ text: 'Unit', datafield: 'product_unit_id', width: 60 },
							{ text: 'Product Amt', datafield: 'product_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 }
					]
			}
	},
	beforeCreate: function () {
			this.source = {
					datatype: 'json',
					datafields: [
							{ name: 'transaction_id', type: 'string' },
							{ name: 'created_at', type: 'string' },
							{ name: 'vendor_id', type: 'string' },
							{ name: 'receiver_id', type: 'int' },
							{ name: 'product_id', type: 'int' },
							{ name: 'product_qty', type: 'int' },
							{ name: 'product_unit_id', type: 'string' },
							{ name: 'product_amt', type: 'float' }
					],
					id: 'id',
					url: '/api/reports/admin/inventory',
					sortcolumn: 'created_at',
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
