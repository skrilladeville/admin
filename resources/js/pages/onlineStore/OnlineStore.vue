<template>
<div style="margin-top:10px;">
  <v-container fluid v-if="getIslegalAge">
 <v-carousel>
    <v-carousel-item
      v-for="(item,i) in items"
      :key="i"
      :src="item.src"
 
    ></v-carousel-item>
  </v-carousel>

  
  <el-card v-if="getIslegalAge">
    <h2>Feature Product</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, repellendus fugiat incidunt commodi magni alias accusantium, natus cum eos quis ipsam, numquam sint ratione quod vitae! Amet aliquid tenetur modi!</p>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus quas illo aliquid, dolorem incidunt id eveniet facilis aperiam molestiae asperiores dolore veniam veritatis mollitia. Quas quae voluptatibus nisi possimus id!</p>
  </el-card>
  </v-container>

    <v-layout v-if="getIslegalAge==false" row justify-center>
    <v-dialog v-model="dialogAgree"
     width="500"
     persistent>

      <v-card style="padding:10px 10px;">
        <v-card-title class="headline">Legal Age Verification</v-card-title>
    

          <v-flex md12><h2>Mandatory 19+ to enter</h2></v-flex>
          <p>This website offers cannabis products and information and is restricted to adults aged 19 years and older.</p>

        <v-checkbox
          v-model="allowage"
          label="Yes I am atleast 19 years old up."
        ></v-checkbox>
  
  



           <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn  :disabled="!allowage" color="error" @click="setAge(true)">Enter Site</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
</v-layout>
  
</div>

</template>

<style>

</style>

<script>
import {mapGetters,mapMutations} from 'vuex';

export default {

  data(){
    return{
      dialogAgree:true,
      allowage:false,
        items: [
          {
            src: '/images/melipbalm.png'
          },
          {
            src: '/images/muken.png'
          },
          {
            src: '/images/apothecarytincture.png'
          },
          {
            src: '/images/melipbalm.png'
        
          }
        ]
    }

  },
  methods:{

    ...mapMutations(['SET_LEGAL_AGE']),

    setAge(isLegal){
        this.SET_LEGAL_AGE(isLegal)
        this.dialogAgree=false
    }
  },

  created(){


},
computed:{
  ...mapGetters(['getIslegalAge'])

},

mounted(){
  try {
let element = document.getElementById("blade");
element.classList.remove("fixed-navbar");
let gcsicss=document.getElementById("gcis")
let robustcss=document.getElementById("robust")
let robustjs=document.getElementById("robustjs")
gcsicss.remove()
//robustcss.remove()
//robustjs.remove()
  } catch (error) {
   console.log('error occur') 
  }
},
}
</script>
