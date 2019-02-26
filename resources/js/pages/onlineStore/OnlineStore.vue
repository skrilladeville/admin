<template>
<div style="margin-top:10px;">
  <v-container fluid>
 <v-carousel>
    <v-carousel-item
      v-for="(item,i) in items"
      :key="i"
      :src="item.src"
 
    ></v-carousel-item>
  </v-carousel>

  
  <el-card>
    <h2>Feature Product</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, repellendus fugiat incidunt commodi magni alias accusantium, natus cum eos quis ipsam, numquam sint ratione quod vitae! Amet aliquid tenetur modi!</p>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus quas illo aliquid, dolorem incidunt id eveniet facilis aperiam molestiae asperiores dolore veniam veritatis mollitia. Quas quae voluptatibus nisi possimus id!</p>
  </el-card>
  </v-container>
</div>

</template>

<style>

</style>

<script>
export default {

  data(){
    return{
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
  created(){


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
