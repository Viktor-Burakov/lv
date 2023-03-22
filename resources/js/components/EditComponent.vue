<template>
    <div
        class="row p-1"
        v-bind:class="{ 'd-none': !this.$parent.isEdit(post.id) }"
    >
        <div class="col">{{ post.id }}</div>
        <div class="col">
            <input type="text" v-model="title" class="form-control" />
        </div>
        <div class="col">
            <input type="text" v-model="description" class="form-control" />
        </div>
        <div class="col">
            <a href="#" @click.prevent="updatePost()" class="btn btn-success"
                >Update</a
            >
        </div>
        <div class="col">
            <a
                href="#"
                @click.prevent="deletePost(post.id)"
                class="btn btn-danger"
                >Delete</a
            >
        </div>
    </div>
</template>

<script>
export default {
    name: "EditComponent",

    props: ["post"],

    data() {
        return {
            title: "",
            description: "",
        };
    },

    mounted() {},

    methods: {
        updatePost() {
            console.log(
                "🚀 ",
                this.$parent
            );
            console.log(
                "🚀 ",
                this.$parent.editPostId
            );
            axios
                .patch(`/api/post/${this.$parent.editPostId}`, {
                    title: this.$parent.title,
                    description: this.$parent.description,
                })
                .then((res) => {
                    console.log(
                        "🚀 ~ file: EditComponent.vue:52 ~ .then ~ res:",
                        res
                    );

                    this.$parent.getPosts();
                });
            this.$parent.editPostId = null;
        },
        deletePost(id) {
            axios.delete(`/api/post/${id}`).then((res) => {
                this.getPosts();
            });
            this.editPostId = null;
        },
    },
};
</script>
