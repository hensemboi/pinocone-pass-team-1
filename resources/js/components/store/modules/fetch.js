export default{
    namespaced: true,
    state: () => ({

    }),
    mutations: {
        fetchAll(state, {url, action}){
        const { default: axios } = require('axios');
        axios.get("http://localhost:8000/sanctum/csrf-cookie").then(() => {
            axios.get(url, {
                    action: action,
                })
                .then((response) => {
                    return response.data;
                }
                )
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        });
    }
    },
    getters: {

    },
    actions: {
        fetchAll(context, {url, action}){

        },
    }
};