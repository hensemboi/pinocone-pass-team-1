<template>
    <div>
        <div class="input-group">
            <div class="dropdown" style="width: 93%;">
                <input
                    type="search"
                    class="form-control rounded dropdown-toggle"
                    placeholder="Search for food ..."
                    aria-label="Search"
                    aria-describedby="search-addon"
                    data-toggle="dropdown" 
                    aria-haspopup="true" 
                    aria-expanded="false"
                    v-model="searchQuery"
                    @blur="validateInput"
                />
                <div>
                    <ul class="dropdown-menu dropdown-menu-right" :class="{show:searchString != ''}" style="width: 100%;">
                        <li v-for="s in searchString" :key="s" class="dropdown-item" @click="searchQuery=s" v-html="highlight(s,searchQuery)">
                        </li>
                    </ul>
                </div>
            </div>
            <button
                type="button"
                class="btn btn-outline-primary"
                 style="width: 7%;"
            >
                Search
            </button>
        </div>

        <div v-if="isMenuPopulated && isCategoryPopulated && isCuisinePopulated">
            <div class="row justify-content-between">
                <div class="col-5">
                    <input type="checkbox" id="checkbox" v-model="isTable"/>
                    <label for="checkbox">{{ isTable }}</label>    
                </div>
                <div  class="col-5 right d-flex">
                    <div class="col-sm" v-show="isTable">
                        <button class="btn btn-primary" @click="sortBy = 'PK_menuID'; sortDir = (sortDir == 'asc')? 'desc' : 'asc'">ID</button>                 
                        <button class="btn btn-primary" @click="sortBy = 'menuName'; sortDir = (sortDir == 'asc')? 'desc' : 'asc'">Name</button>  
                        <button class="btn btn-primary" @click="sortBy = 'price'; sortDir = (sortDir == 'asc')? 'desc' : 'asc'">Price</button>  
                        <button class="btn btn-primary" @click="sortBy = 'totalOrders'; sortDir = (sortDir == 'asc')? 'desc' : 'asc'">Total Orders</button>  
                        <button class="btn btn-primary" @click="sortBy = 'category.name'; sortDir = (sortDir == 'asc')? 'desc' : 'asc'">Category</button>  
                        <button class="btn btn-primary" @click="sortBy = 'cuisinetype.name'; sortDir = (sortDir == 'asc')? 'desc' : 'asc'">Cuisine</button>  
                    </div>               
                    <div class="form-group col-sm">
                        <label>Category</label>
                        <select id="categoryCode" v-model="filterByCat" required> 
                            <option v-for="cat in categoryList" :key="cat.name" :value="cat.name">{{cat.name}}</option>
                        </select>
                    </div>
                    <div class="form-group col-sm">
                        <label>Cuisine</label>
                        <select id="categoryCode" v-model="filterByCuisine" required> 
                            <option v-for="c in cuisineList" :key="c.name" :value="c.name">{{c.name}}</option>
                        </select>
                    </div>
                </div>
            </div>			    
            <div class="container d-flex" v-if="isTable">
                <MenuCard v-for="menu in currMenus" :key="menu" :menu="menu" :searchQuery="searchQuery"></MenuCard> 
            </div>
            <div class="" v-else>
                <Tables :menus="currMenus" v-on:sort="val => {sortBy = val ; sortDir = (sortDir == 'asc')? 'desc' : 'asc'}" :searchQuery="searchQuery"></Tables> 
            </div>
        </div>
        <div class="container d-flex" v-else>
            <CardSkeleton v-for="n in 15" :key="n"></CardSkeleton>
        </div>
    </div>

</template>

<script>
import MenuCard  from '../../components/cards/MenuCard.vue'
import Filter from '../../components/cards/Filter.vue'
import Tables from '../../components/datatables/DataTables.vue'
import CardSkeleton from '../../components/skeleton_loader/MenuCardSkeletonLoader.vue'
import {useStore} from 'vuex';
import {computed, ref, watch, isRef, toRefs, reactive} from 'vue';
import { useRouter } from "vue-router";
import { isString } from '@vue/shared';

export default ({
    components:{
        MenuCard,
        Filter,
        Tables,
        CardSkeleton
    },
    setup(props, context) {
        const store = useStore();
        const searchQuery = ref('')
        const router = useRouter();
        const isTable = ref()
        const sortBy = ref('')
        const sortDir = ref('asc')

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
        
        const filterByCat= ref('')

        const filterByCuisine= ref('')

        watch(filterByCat, (c)=>{
            console.log(c)
        })

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
            console.log(searchString)

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
         const searchString  =computed(()=>{
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
            console.log(it)
            let c = new RegExp(it, "gi") 
            let found = current.search(c) !== -1;
            return !found ? current : current.replace(c, '<strong>' + it + '</strong>');
        }

        return{
            highlight,
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
            cuisineList
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
    .container {
        flex-flow: row;
        flex-wrap: wrap;
    }
</style>