<template>
    <div class="card-block notification-card-content">  
        <div class="notification-list-group list-group">
            <a href="#" class="list-group-item list-group-item-action" v-for="(notif, index) in notification_list" :key=index>
                 <i class=icons[notif.category] ></i>
				<span>{{notif.event}}</span>
				<small class="float-xs-right">{{notif.date}}</small>
			</a>
        </div>
    </div>
</template>

<script>
  
	export default {
        name: 'Notifications',
        created(){
            this.populate();
            // axios.get(this.url)
            // .then(res=>{
            //     this.rows=res.data
            //     }
            // ).catch(err=>console.log(err))
        },
        props:{
         
        },
		data() {
          return {
            notification_list: [],
            icons : {
                Booking : 'fas fa-clock',
		        Invoice : 'fas fa-file-invoice',
		        Store : 'fas fa-store'
            }
            };
        },
        methods: {
            populate(){
                var category = ['Booking','Invoice','Store'];
                var purpose = ['John McKinley has accepted you as patient',
                'You have a new invoice from Mary Litlamb.','There are 17 new items for sale at the store.']
                for (var i=0; i<10; i++){
                    var month = Math.floor(Math.random() * Math.floor(12));
                    var day = Math.floor(Math.random() * Math.floor(30));
                    var notification = {
                        category: category[Math.floor(Math.random()*category.length)],
                        event: purpose[Math.floor(Math.random()*purpose.length)],
                        date: new Date(new Date(2018, 0, 1).getTime() + Math.random() * (new Date().getTime() - new Date(2018, 0, 1).getTime()))
                    }
                    this.notification_list.push(notification);
                }
            }
        }
	}
</script>
<style lang="css" scoped>
.notification-card{border: none!important; height:500px;}

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
