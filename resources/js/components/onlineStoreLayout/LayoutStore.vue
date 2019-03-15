<template>


        
        <v-app>

    <v-container fluid>
      <Navbar/>
     
      <AppMain/>

</v-container>
  
        </v-app>
  
  
 
</template>
<script>

import { Navbar, AppMain } from './components'



export default {
  name: 'Layout',
  components: {

    Navbar,
    AppMain
  },
created(){
  try {
let element = document.getElementById("blade");
element.classList.remove("fixed-navbar");
let gcsicss=document.getElementById("gcis")
//let robustcss=document.getElementById("robust")
//let robustjs=document.getElementById("robustjs")
gcsicss.remove()
//robustcss.remove()
//robustjs.remove()

  } catch (error) {
   console.log('error occur') 
  }

}
 
}
</script>

<style scoped>



</style>
