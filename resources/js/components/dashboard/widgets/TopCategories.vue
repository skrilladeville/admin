<template>
<!-- <tableComponent ></tableComponent> -->
</template>

<script>
  import ElTable from './../../common/ElTable.vue'

	export default {
        name: 'TopSales',
        components: {
            'tableComponent' : ElTable
        },
        created(){
            axios.get(this.url)
            .then(res=>{
                this.rows=res.data
                }
            ).catch(err=>console.log(err))
        },
        props:{
        //   url: String
        },
		    data() {
          return {
            columns: [
             
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