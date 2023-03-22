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
            <ShowComponent :post="post"></ShowComponent>
            <EditComponent
                :post="post"
                :ref="`edit_${post.id}`"
            ></EditComponent>
        </template>
    </div>
</template>

<script>
import EditComponent from "./EditComponent.vue";
import ShowComponent from "./ShowComponent.vue";
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

        isEdit(id) {
            return this.editPostId === id;
        },
    },

    components: {
        EditComponent,
        ShowComponent,
    },
};
</script>
