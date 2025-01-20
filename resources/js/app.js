import './bootstrap';

import { createApp } from "vue";
import App from './src/App.vue';
import store from "./src/store";
import router from './src/router';
import "./src/assets/css/nucleo-icons.css";
import "./src/assets/css/nucleo-svg.css";
import ArgonDashboard from "./src/argon-dashboard.js";
import setTooltip from "@/src/assets/js/tooltip.js";

const appInstance = createApp(App);
appInstance.use(store);
appInstance.use(router);
appInstance.use(ArgonDashboard);

appInstance.directive('tooltip', {
    mounted(el) {
        setTooltip()
    }
});

appInstance.mount("#app");

// https://www.creative-tim.com/product/vue-argon-dashboard


