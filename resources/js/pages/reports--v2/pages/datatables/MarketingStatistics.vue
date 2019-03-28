<template>
	<widgetize title="Marketing Statistics">
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
	name: 'MarketingStatistics',
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
				{ text: 'Promo Name', datafield: 'promo_id', width: 200 },
				{ text: 'Date Begins', datafield: 'begins_at', width: 140 },
				{ text: 'Date Ends', datafield: 'ends_at', width: 140 },
				{ text: 'Date Last Counted', datafield: 'counted_last_at', width: 140 },
				{ text: 'Handouts Qty', datafield: 'handouts_qty', cellsalign: 'right', cellsformat: 'f', width: 120 },
				{ text: 'Handout Type', datafield: 'handout_type_id', width: 100 },
				{ text: 'Responses Qty', datafield: 'responses_qty', cellsalign: 'right', cellsformat: 'f', width: 120 },
				{ text: 'Converts Qty', datafield: 'converts_qty', cellsalign: 'right', cellsformat: 'f', width: 120 }
			]
		}
	},
	beforeCreate: function () {
		this.source = {
			datatype: 'json',
			datafields: [
				{ name: 'created_at', type: 'string' },
				{ name: 'promo_id', type: 'string' },
				{ name: 'begins_at', type: 'string' },
				{ name: 'ends_at', type: 'string' },
				{ name: 'counted_last_at', type: 'string' },
        { name: 'handouts_qty', type: 'int' },
				{ name: 'handout_type_id', type: 'string' },
        { name: 'responses_qty', type: 'int' },
				{ name: 'converts_qty', type: 'int' }
			],
			id: 'id',
			url: '/api/reports/admin/marketing-statistics',
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
			this.labels = this.gridData.map(entry => entry.promo_id)
			this.data1 = this.gridData.map(entry => entry.converts_qty)
			this.datacollection = {
				labels: this.labels,
				datasets: [
					{
						label: 'Handout Qty',
						backgroundColor: '#519c4e',
						data: this.data1
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
