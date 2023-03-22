<template>
    <div class="p-5">
        <h3>CreateComponent</h3>
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input
                type="text"
                class="form-control"
                v-model="title"
                id="title"
            />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Desc</label>
            <textarea
                class="form-control"
                v-model="description"
                id="description"
                rows="3"
            ></textarea>
        </div>
        <button type="submit" @click.prevent="addPost" class="btn btn-primary">
            Отправить
        </button>
        <SomeComponent :obj="obj"></SomeComponent>
    </div>
</template>

<script>
import SomeComponent from "./SomeComponent.vue";
export default {
    name: "CreateComponent",

    data() {
        return {
            title: null,
            description: null,
            obj: {
                color: 'black',
                number: 20,
            }
        };
    },


    mounted() {},

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

    components: {
        SomeComponent,
    },
};
</script>
