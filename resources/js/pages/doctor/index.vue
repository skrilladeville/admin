<template>
<div id="app">
	<h1>Axios data rendered as HTML</h1>
  <div v-html="rawHtml"></div>
	<h1>Axios raw JSON data</h1>
  <div>{{ rawJSON }}</div>
</div>
</template>

<script>
export default {
	name: 'Doctor',
	data () {
    return {
      rawHtml: 'loading ...',
      rawJSON: 'loading ...'
    }
  },
  mounted () {
    axios
      .get('./gcis/index.html')
      .then(response => (this.rawHtml = response.data,this.rawJSON = response))
  }
}
</script>