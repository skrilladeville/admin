<template>
    <div>
        <div v-if="data">
            <h4 class="text-bold-200 text-muted">{{weekday}}</h4>
            <h3>{{monthAndDay}}</h3>
            <h5 class="text-muted">{{year}}</h5>
            <blockquote class="blockquote border-left-yellow darken-2 border-left-3">
                <p class="mb-0 recent-appt-purpose">{{data.description}}</p>
            </blockquote>

            <div class="media">								
                <span class="media-left">
                    <img class="avatar" src="/images/avatar-s-20.png" alt="Generic placeholder image" style="width: 64px;height: 64px;">
                </span>
                <div class="media-body recent-appt-doctor">
                    <h5 class="media-heading">{{data.first_name+' '+data.last_name}}</h5>
                    <small v-if="user_role=='patient'">Doctor</small>
                    <small v-else>Patient</small>
                </div>
            </div>
        </div>
        <div v-else>Nothing to display.</div>
    </div>
</template>
<script>
  
	export default {
        name: 'NextAppointment',
        created(){
            axios.get(this.url+this.user_id)
            .then(res=>{
                this.data=res.data
                }
            ).catch(err=>console.log(err))
        },
        props:{
            url: String
        },
        computed:{
            weekday(){
                var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                var date = this.data.start_datetime
                date =  new Date(this.data.start_datetime);
                return week[date.getDay()];
            },
            monthAndDay(){
                var month = ["January", "February", "March", "April", "May", "June", "July", "August", 
                "September", "October", "November", "December"];
                var date = this.data.start_datetime
                date =  new Date(this.data.start_datetime);
                return month[date.getMonth()]+' '+date.getDate()
            },
            year(){
                var date = this.data.start_datetime
                date =  new Date(this.data.start_datetime);
                return date.getFullYear();
            },
        },
		data() {
          return {
            user_role: this.$store.getters.role[0],
            user_id: this.$store.getters.user_id,
            data: {}
          };
  }
	}
</script>
<style lang="scss">
.border-left-3 {
    border-left-width: 3px !important;
}

.blockquote, hr {
    margin-bottom: 1rem;
}
.border-left-3 {
    border-left-width: 3px !important;
}
.border-left-yellow {
    border-left: 1px solid #FFEB3B;
}
.blockquote {
    margin-bottom: 1rem;
    font-size: 0.85rem;
}
blockquote, figure {
    margin: 0 0 1rem;
}
blockquote {
    margin: 0 0 1rem;
}

.recent-appt-purpose {
    margin-left: 10px;
}

.avatar {
    position: relative;
    display: inline-block;
    width: 30px;
    white-space: nowrap;
    border-radius: 1000px;
    vertical-align: bottom;
}
.avatar {
    position: relative;
    display: inline-block;
    width: 30px;
    white-space: nowrap;
    border-radius: 1000px;
    vertical-align: bottom;
}

.media-body{
    margin-left: 5px;
    color:  #053922!important;
}
</style>
