import Vue from 'vue'
import App from './App.vue'


import axios from 'axios'
import VueAxios from 'vue-axios'
import axiosRetry from 'axios-retry';

axiosRetry(axios, {
    retries: 3,
    retryDelay: (retryCount) => {
        return retryCount * 1000;
    }
});
Vue.use(VueAxios, axios)


Vue.config.productionTip = false

new Vue({
    render: h => h(App),
}).$mount('#app')
