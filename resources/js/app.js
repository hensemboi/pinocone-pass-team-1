import { createApp } from "vue";
import App from "./App.vue";
import Router from "./router.js";

window.axios = require('axios');

const app = createApp(App);
app.use(Router);
app.mount('#app');
