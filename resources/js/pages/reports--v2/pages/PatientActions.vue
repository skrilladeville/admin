<template>
	<widgetize title="Daily Patient Activity">
		<JqxGrid @sort="onSort($event)" ref="myGrid" :theme="'material'" :width="width" :source="dataAdapter" :columns="columns" :filterable="true" 
			:autoshowfiltericon="false" :sorting="true" :groupable="true">
		</JqxGrid>
		<ExportButtons @exportBtnOnClick="exportBtnOnClick"/>
	</widgetize>		
</template>

<script>
import Widgetize from '../../../components/common/robust-admin/widgetize.vue'
import JqxGrid from 'jqwidgets-scripts/jqwidgets-vue/vue_jqxgrid.vue'
import ExportButtons from '../ExportButtons.vue'

export default {
  name: 'PatientActions',
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
			console.log("Sorted by: " + sortcolumn);
		}
	}
}
</script>
