<template>
<tableComponent v-bind:columns="this.columns" v-bind:rows="this.rows"></tableComponent>
</template>

<script>
  import Table from './../../../components/common/Table.vue'

	export default {
        name: 'BookingsTable',
        components: {
            'tableComponent' : Table
        },
        created(){
            axios.get(this.url+this.user_id)
            .then(res=>{
                this.rows=res.data
                this.columns[2].label = this.user_role=='patient'? 'Doctor Name':'Patient Name';
                }
            ).catch(err=>console.log(err))
        },
        props:{
          url: String
        },
		    data() {
          return {
            user_id: this.$store.getters.user_id,
            user_role: this.$store.getters.role[0],
            columns: [
              {
                label: 'Start Date',
                field: 'start_datetime',
                type: 'date',
                dateInputFormat: 'YYYY-MM-DD',
                dateOutputFormat: 'MMM DD YYYY'
              },
              {
                label: 'End Date',
                field: 'end_datetime',
                type: 'date',
                dateInputFormat: 'YYYY-MM-DD',
                dateOutputFormat: 'MMM DD YYYY'
              },
              {
                label: '',
                field: 'person_name'
              },
              {
                label: 'Purpose',
                field: 'name'
              },
            ],
            rows: [],
          };
        },
        methods:{
        }
	}
</script>