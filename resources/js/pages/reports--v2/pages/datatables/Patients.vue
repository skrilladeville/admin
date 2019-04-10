<template>
	<widgetize title="Patient Orders">
		<el-tabs type="card">
			<el-tab-pane>
				<span slot="label"><i class="fa fa-table"></i> Table</span>
				<JqxGrid @sort="onSort($event)" @filter="onFilter($event)" ref="myGrid" :theme="'material'" :width="width" :source="dataAdapter" :columns="columns" :filterable="true" 
					:autoshowfiltericon="false" :sorting="true" @bindingcomplete="onBindingcomplete($event)">
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
  name: 'Patients',
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
				{ text: 'Patient Name', datafield: 'patient_id', width: 200 },
				{ text: 'Check Ins', datafield: 'checkin_count', cellsalign: 'right', cellsformat: 'f', width: 100 },
				{ text: 'Last Check In', datafield: 'checkin_last', cellsformat: 'd', width: 140 },
				{ text: 'Orders', datafield: 'orders_qty', cellsalign: 'right', cellsformat: 'f', width: 80 },
				{ text: 'Total Spent', datafield: 'total_amount_spent', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Balance', datafield: 'balance', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Store Credits Spent', datafield: 'store_credit_used', cellsalign: 'right', cellsformat: 'c2', width: 160 }
			]
		}
	},
	beforeCreate: function () {
			this.source = {
					datatype: 'json',
					datafields: [
						{ name: 'patient_id', type: 'string' },
						{ name: 'checkin_count', type: 'int' },
						{ name: 'checkin_last', type: 'date' },
						{ name: 'orders_qty', type: 'int' },
						{ name: 'total_amount_spent', type: 'float' },
						{ name: 'balance', type: 'float' },
						{ name: 'store_credit_used', type: 'float' }
					],
					id: 'id',
					url: '/api/reports/admin/patient-store-stats',
					sortcolumn: 'checkin_last',
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
			this.labels = this.gridData.map(entry => entry.patient_id)
			this.total_amount_spent = this.gridData.map(entry => entry.total_amount_spent)
			this.datacollection = {
				labels: this.labels,
				datasets: [
					{
						label: 'Total Spent',
						backgroundColor: '#519c4e',
						data: this.total_amount_spent
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
