<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Registro</div>

                    <div class="card-body">
                        <form
                            method="POST"
                            action=""
                            @submit.prevent="register($event)"
                        >
                            <input
                                type="hidden"
                                name="_token"
                                :value="token_csrf"
                            />
                            <div class="form-group row mb-3">
                                <label
                                    for="name"
                                    class="
                                        col-md-4 col-form-label
                                        text-md-right
                                    "
                                    >Nome</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="name"
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        value=""
                                        required
                                        autocomplete="name"
                                        autofocus
                                    />
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label
                                    for="email"
                                    class="
                                        col-md-4 col-form-label
                                        text-md-right
                                    "
                                    >E-mail</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        value=""
                                        required
                                        autocomplete="email"
                                    />
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label
                                    for="password"
                                    class="
                                        col-md-4 col-form-label
                                        text-md-right
                                    "
                                    >Senha</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        required
                                        autocomplete="new-password"
                                    />
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label
                                    for="password-confirm"
                                    class="
                                        col-md-4 col-form-label
                                        text-md-right
                                    "
                                    >Confirme a senha</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="password-confirm"
                                        type="password"
                                        class="form-control"
                                        name="password_confirmation"
                                        required
                                        autocomplete="new-password"
                                    />
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-violet-outline"
                                    >
                                        Cadastrar usuário
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["token_csrf"],
    data() {
        return {
            name: "",
            email: "",
            password: "",
        };
    },
    methods: {
        register(e) {
            const url = "http://localhost:8000/register";
            let config = {
                method: "post",
                body: new URLSearchParams({
                    name: this.name,
                    email: this.email,
                    password: this.password,
                }),
            };
            fetch(url, config)
                .then((response) => response.json())
                .then((data) => {
                    if (data.token) {
                        document.cookie =
                            "token=" + data.token + ";SameSite=Lax";
                    }
                }, e.target.submit());
        },
    },
};
</script>
