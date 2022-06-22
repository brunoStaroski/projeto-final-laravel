import {createRouter, createWebHistory} from 'vue-router';
import home from '../components/home/Home';
import cliente from '../components/cliente/Cliente';

const routes = [
    {path: '/', component: home},
    {path: '/cliente', component: cliente}
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
})

export default router;
