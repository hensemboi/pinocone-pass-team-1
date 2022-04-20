import { createStore } from 'vuex';
import cartModule from './modules/cart.js';
import marketplaceModule from './modules/marketplace.js';
import animationsModule from './modules/animations.js'

const store = createStore({
  modules: {
    marketplace: marketplaceModule,
    cart: cartModule,
    animations: animationsModule
  },
  state() {
    return {
      isLoggedIn: false,
    };
  },
  mutations: {
    login(state) {
      state.isLoggedIn = true;
    },
    logout(state) {
      state.isLoggedIn = false;
    },
  },
  actions: {
    login(context) {
      context.commit('login')
    },
    logout(context) {
      context.commit('logout')
    },
  },
  getters: {
    isAuthenticated (state) {
      return state.isLoggedIn;
    }
  }
});

export default store;
