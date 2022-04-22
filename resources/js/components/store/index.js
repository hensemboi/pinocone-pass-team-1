import { createStore } from "vuex";
import cartModule from "./modules/cart.js";
import marketplaceModule from "./modules/marketplace.js";
import authModule from "./modules/auth.js";
import userModule from "./modules/users.js";

const store = createStore({
    modules: {
        marketplace: marketplaceModule,
        cart: cartModule,
        auth: authModule,
        user: userModule,
    },
});

export default store;
