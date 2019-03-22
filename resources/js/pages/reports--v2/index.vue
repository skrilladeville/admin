<template>
  <div id="app">
		<sales v-if="$route.params.pagename=='sales'"/>
		<Patients v-if="$route.params.pagename=='patients'"/>
		<PatientActions v-if="$route.params.pagename=='patients'"/>
		<products v-if="$route.params.pagename=='products'"/>
		<inventory v-if="$route.params.pagename=='inventory'"/>
		<StateCompliance v-if="$route.params.pagename=='state-compliance'"/>
  </div>
</template>

<script>
import { Sales, Patients, PatientActions, Products, Inventory, StateCompliance } from './pages'

export default {
	name: 'Reporter',
	components: {
		Sales,
		Patients,
		PatientActions,
		Products,
		Inventory,
		StateCompliance
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