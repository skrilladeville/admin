<template>
	<widgetize title="Patient Orders">
		<JqxGrid @sort="onSort($event)" ref="myGrid" :theme="'material'" :width="width" :source="dataAdapter" :columns="columns" :filterable="true" 
			:autoshowfiltericon="false" :sorting="true">
		</JqxGrid>
		<ExportButtons @exportBtnOnClick="exportBtnOnClick"/>
	</widgetize>		
</template>

<script>
import Widgetize from '../../../components/common/widgetize.vue'
import JqxGrid from 'jqwidgets-scripts/jqwidgets-vue/vue_jqxgrid.vue'
import ExportButtons from '../ExportButtons.vue'

export default {
  name: 'Patients',
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
			console.log("Sorted by: " + sortcolumn);
		}
	}
}
</script>
