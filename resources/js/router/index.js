import Vue from 'vue';
import VueRouter from 'vue-router';
import Index from '../pages/Index';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    scrollBehavior(to, from, savedPosition) {

        if (savedPosition) {
            return savedPosition;
        }

        return { x: 0, y: 0 };
    },
    routes: [
        {
            path: '/',
            name: 'index',
            component: Index
        },
    ]
});

export default router;
