<template>
  <section>
    <transition name="fade-transform" mode="out-in">
      <!-- or name="fade" -->
      <!-- <router-view :key="key"></router-view> -->
      <v-app>
     <router-view/>
      </v-app>
 
    </transition>
  </section>
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
