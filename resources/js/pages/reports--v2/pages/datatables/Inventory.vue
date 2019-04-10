<template>
	<widgetize title="Purchase Inventory">
		<el-tabs type="card">
			<el-tab-pane>
				<span slot="label"><i class="fa fa-table"></i> Table</span>
				<JqxGrid @sort="onSort($event)" @filter="onFilter($event)" ref="myGrid" :theme="'material'" :width="width" :source="dataAdapter" :columns="columns" :filterable="true" 
					:autoshowfiltericon="false" :sorting="true" :groupable="true" :groups="['created_at']" @bindingcomplete="onBindingcomplete($event)">
				</JqxGrid>
				<ExportButtons @exportBtnOnClick="exportBtnOnClick"/>
			</el-tab-pane>
			<el-tab-pane>
				<span slot="label"><i class="fa fa-chart-bar"></i> Chart</span>
				<line-chart :chart-data="datacollection"></line-chart>
				<tipChartFilter/>
			</el-tab-pane>
		</el-tabs>
	</widgetize>		
</template>

<script>
import Widgetize from '../../../../components/common/robust-admin/widgetize.vue'
import JqxGrid from 'jqwidgets-scripts/jqwidgets-vue/vue_jqxgrid.vue'
import ExportButtons from '../../ExportButtons.vue'
import LineChart from '../../../../components/common/vue-chartjs/LineChart.vue'
import tipChartFilter from '../../../../components/common/vue-chartjs/tipChartFilter.vue'

export default {
	name: 'Inventory',
	components: {
		Widgetize,
		JqxGrid,
		ExportButtons,
		LineChart,
		tipChartFilter
	},
	data: function () {
		return {
      datacollection: null,
			gridData: ['grid','data'],
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
				{ name: 'receiver_id', type: 'string' },
				{ name: 'product_id', type: 'string' },
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
			this.fillChart()
			console.log("Sorted by: " + sortcolumn);
		},
    fillChart () {
			this.gridData = this.$refs.myGrid.getrows()
			this.labels = this.gridData.map(entry => entry.created_at)
			this.product_qty = this.gridData.map(entry => entry.product_qty)
			this.datacollection = {
				labels: this.labels,
				datasets: [
					{
						label: 'Product Quantity',
						backgroundColor: '#519c4e',
						data: this.product_qty
					}
				]
      }
		},
		onBindingcomplete: function (event){
			this.fillChart()
		},
		onFilter: function (event) {
			this.fillChart()
		}
	}
}
</script>
