<template>
    <div id="body">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input
                    v-model="searchQuery" 
                    class="form-control bg-light border-0 small" 
                    type="search"
                    placeholder="Search for food ..."
                    aria-label="Search"
                    aria-describedby="search-addon"
                    data-toggle="dropdown" 
                    aria-haspopup="true" 
                    aria-expanded="false"
                    @blur="validateInput">
                <div>
                    <ul class="dropdown-menu dropdown-menu-right" :class="{show:searchString != ''}" style="width: 100%;">
                        <li v-for="s in searchString" :key="s" class="dropdown-item" @click="searchQuery=s" v-html="highlight(s,searchQuery)">
                        </li>
                    </ul>
                </div>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <div>

        <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <div class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @click="isTable = !isTable">
                        <i class="fas layout-icon fa-xl" :class="[isTable? 'fa-table':'fa-grip-vertical']"></i>
                        <!-- Counter - Alerts -->
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                    <div class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @click="toggleSort = !toggleSort">
                        <i class="fas fa-arrow-down-short-wide fa-xl" :class="{selected: sortBy != '' }"/>
                        <!-- Counter - Alerts -->
                    </div>
                    <!-- Dropdown - Alerts -->
                    <div v-if="toggleSort" class="show dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Sort Options
                        </h6>
                        <div class="container">
                            <div class="col-xsm" style="width: ">
                                <button class="btn btn-sort d-flex justify-content-between" :class="{'btn-primary':sortBy == 'PK_menuID' }" style="min-width: 200px;" @click="sortBy = 'PK_menuID'; sortDir = (sortDir == 'asc')? 'desc' : 'asc'">ID
                                    <i class="fas fa-arrow-down-short-wide fa-xl" :class="{'fa-arrow-up-short-wide': sortDir == 'asc' && sortBy == 'PK_menuID'}" style="line-height: 24px;"></i>
                                </button>                 
                                <button class="btn btn-sort d-flex justify-content-between" :class="{'btn-primary':sortBy == 'menuName' }" style="min-width: 200px;" @click="sortBy = 'menuName'; sortDir = (sortDir == 'asc')? 'desc' : 'asc'">Name
                                    <i class="fas fa-arrow-down-short-wide fa-xl" :class="{'fa-arrow-up-short-wide': sortDir == 'asc' && sortBy == 'menuName'}" style="line-height: 24px;"></i>
                                </button>                 
                                <button class="btn btn-sort d-flex justify-content-between" :class="{'btn-primary':sortBy == 'price' }" style="min-width: 200px;" @click="sortBy = 'price'; sortDir = (sortDir == 'asc')? 'desc' : 'asc'">Price
                                    <i class="fas fa-arrow-down-short-wide fa-xl" :class="{'fa-arrow-up-short-wide': sortDir == 'asc' && sortBy == 'price'}" style="line-height: 24px;"></i>
                                </button>                 
                                <button class="btn btn-sort d-flex justify-content-between" :class="{'btn-primary':sortBy == 'totalOrders' }" style="min-width: 200px;" @click="sortBy = 'totalOrders'; sortDir = (sortDir == 'asc')? 'desc' : 'asc'">Total Orders
                                    <i class="fas fa-arrow-down-short-wide fa-xl" :class="{'fa-arrow-up-short-wide': sortDir == 'asc' && sortBy == 'totalOrders'}" style="line-height: 24px;"></i>
                                </button>                 
                                <button class="btn btn-sort d-flex justify-content-between" :class="{'btn-primary':sortBy == 'category.name' }" style="min-width: 200px;" @click="sortBy = 'category.name'; sortDir = (sortDir == 'asc')? 'desc' : 'asc'">Category
                                    <i class="fas fa-arrow-down-short-wide fa-xl" :class="{'fa-arrow-up-short-wide': sortDir == 'asc' && sortBy == 'category.name'}" style="line-height: 24px;"></i>
                                </button>                 
                                <button class="btn btn-sort d-flex justify-content-between" :class="{'btn-primary':sortBy == 'cuisinetype.name' }" style="min-width: 200px;" @click="sortBy = 'cuisinetype.name'; sortDir = (sortDir == 'asc')? 'desc' : 'asc'">Cuisine
                                    <i class="fas fa-arrow-down-short-wide fa-xl" :class="{'fa-arrow-up-short-wide': sortDir == 'asc' && sortBy == 'cuisinetype.name'}" style="line-height: 24px;"></i>
                                </button>   
                            </div> 
                        </div>
                        <button class="btn dropdown-item text-center small text-gray-500" v-on:click=" sortBy='PK_menuID'; sortDir='asc'" >Reset All</button>
                    </div>
                </li>

                <li class="nav-item dropdown no-arrow mx-1">
                    <div class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @click="toggleFilter = !toggleFilter">
                        <i class="fas fa-filter fa-xl" :class="{selected: filterByCuisine != '' || filterByCat!=''}"></i>
                        <!-- Counter - Alerts -->
                    </div>
                    <!-- Dropdown - Alerts -->
                    <div v-if="toggleFilter" class="show dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Filter Options
                        </h6>
                        <div class="container">
                            <div class="form-group col-sm">
                                <label class="row" style="margin-left: 0;">Category</label>
                                <select class="row dropdown-menu show animated--fade-in show" style="min-width: 0 !important; width: 80%; position: relative;" id="categoryCode" v-model="filterByCat" required> 
                                    <option class="dropdown-item" :value="''">All</option>
                                    <option v-for="cat in categoryList" :key="cat.name" :value="cat.name" class="dropdown-item">{{cat.name}}</option>
                                </select>
                            </div>
                            <div class="form-group col-sm">
                                <label class="row" style="margin-left: 0;"  >Cuisine</label>
                                <select class="row dropdown-menu show animated--fade-in show" style="min-width: 0 !important; width: 80%; position: relative;" id="categoryCode" v-model="filterByCuisine" required> 
                                    <option class="dropdown-item" :value="''">All</option>
                                    <option v-for="c in cuisineList" :key="c.name" :value="c.name" class="dropdown-item">{{c.name}}</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn dropdown-item text-center small text-gray-500" v-on:click=" filterByCat=''; filterByCuisine=''" >Reset All</button>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                        <img class="img-profile rounded-circle"
                            src="img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
        <Modal :modal="openModel" v-on:closeModal="openModel=false" :menu="editedMenu" :categories="categoryList" :editCheck="editCheck" :cuisines="cuisineList"></Modal>

        <div v-if="isMenuPopulated && isCategoryPopulated && isCuisinePopulated">		    
            <div class="container d-flex" v-if="!isTable">
                <MenuCard v-for="menu in currMenus" :key="menu" :menu="menu" :searchQuery="searchQuery"></MenuCard> 
            </div>
            <div class="" v-else>
                <Tables :menus="currMenus" v-on:add="editCheck=false;openModel= true" v-on:edit="val => {editedMenu = val; openModel = !openModel; editCheck = !editCheck  }" v-on:sort="val => {sortBy = val ; sortDir = (sortDir == 'asc')? 'desc' : 'asc'}" :searchQuery="searchQuery"></Tables> 
            </div>
        </div>
        <div class="container d-flex" v-else>
            <CardSkeleton v-for="n in 15" :key="n"></CardSkeleton>
        </div>
    </div>
</template>

<script>
import MenuCard  from './../../components/cards/MenuCard.vue' 
import Tables from './../../components/datatables/DataTables.vue'
import CardSkeleton from './../../components/skeleton_loader/MenuCardSkeletonLoader.vue'
import Modal from './../../components/modals/Modal.vue'

import {useStore} from 'vuex';
import {computed, ref, watch} from 'vue';
import { isString } from '@vue/shared';


export default ({
    components:{
        MenuCard,
        Tables,
        CardSkeleton,
        Modal
    },
    setup(props, context) {
        const editCheck = ref(false)
        const openModel= ref(false)
        const editedMenu = ref();
        const store = useStore();
        const searchQuery = ref('');
        const isTable = ref(false)
        const sortBy = ref('PK_menuID')
        const toggleFilter = ref(false);
        const toggleSort = ref(false);
        const sortDir = ref('asc');
        const isMenuPopulated = computed(() => {
            return store.getters["menu/getIsMenusPopulated"];
        });
        const isCategoryPopulated = computed(() => {
            return store.getters["menu/getIsCategoriesPopulated"];
        });
        const isCuisinePopulated = computed(() => {
            return store.getters["menu/getIsCuisinesPopulated"];
        });
        const menuList = computed(() =>{
            return store.getters["menu/getAllMenus"];
        })
        const categoryList = computed(()=>{
            return store.getters['menu/getAllCategories'];
        })
        const cuisineList = computed(()=>{
            return store.getters['menu/getAllCuisines'];
        })
        watch(editedMenu,(c)=>{
            console.log(c.value + openModel.value)
        })
        
        const filterByCat= ref('')

        const filterByCuisine= ref('')

        const sorted = computed(()=>{
            let sb = sortBy.value;
            let dir = sortDir.value;
            return _.orderBy(menuList.value, sb, dir)
        })
        const currMenus = computed(()=>{
            let currMenus = menuList.value
            let sb = sortBy.value;
            let dir = sortDir.value;
            let input = searchQuery.value;
            let cat = filterByCat.value;
            let cuisine = filterByCuisine.value;
            console.log(currMenus)
            currMenus = currMenus.filter((m)=>m.category.name.includes(cat))
            currMenus = currMenus.filter((m)=>m.cuisinetype.name.includes(cuisine))
            if(isString(searchQuery.value)){
                input = input.toLowerCase().trim()
                const regex = input
                currMenus = searchQuery.value === '' ? currMenus : _.filter(currMenus, (m)=>m.category.name.toLowerCase().trim().match(regex) || m.menuName.toLowerCase().trim().match(regex) ||  m.description.toLowerCase().trim().match(regex)) 
            }
            if(sb){
                currMenus = _.orderBy(currMenus, sb, dir)
            }
    
            return currMenus
        })
        const searchString=computed(()=>{
            let arr=[]
            let regex = searchQuery.value
            currMenus.value.forEach((c)=>{
                arr.push(c.menuName)
                arr.push(c.category.name)
                arr.push(c.cuisinetype.name)
            })
            return regex === '' ? '' : _.uniq(_.filter(arr, (s)=>s.toLowerCase().trim().match(regex)))
        })
        async function getAllMenus (){
            if (!store.getters["menu/getIsMenusPopulated"]) {
                try {
                    await store.dispatch('menu/fetchAllMenus', {url: "/products",action: 'index'});
                } catch (error) {
                    console.log(
                        error.errorMessage || "Failed to fetch prodcucts"
                    );
                }
            } else {
                computed(() =>store.getters['menu/getAllMenus']);
            }
        }
        async function getAllCategories (){
            if (!store.getters["menu/getIsCategoriesPopulated"]) {
                try {
                    await store.dispatch('menu/fetchAllCategories');
                } catch (error) {
                    console.log(
                        error.errorMessage || "Failed to fetch categories"
                    );
                }
            } else {
                console.log("The fetching is not executing!");
                computed(() =>store.getters['menu/getAllCategories']);
            }
            
        }
        async function getAllCuisines (){
            if (!store.getters["menu/getIsCuisinesPopulated"]) {
                try {
                    await store.dispatch('menu/fetchAllCuisines');
                } catch (error) {
                    console.log(
                        error.errorMessage || "Failed to fetch cuisines"
                    );
                }
            } else {
                console.log("The fetching is not executing!");
                computed(() =>store.getters['menu/getAllCategories']);
            }
            
        }
        function highlight(current, query){
            let it = query
            let c = new RegExp(it, "gi") 
            let found = current.search(c) !== -1;
            return !found ? current : current.replace(c, '<strong>' + it + '</strong>');
        }
        function editMenu(v){
            console.log(v)  
        }

        return{
            highlight,
            toggleFilter,
            toggleSort,
            searchString,
            Tables,
            isTable,
            MenuCard,
            searchQuery,
            getAllMenus,
            isMenuPopulated,
            isCuisinePopulated,
            CardSkeleton,
            menuList,
            sortBy  ,
            sorted,
            sortDir,
            highlight,
            currMenus,
            getAllCategories,
            getAllCuisines,
            isCategoryPopulated,
            categoryList,
            filterByCat,
            filterByCuisine,
            cuisineList,
            Modal,
            editMenu,
            editedMenu,
            openModel,
            editCheck
        }  
    },
    created(){
        this.getAllCategories();
        this.getAllMenus();
        this.getAllCuisines();
    }
})
</script>

<style scoped>
    .selected{
        color: var(--admin-30-clr);
    }
    .selected:hover{
        color: #456778;
    }
    .btn-sort:hover{
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(254, 213, 49, 0.25);
    }
    .container {
        flex-flow: row;
        flex-wrap: wrap;
    }
        #body{
        margin-left:230px;
    }
</style>