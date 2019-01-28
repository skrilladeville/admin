<template>
    <div class="card-block notification-card-content">  
        <div class="notification-list-group list-group">
            <a href="#" class="list-group-item list-group-item-action" v-for="(notif, index) in notification_list" :key=index>

				<span class="event-text"><font-awesome-icon :icon="icons[notif.category]" size="xs"/>
                {{notif.event}}</span>
				<small class="day-text">{{calculateDays(notif.date)}} days ago</small>
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
                Booking : 'clock',
		        Invoice : 'file-invoice',
		        Store : 'store'
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
                        date: new Date(new Date(2019, 0, 1).getTime() + Math.random() * (new Date().getTime() - new Date(2019, 0, 1).getTime()))
                    }
                    this.notification_list.push(notification);
                }
            },
            calculateDays(notif_date){
                var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds

                var dif = Math.round(
                    Math.abs((new Date(notif_date).getTime() - new Date().getTime())/(oneDay)));

                if(dif<=0){

                }else{
                    return dif;
                }
            }
        }
	}
</script>
<style lang="css" scoped>
.notification-card{
    border: none!important; 
    height:700px;
    }

.notification-card-content{
    height: 100%; 
    overflow: hidden;
}

.notification-card-content:hover{
    overflow: auto;
}

.notification-card-content::-webkit-scrollbar-track
{
    position:absolute;
    transition: 0.8s;
	border-radius: 10px;
	background-color: transparent;
}

.notification-card-content::-webkit-scrollbar
{
	width: 6px;
	background-color: transparent;
}

.notification-card-content::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	background-color: rgba(144,147,153,.3);
}

.list-group-item{
    color: #067144;
    font-size: 14px;
    font-weight: 500;
}

.event-text{
    float: left;
  clear: left;
}

.day-text{
    float: left;
  clear: left;
}

</style>
