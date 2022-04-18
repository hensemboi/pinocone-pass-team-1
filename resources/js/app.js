import { createApp } from "vue";
import App from "./App.vue";
import Router from "./router.js";
require('./bootstrap');
window.Vue = require('vue');
//resources/js/app.js
import Store from "./store";

const app = createApp(App);
app.use(Router);
app.use(Store);
app.mount('#app');
