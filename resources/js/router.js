import { createRouter, createWebHistory } from "vue-router";
import Homepage from "./views/Homepage.vue";
import Navbar from "./components/navbar/Navbar.vue";
import Footer from "./components/UI/TheFooter.vue";
import Login from "./views/Login.vue";
import ProductsList from "./components/pages/ProductsList.vue";
import UserCart from "./components/pages/UserCart.vue";
import NotFound from "./components/NotFound.vue";

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

export default router;
