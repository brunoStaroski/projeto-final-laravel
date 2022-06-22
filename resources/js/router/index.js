import {createRouter, createWebHistory} from 'vue-router';
import home from '../components/home/Home';
import Cliente from '../components/cliente/Cliente';
import Veiculo from "../components/veiculo/Veiculo";
import Venda from "../components/venda/Venda";

const routes = [
    {path: '/', component: home},
    {path: '/cliente', component: Cliente},
    {path: '/veiculo', component: Veiculo},
    {path: '/venda', component: Venda}
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
})

export default router;
