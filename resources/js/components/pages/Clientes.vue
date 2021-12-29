<template>
    <div class="container">
        <!-- BARRA DE BUSCAS -->
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="input-group" id="search">
                    <input
                        class="
                            form-control
                            border-end-0 border
                            rounded-pill rounded-end
                        "
                        type="text"
                        placeholder="Nome"
                        id="example-search-input"
                    />
                    <input
                        class="
                            form-control
                            border-end-0 border
                            rounded-end
                            border-search-color
                        "
                        type="text"
                        placeholder="Telefone"
                        id="example-search-input"
                    />
                    <input
                        class="
                            form-control
                            border-end-0 border
                            rounded-end
                            border-search-color
                        "
                        type="text"
                        placeholder="email"
                        id="example-search-input"
                    />
                    <input
                        class="
                            form-control
                            border-end-0 border
                            rounded-end
                            border-search-color
                        "
                        type="text"
                        placeholder="cpf"
                        id="example-search-input"
                    />
                </div>
            </div>
        </div>
        <!-- LISTAGEM DE CLIENTES -->
        <div class="row justify-content-center">
            <div class="col-11">
                <card-component titulo="Lista de Clientes">
                    <template v-slot:conteudo>
                        <table-component></table-component>
                    </template>
                    <template v-slot:rodape>
                        <button-component botao="Selecionar"></button-component>
                        <button-component
                            botao="Adicionar Cliente"
                            dt_toggle="modal"
                            dt_target="#modalCliente"
                        >
                        </button-component>
                    </template>
                </card-component>
            </div>
        </div>
        <!-- MODAL PARA ADICAO DE CLIENTES -->
        <modal-component id="modalCliente" titulo="Adicionar Cliente">
            <template v-slot:conteudo>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Nome completo"
                        v-model="nome"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Telefone"
                        v-model="telefone"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="email"
                        class="form-control"
                        placeholder="email@dominio.com"
                        v-model="email"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="País residência"
                        v-model="paisResidencia"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Cidade residência"
                        v-model="cidadeResidencia"
                    />
                </div>

                <StateCity></StateCity>

                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Estado BR"
                        v-model="estadoBr"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Cidade BR"
                        v-model="cidadeBr"
                    />
                </div>
                <div class="form-group mb-4">
                    <label for="imagemCpf">Anexar CPF</label>
                    <input
                        type="text"
                        class="form-control mb-2"
                        placeholder="Numero do cpf"
                        v-model="cpfNumber"
                    />
                    <input
                        id="imagemCpf"
                        type="file"
                        class="form-control"
                        placeholder="Imagem cpf"
                        @change="carregarImagemCpf($event)"
                    />
                </div>
                <div class="form-group mb-4">
                    <label for="imagemRG">Anexar RG</label>
                    <input
                        type="text"
                        class="form-control mb-2"
                        placeholder="Rg"
                        v-model="rgNumber"
                    />

                    <input
                        id="imagemRG"
                        type="file"
                        class="form-control"
                        placeholder="Imagem rg"
                        @change="carregarImagemRg($event)"
                    />
                </div>
                <div class="form-group mb-4">
                    <label for="passaporte">Anexar Passaporte</label>
                    <input
                        id="passaporte"
                        type="text"
                        class="form-control mb-2"
                        placeholder="Passaporte"
                        v-model="passaporteNumber"
                    />

                    <input
                        type="file"
                        class="form-control"
                        placeholder="Imagem passaporte"
                        @change="carregarImagemPassaporte($event)"
                    />
                </div>
                <div class="form-group mb-4">
                    <label for="cnh">Anexar CNH</label>
                    <input
                        id="cnh"
                        type="text"
                        class="form-control mb-2"
                        placeholder="Cnh"
                        v-model="cnhNumber"
                    />

                    <input
                        type="file"
                        class="form-control"
                        placeholder="Imagem Cnh"
                        @change="carregarImagemCnh($event)"
                    />
                </div>
                <div class="form-group mb-3">
                    <label for="dataNascimento">Data Nascimento</label>
                    <input
                        type="date"
                        id="dataNascimento"
                        class="form-control"
                        value="1980-01-01"
                        v-model="dataNascimento"
                    />
                </div>
            </template>
            <!-- FOOTER -->
            <template v-slot:footer>
                <button-component
                    botao="Fechar"
                    dt_dismiss="modal"
                ></button-component>
                <button
                    @click="salvar()"
                    class="btn-violet-outline"
                    type="button"
                >
                    Salvar
                </button>
            </template>
        </modal-component>
    </div>
</template>

<script>
import StateCity from "../widgets/StateCity.vue";

export default {
    name: "Clientes",
    components: { StateCity },

    props: [],
    data() {
        return {
            urlBase: "http://localhost:8000/api/v1/cliente",
            nome: "",
            telefone: "",
            email: "",
            paisResidencia: "",
            cidadeResidencia: "",
            estadoBr: "",
            cidadeBr: "",
            cpfNumber: "",
            cpfImagem: [],
            rgNumber: "",
            rgImagem: [],
            passaporteNumber: "",
            passaporteImagem: [],
            cnhNumber: "",
            cnhImagem: [],
            dataNascimento: "",
        };
    },
    methods: {
        carregarImagemCpf(e) {
            this.cpfImagem = e.target.files;
        },
        carregarImagemRg(e) {
            this.rgImagem = e.target.files;
        },
        carregarImagemPassaporte(e) {
            this.passaporteImagem = e.target.files;
        },
        carregarImagemCnh(e) {
            this.cnhImagem = e.target.files;
        },
        salvar() {
            console.log(this.cpfImagem);
            let formData = new FormData();
            formData.append("nome", this.nome);
            formData.append("telefone", this.telefone);
            formData.append("email", this.email);
            formData.append("pais_residencia", this.paisResidencia);
            formData.append("cidade_residencia", this.cidadeResidencia);
            formData.append("estado_br", this.estadoBr);
            formData.append("cidade_br", this.cidadeBr);
            formData.append("cpf", this.cpfNumber);
            formData.append("cpf_imagem", this.cpfImagem[0]);
            formData.append("rg", this.rgNumber);
            formData.append("rg_imagem", this.rgImagem[0]);
            formData.append("passaporte", this.passaporteNumber);
            formData.append("passaporte_imagem", this.passaporteImagem[0]);
            formData.append("cnh", this.cnhNumber);
            formData.append("cnh_imagem", this.cnhImagem[0]);
            formData.append("dt_nascimento", this.dataNascimento);

            let config = {
                headers: {
                    "Content-Type": "multipart/form-data",
                    Accept: "Application/json",
                },
            };

            axios
                .post(this.urlBase, formData, config)
                .then((response) => {
                    console.log(response);
                })
                .catch((errors) => {
                    console.log(errors);
                });
        },
    },
};
</script>
