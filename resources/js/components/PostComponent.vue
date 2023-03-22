<template>
    <div class="p-5">
        <p>PostComponent</p>
        <CreateComponent></CreateComponent>
        <IndexComponent ref="index"></IndexComponent>
    </div>
</template>

<script>
import CreateComponent from "./CreateComponent.vue";
import IndexComponent from "./IndexComponent.vue";
export default {
    name: "PostComponent",
    data() {
        return {};
    },

    mounted() {

    },

    methods: {
    },

    computed: {},

    components: {
        CreateComponent,
        IndexComponent,
    },
};
</script>
