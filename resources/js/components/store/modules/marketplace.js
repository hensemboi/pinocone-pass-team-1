export default {
    namespaced: true,
    state () {
        return {
            products: [],
            productListUpdated: false,
            productListPopulated: false,
        };
    },
    mutations: {
        // addProducts(state, payload) {

        // },
        populateProductList(state, payload) {
            state.products = payload.data;
            state.productListPopulated = true;
        },
    },
    actions: {
        addProducts(context, payload) {
            context.commit("addProducts");
        },
        populateProductList(context, payload) {
            context.commit("populateProductList", payload.data);
        },
    },
    getters: {
        getProducts(state) {
            return state.products;
        },
        getIsProductListUpdated(state) {
            return state.productListUpdated;
        },
        getIsProductListPopulated(state) {
            return state.productListPopulated;
        },
    },
};

                // {
                //     menuID: "p1",
                //     image: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Books_HD_%288314929977%29.jpg/640px-Books_HD_%288314929977%29.jpg",
                //     menuName: "Book Collection",
                //     description:
                //         "A collection of must-read books. All-time classics included!",
                //     price: 99.99,
                //     categoryCode: "cold",
                //     cuisineCode: "",
                // },