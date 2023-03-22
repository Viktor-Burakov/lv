<template>
    <div class="p-5">
        <div>Color: {{ obj.color }}</div>
        <div>Number: {{ obj.number }}</div>
    </div>
</template>

<script>
export default {
    name: "CreateComponent",

    data() {
        return {
            title: null,
            description: null,
        };
    },

    mounted() {},
    props: ["obj"],
    methods: {
        addPost() {
            console.log("🚀", this.title, this.description);
            axios
                .post("/api/post", {
                    title: this.title,
                    description: this.description,
                })
                .then((res) => {
                    console.log(
                        "🚀 ~ file: CreateComponent.vue:50 ~ addPost ~ res:",
                        res
                    );
                    this.title = null;
                    this.description = null;
                });
            this.$parent.$refs.index.getPosts();
        },
    },
};
</script>
