import Vue from 'vue';
import VueRouter from 'vue-router';
import Index from '../pages/Index';
import CreateGameStart from '../pages/games/create/Start';
import CreateGameCards from '../pages/games/create/Cards';
import CreateGameFinish from '../pages/games/create/Finalize';
import ShowGame from '../pages/games/Show';

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
        {
            path: '/games'
        },
        {
            path: '/games/create/start',
            name: 'games.create.start',
            component: CreateGameStart
        },
        {
            path: '/games/create/cards',
            name: 'games.create.cards',
            component: CreateGameCards
        },
        {
            path: '/games/create/finish',
            name: 'games.create.finish',
            component: CreateGameFinish
        },
        {
            path: '/play/:game',
            name: 'games.show',
            component: ShowGame
        }
    ]
});

export default router;
