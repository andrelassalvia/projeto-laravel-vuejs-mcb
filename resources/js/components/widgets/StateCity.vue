<template>
    <div>
        <dropdown :text="stateSelected.name || 'Estado no Brasil'">
            <dropdownItem
                v-for="state in states"
                :key="state.id"
                @click="selectState(state)"
                >{{ state.name }}
            </dropdownItem>
        </dropdown>
        <dropdown :text="citySelected.name || 'Escolha cidade'">
            <dropdownItem
                v-for="city in cities"
                :key="city.id"
                @click="selectCity(city)"
            >
                {{ city.name }}
            </dropdownItem>
        </dropdown>
    </div>
</template>
<script>
import Dropdown from "./dropdowns/Dropdown.vue";
import DropdownItem from "./dropdowns/DropdownItem.vue";
export default {
    name: "StateCity",

    components: { Dropdown, DropdownItem },

    props: {
        stateName: {
            type: String,
            default: "São Paulo",
        },
    },

    data() {
        return {
            urlBaseState: "http://localhost:8000/api/v1/states",
            urlBaseCities: `http://localhost:8000/api/v1/cities`,
            states: [],
            cities: [],
            stateSelected: {},
            citySelected: {},
        };
    },

    methods: {
        getStates() {
            return axios.get(this.urlBaseState).then((response) => {
                this.states = response.data;
            });
        },

        getCities() {
            let url = this.urlBaseCities + "?state_id=" + this.stateSelected.id;
            axios.get(url).then((response) => {
                this.cities = response.data;
            });
        },

        selectState(state) {
            this.stateSelected = state;
            this.getCities();
        },

        selectCity(city) {
            this.citySelected = city;
        },
    },

    created() {
        this.getStates().then(() => {
            if (this.stateName) {
                this.stateSelected = this.states.find(
                    (state) => state.name === this.stateName
                );
                this.getCities();
            }
        });
    },
};
</script>
