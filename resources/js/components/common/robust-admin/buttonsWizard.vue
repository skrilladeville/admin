<template>
  <div>
    <buttonize 
      v-if="pageprev > 0" 
      :to="page.baseName+'--p'+pageprev" 
      icon="fa fa-angle-left" 
      label="Previous">
    </buttonize>
    <buttonize 
      v-if="pagenext <= page.qty" 
      :to="page.baseName+'--p'+pagenext" 
      icon="fa fa-angle-right right" 
      icontoright=true label="Next">
    </buttonize>
  </div>
</template>

<script>
import Buttonize from './buttonize.vue'

export default {
  name: 'ButtonsWizard',
  props: { 
    page: Object,
    to: String
  },
	data () {
    return {
      pagenum: null
    }
  },
  components: {
    Buttonize
  },
  computed: {
    pageprev: function () {
      this.pagenum = this.page.number
      this.pagenum--
      return this.pagenum
    },
    pagenext: function () {
      this.pagenum = this.page.number
      this.pagenum++
      return this.pagenum
    }
  },
}
</script>