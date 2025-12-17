import "../css/app.css";   // ✅ add this line at the top
import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

createApp(App).use(router).mount("#app");
