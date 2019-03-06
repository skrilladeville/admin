<template>
	<widgetize title="Products">
		<JqxGrid v-if="this.$route.params.pagename == 'products'" ref="myGrid" :theme="'material'" :width="width" :source="source" 
			:autoheight="true" :columns="columns" :filterable="true" 
			:autoshowfiltericon="true" :ready="ready" :updatefilterconditions="updatefilterconditions">
		</JqxGrid>
		<ExportButtons @exportBtnOnClick="exportBtnOnClick"/>
	</widgetize>		
</template>

<script>
import Widgetize from '../../../components/common/widgetize.vue'
import JqxGrid from 'jqwidgets-scripts/jqwidgets-vue/vue_jqxgrid.vue'
import ExportButtons from '../ExportButtons.vue'

export default {
  name: 'Products',
	components: {
		Widgetize,
		JqxGrid,
		ExportButtons
	},
	data: function () {
			return {
					width: '99%',
					source: new jqx.dataAdapter(this.source),
					columns: [
							{ text: 'First Name', datafield: 'firstname', width: 160 },
							{ text: 'Last Name', datafield: 'lastname', width: 160 },
							{ text: 'Product', datafield: 'productname', width: 170 },
							{ text: 'Order Date', datafield: 'date', filtertype: 'date', width: 160, cellsformat: 'dd-MMMM-yyyy' },
							{ text: 'Quantity', datafield: 'quantity', width: 80, cellsalign: 'right' },
							{ text: 'Unit Price', datafield: 'price', cellsalign: 'right', cellsformat: 'c2' }
					]
			}
	},
	beforeCreate: function () {
			this.source = {
					localdata: [
							{ firstname: "Andrew", lastname: "Burke", productname: "White Chocolate Mocha", quantity: 5, price: 3.8 },
							{ firstname: "Andrew", lastname: "Wilson", productname: "Espresso con Panna", quantity: 1, price: 5 },
							{ firstname: "Nancy", lastname: "Fuller", productname: "Caffe Latte", quantity: 1, price: 3.5 },
							{ firstname: "Regina", lastname: "Wilson", productname: "Doubleshot Espresso", quantity: 7, price: 4.2 },
							{ firstname: "Mayumi", lastname: "Davolio", productname: "Caffe Espresso", quantity: 1, price: 3.6 },
							{ firstname: "Beate", lastname: "Saavedra", productname: "Caffe Latte", quantity: 2, price: 3.5 },
							{ firstname: "Beate", lastname: "Nodier", productname: "White Chocolate Mocha", quantity: 6, price: 3.8 },
							{ firstname: "Petra", lastname: "Winkler", productname: "Doubleshot Espresso", quantity: 5, price: 4.6 },
							{ firstname: "Andrew", lastname: "Rossi", productname: "Caffe Latte", quantity: 2, price: 3.5 },
							{ firstname: "Nancy", lastname: "Saavedra", productname: "Cappuccino", quantity: 1, price: 3.8 },
							{ firstname: "Regina", lastname: "Wilson", productname: "Doubleshot Espresso", quantity: 7, price: 4.6 },
							{ firstname: "Mayumi", lastname: "Bjorn", productname: "Black Tea", quantity: 1, price: 3.8 },
							{ firstname: "Beate", lastname: "Petersen", productname: "Caffe Latte", quantity: 2, price: 3.5 },
							{ firstname: "Saavedra", lastname: "Fuller", productname: "Black Tea", quantity: 6, price: 3.8 }
					],
					datatype: 'array'
			};
	},
	methods: {
		exportBtnOnClick: function (format) {
			this.$refs.myGrid.exportdata(format, 'jqxGrid');
		},
		addfilter: function () {
				// create a filter group for the FirstName column.
				let fNameFiltergroup = new jqx.filter();
				// operator between the filters in the filter group. 1 is for OR. 0 is for AND.
				let filter_or_operator = 1;
				// create a string filter with `contains` condition.
				let filtervalue = 'Beate';
				let filtercondition = 'contains';
				let fNameFilter1 = fNameFiltergroup.createfilter('stringfilter', filtervalue, filtercondition);
				// create second filter.
				filtervalue = 'Andrew';
				filtercondition = 'starts_with';
				let fNameFilter2 = fNameFiltergroup.createfilter('stringfilter', filtervalue, filtercondition);
				// add the filters to the filter group.
				fNameFiltergroup.addfilter(filter_or_operator, fNameFilter1);
				fNameFiltergroup.addfilter(filter_or_operator, fNameFilter2);
				// add the filter group to the `firstname` column in the Grid.
				this.$refs.myGrid.addfilter('firstname', fNameFiltergroup);
				// create a filter group for the Quantity column.
				let quantityFilterGroup = new jqx.filter();
				// create a filter.
				filter_or_operator = 1;
				filtervalue = 3;
				filtercondition = 'less_than';
				let quantityFilter1 = quantityFilterGroup.createfilter('numericfilter', filtervalue, filtercondition);
				quantityFilterGroup.addfilter(filter_or_operator, quantityFilter1);
				// add the filter group to the `quantity` column in the Grid.
				this.$refs.myGrid.addfilter('quantity', quantityFilterGroup);
				// apply the filters.
				this.$refs.myGrid.applyfilters();
		},
		ready: function () {
				this.addfilter();
		}
	}
}
</script>
