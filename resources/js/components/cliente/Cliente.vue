<template>
    <div>
        <br>
        <div class="legend1">
            <fieldset>
                <legend> Cadastro </legend>
                <label>Nome: </label>
                <input class="campo_nome" type="text" name="nome" id="nome" placeholder="Digite o Nome" v-model="cliente.nome"><br><br>
                <label>Email: </label>
                <input class="campo_email" type="text" name="email" id="email" placeholder="Digite o E-mail" v-model="cliente.email"><br>
            </fieldset><br>
            <input class="campo_enviar" type="submit" name="enviar" id="enviar" @click="gravar"><br><br>
        </div>
        <hr>
        <table class="mt-4">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="cliente in clientes" :key="cliente.id" v-if="clientes.length > 0">
                <td>{{cliente.nome}}</td>
                <td>{{cliente.email}}</td>
                <td>
                    <button @click="carregarInfoParaEdicao(cliente)">
                        <font-awesome-icon icon="fa-solid fa-pencil" />
                    </button>
                    <button @click="deletarCliente(cliente)">
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
let clientes = ref([]);


export default {
    name: "Cliente",

    data() {
        return {
            cliente: {nome: '', email: ''}
        }

    },

    setup: function () {
        const clientes = ref([]);
        onMounted( async () => {
            await axios.get('/api/obter-lista-clientes').then((response) => {
                clientes.value = response.data.clientes;
            });
        })
        return {clientes};
    },

    methods: {
        gravar: function () {
            console.log(this.cliente);
            if (this.cliente.id !== null) {
                this.editarCliente();
            } else {
                this.salvarCliente();
            }
        },

        salvarCliente: function() {
            axios.post('/api/salvar-cliente', this.cliente).then((response) => {
                if (response.status === 200) {
                    console.log('cliente salvo com sucesso!');
                    this.obterListaClientes();
                }
            })
        },

        obterListaClientes: async function() {
            await axios.get('/api/obter-lista-clientes').then((response) => {
                clientes.value = response.data.clientes;
            });
        },

        deletarCliente: function (cliente) {
            axios.post('/api/deletar-cliente/' + cliente.id).then((response) => {
                console.log(response);
                if (response.status === 200) {
                    console.log('cliente deletado com sucesso!');
                    this.obterListaClientes();
                } else {
                    console.log("erro ao deletar cliente");
                }
            })
        },

        carregarInfoParaEdicao: function (cliente) {
            this.cliente = cliente;
        },

        editarCliente: function () {
            axios.post('/api/editar-cliente', this.cliente).then((response) => {
                console.log(response);
                if (response.status === 200) {
                    console.log('cliente editado com sucesso!');
                    this.obterListaClientes();
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
