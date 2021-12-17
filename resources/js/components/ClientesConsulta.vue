<template>
    <div class="container">
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
                    <span class="search-button">
                        <button
                            class="
                                btn btn-outline-secondary btn-lg
                                border-start-0
                                rounded-pill rounded-start
                                border-search-color
                            "
                            type="button"
                            id="search-button"
                        >
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </span>
                </div>
            </div>
        </div>
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

        <modal-component id="modalCliente" titulo="Adicionar Cliente">
            <template v-slot:conteudo>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Nome completo"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Telefone"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="email"
                        class="form-control"
                        placeholder="email@dominio.com"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="País residência"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Cidade residência"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Estado BR"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Cidade BR"
                    />
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Cpf" />
                </div>
                <div class="mb-3">
                    <input
                        type="file"
                        class="form-control"
                        placeholder="Imagem cpf"
                    />
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Rg" />
                </div>
                <div class="mb-3">
                    <input
                        type="file"
                        class="form-control"
                        placeholder="Imagem rg"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Passaporte"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="file"
                        class="form-control"
                        placeholder="Imagem passaporte"
                    />
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Cnh" />
                </div>
                <div class="mb-3">
                    <input
                        type="file"
                        class="form-control"
                        placeholder="Imagem Cnh"
                    />
                </div>
                <div class="form-group mb-3">
                    <label for="dataNascimento" class="form-label"
                        >Data Nascimento</label
                    >
                    <input
                        type="date"
                        id="dataNascimento"
                        class="form-control"
                        value="1980-01-01"
                    />
                </div>
            </template>
            <template v-slot:footer>
                <button-component
                    botao="Fechar"
                    dt_dismiss="modal"
                ></button-component>
                <button-component botao="Salvar"></button-component>
            </template>
        </modal-component>
    </div>
</template>

<script>
export default {
    props: [],
    data() {},
    methods: {
        carregarLista() {},
    },
};
</script>
