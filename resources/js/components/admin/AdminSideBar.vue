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
            <router-link to="/dashboard" class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </router-link>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <router-link to="/dashboard" class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></router-link>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <router-link to="/orders" class="nav-link">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Orders</span>
                </router-link>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <DropdownMenu :title="productsDropdown.title" :droppedList="productsDropdown.list"></DropdownMenu>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <router-link to="/customers" class="nav-link">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Customers</span>
                </router-link>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <router-link to="/feedbacks" class="nav-link" >
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Feedbacks</span></router-link>
            </li>
        </ul>
    </transition>
</template>

<script>
import {useStore} from 'vuex';
import {computed, ref} from 'vue';
import DropdownMenu from './DropdownMenu.vue';

export default ({
    components:{
        DropdownMenu
    },
    setup() {
        const store = useStore();
        const sideSlide = computed(() => store.getters['animations/getAdminSideSlide']);
        const productsDropdown = {
            title: 'Products',
            list: [
                {
                    link: '/products',
                    name: 'All Products'
                },
                {
                    link: '/vouchers',
                    name: 'Vouchers'
                },
                {
                    link: '/rewards',
                    name: 'Rewards'
                }
            ]
        }
        
        function showSideBar(){
            store.dispatch('animations/changeState', true)
        }

        function hideSideBar(){
            store.dispatch('animations/changeState', false)
        }

        return {
            DropdownMenu,
            showSideBar,
            hideSideBar,
            sideSlide,
            productsDropdown
        }
    },
})
</script>


<style scoped>
    @import"./../../../css/admin/adminSideBar.css";
    .router-link-active.router-link-exact-active.collapse-item{
        color: var(--admin-30-clr) !important;
        font-weight: 500;
    }

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