/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue").default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "login-component",
    require("./components/pages/Login.vue").default
);
Vue.component("home-component", require("./components/pages/Home.vue").default);
Vue.component(
    "register-component",
    require("./components/pages/Register.vue").default
);
Vue.component(
    "clientescadastro-component",
    require("./components/pages/ClientesCadastro.vue").default
);
Vue.component(
    "clientedados-component",
    require("./components/pages/ClienteDados.vue").default
);
Vue.component(
    "clientes-component",
    require("./components/pages/Clientes.vue").default
);
Vue.component(
    "table-component",
    require("./components/widgets/Table.vue").default
);
Vue.component(
    "card-component",
    require("./components/widgets/Card.vue").default
);
Vue.component(
    "button-component",
    require("./components/widgets/Button.vue").default
);
Vue.component(
    "modal-component",
    require("./components/widgets/Modal.vue").default
);
Vue.component(
    "dropdown-component",
    require("./components/widgets/dropdowns/Dropdown.vue").default
);
Vue.component(
    "dropdownItem-component",
    require("./components/widgets/dropdowns/DropdownItem.vue").default
);
Vue.component(
    "stateCity-component",
    require("./components/widgets/StateCity.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
});
