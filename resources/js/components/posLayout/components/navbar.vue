<template>
<div>
<v-toolbar
  dark
  fixed 
  app
  color="success"
>
  <v-btn icon>
    <v-icon>local_mall</v-icon>
  </v-btn>
  <v-toolbar-title class="white--text">POS</v-toolbar-title>
    <v-spacer></v-spacer>
    <v-toolbar-items>
      <v-btn flat>{{user.email}}</v-btn>
    </v-toolbar-items>
  </v-toolbar>
</div>
</template>

<style scoped>

html body.fixed-navbar {
  padding-top: 0%;
}

.thumbnail {
  position: relative;
  width: 100px;
  height: 100px;
  overflow: hidden;
}
.thumbnail img {
  position: absolute;
  left: 50%;
  top: 50%;
  height: 100%;
  width: auto;
  -webkit-transform: translate(-50%,-50%);
      -ms-transform: translate(-50%,-50%);
          transform: translate(-50%,-50%);
}



</style>

<script>
//import jwtToken from '~/helpers/jwt-token';



export default {
name:'Navbar',
  data(){
    return{
        productCount:'',
        dialogCart:false,
        drawer:null,
        plant_type:'',
        user:{},
menu: [
        { icon: 'home', title: 'Home',link:'' },
        { icon: 'shopping_cart', title: 'Canabis',link:'' },
        { icon: 'info', title: 'About',link:'t' }
      ],
      mini: false,
      right: null
        
        
        
    }
  },
  
  
}
</script>
