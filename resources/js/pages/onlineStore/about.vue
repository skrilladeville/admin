<template>
    <div style="margin-top:60px;">

  <v-container fluid>


        <el-card>
            <h2 style="float:center;">About Us</h2>
            <p>Pacifico Life Health & Wellness is a Premium Medical Cannabis Dispensary Pacifico Life Health and Wellness provides a boutique medical cannabis dispensary experience, offering a variety of high quality cannabis goods matched with knowledgeable and friendly patient care. Empowering the Jamesville community to take charge of their wellness, Pacifico facilitates access to top-quality cannabis, cannabis products and educational resources.</p>
            <h5>History</h5>
            <p>On July 8th 2016, Pacifico opened its doors, offering prospective and current MMPR and AMCPR patients a safe haven to access medical cannabis and medical cannabis products in a welcoming and inspiring environment. While Pacifico supports adult use of cannabis for recreational purposes, and believes that having access to cannabis will make the world a better place, Pacifico Life Health and Wellness was designed and built as a premium medical model. It is a benchmark for what they think a natural approach to health and wellness should look like.</p>
        
       <v-flex xs12 sm6 md3>
          <v-text-field
            label="Regular"
          ></v-text-field>
        </v-flex>
        </el-card>
          </v-container>
    </div>
</template>

<script>
export default {
    created(){


},
mounted() {
  try {
let element = document.getElementById("blade");
element.classList.remove("fixed-navbar");
let gcsicss=document.getElementById("gcis")
let robustcss=document.getElementById("robust")
let robustjs=document.getElementById("robustjs")
gcsicss.remove()
//robust.remove()
//robustjs.remove()
  } catch (error) {
   console.log('error occur') 
  }  
},
}
</script>

