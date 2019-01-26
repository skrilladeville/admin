<template>
<tableComponent v-bind:columns="this.columns" v-bind:rows="this.rows"></tableComponent>
</template>

<script>
  import Table from './../../common/Table.vue'

	export default {
        name: 'NewMembersTable',
        components: {
            'tableComponent' : Table
        },
        created(){
            axios.get(this.url)
            .then(res=>{
                this.rows=res.data
                }
            ).catch(err=>console.log(err))
        },
        props:{
          url: String
        },
		    data() {
          return {
            columns: [
              {
                label: 'Date',
                field: 'book_datetime',
                type: 'date',
                dateInputFormat: 'YYYY-MM-DD',
                dateOutputFormat: 'MMM DD YYYY'
              },
              {
                label: 'Patient Name',
                field: 'patient'
              },
              {
                label: 'Purpose',
                field: 'note'
              },
            ],
            rows: [],
          };
        },
        methods:{
          populate(){
            
          }
        }
	}
</script>