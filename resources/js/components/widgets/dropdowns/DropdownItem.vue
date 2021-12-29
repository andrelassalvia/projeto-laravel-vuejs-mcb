<template>
    <Component
        :is="is"
        :href="href"
        class="dropdown--item"
        :to="to"
        @click="onClick"
    >
        <slot />
    </Component>
</template>
<script>
export default {
    name: "dropdownItem",

    inject: ["dropdown"],

    computed: {
        is() {
            if (this.href !== undefined) {
                return "a";
            }

            return "li";
        },
    },

    props: {
        href: {
            type: String,
            default: undefined,
        },

        to: {
            type: [String, Object],
            default: undefined,
        },
    },

    methods: {
        onClick(evt) {
            this.$emit("click", evt);
            this.closeDropdown();
        },

        closeDropdown() {
            this.dropdown.close();
        },
    },
};
</script>
