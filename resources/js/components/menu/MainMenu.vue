<template>
    <aside class="menu-area">
        <nav class="menu">
            <router-link to="/">
                <i class="bi bi-house-fill"></i> Início
            </router-link>
            <router-link to="/cliente">
                <i class="bi bi-person"></i> Clientes
            </router-link>
            <router-link to="/veiculo">
                <i class="bi bi-box2-fill"></i> Veiculos
            </router-link>
            <router-link to="/venda">
                <i class="bi bi-cart-fill"></i> Vendas
            </router-link>
        </nav>
    </aside>
</template>

<script>
export default {
    name: "MainMenu"
}
</script>

<style scoped>
    aside.menu-area {
        background-color: #353f49;
    }

    nav a {
        padding: 15px;
        font-weight: 250;
        font-size: 20px;
        text-decoration: none;
        color: #F5F5F5;
        display: block;
    }

    nav a:hover {
        background: #353f49;
    }
</style>
