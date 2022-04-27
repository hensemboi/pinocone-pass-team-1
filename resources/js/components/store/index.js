import { createStore } from "vuex";
import marketplaceModule from "./modules/marketplace.js";
import cartModule from "./modules/cart.js";
import checkoutModule from "./modules/checkout.js";
import authModule from "./modules/auth.js";
import userModule from "./modules/users.js";

const store = createStore({
    modules: {
        marketplace: marketplaceModule,
        cart: cartModule,
        checkout: checkoutModule,
        auth: authModule,
        user: userModule,
    },
});

export default store;
