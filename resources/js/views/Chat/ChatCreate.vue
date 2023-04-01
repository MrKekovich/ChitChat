<template>
    <div>
        <h2>Add Chat</h2>
        <form @submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" v-model="chat.name" required>
            </div>
            <div class="form-group">
                <label for="image_url">Image URL:</label>
                <input type="text" class="form-control mb-3" v-model="chat.image_url">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "ChatEdit",
    data() {
        return {
            chat: {
                name: null,
                image_url: null,
                user_id: 1
            }
        }
    },
    methods: {
        handleSubmit() {
            // if (this.validate()) {
                this.submit();
            // }
        },
        validate() {
            return this.chat.name && this.chat.image_url.isOptimizedDepUrl;
        },
        submit() {
            axios.post('/api/chats', this.chat)
                .then(response => {
                    console.log('Chat created!');
                    this.$router.push('/chats');
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }

}
</script>

<style scoped>

</style>
