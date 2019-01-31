<template>
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs is-active" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item"><a class="navbar-brand">
                    <img class="brand-logo" alt="robust admin logo" :src="logo"></a>
                </li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
            </ul>
        </div>

        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                </ul>
                <ul class="nav navbar-nav float-right">         
                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title=""><i class=""></i><span>Hi, User</span><span class="selected-language"></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item" href="./?role=patient"><i class="fas fa-child"></i>Patient</a>
                            <a class="dropdown-item" href="./?role=doctor"><i class="fas fa-user-md"></i>Doctor</a>
                            <a class="dropdown-item" href="./?role=admin"><i class="fas fa-crown"></i>Admin</a>
                            <a class="dropdown-item" href="?logout"><i class="fas fa-lock"></i>Logout</a>
                            <!--<a class="dropdown-item" href="./?role=member"><i class="flag-icon flag-icon-de"></i> Member</a>-->
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>


</template>
<script>
export default {
    data() {
        return {
            logo:['/images/logo--GCIS-h.svg']
        }
    }
}
</script>