import Vue from "vue";
import Vuex from 'vuex';
import App from "./App";
import router from "./router/index";
import './axios.js';
import store from './store/main.js';
import Mixins from './mixins.js';
import 'es6-promise/auto'
import { datadogRum } from '@datadog/browser-rum';


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

datadogRum.init({
    applicationId: '6f42a83a-4dac-412a-9f4e-907bf85d2330',
    clientToken: 'pub6965017e7d017bf8b106e3c9a1d6756d',
    site: 'datadoghq.com',
    service: 'phpconference-front',
    env: 'live',
    // Specify a version number to identify the deployed version of your application in Datadog 
    version: '1.0.0', 
    sessionSampleRate: 100,
    sessionReplaySampleRate: 20,
    trackUserInteractions: true,
    trackResources: true,
    trackLongTasks: true,
    defaultPrivacyLevel: 'mask-user-input',
    allowedTracingUrls: ["http://localhost", /http:\/\/.*\.localhost/, (url) => url.startsWith("http://localhost")]
});

/* eslint-disable no-new */
window.onload = function () {
    const app = new Vue({
        router,
        store: new Vuex.Store(store),
        render: h => h(App)
    }).$mount("#app");

    window.app = app
}