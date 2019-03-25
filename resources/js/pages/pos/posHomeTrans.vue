<template>
    <div style="margin-top:150px;">
        <v-layout row wrap>
            <v-flex md4 offset-sm-4>
            <v-card>
                <v-card-title>
                    <h3>Start Transaction</h3>
                </v-card-title>
                <v-card-text>
    
                    <v-btn color="error" style="color:white;" block @click="createTrans">Start Transaction</v-btn>
                </v-card-text>
            </v-card>
            </v-flex>

        </v-layout>
    </div>
</template>

<script>
export default {
data(){
    return{

    }
},
methods:{
    createTrans(){
     
      let trans={
          customer_id:null,
          order_status:'',
          order_date:'',
          shipped_date:'',
          required_date:'',
          branch_id:this.$route.params.id,
          staff_id:3

      }
        axios.post('/api/sales/order/create',trans).then(res=>{
            this.$router.push('/pos/branch/1/trans/'+res.data.id)
        })
    }
}
}
</script>

<style>

</style>
