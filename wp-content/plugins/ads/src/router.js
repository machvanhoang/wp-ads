import { createRouter, createWebHashHistory } from "vue-router";

// Import các component của trang
import Home from "./pages/Home.vue";
import About from "./pages/About.vue";
import Contact from "./pages/Contact.vue";
import Social from "./pages/Social.vue";
import HeaderFooter from "./pages/HeaderFooter.vue";
import Email from "./pages/Email.vue";
import Configs from "./pages/Configs.vue";
const routes = [
  { path: "/", component: Home },
  { path: "/about", component: About },
  { path: "/contact", component: Contact },
  { path: "/social", component: Social },
  { path: "/header-footer", component: HeaderFooter },
  { path: "/email", component: Email },
  { path: "/configs", component: Configs },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
