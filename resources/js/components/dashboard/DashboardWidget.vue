<template>
        <el-card class="box-card">
            <div class="">
                <h5 class="card-
                title">{{title}}</h5>
            </div>
            <div class="card-content"><!-- widgetType-content here -->
                <div class="card-body">
                    
                </div>
            </div>
        </el-card>
</template>

<script>

	export default {
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
            size: Number
        }
	}
</script>

