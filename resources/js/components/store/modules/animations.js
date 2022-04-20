export default {
    namespaced: true,
    state: () => ({
        adminSideSlide: false,
    }),
    mutations:{
        CHANGE_STATE(state, value){
            state.adminSideSlide = value;
        }
    },
    getters:{
        getAdminSideSlide(state){
            return state.adminSideSlide;
        }
    },
    actions:{
        changeState(context, value){
            context.commit('CHANGE_STATE', value);
        },
    }
};