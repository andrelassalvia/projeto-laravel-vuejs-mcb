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
                    </template>
                </card-component>
            </div>
        </div>
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
