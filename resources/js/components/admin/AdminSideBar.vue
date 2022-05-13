<template>
    <transition name="slide" >
        <!-- <div v-if="sideSlide" class=" d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; margin: 0;">
            <div class="d-flex d-flex justify-content-between">
                <div>
                    <router-link to="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                        <span class="fs-4">Sidebar</span>
                    </router-link>
                </div>
                <div>
                    <i @click="hideSideBar()" class="text-white fa fa-xmark fa-2xl"></i>
                </div>
            </div>
            
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <router-link to="dashboard" class="nav-link text-white">
                    <i class="fa fa-2xl fa-chart-line"></i>
                    Dashboard
                </router-link>
            </li>
            <li>
                <router-link to="/12" class="nav-link text-white">
                    <i class="fa fa-2xl fa-file-invoice-dollar"></i>
                    Orders
                </router-link>
            </li>
            <li>
                <router-link to="productslisting" class="nav-link text-white">
                    <i class="fa fa-2xl fa-bowl-food"></i>
                    Products
                </router-link>
            </li>
            <li>
                <router-link to="/12" class="nav-link text-white">
                    <i class="fa fa-2xl fa-user-group"></i>
                    Customers
                </router-link>
            </li>
            <li>
                <router-link to="/12" class="nav-link text-white">
                    <i class="fa fa-2xl fa-bullhorn"></i>
                    Reports
                </router-link>
            </li>
            </ul>
            <hr>
            <div class="dropdown">
            <router-link to="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>mdo</strong>
            </router-link>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><router-link to="/12" class="dropdown-item" >New project...</router-link></li>
                <li><router-link to="/12" class="dropdown-item" >Settings</router-link></li>
                <li><router-link to="/12" class="dropdown-item" >Profile</router-link></li>
                <li><hr to="/12" class="dropdown-divider"></li>
                <li><router-link to="/12" class="dropdown-item" >Sign out</router-link></li>
            </ul>
            </div>
        </div> -->
        <ul class="bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <router-link to="" class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </router-link>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <router-link to="" class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></router-link>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <router-link to="" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Orders</span>
                </router-link>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <router-link to="" class="collapse-item" href="buttons.html">Buttons</router-link>
                        <router-link to="" class="collapse-item" href="cards.html">Cards</router-link>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <router-link to="/products" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Products</span>
                </router-link>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <router-link to="" class="collapse-item" href="utilities-color.html">Colors</router-link>
                        <router-link to="" class="collapse-item" href="utilities-border.html">Borders</router-link>
                        <router-link to="" class="collapse-item" href="utilities-animation.html">Animations</router-link>
                        <router-link to="" class="collapse-item" href="utilities-other.html">Other</router-link>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <router-link to="" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Customers</span>
                </router-link>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <router-link to="" class="collapse-item" href="login.html">Login</router-link>
                        <router-link to="" class="collapse-item" href="register.html">Register</router-link>
                        <router-link to="" class="collapse-item" href="forgot-password.html">Forgot Password</router-link>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <router-link to="" class="collapse-item" href="404.html">404 Page</router-link>
                        <router-link to="" class="collapse-item" href="blank.html">Blank Page</router-link>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <router-link to="" class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Feedbacks</span></router-link>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <router-link to="" class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span>
                </router-link>
            </li>
        </ul>
    </transition>
</template>

<script>
import {useStore} from 'vuex';
import {computed, ref} from 'vue';

export default ({
    setup() {
        const store = useStore();
        const sideSlide = computed(() => store.getters['animations/getAdminSideSlide']);
        
        function showSideBar(){
            store.dispatch('animations/changeState', true)
        }

        function hideSideBar(){
            store.dispatch('animations/changeState', false)
        }

        return {
            showSideBar,
            hideSideBar,
            sideSlide
        }
    },
})
</script>


<style scoped>
    @import"./../../../css/admin/adminSideBar.css";
    .sidenav{
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 100;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .slide-enter-active,
    .slide-leave-active {
        transition: all 0.74 ease-in-out;
    }


    .slide-enter-to {
        position: absolute;
        left: 0;
    }


    .slide-enter-from {
        position: absolute;
        left: -100%;
    }


    .slide-leave-to {
        position: absolute;
        left: -100%;
    }


    .slide-leave-from {
        position: absolute;
        left: 0;
    }

    .fa:hover{
        color:darkgreen;
    }

    #SideBarBtn{
        position:absolute;
        top:3px;
        left:3px;
        width:3%;
    }
</style>