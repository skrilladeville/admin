<template>
    <div style="margin-top:150px;">
        <v-layout row wrap>
            <v-flex md4 offset-sm-4>
            <v-card>
                <v-card-title>
                    <h3>Select Branch</h3>
                </v-card-title>
                <v-card-text>
               <el-select style="width:100%;" v-model="branch" placeholder="Select">
    <el-option
      v-for="item in branches"
      :key="item.id"
      :label="item.branch_name"
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
        branches:[],
        branch:'',
        mac:''
    }
},
created(){
    axios.get('/api/user/branch/all').then(res=>{
        this.branches=res.data
    })
},

methods:{
    
    start(){
        if(this.branch != "")
        {
            console.log(this.branch)
                 this.$router.push(`/pos/branch/${this.branch}`)
        }
   
    }
}
}
</script>

<style>

</style>
