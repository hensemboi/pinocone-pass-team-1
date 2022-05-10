export default{
    namespaced: true,
    state: () => ({
        orders: []
    }),
    mutations:{
        addOrders (state) {
            orders = state.orders;
        }
    },
    getters: {
        getOrders (state) {
            return state.orders;
        },
        getIsOrdersPopulated (state) {
            return state.orders && state.orders.length > 0;
        }
    },
    actions:{
        async fetchOrders(context) {
            const { default: axios } = require("axios");
            await axios
                .get("http://localhost:8000/api/marketplace")
                .then(() => {
                    axios
                        .get("/orders", {
                            action: "fetchAll",
                        })
                        .then((response) => {
                            context.commit("addOrders", response.data);
                        })
                        .catch((err) => {
                            console.log(err.response.data.errors);
                        });
                });

            
        },
    }
}