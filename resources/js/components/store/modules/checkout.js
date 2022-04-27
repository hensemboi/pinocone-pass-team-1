export default {
    namespaced: true,
    state () {
        return {
            paymentMethod: 0
        };
    },
    mutations: {
        storePaymentMethod(state, payload) {
            state.paymentMethod = payload.data
        },
    },
    actions: {
        storePaymentMethod(context, payload) {
            context.commit("storePaymentMethod", payload.data)
        }
    },
    getters: {
        getPaymentMethod(state) {
            return state.paymentMethod
        }
    },
};
