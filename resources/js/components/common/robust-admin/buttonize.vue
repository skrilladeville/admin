<template>
    <router-link :to="to">
      <button class="btn btn-primary">
          <template v-if="icontoright">{{label}}</template>
          <i v-if="icon" :class="icon"></i>
          <template v-if="!icontoright">{{label}}</template>
      </button>
    </router-link>
</template>

<script>
export default {
  name: 'Buttonize',
  props: [
    'to',
    'icontoright',
    'label',
    'icon'
  ],
  components: {
  }
}
</script>