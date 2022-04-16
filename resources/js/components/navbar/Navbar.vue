<template>
    <nav id="Navbar" class="float-none navbar navbar-expand-lg navbar-light ">
        <router-link class="logo-navbar" to="/">
            <img src="/images/logo.png" class="logo-footer"/>
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <menu-dropdown-component title=Menu></menu-dropdown-component>           
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="#">Promotions</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="#">Contact</router-link>
                </li>
            </ul>
            <button class="btn btn-outline-success my-2 my-sm-0 mx-3" type="submit">Login</button>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</button>
        </div>
    </nav>
</template>


<script>
    import MenuDropdown from "./MenuDropdown.vue";
    export default {
        components: {
            "menu-dropdown-component": MenuDropdown,
        },
        data() {
            
        },
    };
</script>

