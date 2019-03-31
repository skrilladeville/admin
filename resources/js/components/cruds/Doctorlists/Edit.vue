<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Doctor List</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="first_name">First name *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="first_name"
                                            placeholder="Enter First name *"
                                            :value="item.first_name"
                                            @input="updateFirst_name"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last name *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="last_name"
                                            placeholder="Enter Last name *"
                                            :value="item.last_name"
                                            @input="updateLast_name"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="license_no">License # *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="license_no"
                                            placeholder="Enter License # *"
                                            :value="item.license_no"
                                            @input="updateLicense_no"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="license_expiration">License Expiration *</label>
                                    <date-picker
                                            :value="item.license_expiration"
                                            :config="$root.dpconfigDate"
                                            name="license_expiration"
                                            placeholder="Enter License Expiration *"
                                            @dp-change="updateLicense_expiration"
                                            >
                                    </date-picker>
                                </div>
                            </div>

                            <div class="box-footer">
                                <vue-button-spinner
                                        class="btn btn-primary btn-sm"
                                        :isLoading="loading"
                                        :disabled="loading"
                                        >
                                    Save
                                </vue-button-spinner>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    data() {
        return {
            // Code...
        }
    },
    computed: {
        ...mapGetters('DoctorlistsSingle', ['item', 'loading']),
    },
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('DoctorlistsSingle', ['fetchData', 'updateData', 'resetState', 'setFirst_name', 'setLast_name', 'setLicense_no', 'setLicense_expiration']),
        updateFirst_name(e) {
            this.setFirst_name(e.target.value)
        },
        updateLast_name(e) {
            this.setLast_name(e.target.value)
        },
        updateLicense_no(e) {
            this.setLicense_no(e.target.value)
        },
        updateLicense_expiration(e) {
            this.setLicense_expiration(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'doctorlists.index' })
                    this.$eventHub.$emit('update-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>


<style scoped>

</style>