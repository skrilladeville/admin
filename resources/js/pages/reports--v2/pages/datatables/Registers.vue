<template>
	<widgetize title="Registers">
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
	name: 'Registers',
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
				{ text: 'Register Name', datafield: 'register_id', width: 150 },
				{ text: 'Cashier Name', datafield: 'cashier_id', width: 200 },
				{ text: 'Closer Name', datafield: 'closer_id', width: 200 },
				{ text: 'Opening Amt', datafield: 'opening_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Cash Tender Amt', datafield: 'cash_tender_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Safe Drops Amt', datafield: 'safe_drops_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Returns Amt', datafield: 'returns_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Expected Drawer Amt', datafield: 'expected_drawer_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Actual Drawer Amt', datafield: 'actual_drawer_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Credit Card Amt', datafield: 'credit_card_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Check Amt', datafield: 'check_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'CC Terminal Amt', datafield: 'cc_terminal_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Store Credit Amt', datafield: 'store_credit_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Over Amt', datafield: 'over_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 }
			]
		}
	},
	beforeCreate: function () {
		this.source = {
			datatype: 'json',
			datafields: [
				{ name: 'created_at', type: 'string' },
				{ name: 'register_id', type: 'string' },
				{ name: 'cashier_id', type: 'string' },
				{ name: 'closer_id', type: 'string' },
				{ name: 'opening_amt', type: 'float' },
				{ name: 'cash_tender_amt', type: 'float' },
				{ name: 'safe_drops_amt', type: 'float' },
				{ name: 'returns_amt', type: 'float' },
				{ name: 'expected_drawer_amt', type: 'float' },
				{ name: 'actual_drawer_amt', type: 'float' },
				{ name: 'credit_card_amt', type: 'float' },
				{ name: 'check_amt', type: 'float' },
				{ name: 'cc_terminal_amt', type: 'float' },
				{ name: 'store_credit_amt', type: 'float' },
				{ name: 'over_amt', type: 'float' }
			],
			id: 'id',
			url: '/api/reports/admin/registers',
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
			this.datastream1 = this.gridData.map(entry => entry.actual_drawer_amt)
			this.datacollection = {
				labels: this.labels,
				datasets: [
					{
						label: 'Actual Drawer Amt',
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
