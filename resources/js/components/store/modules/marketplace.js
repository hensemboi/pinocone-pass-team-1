export default {
    namespaced: true,
    state() {
        return {
            products: null,
        };
    },
    mutations: {
        addProducts(state, payload) {
            state.products = payload;
        },
    },
    actions: {
        async fetchProducts(context) {
            const { default: axios } = require("axios");
            await axios
                .get("http://localhost:8000/sanctum/csrf-cookie")
                .then(() => {
                    axios
                        .get("/marketplace", {
                            action: "fetchAll",
                        })
                        .then((response) => {
                            context.commit("addProducts", response.data);
                        })
                        .catch((err) => {
                            console.log(err.response.data.errors);
                        });
                });
        },
    },
    getters: {
        getProducts(state) {
            return state.products;
        },
        getIsProductsPopulated(state) {
            return state.products && state.products.length > 0;
        },
    },
};
