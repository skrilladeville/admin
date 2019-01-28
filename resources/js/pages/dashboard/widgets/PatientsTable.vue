<template>
    <tableComponent v-bind:columns="this.columns" v-bind:rows="this.rows"></tableComponent>
</template>
<script>
    import Table from './../../../components/common/Table.vue'

	export default {
        name: 'PatientsTable',
        components:{
            'tableComponent' : Table
        },
        created(){
            axios.get(this.url+this.user_id)
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
            user_id: this.$store.getters.user_id,
            columns: [
              {
                label: 'First Name',
                field: 'first_name',
              },
              {
                label: 'Last Name',
                field: 'last_name'
              },
              {
                label: 'Email',
                field: 'email'
              },
            ],
            rows: [],
          };
  }
	}
</script>