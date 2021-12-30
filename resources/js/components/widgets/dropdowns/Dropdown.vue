<template>
    <div class="dropdown--control mb-3">
        <button
            class="btn--dropdown"
            type="button"
            @click.stop.prevent="toggle()"
        >
            {{ text }}
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="arrow"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 9l-7 7-7-7"
                />
            </svg>
        </button>

        <div v-show="isOpen">
            <div class="dropdown--menu">
                <slot />
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "dropdown",
    data() {
        return {
            isOpen: false,
        };
    },

    mounted() {
        document.addEventListener("click", this.clickOutListener);
    },

    beforeDestroy() {
        document.removeEventListener("click", this.clickOutListener);
    },
    methods: {
        toggle() {
            this.isOpen = !this.isOpen;
        },

        close() {
            this.isOpen = false;
        },

        // Fecha se clicar fora do component
        clickOutListener(evt) {
            if (!this.$el.contains(evt.target)) {
                this.close();
            }
        },

        // fecha se clicarmos em outro dropdown
        rootCloseListener(vm) {
            if (vm !== this) {
                this.close();
            }
        },
    },
    props: {
        text: {
            type: String,
            default: undefined,
        },
    },

    provide() {
        return {
            dropdown: this,
        };
    },

    watch: {
        isOpen(value) {
            if (value) {
                this.$root.$emit("dropdown::open", this);
            }
        },
    },

    created() {
        this.$root.$on("dropdown::open", this.rootCloseListener);
    },
};
</script>
