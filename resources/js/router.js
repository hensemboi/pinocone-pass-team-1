import { createRouter, createWebHistory } from "vue-router";
import TestComponent from "./components/TestComponent.vue";
import Homepage from "./components/Homepage.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: "/test", component: TestComponent },
        { path: "/home", component: Homepage },
    ],
});

export default router;
