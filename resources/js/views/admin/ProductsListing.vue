<template>
    <button @click=fetchAllMenu()></button>
    <div  class="container d-flex">
        <div>
            <div>
                CATEGORY FILTER
                <div v-for="category in categories" :key="category">
                    <button @click="filtercategory(category)" class="uniq-category">#{{ category.name }}</button>
                </div>
            </div>
        </div>
        <component v-for="menu in currMenus" :categories=categories :cuisines=cuisines :menu=menu :is="MenuCard" ></component>
    </div>
</template>

<script>
import MenuCard  from '../../components/cards/MenuCard.vue'
import Filter from '../../components/cards/Filter.vue'
import {useStore} from 'vuex';
import {computed, ref, watch} from 'vue';

export default ({
    components:{
        MenuCard,
        Filter
    },
    setup(props, context) {
        const store = useStore();
        const allmenus = computed(() =>store.getters['menu/getAllMenus']);
        const categories =computed(() =>store.getters['menu/getAllCategories']);
        const cuisines = computed(() =>store.getters['menu/getAllCuisines']);

        store.dispatch('animations/changeState', false)
        async function fetchAllMenu(){
            await store.dispatch('menu/fetchAllCategories', {url: "/productslistingcat",action: 'fetchAll'});
            await store.dispatch('menu/fetchAllCuisines', {url: "/productslistingcui",action: 'fetchAll'});
                        await store.dispatch('menu/fetchAllMenus', {url: "/productslisting",action: 'fetchAll'});
        }

        const categoryEvent = [];
        const currCat = ref();

        const currMenus = computed(()=>{
            if(currCat.value != '')
            {
                return currCat.value
                    ?allmenus.value.filter((menu) => menu.FK_categoryCode.includes(currCat.value))
                    :allmenus.value;
            }
        })

        function filtercategory(id){
            currCat.value = id.PK_categoryCode;
            console.log(id.value);
            console.log(currMenus.value);
        }

        watch(currMenus, (currValue, oldValue) => {
            console.log(currValue);
        })
        watch(categories, (currValue, oldValue) => {
            console.log(currValue);
        })
        watch(cuisines, (currValue, oldValue) => {
            console.log(currValue);
        })

        return{
            filtercategory,
            categoryEvent,
            categories,
            cuisines,
            currMenus,
            fetchAllMenu,
            MenuCard
        }  
    },
})
</script>

<style scoped>
    .container {
        flex-flow: row;
        flex-wrap: wrap;
    }
</style>