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
            <div class="media-right media-middle">
                <i class="fas fa-calendar-check white font-large-2 float-xs-right"></i>
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
            url: String
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
    .stat-box .yellow{
        background-color: lightgoldenrodyellow;
    }
</style>
