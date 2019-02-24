<template>
<div class="app-content content">
	<div class="content-wrapper">
    <section class="xapp-main">
      <div class="content-header row" v-if="pageTitle">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">{{pageTitle}}</h3>
        </div>
        <div class="content-header-right col-md-4 col-12">
          <div class="btn-group float-md-right">
            <h3>{{pageSubtitle}}</h3>
          </div>
        </div>
      </div>
      <transition name="fade-transform" mode="out-in">
        <!-- or name="fade" -->
        <!-- <router-view :key="key"></router-view> -->
        <router-view 
          @hook:beforeCreate="childPreload" 
          v-on:gccv1loading="childPreload"
          @childToParent="onChildLoad"
        />
      </transition>
    </section>
	</div>
</div>
</template>

<script>
export default {
  data () {
    return {
      pageTitle: '',
    }
  },
  name: 'AppMain',
  props: [],
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
    },
    moveProgressBar(){
      // move progress bar to navbar bottom
      var pace = document.body.getElementsByClassName( "pace" )[0];
      document.getElementsByTagName( "nav" )[0].appendChild( pace );
    },
    childPreload() {
      this.moveProgressBar()
      //alert("Child was mounted")
    },
    // Triggered when `childToParent` event is emitted by the child.
    onChildLoad(value) {
      this.pageTitle = value
    },
    emptyTitles() {
       this.pageTitle = ''
    }
  },
  watch: {
    // call again the method if the route changes
    '$route': 'emptyTitles'
  },
  created() {
  },
  mounted () {
    this.moveProgressBar()
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
