<template>
<div>
    <div class="image-cropper profile-img-div">
        <img src="/images/mr-bean.jpg" class="rounded float-left profile-img" alt="...">
    </div>
    <div class="profile-info-div">
        <p id="profile-healthcard">{{data.health_card}}</p>
        <h4>{{data.first_name+ ' '+ data.last_name}}</h4>
        <p id="profile-email">{{data.email}}</p>
        <p id="profile-contact">{{data.emg_contact_phone}}</p>
    </div>
    <div class="profile-edit-div">
        <a href="#" id="profile-edit-btn" class="btn border-green border-darken-4">
            <i class=" edit-icon fas fa-pencil-alt"></i>Edit</a>
    </div>
</div>
</template>

<script>
  
	export default {
        name: 'MyProfile',
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
            user_id: this.$store.getters.user_id,
            data: {}
          };
  }
	}
</script>

<style lang="css" scoped>
.image-cropper {
    width: 100px;
    height: 100px;
    position: relative;
    overflow: hidden;
	border-radius: 50%;
	border: solid 4px #067144;
}

.profile-img-div{
	margin: 0 auto;
}

.profile-img {
    display: inline;
    margin: 0 auto;
    height: 100%;
	width: auto;
}

.profile-info-div{
	margin-top: 5%;
	text-align: center;
}

#profile-healthcard{
	text-decoration: underline;
	text-decoration-color: #067144;
}

#profile-email{
	font-style: italic;
}

#profile-contact{
	font-weight: bold;
}

.profile-edit-div{
	display: flex;
	justify-content: center;
}

#profile-edit-btn{
	margin: auto;
}

#profile-edit-btn {
    margin: auto;
}
.btn:not(:disabled):not(.disabled), .navbar-toggler:not(:disabled):not(.disabled), .page-link:not(:disabled):not(.disabled), summary {
    cursor: pointer;
}
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}
.border-green.border-darken-4 {
    border: 1px solid #1B5E20 !important;
}
.navbar, .main-menu.menu-dark .navigation > li.active > a, .main-menu.menu-dark .navigation > li .active > a, button.btn, thead, a.btn, .headboard.first {
    background: #067144;
    color: #D3FFC9 !important;
}
a:link, a:visited {
    color: white !important;
}
.btn {
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: .75rem 1rem;
    font-size: 1rem;
    line-height: 1.25;
    border-radius: .21rem;
    -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    -moz-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    -o-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.btn, .btn-link, .display-1, .display-2, .display-3, .dropdown-item, .h1, .h2, .h3, .h4, .h5, .h6, .input-group-text, .lead, .small, h1, h2, h3, h4, h5, h6, small {
    font-weight: 400;
}
.badge, .btn, .dropdown-header, .dropdown-item, .input-group-text, .navbar-brand {
    white-space: nowrap;
}
.border-green {
    border: 1px solid #4CAF50 !important;
}
.border-green {
    border-color: #4CAF50;
}
.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    line-height: 1.25;
    border-radius: 0.21rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>