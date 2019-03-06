<template>
  <el-menu class="navbar" mode="horizontal">
    <!-- <hamburger :toggle-click="toggleSideBar" :is-active="sidebar.opened" class="hamburger-container"/> -->
    <!-- <breadcrumb /> -->
    <el-dropdown class="avatar-container" trigger="click">
      <div class="avatar-wrapper card-profile-image col-md-auto">
        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
        <span class="avatar avatar-sm avatar-online rounded-circle"><img src="/images/gccv1/profile-silhouette-male.png" class="user-avatar"></span>
        <span class="user-name">{{ userDisplayName }}</span>
        </a>
      </div>
      <el-dropdown-menu slot="dropdown" class="user-dropdown">
        <router-link class="inlineBlock" to="/my-account">
          <el-dropdown-item>
            My Account
          </el-dropdown-item>
        </router-link>
        <el-dropdown-item divided>
          <span style="display:block;" @click="logout">LogOut</span>
        </el-dropdown-item>
      </el-dropdown-menu>
    </el-dropdown>
  </el-menu>
</template>

<script>
import {siteName} from './../../../config';
import {mapGetters} from 'vuex';
import jwtToken from '../../../helpers/jwt-token';

export default {
  name: 'UserNav',
  data() {
    return {
      siteName: 'siteName',
      userDisplayName: 'John Doer'
    }
  },
  components: {
  },
  computed: mapGetters([
    'isLoggedIn',
    'sidebar',
    'avatar'
  ]),
  methods: {
    toggleSideBar() {
      this.$store.dispatch('ToggleSideBar')
    },
    logout() {
      jwtToken.removeToken();
      this.$store.dispatch('unsetAuthUser')
        .then(() => {
          this.$noty.success('You are logged out');
          this.$router.push({name: 'login'});
        });
    }
  }
}
</script>