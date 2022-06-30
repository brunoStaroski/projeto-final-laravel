<template>
    <div>
        <br>
        <div class="legend2">
            <fieldset>
                <legend> Cadastro </legend>
                <label>Marca: </label>
                <input class="campo_marca" type="text" name="marca" id="marca" placeholder="Digite a marca" v-model="veiculo.marca"><br>
                <label>Modelo: </label>
                <input class="campo_modelo" type="text" name="modelo" id="modelo" placeholder="Digite o Modelo" v-model="veiculo.modelo"><br>
                <label>Valor: </label>
                <input class="campo_valor" type="number" name="valor" id="valor" placeholder="Digite o Valor" v-model="veiculo.valor"><br>
            </fieldset><br>
            <input class="campo_enviar" type="submit" name="enviar" id="enviar" @click="gravar"><br><br>
        </div>
        <hr>
        <table class="table mt-4">
            <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="veiculo in veiculos" :key="veiculo.id" v-if="veiculos.length > 0">
                <td>{{veiculo.marca}}</td>
                <td>{{veiculo.modelo}}</td>
                <td>{{veiculo.valor}}</td>
                <td>
                    <button class="m-1" @click="carregarInfoParaEdicao(veiculo)">
                        <font-awesome-icon icon="fa-solid fa-pencil" />
                    </button>
                    <button class="m-1" @click="deletarVeiculo(veiculo)">
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
    name: "Veiculo",

    data() {
        return {
            veiculo: {id: null, marca: '', modelo: '', valor: ''}
        }

    },

    setup: function () {
        const veiculos = ref([]);
        onMounted( async () => {
            await axios.get('/api/obter-lista-veiculos').then((response) => {
                veiculos.value = response.data.veiculos;
            });
        })
        return {veiculos};
    },

    methods: {
        gravar: function () {
            console.log(this.veiculo);
            if (this.veiculo.id) {
                this.editarVeiculo();
            } else {
                this.salvarVeiculo();
            }
        },

        salvarVeiculo: function() {
            axios.post('/api/salvar-veiculo', this.veiculo).then((response) => {
                if (response.status === 200) {
                    console.log('veiculo salvo com sucesso!');
                }
            })
        },
        },

        deletarVeiculo: function (veiculo) {
            axios.post('/api/deletar-veiculo/' + veiculo.id).then((response) => {
                console.log(response);
                if (response.status === 200) {
                    console.log('veiculo deletado com sucesso!');
                    this.obterListaVeiculos();
                } else {
                    console.log("erro ao deletar veiculo");
                }
            })
        },

        carregarInfoParaEdicao: function (veiculo) {
            this.veiculo = veiculo;
        },

        editarVeiculo: function () {
            axios.post('/api/editar-veiculo', this.veiculo).then((response) => {
                console.log(response);
                if (response.status === 200) {
                    console.log('veiculo editado com sucesso!');
                }
            })
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
