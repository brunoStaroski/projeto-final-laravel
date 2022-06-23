<template>
    <div>
        <br>
        <div class="legend1">
            <fieldset>
                <legend> Venda </legend>
                <b-dropdown text="Selecione o cliente">
                    <b-dropdown-item v-for="cliente in clientes" :key="cliente.id">{{cliente.nome}}</b-dropdown-item>
                </b-dropdown>
                <br/> <br/>
                <b-dropdown text="Selecione o veiculo">
                    <b-dropdown-item v-for="veiculo in veiculos" :key="cliente.id">{{veiculo.modelo}} - {{veiculo.marca}}</b-dropdown-item>
                </b-dropdown>
            </fieldset><br>
            <input class="campo_enviar" type="submit" name="enviar" id="enviar" @click="gravar"><br><br>
        </div>
        <hr>
        <table class="table mt-4">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="venda in vendas" :key="venda.id" v-if="vendas.length > 0">
                <td>{{venda.nome}}</td>
                <td>{{venda.email}}</td>
                <td>
                    <button class="m-1" @click="carregarInfoParaEdicao(cliente)">
                        <font-awesome-icon icon="fa-solid fa-pencil" />
                    </button>
                    <button class="m-1" @click="deletarCliente(cliente)">
                        <font-awesome-icon icon="fa-solid fa-trash" />
                    </button>
                </td>
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
        })
        return {vendas, clientes, veiculos};
    },

    methods: {
        gravar: function () {
            console.log(this.veiculo);
            if (this.veiculo.id) {
                this.editarVenda();
            } else {
                this.salvarVenda();
            }
        },

        salvarVenda: function() {
            axios.post('/api/salvar-veiculo', this.veiculo).then((response) => {
                if (response.status === 200) {
                    console.log('veiculo salvo com sucesso!');
                    this.obterListaVendas();
                }
            })
        },

        obterListaVendas: async function() {
            await axios.get('/api/obter-lista-veiculos').then((response) => {
                veiculos.value = response.data.veiculos;
            });
        },

        carregarInfoParaEdicao: function (veiculo) {
            this.veiculo = veiculo;
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
