<template>
    <div style="margin-top:150px;">
        <v-layout row wrap>
            <v-flex md4 offset-sm-4>
            <v-card>
                <v-card-title>
                    <h3>Start Transaction</h3>
                </v-card-title>
                <v-card-text>
    
                    <v-btn color="error" style="color:white;" block @click="createTrans">Start Sale Transaction</v-btn>
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
     
      let order={
         user_id:1,
        order_type:0,
        customer_type:0,
        delivery_address:'',
        status:0,
        fulfillment:0,
        note:'',
        shipping:'',
        sales_tax:0,
        total:0,
        balance:0,
      
      }
        axios.post('/api/sales/order/create',order).then(res=>{  		
        let trans={
          register_id:2,
          transaction_type:2,
          order_id:res.data.id,
          amount:0.0,
          conpleted:'',
          last_edit:'',
          last_edit:''
      }
        axios.post('/api/sales/transaction/create',trans).then(res=>{
            this.$router.push('/pos/terminal/1/trans/'+res.data.id)
        })
    
        })
    }
}
}
</script>

<style>

</style>
