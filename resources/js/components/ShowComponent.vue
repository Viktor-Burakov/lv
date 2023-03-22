<template>
    <div class="row p-1" v-bind:class="{ 'd-none': this.$parent.isEdit(post.id) }">
        <div class="col">{{ post.id }}</div>
        <div class="col">{{ post.title }}</div>
        <div class="col">{{ post.description }}</div>
        <div class="col">
            <a
                href="#"
                @click.prevent="
                    changeEditPostId(post.id, post.title, post.description)
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
</template>

<script>
export default {
    name: "ShowComponent",

    data() {
        return {
        };
    },

    props: [
        'post',
    ],
    mounted() {
    
    },

    methods: {

        deletePost(id) {
            axios.delete(`/api/post/${id}`).then((res) => {
                this.$parent.getPosts();
            });
            this.$parent.editPostId = null;
        },

        changeEditPostId(id, title, description) {
            this.$parent.editPostId = id;
            const editPost = this.$parent.$refs[`edit_${id}`][0];

            console.log("🚀 ~ file: ShowComponent.vue:56 ~ changeEditPostId ~ editPost:", editPost.title)
            editPost.title = title;
            editPost.description = description;
        },
    },
};
</script>
