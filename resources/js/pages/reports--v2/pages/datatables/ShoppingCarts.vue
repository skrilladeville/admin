<template>
	<widgetize title="Shopping Carts">
		<el-tabs type="card">
			<el-tab-pane>
				<span slot="label"><i class="fa fa-table"></i> Table</span>
				<JqxGrid @sort="onSort($event)" @filter="onFilter($event)" ref="myGrid" :theme="'material'" :width="width" :source="dataAdapter" :columns="columns" :filterable="true" 
					:autoshowfiltericon="false" :sorting="true" :groupable="true" @bindingcomplete="onBindingcomplete($event)">
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
import Widgetize from '../../../../components/common/widgetize.vue'
import JqxGrid from 'jqwidgets-scripts/jqwidgets-vue/vue_jqxgrid.vue'
import ExportButtons from '../../ExportButtons.vue'
import LineChart from '../../../../components/common/vue-chartjs/LineChart.vue'
import tipChartFilter from '../../../../components/common/vue-chartjs/tipChartFilter.vue'

export default {
	name: 'ShoppingCarts',
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
				{ text: 'Customer Name / IP', datafield: 'customer_id', width: 200 },
				//{ text: 'IP Address', datafield: 'ip_address_id', width: 120 },
				{ text: 'Edited Last', datafield: 'edited_at', width: 140 },
				{ text: 'Completed On', datafield: 'completed_at', width: 140 },
				{ text: 'Items Qty', datafield: 'items_qty', cellsalign: 'right', cellsformat: 'f', width: 120 },
				{ text: 'Amt Due', datafield: 'due_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 }
			]
		}
	},
	beforeCreate: function () {
		this.source = {
			datatype: 'json',
			datafields: [
				{ name: 'created_at', type: 'string' },
				{ name: 'customer_id', type: 'string' },
				{ name: 'ip_address_id', type: 'string' },
				{ name: 'edited_at', type: 'string' },
				{ name: 'completed_at', type: 'string' },
				{ name: 'items_qty', type: 'int' },
				{ name: 'due_amt', type: 'float' }
			],
			id: 'id',
			url: '/api/reports/admin/shopping-carts',
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
			this.labels = this.gridData.map(entry => entry.customer_id)
			this.datastream1 = this.gridData.map(entry => entry.due_amt)
			this.datacollection = {
				labels: this.labels,
				datasets: [
					{
						label: 'Amount Dues',
						backgroundColor: '#519c4e',
						data: this.datastream1
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
