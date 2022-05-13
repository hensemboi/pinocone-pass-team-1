import { createApp } from "vue";
import App from "./App.vue";
import Router from "./router.js";
import Store from "./components/store/index.js";
import BaseBadge from "./components/UI/BaseBadge.vue";
import BaseDialog from "./components/UI/BaseDialog.vue";
import BaseButton from "./components/UI/BaseButton.vue";
import BaseContainer from "./components/UI/BaseContainer.vue";
import BaseSearch from "./components/UI/BaseSearch.vue";
import BaseCard from "./components/UI/BaseCard.vue";
import BaseSpinner from "./components/UI/BaseSpinner.vue";

window.axios = require("axios");
require("./bootstrap");
window.Vue = require("vue");

const app = createApp(App);

app.component("base-badge", BaseBadge);
app.component("base-dialog", BaseDialog);
app.component("base-button", BaseButton);
app.component("base-search", BaseSearch);
app.component("base-container", BaseContainer);
app.component("base-card", BaseCard);
app.component("base-spinner", BaseSpinner);

app.use(Router);
app.use(Store);
app.mount("#app");
