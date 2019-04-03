<template>
  <widgetize title="Sales">
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
  name: 'Sales',
	components: {
		Widgetize,
		JqxGrid,
		ExportButtons,
		LineChart,
		tipChartFilter
	},
  data: 
    function () {
			return {
      datacollection: null,
			width: '99%',
			dataAdapter: new jqx.dataAdapter(this.source),
			columns: [
				{ text: 'Date', datafield: 'order_date', cellsformat: 'd', width: 140 },
				{ text: 'Time', datafield: 'order_time', width: 120 },
				{ text: 'Customer Name', datafield: 'customer_id', width: 200 },
				{ text: 'Shelf', datafield: 'shelf_id', width: 140 },
				{ text: 'Register Name', datafield: 'register_id', width: 150 },
				{ text: 'Payment Method', datafield: 'payment_method_id', width: 140 },
				{ text: 'Order Type', datafield: 'order_type_id', width: 120 },
				{ text: 'Order Amount', datafield: 'order_amt', cellsalign: 'right', cellsformat: 'c2', width: 120 },
				{ text: 'Items Qty', datafield: 'items_qty', cellsalign: 'right', cellsformat: 'f', width: 120 }
			]
		}
  },
	beforeCreate: function () {
		this.source = {
			datatype: 'json',
			datafields: [
				{ name: 'customer_id', type: 'int' },
				{ name: 'shelf_id', type: 'int' },
				{ name: 'register_id', type: 'int' },
				{ name: 'payment_method_id', type: 'int' },
				{ name: 'order_type_id', type: 'int' },
				{ name: 'order_date', type: 'string' },
				{ name: 'order_time', type: 'string' },
				{ name: 'order_amt', type: 'float' },
				{ name: 'items_qty', type: 'int' }
			],
			id: 'id',
			url: '/api/reports/admin/sales',
			sortcolumn: 'order_date',
			sortdirection: 'desc'
		}
	},
	methods: {
		exportBtnOnClick: function (format) {
			this.$refs.myGrid.exportdata(format, 'jqxGrid');
		},
    fillChart () {
			this.gridData = this.$refs.myGrid.getrows()
			this.labels = this.gridData.map(entry => entry.customer_id)
			this.order_amt = this.gridData.map(entry => entry.order_amt)
			this.datacollection = {
				labels: this.labels,
				datasets: [
					{
						label: 'Order Amount',
						backgroundColor: '#519c4e',
						data: this.order_amt
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
