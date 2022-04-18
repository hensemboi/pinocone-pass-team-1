export default {
    namespaced: true,
    state() {
        return {
            items: [],
            total: 0,
            qty: 0,
        };
    },
    mutations: {
        addProductToCart(state, payload) {
            // The payload here is the products object
            const productData = payload;
            const productInCartIndex = state.items.findIndex(
                (ci) => ci.productId === productData.id
            );

            if (productInCartIndex >= 0) {
                // Find the specific product and adds its total quantity
                state.items[productInCartIndex].qty++;
            } else {
                const newItem = {
                    productId: productData.id,
                    title: productData.title,
                    image: productData.image,
                    price: productData.price,
                    qty: 1,
                };
                state.items.push(newItem);
            }
            state.qty++;
            state.total += productData.price;
        },

        removeProductFromCart(state, payload) {
            const prodId = payload.Id;
            const productInCartIndex = state.items.findIndex(
                (cartItem) => cartItem.productId === prodId
            );
            console.log(productInCartIndex);
            const prodData = state.items[productInCartIndex];
            state.items.splice(productInCartIndex, 1);
            state.qty -= prodData.qty;
            state.total -= prodData.price * prodData.qty;
        },
        removeOneFromCart(state, payload) {
            const prodId = payload.Id;
            const productInCartIndex = state.items.findIndex(
                (cartItem) => cartItem.productId === prodId
            );
            const prodData = state.items[productInCartIndex];
            prodData.qty -= 1;
            if (prodData.qty > 0) {
                state.qty--;
                state.total -= prodData.price;
                return;
            }
            state.qty--;
            state.total -= prodData.price;
            state.items.splice(productInCartIndex, 1);
        },
    },
    actions: {
        addToCart(context, payload) {
            const productId = payload.id;
            // use context to access the root item
            const products = context.rootGetters["marketplace/getProducts"];
            const product = products.find((prod) => prod.id === productId);
            context.commit("addProductToCart", product);
        },
        removeFromCart(context, payload) {
            context.commit("removeProductFromCart", payload);
        },
        removeOneFromCart(context, payload) {
            context.commit("removeOneFromCart", payload);
        },
    },
    getters: {
        items(state) {
            return state.items;
        },
        totalSum(state) {
            return state.total;
        },
        quantity(state) {
            return state.qty;
        },
    },
};
