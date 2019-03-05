<template>
  <div style="height: 60px; margin-top:15px;">
    <div style="float: left">
      <JqxButton :theme="'material'" @click="exportBtnOnClick('xls')">Export to Excel</JqxButton>
    </div><div style="float: left">
      <JqxButton :theme="'material'" @click="exportBtnOnClick('xml')">Export to XML</JqxButton>
    </div><div style="float: left">
      <JqxButton :theme="'material'" @click="exportBtnOnClick('csv')">Export to CSV</JqxButton>
    </div><div style="float: left">
      <JqxButton :theme="'material'" @click="exportBtnOnClick('tsv')">Export to TSV</JqxButton>
    </div><div style="float: left">
      <JqxButton :theme="'material'" @click="exportBtnOnClick('html')">Export to HTML</JqxButton>
    </div><div style="float: left">
      <JqxButton :theme="'material'" @click="exportBtnOnClick('json')">Export to JSON</JqxButton>
    </div><div style="float: left">
      <JqxButton :theme="'material'" @click="exportBtnOnClick('pdf')">Export to PDF</JqxButton>
    </div>
  </div>
</template>

<script>
import JqxButton from 'jqwidgets-scripts/jqwidgets-vue/vue_jqxbuttons.vue';

export default {
  name: 'ExportButtons',
	components: {
		JqxButton
	},
	methods: {
		exportBtnOnClick: function (format) {
			this.$emit('exportBtnOnClick',format);
		}
	}
}
</script>