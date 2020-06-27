import Vue from "vue";
import Vuex from 'vuex'
import App from "./App";
import router from "./router/index";
import store from './store/main'


import PaperDashboard from "./plugins/paperDashboard";
import "vue-notifyjs/themes/default.css";

Vue.use(PaperDashboard);
Vue.use(Vuex);

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('App', require('./App.vue').default);


/* eslint-disable no-new */
new Vue({
    router,
    store: store,
    render: h => h(App)
}).$mount("#app");