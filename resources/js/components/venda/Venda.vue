<template>
    <div>
        <br>
        <div class="legend1">
            <fieldset>
                <legend> Venda </legend>
                <b-form-select v-model="venda.idCliente">
                    <b-form-select-option :value="null">Selecione um cliente</b-form-select-option>
                    <b-form-select-option :value="cliente.id" v-for="cliente in clientes" :key="cliente.id" >{{cliente.nome}}</b-form-select-option>
                </b-form-select>
                <br/> <br/>
                <b-form-select v-model="venda.idVeiculo">
                    <b-form-select-option :value="null">Selecione um veiculo</b-form-select-option>
                    <b-form-select-option :value="veiculo.id" v-for="veiculo in veiculos" :key="cliente.id" >{{veiculo.modelo}} - {{veiculo.marca}}</b-form-select-option>
                </b-form-select>
            </fieldset><br>
            <input class="campo_enviar" type="submit" name="enviar" id="enviar" @click="salvarVenda"><br><br>
        </div>
        <hr>
        <table class="table mt-4">
            <thead>
            <tr>
                <th>Cliente</th>
                <th>Veiculo</th>
                <th>Valor</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="venda in vendas" :key="venda.id" v-if="vendas.length > 0">
                <td>{{venda.cliente.nome}}</td>
                <td>{{venda.veiculo.modelo}} - {{venda.veiculo.marca}}</td>
                <td>{{venda.veiculo.valor}}</td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
import {onMounted, ref} from "vue";

export default {
    name: "Venda",

    data() {
        return {
            venda: {id: null, idCliente: null, idVeiculo: null},
            cliente: {id: null, nome: '', email: ''},
            veiculo: {id: null, marca: '', modelo: '', valor: ''}
        }

    },

    setup: function () {
        const clientes = ref([]);
        const veiculos = ref([]);
        const vendas = ref([]);
        onMounted( async () => {
            await axios.get('/api/obter-lista-clientes').then((response) => {
                clientes.value = response.data.clientes;
            });
            await axios.get('/api/obter-lista-veiculos').then((response) => {
                veiculos.value = response.data.veiculos;
            });
            await axios.get('/api/obter-lista-vendas').then((response) => {
                vendas.value = response.data.vendas;
                console.log(vendas.value);
            });
        })
        return {vendas, clientes, veiculos};
    },

    methods: {
        salvarVenda: function() {
            axios.post('/api/salvar-venda', this.venda).then((response) => {
                if (response.status === 200) {
                    console.log('Venda salva com sucesso!');
                }
            })
        }
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
    .legend2
    {
        margin-bottom:0px;
        margin-left:20px;
        font-weight: bold;
    }

    div .campo_marca {
        border-style: solid;
        margin-left: 15px;
    }

    div .campo_modelo {
        border-style: solid;
        margin-left: 5px;
    }

    div .campo_valor {
        border-style: solid;
        margin-left: 23px;
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
