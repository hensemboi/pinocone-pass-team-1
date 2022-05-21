<template>
    <transition name="slide" >
        <ul class="bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <router-link to="/dashboard" class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div>
                    <img src="./../../../../public/images/logo-removebg.png" alt="logo.png" style="width: 200px;">
                </div>
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