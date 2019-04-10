<template>
<div class="app-content content">
	<div class="content-wrapper">
    <section class="xapp-main">
      <div class="content-header row" v-if="page.titleContent">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">{{page.titleContent}}</h3>
        </div>
        <div class="content-header-right col-md-4 col-12">
          <div class="btn-group float-md-right">
            <h3>{{page.titleSub}}</h3>
          </div>
        </div>
      </div>
      <transition name="fade-transform" mode="out-in">
        <!-- or name="fade" -->
        <!-- <router-view :key="key"></router-view>
        v-on:gccv1loading="childPreload" -->
        <router-view 
          @hook:beforeCreate="childPreload" 
          @tellAppMain="onChildLoad"
          :page="page"
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
      page: {}
    }
  },
  name: 'AppMain',
  props: [],
  computed: {
  },
  methods: {
    insertScriptTag(){
      try{
        let scriptTag = document.createElement('script');    
        scriptTag.setAttribute('src',"/js/robust-admin-init.js");

        document.body.appendChild(scriptTag);
      }catch(err){
        console.log(err)
      }
    },
    moveProgressBar(){
      // move progress bar to navbar bottom
      try{
        var pace = document.body.getElementsByClassName( "pace" )[0];
        document.getElementsByTagName( "nav" )[0].appendChild( pace );
      }catch(err){
        console.log(err)
      }
    },
    childPreload() {
      //alert("Child was mounted")
    },
    // Triggered when `tellAppMain` event is emitted by the child.
    onChildLoad( pg ) {
      this.page = pg
      this.insertScriptTag()
    },
    emptyPage() {
      this.moveProgressBar()
      this.page = {}
    }
  },
  watch: {
    // call again the method if the route changes
    '$route': 'emptyPage'
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
