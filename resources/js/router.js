import { createRouter, createWebHistory } from "vue-router";
import TestComponent from "./components/TestComponent.vue";
import Homepage from "./components/Homepage.vue";
import TheFooter from "./components/TheFooter.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: "/test", component: TestComponent },
        {
            path: "/home",
            components: {
                default: Homepage,
                footer: TheFooter,
            },
        },
    ],
});

export default router;
