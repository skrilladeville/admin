<template>
  
  
      <!-- or name="fade" -->
      <!-- <router-view :key="key"></router-view> -->


     <router-view/>
     
  

  
</template>

<script>
export default {
  name: 'StoreMain',
  computed: {
    // key() {
    //   return this.$route.name !== undefined ? this.$route.name + +new Date() : this.$route + +new Date()
    // }
  }
}
</script>

<style scoped>

</style>
