<template>
  <el-menu class="navbar" mode="horizontal">
    <el-dropdown class="avatar-container" trigger="click">
      <div class="avatar-wrapper">
        <img src="/images/mr-bean.jpg" class="user-avatar">
        <i class="el-icon-caret-bottom"/>
      </div>
      <el-dropdown-menu slot="dropdown" class="user-dropdown">
        <router-link class="inlineBlock" to="/">
          <el-dropdown-item>
            Home
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
  data() {
    return {
      siteName: 'siteName'
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

<style rel="stylesheet/scss" lang="scss" scoped>
.navbar {
  height: 85px !important;
  position:fixed;
  width: 91%;
  z-index: 9999;
  border-radius: 0px !important;
  .hamburger-container {
    line-height: 58px;
    height: 10px;
    float: left;
    padding: 0 10px;
  }
  .screenfull {
    position: absolute;
    right: 90px;
    top: 16px;
    color: red;
  }
  .avatar-container {
    height: 50px;
    display: inline-block;
    position: absolute;
    right: 35px;
    .avatar-wrapper {
      cursor: pointer;
      margin-top: 5px;
      position: relative;
      line-height: initial;
      .user-avatar {
        width: 40px;
        height: 40px;
        height: auto;
        border: 0 none;
        border-radius: 1000px;
      }
      .el-icon-caret-bottom {
        position: absolute;
        right: -20px;
        top: 25px;
        font-size: 12px;
      }
    }
  }
}
</style>

