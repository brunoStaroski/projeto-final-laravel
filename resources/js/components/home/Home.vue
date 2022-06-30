<template>
    <div>
        <div class="titulo">
            <br>
            <h1>LOJA DE CARROS</h1>
            <br>
        </div>

        <hr>
        <br>

        <div class="inicial">
            <ul>
                <li>
                    <img src="../../../imagens/Carro1.jpg" alt="foto de carro">
                </li>
                <li>
                    <img src="../../../imagens/Carro2.jpg" alt="foto de carro">
                </li>
                <li>
                    <img src="../../../imagens/Carro3.jpg" alt="foto de carro">
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "Home"
}
</script>

<style scoped>
    h1 {
        background-color: #353f49;
        color: white;
        padding: 10px;
    }

    hr {
        color: #353f49;
    }

    li {
        display: inline;
        margin: 5px;
        padding: 5px;
        text-decoration: none;
    }

    img {
        width: 400px;
        height: 350px;
    }

    img:hover {
        transform: scale(1.05);
    }
</style>
