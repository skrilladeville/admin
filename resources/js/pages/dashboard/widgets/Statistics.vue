<template>
<div>
    <div class="stat-div" v-if="user_role!='doctor'">
        <h1 class="green darken-1 stat-number">100</h1>
        <hr class="border-green border-darken-1 stat-divider">
        <p class="text-muted"></p>
    </div>
    <div v-else class="card-block">
        <div class="media">
            <div class="media-body text-xs-left">
                <h3 class="white">{{data}}</h3>
            </div>
            <div class="media-right media-middle icon-div">
                <font-awesome-icon :icon="icon" size="lg"/>
            </div>
        </div>
    </div>
</div>
</template>
<script>
  
	export default {
        name: 'Statistics',
        created(){
            axios.get(this.url+this.user_id)
            .then(res=>{
                this.data=res.data
                }
            ).catch(err=>console.log(err))
        },
        props:{
            url: String,
            icon: String
        },
		data() {
          return {
            user_role: this.$store.getters.role[0],
            user_id: this.$store.getters.user_id,
            data: ''
          };
  }
	}
</script>

<style lang="css">
    .bg-orange {
        border:1px solid #ebeef5!important;
        background-color: #FF9100 !important;
    }

    .bg-yellow{
        border:1px solid #ebeef5!important;
        background-color: #FFD600 !important;
    }

    .white{
        color: white!important;
    }

    .icon-div{
        font-size: 30px;
    }
</style>
