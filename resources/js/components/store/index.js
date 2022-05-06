import { createStore } from "vuex";
import marketplaceModule from "./modules/marketplace.js";
import cartModule from "./modules/cart.js";
import checkoutModule from "./modules/checkout.js";
import authModule from "./modules/auth.js";
import userModule from "./modules/users.js";
import animationsModule from './modules/animations.js';
import fetchModule from './modules/fetch.js';
import menuModule from './modules/menu.js';

const store = createStore({
  modules: {
    checkout: checkoutModule,
    auth: authModule,
    user: userModule,
    marketplace: marketplaceModule,
    cart: cartModule,
    animations: animationsModule,
    fetch: fetchModule,
    menu: menuModule
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
  }
});

export default store;
