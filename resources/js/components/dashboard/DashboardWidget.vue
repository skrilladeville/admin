<template>
        <el-card class="box-card" shadow="always">
            <div class="">
                <h5 class="card-
                title">{{title}}</h5>
            </div>
            <div class="card-content" ><!-- widgetType-content here -->
                <div class="card-body" :class=widgetType>
                    <component v-bind:is="templateName" v-bind:url="url"></component>
                </div>
            </div>
        </el-card>
</template>


<script>
    import BookingsTable from './../dashboard/widgets/BookingsTable.vue'
    import Notifications from './../dashboard/widgets/Notifications.vue'
    import NextAppointment from './../dashboard/widgets/NextAppointment.vue'
    import RecentPrescription from './../dashboard/widgets/NextAppointment.vue'
    import PatientsTable from './../dashboard/widgets/PatientsTable.vue'
    import SalesReport from './../dashboard/widgets/SalesReport.vue'
    import Statistics from './../dashboard/widgets/Statistics.vue'
    import TopCategories from './../dashboard/widgets/TopCategories.vue'
    import TopSales from './../dashboard/widgets/TopSales.vue'
    import MyProfile from './../dashboard/widgets/MyProfile.vue'

	export default {
        name: 'DashboardWidget',
        components: {
            'bookings' : BookingsTable,
            'notifications' : Notifications,
            'nextAppointment' : NextAppointment,
            'recentPrescription' : RecentPrescription,
            'patientsTable' : PatientsTable,
            'salesReport' : SalesReport,
            'statistics' : Statistics,
            'topCategories' : TopCategories,
            'topSales' : TopSales,
            'myProfile' : MyProfile
        },
		data() {
			return {
				widget: {
					title: '',
					widgetType: '',
					showTitle: 0,
					component:''
				}
			}
		},
		methods: {
        },
        props: {
            title: String,
            widgetType: String,
            size: Number,
            templateName: String,
            url: String
        }
	}
</script>

<style rel="stylesheet/scss" lang="scss">
    .box-card{
        margin-bottom: 50px;
        border: 1px solid green;
    }
</style>

<style lang="css" scoped>
.notification-card{border: none!important; height:300px;}

.notification-card-content{height: 100%; overflow: auto;}

.notification-card-content::-webkit-scrollbar-track
{
	border-radius: 10px;
	background-color: transparent;
}

.notification-card-content::-webkit-scrollbar
{
	width: 12px;
	background-color: transparent;
}

.notification-card-content::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	background-color: rgba(163, 161, 161, 0.808);
}
</style>