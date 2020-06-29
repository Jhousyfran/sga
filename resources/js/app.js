import Vue from "vue";
import Vuex from 'vuex';
import App from "./App";
import router from "./router/index";
import './axios.js';
import store from './store/main.js';
import Mixins from './mixins.js';
import 'es6-promise/auto'


import PaperDashboard from "./plugins/paperDashboard";
import "vue-notifyjs/themes/default.css";
import VueTheMask from 'vue-the-mask'

Vue.use(PaperDashboard);
Vue.use(Vuex);
Vue.mixin(Mixins);
Vue.use(VueTheMask)

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('App', require('./App.vue').default);


/* eslint-disable no-new */
window.onload = function () {
    const app = new Vue({
        router,
        store: new Vuex.Store(store),
        render: h => h(App)
    }).$mount("#app");

    window.app = app
}