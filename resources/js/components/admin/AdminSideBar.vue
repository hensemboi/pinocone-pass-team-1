<template>
    <span id="SideBarBtn" @click="showSideBar()"><i class="fa fa-bars"></i></span>
    <transition name="slide" >
        <div v-if="sideSlide" class="sidenav d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; margin: 0;">
            <div class="d-flex d-flex justify-content-between">
                <div>
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                        <span class="fs-4">Sidebar</span>
                    </a>
                </div>
                <div>
                    <i @click="hideSideBar()" class="text-white fa fa-xmark fa-2xl"></i>
                </div>
            </div>
            
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="fa fa-2xl fa-chart-line"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="fa fa-2xl fa-file-invoice-dollar"></i>
                    Orders
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="fa fa-2xl fa-bowl-food"></i>
                    Products
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="fa fa-2xl fa-user-group"></i>
                    Customers
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="fa fa-2xl fa-bullhorn"></i>
                    Reports
                </a>
            </li>
            </ul>
            <hr>
            <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
            </div>
        </div>
    </transition>
</template>

<script>
import {useStore} from 'vuex';
import {computed, ref} from 'vue';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faHatWizard } from '@fortawesome/free-solid-svg-icons'


export default ({
    setup() {
            library.add(faHatWizard);

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
</style>