<template>
<div id="app">
  <template v-if="loading">
    <p>Loading GCCv1 ...</p>
  </template>
  <template v-else>
    <el-row v-if="page.qty" type="flex" class="nav-top row-bg" justify="end">
      <ButtonsWizard :page="page" />
    </el-row>
    <div v-html="rawHtml"></div>
    <div class="form-actions center">
      <buttonize v-if="$route.params.pagename=='intake-form-creation'" to="intake-form-creation--p1" icon="fa fa-thumbs-up" label="I Agree"></buttonize>
      <ButtonsWizard :page="page" />
    </div>
    <div v-if="debug">
      <hr>
      <h2>{{page.titleContent}} {{page.number}}</h2>
      <v-list class="transparent lighten-3">
        <h4>Page Config</h4>
        <v-list-tile
          v-for="(value, key) in page"
          :key="key"
        >
          <v-list-tile-content>
            <v-list-tile-title v-text="value"></v-list-tile-title>
            <v-list-tile-sub-title v-text="key"></v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
      <h4>Payload</h4>
      {{json}}
    </div>
  </template>
</div>
</template>

<script>
import Buttonize from '../../components/common/robust-admin/buttonize.vue'
import ButtonsWizard from '../../components/common/robust-admin/buttonsWizard.vue'

export default {
  name: 'GCCv1page',
  props: { page: Object },
	data () {
    return {
      debug: false,
      loading: false,
      json: null,
      rawHtml: null
    }
  },
  components: {
    Buttonize,
    ButtonsWizard
  },
  methods: {
    removeScriptTag(){
      // not working. scriptSrc returns undefined
      // VueJs: Uncaught (in promise) TypeError: Cannot read property 'endsWith' of undefined
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
      //this.removeScriptTag();
    },
    getContent(){
      //this.$emit( 'gccv1loading' )
      this.loading = true
      axios
        .get('/api/gccv1/'+ this.$route.params.role +'/'+ this.$route.params.pagename)
        .then(
          response => (
            this.json = response,
            this.rawHtml = response.data['html'],
            this.loading = false,
            this.insertScriptTag(),
            this.$emit('tellAppMain',response.data['page'])
          )
        )
        .catch(function (error) {
          this.rawHtml = error;
        })
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