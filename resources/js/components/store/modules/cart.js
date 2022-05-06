export default {
    namespaced: true,
    state() {
        return {
            productData: [],
            items: [],
            total: 0,
            qty: 0,
            effectivePrice: 0,
            effectiveQuantity: 0,
            vouchedPrice: 0,
        };
    },
    mutations: {
        addProductToCart(state, payload) {
            const productData = payload;
            console.log(productData.PK_menuID);
            const productInCartIndex = state.items.findIndex(
                (ci) => ci.productId == state.productData.PK_menuID
            );
            
            if (productInCartIndex >= 0) {
                if (state.productData.is_promoted == 2) {
                    state.items[productInCartIndex].qty += 2;
                }
    
                else {
                    state.items[productInCartIndex].qty += 1;
                }

            } else {
                if (state.productData.is_promoted == 1) {
                    state.effectivePrice = state.productData.discount_price;
                    state.effectiveQuantity = 1;
                }

                else if (state.productData.is_promoted == 2) {
                    state.effectivePrice = state.productData.price;
                    state.effectiveQuantity = 2;
                }

                else {
                    state.effectivePrice = state.productData.price;
                    state.effectiveQuantity = 1;
                }

                const newItem = {
                    productId: state.productData.PK_menuID,
                    title: state.productData.menuName,
                    image: state.productData.menuName,
                    price: state.effectivePrice,
                    qty: state.effectiveQuantity,
                    promotionType: state.productData.is_promoted,
                    note: "No note",
                };
                state.items.push(newItem);
            }
            
            if (state.productData.is_promoted == 1) {
                state.total += state.productData.discount_price;
                state.qty += 1;
            }

            else if (state.productData.is_promoted == 2) {
                state.total += state.productData.price;
                state.qty += 2;
            }

            else {
                state.total += state.productData.price;
                state.qty += 1;
            }
        },
        removeProductFromCart(state, payload) {
            const prodId = payload.Id;
            const productInCartIndex = state.items.findIndex(
                (cartItem) => cartItem.productId === prodId
            );
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
            state.productData = state.items[productInCartIndex];

            if (state.productData.promotionType == 2) {
                state.productData.qty -= 2;
            }

            else {
                state.productData.qty -= 1;
            }

            if (state.productData.qty > 0) {
                if (state.productData.promotionType == 2) {
                    state.qty -= 2;
                }
    
                else {
                    state.qty -= 1;
                }

                state.total -= state.productData.price;
                return;
            }
            
            if (state.productData.promotionType == 2) {
                state.qty -= 2;
            }

            else {
                state.qty -= 1;
            }

            state.total -= state.productData.price;
            state.items.splice(productInCartIndex, 1);
        },
        useVoucherReducePrice(state, payload) {
            state.vouchedPrice = payload.less;
        },
    },
    actions: {
        addToCart(context, payload) {
            const productId = payload.id;
            const products = context.rootGetters["marketplace/getProducts"];
            const product = products.find(
                (prod) => prod.PK_menuID === productId
            );
            context.commit("addProductToCart", product);
        },
        removeFromCart(context, payload) {
            context.commit("removeProductFromCart", payload);
        },
        removeOneFromCart(context, payload) {
            context.commit("removeOneFromCart", payload);
        },
        useVoucherReducePrice(context, payload) {
            context.commit("useVoucherReducePrice", payload);
        },
    },
    getters: {
        items(state) {
            return state.items;
        },
        totalSum(state) {
            return state.total;
        },
        vouched(state) {
            return state.vouchedPrice;
        },
        quantity(state) {
            return state.qty;
        },
    },
};
