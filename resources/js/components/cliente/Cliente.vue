<template>
    <div>
        <br>
        <div class="legend1">
            <fieldset>
                <legend> Cadastro </legend>
                <label>Nome: </label>
                <input class="campo_nome" type="text" name="nome" id="nome" placeholder="Digite o Nome"><br><br>
                <label>Email: </label>
                <input class="campo_email" type="text" name="email" id="email" placeholder="Digite o E-mail"><br>
            </fieldset><br>
            <input class="campo_enviar" type="submit" name="enviar" id="enviar"><br><br>
        </div>
        <hr>
        <table class='table mt-4'>
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="cliente in clientes" :key="cliente.id" v-if="clientes.length > 0">
                <td>{{cliente.nome}}</td>
                <td>{{cliente.email}}</td>
            </tr>
        </tbody>
        </table>


    </div>
</template>

<script>
import {onMounted, ref} from "vue";
let clientes = ref([]);


export default {
    name: "Cliente",

    setup: function () {
        const clientes = ref([]);
        onMounted( () => {
            axios.get("/api/obter-lista-clientes").then((response) => {
                console.log(response.data.clientes);
                clientes.value = response.data.clientes;
                console.log('clientes', clientes.value[0]);
            });
        })
        return {clientes};
    }

}

</script>

<style scoped>

div label {
    color: #353f49;
    border: none;
    height: 60px;
    line-height: 30px;
    font-weight: bold;
}

fieldset
{
    color: #353f49;
    background-color:white;
    max-width:500px;
    padding:16px;
    border-radius: 10px;
}
.legend1
{
    margin-bottom:0px;
    margin-left:20px;
    font-weight: bold;
}

div .campo_nome {
    border-style: solid;
}

div .campo_email {
    border-style: solid;
}

.campo_enviar {
    color: white;
    background-color: #353f49;
    border: none;
    height: 50px;
    line-height: 20px;
    padding: 0 20px;
    text-transform: uppercase;
    font-weight: bold;
    cursor: pointer;
    border-radius: 30px;
}

.campo_enviar:hover {
    transform: scale(1.05);
}

</style>
