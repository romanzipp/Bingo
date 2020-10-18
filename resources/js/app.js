import Vue from 'vue';
import router from './router';
import store from './store';
import App from './components/App';
import { DateTime } from 'luxon';

Vue.config.ignoredElements = ['ion-icon'];
Vue.config.productionTip = false;

Vue.prototype.$luxon = DateTime;

const app = new Vue({
    router,
    store,
    render: h => h(App),
    beforeCreate() {
        this.$store.commit('auth/loadDefaults');
        this.$store.commit('games/loadDefaults');
    }
}).$mount('#app');
