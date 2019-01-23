<template>
    <tableComponent v-bind:columns="this.columns" v-bind:rows="this.rows"></tableComponent>
</template>
<script>
    import Table from './../../common/Table.vue'

	export default {
        name: 'PatientsTable',
        components:{
            'tableComponent' : Table
        },
        created(){
            // axios.get(this.url)
            // .then(res=>{
            //     this.rows=res.data
            //     }
            // ).catch(err=>console.log(err))
        },
        props:{
         
        },
		data() {
           return {
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