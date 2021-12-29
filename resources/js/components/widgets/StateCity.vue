<template>
    <div>
        <dropdown :text="stateSelected.name || 'Estado BR'">
            <dropdownItem
                v-for="state in states"
                :key="state.id"
                @click="selectState(state)"
                >{{ state.name }}</dropdownItem
            >
        </dropdown>
    </div>
</template>
<script>
import Dropdown from "./dropdowns/Dropdown.vue";
import DropdownItem from "./dropdowns/DropdownItem.vue";
export default {
    name: "StateCity",
    components: { Dropdown, DropdownItem },
    data() {
        return {
            urlBase: "http://localhost:8000/api/v1/estados",
            states: [],
            cities: [],
            stateSelected: {},
        };
    },

    methods: {
        getStates() {
            axios.get(this.urlBase).then((response) => {
                this.states = response.data;
            });
        },

        selectState(state) {
            this.stateSelected = state;
        },
    },
    created() {
        this.getStates();
    },
};
</script>
