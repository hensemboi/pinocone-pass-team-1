import {useStore} from 'vuex';

export default{
    namespaced: true,
    state: () => ({
        menus: [],
        catetgories: [],
        cuisines: []
    }),
    mutations: {
        FETCH_ALL_MENUS(state, url, action){
            const { default: axios } = require('axios');
        },
        setMenus(state, payload){
            state.menus = payload;
        },
        setCategories(state, payload){
            state.categories = payload;
        },
        setCuisines(state, payload){
            state.cuisines = payload;
        }
    },
    
    getters: {
        getAllMenus(state){
            return state.menus;
        },
        getAllCategories(state){
            return state.categories;
        },
        getAllCuisines(state){
            return state.cuisines;
        },
        getIsMenusPopulated(state) {
            return state.menus && state.menus.length > 0;
        },
        getIsCategoriesPopulated(state) {
            return state.categories && state.categories.length > 0;
        },
        getIsCuisinesPopulated(state) {
            return state.cuisines && state.cuisines.length > 0;
        }
    },
    actions: {
        async fetchAllMenus({commit}, {url,action}){
            return axios.get("http://localhost:8000/sanctum/csrf-cookie").then(async () => {    
                return axios.get(url).then((response)=>{
                    commit('setMenus', response.data)
                    return response.data
                })
            })  
        },
        async fetchAllCategories({commit}){
            return axios.get("http://localhost:8000/sanctum/csrf-cookie").then(async () => {    
                return axios.get('/categories').then((response)=>{
                    commit('setCategories', response.data)
                    return response.data
                })
            })
        },
        async fetchAllCuisines({commit}){
            return axios.get("http://localhost:8000/sanctum/csrf-cookie").then(async () => {    
                return axios.get('/cuisines').then((response)=>{
                    commit('setCuisines', response.data)
                    return response.data
                })
            })
        }
    }
}