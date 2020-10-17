import Vue from 'vue';
import router from './router';
import store from './store';
import App from './components/App';

Vue.config.ignoredElements = ['ion-icon'];
Vue.config.productionTip = false;

const app = new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app');
