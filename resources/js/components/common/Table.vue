<template>
    <vue-good-table
    :columns="columns"
    :rows="rows"
    :pagination-options="{ enabled: true, perPage: 3}"
    :search-options="{ enabled: true}"
    > 
    <template slot="table-row" slot-scope="props">
        <span v-if="props.column.field == 'person_name'">
        <span style="">{{props.row.first_name+' '+props.row.last_name}}</span> 
        </span>
        <span v-else>
        {{props.formattedRow[props.column.field]}}
        </span>
    </template>
  </vue-good-table>   
</template>

<script>
	export default {
        name: 'Table',
        created(){
        },
        computed:{
            person_name(){
                return this.first_name+' '+this.last_name;
            }
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