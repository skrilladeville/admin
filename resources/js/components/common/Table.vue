<template>
    <vue-good-table
    :columns="columns"
    :rows="rows"
    :pagination-options="{ enabled: true, perPage: 3}"
    :search-options="{ enabled: true}"> 
  </vue-good-table>   
</template>

<script>
	export default {
        name: 'Table',
        created(){
        },
		data() {
          return {
          };
        },
        props:{
            columns: Array,
            rows: Array
        }
	}
</script>