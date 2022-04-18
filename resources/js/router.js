import { createRouter, createWebHistory } from "vue-router";
import TestComponent from "./components/TestComponent.vue";
import Homepage from "./views/Homepage.vue";
import Footer from "./components/TheFooter.vue";
import Login from "./views/Login.vue";
import Register from "./views/Register.vue";
import Store from "./store";

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
        {
            path: "/register",
            components: {
                default: Register,
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
