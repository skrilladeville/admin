<template>
<div class="app-content content">
	<div class="content-wrapper">
    <section class="xapp-main">
      <transition name="fade-transform" mode="out-in">
        <!-- or name="fade" -->
        <!-- <router-view :key="key"></router-view> -->
        <router-view/>
      </transition>
    </section>
	</div>
</div>
</template>

<script>
export default {
  name: 'AppMain',
  computed: {
    // key() {
    //   return this.$route.name !== undefined ? this.$route.name + +new Date() : this.$route + +new Date()
    // }
  },
  methods: {
    insertScriptTag(){
      let scriptTag = document.createElement('script');    
      scriptTag.setAttribute('src',"/js/robust-admin-init.js");

      //var appMain=document.getElementById("appMain");
      document.body.appendChild(scriptTag);
      //appMain.appendChild(scriptTag);
    }
  },
  mounted () {
    this.insertScriptTag()
  }
}

// for logged in app CSS --WA
var element = document.getElementById("blade");
element.classList.add("fixed-navbar");
</script>

<style scoped>
.app-main {
  /*50 = navbar  */
  min-height: calc(100vh - 50px);
  position: relative;
  overflow: hidden;
}
</style>
