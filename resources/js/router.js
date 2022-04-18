import { createRouter, createWebHistory } from "vue-router";
import Homepage from "./views/Homepage.vue";
import Navbar from "./components/navbar/Navbar.vue";
import Footer from "./components/UI/TheFooter.vue";
import Login from "./views/Login.vue";
import Register from "./views/Registration.vue";
import Dashboard from './views/Dashboard.vue';
import ProductsList from "./components/pages/ProductsList.vue";
import UserCart from "./components/pages/UserCart.vue";
import NotFound from "./components/NotFound.vue";
import Register from "./views/Register.vue";
import Store from "./store";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/",
            redirect: "/home",
        },
        {
            path: "/home",
            components: {
                default: Homepage,
                footer: Footer,
                navbar: Navbar,
            },
        },
        {
            path: "/login",
            components: {
                default: Login,
            },
        },
        {
            path: "/register",
            components: {
                default: Register,
            },
        },
        {
            path: "/dashboard",
            components: {
                default: Dashboard,
            }
        },
        {
            name: "marketplace",
            path: "/marketplace",
            components: {
                default: ProductsList,
                footer: Footer,
                navbar: Navbar,
            },
        },
        {
            path: "/cart",
            components: {
                default: UserCart,
                footer: Footer,
                navbar: Navbar,
            },
        },
        {
            path: "/:notFound(.*)",
            components: {
                default: NotFound,
            },
        },
    ],
});

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
      if (Store.getters["auth/getAuthenticated"]) {
        next();
        return;
      }
      next("/");
    } else {
      next();
    }
  });
  export default router;
