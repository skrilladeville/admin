<template>
  <div id="app">
		<sales v-if="$route.params.pagename=='sales'"/>
		<products v-if="$route.params.pagename=='products'"/>
  </div>
</template>

<script>
import { Sales, Products } from './pages'

export default {
	name: 'Reporter',
	components: {
		Sales,
		Products
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