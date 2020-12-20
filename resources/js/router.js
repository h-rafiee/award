import Vue from "vue";
import Router from "vue-router";

import HomePage from "./components/HomePage.vue";
import EventList from "./components/EventList.vue"
import EventCodeList from "./components/EventCodeList.vue"
import MobileList from "./components/MobileList.vue"
import WinnerList from "./components/WinnerList.vue"

import store from "./store/store.js";

Vue.use(Router);

export const router = new Router({
  mode: "history",
  routes: [
    { path: "/", component: HomePage, name: "home" },
    { path: "/events", component: EventList, name: "events" },
    { path: "/events/:slug", component: EventCodeList, name: "events" },
    { path: "/mobiles", component: EventList, name: "mobiles" },
    { path: "/winners", component: WinnerList, name: "winners" },

    // otherwise redirect to home
    { path: "*", redirect: "/" },
  ],
});

export default router;