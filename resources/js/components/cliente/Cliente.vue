<template>
    <div>
        <table class='table mt-4'>
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="cliente in clientes" :key="cliente.id" v-if="clientes.lenght > 0">
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
}

onMounted(async () => {
    let response = await axios.get("/api/obter-lista-clientes");
    clientes.value = response.data.clientes;
    console.log('clientes', clientes.value);
})

</script>

<style scoped>

</style>
