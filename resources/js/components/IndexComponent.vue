<template>
    <div class="p-5">
        <div class="row p-1">
            <div class="col">id</div>
            <div class="col">titile</div>
            <div class="col">description</div>
            <div class="col">Edit</div>
            <div class="col">Delete</div>
        </div>
        <template v-for="post in posts">
            <div class="row p-1" v-bind:class="{ 'd-none': isEdit(post.id) }">
                <div class="col">{{ post.id }}</div>
                <div class="col">{{ post.title }}</div>
                <div class="col">{{ post.description }}</div>
                <div class="col">
                    <a
                        href="#"
                        @click.prevent="
                            changeEditPostId(
                                post.id,
                                post.title,
                                post.description
                            )
                        "
                        class="btn btn-secondary"
                        >Edit</a
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
            <div class="row p-1" v-bind:class="{ 'd-none': !isEdit(post.id) }">
                <div class="col">{{ post.id }}</div>
                <div class="col">
                    <input type="text" v-model="title" class="form-control" />
                </div>
                <div class="col">
                    <input
                        type="text"
                        v-model="description"
                        class="form-control"
                    />
                </div>
                <div class="col">
                    <a
                        href="#"
                        @click.prevent="updatePost()"
                        class="btn btn-success"
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
    </div>
</template>

<script>
export default {
    name: "IndexComponent",

    data() {
        return {
            posts: null,
            editPostId: null,
            title: "",
            description: "",
        };
    },

    mounted() {
        this.getPosts();
    },

    methods: {
        getPosts() {
            axios.get("/api/post").then((res) => {
                this.posts = res.data;
            });
        },

        updatePost() {
            axios
                .patch(`/api/post/${this.editPostId}`, {
                    title: this.title,
                    description: this.description,
                })
                .then((res) => {
                    this.getPosts();
                });
            this.editPostId = null;
        },

        deletePost(id) {
            axios.delete(`/api/post/${id}`).then((res) => {
                this.getPosts();
            });
            this.editPostId = null;
        },

        changeEditPostId(id, title, description) {
            this.editPostId = id;
            this.title = title;
            this.description = description;
        },

        isEdit(id) {
            return this.editPostId === id;
        },

        indexLog() {
            console.log(
                "🚀 ~ file: IndexComponent.vue:127 ~ indexLog ~ indexComponent:",
                "indexComponent"
            );
        },
    },
};
</script>
