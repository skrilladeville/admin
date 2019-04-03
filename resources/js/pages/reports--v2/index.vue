<template>
  <div id="app">
		<sales v-if="$route.params.pagename=='sales'"/>
		<Patients v-if="$route.params.pagename=='patients'"/>
		<PatientActions v-if="$route.params.pagename=='patients'"/>
		<products v-if="$route.params.pagename=='products'"/>
		<inventory v-if="$route.params.pagename=='inventory'"/>
		<StateCompliance v-if="$route.params.pagename=='state-compliance'"/>
		<MarketingStatistics v-if="$route.params.pagename=='marketing-statistics'"/>
		<Registers v-if="$route.params.pagename=='registers'"/>
		<Expenses v-if="$route.params.pagename=='expenses'"/>
		<ShoppingCarts v-if="$route.params.pagename=='shopping-carts'"/>
  </div>
</template>

<script>
import { Sales, Patients,	PatientActions, Products,	Inventory, StateCompliance,	MarketingStatistics, Registers,	Expenses,	ShoppingCarts } from './pages'

export default {
	name: 'Reporter',
	components: {
		Sales,
		Patients,
		PatientActions,
		Products,
		Inventory,
		StateCompliance,
		MarketingStatistics,
		Registers,
		Expenses,
		ShoppingCarts
	},
	methods: {
		emitt(){
			let rt = this.$route.params.pagename
			this.$emit('childToParent', rt.charAt(0).toUpperCase()+rt.slice(1)+ ' Report')
		}
	},
	watch: {
		// call again the method if the route changes
		'$route': 'emitt'
	},
	mounted() {
		this.emitt()
	}
}
</script>