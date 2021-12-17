<template>
    <!-- botao violeta -->
    <button
        type="button"
        name="violeta"
        class="btn-violet-outline"
        :data-bs-toggle="dt_toggle"
        :data-bs-target="dt_target"
    >
        {{ botao }}
    </button>
</template>
<script>
export default {
    props: ["botao", "dt_toggle", "dt_target"],
};
</script>
