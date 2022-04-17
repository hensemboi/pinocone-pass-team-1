import { createApp } from "vue";
import App from "./App.vue";
import Router from "./router.js";
import Store from "./components/store/index.js";
import BaseBadge from "./components/UI/BaseBadge.vue";

const app = createApp(App);

app.component('base-badge', BaseBadge);
app.use(Router);
app.use(Store);
app.mount("#app");
