import { createStore } from 'vuex';
import cartModule from './modules/cart.js';
import marketplaceModule from './modules/marketplace.js';
import authModule from './modules/auth.js';

const store = createStore({
  modules: {
    marketplace: marketplaceModule,
    cart: cartModule,
    auth: authModule
  },
});

export default store;
