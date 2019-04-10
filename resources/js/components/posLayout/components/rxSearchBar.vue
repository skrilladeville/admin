<template>
  <v-autocomplete
    v-model="patient"
    :items="items"
    :loading="isLoading"
    :search-input.sync="search"
    chips
    clearable
    hide-details
    hide-selected
    item-text="name"
    item-value="id"
    label="Patient Name / Health Card"
    return-object
  >
    <template v-slot:selection="data">
      <v-flex
        grow
        pa-1
      >
        <v-avatar>
          <img :src="data.item.avatar">
        </v-avatar>
        {{ patient.firstname }}, {{ patient.lastname }}
      </v-flex>
      <v-flex
        shrink
        pa-1
      >
        <span class="text-xs-right"><strong>{{ patient.health_card }}</strong></span>
      </v-flex>
    </template>
    <template v-slot:no-data>
      <v-list-tile>
        <v-list-tile-title>
          Search a 
          <strong>Patient</strong>
        </v-list-tile-title>
      </v-list-tile>
    </template>
  </v-autocomplete>
</template>

<script>
export default {
  name: 'rxSearchBar',
  data() {
    return {
      // Rx Search
      isLoading: false,
      items: [],
      patient: null,
      search: null
    }
  },
  watch: {
    // Rx Search
    search (val) {
      // Items have already been loaded
      if (this.items.length > 0) return

      this.isLoading = true

      // Lazily load input items
      fetch('/api/patient/profiles')
        .then(res => res.json())
        .then(res => {
          const { items } = res
          this.items = res.data
        })
        .catch(err => {
          console.log(err)
        })
        .finally(() => (this.isLoading = false))
    }
  }
}
</script>