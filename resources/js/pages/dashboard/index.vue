<template>
  <div class="dashboard-container">
    <component :is="currentRole"/>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import adminDashboard from './admin'
import branchAdminDashboard from './branch-admin'
import doctorDashboard from './doctor'
import patientDashboard from './patient'

export default {
  name: 'Dashboard',
  components: { adminDashboard, branchAdminDashboard, doctorDashboard, patientDashboard },
  data() {
    return {
      currentRole: 'adminDashboard'
    }
  },
  computed: {
    ...mapGetters([
      'roles'
    ])



  },
  created() {
    // if (!this.roles.includes('admin')) {
    //   this.currentRole = 'branchAdminDashboard'
    // }
  }
}
</script>
