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
        }
    },
    actions: {
        async fetchAllMenus({commit}, {url,action}){
            await axios.get("http://localhost:8000/sanctum/csrf-cookie").then(() => {
                axios.get(url, {
                        action: action,
                    })
                    .then((response) => {
                        commit('setMenus', response.data);
                    }
                    )
                    .catch((err) => {
                        this.errors = err.response.data.errors;
                    });
            });
        },
        async fetchAllCategories({commit}, {url,action}){
            await axios.get("http://localhost:8000/sanctum/csrf-cookie").then(() => {
                axios.get(url, {
                        action: action,
                    })
                    .then((response) => {
                        commit('setCategories', response.data);
                    }
                    )
                    .catch((err) => {
                        this.errors = err.response.data.errors;
                    });
            });
        },
        async fetchAllCuisines({commit}, {url,action}){
            await axios.get("http://localhost:8000/sanctum/csrf-cookie").then(() => {
                axios.get(url, {
                        action: action,
                    })
                    .then((response) => {
                        commit('setCuisines', response.data);
                    }
                    )
                    .catch((err) => {
                        this.errors = err.response.data.errors;
                    });
            });
        },
        setMenus(context, payload){

        }
    }
}