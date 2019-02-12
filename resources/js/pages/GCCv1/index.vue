<template>
<div id="app">
  <p v-if="loading">Loading GCCv1 ...</p>
  <div v-if="!loading" v-html="rawHtml"></div>
</div>
</template>

<script>
export default {
	name: 'GCCv1page',
	data () {
    return {
      loading: false,
      rawHtml: null
    }
  },
  methods: {
    removeScriptTag(){
      // not working. scriptSrc returns undefined
      var scriptSrc = '';
      $( "script" ).each( function(){
        scriptSrc = $( this ).attr('src');
        console.log( 'removing '+ scriptSrc );
        if( scriptSrc.endsWith( this.$route.params.pagename +".js" ) )
          $( this ).remove();
      });
    },
    insertScriptTag(){
      let scriptTag = document.createElement('script');    
      scriptTag.setAttribute('src',"/api/gccv1/src/"+ this.$route.params.role +'/'+ this.$route.params.pagename +'.js');
      document.body.appendChild(scriptTag);
      this.removeScriptTag();
    },
    getContent(){
      this.loading = true
      axios
        .get('/api/gccv1/'+ this.$route.params.role +'/'+ this.$route.params.pagename)
        .then(
          response => (this.rawHtml = response.data, this.loading = false, this.insertScriptTag() )
        )
    }
  },
  watch: {
    // call again the method if the route changes
    '$route': 'getContent'
  },
  created() {
  },
  mounted () {
    this.getContent()
  }
}
</script>