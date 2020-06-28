import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./routes";
Vue.use(VueRouter);

// configure router
const router = new VueRouter({
  routes, // short for routes: routes
  linkActiveClass: "active"
});

router.beforeEach((to, from, next) => {
  let provider = window.$provider;
  if ((to.name !== 'cadastro') && (to.name !== 'login') && !provider) {
    next({ name: 'login' })
  }
  else next()
});

export default router;
