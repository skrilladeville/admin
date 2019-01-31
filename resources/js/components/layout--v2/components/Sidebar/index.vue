<template>
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
    <el-scrollbar wrap-class="scrollbar-wrapper">
      <el-menu class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
        :show-timeout="200"
        :default-active="$route.path"
        mode="vertical"
      >
        <sidebar-item 
          v-for="route in routes" 
          :key="route.path" 
          :item="route" 
          :base-path="route.path"
        />
      </el-menu>
    </el-scrollbar>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import SidebarItem from './SidebarItem'

export default {
  components: { SidebarItem },
  computed: {
    ...mapGetters([
      'sidebar'
    ]),
    routes() {
      return this.$router.options.routes
    },
    isCollapse() {
      return !this.sidebar.opened
    }
  }
}
</script>
