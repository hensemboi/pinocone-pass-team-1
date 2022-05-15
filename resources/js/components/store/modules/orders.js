export default {
    namespaced: true,
    state() {
        return {
            orders: [],
        };
    },
    mutations: {
        addOrders(state, payload) {
            state.orders = payload;
        },
    },
    actions: {
        async fetchOrders({ commit }) {
            const { default: axios } = require("axios");
            await axios
                .get("http://localhost:8000/sanctum/csrf-cookie")
                .then(() => {
                    axios
                        .get("/requestdashboard", {
                            action: "fetchUserDetails",
                        })
                        .then((response) => {
                            commit("addOrders", response.data);
                            console.log("Hello world");
                        })
                        .catch((err) => {
                            console.log(err.response.data.errors);
                        });
                });
        },
    },
    getters: {
        getOrders(state) {
            return state.orders;
        },
        getIsOrdersPopulated(state) {
            return state.orders && state.orders.length > 0;
        },
        getUserByID: (state) => (PK_transactionID) => {
            return state.orders.find((order) => order.PK_transactionID == PK_transactionID);
        },
    },
};
