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
				{ text: 'Ads Published', datafield: 'ads_published', cellsalign: 'right', cellsformat: 'f', width: 120 },
				{ text: 'Fb Likes', datafield: 'facebook_page_likes', cellsalign: 'right', cellsformat: 'f', width: 120 },
				{ text: 'SMS Sent', datafield: 'sms_sent', cellsalign: 'right', cellsformat: 'f', width: 120 },
				{ text: 'eMails Sent', datafield: 'emails_sent', cellsalign: 'right', cellsformat: 'f', width: 120 }
			]
		}
	},
	beforeCreate: function () {
		this.source = {
			datatype: 'json',
			datafields: [
				{ name: 'created_at', type: 'string' },
        { name: 'ads_published', type: 'int' },
				{ name: 'facebook_page_likes', type: 'int' },
				{ name: 'sms_sent', type: 'int' },
				{ name: 'emails_sent', type: 'int' }
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
			this.labels = this.gridData.map(entry => entry.created_at)
			this.data1 = this.gridData.map(entry => entry.sms_sent)
			this.datacollection = {
				labels: this.labels,
				datasets: [
					{
						label: 'SMS Sent',
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
