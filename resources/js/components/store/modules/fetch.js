export default{
    namespaced: true,
    state: () => ({

    }),
    mutations: {

    },
    getters: {

    },
    actions: {
        async fetchAll({commit}, {url,action}){
            await axios.get("http://localhost:8000/sanctum/csrf-cookie").then(() => {
                axios.get(url, {
                        action: action,
                    })
                    .then((response) => {
                        return response
                    }
                    )
                    .catch((err) => {
                        this.errors = err.response.data.errors;
                    });
            });
        }
    }
};