<template>
    <div>
        <p class="text-info text-sm-right">{{createdDate}} </p>
        <blockquote class="blockquote prescription-blockquote">
            <p class="mb-0 prescription-blockquote-text">{{data.directions}}</p>
            <footer class="text-muted prescription-blockquote-text">
                <div class="text-truncate prescription-blockquote-doctor">
                    <img class="avatar" src="/images/avatar-s-20.png" alt="Generic placeholder image" style="width: 30px;height: 30px;">
                    <span class="initials">{{data.doctor_initial}}</span>
                </div>
                <!-- <cite title="Source Title">Entrepreneur</cite> -->
            </footer>
        </blockquote>
    </div>
</template>
<script>
  
	export default {
        name: 'RecentPrescription',
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
        computed: {
            createdDate: function () {
                var date = new Date(this.data.created_at);
                date = date.toLocaleDateString("en-US", { year: 'numeric', 
                month: 'short', day: 'numeric' })
                return date;
            }
        },
		data() {
          return {
            user_id: this.$store.getters.user_id,
            data: {}
          };
  }
	}
</script>
<style lang="scss">
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

.prescription-blockquote {
    margin-bottom: 1rem;
    border-left: 5px solid #eceeef;
}

.prescription-blockquote-text{
    margin-left: 10px;
}

.blockquote {
    font-size: 0.85rem;
}
</style>
