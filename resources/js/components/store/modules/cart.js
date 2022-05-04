export default {
    namespaced: true,
    state() {
        return {
            items: [],
            total: 0,
            qty: 0,
            effectivePrice: 0,
            effectiveQuantity: 0,
        };
    },
    mutations: {
        addProductToCart(state, payload) {
            // The payload here is the products object
            const productData = payload;
            console.log(productData.PK_menuID);
            const productInCartIndex = state.items.findIndex(
                (ci) => ci.productId == productData.PK_menuID
            );
            console.log(productData.menuName);
            if (productInCartIndex >= 0) {
                // Find the specific product and adds its total quantity
                if (productData.is_promoted == 2) {
                    state.items[productInCartIndex].qty += 2;
                }
    
                else {
                    state.items[productInCartIndex].qty += 1;
                }

            } else {
                if (productData.is_promoted == 1) {
                    state.effectivePrice = productData.discountedPrice;
                    state.effectiveQuantity = 1;
                }

                else if (productData.is_promoted == 2) {
                    state.effectivePrice = productData.price;
                    state.effectiveQuantity = 2;
                }

                else {
                    state.effectivePrice = productData.price;
                    state.effectiveQuantity = 1;
                }

                const newItem = {
                    productId: productData.PK_menuID,
                    title: productData.menuName,
                    image: productData.menuName,
                    price: state.effectivePrice,
                    qty: state.effectiveQuantity,
                    promotionType: productData.is_promoted,
                    note: "No note",
                };
                state.items.push(newItem);
            }
            
            if (productData.is_promoted == 1) {
                state.total += productData.discountedPrice;
                state.qty += 1;
            }

            else if (productData.is_promoted == 2) {
                state.total += productData.price;
                state.qty += 2;
            }

            else {
                state.total += productData.price;
                state.qty += 1;
            }
        },

        removeProductFromCart(state, payload) {
            const prodId = payload.Id;
            const productInCartIndex = state.items.findIndex(
                (cartItem) => cartItem.PK_menuID === prodId
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
                (cartItem) => cartItem.PK_menuID === prodId
            );
            const prodData = state.items[productInCartIndex];

            if (productData.is_promoted == 2) {
                prodData.qty -= 2;
            }

            else {
                prodData.qty -= 1;
            }

            prodData.qty -= 1;
            if (prodData.qty > 0) {
                if (prodData.promotionType == 2) {
                    state.qty -= 2;
                }
    
                else {
                    state.qty -= 1;
                }

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
            const product = products.find((prod) => prod.PK_menuID === productId);
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
