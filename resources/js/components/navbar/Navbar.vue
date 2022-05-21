<template>
    <nav id="Navbar" class="float-none navbar navbar-expand-lg navbar-light">
        <router-link class="logo-navbar" to="/">
            <img src="/images/logo.png" class="logo-footer" />
        </router-link>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <menu-dropdown-component
                        title="Menu"
                    ></menu-dropdown-component>
                </li>
                <li class="nav-item" id="applic">
                    <button class="nav-link" @click="gotoGoogle()" to="/pinocone/feedback">Feedback</button>
                </li>

                <li class="nav-item" id="app">
                    <button class="nav-link" @click="gotoGoogle()" to="/membership/index">Membership</button>
                </li>
                <li>
                    <router-link to="/marketplace">Marketplace</router-link>
                </li>
                <li>
                    <router-link to="/userprofile">Profile</router-link>
                </li>
                <li>
                    <router-link to="/cart">Cart</router-link>
                    <base-badge mode="elegant">{{ cartQuantity }}</base-badge>
                </li>
            </ul>
            <div v-if="user.PK_userID !== 0">
                <strong>Welcome, {{ user.username }}!</strong>
                <button
                    @click="logout"
                    class="btn btn-outline-success my-2 my-sm-0 mx-3"
                >
                    Logout</button
                >
            </div>
            <div v-else>
                <router-link
                    to="/login"
                    class="btn btn-outline-success my-2 my-sm-0 mx-3"
                    >Login</router-link
                >
                <router-link
                    to="/register"
                    class="btn btn-outline-success my-2 my-sm-0"
                    >Sign Up</router-link
                >
            </div>
        </div>
    </nav>
</template>

<script>
import MenuDropdown from "./MenuDropdown.vue";
export default {
    components: {
        "menu-dropdown-component": MenuDropdown,
    },
    computed: {
        cartQuantity() {
            return this.$store.getters["cart/quantity"];
        },
    },
    data() {
        return {
            user: {},
        }
    },
    methods: {
        logout() {
            const rootURL = window.location.origin;
            axios.post(rootURL + "/logout");
            alert("Successfully logged out!");
            this.user.PK_userID = 0;
        },
    },
    async created() {
        const rootURL = window.location.origin;
        this.user = (await axios.get(rootURL + "/user")).data;
    }
};
</script>
