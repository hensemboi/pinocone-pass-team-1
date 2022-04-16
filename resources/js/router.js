import { createRouter, createWebHistory } from "vue-router";
import TestComponent from "./components/TestComponent.vue";
import Homepage from "./views/Homepage.vue";
import Footer from "./components/TheFooter.vue";
import Login from "./views/Login.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { 
            path: "/test",
            component: TestComponent 
        },
        {
            path: "/home",
            components: {
                default: Homepage,
                footer: Footer,
            },
        },
        {
            path: "/login",
            components: {
                default: Login,
            },
        },
    ],
});

export default router;
