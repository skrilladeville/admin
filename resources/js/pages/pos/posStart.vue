<template>
    <div style="margin-top:150px;">
        <v-layout row wrap>
            <v-flex md4 offset-sm-4>
            <v-card>
                <v-card-title>
                    <h3>Select Register</h3>
                </v-card-title>
                <v-card-text>
               <el-select style="width:100%;" v-model="branch" placeholder="Select">
    <el-option
      v-for="item in registers"
      :key="item.id"
      :label="item.name"
      :value="item.id">
    </el-option>
  </el-select>
  <v-btn color="error" style="color:white;" block @click="start">Select</v-btn>
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
        registers:[],
        branch:'',
        mac:''
    }
},
created(){
    axios.get('/api/pos/register/all').then(res=>{
        this.registers=res.data
    })
},

methods:{
    
    start(){
        if(this.branch != "")
        {
            console.log(this.branch)
                 this.$router.push(`/pos/terminal/${this.branch}`)
        }
   
    }
}
}
</script>

<style>

</style>
