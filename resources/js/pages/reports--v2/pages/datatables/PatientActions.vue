<template>
	<widgetize title="Daily Patient Activity">
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
import Widgetize from '../../../../components/common/robust-admin/widgetize.vue'
import JqxGrid from 'jqwidgets-scripts/jqwidgets-vue/vue_jqxgrid.vue'
import ExportButtons from '../../ExportButtons.vue'
import LineChart from '../../../../components/common/vue-chartjs/LineChart.vue'
import tipChartFilter from '../../../../components/common/vue-chartjs/tipChartFilter.vue'

export default {
  name: 'PatientActions',
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
			width: '99%',
			dataAdapter: new jqx.dataAdapter(this.source),
			columns: [
					{ text: 'Date', datafield: 'date', width: 240 },
					{ text: 'Gender', datafield: 'gender', width: 120 },
					{ text: 'Log Ins', datafield: 'login_count', cellsalign: 'right', cellsformat: 'f', width: 120 },
					{ text: 'Intakes', datafield: 'intake_qty', cellsalign: 'right', cellsformat: 'f', width: 120 },
					{ text: 'Rx Created', datafield: 'rx_qty', cellsalign: 'right', cellsformat: 'f', width: 120 },
					{ text: 'Rx Refills', datafield: 'rx_refill_qty', cellsalign: 'right', cellsformat: 'f', width: 120 },
			]
		}
	},
	beforeCreate: function () {
			this.source = {
					datatype: 'json',
					datafields: [
							{ name: 'date', type: 'string' },
							{ name: 'gender', type: 'string' },
							{ name: 'login_count', type: 'int' },
							{ name: 'intake_qty', type: 'int' },
							{ name: 'rx_qty', type: 'int' },
							{ name: 'rx_refill_qty', type: 'int' }
					],
					id: 'id',
					url: '/api/reports/admin/patient-action-stats',
					sortcolumn: 'date',
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
			this.fillChart()
			console.log("Sorted by: " + sortcolumn);
		},
    fillChart () {
			this.gridData = this.$refs.myGrid.getrows()
			this.labels = this.gridData.map(entry => entry.date)
			this.login_count = this.gridData.map(entry => entry.login_count)
			this.datacollection = {
				labels: this.labels,
				datasets: [
					{
						label: 'Log Ins',
						backgroundColor: '#519c4e',
						data: this.login_count
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
